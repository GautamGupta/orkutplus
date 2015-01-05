<?php $title = "Orkut HTML Scrap Generator! - Page 2"; ?>
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
	w('<table style="border:1px solid #000; background-color:#fff;" ><td width="90%" height="100%"><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/hands.png" width="90%"></td><td valign="top" width="90%" style="padding:25px 5px 5px 1px; font-size:18px; color:#333;"><font face="Verdana">', '</font></td></table>', 1);
        w('<table style="background-color:#fff; border:5px solid #FFE2FA;" width="100%" cellspacing="-1px"><td><p style="font-size:16px; text-align:center; color:#B81E9D; padding:15px 5px 1px 5px;">', '</p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/butterfly.png" width="100%"></td></table>',2);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:7px solid #eee; font-size:18px; padding:15px 5px 5px 15px; color: #555;">', '<img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/bulb.png" align="right"></td></table>', 3);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:7px solid #eee;"><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/pencil.png" align="right"><p align="left" style="font-size:18px; padding:15px; color: #555;">', '</p></td></table>', 4);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:7px solid #533734; font-size:18px; padding:15px 5px 5px 15px; color: #aaa;">', '<img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/book.png" align="right"></td></table>', 5);
        w('<table width="100%" style="border:2px solid #FF9F01;background-color:#2A1B16;" cellspacing="-1px"><td ><p style="color:#FF9F01; font-size:16px; padding:15px;">', '</p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/sunset.png" width="100%"></td></table>', 6);
        w('<table width="100%" style="border:2px solid #C5CEAE;background-color:#5073C0;" cellspacing="-1px"><td ><p style="color:#C2C7AD; font-size:16px; padding:15px;">', '</p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/beach.png" width="100%"></td></table>', 7);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:7px solid #9999CC; font-size:18px; padding:15px 5px 5px 15px; color: #9999CC;">', '<img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/balloons.png" align="right"></td></table>', 8);
        w('<table border="0" width="100%"><td style="background-color:#000; border:3px solid #eee;"><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/flare.jpg" align="left"><p align="right" style="font-size:18px; padding:14px; color: #fff;">', '</p></td></table>', 9);
        w('<table border="0" width="100%"><td style="background-color:#000; border:3px solid red;"><p  style="font-size:14px; padding:14px; color:pink;">', '</p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/rose.jpg" align="right"></td></table>', 10);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:5px solid gold;"><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/berternie.gif" align="left"><p align="right" style="font-size:18px; padding:15px; color: brown;">', '</p></td></table>', 11);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:5px groove red;"><p align="left" style="font-size:16px; padding:15px; color:red;">', '</p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/elmo.jpg" align="right"></td></table>', 12);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:5px groove red;"><p align="left" style="font-size:14px; padding:15px; color:maroon;"><font face="Trebuchet MS">', '</font></p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/lancer.jpg" align="right"></td></table>', 13);
        w('<table border="0"><td style="background-color:#E2E3D1; border:3px dashed #739FC9;" width="100%"><br/><center><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/beach1.jpg" align="center" style="border:2px outset teal;" width="98%"><p style="clear:left; padding:15px; color:#5080AD; font-size:16px;">', '</p></td></table>', 14);
        w('<table border="0"><td style="background-color:#000; border:3px outset #739FC9;" width="100%"><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/color.jpg" align="center" width="100%"><p style="clear:left; padding:15px; color:#61B1E2; font-size:14px;">', '</p></td></table>', 15);
        w('<table border="0" width="100%"><td style="background-color:#fff; border:5px groove black;"><p align="left" style="font-size:14px; padding:15px; color:#777;"><font face="Trebuchet MS">', '</font></p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/gtr.jpg" align="right"></td></table>', 16);
        w('<table border="0" width="100%"><td style="background-color:#000; border:5px groove purple;"><p align="left" style="font-size:14px; padding:15px; color:#f0f;"><font face="Trebuchet MS">', '</font></p><img src="http://www.orkutplus.net/toolkit/generators/imgs/scrap/shut.jpg" align="right"></td></table>', 17);
	w('<center><table><tbody><tr><td bg style="color:#000000;"><center><div style="border: 5px solid rgb(0, 0, 0); width: 100%;"><div style="border-style: solid dashed; border-color: rgb(255, 255, 255) rgb(101, 86, 87); border-width: 15px;"><div><a href="http://lh4.google.com/_aPvaXxCqxDs/SAX8Rbt1U8I/AAAAAAAABe4/zRzhs-uVeyo/s400/5eb26fdc792dcd3d9e86252224611815_web.jpg" target="_blank"><img src="http://lh4.google.com/_aPvaXxCqxDs/SAX8Rbt1U8I/AAAAAAAABe4/zRzhs-uVeyo/s400/5eb26fdc792dcd3d9e86252224611815_web.jpg" alt="" /></a></div><center><span style="font-size:100%;"><span style="color:#655657;"><span style="font-family:GEORGIA;"><br />', '<br /></span></span></span></center></div></div></center></td></tr></tbody></table></center>', 18);
	w('<table><tbody><tr><td bgcolor="#330000"><div style="border-style: solid; border-width: 2px; width: 100%;"><div style="border: 1px solid ORANGE;"><center><br /><br /><div><a href="http://lh6.google.com/artsbyju/R-pPzKVPv1I/AAAAAAAABZc/CrKGFDPt8Co/s400/ubj38j.png" target="_blank"><img src="http://lh6.google.com/artsbyju/R-pPzKVPv1I/AAAAAAAABZc/CrKGFDPt8Co/s400/ubj38j.png" alt="" /></a></div><span style="font-family:edwardian script itc;font-size:7;color:ORANGE;"><span style="font-family:PALATINO LINOTYPE;font-size:200%;"><br><br>', '<br /><br /><img src="http://lh3.google.com.br/franzdarm/R72Rfw5ex8I/AAAAAAAACYQ/g5KbYQwjngo/s800/d.gif" /></span></span></center></div></div></td></tr></tbody></table></center>', 19);
	w('<table><tbody><tr><td bg style="color:#ffffff;"><br /><br /><div style="border: 2px solid rgb(255, 255, 255); width: 95%;"><div style=""><div style="border: 15px solid rgb(239, 82, 0);"><div style=""><div><center><span style="font-family:GEORGIA;font-size:10;color:#ef5200;"><br><b>', '<br /></b><br /><br /><br /></span></center></span></div><div><a href="http://lh4.google.com/_q99H2eHz7DQ/R77RPh2TbjI/AAAAAAAAB-A/ZTZczfpDxEY/s400/flor5.jpg" target="_blank"><img src="http://lh4.google.com/_q99H2eHz7DQ/R77RPh2TbjI/AAAAAAAAB-A/ZTZczfpDxEY/s400/flor5.jpg" alt="" / width="100% align="center"></a></div></div></div></div></div></td></tr></tbody></table></center>', 20);
	w('<table><tbody><tr><td bgcolor="#000000"><div style="border-style: solid; width: 400px;"><div style="border: 10px dashed rgb(255, 255, 255); width: 100%;"><center><table bg border="0" style="color:#000000;"><tbody><tr><td><span style="font-family:georgia;font-size:100%;color:#ffffff;"><b><center><br />', '<br /><br /><div><a href="http://lh6.google.com/Lilicasandre/R6tzSas5MvI/AAAAAAAABI4/SiBHRPeV4AA/s400/mickey.gif" target="_blank"><img src="http://lh6.google.com/Lilicasandre/R6tzSas5MvI/AAAAAAAABI4/SiBHRPeV4AA/s400/mickey.gif" alt="" /></a></div></center></b></span></td></tr></tbody></table></center></div></div></td></tr></tbody></table></center>', 21);
	w('<table><tbody><tr><td bgcolor="#999999"><div style="solid rgb(153, 153, 153); width: 100%;"><br /><br /><hr style="border: 6px double rgb(153, 153, 0);" size="10" width="85%"><hr style="border: 9px double rgb(153, 153, 0);" size="18"><br /><center><div><a href="http://lh6.google.com/lidyane.menezes/SAyNLUMo1bI/AAAAAAAABDM/t_73ffUI2QI/s400/01.png" target="_blank"><img src="http://lh6.google.com/lidyane.menezes/SAyNLUMo1bI/AAAAAAAABDM/t_73ffUI2QI/s400/01.png" alt="" /></a></div><span style="font-family:Times New Roman;font-size:130%;color:silver;">', '<br /><hr style="border: 6px double rgb(153, 153, 0);" size="10" width="85%"><br /></span></center></div></td></tr></tbody></table></center>', 22);
	w('<table><tbody><tr><td bgcolor="#ffffff"><div style="border: 10px double rgb(255, 255, 255); width: 400px;"><div style="border-right: 35px double rgb(165, 108, 210);"><hr style="border: 6px solid rgb(165, 108, 210);" size="10" width="100%"><hr style="border: 6px solid rgb(165, 108, 210);" size="10" width="100%"><br /><span style="font-family:Edwardian Script ITC;font-size:25;color:#ba55d3;">', '<br /><br /><hr style="border: 6px solid rgb(165, 108, 210);" size="10" width="99%"> <br /></span></span></div></div></td></tr></tbody></table></center>', 23);
        echo '<div class="navigation"><center><div class="wp-pagenavi"><span class="pages">Page 1 of 2</span><a href="html-generator.php?txt=' . $_GET["txt"] . '" title="1">1</a><span class="current">2</span></div></center></div>';
}else{
?>
	<script>window.location='html-generator.php';</script>
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
