<?php $title = "Community Backupmate - Backup your Community's Topics in a Single Click!"; ?>
<?php require('../blog/wp-blog-header.php'); ?>
<?php get_header(); ?>
<div id="container">
<div id="left-div">
<div id="left-inside">
<div class="post-wrapper">
<h2 class="titles"><a href="<?php echo current_url(); ?>" rel="bookmark" title="Permanent Link to <?php echo $title; ?>"><?php echo $title; ?></a></h2>
<div class="post-info" style="width: 480px !important;">&nbsp;Written by <REDACTED>&nbsp;|&nbsp;<a href="<?php echo current_url(1); ?>" class="brazil">&nbsp;Portugues</a><br />Advertisement</div>
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
<div style="clear: both;"></div>
<div class="single-entry">
<p>This tool will allow you to create backup of your community topics and allow you to save them so that interesting and important topics which your members shared with you do not bite the dust if an hacker hacks and deletes your community. If you face any problem you can refer to the official <a href="http://www.orkutplus.net/2008/10/community-backupmate-create-backup-of-your-community-topics.html">post for this tool</a> on the blog.</p>
<?php if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['cmm'])){ ?>
	<center><div class="loltitleclassic"><b><a href="comm-topics-backupmate-plain.php?email=<?php echo $_POST['email']; ?>&pass=<?php echo $_POST['pass']; ?>&cmm=<?php echo $_POST['cmm']; ?>&pg=<?php echo $_POST['pg']; ?>">View as Plain HTML</a>&nbsp;|&nbsp;<a href="comm-topics-backupmate-plain.php?email=<?php echo $_POST['email']; ?>&pass=<?php echo $_POST['pass']; ?>&cmm=<?php echo $_POST['cmm']; ?>&pg=<?php echo $_POST['pg']; ?>&dl=1">Download Backup</a></b></div></center><br>
	<iframe src="comm-topics-backupmate-plain.php?email=<?php echo $_POST['email']; ?>&pass=<?php echo $_POST['pass']; ?>&cmm=<?php echo $_POST['cmm']; ?>&pg=<?php echo $_POST['pg']; ?>" height=100% width="100%" frameborder="0" allowtransparency="true"></iframe><br><br>
<?php }else{ ?>
	<form method="POST">
		<div class="loltitleclassic"><b>Orkut Email ID</b></div>
		<p><input type="text" name="email" size="40" value="example@orkutplus.net"></p>
		<div class="loltitleclassic"><b>Password</b></div>
		<p><input type="password" name="pass" size="40" value="Password"></p>
		<div class="loltitleclassic"><b>Community ID</b></div>
		<p><input type="text" name="cmm" size="40" value = "1"></p>
		<div class="loltitleclassic"><b>No. of Pages to Backup</b></div>
		<p><input type="text" name="pg" size="40" value = "2"> - <strong>Now Backup as Many Pages as You want To!</strong> Min. - 1.</p>
		<p align="left"><input type="submit" value="Take Backup!" name="B1">&nbsp;<input type="Reset" value="Reset" name="B2"></p>
	</form>
<?php } ?>
</div>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu link post foot 468x15, created 5/26/09 */
google_ad_slot = "2511471179";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
<div style="clear:both;"></div>
<div class="loltitleclassic"><b>Important Note</b></div>
<p>We do not store your account details anywhere in this tool. Please read our <a href="http://www.orkutplus.net/privacy-policy">Privacy policy</a> and our <a href="http://www.orkutplus.net/disclaimer">Disclaimer</a> if you have any questions or concerns.</p>
<div class="loltitleclassic"><b>See Other Tools By Orkut Plus!</b></div>
<p>We are adding new tools every now and then in our <a href="http://www.orkutplus.net/orkut-toolkit">Official Orkut Toolkit</a>. Please navigate to <a href="http://www.orkutplus.net/orkut-toolkit">this page</a> to see the other tools.</p>
<p>
<!-- Google Custom Search Element -->
<div id="cse" style="width:100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1');
  google.setOnLoadCallback(function(){
    var cse = new google.search.CustomSearchControl();
    cse.enableAds('pub-1123855832779971');
    cse.draw('cse');
  }, true);
</script>
</p>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu link post foot 468x15, created 5/26/09 */
google_ad_slot = "2511471179";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
<div style="clear: both;"></div>
</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>
</body>
</html>
