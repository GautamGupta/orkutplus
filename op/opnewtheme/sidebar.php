<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>

<div id="sidebar">

<div class="sidebar-box">
<b><label>About Us</label></b>
<label><p><img src="http://<REDACTED>.com/files/<REDACTED>.png" alt="<REDACTED>" align="right"><a href="http://www.orkutplus.net/about"><REDACTED></a> (21) is an ECE Engineer and a MBA Aspirant. He comes from a business family based in Jammu, J&K - India</p><p align="left"></p>
</label>
<p><a href="http://www.orkut.co.in/Main#Profile.aspx?uid=6090387655098571394&"><img src="http://cdn.orkutplus.net/images/orkut.png"></a>&nbsp;&nbsp;<a href="http://www.facebook.com/<REDACTED>"><img src="http://<REDACTED>.com/files/facebook.png"></a>&nbsp;&nbsp;<a href="http://www.google.com/profiles/<REDACTED>"><img src="http://<REDACTED>.com/files/google.png" height="16px" width="16px"></a>&nbsp;&nbsp;<a href="http://www.linkedin.com/in/<REDACTED>1"><img src="http://<REDACTED>.com/files/linkedin.png"></a>&nbsp;&nbsp;<a href="http://twitter.com/gaurav_dua"><img src="http://<REDACTED>.com/files/twitter.png"></a>&nbsp;&nbsp;<a href="mailto:gaurav@<REDACTED>.com"><img src="http://<REDACTED>.com/files/email.png"></a></p>
</div>

<div class="sidebar-box">
<b><label>Stay Connected</label></b>

<center><p><div class="buttons2"><form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=OrkutPlus', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p><input type="text" style="float:left;width:165px;" value="Your email here.." onclick="this.value='';" name="email"/><input type="hidden" value="OrkutPlus" name="uri"/><input type="hidden" name="loc" value="en_US"/><button name="submit" type="submit" id="submit"><img src="http://<REDACTED>.com/wp-content/themes/GrungeMag/images/rss_feed.png" title="Subscribe to our RSS Feeds"/>Subscribe</button></div></form></p>
<br />
<p><a href="http://feeds.feedburner.com/OrkutPlus"><img src="/files/feed_cloud.png" width="40" height="40" /></a>&nbsp;<a href="http://feedburner.google.com/fb/a/mailverify?uri=OrkutPlus&amp;loc=en_US"><img src="/files/mail_cloud.png" width="40" height="40" /></a>&nbsp;<a href="#"><img src="/files/stumble_cloud.png" width="40" height="40" /></a>&nbsp;<a href="http://technorati.com/faves?add=http://orkutplus.net"><img src="/files/technorati_cloud.png" width="40" height="40" /></a>&nbsp;<a href="http://twitter.com/gaurav_dua"><a href="http://feeds.feedburner.com/OrkutPlus">&nbsp;&nbsp;<img src="http://feeds.feedburner.com/~fc/OrkutPlus?bg=eeeeee&amp;fg=333333&amp;anim=1" height="26" width="88" style="border:0px;padding-bottom:6px;" alt="Subscribe to our RSS Feeds!" /></a></p></center>
</div>

<div class="sidebar-box">
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu sb 250x250, created 5/26/09 */
google_ad_slot = "9177170293";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center></div>

<?php if (get_option('artsee_ads') == 'Enable') { ?>
<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
<?php } else { echo ''; } ?>

<p><div class="sidebar-box3">
<b><label>Advertisements</b></label>
<p align="center">
<script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu 120x600, created 6/23/09 */
google_ad_slot = "6100664605";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>
</div><div class="sidebar-box2">
<b><label>Sponsors</b></label>
<p><img src="http://<REDACTED>.com/files/ad5.gif"></p>
<p><img src="http://<REDACTED>.com/files/ad3.gif"></p>
<p><img src="http://<REDACTED>.com/files/ad4.gif"></p>
<p><img src="http://<REDACTED>.com/files/ad6.png"></p>
<center><b><a href="#">Advertise Here</a></b></center>
<br/><br/></div></p>

<p><div class="sidebar-box3">
<label><b>Browse Categories</b></label>
<ul>
<?php wp_list_categories('title_li='); ?>
</ul>
</div>
<div class="sidebar-box2">
<label><b>Post Archives</b></label>
<ul>
<?php wp_get_archives(); ?>
</ul>
</div><div class="sidebar-box2">
<label><b>Orkut Tookit</b></label>
<ul>
<li><a href="#">Scrap All</a></li>
<li><a href="#">AutoScrap Bot</a></li>
<li><a href="#">Read Mail</a></li>
<li><a href="#">Theme Generator</a></li>
<li><a href="#">Friend Acceptor</a></li>
<li><a href="#">Friend Rejector</a></li>
<li><a href="#">Backup Communities</a></li>
<li><a href="#">Delete Friends</a></li>
<li><a href="#">Profile Maker</a></li>
<li><a href="#">Community Manager</a></li>
<li><a href="#">Scrap Generator</a></li>
<li><a href="#">Scrap Deleter</a></li>
<li><a href="#">B'day Wisher</a></li>
<li><a href="#">Scraps Flooder</a></li>
<li><a href="#">Scraps Backupmate</a></li>
</ul>
</div><div class="sidebar-box2">
<label><b>Our Friends</b></label>
<ul>
<li><a href="#">Links</a></li>
<li><a href="#">Links</a></li>
<li><a href="#">Links</a></li>
<li><a href="#">Links</a></li>
<li><a href="#">Links</a></li>
</ul>
</div></p>


<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>



<?php endif; ?>

</div>

</div>
