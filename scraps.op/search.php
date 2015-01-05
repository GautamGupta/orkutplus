<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/leftbar.php"); ?>
<div class="rbroundbox">
<div class="rbtop"><div></div></div>
<div class="rbcontent">
<div id="postcol" class="fixheight">
<div class="post_title">
<h2 class="title"><a href="#">Search</a></h2>
<div id="cse-search-results"></div>
<script type="text/javascript">
var googleSearchIframeName = "cse-search-results";
var googleSearchFormName = "cse-search-box";
var googleSearchFrameWidth = 740;
var googleSearchDomain = "www.google.com";
var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
</div></div><!--content n postcol-->
</div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("includes/footer.php"); ?>