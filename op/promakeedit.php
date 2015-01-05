<?php
if(isset($_GET['emailf'])){
        require('class.XMLHttpRequest.php');
        $req = new XMLHttpRequest();
        for($n=$_GET['nf'];$n<=$_GET['nl'];$n++)
        {
                $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_GET['emailf'].$n.$_GET['emaill']."&Passwd=".$_GET['pass']."&service=orkut&skipvpage=true&sendvemail=false");
                $req->send(null);
                preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
                $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
                $req->send(null);
                preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
                preg_match("/S=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $snb);
                echo $snb[0];
                $req->open("GET","http://www.orkut.co.in/Terms.aspx?mode=signup");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send(null);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
                $abc = urlencode($lol[0][1]);
                $abc1 = urlencode($lol1[0][1]);
                flush();
                if ($orkut_state[0] != NULL)
                {
                        $req->open("POST","http://www.orkut.co.in/Terms.aspx?mode=signup");
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                        $req->setRequestHeader("Cookie", $snb[0]);
                        $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&birthMonth=0&birthDay=1&birthYear=1980&terms=on&Action.acceptTerms=Submit+Query");
                        sleep(1);
                        flush();
                        $req->open("POST","http://www.orkut.co.in/EditSummary.aspx?mode=signup");
                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                        $req->setRequestHeader("Cookie", $snb[0]);
                        $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&firstName=".urlencode($_GET['fname'])."&lastName=By OrkutPlus&gender=2&status=1&birthdayPrivacy=3&birthMonth=9&birthDay=20&birthYear=1980&birthYearPrivacy=0&city=Gurgaon&state=Haryana&postalCode=&country=91&language1=152&language2=1&language3=128&language4=33&language5=0&language6=0&language7=0&language8=0&highSchool=&highSchoolState=0&education.1.school=&education.1.schoolPrivacy=0&company=&companyPrivacy=0&hereFor0=on&dating=&Action.update=Submit+Query");
                        sleep(1);
                        echo $n.": Profile Updated<br>";
                        flush();
                }else{
                        echo $n.": ID not working<br>";
                        flush();
                }
                flush();
        }
}
?>