<?php
$pg_title = "Profile Editor (Series)";
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
if($_POST['email'] != NULL && $_POST['nf'] != NULL && $_POST['nl'] != NULL && $_POST['pass'] != NULL && $_POST['fname'] != NULL && $_POST['lname'] != NULL && $_POST['abtme'] != NULL){
	load_curl();
	$req = new XMLHttpRequest();
	for($n=$_POST['nf'];$n<=$_POST['nl'];$n++)
        {
                $c_email = $_POST['email'].$n.$_POST['domain'];
		$user_inf = orkut_login($c_email, $_POST['pass']);
		if ($user_inf['ud_post_token'] != NULL)
		{
                        $req->open("POST","http://www.orkut.com/EditSummary.aspx");
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
                        $req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&firstName=".urlencode($_POST['fname'])."&lastName=".urlencode($_POST['lname'])."&gender=2&status=1&birthdayPrivacy=3&birthMonth=9&birthDay=20&birthYear=1980&birthYearPrivacy=0&city=Somewhere&state=SomeState&postalCode=&country=91&language1=152&language2=1&language3=128&language4=33&language5=0&language6=0&language7=0&language8=0&highSchool=&highSchoolState=0&education.1.school=&education.1.schoolPrivacy=0&company=&companyPrivacy=0&hereFor0=on&dating=&Action.update=Submit+Query");
                        sleep(1);
                        $req->open("POST","http://www.orkut.com/EditSocial.aspx");
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
                        $req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&kids=1&ethnicity=2&religion=0&political=1&humor.submitted=1&humor0=on&humor2=on&humor3=on&sexPref=0&sexPrefPrivacy=0&fashion.submitted=1&fashion0=on&fashion1=on&fashion8=on&fashion9=on&smoking=1&drinking=1&pets=3&living.submitted=1&living5=on&living6=on&living7=on&hometown=Delhi&webpageUrl=http%3A%2F%2Fwww.orkutplus.org&aboutMe=".urlencode($_POST['abtme'])."&passions=&sports=&activities=&books=&music=&shows=&movies=&cuisines=&Action.update=Submit+Query");
                        echo $c_email.": Profile Updated<br />";
                }else{
                        echo $c_email.": ID not working<br />";
                }
        }
}else{ 
?>
<form method="post">
<?php include("../../includes/form/fake_series_login.php"); ?>
<div class="loltitleclassic"><b>First Name</b></div>
<p><input type="text" name="fname" style="width:99.2%;" value = "Gautam"></p>
<div class="loltitleclassic"><b>Last Name</b></div>
<p><input type="text" name="lname" style="width:99.2%;" value = "OrkutPlus!"></p>
<div class="loltitleclassic"><b>About Me</b></div>
<p><textarea name="abtme" style="width:99.2%;">OrkutPlus Rulzz!!</textarea></p>
<?php include("../../includes/form/submit.php"); ?>
</form>
<?php
}
include("../../includes/ads/contentarea.php");
include("../../includes/notice.php");
include("../../includes/footer.php");
?>