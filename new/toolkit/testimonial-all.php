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
<h2 id="post-testiall" class="title"><a href="http://orkutplus.net/toolkit/testimonial-all.php" rel="bookmark">[PHP]&nbsp;Testimonial All</a></h2>
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
if(isset($_GET['email']) && isset($_GET['pass']) && isset($_GET['text']))
{
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
                $data = date("d/m/Y - H:i:s");
                $text = urlencode($_GET['text']."\n\n[/i][/u][/b][silver]".$data);
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
                echo "OrkutPlus Testimonial went to UID: <br>";
                $scd = 0;
                if($_GET['limit'] != NULL){
                        $limit = $_GET['limit'];
                }elseif($_GET['limit'] == NULL){
                        $limit = $pgs + 1;
                }
                if($pgs > $limit){
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
                                        $scd += 1;
                                        if($scd <= $limit){
                                                $req->open("POST","http://www.orkut.com/TestimonialWrite.aspx?uid=".$frnd[$y][1]);
                                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                                $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&countedTextbox=".$text."&Action.submit=Submit+Query");
                                                echo "<a href='http://www.orkut.com/Profile.aspx?uid=".$frnd[$y][1]."'>".$frnd[$y][1]."</a><br>";
                                                if($_GET['interval'] != NULL){
                                                        sleep($_GET['interval']);
                                                }else{
                                                        sleep(1);
                                                }
                                        }else{
                                                break;
                                        }
                                }
                                if($scd > $limit){
                                        break;
                                }
                        }
                }elseif($pgs < $limit){
                        $pgs = $pgs/20;
                        for($a=1;$a<=ceil($pgs);$a++)
                        {
                                $req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a);
                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                $req->send(null);
                                preg_match_all('/class\=\"editcheck\"\ \/\>\\n\<a\ \ href\=\"\/Main\#Profile\.aspx\?uid\=(.*?)\"\>\<img/i',$req->responseText,$frnd,PREG_SET_ORDER);
                                for($y=0;$y<=sizeof($frnd);$y++)
                                {
                                        $req->open("POST","http://www.orkut.com/TestimonialWrite.aspx?uid=".$frnd[$y][1]);
                                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                        $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&countedTextbox=".$text."&Action.submit=Submit+Query");
                                        echo "<a href='http://www.orkut.com/Profile.aspx?uid=".$frnd[$y][1]."'>".$frnd[$y][1]."</a><br>";
                                        if($_GET['interval'] != NULL)
                                        {
                                                sleep($_GET['interval']);
                                        }else{
                                                sleep(1);
                                        }
                                }
                        }           
                }
        }else{
                echo "Email ID not working.<br>";
        }
}else{ 
?>
		<form method="GET">
				<p align="left"><font size="2" face="Tahoma">Your Orkut EMail ID:
				<input type="text" name="email" size="22" value="Username"></font></p>
<p align="left"><font face="Tahoma" size="2">
				Password:
				<input type="password" name="pass" size="34" value = "Password"></font></p>
				<p align="left"><font size="2" face="Tahoma">Interval:
				<input type="text" name="interval" size="8" value = ""> (in seconds)(optional) </font></p>
<p align="left"><font size="2" face="Tahoma">Scrap Limit:
				<input type="text" name="limit" size="7" value = "150"> (optional)</font></p>
				<p align="left"><font size="2" face="Tahoma">Testimonial:
				<textarea rows="4" name="text" cols="40">OrkutPlus! [No links Please!]</textarea></font></p>
				
				<p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Testimonial All!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p></div>
				<p align="left">&nbsp;</p></form>
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
<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>

		<hr color="#e6e6e6" size="1">
		</div> 
		<?php $adcount++; ?>


		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../blog/wp-content/themes/op/footer.php"); ?>