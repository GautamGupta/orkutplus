<?php $pg_title = "OrkutPlus Toolkit for Fakes (Series) - Best Orkut Tools for Orkut Freaks!"; ?>
<?php require_once("../../includes/connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php //$load_contentslider = true; ?>
<?php include("../../includes/header.php"); ?>
<?php include("../../includes/leftbar.php"); ?>
<div class="post_title">
<h2 class="title"><a href="<?php echo current_url(); ?>"><?php echo $pg_title; ?></a></h2>
<?php /*<small class="title"><?php echo g_translate(urlencode(current_url())); ?></small>*/ ?>
</div>
<div class="content">
<?php include("../../includes/ads/contentarea.php"); ?>
<?php /*
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
</center>*/ ?>
<h2><div class="loltitleclassic"><b>Series Tools</b></div></h2>
<ul>
    <li><a href="alive-fakes-checker.php">Alive Fakes Checker</a></li>
    <li><a href="auto-display-pic-uploader.php">Automatic Display Picture Uploader</a></li>
    <li><a href="friend-acceptor.php">Friend Acceptor</a></li>
    <li><a href="friend-adder.php">Friend Adder</a></li>
    <li><a href="multi-community-joiner.php">Multiple Community Joiner</a></li>
    <li><a href="multi-community-unjoiner.php">Multiple Community Unjoiner</a></li>
    <li><a href="photo-comment-flooder.php">Photo Comment Flooder</a></li>
    <li><a href="poll-voter.php">Poll Voter</a></li>
    <li><a href="profile-editor.php">Profile Editor</a></li>
    <li><a href="scrapbook-flooder.php">Scrapbook Flooder</a></li>
    <li><a href="topic-voter.php">Topic Voter</a></li>
</ul>
<?php include("../../includes/footer.php"); ?>