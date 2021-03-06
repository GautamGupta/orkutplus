// ==UserScript==
// @name	Dusty Smiles by Dhawal
// @version	1.00
// @author	Dhawal
// @namespace	TEAM BLAKUT
// @description	Use Animated smileys in your ScrapBook and HTML community Forums. Just click on a smiley to insert. Enjoy
// @include        http://*.orkut.*/*Scrapbook.aspx*
// @include        http://*.orkut.*/*CommMsgs.aspx*
// @include        http://*.orkut.*/*CommMsgPost.aspx*
// ==/UserScript==

/**********************************************************************************************************************************************************
//Script Template by Swashata [Team Blakut]
//Original Base script by Fenil
***********************************************************************************************************************************************************/

addEventListener('load', function(event) {
function getTextArea(n) {
	return document.getElementsByTagName('textarea')[n];
}


function insertSmiley(){
	var image = this.getElementsByTagName('img')[0].getAttribute("src");
	getTextArea(this.getAttribute("gult")).focus();
	getTextArea(this.getAttribute("gult")).value += "<img src="+image+">";
}

function dip() {
	var smileyarr = new Array();	
//COPY PASTE THE CODES GENERATED BY THE SCRIPT HELPER BELOW THIS LINE	

smileyarr["wicked"]="http://lh6.ggpht.com/_Nhh98Ix90W8/ScHdGE0E_EI/AAAAAAAAAFE/6s2yFMEYPjo/wicked.png";
smileyarr["what"]="http://lh3.ggpht.com/_Nhh98Ix90W8/ScHdGpiPXvI/AAAAAAAAAFI/xn1Tz-6nHos/what.png";
smileyarr["unhappy"]="http://lh5.ggpht.com/_Nhh98Ix90W8/ScHdHCZvw-I/AAAAAAAAAFM/SIXUCTzWRc4/unhappy.png";
smileyarr["unbelievable"]="http://lh4.ggpht.com/_Nhh98Ix90W8/ScHdHmS4wMI/AAAAAAAAAFQ/xpiGVrzy-44/unbelievable.png";
smileyarr["the_devil"]="http://lh3.ggpht.com/_Nhh98Ix90W8/ScHdHzRWiYI/AAAAAAAAAFU/xBj63EXXIw0/the_devil.png";
smileyarr["surprise"]="http://lh3.ggpht.com/_Nhh98Ix90W8/ScHdIvmnqwI/AAAAAAAAAFY/UdZCqlMdMck/surprise.png";
smileyarr["smile"]="http://lh4.ggpht.com/_Nhh98Ix90W8/ScHdIzeDjAI/AAAAAAAAAFc/y4OQsdNXfc4/smile.png";
smileyarr["sigh"]="http://lh6.ggpht.com/_Nhh98Ix90W8/ScHdJR0DnEI/AAAAAAAAAFg/v7M5ceFcNPM/sigh.png";
smileyarr["shame"]="http://lh5.ggpht.com/_Nhh98Ix90W8/ScHdJySEV1I/AAAAAAAAAFk/7g4Ij1Ucgq8/shame.png";
smileyarr["rockn_roll"]="http://lh5.ggpht.com/_Nhh98Ix90W8/ScHdKRtqXZI/AAAAAAAAAFo/31V7-Ws23m4/rockn_roll.png";
smileyarr["pretty_smile"]="http://lh5.ggpht.com/_Nhh98Ix90W8/ScHdK-zMxCI/AAAAAAAAAFs/4pF8EhBx9_I/pretty_smile.png";
smileyarr["misdoubt"]="http://lh3.ggpht.com/_Nhh98Ix90W8/ScHdLHVBi_I/AAAAAAAAAFw/3zylvF1tPMM/misdoubt.png";
smileyarr["just_out"]="http://lh4.ggpht.com/_Nhh98Ix90W8/ScHdLvEgCFI/AAAAAAAAAF0/yiRjBcDE-6w/just_out.png";
smileyarr["i_have_no_idea"]="http://lh6.ggpht.com/_Nhh98Ix90W8/ScHdMLIAYyI/AAAAAAAAAF4/KNTt1ymM6Dg/i_have_no_idea.png";
smileyarr["greeding"]="http://lh3.ggpht.com/_Nhh98Ix90W8/ScHdMfqIORI/AAAAAAAAAF8/scdSEfdj0v0/greeding.png";
smileyarr["cry"]="http://lh4.ggpht.com/_Nhh98Ix90W8/ScHdM1AjaEI/AAAAAAAAAGA/e7w_MwHrM5M/cry.png";
smileyarr["big_smile"]="http://lh3.ggpht.com/_Nhh98Ix90W8/ScHdNf-Qx5I/AAAAAAAAAGE/a6W91ndyDUU/big_smile.png";
smileyarr["bad_smile"]="http://lh5.ggpht.com/_Nhh98Ix90W8/ScHdNid9vkI/AAAAAAAAAGI/BrHyjcthxvg/bad_smile.png";

	

//DO NOT CHANGE ANY THING BELOW THIS LINE
	var tb = document.getElementsByTagName('textarea');
	for(i=0;i<tb.length;i++){
		text=tb[i];
		if (!text) return;
		c=text.parentNode;
		d=document.createElement("div");
		d.className="T";
		d.style.fontSize="11px";
		d.align="left";
		
	        
	    d.style.marginTop="10px";
		c.appendChild(d);
		
		for(title in smileyarr){
			mm=document.createElement("a");
			mm.href="javascript:;";
			mm.setAttribute("gult",i);
			mm.innerHTML="<img src='"+smileyarr[title]+"' title='"+title+"'>";
			mm.addEventListener("click", insertSmiley, true);
			d.appendChild(mm);
		}
	}	
}
dip();
}, false);

//More Smileys could be found on http://www.blakut.com/2008/12/use-animated-smileys-to-make-orkutting.html
// Visit our official website www.blakut.com for regualr update on smileys and other orkut related stuffs.
//~~Happy Orkutting~~
// Regards--- Swashata