	<style type="text/css" media="screen">
	<!--
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style-core.css);
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style.css);
		-->
	</style>

<?php
error_reporting(0);
include("../../blog/wp-config.php");
$oldBlogURL = "orkutplus.blogspot.com";
$ref = $_SERVER['HTTP_REFERER'];
$refarr = explode("/", $ref);

	if ($refarr[2] == $oldBlogURL ){
		$bloggerurl = '\/'.$refarr[3].'\/'.$refarr[4].'\/'.$refarr[5];
		$sqlstr = "
			    SELECT wposts.guid 
			    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			    WHERE wposts.ID = wpostmeta.post_id 
			    AND wpostmeta.meta_key = 'blogger_permalink' 
			    AND wpostmeta.meta_value = '".$bloggerurl."'
			 ";             
		$wpurl = $wpdb->get_results($sqlstr, ARRAY_N);
		if ($wpurl){
			header( 'Location: '.$wpurl[0][0].' ') ;
                        exit;
		}
	}
?>

<?php include("../../blog/wp-content/themes/op/header.php"); ?>

<div id="page_container">

<?php include("../../blog/wp-content/themes/op/sidebar.php"); ?>
<?php include("../../blog/wp-content/themes/op/leftbar.php"); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
			<div class="rbcontent">

<div id="postcol" class="fixheight">
 <?php $adcount = 1; ?>
<div class="post_title">
		<h2 id="post-dp" class="title"><a href="http://orkutplus.net/toolkit/aut-display-pic-uploader.php" rel="bookmark">[PHP]&nbsp;Auto Display Picture Uploader</a></h2>
	<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 300x250, created 9/1/08 */
google_ad_slot = "7817929940";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
   </div> 
<div class="content">
	<div style="padding-left:40px; padding-top:15px">
<?php
if(isset($_POST['link']) && isset($_POST['img'])){
        $link = stripslashes($_POST['link'].".user.js");
        $link = str_replace("/", "", $link);
        if(file_exists($link) == FALSE){
                $s1 = '// ==UserScript==
// @name	-ORKUT- Theme By orkutplus.net
// @namespace     Orkut Theme Maker - Gautam
// @description	Make your own theme for orkut!
// @author	OrkutPlus (Coder - Gautam)
// @homepage	http://www.orkutplus.net
// @include	http://www.orkut.*/*
// ==/UserScript==';
	$s2 = '(function() {
     function do_widen(id, min) {
         var container = document.getElementById(id);
         if (!container)
             return;
         if (min)
             container.style.minWidth = min;
     }
     try {
     do_widen("headerin", "99%");
     do_widen("container", "99%");
     } catch (e) {
         GM_log( \'Orkut99percent exception: \' + e );
		 //alert(e);
		}
    
})();';
		$s3 = '
var css = "body{background-image: url(\"';
                $s4 = $_POST['img'];
                $s5 = '\") !important;} /* theme: Hinata-chan autor: Brek */ .listfl{color:#FFFFFF!important;} p,h1,h2,h3,h4,table,tr,b,form,ul,li,td,div{color: #BEBEBE !important;} /* ancoras */ a[href] { color: #EEE5DE !important; text-decoration: none !important; } a[href]:hover { color: #FF0000 !important; text-decoration: none !important; } /* cool edit ;] */ div[class=\"newsItem\"] { background: transparent !important; border: 1px transparent !important; } table[id=\"textPanel\"] { background: transparent !important; } textarea[id=\"messageBody\"], textarea, input, option, select { background: transparent repeat-x fixed !important; color: #A4D3EE !important; } /* texto */ li, span, body, table, td[class*=panel], td[id*=tab], td[class*=cat], td[id=\"headerMenu\"], td[class=navInfo], table.karmatable td, table.friendtable td, td[class=\"row0\"], tr[class=\"row0\"], td[class*=\"tab\"], tr[bgcolor=\"#e5ecf4\"], tr[bgcolor=\"#bfd0ea\"], a[class=\"category_link\"], div[class=\"row1\"], td[align=\"right\"], tr[class=\"panelHeader\"], tr[bgcolor=\"#c9d6eb\"], td[class=rowLabel], tr[class=\"row1\"], td[class=\"row1\"], tr[class=\"messageBody\"], tr[bgcolor=\"#d4dded\"] { color: gray !important; } td[bgcolor=\"##4F4F4F\"] { background: transparent url() !important; } div[style=\"background:#4F4F4F\"] { background: transparent !important; padding: 10px 0px 10px 0px; font-size: 110%; color: #ccc !important; } /* bg */ li, table, td[class*=panel], span, td[id*=tab], td[class*=cat], td[id=\"headerMenu\"], td[class=navInfo], table.karmatable td, table.friendtable td, td[class=\"row0\"], tr[class=\"row0\"], td[class*=\"tab\"], tr[bgcolor=\"#e5ecf4\"], tr[bgcolor=\"#bfd0ea\"], a[class=\"category_link\"], tr[class=\"panelHeader\"], tr[bgcolor=\"#c9d6eb\"], td[background*=\"tr8.gif\"][align=\"center\"] { background: transparent !important; } body { background: transparent url(\"';
                $s6 = '\") !important; } /* bg 2 */ /* input, option, select, textarea,*/ div[class=\"row1\"], tr[class=\"row1\"], td[class=\"row1\"], tr[bgcolor=\"#68838B\"] { background-color: transparent !important; } /*MENU SUPERIOR*/ #header { background-color: transparent !important; font-size: 12px !important;background-repeat: repeat-x !important;height: 31px !important;} #header a:link { color: silver !important; text-decoration: none;font-weight: bold !important; } #header a:visited { color: silver !important; text-decoration: none;font-weight: bold !important; } #header a:hover { color: silver !important; text-decoration: none; font-weight: bold !important; } #headerMenu{background: transparent !important;background-color: transparent !important;background-repeat: repeat-x !important;font-family: \"Comic Sans MS\" !important;} #header li{color: gray !important;font-size:11px;height:31px;line-height:31px;text-align:center;} /*AVISOS*/ .newsitem, .promobg, .promo, .warning{background: transparent !important; font-style:italic;text-align:left !important; } /*Menu Inferior*/ .footer_l{background-image: url() !important; background-color: transparent !important; margin: 0px !important; color: #FFFFFF !important;background-repeat: repeat-x !important;} .footer_r{Display: none!important;} #footer { background: transparent !important; font-size: 12px !important;height: 31px !important; margin: 0px 0px 0px} #footer a:link { color: #FFFFFF !important; text-decoration: none;font-weight: bold !important; } #footer a:visited { color: #33FF33 !important; text-decoration: none;font-weight: bold !important; } #footer a:hover { color: #E6E6FA !important; text-decoration: none; font-weight: bold !important; } #footer .logogoogle{display: none !important;} /*CLASSES REMOVIDAS PRA FICAR UMA SKIN TRANSPARENTE*/ .botl{Display: none !important;} .botr{Display: none !important;} .lbox{Display: none !important;} .topl{Display: none !important;} .topr{Display: none !important;} .listdivi ln{Display: none !important;} .boxmidr{Display: none !important;} .topr_g{Display: none !important;} .uname{background: transparent !important;} .topr_lrg{Display: none !important;} .rbox{Display: none !important;} boxmidsmlr{Display: none !important;} .thumbbox{background-color: transparent !important;} .divihor{background-color: transparent !important;} .boxgrid{background: transparent !important;} .boxmidlock{background: transparent !important;} .boxmidlrg{background-image:none !important;} .module .topl,.module .topl_lrg,.module .topl_g{background-image:none!important;} .userinfodivi,.ln{background: transparent !important;} .tabdivi{background:transparent !important;} .listlight,.listitemlight,.listitem,.listitemchk{background: transparent !important;} .listdark,.listitemdark,.listitemsel{background: transparent !important;} .thumbbox{background-color: transparent !important;} .divihor{background-color: transparent !important;} .boxgrid{background: transparent !important;} .module .boxmid,.module .boxmidsml,.module .boxmidlrg,.module .boxmidlock{background:none!important;} a.userbutton{background: transparent !important;}";
if (typeof GM_addStyle != "undefined") {
	GM_addStyle(css);
} else if (typeof addStyle != "undefined") {
	addStyle(css);
} else {
	var heads = document.getElementsByTagName("head");
	if (heads.length > 0) {
		var node = document.createElement("style");
		node.type = "text/css";
		node.appendChild(document.createTextNode(css));
		heads[0].appendChild(node); 
	}
}
	var td=document.getElementsByTagName("ul")[1];
	td.innerHTML+="<li>&nbsp;|&nbsp;</li><li><a href=\"http://www.htmlorkut.com\">Html Orkut</a>&nbsp;|&nbsp;</li>";
	var td=document.getElementsByTagName("ul")[1];
	td.innerHTML+="<li><a href=\"http://www.orkutplus.net\"><b>Orkut Plus!</b></a></li>";';
		if($_POST['w'] == "1")
		{
			$s = $s1.$s2.$s3.$s4.$s5.$s4.$s6;
		}else{
			$s = $s1.$s3.$s4.$s5.$s4.$s6;
		}
                
                $fh = fopen($link, 'a');
                fwrite($fh, $s);
                fclose($fh);
                ?>
                <p>Your userscript link is:<br><a href="http://www.orkutplus.net/toolkit/scripts/<?php echo $link; ?>">http://www.orkutplus.net/toolkit/scripts/<?php echo $link; ?></a></p>
		<p>You can Preview your Orkut Theme By <a href="http://www.orkutplus.net/toolkit/scripts/theme-previewer.php?img=<?php
		echo $_POST['img'];
		if($_POST['w'] == "1"){
			echo '&w=1">';
		}
		?>
		Clicking Here</a> - New!!<br><br>
        <?php
        }else{
                echo "File already Exists, Please go back and choose another file name!<br><br>";
        }
}else{ ?>
	<form method="POST">
				<p align="left">&nbsp;</p>
				<p align="left"><font size="2" face="Tahoma">Image Link:
				<input type="text" name="img" size="22" value="http://"></font></p>
				<p align="left"><font size="2" face="Tahoma">Userscript File Name:
				<input type="text" name="link" size="22" value="OrkutPlus">&nbsp;.user.js</font></p>
	<input type="checkbox" name="w" id="w" checked=true>&nbsp;99% Width - New!!
	</font></p>
                                <p align="left">&nbsp;</p>
				<p align="left"><input type="submit" value="Make Theme!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p>
<?php
}
?>
		<?php if ($adcount == 1) : ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>
&nbsp;&nbsp;&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<?php endif; $adcount++; ?>

		<?php the_content('<b>Continue reading &raquo;</b>'); ?>

		<hr color="#e6e6e6" size="1">
		</div> 
		
		</div><!-- /rbcontent -->
	<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>