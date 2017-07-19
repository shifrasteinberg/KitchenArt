<?php require_once('../Connections/sql.php'); ?>
<?php 

mysql_select_db($database_sql, $sql);
$query_subCategory = "SELECT id, title FROM  " . $_GET['name'] . " WHERE categoryID = " . $_GET['id'] ." ORDER BY title ASC";
$subCategory = mysql_query($query_subCategory, $sql) or die(mysql_error());
$row_subCategory = mysql_fetch_assoc($subCategory);
$totalRows_subCategory = mysql_num_rows($subCategory);

//BrandSubcategory
//subcategory

$returnstring = '{"List": [ ';

do {  

   $returnstring .=  '{"id":"' .  $row_subCategory['id'] . '","title": "' .$row_subCategory['title']. '"},';


} while ($row_subCategory = mysql_fetch_assoc($subCategory));
$returnstring .=  "]}";
$returnstring=  str_replace("},]}","}]}",$returnstring );


echo $returnstring;
?>