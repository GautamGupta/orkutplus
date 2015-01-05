function checkAll(form)
{
	for (i = 0, n = form.elements.length; i < n; i++) {
		if(form.elements[i].type == "checkbox") {
			if(form.elements[i].checked == true)
				form.elements[i].checked = false;
			else
				form.elements[i].checked = true;
		}
	}
}

function getNumChecked(form)
{
	var num = 0;
	for (i = 0, n = form.elements.length; i < n; i++) {
		if(form.elements[i].type == "checkbox") {
			if(form.elements[i].checked == true)
				num++;
		}
	}
	return num;
}

var isReplyOn = false;
var currentReplyComment = "";
var commentAjaxDiv = "";

function buildReplyForm(comment_ID, comment_post_ID, user_ID, isReplyOrEdit, buttonText, layerText, isNew, comment_author, comment_author_email, comment_author_url, commentText) {
		if(isNew != true)
			isNew = false;
		//hack so that only one reply is given at a time, dont want users to keep on clicking reply
		//and getting multiple forms
		var oldCommentId = '';
	 	if(! isReplyOn) {
	 		oldCommentId = comment_ID;
			isReplyOn = true;
			spacer = document.createElement("br");
			//create the main form
			commentReplyForm = document.createElement("form");
			commentReplyForm.setAttribute("name", "frmReply" + comment_ID); //set name
			commentReplyForm.setAttribute("action", ""); //set action
			commentReplyForm.onsubmit = function () { storeAjaxReply(this, layerText +comment_ID, "frmReply" + comment_ID) }



			commentReplyForm.appendChild(createInputField("isReplyOrEdit", isReplyOrEdit, "hidden")); //are you reply or edit tell me please if it is false it is a reply or else a edit

			if(! isReplyOrEdit) {
				commentReplyForm.appendChild(createInputField("comment_ID", comment_ID, "hidden")); //add hidden field for commentid
				commentReplyForm.appendChild(createInputField("comment_author", comment_author, "text")); //add author text field
				commentReplyForm.appendChild(createInputField("comment_author_email", comment_author_email, "text")); //add email text field
				commentReplyForm.appendChild(createInputField("comment_author_url", comment_author_url, "text")); //add author url field
			}
			else {
				//only add comment_parent when the comment is gonna be threaded
				if(!isNew) 
					commentReplyForm.appendChild(createInputField("comment_parent", comment_ID, "hidden")); //add hidden field for commentid
				commentReplyForm.appendChild(createInputField("comment_post_ID", comment_post_ID, "hidden")); //add hidden field for postid
				commentReplyForm.appendChild(createInputField("user_ID", user_ID, "hidden")); //add hidden field for postid
			}

			//create the text area for the comment reply
			commentTextArea = document.createElement("textarea");
			commentTextArea.setAttribute("name", "comment_content");
			commentTextArea.setAttribute("id", "content");
			commentTextArea.setAttribute("rows", "6");
			commentTextArea.setAttribute("cols", "60");
			if(! isReplyOrEdit)  {
				commentTextArea.innerHTML = commentText;
			}
			commentReplyForm.appendChild(commentTextArea);

			commentReplyForm.appendChild(spacer);
			//add the reply Button
			replyButton = createInputField("reply", buttonText, "submit");
			frmObj = "document.frmReply" + comment_ID;
			//replyButton.onclick = function() { storeAjaxReply(frmObj, layerText +comment_ID, "frmReply" + comment_ID);}
			commentReplyForm.appendChild(replyButton);

			closeButton = createInputField("close", "Cancel", "button");
			closeButton.onclick = function() { destroyReplyForm(layerText +comment_ID, layerText +comment_ID);}
			currentReplyComment = layerText + comment_ID;
			commentAjaxDiv = layerText + comment_ID + '-response';
			commentReplyForm.appendChild(closeButton);
			commentParent = document.getElementById(layerText+comment_ID); //get the layer to display the form
			commentParent.appendChild(commentReplyForm); //dump the form into the layer
			$(layerText+comment_ID).show();
		}
		else {
			dummyReplyComment = layerText + comment_ID;
			var contentData = '';
			if(!isBlank(oldCommentId)) {
				contentData = document.forms["frmReply" + oldCommentId].content.value;
			}
			if(!isBlank(contentData)) {
				if(dummyReplyComment !=  currentReplyComment) {
					if( confirm("You are already replying to a comment.\n Do you want to cancel the old one and reply to this?")) {
						destroyReplyForm(currentReplyComment);
						buildReplyForm(comment_ID, comment_post_ID, user_ID, isReplyOrEdit, buttonText, layerText, isNew, comment_author, comment_author_email, comment_author_url, commentText);
					}
				}
			}
			else {
				destroyReplyForm(currentReplyComment);
				buildReplyForm(comment_ID, comment_post_ID, user_ID, isReplyOrEdit, buttonText, layerText, isNew, comment_author, comment_author_email, comment_author_url, commentText);
			}
		}
	}

	function createInputField(tName, tValue, tType) {
		inputF = document.createElement("input");
		inputF.setAttribute("type", tType);
		inputF.setAttribute("name", tName);
		inputF.setAttribute("value", tValue);
		return inputF;
	}

	function destroyReplyForm(commentReplyDiv) {
		while(document.getElementById(commentReplyDiv).hasChildNodes()) {
			if(!isBlank(commentAjaxDiv)) {
				childNode = document.getElementById(commentReplyDiv).firstChild;
				if(childNode) {
					childNode = document.getElementById(commentAjaxDiv).firstChild;
				}
			}
			commentAjaxDiv = '';
			childNode = document.getElementById(commentReplyDiv).firstChild;
			document.getElementById(commentReplyDiv).removeChild(childNode);
		}
		isReplyOn = false;
		globalReplyOrEdit = true;
		currentReplyComment = "";
	}

	function storeAjaxReply(frmObj, commentReplyDiv, formName) {
		//replace the old values while editing, for new comments a new comment will show up on the page
		try {
			var isReplyOrEdit = frmObj.isReplyOrEdit.value; 
			if(isReplyOrEdit == "false") {
				var commentId = frmObj.comment_ID.value;
				document.getElementById('comment_author_' + commentId).innerHTML = frmObj.comment_author.value;
				document.getElementById('comment_author_email_' + commentId).innerHTML = document.getElementById('comment_author_email_' + commentId).innerHTML = '<a href="mailto://' + frmObj.comment_author_email.value + '">' + frmObj.comment_author_email.value + '</a>';
				if(frmObj.comment_author_url.value != 'http://')
					document.getElementById('comment_author_url_' + commentId).innerHTML = frmObj.comment_author_url.value;
				document.getElementById('comment_content_' + commentId).innerHTML = frmObj.comment_content.value;
			}
		}
		catch(ex) {
			//IE7 bug fix
		}

		new Ajax.Updater( {
			success: 'the-comment-list',
			failure: 'the-comment-list'
		}, saveurl, {
			asynchronous: true,
			evalScripts: true,
			insertion: Insertion.Top,
			onLoading: function() {
				$(commentReplyDiv).hide();
				$(commentReplyDiv + '-response').update(showMessage);
				$(commentReplyDiv + '-response').show();
				Form.disable(formName);
			},
			onComplete: function(request) {
	 			if (request.status == 200) {
					destroyReplyForm(commentReplyDiv);
					destroyReplyForm(commentReplyDiv + '-response');
					new Effect.Appear($('the-comment-list').firstChild);
				}
			},
			onFailure: function() {
				$(commentReplyDiv + '-response').update('Could not save comment');
				$(commentReplyDiv + '-response').show();
			},
			parameters: Form.serialize(frmObj)
			}
		);
		//just making sure that the form is killed
		destroyReplyForm(commentReplyDiv);
	}

//checks if a field value is blank, if the field contains only spaces it is conisdered being blank
function isBlank(s)
{
	  var len,k,flg;
	  flg=true;
	  if(s!=null)
	  {
		len=s.length;
		for(k=0;k<len;k++)
		 {
		  if(s.substring(k,k+1)!=" ")
				flg=false;
		 }
	  }
	 return flg;
}