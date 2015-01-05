<?php
session_start();
$pg_title = "Scrap All Deluxe - Super Fast and Hassle Free!";
require_once("../includes/connection.php");
require_once("functions.php");
$load_wysiwyg = true;
$load_wysiwyg_extra = '
<script type="text/javascript">
tinyMCE_GZ.init({
	plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",
	themes : "advanced",
	languages : "en",
	disk_cache : true,
	debug : false
});
</script>
<script type="text/javascript">
tinyMCE.init({
mode : "exact",
elements : "scrap",
theme : "advanced",
skin : "o2k7",
plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",
theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,

// Drop lists for link/image/media/template dialogs
template_external_list_url : "js/template_list.js",
external_link_list_url : "js/link_list.js",
external_image_list_url : "js/image_list.js",
media_external_list_url : "js/media_list.js",

// Replace values for the template plugin
template_replace_values : {
	username : "Some User",
	staffid : "991234"
}
});
</script>
';
include("../includes/header.php");
include("../includes/leftbar.php");
?>
<div class="post_title">
<h2 class="title"><a href="<?php echo current_url(); ?>"><?php echo $pg_title; ?></a></h2>
<small class="title"><?php echo fo_translate(); ?></small>
</div>
<div class="content">
<p>
Our Scrap all friends is an very efficient way to send your scraps to all your friends quickly and easily. Use our scrap all to send greetings or important alerts or anything you like. And please note - it is advertisement free. Please refer <a href="http://www.orkutplus.net/2008/09/scrap-all-friends.html">this post</a> for the tutorial and help.
</p>
<?php include("../includes/ads/contentarea.php"); ?>
<?php
if(($_POST['email'] != NULL && $_POST['pass'] != NULL && $_POST['scrap'] != NULL) || ($_SESSION['c'] == 1 && $_SESSION['ocookie'] != NULL && $_SESSION['scrap'] != NULL && $_POST['cs'] != NULL))
{
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
		$user_friends = array();
		if($_SESSION['c'] != 1)
		{
			$_SESSION['to'] = $_POST['to'];
			$_SESSION['sel'] = $_POST['sel'];
			$_SESSION['ocookie'] = $user_inf['cookie'];
			$_SESSION['scrap'] = stripslashes($_POST['scrap']);
			if(isset($_POST['interval'])){
				$_SESSION['interval'] = $_POST['interval'];
			}else{
				$_SESSION['interval'] = 1;
			}
		}
		$scf = 0;
		$scd = 0;
		if($_POST['to'] == 1 || $_SESSION['to'] == 1){ //all friends
			if($_POST['sel'] == 2){ //selected form
				echo '<form method="POST" action="selected.php"><p>Check the Friends to send the Scrap:</p>';
			}
			echo "<table border=0 width=\"100%\">";
			if($_SESSION['c'] != 1){
				$req->open("GET","http://www.orkut.com/ShowFriends.aspx");
				$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
				$req->send(null);
				preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
				$pgs = $pgs[1];
				$pgs = $pgs/20;
				$pgs = ceil($pgs);
				if($pgs == 0){ $pgs = 1; }
				for($a=1;$a<=$pgs;$a++)
				{
					$req->open("GET","http://www.orkut.com/ShowFriends.aspx?show=all&pno=".$a);
					$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
					$req->send(null);
					$ts = $req->responseText;
					$ts = str_replace(' class="listimg"  ', '', $ts);
					$ts = str_replace(' class="listimg"', '', $ts);
					$ts = str_replace('<imgsrc', '<img src', $ts);
					preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER);
					for($frndloop=0;$frndloop<=sizeof($frnd);$frndloop++){
						if($frnd[$frndloop][2] != NULL){
							$scf++;
							if($_POST['sel'] == 3){ //range
								$range = $_POST['range'];
								$rangeexplode = explode(";", $range);
								$recount = count($rangeexplode);
								for($r=0;$r<=$recount;$r++){
									$ir = explode("-", $rangeexplode[$r]);
									if($scf >= $ir[0] && $scf <= $ir[1]){
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
					}
				}
				$_SESSION['user_friends'] = $user_friends;
				$tloop = 0;
			}else{
				$user_friends = $_SESSION['user_friends'];
				$tloop = $_SESSION['scraploop'];
			}
			for($scraploop=$tloop;$scraploop<=sizeof($user_friends);$scraploop++)
			{
				if($user_friends[$scraploop]['uid'] != NULL){
					if($_POST['sel'] == 2){
						if(($scraploop % 2)==0){
							//even
							echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p><input type="checkbox" name="'.$user_friends[$scraploop]['uid'].'">&nbsp;Scrap this Friend.</p></td></tr>';
						}else{
							//odd
							echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p><input type="checkbox" name="'.$user_friends[$scraploop]['uid'].'">&nbsp;Scrap this Friend.</p></td></tr>';
						}
					}else{
						sendscrap($user_friends[$scraploop], $scraploop);
					}
				}
			}
			if($_POST['sel'] == 2){ //selected form
				echo '</table><p align="center"><input type="submit" value="Scrap Selected Friends!"></p></form>';
				include("../includes/ads/contentarea.php");
				include("../includes/notice.php");
				include("../includes/footer.php");
				exit;
			}
			echo "</table>";
		}elseif($_POST['to'] == 2 || $_SESSION['to'] == 2){ //groups frnds
			if($_POST['sel'] == 2){ //selected form
				echo '<form method="POST" action="selected.php"><p>Check the Friends to send the Scrap:</p>';
			}
			echo "<table border=0 width=\"100%\">";
			if($_SESSION['c'] != 1){
				$grp = $_POST['groups'];
				$grpexp = explode(",", $grp);
				for($r=0;$r<=sizeof($grpexp);$r++){ //loop for grps
					$c_group = trim($grpexp[$r]);
					$req->open("GET","http://www.orkut.com/ShowFriends.aspx?show=group".$c_group);
					$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
					$req->send(null);
					preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs); //match no of frnds
					$pgs = $pgs[1];
					$pgs = $pgs/20;
					$pgs = ceil($pgs);
					if($pgs == 0){ $pgs = 1; }
					for($a=1;$a<=$pgs;$a++)
					{
						$req->open("GET","http://www.orkut.com/ShowFriends.aspx?show=group".$c_group."&pno=".$a);
						$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
						$req->send(null);
						$ts = $req->responseText;
						$ts = str_replace(' class="listimg"  ', '', $ts);
						$ts = str_replace(' class="listimg"', '', $ts);
						$ts = str_replace('<imgsrc', '<img src', $ts);
						preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //match frnds
						for($frndloop=0;$frndloop<=sizeof($frnd);$frndloop++)
						{
							if($frnd[$frndloop][2] != NULL)
							{
								$scf++;
								if($_POST['sel'] == 3){ //range
									$range = $_POST['range'];
									$rangeexplode = explode(";", $range);
									for($rangeloop=0;$rangeloop<=count($rangeexplode);$rangeloop++){ //loop for grps
										$grp123 = explode(":", trim($rangeexplode[$rangeloop]));
										if($grp123[0] == $c_group){
											$rangeeexplode = explode(",", $grp123[1]);
											for($abcd123=0;$abcd123<=count($rangeeexplode);$abcd123++){
												$ir = explode("-", trim($rangeeexplode[$abcd123]));
												if($scf >= $ir[0] && $scf <= $ir[1]){
													$scd++;
													$user_friend = array();
													$user_friend['uid'] = $frnd[$frndloop][2];
													$user_friend['name'] = $frnd[$frndloop][3];
													$user_friend['dp'] = $frnd[$frndloop][1];
													$user_friend['extra'] = $frnd[$frndloop][4];
													$user_friend['scf'] = $scd;
													$user_friends[$frnd[$frndloop][2]] = $user_friend;
												}
											}
										}else{
											break;
										}
									}
								}else{ //all or selected
									$user_friend = array();
									$user_friend['uid'] = $frnd[$frndloop][2];
									$user_friend['name'] = $frnd[$frndloop][3];
									$user_friend['dp'] = $frnd[$frndloop][1];
									$user_friend['extra'] = $frnd[$frndloop][4];
									$user_friend['scf'] = $scf;
									$user_friends[$frnd[$frndloop][2]] = $user_friend;
								}
							}
						} //frnd loop end
					} //grp pg loop end
				} //grp loop end
			}else{
				$user_friends = $_SESSION['user_friends'];
				$tloop = $_SESSION['scraploop'];
			}
			foreach($user_friends as $c_friend){
				if($_POST['sel'] == 2){ //selected
					if(($c_friend['scf'] % 2)==0){
						//even
						echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$c_friend['uid'].'"><img src="'.$c_friend['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$c_friend['uid'].'">'.$c_friend['name'].'</a></p><p align="center">'.$c_friend['extra'].'</p><p><input type="checkbox" name="'.$c_friend['uid'].'">&nbsp;Scrap this Friend.</p></td></tr>';
					}else{
						//odd
						echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$c_friend['uid'].'"><img src="'.$c_friend['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$c_friend['uid'].'">'.$c_friend['name'].'</a></p><p align="center">'.$c_friend['extra'].'</p><p><input type="checkbox" name="'.$c_friend['uid'].'">&nbsp;Scrap this Friend.</p></td></tr>';
					}
				}else{
					sendscrap($c_friend, $c_friend['scf']);
				}
			}
			if($_POST['sel'] == 2){ //selected form
				echo '</table><p align="center"><input type="submit" value="Scrap Selected Friends!"></p></form>';
				include("../includes/ads/contentarea.php");
				include("../includes/notice.php");
				include("../includes/footer.php");
				exit;
			}
			echo "</table>";
		}elseif($_POST['to'] == 3 || $_SESSION['to'] == 3){ //uid friends
			if($_POST['sel'] == 2){ //selected form
				echo '<form method="POST" action="selected.php"><p>Check the Friends to send the Scrap:</p>';
			}
			echo "<table border=0 width=\"100%\">";
			if($_SESSION['c'] != 1){
				$req->open("GET","http://www.orkut.com/ShowFriends.aspx");
				$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
				$req->send(null);
				preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
				$pgs = $pgs[1];
				$pgs = $pgs/20;
				$pgs = ceil($pgs);
				if($pgs == 0){ $pgs = 1; }
				$scf = 0;
				for($a=1;$a<=$pgs;$a++)
				{
					$req->open("GET","http://www.orkut.com/ShowFriends.aspx?show=all&pno=".$a);
					$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
					$req->send(null);
					$ts = $req->responseText;
					$ts = str_replace(' class="listimg"  ', '', $ts);
					$ts = str_replace(' class="listimg"', '', $ts);
					$ts = str_replace('<imgsrc', '<img src', $ts);
					preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //matching all frnds - advance (matches all details on the page)
					for($frndloop=0;$frndloop<=sizeof($frnd);$frndloop++){
						if($frnd[$frndloop][2] != NULL){
							$scf++;
							if($_POST['sel'] == 3){ //range
								$range = $_POST['range'];
								$rangeexplode = explode(";", $range);
								$recount = count($rangeexplode);
								for($r=0;$r<=$recount;$r++){
									$ir = explode("-", $rangeexplode[$r]);
									if($scf >= $ir[0] && $scf <= $ir[1]){
										$user_friend = array();
										$user_friend['uid'] = $frnd[$frndloop][2];
										$user_friend['name'] = $frnd[$frndloop][3];
										$user_friend['dp'] = $frnd[$frndloop][1];
										$user_friend['extra'] = $frnd[$frndloop][4];
										$user_friends[] = $user_friend;
										//break;
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
					}
				}
				$_SESSION['user_friends'] = $user_friends;
				$tloop = 0;
			}else{
				$user_friends = $_SESSION['user_friends'];
				$tloop = $_SESSION['scraploop'];
			}
			for($scraploop=$tloop;$scraploop<=sizeof($user_friends);$scraploop++)
			{
				if($user_friends[$scraploop]['uid'] != NULL){
					if($_POST['sel'] == 2){
						if(($scraploop % 2)==0){
							//even
							echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p><input type="checkbox" name="'.$user_friends[$scraploop]['uid'].'">&nbsp;Scrap this Friend.</p></td></tr>';
						}else{
							//odd
							echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p><input type="checkbox" name="'.$user_friends[$scraploop]['uid'].'">&nbsp;Scrap this Friend.</p></td></tr>';
						}
					}else{
						sendscrap($user_friends[$scraploop], $scraploop);
					}
				}
			}
			if($_POST['sel'] == 2){ //selected form
				echo '</table><p align="center"><input type="submit" value="Scrap Selected Friends!"></p></form>';
				include("../includes/ads/contentarea.php");
				include("../includes/notice.php");
				include("../includes/footer.php");
				exit;
			}
			echo "</table>";
			$_SESSION = array();
			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time()-42000, '/');
			}
			session_destroy();
		}
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
	<p><input type="text" name="email" size="71" value="<REDACTED>"></p>
	<div class="loltitleclassic"><b>Password</b></div>
	<p><input type="password" name="pass" size="71" value = "<REDACTED>"></p>
	<div class="loltitleclassic"><b>Time Interval Between Scraps</b></div>
	<p><input type="text" name="interval" size="50" value = ""> (in seconds)(optional) </p>
	<div class="loltitleclassic"><b>Scrap To</b></div>
	<p><input type="radio" checked="true" name="to" value="1" onchange="if(this.checked=true){document.forms[1].elements[11].value='1-5;10-19;40-50';}">All Friends</p>
	<p><input type="radio" name="to" value="2" onchange="if(this.checked=true){document.forms[1].elements[11].value='1:1-5,20-23;3:10-13;4:1-10,20-25,30-40';}">Friends in Group(s):
	<input type="text" name="groups" size="47" value="1,3,4"></p>
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
	<p><textarea name="scrap" id="scrap" style="width:99.2%;height:200px;z-index:999;">http://lh4.ggpht.com/_sCGN2FQv-Bo/SgqCCecglEI/AAAAAAAAAGA/ILOMrnJiw6k/s144/Disapproving.jpg</textarea></p>
	<p align="left">Subsitutes you can use in scraps: <strong>%NAME%</strong> for Friend's Name in the Scrap.</p>
	<div class="loltitleclassic"><b>Scrap All / Reset</b></div>
	<p align="left"><input type="submit" value="Scrap All!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
</form>
<?php
}
include("../includes/ads/contentarea.php");
include("../includes/notice.php");
include("../includes/footer.php");
?>
