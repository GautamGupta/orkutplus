<?php
$pg_title = "Auto Display Picture Uploader (Series)";
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
set_time_limit(0);
if($_POST['email'] != NULL && $_POST['nf'] != NULL && $_POST['nl'] != NULL && $_POST['pass'] != NULL){
        if((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 25600))
        {
                if ($_FILES["file"]["error"] > 0)
                {
                        echo "<b>Error: " . $_FILES["file"]["error"] . "</b><br />";
			include("../../includes/ads/contentarea.php");
			include("../../includes/footer.php");
                        exit;
                }else{
                        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                        $tt = "dp/".rand(100,1000).rand(1000,10000).$_FILES["file"]["name"];
                        move_uploaded_file($_FILES["file"]["tmp_name"], $tt);
			load_curl();
			$req = new XMLHttpRequest();
                        for($i=$_POST['nf'];$i<=$_POST['nl'];$i++){
				$c_email = $_POST['email'].$i.$_POST['domain'];
				$user_inf = orkut_login($c_email, $_POST['pass']);
				if ($user_inf['ud_post_token'] != NULL)
				{
                                        $post_data = array();
                                        $post_data['POST_TOKEN'] = $user_inf['ud_post_token'];
                                        $post_data['signature'] = $user_inf['ud_signature'];
                                        $post_data['Action.submitProfilePhoto'] = 1;
                                        $post_data['uploadPicture'] = "@".realpath($tt);
					$req->open("POST","http://www.orkut.com/EditSummary.aspx?m=1");
					$req->setRequestHeader("Content-type", "multipart/form-data");
					$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
					$req->send($post_data);
                                        $post_data2 = array();
                                        $post_data2['POST_TOKEN'] = $user_inf['ud_post_token'];
                                        $post_data2['signature'] = $user_inf['ud_signature'];
                                        $post_data2['Action.saveProfilePhoto'] = "Submit+Query";
					$req->open("POST","http://www.orkut.com/EditSummary.aspx?m=1");
					$req->setRequestHeader(null);
					$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
					$req->send($post_data2);
                                        echo $c_email.": DP Uploaded<br />";
                                        sleep(1);
                                }else{
                                        echo $c_email.": ID Not Working<br />";
                                }
                        }
                        unlink($tt);
                        echo "Delete: " . $_FILES["file"]["name"] . "<br />";
                }
        }else{
                echo "<b>Invalid uploaded file!</b><br />";
		include("../../includes/ads/contentarea.php");
		include("../../includes/footer.php");
                exit;
        }
}else{ ?>
<form method="post" enctype="multipart/form-data">
<?php include("../../includes/form/fake_series_login.php"); ?>
<div class="loltitleclassic"><b>Display Picture</b></div>
<p><input type="file" name="file" style="width:99.2%;"></p>
<p>Images are deleted after use.<br />Max File Upload Size: 25 KB<br />File Extensions Allowed: JPEG, GIF, PNG<br /><strong>Use Max 30 IDs at a time to avoid errors.</strong></p>
<?php include("../../includes/form/submit.php"); ?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>