<?php get_header(); ?>

<div id="page_container">

<?php get_sidebar(); ?>
<?php include (TEMPLATEPATH . '/leftbar.php'); ?>

<div id="postcol" class="fixheight">
<div id="pc_t" class="fixheight">
<div id="pc_r" class="fixheight">
<div id="pc_b" class="fixheight">
<div id="pc_l" class="fixheight">
<div id="pctl" class="fixheight">
<div id="pctr" class="fixheight">
<div id="pcbr" class="fixheight">
<div id="pcbl" class="fixheight">
<div id="pc_c" class="fixheight">
<?php if (have_posts()) : ?>
<h2 class="pagetitle">Search Results</h2>
<div class="navigation">
	<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
	<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
</div> <?php /* navigation */ ?>
<?php while (have_posts()) : the_post(); ?>
	<div class="postbox">
	<div class="right">
	<div class="bottom">
	<div class="left">
	<div class="post_title">
		<div class="top">
		<div class="right">
		<div class="left">
		<div class="tl">
		<div class="tr">
		<h2 id="post-<?php the_ID(); ?>" class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<small class="title">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?></small>
	</div></div></div></div></div></div> <?php /* post_title */ ?>
	<div class="br">
	<div class="bl">
	<div class="content">	
		<?php the_excerpt() ?>
		<p class="postmetadata"> <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','',' <strong>|</strong> '); ?><?php comments_popup_link('No Comments', '1 Comment ', '% Comments'); ?></p> 
	</div></div></div></div></div></div></div> <?php /* postbox */ ?>
<?php endwhile; ?>
<div class="navigation">
	<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
	<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
</div> <?php /* navigation */ ?>
<div style="clear: both"></div>
<?php else : ?>
	<h2 class="center">Not Found</h2>
<?php endif; ?>
<?php get_footer(); ?>

