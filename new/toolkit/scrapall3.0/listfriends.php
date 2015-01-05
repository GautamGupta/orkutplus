<?php
require_once("../includes/theme/functions.php");
set_time_limit(0);
load_curl();
$req = new XMLHttpRequest();
$user_inf = orkut_login("<REDACTED>", "<REDACTED>");
$req->open("GET","http://www.orkut.com/Home.aspx");
$req->setRequestHeader("Cookie", $user_inf['cookie']);
$req->send(null);
preg_match('/accesskey\=\"p\"\ href\=\"\/Main\#Profile\.aspx\?uid\=(.*?)\&rl\=t\"\>Profile\<\/a\>/i', $req->responseText, $uid);
$uid = $uid[1];
$req->open("GET","http://www.orkut.com/RequestFriends.aspx?req=fl&uid=".$uid);
$req->setRequestHeader("Cookie", $user_inf['cookie']);
$req->send(null);
$textrecieve = explode("&&&START&&&", $req->responseText);
$jsondec = json_decode($textrecieve[1], true);
echo "<pre>";
print_r($jsondec);
echo "</pre>";
echo $jsondec['data']['list'][0]['id'];
?>
