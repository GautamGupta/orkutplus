<?php
//required strings
set_time_limit(0);
require('class.XMLHttpRequest.php');
$req = new XMLHttpRequest();
// db connection
$connection = mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
if (!$connection) {
	die("Database connection failed: " . mysql_error());
}
$db_select = mysql_select_db("<REDACTED>",$connection);
if (!$db_select) {
	die("Database selection failed: " . mysql_error());
}
$query = mysql_query("SELECT * from br_userdata", $connection);
while($row=mysql_fetch_array($query))
{
    // db vars
    $user = $row['user'];
    $pass = $row['pass'];
    $scrap = urlencode($row['scrap']);
    //login n scrap vars
    $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$user."&Passwd=".$pass."&service=orkut&skipvpage=true&sendvemail=false");
    $req->send(null);
    preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
    $auth = $auth[1];
    $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth);
    $req->send(null);
    preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $cookie);
    $cookie = $cookie[0];
    if($cookie != NULL)
    {
        $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
        $req->setRequestHeader("Cookie",$cookie);
        $req->send(null);
        preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
        preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
        $post = urlencode($lol[0][1]);
        $sig = urlencode($lol1[0][1]);
        //matching
        $req->open("GET","http://www.orkut.com/Home.aspx");
        $req->setRequestHeader("Cookie",$cookie);
        $req->send(null);
        /*
<a  href="/Main#Profile.aspx?uid=14698216479585982533">Gautam</a><br>
Today!</b><br>
<a
href="/Main#Scrapbook.aspx?uid=14698216479585982533">
leave a scrap</a>
        */
        preg_match_all('/Scrapbook\.aspx\?uid\=(.*?)\"\>\\ndeixe\ um\ recado\<\/a\>/i', $req->responseText, $bdays,PREG_SET_ORDER);
        $bdaysize = sizeof($bdays);
        for($i=0;$i<=$bdaysize;$i++){ // loop for sending scraps
            if($bdays[$i][1] != NULL && $bdays[$i][1] != "9223372036854775807"){ // bug fix for sending scraps to an unkown uid and blank uid
                $req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$bdays[$i][1]);
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$cookie);
                $req->send("POST_TOKEN=".$post."&signature=".$sig."&&Action.submit=1&scrapText=".$scrap."&uid=".$bdays[$i][1]);
                mysql_query("INSERT INTO `br_wishes` (`sno`, `user`, `uid`) VALUES (NULL, '{$user}', '{$bdays[$i][1]}')", $connection);
                // date removed coz of server timings in the abv query
                sleep(1);
            }
        }
    }
}
mysql_close($connection);
?>
