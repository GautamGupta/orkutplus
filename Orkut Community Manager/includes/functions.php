<?php
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

//form functions below

function check_required_fields($required_array) {
	$field_errors = array();
	foreach($required_array as $fieldname) {
		if (!isset($_POST[strtolower($fieldname)]) || (empty($_POST[strtolower($fieldname)]) && $_POST[strtolower($fieldname)] == NULL)) { 
			$field_errors[] = $fieldname; 
		}
	}
	return $field_errors;
}

function check_max_field_lengths($field_length_array) {
	$field_errors = array();
	foreach($field_length_array as $fieldname => $maxlength ) {
		if (strlen(trim(mysql_prep($_POST[strtolower($fieldname)]))) > $maxlength) { $field_errors[] = $fieldname; }
	}
	return $field_errors;
}

function display_errors($error_array) {
	echo "Please review the following field(s):<br />";
	foreach($error_array as $error) {
		echo "&#9679;&nbsp;&nbsp;" . $error . "<br />";
	}
}

?>