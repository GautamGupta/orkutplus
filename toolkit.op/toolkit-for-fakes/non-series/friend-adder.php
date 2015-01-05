<?php
$pg_title = "Friend Adder (Non - Series)";
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
if($_POST['ids'] != NULL && $_POST['uid'] != NULL){
	load_curl();
	$req = new XMLHttpRequest();
	$uid = explode(":",$_POST['uid']);
	$suid = sizeof($uid);
	$ids = explode("\n",$_POST['ids']);
	foreach($ids as $id){
		$email = explode(":", $id);
		$c_email = $email[0];
		$pass = trim($email[1]);
		$user_inf = orkut_login($c_email, $pass);
		if ($user_inf['ud_post_token'] != NULL)
		{
                        for($a=0;$a<$suid;$a++)
                        {
                                $req->open("POST","http://www.orkut.com/FriendAdd.aspx?uid=".$uid[$a]);
                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                $req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
                                $req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&sig=&groupSelection.submitted=1&sec0-groupName=&friendId=".$uid[$a]."&noteText=&Action.yes=Submit+Query");
				echo $c_email.": UID - <a href=\"http://www.orkut.com/Profile.aspx?uid=".$uid[$a]."\">".$uid[$a]."</a> Added<br />";
                                sleep(1);
                        }
                }else{
                        echo $c_email.": ID not working<br />";
                }
        }
}else{ ?>
<form method="post">
<?php include("../../includes/form/fake_non_series_login.php"); ?>
<div class="loltitleclassic"><b>UIDs to Add (Separted with &quot;:&quot; [without quotes])</b></div>
<p><input type="text" name="uid" style="width:99.2%;" value = "UID1:UID2:UID3"></p>
<?php include("../../includes/form/submit.php"); ?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>