<?php
require_once("includes/header.php");
title("Auto Birthday Wisher - View Wishes");
if(isset($_POST['user']) && isset($_POST['pass'])){
        global $connection;
        $query = mysql_query("SELECT * from userdata WHERE user='".$_POST['user']."'", $connection);
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
        }
        if($check == $_POST['user'] && $check2==$_POST['pass']){
		$query = mysql_query("SELECT * from wishes WHERE user='".$_POST['user']."'", $connection);
                $s = "0";
		while($row=mysql_fetch_array($query))
		{
			$s++;
		     	echo "<p>A wish was posted to UID - <a href='http://www.orkut.com/Scrapbook.aspx?uid=".$row['uid']."'>".$row['uid']."</a> on his/her Birthday!</p><hr><br>";
		}
                if($s<=0){
                        echo "No Wishes found. Auto Birthday Wisher has not Scrapped any wish to any person till now.<br><br>";
                }
        }else{
		echo "Wrong ID or Password.";
        } 
}else{ ?>
	<form method="POST">
		<p align="left"><div class="loltitleclassic"><b>Your Orkut Email-ID</b></div><br>
		<input type="text" name="user" size="34" value="example@domain.com"></p>
		<p align="left"><div class="loltitleclassic"><b>Your Orkut E-Mail ID's Password</b></div><br>
		<input type="password" name="pass" size="34" value = "Password"></font></p>
                <p align="left">&nbsp;</p>
		<p align="left"><input type="submit" value="View Wishes!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br></p>
        </form>
        <?php
}
include("includes/footer.php");
?>