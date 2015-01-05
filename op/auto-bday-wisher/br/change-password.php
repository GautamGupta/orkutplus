<?php
require_once("includes/header.php");
title("Auto aniversário Wisher - Painel de Controle do usuário");
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
	                $query = mysql_query("SELECT * from br_userdata WHERE user='{$_POST['user']}'", $connection);
                        mysql_query("UPDATE `br_userdata` SET `pass` = '{$_POST['newpass']}' WHERE `user` = '{$_POST['user']}';", $connection);
                        echo 'Sua senha foi alterada.';
                }else{
                        echo "Nova senha está errada. Senha não pode ser mudado.";
                }
        }else{
                echo "ID ou Old senha não correspondem.";
        } 
}else{ 
?>
<script>document.location='user-panel.php';</script>
<?php
}
include("includes/footer.php");
?>