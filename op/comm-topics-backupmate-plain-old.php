<html><body><link href="http://img3.orkut.com/css/gen/base031.css" rel="stylesheet" type="text/css">
<?php 
    require('class.XMLHttpRequest.php');
    $req = new XMLHttpRequest();
    $cmm = $_POST['cmm'];
    $p = ceil($_POST['pg']);
    $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['email']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false");
    $req->send(null);
    preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
    $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
    $req->send(null);
    preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
    $dlp="****************************************Downloaded from www.OrkutPlus.net BackupMate!****************************************";
    if ($orkut_state[0] != NULL)
    {
        echo "<table border=1>";
        $req->open("GET","http://www.orkut.co.in/CommTopics.aspx?cmm=".$cmm);
        $req->setRequestHeader("Cookie",$orkut_state[0]);
        $req->send(null);
        preg_match_all('/tid=(.*?)">/i', $req->responseText,$tid);
        foreach($tid[1] as $tidsel){
            $req->open("GET","http://www.orkut.co.in/CommMsgs.aspx?cmm=".$cmm."&tid=".$tidsel);
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send(null);
            $temp=explode("<div class=\"listitem\">",$req->responseText);
            $temp2=explode("<div class=\"listdivi\">",$temp[1]);
            if($_GET['dl'] == 1){
                $dlp .= $temp2[0];
            }else{
                echo "<tr><td>";
                $temp3 = str_replace("script", "*** script ***", $temp2[0]);
                $temp4 = str_replace("iframe", "*** iframe ***", $temp3);
                echo $temp4;
                echo "</td></tr>";
                flush();
            }
        }
        $req->open("GET","http://www.orkut.co.in/CommTopics.aspx?cmm=".$cmm);
        $req->setRequestHeader("Cookie",$orkut_state[0]);
        $req->send(null);
        while(!preg_match_all('%next &gt;&nbsp;&nbsp;%',$req->responseText, $c))
        {
            preg_match_all('%CommTopics.aspx([^"]+)">next %', $req->responseText, $match);
            $req->open("GET","http://www.orkut.co.in/CommTopics.aspx?cmm=".$cmm);
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send(null);
            preg_match_all('/tid=(.*?)">/i', $req->responseText,$tid);
            foreach($tid[1] as $tidsel){
                $req->open("GET","http://www.orkut.co.in/CommMsgs.aspx?cmm=".$cmm."&tid=".$tidsel);
                $req->setRequestHeader("Cookie",$orkut_state[0]);
                $req->send(null);
                $temp=explode("<div class=\"listitem\">",$req->responseText);
                $temp2=explode("<div class=\"listdivi\">",$temp[1]);
                if($_GET['dl'] == 1){
                    $dlp .= $temp2[0];
                }else{
                    echo "<tr><td>";
                    $temp3 = str_replace("script", "*** script ***", $temp2[0]);
                    $temp4 = str_replace("iframe", "*** iframe ***", $temp3);
                    echo $temp4;
                    echo "</td></tr>";
                    flush();
                }
            }
            $req->open("GET","http://www.orkut.co.in/CommTopics.aspx?cmm=".$cmm);
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send(null);
        }
        if($_GET['dl'] == 1){
            header('Content-type: text/plain');
    	    header('Content-Disposition: attachment; filename="'.$cmm.'.html');
            echo $dlp;
        }
        echo "</table>";
        flush();
    }else{
        echo "E-Mail ID Not Working!";
    }
    ?>