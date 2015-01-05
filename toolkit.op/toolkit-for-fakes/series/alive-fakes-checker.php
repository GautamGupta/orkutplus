<?php
$pg_title = "Alive Fakes Checker (Series)";
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
if($_POST['email'] != NULL && $_POST['nf'] != NULL && $_POST['nl'] != NULL && $_POST['pass'] != NULL){
	load_curl();
	$req = new XMLHttpRequest();
	echo "Working IDs are (With Password - ".$_POST['pass']."):<br />";
	for($n=$_POST['nf'];$n<=$_POST['nl'];$n++)
	{
		$c_email = $_POST['email'].$n.$_POST['domain'];
		$user_inf = orkut_login($c_email, $_POST['pass']);
		if ($user_inf['ud_post_token'] != NULL)
		{
			echo $c_email."<br />";
		}
	}
}else{ 
?>
<form method="post">
	<?php
	include("../../includes/form/fake_series_login.php");
	include("../../includes/form/submit.php");
	?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>