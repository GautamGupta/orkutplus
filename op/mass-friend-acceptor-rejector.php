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
		<h2 id="post-acceptreject" class="title"><a href="http://orkutplus.net/toolkit/mass-friend-acceptor-rejector.php" rel="bookmark">[PHP]&nbsp;Mass Friend Acceptor / Rejector</a></h2>
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
if(isset($_GET['emailf'])){
        require('class.XMLHttpRequest.php');
        $req = new XMLHttpRequest();
        for($n=$_GET['nf'];$n<=$_GET['nl'];$n++)
	{
		$req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_GET['emailf'].$n.$_GET['emaill']."&Passwd=".$_GET['pass']."&service=orkut&skipvpage=true&sendvemail=false");
		$req->send(null);
		preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
		$req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
		$req->send(null);
		preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
        if ($orkut_state[0] != NULL)
        {
            $req->open("GET","http://www.orkut.com/Home.aspx");
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send(null);
            preg_match('/new\ friend\ requests\ \<span\ class\=\"headernote\"\>\((.*?)\)\<\/span\>/i', $req->responseText, $lol2);
            $nowtb = $lol2[1];
            if ($nowtb != NULL){
                $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
                $req->setRequestHeader("Cookie",$orkut_state[0]);
                $req->send(null);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
                $abc = urlencode($lol[0][1]);
                $abc1 = urlencode($lol1[0][1]);
                preg_match_all('/friendRequestUserId\"\ value\=\"(.*?)\"\ \/\>/i', $req->responseText,$lol3,PREG_SET_ORDER);
                for($x=0;$x<=$nowtb;$x++)
                {
                        $req->open("POST","http://www.orkut.com/Home.aspx");
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                        $a = "POST_TOKEN=".$abc."&signature=".$abc1."&groupSelection.submitted=1&sec0-groupName=&friendRequestUserId=".$lol3[$x][1]."&Action.";
                        if($_GET['accept'] == "1")
                        {
                                $req->send(a."acceptFriend=Submit+Query");
                                echo $n.": UID - <a href='http://www.orkut.com/Profile.aspx?uid={$lol3[$x][1]}'>".$lol3[$x][1]."</a> Accepted<br>";
                        }else{
                                $req->send(a."declineFriend=Submit+Query");
                                echo $n.": UID - <a href='http://www.orkut.com/Profile.aspx?uid={$lol3[$x][1]}'>".$lol3[$x][1]."</a> Rejected<br>";
                        }
                }
            }else{
                echo $n.": No Friend Requests<br>";
            }
        }else{
            echo $n.": ID not working<br>";
        }
    }
}else{ ?>
	<form method="GET">
	<p align="left">&nbsp;</p>
	<p align="left"><font size="2" face="Tahoma">EMail ID's first part:
	<input type="text" name="emailf" size="22" value="Username"></font></p>
	<p align="left"><font size="2" face="Tahoma">Starting ID number:
	<input type="text" name="nf" size="8" value = "1"> to
	<input type="text" name="nl" size="7" value = "10"></font></p>
	<p align="left"><font size="2" face="Tahoma">Email ID's Last Part:
	<input type="text" name="emaill" size="20" value = "@yahoo.com"></font></p>
	<p align="left"><font face="Tahoma" size="2">
	Password:
	<input type="password" name="pass" size="34" value = "Password"></font></p>
	<p align="left"><input type="radio" checked="true" name="accept" value="1">Accept</p>
        <p aligh="left"><input type="radio" name="accept" value="1">Reject</p>
        <p align="left">&nbsp;</p>
	<p align="left"><input type="submit" value="Submit" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
	<p align="left">&nbsp;</p>
<?php
}
?><Br>
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