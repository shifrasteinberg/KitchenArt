<?php require_once('../Connections/sql.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO BrandSubcategory (categoryID, title, `description`, active) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['categoryID'], "int"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString(isset($_POST['active']) ? "true" : "", "defined","1","0"));

  mysql_select_db($database_sql, $sql);
  $Result1 = mysql_query($insertSQL, $sql) or die(mysql_error());
/*
  $insertGoTo = "InsertSubBrands.php?complete=1";
  if (isset($_SERVER['QUERY_STRING'])) {
  //  $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
   // $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));*/
}

mysql_select_db($database_sql, $sql);
$query_brands = "SELECT * FROM BrandCategory ORDER BY title ASC";
$brands = mysql_query($query_brands, $sql) or die(mysql_error());
$row_brands = mysql_fetch_assoc($brands);
$totalRows_brands = mysql_num_rows($brands);

?><?php include('header.php'); ?>
<form action="?complete=1" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Parent Brand:</td>
      <td><select name="categoryID" >
        <?php
do {  
?>
        <option value="<?php echo $row_brands['id']?>"><?php echo $row_brands['title']?></option>
        <?php
} while ($row_brands = mysql_fetch_assoc($brands));
  $rows = mysql_num_rows($brands);
  if($rows > 0) {
      mysql_data_seek($brands, 0);
	  $row_brands = mysql_fetch_assoc($brands);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title:</td>
      <td><input type="text" name="title" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Description:</td>
      <td><input type="text" name="description" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Active:</td>
      <td><input type="checkbox" name="active" value="1" checked="checked" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<ul>
<p class="dropdown"><a href="#undefined" data-toggle="collapse">Undefined</a></p>
<div id="undefined" class="collapse"><ul>
<?php 
  
//mysql_select_db($database_sql, $sql);
$query_subbrandperBrand = "SELECT id, categoryID, title, active FROM BrandSubcategory WHERE categoryID IS NULL ORDER BY title ASC";
$subbrandperBrand = mysql_query($query_subbrandperBrand, $sql) or die(mysql_error());
$row_subbrandperBrand = mysql_fetch_assoc($subbrandperBrand);
$totalRows_subbrandperBrand = mysql_num_rows($subbrandperBrand);
  ?>
   <?php do { ?>
   <li>
  <a href="UpdateSubBrand.php?id=<?php echo $row_subbrandperBrand['id']; ?>"><?php echo $row_subbrandperBrand['title']; ?></a>
<?php  if ($row_subbrandperBrand['active'] ==1 ) {
	  echo '- Active';
  }
  ?></li>
    <?php } while ($row_subbrandperBrand = mysql_fetch_assoc($subbrandperBrand)); ?></ul></div>

<?php do { ?>

<p class="dropdown"><a href="#<?php echo str_replace(' ', '', $row_brands['title']);  ?>" data-toggle="collapse"><?php echo $row_brands['title']; ?></a>
</p> <div id="<?php echo str_replace(' ', '', $row_brands['title']); ?>" class="collapse"><ul>

  <?php 
  
//mysql_select_db($database_sql, $sql);
$query_subbrandperBrand = "SELECT id, categoryID, title, active FROM BrandSubcategory WHERE categoryID = ". $row_brands['id']. " ORDER BY title ASC";
$subbrandperBrand = mysql_query($query_subbrandperBrand, $sql) or die(mysql_error());
$row_subbrandperBrand = mysql_fetch_assoc($subbrandperBrand);
$totalRows_subbrandperBrand = mysql_num_rows($subbrandperBrand);
if ( mysql_num_rows($subbrandperBrand) >0){
  ?>  <?php do { ?><li>
  <a href="UpdateSubBrand.php?id=<?php echo $row_subbrandperBrand['id']; ?>"><?php echo $row_subbrandperBrand['title']; ?></a>
<?php  if ($row_subbrandperBrand['active'] ==1 ) {
	  echo '- Active';
  }
  ?></li>
    <?php } while ($row_subbrandperBrand = mysql_fetch_assoc($subbrandperBrand)); ?>

  <?php
}?>
</ul>
  </div>
<?php
} while ($row_brands = mysql_fetch_assoc($brands)); ?>
</ul>
<?php include('footer.php'); ?>

<?php
mysql_free_result($brands);

mysql_free_result($subbrandperBrand);
?>
