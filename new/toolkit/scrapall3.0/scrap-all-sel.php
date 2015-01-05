<?php
session_start();
$pg_title = "Scrap All Selected Deluxe v2.0 - Super Fast and Hassle Free!";
require_once("../includes/connection.php");
require_once("../includes/theme/functions.php");
include("../includes/theme/header.php");
?>
<div id="container">
<div id="left-div">
<div id="left-inside">
<div class="home-post-wrap2">
<h2 class="titles"><a href="<?php echo current_url(); ?>"><?php echo $pg_title; ?></a></h2>
<div class="post-info" style="width: 480px !important;"><?php echo fo_translate(); ?><br />Advertisement</div>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu post top 336x280, created 5/26/09 */
google_ad_slot = "9944513892";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
<div style="clear:both;"></div>
<p>Our Scrap all friends is an very efficient way to send your scraps to all your friends quickly and easily. Use our scrap all to send greetings or important alerts or anything you like. And please note - it is advertisement free. Please refer <a href="http://www.orkutplus.net/2008/09/scrap-all-friends.html">this post</a> for the tutorial and help.</p>
<?php
if($_SESSION['ocookie'] != NULL && $_SESSION['scrap'] != NULL)
{
	set_time_limit(0);
	load_curl();
	$req = new XMLHttpRequest();
	$user_inf = orkut_details_via_cookie($_SESSION['ocookie']);
	$req->open("GET","http://www.orkut.com/ShowFriends");
	if ($user_inf['ud_post_token'] != NULL)
	{
		$cs = null;
		if($_SESSION['c'] != 1)
		{
			$req->open("GET","http://www.orkut.com/ShowFriends");
			$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
			$req->send(null);
			preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
			$pgs = ceil($pgs[1]/20);
			$user_friends = array();
			for($pgloop=1;$pgloop<=$pgs;$pgloop++)
			{
				$req->open("GET","http://www.orkut.com/ShowFriends?show=all&pno=".$pgloop);
				$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
				$req->send(null);
				$ts = $req->responseText;
				$ts = str_replace(' class="listimg"  ', '', $ts);
				$ts = str_replace(' class="listimg"', '', $ts);
				$ts = str_replace('<imgsrc', '<img src', $ts);
				preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER);
				for($frndloop=0;$frndloop<=sizeof($frnd);$frndloop++){
					if($frnd[$frndloop][2] != NULL && $_POST[$frnd[$frndloop][2]] == "on"){
						$user_friend = array();
						$user_friend['uid'] = $frnd[$frndloop][2];
						$user_friend['name'] = $frnd[$frndloop][3];
						$user_friend['dp'] = $frnd[$frndloop][1];
						$user_friend['extra'] = $frnd[$frndloop][4];
						$user_friends[] = $user_friend;
					}
				}
			}
			$_SESSION['user_friends'] = $user_friends;
			$tloop = 0;
		}else{
			$user_friends = $_SESSION['user_friends'];
			$tloop = $_SESSION['scraploop'];
			$cs = "&cs=".$_POST['cs'];
			$_SESSION['c'] = 0;
		}
		echo "<table border=0 width=\"100%\">";
		for($scraploop=$tloop;$scraploop<=sizeof($user_friends);$scraploop++)
		{
			if($user_friends[$scraploop]['uid'] != NULL){
				$scrap = urlencode(str_replace("%NAME%", $user_friends[$scraploop]['name'], $_SESSION['scrap'])."<br /><br /></font>[silver]".date("H:i:s"));
				$req->open("POST","http://www.orkut.com/Scrapbook?uid=".$user_friends[$scraploop]['uid']);
				$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
				$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&&Action.submit=1&scrapText=".$scrap."&uid=".$user_friends[$scraploop]['uid'].$cs);
				preg_match('/src\=\"\/CaptchaImage\\?xid\=(.*?)\"\ /i', $req->responseText, $xid);
				if($xid[1] != NULL){
					//captcha faced
					$_SESSION['scraploop'] = $scraploop;
					$_SESSION['c'] = 1;
					if(($scraploop % 2)==0){ //if statement for design html output
						//even
						echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p align="center"><u>Captcha Faced. Please enter the Captcha Below to send the Scrap.</u></p><br />';
					}else{
						//odd
						echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p align="center"><u>Captcha Faced. Please enter the Captcha Below to send the Scrap.</u></p><br />';
					}
					echo "<center><form method=\"post\">
		<img src=\"http://toolkit.orkutplus.net/captcha.php?xid=".$xid[1]."\" onload=\"document.getElementById('cs').focus();\"><br />
		<p><input type=\"text\" name=\"cs\" id=\"cs\" maxlength=\"10\"></p>
		<p><input type=\"submit\" name=\"submit\" value=\"Submit\"></p>
		</form></center></td></tr></table><br />";
					include("../includes/notice.php");
					echo '<div style="clear:both;"></div></div></div></div>';
					include("../includes/theme/sidebar.php");
					include("../includes/theme/footer.php");
					exit;
				}else{
					if(trim($req->responseText) == "ok"){
						$output = "Scrap Sent!";
					}elseif($req->status == 403){
						$output = "Error: Orkut didn't allow the profile to post the scrap.";
					}else{
						$output = trim(strip_tags(trim($req->responseText)));
					}
					if(($scraploop % 2)==0){ //if statement for design html output
						//even
						echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p align="center"><u>'.$output.'</u></p></td></tr>';
					}else{
						//odd
						echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p align="center"><u>'.$output.'</u></p></td></tr>';
					}
					sleep($_SESSION['interval']);
				}
			}
			flush();
		}
		echo "</table><br />";
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		session_destroy();
	}else{
		echo "Email ID not working.<br />";
	}
}else{
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
?>
<script>window.location='scrap-all.php';</script>
<?php
}
include("../includes/notice.php");
?>
<div style="clear:both;"></div>
</div>
</div>
</div>
<?php
include("../includes/theme/sidebar.php");
include("../includes/theme/footer.php");
?>