<?php require_once("../../includes/connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php
$cat = "Flash";
$title = "";
$dir = "";
?>
<?php include("../../includes/header.php"); ?>
<div id="page_container">
<?php include("../../includes/leftbar.php"); ?>
<div class="fixcontain2">
<?php include("../../includes/dynamic1.php"); ?>
<div class="rbroundbox">
<div class="rbtop"><div></div></div>
<div class="rbcontent">
<?php include("../../includes/dynamic2.php"); ?>
<div id="postcol" class="fixheight">
<?php include("../../includes/dynamic3.php"); ?>
<div class="post_title">
<?php include("../../includes/dynamic4.php"); ?>
<h2 class="title"><a href="/"><?php echo $title; ?></a></h2>
<small class="title">Description: Testing</small>
</div>
<?php include("../../includes/dynamic5.php"); ?>
<div class="content">
<div align="center"><script type="text/javascript" src="http://scraps.orkutplus.net/flash/<?php echo $dir; ?>/flashobject.js"></script>
<div id="flashcontent" style="width: 400px; height: 550px"></div>
<script type="text/javascript">
var fo = new FlashObject("http://scraps.orkutplus.net/flash/<?php echo $dir; ?>/<?php echo $dir; ?>gen.swf?lndomain=http://www.scraps.orkutplus.net/&lnpath=http://www.scraps.orkutplus.net/flash/<?php echo $dir; ?>/&heart1=Orkut&heart2=Plus&linktext=Cute Orkut, Myspace Generators", "<?php echo $title; ?>", "400", "550", "8", "#f6f6f6");
fo.addParam("allowScriptAccess", "sameDomain");
fo.addParam("quality", "high");
fo.addParam("scale", "noscale");
fo.addParam("loop", "false");
fo.write("flashcontent");
</script>
</div>
<?php include("../../includes/listflashitems.php"); ?>
<?php include("../../includes/dynamic6.php"); ?>
</div></div><!--content n postcol-->
</div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../../includes/dynamic7.php"); ?>
<?php include("../../includes/footer.php"); ?>
<?php include("../../includes/dynamic8.php"); ?>
</div><!-- /fixcontain2 -->
<?php include("../../includes/dynamic9.php"); ?>
</div><!-- close page container-->
<?php include("../../includes/dynamic10.php"); ?>