<?php require('wp-load.php'); ?>
<?php $title = "Search Results for - ".$_GET['q']; ?>
<?php get_header(); ?>
<div id="container">
<div id="left-div">
<div id="left-inside">
<div class="post-wrapper" style="width:auto !important;">
<div class="single-entry">
<div id="cse-search-results"></div>
<script type="text/javascript">
var googleSearchIframeName = "cse-search-results";
var googleSearchFormName = "cse-search-box";
var googleSearchFrameWidth = 880;
var googleSearchDomain = "www.google.com";
var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
</div>
<div style="clear: both;"></div>
</div>
</div>
</div>
<div style="clear: both;"></div>
</div>
<!--Begin Footer-->
<?php get_footer(); ?>
<!--End Footer-->
</body>
</html>