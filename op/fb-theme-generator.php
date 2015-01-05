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

img = "'.$_POST['img'].'";

var css = "body{background-image: url("+img+") !important;} *{background: transparent !important;';
		if($_POST['type'] == 1){
			$s .= '}';
		}else{
			$s .= 'color: white !important;}';
		}
		/*
		if($_POST['w'] == "on"){
			$s .= '(function() {     function do_widen(id, min) {         var container = document.getElementById(id);         if (!container)             return;         if (min)             container.style.minWidth = min;     }     try {     do_widen("headerin", "99%");     do_widen("container", "99%");     } catch (e) {         GM_log( \'Orkut99percent exception: \' + e );		 //alert(e);		}})();';
		}
		if($_POST['ad'] == "on"){
			$s .= '#right_column { width: 77% !important; } .ad_capsule, #sidebar_ads, .adcolumn, .emu_sponsor, div[id^=\"emu_\"], .social_ad, .sponsor, .footer_ad,  #home_sponsor, .house_sponsor, #home_sponsor_nile, .PYMK_Reqs_Sidebar { display: none !important; } #wallpage { width: 700px !important; }';
		}*/
		$s .= '";

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