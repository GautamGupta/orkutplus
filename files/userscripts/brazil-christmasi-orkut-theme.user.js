// ==UserScript==
// @name           New Orkut Christmas Theme By OrkutPlus.Net
// @namespace      OrkutPlus.Net
// @description    Let's Non Brazilian Orkut users to enjoy and feel New Chrtistmas Orkut Theme Which is live in Brazil
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
		("http://img1.orkut.com/skins/gen/xmas_oi011.css");
		
		enfiaCss(csslinkes[0]);