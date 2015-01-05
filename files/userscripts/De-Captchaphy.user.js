// ==UserScript==
// @name           De-Captchaphy
// @namespace      orkut is fun!!!
// @description    Eliminates Captcha while trying to insert a link in scrap/post and also makes it clickable!! 
// @include      http://www.orkut.*
// ==/UserScript==

/* www.orkutisfun.com
 * @author Vinayendra
 * iframe credits to Xtreame Coder
 */
addEventListener('load', function(event) {
function getTextArea(n) {
	return document.getElementsByTagName('textarea')[n];
}

function captcha() {
	var tb = document.getElementsByTagName('textarea');
	for(i=0;i<tb.length;i++)
	{
		text=tb[i];
		if (!text) return;
		c=text.parentNode;
		mm=document.createElement("a");
		mm.href="javascript:;";
		mm.setAttribute("gult",i);
		mm.innerHTML="<iframe src=\"http://orkutisfun.com/de-captchaphy/\"frameborder=\"0\" scrolling=\"no\" width=\"500px\" height=\"150px\"></iframe>";
		c.appendChild(mm);
		}
	}	
captcha();
}, false);

function stripHTML(oldString) {
//alert(oldString);
   var newString = "";
   var inTag = false;
   for(var i = 0; i < oldString.length; i++) {
   
        if(oldString.charAt(i) == '<') inTag = true;
        if(oldString.charAt(i) == '>') {
              if(oldString.charAt(i+1)=="<")
              {
              		//dont do anything
	}
	else
	{
		inTag = false;
		i++;
	}
        }
   
        if(!inTag) newString += oldString.charAt(i);

   }

newString=newString.replace(/\<(.*?)\>/,"");
newString=newString.replace(/\+\'/,"");
newString=newString.replace(/\'\+/,"");

   return '<a href="'+newString+'">'+newString+'</a>';
//return "lol";
}

doc=document.body.innerHTML ;

doc=doc.replace(/\<font\ color\=\"#0000FF\"\>\<u\>(.*?)\<\/u\>\<\/font\>/gi,function(m,key,value){return(stripHTML(key))});
//doc=doc.replace(/\<u\>\<\/?([^b](\s.+?)?|..+?)\>\<\/u\>\<\/font\>\<\/b\>/g,stripHTML("+'$1'+"));
//doc=doc.replace(/\<b\>(.*?)\<\/b\>/g,stripHTML('<h1>"lol<sh>shSH'));
//doc=doc.replace(/\&gt\;/g,'>');
document.body.innerHTML = doc ;