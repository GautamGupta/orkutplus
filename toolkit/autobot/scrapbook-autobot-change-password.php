<?php $title = "Scrapbook Autobot - Change Password"; ?>
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
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['newpass'])){
        mysql_connect("localhost","admin","okdokiegdnp@512");
        mysql_selectdb("op_toolkit_db");
        $query = mysql_query("SELECT * from sbab_users WHERE user='".$_POST['user']."'");
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
        }
        if($check == $_POST['user']){
                if($check2==$_POST['pass']){
                        require('class.XMLHttpRequest.php');
                        $req = new XMLHttpRequest();
                        $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['user']."&Passwd=".$_POST['newpass']."&service=orkut&skipvpage=true&sendvemail=false");
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
                                preg_match('/\<a\ \ accesskey\=\"p\"\ href\=\"\/Profile.aspx\?uid\=(.*?)\"\>Profile\<\/a\>/i', $req->responseText, $uid);
                                if($lol[0][1] != NULL){
                                        mysql_connect("localhost","admin","okdokiegdnp@512");
                                        mysql_selectdb("op_toolkit_db");
                                        $query = mysql_query("SELECT * from sbab_users WHERE user='".$_POST['user']."'");
                                        while($row=mysql_fetch_array($query))
                                        {
                                        	$check=$row['user'];
                                        }
                                        if($check == $_POST['user']){
                                                mysql_query("UPDATE `op_toolkit_db`.`sbab_users` SET `pass` = '{$_POST['newpass']}' WHERE `sbab_users`.`user` = '{$_POST['user']}';");
                                                echo 'Your Password has been changed.';
                                        }else{
                                                echo "ID doesn't exist";
                                        }
                                }else{
                                        echo "ID or New Password not working. Password cannot be changed.";
                                }
                        }else{
                                echo "New Password is wrong. Password cannot be changed.";
                        }
                }else{
                      echo "Old Password is Wrong. Please enter correct password.";
                }
        }else{
                echo "ID doesn't exist";
        }
}else{ ?>
<form method="POST">
	<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
	<input type="text" name="user" size="34" value="example@domain.com"></p>
	<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail ID's Password</b></div><br>
	<input type="password" name="pass" size="34" value = "Password"></p>
	<p align="left"><div class="loltitleclassic"><b>Your Orkut E-mail ID's New Password</b></div><br>
	<input type="password" name="newpass" size="34" value = "NewPassword"></p>
	<p align="left">&nbsp;</p>
	<p align="left"><input type="submit" value="Change Password" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="http://www.orkutplus.net/toolkit/autobot/scrapbook-autobot-signup.php">Back to the Control Panel</a></p>
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
