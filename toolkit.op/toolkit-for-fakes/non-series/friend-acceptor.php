<?php
$pg_title = "Friend Acceptor (Non - Series)";
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
if($_POST['ids'] != NULL){
	load_curl();
	$req = new XMLHttpRequest();
	$ids = explode("\n",$_POST['ids']);
	foreach($ids as $id){
		$email = explode(":", $id);
		$c_email = $email[0];
		$pass = trim($email[1]);
		$user_inf = orkut_login($c_email, $pass);
		if ($user_inf['ud_post_token'] != NULL)
		{
			$req->open("GET","http://www.orkut.com/Home.aspx");
			$req->setRequestHeader("Cookie",$user_inf['cookie']);
			$req->send(null);
			preg_match('/new\ friend\ requests\ \<span\ class\=\"headernote\"\>\((.*?)\)\<\/span\>/i', $req->responseText, $noreq);
			$noreq = $noreq[1];
			if ($noreq != NULL){
				for($x=1;$x<=$noreq;$x++)
				{
					$req->open("GET","http://www.orkut.com/Home.aspx");
					$req->setRequestHeader("Cookie",$user_inf['cookie']);
					$req->send(null);
					preg_match('/friendRequestUserId\"\ value\=\"(.*?)\"\ \/\>/i', $req->responseText,$uids);
					$req->open("POST","http://www.orkut.com/Home.aspx");
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
					$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&groupSelection.submitted=1&sec0-groupName=&friendRequestUserId=".$uids[1]."&Action.acceptFriend=Submit+Query");
					echo $c_email.": UID - <a href=\"http://www.orkut.com/Profile.aspx?uid=".$uids[1]."\">".$uids[1]."</a> Accepted<br />";
				}
			}else{
				echo $c_email.": No Friend Requests<br />";
			}
        }else{
            echo $c_email.": ID not working<br />";
        }
    }
}else{ ?>
<form method="post">
	<?php
	include("../../includes/form/fake_non_series_login.php");
	include("../../includes/form/submit.php");
	?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>