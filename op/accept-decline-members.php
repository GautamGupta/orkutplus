	<style type="text/css" media="screen">
	<!--
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style-core.css);
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style.css);
		-->
	</style>

<?php
error_reporting(0);
include("../blog/wp-config.php");
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
<h2 id="post-scrapall" class="title"><a href="http://orkutplus.net/toolkit/accept-decline-members.php" rel="bookmark">Accept or Decline Community Members</a></h2>
<small class="title">Written by <a href="http://www.orkutplus.net/about"><REDACTED></a></small>
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
<?php
if(isset($_POST['email']))
{
        flush();
        set_time_limit(0);
	$cmm = $_POST['cmm'];
        require('class.XMLHttpRequest.php');
        $req = new XMLHttpRequest();
        $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['email']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false");
        $req->send(null);
        preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
        $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
        $req->send(null);
        preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
        if ($orkut_state[0] != NULL){
                $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
                $req->setRequestHeader("Cookie",$orkut_state[0]);
                $req->send(null);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
                $abc = urlencode($lol[0][1]);
                $abc1 = urlencode($lol1[0][1]);
                $hjk = 0;
                do{
                        $req->open("GET","http://www.orkut.com/CommMembers.aspx?cmm=".$cmm."&tab=4");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                        $req->send(null);
                        preg_match('/\"\>(.*?)\<\/a\>\n\(\<a\ \ href\=\"\/Main\#FriendsList\.aspx\?uid\=(.*?)\"\>(.*?)\<\/a\>\)/i',$req->responseText,$uid);
                        if($uid[2] != NULL){
                                if($_POST['ad'] == 1){ //accept all
					/*if($_POST['ai'] == 1){
						$ok = 1;
						if($_POST['aic'] == 1){
							if($uid[3] < $_POST['ain']){
								$ok = 0;
							}
						}
						if($_POST['adc'] == 1){
							if($uid[3] > $_POST['adn']){
								$ok = 0;
							}
						}
						if($ok == 0){
							if($_POST['amr'] == 2){
								memad($uid, 2);
							}
						}else{
							memad($uid);
						}
					}else{*/
						$req->open("POST","http://www.orkut.com/CommMembers.aspx?cmm=".$cmm."&tab=4");
						$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
						echo "up here";
						$req->send("POST_TOKEN=".$abc."&signature=".$abc1."&memberId=".$uid[2]."&Action.acceptPending=Submit+Query");
						echo "down here";
						echo '<p><a href="http://www.orkut.com/Profile.aspx?uid='.$uid[2].'">'.$uid[1].'</a> (<a href="http://www.orkut.com/FriendsList.aspx?uid='.$uid[2].'">'.$uid[3].' Friends</a>) - Accepted. <a href="http://www.orkut.com/CommMemberManage.aspx?cmm='.$cmm.'&uid='.$uid[2].'">Moderate</a> Member.</p>';
					//}
                                        flush();
                                        sleep(1);
                                }elseif($_POST['ad'] == 2){ //deny all
					/*if($_POST['di'] == 1){
						$ok = 1;
						if($_POST['dic'] == 1){
							if($uid[3] > $_POST['din']){
								$ok = 0;
							}
						}
						if($_POST['ddc'] == 1){
							if($uid[3] < $_POST['ddn']){
								$ok = 0;
							}
						}
						if($ok == 0){
							if($_POST['dmr'] == 2){
								memad($uid);
							}
						}else{
							memad($uid, 2);
						}
					}else{*/
						$req->open("POST","http://www.orkut.com/CommMembers.aspx?cmm=".$cmm."&tab=4");
						$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
						$req->send("POST_TOKEN=".$abc."&signature=".$abc1."&memberId=".$uid[2]."&Action.declinePending=Submit+Query");
						echo '<p><a href="http://www.orkut.com/Profile.aspx?uid='.$uid[2].'">'.$uid[1].'</a> (<a href="http://www.orkut.com/FriendsList.aspx?uid='.$uid[2].'">'.$uid[3].' Friends</a>) - Declined. <a href="http://www.orkut.com/CommMemberManage.aspx?cmm='.$cmm.'&uid='.$uid[2].'">Moderate</a> Member.</p>';
					//}
                                        flush();
                                        sleep(1);
                                }else{
                                        $hjk = 1;
                                        echo "Please select an option from Accept or Deny all in the previous page.";
                                        break;
                                }
                        }else{
                            $hjk = 1;
                            break;
                        }
                } while ($hjk == 0);
        }else{
                echo "E-Mail ID not Working!<br>";
        }
}else{
?>
<form method="POST">
	<div class="loltitleclassic"><b>Your Orkut EMail ID</b></div>
	<p><input type="text" name="email" size="40" value="Username"></p>
	<div class="loltitleclassic"><b>Password</b></div>
	<p><input type="password" name="pass" size="40" value = "Password"></p>
        <div class="loltitleclassic"><b>Community ID</b></div>
	<p><input type="text" name="cmm" size="40" value = "1"><br />You should be Owner/Co-Owner/Moderator of the Community.</p>
        <div class="loltitleclassic"><b>Accept or Decline</b></div>
	<p><input type="radio" checked="true" name="ad" value="1"<?php // onchange="if(this.checked==true){document.getElementById('ap').style.display='';document.getElementById('dp').style.display='none';}"?>>Accept All<br />
	<input type="radio" name="ad" value="2"<?php // onchange="if(this.checked==true){document.getElementById('ap').style.display='none';document.getElementById('dp').style.display='';}"?>>Decline All</p>
	<?php /*<div class="loltitleclassic"><b>Options</b></div>
	<p id="ap">
		<strong><input type="checkbox" checked="checked" name="ai" onchange="if(this.checked==true){document.forms[2].elements[6].disabled=false;document.forms[2].elements[7].disabled=false;document.forms[2].elements[8].disabled=false;document.forms[2].elements[9].disabled=false;document.forms[2].elements[10].disabled=false;document.forms[2].elements[11].disabled=false;}else{document.forms[2].elements[6].disabled=true;document.forms[2].elements[7].disabled=true;document.forms[2].elements[8].disabled=true;document.forms[2].elements[9].disabled=true;document.forms[2].elements[10].disabled=true;document.forms[2].elements[11].disabled=true;}">&nbsp;Accept if:</strong><br />
		<input type="checkbox" checked="true" name="aic" value="1" onchange="if(this.checked==true){document.forms[2].elements[7].disabled=false;}else{document.forms[2].elements[7].disabled=true;}">The Profile has <u>more</u> than&nbsp;&nbsp;<input type="text" name="ain" size="5" value="2">&nbsp;&nbsp;friend(s).<br />
		<strong><i>AND</i></strong><br />
		<input type="checkbox" name="adc" value="1" onchange="if(this.checked==true){document.forms[2].elements[9].disabled=false;}else{document.forms[2].elements[9].disabled=true;}">The Profile has <u>less</u> than&nbsp;&nbsp;<input type="text" name="adn" size="5" value="500">&nbsp;&nbsp;friend(s).<br />
		<br />
		If the profile doesn't meet these conditions, then:<br />
		<input type="radio" name="amr" value="1" checked="checked">&nbsp;Leave the Profile as it is in moderation.<br />
		<input type="radio" name="amr" value="2">&nbsp;Decline the Profile.
	</p>
	<p id="dp" style="display:none;">
		<strong><input type="checkbox" checked="checked" name="di" onchange="if(this.checked==true){document.forms[2].elements[13].disabled=false;document.forms[2].elements[14].disabled=false;document.forms[2].elements[15].disabled=false;document.forms[2].elements[16].disabled=false;document.forms[2].elements[17].disabled=false;document.forms[2].elements[18].disabled=false;}else{document.forms[2].elements[13].disabled=true;document.forms[2].elements[14].disabled=true;document.forms[2].elements[15].disabled=true;document.forms[2].elements[16].disabled=true;document.forms[2].elements[17].disabled=true;document.forms[2].elements[18].disabled=true;}">&nbsp;Decline if:</strong><br />
		<input type="checkbox" name="dic" value="1" onchange="if(this.checked==true){document.forms[2].elements[14].disabled=false;}else{document.forms[2].elements[14].disabled=true;}">The Profile has <u>more</u> than&nbsp;&nbsp;<input type="text" name="din" size="5" value="500">&nbsp;&nbsp;friend(s).<br />
		<strong><i>AND</i></strong><br />
		<input type="checkbox" checked="true" name="ddc" value="1" onchange="if(this.checked==true){document.forms[2].elements[16].disabled=false;}else{document.forms[2].elements[16].disabled=true;}">The Profile has <u>less</u> than&nbsp;&nbsp;<input type="text" name="ddn" size="5" value="2">&nbsp;&nbsp;friend(s).<br />
		<br />
		If the profile doesn't meet these conditions, then:<br />
		<input type="radio" name="dmr" value="1" checked="checked">&nbsp;Leave the Profile as it is in moderation.<br />
		<input type="radio" name="dmr" value="2">&nbsp;Accept the Profile.
	</p>*/?>
	<p align="left">&nbsp;</p>
	<p align="left"><input type="submit" value="Submit" name="B1">
        &nbsp;
        <input type="reset" value="Reset" name="B2"></p>
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
<div class="loltitleclassic"><b>Important Note</b></div>
<p>We do not store your account details anywhere in accept/decline community members. Please read our <a href="http://www.orkutplus.net/privacy-policy">Privacy policy</a> and our <a href="http://www.orkutplus.net/disclaimer">Disclaimer</a> if you have any questions or concerns.</p>
<div class="loltitleclassic"><b>See Other Tools By Orkut Plus!</b></div>
<p>We are adding new tools every now and then in our <a href="http://www.orkutplus.net/orkut-toolkit">Official Orkut Toolkit</a>. Please navigate to <a href="http://www.orkutplus.net/orkut-toolkit">this page</a> to see the other tools.</p><br>
<?php endif; $adcount++; ?>
<?php $adcount++; ?>
<div style="clear: both"></div></div></div>
</div></div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
</div> <!-- close page container-->
<?php include("../blog/wp-content/themes/op/footer.php"); ?>
