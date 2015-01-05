<?php
require('class.XMLHttpRequest.php');
$req = new XMLHttpRequest();
$req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_GET['email']."&Passwd=".$_GET['pass']."&service=orkut&skipvpage=true&sendvemail=false");
$req->send(null);
preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
$req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
$req->send(null);
preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
if ($orkut_state[0] != NULL){
        $dlp = '';
        $tec = '
<html><body><style type="text/css">
body,div,ul,li,input,select,textarea,p,td,h1,h2,h3{color:#000;font-family:Verdana,Arial,sans-serif;font-size:12px;margin:0;padding:0}
.para{font-size:12px;padding:2px 0 3px}
.rfdte{float:right}
h3.smller{font-size:12px;line-height:16px;font-weight:700}
.listimg{margin-bottom:3px;padding:2px}
</style>
<table border=0 width=100%>
';
        /*if($_GET['dl'] == 1){
                $dlp .= $tec;
        }else{*/
                echo $tec;
        //}
        //scrap write function, used 2 times in process
        function s($t, $y){
                //checkbox hide
                $t = str_replace(" type=\"checkbox\"", " type=\"hidden\"", $t);
                //so that no shells get uploaded
                $t = str_replace(" type=\"file\"", " type=\"hidden\"", $t);
                //others (blank).2
                $t = str_replace("<a class=\"rbs\" href=\"javascript: void(0);\" id=\"reply_link_".$y."\" onclick=\"_quickReplyOpen(this, ".$y.");\" > &nbsp;Reply</a>", "", $t);
                $t = str_replace("&nbsp;", "", $t);
                //hide 1.2
                $t = str_replace("<span class=\"grabtn\"><a  href=\"javascript:void(0);\" onclick=\"_singleDelete(function() {_doDelete(document.deleteForm, ", "<input type=\"hidden\" value=\"", $t);
                $t = str_replace(")}); return false;\" class=\"btn\">delete</a></span><span class=\"btnboxr\"><img src=\"http://img1.orkut.com/img/b.gif\" alt=\"\" height=\"1\" width=\"5\"></span>", "\">", $t);
                //hide 2.3
                $t = str_replace("<a href=\"javascript: void(0);\" style=\"display: none\" id=\"vcon-", "<input type=\"hidden\" value=\"", $t);
                $t = str_replace("\" onclick=\"(_currentConversation = new _Conversation(", "\"><input type=\"hidden\" value=\"", $t);
                $t = str_replace("))._showWindow(); return false;\">View this conversation</a>","\">",$t);
                //long hide (blank)
                $t = str_replace("</div>\n<div class=\"lf\">\n<div id=\"quickReplyResult_".$y."\" class=\"promobg\" style=\"display: none; margin-top: 5px; padding: 5px;\">\n</div>\n<div id=\"scrap_".$y."\" style=\"display: none; width: 600px; display: none;\">\n<textarea id=\"scrapText_".$y."\" name=\"replyText_".$y."\" cols=\"55\" rows=\"4\" ></textarea>\n<div class=\"listdivi\"></div>\n<span class=\"grabtn\"><a  href=\"javascript:void(0);\" onclick=\"_quickReplySubmit(", "<input type=\"hidden\" value=\"", $t);
                $t = str_replace("); return false;\" class=\"btn\">post scrap</a></span><span class=\"btnboxr\"><img src=\"http://img1.orkut.com/img/b.gif\" alt=\"\" height=\"1\" width=\"5\"></span>\n<span class=\"grabtn\"><a  href=\"javascript:void(0);\" onclick=\"_quickReplyCloseAll(); document.getElementById('scrapText_".$y."').value = ''; return false;\" class=\"btn\">cancel</a></span><span class=\"btnboxr\"><img src=\"http://img1.orkut.com/img/b.gif\" alt=\"\" height=\"1\" width=\"5\"></span>", "\">", $t);
                //chat hide
                $t = str_replace("<span class=\"otherPresence\">\n<span class=\"rvb\">|</span>\n<span class=\"otherPresence\"><a\nname=\"gtalklink", "<input type=\"hidden\" value=\"", $t);
                $t = str_replace("\" href=\"javascript:void(0)\"\nonclick=\"javascript:GTALK_Client.showChat('", "\"><input type=\"hidden\" value=\"", $t);
                $t = str_replace("');\">Reply by chat</a>\n<span>\n</span>", "\"><input type=\"hidden\" value=\"", $t);
                if (preg_match("<span class=\"rf\" style=\"padding: 0px 2px;\">", $t, $nouse)){
                        $t = explode("<span class=\"rf\" style=\"padding: 0px 2px;\">", $t);
                        $t = $t[0];
                }
                //even odd check added for design
                if($t != NULL){
                        if(($y % 2)==0){
                                //even
                                $tec = '<tr><td style="border:2px groove #FBFACE;" width=100%>'.$t.'</a></td></tr>';
                        }else{
                                //odd
                                $tec = '<tr><td width=100% style="background-color:#FBFACE;border:2px groove #FBFACE;">'.$t.'</a></td></tr>';
                        }
                        /*if($_GET['dl'] == 1){
                                $dlp .= $tec;
                        }else{*/
                                echo $tec;
                                
                        //}
                }
        }
        //first
        $req->open("GET","http://www.orkut.com/Scrapbook.aspx?pageSize=30");
        $req->setRequestHeader("Cookie",$orkut_state[0]);
        $req->send(null);
        $temp=explode("<div class=\"listitemchk\">",$req->responseText);
        for($y=1;$y<=30;$y++){
                s($temp[$y], $y);
        }
        //after first
        $req->open("GET","http://www.orkut.com/Scrapbook.aspx?pageSize=30");
        $req->setRequestHeader("Cookie",$orkut_state[0]);
        $req->send(null);
        preg_match('%Scrapbook.aspx([^"]+)">next %', $req->responseText, $find);
        if($find[1] != NULL){
		while(preg_match('%Scrapbook.aspx([^"]+)">next %', $req->responseText, $match)){
                        $req->open("GET","http://www.orkut.com/Scrapbook.aspx".$match[1]."&pageSize=30");
                        $req->setRequestHeader("Cookie",$orkut_state[0]);
                        $req->send(null);
                        $temp=explode("<div class=\"listitemchk\">",$req->responseText);
                        $y = NULL;
                        for($y=1;$y<=30;$y++){
                                s($temp[$y], $y);
                        }
		}
        }
        $tec = '</table>';
        /*if($_GET['dl'] == 1){
                $dlp .= $tec;
        }else{*/
                echo $tec;
        /*}
        if($_GET['dl'] == 1){
            header('Content-type: text/plain');
    	    header('Content-Disposition: attachment; filename="'.$_GET['email'].'.html');
            echo $dlp;
        }*/
}else{
        echo "E-Mail ID not Working!<br>";
}
?>