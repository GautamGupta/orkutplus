<?php get_header(); ?>	
<?php if (get_option('artsee_format') == 'Blog Style') { ?>
<?php include(TEMPLATEPATH . '/includes/blogstylehome.php'); ?>
<?php } else { include(TEMPLATEPATH . '/includes/default.php'); } ?>