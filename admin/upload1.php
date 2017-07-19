<?php include("restrict.php"); ?>
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
				$msg .= 'File location:' . $uniq_file_name  .'<br>';
				$msg .= "Uploading successful!";
			}
			else{
				$msg = "Problem while moving file";
			}
		}
		else{
			$msg = "File is too large";
		}
	}
	else{
		$msg = "Wrong file format";
	}
}
echo $msg;
?>


<html>
<head>
	<title>Simple PHP File Uploader</title>
</head>
<body>
<?php
//Show message
if(isset($msg)){
	echo "<p>{$msg}</p>\n";
}
?>
<form action="" method="POST" enctype="multipart/form-data">
	<label for="file">File:</label>
	<input type="file" name="file" id="file" /> 
	<br />
	<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>