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
	
	function g_translate($url, $lang = "pt", $text = "Traduzir para o Portugues"){
		return "<a href=\"http://translate.google.com/translate?u=".$url."&hl=en&ie=UTF-8&sl=en&tl=".$lang."\" id=\"flag_".$lang."\">".$text."</a>&nbsp;&nbsp;";
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
		$req->open("POST","https://www.google.com/accounts/ClientLogin");
		$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		$req->send("Email=".urlencode($email)."&Passwd=".urlencode($pass)."&service=orkut");
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
				preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$posttoken,PREG_SET_ORDER);
				preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$signature,PREG_SET_ORDER);
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
	
?>