<?php
	if (isset($_FILES['upload']['name'])) 
	{
		$file = $_FILES['upload']['name'];
		$filetmp = $_FILES['upload']['tmp_name'];
		
		move_uploaded_file($filetmp, 'img/' . $file);
		$function_number = $_GET['CKEditorFuncNum'];
		$url = 'img/' . $file;
		$message = 'upload image successefully';
		echo "<script>window.parent.CKEDITOR.tools.callFunction('".$function_number."','".$url."','".$message."')</script>";
	}

	
?>