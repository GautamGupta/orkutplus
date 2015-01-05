	<style type="text/css" media="screen">
	<!--
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style-core.css);
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style.css);
		-->
	</style>

<?php
error_reporting(0);
include("../../../blog/wp-config.php");
$oldBlogURL = "orkutplus.blogspot.com";
$ref = $_SERVER['HTTP_REFERER'];
$refarr = explode("/", $ref);

	if ($refarr[2] == $oldBlogURL ){
		$bloggerurl = '\/'.$refarr[3].'\/'.$refarr[4].'\/'.$refarr[5];
		$sqlstr = "
			    SELECT wposts.guid
			    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			    WHERE wposts.ID = wpostmeta.post_id
			    AND wpostmeta.meta_key = 'blogger_permalink'
			    AND wpostmeta.meta_value = '".$bloggerurl."'
			 ";
		$wpurl = $wpdb->get_results($sqlstr, ARRAY_N);
		if ($wpurl){
			header( 'Location: '.$wpurl[0][0].' ') ;
                        exit;
		}
	}
?>

<?php include("../../../blog/wp-content/themes/op/header.php"); ?>

<div id="page_container">

<?php include("../../../blog/wp-content/themes/op/sidebar.php"); ?>
<?php include("../../../blog/wp-content/themes/op/leftbar.php"); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
			<div class="rbcontent">

<div id="postcol" class="fixheight">
 <?php $adcount = 1; ?>
<div class="post_title">
<h2 id="post-scrapallbr" class="title"><a href="http://orkutplus.net/toolkit/scrapall/br" rel="bookmark">[PHP]&nbsp;Scrap All - Super Fast and Hassle Free. (For Brazillians)</a></h2>
<small class="title">Escrito por <a href="http://www.orkutplus.net/about"><REDACTED></a></a></small>
<div class="content"><p>Sucatas todos os nossos amigos e uma maneira muito eficiente de enviar recados para todos os seus
seus amigos de maneira rapida e facil. Use o nosso recado para todos ou enviar saudacoes
alertas importantes ou de qualquer coisa. E vale lembrar - e propaganda
livre. Por favor, consulte esta <a href="http://www.orkutplus.net/2008/09/scrap-all-friends.html">
postagem </a> para o tutorial e ajuda.</p></div>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
   </div>
<div class="content">
	<div style="padding-left:0px; padding-top:15px">
<?php
if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['scrap']))
{
        set_time_limit(0);
        require('class.XMLHttpRequest.php');
        $req = new XMLHttpRequest();
        $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['email']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false");
        $req->send(null);
        preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
        $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
        $req->send(null);
        preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
        if ($orkut_state[0] != NULL)
        {
                $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
                $req->setRequestHeader("Cookie",$orkut_state[0]);
                $req->send(null);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
                $abc = urlencode($lol[0][1]);
                $abc1 = urlencode($lol1[0][1]);
                $req->open("GET","http://www.orkut.com/Friends.aspx");
                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                $req->send(null);
                preg_match("/mostrando\ \<B\>1\-20\<\/b\>\ de\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
                $pgs = $pgs[1];
                if($_POST['frndchk'] == 1){
                        echo "Foi para a sucata: <br /><table border=0>";
                        $pgs = $pgs/20;
                        $pgs = ceil($pgs);
                        for($a=1;$a<=$pgs;$a++)
                        {
                                $req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a);
                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                $req->send(null);
                                $ts = $req->responseText;
                                preg_match_all('/<img src="(.*?)" class="listimg"  ><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>/i',$ts,$frnd,PREG_SET_ORDER);
                                for($y=0;$y<=sizeof($frnd);$y++)
                                {
                                        if($frnd[$y][2] != NULL){
                                                $scrap = urlencode(str_replace("%NAME%", $frnd[$y][3], $_POST['scrap'])."<br /><br /></font>[silver]".date("H:i:s"));
                                                $req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]);
                                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                                $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".$scrap."&uid=".$frnd[$y][2]);
                                                echo "<tr><td><a href='http://www.orkut.com/Scrapbook.aspx?uid={$frnd[$y][2]}'><img src='{$frnd[$y][1]}'></a></td><td><p><a href='http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]."'>".$frnd[$y][3]."</a></p><p>".$frnd[$y][4]."</p><hr></td></tr>";
                                                if(isset($_POST['interval'])){
                                                        sleep($_POST['interval']);
                                                }else{
                                                        sleep(1);
                                                }
                                        }
                                }
                                echo "</table>";
                        }
                }elseif($_POST['frndchk'] == 3){
                        echo "Foi para a sucata: <br /><table border=0>";
                        $scd = 0;
                        $limit = $_POST['limit'];
                        $pgs = $limit/20;
                        $pgs = ceil($pgs);
                        for($a=1;$a<=$pgs;$a++)
                        {
                                $req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a);
                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                $req->send(null);
                                $ts = $req->responseText;
                                preg_match_all('/<img src="(.*?)" class="listimg"  ><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>/i',$ts,$frnd,PREG_SET_ORDER);
                                $sfrnd = sizeof($frnd);
                                for($y=0;$y<=$sfrnd;$y++)
                                {
                                        $scd += 1;
                                        if($scd <= $limit){
                                                if($frnd[$y][2] != NULL){
                                                        $scrap = urlencode(str_replace("%NAME%", $frnd[$y][3], $_POST['scrap'])."<br /><br /></font>[silver]".date("H:i:s"));
                                                        $req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]);
                                                        $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                        $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                                        $req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".$scrap."&uid=".$frnd[$y][2]);
                                                        echo "<tr><td><a href='http://www.orkut.com/Scrapbook.aspx?uid={$frnd[$y][2]}'><img src='{$frnd[$y][1]}'></a></td><td><p><a href='http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]."'>".$frnd[$y][3]."</a></p><p>".$frnd[$y][4]."</p><hr></td></tr>";
                                                        if(isset($_POST['interval'])){
                                                                sleep($_POST['interval']);
                                                        }else{
                                                                sleep(1);
                                                        }
                                                }
                                        }else{
                                                break;
                                        }
                                }
                                if($scd > $limit){
                                        break;
                                }
                                echo "</table>";
                        }
                }elseif($_POST['frndchk'] == 2){
                        echo '<form method="POST" action="scrap-all-sel-brazil.php"><p>Check the Friends to send the Scrap:</p><table border=0>';
                        $pgs = $pgs/20;
                        $pgs = ceil($pgs);
                        for($a=1;$a<=$pgs;$a++)
                        {
                                $req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a);
                                $req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                $req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
                                $req->send(null);
                                $ts = $req->responseText;
                                preg_match_all('/<img src="(.*?)" class="listimg"  ><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>/i',$ts,$frnd,PREG_SET_ORDER);
                                $sfrnd = sizeof($frnd);
                                for($y=0;$y<=$sfrnd;$y++)
                                {
                                        if($frnd[$y][2] != NULL){
                                                echo "<tr><td><a href='http://www.orkut.com/Scrapbook.aspx?uid={$frnd[$y][2]}'><img src='{$frnd[$y][1]}'></a></td><td><p><a href='http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]."'>".$frnd[$y][3]."</a></p><p><input type='checkbox' name='{$frnd[$y][2]}'>&nbsp;Amigo esse Scrap.</p><hr></td></tr>";
                                        }
                                }
                        }
                        echo '</table><input type="hidden" name="email" value="'.$_POST['email'].'"><input name="pass" type="hidden" value="'.$_POST['pass'].'"><input name="scrap" type="hidden" value="'.urlencode($_POST['scrap']).'">';
                        if(isset($_POST['interval'])){
                                echo '<input type="hidden" name="interval" value="'.$_POST['interval'].'">';
                        }
                        echo '<input type="submit" value="Sucata selecionada Amigos!"></form>';
                }
        }else{
                echo "ID do e-mail nao Trabalho.<br />";
        }
}else{
?>
<form method="POST">
	<div class="loltitleclassic"><b>Seu e-mail ID do orkut</b></div>
	<p><input type="text" name="email" size="40" value="Nome de usuario"></p>
	<div class="loltitleclassic"><b>Senha</b></div>
	<p><input type="password" name="pass" size="40" value = "Senha"></p>
	<div class="loltitleclassic"><b>Intervalo de tempo entre Recados</b></div>
	<p><input type="text" name="interval" size="8" value = ""> (em segundos) (opcional) </p>
        <div class="loltitleclassic"><b>Para sucata</b></div>
	<p><input type="radio" checked="true" name="frndchk" value="1">Todos os amigos<br />
        <input type="radio" name="frndchk" value="2">Selecionado Friends<br />
        <input type="radio" name="frndchk" value="3">Limitado Amigos: <input type="text" name="limit" size="7" value = "50"> (A partir do Amigo na Primeira Pagina Amigos localizado na barra superior.)</p>
	<div class="loltitleclassic"><b>Seu recado - Nao captcha conteudo por favor</b></div>
	<p><textarea rows="4" name="scrap" cols="40">Oi, %NAME%. Eu queria te dizer que [b][blue][u]ht[b]tp://ww[b]w.orkutplus.[b]net/[/u][/blue][/b] Rocks! [:D]</textarea></p>
        <p align="left">Subsitutes voce pode usar em recados: <strong>%NAME%</strong> para Nome do amigo no Scrap.</p>
        <div class="loltitleclassic"><b>Link De-Captchaphy</b></div>
        <p>Pode-De Captchaphy os links e cola-los em seu recado. Isto ira prevenir que o ID de virada Captcha. <b>Observacao:</b> Isso nao ira permitir que voce postar imagens / Flash Captcha ou outros conteudos a serem destacados. Apenas Links.</p>
        <iframe src="De-Captchaphy-brazil.php"frameborder="0" scrolling="no" width="100%" height="80px"></iframe>
        <p align="left"><input type="submit" value="Todas as sucatas!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p></div>
</form>
	<?php } ?>
		<?php if ($adcount == 1) : ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>
&nbsp;&nbsp;&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<div class="loltitleclassic"><b>Nota Importante</b></div>
<p>Nos nao armazenamos as informacoes da sua conta em qualquer lugar em todos os amigos Sucata. Por favor, leia nossa Politica de Privacidade <a href="http://www.orkutplus.net/privacy-policy">Politica de privacidade</a> e os nossos <a href="http://www.orkutplus.net/disclaimer">Retratacao</ a>, se voce tiver duvidas ou preocupacoes.</p>
<div class="loltitleclassic"><b>Veja outras ferramentas atraves do Orkut Plus!</b></div>
<p>Nos estamos adicionando novas ferramentas de vez em quando no nosso <a href="http://www.orkutplus.net/orkut-toolkit">Jornal Toolkit Orkut</ a>. Por favor, va ata <a href="http://www.orkutplus.net/orkut-toolkit">esta pagina</a> para ver as outras ferramentas.</p><br>
<?php endif; $adcount++; ?>
<?php $adcount++; ?>
<div style="clear: both"></div></div></div>
</div></div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
</div> <!-- close page container-->
<?php include("../../../blog/wp-content/themes/op/footer.php"); ?>
