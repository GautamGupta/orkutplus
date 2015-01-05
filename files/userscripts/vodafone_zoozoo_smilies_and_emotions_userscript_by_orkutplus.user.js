// ==UserScript==

// @name	Vodafone ZooZoo Smilies & Emotions in Orkut without Image Verification! (Exclusively Provided By OrkutPlus.net)

// @namespace	OrkutPlus.net (Coder - Gautam)

// @description	Scrap Vodafone ZooZoo Smilies & Emotions to your friends and to yourself in Orkut without image verification!

// @include	http://*.orkut.*/Scrapbook.aspx*

// @include	http://*.orkut.*/CommMsg*
// ==/UserScript==
addEventListener('load', function(event) {
function getTextArea(n) {
	return document.getElementsByTagName('textarea')[n];
}


function insertEmotion(){
	var image = this.getElementsByTagName('img')[0].getAttribute("src");
	getTextArea(this.getAttribute("gult")).focus();
	getTextArea(this.getAttribute("gult")).value += '<img src="'+image+'" height="72">';
}

function gautam() {
	var emotion = new Array();	
	emotion["Arguing"]	=	"http://lh5.ggpht.com/_sCGN2FQv-Bo/SgqAiNkCVVI/AAAAAAAAAFk/dYcsmPnzEAo/s144/Arguing.jpg";
	emotion["Blank"]	=	"http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqAiAI_eiI/AAAAAAAAAFo/bOSpUuDwEsE/s144/blank.jpg";
	emotion["Blissfull"]	=	"http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqAiEX_YvI/AAAAAAAAAFs/pxgTGBcEFVk/s144/blissfull.jpg";
	emotion["Bored"]	=	"http://lh4.ggpht.com/_sCGN2FQv-Bo/SgqAiGXJinI/AAAAAAAAAFw/rTu468mXWIk/s144/bored.jpg";
	emotion["Crying"]	=	"http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqAid3qQhI/AAAAAAAAAF0/teBV1v2VlqA/s144/Crying.jpg";
	emotion["Curious"]	=	"http://lh5.ggpht.com/_sCGN2FQv-Bo/SgqCCKWqv0I/AAAAAAAAAF4/qqQ_t4epBLo/s144/Curious.jpg";
	emotion["Disapointed"]	="http://lh3.ggpht.com/_sCGN2FQv-Bo/SgqCCCUkRwI/AAAAAAAAAF8/I3r94a4UEFo/s144/Disapointed.jpg";
	emotion["Disapproving"]	="http://lh4.ggpht.com/_sCGN2FQv-Bo/SgqCCecglEI/AAAAAAAAAGA/ILOMrnJiw6k/s144/Disapproving.jpg";
	emotion["Distasteful"]	="http://lh3.ggpht.com/_sCGN2FQv-Bo/SgqCCU3T0bI/AAAAAAAAAGE/cC1SCig6_mY/s144/Distasteful.jpg";
	emotion["Exhausted"]	="http://lh4.ggpht.com/_sCGN2FQv-Bo/SgqCCS50Q4I/AAAAAAAAAGI/bLKUxkfZnO4/s144/Exhausted.jpg";
	emotion["Frightened"]	="http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqDa70IrkI/AAAAAAAAAGM/eRcwXycHBhw/s144/frightened.jpg";
	emotion["Giggling"]	=	"http://lh4.ggpht.com/_sCGN2FQv-Bo/SgqDa6r-IhI/AAAAAAAAAGQ/LJgp1qSd4yM/s144/giggling.jpg";
	emotion["Happy"]	=	"http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqDbPtXOlI/AAAAAAAAAGU/PPxFT4qC45o/s144/happy.jpg";
	emotion["Horrified"]	=	"http://lh3.ggpht.com/_sCGN2FQv-Bo/SgqDbH78_MI/AAAAAAAAAGY/yYfxPZ3aWuQ/s144/Horrified.jpg";
	emotion["Idiotic"]	=	"http://lh5.ggpht.com/_sCGN2FQv-Bo/SgqDbLqGX0I/AAAAAAAAAGc/1qJiR9wycs0/s144/Idiotic.jpg";
	emotion["Indifferent"]	="http://lh5.ggpht.com/_sCGN2FQv-Bo/SgqDnxKLIAI/AAAAAAAAAGg/8Ujl4CbWyN0/s144/indifferent.jpg";
	emotion["Innocent"]	="http://lh3.ggpht.com/_sCGN2FQv-Bo/SgqDnzu1bcI/AAAAAAAAAGk/EJfpO2lwIdI/s144/innocent.jpg";
	emotion["Mischievous"]	="http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqDny80JRI/AAAAAAAAAGo/cvUbKGIvT3k/s144/Mischievous.jpg";
	emotion["Puzzled"]	=	"http://lh5.ggpht.com/_sCGN2FQv-Bo/SgqDoH12-hI/AAAAAAAAAGs/ypbV5vZJ4O0/s144/Puzzled.jpg";
	emotion["Sad"]	=	"http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqDoEfn6CI/AAAAAAAAAGw/SPjGSywZDGk/s144/Sad.jpg";
	emotion["Satisfied"]	="http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqDy5M8yKI/AAAAAAAAAG0/7k9yGVzmjIk/s144/Satisfied.jpg";
	emotion["Screaming"]	="http://lh3.ggpht.com/_sCGN2FQv-Bo/SgqDzHYMBLI/AAAAAAAAAG4/fQsPhz1KWpU/s144/screaming.jpg";
	emotion["Sleeping"]	="http://lh6.ggpht.com/_sCGN2FQv-Bo/SgqDzIAPIbI/AAAAAAAAAG8/25SxvQM8v9s/s144/sleeping.jpg";
	emotion["Suprised"]	="http://lh5.ggpht.com/_sCGN2FQv-Bo/SgqDzDuGwEI/AAAAAAAAAHA/McKmjyFgeNY/s144/suprised.jpg";
	
	var tb = document.getElementsByTagName('textarea');
	for(i=0;i<tb.length;i++)
	{
		text=tb[i];
		if (!text) return;
		c=text.parentNode;
		d=document.createElement("div");
		d.className="T";
		d.style.fontSize="11px";
		d.align="left";	        
	    d.style.marginTop="10px";
		c.appendChild(d);
		for(title in emotion)
		{
			mm=document.createElement("a");
			mm.href="javascript:;";
			mm.setAttribute("gult",i);
			mm.innerHTML='<img src="'+emotion[title]+'"  title="'+title+'" height="72">';
			mm.addEventListener("click", insertEmotion, true);
			d.appendChild(mm);
		}
	}	
}
gautam();
}, false);