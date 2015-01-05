<?php $title = "Scrapbook Autobot - View Scraps!"; ?>
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
if(isset($_POST['user']) && isset($_POST['pass'])){
        mysql_connect("localhost","admin","okdokiegdnp@512");
        mysql_selectdb("op_toolkit_db");
        $query = mysql_query("SELECT * from sbab_users WHERE user='".$_POST['user']."'");
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
        }
        if($check == $_POST['user'] && $check2==$_POST['pass']){
		$query2 = mysql_query("SELECT * from sbab_scraps WHERE user='".$_POST['user']."'");
                $s = "0";
		while($row=mysql_fetch_array($query2))
		{
                        $s++;
                        ?><form method="POST" action="scrapbook-autobot-scrap-delete.php">
                        <input type="hidden" name="sno" value="<?php echo $row['sno']; ?>">
                        <input type="hidden" name="user" value="<?php echo $row['user']; ?>">
                        <input type="hidden" name="pass" value="<?php echo $row['pass']; ?>">
		     	 <?php echo $row['scrap']; ?><p align="right"><input type="submit" value="Delete Scrap" name="B1"></p><br><br>
                         </form><?php
		}
                if($s<=0){
                        echo "No scraps found. You have not received any new scraps.<br><br>";
                }
        }else{
		echo "ID doesn't exist";
        }
}else{ ?>
<form method="POST">
	<p align="left">&nbsp;</p>
	<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
	<input type="text" name="user" size="34" value="example@domain.com"></p>
	<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail ID's Password</b></div><br>
	<input type="password" name="pass" size="34" value = "Password"></font></p>
	<p align="left">&nbsp;</p>
	<p align="left"><input type="submit" value="View Scraps" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">Back to the Control Panel</a></p>
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
