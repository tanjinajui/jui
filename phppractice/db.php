 <?php

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
