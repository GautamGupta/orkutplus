<div id="container">
	
<div id="left-div">
		
<div id="left-inside">

<span class="current-category">
<?php single_cat_title('&nbsp;Currently Browsing: ', 'display'); ?>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu link post foot 468x15, created 5/26/09 */
google_ad_slot = "2511471179";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
</span>

<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu archive big 336x280, created 6/27/09 */
google_ad_slot = "5285148649";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>

 <?php if (have_posts()) : while (have_posts()) : the_post(); 
  if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
<!--Checks for thumbnails-->
		<?php 
		// check for thumbnail
$thumb = get_post_meta($post->ID, 'Thumbnail', $single = true);
// check for thumbnail class
$thumb_class = get_post_meta($post->ID, 'Thumbnail Class', $single = true);
// check for thumbnail alt text
$thumb_alt = get_post_meta($post->ID, 'Thumbnail Alt', $single = true);
				 ?>
<!--Checks for thumbnails-->

<div class="home-post-wrap2">

<div style="clear: both;"></div>

<!--Begin Post-->


<div class="single-entry">
<div class="post-info">Written by <a href="<?php bloginfo('url'); ?>/author/<?php the_author() ?>"><?php the_author() ?></a> on  <?php the_time('m jS, Y') ?> |  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
<div style="clear: both;"></div>
<h2 class="titles2"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title2('', '', true, '400') ?></a></h2>
<div style="clear: both;"></div>
<!--Display thumbnail if found-->
<?php // if there's a thumbnail
if($thumb !== '') { ?>
<div class="thumbnail-div-3">
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=60&amp;w=60&amp;zc=1" alt="<?php if($thumb_alt !== '') { echo $thumb_alt; } else { echo the_title(); } ?>"  style="border: none;" /></a>
</div>
<?php } // end if statement
// if there's not a thumbnail
else { echo ''; } ?>
<?php the_content_limit(300, ""); ?>
<div class="readmore"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More</a></div>
</div>
</div>
<!--End Post-->

<!--Display Comments-->
<?php comments_template(); ?>
<!--End Comments-->

<?php endwhile; ?>

<div style="clear: both;"></div>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
else { ?>
<p class="pagination"><?php next_posts_link('&laquo; Previous Entries') ?> <?php previous_posts_link('Next Entries &raquo;') ?></p>
<?php } ?>

<?php else : ?>

<h2 >No Results Found</h2>

<p>Sorry, your search returned zero results. </p>

<?php endif; ?>
	
</div>
		
</div>

<?php get_sidebar(); ?>    
<?php get_footer(); ?>   

</body>
</html>