function makeTerminal(a)
{
	// Create the overlay object
	var objBody = $('mainBody');
	var windowHeight = window.getHeight();
	var objOverlay = new Element('div',
	{
		'id' : 'overlay',
		'height' : windowHeight,
		'opacity' : '0'
	}).injectInside('mainBody');
	
	new Fx.Style(objOverlay, 'opacity').start(.8);
	
	// Create terminal window
	var objTerminalWindow = new Element('div').setStyles(
	{
		'position' : 'absolute',
		'top': '130px',
		'left': '50%',
		'width': '600px',
		'display': 'none',
		'height': '300px',
		'opacity': '0',
		'margin-left': '-300px',
		'background-color': '#fff',
		'z-index': '99'
	}).setProperty('id', 'terminal').setHTML('<div id="theAnswer"><img src="images/loading.gif" alt="Loading..." />&nbsp;&nbsp;&nbsp;</div>').injectAfter(objOverlay);

	new Fx.Style(objTerminalWindow, 'opacity',
	{
		'onStart': objTerminalWindow.setStyle('display', 'block'),
		'duration': 1000,
		'onComplete': function()
		{
			linkFade();
		}.bind(a)
	}).start(.9);
	showAnswer(this);
}

function showAnswer(a)
{
	if(a.length > 0)
	{
		var b = a;
		setTimeout(function() { showText(this) }.bind(b), 2212);
	}else
	{
		if(theAnswer.length > 0 )
		{
			var b = theAnswer.toProperCase();
			setTimeout(function() {
				showText(b);
			}.bind(b), 2212);
		}else{
		var arr=new Array();
		arr[0] = "I don't think you believe me!";
		arr[1] = "Im sorry, I was unable to establish a spiritual uplink";
		arr[2] = "Please concentrate on the question and try again";
		arr[3] = "I can not establish a spiritual uplink";
		arr[4] = "I am not answering that question...";
		arr[5] = "You are almost like a gnat, you won't go away";
		arr[6] = "I like you, good things are to come";
		arr[7] = "Unable to contact spirits... try again";
		arr[8] = "The spiritual link is not present";
		arr[9] = "I will no longer answer your questions";
		arr[10] = "Maybe I will answer next time...";
		arr[11] = "Your answer lacks a spiritual connection";
		arr[12] = "Focus, and try again";
		arr[13] = "why would I want to answer that?";
		arr[14] = "I am not in a good mood, go away!";
		arr[15] = "That does not interest me";
		arr[16] = "Dark things are to come";
		arr[17] = "the symantalogical properties of your question are bogus";
		arr[18] = "Maybe one of your friends should type the questions";
		arr[19] = "Let someone else type the question, I do not like you";
		arr[20] = "Why don't you try a different question";
		arr[21] = "No Comment...";
		arr[22] = "Your answer is at the bottom of this page...";
		arr[23] = "Do NOT look under the bed";
		arr[24] = "You are making me angry";
		arr[25] = "I am tired of your questions";
		arr[26] = "The spirit world is upon us";
		arr[27] = "Unable to contact spirits... try again";
		arr[28] = "Who doesnt know that?";
		arr[29] = "You are not the one to be asking me questions";
		arr[30] = "I do not like you";
		arr[31] = "Lets switch to a different subject";
		arr[32] = "Unable to connect to tarot database... Try Again";
		arr[33] = "If you waste my time, I will waste yours";
		arr[34] = "You are making me angry";
		arr[35] = "I would not go to sleep if I were you";
		arr[36] = "I will answer that later, for now, try again";
		var rand = Math.floor(Math.random()*37);
		var x = arr[rand];
		showText(x);
		}
	}
}

function showText(a)
{
	new Fx.Style('theAnswer', 'opacity', {duration: 1000, onComplete: function()
		{
			$('theAnswer').setHTML('OrkutPlus Answers: ' + this);
			new Fx.Style('theAnswer', 'opacity').start(1);
		}.bind(a)
	}).start(0);
	
	var objNewQuestion = new Element('div').injectInside('terminal').setProperty('id', 'newQuestion').setHTML("<p><img src='images/newquest.jpg' border='0'></p>").addEvent('click', closeContainer).addEvent('click', clearForm);
    window.addEvent('click', closeContainer).addEvent('click', clearForm);
}

function linkFade()
{
	new Fx.Style('linkUnits', 'opacity', { onStart: $('linkUnits').setStyle('display', 'block').setStyle('opacity', '0'), duration: 800}).start(1);
}

function closeContainer() {
	new Fx.Style('overlay', 'opacity', {onComplete: function() { $('overlay').remove(); }}).start(0);
	new Fx.Style('terminal', 'opacity', {onComplete: function() { $('terminal').remove(); }, duration: 1000}).start(0);
	$('linkUnits').setStyle('display', 'none');
	window.removeEvent('click', closeContainer);
	$('newQuestion').removeEvent('click', closeContainer);
}

function clearForm() {
	a = '';
	b = '';
	clearAll();
	$('askOPForm').reset();
	//$('questionText').disabled = '';
	$('petitionText').disabled = '';
	$('newQuestion').removeEvents('click');
	window.removeEvents('click');
}