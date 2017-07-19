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
  $updateSQL = sprintf("UPDATE subcategory SET categoryID=%s, title=%s, `description`=%s, active=%s WHERE id=%s",
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

$colname_subcat = "-1";
if (isset($_GET['id'])) {
  $colname_subcat = $_GET['id'];
}
mysql_select_db($database_sql, $sql);
$query_subcat = sprintf("SELECT * FROM subcategory WHERE id = %s", GetSQLValueString($colname_subcat, "int"));
$subcat = mysql_query($query_subcat, $sql) or die(mysql_error());
$row_subcat = mysql_fetch_assoc($subcat);
$totalRows_subcat = mysql_num_rows($subcat);

mysql_select_db($database_sql, $sql);
$query_categories = "SELECT * FROM category";
$categories = mysql_query($query_categories, $sql) or die(mysql_error());
$row_categories = mysql_fetch_assoc($categories);
$totalRows_categories = mysql_num_rows($categories);
?><?php include('header.php'); ?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Category:</td>
      <td><select name="categoryID" id="categoryID">
        <?php
do {  
?>
        <option value="<?php echo $row_categories['id']?>"<?php if (!(strcmp($row_categories['id'], $row_subcat['categoryID']))) {echo "selected=\"selected\"";} ?>><?php echo $row_categories['title']?></option>
        <?php
} while ($row_categories = mysql_fetch_assoc($categories));
  $rows = mysql_num_rows($categories);
  if($rows > 0) {
      mysql_data_seek($categories, 0);
	  $row_categories = mysql_fetch_assoc($categories);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title:</td>
      <td><input name="title" type="text" value="<?php echo $row_subcat['title']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Description:</td>
      <td><input type="text" name="description" value="<?php echo $row_subcat['description']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Active:</td>
      <td><input type="checkbox" name="active" value="1" <?php if (!(strcmp($row_subcat['active'],1))) {echo "checked=\"checked\"";} ?> /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" />
             <p><a id="btndel" href="deleteitem.php?id=<?php echo $row_subcat['id']; ?>&cat=subcategory">Delete this category</a> </p></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_subcat['id']; ?>" />
</form><?php include('footer.php'); ?>
<?php
mysql_free_result($subcat);

mysql_free_result($categories);
?>
