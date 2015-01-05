<?php
//
//initialising below
//
//version details
$latestver = "7"; //current version being used, used for display
$latestverw = "7"; //current version being used, withot periods, only for the recognition of profile maker
$latestverdl = "http://cdn.orkutplus.net/files/Profile-Maker-v".$latestverw.".zip"; //latest version download link
$getver = $_GET['cv']; //sent by profile maker
//message details
$latestmsgdate = date("j F y"); //the date the last msg was published
$updatemsg = "Message on ".$latestmsgdate." - Profile Maker Version ".$latestver." Released! Download it by clicking on Check for Updates!"; //if profile maker is old, then the message to get it updated
$latestvermsg = "Message on ".$latestmsgdate." - Thanks for using OrkutPlus Profile Maker Version ".$latestver.". Note - To make 1 Profile, you may face 1-3 Captchas.";
//
//version check below
//
if($getver == "7"){ //if version is 7, major release (latest)
    if($_GET['msg'] == 1){ //echo message
        echo $latestvermsg;
    }elseif($_GET['lver'] == 1){ //echo latest version
        echo $latestver;
    }elseif($_GET['upd'] == 1){ //if update is needed
        if($getver != $latestverw){ //if the pro maker is not the latest ver
            echo "1";
        }else{ //if the pro maker is latest ver
            echo "0";
        }
    }elseif($_GET['ldw'] == 1){ //latest pro maker download link
        echo $latestverdl;
    }
}elseif($getver == "651"){ //if version is 6.5.1, minor release
    if($_GET['msg'] == 1){ //echo message
        echo $updatemsg;
    }elseif($_GET['lver'] == 1){ //echo latest version
        echo $latestver;
    }elseif($_GET['upd'] == 1){ //if update is needed
        if($getver != $latestverw){ //if the pro maker is not the latest ver
            echo "1";
        }else{ //if the pro maker is latest ver
            echo "0";
        }
    }elseif($_GET['ldw'] == 1){ //latest pro maker download link
        echo $latestverdl;
    }
}
?>