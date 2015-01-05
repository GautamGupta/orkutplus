<?php $title = "Orkut HTML Scrap Generator!"; ?>
<?php require('../../wp-blog-header.php'); ?>
<?php get_header(); ?>
<script src="http://cdn.gigya.com/wildfire/js/wfapiv2.js"></script>
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
	<p>This generator will allow you to create your personalized HTML Scraps to be posted to your friends scrapbook. This Generator has predefined templates. Once you enter the text, we will generate the set of 46 HTML Scrap Templates. You can choose the best suited template, copy the code and post in your friend's scrapbook. If you face any problem you can refer to the <a href="http://www.orkutplus.net/2008/10/orkut-scrap-generator.html">official post</a> for this tool on the blog.</p>
<?php
if(isset($_GET['txt']))
{
        function w($s1, $s2, $n){
                $t = $_GET['txt'];
                $tr = $s1 . $t . $s2;
                $tf = '<br><textarea id="postContent' . $n . '" style="display: none;">' . $tr . '</textarea><center><div id="divWildfirePost' . $n . '"></div><script>var pconf={widgetTitle: \'Code Box\', contentIsLayout: \'false\', includeShareButton: \'false\', defaultContent: \'postContent' . $n . '\', UIConfig: \'<config><display showDesktop="false" showEmail="true" useTransitions="false" showBookmark="false" showCodeBox="true" showCloseButton="false" networksToShow="orkut, myspace, friendster, facebook, bebo, tagged, blogger, hi5, livespaces, piczo, freewebs, livejournal, blackplanet, myyearbook, wordpress, vox, typepad, xanga, multiply, igoogle, netvibes, pageflakes, migente, *"></display><body><background background-color="Transparent"></background></body></config>\'};Wildfire.initPost(\'398551\', \'divWildfirePost' . $n . '\', 420, 200, pconf);</script></center><br><hr><br>';
                $final = $tr . $tf;
                echo $final;
        }
        w('<div style="background-color:#fff; font-family:\'Trebuchet MS\'; color:navy; border:2px groove navy; width:100%; padding:5px; font-size:16px;">', '</div>', 1);
        w('<div style="background-color:#333; border:5px solid #000; padding:15px;"><div style="background-color:#000; border:1px solid gold; padding:25px; font-family:\'Trebuchet MS\'; color:gold; font-size:16px; text-align:center;">', '</font><br/><hr color="#CC3366" /></div></div>', 2);
        w('<div style="padding:10px; background-color:#efffef; font-size:18px; color:teal; text-align:right; border-top:1px solid teal; border-left:1px solid teal; border-right:4px solid teal; border-bottom:4px solid teal;">', '</div>', 3);
        w('<div style="background-color:#2278A4; color:#D6F1FF; border-top:15px solid navy; border-bottom:15px solid navy; border-right:1px solid navy; border-left:1px solid navy; text-align:center; padding:40px; font-size:20px;"><font face="Trebuchet MS">', '</font></div>', 4);
        w('<div style="background-color:#efefef; color:#FFCC66; border-right:2px solid #FFCC66; border-left:2px solid #FFCC66; border-bottom:15px solid #FFCC66; padding-top:35px; padding-right:5px; padding:left:5px; padding-bottom:2px; font-size:18px; text-align:center;"><font face="Trebuchet MS">', '</font></div>', 5);
        w('<div style="background-color:#eee; padding:50px;"><div style="background-color:#fff; border:2px solid maroon; padding:40px 5px 5px 40px; font-size:24px; color:maroon; text-align:right;"><font face="Pristina,Monotype Corsiva,Comic Sans MS">', '</font></div></div>', 6);
        w('<div style="background-color:#ddf; padding:25px;"><div style="background-color:#eef; border-right:15px solid navy; border-bottom:1px solid navy; padding:40px 5px 5px 40px; font-size:18px; color:navy; text-align:right;"><font face="Trebuchet MS">', '</font></div></div>', 7);
        w('<div style="background-color:#fff; border:7px dashed #999; color:#999; font-size:18px; padding:5px;"><font face="Verdana">', '</font></div>', 8);
	w('<table border="0" width="100%"><td style="background-color:#fff; border:7px solid #eee; font-size:18px; padding:15px 5px 5px 15px; color: #555;">', '<img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/lp.png" align="right"></td></table>', 9);
        w('<div style="background-color:#000; border-bottom:20px solid darkred; padding:40px 5px 5px 10px; color:red;font-size:20px;"><font face="Vivaldi,Pristina,Monotype Corsiva,Trebuchet MS,Arial">', '</font></div>', 10);
        w('<div style="background-color:#fff; border-top:25px solid orange; border-bottom:25px solid green;  padding:10px 20px 10px 20px; color:navy; text-align:center; font-size:20px; width:90%;">', '</div>', 11);
        w('<table style="background-color:#efefef;" cellspacing="-1px"><tr><td width="55" height="55" style="background-color:#476FB6; border:2px solid navy"></td><td width="100%" style="background-color:#C1D7FF; border-top:2px solid navy;"></td></tr><tr><td height="100%" style="background-color:#C1D7FF; border-left:2px solid navy;"></td><td valign="top" width="100%" height="100%" style="padding:25px; color:#476FB6; font-size:20px;">', '</td></tr></table>', 12);
        w('<table width="100%"><td style="background-color:#fff; border-left:15px solid #eee; font-size:16px; padding:15px; color:#555" valign="top" align="left">', '<img  src="https://img1.orkut.com/img/doodle/orkut_logo.gif" align="right" ></td></table>', 13);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:7px solid #FFE18D; font-size:18px; padding:15px 5px 5px 15px; color: #ECB416;">', '<img src="imgs/scrap/smile.png" align="right"></td></table>', 14);
        w('<table border="0"><td style="background-color:#FCFDFF; border:3px solid #496D1F; " width="100%"><p style="padding:15px 15px 5px 200px; color:#827C8C; font-size:16px;">', '</p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/greeny.png" width="100%"></td></table>', 15);
        w('<table border="0"><td style="background-color:#fff; border:3px solid #444;" width="100%"><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/music.jpg" align="left"><p style="clear:left; padding:15px; color:#888; font-size:16px;">', '</p></td></table>', 16);
        w('<table border="0"><table border="0"><td style="background-color:#D3E0F0; border:3px solid #739FC9;" width="100%"><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/chill.png" width="100%" align="left"><p style="clear:left; padding:15px; color:#5080AD; font-size:16px;">', '</p></td></table>', 17);
        w('<table height="375" style="background-color:#fff; border:5px solid #CCE57F;" cellspacing="-1px"><td valign="top" width="100%" style="padding:15px; color:#BFBF91; font-size:14px;">', '</td><td width="100%" height="375"><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/flower.png" ></td></table>', 18);
        w('<table width="100%" style="border:2px solid #D32F19; background-color:#fff"><td style="padding:15px; color:#A51B14; font-size:15px;">', '<img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/gift.png" align="right"></td></table>', 19);
        w('<table width="100%" style="border:2px solid #0C499C; background-color:#fff" cellspacing="-1px"><td><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/gradient_top.png" width="100%"><p style="padding:15px; color:#2793ED; font-size:15px;">', '</p></td></table>', 20);
        w('<table width="100%" style="border:2px solid #D32F19; background-color:#eee"><td style="padding:15px; color:#A51B14; font-size:15px;">', '<img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/heart.png" align="right"></td></table>', 21);
        w('<table border="0"><td style="background-color:#FCFDFF; border:3px solid #E965A2; " width="100%"><p style="padding:15px; color:#EE7DAB; font-size:16px;">', '</p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/heart2.png" width="100%"></td></table>', 22);
        w('<table border="0"><td style="background-color:#000; border:9px solid #999; " width="100%"><p style="padding:10px; color:#ddd; font-size:18px;"><font face="Trebuchet MS">', '</font></p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/linkin.png" width="100%"></td></table>', 23);
        echo '<div class="navigation"><center><div class="wp-pagenavi"><span class="pages">Page 1 of 2</span><span class="current">1</span><a href="html-generator2.php?txt=' . $_GET["txt"] . '" title="2">2</a></div></center></div>';
}else{
?>
<form method="GET">
	<div class="loltitleclassic"><b>Enter Text to Design</b></div>
	<p><input type="text" name="txt" size="50" value="OrkutPlus Rocks!"></p>
	<p align="left"><input type="submit" value="Submit" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
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
