<?php 
get_header();
?>



<div id="main">
<div id="main_inner" class="fixed">
<div id="primaryContent_3columns">
<div id="columnA_3columns">


<h3>Introduction/Sideblog</h3>
<p> Nonzero<sup>1.0</sup> is a free, lightweight, tableless,
fluid/fixed W3C-valid website design by <a
href="http://www.nodethirtythree.com/">NodeThirtyThree Design</a>. The
design was ported to WordPress by <a
href="http://www.headsetoptions.org/">Headsetoptions</a>.
You can use this area as a intro or a sideblog, edit this section from index.php from WP Admin. 
To use this as a Sideblog, replace this text with the code provided in the Installation Instructions. </p>
<br class="clear">

<div class="post">

<!---the loop--->

<?php
// Here is the call to only make two posts show up on the homepage REGARDLESS of your options in the control panel
query_posts('showposts=1');
?>

<?php if (have_posts()) :?>
<?php $postCount=0; ?>
<?php while (have_posts()) : the_post();?>
<?php $postCount++;?>
<div class="entry entry-<?php echo $postCount ;?>">

<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3> 

<ul class="post_info">
<li class="date">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?> filed in <?php the_category(', ') ?></li>
<li class="comments"><?php comments_popup_link('Comment now &#187;', '1 Comment &#187;', '% Comments &#187;', 'commentslink'); ?></li>
</ul>

<p><?php the_content('Read the rest of this entry &raquo;'); ?></p>
		
		
</div>

<div class="commentsblock">
<?php comments_template(); ?>
</div>
	
<?php endwhile; ?>
		
<?php else : ?>

<h2>Not Found</h2>
<div class="entrybody">Sorry, but you are looking for something that isn't here.</div>
<?php endif; ?>

<!---end loop--->


<!-------second layer---------->


<?php 
$posts = get_posts('numberposts=5&offset=1');
foreach($posts as $post) :
setup_postdata($post);
?>

<h3>
<a href="<?php the_permalink() ?>" title="Continue reading <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
</h3>

<p>
<?php the_content_rss('', TRUE, '', 50); ?>
</p>
<br/>


<?php endforeach; ?>



<!-------end second layer---------->




</div>
</div>
</div>



<?php get_sidebar(); ?>


<?php get_footer(); ?>