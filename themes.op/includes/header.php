<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
	<?php
	error_reporting(0);
	/*if($catinfo['category'] != NULL){
		if($catinfo['category'] == "Flash"){
			if(isset($title) && !is_null($title)){
				echo "Orkut ".$cat." Scraps - ".$title;
			}else{
				echo "Orkut ".$cat." Scraps";
			}
		}else{
			echo $catinfo['category_name']." Glitter Scraps and Graphics";
			if($co != 1){ echo " - Page ".$page; }
		}
	}else*/
	if($e404 == true){
		echo "Error 404 - Not Found";
	}else{
		echo "Orkut Themes | Create Your Own Theme!";
	}
	echo " - Themes.OrkutPlus.net";
	?>
</title>
	<link type="image/x-icon" rel="icon" href="http://cdn.orkutplus.net/images/favicon.ico"/>
	<link type="image/x-icon" rel="shortcut icon" href="http://cdn.orkutplus.net/images/favicon.ico"/>
	<style type="text/css" media="screen">
	<!--
	@import url(http://themes.orkutplus.net/includes/style.css);
	<?php
	if (eregi("MSIE",getenv("HTTP_USER_AGENT")) || eregi("Internet Explorer",getenv("HTTP_USER_AGENT"))){
	echo "@import url(http://themes.orkutplus.net/includes/style-ie.css);";
	}
	?>
	-->
	</style>
	<script type="text/javascript" src="includes/contentslider/contentslider.js"></script>
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/utilities/utilities.js"></script> 
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/slider/slider-min.js"></script> 
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/colorpicker/colorpicker-min.js"></script>
	<script type="text/javascript" src="includes/colorpicker/windowfiles/dhtmlwindow.js"></script>
	<script type="text/javascript" src="includes/colorpicker/colorpicker.js"></script>
</head>
<body>
	<div id="header">
<div id="blogtitle">
	<a href="http://themes.orkutplus.net/"><img src="http://www.orkutplus.net/blog/wp-content/themes/op/images/orkutpluslogoqr7.gif" alt="Orkut Plus! Themes"></a>
</div>
		<div id="banner">
<form action="search.php" id="cse-search-box">
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
<li><a href="http://www.orkutplus.net/">Blog</a></li>
<li><a href="http://www.orkutplus.net/forum">Forum</a></li>
<li><a href="http://www.orkutplus.net/orkut-toolkit">Toolkit</a></li>
<li><a href="http://www.orkutplus.net/about">About</a></li>
<li><a href="http://www.orkutplus.net/contact">Contact</a></li>
<li><a href="http://www.orkutplus.net/subscribe">Subscribe</a></li>
</div> <!-- end of menu -->
</div> <!-- end of header -->
<div id="page_container">