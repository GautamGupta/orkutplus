function setupSite ()
{
	$('infoSlider').setStyles(
	{
		'visibility' : 'hidden',
		'opacity' : '0'
	});
	
	typeStatus = 0;
    theAnswer = '';
    thePetition = 'OrkutPlus, please answer the following question';
    thePetition2 = 'OrkutPlus, please answer:';
    
    $('petitionText').addEvent('change', checkPetition);
    $('questionText').addEvent('change', checkQuestion);
    
    // Set opacity of bubbles
    $('questionBubble').setStyle('opacity', '0');
    $('petitionBubble').setStyle('opacity', '0');
    
    // Setup the toggle function for the info
    $('handle').addEvent('click', showHandle);
    
}

// extend prototypes
String.prototype.toProperCase = function(){
     return this.toLowerCase().replace(/\w+/g,function(s){
          return s.charAt(0).toUpperCase() + s.substr(1);
     })
}

/* handle function */
function showHandle()
{
    	var value = ($('infoSlider').getStyle('visibility') == 'visible') ? '0' : '1';
    	
    	if($('infoSlider').getStyle('visibility') != 'visible')
    	{
    		$E('body').addEvent('click', showHandle)
    	}else
    	{
    		$E('body').removeEvent('click', showHandle);
    	}
    	
    	new Fx.Style('infoSlider', 'opacity').start(value);
}

/* Start Bubble Functions */
function checkPetition()
{
    var domNode = $('petitionBubble');
    if(($('petitionText').value.toLowerCase() == "orkutplus, please answer the following:") || ($('petitionText').value.toLowerCase() == "orkutplus, please answer:"))
    {
        return 1;
                    new Fx.Style('petitionBubble', 'opacity', {onStart: $('petitionBubble').setStyle('display', 'block') }).start(0,1).addEvent('onComplete', function() { $('mainBody').addEvent('click', fadeOutPetitionBubble); });
            return 0;
    }else{
        if(($('petitionText').value.length > 1))
        {
            new Fx.Style('petitionBubble', 'opacity', {onStart: $('petitionBubble').setStyle('display', 'block') }).start(0,1).addEvent('onComplete', function() { $('mainBody').addEvent('click', fadeOutPetitionBubble); });
            return 0;
        }
    }
}

function checkQuestion()
{
    var domNode = $('questionBubble');
    if(($('questionText').value.indexOf('?') == -1) || ($('questionText').value.length < 5)) // not there
    {
        new Fx.Style('questionBubble', 'opacity', {onStart: $('questionBubble').setStyle('display', 'block') }).start(0,1).addEvent('onComplete', function() { $('mainBody').addEvent('click', fadeOutQuestionBubble); });
        return 0;
    }else{
        return 1;
    }
}

function fadeOutPetitionBubble()
{
    new Fx.Style('petitionBubble', 'opacity').start(0).addEvent('onComplete', function() { $('mainBody').removeEvent('click', fadeOutPetitionBubble); });
}

function fadeOutQuestionBubble()
{
    new Fx.Style('questionBubble', 'opacity').start(0).addEvent('onComplete', function() { $('mainBody').removeEvent('click', fadeOutPetitionBubble); });
}

/* End Bubble Functions */ 

function monitorKeys(e)
{
    keyEvent = e;
    if(keyEvent.keyCode == 190)
    {
        if(!typeStatus)
        {
            typeStatus = 1;
            return subLetters();
        }else{
            typeStatus = 0;
            return subLetters();
        }
    }
    
    if(typeStatus == 1)
    {
        return subLetters();
    }
}

function subLetters()
{   
    var keynum = keyEvent.keyCode;
    if(keynum !== 8) // Backspace
    {
        if(keynum !== 16)
        {    
            if(keynum !== 190)
            {
                theAnswer += String.fromCharCode(keynum);
            }
            
            // Set the length variable
            var theLength = $('petitionText').value.length;
            
            // Set the letter var, achieved by substr
            var theLetter = thePetition.substr(theLength, 1);
            
            // Add the letter
            var newText = $('petitionText').value + theLetter;
            $('petitionText').value = newText;
            
            // Return false
            return false;
        }            
    }else{
        // Find out what the current length is
        var txtLength = ($('petitionText').value.length);
        
        // Check to see if the answer has a length
        if(theAnswer.length > 0)
        {
            // Decrement the answer length because this is a backspace
            var answerLength = (theAnswer.length - 1); 
            
            // Set the petitionText value
            //$('petitionText').value = $('petitionText').value.substr(0, txtLength);
            
            //Set theAnswer to the new answer
            theAnswer = theAnswer.substr(0, answerLength);
            
            // return true so the backspace takes effect
            
        }else{
        
            //Set the petitionText value
            //$('petitionText').value = $('petitionText').value.substr(0, txtLength);
            
            // Reset the answer
            theAnswer = '';
            
            // Check and see if the value is 0 or 1
            if($('petitionText').value.length <= 1)
            {
                typeStatus = 0;
            }
        }
    }

}

function watchForQuestion()
{
    $('questionText').value += '?';
    // Validate input
    if(checkQuestion())
    {
        // Once this fires, the '?' has been pressed
        $('questionText').disabled = 'disabled';
        $('petitionText').disabled = 'disabled';
        makeTerminal(theAnswer.toProperCase());
        return true;
    }
}

function pressedSemiColon()
{
    $('petitionText').value += ':';
    if(checkPetition())
    {
        $('questionText').value = '';
        $('questionText').disabled = '';
        $('questionText').focus();
    }
}

function clearAll()
{
    typeStatus = 0;
    theAnswer = '';
    answer = '';
}
    
window.addEvent('domready', function ()
{
    // Load variables and stuff
    setupSite();
    
    // Setup shortcut for question mark
    shortcut("Shift+?",function() {
	   return watchForQuestion();
    },{
    'type':'keypress',
	'target': $("questionText")
    });
    
    // Setup shortcut for colon
    shortcut("Shift+:",function() {
        pressedSemiColon();
    },{
    'type':'keypress',
	'target': $("petitionText")
    });
});