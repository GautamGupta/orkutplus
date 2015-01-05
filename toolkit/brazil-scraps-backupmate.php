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
<h2 id="post-backupscraps" class="title"><a href="http://orkutplus.net/toolkit/brazil-scraps-backupmate.php" rel="bookmark">[PHP]&nbsp;Recados (Scraps) BackupMate (Para o Brasil) </a></h2>
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
if(isset($_POST['email']) && isset($_POST['pass']) && !is_null($_POST['email']) && !is_null($_POST['pass']))
{?>
<center><div class="loltitleclassic"><b><a href="brazil-scraps-backupmate-plain.php?email=<?php echo $_POST['email']; ?>&pass=<?php echo $_POST['pass']; ?>">Ver como HTML simples</a>&nbsp;|&nbsp;<i>Download - Coming Soon!</i></b></div></center><br>
<iframe src="brazil-scraps-backupmate-plain.php?email=<?php echo $_POST['email']; ?>&pass=<?php echo $_POST['pass']; ?>" height=100% width="100%" frameborder="0" allowtransparency="true"></iframe><br><br>
<?php
}else{
?>
		<form method="POST">
				<div class="loltitleclassic"><b>Seu Orkut E-Mail ID</b></div>
				<p><input type="text" name="email" size="40" value="exemplo@orkutplus.net"></p>
<div class="loltitleclassic"><b>Senha</b></div>
				<p><input type="password" name="pass" size="40" value = "Senha123"></font></p>
                (Por favor, aguarde ate que a pagina fica completamente carregado. Ira tambem param Orkut se apresenta "nao mais recados".)
                <p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Enviar" name="B1">&nbsp;<input type="reset" value="Redefinir" name="B2"></p></div>
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
<p><div class="loltitleclassic"><b>Important Note</b></div>
<p>We do not store your account details anywhere in Scrapbook Backupmate Brazil. Please read our <a href="http://www.orkutplus.net/privacy-policy">Privacy policy</a> and our <a href="http://www.orkutplus.net/disclaimer">Disclaimer</a> if you have any questions or concerns.</p>
<div class="loltitleclassic"><b>See Other Tools By Orkut Plus!</b></div>
<p>We are adding new tools every now and then in our <a href="http://www.orkutplus.net/orkut-toolkit">Official Orkut Toolkit</a>. Please navigate to <a href="http://www.orkutplus.net/orkut-toolkit">this page</a> to see the other tools.</p></p><br>
<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>


		</div> 
		<?php $adcount++; ?>


		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../blog/wp-content/themes/op/footer.php"); ?>