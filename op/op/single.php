<?php get_header(); ?>

<div id="page_container">
<?php get_sidebar(); ?>
<?php include (TEMPLATEPATH . '/leftbar.php'); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
	<div class="rbcontent">
<div id="postcol" class="fixheight">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!--
	<div class="navigation">
		<div class="alignleft"><?php previous_post('&laquo; %','','yes') ?></div>
		<div class="alignright"><?php next_post(' % &raquo;','','yes') ?></div>
	</div> <?php /* navigation */ ?>

-->	<div style="clear: both"></div>
	<div class="post_title">
		<h2 id="post-<?php the_ID(); ?>" class="title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<small class="title">Written by <?php the_author() ?> on <?php the_time('F jS, Y') ?> | <?php comments_number('No Comment', 'One Comment', '% Comments' );?> | <a href="http://google.com/translate?u=<?php echo get_permalink() ?>&hl=en&ie=UTF8&sl=en&tl=pt">Português</a> <?php edit_post_link('Edit'); ?></small>
   </div> <?php /* post_title */ ?>
<p><small class="title">Advertisements</small></p><div class="content"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 336x280, created 7/26/08 */
google_ad_slot = "0363239782";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	
		<?php the_content('<p class="serif"><b>Continue reading &raquo;</b></p>'); ?>
		<?php /* postbox */ ?><div class="content"><?php if (function_exists('sharethis_button')) { sharethis_button(); } ?></div><center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 160x90, created 3/15/08 */
google_ad_slot = "9619859998";
google_ad_width = 160;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center></div><div class="content"><div class="loltitleclassic"><b>Related Posts »</b></div> </br><?php similar_posts(); ?>&nbsp;&nbsp;&nbsp;<div class="loltitleclassic"><b>Recent Comments »</b></div> </br><?php recent_comments(); ?>&nbsp;&nbsp;&nbsp;<div class="loltitleclassic"><b>Recent Posts »</b></div> </br><?php recent_posts(); ?><br/>&nbsp;&nbsp;&nbsp;<div class="loltitleclassic"><b>Also Read »</b></div> </br><?php random_posts(); ?></div>
	<?php comments_template(); ?>
	<div style="clear: both"></div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div> <?php /* #postcol end */ ?>
</div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php get_footer(); ?>

