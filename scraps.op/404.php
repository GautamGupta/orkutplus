<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
$e404 = true;
?>
<?php include("includes/header.php"); ?>
<?php include("includes/leftbar.php"); ?>
<div class="rbroundbox">
<div class="rbtop"><div></div></div>
<div class="rbcontent">
<div id="postcol" class="fixheight">
<h2><div class="loltitleclassic"><b>Error 404 - Not Found</b></div></h2>
<div class="content">
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* s.op - 468x15, created 4/17/09 */
google_ad_slot = "6555264745";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<table width="100%">
	<tr width="100%">
		<td width="50%" style="border-right-color:#e6e6e6;border-right-width:2px;">
		<p align="center"><img src="http://cdn.orkutplus.net/images/404!.png" width=300 height=270 /></p>
		</td>
		<td width="50%">
			<div class="small">Advertisements</div>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* s.op - 336x280, created 4/17/09 */
google_ad_slot = "1600718730";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
		</td>
	</tr>
</table>
<script type="text/javascript">
  var GOOG_FIXURL_LANG = 'en';
  var GOOG_FIXURL_SITE = 'http://scraps.orkutplus.net/';
</script>
<script type="text/javascript" 
    src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>
<h2><div class="loltitleclassic"><b>Most Viewed</b></div></h2>
<table width=100% style="border-color:#e6e6e6;border-width: 0 0 1px 1px;border-style: solid;"><tr width=100%>
<?php
$number = 25;
$mv = mostviewed($number);
for($a=1;$a<=$number;$a++){
	$c = $mv[$a];
	$img = caticonbyid($c['id']);
	echo "<td width=20% style=\"border-color:#e6e6e6;border-width: 1px 1px 0 0;border-style: solid;\"><p align='center'><a href='http://scraps.orkutplus.net/{$c['id']}/{$c['category']}/1' title='{$c['category_name']} Glitter Scraps and Graphics'><img src='http://scraps.orkutplus.net/{$c['category']}/{$img}' title='{$c['category_name']} Glitter Scraps and Graphics' width=88></a><br /><h2 class=\"title\"><a href='http://scraps.orkutplus.net/{$c['id']}/{$c['category']}/1' title='{$c['category_name']} Glitter Scraps and Graphics'>{$c['category_name']}</a></h2></p></td>";
	if((fmod($a, 5))==0){
		echo "</tr>";
		if($a != $number){
			echo "<tr width=100%>";
		}
	}
}
?>
</table>
</div></div><!--content n postcol-->
</div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("includes/footer.php"); ?>
</div><!-- close page container-->