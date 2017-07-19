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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE BrandSubcategory SET categoryID=%s, title=%s, `description`=%s, active=%s WHERE id=%s",
                       GetSQLValueString($_POST['categoryID'], "int"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString(isset($_POST['active']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_sql, $sql);
  $Result1 = mysql_query($updateSQL, $sql) or die(mysql_error());

  $updateGoTo = "dashboard.php?complete=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_sql, $sql);
$query_brand = "SELECT id, title FROM BrandCategory";
$brand = mysql_query($query_brand, $sql) or die(mysql_error());
$row_brand = mysql_fetch_assoc($brand);
$totalRows_brand = mysql_num_rows($brand);

$colname_subBrand = "-1";
if (isset($_GET['id'])) {
  $colname_subBrand = $_GET['id'];
}
mysql_select_db($database_sql, $sql);
$query_subBrand = sprintf("SELECT * FROM BrandSubcategory WHERE id = %s", GetSQLValueString($colname_subBrand, "int"));
$subBrand = mysql_query($query_subBrand, $sql) or die(mysql_error());
$row_subBrand = mysql_fetch_assoc($subBrand);
$totalRows_subBrand = mysql_num_rows($subBrand);
?>
<?php include('header.php'); ?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">CategoryID:</td>
      <td><select name="categoryID">
        <?php
do {  
?>
        <option value="<?php echo $row_brand['id']?>"<?php if (!(strcmp($row_brand['id'], $row_subBrand['dategoryID']))) {echo "selected=\"selected\"";} ?>><?php echo $row_brand['title']?></option>
        <?php
} while ($row_brand = mysql_fetch_assoc($brand));
  $rows = mysql_num_rows($brand);
  if($rows > 0) {
      mysql_data_seek($brand, 0);
	  $row_brand = mysql_fetch_assoc($brand);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title:</td>
      <td><input type="text" name="title" value="<?php echo htmlentities($row_subBrand['title'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Description:</td>
      <td><input type="text" name="description" value="<?php echo htmlentities($row_subBrand['description'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Active:</td>
      <td><input type="checkbox" name="active" value="1"  <?php if (!(strcmp($row_subBrand['active'],1))) {echo "checked=\"checked\"";} ?> /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" />
      <br />
       <p><a id="btndel" href="deleteitem.php?id=<?php echo $row_subBrand['id']; ?>&cat=BrandSubcategory">Delete this category</a> </p></td>
    </tr>
  </table>
  <p>
    <input type="hidden" name="MM_update" value="form1" />
    <input type="hidden" name="id" value="<?php echo $row_subBrand['id']; ?>" />
  </p>
</form>
<p>&nbsp;</p>
<?php include('footer.php'); ?>
<?php
mysql_free_result($brand);

mysql_free_result($subBrand);
?>
