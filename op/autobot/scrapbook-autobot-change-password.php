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
		<h2 id="post-sbabchangepass" class="title"><a href="http://orkutplus.net/toolkit/autobot/scrapbook-autobot-change-password.php" rel="bookmark">[PHP]&nbsp;Scrapbook AutoBot Change Password</a></h2>

   </div>
<div class="content">
	<div style="padding-left:15px; padding-top:15px">
<?php
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['newpass'])){
        mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
        mysql_selectdb("<REDACTED>");
        $query = mysql_query("SELECT * from users WHERE user='".$_POST['user']."'");
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
        }
        if($check == $_POST['user']){
                if($check2==$_POST['pass']){
                        require('class.XMLHttpRequest.php');
                        $req = new XMLHttpRequest();
                        $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['user']."&Passwd=".$_POST['newpass']."&service=orkut&skipvpage=true&sendvemail=false");
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
                                preg_match('/\<a\ \ accesskey\=\"p\"\ href\=\"\/Profile.aspx\?uid\=(.*?)\"\>Profile\<\/a\>/i', $req->responseText, $uid);
                                if($lol[0][1] != NULL){
                                        mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
                                        mysql_selectdb("<REDACTED>");
                                        $query = mysql_query("SELECT * from users WHERE user='".$_POST['user']."'");
                                        while($row=mysql_fetch_array($query))
                                        {
                                        	$check=$row['user'];
                                        }
                                        if($check == $_POST['user']){
                                                mysql_query("UPDATE `<REDACTED>`.`users` SET `pass` = '{$_POST['newpass']}' WHERE `users`.`user` = '{$_POST['user']}';");
                                                echo 'Your Password has been changed.';
                                        }else{
                                                echo "ID doesn't exist";
                                        }
                                }else{
                                        echo "ID or New Password not working. Password cannot be changed.";
                                }
                        }else{
                                echo "New Password is wrong. Password cannot be changed.";
                        }
                }else{
                      echo "Old Password is Wrong. Please enter correct password.";
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

	<form method="POST">	<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
				<input type="text" name="user" size="34" value="example@domain.com"></p>
				<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail ID's Password</b></div><br>
				<input type="password" name="pass" size="34" value = "Password"></p>
				<p align="left"><div class="loltitleclassic"><b>Your Orkut E-mail ID's New Password</b></div><br>
				<input type="password" name="newpass" size="34" value = "NewPassword"></p>
                                <p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Change Password" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">Back to the Control Panel</a></p>
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
