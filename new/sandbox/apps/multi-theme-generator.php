<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Multiple Theme Generator App - By OrkutPlus!</title>
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
	
.ddcolortabs{
padding: 0;
width: 100%;
background: transparent;
voice-family: "\"}\"";
voice-family: inherit;
}

.ddcolortabs ul{
font: normal 11px Arial, Verdana, sans-serif;
margin:0;
padding:0;
list-style:none;
}

.ddcolortabs li{
display:inline;
margin:0 2px 0 0;
padding:0;
text-transform:uppercase;
}


.ddcolortabs a{
float:left;
color: black;
background: #EBF4FB url(http://sandbox.orkutplus.net/apps/ddtabmenufiles/media/color_tabs_left.gif) no-repeat left top;
margin:0 2px 0 0;
padding:0 0 1px 3px;
text-decoration:none;
letter-spacing: 1px;
}

.ddcolortabs a span{
float:left;
display:block;
background: transparent url(http://sandbox.orkutplus.net/apps/ddtabmenufiles/media/color_tabs_right.gif) no-repeat right top;
padding: 6px 8px 3px 7px;
}

.ddcolortabs a span{
float:none;
}

.ddcolortabs a:hover{
background-color: #b7ddf2;
}

.ddcolortabs a:hover span{
background-color: #b7ddf2;
}

.ddcolortabs a.current, #ddcolortabs a.current span{ /*currently selected tab*/
background-color: #EBF4FB;
}

.ddcolortabsline{
clear: both;
padding: 0;
width: 100%;
height: 8px;
line-height: 8px;
background: #b7ddf2;
border-top: 1px solid #fff; /*Remove this to remove border between bar and tabs*/
}

.tabcontainer{
clear: left;
width:95%; /*width of 2nd level sub menus*/
height:1.5em; /*height of 2nd level sub menus. Set to largest's sub menu's height to avoid jittering.*/
}

.tabcontent{
display:none;
}
</style>
<script type="text/javascript">
//DD Tab Menu- Script rewritten April 27th, 07: http://www.dynamicdrive.com
//**Updated Feb 23rd, 08): Adds ability for menu to revert back to default selected tab when mouse moves out of menu

//Only 2 configuration variables below:

var ddtabmenu={
	disabletablinks: false, //Disable hyperlinks in 1st level tabs with sub contents (true or false)?
	snap2original: [true, 300], //Should tab revert back to default selected when mouse moves out of menu? ([true/false, delay_millisec]

	currentpageurl: window.location.href.replace("http://"+window.location.hostname, "").replace(/^\//, ""), //get current page url (minus hostname, ie: http://www.dynamicdrive.com/)

definemenu:function(tabid, dselected){
	this[tabid+"-menuitems"]=null
	this[tabid+"-dselected"]=-1
	this.addEvent(window, function(){ddtabmenu.init(tabid, dselected)}, "load")
},

showsubmenu:function(tabid, targetitem){
	var menuitems=this[tabid+"-menuitems"]
	this.clearrevert2default(tabid)
 for (i=0; i<menuitems.length; i++){
		menuitems[i].className=""
		if (typeof menuitems[i].hasSubContent!="undefined")
			document.getElementById(menuitems[i].getAttribute("rel")).style.display="none"
	}
	targetitem.className="current"
	if (typeof targetitem.hasSubContent!="undefined")
		document.getElementById(targetitem.getAttribute("rel")).style.display="block"
},

isSelected:function(menuurl){
	var menuurl=menuurl.replace("http://"+menuurl.hostname, "").replace(/^\//, "")
	return (ddtabmenu.currentpageurl==menuurl)
},

isContained:function(m, e){
	var e=window.event || e
	var c=e.relatedTarget || ((e.type=="mouseover")? e.fromElement : e.toElement)
	while (c && c!=m)try {c=c.parentNode} catch(e){c=m}
	if (c==m)
		return true
	else
		return false
},

revert2default:function(outobj, tabid, e){
	if (!ddtabmenu.isContained(outobj, tabid, e)){
		window["hidetimer_"+tabid]=setTimeout(function(){
			ddtabmenu.showsubmenu(tabid, ddtabmenu[tabid+"-dselected"])
		}, ddtabmenu.snap2original[1])
	}
},

clearrevert2default:function(tabid){
 if (typeof window["hidetimer_"+tabid]!="undefined")
		clearTimeout(window["hidetimer_"+tabid])
},

addEvent:function(target, functionref, tasktype){ //assign a function to execute to an event handler (ie: onunload)
	var tasktype=(window.addEventListener)? tasktype : "on"+tasktype
	if (target.addEventListener)
		target.addEventListener(tasktype, functionref, false)
	else if (target.attachEvent)
		target.attachEvent(tasktype, functionref)
},

init:function(tabid, dselected){
	var menuitems=document.getElementById(tabid).getElementsByTagName("a")
	this[tabid+"-menuitems"]=menuitems
	for (var x=0; x<menuitems.length; x++){
		if (menuitems[x].getAttribute("rel")){
			this[tabid+"-menuitems"][x].hasSubContent=true
			if (ddtabmenu.disabletablinks)
				menuitems[x].onclick=function(){return false}
			if (ddtabmenu.snap2original[0]==true){
				var submenu=document.getElementById(menuitems[x].getAttribute("rel"))
				menuitems[x].onmouseout=function(e){ddtabmenu.revert2default(submenu, tabid, e)}
				submenu.onmouseover=function(){ddtabmenu.clearrevert2default(tabid)}
				submenu.onmouseout=function(e){ddtabmenu.revert2default(this, tabid, e)}
			}
		}
		else //for items without a submenu, add onMouseout effect
			menuitems[x].onmouseout=function(e){this.className=""; if (ddtabmenu.snap2original[0]==true) ddtabmenu.revert2default(this, tabid, e)}
		menuitems[x].onmouseover=function(){ddtabmenu.showsubmenu(tabid, this)}
		if (dselected=="auto" && typeof setalready=="undefined" && this.isSelected(menuitems[x].href)){
			ddtabmenu.showsubmenu(tabid, menuitems[x])
			this[tabid+"-dselected"]=menuitems[x]
			var setalready=true
		}
		else if (parseInt(dselected)==x){
			ddtabmenu.showsubmenu(tabid, menuitems[x])
			this[tabid+"-dselected"]=menuitems[x]
		}
	}
}
}
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
<li><a href="http://sandbox.orkutplus.net/apps/multi-theme-generator.php" rel="ct1"><span>Home</span></a></li>
<li><a href="http://www.orkutplus.net/apps/orkut-theme-generator/help" target="_blank" rel="ct1"><span>Help Guide</span></a></li>
<li><a href="http://www.orkutplus.net/apps/orkut-theme-generator/usage" rel="ct2" target="_blank"><span>Installing Themes</span></a></li>
<li><a href="http://orkut.com/Main#Community.aspx?cmm=25675519" rel="ct2" target="_blank"><span>Join Our Community</span></a></li>
<li><a href="http://orkutplus.net/orkut-toolkit" rel="ct3" target="_blank"><span>More Orkut Tools</span></a></li>
<li><a href="http://orkutplus.net" rel="ct3" target="_blank"><span>Orkut Updates</span></a></li>
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
if(isset($_POST['link']) && isset($_POST['img'])){
        $imgs = str_replace("http://", "", $_POST['img']);
        $links=explode(":",$_POST['link']);
        $imgs=explode(":",$imgs);
        $simgs=sizeof($imgs);
	$slinks=sizeof($links);
        $slinks--;
        $simgs--;
        if($slinks == $simgs){
                for($c=0;$c<=$slinks;$c++)
		{
			$s = '';
                        $link = stripslashes($links[$c].".user.js");
                        $link = str_replace("/", "", $link);
                        if(file_exists("themes/".$link) == FALSE){
                                $s .= '// ==UserScript==
// @name	-ORKUT- Theme By orkutplus.net
// @namespace     Orkut Theme Maker - Gautam
// @description	Make your own theme for orkut!
// @author	OrkutPlus (Coder - Gautam)
// @homepage	http://www.orkutplus.net
// @include	http://www.orkut.*/*
// ==/UserScript==';
				if($_POST['w'] == "on"){
					$s .= '
(function() {
     function do_widen(id, min) {
         var container = document.getElementById(id);
         if (!container)
             return;
         if (min)
             container.style.minWidth = min;
     }
     try {
     do_widen("headerin", "99%");
     do_widen("container", "99%");
     } catch (e) {
         GM_log( \'Orkut99percent exception: \' + e );
		 //alert(e);
		}
    
})();
';
				}
                                $s .= 'var css = "body{background-image: url(\"';
                                $s .= "http://".$imgs[$c];
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
                                $fh = fopen("themes/".$link, 'a');
                                fwrite($fh, $s);
                                fclose($fh);
                                ?>
<table><tr width="100%"><td><img src="http://sandbox.orkutplus.net/apps/success.jpg" class="alignleft" align="left"/></td><td width="100%"><div id="stylized" class="myform">
<label2>We have Successfully Created your Orkut Theme - <u><?php echo $link; ?></u></label2>
<br/><br/>
<ul><li>Your userscript has been created and are hosted on fast and reliable servers of <a href="http://orkutplus.net" target="_blank">Orkut Plus!</a> free of cost.</li>
<li>You can Download or Preview Your Orkut Themes before installing them to your Orkut Profile</li>
<li>Download or Install Your Orkut Theme - <a href="http://sandbox.orkutplus.net/apps/themes/<?php echo $link; ?>" target="_blank">http://sandbox.orkutplus.net/apps/themes/<?php echo $link; ?></a></li>
<li>You can Preview your Orkut Theme - <a href="http://sandbox.orkutplus.net/apps/theme-previewer.php?i=http://<?php
                                echo $imgs[$c];
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
		" target="_blank">Click Here to Preview Your Orkut Theme</a></li></ul><br/></div></td></tr></table>
                <?php
                        }else{
                             echo "<div id='stylized' class='myform'><img src='http://sandbox.orkutplus.net/apps/error.png' class='alignleft' align='left' height='60'><label2>&nbsp;&nbsp;&nbsp;Duplicate File Name Detected for the theme - <u>$link</u>.</label2><br /><br /><ul><li>&nbsp;&nbsp;&nbsp;&nbsp;This name already exists for another theme. Please <a href='http://sandbox.orkutplus.net/apps/multi-theme-generator.php'>go back</a> and choose a new name.</li></ul></div>";
                        }
                echo '</div><br /><br />';
                flush();
                }
        }else{
                echo "<table><tr width=\"100%\"><td><img src='http://sandbox.orkutplus.net/apps/error.png' class='alignleft' align='left'></td><td width=\"100%\"><div id='stylized' class='myform'><label2>The number of Names entered do not complement the number of Image URLs you have given.</label2><br /><br /><ul><li>Please <a href='http://sandbox.orkutplus.net/apps/multi-theme-generator.php'>go back</a> and try again.</li><li>The theme(s) were not created.</ul><br /></div><br /><br /></td></tr></table>";
        }
        ?>
<div id='stylized' class='myform'>
<label2>&nbsp;&nbsp;&nbsp;Advertisements</label2>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* theme app - 728x90, created 4/29/09 */
google_ad_slot = "6275172588";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script></p>

<center><script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* theme app 728x15, created 4/29/09 */
google_ad_slot = "6908591118";
google_ad_width = 728;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center></div><br/>

<div id="stylized" class="myform">
<label2>Installing Orkut Themes</label2>
<br/><br/>
<ul><li>Firefox Users - <a href="http://www.orkutplus.net/apps/orkut-theme-generator/help/firefox" target="_blank">Please See This Tutorial</a></li>
<li> Internet Explorer Users - <a href="http://www.orkutplus.net/apps/orkut-theme-generator/help/internet-explorer" target="_blank">Please See This Tutorial</a></li>
<li> Google Chrome Users - <a href="http://www.orkutplus.net/apps/orkut-theme-generator/help/google-chrome" target="_blank">Please See This Tutorial</a></li>
<li> Opera Users - <a href="http://www.orkutplus.net/apps/orkut-theme-generator/help/opera" target="_blank">Please See This Tutorial</a></li></ul></div></div>
<br /><br />
<div id='stylized' class='myform'><label2>Need Help?</label2>
<br/><br/>
<ul><li><a href="http://www.orkutplus.net/apps/orkut-theme-generator/usage" target="_blank">Step By Step Tutorial to Generate Multiple Orkut Themes</a></li>
<li><b>Browser Specific Help</b> - <a href="http://www.orkutplus.net/apps/orkut-theme-generator/help/firefox" target="_blank" >Firefox</a> | <a href="http://www.orkutplus.net/apps/orkut-theme-generator/help/internet-explorer" target="_blank">Internet Explorer</a> | <a href="http://www.orkutplus.net/apps/orkut-theme-generator/help/google-chrome" target="_blank">Google Chrome</a> | <a href="http://www.orkutplus.net/apps/orkut-theme-generator/help/opera" target="_blank">Opera</a></li>
<li>If you still can't get it - Post your problem in Our <a href="http://www.orkutplus.net/forum/" target="_blank">Orkut Help and Support Forum</a>. We'll Get back to you as soon as possible.</li></ul></div><br /><br />
<div id="stylized" class="myform"><button type="submit" onclick="javascript:window.location='http://sandbox.orkutplus.net/apps/multi-theme-generator.php';">Go Back</button></div>
<?php
}else{ ?>
<div id="stylized" class="myform">
  <form id="form1" name="form1" method="post" action="">
	<label>Enter Multiple Image Links - </label>
	<input type="text" name="img" value="http://co.in/a.bmp:http://iam.in/b.png" style="width:400px;"><br /><br />
<label>These Image(s) Are - </label><input type="radio" checked="true" name="type" value="1"><label2>&nbsp;Light</label2>&nbsp;&nbsp;<input type="radio" name="type" value="2"><label2>&nbsp;&nbsp;Dark</label2><br /><br />
<br/>
</p>

<p><ul><li>Use Large Images for Best Results - <a href="http://images.google.com/images?imgsz=xxlarge&gbv=2&hl=en&sa=1&q=katrina+kaif&btnG=Search+Images&aq=f&oq=" target="_blank">Example</a>.</li><li>Enter as many Image Links as you want to.</li><li>Image Links <b>Must</b> be Separated with a ":" (<a href="http://en.wikipedia.org/wiki/Colon_(punctuation)" target="_blank">colon</a>).</li><li>Links <b>Must NOT</b> contain a colon - ":" (without quotes).</li><li>Specifying if the Images are 'Light' or 'Dark' helps us Fix Colors of Other Elements in the Theme.</li></ul></p>
<br/><br/>	
<label>Desired Userscript File Name</label>
	<input type="text" name="link" value="OrkutPlus:OP"  style="width:400px;"><label2>&nbsp;.user.js</label2><br /><br />
	<p><ul><li>Make sure the Number of Names entered complement the number of Image URLs you have given.</li><li>Names <b>Must</b> be Separated with a ":" (<a href="http://en.wikipedia.org/wiki/Colon_(punctuation)" target="_blank">colon</a>).</li><li>Name(s) should not contain ".user.js" or ":" (without quotes).</li></ul><br/></p></p><br/>
	<label>Wide Screen Compatibility?</label>
	<input type="checkbox" name="w" id="w" checked=true><p>&nbsp;<br /><br /></p>
<ul><li>This resizes Orkut theme to fit best on your screen.</li><li>Recommended for Wide Screen Notebooks</li></ul>
<br/>
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
<button type="submit">Create Theme(s)</button><br /><br />  </form>
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