<?php
if($_SESSION['ocookie'] != NULL && $_GET['xid'] != NULL){
    require_once("includes/curl.php");
    $req = new XMLHttpRequest();
    $req->open("GET","http://www.orkut.com/CaptchaImage.aspx?xid=".$_GET['xid']);
    $req->setRequestHeader("Content-type", "image/jpeg");
    $req->setRequestHeader("Cookie",$_SESSION['ocookie']);
    $req->send(null);
    header("Content-type: image/jpeg");
    $img = imagecreatefromstring($req->responseText);
    imagejpeg($img);
    imagedestroy($img);
}else{
    if($_GET['xid'] != NULL){
        echo "Invalid XID, the value no more exists.";
    }else{
        echo "Please supply XID.";
    }
}
?>