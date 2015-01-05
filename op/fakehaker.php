<?php
require('class.XMLHttpRequest.php');
$req = new XMLHttpRequest();
for($n=$_GET['s'];$n<=$_GET['e'];$n++)
{
	$req->open("GET","http://bharat-mata.biz/LatestOrkutFIles/Orkut%20Pro%20Maker/details".$n.".html");
	$req->send(null);
	$source = $req->responseText;
	preg_match("/Additionally\,\ a\ (.*?)\ Not\ Found/i", $source, $nf);
	if($nf[1] != "404")
	{
		echo $source."<br />";
		flush();
	}
}
$nxt = $_GET['e']+1000;
echo "<a href=\"fakehaker.php?s={$_GET['e']}&e={$nxt}\">Next</a>";
?>