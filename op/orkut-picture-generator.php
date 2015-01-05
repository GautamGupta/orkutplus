	<style type="text/css" media="screen">
	<!--
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style-core.css);
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style.css);
		-->
	</style>

<?php
error_reporting(0);
include("../blog/wp-config.php");
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

<?php include("../blog/wp-content/themes/op/header.php"); ?>

<div id="page_container">

<?php include("../blog/wp-content/themes/op/sidebar.php"); ?>
<?php include("../blog/wp-content/themes/op/leftbar.php"); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
			<div class="rbcontent">

<div id="postcol" class="fixheight">
 <?php $adcount = 1; ?>
<div class="post_title">
		<h2 id="post-orkutpic" class="title"><a href="http://orkutplus.net/toolkit/orkut-picture-generator.php" rel="bookmark">Orkut Picture Generator</a></h2>
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
	<div style="padding-left:40px; padding-top:15px"><?php
if(isset($_POST['word']) && isset($_POST['thisType'])){
    $word=$_POST['word'];
    $im="http://images3.orkut.com/img/alph/";
    $ex=$_POST['thisType'].".gif";
    $word=strtoupper($word);
    $ln=strlen($word);
    $ln--;
    for($z=0;$z<=$ln;$z++){
        $s=$word[$z];
        $imn=$im.$s.$ex;
        echo '<img src="'.$imn.'">';
    }
?>
<form method="post"><p>
Word to Generate:&nbsp;&nbsp;<input type="text" name="word" size=35 value="<?php echo $_POST['word']; ?>" /></p>
<p>Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="thisType" size="3">
    <option value="c" selected=true>People</option>
    <option value="a">Honor</option>
    <option value="b">Nature</option>
</select></p><p>
<input type="submit" value="Generate!" />&nbsp;&nbsp;<input type="reset" value="Reset" /></p>
</p>
</form><br><br>
<p>&nbsp;</p><br><br>
<?php
}else{?>
<form method="post"><p>
Word to Generate:&nbsp;&nbsp;<input type="text" name="word" size=35 value="OrkutPlus" /></p>
<p>Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="thisType" size="3">
    <option value="c" selected=true>People</option>
    <option value="a">Honor</option>
    <option value="b">Nature</option>
</select></p><p>
<input type="submit" value="Generate!" />&nbsp;&nbsp;<input type="reset" value="Reset" /></p>
</p><p>&nbsp;</p><br><br>
</form>
<?php
}
?>
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
		<?php the_content('<b>Continue reading &raquo;</b>'); ?>
		<hr color="#e6e6e6" size="1">
		</div> 
		<?php $adcount++; ?>
		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../blog/wp-content/themes/op/footer.php"); ?>