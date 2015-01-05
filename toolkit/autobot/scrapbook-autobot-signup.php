<?php $title = "Scrapbook Autobot - Signup!"; ?>
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
<p>AutoScrap Reply Bot is an exclusive service by Orkut Plus! which will allow
you to set an auto reply message which will be scrapped to orkut members who
send you a scrap. If you are facing any issues, please read our <a href="http://www.orkutplus.net/2008/09/autoscrap-reply-bot-set-and-send-auto-replies-to-your-scraps.html">help
guide</a> for the same.</p>
<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
    require('class.XMLHttpRequest.php');
    $req = new XMLHttpRequest();
    $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['user']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false");
    $req->send(null);
    preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
    $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
    $req->send(null);
    preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
    if($orkut_state[0] != NULL)
    {
        $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
	$req->setRequestHeader("Cookie",$orkut_state[0]);
	$req->send(null);
	preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
        preg_match('/\<a\ \ accesskey\=\"p\"\ href\=\"\/Main\#Profile.aspx\?uid\=(.*?)\"\>Profile\<\/a\>/i', $req->responseText, $uid);
	if($lol[0][1] != NULL){
                mysql_connect("localhost","admin","okdokiegdnp@512");
                mysql_selectdb("op_toolkit_db");
                $query = mysql_query("SELECT * from sbab_users WHERE user='".$_POST['user']."'");
                while($row=mysql_fetch_array($query))
                {
                	$check=$row['user'];
                }
                if($check == NULL){
                        $d = "";
                        if($_POST['del'] == "on"){
                                $d = "1";
                        }else{
                                $d = "0";
                        }
                        if($_POST['creply'] == "on")
                        {
                                mysql_query("INSERT INTO `op_toolkit_db`.`sbab_users` (`sno`, `user`, `pass`, `uid`, `del`, `reply`) VALUES (NULL, '{$_POST['user']}', '{$_POST['pass']}', '{$uid[1]}', '{$d}', '{$_POST['reply']}')");
                        }else{
                                mysql_query("INSERT INTO `op_toolkit_db`.`sbab_users` (`sno`, `user`, `pass`, `uid`, `del`) VALUES (NULL, '{$_POST['user']}', '{$_POST['pass']}', '{$uid[1]}', '{$d}')");
                        }
                        echo '<b>Thanks for registering with us.</b><br><br>Please embed this code in your scrapbook<br><textarea rows="4" name="embedcode" cols="40"><img src="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-embed.jpg?uid='.$uid[1].'"></textarea><br><br><div class="loltitleclassic"><b>Whats Next?</b></div><br>There are some important components of this auto-scrap reply autobot. All of them are listed below.<br><br><div class="loltitleclassic"><b>1 - Viewing Your Scraps</b></div><br> Once you add the embed the code in your scrapbook, your scraps are stored on your scraps control panel. You can manage your scraps by logging in to your <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-view-scraps.php">Scraps Control Panel</a><br><br><div class="loltitleclassic"><b>2 - Edit Account Settings</b></div><br> If you wish to edit your account details or the way you want this service to work, please log in with your account on <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-edit.php">Edit Settings Page</a>.<br><br><div class="loltitleclassic"><b>3 - Change Password</b></div><br> If you want to change your account password, please navigate to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-change-password.php">this page</a>. <br><br><div class="loltitleclassic"><b>4 - Delete Service</b></div><br> If you ever wish to deactivate this service, you can do the same my navigating to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-delete.php">Delete My Account Page</a>.<br>';
                }else{
                        echo '<b>Your ID is already registered.</b><br><br>Embed this code in your scrapbook<br><textarea rows="4" name="embedcode" cols="40"><img src="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-embed.jpg?uid='.$uid[1].'"></textarea><br><br><div class="loltitleclassic"><b>Whats Next?</b></div><br>There are some important components of this auto-scrap reply autobot. All of them are listed below.<br><br><div class="loltitleclassic"><b>1 - Viewing Your Scraps</b></div><br> Once you add the embed the code in your scrapbook, your scraps are stored on your scraps control panel. You can manage your scraps by logging in to your <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-view-scraps.php">Scraps Control Panel</a><br><br><div class="loltitleclassic"><b>2 - Edit Account Settings</b></div><br> If you wish to edit your account details or the way you want this service to work, please log in with your account on <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-edit.php">Edit Settings Page</a>.<br><br><div class="loltitleclassic"><b>3 - Change Password</b></div><br> If you want to change your account password, please navigate to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-change-password.php">this page</a>. <br><br><div class="loltitleclassic"><b>4 - Delete Service</b></div><br> If you ever wish to deactivate this service, you can do the same my navigating to <a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-delete.php">Delete My Account Page</a>.<br>';
                }
	}else{
                echo "<b>Wrong ID or Password.</b><br><br> <a href='http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php'>Please go Back</a> and enter correct account information.";
        }
    }else{
        echo "Wrong ID or Password. You cannot access this page.";
    }
}else{
?>
<p><center><strong>Ads Removed in Scraps! - New!</strong></center></p>
<form method="POST">
	<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
	<input type="text" name="user" size="34" value="example@domain.com"></p>
	<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail-ID's Password</b></div><br>
	<input type="password" name="pass" size="34" value = "Password"></p>
	<p align="left"><div class="loltitleclassic">Your Reply Message</div></p>
	<p align="left"><input type="checkbox" name="creply" checked=true onclick="javascript:if(document.forms[2].elements[2].checked==true){document.forms[2].elements[3].disabled=false;}else{document.forms[2].elements[3].disabled=true;}">Enter Reply Message</p>
	<p>Hi, (Name). <br><input type="text" name="reply" size="50" value = "Your Reply Here!"></p>
	<p><div class="loltitleclassic">Other Options</div></p>
	<p align="left"><input type="checkbox" name="del" checked=true> Delete Scraps (Recommended - <a href="http://www.orkutplus.net/2008/09/autoscrap-reply-bot-set-and-send-auto-replies-to-your-scraps.html">Why?</a>)</p>
	<p align="left"><input type="submit" value="Submit" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
	<p align="left">&nbsp;</p>
	<p align="left">* Your E-Mail IDs or Passwords will not be used in anyway except for this autobot or will not be sold. When you close this service for your ID, your information will automatically be deleted. Please read our <a href="http://www.orkutplus.net/2005/01/privacy-policy.html">privacy policy</a> if you have any questions. </p>
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
