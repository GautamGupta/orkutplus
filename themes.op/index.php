<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/leftbar.php"); ?>
<div class="rbroundbox">
<div class="rbtop"><div></div></div>
<div class="rbcontent">
<div id="postcol" class="fixheight">
<div class="content">
<h2><div class="loltitleclassic"><b>Featured</b></div></h2>
<center>
<div id="slider1" class="sliderwrapper">
<div class="contentdiv">
Content 1 Here.
</div>
<div class="contentdiv">
Content 2 Here.
</div>
<div class="contentdiv">
Content 3 Here.
</div>
<div class="contentdiv">
Content 4 Here.
</div>
<div class="contentdiv">
Content 5 Here.
</div>
</div>
<div id="paginate-slider1" class="pagination">
</div>
<script type="text/javascript">
featuredcontentslider.init({
	id: "slider1",
	contentsource: ["inline", ""],
	toc: "#increment",
	nextprev: ["Previous", "Next"],
	revealtype: "click",
	enablefade: [true, 0.2],
	autorotate: [true, 3000],
	onChange: function(previndex, curindex){
	}
})
</script>
</center>
<h2><div class="loltitleclassic"><b>Most Viewed</b></div></h2>
:-)
</div></div><!--content n postcol-->
</div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("includes/footer.php"); ?>