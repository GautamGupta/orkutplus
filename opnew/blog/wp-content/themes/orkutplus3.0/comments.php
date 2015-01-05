<?php
if (function_exists('wp_list_comments')) {
include(TEMPLATEPATH . '/includes/comments1.php');
} else { include(TEMPLATEPATH . '/includes/comments2.php'); }
?>

