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
		<h2 id="post-sbabedit" class="title"><a href="http://orkutplus.net/toolkit/autobot/scrapbook-autobot-edit.php" rel="bookmark">[PHP]&nbsp;Scrapbook AutoBot Edit Information</a></h2>

   </div>
<div class="content">
	<div style="padding-left:15px; padding-top:15px">
<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
        mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
        mysql_selectdb("<REDACTED>");
        $query = mysql_query("SELECT * from users WHERE user='".$_POST['user']."'");
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
                $uid=$row['uid'];
        }
        if($check == $_POST['user'] && $check2==$_POST['pass'])
        {
                $d = "";
                        if($_POST['del'] == "on"){
                                $d = "1";
                        }else{
                                $d = "0";
                        }
                        if($_POST['creply'] == "on")
                        {
                                mysql_query("INSERT INTO `<REDACTED>`.`users` (`sno`, `user`, `pass`, `uid`, `del`, `reply`) VALUES (NULL, '{$_POST['user']}', '{$_POST['pass']}', '{$uid[1]}', '{$d}', '{$_POST['reply']}')");
                        }else{
                                mysql_query("INSERT INTO `<REDACTED>`.`users` (`sno`, `user`, `pass`, `uid`, `del`) VALUES (NULL, '{$_POST['user']}', '{$_POST['pass']}', '{$uid[1]}', '{$d}')");
                        }
                echo 'Profile has been updated.<br><br>Embed this code in your scrapbook:<br><textarea rows="4" name="embedcode" cols="40"><img src="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-embed.jpg?uid='.$uid.'"></textarea><br><br>And to view your scraps, you can login here:<br><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-view-scraps.php">http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-view-scraps.php</a>';
        }else{
                echo "Wrong ID or Password.<br><br>";
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
	<form method="POST">	<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
				<input type="text" name="user" size="34" value="example@domain.com"></p>
				<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail ID's Password</b></div><br>
				<input type="password" name="pass" size="34" value = "Password"></p>
				<p align="left"><input type="checkbox" name="creply" checked=true>Enter Reply Message<p align="left">
				<div class="loltitleclassic"><b>Your Reply Message</b></div><br>
				Hi, (Name). I am currently using OrkutPlus! Scrap Autoreply Bot. <br><br><input type="text" name="reply" size="50" value = "Enter your message here"></p>
        <p align="left"><input type="checkbox" name="del" checked=true> Delete Scraps (Recommended - <a href="http://www.orkutplus.net/2008/09/autoscrap-reply-bot-set-and-send-auto-replies-to-your-scraps.html">Why?</a>)</p>
                                <p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Submit" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">Back to the Control Panel</a></p>
        	<p align="left">&nbsp;</p>
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

        <?php
}
?>
		<?php if ($adcount == 1) : ?>

<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>


		</div>
		<?php $adcount++; ?>

		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>
