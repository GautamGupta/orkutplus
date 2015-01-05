// ==UserScript==
// @name	GM Script for Editing Profile By OrkutPlus [Coder - Gautam]
// @namespace	www.OrkutPlus.net [Coded by Gautam]
// @description	Edits Profiles Created By Profile Maker Made By www.OrkutPlus.net for Orkut. Script by www.OrkutPlus.net
// @include	*
// ==/UserScript==

// Please Edit these Variables \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/

var email1="wedbest";	/* First Part of your E-Mail ID <<<<<<<<<<<<<<<<<<<< */
var start=106;  		/* Starting Number of your E-Mail ID(s) <<<<<<<<<<<<< */
var end=113;		/* Ending Number of your E-Mail ID(s) <<<<<<<<<<<<<< */
var email2="@lolclicker.net";	/* Last Part of your E-Mail ID <<<<<<<<<<<<<<<<<<<< */
var password="werdrowckers"; /* Password <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */
var fname="Gautam";  	/* First Name <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */
var lname="Rocks";	/* Last Name <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */

// Please Edit these Variables ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

//Dont Edit Anything Below This!

var i;

function createCookie(value)
{
	document.cookie = "Orkutplus="+value+"; ";
}
function readCookie()
{
	var ca = document.cookie.split(';');
	var c;
	var val;
	var coop;
	coop=0;
	for(var i=0;i < ca.length;i++)
	{
		c = ca[i];
		while (c.charAt(0)==' ')
		{
			c = c.substring(1,c.length);
			if (c.indexOf("Orkutplus=") == 0)
			{
				val=(c.substring(10,c.length));
				coop=1;
			}
		}
	}
	if (coop==0)
	{
		createCookie(end);
	}
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		c = ca[i];
		while (c.charAt(0)==' ')
		{
			c = c.substring(1,c.length);
			if (c.indexOf("Orkutplus=") == 0)
			{
				val=(c.substring(10,c.length));
				coop=1;
			}
		}
	}
	return (val);
}
if(document.forms[0].action=="https://www.google.com/accounts/ServiceLoginAuth?service=orkut")
{
	i = readCookie();
	if (i<start)
	{
		alert("Editing Done! Please Turn off the GM Script or Edit it to Edit more Profiles! Please Clear your Cookies (Press Ctrl+Shift+Delete and Delete Cookies after Clicking OK Here) else the GM Script wont work Again!");
	}else{
		window.location="https://www.google.com/accounts/ServiceLoginBoxAuth?service=orkut&nui=2&uilel=1&Email="+email1+i+email2+"&Passwd="+password+"&skipvpage=true&continue=http%3A%2F%2Fwww.orkut.com%2FRedirLogin.aspx";
		i=i-1;
		createCookie(i);
	}
}
/*
now pro maker makes ids directly on orkut
if(document.forms[0].id=="createaccount")
{
	window.location.href="javascript:document.forms[0].submit();";
}
if(document.body.dir=="ltr")
{
	window.location=window.document.links[5].href;
}
*/
if(window.location=="http://www.orkut.co.in/Signup.aspx")
{
	document.forms[0].elements[2].value='20';
	document.forms[0].elements[3].value='9';
	document.forms[0].elements[4].value='1980';
	document.forms[0].elements[5].value=fname;
	if(inc==1){
		i = readCookie();
		document.forms[0].elements[6].value=i;
	}else{
		document.forms[0].elements[6].value=lname;
	}
	document.forms[0].elements[7].checked=true;
	document.forms[0].elements[9].value='91';
	document.forms[0].elements[10].checked=true;
}
if(window.location=="http://www.orkut.com/Signup.aspx")
{
	document.forms[0].elements[3].value='20';
	document.forms[0].elements[2].value='9';
	document.forms[0].elements[4].value='1980';
	document.forms[0].elements[5].value=fname;
	if(inc==1){
		i = readCookie();
		document.forms[0].elements[6].value=i;
	}else{
		document.forms[0].elements[6].value=lname;
	}
	document.forms[0].elements[7].checked=true;
	document.forms[0].elements[9].value='91';
	document.forms[0].elements[10].checked=true;
}
if(window.location=="http://www.orkut.com/FindFriends.aspx?mode=signup")
{
	window.location="http://www.orkut.com/GLogin.aspx?cmd=logout";
}
if(window.location=="http://www.orkut.co.in/FindFriends.aspx?mode=signup")
{
	window.location="http://www.orkut.co.in/GLogin.aspx?cmd=logout";
}