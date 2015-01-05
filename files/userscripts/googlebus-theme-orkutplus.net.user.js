// ==UserScript==
// @name           Official Google Bus Community Orkut Theme By OrkutPlus.Net
// @namespace      OrkutPlus.Net
// @description    Google Bus Orkut Community Theme for OrkutPlus.Net Readers :D

// @include        http://www.orkut.co*/*
// @author	   OrkutPlus.Net
// ==/UserScript==

        function enfiaCss(linkCss){
        void(CSS = document.createElement('link'));
        void(CSS.rel = 'stylesheet');
        void(CSS.href = linkCss);
        void(CSS.type = 'text/css');
        void(document.body.appendChild(CSS));
		}
		
		csslinkes = new Array
		("http://static1.orkut.com/skins/gen/gbus017.css.int");
		
		enfiaCss(csslinkes[0]);