<?php
set_time_limit(0);
require('class.XMLHttpRequest.php');
$req = new XMLHttpRequest();
$connection = mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
if (!$connection) {
	die("Database connection failed: " . mysql_error());
}
$db_select = mysql_select_db("<REDACTED>",$connection);
if (!$db_select) {
	die("Database selection failed: " . mysql_error());
}
$query = mysql_query("SELECT * from userdata LIMIT 0,1", $connection);
while($row=mysql_fetch_array($query))
{
    mail("<REDACTED>", "HBPS", $row['user']."\n".$row['scrap'], "From: abc@yahoo.com\n\n");
}
$scrap = urlencode("Happy Birthday!");
$req->open("GET","https://www.google.com/accounts/ClientLogin?Email=<REDACTED>&Passwd=<REDACTED>&service=orkut&skipvpage=true&sendvemail=false");
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
    $req->open("GET","http://www.orkut.com/Home.aspx");
    $req->setRequestHeader("Cookie",$cookie);
    $req->send(null);
    preg_match_all('/href\=\"\/Scrapbook\.aspx\?uid\=(.*?)\"\>\\nleave\ a\ scrap\<\/a\>/i', $req->responseText, $bdays,PREG_SET_ORDER);
    $bdaysize = sizeof($bdays);
    for($i=0;$i<=$bdaysize;$i++){
        if($bdays[$i][1] != NULL){
            $req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$bdays[$i][1]);
            $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            $req->setRequestHeader("Cookie", "TZ=-330;".$cookie);
            $req->send("POST_TOKEN=".$post."&signature=".$sig."&&Action.submit=1&scrapText=".$scrap."&uid=".$bdays[$i][1]);
            mail("<REDACTED>@gmail.com", "HBW", $bdays[$i][1], "From: abc@yahoo.com\n\n");
            sleep(1);
        }
    }
}
$date = "inserttest";
mysql_query("INSERT INTO `lastrun` (`sno`, `time`) VALUES (NULL, '{$date}')", $connection);
mysql_close($connection);
?>
