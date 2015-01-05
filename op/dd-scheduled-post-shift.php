<?php
/*
Plugin Name: Scheduled Post Shift
Plugin URI: http://www.dagondesign.com/articles/scheduled-post-shift-plugin-for-wordpress/
Description: Automatically takes your oldest post and moves it to the front by updating its timestamp.
Author: Dagon Design
Version: 1.22
Author URI: http://www.dagondesign.com
*/


$ddps_version = '1.22';

add_action('admin_menu', 'ddps_add_option_pages');
add_action('ddps_postshift', 'ddps_postshift');



// Setup defaults if options do not exist
add_option('ddps_enabled', FALSE);
add_option('ddps_cat', '');
add_option('ddps_delay', 24);

function ddps_add_option_pages() {
	if (function_exists('add_options_page')) {
		add_options_page('Post Shift', 'DDPostShift', 8, __FILE__, 'ddps_options_page');
	}		
}

function ddps_options_page() {

	global $ddps_version;

	if (isset($_POST['enable_post_shift'])) {

		?><div id="message" class="updated fade"><p><strong><?php 

		update_option('ddps_enabled', TRUE);
		update_option('ddps_cat', stripslashes((string)$_POST['ddps_cat']));
		update_option('ddps_delay', (int)$_POST['ddps_delay']);

		if ((int)$_POST['ddps_delay'] < 1) {
			update_option('ddps_delay', 1);
		}

		wp_clear_scheduled_hook('ddps_postshift');
		wp_schedule_event( time()+10, 'ddps_schedule', 'ddps_postshift' );

		echo "Post Shift Enabled!";

	    ?></strong></p></div><?php

	} else if (isset($_POST['disable_post_shift'])) {

		?><div id="message" class="updated fade"><p><strong><?php 

		update_option('ddps_enabled', FALSE);

		wp_clear_scheduled_hook('ddps_postshift');

		echo "Post Shift Disabled!";

	    ?></strong></p></div><?php

	} else if (isset($_POST['info_update'])) {

		?><div id="message" class="updated fade"><p><strong><?php 

		update_option('ddps_enabled', (bool) $_POST["ddps_enabled"]);
		update_option('ddps_cat', stripslashes((string)$_POST['ddps_cat']));
		update_option('ddps_delay', (int)$_POST['ddps_delay']);

		if ((int)$_POST['ddps_delay'] < 1) {
			update_option('ddps_delay', 1);
		}

		wp_clear_scheduled_hook('ddps_postshift');
		wp_schedule_event( time()+10, 'ddps_schedule', 'ddps_postshift' );

		echo "Configuration Updated!";

	    ?></strong></p></div><?php

	} ?>

	<div class=wrap>

	<h2>Scheduled Post Shift v<?php echo $ddps_version; ?></h2>

	<p>For information and updates, please visit:<br />
	<a href="http://www.dagondesign.com/articles/scheduled-post-shift-plugin-for-wordpress/">http://www.dagondesign.com/articles/scheduled-post-shift-plugin-for-wordpress/</a></p>


	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
	<input type="hidden" name="info_update" id="info_update" value="true" />


	<div style="padding: 0 0 30px 20px;">

	<h3>Current Status: <?php echo (get_option('ddps_enabled') == TRUE) ? 'Enabled' : 'Disabled'; ?></h3>

	<?php if (get_option('ddps_enabled') == TRUE) { ?>
		<input type="submit" name="disable_post_shift" value="<?php _e('Disable Post Shift'); ?> &raquo;" />
	<?php } else { ?>
		<input type="submit" name="enable_post_shift" value="<?php _e('Enable Post Shift'); ?> &raquo;" />
	<?php } ?>

	</div>

	<fieldset class="options"> 
	<legend>Options</legend>

	<table width="100%" border="0" cellspacing="0" cellpadding="6">

	<tr valign="top"><td width="25%" align="right">
		<strong>Shift Delay</strong>
	</td><td align="left">
		<input name="ddps_delay" type="text" size="10" value="<?php echo htmlspecialchars(get_option('ddps_delay')); ?>"/>
		<br />The number of <strong>hours</strong> between post shifts
	</td></tr>

	<tr valign="top"><td width="25%" align="right">
		<strong>Category ID(s)</strong>
	</td><td align="left">
		<input name="ddps_cat" type="text" size="10" value="<?php echo htmlspecialchars(get_option('ddps_cat')); ?>"/>
		<br />If left blank, the plugin will use posts from all categories
		<br />If you enter one or more category IDs, it will only update posts from those categories
		<br />Separate multiple category IDs with commas
	</td></tr>

	</table>
	</fieldset>



	<div class="submit">
		<input type="submit" name="info_update" value="<?php _e('Update options'); ?> &raquo;" />
	</div>
	</form>
	</div><?php
}





function ddps_postshift() {

	global $wpdb;



	// Currently using a work-around for the version system
	// determines if pre or post 2.3 from wp_term_taxonomy 

	$ver = 2.2;
	$wpv = $wpdb->get_results("show tables like '{$tp}term_taxonomy'");
	if (count($wpv) > 0) {
		$ver = 2.3;
	}


	
	$tp = $wpdb->prefix;

	$the_cat = '';
	$tmp_array = (array)explode(',', trim(get_option('ddps_cat'), ','));
	if (count($tmp_array) > 0) {
		$the_cat = '(' . trim(get_option('ddps_cat'), ',') . ')';
	}


	if ($the_cat == "") {

		$oldest_post = $wpdb->get_var("
		SELECT ID 
		FROM {$tp}posts
		WHERE post_type = 'post'
		AND post_status = 'publish' 
		GROUP BY post_date asc
		");


	} else {

		if ($ver < 2.3) {

			$oldest_post = $wpdb->get_var("
			SELECT ID 
			FROM {$tp}posts, {$tp}post2cat
			WHERE {$tp}post2cat.category_id IN " . $the_cat . "  
			AND post_type = 'post'
			AND {$tp}posts.post_status = 'publish' 
			AND {$tp}post2cat.post_id = {$tp}posts.ID
			GROUP BY post_date asc 
			");

		} else { // post 2.3+

			$oldest_post = $wpdb->get_var("
			SELECT ID 
			FROM {$tp}posts, {$tp}term_relationships, {$tp}term_taxonomy 
			WHERE {$tp}term_taxonomy.term_id IN " . $the_cat . "  
			AND {$tp}term_taxonomy.term_taxonomy_id = {$tp}term_relationships.term_taxonomy_id 
			AND {$tp}term_relationships.object_id = {$tp}posts.ID 
			AND {$tp}posts.post_type = 'post' 
			AND {$tp}posts.post_status = 'publish' 
			GROUP BY post_date asc
			");

		}

	}



	$new_time = date('Y-m-d H:i:s');
	$wpdb->query("UPDATE $wpdb->posts SET post_date = '$new_time' WHERE ID = '$oldest_post'");

}




function more_reccurences() {
    return array(
        'ddps_schedule' => array('interval' => ((int)get_option('ddps_delay') * 3600), 'display' => 'Post Shift Schedule')
    );
}

add_filter('cron_schedules', 'more_reccurences');

?>