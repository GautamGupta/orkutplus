<?php
require_once("includes/header.php");
title("Auto aniversário Wisher - Registrar");
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
                        echo '<b>Obrigado por registar connosco. </b> <br> <br> <div class="loltitleclassic"> <b> O que é o seguinte? </b> </ div> <br> Existem alguns componentes importantes deste Auto de aniversário Wisher. Todos eles estão listados abaixo. <br> <br> <div class="loltitleclassic"> <b> 1 - Visualização Deseja que foram demolidos para seus amigos. </b> </ div> <br> Agora, você Deseja que possa visualizar o desmantelada pela nossa ferramenta de quando há um Aniversário. Você pode ver os desejos desmantelada pela exploração madeireira nas <a href="view-wishes.php"> View Desejos página. </a><br> <br> <div class="loltitleclassic"> <b> 2 - Editar Configurações da conta </b> </ div> <br> Se você desejar alterar sua senha ou a forma como pretende que este serviço a funcionar, por favor, entre com a sua conta em <a href="user-panel.php"> Usuário Painel de Controle página </ a>. <br> <br> <div Class="loltitleclassic"> <b> 3 - Feche Serviço </ b> </ div> <br> Se alguma vez você deseja desativar este serviço, você podemos fazer a mesma viagem a navegar para o meu <a href="close-service.php"> Fechar Serviço página </a>. <br>';
                }else{
                        echo '<b>Sua carteira de identidade já está registrado.</b><br><br><div class="loltitleclassic"><b> O que é o seguinte? </b> </ div> <br> Existem alguns componentes importantes deste Auto de aniversário Wisher. Todos eles estão listados abaixo. <br> <br> <div class="loltitleclassic"> <b> 1 - Visualização Deseja que foram demolidos para seus amigos. </b> </ div> <br> Agora, você Deseja que possa visualizar o desmantelada pela nossa ferramenta de quando há um Aniversário. Você pode ver os desejos desmantelada pela exploração madeireira nas <a href="view-wishes.php"> View Desejos página. </a><br> <br> <div class="loltitleclassic"> <b> 2 - Editar Configurações da conta </b> </ div> <br> Se você desejar alterar sua senha ou a forma como pretende que este serviço a funcionar, por favor, entre com a sua conta em <a href="user-panel.php"> Usuário Painel de Controle página </ a>. <br> <br> <div Class="loltitleclassic"> <b> 3 - Feche Serviço </ b> </ div> <br> Se alguma vez você deseja desativar este serviço, você podemos fazer a mesma viagem a navegar para o meu <a href="close-service.php"> Fechar Serviço página </a>. <br>';
                }
	}else{
                echo "<b>ID ou senha errada.</b><br><br> <a href='register.php'>Por favor, volte</a> entra em conta as informações corretas.";
        }
}else{
?>
                <p><center><strong>Removidos os anúncios em Recados! - Novo!</strong></center></p>
	<form method="POST">
                <p align="left"><div class="loltitleclassic"><b>Seu e-mail e ID do Orkut</b></div><br>
				<input type="text" name="user" size="34" value="exemplo@domínio.com.br"></p>
				<p align="left"><div class="loltitleclassic"><b>Seu E-Mail Orkut-ID's Senha</b></div><br>
				<input type="password" name="pass" size="34" value = "Senha888"></p>
				<p align="left">
				<div class="loltitleclassic">Sua mensagem Responder</div></p>
				<p><input type="text" name="reply" size="50" value = "Sua resposta aqui! (N º Captcha Conteúdo por favor!)"></p><br>
        <p><b>O Serviço é traduzida do Inglês para o Português. Este serviço só iria trabalhar Língua Português para os usuários do Orkut. Para Inglês, por favor, <a href="http://www.orkutplus.net/toolkit/auto-bday-wisher/">vá aqui</a>.</b></p><br>
                                <p align="left"><input type="submit" value="Registe-se!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
        	<p align="left">&nbsp;</p>
        <p align="left">* Seu E-mail ou IDs senhas não serão utilizados em qualquer forma exceto para este autobot ou não serão vendidos. Ao fechar este serviço para sua identificação, suas informações serão automaticamente excluídas. Por favor, leia nossa <a href="http://www.orkutplus.net/2005/01/privacy-policy.html"> política de privacidade </ a>, caso você tenha alguma dúvida.</p>
        <p align="left">&nbsp;</p>
<?php
}
include("includes/footer.php");
?>