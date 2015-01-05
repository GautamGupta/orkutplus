<?php
if(isset($_POST['pass']))
{
        require('class.XMLHttpRequest.php');
        $req = new XMLHttpRequest();
        $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['email']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false");
        $req->send(null);
        preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
        $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
        $req->send(null);
        preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
        if ($orkut_state[0] != NULL)
        {
            $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send(null);
            preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
            preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
            $abc = urlencode($lol[0][1]);
            $abc1 = urlencode($lol1[0][1]);
	    if(!isset($_POST['s'])){
		$req->open("POST","http://www.orkut.com/Scrapbook.aspx");
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".urlencode($_POST['txt']));
            flush();
	    $req->open("GET","http://www.orkut.com/CaptchaImage.aspx?xid=390475203975293857239482034");
	    $req->setRequestHeader("Cookie",$orkut_state[0]);
	    $req->send(null);
	    echo $req->responsetext;
	    echo '<form action="captcha.php" method="POST"><input type="hidden" name="s" value="2"><input type="text" name="cs"><br /><input type="submit" value="Submit!"></form>';
            }else{
		$req->open("POST","http://www.orkut.com/Scrapbook.aspx");
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&cs=".$_POST['cs']."scrapText=".urlencode($_GET['txt']));
	    }
        }else{
            echo "ID not working<br>";
            flush();
        }
}else{ 
?>
	<form method="POST">
		<p>EMail: <input type="text" name="email" size="37" value = ""></p>
	<p>Password:<input type="password" name="pass" size="34" value = ""></p>
	<p>Text: <input type="text" name="txt" size="37" value = "www.yahoo.net"></p>
	<p><input type="submit" value="Submit" name="B1">
	<?php } ?>