<?php
if($_GET['pass'] == "secroitme543"){
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
		$query = "SELECT * FROM `categories_index` WHERE `category` = '".$in."' LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		if ($row = mysql_fetch_array($result_set)) {
			return $row['id'];
		}
	}
    $connection = mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
    if (!$connection) {
            die("Database connection failed: " . mysql_error());
    }
    $db_select = mysql_select_db("scraps_op_db",$connection);
    if (!$db_select) {
            die("Database selection failed: " . mysql_error());
    }
    $dir_handle = @opendir("/home/<REDACTED>/scraps.orkutplus.net/");
    echo "<ol>";
    $count3 = 0;
    $count2 = 0;
    while (false !== ($file = readdir($dir_handle)))
    {
        if($file != "indexer.php" && $file!="." && $file!=".." && $file!="generators" && $file!="index.php" && $file!="includes" && $file!=".htaccess" && $file!="imagescraps.php" && $file!="404.php" && $file!="flash"){
            $count2++;
            $count = 0;
            $dir_handle2 = @opendir("/home/<REDACTED>/scraps.orkutplus.net/".$file."/");
            echo "<li><a href='".$file."'>".$file."</a><ol>";
            //$recieve = getrow($file);
            while (false !== ($file2 = readdir($dir_handle2))){
                if($file2!="." && $file2!=".." && $file2!="thumbs.db" && $file2!="Thumbs.db")
                {
                    $count++;
                    $count3++;
                    //$renamed = str_replace(" ", "-", $file2);
                    //$renamed = str_replace("_", "-", $renamed);
                    //rename("/home/<REDACTED>/scraps.orkutplus.net/".$file."/".$file2, "/home/<REDACTED>/scraps.orkutplus.net/".$file."/".$renamed);
                    //mysql_query("INSERT INTO `scraps_op_db`.`images_index` (`id` ,`category_id` ,`image` ,`info`) VALUES (NULL , '".$recieve."', '".mysql_prep($renamed)."', '')", $connection);
                    echo '<li><a href="'.$file.'/'.$file2.'">'.$file2.'</a></li>';
                }
            }
            $file_space = str_replace("-", " ", $file);
            mysql_query("INSERT INTO `scraps_op_db`.`categories_index` (`id` ,`category` ,`category_name` ,`number_of_imgs` ,`views`) VALUES (NULL , '".mysql_prep($file)."', '".mysql_prep($file_space)."', '".mysql_prep($count)."', '1')", $connection);
            echo "</ol></li>";
            closedir($dir_handle2);
        }
    }
    echo "<li><a href='/'>All Categories - ".$count2."</li>";
    echo "<li><a href='/'>All Images - ".$count3."</li>";
    echo "</ol>";
    closedir($dir_handle);
    mysql_close($connection);
}else{
    echo "Please enter Secret Key.";
}
?>
