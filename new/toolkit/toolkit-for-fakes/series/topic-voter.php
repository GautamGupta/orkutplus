<?php
$pg_title = "Topic Voter (Series)";
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
if($_POST['email'] != NULL && $_POST['nf'] != NULL && $_POST['nl'] != NULL && $_POST['pass'] != NULL && $_POST['cmm'] != NULL && $_POST['tid'] != NULL && $_POST['tcomment'] != NULL){
	load_curl();
	$req = new XMLHttpRequest();
	for($n=$_POST['nf'];$n<=$_POST['nl'];$n++)
	{
		$c_email = $_POST['email'].$n.$_POST['domain'];
		$user_inf = orkut_login($c_email, $_POST['pass']);
		if ($user_inf['ud_post_token'] != NULL)
		{
			if ($_POST['join'] == "on"){
				$req->open("POST","http://www.orkut.com/CommunityJoin.aspx?cmm=".$_POST['cmm']);
				$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
				$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&Action.join=Submit+Query");
				sleep(1);
			}
			$req->open("POST","http://www.orkut.com/CommMsgPost.aspx?cmm=".$_POST['cmm']."&tid=".$_POST['tid']);
			$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
			$abc2 = urlencode($_POST['tcomment']);
			$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&isAnonymous=0&subjectText=&bodyText=".$abc2."&Action.submit=Submit+Query");
			if ($_POST['unjoin'] == "on"){
				sleep(1);
				$req->open("POST","http://www.orkut.com/CommunityUnjoin.aspx?cmm=".$_POST['cmm']);
				$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
				$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&Action.unjoin=Submit+Query");
			}
			echo $c_email.": Voted<br />";
		}else{
			echo $c_email.": ID not working<br />";
		}
	}
}else{
?>
<form method="post">
<?php include("../../includes/form/fake_series_login.php"); ?>
<div class="loltitleclassic"><b>Community ID</b></div>
<p><input type="text" name="cmm" style="width:99.2%;" value = "1234567890"></p>
<div class="loltitleclassic"><b>Topic ID (TID)</b></div>
<p><input type="text" name="tid" style="width:99.2%;" value = "1234567890"></p>
<div class="loltitleclassic"><b>Text to Post</b></div>
<p><textarea rows="4" name="tcomment" style="width:99.2%;">Your Comment Here</textarea></p>
<div class="loltitleclassic"><b>Options</b></div>
<p><input type="checkbox" name="join" checked=true>&nbsp;Join Community</p>
<p><input type="checkbox" name="unjoin">&nbsp;Unjoin Community</p>
<?php include("../../includes/form/submit.php"); ?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>