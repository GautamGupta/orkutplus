<?php
/*
Template Name: Links
*/
?>

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
			<h2 class="title"><?php the_title(); ?></h2>
		</div></div></div></div></div></div> <?php /* post_title */ ?>
	<div class="br">
	<div class="bl">
	<div class="content">
	<ul class="links">
	<?php get_links_list(); ?>
	</ul>
	<div style="clear:both"/>&nbsp;</div>
	</div></div></div></div></div></div></div> <?php /* postbox */ ?>
<?php get_footer(); ?>
