<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if (is_home()) : ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>
<?php else : ?>
<?php wp_title('', 'false'); ?> - <?php bloginfo('name'); ?>
<?php endif; ?></title>

<meta name="generator" content="WordPress" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<?php wp_get_archives('type=monthly&format=link'); ?>

<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
      ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style<?php echo $artsee_color; ?>.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/iestyle.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/ie6style.css" />
<![endif]-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/idtabs.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollable.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.mousewheel.js"></script>
<script type="text/javascript">
jQuery(function(){
jQuery('ul.superfish').superfish();
});
</script>
<?php if(is_singular()){ ?>
<script type="text/javascript">
function savePageAsPDF() {
window.open("http://www.pdfdownload.org/web2pdf/Default.aspx?left=0&right=0&top=0&bottom=0&page=0&cURL=<?php the_permalink(); ?>", "Save Page as PDF - OrkutPlus.net", "width=640, height=480");
}
</script>
<?php } ?>
</head>

<body>

<div id="header">

<div id="headerin">
<a href="<?php bloginfo('url'); ?>"><img src="http://www.<REDACTED>.com/files/logo.png" alt="OrkutPlus! Logo" class="logo"/></a>
<div id="rightheader">
<form action="<?php bloginfo('url'); ?>/search.php" id="cse-search-box">
<input type="hidden" name="cx" value="007418682267555033411:h1tpc4mtzre" />
<input type="hidden" name="cof" value="FORID:11" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" name="q" size="40" id="floatleft" />
<div class="buttons2"><button name="sa" type="submit"><img src="http://<REDACTED>.com/wp-content/themes/GrungeMag/images/search.png" />Search</button>
</div>
</form>
<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>
<br /><!--FLAG_BAR_BEGIN--><div id="translation_bar"><map id="gltr_flags_map" name="gltr_flags_map"><area shape="rect" coords="0,0,16,11" href="http://www.<REDACTED>.com/" id="flag_en" hreflang="en" title="English"><area shape="rect" coords="20,0,36,11" href="http://www.<REDACTED>.com/zh/" id="flag_zh" hreflang="zh" title="Chinese (Simplified)"><area shape="rect" coords="40,0,56,11" href="http://www.<REDACTED>.com/nl/" id="flag_nl" hreflang="nl" title="Dutch"><area shape="rect" coords="60,0,76,11" href="http://www.<REDACTED>.com/fr/" id="flag_fr" hreflang="fr" title="French"><area shape="rect" coords="80,0,96,11" href="http://www.<REDACTED>.com/de/" id="flag_de" hreflang="de" title="German"><area shape="rect" coords="100,0,116,11" href="http://www.<REDACTED>.com/el/" id="flag_el" hreflang="el" title="Greek"><area shape="rect" coords="120,0,136,11" href="http://www.<REDACTED>.com/it/" id="flag_it" hreflang="it" title="Italian"><area shape="rect" coords="0,15,16,26" href="http://www.<REDACTED>.com/ko/" id="flag_ko" hreflang="ko" title="Korean"><area shape="rect" coords="20,15,36,26" href="http://www.<REDACTED>.com/pt/" id="flag_pt" hreflang="pt" title="Portuguese"><area shape="rect" coords="40,15,56,26" href="http://www.<REDACTED>.com/ru/" id="flag_ru" hreflang="ru" title="Russian"><area shape="rect" coords="60,15,76,26" href="http://www.<REDACTED>.com/es/" id="flag_es" hreflang="es" title="Spanish"></map><img style="border: 0px none ;" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/gltr_image_map.png" usemap="#gltr_flags_map"></div><div id="transl_sign"><!--FLAG_BAR_END-->


</div>
</div>
<div style="clear: both;"></div>
<!--Begin Pages Navigation Bar-->
<div id="pages">
<ul class="nav superfish sf-js-enabled sf-shadow" id="nav2">
<li class="page_item"><a href="http://<REDACTED>.com" class="title" title="">Home</a></li>
<li class="page_item"><a href="http://www.orkutplus.net/category/orkut-apps" target="_blank" class="title" title="">Orkut Applications</a></li>
<li class="page_item"><a href="http://www.orkutplus.net/category/orkut-themes" target="_blank" class="title" title="">Orkut Themes</a></li>
<li class="page_item"><a href="http://www.orkutplus.net/2009/02/orkut-blocked-unblock-orkut-and-other-blocked-websites-anytime-anywhere-guaranteed.html" class="title" target="_blank" title="">Unblock Orkut</a></li>
<li class="page_item"><a href="http://www.orkutplus.net/2008/12/scrap-all-orkut-friends-deluxe.html" target="_blank" class="title" title="">Scrap All</a></li>
<li class="page_item"><a href="http://www.orkutplus.net/category/hacks" class="title" target="_blank" title="">Hacks</a></li>
<li class="page_item"><a href="http://www.orkutplus.net/orkut-toolkit" class="title" target="_blank" title="">Orkut Toolkit</a></li>
<li class="page_item"><a href="http://www.orkutplus.net/forum/" class="title" target="_blank" title="">Help Central</a></li>
<li class="page_item"><a href="http://www.orkutplus.net/contact" target="_blank" class="title" title="">Contact</a></li>
</ul>
</div>
<!--End Pages Navigation Bar-->
<!--Begin Categories Navigation Bar-->
<div id="categories">
<ul><li>&nbsp;&nbsp;<script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* new op top link u 728x15, created 5/26/09 */
google_ad_slot = "8849542441";
google_ad_width = 728;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></li></ul>
</div>
<!--End category navigation-->
</div>
<div id="wrapper2">
