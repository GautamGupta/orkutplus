<?php $title = "Scrapbook Autobot - Delete Account"; ?>
<?php require('../../wp-blog-header.php'); ?>
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
<?php
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['term'])){
        if($_POST['term'] != "i want to delete this service"){
                "You didn't enter the correct phrase to delete your ID. Please go back and try again.";
        }else{
                mysql_connect("localhost","admin","okdokiegdnp@512");
                mysql_selectdb("op_toolkit_db");
                $query = mysql_query("SELECT * from sbab_users WHERE user='".$_POST['user']."'");
                while($row=mysql_fetch_array($query))
                {
                	$check=$row['user'];
                        $check2=$row['pass'];
                }
                if($check == $_POST['user'] && $check2 == $_POST['pass']){
                        mysql_query("DELETE FROM `sbab_users` WHERE `sbab_users`.`user` = '{$_POST['user']}';");
                        mysql_query("DELETE FROM `sbab_scraps` WHERE `sbab_scraps`.`user` = '{$_POST['user']}';");
                        echo '<b>This Service for your account has been deactivated.<b> If you ever wish to re-activate this service, you will be required to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">sign up again</a>. Please leave your <a href="http://www.orkutplus.net/2008/09/autoscrap-reply-bot-set-and-send-auto-replies-to-your-sbab_scraps.html">feedback or suggestions</a>. Thanks for using this service and keep visiting Orkut Plus!';
                }else{
                        echo "Wrong ID or Password. Please go back and try again.";
                }
        }
}else{ ?>
<form method="POST">
	<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
	<input type="text" name="user" size="34" value="example@domain.com"></p>
	<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail-ID's Password</b></div><br>
	<input type="password" name="pass" size="34" value = "Password"></p>
	<p align="left">
	<div class="loltitleclassic"><b>Delete Service</b></div>
	<p align="left">Please Enter "<b>i want to delete this service</b>" without quotes to deactivate this service for your account.<br><br>
	<input type="text" name="term" size="40" value = "Enter the Phrase Here"></font></p>
	<p align="left">&nbsp;</p>
	<p align="left"><input type="submit" value="Delete" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">Back to the Control Panel</a></p>
	<p align="left">&nbsp;</p>
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
