<?php get_header(); ?>	
<?php if (get_option('artsee_format') == 'Blog Style') { ?>
<?php include(TEMPLATEPATH . '/includes/blogstyleindex.php'); ?>
<?php } else { include(TEMPLATEPATH . '/includes/defaultindex.php'); } ?>