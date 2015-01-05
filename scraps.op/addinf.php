<?php
if($_POST['passo'] == "oproxngrox449" || $_SESSION['user'] == "opaddinfuser"){
        if($_POST['passo'] == "oproxngrox449"){
                $_SESSION['user'] = "opaddinfuser";
        }
        function mysql_prep( $value ) {
                $magic_quotes_active = get_magic_quotes_gpc();
                $new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
                if( $new_enough_php ) { // PHP v4.3.0 or higher
                        // undo any magic quote effects so mysql_real_escape_string can do the work
                        if( $magic_quotes_active ) { $value = stripslashes( $value ); }
                        $value = mysql_real_escape_string( $value );
                } else { // before PHP v4.3.0
                        // if magic quotes aren't already on then add slashes manually
                        if( !$magic_quotes_active ) { $value = addslashes( $value ); }
                        // if magic quotes are active, then the slashes already exist
                }
                return $value;
        }
        function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}
        function getrow($in = NULL) {
		global $connection;
		$query = "SELECT * FROM `categories_index` WHERE `id` = '".$in."' LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		if ($row = mysql_fetch_array($result_set)) {
			return $row['category'];
		}
	}
        if(isset($_POST['img'])){
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
        if(!isset($_POST['submit'])){
                echo '<form method="POST"><table border=1 style="overflow:none;" width=100% height=100%><tr><td width=3%>ID</td><td width=26%>Image</td><td width=50%>Information</td></tr>';
        }
        while($row=mysql_fetch_array($query))
        {
                $id = $row['id'];
                $catid = $row['category_id'];
                $cat = getrow($catid);
                $img = $row['image'];
                $info = $row['info'];
                if(!isset($_POST['submit'])){
                        echo '<tr><td width=3%><a href="http://scraps.orkutplus.net/'.$cat.'/'.$img.'">'.$id.'</a></td><td width=256%><a href="http://scraps.orkutplus.net/'.$cat.'/'.$img.'"><img src="http://scraps.orkutplus.net/'.$cat.'/'.$img.'"></a></td><td width=70%><textarea name="'.$id.'" style="width:865px;height:100px;">'.$info.'</textarea></td></tr>';
                }else{
                        mysql_query("UPDATE `images_index` SET `info` = '".mysql_prep($_POST[$id])."' WHERE `id` = '{$id}'");
                        echo '<a href="'.$guid.'">#</a>'.$id.' updated.<br />';
                }
                flush();
        }
        if(!isset($_POST['submit'])){
                echo '</table><br /><br /><input type="submit" name="submit" value="Submit">&nbsp;<input type="reset" value="Reset"></form>';
        }
        mysql_close();
        }else{
        ?>

        <?php
        }
}else{
        echo '<form method="post"><input type="password" name="passo"><input type="submit" name="submit" value="Submit"></form>';
}
?>
