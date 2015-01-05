<?php
require_once("includes/header.php");
title("Auto Birthday Wisher - Close Service");
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['term'])){
        if($_POST['term'] != "i want to delete this service"){
                echo "You didn't enter the correct phrase to delete your ID. Please go back and try again.";
        }else{
                global $connection;
                $query = mysql_query("SELECT * from abw_userdata WHERE user='".$_POST['user']."'", $connection);
                while($row=mysql_fetch_array($query))
                {
                	$check=$row['user'];
                        $check2=$row['pass'];
                }
                if($check == $_POST['user'] && $check2 == $_POST['pass']){
                        mysql_query("DELETE FROM `abw_userdata` WHERE `user` = '{$_POST['user']}';", $connection);
                        mysql_query("DELETE FROM `abw_wishes` WHERE `abw_wishes`.`user` = '{$_POST['user']}';", $connection);
                        echo '<b>This Service for your account has been deactivated.<b> If you ever wish to re-activate this service, you will be required to <a href="register.php">sign up again</a>. Thanks for using this service and keep visiting Orkut Plus!';
                }else{
                        echo "Wrong ID or Password. Please go back and try again.";
                }
	}
}else{ ?>
	<form method="POST">
		<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
		<input type="text" name="user" size="34" value="example@domain.com"></p>
		<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail-ID's Password</b></div><br>
		<input type="password" name="pass" size="34" value = "Password"></p>
		<p align="left"><div class="loltitleclassic"><b>Delete Service</b></div>
		<p align="left">Please Enter "<b>i want to delete this service</b>" without quotes to deactivate this service for your account.<br><br>
		<input type="text" name="term" size="40" value = "Enter the Phrase Here"></font></p>
		<p align="left">&nbsp;</p>
		<p align="left"><input type="submit" value="Close Service" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="http://www.orkutplus.net/toolkit/auto-bday-wisher/register.php">Back to the Control Panel</a></p>
        	<p align="left">&nbsp;</p>
	</form>
        <?php
}
include("includes/footer.php");
?>