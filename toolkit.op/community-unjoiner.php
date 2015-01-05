	<style type="text/css" media="screen">
	<!--
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style-core.css);
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style.css);
		-->
	</style>

<?php
error_reporting(0);
include("../blog/wp-config.php");
$oldBlogURL = "orkutplus.blogspot.com";
$ref = $_SERVER['HTTP_REFERER'];
$refarr = explode("/", $ref);

	if ($refarr[2] == $oldBlogURL ){
		$bloggerurl = '\/'.$refarr[3].'\/'.$refarr[4].'\/'.$refarr[5];
		$sqlstr = "
			    SELECT wposts.guid 
			    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			    WHERE wposts.ID = wpostmeta.post_id 
			    AND wpostmeta.meta_key = 'blogger_permalink' 
			    AND wpostmeta.meta_value = '".$bloggerurl."'
			 ";             
		$wpurl = $wpdb->get_results($sqlstr, ARRAY_N);
		if ($wpurl){
			header( 'Location: '.$wpurl[0][0].' ') ;
                        exit;
		}
	}
?>

<?php include("../blog/wp-content/themes/op/header.php"); ?>

<div id="page_container">

<?php include("../blog/wp-content/themes/op/sidebar.php"); ?>
<?php include("../blog/wp-content/themes/op/leftbar.php"); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
			<div class="rbcontent">

<div id="postcol" class="fixheight">
 <?php $adcount = 1; ?>
<div class="post_title">
		<h2 id="post-unjoincomm" class="title"><a href="http://orkutplus.net/toolkit/community-unjoiner.php" rel="bookmark">[PHP]&nbsp;Community Unjoiner - Select and Unjoin Orkut Communities</a></h2>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
   </div> 
<div class="content">
	<div style="padding-left:0px; padding-top:15px">
<?php 
if(isset($_POST['email']))
{
	require('class.XMLHttpRequest.php');
	$req = new XMLHttpRequest();
	$req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['email']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false");
	$req->send(null);
	preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
	$req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
	$req->send(null);
	preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
	if ($orkut_state[0] != NULL)
	{
		$req->open("GET","http://www.orkut.com/Communities.aspx");
		$req->setRequestHeader("Cookie",$orkut_state[0]);
		$req->send(null);
		preg_match_all('/\<a\ \ href\=\"\/Main\#Community\.aspx\?cmm\=(.*?)\<\/a\>/i', $req->responseText,$cmm,PREG_SET_ORDER);
		$size = sizeof($cmm);
                $size = $size - 2;
		echo '<form method="POST" action="unjoin-communities.php"><input type="hidden" name="email" value="'.$_POST["email"].'"><input type="hidden" name="pass" value="'.$_POST["pass"].'"><input type="text" name="cmm">&nbsp;(List of Communities, Please do not Edit)<br><br>Please Check the Communities which you want to Unjoin:<br><b>Please Note</b> - Checkboxes once Checked cannot be Unchecked.<br>';
		for($s=0;$s<=$size;$s++){
                        $c1 = explode('" >', $cmm[$s][1]);
                        $c2 = ":".$c1[0];
                        $c3 = $c1[1];
			?>
			<input type="checkbox" name="cmm<?php echo $s; ?>" id="cmm<?php echo $s; ?>" onclick="if(document.forms[2].elements[<?php echo $s+3; ?>].checked==true){document.forms[2].elements[2].value=document.forms[2].elements[2].value+'<?php echo $c2; ?>';document.forms[2].elements[<?php echo $s+3; ?>].disabled=true;void(0);}">&nbsp;<a href="http://www.orkut.com/Community.aspx?cmm=<?php echo $c1[0]; ?>"><?php echo $c3; ?></a> - Comm #<?php echo $c1[0]; ?><br>
			<?php
		}
		echo '<br><input type="submit" name="submit" value="Unjoin!">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset!"></form>';
	}else{
		echo "ID not working<br>";
	}
}else{ 
?>
<form method="POST" action="community-unjoiner.php">
				<div class="loltitleclassic"><b>Orkut E-Mail ID</b></div>
				<p><input type="text" name="email" size="40" value="Username"></p>
                                <div class="loltitleclassic"><b>Password</b></div>
				<p><input type="password" name="pass" size="40" value = "Password"></p>
				<p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Log In" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p></div>
</form>
	<?php } ?>
		<?php if ($adcount == 1) : ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>


		</div> 
		<?php $adcount++; ?>


		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../blog/wp-content/themes/op/footer.php"); ?>