<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if($_GET['catid'] != NULL){
    $catid = $_GET['catid'];
    if(!is_numeric($catid)){
        redirect_to("http://scraps.orkutplus.net/404.php");
    }
    if(!checkcatid($catid)){
        redirect_to("http://scraps.orkutplus.net/404.php");
    }
    increaseviews($catid);
    $catinfo = getcatinfobyid($catid);
    if($_GET['page'] == NULL){
        redirect_to("http://scraps.orkutplus.net/imagescraps.php?catid={$catid}&cat={$catinfo['category']}&page=1");
    }else{
        $page = $_GET['page'];
    }
    if(isset($_GET['cat']) && !is_null($_GET['cat']) && $_GET['cat'] == $catinfo['category']){
        $allimages = getimagesbycatid($catid);
        $co = $catinfo['number_of_imgs'];
        $co /= 7;
        $co = ceil($co);
        if(!is_numeric($page)){
            redirect_to("http://scraps.orkutplus.net/imagescraps.php?catid={$catid}&cat={$catinfo['category']}&page=1");
        }
        if($page < 1){
            redirect_to("http://scraps.orkutplus.net/imagescraps.php?catid={$catid}&cat={$catinfo['category']}&page=1");
        }
        if($page > $co){
            redirect_to("http://scraps.orkutplus.net/imagescraps.php?catid={$catid}&cat={$catinfo['category']}&page={$co}");
        }
    }else{
        redirect_to("http://scraps.orkutplus.net/imagescraps.php?catid={$catid}&cat={$catinfo['category']}&page={$page}");
    }
}else{
    redirect_to("http://scraps.orkutplus.net/404.php");
}
?>
<?php include("includes/header.php"); ?>
<?php include("includes/leftbar.php"); ?>
<?php include("includes/dynamic1.php"); ?>
<div class="rbroundbox">
<div class="rbtop"><div></div></div>
<div class="rbcontent">
<?php include("includes/dynamic2.php"); ?>
<div id="postcol" class="fixheight">
<?php include("includes/dynamic3.php"); ?>
<div class="post_title">
<?php include("includes/dynamic4.php"); ?>
<h2 class="title"><a href="http://scraps.orkutplus.net/imagescraps.php?catid=<?php echo $catid; ?>&cat=<?php echo $catinfo['category']; ?>"><?php echo $catinfo['category_name']; ?> Glitter Scraps and Graphics<?php if($co != 1){ echo " - Page ".$page; } ?></a></h2>
</div>
<?php include("includes/dynamic5.php"); ?>
<div class="content">
This section consists of variety of <?php echo $catinfo['category_name']; ?> Graphics and Glitters Scraps. There <?php if($co == 1){echo "is ";}else{echo "are ";} echo $co; if($co == 1){echo " page";}else{echo " pages";} ?> in this category. <?php if($co != 1){ echo "Browse all of them to enjoy the complete variety."; } ?>
<?php
if($co > 1){
    echo '<div class="navigation"><center><div class="wp-pagenavi"><span class="pages">Page '.$page.' of '.$co.'</span> ';
    for($pf=1;$pf<=$co;$pf++){
        if($pf == $page){
            echo '<span class="current">'.$pf.'</span> ';
        }else{
            echo '<a href="http://scraps.orkutplus.net/imagescraps.php?catid='.$catid.'&cat='.$catinfo['category_name'].'&page='.$pf.'" title="Page Number '.$pf.' for Category '.$catinfo['category_name'].'">'.$pf.'</a> ';
        }
    }
    echo "</div></center></div><p>&nbsp;</p>";
}
$f = $page - 1;
$e = $page;
$f *= 7;
$e *= 7;
$e--;
for($f;$f<=$e;$f++){
    if($allimages[$f]['id'] != NULL){
        echo '<p align="center"><img src="http://scraps.orkutplus.net/'.$catinfo["category"].'/'.$allimages[$f]["image"].'" alt="'.$catinfo["category_name"].' Glitter Scraps and Graphics" title="'.$catinfo["category_name"].' Glitter Scraps and Graphics"></p><textarea name="'.$allimages[$f]["id"].'" id="'.$allimages[$f]["id"].'" style="display:none"><a href="http://scraps.orkutplus.net/"><img src="http://scraps.orkutplus.net/'.$catinfo["category"].'/'.$allimages[$f]["image"].'" alt="'.$catinfo["category_name"].' Glitter Scraps and Graphics" title="'.$catinfo["category_name"].' Glitter Scraps and Graphics" border="0"></a></textarea>';
        echo "<center><div id=\"divWildfirePost".$allimages[$f]['id']."\"></div>
<script>
var pconf={
  contentIsLayout: 'false', 
  defaultContent: '".$allimages[$f]['id']."', ";
  echo 'UIConfig: \'<config><display showEmail="true" useTransitions="true" showBookmark="false" codeBoxHeight="auto" showCodeBox="true" showCloseButton="false" networksWithCodeBox="" networksToShow="myspace, friendster, facebook, orkut, bebo, hi5"></display><body><background frame-color="#BFBFBF" background-color="#FFFFFF" gradient-color-begin="#ffffff" gradient-color-end="#F4F4F4" corner-roundness="4;4;4;4"></background><controls color="#202020" corner-roundness="4;4;4;4" gradient-color-begin="#EAEAEA" gradient-color-end="#F4F4F4" bold="false"><snbuttons type="textUnder" frame-color="#D5D5D5" over-frame-color="#60BFFF" color="#808080" gradient-color-begin="#FFFFFF" gradient-color-end="d4d6d7" size="10" bold="false" down-frame-color="#60BFFF" down-gradient-color-begin="#6DDADA" over-gradient-color-end="#6DDADA" down-gradient-color-end="#F4F4F4" over-color="#52A4DA" down-color="#52A4DA" over-bold="false"><more frame-color="#A4DBFF" over-frame-color="#A4DBFF" gradient-color-begin="#F4F4F4" gradient-color-end="#BBE4FF" over-gradient-color-begin="#A4DBFF" over-gradient-color-end="#F4F4F4"></more><previous frame-color="#BBE4FF" over-frame-color="#A4DBFF" gradient-color-begin="#FFFFFF" gradient-color-end="#A4DBFF" over-gradient-color-begin="#A4DBFF" over-gradient-color-end="#F4F4F4"></previous></snbuttons><textboxes frame-color="#CACACA" color="#757575" gradient-color-begin="#ffffff" bold="false"><codeboxes color="#757575" frame-color="#DFDFDF" background-color="#FFFFFF" gradient-color-begin="#ffffff" gradient-color-end="#FFFFFF" size="10"></codeboxes><inputs frame-color="#CACACA" color="#757575" gradient-color-begin="#F4F4F4" gradient-color-end="#ffffff"></inputs><dropdowns list-item-over-color="#52A4DA" frame-color="#CACACA"></dropdowns></textboxes><buttons frame-color="#CACACA" gradient-color-begin="#F4F4F4" gradient-color-end="#CACACA" color="#000000" bold="false" over-frame-color="#60BFFF" over-gradient-color-begin="#BBE4FF" down-gradient-color-begin="#BBE4FF" over-gradient-color-end="#FFFFFF" down-gradient-color-end="#ffffff"><post-buttons frame-color="#CACACA" gradient-color-end="#CACACA"></post-buttons></buttons><listboxes frame-color="#CACACA" corner-roundness="4;4;4;4" gradient-color-begin="#F4F4F4" gradient-color-end="#FFFFFF"></listboxes><checkboxes checkmark-color="#00B600" frame-color="#D5D5D5" corner-roundness="3;3;3;3" gradient-color-begin="#F4F4F4" gradient-color-end="#FFFFFF"></checkboxes><servicemarker gradient-color-begin="#ffffff" gradient-color-end="#D5D5D5"></servicemarker><tooltips color="#6D5128" gradient-color-begin="#FFFFFF" gradient-color-end="#FFE4BB" size="10" frame-color="#FFDBA4"></tooltips></controls><texts color="#202020"><headers color="#202020"></headers><messages color="#202020"></messages><links color="#52A4DA" underline="false" over-color="#353535" down-color="#353535" down-bold="false"></links></texts></body></config>\'
};';
    echo "Wildfire.initPost('257251', 'divWildfirePost".$allimages[$f]['id']."', 400, 170, pconf);
</script></center><br /><hr color=\"#e6e6e6\" size=\"1\"><br />";
    }
}
if($co > 1){
    echo '<div class="navigation"><center><div class="wp-pagenavi"><span class="pages">Page '.$page.' of '.$co.'</span> ';
    for($pf=1;$pf<=$co;$pf++){
        if($pf == $page){
            echo '<span class="current">'.$pf.'</span> ';
        }else{
            echo '<a href="http://scraps.orkutplus.net/imagescraps.php?catid='.$catid.'&cat='.$catinfo['category_name'].'&page='.$pf.'" title="Page Number '.$pf.' for Category '.$catinfo['category_name'].'">'.$pf.'</a> ';
        }
    }
    echo "</div></center></div><br />";
}
?>
<?php include("includes/dynamic6.php"); ?>
</div></div><!--content n postcol-->
</div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
<?php include("includes/dynamic7.php"); ?>
<?php include("includes/footer.php"); ?>
<?php include("includes/dynamic8.php"); ?>
</div><!-- close page container-->
<?php include("includes/dynamic9.php"); ?>