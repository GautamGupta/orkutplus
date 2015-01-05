<?php $title = "Orkut Theme Generator - Create Your Own Themes in a Single Click!"; ?>
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
<p>Our Users have already generated <u>80,000+ Themes</u> which are proudly hosted on our fast and reliable servers! It's your turn now! In case you face any problem or need help operating this tool, you can refer to <a href="http://www.orkutplus.net/2008/09/orkut-themes-generator-create-your-own-themes-in-a-single-click.html">this help post</a> for the same.</p>
<?php
if(isset($_POST['link']) && isset($_POST['img']) && isset($_POST['type'])){
	$link = stripslashes($_POST['link'].".user.js");
	$link = str_replace("/", "", $link);
	if(file_exists("scripts/".$link) == FALSE){
		$s = '';
		$s .= '// ==UserScript==
// @name          FaceBook Theme By FaceBookPlus.org
// @namespace     FaceBook Theme Maker - Gautam
// @description	  Make your own theme for FaceBook!
// @author        OrkutPlus (Coder - Gautam)
// @homepage      http://www.facebookplus.org/
// @include       http://www.facebook.com/*
// ==/UserScript==
var css = "body{background-image: url(\"http://img149.imageshack.us/img149/8824/ironman_1600.jpg\") !important;} /* theme: Hinata-chan autor: Brek */ .listfl{color:#FFFFFF!important;} p,h1,h2,h3,h4,table,tr,b,form,ul,li,td,div{color: #BEBEBE !important;} /* ancoras */ a[href] { color: #EEE5DE !important; text-decoration: none !important; } a[href]:hover { color: #FF0000 !important; text-decoration: none !important; } /* cool edit ;] */ div[class=\"newsItem\"] { background: transparent !important; border: 1px transparent !important; } table[id=\"textPanel\"] { background: transparent !important; } textarea[id=\"messageBody\"], textarea, input, option, select { background: transparent repeat-x fixed !important; color: #A4D3EE !important; } /* texto */ li, span, body, table, td[class*=panel], td[id*=tab], td[class*=cat], td[id=\"headerMenu\"], td[class=navInfo], table.karmatable td, table.friendtable td, td[class=\"row0\"], tr[class=\"row0\"], td[class*=\"tab\"], tr[bgcolor=\"#e5ecf4\"], tr[bgcolor=\"#bfd0ea\"], a[class=\"category_link\"], div[class=\"row1\"], td[align=\"right\"], tr[class=\"panelHeader\"], tr[bgcolor=\"#c9d6eb\"], td[class=rowLabel], tr[class=\"row1\"], td[class=\"row1\"], tr[class=\"messageBody\"], tr[bgcolor=\"#d4dded\"] { color: gray !important; } td[bgcolor=\"##4F4F4F\"] { background: transparent url() !important; } div[style=\"background:#4F4F4F\"] { background: transparent !important; padding: 10px 0px 10px 0px; font-size: 110%; color: #ccc !important; } /* bg */ li, table, td[class*=panel], span, td[id*=tab], td[class*=cat], td[id=\"headerMenu\"], td[class=navInfo], table.karmatable td, table.friendtable td, td[class=\"row0\"], tr[class=\"row0\"], td[class*=\"tab\"], tr[bgcolor=\"#e5ecf4\"], tr[bgcolor=\"#bfd0ea\"], a[class=\"category_link\"], tr[class=\"panelHeader\"], tr[bgcolor=\"#c9d6eb\"], td[background*=\"tr8.gif\"][align=\"center\"] { background: transparent !important; } body { background: transparent url(\"http://img149.imageshack.us/img149/8824/ironman_1600.jpg\") !important; } /* bg 2 */ /* input, option, select, textarea,*/ div[class=\"row1\"], tr[class=\"row1\"], td[class=\"row1\"], tr[bgcolor=\"#68838B\"] { background-color: transparent !important; } /*MENU SUPERIOR*/ #header { background-color: transparent !important; font-size: 12px !important;background-repeat: repeat-x !important;height: 31px !important;} #header a:link { color: silver !important; text-decoration: none;font-weight: bold !important; } #header a:visited { color: silver !important; text-decoration: none;font-weight: bold !important; } #header a:hover { color: silver !important; text-decoration: none; font-weight: bold !important; } #headerMenu{background: transparent !important;background-color: transparent !important;background-repeat: repeat-x !important;font-family: \"Comic Sans MS\" !important;} #header li{color: gray !important;font-size:11px;height:31px;line-height:31px;text-align:center;} /*AVISOS*/ .newsitem, .promobg, .promo, .warning{background: transparent !important; font-style:italic;text-align:left !important; } /*Menu Inferior*/ .footer_l{background-image: url() !important; background-color: transparent !important; margin: 0px !important; color: #FFFFFF !important;background-repeat: repeat-x !important;} .footer_r{Display: none!important;} #footer { background: transparent !important; font-size: 12px !important;height: 31px !important; margin: 0px 0px 0px} #footer a:link { color: #FFFFFF !important; text-decoration: none;font-weight: bold !important; } #footer a:visited { color: #33FF33 !important; text-decoration: none;font-weight: bold !important; } #footer a:hover { color: #E6E6FA !important; text-decoration: none; font-weight: bold !important; } #footer .logogoogle{display: none !important;} /*CLASSES REMOVIDAS PRA FICAR UMA SKIN TRANSPARENTE*/ .botl{Display: none !important;} .botr{Display: none !important;} .lbox{Display: none !important;} .topl{Display: none !important;} .topr{Display: none !important;} .listdivi ln{Display: none !important;} .boxmidr{Display: none !important;} .topr_g{Display: none !important;} .uname{background: transparent !important;} .topr_lrg{Display: none !important;} .rbox{Display: none !important;} boxmidsmlr{Display: none !important;} .thumbbox{background-color: transparent !important;} .divihor{background-color: transparent !important;} .boxgrid{background: transparent !important;} .boxmidlock{background: transparent !important;} .boxmidlrg{background-image:none !important;} .module .topl,.module .topl_lrg,.module .topl_g{background-image:none!important;} .userinfodivi,.ln{background: transparent !important;} .tabdivi{background:transparent !important;} .listlight,.listitemlight,.listitem,.listitemchk{background: transparent !important;} .listdark,.listitemdark,.listitemsel{background: transparent !important;} .thumbbox{background-color: transparent !important;} .divihor{background-color: transparent !important;} .boxgrid{background: transparent !important;} .module .boxmid,.module .boxmidsml,.module .boxmidlrg,.module .boxmidlock{background:none!important;} a.userbutton{background: transparent !important;}";
if (typeof GM_addStyle != "undefined") {
	GM_addStyle(css);
} else if (typeof addStyle != "undefined") {
	addStyle(css);
} else {
	var heads = document.getElementsByTagName("head");
	if (heads.length > 0) {
		var node = document.createElement("style");
		node.type = "text/css";
		node.appendChild(document.createTextNode(css));
		heads[0].appendChild(node);
	}
}';
		if($_POST['w'] == "on"){
			$s .= '(function() {     function do_widen(id, min) {         var container = document.getElementById(id);         if (!container)             return;         if (min)             container.style.minWidth = min;     }     try {     do_widen("headerin", "99%");     do_widen("container", "99%");     } catch (e) {         GM_log( \'Orkut99percent exception: \' + e );		 //alert(e);		}})();';
		}
		$s .= 'var css = "body{background-image: url(\"';
		$s .= $_POST['img'];
		$s .= '\") !important;}*{background: transparent !important;';
		if($_POST['type'] == 1){
			$s .= '}';
		}else{
			$s .= 'color: white !important;}';
		}
		if($_POST['ad'] == "on"){
			$s .= '#rhs_ads{display: none !important;}';
		}
		$s .= '";if (typeof GM_addStyle != "undefined") {	GM_addStyle(css);} else if (typeof addStyle != "undefined") {	addStyle(css);} else {	var heads = document.getElementsByTagName("head");	if (heads.length > 0) {		var node = document.createElement("style");		node.type = "text/css";		node.appendChild(document.createTextNode(css));		heads[0].appendChild(node); 	}}	var td=document.getElementsByTagName("ul")[1];	td.innerHTML+="<li>&nbsp;|&nbsp;</li><li><a href=\"http://www.htmlorkut.com\">Html Orkut</a>&nbsp;|&nbsp;</li>";	var td=document.getElementsByTagName("ul")[1];	td.innerHTML+="<li><a href=\"http://www.orkutplus.net\"><b>Orkut Plus!</b></a></li>";';
		$fh = fopen("scripts/".$link, 'a');
		fwrite($fh, $s);
		fclose($fh);
?>
		<div class="loltitleclassic"><b>Success - Your Orkut Theme has been Created</b></div>
<p> Your userscript has been created and hosted on fast and reliable servers for free. :P </p>
 <div class="loltitleclassic"><b>Download or Preview Your Orkut Theme</b></div>
<p>Link for your Orkut Theme is: <br><a href="http://www.orkutplus.net/toolkit/scripts/<?php echo $link; ?>">http://www.orkutplus.net/toolkit/scripts/<?php echo $link; ?></a></p>
<p>You can directly install the userscript by clicking on the link (make sure your <a href="http://www.orkutplus.net/2006/01/greasemonkey.html">greasemonkey</a> is enabled). You can also save the theme to your desk by right clicking on the link and choosing save link as.</p>
<p><strong>You can Preview your Orkut Theme By <a href="http://www.orkutplus.net/toolkit/theme-previewer.php?i=<?php
		echo $_POST['img'];
		if($_POST['w'] == "on"){
			echo '&w=1';
		}
		if($_POST['ad'] == "on"){
			echo '&a=1';
		}
		if($_POST['type'] == 2){
			echo '&t=1';
		}
		?>
		">Clicking Here</a> </strong></p>
<div class="loltitleclassic"><b>Problem and Help</b></div>
<p>If you are facing any problem while installing or operating greasemonkey scripts (<a href="http://www.orkutplus.net/category/userscripts">userscripts</a>), you should refer to <a href="http://orkutplus.net/2007/02/tutorial-how-do-i-install-and-operate.html">this tutorial</a>.</p>
	<?php
	}else{
		echo "<div class='loltitleclassic'><b>Duplicate File Name!</b></div><p>This name for the theme already exists. Please <a href='http://www.orkutplus.net/toolkit/scripts/theme-generator.php'>go back</a> and choose another file name.</p><br>";
	}
}else{ ?>
<form method="post">
	<div class="loltitleclassic">Image Link - Use Large Images for Best Results</div>
	<p><input type="text" name="img" size="40" value="http://yourimagelink.jpg" onclick="this.value='';" onfocus="this.value='';"></p>
	<div class="loltitleclassic"><b>Image Type - NEW!</b></div>
	<p><input type="radio" checked="true" name="type" value="1">The Image is Light</p>
	<p><input type="radio" name="type" value="2">The Image is Dark</p>
	<div class="loltitleclassic">Desired Userscript File Name</div>
	<p><input type="text" name="link" size="40" value="OrkutPlus" onclick="this.value='';" onfocus="this.value='';">&nbsp;.user.js</p>
        <div class="loltitleclassic">Other Options</div><p>
        <input type="checkbox" name="w" id="w" checked=true>&nbsp;99% Width</p>
	<input type="checkbox" name="ad" id="ad" checked=true>&nbsp;<strong>Remove Ads - NEW!</strong></p>
        <br />
        <p align="left"><input type="submit" value="Create Theme" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
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
<!--Begin Sidebar-->
<?php get_sidebar(); ?>
<!--End Sidebar-->
<!--Begin Footer-->
<?php get_footer(); ?>
<!--End Footer-->
</div>
</body>
</html>
