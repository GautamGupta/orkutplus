<?php
require_once("includes/header.php");
title("Auto Birthday Wisher - Register");
if(isset($_POST['user']) && isset($_POST['pass'])){
        $post = login($_POST['user'], $_POST['pass']);
        if($post['post'] != NULL){
                global $connection;
                $query = mysql_query("SELECT * from userdata WHERE user='{$_POST['user']}'", $connection);
                while($row=mysql_fetch_array($query))
                {
                	$check=$row['user'];
                }
                if($check == NULL){
                        mysql_query("INSERT INTO `userdata` (`sno`, `user`, `pass`, `scrap`) VALUES (NULL, '{$_POST['user']}', '{$_POST['pass']}', '{$_POST['reply']}')", $connection);
                        echo '<b>Thanks for registering with us.</b><br><br><div class="loltitleclassic"><b>Whats Next?</b></div><br>There are some important components of this Auto Birthday Wisher. All of them are listed below.<br><br><div class="loltitleclassic"><b>1 - Viewing Wishes that have been Scrapped to your Friends.</b></div><br> Now, you can view the Wishes scrapped by our Tool when there is a Birthday. You can view the wishes scrapped by logging in to <a href="view-wishes.php">View Wishes Page.</a><br><br><div class="loltitleclassic"><b>2 - Edit Account Settings</b></div><br> If you wish to change your password or the way you want this service to work, please log in with your account on <a href="user-panel.php">User Control Panel Page</a>.<br><br><div class="loltitleclassic"><b>3 - Close Service</b></div><br> If you ever wish to deactivate this service, you can do the same my navigating to <a href="close-service.php">Close Service Page</a>.<br>';
                }else{
                        echo '<b>Your ID is already registered.</b><br><br><div class="loltitleclassic"><b>Whats Next?</b></div><br>There are some important components of this Auto Birthday Wisher. All of them are listed below.<br><br><div class="loltitleclassic"><b>1 - Viewing Wishes that have been Scrapped to your Friends.</b></div><br> Now, you can view the Wishes scrapped by our Tool when there is a Birthday. You can view the wishes scrapped by logging in to <a href="view-wishes.php">View Wishes Page.</a><br><br><div class="loltitleclassic"><b>2 - Edit Account Settings</b></div><br> If you wish to change your password or the way you want this service to work, please log in with your account on <a href="user-panel.php">User Control Panel Page</a>.<br><br><div class="loltitleclassic"><b>3 - Close Service</b></div><br> If you ever wish to deactivate this service, you can do the same my navigating to <a href="close-service.php">Close Service Page</a>.<br>';
                }
	}else{
                echo "<b>Wrong ID or Password.</b><br><br> <a href='register.php'>Please Go Back</a> and enter correct account information.";
        }
}else{
?>
                <p><center><strong>Ads Removed in Scraps! - New!</strong></center></p>
	<form method="POST">
                <p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
				<input type="text" name="user" size="34" value="example@domain.com"></p>
				<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail-ID's Password</b></div><br>
				<input type="password" name="pass" size="34" value = "Password"></p>
				<p align="left">
				<div class="loltitleclassic">Your Reply Message</div></p>
				<p><input type="text" name="reply" size="50" value = "Your Reply Here! (No Captcha Content Please!)"></p><br>
        <p><b>The Service would only work for those People who use English as their Language on Orkut.</b></p><br>
                                <p align="left"><input type="submit" value="Register!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
        	<p align="left">&nbsp;</p>
        <p align="left">* Your E-Mail IDs or Passwords will not be used in anyway except for this autobot or will not be sold. When you close this service for your ID, your information will automatically be deleted. Please read our <a href="http://www.orkutplus.net/privacy-policy</a> if you have any questions. </p>
        <p align="left">&nbsp;</p>
<?php
}
include("includes/footer.php");
?>