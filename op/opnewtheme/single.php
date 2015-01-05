<?php get_header(); ?>	

<?php 
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>

<div id="container">
<div id="left-div">
<div id="left-inside">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<!--Begin Post-->
<div class="post-wrapper">
<?php if (get_option('artsee_thumbnails') == 'Hide') { ?>
<?php { echo ''; } ?>
<?php } else { include(TEMPLATEPATH . '/includes/thumbnail.php'); } ?>

<h2 class="titles"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="post-info" style="width: 480px !important;">&nbsp;Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?>.&nbsp;&nbsp;<a href="#respond" title="<?php _e("Leave a comment"); ?>" class="comment"><?php comments_number('No Comments','One <Comment','% Comments'); ?></a>&nbsp;&nbsp;<a href="<?php echo preg_replace("/".str_replace('/', '\\/', get_settings('home'))."/", get_settings('home') . "/pt", get_permalink($post->ID)); ?>" class="brazil">&nbsp;Português</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(function_exists('wp_email')) { email_link(); } ?>&nbsp;&nbsp;<a href="#" onclick="savePageAsPDF();" class="pdf" title="Download Page as PDF"></a>&nbsp;&nbsp;<?php if(function_exists('wp_print')) { print_link(); } ?><?php edit_post_link('&nbsp;&nbsp;Edit'); ?><br />Advertisement</div>

<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu post top 336x280, created 5/26/09 */
google_ad_slot = "9944513892";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>

<div style="clear: both;"></div>
<div id="translation"></div>
<div class="single-entry" id="article">

<?php the_content('Read the rest of this entry &raquo;'); ?>

</div>
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
<div style="clear:both;"></div>
<div id="authorad">
<div align="center">
<a href="#">this ad is sponsored by the author</a> (<a href="#">learn more</a>)
<?php if (function_exists('kd_get_ad_ready')) { echo kd_get_ad_ready($post->post_author); } ?>
</div><p></p>
</div>
<p><?php if(function_exists('selfserv_sexy')) { selfserv_sexy(); } ?></p>
<p>
<!-- Google Custom Search Element -->
<div id="cse" style="width:100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1');
  google.setOnLoadCallback(function(){
    var cse = new google.search.CustomSearchControl();
    cse.enableAds('pub-1123855832779971');
    cse.draw('cse');
  }, true);
</script>
</p>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
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
<!--Begin Sidebar Tabbed Menu-->
<div id="sidebar2">
<ul class="idTabs">
<li><a href="#related">Related Posts</a></li>
<li><a href="#recent">Recent Posts</a></li>
<li><a href="#recentcomments2">Recent Comments</a></li>
<li><a href="#featured">Featured Posts</a></li>
</ul>
<div id="related" class="sidebar-box4">
<?php similar_posts(); ?>
</div>
<div id="recent" class="sidebar-box4">
<ul >
<?php get_archives('postbypost', "$artsee_tab_entries;"); ?>
</ul>
</div>
<div id="recentcomments2" class="sidebar-box4">
<?php recent_comments(); ?>
</div>
<div id="mostcomments" class="sidebar-box4">
<?php echo $artsee_about; ?>
</div>
<div id="featured" class="sidebar-box4">
<?php $my_query = new WP_Query("category_name=Featured Articles&showposts=$artsee_featured;");
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php 
// check for thumbnail
$thumb = get_post_meta($post->ID, 'Thumbnail', $single = true);
// check for thumbnail class
$thumb_class = get_post_meta($post->ID, 'Thumbnail Class', $single = true);
// check for thumbnail alt text
$thumb_alt = get_post_meta($post->ID, 'Thumbnail Alt', $single = true);
?>
<div class="random">
<div class="random-image">
<?php // if there's a thumbnail
if($thumb !== '') { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=80&amp;w=80&amp;zc=1" alt="<?php if($thumb_alt !== '') { echo $thumb_alt; } else { echo the_title(); } ?>"  style="border: none;" /></a>
<?php } // end if statement
// if there's not a thumbnail
else { echo ''; } ?>
</div>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title2('', '...', true, '50') ?></a>
<?php if (function_exists('the_content_limit')) { the_content_limit(80, ""); } else { echo 'You have not uploaded and acivated the limit posts plugin. This is required.'; } ?>
</div>
<?php endwhile; ?>
</div>
</div>
<p><b>Tags</b> - <?php the_category(', ') ?></p>
<!--End Sidebar Tabbed Menu-->

<div style="clear: both;"></div>

</div>

<div class="post-wrapper" style="margin-top: 10px;">
<?php comments_template(); ?>
</div>
<?php endwhile; ?>

<p class="pagination"><?php next_posts_link('&laquo; Previous Entries') ?> <?php previous_posts_link('Next Entries &raquo;') ?></p>

<?php else : ?>

<h2 align="center">Not Found</h2>

<p align="center">Sorry, but the page you requested could not be found.</p>
<div class="post-info">Advertisement</div><br />
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu post top 336x280, created 5/26/09 */
google_ad_slot = "9944513892";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
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

<?php endif; ?>			
	
</div>
		
</div>

<!--Begin Sidebar-->
<?php get_sidebar(); ?> 
<!--End Sidebar-->

<!--Begin Footer-->
<?php get_footer(); ?>
<!--End Footer-->
</div>
</body>
</html>