<?php include('restrict.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kitchen Art Admin</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class="container">
<nav class="navbar navbar-default"><div class="container-fluid"><a href="dashboard.php">Back to dashboard</a></div></nav>
<div class="row">
<?php 
if (isset($_GET['complete'])) {
	echo '<div class="alert alert-success">Your information has been added</div>';
	}
?>