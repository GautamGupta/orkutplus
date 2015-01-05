// ==UserScript==
// @name           Brazil New Year 2009 Official Orkut Theme By OrkutPlus.Net
// @namespace      OrkutPlus.Net
// @description    Let's English Orkut users to enjoy and feel New Year 2009 Official 'Brazilian' Orkut Theme.
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
		("http://img3.orkut.com/skins/gen/new_year_oi011.css");
		
		enfiaCss(csslinkes[0]);