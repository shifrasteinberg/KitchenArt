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
$img = str_replace("../", "", $_POST['image']);
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE category SET title=%s, parentName=%s,`description`=%s, image=%s, active=%s WHERE id=%s",
                       GetSQLValueString($_POST['title'], "text"),
					   GetSQLValueString($_POST['parentName'], "text"),
                       GetSQLValueString($_POST['description'], "text"),
					                          GetSQLValueString($img, "text"),
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

$colname_category = "-1";
if (isset($_GET['id'])) {
  $colname_category = $_GET['id'];
}
mysql_select_db($database_sql, $sql);
$query_category = sprintf("SELECT * FROM category WHERE id = %s", GetSQLValueString($colname_category, "int"));
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
?>
<?php include('header.php'); ?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title:</td>
      <td><input type="text" name="title" value="<?php echo htmlentities($row_category['title'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
     <tr valign="baseline">
      <td nowrap="nowrap" align="right">Parent Category:</td>
      <td><select name="parentName">
        <option value="<?php echo htmlentities($row_category['parentName'], ENT_COMPAT, 'utf-8'); ?>" selected="selected"><?php echo htmlentities($row_category['parentName'], ENT_COMPAT, 'utf-8'); ?></option>
        <option value="CHILDRENS GIFTS">CHILDRENS GIFTS</option>
        <option value="GIFTWARE">GIFTWARE</option>
        <option value="HOUSEWARES">HOUSEWARES</option>
        <option value="SEASONAL ITEMS">SEASONAL ITEMS</option>
        <option value="TABLETOP AND ENTERTAINING">TABLETOP AND ENTERTAINING</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Description:</td>
      <td><input type="text" name="description" value="<?php echo htmlentities($row_category['description'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Active:</td>
      <td><input type="checkbox" name="active" value="1"  <?php if (!(strcmp($row_category['active'],"1"))) {echo "checked=\"checked\"";} ?> /><?php echo htmlentities($row_category['active'], ENT_COMPAT, 'utf-8'); ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Image:</td>
      <td><p>
        <input type="text" name="image" id="smallImg" value="<?php echo htmlentities($row_category['image'], ENT_COMPAT, 'utf-8'); ?>"  /><br />
<em>Start with the images folder</em>
      </p>
        <p><img src="../<?php echo htmlentities($row_category['image'], ENT_COMPAT, 'utf-8'); ?>" width="75" height="75"/> </p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><p>
        <input type="submit" value="Update Category" />
      </p>
      <p><a id="btndel" href="deleteitem.php?id=<?php echo $row_category['id']; ?>&cat=category">Delete this category</a> </p></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_category['id']; ?>" />
</form>
<form id="formsm" action="uploadsm.php" method="post" enctype="multipart/form-data">
Upload Regular Image
  <input id="uploadImage" type="file" accept="image/*" name="image" />
  <input id="button" type="submit" value="Upload">
</form>
<?php include('footer.php'); ?>
<?php
mysql_free_result($category);
?>
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jqueryform.js"></script>
<script>
$(document).ready(function() {
  var f = $('#formsm');
  var l = $('#loader'); // loder.gif image
  var b = $('#button'); // upload button
  var p = $('#smallImg'); // preview area

  b.click(function(){
    // implement with ajaxForm Plugin
    f.ajaxForm({
      beforeSend: function(){
        b.attr('disabled', 'disabled');
        p.fadeOut();
      },
      success: function(e){

		f.resetForm();
        b.removeAttr('disabled');
        p.val(e).show();
      },
      error: function(e){
        b.removeAttr('disabled');
        p.html(e).fadeIn();
      }
    });
  });
    });
  </script>