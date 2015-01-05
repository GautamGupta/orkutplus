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
        $req->open("GET","http://www.orkut.com/ShowFriends.aspx");
        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
        $req->send(null);
        preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
        $pgs = $pgs[1];
        $pgs = $pgs/20;
        $pgs = ceil($pgs);
        if($_GET['o'] == 1){
                echo '<table height=100% width=100% border=0><tr><td height=10% width=100%><p align="center"><u>You an use these Friend UIDs later to Add the Friends again with this <a href="mass-friend-adder-single.php">tool</a>. Just navigate to that page and enter these values in the Friend UIDs textbox.</u></p></td></tr><tr><td height=90% width=100%><textarea style="height:100%;width:100%;" readonly="true" onclick="this.focus(); this.select();">';
        }
        for($a=1;$a<=$pgs;$a++)
        {
                $req->open("GET","http://www.orkut.com/ShowFriends.aspx?show=all&pno=".$a);
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send(null);
                $ts = $req->responseText;
                preg_match_all('/<img src="(.*?)" class="listimg"  ><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER);
                for($y=0;$y<=sizeof($frnd);$y++)
                {
                        if($frnd[$y][2] != NULL){
                                if($_GET['o'] != 1){
                                        if(($y % 2)==0){
                                                //even
                                                $tec = '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
                                        }else{
                                                //odd
                                                $tec = '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
                                        }
                                }else{
                                        echo $frnd[$y][2].":";
                                }
                                if($_GET['o'] != 1){
                                        if($_GET['dl'] == 1){
                                                $dlp .= $tec;
                                        }else{
                                                echo $tec;
                                                flush();
                                        }
                                }
                        }
                }
        }
        if($_GET['o'] == 1){
                echo '</textarea></td></tr></table>';
        }else{
                if($_GET['dl'] == 1){
                        $dlp .= '</table>';
                        header('Content-type: text/plain');
                        header('Content-Disposition: attachment; filename="'.$_GET['email'].'.html');
                        echo $dlp;
                }else{
                        echo '</table>';
                }
        }
}else{
        echo "E-Mail ID not Working!<br>";
}
?>