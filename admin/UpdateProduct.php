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
$smimg= str_replace("../", "", $_POST['smallImg']);
$lrimg=str_replace("../", "",$_POST['lrgImg'] );
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE products SET name=%s, `description`=%s, lrgImg=%s, smallImg=%s, category=%s, subcategory=%s, brand=%s, brandSubcategory=%s, Line=%s, Price=%s, `new`=%s, special=%s, specialPrice=%s, active=%s WHERE id=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString($lrimg, "text"),
                       GetSQLValueString($smimg, "text"),
                       GetSQLValueString($_POST['category'], "int"),
                       GetSQLValueString($_POST['subcategory'], "int"),
                       GetSQLValueString($_POST['brand'], "int"),
                       GetSQLValueString($_POST['brandSubcategory'], "int"),
                       GetSQLValueString($_POST['Line'], "text"),
                       GetSQLValueString($_POST['Price'], "text"),
                       GetSQLValueString(isset($_POST['new']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['special']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['specialPrice'], "text"),
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

$colname_product = "-1";
if (isset($_GET['id'])) {
  $colname_product = $_GET['id'];
}
mysql_select_db($database_sql, $sql);
$query_product = sprintf("SELECT * FROM products WHERE id = %s", GetSQLValueString($colname_product, "int"));
$product = mysql_query($query_product, $sql) or die(mysql_error());
$row_product = mysql_fetch_assoc($product);
$totalRows_product = mysql_num_rows($product);


mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title FROM category ORDER BY title ASC";
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);

mysql_select_db($database_sql, $sql);
$query_brand = "SELECT id, title FROM BrandCategory ORDER BY title ASC";
$brand = mysql_query($query_brand, $sql) or die(mysql_error());
$row_brand = mysql_fetch_assoc($brand);
$totalRows_brand = mysql_num_rows($brand);

?>

<?php include('header.php'); ?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">Name:</td>
      <td valign="top"><input type="text" name="name" value="<?php echo htmlentities($row_product['name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td rowspan="14"><br />
<p>large image:</p>
<img src="../<?php echo htmlentities($row_product['lrgImg'], ENT_COMPAT, 'utf-8'); ?>" />
<p>Small Image</p>
<img src="../<?php echo htmlentities($row_product['smallImg'], ENT_COMPAT, 'utf-8'); ?>" /><br /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Description:</td>
      <td><input type="text" name="description" value="<?php echo htmlentities($row_product['description'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">LrgImg:</td>
      <td><input type="text" name="lrgImg" id="lrgImg" value="<?php echo htmlentities($row_product['lrgImg'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">SmallImg:</td>
      <td><input type="text" name="smallImg"  id="smallImg" value="<?php echo htmlentities($row_product['smallImg'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Category:</td>
      <td><select name="category" id="category" onchange="getsecondbox('subcategory',this.value,'subcategory');">
        <option selected="selected" value="" <?php if (!(strcmp("", $row_product['category']))) {echo "selected=\"selected\"";} ?>></option>
        <?php
do {  
?>
        <option value="<?php echo $row_category['id']?>"<?php if (!(strcmp($row_category['id'], $row_product['category']))) {echo "selected=\"selected\"";} ?>><?php echo $row_category['title']?></option>
        <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $row_category = mysql_fetch_assoc($category);
  }
?>
      </select></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Subcategory:</td>
      <td><select name="subcategory" id="subcategory">
        <? if ($row_product['subcategory'] != '' ) {?>
        <option selected="selected" value="<?php echo $row_product['subcategory'];?>">
<?		mysql_select_db($database_sql, $sql);
$query_subcategorynm = "SELECT title FROM `subcategory` WHERE id =" . $row_product['subcategory'];
$subcategoryname = mysql_query($query_subcategorynm, $sql) or die(mysql_error());
$row_subcategorynm = mysql_fetch_assoc($subcategoryname);
?>
		<?php echo $row_subcategorynm['title'];?></option> <?php } ?>
        </select>
      </td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Brand:</td>
      <td><select name="brand" id="brand" onchange="getsecondbox('BrandSubcategory',this.value,'brandSubcategory');">
        <option selected="selected" value="" <?php if (!(strcmp("", $row_product['brand']))) {echo "selected=\"selected\"";} ?>></option>
        <?php
do {  
?>
        <option value="<?php echo $row_brand['id']?>"<?php if (!(strcmp($row_brand['id'], $row_product['brand']))) {echo "selected=\"selected\"";} ?>><?php echo $row_brand['title']?></option>
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
      <td nowrap="nowrap" align="right">BrandSubcategory:</td>
      <td><select name="brandSubcategory" id="brandSubcategory">
      <? if ($row_product['brandSubcategory'] != '' ) {?>
        <option selected="selected" value="<?php echo $row_product['brandSubcategory'];?>">
		<?		mysql_select_db($database_sql, $sql);
$query_subbrandnm = "SELECT title FROM `BrandSubcategory` WHERE id =" . $row_product['brandSubcategory'];
$subbrandname = mysql_query($query_subbrandnm, $sql) or die(mysql_error());
$row_subbrandnm = mysql_fetch_assoc($subbrandname);
?>
		<?php echo $row_subbrandnm['title'];?></option>
        <?php } ?>
        </select>
      </td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Line:</td>
      <td><input type="text" name="Line" value="<?php echo htmlentities($row_product['Line'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Price:</td>
      <td><input type="text" name="Price" value="<?php echo htmlentities($row_product['Price'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">New:
        <input type="checkbox" name="new" value=""  <?php if (!(strcmp($row_product['new'],1))) {echo "checked=\"checked\"";} ?> /></td>
      <td>Special
        <input type="checkbox" name="special" value=""  <?php if (!(strcmp($row_product['special'],1))) {echo "checked=\"checked\"";} ?> /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">SpecialPrice:</td>
      <td><input type="text" name="specialPrice" value="<?php echo htmlentities($row_product['specialPrice'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Active:</td>
      <td><input type="checkbox" name="active" value=""  <?php if (!(strcmp($row_product['active'],1))) {echo "checked=\"checked\"";} ?> /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><p>
        <input type="submit" value="Update record" />
        </p>
        <p><a id="btndel" href="deleteitem.php?id=<?php echo $row_product['id']; ?>&cat=products">Delete this product</a> </p></td>
      </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_product['id']; ?>" />
</form>
<form id="formlg" action="uploadlg.php" method="post" enctype="multipart/form-data">
 Upload Large image
  <input id="uploadImage2" type="file" accept="image/*" name="image" />
  <input id="button2" type="submit" value="Upload">
</form>
 <form id="formsm" action="uploadsm.php" method="post" enctype="multipart/form-data">
Upload Regular Image
  <input id="uploadImage" type="file" accept="image/*" name="image" />
  <input id="button" type="submit" value="Upload">
</form>
<p>&nbsp;</p>
<?php include('footer.php'); ?>
              <?php
mysql_free_result($product);
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
console.log(e);
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
  var g = $('#formlg');
  var m = $('#loader2'); // loder.gif image
  var c = $('#button2'); // upload button
  var q = $('#lrgImg'); // preview area

  c.click(function(){
    // implement with ajaxForm Plugin
    g.ajaxForm({
      beforeSend: function(){
        m.show();
        c.attr('disabled', 'disabled');
        q.fadeOut();
      },
      success: function(e){
		  console.log(e);
        g.resetForm();
        c.removeAttr('disabled');
        q.val(e).show();
      },
      error: function(e){
        c.removeAttr('disabled');
        q.html(e).fadeIn();
      }
    });
  });
});
</script>