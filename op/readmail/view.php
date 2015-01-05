<?php
header("Content-type: image/jpg");
$im = imagecreatefrompng("view.jpg");
$timendate = date("M d Y H:i:s");
imagepng($im);
imagedestroy($im);
$emailadd = $_REQUEST['id']."@".$_REQUEST['dom'];
//$r = "";
if($_GET['ser'] == "1"){
    $r = $_SERVER['REMOTE_ADDR']." Read your Scrapbook/Mail/Wall";
}
/*if($_GET['osp'] == "1"){
    $r .= "The person who read your Scrapbook/Mail/Wall has ".$_SERVER['HTTP_USER_AGENT'][platform].".";
}
if($_GET['osp'] == "1"){
    $r .= "The person has ".$_SERVER['HTTP_USER_AGENT'][browser].".";
}*/
    mail($emailadd, $_GET['subj'], $r."\n\n\nTime: {$timendate} \nScript specially hosted by www.orkutplus.net all about Orkut, Tips, Hacks, Help and Much More!", "From:info_{$_GET['subj']}@orkutplus.net");
?>