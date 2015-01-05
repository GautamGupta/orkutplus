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
<h2 id="post-backupscraps" class="title"><a href="http://orkutplus.net/toolkit/brazil-scraps-backupmate.php" rel="bookmark">[PHP]&nbsp;Recados BackupMate (Para o Brasil)</a></h2>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 300x250, created 9/1/08 */
google_ad_slot = "7817929940";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
   </div> 
<div class="content">
	<div style="padding-left:40px; padding-top:15px">
<?php
if(isset($_POST['email']) && isset($_POST['pass']) && !is_null($_POST['email']) && !is_null($_POST['pass']))
{?>
<center><div class="loltitleclassic"><b><a href="brazil-scraps-backupmate-plain.php?email=<?php echo $_POST['email']; ?>&pass=<?php echo $_POST['pass']; ?>">Ver como HTML simples</a>&nbsp;|&nbsp;<i>Download - Coming Soon!</i></b></div></center><br>
<iframe src="brazil-scraps-backupmate-plain.php?email=<?php echo $_POST['email']; ?>&pass=<?php echo $_POST['pass']; ?>" height=100% width="100%" frameborder="0" allowtransparency="true"></iframe><br><br>
<?php
}else{
?>
		<form method="POST">
				<p align="left"><font size="2" face="Tahoma">Seu Orkut E-Mail ID:
				<input type="text" name="email" size="22" value="exemplo@orkutplus.net"></font></p>
				<p align="left"><font face="Tahoma" size="2">
					
Senha:
				<input type="password" name="pass" size="34" value = "Senha123"></font></p>
				<p align="left">&nbsp;</p>
                (Por favor, aguarde até que a página fica completamente carregado. Irá também param Orkut se apresenta "não mais recados".)
                <p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Enviar" name="B1">&nbsp;<input type="reset" value="Redefinir" name="B2"></p></div>
				<p align="left">&nbsp;</p></form>
	<?php } ?>
		<?php if ($adcount == 1) : ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>
&nbsp;&nbsp;&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>

		<hr color="#e6e6e6" size="1">
		</div> 
		<?php $adcount++; ?>


		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../blog/wp-content/themes/op/footer.php"); ?>