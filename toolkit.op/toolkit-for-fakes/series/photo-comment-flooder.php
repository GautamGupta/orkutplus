<?php
$pg_title = "Photo Comment Flooder (Series)";
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
if($_POST['email'] != NULL && $_POST['nf'] != NULL && $_POST['nl'] != NULL && $_POST['pass'] != NULL && $_POST['com'] != NULL && $_POST['ne'] != NULL && $_POST['uid'] != NULL && $_POST['pid'] != NULL && $_POST['aid'] != NULL){
	load_curl();
	$req = new XMLHttpRequest();
	for($n=$_POST['nf'];$n<=$_POST['nl'];$n++)
	{
		$c_email = $_POST['email'].$n.$_POST['domain'];
		$user_inf = orkut_login($c_email, $_POST['pass']);
		if ($user_inf['ud_post_token'] != NULL)
		{
                        echo $c_email.": Logged in<br />";
                        $req->open("POST","http://www.orkut.com/AlbumZoom.aspx");
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
                        for($s=1;$s<=$_POST['ne'];$s++)
                        {
                                $s1 = urlencode(" ".$s);
                                $s3 = urlencode($_POST['com']);
                                $com = $s3.$s1;
                                $req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&com={$com}&Action.addComment=&aid={$_POST['aid']}&uid={$_POST['uid']}&pid={$_POST['pid']}&ploc=&oxh=1");
                                echo $c_email.": Comment Number #".$s." was posted.<br />";
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
<div class="loltitleclassic"><b>Comment Text</b></div>
<p><input type="text" name="com" style="width:99.2%;" value = "OrkutPlus Roxx!! (No Links Please)"></p>
<div class="loltitleclassic"><b>Number of Comments</b></div>
<p><input type="text" name="ne" style="width:99.2%;" value = "5"></p>
<div class="loltitleclassic"><b>UID *1</b></div>
<p><input type="text" name="uid" style="width:99.2%;" value = "12345678901234567890"></p>
<div class="loltitleclassic"><b>Picture ID *2</b></div>
<p><input type="text" name="pid" style="width:99.2%;" value = "1234567890"></p>
<div class="loltitleclassic"><b>Album ID *3</b></div>
<p><input type="text" name="aid" style="width:99.2%;" value = "1"></p>
<p><i>*1 -> http://www.orkut.com/Main#AlbumZoom.aspx?uid=<b><u>12345678901234567890</u></b>&pid=1234567890&aid=1$pid=1234567890<br /><br />
*2 -> http://www.orkut.com/Main#AlbumZoom.aspx?uid=12345678901234567890&pid=<b><u>1234567890</u></b>&aid=1$pid=1234567890<br /><br />
*3 -> http://www.orkut.com/Main#AlbumZoom.aspx?uid=12345678901234567890&pid=1234567890&aid=<b><u>1</u></b>$pid=1234567890</i><br /><br />
(Please Enter the Bold & Underlined Part in the fields assigned with that Number. Please Avoid Marginal Errors in Flooding Comments.)<br /><br />
<strong>The fakes should be in the friend list of the profile whose photo comments you are flooding.</strong></p>
<?php include("../../includes/form/submit.php"); ?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>