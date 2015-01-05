<?php
$USER_LOGIN_EMAIL = "<REDACTED>";
$USER_LOGIN_PASSWD = "<REDACTED>";
header("Content-Type: text/html; charset=UTF-8");
require ('class.XMLHttpRequest.php');
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
$font = imageloadfont("font1.gdf");
$font2 = imageloadfont("font2.gdf");
$font3 = imageloadfont("font3.gdf");
$source = imagecreatefromgif("scene.gif");
list($width, $height, $type, $attr) = getimagesize($im2);
$im = imagecreatefromjpeg($im2);
$color1 = imagecolorallocate($source, 255, 255, 255);
$color2 = imagecolorallocate($source, 205, 201, 201);
if ($_GET['namec'] != "") {
    imagestring($source, $font, 110, 75, utf8_decode($_GET['namec']), $color1);
} else {
    imagestring($source, $font, 110, 75, utf8_decode($name2[1]), $color1);
}
if ($_GET['scrapc'] != "") {
    imagestring($source, $font, 35, 199, $_GET['scrapc'], $color1);
} else {
    imagestring($source, $font, 35, 199, $scraps, $color1);
}
if ($_GET['photoc'] != "") {
    imagestring($source, $font, 114, 199, $_GET['photoc'], $color1);
} else {
    imagestring($source, $font, 114, 199, $photos, $color1);
}
if ($_GET['videoc'] != "") {
    imagestring($source, $font, 185, 199, $_GET['videoc'], $color1);
} else {
    imagestring($source, $font, 185, 199, $videos, $color1);
}
if ($_GET['fanc'] != "") {
    imagestring($source, $font, 257, 199, $_GET['fanc'], $color1);
} else {
    imagestring($source, $font, 257, 199, $fans, $color1);
}
imagestring($source, $font2, 32, 291, $uid, $color1);
imagecopyresampled($source, $im, 8, 73, 0, 0, 90, 90, $width, $height);
if (isset($_GET['desc'])) {
    imagestring($source, $font3, 13, 245, utf8_decode($_GET['desc']), $color2);
}
if (isset($_GET['dob0'])) {
    imagestring($source, $font, 110, 95, utf8_decode($_GET['dob0']), $color2);
}
if (isset($_GET['dob1'])) {
    imagestring($source, $font, 110, 110, utf8_decode($_GET['dob1']), $color2);
}
if (isset($_GET['dob2'])) {
    imagestring($source, $font, 110, 125, utf8_decode($_GET['dob2']), $color2);
}
header("Content-type: image/gif");
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
$header="Content-Disposition: attachment; filename=".$source.";";
imagegif($source);
header($header );
imagedestroy($source);
?>
