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
<link type="image/x-icon" rel="icon" href="http://cdn.orkutplus.net/images/favicon.ico" />
<link type="image/x-icon" rel="shortcut icon" href="http://cdn.orkutplus.net/images/favicon.ico" />
<meta name="description" content="Best Orkut Tools for Orkut Freaks!" />
<meta name="keywords" content="Orkut Tools, Hacks, Scripts, Tricks, Cheats, Scrap All, Backup, Orkut, Profile, Scraps, Orkut Theme Generator, Scrap Flooder, Scrapbook, Communities, Profile Maker, Gautam, Orkut Plus" />
<link rel="canonical" href="<?php echo current_url(); ?>" />
<link rel="stylesheet" href="http://toolkit.orkutplus.net/includes/styleRed.css" type="text/css" media="screen" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="http://toolkit.orkutplus.net/includes/iestyle.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="http://toolkit.orkutplus.net/includes/ie6style.css" />
<![endif]-->
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
	<script type="text/javascript" src="http://toolkit.orkutplus.net/includes/js/jquery.js"></script>
	<script type="text/javascript" src="http://toolkit.orkutplus.net/includes/js/idtabs.js"></script>
	<script type="text/javascript" src="http://toolkit.orkutplus.net/includes/js/slider.js"></script>
	<script type="text/javascript" src="http://toolkit.orkutplus.net/includes/js/superfish.js"></script>
	<script type="text/javascript" src="http://toolkit.orkutplus.net/includes/js/hoverIntent.js"></script>
	<script type="text/javascript" src="http://toolkit.orkutplus.net/includes/js/jquery.scrollable.js"></script>
	<script type="text/javascript" src="http://toolkit.orkutplus.net/includes/js/jquery.mousewheel.js"></script>
	<script type="text/javascript">
	jQuery(function(){
		jQuery('ul.superfish').superfish();
	});
	</script>
</head>
<body>
<div id="header">
<div id="headerin">
<a href="http://www.orkutplus.net">
<img src="http://www.<REDACTED>.com/files/logo.png" alt="Orkut Plus! - Orkut Hacks, Themes, Cheats, Tools, Scripts and Security Tips" class="logo" />
</a>
<div id="rightheader">
<?php include("searchform.php"); ?>
</div>
</div> <!-- headerin end -->
<div style="clear: both;"></div>
<?php
include("navbar.php");
?>
</div> <!-- header end -->
<div id="wrapper2">
