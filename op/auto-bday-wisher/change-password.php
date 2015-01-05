<?php
require_once("includes/header.php");
title("Auto Birthday Wisher - User Control Panel");
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['newpass'])){
        global $connection;
        $query = mysql_query("SELECT * from userdata WHERE user='".$_POST['user']."'", $connection);
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
        }
        if($check == $_POST['user'] && $check2 == $_POST['pass']){
                $req = new XMLHttpRequest();
		$post = login($_POST['user'], $_POST['newpass']);
		if($post['post'] != NULL){
	                $query = mysql_query("SELECT * from userdata WHERE user='{$_POST['user']}'", $connection);
                        mysql_query("UPDATE `userdata` SET `pass` = '{$_POST['newpass']}' WHERE `userdata`.`user` = '{$_POST['user']}';", $connection);
                        echo 'Your Password has been changed.';
                }else{
                        echo "New Password is wrong. Password cannot be changed.";
                }
        }else{
                echo "ID or Old Password do not Match.";
        } 
}else{ 
?>
<script>document.location='user-panel.php';</script>
<?php
}
include("includes/footer.php");
?>