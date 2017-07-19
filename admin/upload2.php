<?php

$valid_formats = array("jpg","jpeg","JPG", "png", "gif", "bmp");
$max_file_size = 1024*1024*1024;
$dir = "../images/upload/";
$msg = '';
// If File Submitted
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	if ( in_array($ext, $valid_formats)) {
		if( $_FILES['file']['size'] < $max_file_size ){
			$uniq = base_convert(uniqid(), 16, 10);
			$tmp = $_FILES['file']['tmp_name'];
			$uniq_file_name = $uniq.".".$ext;
			if(move_uploaded_file($tmp, $dir.$uniq_file_name)){
			  echo "<img src='$path' />";
			}
			else{
				echo "Problem while moving file";
			}
		}
		else{
			echo "File is too large";
		}
	}
	else{
		echo "Wrong file format";
	}
}

?>