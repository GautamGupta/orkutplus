<?php
if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['scrap']))
{
        set_time_limit(0);
        $data = date("d/m/Y - H:i:s");
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
                $req->open("GET","http://www.orkut.com/Friends.aspx");
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send(null);
                preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
                $pgs = $pgs[1];
                $scrap = urlencode($_POST['scrap']."\n\n[/i][/u][/b][silver]".$data);
                echo "OrkutPlus Scrap went to: <br />";
                $pgs = $pgs/20;
                for($a=1;$a<=ceil($pgs);$a++)
                {
                        $req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a);
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                        $req->send(null);
                        $ts = $req->responseText;
                        preg_match_all('/class\=\"editcheck\"\ \/\>\n\<a\ \ href\=\"\/Main\#Profile\.aspx\?uid\=(.*?)\"\>/i',$ts,$frnd,PREG_SET_ORDER);
                        $sfrnd = sizeof($frnd);
                        for($y=0;$y<=$sfrnd;$y++)
                        {
                                $req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][1]);
                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".$scrap."&uid=".$frnd[$y][1]);
                                echo "UID - <a href='http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][1]."'>".$frnd[$y][1]."</a><br />";
                                flush();
                                if(isset($_POST['interval'])){
                                        sleep($_POST['interval']);
                                }else{
                                        sleep(1);
                                }
                        }
                }
        }else{
                echo "Email ID not working.<br>";
        }
}else{ 
?>
		<form method="POST">
				<b>Your Orkut EMail ID</b></p>
				<input type="text" name="email" size="40" value="Username"></p>
				<div class="loltitleclassic"><b>Password</b></p>
				<input type="password" name="pass" size="40" value = "Password"></p>
				<div class="loltitleclassic"><b>Time Interval Between Scraps</b></p>
				<input type="text" name="interval" size="8" value = ""> (in seconds)(optional) </p>
				<div class="loltitleclassic"><b>Your Scrap - No Captcha Content Please</b></p>
				<textarea rows="4" name="scrap" cols="40">OrkutPlus Rocks! [:D]</textarea></p>
				<p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Scrap All!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
				</form>
	<?php } ?>