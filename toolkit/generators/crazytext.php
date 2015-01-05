<style type="text/css" media="screen">
<!--
@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style-core.css);
@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style.css);
-->
</style>
<?php
error_reporting(0);
include("../../blog/wp-config.php");
$oldBlogURL = "orkutplus.blogspot.com";
$ref = $_SERVER['HTTP_REFERER'];
$refarr = explode("/", $ref);

	if ($refarr[2] == $oldBlogURL ){
		$bloggerurl = '\/'.$refarr[3].'\/'.$refarr[4].'\/'.$refarr[5];
		$sqlstr = "
			    SELECT wposts.guid 
			    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			    WHERE wposts.ID = wpostmeta.post_id 
			    AND wpostmeta.meta_key = 'blogger_permalink' 
			    AND wpostmeta.meta_value = '".$bloggerurl."'
			 ";             
		$wpurl = $wpdb->get_results($sqlstr, ARRAY_N);
		if ($wpurl){
			header( 'Location: '.$wpurl[0][0].' ') ;
                        exit;
		}
	}
?>

<?php include("../../blog/wp-content/themes/op/header.php"); ?>

<div id="page_container">

<?php include("../../blog/wp-content/themes/op/sidebar.php"); ?>
<?php include("../../blog/wp-content/themes/op/leftbar.php"); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
			<div class="rbcontent">

<div id="postcol" class="fixheight">
 <?php $adcount = 1; ?>
<div class="post_title">
		<h2 id="post-htmlgen" class="title"><a href="http://orkutplus.net/toolkit/generators/crazytext.php" rel="bookmark">[PHP]&nbsp;CrazyText Generator</a></h2>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 300x250, created 9/1/08 */
google_ad_slot = "7817929940";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>	
   </div> 
<div class="content">
	<div style="padding-left:40px; padding-top:15px">
<?php
if(!$_POST['text'])
{
    $text = strtolower('OrkutPlus');
}
else
{
    $text = htmlspecialchars(strtolower($_POST['text']));
}
require_once('crazytextchars.inc.php');
?>
<form method="POST">
<p align="center"><input type="text" size="40" name="text" value="<?php echo $text; ?>">&nbsp;
<input type="submit" name="submit" id="submit" value="Generate!"></p>
</form>
<hr>
<p align="center">
<input type="text" size="55" value="<?php echo $row1; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row2; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row3; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row4; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row5; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row6; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row7; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row8; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row9; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row10; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row11; ?>" readonly />
<br /><br />
<input type="text" size="55" value="<?php echo $row12; ?>" readonly /><br />
</p>
<?php if ($adcount == 1) : ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>
&nbsp;&nbsp;&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<?php endif; $adcount++; ?>
<?php $adcount++; ?>
<div style="clear: both"></div></div></div>
</div></div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
</div> <!-- close page container-->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>