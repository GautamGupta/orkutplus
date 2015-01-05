<?php
session_start();
$pg_title = "Community Unjoiner - Select & Unjoin Multiple Communities at one time!";
require_once("../includes/connection.php");
require_once("../includes/theme/functions.php");
include("../includes/theme/header.php");
?>
<div id="container">
<div id="left-div">
<div id="left-inside">
<div class="home-post-wrap2">
<h2 class="titles"><a href="<?php echo current_url(); ?>"><?php echo $pg_title; ?></a></h2>
<div class="post-info" style="width: 480px !important;"><?php echo g_translate(); ?><br />Advertisement</div>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu post top 336x280, created 5/26/09 */
google_ad_slot = "9944513892";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
<div style="clear:both;"></div>
<?php 
if($_POST['email'] != NULL && $_POST['pass'] != NULL)
{
	load_curl();
	$req = new XMLHttpRequest();
	$user_inf = orkut_login($_POST['email'], $_POST['pass']);
	if ($user_inf['ud_post_token'] != NULL)
	{
		$req->open("GET","http://www.orkut.com/Communities.aspx");
		$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
		$req->send(null);
		preg_match_all('/\<a\ \ href\=\"\/Main\#Community\.aspx\?cmm\=(.*?)\"\ \>/i', $req->responseText,$cmm,PREG_SET_ORDER);
		$size = sizeof($cmm);
		$size = $size - 2;
		for($s=0;$s<=$size;$s++){
			if($_POST[$cmm[$s][1]] == "on"){
				$req->open("POST","http://www.orkut.com/CommunityUnjoin.aspx?cmm=".$cmm[$s][1]);
				$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				$req->setRequestHeader("Cookie", "TZ=-330;".$user_inf['cookie']);
				$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&Action.unjoin=Submit+Query");
				echo "Community #<a href='http://www.orkut.com/Community.aspx?cmm=".$cmm[$s][1]."'>".$cmm[$s][1]."</a> Unjoined.<br />";
			}
		}
	}else{
		echo "Email ID not working.<br />";
	}
	echo "<br />";
}else{ 
?>
<script>window.location='community-unjoiner.php';</script>
<?php
}
include("../includes/notice.php");
?>
<div style="clear:both;"></div>
</div>
</div>
</div>
<?php
include("../includes/theme/sidebar.php");
include("../includes/theme/footer.php");
?>