<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
	<?php
	error_reporting(0);
	if($pg_title != NULL){
		echo $pg_title;
	}else{
		echo "OrkutPlus Toolkit - Best Orkut Tools for Orkut Freaks!";
	}
	echo " - Toolkit.OrkutPlus.net";
	?>
</title>
	<link type="image/x-icon" rel="icon" href="http://cdn.orkutplus.net/images/favicon.ico"/>
	<link type="image/x-icon" rel="shortcut icon" href="http://cdn.orkutplus.net/images/favicon.ico"/>
	<style type="text/css" media="screen">
	<!--
	@import url(http://toolkit.orkutplus.net/includes/style.css);
	<?php
	if (eregi("MSIE",getenv("HTTP_USER_AGENT")) || eregi("Internet Explorer",getenv("HTTP_USER_AGENT"))){
	echo "@import url(http://toolkit.orkutplus.net/includes/style-ie.css);";
	}
	?>
	-->
	</style>
	<?php if($load_contentslider == true){ ?>
	<script type="text/javascript" src="includes/contentslider/contentslider.js"></script>
	<?php } ?>
	<?php if($load_colorpicker == true) { ?>
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/utilities/utilities.js"></script> 
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/slider/slider-min.js"></script> 
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/colorpicker/colorpicker-min.js"></script>
	<script type="text/javascript" src="includes/colorpicker/windowfiles/dhtmlwindow.js"></script>
	<script type="text/javascript" src="includes/colorpicker/colorpicker.js"></script>
	<?php } ?>
	<?php if($load_wysiwyg == true) { ?>
	<script type="text/javascript" src="http://toolkit.orkutplus.net/includes/tiny_mce/jscripts/tiny_mce/tiny_mce_gzip.js"></script>
	<?php echo $load_wysiwyg_extra; } ?>
</head>
<body>
<div id="header">
<div id="blogtitle">
<a href="http://toolkit.orkutplus.net/"><img src="http://www.orkutplus.net/blog/wp-content/themes/op/images/orkutpluslogoqr7.gif" alt="OrkutPlus Toolkit - Best Orkut Tools for Orkut Freaks!"></a>
</div>
<?php
include("searchform.php");
include("navbar.php");
?>
</div> <!-- end of header -->
<div id="page_container">