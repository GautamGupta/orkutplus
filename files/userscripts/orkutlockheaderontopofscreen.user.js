// ==UserScript==
// @name          Orkut: Lock Header on Top of Screen
// @namespace     http://userstyles.org
// @description	  Locks (position: fixed) the Header of ORKUT on the top of screen
// @author        JuanBR
// @homepage      http://userstyles.org/styles/9385
// @include       http://orkut.co*/*
// @include       https://orkut.com.br/*
// @include       http://*.orkut.com.br/*
// @include       https://*.orkut.com.br/*
// ==/UserScript==
(function() {
var css = "@namespace url(http://www.w3.org/1999/xhtml); body { margin: 32px 10px /*42px*/ 0 10px !important; } div#footer { display: none !important; /*position: fixed !important; bottom: -2px !important; right: 0 !important; left: 0 !important; padding: 8px 8px 5px 13px !important;*/ } div#header { position: fixed !important; top: 0 !important; right: 0 !important; left: 0 !important; }";
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
}
})();
