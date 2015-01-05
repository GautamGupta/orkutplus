	<style type="text/css" media="screen">
	<!--
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style-core.css);
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style.css);
		-->
	</style>
<script src="http://cdn.gigya.com/wildfire/js/wfapiv2.js"></script>
<?php
error_reporting(0);
include("../../blog/wp-config.php");
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

<?php include("../../blog/wp-content/themes/op/header.php"); ?>

<div id="page_container">

<?php include("../../blog/wp-content/themes/op/sidebar.php"); ?>
<?php include("../../blog/wp-content/themes/op/leftbar.php"); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
			<div class="rbcontent">

<div id="postcol" class="fixheight">
 <?php $adcount = 1; ?>
<div class="post_title">
		<h2 id="post-htmlgen" class="title"><a href="http://orkutplus.net/toolkit/generators/scrap-creator.php" rel="bookmark">[PHP]&nbsp;Scrap Creator - Create Custom Scrap Templates</a></h2>
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
if(isset($_POST['scrap']))
{
        echo '<div style="width:90%;padding:25px;margin:5px;background:'.$_POST['bg'].';color:'.$_POST['color'].';border:'.$_POST['bwidth'].' '.$_POST['btype'].' '.$_POST['bcolor'].';text-align:'.$_POST['align'].';font-size:'.$_POST['size'].';font-family:\''.$_POST['face'].'\';" >'.$_POST['scrap'].'</div><br><textarea id="postContent1" style="display: none;"><div style="width:90%;padding:25px;margin:10px;background:'.$_POST['bg'].';color:'.$_POST['color'].';border:'.$_POST['bwidth'].' '.$_POST['btype'].' '.$_POST['bcolor'].';text-align:'.$_POST['align'].';font-size:'.$_POST['size'].';font-family:"'.$_POST['face'].'";" >'.$_POST['scrap'].'</div></textarea><center><div id="divWildfirePost1"></div><script>var pconf={widgetTitle: \'Code Box\', contentIsLayout: \'false\', includeShareButton: \'false\', defaultContent: \'postContent1\', UIConfig: \'<config><display showDesktop="false" showEmail="true" useTransitions="false" showBookmark="false" showCodeBox="true" showCloseButton="false" networksToShow="orkut, myspace, friendster, facebook, bebo, tagged, blogger, hi5, livespaces, piczo, freewebs, livejournal, blackplanet, myyearbook, wordpress, vox, typepad, xanga, multiply, igoogle, netvibes, pageflakes, migente, *"></display><body><background background-color="Transparent"></background></body></config>\'};Wildfire.initPost(\'398551\', \'divWildfirePost1\', 420, 200, pconf);</script></center><br><hr><br>';
}
?>
<form method="POST">

<p>Background color:&nbsp;
<select name="bg"><option value="transparent" >Select...</option>
<option value="#000" style="background:black;color:#fff" >Black</option>
<option value="#fff" style="background:#fff" >White</option>
<option value="maroon" style="background:maroon" >Maroon</option>
<option value="purple" style="background:purple" >Purple</option>
<option value="red" style="background:red" >Red</option>
<option value="violet" style="background:violet" >Violet</option>
<option value="pink" style="background:pink" >Pink</option>
<option value="orange" style="background:orange" >Orange</option>
<option value="yellow" style="background:yellow" >Yellow</option>
<option value="green" style="background:green" >Green</option>
<option value="olive" style="background:olive" >Olive</option>
<option value="teal" style="background:teal" >Teal</option>
<option value="lime" style="background:lime" >Lime</option>
<option value="navy" style="background:navy" >Navy</option>
<option value="blue" style="background:blue" >Blue</option>
<option value="aqua" style="background:aqua" >Aqua</option>
<option value="#f0c0a0" style="background:#f0c0a0" >Fuchsia</option>
<option value="gold" style="background:gold" >Gold</option>
<option value="silver" style="background:silver" >Silver</option>
<option value="#CC0000" style="background:#CC0000" >CC0000</option>
<option value="#FF3399" style="background:#FF3399" >FF3399</option>
<option value="#F6BAD5" style="background:#F6BAD5" >F6BAD5</option>
<option value="#993399" style="background:#993399" >993399</option>
<option value="#FFCCFF" style="background:#FFCCFF" >FFCCFF</option>
<option value="#663399" style="background:#663399" >663399</option>
<option value="#CCCCFF" style="background:#CCCCFF" >CCCCFF</option>
<option value="#006699" style="background:#006699" >006699</option>
<option value="#6699CC" style="background:#6699CC" >6699CC</option>
<option value="#CCFFCC" style="background:#CCFFCC" >CCFFCC</option>
<option value="#FFFFCC" style="background:#FFFFCC" >FFFFCC</option>
<option value="#eee" style="background:#eee" >#EEEEEE</option>
<option value="#ddd" style="background:#ddd" >#DDDDDD</option>
<option value="#ccc" style="background:#ccc" >#CCCCCC</option>
<option value="#bbb" style="background:#bbb" >#BBBBBB</option>
<option value="#aaa" style="background:#aaa" >#AAAAAA</option>
<option value="#999" style="background:#999;color:#fff" >#999999</option>
<option value="#888" style="background:#888;color:#fff" >#888888</option>
<option value="#777" style="background:#777;color:#fff" >#777777</option>
<option value="#666" style="background:#666;color:#fff" >#666666</option>
<option value="#555" style="background:#555;color:#fff" >#555555</option>
<option value="#444" style="background:#444;color:#fff" >#444444</option>
<option value="#333" style="background:#333;color:#fff" >#333333</option>
<option value="#222" style="background:#222;color:#fff" >#222222</option>
<option value="#111" style="background:#111;color:#fff" >#111111</option>
<option value="#ffe" style="background:#ffe" >#FFE</option>
<option value="#fee" style="background:#fee" >#FEE</option>
<option value="#efe" style="background:#efe" >#EFE</option>
<option value="#eef" style="background:#eef" >#EEF</option>
<option value="#fef" style="background:#fef" >#FEF</option>
<option value="#eff" style="background:#eff" >#EFF</option>
<option value="#007" style="background:#007;color:#fff;" >#007</option>
<option value="#070" style="background:#070;color:#fff;" >#070</option>
<option value="#700" style="background:#700;color:#fff;" >#700</option>
<option value="#077" style="background:#077;color:#fff;" >#077</option>
<option value="#770" style="background:#770;color:#fff;" >#770</option>
<option value="#707" style="background:#707;color:#fff;" >#707</option>
</select></p>

<p>Text Color:&nbsp;
<select name="color" ><option value="#000" >Select...</option>
<option value="#000" style="color:black;" >Black</option>
<option value="#fff" style="color:#fff" >White</option>
<option value="maroon" style="color:maroon" >Maroon</option>
<option value="purple" style="color:purple" >Purple</option>
<option value="red" style="color:red" >Red</option>
<option value="violet" style="color:violet" >Violet</option>
<option value="pink" style="color:pink" >Pink</option>
<option value="orange" style="color:orange" >Orange</option>
<option value="yellow" style="color:yellow" >Yellow</option>
<option value="green" style="color:green" >Green</option>
<option value="olive" style="color:olive" >Olive</option>
<option value="teal" style="color:teal" >Teal</option>
<option value="lime" style="color:lime" >Lime</option>
<option value="navy" style="color:navy" >Navy</option>
<option value="blue" style="color:blue" >Blue</option>
<option value="aqua" style="color:aqua" >Aqua</option>
<option value="#f0c0a0" style="color:#f0c0a0" >Fuchsia</option>
<option value="gold" style="color:gold" >Gold</option>
<option value="silver" style="color:silver" >Silver</option>
<option value="#CC0000" style="color:#CC0000" >CC0000</option>
<option value="#FF3399" style="color:#FF3399" >FF3399</option>
<option value="#F6BAD5" style="color:#F6BAD5" >F6BAD5</option>
<option value="#993399" style="color:#993399" >993399</option>
<option value="#FFCCFF" style="color:#FFCCFF" >FFCCFF</option>
<option value="#663399" style="color:#663399" >663399</option>
<option value="#CCCCFF" style="color:#CCCCFF" >CCCCFF</option>
<option value="#006699" style="color:#006699" >006699</option>
<option value="#6699CC" style="color:#6699CC" >6699CC</option>
<option value="#CCFFCC" style="color:#CCFFCC" >CCFFCC</option>
<option value="#FFFFCC" style="color:#FFFFCC" >FFFFCC</option>
<option value="#eee" style="color:#eee" >#EEEEEE</option>
<option value="#ddd" style="color:#ddd" >#DDDDDD</option>
<option value="#ccc" style="color:#ccc" >#CCCCCC</option>
<option value="#bbb" style="color:#bbb" >#BBBBBB</option>
<option value="#aaa" style="color:#aaa" >#AAAAAA</option>
<option value="#999" style="color:#999;" >#999999</option>
<option value="#888" style="color:#888;" >#888888</option>
<option value="#777" style="color:#777;" >#777777</option>
<option value="#666" style="color:#666;" >#666666</option>
<option value="#555" style="color:#555;" >#555555</option>
<option value="#444" style="color:#444;" >#444444</option>
<option value="#333" style="color:#333;" >#333333</option>
<option value="#222" style="color:#222;" >#222222</option>
<option value="#111" style="color:#111;" >#111111</option>
<option value="#ffe" style="color:#ffe" >#FFE</option>
<option value="#fee" style="color:#fee" >#FEE</option>
<option value="#efe" style="color:#efe" >#EFE</option>
<option value="#eef" style="color:#eef" >#EEF</option>
<option value="#fef" style="color:#fef" >#FEF</option>
<option value="#eff" style="color:#eff" >#EFF</option>
<option value="#007" style="color:#007;" >#007</option>
<option value="#070" style="color:#070;" >#070</option>
<option value="#700" style="color:#700;" >#700</option>
<option value="#077" style="color:#077;" >#077</option>
<option value="#770" style="color:#770;" >#770</option>
<option value="#707" style="color:#707;" >#707</option>
</select></p>

<p>Border Color:&nbsp;
<select name="bcolor" ><option value="#000" >Select...</option>
<option value="#000" style="background:black;color:#fff" >Black</option>
<option value="#fff" style="background:#fff" >White</option>
<option value="maroon" style="background:maroon" >Maroon</option>
<option value="purple" style="background:purple" >Purple</option>
<option value="red" style="background:red" >Red</option>
<option value="violet" style="background:violet" >Violet</option>
<option value="pink" style="background:pink" >Pink</option>
<option value="orange" style="background:orange" >Orange</option>
<option value="yellow" style="background:yellow" >Yellow</option>
<option value="green" style="background:green" >Green</option>
<option value="olive" style="background:olive" >Olive</option>
<option value="teal" style="background:teal" >Teal</option>
<option value="lime" style="background:lime" >Lime</option>
<option value="navy" style="background:navy" >Navy</option>
<option value="blue" style="background:blue" >Blue</option>
<option value="aqua" style="background:aqua" >Aqua</option>
<option value="#f0c0a0" style="background:#f0c0a0" >Fuchsia</option>
<option value="gold" style="background:gold" >Gold</option>
<option value="silver" style="background:silver" >Silver</option>
<option value="#CC0000" style="background:#CC0000" >CC0000</option>
<option value="#FF3399" style="background:#FF3399" >FF3399</option>
<option value="#F6BAD5" style="background:#F6BAD5" >F6BAD5</option>
<option value="#993399" style="background:#993399" >993399</option>
<option value="#FFCCFF" style="background:#FFCCFF" >FFCCFF</option>
<option value="#663399" style="background:#663399" >663399</option>
<option value="#CCCCFF" style="background:#CCCCFF" >CCCCFF</option>
<option value="#006699" style="background:#006699" >006699</option>
<option value="#6699CC" style="background:#6699CC" >6699CC</option>
<option value="#CCFFCC" style="background:#CCFFCC" >CCFFCC</option>
<option value="#FFFFCC" style="background:#FFFFCC" >FFFFCC</option>
<option value="#eee" style="background:#eee" >#EEEEEE</option>
<option value="#ddd" style="background:#ddd" >#DDDDDD</option>
<option value="#ccc" style="background:#ccc" >#CCCCCC</option>
<option value="#bbb" style="background:#bbb" >#BBBBBB</option>
<option value="#aaa" style="background:#aaa" >#AAAAAA</option>
<option value="#999" style="background:#999;color:#fff" >#999999</option>
<option value="#888" style="background:#888;color:#fff" >#888888</option>
<option value="#777" style="background:#777;color:#fff" >#777777</option>
<option value="#666" style="background:#666;color:#fff" >#666666</option>
<option value="#555" style="background:#555;color:#fff" >#555555</option>
<option value="#444" style="background:#444;color:#fff" >#444444</option>
<option value="#333" style="background:#333;color:#fff" >#333333</option>
<option value="#222" style="background:#222;color:#fff" >#222222</option>
<option value="#111" style="background:#111;color:#fff" >#111111</option>
<option value="#ffe" style="background:#ffe" >#FFE</option>
<option value="#fee" style="background:#fee" >#FEE</option>
<option value="#efe" style="background:#efe" >#EFE</option>
<option value="#eef" style="background:#eef" >#EEF</option>
<option value="#fef" style="background:#fef" >#FEF</option>
<option value="#eff" style="background:#eff" >#EFF</option>
<option value="#007" style="background:#007;color:#fff;" >#007</option>
<option value="#070" style="background:#070;color:#fff;" >#070</option>
<option value="#700" style="background:#700;color:#fff;" >#700</option>
<option value="#077" style="background:#077;color:#fff;" >#077</option>
<option value="#770" style="background:#770;color:#fff;" >#770</option>
<option value="#707" style="background:#707;color:#fff;" >#707</option>
</select></p>

<p>Border type:&nbsp;
<select name="btype">
<option value="solid" >Solid</option>
<option value="dashed">Dashed</option>
<option value="dotted" >Dotted</option>
<option value="ridge" >Ridge</option>
<option value="groove" >Groove</option>
<option value="inset" >Inset</option>
<option value="outset" >Outset</option>
</select></p>

<p>Border Width:&nbsp;
<select name="bwidth">
<option value="1px">1px</option>
<option value="2px">2px</option>
<option value="3px">3px</option>
<option value="5px">5px</option>
<option value="10px">10px</option>
</select></p>

<p>Text Align:&nbsp;
<select name="align" >
<option value="left">Left</option>
<option value="center">Center</option>
<option value="right" >Right</option>
</select></p>

<p>Text Size:&nbsp;
<select name="size" >
<option value="12px" style="font-size:12px" >12</option>
<option value="16px" style="font-size:16px" >16</option>
<option value="22px" style="font-size:22px" >22</option>
<option value="26px" style="font-size:26px" >26</option>
<option value="32px" style="font-size:32px" >32</option>
<option value="36px" style="font-size:36px" >36</option>
<option value="48px" style="font-size:48px" >48</option>
</select></p>

<p>Font:&nbsp;
<select name="face">
<option value="'Trebuchet MS'" style="font-family:'Trebuchet MS';">Trebuchet MS</option>
<option value="Arial" style="font-family:Arial;">Arial</option>
<option value="'Monotype Corsiva'" style="font-family:'Monotype Corsiva';">Monotype Corsiva</option>
<option value="Serif" style="font-family:Serif;">Serif</option>
<option value="Georgia" style="font-family:Georgia;">Georgia</option>
<option value="sans-serif" style="font-family:sans-serif;">Sans Serif</option>
<option value="Tahoma" style="font-family:Tahoma;">Tahoma</option>
<option value="Garamond" style="font-family:Garamond;">Garamond</option>
<option value="'Book Antigua'" style="font-family:'Book Antigua';">Book Antigua</option>
<option value="Pristina" style="font-family:Pristina;">Pristina</option>
<option value="Papyrus" style="font-family:Papyrus;">Papyrus</option>
<option value="'Old English Text MT'" style="font-family:'Old English Text MT';">Old English Text MT</option>
</select></p>

<p>Scrap Text: <br />
<textarea name="scrap" style="width:100%;height:150px;">OrkutPlus.net!
</textarea></p>
<p><input type="submit" id="submit" value="Create Scrap!" />&nbsp;&nbsp;<input type="reset" id="reset" value="Reset" /></p>
</form>
		<?php if ($adcount == 1) : ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>
&nbsp;&nbsp;&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<?php endif; $adcount++; ?>
<?php $adcount++; ?>
<div style="clear: both"></div></div></div>
</div></div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
</div> <!-- close page container-->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>