<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/leftbar.php"); ?>
<div class="rbroundbox">
<div class="rbtop"><div></div></div>
<div class="rbcontent">
<div id="postcol" class="fixheight">
<div class="post_title">
<h2 class="title"><a href="http://themes.orkutplus.net/theme-generator.php">Orkut Theme Generator - Create Your Own Themes in a Single Click!</a></h2>
</div>
<div class="content">
<div class="lolfullbox"><p><strong>Our Users have already generated <u>76,000+ Themes</u> which are proudly hosted on our fast and reliable servers! It's your turn now!</strong></p></div>
<br />
<?php
if(isset($_POST['fname']) && isset($_POST['img']) && isset($_POST['type'])){
        $link = stripslashes($_POST['link'].".user.js");
        $link = str_replace("/", "", $link);
	$link = "scripts/".$link;
        if(file_exists($link) == FALSE){
		$s = '';
                $s .= '// ==UserScript==
// @name	ORKUT- Theme By orkutplus.net
// @namespace	Orkut Theme Maker - Gautam
// @description	Make your own theme for orkut!
// @author	OrkutPlus (Coder - Gautam)
// @homepage	http://www.orkutplus.net
// @include	http://*.orkut.*/*
// ==/UserScript==';
		if($_POST['w'] == "on"){
			$s .= '(function() {     function do_widen(id, min) {         var container = document.getElementById(id);         if (!container)             return;         if (min)             container.style.minWidth = min;     }     try {     do_widen("headerin", "99%");     do_widen("container", "99%");     } catch (e) {         GM_log( \'Orkut99percent exception: \' + e );		 //alert(e);		}})();';
		}
		$s .= '.userinfodivi,.ln,a.userbutton:hover{background-color:#FF4141 !important} 
body { background:url(';
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
		$fh = fopen($link, 'a');
		fwrite($fh, $s);
		fclose($fh);
?>
<div class="loltitleclassic"><b>Success - Your Orkut Theme has been Created</b></div>
<p> Your userscript has been created and hosted on fast and reliable servers for free. :P </p>
<div class="loltitleclassic"><b>Download or Preview Your Orkut Theme</b></div>
<p>Link for your Orkut Theme is: <br><a href="scripts/<?php echo $link; ?>">http://www.orkutplus.net/toolkit/scripts/<?php echo $link; ?></a></p>
<p>You can directly install the userscript by clicking on the link (make sure your <a href="http://www.orkutplus.net/2006/01/greasemonkey.html">greasemonkey</a> is enabled). You can also save the theme to your desk by right clicking on the link and choosing save link as.</p>
<p><strong>You can Preview your Orkut Theme By <a href="theme-previewer.php?i=<?php
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
                echo "<div class='loltitleclassic'><b>Duplicate File Name!</b></div><p>This name for the theme already exists. Please <a href='theme-generator.php'>go back</a> and choose another file name.</p><br>";
        }
}else{ ?>
<form method="POST">
	<div class="loltitleclassic">Image Link - Use Large Images for Best Results</div>
	<p><input type="text" name="img" size="113" value="http://yourimagelink.jpg" onclick="this.value='';" onfocus="this.value='';"></p>
	<div class="loltitleclassic">Desired Userscript File Name</div>
	<p><input type="text" name="fname" size="105" value="OrkutPlus" onclick="this.value='';" onfocus="this.value='';">&nbsp;.user.js</p>
	<!--<div class="loltitleclassic"><b>Image Type - NEW!</b></div>
	<p><input type="radio" checked="true" name="type" value="1">The Image is Light</p>
	<p><input type="radio" name="type" value="2">The Image is Dark</p>-->
	<div class="loltitleclassic">Colors</div><p>
	<p>Background Color: <input name="bgcol" type="text" id="bgcol" style="width:175px;" value="#FFFFFF" readonly="readonly" />&nbsp;&nbsp;<span id="control1" class="colorpreview">&nbsp;</span></p>
	<p>Link Color: <input name="lcol" type="text" id="lcol" style="width:220px;" value="#0009FF" readonly="readonly" />&nbsp;&nbsp;<span id="control2" class="colorpreview">&nbsp;</span></p>
	<p>Link Hover Color: <input name="lhcol" type="text" id="lhcol" style="width:182px;" value="#002BFF" readonly="readonly" />&nbsp;&nbsp;<span id="control3" class="colorpreview">&nbsp;</span></p>
	<p>Profile Box Clear Color: <input name="pccol" type="text" id="pccol" style="width:146px;" value="#DFDFDF" readonly="readonly" />&nbsp;&nbsp;<span id="control4" class="colorpreview">&nbsp;</span></p>
	<p>Profile Box Dark Color: <input name="pdcol" type="text" id="pdcol" style="width:149px;" value="#CBCBCB" readonly="readonly" />&nbsp;&nbsp;<span id="control5" class="colorpreview">&nbsp;</span></p>
        <div class="loltitleclassic">Other Options</div><p>
        <input type="checkbox" name="w" id="w" checked=true>&nbsp;99% Width</p>
	<input type="checkbox" name="ad" id="ad" checked=true>&nbsp;<strong>Remove Ads - NEW!</strong></p>
        <br>
        <p align="left"><input type="submit" value="Create Theme" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
</form>
<div id="ddcolorwidget">
Change box colors:
<div id="ddcolorpicker" style="position:relative;"></div>
</div>
<script type="text/javascript">
ddcolorpicker.init({
colorcontainer: ['ddcolorwidget', 'ddcolorpicker'], //id of widget DIV, id of inner color picker DIV
displaymode: 'float', //'float' or 'inline'
floatattributes: ['Choose Color', 'width=370px,height=230px,resize=0,scrolling=0,center=1'], //'float' window attributes
fields: ['bgcol:control1', 'lcol:control2', 'lhcol:control3', 'pccol:control4', 'pdcol:control5'] //[fieldAid[:optionalcontrolAid], fieldBid[:optionalcontrolBid], etc]
})
</script></small>
<p>In case you face any problem or need help operating this tool, you can refer to <a href="http://www.orkutplus.net/2008/09/orkut-themes-generator-create-your-own-themes-in-a-single-click.html">this help post</a> for the same. You can also use some of the most exciting orkut tools from our <a href="http://www.orkutplus.net/orkut-toolkit">Exclusive Orkut Toolkit</a>.</p>
<?php
}
?>
</div></div><!--content n postcol-->
</div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("includes/footer.php"); ?>