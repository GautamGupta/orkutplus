<?php get_header(); ?>	

<div id="container">
	
<div id="left-div">
		
<div id="left-inside">
 
<div style="font-size: 20px;">Sorry, the page your requested could not be found, or no longer exists. </div>
<p align="center">
<img src="http://cdn.orkutplus.net/images/404!.png" />
</p>
<script type="text/javascript">
  var GOOG_FIXURL_LANG = 'en';
  var GOOG_FIXURL_SITE = 'http://www.orkutplus.net/';
</script>
<script type="text/javascript" src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>
<br /><br />
<div style="clear:both;"></div>
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
		
</div>

<?php get_sidebar(); ?>    
<?php get_footer(); ?>   

</body>
</html>