<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>

<div id="sidebar">

<div class="sidebar-box">
<b><label>About Us</label></b>
<label><p><img src="http://<REDACTED>.com/files/<REDACTED>.png" alt="<REDACTED>" align="right"><a href="http://www.orkutplus.net/about"><REDACTED></a> (21) is an ECE Engineer and a MBA student. He comes from a business family based in Jammu, J&K - India</p><p align="left"></p>
</label>
<p><a href="http://www.orkut.co.in/Main#Profile.aspx?uid=6090387655098571394&" class="noicon"><img src="http://cdn.orkutplus.net/images/orkut.png" ></a>&nbsp;&nbsp;<a href="http://www.facebook.com/<REDACTED>" class="noicon"><img src="http://<REDACTED>.com/files/facebook.png"></a>&nbsp;&nbsp;<a href="http://www.google.com/profiles/<REDACTED>" class="noicon"><img src="http://<REDACTED>.com/files/google.png" height="16px" width="16px"></a>&nbsp;&nbsp;<a href="http://www.linkedin.com/in/<REDACTED>1" class="noicon"><img src="http://<REDACTED>.com/files/linkedin.png"></a>&nbsp;&nbsp;<a href="http://twitter.com/gaurav_dua" class="noicon"><img src="http://<REDACTED>.com/files/twitter.png"></a>&nbsp;&nbsp;<a href="mailto:gaurav@<REDACTED>.com" class="noicon"><img src="http://<REDACTED>.com/files/email.png"></a></p>
</div>

<div class="sidebar-box">
<b><label>Stay Connected</label></b>

<center><p><div class="buttons2"><form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=OrkutPlus', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p><input type="text" style="float:left;width:165px;" value="Your email here.." onclick="this.value='';" name="email"/><input type="hidden" value="OrkutPlus" name="uri"/><input type="hidden" name="loc" value="en_US"/><button name="submit" type="submit" id="submit"><img src="http://<REDACTED>.com/wp-content/themes/GrungeMag/images/rss_feed.png" title="Subscribe to our RSS Feeds"/>Subscribe</button></div></form></p>
<br />
<p><a href="http://feeds.feedburner.com/OrkutPlus" class="noicon"><img src="http://<REDACTED>.com/files/feed_cloud.png" width="40" height="40" /></a>&nbsp;<a href="http://feedburner.google.com/fb/a/mailverify?uri=OrkutPlus&amp;loc=en_US" class="noicon"><img src="http://<REDACTED>.com/files/mail_cloud.png" width="40" height="40" /></a>&nbsp;<a href="http://www.stumbleupon.com/submit?url=http://www.orkutplus.net/" class="noicon"><img src="http://<REDACTED>.com/files/stumble_cloud.png" width="40" height="40" /></a>&nbsp;<a href="http://technorati.com/faves?add=http://orkutplus.net"><img src="http://<REDACTED>.com/files/technorati_cloud.png" width="40" height="40" /></a>&nbsp;<a href="http://feeds.feedburner.com/OrkutPlus" class="noicon">&nbsp;&nbsp;<img src="http://feeds.feedburner.com/~fc/OrkutPlus?bg=eeeeee&amp;fg=333333&amp;anim=1" height="26" width="88" style="border:0px;padding-bottom:6px;" alt="Subscribe to our RSS Feeds!" /></a></p></center>
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
</script></center>
</div>

<?php if (get_option('artsee_ads') == 'Enable') { ?>
<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
<?php } else { echo ''; } ?>

<p><div class="sidebar-box3">
<b><label>Advertisements</b></label>
<center><script type='text/javascript'><!--//<![CDATA[
var m3_u = (location.protocol=='https:'?'https://www.minehomes.com/openx/www/delivery/ajs.php':'http://www.minehomes.com/openx/www/delivery/ajs.php');
var m3_r = Math.floor(Math.random()*99999999999);
if (!document.MAX_used) document.MAX_used = ',';
document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
document.write ("?zoneid=10");
document.write ('&amp;cb=' + m3_r);
if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
document.write ("&amp;loc=" + escape(window.location));
if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
if (document.context) document.write ("&context=" + escape(document.context));
if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a href='http://www.minehomes.com/openx/www/delivery/ck.php?n=a8f05178&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://www.minehomes.com/openx/www/delivery/avw.php?zoneid=10&amp;n=a8f05178' border='0' alt='' /></a></noscript></center>
</div><div class="sidebar-box2">
<b><label>Sponsors</b></label>
<center><script language="javascript">
	zoneIdentifier="7A942FC23D64337D";
	var varCheckURL = (("https:" == document.location.protocol) ? "https://" : "http://");
	document.write(unescape("%3Cscript src='" + varCheckURL + "adcode.technoratimedia.com/bootstrap/tti.js' type='text/javascript'%3E%3C/script%3E"));
</script></center>
<br /><br /><br /></div></p>

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
<li><a href="http://www.orkutplus.net/2008/12/scrap-all-orkut-friends-deluxe.html">Scrap All</a></li>
<li><a href="http://www.orkutplus.net/2008/09/autoscrap-reply-bot-set-and-send-auto-replies-to-your-scraps.html">AutoScrap Bot</a></li>
<li><a href="http://www.orkutplus.net/2008/09/get-notified-via-email-when-anyone-reads-your-scrapbook.html">Read Mail</a></li>
<li><a href="http://www.orkutplus.net/2008/09/orkut-themes-generator-create-your-own-themes-in-a-single-click.html">Theme Generator</a></li>
<li><a href="http://www.orkutplus.net/2008/09/accept-all-pending-friend-requests-fast-easy-and-handy-way.html">Friend Acceptor</a></li>
<li><a href="http://www.orkutplus.net/2008/10/reject-all-friend-requests-orkut.html">Friend Rejector</a></li>
<li><a href="http://www.orkutplus.net/2008/10/community-backupmate-create-backup-of-your-community-topics.html">Backup Communities</a></li>
<li><a href="http://www.orkutplus.net/2008/10/mass-delete-friends-empty-your-friendlist-in-no-time.html">Delete Friends</a></li>
<li><a href="http://www.orkutplus.net/profile-maker">Profile Maker</a></li>
<li><a href="http://www.orkutplus.net/2008/10/orkut-community-manager-unjoin-selected-communities-quickly-and-easily.html">Community Manager</a></li>
<li><a href="http://www.orkutplus.net/2008/10/orkut-scrap-generator.html">Scrap Generator</a></li>
<li><a href="http://www.orkutplus.net/2008/11/mass-scrap-deleter-leave-no-trace-empty-your-scrapbook-in-seconds.html">Scrap Deleter</a></li>
<li><a href="http://www.orkutplus.net/2008/11/awesome-auto-birthday-scrap-sender.html">B'day Wisher</a></li>
<li><a href="http://www.orkutplus.net/2008/12/scrapbook-flooder-the-flood-machine-by-orkut-plus.html">Scraps Flooder</a></li>
<li><a href="http://www.orkutplus.net/2008/12/scrapbook-flooder-the-flood-machine-by-orkut-plus.html">Scraps Backupmate</a></li>
</ul>
</div><div class="sidebar-box2">
<label><b>Our Friends</b></label>
<ul>
<li><a href="http://htmlorkut.com">Html Orkut</a></li>
<li><a href="http://<REDACTED>.org"><REDACTED></a></li>
<li><a href="http://textkut4.110mb.com/Home/">Textkut</a></li>
<li><a href="http://orkutheroes.com">Orkut Heroes</a></li>
<li><a href="http://orkutdiary.com/">Orkut Diary</a></li>
<li><a href="http://www.insideorkut.com/">Inside Orkut</a></li>
</ul>
</div></p>


<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>



<?php endif; ?>

</div>

</div>
