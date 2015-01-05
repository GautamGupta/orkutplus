<?
$link="youtube link";
$page = @file_get_contents($link);
$regxp = '/&video_id=(.*?)&l/i';
preg_match_all($regxp, $page, $vid,PREG_SET_ORDER);
$regxp = '/&t=(.*?)&hl/i';
preg_match_all($regxp, $page, $t,PREG_SET_ORDER);
$link="http://www.youtube.com/get_video?video_id=".$vid[0][1]."&amp;t=".$t[0][1];
header('Location: '.$link);
?>