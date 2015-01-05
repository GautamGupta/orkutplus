// ==UserScript==
// @name           New Year 2009 Official Orkut Theme By OrkutPlus.Net
// @namespace      OrkutPlus.Net
// @description    Let's Orkut users to enjoy and feel New Year 2009 Official Orkut Theme even if it is not live in their profiles.
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
		("http://img2.orkut.com/css/gen/castroskin021.css");
		
		enfiaCss(csslinkes[0]);