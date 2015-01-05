// ==UserScript==
// @name           Orkut Themes
// @namespace      by diogok
// @description    Temas by Orkut, use without the upgrade by Diogok.
// @include        http://www.orkut.com/*
// @include        http://www.orkut.co.in/*
// @author	   Diogo Kaike.
// ==/UserScript==

        function enfiaCss(linkCss){
        void(CSS = document.createElement('link'));
        void(CSS.rel = 'stylesheet');
        void(CSS.href = linkCss);
        void(CSS.type = 'text/css');
        void(document.body.appendChild(CSS));
		}
		
		csslinkes = new Array
		("http://img3.orkut.com/skins/gen/diwali008.css");
		
		enfiaCss(csslinkes[0]);