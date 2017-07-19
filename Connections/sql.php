<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sql = "localhost";
$database_sql = "KitchenArtCanada";
$username_sql = "kitchenproducts";
$password_sql = "Chumee123!";
$sql = mysql_pconnect($hostname_sql, $username_sql, $password_sql) or trigger_error(mysql_error(),E_USER_ERROR); 
?>