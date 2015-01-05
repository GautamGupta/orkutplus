<?php
require_once("includes/header.php");
title("Auto Birthday Wisher - User Control Panel");
if(isset($_POST['user']) && isset($_POST['pass'])){
        global $connection;
        $query = mysql_query("SELECT * from abw_userdata WHERE user='".$_POST['user']."'", $connection);
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
                $uid=$row['uid'];
        }
        if($check == $_POST['user'] && $check2==$_POST['pass'])
        {
		mysql_query("UPDATE `abw_userdata` SET `scrap` = '{$_POST['reply']}' WHERE `user` = '{$_POST['user']}'", $connection);
                echo '<b>Information has been changed.</b><br><br><div class="loltitleclassic"><b>Whats Next?</b></div><br>There are some important components of this Auto Birthday Wisher. All of them are listed below.<br><br><div class="loltitleclassic"><b>1 - Viewing Wishes that have been Scrapped to your Friends.</b></div><br> Now, you can view the Wishes scrapped by our Tool when there is a Birthday. You can view the wishes scrapped by logging in to <a href="view-wishes.php">View Wishes Page.</a><br><br><div class="loltitleclassic"><b>2 - Edit Account Settings</b></div><br> If you wish to change your password or the way you want this service to work, please log in with your account on <a href="user-panel.php">User Control Panel Page</a>.<br><br><div class="loltitleclassic"><b>3 - Close Service</b></div><br> If you ever wish to deactivate this service, you can do the same my navigating to <a href="close-service.php">Close Service Page</a>.<br>';
        }else{
                echo "Wrong ID or Password.<br><br>";
        }
}else{ ?>
<div style="font-size: 11px; color:#000; background-color:#fff; margin:5px; padding:0px; border:1px solid #CCCCCC;" width="100%"><div class="loltitleclassic" width="100%"><center><u><strong>Settings</strong></u></center></div>
	<form method="POST">
		<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
		<input type="text" name="user" size="34" value="example@domain.com"></p>
		<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail-ID's Password</b></div><br>
		<input type="password" name="pass" size="34" value = "Password"></p>
		<p align="left">
		<div class="loltitleclassic">Your Reply Message</div></p>
		<p><input type="text" name="reply" size="50" value = "Your Reply Here! (No Captcha Content Please!)"></p>
                <p align="left"><input type="submit" value="Edit Information" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
        	<p align="left">&nbsp;</p>
	</form>
</div><br><br>
<div style="font-size: 11px; color:#000; background-color:#fff; margin:5px; padding:0px; border:1px solid #CCCCCC;" width="100%"><div class="loltitleclassic" width="100%"><center><u><strong>Change Password</strong></u></center></div>
	<form method="POST" action="change-password.php">
		<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
		<input type="text" name="user" size="34" value="example@domain.com"></p>
		<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail ID's Password</b></div><br>
		<input type="password" name="pass" size="34" value = "Password"></p>
		<p align="left"><div class="loltitleclassic"><b>Your Orkut E-mail ID's New Password</b></div><br>
		<input type="password" name="newpass" size="34" value = "NewPassword"></p>
                <p align="left">&nbsp;</p>
		<p align="left"><input type="submit" value="Change Password" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br></p>
	</form>
</div>
<?php
}
include("includes/footer.php");
?>