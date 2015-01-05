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
		<h2 id="post-sbabsignup" class="title"><a href="http://orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php" rel="bookmark">[PHP]&nbsp;Scrapbook AutoBot Signup </a></h2>
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
	<div style="padding-left:15px; padding-top:15px">
<?php
;
if(isset($_POST['user']) && isset($_POST['pass'])){
    require('class.XMLHttpRequest.php');
    $req = new XMLHttpRequest();
    $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['user']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false");
    $req->send(null);
    preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
    $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
    $req->send(null);
    preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
    if($orkut_state[0] != NULL)
    {
        $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
	$req->setRequestHeader("Cookie",$orkut_state[0]);
	$req->send(null);
	preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
        preg_match('/\<a\ \ accesskey\=\"p\"\ href\=\"\/Main\#Profile.aspx\?uid\=(.*?)\"\>Profile\<\/a\>/i', $req->responseText, $uid);
	if($lol[0][1] != NULL){
                mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
                mysql_selectdb("<REDACTED>");
                $query = mysql_query("SELECT * from users WHERE user='".$_POST['user']."'");
                while($row=mysql_fetch_array($query))
                {
                	$check=$row['user'];
                }
                if($check == NULL){
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
                        echo '<b>Thanks for registering with us.</b><br><br>Please embed this code in your scrapbook<br><textarea rows="4" name="embedcode" cols="40"><img src="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-embed.jpg?uid='.$uid[1].'"></textarea><br><br><div class="loltitleclassic"><b>Whats Next?</b></div><br>There are some important components of this auto-scrap reply autobot. All of them are listed below.<br><br><div class="loltitleclassic"><b>1 - Viewing Your Scraps</b></div><br> Once you add the embed the code in your scrapbook, your scraps are stored on your scraps control panel. You can manage your scraps by logging in to your <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-view-scraps.php">Scraps Control Panel</a><br><br><div class="loltitleclassic"><b>2 - Edit Account Settings</b></div><br> If you wish to edit your account details or the way you want this service to work, please log in with your account on <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-edit.php">Edit Settings Page</a>.<br><br><div class="loltitleclassic"><b>3 - Change Password</b></div><br> If you want to change your account password, please navigate to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-change-password.php">this page</a>. <br><br><div class="loltitleclassic"><b>4 - Delete Service</b></div><br> If you ever wish to deactivate this service, you can do the same my navigating to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-delete.php">Delete My Account Page</a>.<br>';
                }else{
                        echo '<b>Your ID is already registered.</b><br><br>Embed this code in your scrapbook<br><textarea rows="4" name="embedcode" cols="40"><img src="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-embed.jpg?uid='.$uid[1].'"></textarea><br><br><div class="loltitleclassic"><b>Whats Next?</b></div><br>There are some important components of this auto-scrap reply autobot. All of them are listed below.<br><br><div class="loltitleclassic"><b>1 - Viewing Your Scraps</b></div><br> Once you add the embed the code in your scrapbook, your scraps are stored on your scraps control panel. You can manage your scraps by logging in to your <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-view-scraps.php">Scraps Control Panel</a><br><br><div class="loltitleclassic"><b>2 - Edit Account Settings</b></div><br> If you wish to edit your account details or the way you want this service to work, please log in with your account on <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-edit.php">Edit Settings Page</a>.<br><br><div class="loltitleclassic"><b>3 - Change Password</b></div><br> If you want to change your account password, please navigate to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-change-password.php">this page</a>. <br><br><div class="loltitleclassic"><b>4 - Delete Service</b></div><br> If you ever wish to deactivate this service, you can do the same my navigating to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-delete.php">Delete My Account Page</a>.<br>';
                }
	}else{
                echo "<b>Wrong ID or Password.</b><br><br> <a href='http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php'>Please go Back</a> and enter correct account information.";
        }
    }else{
        echo "Wrong ID or Password. You cannot access this page.";
    }
}else{
?>
                <p><center><strong>Ads Removed in Scraps! - New!</strong></center></p>
	<form method="POST"><p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
				<input type="text" name="user" size="34" value="example@domain.com"></p>
				<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail-ID's Password</b></div><br>
				<input type="password" name="pass" size="34" value = "Password"></p>
				<p align="left">
				<div class="loltitleclassic">Your Reply Message</div></p>
                                <p align="left"><input type="checkbox" name="creply" checked=true onclick="javascript:if(document.forms[2].elements[2].checked==true){document.forms[2].elements[3].disabled=false;}else{document.forms[2].elements[3].disabled=true;}">Enter Reply Message</p>
				<p>Hi, (Name). <br><input type="text" name="reply" size="50" value = "Your Reply Here!"></p>
        <p><div class="loltitleclassic">Other Options</div></p>
                                <p align="left"><input type="checkbox" name="del" checked=true> Delete Scraps (Recommended - <a href="http://www.orkutplus.net/2008/09/autoscrap-reply-bot-set-and-send-auto-replies-to-your-scraps.html">Why?</a>)</p>
                                <p align="left"><input type="submit" value="Submit" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
        	<p align="left">&nbsp;</p>
        <p align="left">* Your E-Mail IDs or Passwords will not be used in anyway except for this autobot or will not be sold. When you close this service for your ID, your information will automatically be deleted. Please read our <a href="http://www.orkutplus.net/2005/01/privacy-policy.html">privacy policy</a> if you have any questions. </p>
        <p align="left">&nbsp;</p>
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

		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>
