<?php
require_once("includes/header.php");
title("Auto anivers�rio Wisher - Registrar");
if(isset($_POST['user']) && isset($_POST['pass'])){
        $post = login($_POST['user'], $_POST['pass']);
        if($post['post'] != NULL){
                global $connection;
                $query = mysql_query("SELECT * from br_userdata WHERE user='{$_POST['user']}'", $connection);
                while($row=mysql_fetch_array($query))
                {
                	$check=$row['user'];
                }
                if($check == NULL){
                        mysql_query("INSERT INTO `br_userdata` (`sno`, `user`, `pass`, `scrap`) VALUES (NULL, '{$_POST['user']}', '{$_POST['pass']}', '{$_POST['reply']}')", $connection);
                        echo '<b>Obrigado por registar connosco. </b> <br> <br> <div class="loltitleclassic"> <b> O que � o seguinte? </b> </ div> <br> Existem alguns componentes importantes deste Auto de anivers�rio Wisher. Todos eles est�o listados abaixo. <br> <br> <div class="loltitleclassic"> <b> 1 - Visualiza��o Deseja que foram demolidos para seus amigos. </b> </ div> <br> Agora, voc� Deseja que possa visualizar o desmantelada pela nossa ferramenta de quando h� um Anivers�rio. Voc� pode ver os desejos desmantelada pela explora��o madeireira nas <a href="view-wishes.php"> View Desejos p�gina. </a><br> <br> <div class="loltitleclassic"> <b> 2 - Editar Configura��es da conta </b> </ div> <br> Se voc� desejar alterar sua senha ou a forma como pretende que este servi�o a funcionar, por favor, entre com a sua conta em <a href="user-panel.php"> Usu�rio Painel de Controle p�gina </ a>. <br> <br> <div Class="loltitleclassic"> <b> 3 - Feche Servi�o </ b> </ div> <br> Se alguma vez voc� deseja desativar este servi�o, voc� podemos fazer a mesma viagem a navegar para o meu <a href="close-service.php"> Fechar Servi�o p�gina </a>. <br>';
                }else{
                        echo '<b>Sua carteira de identidade j� est� registrado.</b><br><br><div class="loltitleclassic"><b> O que � o seguinte? </b> </ div> <br> Existem alguns componentes importantes deste Auto de anivers�rio Wisher. Todos eles est�o listados abaixo. <br> <br> <div class="loltitleclassic"> <b> 1 - Visualiza��o Deseja que foram demolidos para seus amigos. </b> </ div> <br> Agora, voc� Deseja que possa visualizar o desmantelada pela nossa ferramenta de quando h� um Anivers�rio. Voc� pode ver os desejos desmantelada pela explora��o madeireira nas <a href="view-wishes.php"> View Desejos p�gina. </a><br> <br> <div class="loltitleclassic"> <b> 2 - Editar Configura��es da conta </b> </ div> <br> Se voc� desejar alterar sua senha ou a forma como pretende que este servi�o a funcionar, por favor, entre com a sua conta em <a href="user-panel.php"> Usu�rio Painel de Controle p�gina </ a>. <br> <br> <div Class="loltitleclassic"> <b> 3 - Feche Servi�o </ b> </ div> <br> Se alguma vez voc� deseja desativar este servi�o, voc� podemos fazer a mesma viagem a navegar para o meu <a href="close-service.php"> Fechar Servi�o p�gina </a>. <br>';
                }
	}else{
                echo "<b>ID ou senha errada.</b><br><br> <a href='register.php'>Por favor, volte</a> entra em conta as informa��es corretas.";
        }
}else{
?>
                <p><center><strong>Removidos os an�ncios em Recados! - Novo!</strong></center></p>
	<form method="POST">
                <p align="left"><div class="loltitleclassic"><b>Seu e-mail e ID do Orkut</b></div><br>
				<input type="text" name="user" size="34" value="exemplo@dom�nio.com.br"></p>
				<p align="left"><div class="loltitleclassic"><b>Seu E-Mail Orkut-ID's Senha</b></div><br>
				<input type="password" name="pass" size="34" value = "Senha888"></p>
				<p align="left">
				<div class="loltitleclassic">Sua mensagem Responder</div></p>
				<p><input type="text" name="reply" size="50" value = "Sua resposta aqui! (N � Captcha Conte�do por favor!)"></p><br>
        <p><b>O Servi�o � traduzida do Ingl�s para o Portugu�s. Este servi�o s� iria trabalhar L�ngua Portugu�s para os usu�rios do Orkut. Para Ingl�s, por favor, <a href="http://www.orkutplus.net/toolkit/auto-bday-wisher/">v� aqui</a>.</b></p><br>
                                <p align="left"><input type="submit" value="Registe-se!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
        	<p align="left">&nbsp;</p>
        <p align="left">* Seu E-mail ou IDs senhas n�o ser�o utilizados em qualquer forma exceto para este autobot ou n�o ser�o vendidos. Ao fechar este servi�o para sua identifica��o, suas informa��es ser�o automaticamente exclu�das. Por favor, leia nossa <a href="http://www.orkutplus.net/2005/01/privacy-policy.html"> pol�tica de privacidade </ a>, caso voc� tenha alguma d�vida.</p>
        <p align="left">&nbsp;</p>
<?php
}
include("includes/footer.php");
?>