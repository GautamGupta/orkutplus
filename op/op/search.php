<?php 
define('WP_USE_THEMES', false);
require('wp-blog-header.php');
get_header();
?>

<div id="cse-search-results"  style="padding:10px; text-align:center;"></div>
<script type="text/javascript">
var googleSearchIframeName = "cse-search-results";
var googleSearchFormName = "cse-search-box";
var googleSearchFrameWidth = 1004;
var googleSearchDomain = "www.google.com";
var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>