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
		<h2 id="post-sbabdlete" class="title"><a href="http://orkutplus.net/toolkit/autobot/scrapbook-autobot-delete.php" rel="bookmark">[PHP]&nbsp;Scrapbook AutoBot Delete Service</a></h2>

   </div>
<div class="content">
	<div style="padding-left:40px; padding-top:15px">
<?php
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['term'])){
        if($_POST['term'] != "i want to delete this service"){
                "You didn't enter the correct phrase to delete your ID. Please go back and try again.";
        }else{
                mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
                mysql_selectdb("<REDACTED>");
                $query = mysql_query("SELECT * from users WHERE user='".$_POST['user']."'");
                while($row=mysql_fetch_array($query))
                {
                	$check=$row['user'];
                        $check2=$row['pass'];
                }
                if($check == $_POST['user'] && $check2 == $_POST['pass']){
                        mysql_query("DELETE FROM `users` WHERE `users`.`user` = '{$_POST['user']}';");
                        mysql_query("DELETE FROM `scraps` WHERE `scraps`.`user` = '{$_POST['user']}';");
                        echo '<b>This Service for your account has been deactivated.<b> If you ever wish to re-activate this service, you will be required to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">sign up again</a>. Please leave your <a href="http://www.orkutplus.net/2008/09/autoscrap-reply-bot-set-and-send-auto-replies-to-your-scraps.html">feedback or suggestions</a>. Thanks for using this service and keep visiting Orkut Plus!';
                }else{
                        echo "Wrong ID or Password. Please go back and try again.";
                }
        }
}else{ ?>
	<form method="POST">	<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
				<input type="text" name="user" size="34" value="example@domain.com"></p>
				<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail-ID's Password</b></div><br>
				<input type="password" name="pass" size="34" value = "Password"></p>
<p align="left"><div class="loltitleclassic"><b>Delete Service</b></div>
				<p align="left">Please Enter "<b>i want to delete this service</b>" without quotes to deactivate this service for your account.<br><br>
				<input type="text" name="term" size="40" value = "Enter the Phrase Here"></font></p>
                                <p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Delete" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">Back to the Control Panel</a></p>
        	<p align="left">&nbsp;</p>
        <?php
}
?>
		<?php if ($adcount == 1) : ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 300x250, created 8/14/08 */

google_ad_slot = "0840373584";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>

		</div>
		<?php $adcount++; ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 300x250, created 8/11/08 */
google_ad_slot = "4797036587";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>

		<!-- /rbcontent --></div>
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>
