<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
      ?>

<!--Begin Scroller Articles-->
<div id="slide">
<script type="text/javascript" >
	$(function() {
		$("#scrollable").scrollable({horizontal:true,size: 5});
	});
</script>
<div id="scrollable">

<a class="prev"></a>

<div class="items">

<div class="slide-items">

<center><a href="http://orkutplus.net/forum"><img src="http://<REDACTED>.com/files/forum.gif"></a></center>
<span class="slide-items-a"></span>
</div>
<div class="slide-items">
<center><a href="http://www.orkutplus.net/2009/02/orkut-blocked-unblock-orkut-and-other-blocked-websites-anytime-anywhere-guaranteed.html"><img src="http://<REDACTED>.com/files/unblock-orkut.gif"></a></center>
<span class="slide-items-a"></span>
</div>
<div class="slide-items">
<center><a href="http://www.orkutplus.net/2009/05/announcing-our-first-official-orkut-app-multiple-orkut-theme-generator.html"><img src="http://<REDACTED>.com/files/orkut-theme-maker.gif"></a></center>
<span class="slide-items-a"></span>
</div>
<div class="slide-items">
<center><a href="http://www.orkutplus.net/orkut-toolkit"><img src="http://<REDACTED>.com/files/cheat-tools.gif"></a></center>
<span class="slide-items-a"></span>
</div>
<div class="slide-items">
<center><a href="http://www.htmlorkut.com"><img src="http://<REDACTED>.com/files/htmlorkut.gif"></a></center>
<span class="slide-items-a"></span>
</div>


<div style="clear: both;"></div>
</div>
<a class="next"></a>
<div style="clear: both;"></div>
</div>
<!--End Scroller-->

</div>

<div id="container">

<div id="left-div">

<div id="left-inside">

<div class="home-post-wrap2">
<!--Begin Sidebar Tabbed Menu-->
<div id="sidebar2">
<ul class="idTabs">
<li><a href="#featured">Featured Articles</a></li>
<li><a href="#popular">Popular Articles</a></li>
<li><a href="#recent">Recent Articles</a></li>
<li><a href="#tools">Orkut Tools</a></li>
<li><a href="#apps">Orkut Apps</a></li>
</ul>
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
if($thumb !== '') {
?>
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
<div id="apps" class="sidebar-box4">
<?php $my_query = new WP_Query("category_name=Featured Apps&showposts=$artsee_featured;");
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
<div id="popular" class="sidebar-box4">
<ul><?php popularPosts('before=<li>&after=</li>&count=5');?></ul>
</div>
<div id="recent" class="sidebar-box4">
<?php recent_posts(); ?>
</div>

<div id="tools" class="sidebar-box4">
<ul>
<li><a href="http://www.orkutplus.net/toolkit/scrap-all.php">Scrap All Friends in a Single Click - Best Scrap All on Orkut</a></li>
<li><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">AutoScrap Reply Bot - Vacation Responder for Orkut</a></li>
<li><a href="http://www.orkutplus.net/toolkit/scripts/theme-generator.php">Orkut Theme Generator - Create Orkut Themes Fro Your Own Pics</a></li>
<li><a href="http://www.orkutplus.net/toolkit/comm-topics-backupmate.php">Orkut Community Backupmate - Create and Save a Backup of Your Orkut Community</a></li>
<li><a href="http://orkutplus.net/toolkit/community-unjoiner.php">Orkut Community Manager - Choose and Unjoin Multiple Communities in a Single click</a></li>
<li><a href="http://www.orkutplus.net/toolkit/scraps-deleter.php">Mass Scrap Deleter - Clean Your Scrapbook in Seconds</a></li>
<li><a href="http://www.orkutplus.net/toolkit/scrapbook-flooder.php">Scrapbook Flooder - Flood Your Scrapbook With Huge Number of Scraps</a></li>
<li><a href="http://www.orkutplus.net/toolkit/scraps-backupmate.php">Orkut Scrapbook Backupmate - Create and Save Backup of Your Scraps</a></li>
</ul></div>
</div>
<!--End Sidebar Tabbed Menu-->
<div style="clear: both;"></div>

</div>
<center><p><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu main link 468x15, created 5/27/09 */
google_ad_slot = "7476406895";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p></center>
<center><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
else { ?>
<p class="pagination"><?php next_posts_link('&laquo; Previous Entries') ?> <?php previous_posts_link('Next Entries &raquo;') ?></p>
<?php } ?></center>

<div style="clear: both;"></div>

<!--The following code controls the category boxes-->



<!--End category boxes-->

<div style="clear: both;"></div>



<!--Begin recent post (single)-->

<?php if (have_posts()) : while (have_posts()) : the_post();
  if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>

<?php static $ctr = 0;
if ($ctr == "$artsee_homepage_posts;") { break; }
else { ?>

<?php
// check for thumbnail
$thumb = get_post_meta($post->ID, 'Thumbnail', $single = true);
// check for thumbnail class
$thumb_class = get_post_meta($post->ID, 'Thumbnail Class', $single = true);
// check for thumbnail alt text
$thumb_alt = get_post_meta($post->ID, 'Thumbnail Alt', $single = true);
?>
<div class="home-post-wrap2">
<div class="post-info">Posted by <?php the_author_posts_link(); ?> on  <?php the_time('F jS, Y') ?> |  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
<div style="clear: both;"></div>
<h2 class="titles"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div style="clear: both;"></div>
<!--Display thumbnail if found-->
<?php // if there's a thumbnail
if($thumb !== '') { ?>
<div class="thumbnail-div-home">
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=130&amp;w=281&amp;zc=1&amp;q=100" alt="<?php if($thumb_alt !== '') { echo $thumb_alt; } else { echo the_title(); } ?>"  style="border: none;" /></a>
</div>
<?php } // end if statement
// if there's not a thumbnail
else { echo ''; } ?>
<!--End display thumbnail if found-->
<?php if (function_exists('the_content_limit')) { the_content_limit(400, ""); } else { the_content(""); } ?>
<a href="<?php the_permalink() ?>" class="readmore" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More</a>
</div>

<?php $ctr++; } ?>

<?php endwhile; ?>
<!--end recent post (single)-->
<div style="clear: both;"></div>
<center><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
else { ?>
<p class="pagination"><?php next_posts_link('&laquo; Previous Entries') ?> <?php previous_posts_link('Next Entries &raquo;') ?></p>
<?php } ?></center>

<?php else : ?>

<!--If no results are found-->
<div class="home-post-wrap2">
<h2 >No Results Found</h2>
<p>Sorry, your search returned zero results. </p>
</div>
<!--End if no results are found-->

<?php endif; ?>

</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

</body>
</html>

