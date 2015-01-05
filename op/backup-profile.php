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
		<h2 id="post-unjoincomm" class="title"><a href="http://orkutplus.net/toolkit/community-unjoiner.php" rel="bookmark">[PHP]&nbsp;Community Unjoiner - Select and Unjoin Orkut Communities</a></h2>
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
if(isset($_POST['email']) && isset($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['pass']))
{
	require('class.XMLHttpRequest.php');
	$req = new XMLHttpRequest();
	$req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['email']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false");
	$req->send(null);
	preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
	$req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
	$req->send(null);
	preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
	if ($orkut_state[0] != NULL)
	{
                if($_POST['cmm'] == "on"){
                        $req->open("GET","http://www.orkut.com/Communities.aspx");
                        $req->setRequestHeader("Cookie",$orkut_state[0]);
                        $req->send(null);
                        preg_match_all('/\<a\ \ href\=\"\/Main\#Community\.aspx\?cmm\=(.*?)\<\/a\>/i', $req->responseText,$cmm,PREG_SET_ORDER);
                        $size = sizeof($cmm);
                        $size = $size - 2;
                        $cmms = "";
                        for($s=0;$s<=$size;$s++){
                                $c1 = explode('" >', $cmm[$s][1]);
                                $cmms .= ":".$c1[0];
                                flush();
                        }
                        echo "<p>Community Backup:</p><p>".$cmms."</p><br><hr>";
                }
                if($_POST['frnd'] == "on"){
                        $frnds = "";
                        $req->open("GET","http://www.orkut.com/Friends.aspx");
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                        $req->send(null);
                        preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
                        $pgs = $pgs[1];
                        $pgs = $limit/20;
                        for($a=1;$a<=ceil($pgs);$a++)
                        {
                                $req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a);
                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                $req->send(null);
                                preg_match_all('/class\=\"editcheck\"\ \/\>\\n\<a\ \ href\=\"\/Main\#Profile\.aspx\?uid\=(.*?)\"\>\<img/i',$req->responseText,$frnd,PREG_SET_ORDER);
                                $sfrnd = sizeof($frnd);
                                for($y=0;$y<=$sfrnd;$y++)
                                {
                                        $frnds .= ":".$frnd[$y][1];
                                }
                        }
                        echo "<p>Friends Backup:</p><p>".$frnds."</p><br><hr>";
                }
                echo "<p>You can Later use these Terms with our <a href='recover-profile.php'>Profile Recoverer</a>!</p><br>";
	}else{
		echo "ID not working<br>";
	}
}else{ 
?>
<form method="POST">
				<div class="loltitleclassic"><b>Orkut E-Mail ID</b></div>
				<p><input type="text" name="email" size="40" value="Username"></p>
                                <div class="loltitleclassic"><b>Password</b></div>
				<p><input type="password" name="pass" size="40" value = "Password"></p>
<div class="loltitleclassic"><b>Things to Backup:</b></div>
<p><input type="checkbox" name="cmm" id="cmm" checked=true>&nbsp;Backup Communities</p>
                                <p><input type="checkbox" name="frnd" id="frnd" checked=true>&nbsp;Backup Friends</p>
				<p align="left"><strong>More Coming Soon!</strong></p>
				<p align="left"><input type="submit" value="Log In" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p></div>
</form>
	<?php } ?>
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
<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>


		</div> 
		<?php $adcount++; ?>


		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../blog/wp-content/themes/op/footer.php"); ?>