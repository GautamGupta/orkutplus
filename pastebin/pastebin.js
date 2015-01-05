function checkTab(el) {
  if ((document.all) && (9==event.keyCode)) {
    el.selection=document.selection.createRange(); 
    setTimeout("processTab('" + el.id + "')",0)
  }
}
function processTab(id) {
  document.all[id].selection.text=String.fromCharCode(9)
  document.all[id].focus()
}
function setSelectionRange(input, selectionStart, selectionEnd) {
 if (input.setSelectionRange) {
   input.focus();
   input.setSelectionRange(selectionStart, selectionEnd);
 }
 else if (input.createTextRange) {
   var range = input.createTextRange();
   range.collapse(true);
   range.moveEnd('character', selectionEnd);
   range.moveStart('character', selectionStart);
   range.select();
 }
}
function replaceSelection (input, replaceString) {
   if (input.setSelectionRange) {
       var selectionStart = input.selectionStart;
       var selectionEnd = input.selectionEnd;
       input.value = input.value.substring(0, selectionStart)+
replaceString + input.value.substring(selectionEnd);
       if (selectionStart != selectionEnd){
           setSelectionRange(input, selectionStart, selectionStart +
   replaceString.length);
       }else{
           setSelectionRange(input, selectionStart +
replaceString.length, selectionStart + replaceString.length);
       }
   }else if (document.selection) {
       var range = document.selection.createRange();
       if (range.parentElement() == input) {
           var isCollapsed = range.text == '';
           range.text = replaceString;
            if (!isCollapsed)  {
               range.moveStart('character', -replaceString.length);
               range.select();
           }
       }
   }
}
function catchTab(item,e){
   if(navigator.userAgent.match("Gecko")){
       c=e.which;
   }else{
       c=e.keyCode;
   }
   if(c==9){
       replaceSelection(item,String.fromCharCode(9));
       setTimeout("document.getElementById('"+item.id+"').focus();",0);
       return false;
   }
}
function fliprows(from,to)
{
	var cells=document.getElementsByTagName('tr');
	var i;
	for (i=0; i<cells.length; i++)
	{
		var cell=cells.item(i);
		if (cell.className==from)
			cell.className=to;
	}
}
function showold()
{
	fliprows('new','hidenew');
	fliprows('hideold','old');
	document.getElementById('oldlink').style.background="#880000";
	document.getElementById('newlink').style.background="";
	document.getElementById('bothlink').style.background="";
}
function shownew()
{
	fliprows('hidenew','new');
	fliprows('old','hideold');
	document.getElementById('oldlink').style.background="";
	document.getElementById('newlink').style.background="#880000";
	document.getElementById('bothlink').style.background="";
}
function showboth()
{
	fliprows('hidenew','new');
	fliprows('hideold','old');
	document.getElementById('oldlink').style.background="";
	document.getElementById('newlink').style.background="";
	document.getElementById('bothlink').style.background="#880000";
}
function copyToClipboard(txt)
{
 	if (window.clipboardData) 
	{
		// IE makes it easy
		window.clipboardData.setData("Text", txt);
		
	}
	else if (netscape.security.PrivilegeManager) 
	{
		try
		{
			netscape.security.PrivilegeManager.enablePrivilege('UniversalXPConnect');
			var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
			var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
			trans.addDataFlavor('text/unicode');
			var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
			var copytext=txt;
			str.data=copytext;
			trans.setTransferData("text/unicode",str,copytext.length*2);
			var clipid=Components.interfaces.nsIClipboard;
			if (!clipid) return false;
			clip.setData(trans,null,clipid.kGlobalClipboard);
			//alert("Following info was copied to your clipboard:\n\n" + txt);
		}
		catch (e)
		{
			var showhelp=confirm("It was not possible to access your clipboard.\n\n"+
				e+"\n"+
				"Would you like to view the help page which may help "+
				"you enable this feature?"); 
			if (showhelp)
			{
				document.location="/?help=1";
			}
		}
	}	
	return false;
}
function clipboard()
{
	var post=document.getElementById('code');
	copyToClipboard(post.innerText);
	var span=document.getElementById('copytoclipboard');
	span.innerHTML='<a href="javascript:clipboard()" title="Copy to clipboard">Text Copied to Clipboard</a> | ';
	
}
function initPastebin()
{
	if (document.getElementById)
	{
		var span=document.getElementById('copytoclipboard');
		if (window.clipboardData && span)
		{
			span.innerHTML='<a href="javascript:clipboard()" title="Copy to clipboard">Copy to Clipboard</a> | ';
			
		}
		var radio;
		radio=document.getElementById('expiry_day');
		radio.onclick=function ()
		{
			var expiryinfo=document.getElementById('expiryinfo');
			expiryinfo.innerHTML="Good for IRC or IM conversations";
			
			document.getElementById('expiry_day_label').className='current';
			document.getElementById('expiry_month_label').className='';
			document.getElementById('expiry_forever_label').className='';
		}
		if (radio.checked)
			radio.onclick();
		radio=document.getElementById('expiry_month');
		radio.onclick=function ()
		{
			var expiryinfo=document.getElementById('expiryinfo');
			expiryinfo.innerHTML="Good for E-Mail Conversations / Temporary Data";
		
			document.getElementById('expiry_day_label').className='';
			document.getElementById('expiry_month_label').className='current';
			document.getElementById('expiry_forever_label').className='';
		}
		if (radio.checked)
			radio.onclick();
		radio=document.getElementById('expiry_forever');
		radio.onclick=function ()
		{
			var expiryinfo=document.getElementById('expiryinfo');
			expiryinfo.innerHTML="Good for Long Term Archival of Useful Snippets";	
			document.getElementById('expiry_day_label').className='';
			document.getElementById('expiry_month_label').className='';
			document.getElementById('expiry_forever_label').className='current';
		}
		if (radio.checked)
			radio.onclick();
	}
}