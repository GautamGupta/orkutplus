<?php
/*
Plugin Name: Author Info
Plugin URI: http://gaut.am/plugins/wordpress/author-info/
Version: 1.0
Description: Displays an Author Info box below the posts. This plugin is very useful for those which have multiple authors.
Author: Gautam Gupta
Author URI: http://gaut.am/
Donate Uri: http://gaut.am/donate/
*/

/*
 Main File for
 Author Info Plugin
 for WordPress
 by www.Gaut.am
*/

function author_info_box($userdata = array(), $extradata = array())
{
		global $wpdb;
		
		//get data
		if(!$extradata){
				$comments = intval($wpdb->get_var('SELECT count(comment_ID) FROM `'.$wpdb->prefix.'comments` where `comment_approved`=1 and `comment_author_email`=\''.$userdata->user_email.'\''));
				//$thanks = intval($wpdb->get_var('SELECT count(id) FROM `'.$wpdb->prefix.'aib_thanks` where `to_user_id`='.$userdata->ID));
				//$forum_posts = intval($wpdb->get_var('SELECT COUNT(post_id) FROM `bb_posts` WHERE `post_status`=0 AND `poster_id`='.$userdata->ID));
				$np = intval(get_usernumposts($userdata->ID));
				$star_array = author_info_starcalc($np, $comments, $thanks);
		}else{
				extract($extradata, EXTR_SKIP);
		}
		
		//english (s) (plural)
		$np = author_info_engnum($np, "Article");
		$comments = author_info_engnum($comments, "Comment");
		//$thanks = author_info_engnum($thanks, "Time");
		// and thanked <span class="hl">'.$thanks.'</span>
		//$forum_posts = author_info_engnum($forum_posts, "Post");
		
		//starring
		$star_text = $star_array[0];
		$author_title = $star_array[1];
		$points = author_info_engnum($star_array[2], "Point");
		
		//forum posts text
		//$forum_posts = ', <span class="hl"><a href="http://www.sportskeeda.com/forum/profile.php?id='.$userdata->ID.'">'.$forum_posts.'</a></span>';
		if($userdata->description){
				$description = $userdata->description."<br />";
		}
		//embed in content and return
		$return_text = '<div style="clear:both;"></div>
				<div class="author_info_box">
				'.get_avatar($userdata->user_email, '80').'<span><strong><a href="'.get_author_posts_url($userdata->ID).'">'.$userdata->display_name.'</a></strong> - <span class="hl">'.$author_title.'</span> - <span class="hl">'.$points.'</span>'.$star_text.'</span><br />'.$description.$userdata->first_name.' has written <span class="hl"><a href="'.get_author_posts_url($userdata->ID).'">'.$np.'</a></span>, posted <span class="hl">'.$comments.'</span>.
				<div style="clear:both;"></div></div><div style="clear:both;"></div>';
		return $return_text;
}

function author_info_insert_in_post($content = '')
{
		if(is_single()){
				global $post, $wpdb, $authordata, $current_user;
				/*
				//thanks text
				if(is_user_logged_in() && $current_user){
						$chk = $wpdb->get_results('SELECT id FROM `'.$wpdb->prefix.'aib_thanks` where `from_user_id`='.$current_user->ID.' and `to_user_id`='.$post->post_author.' and `for_post_id`='.$post->ID.' and `blog_forum`=1');
						if(($current_user->ID != $post->post_author) && !($chk)){
								$thank_link = esc_url(wp_nonce_url(get_permalink().'?thank=1', 'thanked_by_'.$current_user->ID.'_on_'.$post->ID));
								$thank_extra = 'rel="nofollow"';
								$thank_text = '<div style="clear:both;"></div>
								<div class="buttons">
								<a href="'.$thank_link.'" '.$thank_extra.'class="positive"><img src="'.plugins_url('images/thumb-up.png', __FILE__).'" alt="" />Thanks for the Post</a>
								</div';
						}else{
								$thank_text = '<div style="clear:both;"></div>';
						}
				}else{
						$thank_link = '#';
						$thank_extra = 'onclick="jConfirm(\'You must be registered to thank a post. Click the Register button below to register!\', \'Please Register\');return;" ';
						$thank_text = '<div style="clear:both;"></div>
								<div class="buttons">
								<a href="'.$thank_link.'" '.$thank_extra.'class="positive"><img src="'.plugins_url('images/thumb-up.png', __FILE__).'" alt="" />Thanks for the Post</a>
								</div>';
				}
				
				$content = $content.$thank_text.author_info_box($authordata);
				*/
				$content = $content.author_info_box($authordata);
		}
		return $content;
}

function author_info_starcalc($np = 0, $comments = 0 /*, $thanks = 0, $forum_posts = 0*/){
		//+$thanks+$forum_posts;
		$total_to_calc = $comments;
		$star_calc = (round($total_to_calc, -1)/10)+$np;
		if($star_calc >= 0 && $star_calc < 3){
				$author_title = "Newbie Orkutter";
				$star_rating = "0";
		}elseif($star_calc >= 3 && $star_calc < 10){
				$author_title = "Upcoming Orkutter";
				$star_rating = "1";
		}elseif($star_calc >= 10 && $star_calc < 25){
				$author_title = "Seasoned Orkutter";
				$star_rating = "2";
		}elseif($star_calc >= 25 && $star_calc < 80){
				$author_title = "Master Orkutter";
				$star_rating = "3";
		}elseif($star_calc >= 80 && $star_calc < 200){
				$author_title = "Hardcore Orkutter";
				$star_rating = "4";
		}elseif($star_calc >= 200){
				$author_title = "Orkut Guru";
				$star_rating = "5";
		}
		$star_title = author_info_engnum($star_calc, "Point");
		$text = ' <a href="http://www.orkutplus.net/authors/ratings/"><img src="'.plugins_url('images/'.$star_rating.'star.png', __FILE__).'" class="starimg" title="'.$author_title.' - '.$star_title.'" /></a>';
		$return_array = array($text, $author_title, $star_calc);
		return $return_array;
}

function author_info_engnum($num = 0, $next = ''){
		if($num == 1){
				$text = "1 ".$next;
		}else{
				$text = number_format($num)." ".$next."s";
		}
		return $text;
}

function sort_rev_c($old_array = array())
{
		$new_array = array();
		$numkeys = count($old_array)-1;
		$k = 0;
		for($numkeys;$numkeys>=0;$numkeys--){
				$new_array[$k] = $old_array[$numkeys];
				$k++;
		}
		return $new_array;
}

function author_info_list_authors() {
		global $wpdb;
		$return_text = '';
		//arrays
		$blogs_count = array();
		$posts_count = array();
		$comments_count = array();
		$thanks_count = array();
		$authors_inf = array();
		$stars_inf = array();
		$final_array = array();
		//queries
		$authors = $wpdb->get_results("SELECT ID from $wpdb->users");
		foreach ((array) $wpdb->get_results("SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE post_type = 'post' AND " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author") as $row) {
			$blogs_count[$row->post_author] = $row->count;
		}
		/*foreach ((array) $wpdb->get_results("SELECT DISTINCT poster_id, COUNT(post_id) AS count FROM `bb_posts` WHERE `post_status`=0 GROUP BY poster_id") as $row) {
			$posts_count[$row->poster_id] = $row->count;
		}*/
		foreach ((array) $wpdb->get_results("SELECT DISTINCT comment_author_email, COUNT(comment_ID) AS count FROM $wpdb->comments WHERE `comment_approved`=1 GROUP BY comment_author_email") as $row) {
			$comments_count[$row->comment_author_email] = $row->count;
		}/*
		foreach ((array) $wpdb->get_results("SELECT DISTINCT to_user_id, COUNT(id) AS count FROM `".$wpdb->prefix."aib_thanks` WHERE `blog_forum`=1 GROUP BY to_user_id") as $row) {
			$thanks_count[$row->to_user_id] = $row->count;
		}*/
		foreach ( (array) $authors as $author ) {
				$np = intval($blogs_count[$author->ID]);
				if($np){
						$author = get_userdata($author->ID);
						$comments = intval($comments_count[$author->user_email]);
						//$thanks = intval($thanks_count[$author->ID]);
						//$forum_posts = intval($forum_posts[$author->ID]);
						$star_array = author_info_starcalc($np, $comments/*, $thanks, $forum_posts*/);
						$authors_inf[] = author_info_box($author, array('np' => $np, 'comments' => $comments, 'thanks' => $thanks, 'forum_posts' => $forum_posts, 'star_array' => $star_array));
						$stars_inf[] = $star_array[2];
				}
		}
		array_multisort($stars_inf, $authors_inf);
		$authors_inf = sort_rev_c($authors_inf);
		$page = $_GET['page'];
		if(!$page){
				$page = 1;
		}
		$start = $page - 1;
		$end = $page;
		$start *= 10;
		$end *= 10;
		$end--;
		$total = ceil(count($authors_inf)/10);
		for($start;$start<=$end;$start++){
				$return_text .= $authors_inf[$start];
		}
		if($total > 1){
				$return_text .= '<div class="navigation"><center><div class="wp-pagenavi"><span class="pages">Page '.$page.' of '.$total.'</span> ';
				for($pf=1;$pf<=$total;$pf++){
						if($pf == $page){
								$return_text .= '<span class="current">'.$pf.'</span> ';
						}else{
								if(($pf >= $page-2) && ($pf <= $page+2)){
										$return_text .= '<a href="http://www.sportskeeda.com/authors/?page='.$pf.'" title="Page Number '.$pf.' for Authors">'.$pf.'</a> ';
								}
						}
				}
				$return_text .= "</div></center></div><br />";
		}
		return $return_text;
}

function author_info_head() {
		//styles and scripts
		if(is_single() || is_author() || is_page()){
				/*
				if(!is_user_logged_in()){
						wp_enqueue_script('author-info-js', plugins_url( 'js/jquery.alerts.js', __FILE__ ), array('jquery'));
						wp_print_scripts('author-info-js', plugins_url( 'js/jquery.alerts.js', __FILE__ ), array('jquery'));
				}
				*/
				wp_enqueue_style('author-info-style', plugins_url( 'css/style.css', __FILE__ ), false, null, 'all');
				wp_print_styles('author-info-style');
		}
		
		//check for thanks
		/*
		global $post;
		if($_GET['thank'] == "1" && is_single() && is_user_logged_in() && $post){
				global $wpdb;
				global $current_user;
				//$datetime = strtotime("now");
				$from = $current_user->ID;
				$to = $post->post_author;
				$pid = $post->ID;
				$chk = $wpdb->get_var('SELECT count(id) FROM `'.$wpdb->prefix.'aib_thanks` where `from_user_id`='.$from.' and `to_user_id`='.$to.' and `for_post_id`='.$pid.' and `blog_forum`=1');
				if((wp_verify_nonce($_GET['_wpnonce'], 'thanked_by_'.$from.'_on_'.$pid)) && !($chk) && ($from != $to)){
						$wpdb->query("INSERT INTO `".$wpdb->prefix."aib_thanks` (from_user_id, to_user_id, for_post_id, on_time, blog_forum) VALUES ('$from', '$to', '$pid', NOW(), 1)");
				}
		}*/
}

function author_info_table_chk(){
		global $wpdb;
		$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."aib_thanks` (`id` int(11) NOT NULL auto_increment, `from_user_id` int(11) NOT NULL, `to_user_id` int(11) NOT NULL, `for_post_id` int(11) NOT NULL, `on_time` datetime NOT NULL, `blog_forum` tinyint(1) NOT NULL default '1', PRIMARY KEY (`id`))");
}

add_filter('the_content', 'author_info_insert_in_post', -997);
add_action('wp_head', 'author_info_head', -997);
add_shortcode('author_info_list_authors', 'author_info_list_authors');
//register_activation_hook( __FILE__, 'author_info_table_chk' );
?>