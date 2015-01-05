<?php
require_once("includes/header.php");
title("Auto Birthday Wisher - Fechar Serviço");
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['term'])){
        if($_POST['term'] != "i deseja excluir este serviço"){
                echo "Você não inseriu a frase correta para eliminar o seu ID. Volte e tente novamente.";
        }else{
                global $connection;
                $query = mysql_query("SELECT * from br_userdata WHERE user='".$_POST['user']."'", $connection);
                while($row=mysql_fetch_array($query))
                {
                	$check=$row['user'];
                        $check2=$row['pass'];
                }
                if($check == $_POST['user'] && $check2 == $_POST['pass']){
                        mysql_query("DELETE FROM `br_userdata` WHERE `user` = '{$_POST['user']}';", $connection);
                        mysql_query("DELETE FROM `br_wishes` WHERE `user` = '{$_POST['user']}';", $connection);
                        echo '<b>Este serviço para sua conta foi desativada. <b> Se alguma vez você deseja reativar esse serviço, você será obrigado a <a href="register.php"> inscrever-se novamente </a>. Obrigado por usar este serviço e manter a visitar o Orkut Plus!';
                }else{
                        echo "ID ou senha errada. Volte e tente novamente.";
                }
	}
}else{ ?>
	<form method="POST">
		<p align="left"><div class="loltitleclassic"><b>Seu e-mail e ID do Orkut</b></div><br>
				<p align="left"><div class="loltitleclassic"><b>Seu E-Mail Orkut-ID's Senha</b></div><br>
				<input type="password" name="pass" size="34" value = "Senha888"></p>
				<p align="left"><div class="loltitleclassic"><b>Seu E-mail do Orkut ID's New Password</b></div><br>
		<input type="password" name="newpass" size="34" value = "Senha888"></p>
		<p align="left"><div class="loltitleclassic"><b>Fechar Serviço</b></div>
		<p align="left">Escreva por favor "<b>i deseja excluir este serviço</b>" sem aspas para desactivar este serviço para sua conta.<br><br>
		<input type="text" name="term" size="40" value = "Digite aqui a frase"></font></p>
		<p align="left">&nbsp;</p>
		<p align="left"><input type="submit" value="Fechar Serviço" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"><br><br><a href="register.php">Back</a></p>
        	<p align="left">&nbsp;</p>
	</form>
        <?php
}
include("includes/footer.php");
?>