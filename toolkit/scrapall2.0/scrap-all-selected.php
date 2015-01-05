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
<h2 id="post-scrapall" class="title"><a href="http://orkutplus.net/toolkit/scrapall" rel="bookmark">[PHP]&nbsp;Scrap All - Super Fast and Hassle Free.</a></h2>
<small class="title">Written by <a href="http://www.orkutplus.net/about"><REDACTED></a></a> | <a href="http://www.orkutplus.net/toolkit/scrapall/br">Traduzir para o Portugues</a></small>
<div class="content"><p>Our Scrap all friends is an very efficient way to send your scraps to all
your friends quickly and easily. Use our scrap all to send greetings or
important alerts or anything you like. And please note - it is advertisement
free. Please refer <a href="http://www.orkutplus.net/2008/09/scrap-all-friends.html">this
post</a> for the tutorial and help.</p></div>
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
if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['scrap']))
{
        set_time_limit(0);
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
                $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
                $req->setRequestHeader("Cookie",$orkut_state[0]);
                $req->send(null);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
                $abc = urlencode($lol[0][1]);
                $abc1 = urlencode($lol1[0][1]);
                $req->open("GET","http://www.orkut.com/Friends.aspx");
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send(null);
                preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
                $pgs = $pgs[1];
                echo "Scrap went to: <br /><table border=0>";
                $pgs = $pgs/20;
                for($a=1;$a<=ceil($pgs);$a++)
                {
                        $req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a);
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                        $req->send(null);
                        $ts = $req->responseText;
                        preg_match_all('/<img src="(.*?)" class="listimg"  ><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>/i',$ts,$frnd,PREG_SET_ORDER);
                        $sfrnd = sizeof($frnd);
                        for($y=0;$y<=$sfrnd;$y++)
                        {
                                if($_POST[$frnd[$y][2]] == "on"){
                                        if($frnd[$y][2] != NULL){
                                                $scrap = urlencode(str_replace("%NAME%", $frnd[$y][3], urldecode($_POST['scrap']))."<br /><br /></font>[silver]".date("H:i:s"));
                                                $req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]);
                                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                                $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".urlencode(str_replace("\\&quot;", "", urldecode($scrap)))."&uid=".$frnd[$y][2]);
                                                echo "<tr><td><a href='http://www.orkut.com/Scrapbook.aspx?uid={$frnd[$y][2]}'><img src='{$frnd[$y][1]}'></a></td><td><p><a href='http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]."'>".$frnd[$y][3]."</a></p><p>".$frnd[$y][4]."</p><hr></td></tr>";
                                                if(isset($_POST['interval'])){
                                                        sleep($_POST['interval']);
                                                }else{
                                                        sleep(1);
                                                }
                                        }
                                }
                        }
                }
                echo "</table>";
        }else{
                echo "Email ID not working.<br>";
        }
}else{
?>
<script>window.location='index.php';</script>
	<?php } ?>
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
<div class="loltitleclassic"><b>Important Note</b></div>
<p>We do not store your account details anywhere in scrap all friends. Please read our <a href="http://www.orkutplus.net/privacy-policy">Privacy policy</a> and our <a href="http://www.orkutplus.net/disclaimer">Disclaimer</a> if you have any questions or concerns.</p>
<div class="loltitleclassic"><b>See Other Tools By Orkut Plus!</b></div>
<p>We are adding new tools every now and then in our <a href="http://www.orkutplus.net/orkut-toolkit">Official Orkut Toolkit</a>. Please navigate to <a href="http://www.orkutplus.net/orkut-toolkit">this page</a> to see the other tools.</p><br>
<?php endif; $adcount++; ?>
<?php $adcount++; ?>
<div style="clear: both"></div></div></div>
</div></div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
</div> <!-- close page container-->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>
