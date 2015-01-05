<?php 
if(($_POST['email'] != NULL && $_POST['pass'] != NULL) || ($_GET['cookie'] != NULL && $_POST['cs'] != NULL && $_GET['c'] == 1)){
	$c_email = $_POST['email'];
	$pass = $_POST['pass'];
	require_once("../../includes/curl.php");
	$req = new XMLHttpRequest();
	if($_GET['c'] != 1){
		$req->open("POST","https://www.google.com/accounts/ClientLogin");
		$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		$req->send("Email=".urlencode($c_email)."&Passwd=".urlencode($pass)."&service=orkut");
		preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
		$user_inf['auth'] = $auth[1];
		if($user_inf['auth'] == NULL) {
			exit($c_email.": ID not working<br />");
		}
		$req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$user_inf['auth']);
		$req->send(null);
		preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
		$user_inf['cookie'] = $orkut_state[0];
		if($user_inf['cookie'] == NULL) {
			exit($c_email.": ID not working<br />");
		}
		$req->open("GET","http://www.orkut.com/Scrapbook.aspx");
		$req->setRequestHeader("Cookie",$user_inf['cookie']);
		$req->send(null);
		preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$posttoken,PREG_SET_ORDER);
		preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$signature,PREG_SET_ORDER);
		$user_inf['ud_post_token'] = $posttoken[0][1];
		$user_inf['ud_signature'] = $signature[0][1];
		$user_inf['post_token'] = urlencode($user_inf['ud_post_token']);
		$user_inf['signature'] = urlencode($user_inf['ud_signature']);
		$req->open("POST","http://www.orkut.com/Scrapbook.aspx");
		$req->setRequestHeader("Cookie",$user_inf['cookie']);
		$sdata = "POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&&Action.submit=1&scrapText=hello";
		$req->send($sdata);
		print_r($req);
		/*echo "<form action=\"testing.php?c=1&cookie=".$user_inf['cookie']."\" method=\"post\">
		<img src=\"captcha.php?cookie=".$user_inf['cookie']."\"><br />
		<p><input type=\"text\" name=\"cs\"></p>
		<p><input type=\"submit\" name=\"submit\" value=\"Submit\"></p>
		</form>";*/
	}else{
		$req->open("GET","http://www.orkut.com/Scrapbook.aspx");
		$req->setRequestHeader("Cookie",$_GET['cookie']);
		$req->send(null);
		preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$posttoken,PREG_SET_ORDER);
		preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$signature,PREG_SET_ORDER);
		$user_inf['ud_post_token'] = $posttoken[0][1];
		$user_inf['ud_signature'] = $signature[0][1];
		$user_inf['post_token'] = urlencode($user_inf['ud_post_token']);
		$user_inf['signature'] = urlencode($user_inf['ud_signature']);
		$req->open("POST","http://www.orkut.com/Scrapbook.aspx");
		$req->setRequestHeader("Cookie",$_GET['cookie']);
		$sdata = "POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&&Action.submit=1&cs=".$_POST['cs']."&scrapText=ok";
		$req->send($sdata);
		echo $sdata;
		sleep(1);
	}
}else{ 
?>
<form method="post">
<div><b>E-mail ID</b></div>
<p><input type="text" name="email" value="Username"></p>
<div><b>Password</b></div>
<p><input type="password" name="pass" value="Password"></p>
<p><input type="submit" name="submit" value="Submit"></p>
</form>
<?php } ?>