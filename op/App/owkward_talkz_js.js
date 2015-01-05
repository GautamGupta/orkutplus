var globalGivenGifts = {};
var globalViewer = {};
var globalFriends = {};

function postActivity() {
  var title = 'See the Awkward Talk you had with ' + globalViewer.getDisplayName() + '! Didn\'t you have this chat? Don\'t say NO!';
  var params = {};
  params[opensocial.Activity.Field.TITLE] = title;
  var activity = opensocial.newActivity(params);
  opensocial.requestCreateActivity(activity, opensocial.CreateActivityPriority.HIGH, function() {});
}

function talk_r() {
  var viewer_text_r = document.getElementById('viewer_text').value;
  var owner_text_r = document.getElementById('owner_text').value;
  globaltalk[viewer_talk] = viewer_text_r;
  globaltalk[owner_talk] = owner_text_r;
  var json = gadgets.json.stringify(globaltalk);
  var req = opensocial.newDataRequest();
  req.add(req.newUpdatePersonAppDataRequest(opensocial.DataRequest.PersonId.OWNER, 'talkz', json));
  req.add(req.newFetchPersonRequest('OWNER'), 'talkz');
  req.send(onLoadFriends);
  
  postActivity();
}

function ask_talk() {
    html.push('<table width=100% height=<option value="' + person.getId() + '">' + person.getDisplayName() + "</option>");
  html.push('</select>');
  document.getElementById('friends').innerHTML = html.join('');
  
  globalFriends = friends;
  updateGiftList(viewer, giftData, friends);
  updateReceivedList(viewer, viewerFriendData, viewerFriends);
}

function init() {
  loadFriends();
  
  makeOptionsMenu();
}

function viewer(data) {
output('<table border=0 width=100%><tr><td width=20%>');
var viewer = data.get("viewer_profile").getData();
var name = viewer.getDisplayName();
var uid = viewer.getField("profileUrl");
var img = viewer.getField(opensocial.Person.Field.THUMBNAIL_URL);
output('<a target="_blank" href="' + uid + '"><img src="' + img +'"></a>');
output('</td><td width=80%><a target="_blank" href="' + uid + '">');
output(name);
output('</a></td></tr></table>');
};

function owner(data) {
output('<table border=0 width=100%><tr><td width=20%>');
var viewer = data.get("owner_profile").getData();
var name = viewer.getDisplayName();
var uid = viewer.getField("profileUrl");
var img = viewer.getField(opensocial.Person.Field.THUMBNAIL_URL);
output('<a target="_blank" href="' + uid + '"><img src="' + img +'"></a>');
output('</td><td width=80%><a target="_blank" href="' + uid + '">');
output(name);
output('</a></td></tr></table>');
};

function request() {
var req = opensocial.newDataRequest();

var params = {};
params[opensocial.DataRequest.PeopleRequestFields.PROFILE_DETAILS] = [
opensocial.Person.Field.THUMBNAIL_URL
];

req.add(req.newFetchPersonRequest("VIEWER", params), "viewer_profile");
req.add(req.newFetchPersonRequest("OWNER", params), "owner_profile");
req.send(viewer);
req.send(owner);
};
request();