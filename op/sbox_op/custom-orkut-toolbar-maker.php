<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Custom Orkut Toolbar Maker - By OrkutPlus!</title>
<style type="text/css">
body{
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif; 
	font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
.myform{
	margin:0 auto;
	width:auto;
	padding:14px;
}
	#stylized{
		border:solid 2px #b7ddf2;
		background:#ebf4fb;
	}
	#stylized h1 {
		font-size:14px;
		font-weight:bold;
		margin-bottom:8px;
	}
	#stylized p{
		font-size:11px;
		color:#666666;
		margin-bottom:20px;
		border-bottom:solid 1px #b7ddf2;

	}
	#stylized ul,li{
		font-size:11px;
		color:#666666;
		margin-bottom:5px;
	}
	#stylized label{
		display:block;
		font-weight:bold;
		text-align:right;
		width:200px;
		float:left;
		padding:6px 0 0 0;
	}
#stylized label2{
		display:block;
		font-weight:bold;
		text-align:right;
		float:left;
		padding:6px 0 0 0;
	}
	#stylized .small{
		color:#666666;
		display:block;
		font-size:11px;
		font-weight:normal;
		text-align:right;
		width:140px;
	}
	#stylized input{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		margin:2px 0 20px 10px;
	}
	#stylized button{ 
		clear:both;
		margin-left:150px;
		width:150px;
		height:31px;
		background:#666666 url(img/button.png) no-repeat;
		text-align:center;
		line-height:31px;
		color:#FFFFFF;
		font-size:11px;
		font-weight:bold;
	}
</style>
<link rel="stylesheet" href="ddtabmenufiles/ddcolortabs.css" media="screen" type="text/css">
		<script src="ddtabmenufiles/ddtabmenu.js" type="text/javascript"></script>
		<script type="text/javascript">
		//SYNTAX: ddtabmenu.definemenu("tab_menu_id", integer OR "auto")
		ddtabmenu.definemenu("ddtabs1", 0) //initialize Tab Menu #1 with 1st tab selected
		ddtabmenu.definemenu("ddtabs2", 1) //initialize Tab Menu #2 with 2nd tab selected
		ddtabmenu.definemenu("ddtabs3", 1) //initialize Tab Menu #3 with 2nd tab selected
		ddtabmenu.definemenu("ddtabs4", 2) //initialize Tab Menu #4 with 3rd tab selected
		ddtabmenu.definemenu("ddtabs5", -1) //initialize Tab Menu #5 with NO tabs selected (-1)
		</script>

</head>

<body>
	<div id="ddtabs4" class="ddcolortabs">
<ul>
<li><a href="http://sandbox.orkutplus.net/apps/custom-orkut-toolbar-maker.php" rel="ct1"><span>Home</span></a></li>
<li><a href="http://www.orkutplus.net/apps/custom-orkut-toolbar-maker" target="_blank" rel="ct1"><span>Help Guide</span></a></li>
<li><a href="http://www.orkut.com/AppInfo.aspx?appId=528226213025" rel="ct2" target="_blank"><span>Orkut Theme Generator</span></a></li>
<li><a href="http://www.orkut.com/Community.aspx?cmm=25675519" rel="ct2" target="_blank"><span>Our Community</span></a></li>
<li><a href="http://www.orkutplus.net/orkut-toolkit" rel="ct3" target="_blank"><span>More Orkut Tools</span></a></li>
<li><a href="http://www.orkutplus.net/" rel="ct3" target="_blank"><span>Developer Website</span></a></li>
<li><a href="http://www.orkut.com/Profile.aspx?uid=6090387655098571394" target="_blank"><span>Contact</span></a></li>

</ul>
</div>
<div class="ddcolortabsline">&nbsp;</div>

<DIV class="tabcontainer">

<div id="ct1" class="tabcontent">
</div>

<div id="ct2" class="tabcontent">

</div>

<div id="ct3" class="tabcontent">
</div>

</DIV>
<?php

if($_POST['link1'] != NULL && $_POST['name1'] != NULL){
	$name1 = $_POST['name1'];
	$name2 = $_POST['name2'];
	$name3 = $_POST['name3'];
	if($_POST['opt2'] != "on"){
		$temptext = $name1.$name2.$name3;
		while(strlen($temptext) > 30){
			if($name3 != NULL){
				$len = strlen($name3) - 1;
				$name3 = substr($name3, 0, $len);
			}elseif($name2 != NULL){
				$len = strlen($name2) - 1;
				$name2 = substr($name2, 0, $len);
			}elseif($name1 != NULL){
				$len = strlen($name1) - 1;
				$name1 = substr($name1, 0, $len);
			}
			$temptext = $name1.$name2.$name3;
		}
	}
	function getscriptname($length = 15){
		$characters = "0123456789abcdefghijklmnopqrstuvwxyz";
		do{
			$string = "";
			for ($p = 0; $p < $length; $p++) {
				$string .= $characters[mt_rand(0, strlen($characters))];
			}
			$string .= ".user.js";
			return $string;
		}while(file_exists("toolbars/".$string));
		return $string;
	}
	$s = '';
	$s .= '// ==UserScript==
// @name	Custom Orkut Toolbar By OrkutPlus.net
// @namespace	OrkutPlus.net (Coder - Gautam)
// @description	Custom Orkut Toolbar (For Shortcut Links in the Top Orkut Bar)
// @include	htt*://*.orkut.*
//==/UserScript==';
if($_POST['opt1'] != "on"){
$s .= '
var css = ".useremail{display: none !important;}";
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
}
$s .= '
var ft=function ft(){
	var li=document.createElement("li");
	li.innerHTML="&nbsp;|&nbsp;<a href=\"'.$_POST['link1'].'\">'.$name1.'</a>';
	if($_POST['link2'] != NULL && $name2 != NULL){
		$s .= '&nbsp;|&nbsp;<a href=\"'.$_POST['link2'].'\">'.$name2.'</a>';
	}
	if($_POST['link3'] != NULL && $name3 != NULL){
		$s .= '&nbsp;|&nbsp;<a href=\"'.$_POST['link3'].'\">'.$name3.'</a>';
	}
	$s .='";
	void(headerin.getElementsByTagName("ul")[1].appendChild(li));
}
ft=String(ft);
ft=ft.substring(16,ft.length-2);
script=document.createElement("script");
script.innerHTML=ft;
document.getElementsByTagName("head")[0].appendChild(script);';
	$scriptwname = getscriptname();
	$fh = fopen("toolbars/".$scriptwname, 'a');
	fwrite($fh, $s);
	fclose($fh);
	?>
<p align="center"><img src="http://sandbox.orkutplus.net/apps/success.jpg" class="aligncenter" align="center"/></p>
<div id="stylized" class="myform">
<label2>We Have Successfully Created Your <b>Customized Orkut Toolbar</b></label2>
<br />
<ul><li>Your userscript has been created and are hosted on fast and reliable servers of <a href="http://www.orkutplus.net/" target="_blank">Orkut Plus!</a> free of cost.</li>
<li>Download or Install Your Custom Orkut Toolbar - <a href="http://sandbox.orkutplus.net/apps/toolbars/<?php echo $scriptwname; ?>" target="_blank">http://sandbox.orkutplus.net/apps/toolbars/<?php echo $scriptwname; ?></a></li>
</ul>
<br /><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* theme app 728x15, created 4/29/09 */
google_ad_slot = "6908591118";
google_ad_width = 728;
google_ad_height = 15;
//-->
</script><script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<br />
<div id='stylized' class='myform'>
<label2>&nbsp;&nbsp;&nbsp;Advertisements</label2>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* theme app - 728x90, created 4/29/09 */
google_ad_slot = "6275172588";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script><script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center></div><br />

<div id="stylized" class="myform">
<label2>Installing Custom Orkut Toolbar</label2>
<br/><br/>
<ul><li>Firefox Users - <a href="http://www.orkutplus.net/tutorials/userscripts/firefox" target="_blank">Please See This Tutorial</a></li>
<li> Internet Explorer Users - <a href="http://www.orkutplus.net/tutorials/userscripts/internet-explorer" target="_blank">Please See This Tutorial</a></li>
<li> Google Chrome Users - <a href="http://www.orkutplus.net/tutorials/userscripts/google-chrome" target="_blank">Please See This Tutorial</a></li>
<li> Opera Users - <a href="http://www.orkutplus.net/tutorials/userscripts/opera" target="_blank">Please See This Tutorial</a></li></ul></div></div>
<br /><br />
<div id='stylized' class='myform'><label2>Need Help?</label2>
<br/><br/>
<ul><li><a href="http://www.orkutplus.net/apps/custom-orkut-toolbar-maker/usage" target="_blank">Step By Step Tutorial to Create your Custom Orkut Toolbar</a></li>
<li><b>Browser Specific Help</b> - <a href="http://www.orkutplus.net/tutorials/userscripts/firefox" target="_blank" >Firefox</a> | <a href="http://www.orkutplus.net/tutorials/userscripts/internet-explorer" target="_blank">Internet Explorer</a> | <a href="http://www.orkutplus.net/tutorials/userscripts/google-chrome" target="_blank">Google Chrome</a> | <a href="http://www.orkutplus.net/tutorials/userscripts/opera" target="_blank">Opera</a></li>
<li>If you still can't get it - Post your problem in Our <a href="http://www.orkutplus.net/forum/" target="_blank">Orkut Help and Support Forum</a>. We'll Get back to you as soon as possible.</li></ul></div><br /><br />
<div id="stylized" class="myform"><button type="submit" onclick="javascript:window.location='http://sandbox.orkutplus.net/apps/custom-orkut-toolbar-maker.php';">Go Back</button></div>
<?php
}else{ ?>
<div id="stylized" class="myform">
<form id="form1" name="form1" method="post" action="">

	<label>Enter Link - </label>	<input type="text" name="link1" value="http://www.orkutplus.net/" style="width:400px;" onclick="document.getElementById('lp2').style.display='';document.getElementById('l2p2').style.display='';"><br /><br />

	<label>Name - </label>	<input type="text" name="name1" value="OrkutPlus" style="width:400px;" onclick="document.getElementById('lp2').style.display='';document.getElementById('l2p2').style.display='';"><br /><br />

<div id="lp2" style="display:none;">
	<label>Enter Link (Optional) - </label>
	<input type="text" name="link2" style="width:400px;" onclick="document.getElementById('lp3').style.display='';document.getElementById('l2p3').style.display='';"><br /><br /><br /><br />
</div>
<div id="l2p2" style="display:none;">
	<label>Name - </label>
	<input type="text" name="name2" style="width:400px;" onclick="document.getElementById('lp3').style.display='';document.getElementById('l2p3').style.display='';"><br /><br /><br /><br />
</div>
<div id="lp3" style="display:none;">
	<label>Enter Link (Optional) - </label>
	<input type="text" name="link3" style="width:400px;"><br /><br /><br />
</div>
<div id="l2p3" style="display:none;">
	<label>Name - </label>
	<input type="text" name="name3" style="width:400px;"><br /><br /><br /><br />
</div>
<br />
<br />
<label2>Important Notes</label2><br />
<p><br /></p>
<ul>
	<li>Enter Link as the complete url of the destination page(including <b>http://</b>).</li>
	<li>You can add at max 3 links in your orkut link bar. Second and Third Links are Optional.
	<li>You will see more input fields once you configure the first link.</li>
	<li><b>Important</b> - By Default, We hide your email address in orkut top linkbar to maximize the space available to you.</li>
	<li><b>Important</b> - By Default, we enforce 30 character limit in text boxes to keep everything perfect and fixed.</li>
	<li><b>Important</b> - If you want to override the restrictions, please see the options below.</li>
</ul>
<br />

<label2>Configure Options and Restrictions</label2><br />
<p><br /></p>
<label2>Option 1 - Show or Hide Email Address</label2>
<br /><br />	
<ul>
	<li>By default, we hide your e-Mail in orkut header linkbar so that you can utilize more characters for your links.</li>
	<li>You can change this setting. (<b>NOT</b> recommended for users who have entered 2 or More Links)</li>
</ul>

<label>Do Not Hide My Email - </label><label2><input type="checkbox" name="opt1" id="opt1"></label2><p>&nbsp;<br /><br /></p>
<br />
<label2>Option 2 - Enforce Maximum Length Limit?</label2>
<br /><br />	
<ul>
	<li>By default, we enforce a restriction of 30 characters n the text boxes.</li>
	<li>This is done because orkut wipes out text written more than these characters</li>
	<li>If you want to override this restriction anyway (NOT Recommended), you can configure this option</li>
</ul>
	<label>Remove Length Restriction - </label><label2><input type="checkbox" name="opt2" id="opt2"></label2><p>&nbsp;<br /><br /></p>

<label2>&nbsp;&nbsp;&nbsp;Advertisements</label2>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* theme app - 728x90, created 4/29/09 */
google_ad_slot = "6275172588";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
<button type="submit">Create Toolbar</button><br />
<br /><div align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* theme app 728x15, created 4/29/09 */
google_ad_slot = "6908591118";
google_ad_width = 728;
google_ad_height = 15;
//-->
</script><script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
</form>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1123588-6");
pageTracker._trackPageview();
} catch(err) {}</script>
</div>
<?php
}
?>