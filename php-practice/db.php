<?php
// Connected database with our project
// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "";
// $db['db_name'] = "phpdevelopers";

// foreach ($db as $key => $value) {
// 	define(strtoupper($key), $value);
// }

// $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// if ($connect) {
// 	//echo "Database Connected";
// }
// else{
// 	die("Database Connection Failed" . mysqli_error($connect));
// }

//Connect The Database with Our Project Query----
 $connect = mysqli_connect('localhost', 'root', '', 'phpdevelopers');

  if ($connect) {
  	// User no seen..
  	//echo "Database Connected Successfully";
  }
  else{
  	echo "Database Connection faild!";
  }

?>