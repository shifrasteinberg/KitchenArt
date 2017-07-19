<?php 
if ( $_COOKIE['user'] != '1') {
	  header(sprintf("Location: index.php?restrict=1"));
	}
?>