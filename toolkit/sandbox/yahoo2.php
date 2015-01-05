<?php
if($_GET['user'])
{
	$usefile_get_contents("http://opi.yahoo.com/online?u=$user&m=a&t=1");
	if($url=="00")
	{
		echo "$user is offline";
	}else{
		echo "$user is Online";
	}
}else{
?>
<form action="" method=get>
Username : <input type=text name=user size=50><input type=submit name=submit value="Check It!!">
</form>
<?php
}
?>
