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

<!--Start Post-->
<div class="post-wrapper">

<h2 class="titles"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="post-info" style="width: 480px !important;">&nbsp;Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?>.&nbsp;&nbsp;<a href="#respond" title="<?php _e("Leave a comment"); ?>" class="comment"><?php comments_number('No Comments','1 Comment','% Comments'); ?></a>&nbsp;&nbsp;<a href="<?php echo preg_replace("/".str_replace('/', '\\/', get_settings('home'))."/", get_settings('home') . "/pt", get_permalink($post->ID)); ?>" class="brazil">&nbsp;Português</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(function_exists('wp_email')) { email_link(); } ?>&nbsp;&nbsp;<a href="#" onclick="savePageAsPDF();" class="pdf" title="Download Page as PDF"></a>&nbsp;&nbsp;<?php if(function_exists('wp_print')) { print_link(); } ?><?php edit_post_link('&nbsp;&nbsp;Edit'); ?><br />Advertisement</div>

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
<div class="page-post">
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
<li><a href="#tools">Best Orkut Tools</a></li>
</ul>
<div id="related" class="sidebar-box4">
<?php similar_posts(); ?>
</div>
<div id="recent" class="sidebar-box4">
<ul >
<?php get_archives('postbypost', "$artsee_tab_entries;"); ?>
</ul>
</div>

<div id="tools" class="sidebar-box4">
<ul>
<li><a href="http://www.orkutplus.net/2008/12/scrap-all-orkut-friends-deluxe.html">Scrap All Friends in a Single Click - Best Scrap All on Orkut</a></li>
<li><a href="http://www.orkutplus.net/2008/09/autoscrap-reply-bot-set-and-send-auto-replies-to-your-scraps.html">AutoScrap Reply Bot - Vacation Responder for Orkut</a></li>
<li><a href="http://www.orkutplus.net/2008/09/orkut-themes-generator-create-your-own-themes-in-a-single-click.html">Orkut Theme Generator - Create Orkut Themes Fro Your Own Pics</a></li>
<li><a href="http://www.orkutplus.net/toolkit/comm-topics-backupmate.php">Orkut Community Backupmate - Create and Save a Backup of Your Orkut Community</a></li>
<li><a href="http://www.orkutplus.net/2008/10/community-backupmate-create-backup-of-your-community-topics.html">Orkut Community Manager - Choose and Unjoin Multiple Communities in a Single click</a></li>
<li><a href="http://www.orkutplus.net/2008/11/mass-scrap-deleter-leave-no-trace-empty-your-scrapbook-in-seconds.html">Mass Scrap Deleter - Clean Your Scrapbook in Seconds</a></li>
<li><a href="http://www.orkutplus.net/2008/12/scrapbook-flooder-the-flood-machine-by-orkut-plus.html">Scrapbook Flooder - Flood Your Scrapbook With Huge Number of Scraps</a></li>
<li><a href="http://www.orkutplus.net/2008/12/scrapbook-flooder-the-flood-machine-by-orkut-plus.html">Orkut Scrapbook Backupmate - Create and Save Backup of Your Scraps</a></li>
</ul></div>

<div id="recentcomments2" class="sidebar-box4">
<?php recent_comments(); ?>
</div>
<div id="mostcomments" class="sidebar-box4">
<?php echo $artsee_about; ?>
</div>

</div>
<!--End Sidebar Tabbed Menu-->
</div>


<div class="post-wrapper" style="margin-top: 10px;">
<?php comments_template(); ?>
</div>
<?php endwhile; ?>

<!--End Post-->

<p class="pagination"><?php next_posts_link('&laquo; Previous Entries') ?> <?php previous_posts_link('Next Entries &raquo;') ?></p>

<?php else : ?>

<h2 align="center">Not Found</h2>
<p align="center">Sorry, but the page you requested could not be found.</p>

<?php endif; ?>
			
</div>
		
</div>

<!--Begin Sidebar-->
<?php get_sidebar(); ?>
<!--End Sidebar-->

<!--Begin Footer-->
<?php get_footer(); ?>
<!--End Footer-->
	
</body>
</html>