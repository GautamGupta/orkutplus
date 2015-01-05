<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>New Orkut Invites - By OrkutPlus!</title>
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
		width:250px;
		height:31px;
		background:#666666 url(img/button.png) no-repeat;
		text-align:center;
		line-height:31px;
		color:#FFFFFF;
		font-size:14px;
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
<li><a href="http://sandbox.orkutplus.net/apps/new-orkut.php" rel="ct1"><span>Home</span></a></li>
<li><a href="http://www.orkutplus.net/" rel="ct1"><span>Visit our Website!</span></a></li>
<li><a href="http://orkut.com/Community.aspx?cmm=25675519" rel="ct2" target="_blank"><span>Join Our Community</span></a></li>
<li><a href="http://www.orkutplus.net/" rel="ct3" target="_blank"><span>Orkut Updates</span></a></li>
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
<img src="http://img682.imageshack.us/img682/5058/rounded.png" target="_blank" alt="" style="float:right;"><label2>About This App</label2>
<br /><br />
Before any other thought comes to you mind, we would like to introduce ourselves:<br />
This application has been created and brought to you by OrkutPlus.Net - One of the Most Popular Blog on Orkut. Orkut Plus! clocks more than three quarters of a million page views every month and has been featured in various popular web publications. We have held many giveaways before but this time we are planning to do something on a big scale.
</div>
<br /><br />
<div id='stylized' class='myform'><label2>About this Giveaway</label2>
<br /><br />
We are in deed giving orkut invites to ALL the participants in this giveaway. All you need is to tweet, stumble, promote us on your orkut status, and a tit-bit more.
So what are you waiting for, just participate and get an invite and enjoy the all new orkut experience.
<div style="clear:both;"></div><br />
<button type="submit" onclick="javascript:window.location='http://sandbox.orkutplus.net/apps/multi-theme-generator.php';">Participate in This Giveaway &raquo;</button>
</div><br /><br />
<div id="stylized" class="myform">
<div style="clear:both;">
<br /><br />
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
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1123588-6");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>