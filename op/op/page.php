<?php get_header(); ?>

<div id="page_container">

<?php get_sidebar(); ?>
<?php include (TEMPLATEPATH . '/leftbar.php'); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
	<div class="rbcontent">

<div id="postcol" class="fixheight">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		<h2 id="post-<?php the_ID(); ?>" class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<small class="title">Written by <?php the_author() ?> on <?php the_time('F jS, Y') ?> | <a href="http://google.com/translate?u=<?php echo get_permalink() ?>&hl=en&ie=UTF8&sl=en&tl=pt">Português</a> <?php edit_post_link('Edit'); ?></small>
		 <?php /* post_title */ ?>
	<div class="content">
		<script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
		<?php the_content('<b>Continue reading &raquo;</b>'); ?>
<script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
		</div> <?php /* postbox */ ?>
<?php endwhile; ?>
<div style="clear: both"></div>
<?php else : ?>
	<h2 class="center">Not Found</h2>
	<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
<?php endif; ?>
</div> <?php /* #postcol end */ ?>
</div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php get_footer(); ?>
