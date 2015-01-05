<div class="fixcontain1">
<div id="leftbar" class="fixheight">
<div class="left-rbroundbox">
<div class="left-rbtop"><div></div></div><!-- s -->
<div class="left-rbcontent">
<div class="lolclassic">
<div class="loltitleclassic"><center>Categories</center></div>
<div style="padding: 7px 4px 5px 8px; font-size: 11px; color: rgb(68, 68, 68); line-height: 1.2em;">
<?php
$listcats = lbarlistcats();
//print_r($listcats);
$countcats = count($listcats);
$countcats--;
for($cf=0;$cf<=$countcats;$cf++){
    echo '<p align="left"><span><a href="http://scraps.orkutplus.net/imagescraps.php?catid='.$listcats[$cf]["id"].'&cat='.$listcats[$cf]["category"].'&page=1" title="'.$listcats[$cf]['category_name'].' Glitter Scraps and Graphics">&#9679; '.$listcats[$cf]["category_name"].'</a> <dfn title="There are '.$listcats[$cf]["number_of_imgs"].' Images in the Category - '.$listcats[$cf]["category_name"].'">('.$listcats[$cf]["number_of_imgs"].')</dfn></span></p>';
}
?>
</div></div><br/>
</div><!-- /rbcontent -->
<div class="left-rbbot"><div></div></div><!-- s -->
</div><!-- /rbroundbox -->
</div><!-- /sidebar -->
</div><!--fixcontain1-->
<div class="fixcontain2">