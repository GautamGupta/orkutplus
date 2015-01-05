<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
	<?php
	error_reporting(0);
	if($catinfo['category'] != NULL){
		if($catinfo['category'] == "Flash"){
			if(isset($title) && !is_null($title)){
				echo "Orkut ".$cat." Scraps - ".$title." - Scraps.OrkutPlus.net";
			}else{
				echo "Orkut ".$cat." Scraps - Scraps.OrkutPlus.net";
			}
		}else{
			echo $catinfo['category_name']." Glitter Scraps and Graphics";
			if($co != 1){ echo " - Page ".$page; }
			echo " - Scraps.OrkutPlus.net";
		}
	}elseif($e404 == true){
		echo "Error 404 - Not Found - Scraps.OrkutPlus.Net";
	}else{
		echo "Orkut Scraps | Orkut Images | Orkut Greetings | Orkut Generators - Scraps.OrkutPlus.Net";
	}
	?>
</title>
	<link type="image/x-icon" rel="icon" href="http://cdn.orkutplus.net/images/favicon.ico"/>
	<link type="image/x-icon" rel="shortcut icon" href="http://cdn.orkutplus.net/images/favicon.ico"/>
	<style type="text/css" media="screen">
	<!--
	@import url(http://scraps.orkutplus.net/includes/style-core.css);
	@import url(http://scraps.orkutplus.net/includes/style.css);
	<?php if (eregi("MSIE",getenv("HTTP_USER_AGENT")) || eregi("Internet Explorer",getenv("HTTP_USER_AGENT"))) { ?>
	@import url(http://scraps.orkutplus.net/includes/style-ie.css);
	<?php } ?>
	-->
	</style>
	<link rel="stylesheet" href="http://www.orkutplus.net/blog/wp-content/plugins/wp-pagenavi/pagenavi-css.css" type="text/css" media="screen" />
	<script type="text/javascript" src="includes/swf/swfobject.js"></script>
	<script src="http://cdn.gigya.com/wildfire/js/wfapiv2.js"></script>
</head>
<body>
	<div id="header">
<div id="blogtitle">
	<a href="http://scraps.orkutplus.net/"><img src="http://www.orkutplus.net/blog/wp-content/themes/op/images/orkutpluslogoqr7.gif" alt="Orkut Plus"></a>
</div>
		<div id="banner">
<form action="http://scraps.orkutplus.net/search.php" id="cse-search-box">
<div>
<input type="hidden" name="cx" value="007418682267555033411:dzaz1exfezy" />
<input type="hidden" name="cof" value="FORID:10" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" name="q" size="31" />
<input type="submit" name="sa" value="Search" />
</div>
</form>
<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script></div>
<div id="navbar">
<ul class="menu">
<li><a href="index.php">Home</a></li>
<li><a href="#">Page2</a></li>
<li><a href="#">Page3</a></li>
<li><a href="#">Page4</a></li>
</div> <!-- end of menu -->
</div> <!-- end of header -->