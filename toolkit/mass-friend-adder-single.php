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
		<h2 id="post-addersingle" class="title"><a href="http://orkutplus.net/toolkit/mass-friend-adder-single.php" rel="bookmark">[PHP]&nbsp;Mass Friend Adder (For Single ID)</a></h2>
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
   </div> 
<div class="content">
	<div style="padding-left:0px; padding-top:15px">
<?php
if(isset($_GET['email'])){
        require('class.XMLHttpRequest.php');
        $req = new XMLHttpRequest();
        $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_GET['email']."&Passwd=".$_GET['pass']."&service=orkut&skipvpage=true&sendvemail=false");
        $req->send(null);
        preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
        $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
        $req->send(null);
        preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
        if ($orkut_state[0] != NULL)
        {
                $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
                $req->setRequestHeader("Cookie",$orkut_state[0]);
                $req->send(null);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
                $abc = urlencode($lol[0][1]);
                $abc1 = urlencode($lol1[0][1]);
                $uid=explode(":",$_GET['uid']);
                $suid=sizeof($uid);
                for($a=0;$a<=$suid;$a++)
                {
                        $req->open("POST","http://www.orkut.com/FriendAdd.aspx?uid=".$uid[$a]);
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                        $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&sig=&groupSelection.submitted=1&sec0-groupName=&friendId=".$uid[$a]."&noteText=&Action.yes=Submit+Query");
                        sleep(1);
                }
                echo "Friend(s) Added<br>";
        }else{
        echo "ID not working<br>";
        }
}else{ ?>
	<form method="GET">
				<div class="loltitleclassic"><b>Your Orkut E-Mail ID</b></div>
				<p><input type="text" name="email" size="40" value="example@orkutplus.net"></p>
				
				<div class="loltitleclassic"><b>Password:</b></div>
				<p><input type="password" name="pass" size="40" value = "Password"></font></p>
<div class="loltitleclassic"><b>UIDs to Add:</b></div>
				<p><input type="text" name="uid" size="40" value = "UID1:UID2:UID3"></font></p>
				<p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="ADD!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
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
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
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