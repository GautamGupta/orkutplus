<html><body><link href="http://img3.orkut.com/css/gen/base031.css" rel="stylesheet" type="text/css">
<?php 
    require('class.XMLHttpRequest.php');
    $req = new XMLHttpRequest();
    $cmm = $_GET['cmm'];
    $p = ceil($_GET['pg']);
    $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_GET['email']."&Passwd=".$_GET['pass']."&service=orkut&skipvpage=true&sendvemail=false");
    $req->send(null);
    preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
    $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
    $req->send(null);
    preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
    $dlp="****************************************Downloaded from www.OrkutPlus.net BackupMate!****************************************";
    $pgc = 1;
    if ($orkut_state[0] != NULL)
    {
        echo "<table border=1>";
        $req->open("GET","http://www.orkut.com/CommTopics.aspx?cmm=".$cmm);
        $req->setRequestHeader("Cookie",$orkut_state[0]);
        $req->send(null);
        preg_match_all('/tid=(.*?)">/i', $req->responseText,$tid);
        foreach($tid[1] as $tidsel){
            $req->open("GET","http://www.orkut.com/CommMsgs.aspx?cmm=".$cmm."&tid=".$tidsel);
            $req->setRequestHeader("Cookie",$orkut_state[0]);
            $req->send(null);
            $temp=explode("<div class=\"listitem\">",$req->responseText);
            $temp2=explode("<div class=\"listdivi\">",$temp[1]);
            if($_GET['dl'] == 1){
                $dlp .= $temp2[0];
            }else{
                echo "<tr><td>";
                $temp3 = str_replace("<", "<***", $temp2[0]);
                echo $temp3;
                echo "</td></tr>";
            }
        }
	if($p > 1){
	    $req->open("GET","http://www.orkut.com/CommTopics.aspx?cmm=".$cmm);
	    $req->setRequestHeader("Cookie",$orkut_state[0]);
	    $req->send(null);
	    preg_match('%CommTopics.aspx([^"]+)">next %', $req->responseText, $find);
	    if($find[1] != NULL){
		while(preg_match('%CommTopics.aspx([^"]+)">next %', $req->responseText, $match))
		{
		    $req->open("GET","http://www.orkut.co.in/CommTopics.aspx".$match[1]);
		    $req->setRequestHeader("Cookie",$orkut_state[0]);
		    $req->send(null);
		    preg_match_all('/tid=(.*?)">/i', $req->responseText,$tid);
		    foreach($tid[1] as $tidsel){
			$req->open("GET","http://www.orkut.com/CommMsgs.aspx?cmm=".$cmm."&tid=".$tidsel);
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
			}
		    }
		    $pgc++;
		    if($pgc > $p){
			if($_GET['dl'] == 1){
			    header('Content-type: text/plain');
			    header('Content-Disposition: attachment; filename="'.$cmm.'.html');
			    echo $dlp;
			}
			echo "</table>";
		        
			exit;
		    }
		}
	    }
	}
        if($_GET['dl'] == 1){
            header('Content-type: text/plain');
    	    header('Content-Disposition: attachment; filename="'.$cmm.'.html');
            echo $dlp;
        }
        echo "</table>";
        
    }else{
        echo "E-Mail ID Not Working!";
    }
    ?>