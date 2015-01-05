<?php $title = "ReadMail Code Generator!"; ?>
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
$rootpath = 'http://www.orkutplus.net/toolkit/readmail';
$domain =  'http://www.orkutplus.net/';
$filenmpass = $_REQUEST['id'].$_REQUEST['dom'];
$myFile = "$filenmpass.txt";
$username = $_REQUEST['id'];
$Welcome = 'IP Logger of OrkutPlus';
$timendate = date("M d Y H:i:s");
$emailadd = $_REQUEST['id'].'@'.$_REQUEST['dom'];
$id = $_REQUEST['id'];
$sub = "&subj=".$_REQUEST['sub'];
//$osp = "&osp=".$_REQUEST['osp'];
//$bro = "&bro=".$_REQUEST['bro'];
$dom = $_REQUEST['dom'];
$sip = $_REQUEST['ipt'];
$fh = fopen($myFile, 'a');
$stringData = "\n\n$Welcome $username for fun,\nScript by OrkutPlus.\nGenerated on $timendate \n\n";
fwrite($fh, $stringData);
fclose($fh);
$log = date("MDY");
$fh = fopen("$log", 'a');
$stringData = "$username $timendate $IP \n";
fwrite($fh, $stringData);
fclose($fh);
?>Embed this code in your scrapbook:<br><br>
<textarea readonly='readonly' onclick='this.focus(); this.select();' rows='4' cols='50'><br><center><a href='<?php echo $rootpath."/"; ?>'><b>Click here for More!</b><br><img src='<?php echo $rootpath; ?>/view.jpg?id=<?php echo $id; ?>&dom=<?php echo $dom; ?>&ser=<?php echo $sip.$sub; ?>'></a></textarea>
<br>
  <br>
  <a href='index.php'>Back</a><Br>
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
