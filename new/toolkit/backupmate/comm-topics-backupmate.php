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
                <div id="postcol">
                    <?php $adcount = 1; ?>
                    <div class="post_title">
        		<h2 id="post-proedit" class="title"><a href="http://orkutplus.net/toolkit/comm-topics-backupmate.php" rel="bookmark">[PHP]&nbsp;Community BackupMate</a></h2>
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
                            if(isset($_GET['email']))
                            {?>
                                <center><div class="loltitleclassic"><b><a href="comm-topics-backupmate-plain.php?email=<?php echo $_GET['email']; ?>&pass=<?php echo $_GET['pass']; ?>&cmm=<?php echo $_GET['cmm']; ?>&pg=<?php echo $_GET['pg']; ?>">View as Plain HTML</a>&nbsp;|&nbsp;<a href="comm-topics-backupmate-plain.php?email=<?php echo $_GET['email']; ?>&pass=<?php echo $_GET['pass']; ?>&cmm=<?php echo $_GET['cmm']; ?>&pg=<?php echo $_GET['pg']; ?>&dl=1">Download Backup</a></b></div></center><br>
                                <iframe src="comm-topics-backupmate-plain.php?email=<?php echo $_GET['email']; ?>&pass=<?php echo $_GET['pass']; ?>&cmm=<?php echo $_GET['cmm']; ?>&pg=<?php echo $_GET['pg']; ?>" height=100% width="100%" frameborder="0" allowtransparency="true"></iframe><br><br>
                            <?php
                            }else{ 
                            ?>
                                <form method="GET">
                                <div class="loltitleclassic"><b>Orkut Email ID</b></div>
                                <p><input type="text" name="email" size="40" value="example@orkutplus.net"></p>
                                <div class="loltitleclassic"><b>Password</b></div>
                                <p><input type="password" name="pass" size="40" value = "Password"></p>
                                <div class="loltitleclassic"><b>Community ID</b></div>
                                <p><input type="text" name="cmm" size="40" value = "1"></p>
                                <div class="loltitleclassic"><b>No. of Pages to Backup</b></div>
                                <p><input type="text" name="pg" size="40" value = "2"> - <strong>Now Backup as Many Pages as You want To!</strong> Min. - 1.</p>
                                <p align="left">&nbsp;</p>
                                <p align="left"><input type="submit" value="Create Backup" name="B1">&nbsp;<input type="Reset" value="Reset" name="B2"></p></div>
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
<?php $adcount++; ?>
<div style="clear: both"></div></div></div>
</div></div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
</div> <!-- close page container-->
<?php include("../blog/wp-content/themes/op/footer.php"); ?>