<?php
	// This file is the place to store all basic functions

	function mysql_prep( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}
	
	function current_url(){
		$_SERVER['FULL_URL'] = 'http';
		if($_SERVER['HTTPS']=='on'){$_SERVER['FULL_URL'] .=  's';}
		$_SERVER['FULL_URL'] .=  '://';
		if($_SERVER['SERVER_PORT']!='80') $_SERVER['FULL_URL'] .=  $_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].$_SERVER['SCRIPT_NAME'];
		else
		$_SERVER['FULL_URL'] .=  $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
		if($_SERVER['QUERY_STRING']>' '){$_SERVER['FULL_URL'] .=  '?'.$_SERVER['QUERY_STRING'];}
		return $_SERVER['FULL_URL'];
	}
	
	function g_translate($url){
		return "<a href=\"http://translate.google.com/translate?u=".$url."&hl=en&ie=UTF-8&sl=en&tl=pt\">Traduzir para o Portugues</a>";
	}
	
	function fo_translate(){
		$_SERVER['FULL_URL'] = 'http';
		if($_SERVER['HTTPS']=='on'){$_SERVER['FULL_URL'] .=  's';}
		$_SERVER['FULL_URL'] .=  '://';
		if($_SERVER['SERVER_PORT']!='80') $_SERVER['FULL_URL'] .=  $_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].$_SERVER['SCRIPT_NAME'];
		else
		$_SERVER['FULL_URL'] .=  $_SERVER['HTTP_HOST']."/pt".$_SERVER['SCRIPT_NAME'];
		if($_SERVER['QUERY_STRING']>' '){$_SERVER['FULL_URL'] .=  '?'.$_SERVER['QUERY_STRING'];}
		return "<a href=\"".$_SERVER['FULL_URL']."\">Traduzir para o Portugues</a>";
	}
	
	function load_curl(){
		require_once('curl.php');
	}
	
	function orkut_login($email, $pass, $inf = 1){
		global $req;
		$user_inf = array();
		$req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$email."&Passwd=".$pass."&service=orkut&skipvpage=true&sendvemail=false");
		$req->send(null);
		preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
		$user_inf['auth'] = $auth[1];
		if($inf == 1){
			$req->open("GET","http://www.orkut.com/RedirLogin?auth=".$user_inf['auth']);
			$req->send(null);
			preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
			$user_inf['cookie'] = $orkut_state[0];
			if($user_inf['cookie'] != NULL)
			{
				$req->open("GET","http://www.orkut.com/Scrapbook");
				$req->setRequestHeader("Cookie",$user_inf['cookie']);
				$req->send(null);
				//<a href="Main#Profile?uid=14698216479585982533" class="GvamapgC2 GvamapgK0" tabindex="0">profile</a>
				preg_match('/\<a\ href\=\"Main\#Profile\?uid\=(.*?)\"\ class\=\"GvamapgC2\ GvamapgK0\"\ tabindex\=\"0\"\>profile\<\/a\>/i', $req->responseText, $uid);
				preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$posttoken,PREG_SET_ORDER);
				preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$signature,PREG_SET_ORDER);
				$user_inf['uid'] = $uid[1];
				$user_inf['ud_post_token'] = $posttoken[0][1];
				$user_inf['ud_signature'] = $signature[0][1];
				$user_inf['post_token'] = urlencode($user_inf['ud_post_token']);
				$user_inf['signature'] = urlencode($user_inf['ud_signature']);
			}
		}
		return $user_inf;
	}
	
	function orkut_details_via_cookie($cookie){
		global $req;
		$user_inf = array();
		$user_inf['cookie'] = $cookie;
		$req->open("GET","http://www.orkut.com/Scrapbook");
		$req->setRequestHeader("Cookie",$cookie);
		$req->send(null);
		preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$posttoken,PREG_SET_ORDER);
		preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$signature,PREG_SET_ORDER);
		$user_inf['ud_post_token'] = $posttoken[0][1];
		$user_inf['ud_signature'] = $signature[0][1];
		$user_inf['post_token'] = urlencode($user_inf['ud_post_token']);
		$user_inf['signature'] = urlencode($user_inf['ud_signature']);
		return $user_inf;
	}
	
	function sendscrap($uid, $int){
		global $_SESSION;
		global $_POST;
		global $user_inf;
		global $req;
		if($uid['uid'] != NULL){
			/*$cs = null;
			if($_SESSION['c'] == 1){
				$cs = "&cs=".$_POST['cs'];
				$_SESSION['c'] = 0;
			}
			$scrap = urlencode(str_replace("%NAME%", $uid['name'], $_SESSION['scrap'])."\n\n[silver]".date("H:i:s"));
			$req->open("POST","http://www.orkut.com/Scrapbook?uid=".$uid['uid']);
			$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
			$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&&Action.submit=1&scrapText=".$scrap."&uid=".$uid['uid'].$cs);
			preg_match('/src\=\"\/CaptchaImage\\?xid\=(.*?)\"\ /i', $req->responseText, $xid);
			if($xid[1] != NULL)
			{
				//captcha faced
				$_SESSION['scraploop'] = $int;
				$_SESSION['c'] = 1;
				if(($int % 2)==0){ //even
					echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$uid['uid'].'"><img src="'.$uid['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$uid['uid'].'">'.$uid['name'].'</a></p><p align="center">'.$uid['extra'].'</p><p align="center"><u>Captcha Faced. Please enter the Captcha Below to send the Scrap.</u></p><br />';
				}else{ //odd
					echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$uid['uid'].'"><img src="'.$uid['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$uid['uid'].'">'.$uid['name'].'</a></p><p align="center">'.$uid['extra'].'</p><p align="center"><u>Captcha Faced. Please enter the Captcha Below to send the Scrap.</u></p><br />';
				}
				echo "<center><form method=\"post\">
<img src=\"http://toolkit.orkutplus.net/captcha.php?xid=".$xid[1]."\" onload=\"document.getElementById('cs').focus();\"><br />
<p><input type=\"text\" name=\"cs\" id=\"cs\" maxlength=\"10\"></p>
<p><input type=\"submit\" name=\"submit\" value=\"Submit\"></p>
</form></center></td></tr></table>";
				include("../includes/ads/contentarea.php");
				include("../includes/notice.php");
				include("../includes/footer.php");
				exit;
			}else{
				if(trim($req->responseText) == "ok"){
					$output = "Scrap Sent!";
				}elseif(preg_match("error", $req->responseText, $error)){
					$output = $req->responseText;
				}*/
				if(($int % 2)==0){ //even
					echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$uid['uid'].'"><img src="'.$uid['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$uid['uid'].'">'.$uid['name'].'</a></p><p align="center">'.$uid['extra'].'</p><p align="center"><u>'.$output.'</u></p></td></tr>';
				}else{ //odd
					echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$uid['uid'].'"><img src="'.$uid['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook?uid='.$uid['uid'].'">'.$uid['name'].'</a></p><p align="center">'.$uid['extra'].'</p><p align="center"><u>'.$output.'</u></p></td></tr>';
				}
				/*sleep($_SESSION['interval']);
			}*/
		}
	}
	
?>