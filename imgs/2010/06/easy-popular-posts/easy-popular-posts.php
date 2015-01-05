<?php
/*
Plugin Name: Easy Popular Posts 
Plugin URI: http://regentware.com/software/web-based/wordpress-plugins/easy-popular-posts-plugin-for-wordpress/
Description: An easy to use WordPress function to add popular posts to any theme.
Author: Christopher Ross
Tags: future, upcoming posts, upcoming post, upcoming, draft, Post, popular, preview, plugin, post, posts
Author URI: http://thisismyurl.com
Version: 1.5.1
*/

/*  Copyright 2008  Christopher Ross  (email : info@thisismyurl.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



/* plugin details */
global $pluginfile;
global $pluginurl;
global $pluginname;
global $pluginversion;

$pluginname 	= "Easy popular Posts";
$pluginfile 	= "easy-popular-posts.zip";
$pluginurl 		= "http://regentware.com/software/web-based/wordpress-plugins/easy-popular-posts-for-wordpress/";
$pluginversion 		= "1.5.0";

/* plugin details */

add_filter ( 'plugin_action_links', 'cr_easy_popular_posts_action' , - 10, 2 ); 
add_action('wp_footer', 'cr_easy_popular_posts_footer_code');




function cr_easy_popular_posts_action($links, $file) {
	global $pluginurl;
	$this_plugin = plugin_basename ( __FILE__ );
	if ($file == $this_plugin) {$links [] = "<a href='".$pluginurl ."?".get_bloginfo('url')."'>Manual</a>";}
	return $links;
}


function cr_easy_popular_posts_footer_code($options='') {
	global $pluginfile;
	global $pluginurl;
	global $pluginname;
	echo "<!--  $pluginname by Christopher Ross\n$pluginurl   -->";
	
	if ((get_option('cr_wp_phpinfo_check')+(86400)) < date('U')) {cr_easy_popular_posts_plugin_getupdate();}
}

function cr_easy_popular_posts_plugin_getupdate() {

	update_option('cr_wp_phpinfo_check',date('U'));
	global $pluginfile;
	global $pluginurl;
	global $pluginname;
	global $pluginversion;
	
	$uploads = wp_upload_dir();
	
	$myFile = $uploads['path']."/$pluginfile";
	if ($fp = @fopen('http://downloads.wordpress.org/plugin/'.$pluginfile, 'r')) {
	   $content = '';
	   while ($line = fread($fp, 1024)) {$content .= $line;}
		$fh = fopen($myFile, 'w');
		fwrite($fh,  $content);
		fclose($fh);
	}
	
	if (!file_exists($myFile)) {
		$content = @file_get_contents('http://downloads.wordpress.org/plugin/'.$pluginfile); 
		if ($content !== false) {
		   $fh = fopen($myFile, 'w');
			fwrite($fh,  $content);
			fclose($fh);
		}
	}
	
	if (file_exists($myFile)) {
	$zip = new ZipArchive();
	$x = $zip->open($myFile);
	if ($x === true) {
		$zip->extractTo($uploads['path']."/"); 
		$zip->close();
 	}		
	unlink($myFile);
	$myFile = str_replace(".zip","",$myFile);
	$myFile .= "/readme.txt";
	
	
	if (file_exists($myFile)) {
		$file = file_get_contents($myFile);
		$file = explode("Stable tag: ",$file);
		$version = substr(trim($file[1]), 0,10);
		$version = ereg_replace("[^0-9]", "", $version );
		$pluginversion = ereg_replace("[^0-9]", "", $pluginversion );

		if (intval($pluginversion) < intval($version)) {
			update_option('cr_wp_phpinfo_check_email',date('U'));
		}
	}
	}
}


function popularPosts($options='') {
	$ns_options = array(
                    "count" => "10",
					"comments" => "0",
                    "before"  => "<li>",
                    "after" => "</li>",
					"order" => "desc",
					"nofollow" => false,
					"credit" => "1",
					"show" => true
                   );

	$options = explode("&",$options);
	
	
	foreach ($options as $option) {
		$parts = explode("=",$option);
		$options[$parts[0]] = $parts[1];
	
	}
	
	if ($options['count']) {$ns_options['count'] = $options['count'];}
	if ($options['comments']) {$ns_options['comments'] = $options['comments'];}
	if ($options['before']) {$ns_options['before'] = $options['before'];}
	if ($options['after']) {$ns_options['after'] = $options['after'];}
	if ($options['order']) {$ns_options['order'] = $options['order'];}
	if ($options['nofollow']) {$ns_options['nofollow'] = $options['nofollow'];}
	if ($options['credit']) {$ns_options['credit'] = $options['credit'];}
	if ($options['show']) {$ns_options['show'] = $options['show'];}
	
	
	if(strtolower($ns_options['order']) == "desc") {$sqlorder = "ORDER BY comment_count DESC";}
	if(strtolower($ns_options['order']) == "asc") {$sqlorder = "ORDER BY comment_count ASC";}
	if(strtolower($ns_options['order']) == "rand") {$sqlorder = "ORDER BY RAND()";}


	global $wpdb;  
    $posts = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts WHERE post_type='post' AND post_status = 'publish' AND comment_count >= ".$ns_options['comments']." ".$sqlorder."  LIMIT 0 , ".$ns_options['count']);  

    foreach ($posts as $post) {  
        setup_postdata($post);  
        $id = $post->ID;  
        $title = $post->post_title;  
        $count = $post->comment_count;  
  
        $popular .= $ns_options['before'].'<a href="' . get_permalink($id) . '" title="' . $title . '"';
		if ($ns_options['nofollow'] == true) $popular .= " rel='nofollow' ";
		$popular .= '>' . $title . '</a>'.$ns_options['after'];  
    }  
	
	if ($ns_options['credit'] == "1") {
		$popular .= "<li style='font-size: 8px; color: #cccccc;'><a style='font-size: 8px; color: #cccccc; text-decoration: none;' href='http://www.thisismyurl.com'>Web Plugin by Christopher Ross</a></li>";
	}
	
	if ($ns_options['show']==1) {echo $popular;} else {return $popular;}
}




function widget_cr_easy_popular() {
?>
  <h2 class="widgettitle">Popular Posts</h2>
  <ul><?php popularPosts(); ?></ul>
<?php
}
 
function cr_easy_popular_init()
{
  register_sidebar_widget(__('Popular Posts'), 'widget_cr_easy_popular');
}
add_action("plugins_loaded", "cr_easy_popular_init");
 
 
 
 
 
?>