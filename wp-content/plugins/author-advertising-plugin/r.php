<?php
include('wp-blog-header.php');
global $wpdb;
$id = $_GET['i'];
$table_name = $wpdb->prefix."author_advertising";
$SQL = "SELECT `author_custom1` FROM `".$table_name."` WHERE `id` = '".$id."' LIMIT 1";
if($banner = $wpdb->get_var($SQL)) {
	$wpdb->query("UPDATE `".$table_name."` SET `clicks` = `clicks` + 1 WHERE `id` = '$id'");
	wp_redirect($banner);
}else{
	echo 'There was an error retrieving the banner! Contact an administrator!';
}
?>