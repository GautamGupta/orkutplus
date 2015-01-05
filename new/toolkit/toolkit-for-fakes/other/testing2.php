<?php
require_once("../../includes/curl.php");
$req = new XMLHttpRequest();
function pre_text($pre, $a = 1){
	if($a = 1){
		echo "<pre>";
			print_r($pre);
		echo "</pre><br /><hr /><br />";
	}else{
		echo $pre."<br /><hr /><br />";
	}
	flush();
}
$c_email = "<REDACTED>";
$pass = "<REDACTED>";
$req->open("POST","https://www.google.com/accounts/ClientLogin");
$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
$req->send("Email=".urlencode($c_email)."&Passwd=".urlencode($pass)."&service=orkut");
pre_text($req->responseText, 0);
preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
$user_inf['auth'] = $auth[1];
pre_text($user_inf['auth'], 0);
if($user_inf['auth'] == NULL) {
	exit($c_email.": ID not working<br />");
}
$req->open("GET","http://www.orkut.com/RedirLogin?auth=".$user_inf['auth']);
$req->send(null);
pre_text($req->getResponseHeader('Set-Cookie'));
preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
$user_inf['cookie'] = $orkut_state[0];
if($user_inf['cookie'] == NULL) {
	exit($c_email.": ID not working<br />");
}
pre_text($user_inf['cookie'], 0);
$req->open("GET","http://www.orkut.com/Scrapbook");
$req->setRequestHeader("Cookie",$user_inf['cookie']);
$req->send(null);
preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$posttoken,PREG_SET_ORDER);
preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$signature,PREG_SET_ORDER);
pre_text($posttoken);
pre_text($signature);
$user_inf['ud_post_token'] = $posttoken[0][1];
$user_inf['ud_signature'] = $signature[0][1];
$user_inf['post_token'] = urlencode($user_inf['ud_post_token']);
$user_inf['signature'] = urlencode($user_inf['ud_signature']);
if($user_inf['ud_signature'] == NULL || $user_inf['ud_post_token'] == NULL) {
	exit($c_email.": ID not working<br />");
}
$req->open("POST","http://www.orkut.com/Scrapbook");
$req->setRequestHeader("Cookie",$user_inf['cookie']);
$sdata = "POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&&Action.submit=1&scrapText=hello123";
$req->send($sdata);
print_r($req);
?>
