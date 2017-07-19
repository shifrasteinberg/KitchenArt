<?php 


if ($_POST['username'] == 'abc' && $_POST['password'] == '123') {

	setcookie("user", '1');
header( 'Location: dashboard.php' ) ;


	} 
	if(isset($_POST['username'])) {
		
		echo 'Invalid username combination';
		}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kitchen Art Admin</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class="container">
<div class="row">

<?php 
if(isset($_GET['restrict']) ) {
	echo 'You need to be an administrator to view this page. Please login again.';
	
	}
?>
<form id="form1" name="form1" method="post" action="#">
  <p>Username:
    <input type="text" name="username" id="username" required/>
  </p>
  <p>Password:
  <input name="password" type="password" id="password" value=""  required/>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit" />
  </p>
</form>
</body>
</html>