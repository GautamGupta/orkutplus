<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>

<div id="sidebar">

<div class="sidebar-box">
<b><label>About Us</label></b>
<p><label>
<img src="http://<REDACTED>.com/files/<REDACTED>.png" alt="<REDACTED>" align="right" /><a href="http://www.orkutplus.net/about"><REDACTED></a> (22) is an ECE Engineer. He comes from a business family based in Jammu, J&amp;K - India
</label></p><p align="left"></p>
<p><a href="http://www.orkut.com/Profile?uid=6090387655098571394" class="noicon"><img src="http://cdn.orkutplus.net/images/orkut.png" alt="Orkut" /></a>&nbsp;&nbsp;<a href="http://www.facebook.com/<REDACTED>" class="noicon"><img src="http://<REDACTED>.com/files/facebook.png" alt="" /></a>&nbsp;&nbsp;<a href="http://www.google.com/profiles/<REDACTED>" class="noicon"><img src="http://<REDACTED>.com/files/google.png" height="16px" width="16px" alt="" /></a>&nbsp;&nbsp;<a href="http://www.linkedin.com/in/<REDACTED>1" class="noicon"><img src="http://<REDACTED>.com/files/linkedin.png" alt="" /></a>&nbsp;&nbsp;<a href="http://twitter.com/gaurav_dua" class="noicon"><img src="http://<REDACTED>.com/files/twitter.png" alt="" /></a>&nbsp;&nbsp;<a href="mailto:gaurav@<REDACTED>.com" class="noicon"><img src="http://<REDACTED>.com/files/email.png" alt="" /></a></p>
</div>

<div class="sidebar-box">
<b><label>Stay Connected</label></b>

  <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=OrkutPlus', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true;">
    <div class="buttons2">
      <p align="center">
	<input type="text" style="float:left;width:165px;" value="Your email here.." onclick="this.value='';" name="email" />
	<input type="hidden" value="OrkutPlus" name="uri" />
	<input type="hidden" name="loc" value="en_US" />
	<button name="submit" type="submit" id="submit">
	  <img src="http://<REDACTED>.com/wp-content/themes/GrungeMag/images/rss_feed.png" title="Subscribe to our RSS Feeds" alt="" />Subscribe
	</button>
      </p>
    </div>
  </form>
  <br />
  <p align="center">
    <a href="http://feeds.feedburner.com/OrkutPlus" class="noicon">
      <img src="http://<REDACTED>.com/files/feed_cloud.png" width="40" height="40" alt="" />
    </a>&nbsp;
    <a href="http://feedburner.google.com/fb/a/mailverify?uri=OrkutPlus&amp;loc=en_US" class="noicon">
      <img src="http://<REDACTED>.com/files/mail_cloud.png" width="40" height="40" alt="" />
    </a>&nbsp;
    <a href="http://www.stumbleupon.com/submit?url=http://www.orkutplus.net/" class="noicon">
      <img src="http://<REDACTED>.com/files/stumble_cloud.png" width="40" height="40" alt="" />
    </a>&nbsp;
    <a href="http://technorati.com/faves?add=http://orkutplus.net">
      <img src="http://<REDACTED>.com/files/technorati_cloud.png" width="40" height="40" alt="" />
    </a>&nbsp;&nbsp;&nbsp;
    <a href="http://feeds.feedburner.com/OrkutPlus" class="noicon">
      <img src="http://feeds.feedburner.com/~fc/OrkutPlus?bg=eeeeee&amp;fg=333333&amp;anim=1" height="26" width="88" style="border:0px;padding-bottom:6px;" alt="Subscribe to our RSS Feeds!" />
    </a>
  </p>
  <div id="google_translate_element" align="center"></div>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
	pageLanguage: 'en',
	includedLanguages: 'de,pt,es'
      }, 'google_translate_element');
    }
  </script>
  <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
</div>

<?php if (get_option('artsee_ads') == 'Enable') { ?>
<?php include(TEMPLATEPATH . '/includes/ads.php'); ?>
<?php } else { echo ''; } ?>

<p><div class="sidebar-box">
<b><label>Introducing Facebook Plus!</label></b>
<center><a href="http://www.facebookplus.org" target="_blank"><img src="http://img687.imageshack.us/img687/7751/fbad.png"></a></center>
</div></p>

<div class="sidebar-box3">
  <b><label>Advertisements</label></b>
  <center>
    <!-- Addedic - ad code starts -->
<span id="show_ads_9599e73a805434832f6dfa999cf6cb04_42"></span>
<script language="javascript" type="text/javascript" src="http://www.addedic.com/show-ads.js"></script>
<script language="javascript">
if (window.ads_9599e73a805434832f6dfa999cf6cb04 ){ ads_9599e73a805434832f6dfa999cf6cb04+= 1;}else{ ads_9599e73a805434832f6dfa999cf6cb04 =1;}
setTimeout("showAdsforContent(42,120,600,'http://www.addedic.com/publisher-show-ads.php',"+ads_9599e73a805434832f6dfa999cf6cb04+",'ads_9599e73a805434832f6dfa999cf6cb04')",1000*(ads_9599e73a805434832f6dfa999cf6cb04 -1));
ads_9599e73a805434832f6dfa999cf6cb04_42_position=0;
</script>
<!-- Addedic - ad code  ends --> </center>
</div>

<div class="sidebar-box2">
  <b><label>Sponsors</label></b>
  <center>
   <a href="http://www.punjabisongs.tv/"><img src="http://www.orkutplus.net/userscripts/punjabisongs.jpg"></a>
  </center>
</div>
<div style="clear:both;"></div>

<div class="sidebar-box3">
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
</div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

<?php endif; ?>

</div>
<div style="clear:both;"></div>
</div>
<div style="clear:both;"></div>
