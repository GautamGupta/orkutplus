<?php
session_start();
$pg_title = "Community Unjoiner - Select & Unjoin Multiple Communities at one time!";
require_once("../includes/connection.php");
require_once("../includes/theme/functions.php");
include("../includes/theme/header.php");
?>
<div id="container">
<div id="left-div">
<div id="left-inside">
<div class="home-post-wrap2">
<h2 class="titles"><a href="<?php echo current_url(); ?>"><?php echo $pg_title; ?></a></h2>
<div class="post-info" style="width: 480px !important;"><?php echo g_translate(); ?><br />Advertisement</div>
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
<?php 
if($_POST['email'] != NULL && $_POST['pass'] != NULL)
{
	load_curl();
	$req = new XMLHttpRequest();
	$user_inf = orkut_login($_POST['email'], $_POST['pass']);
	if ($user_inf['ud_post_token'] != NULL)
	{
		$req->open("GET","http://www.orkut.com/Communities.aspx");
		$req->setRequestHeader("Cookie",  "TZ=-330;".$user_inf['cookie']);
		$req->send(null);
		preg_match_all('/\<a\ \ href\=\"\/Main\#Community\.aspx\?cmm\=(.*?)\"\ \>/i', $req->responseText,$cmm,PREG_SET_ORDER);
		$size = sizeof($cmm);
		$size = $size - 2;
		echo '<form method="POST" action="unjoin-communities.php" name="unjoincmm" id="unjoincmm"><input type="hidden" name="email" value="'.$_POST["email"].'"><input type="hidden" name="pass" value="'.$_POST["pass"].'">Please Check the Communities which you want to Unjoin:<br /><input type="submit" name="submit" value="Unjoin Selected Communities!">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset!"><br /><a href="javascript:void(0);" onclick="for(i=0;i<document.forms[\'unjoincmm\'].elements.length;i++){document.forms[\'unjoincmm\'].elements[i].checked=true;}">Select All</a> | <a href="javascript:void(0);" onclick="for(i=0;i<document.forms[\'unjoincmm\'].elements.length;i++){document.forms[\'unjoincmm\'].elements[i].checked=false;}">Unselect All</a><br /><table>';
                for($s=0;$s<=$size;$s++){
			if($cmm[$s][1] != NULL){
				$req->open("GET","http://www.orkut.com/Community.aspx?cmm=".$cmm[$s][1]);
				$req->setRequestHeader("Cookie",  "TZ=-330;".$user_inf['cookie']);
				$req->send(null);
				preg_match('/\<a\ \ href\=\"\/Main\#Community\.aspx\?cmm\='.$cmm[$s][1].'\"\>\<img\ src\=\"(.*?)\"\ \ \ \>\n\<\/a\>/i', $req->responseText, $dp);
				preg_match('/<a\ \ href=\"\/Main\#Community\.aspx\?cmm='.$cmm[$s][1].'\"\>\<b\>(.*?)\<\/b\>\<\/a\>/i', $req->responseText, $cinf);
				preg_match_all('/\<p\ \ class\=\"listfl\"\>(.*?)\<\/p\>\n\<p\ \ class\=\"listp\"\>(.*?)\<\/p\>/i', $req->responseText,$all,PREG_SET_ORDER);
				if(($s % 2)==0){
					//even
					echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Community.aspx?cmm='.$cmm[$s][1].'"><img src="'.$dp[1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="left"><strong><input type="checkbox" name="'.$cmm[$s][1].'" />&nbsp;Unjoin <a href="http://www.orkut.com/Community.aspx?cmm='.$cmm[$s][1].'">'.$cinf[1].'</a></strong></p>';
				}else{
					//odd
					echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Community.aspx?cmm='.$cmm[$s][1].'"><img src="'.$dp[1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="left"><strong><input type="checkbox" name="'.$cmm[$s][1].'" />&nbsp;Unjoin <br /><a href="http://www.orkut.com/Community.aspx?cmm='.$cmm[$s][1].'">'.$cinf[$s][1].'</a></strong></p>';
				}
				flush();
				$asize = sizeof($all);
				echo "<p align=\"left\">";
				for($z=0;$z<=$asize;$z++){
					/*$rep = str_replace("/Main#", "http://www.orkut.com/", $all[$z][2]);
					$rep = str_replace("href=\"/", "href=\"http://www.orkut.com/", $rep);
					$rep = str_replace('javascript:void(0);" target="_blank" onclick="_linkInterstitial(&#39;', '', $rep);
					$rep = str_replace('&#39;); return false;', '', $rep);
					$rep = str_replace('\74wbr\76', '', $rep);
					$rep = str_replace('\<wbr\>', '', $rep);*/
					echo '<strong>'.strip_tags($all[$z][1]).'</strong>&nbsp;'.strip_tags($all[$z][2], "<br><p>").'<br />';
					flush();
				}
				echo '</p></td></tr>';
				flush();
			}
                }
		echo '</table>';
		echo '<br /><a href="javascript:void(0);" onclick="for(i=0;i<document.forms[\'unjoincmm\'].elements.length;i++){document.forms[\'unjoincmm\'].elements[i].checked=true;}">Select All</a> | <a href="javascript:void(0);" onclick="for(i=0;i<document.forms[\'unjoincmm\'].elements.length;i++){document.forms[\'unjoincmm\'].elements[i].checked=false;}">Unselect All</a><br /><input type="submit" name="submit" value="Unjoin Selected Communities!">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset!"><br /></form><br />';
	}else{
		echo "Email ID not working.<br />";
	}
}else{ 
?>
<form method="POST" action="community-unjoiner.php">
	<div class="loltitleclassic"><b>Your Orkut EMail ID</b></div>
	<p><input type="text" name="email" style="width:99.2%;" value="Username"></p>
	<div class="loltitleclassic"><b>Password</b></div>
	<p><input type="password" name="pass" style="width:99.2%;" value = "Password"></p>
	<div class="loltitleclassic"><b>Submit or Reset</b></div>
	<p align="left"><input type="submit" value="Select Communities to Unjoin!" name="submit">&nbsp;<input type="reset" value="Reset" name="B2"></p>
</form>
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