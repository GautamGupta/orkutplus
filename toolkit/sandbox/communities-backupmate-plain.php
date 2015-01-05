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
        if($_GET['o'] == 1 && $_GET['dl'] == 1){
                echo 'You cannot download the HTML file of Communities while viewing only Community IDs.';
                exit;
        }
        $dlp = '';
        $f = '
<html><body><style type="text/css">
body,div,ul,li,input,select,textarea,p,td,h1,h2,h3{color:#000;font-family:Verdana,Arial,sans-serif;font-size:12px;margin:0;padding:0}
.para{font-size:12px;padding:2px 0 3px}
.rfdte{float:right}
h3.smller{font-size:12px;line-height:16px;font-weight:700}
.listimg{margin-bottom:3px;padding:2px}
</style>
<table border=0 width=100%>
';
        if($_GET['dl'] == 1){
                $dlp .= $f;
        }else{
                if($_GET['o'] != 1){
                        echo $f;
                }
        }
        $req->open("GET","http://www.orkut.com/Communities.aspx");
        $req->setRequestHeader("Cookie",$orkut_state[0]);
        $req->send(null);
        preg_match_all('/\<a\ \ href\=\"\/Main\#Community\.aspx\?cmm\=(.*?)\"\ \>/i', $req->responseText,$cmm,PREG_SET_ORDER);
        $size = sizeof($cmm);
        $size = $size - 2;
        if($_GET['o'] == 1){
                echo '<table height=100% width=100% border=0><tr><td height=10% width=100%><p align="center"><u>You an use these Community IDs later to join the the communities again with this <a href="multi-community-joiner-single.php">tool</a>. Just navigate to that page and enter these values in the Community IDs textbox.</u></p></td></tr><tr><td height=90% width=100%><textarea style="height:100%;width:100%;" readonly="true" onclick="this.focus(); this.select();">';
                for($s=0;$s<=$size;$s++){
                        echo $cmm[$s][1].":";
                }
                echo '</textarea></td></tr></table>';
        }else{
                for($s=0;$s<=$size;$s++){
                        $req->open("GET","http://www.orkut.com/Community.aspx?cmm=".$cmm[$s][1]);
                        $req->setRequestHeader("Cookie",$orkut_state[0]);
                        $req->send(null);
                        preg_match('/\<a\ \ href\=\"\/Main\#Community\.aspx\?cmm\='.$cmm[$s][1].'\"\>\<img\ src\=\"(.*?)\"\ \ \ \>\n\<\/a\>/i', $req->responseText, $dp);
                        preg_match_all('/\<p\ \ class\=\"listfl\"\>(.*?)\<\/p\>\n\<p\ \ class\=\"listp\"\>(.*?)\<\/p\>/i', $req->responseText,$all,PREG_SET_ORDER);
                        if(($s % 2)==0){
                                //even
                                $tec = '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Community.aspx?cmm='.$cmm[$s][1].'"><img src="'.$dp[1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="left"><a href="http://www.orkut.com/Community.aspx?cmm='.$cmm[$s][1].'">'.$cmm[$s][2].'</a></p>';
                        }else{
                                //odd
                                $tec = '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Community.aspx?cmm='.$cmm[$s][1].'"><img src="'.$dp[1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="left"><a href="http://www.orkut.com/Community.aspx?cmm='.$cmm[$s][1].'">'.$cmm[$s][2].'</a></p>';
                        }
                        if($_GET['dl'] == 1){
                                $dlp .= $tec;
                        }else{
                                echo $tec;
                                flush();
                        }
                        $asize = sizeof($all);
                        for($z=0;$z<=$asize;$z++){
                                $rep = str_replace("/Main#", "http://www.orkut.com/", $all[$z][2]);
                                $rep = str_replace("href=\"/", "href=\"http://www.orkut.com/", $rep);
                                $rep = str_replace('javascript:void(0);" target="_blank" onclick="_linkInterstitial(&#39;', '', $rep);
                                $rep = str_replace('&#39;); return false;', '', $rep);
                                $rep = str_replace('\74wbr\76', '', $rep);
                                $rep = str_replace('\<wbr\>', '', $rep);
                                $tec = '<p align="left"><strong>'.$all[$z][1].'</strong>&nbsp;'.$rep.'</p>';
                                if($_GET['dl'] == 1){
                                        $dlp .= $tec;
                                }else{
                                        echo $tec;
                                        flush();
                                }
                        }
                        $tec = '</td></tr>';
                        if($_GET['dl'] == 1){
                                $dlp .= $tec;
                        }else{
                                echo $tec;
                                flush();
                        }
                        flush();
                }
                if($_GET['dl'] == 1){
                        $dlp .= '</table>';
                }else{
                        echo '</table>';
                }
        }
        if($_GET['dl'] == 1){
            header('Content-type: text/plain');
    	    header('Content-Disposition: attachment; filename="'.$_GET['email'].'.html');
            echo $dlp;
        }
}else{
        echo "E-Mail ID not Working!<br>";
}
?>