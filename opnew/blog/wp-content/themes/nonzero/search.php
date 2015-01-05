<?php 
get_header();
?>



<div id="main">
<div id="main_inner" class="fixed">
<div id="primaryContent_3columns">
<div id="columnA_3columns">



<div class="post">

<!---the loop--->


<?php if (have_posts()) :?>
<?php $postCount=0; ?>
<?php while (have_posts()) : the_post();?>
<?php $postCount++;?>
<div class="entry entry-<?php echo $postCount ;?>">

<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3> 


<p><?php the_excerpt('Read the rest of this entry &raquo;'); ?></p>
		
		
</div>

	
<?php endwhile; ?>
<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
</div>
		
<?php else : ?>

<h2>Not Found</h2>
<div class="entrybody">Sorry, but you are looking for something that isn't here.</div>
<?php endif; ?>

<!---end loop--->





</div>
</div>
</div>



<?php get_sidebar(); ?>


<?php get_footer(); ?>