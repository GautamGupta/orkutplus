<?php
//start

//define
if(isset($_GET['uid']){
    $ref = $_SERVER['HTTP_REFERER'];
    $refarr = explode("?", $ref);
    if($refarr[1] == "uid=".$_GET['uid']){
        require('class.XMLHttpRequest.php');
        $req = new XMLHttpRequest();
        $data = date("d/m/Y - H:i:s");

        //login essentials

        mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
        mysql_selectdb("<REDACTED>");
        $query = mysql_query("SELECT * from users WHERE uid='".$_GET['uid']."'");
        while($row=mysql_fetch_array($query))
        {
             	$user=$row['user'];
                $pass=$row['pass'];
        }
        $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$user."&Passwd=".$pass."&service=orkut&skipvpage=true&sendvemail=false");
        $req->send(null);
        preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
        $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
        $req->send(null);
        preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
        if ($orkut_state[0] != NULL)
        {
            $cookie = $orkut_state[0];

            //pregmatches

            $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
            $req->setRequestHeader("Cookie",$cookie);
            $req->send(null);
            preg_match_all('/value="([a-z0-9\+\/\=]{20,})"/i', $req->responseText, $postsig, PREG_SET_ORDER);
            preg_match("/^\<a\s*href\=\"\/Profile.aspx\?uid\=(\d+)\"\>$/m", $req->responseText, $uid);
            $uid = $uid[1];

            //if the user is not itself

            if ($uid != $_GET['uid']) {
                preg_match('/'.$uid.'\">(.*?)<\/a>:/i', $req->responseText, $person);
                preg_match('/<div  class=\"para \">(.*?)<div class=\"selr\">/ism', $req->responseText, $message);
                preg_match('/document.deleteForm, (.*?), (.*?), (.*?)\)/i', $req->responseText, $delete);

                //write in db

                $msg = "<a href=\"http://orkut.com/Profile.aspx?uid=".$uid."\">".rawurldecode(utf8_decode($person[1]))."</a>  <br>{$message[1]}</span><br /><br>";
                mysql_query("INSERT INTO `<REDACTED>`.`scraps` (`sno`, `user`, `scrap`) VALUES (NULL, '{$user}', '{$msg}')");

                //reply n dlete

                $texto = "[b]Hi, ".rawurldecode(utf8_decode($person[1])).", Thanks for your Scrap. It has been erased but it has reached to the person who you sent this to. This is auto reply message by OrkutPlus.[/b]\n\n\n[silver]\n\n".date("H:i:s")." [/silver]";
                $texto = rawurlencode(utf8_encode($texto)) ."\n\n";
                $send = "POST_TOKEN=".$postsig[0][1]."&signature=".rawurlencode($postsig[1][1])."&replyToken=&toUserId=".$delete[1]."&rawAddedDate=".$delete[3]."&conversationId=5240617084925239376&uid=".$uid."&scrapText=".$texto."&&Action.submit=1";
                $req->open("POST","http://www.orkut.com/Scrapbook.aspx");
                $req->setRequestHeader("Cookie",$cookie);
                $req->send($send);
                $dell ="POST_TOKEN=".$postsig[0][1]."&signature=".rawurlencode($postsig[1][1])."&toUserId=".$delete[2]."&rawAddedDate=".$delete[3]."&fromUserId=".$delete[1]."&Action.deleteSingle=Submit+Query";
                $req->open("POST","http://www.orkut.com/Scrapbook.aspx");
                $req->setRequestHeader("Cookie",$cookie);
                $req->send($dell);
            }else{
                echo "ID Not Working!<br>";
            }
        }else{
            echo "Wrong Authentication!";
        }
    }else{
        echo "You cannot access this page.";
    }
}else{
    echo "UID not Provided!";
}
//over. Code CopyRights with www.orkutplus.net

?>
