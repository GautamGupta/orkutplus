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
		<h2 id="post-sbabview" class="title"><a href="http://orkutplus.net/toolkit/autobot/scrapbook-autobot-view-scraps.php" rel="bookmark">[PHP]&nbsp;Scrapbook AutoBot View Scraps</a></h2>

   </div>
<div class="content">
	<div style="padding-left:15px; padding-top:15px">
<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
        mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
        mysql_selectdb("sb_autobot");
        $query = mysql_query("SELECT * from users WHERE user='".$_POST['user']."'");
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
        }
        if($check == $_POST['user'] && $check2==$_POST['pass']){
		$query2 = mysql_query("SELECT * from scraps WHERE user='".$_POST['user']."'");
                $s = "0";
		while($row=mysql_fetch_array($query2))
		{
                        $s++;
                        ?><form method="POST" action="scrapbook-autobot-scrap-delete.php">
                        <input type="hidden" name="sno" value="<?php echo $row['sno']; ?>">
                        <input type="hidden" name="user" value="<?php echo $row['user']; ?>">
                        <input type="hidden" name="pass" value="<?php echo $row['pass']; ?>">
		     	 <?php echo $row['scrap']; ?><p align="right"><input type="submit" value="Delete Scrap" name="B1"></p><br><br>
                         </form><?php
		}
                if($s<=0){
                        echo "No Scraps found. You have not received any new scraps.<br><br>";
                }
        }else{
		echo "ID doesn't exist";
        }
}else{ ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>

	<form method="POST">
				<p align="left">&nbsp;</p>
				<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
				<input type="text" name="user" size="34" value="example@domain.com"></p>
				<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail ID's Password</b></div><br>
				<input type="password" name="pass" size="34" value = "Password"></font></p>

                                <p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="View Scraps" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">Back to the Control Panel</a></p>
        	<p align="left">&nbsp;</p>
        <?php
}
?>
		<?php if ($adcount == 1) : ?>
<script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>


		</div>
		<?php $adcount++; ?>


		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>
