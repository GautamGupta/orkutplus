<?php
	// This file is the place to store all basic functions

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

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}
	
	function getcatinfobyid($in) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM categories_index ";
		$query .= "WHERE id=" . $in ." ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		if ($row = mysql_fetch_array($result_set)) {
			return $row;
		}
	}
	
	function checkcatid($in) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM categories_index ";
		$query .= "WHERE id=" . $in ." ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		if ($row = mysql_fetch_array($result_set)) {
			return true;
		}else{
			return false;
		}
	}
	
	function getimagesbycatid($in) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM images_index ";
		$query .= "WHERE category_id={$in} ";
		$query .= "ORDER BY `id` DESC ";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		$newar = Array();
		while($row = mysql_fetch_array($result_set))
                {
                	$newar[] = $row;
                }
		return $newar;
	}
	
	function caticonbyid($in) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM `images_index` ";
		$query .= "WHERE `category_id`={$in} ";
		$query .= "ORDER BY `id` DESC ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		$row = mysql_fetch_array($result_set);
                return $row['image'];
	}
	
	function lbarlistcats() {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM categories_index ";
		$query .= "ORDER BY `categories_index`.`category_name` ASC";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		$newar = Array();
		while($row = mysql_fetch_array($result_set))
                {
                	$newar[] = $row;
                }
		return $newar;
	}
	
	function increaseviews($in) {
		global $connection;
		$views = getcatinfobyid($in);
		$views = $views['views'];
		$views++;
		$query = "UPDATE `scraps_op_db`.`categories_index` ";
		$query .= "SET `views` = '".$views."' ";
		$query .= "WHERE `categories_index`.`id`=".$in;
		$query .= " LIMIT 1";
		mysql_query($query, $connection);
	}
	
	function mostviewed($limit) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM categories_index ";
		$query .= "ORDER BY `categories_index`.`views` DESC ";
		$query .= "LIMIT ".$limit;
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		$newar = Array(NULL);
		while($row = mysql_fetch_array($result_set))
                {
                	$newar[] = $row;
                }
		return $newar;
	}
?>