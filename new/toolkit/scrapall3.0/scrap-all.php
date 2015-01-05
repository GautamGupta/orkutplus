<?php
session_start();
$pg_title = "Scrap All Deluxe v2.1 - Super Fast and Hassle Free!";
require_once("../includes/connection.php");
require_once("functions.php");
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
if(($_POST['email'] != NULL && $_POST['pass'] != NULL && $_POST['scrap'] != NULL) || ($_SESSION['c'] == 1 && $_SESSION['ocookie'] != NULL && $_SESSION['scrap'] != NULL && $_POST['cs'] != NULL))
{
	set_time_limit(0);
	load_curl();
	$req = new XMLHttpRequest();
	if($_SESSION['c'] != 1){
		$c_email = $_POST['email'];
		$pass = $_POST['pass'];
		$user_inf = orkut_login($c_email, $pass);
	}else{
		$user_inf = orkut_details_via_cookie($_SESSION['ocookie']);
	}
	if ($user_inf['ud_post_token'] != NULL)
	{
		if($_SESSION['c'] != 1)
		{
			$_SESSION['to'] = $_POST['to'];
			$_SESSION['sel'] = $_POST['sel'];
			$_SESSION['ocookie'] = $user_inf['cookie'];
			$_SESSION['scrap'] = $_POST['scrap'];
			if(isset($_POST['interval'])){
				$_SESSION['interval'] = $_POST['interval'];
			}else{
				$_SESSION['interval'] = 1;
			}
			//load friends below
			/*
			if($_SESSION['to'] == 2){ //groups
				$grp = $_POST['groups']; //grp var
				$grpexp = explode(";", $grp); //explode grps
				$grpc = count($grpexp); //count number of values
				echo $grpc;
				$grpc--; //-1
				for($r=0;$r<=$grpc;$r++){ //loop for grps
					$req->open("GET","http://www.orkut.com/ShowFriends?show=group".$grpexp[$r]); //nav to grp
					$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
					$req->send(null);
					preg_match("/showing\ \<b\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs); //match no of frnds
					$pgs = $pgs[1]; //string from array
					$pgs = $pgs/20; //no of pgs frm frnds
					$pgs = ceil($pgs); //higger number
					if($pgs == 0){ //if pg var comes to be 0, then it is converted to 1
						$pgs = 1;
					}
					for($a=1;$a<=$pgs;$a++) //grp pg loop
					{
						$req->open("GET","http://www.orkut.com/ShowFriends?show=group".$grpexp[$r]."&pno=".$a); //grp pg nav
						$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
						$req->send(null);
						$ts = $req->responseText;
						$ts = str_replace('\sclass="listimg"\s', '', $ts);
						preg_match_all('/<img\ssrc="(.*?)"><\/a>\n<h3 class="smller">\n<a\shref="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div\sclass\=\"nor\"\s\>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //match frnds
						for($frndloop=0;$frndloop<=sizeof($frnd);$frndloop++) //frnd loop
						{
							if($frnd[$frndloop][2] != NULL){
								if($_SESSION['sel'] == 3){
									$range = trim($_POST['range']).';';
									preg_match($grpexp[$r].':(.*?);', $range, $grprange);
									$grprangesub = explode(',', $grprange);
									for($xyz=0;$xyz<=sizeof($grprangesub);$xyz++){
										$grprangesuber = explode('-',$grprangesub[$xyz]);
										if($frndloop >= $grprangesuber[0] && $grprangesuber >= $grprangesuber[1]){
											$user_friend = array();
											$user_friend['uid'] = $frnd[$frndloop][2];
											$user_friend['name'] = $frnd[$frndloop][3];
											$user_friend['dp'] = $frnd[$frndloop][1];
											$user_friend['extra'] = $frnd[$frndloop][4];
											$user_friends[] = $user_friend;
											break;
										}
									}
								}else{
									$user_friend = array();
									$user_friend['uid'] = $frnd[$frndloop][2];
									$user_friend['name'] = $frnd[$frndloop][3];
									$user_friend['dp'] = $frnd[$frndloop][1];
									$user_friend['extra'] = $frnd[$frndloop][4];
									$user_friends[] = $user_friend;
								}
							}
						} //frnd loop end
					} //grp pg loop end
				} //grp loop end
			}else{*/
				$req->open("GET","http://m.orkut.co.in/RequestFriends.aspx?req=fl&uid=".$_SESSION['ouid']);
				$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
				$req->send(null);
				$json = trim(explode("while (true); &&&START&&&", $req->responseText));
				echo "<pre>";
				print_r($json);
				echo "</pre>";
				exit;
				$friends = json_decode($json[0]);
				if($friends['status'] == "OK"){
					$user_friend = array();
					$user_friend['uid'] = $frnd[$frndloop][2];
					$user_friend['name'] = $frnd[$frndloop][3];
					$user_friend['dp'] = $frnd[$frndloop][1];
					$user_friend['extra'] = $frnd[$frndloop][4];
					$user_friends[] = $user_friend;
				}
			}
			
			$_SESSION['user_friends'] = $user_friends;
		}else{
			$user_friends = $_SESSION['user_friends'];
		}
		if($_POST['frndchk'] == 2){
			echo '<form method="post" action="scrap-all-sel.php"><p>Check the Friends to send the Scrap:</p><table border=0 width=\'100%\'>';
				for($scraploop=0;$scraploop<=sizeof($user_friends);$scraploop++)
				{
					if($user_friends[$scraploop]['uid'] != NULL){
						if(($scraploop % 2)==0){
							//even
							echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p><input type="checkbox" name="'.$user_friends[$scraploop]['uid'].'">&nbsp;Scrap this Friend.</p></td></tr>';
						}else{
							//odd
							echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p><input type="checkbox" name="'.$user_friends[$scraploop]['uid'].'">&nbsp;Scrap this Friend.</p></td></tr>';
						}
					}
				}
			echo '</table><p align="center"><input type="submit" value="Scrap Selected Friends!"></p></form>';
			include("../includes/notice.php");
			echo '<div style="clear:both;"></div></div></div></div>';
			include("../includes/theme/sidebar.php");
			include("../includes/theme/footer.php");
			exit;
		}else{
			if($_SESSION['c'] == 1){
				$tloop = $_SESSION['scraploop'];
				if($_SESSION['frndchk'] == 3)
				{
					$limit = $_SESSION['limit'];
				}else{
					$limit = sizeof($user_friends);
				}
			}else{
				$tloop = 0;
				if($_POST['frndchk'] == 3)
				{
					$limit = $_POST['limit'] - 1;
				}else{
					$limit = sizeof($user_friends);
				}
			}
			$_SESSION['limit'] = $limit;
			echo "<table border=0 width=\"100%\">";
			for($scraploop=$tloop;$scraploop<=$limit;$scraploop++)
			{
				if($user_friends[$scraploop]['uid'] != NULL){
					$cs = null;
					if($_SESSION['c'] == 1){
						$cs = "&cs=".$_POST['cs'];
						$_SESSION['c'] = 0;
					}
					$scrap = urlencode(str_replace("%NAME%", $user_friends[$scraploop]['name'], $_SESSION['scrap'])."<br /><br /></font>[silver]".date("H:i:s"));
					$req->open("POST","http://www.orkut.com/Scrapbook?uid=".$user_friends[$scraploop]['uid']);
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
					$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&&Action.submit=1&scrapText=".$scrap."&uid=".$user_friends[$scraploop]['uid'].$cs);
					preg_match('/src\=\"\/CaptchaImage\\?xid\=(.*?)\"\ /i', $req->responseText, $xid);
					if($xid[1] != NULL)
					{
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
						echo "<center><form method=\"post\" name=\"csform\">
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
<form method="POST">
	<p align="center"><strong>Please refer to the HELP GUIDE to see how the new ScrapAll works.</strong></p>
	<div class="loltitleclassic"><b>Your Orkut EMail ID</b></div>
	<p><input type="text" name="email" style="width:99.2%;" value="Username"></p>
	<div class="loltitleclassic"><b>Password</b></div>
	<p><input type="password" name="pass" style="width:99.2%;" value = "Password"></p>
	<div class="loltitleclassic"><b>Time Interval Between Scraps</b></div>
	<p><input type="text" name="interval" style="width:99.2%;" value = ""> (in seconds)(optional) </p>
        <div class="loltitleclassic"><b>Scrap To</b></div>
	<p><input type="radio" checked="true" name="to" value="1" onchange="if(this.checked=true){document.forms[1].elements[11].value='1-5;10-19;40-50';}">All Friends</p>
	<p><input type="radio" name="to" value="2" onchange="if(this.checked=true){document.forms[1].elements[11].value='1:1-5,20-23;3:10-13;4:1-10,20-25,30-40';}">Friends in Group(s):
	<input type="text" name="groups" size="47" value="1;3;4"></p>
	<div style="margin:5px;padding:2px;font-size: 11px;width:auto;color:#000;background-color:#fff;border:1px solid #CCCCCC;line-height:1.2em;height:auto;">
	<p><input type="radio" name="to" value="3" onchange="if(this.checked=true){document.forms[1].elements[11].value='1-5;10-19;40-50';}">UID(s): 
	<input type="text" name="uids" size="57" value="UID1:UID2:UID3"></p>
	<p>If the UID is not in your friend list, then the scrap will be only sent if the scrapbook is unlocked.</p></div><p></p>
	<div class="loltitleclassic"><b>Selection</b></div>
	<p><input type="radio" checked="true" name="sel" value="1">All</p>
        <p><input type="radio" name="sel" value="2">Selected</p>
        <div style="margin:5px;padding:2px;font-size: 11px;width:auto;color:#000;background-color:#fff;border:1px solid #CCCCCC;line-height:1.2em;height:auto;">
	<p><input type="radio" name="sel" value="3">Range:
	<input type="text" name="range" size="57" value="1-5;10-19;40-50"></p>
	<p><strong>Format:</strong></p>
	<p><i>For All Friends & UIDs</i>: SR-ER;SR-ER;SR-ER<br />
	<i>For Groups</i>: G#1:SR-ER,SR-ER;G#2:SR-ER;G#3:SR-ER,SR-ER,SR-ER</p>
	<p><strong>Key:</strong><br />
	<i>G#</i> -> Group Number (As Entered Above in Groups Field)<br />
	<i>SR</i> -> Starting Range<br />
	<i>ER</i> -> Ending Range</p>
	<p align="center"><strong>HELP</strong></p></div><p></p>
	<div class="loltitleclassic"><b>Your Scrap - No Captcha Content Please</b></div>
	<p><textarea name="scrap" id="scrap" style="width:460px;height:200px;z-index:999;">Hi, %NAME%. I wanted to tell you that [b][blue][u]ht[b]tp://ww[b]w.orkutplus.[b]net/[/u][/blue][/b] Rocks! [:D]</textarea></p>
        <p align="left">Subsitutes you can use in scraps: <strong>%NAME%</strong> for Friend's Name in the Scrap.</p>
        <div class="loltitleclassic"><b>Scrap All / Reset</b></div>
        <p align="left"><input type="submit" value="Scrap All!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
</form>
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