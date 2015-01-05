// ==UserScript==
// @name           New Orkut Diwali Theme By OrkutPlus.Net
// @namespace      OrkutPlus.Net
// @description    Let's non Indian Orkut users to enjoy and feel Fireforks - New Orkut Theme
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
		("http://img3.orkut.com/skins/gen/diwali008.css");
		
		enfiaCss(csslinkes[0]);