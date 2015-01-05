<?php
$pg_title = "Multiple Community Joiner (Series)";
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
if($_POST['email'] != NULL && $_POST['nf'] != NULL && $_POST['nl'] != NULL && $_POST['pass'] != NULL && $_POST['cmm'] != NULL){
	load_curl();
	$req = new XMLHttpRequest();
	$sepc = explode(":",$_POST['cmm']);
	$ssepc = sizeof($sepc);
	for($n=$_POST['nf'];$n<=$_POST['nl'];$n++)
	{
		$c_email = $_POST['email'].$n.$_POST['domain'];
		$user_inf = orkut_login($c_email, $_POST['pass']);
		if ($user_inf['ud_post_token'] != NULL)
		{
			for($c=0;$c<$ssepc;$c++)
			{
				$req->open("POST","http://www.orkut.com/CommunityJoin.aspx?cmm=".$sepc[$c]);
				$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
				$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&Action.join=Submit+Query");
				echo $c_email.": Community - <a href=\"http://www.orkut.com/Community.aspx?cmm=".$sepc[$c]."\">".$sepc[$c]."</a> Joined<br />";
				sleep(1);
			}
		}else{
			echo $c_email.": ID not working<br>";
		}
	}
}else{ 
?>
<form method="post">
<?php include("../../includes/form/fake_series_login.php"); ?>
<div class="loltitleclassic"><b>Communities to Join (Separted with &quot;:&quot; [without quotes])</b></div>
<p><input type="text" name="cmm" style="width:99.2%;" value = "Comm1:Comm2:Comm3"></p>
<?php include("../../includes/form/submit.php"); ?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>