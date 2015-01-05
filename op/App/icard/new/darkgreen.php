<?php
$USER_LOGIN_EMAIL = "<REDACTED>";
$USER_LOGIN_PASSWD = "<REDACTED>";
require ('class.XMLHttpRequest.php');
if(isset($_GET['uid'])){
    $uid = $_GET['uid'];
    $req = new XMLHttpRequest();
    $req->open("GET", "https://www.google.com/accounts/ClientLogin?Email=$USER_LOGIN_EMAIL&Passwd=$USER_LOGIN_PASSWD&service=orkut&skipvpage=true&sendvemail=false");
    $req->send(null);
    preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
    $req->open("GET", "http://www.orkut.com/RedirLogin.aspx?auth=" . $auth[1]);
    $req->send(null);
    preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
    $req->open("GET", "http://www.orkut.com/profile.aspx?uid=$uid");
    $req->setRequestHeader("Cookie", $orkut_state[0]);
    $req->send(null);
    $t = $req->responseText;
    preg_match_all('%[0-9,.]+</span>%i', $t, $result);
    preg_match_all('%background-image: url(.*?).jpg%i', $t, $im8);
    preg_match('/\<h1\ id\=\"title\"\>(.*?)\n\<\/h1\>/i', $t, $name2);
    preg_match_all('%\([0-9]+\)</span>%', $t, $frnds2);
    $im2 = preg_replace('%background-image: url\(%', '', $im8[0][0]);
    $scraps = preg_replace('%</span>%', '', $result[0][0]);
    $photos = preg_replace('%</span>%', '', $result[0][1]);
    $videos = preg_replace('%</span>%', '', $result[0][3]);
    $fans = preg_replace('%</span>%', '', $result[0][4]);
    $frnds = preg_replace('%[^0-9,]+%', '', $frnds2[0][0]);
    list($width, $height, $type, $attr) = getimagesize($im2);
    $im = imagecreatefromjpeg($im2);
    $scene = "images/greenscene.gif";
	$source = imagecreatefromgif($scene);
    $segoeui = "font1.ttf";
    $barcode = "font2.ttf";
    $bankgothic = "font3.ttf";
   	$color1 = imagecolorallocate($source, 255, 255, 255);
    $color2 = imagecolorallocate($source, 128, 128, 128);
    $color3 = imagecolorallocate($source, 0, 0, 0);
    imagettftext($source, 35, 0, 78, 325, $color2, $barcode, $uid);
    if(isset($_GET['namec']) && !is_null($_GET['namec'])){
        imagettftext($source, 18, 0, 107, 85, $color1, $bankgothic, utf8_decode($_GET['namec']));
    }else{
        imagettftext($source, 18, 0, 107, 85, $color1, $bankgothic, utf8_decode($name2[1]));
    }
    if(isset($_GET['scrapc']) && !is_null($_GET['scrapc'])){
        imagettftext($source, 8, 0, 35, 213, $color1, $segoeui, utf8_decode($_GET['scrapc']));
    } else {
        imagettftext($source, 8, 0, 35, 213, $color1, $segoeui, utf8_decode($scraps));
    }
    if(isset($_GET['photoc']) && !is_null($_GET['photoc'])){
        imagettftext($source, 8, 0, 114, 213, $color1, $segoeui, utf8_decode($_GET['photoc']));
    } else {
        imagettftext($source, 8, 0, 114, 213, $color1, $segoeui, utf8_decode($photos));
    }
    if(isset($_GET['videoc']) && !is_null($_GET['videoc'])){
        imagettftext($source, 8, 0, 185, 213, $color1, $segoeui, utf8_decode($_GET['videoc']));
    } else {
        imagettftext($source, 8, 0, 185, 213, $color1, $segoeui, utf8_decode($videos));
    }
    if(isset($_GET['fanc']) && !is_null($_GET['fanc'])){
        imagettftext($source, 8, 0, 257, 213, $color1, $segoeui, utf8_decode($_GET['fanc']));
    } else {
        imagettftext($source, 8, 0, 257, 213, $color1, $segoeui, utf8_decode($fans));
    }
    imagecopyresampled($source, $im,13, 76, 0, 0, 90, 90, $width, $height);
    if (isset($_GET['desc'])) {
        $desc = $_GET['desc'];
        $len = strlen($desc);
        if ($len > 100) {
            exit("The maximum character limit for Description is 100 characters.");
        }else{
            $len = $len / 41;
            $len = ceil($len);
            $total = array();
            for ($n = 1; $n <= $len;$n++) {
                $k = $n - 1;
                $p = $k * 41;
                $b = $n * 41;
                $new = substr($desc, $p, $b);
                $total[] = $new;
            }
            for ($n = 0; $n <= 2; $n++) {
                $hh = 245 + (15 * $n);
                imagettftext($source, 8, 0, 13, $hh, $color1, $segoeui, utf8_decode($total[$n]));
            }
        }
    }
    if (isset($_GET['dob0'])) {
        imagettftext($source, 8, 0, 110, 95, $color1, $segoeui, utf8_decode($_GET['dob0'])); }
    if (isset($_GET['dob1'])) {
        imagettftext($source, 8, 0, 110, 110, $color1, $segoeui, utf8_decode($_GET['dob1'])); }
    if (isset($_GET['dob2'])) {
        imagettftext($source, 8, 0, 110, 125, $color1, $segoeui, utf8_decode($_GET['dob2'])); }
    header("Content-type: image/gif");
    imagegif($source);
    imagedestroy($source);
}else{
    exit("Please provide an UID.");
}
?>
