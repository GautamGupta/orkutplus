<style type="text/css">
body{
	margin: 0;
	padding: 0;
	font-family: Verdana, Geneva, Arial, Sans-Serif;
	font-size: 62.5%;
}
</style>
<?php
if(isset($_POST['link'])){
	$lnk = $_POST['link'];
	$lnk = "[b][blue][u]".$lnk."[/u][/blue][/b]";
	$lnk = str_replace("http://", "ht[b]tp://", $lnk);
	$lnk = str_replace("www", "ww[b]w", $lnk);
	$lnk = str_replace(".", ".[b]", $lnk);
}
?>
<form method="POST">
<p>Link: <input name="link" size ="40" value="<?php
if(isset($_POST['link'])){
echo $_POST['link'];
}else{
echo "http://www.orkutplus.net";
}
?>">
&nbsp;<input type="submit" value="De-Captchaphy"></p>
</form>
<p>De-Captchafied Link:
<input size="45" value="
<?php
if(isset($_POST['link'])){
echo $lnk;
}else{
echo "[b][blue][u]ht[b]tp://ww[b]w.orkutplus.[b]net/[/u][/blue][/b]";
}
?>" onClick="this.focus(); this.select();" readonly="readonly"></p>