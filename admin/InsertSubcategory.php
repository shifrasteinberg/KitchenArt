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
  $insertSQL = sprintf("INSERT INTO subcategory (categoryID, title, `description`, active) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['categoryID'], "int"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString(isset($_POST['active']) ? "true" : "", "defined","1","0"));

  mysql_select_db($database_sql, $sql);
  $Result1 = mysql_query($insertSQL, $sql) or die(mysql_error());
/*
  $insertGoTo = "InsertSubcategory.php?complete=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));*/
}

mysql_select_db($database_sql, $sql);
$query_categories = "SELECT id, title FROM category ORDER BY title ASC";
$categories = mysql_query($query_categories, $sql) or die(mysql_error());
$row_categories = mysql_fetch_assoc($categories);
$totalRows_categories = mysql_num_rows($categories);


?><?php include('header.php'); ?>



<form action="?complete=1" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Parent Category</td>
      <td><select name="categoryID" id="categoryID">
        <?php
do {  
?>
        <option value="<?php echo $row_categories['id']?>"><?php echo $row_categories['title']?></option>
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
      <td><input type="text" name="title" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Description:</td>
      <td><input type="text" name="description" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Active:</td>
      <td><input name="active" type="checkbox" value="1" checked="checked" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>

<p><a href="#undefined" data-toggle="collapse">Undefined</a></p>
<div id="undefined" class="collapse"><ul>

<?php //   mysql_select_db($database_sql, $sql);
$query_subcatPercat = "SELECT id, title, active FROM subcategory WHERE  `categoryID` IS NULL ORDER BY title ASC";
$subcatPercat = mysql_query($query_subcatPercat, $sql) or die(mysql_error());
$row_subcatPercat = mysql_fetch_assoc($subcatPercat);
$totalRows_subcatPercat = mysql_num_rows($subcatPercat);
?>
<?php do { ?><li>
  <a href="UpdateSubcategory.php?id=<?php echo $row_subcatPercat['id']; ?>"><?php echo $row_subcatPercat['title']; ?></a>
    <?php if( $row_subcatPercat['active']==1 ){
		echo '- Active';
		} ?></li>
                  <?php } while ($row_subcatPercat = mysql_fetch_assoc($subcatPercat)); ?>
</ul></div>
<?php do { ?>

<p><a href="#<?php echo str_replace(' ', '', $row_categories['title']); ?>" data-toggle="collapse"><?php echo $row_categories['title']; ?></a>
</p> <div id="<?php echo str_replace(' ', '', $row_categories['title']); ?>" class="collapse"><ul>

<?php  // mysql_select_db($database_sql, $sql);
$query_subcatPercat = "SELECT id, title, active FROM subcategory WHERE categoryID = ". $row_categories['id']." ORDER BY title ASC";
$subcatPercat = mysql_query($query_subcatPercat, $sql) or die(mysql_error());
$row_subcatPercat = mysql_fetch_assoc($subcatPercat);
$totalRows_subcatPercat = mysql_num_rows($subcatPercat);
if ( mysql_num_rows($subcatPercat) >0){
?>  <?php do { ?><li>
  <a href="UpdateSubcategory.php?id=<?php echo $row_subcatPercat['id']; ?>"><?php echo $row_subcatPercat['title']; ?></a>
    <?php if( $row_subcatPercat['active']==1 ){
		echo '- Active';
		} ?></li>
          <?php } while ($row_subcatPercat = mysql_fetch_assoc($subcatPercat)); ?>


  <?php }?>
  </ul></div>
  <?php } while ($row_categories = mysql_fetch_assoc($categories)); ?>
<?php include('footer.php'); ?>
<?php
mysql_free_result($categories);

mysql_free_result($subcatPercat);
?>
