<?php
include('../../../wp-blog-header.php');
global $wpdb;
$id = $_GET['i'];
$table_name = $wpdb->prefix."author_advertising";
$wpdb->query("UPDATE `".$table_name."` SET `impressions` = `impressions` + 1 WHERE `id` = '$id'");
?>