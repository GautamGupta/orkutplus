<?php
$connection = mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
if (!$connection) {
        die("Database connection failed: " . mysql_error());
}
$db_select = mysql_select_db("scraps_op_db",$connection);
if (!$db_select) {
        die("Database selection failed: " . mysql_error());
}
if(isset($_GET['s']) && isset($_GET['e'])){
        $query = mysql_query("SELECT * from `scraps_op_db`.`images_index` LIMIT ".$_GET['s'].", ".$_GET['e'], $connection);
}else{
        $query = mysql_query("SELECT * from `scraps_op_db`.`images_index`", $connection);
}
?>
