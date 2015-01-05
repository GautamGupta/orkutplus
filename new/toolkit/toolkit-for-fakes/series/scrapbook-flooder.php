<?php
$pg_title = "Scrapbook Flooder (Series)";
require_once("../../includes/connection.php");
require_once("../../includes/functions.php");
include("../../includes/header.php");
include("../../includes/leftbar.php");
?>
<div class="post_title">
<h2 class="title"><a href="<?php echo current_url(); ?>"><?php echo $pg_title; ?></a></h2>
<small class="title"><?php echo g_translate(urlencode(current_url())); ?></small>
</div>
<div class="content">
<?php include("../../includes/ads/contentarea.php"); ?>
<?php
if($_POST['email'] != NULL && $_POST['nf'] != NULL && $_POST['nl'] != NULL && $_POST['pass'] != NULL && $_POST['ne'] != NULL  && $_POST['scrap'] != NULL){
	load_curl();
	$req = new XMLHttpRequest();
	for($n=$_POST['nf'];$n<=$_POST['nl'];$n++)
	{
		$c_email = $_POST['email'].$n.$_POST['domain'];
		$user_inf = orkut_login($c_email, $_POST['pass']);
		if ($user_inf['ud_post_token'] != NULL)
		{
			echo $c_email.": Logged in.<br />";
			$req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$_POST['uid']);
			$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
			for($s=1;$s<=$_POST['ne'];$s++)
			{
				$s1 = urlencode("[silver] ".$s."[/silver] \n\n");
				$s3 = urlencode($_POST['scrap']);
				$scrap = $s1.$s3;
				$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&scrapText={$scrap}&replyToken=&&Action.submit=1");
				$result = trim($req->responseText);
				preg_match('/src\=\"\/CaptchaImage\.aspx\?xid\=(.*?)\"\ /i', $result, $xid);
				preg_match("error (.*?)", $result, $error);
				if($result == "ok"){
					echo $c_email.": Scrap Number: ".$s." was scrapped.<br />";
				}elseif($xid[1] != NULL){
					echo $c_email.": Scrap Number: ".$s." was <i>NOT</i> scrapped. <u>Error</u>: Captcha Faced.<br />";
					if($_POST['error'] == "on"){
						echo $c_email.": Logging out because Error faced.<br />";
						break;
					}
				}else{
					echo $c_email.": Scrap Number: ".$s." was <i>NOT</i> scrapped. <u>".$result."</u><br />";
					if($_POST['error'] == "on"){
						echo $c_email.": Logging out because Error faced.<br />";
						break;
					}
				}
				if($_POST['int'] != NULL){
					sleep($_POST['int']);
				}else{
					sleep(0.2);
				}
			}
			echo $c_email.": Logged out.<br />";
		}else{
			echo $c_email.": ID not working<br />";
		}
	}
}else{ 
?>
<form method="post">
<?php include("../../includes/form/fake_series_login.php"); ?>
<div class="loltitleclassic"><b>Scrap Text</b></div>
<p><textarea rows="4" name="scrap" style="width:99.2%;">I Love Orkut Plus!</textarea></p>
<div class="loltitleclassic"><b>Number Of Scraps</b></div>
<p><input type="text" name="ne" style="width:99.2%;" value="5"></p>
<div class="loltitleclassic"><b>UID to Flood</b></div>
<p><input type="text" name="uid" style="width:99.2%;" value="12345678901234567890"></p>
<div class="loltitleclassic"><b>Interval (Optional) (In Seconds) (Default - 0.2)</b></div>
<p><input type="text" name="int" style="width:99.2%;" value="0.2"></p>
<div class="loltitleclassic"><b>Options</b></div>
<p><input type="checkbox" name="error" checked="checked">&nbsp;Logout Fake if any error faced. (If checked (Recommended), then avoids banning of fake profile.)</p>
<?php include("../../includes/form/submit.php"); ?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>