<?php
require("constants.php");
$connection = mysql_connect(OP_DB_SERVER,OP_DB_USER,OP_DB_PASS);
if (!$connection) {
	die("Database connection failed: " . mysql_error());
}
$db_select = mysql_select_db(OP_DB_NAME,$connection);
if (!$db_select) {
	die("Database selection failed: " . mysql_error());
}
?>