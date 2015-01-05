<?php
$pg_title = "Alive Fakes Checker (Non - Series)";
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
	echo "Working IDs are:<br />";
	$ids = explode("\n",$_POST['ids']);
	foreach($ids as $id){
		$email = explode(":", $id);
		$c_email = $email[0];
		$pass = trim($email[1]);
		$user_inf = orkut_login($c_email, $pass);
		if ($user_inf['ud_post_token'] != NULL){
			echo $c_email.":".$pass."<br />";
		}
	}
}else{ 
?>
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