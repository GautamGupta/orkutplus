<?php $title = "Mass Delete Friends!"; ?>
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
<p>This tool will remove all friends from your friend lists in no time. This can come in handy if your session cookies are being misused and the malicious user is sending vulgar scraps to your friends. This tool can also come in handy if you have added 1000 friends and now feel there are too many friends in your friend list and wish to remove them. If you face any problem you can refer to the official <a href="http://www.orkutplus.net/2008/10/mass-delete-friends-empty-your-friendlist-in-no-time.html">post for this tool</a> on the blog.</p>
<?php
if(isset($_POST['email']) && isset($_POST['pass'])){
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
            $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send(null);
            preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
            preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
            $abc = urlencode($lol[0][1]);
            $abc1 = urlencode($lol1[0][1]);
            $req->open("GET","http://www.orkut.com/ShowFriends.aspx");
            $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
            $req->send(null);
            preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
            $pgs = $pgs[1] /20;
            $pgs = ceil($pgs);
            for($a=0;$a<=$pgs;$a++)
            {
                $req->open("GET","http://www.orkut.com/ShowFriends.aspx");
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send(null);
                preg_match_all('/\<input\ type=\"checkbox\"\ name=\"friendCheckbox\"\ value\=\"(.*?)\"\ id\=\"/i',$req->responseText,$frus,PREG_SET_ORDER);
                $fruss = "";
                $sfrus = sizeof($frus);
                for($x=0;$x<=$sfrus;$x++)
                {
                    $fruss .= "&friendCheckbox=".urlencode($frus[$x][1]);
                }
                $req->open("POST","http://www.orkut.com/ShowFriends.aspx");
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send("POST_TOKEN=".$abc."&signature=".$abc1.$fruss."&sec1-groupName=&inviteEmail=email+address&edit-firstname-input=&edit-lastname-input=&edit-email-input=&groupSelection.submitted=1&sec0-groupName=&contactFirstName=&contactLastName=&contactEmail=&contactPhone=&contactMobile=&contactLocation=&searchFriends=search+my+friends&actionMenu=removeFriends&Action.removeFriends=");
                sleep(1);
            }
            $req->open("GET","http://www.orkut.co.in/ShowFriends.aspx?show=contacts");
            $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
            $req->send(null);
            preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
            $pgs = $pgs[1] /20;
            $pgs = ceil($pgs);
            for($a=0;$a<=$pgs;$a++)
            {
                $req->open("GET","http://www.orkut.com/ShowFriends.aspx?show=contacts");
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send(null);
                preg_match_all('/onclick\=\"\_editContact\(\'(.*?)\'\,\ \'/i',$req->responseText,$frus,PREG_SET_ORDER);
                $fruss = "";
                $sfrus = sizeof($frus);
                for($x=0;$x<=$sfrus;$x++)
                {
                    $fruss .= "&friendCheckbox=".urlencode($frus[$x][1]);
                }
                $req->open("POST","http://www.orkut.com/ShowFriends.aspx?show=contacts");
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send("POST_TOKEN=".$abc."&signature=".$abc1.$fruss."&sec1-groupName=&inviteEmail=email+address&edit-firstname-input=&edit-lastname-input=&edit-email-input=&groupSelection.submitted=1&sec0-groupName=&contactName=&contactEmail=&contactPhone=&contactMobile=&searchFriends=search+my+contacts&Action.deleteContact=");
                sleep(1);
            }
            echo "Friend(s) Deleted<br>";
            flush();
        }else{
            echo "ID not working<br>";
            flush();
        }
}else{
?>
<form method="POST">
	<div class="loltitleclassic"><b>Orkut EMail ID</b></div>
	<p><input type="text" name="email" size="40" value="Username"></p>
	<div class="loltitleclassic"><b>Password</b></div>
	<p><input type="password" name="pass" size="40" value="Password"></p>
	<p align="left"><input type="submit" value="Delete All Friends!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
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
