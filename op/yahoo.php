<?php
if($_GET['user'])
{
	$url = file_get_contents("http://opi.yahoo.com/online?u=".$_GET['user']."&m=a&t=1");
	if($url=="00")
	{
		echo $_GET['user']." is offline";
	}else{
		echo $_GET['user']." is Online";
	}
}else{
?>
<form method="GET">
Username : <input type=text name=user size=50><input type=submit name=submit value="Check">
</form>
<?php
}
?>
