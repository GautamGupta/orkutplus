<?php
session_start();
$pg_title = "Scrap All Deluxe v2.0 - Super Fast and Hassle Free!";
require_once("../includes/connection.php");
require_once("../includes/theme/functions.php");
include("../includes/theme/header.php");
?>
<div id="container">
<div id="left-div">
<div id="left-inside">
<div class="home-post-wrap2">
<h2 class="titles"><a href="<?php echo current_url(); ?>"><?php echo $pg_title; ?></a></h2>
<div class="post-info" style="width: 480px !important;">Advertisement</div>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu post top 336x280, created 5/26/09 */
google_ad_slot = "9944513892";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
<div style="clear:both;"></div>
<p>Sucatas todos os nossos amigos e uma maneira muito eficiente de enviar recados para todos os seus amigos de maneira rapida e facil. Use o nosso recado para todos ou enviar saudacoes alertas importantes ou de qualquer coisa. E vale lembrar - e propaganda livre. Por favor, consulte esta <a href="http://www.orkutplus.net/2008/09/scrap-all-friends.html">postagem</a> para o tutorial e ajuda.</p>
<?php
if(($_POST['email'] != NULL && $_POST['pass'] != NULL && $_POST['scrap'] != NULL) || ($_SESSION['c'] == 1 && $_SESSION['ocookie'] != NULL && $_SESSION['scrap'] != NULL && $_POST['cs'] != NULL))
{
	set_time_limit(0);
	load_curl();
	$req = new XMLHttpRequest();
	if($_SESSION['c'] != 1){
		$c_email = $_POST['email'];
		$pass = $_POST['pass'];
		$user_inf = orkut_login($c_email, $pass);
	}else{
		$user_inf = orkut_details_via_cookie($_SESSION['ocookie']);
	}
	if ($user_inf['ud_post_token'] != NULL)
	{
		if($_SESSION['c'] != 1)
		{
			$_SESSION['frndchk'] = $_POST['frndchk'];
			$_SESSION['ocookie'] = $user_inf['cookie'];
			$_SESSION['scrap'] = $_POST['scrap'];
			if(isset($_POST['interval'])){
				$_SESSION['interval'] = $_POST['interval'];
			}else{
				$_SESSION['interval'] = 1;
			}
			$req->open("GET","http://www.orkut.com/ShowFriends.aspx");
			$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
			$req->send(null);
			preg_match("/mostrando\ \<B\>1\-20\<\/b\>\ de\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs);
			$pgs = ceil($pgs[1]/20);
			$user_friends = array();
			for($pgloop=1;$pgloop<=$pgs;$pgloop++)
			{
				$req->open("GET","http://www.orkut.com/ShowFriends.aspx?show=all&pno=".$pgloop);
				$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
				$req->send(null);
				$ts = $req->responseText;
				$ts = str_replace(' class="listimg"  ', '', $ts);
				$ts = str_replace(' class="listimg"', '', $ts);
				$ts = str_replace('<imgsrc', '<img src', $ts);
				preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER);
				for($frndloop=0;$frndloop<=sizeof($frnd);$frndloop++){
					if($frnd[$frndloop][2] != NULL){
						$user_friend = array();
						$user_friend['uid'] = $frnd[$frndloop][2];
						$user_friend['name'] = $frnd[$frndloop][3];
						$user_friend['dp'] = $frnd[$frndloop][1];
						$user_friend['extra'] = $frnd[$frndloop][4];
						$user_friends[] = $user_friend;
					}
				}
			}
			$_SESSION['user_friends'] = $user_friends;
		}else{
			$user_friends = $_SESSION['user_friends'];
		}
		if($_POST['frndchk'] == 2){
			echo '<form method="post" action="scrap-all-sel.php"><p>Verifique a lista de amigos para enviar o recado:</p><table border=0 width=\'100%\'>';
				for($scraploop=0;$scraploop<=sizeof($user_friends);$scraploop++)
				{
					if($user_friends[$scraploop]['uid'] != NULL){
						if(($scraploop % 2)==0){
							//even
							echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p><input type="checkbox" name="'.$user_friends[$scraploop]['uid'].'">&nbsp;Amigo esse Scrap.</p></td></tr>';
						}else{
							//odd
							echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p><input type="checkbox" name="'.$user_friends[$scraploop]['uid'].'">&nbsp;Amigo esse Scrap.</p></td></tr>';
						}
					}
				}
			echo '</table><p align="center"><input type="submit" value="Sucata selecionada Amigos!"></p></form>';
			include("../../includes/notice.php");
			echo '<div style="clear:both;"></div></div></div></div>';
			include("../../includes/theme/sidebar.php");
			include("../../includes/theme/footer.php");
			exit;
		}else{
			if($_SESSION['c'] == 1){
				$tloop = $_SESSION['scraploop'];
				if($_SESSION['frndchk'] == 3)
				{
					$limit = $_SESSION['limit'];
				}else{
					$limit = sizeof($user_friends);
				}
			}else{
				$tloop = 0;
				if($_POST['frndchk'] == 3)
				{
					$limit = $_POST['limit'] - 1;
				}else{
					$limit = sizeof($user_friends);
				}
			}
			$_SESSION['limit'] = $limit;
			echo "<table border=0 width=\"100%\">";
			for($scraploop=$tloop;$scraploop<=$limit;$scraploop++)
			{
				if($user_friends[$scraploop]['uid'] != NULL){
					$cs = null;
					if($_SESSION['c'] == 1){
						$cs = "&cs=".$_POST['cs'];
						$_SESSION['c'] = 0;
					}
					$scrap = urlencode(str_replace("%NAME%", $user_friends[$scraploop]['name'], $_SESSION['scrap'])."<br /><br /></font>[silver]".date("H:i:s"));
					$req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$user_friends[$scraploop]['uid']);
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$_SESSION['ocookie']);
					$req->send("POST_TOKEN=".$user_inf['post_token']."&signature=".$user_inf['signature']."&&Action.submit=1&scrapText=".$scrap."&uid=".$user_friends[$scraploop]['uid'].$cs);
					preg_match('/src\=\"\/CaptchaImage\.aspx\?xid\=(.*?)\"\ /i', $req->responseText, $xid);
					if($xid[1] != NULL)
					{
						//captcha faced
						$_SESSION['scraploop'] = $scraploop;
						$_SESSION['c'] = 1;
						if(($scraploop % 2)==0){ //if statement for design html output
							//even
							echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p align="center"><u>Captcha Face. Digite o Captcha abaixo para enviar o recado.</u></p><br />';
						}else{
							//odd
							echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p align="center"><u>Captcha Face. Digite o Captcha abaixo para enviar o recado.</u></p><br />';
						}
						echo "<center><form method=\"post\" name=\"csform\">
<img src=\"http://toolkit.orkutplus.net/captcha.php?xid=".$xid[1]."\" onload=\"document.getElementById('cs').focus();\"><br />
<p><input type=\"text\" name=\"cs\" id=\"cs\" maxlength=\"10\"></p>
<p><input type=\"submit\" name=\"submit\" value=\"Submit\"></p>
</form></center></td></tr></table><br />";
						include("../../includes/notice.php");
						echo '<div style="clear:both;"></div></div></div></div>';
						include("../../includes/theme/sidebar.php");
						include("../../includes/theme/footer.php");
						exit;
					}else{
						if(trim($req->responseText) == "ok"){
							$output = "Sucata Enviadas!";
						}else{
							$output = trim(strip_tags(trim($req->responseText)));
						}
						if(($scraploop % 2)==0){ //if statement for design html output
							//even
							echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p align="center"><u>'.$output.'</u></p></td></tr>';
						}else{
							//odd
							echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'"><img src="'.$user_friends[$scraploop]['dp'].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Scrapbook.aspx?uid='.$user_friends[$scraploop]['uid'].'">'.$user_friends[$scraploop]['name'].'</a></p><p align="center">'.$user_friends[$scraploop]['extra'].'</p><p align="center"><u>'.$output.'</u></p></td></tr>';
						}
						sleep($_SESSION['interval']);
					}
				}
				flush();
			}
		}
		echo "</table><br />";
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		session_destroy();
	}else{
		echo "ID do e-mail nao Trabalho.<br />";
	}
}else{
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
?>
<form method="POST">
	<div class="loltitleclassic"><b>Seu e-mail ID do orkut</b></div>
	<p><input type="text" name="email" style="width:99.2%;" value="Nome de usuario"></p>
	<div class="loltitleclassic"><b>Senha</b></div>
	<p><input type="password" name="pass" style="width:99.2%;" value = "Senha"></p>
	<div class="loltitleclassic"><b>Intervalo de tempo entre Recados - Default is 1 (em segundos) (opcional)</b></div>
	<p><input type="text" name="interval" style="width:99.2%;" value="1"></p>
	<div class="loltitleclassic"><b>Para sucata</b></div>
	<p><input type="radio" checked="true" name="frndchk" value="1">Todos os amigos<br />
	<input type="radio" name="frndchk" value="2">Selecionado Friends<br />
	<input type="radio" name="frndchk" value="3">Limitado Amigos: <input type="text" name="limit" size="7" value = "50"> (A partir do Amigo na Primeira Pagina Amigos localizado na barra superior.)</p>
	<div class="loltitleclassic"><b>Seu Sucata - Captcha conteudo permitidas, mas voce tera que introduzi-la quando demonstrado</b></div>
	<p><textarea rows="5" name="scrap" style="width:99.2%;">Oi, %NAME%. [:D]</textarea></p>
	<p align="left">Subsitutes voce pode usar em recados: <strong>%NAME%</strong> para Nome do amigo no Scrap.</p>
	<div class="loltitleclassic"><b>Link De-Captchaphy</b></div>
	<p>Pode-De Captchaphy as ligacoes e cola-los em seu recado. Isto ira prevenir que o ID de virada Captcha.</p>
	<iframe src="De-Captchaphy.php" frameborder="0" scrolling="no" width="100%" height="80px"></iframe>
	<p align="left"><input type="submit" value="Todas as sucatas!" name="submit">&nbsp;<input type="reset" value="Reset" name="B2"></p>
</form>
<?php
}
include("../includes/notice.php");
?>
<div style="clear:both;"></div>
</div>
</div>
</div>
<?php
include("../includes/theme/sidebar.php");
include("../includes/theme/footer.php");
?>