<?php
require_once("includes/header.php");
title("Auto aniversário Wisher - View desejos");
if(isset($_POST['user']) && isset($_POST['pass'])){
        global $connection;
        $query = mysql_query("SELECT * from br_userdata WHERE user='".$_POST['user']."'", $connection);
        while($row=mysql_fetch_array($query))
        {
             	$check=$row['user'];
                $check2=$row['pass'];
        }
        if($check == $_POST['user'] && $check2==$_POST['pass']){
		$query = mysql_query("SELECT * from br_wishes WHERE user='".$_POST['user']."'", $connection);
                $s = "0";
		while($row=mysql_fetch_array($query))
		{
			$s++;
		     	echo "<p>Um desejo foi postada em UID - <a href='http://www.orkut.com/Scrapbook.aspx?uid=".$row['uid']."'>". $_row['uid'] . "</a> em seu aniversário! </p> <hr> <br>";
		}
                if($s<=0){
                        echo "Desejos nenhum foi encontrado. Auto Aniversário Wisher desmantelada não tem nenhum desejo de qualquer pessoa até agora.<br><br>";
                }
        }else{
		echo "<b>ID ou senha errada.</b><br><br>";
        } 
}else{ ?>
	<form method="POST">
		<p align="left"><div class="loltitleclassic"><b>Seu e-mail e ID do Orkut</b></div><br>
				<p align="left"><div class="loltitleclassic"><b>Seu E-Mail Orkut-ID's Senha</b></div><br>
				<input type="password" name="pass" size="34" value = "Senha888"></p>
				<p align="left"><div class="loltitleclassic"><b>Seu E-mail do Orkut ID's New Password</b></div><br>
		<input type="password" name="newpass" size="34" value = "Senha888"></p>
                <p align="left">&nbsp;</p>
		<p align="left"><input type="submit" value="View desejos!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br></p>
        </form>
        <?php
}
include("includes/footer.php");
?>