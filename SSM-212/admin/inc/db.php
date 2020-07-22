<?php
	
	$db = mysqli_connect("localhost", "root", "", "php_blogwebsite");

	if ( $db ){
		// echo "Database Connected";
	}
	else{
		die("Database Connection Failed." . mysqli_error($db) );
	}

?>