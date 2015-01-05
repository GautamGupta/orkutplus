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
<br />
<!--FLAG_BAR_BEGIN--><div id="translation_bar">&nbsp;&nbsp;&nbsp;&nbsp;<a id="flag_en" href="http://www.<REDACTED>.com/" hreflang="en"><img id="flag_img_en" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_en.png" alt="English flag" title="English" border="0"></a>&nbsp;&nbsp;<a id="flag_pt" href="http://www.<REDACTED>.com/pt/" hreflang="pt"><img id="flag_img_pt" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_pt.png" alt="Portuguese flag" title="Portuguese" border="0"></a>&nbsp;&nbsp;<a id="flag_zh" href="http://www.<REDACTED>.com/zh/" hreflang="zh"><img id="flag_img_zh" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_zh.png" alt="Chinese (Simplified) flag" title="Chinese (Simplified)" border="0"></a>&nbsp;&nbsp;<a id="flag_nl" href="http://www.<REDACTED>.com/nl/" hreflang="nl"><img id="flag_img_nl" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_nl.png" alt="Dutch flag" title="Dutch" border="0"></a>&nbsp;&nbsp;<a id="flag_fr" href="http://www.<REDACTED>.com/fr/" hreflang="fr"><img id="flag_img_fr" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_fr.png" alt="French flag" title="French" border="0"></a>&nbsp;&nbsp;<a id="flag_de" href="http://www.<REDACTED>.com/de/" hreflang="de"><img id="flag_img_de" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_de.png" alt="German flag" title="German" border="0"></a>&nbsp;&nbsp;<a id="flag_el" href="http://www.<REDACTED>.com/el/" hreflang="el"><img id="flag_img_el" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_el.png" alt="Greek flag" title="Greek" border="0"></a>&nbsp;&nbsp;<a id="flag_it" href="http://www.<REDACTED>.com/it/" hreflang="it"><img id="flag_img_it" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_it.png" alt="Italian flag" title="Italian" border="0"></a>&nbsp;&nbsp;<a id="flag_ru" href="http://www.<REDACTED>.com/ru/" hreflang="ru"><img id="flag_img_ru" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_ru.png" alt="Russian flag" title="Russian" border="0"></a>&nbsp;&nbsp;<a id="flag_es" href="http://www.<REDACTED>.com/es/" hreflang="es"><img id="flag_img_es" src="http://www.<REDACTED>.com/wp-content/plugins/global-translator/flag_es.png" alt="Spanish flag" title="Spanish" border="0"></a></div><!--FLAG_BAR_END-->



</div>
</div>
<div style="clear: both;"></div>
<!--Begin Pages Navigation Bar-->
<div id="pages">
<ul class="nav superfish sf-js-enabled sf-shadow" id="nav2">
<li class="page_item"><a href="http://orkutplus.net" class="title" title="">Home</a></li>
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
