<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<div id="page_container">

<?php get_sidebar(); ?>
<?php include (TEMPLATEPATH . '/leftbar.php'); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
			<div class="rbcontent">
<div id="postcol" class="fixheight">
			<h2 class="title"><?php the_title(); ?></h2>
		</div> <?php /* post_title */ ?>
	<div class="content">
		<h2>Chronological Archives:</h2>

<?php
	global $month, $wpdb;
	$now = current_time('mysql');
	$arcresults = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts  FROM " . $wpdb->posts . " WHERE post_date <'" . $now . "' AND post_status='publish' AND post_password='' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC");
	
	if ($arcresults) {
		foreach ($arcresults as $arcresult) {
			$url = get_month_link($arcresult->year, $arcresult->month);
			$text = sprintf('%s %d', $month[zeroise($arcresult->month,2)], $arcresult->year);
			echo get_archives_link($url, $text, '','<strong>','</strong>');
			
			$thismonth = zeroise($arcresult->month,2);
			$thisyear = $arcresult->year;
			
			$arcresults2 = $wpdb->get_results("SELECT ID, post_date, post_title, comment_status FROM " . $wpdb-> posts . " WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_date <'" . $now . "' AND post_status='publish' AND post_password='' ORDER BY post_date DESC");
			
			if ($arcresults2) {
                echo "<ul class=\"postspermonth\">\n";
                foreach ($arcresults2 as $arcresult2) {
                       if ($arcresult2->post_date != '0000-00-00 00:00:00') {
                         $url       = get_permalink($arcresult2->ID);
                         $arc_title = $arcresult2->post_title;

                         if ($arc_title) $text = strip_tags($arc_title);
                        else $text = $arcresult2->ID;
                        $title_text = wp_specialchars($text, 1);

                          echo '<li>' . mysql2date('d', $arcresult2->post_date). ': ' . "<a href='$url' title='$title_text'>".wptexturize($text)."</a>";
			$comments_count = $wpdb->get_var("SELECT COUNT(comment_id) FROM " . $wpdb->comments . " WHERE comment_post_ID=" . $arcresult2->ID . " AND comment_approved='1'");
                        if ($comments_count == 1) echo ' <span class="comment-count">(' . $comments_count . ' comment)</span>';
                        if ($comments_count > 1) echo ' <span class="comment-count">(' . $comments_count . ' comments)</span>';
                        echo '</li>';
                     }
                }
                echo '</ul>';
            }
        }
    } ?>
	<h2>Archives by Subject:</h2>
	<ul class="category-archives"><?php wp_list_cats(); ?></ul>
	<h2>Pages:</h2>
	<ul class="page-archives"><?php wp_list_pages('title_li='); ?></ul>
	<div style="clear:both"/>&nbsp;</div>

	</div> <?php /* postbox */ ?>
</div> <?php /* #postcol end */ ?>
		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php get_footer(); ?>
