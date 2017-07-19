<?php include('restrict.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$smimg = str_replace("../", "", $_POST['smallImg']);
$lrimg =str_replace("../", "",$_POST['lrgImg'] );

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO products (name, `description`, lrgImg, smallImg, category, subcategory, brand, brandSubcategory, Line, Price, `new`, special, specialPrice,active) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s)",
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
					    GetSQLValueString(isset($_POST['active']) ? "true" : "", "defined","1","0"));

  mysql_select_db($database_sql, $sql);
  $Result1 = mysql_query($insertSQL, $sql) or die(mysql_error());
/*
  $insertGoTo = "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));*/
}
?><?php include('header.php'); ?>
<form action="?complete=1" method="post" name="form1" id="form1" style="float:left;width:50%">
  <table align="center">
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap">Insert Product<br />
        <a href="#productList">View current Listing</a></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Name:</td>
      <td><input type="text" name="name" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Description:</td>
      <td><textarea name="description" cols="32"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Image Location:</td>
      <td><input type="text" name="smallImg" value="" size="32" id="smallImg" />
        <br />
        <em>start with the images folder</em>
       
</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Large Img:</td>
      <td><input type="text" name="lrgImg" value="" size="32" id="lrgImg"/><br />

</td>
    </tr>
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Category:</td>
      <td><select name="category" id="category" onchange="getsecondbox('subcategory',this.value,'subcategory');">
        <option selected></option>
		<?php
do {  
?>
        <option value="<?php echo $row_category['id']?>"><?php echo $row_category['title']?></option>
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
              <option selected></option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Brand:</td>
      <td><select name="brand" id="brand" onchange="getsecondbox('BrandSubcategory',this.value,'brandSubcategory');">
            <option selected></option>    <?php
do {  
?>
        <option value="<?php echo $row_brand['id']?>"><?php echo $row_brand['title']?></option>
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
      <td><select name="brandSubcategory" id="brandSubcategory">        <option selected></option></select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Line:</td>
      <td><input type="text" name="Line" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Price:</td>
      <td><input type="text" name="Price" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">New:
        <input type="checkbox" name="new" value="" /></td>
      <td>Special:
        <input type="checkbox" name="special" value="" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Special Price</td>
      <td><input type="text" name="specialPrice" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Active:</td>
      <td><input type="checkbox" name="active" value="" checked="checked" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert Product" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<div style="float:left;width:50%">
<form id="formlg" action="uploadlg.php" method="post" enctype="multipart/form-data" >
 Upload Large image
  <input id="uploadImage2" type="file" accept="image/*" name="image" />
  <input id="button2" type="submit" value="Upload">
</form>
 <form id="formsm" action="uploadsm.php" method="post" enctype="multipart/form-data">
Upload Regular Image
  <input id="uploadImage" type="file" accept="image/*" name="image" />
  <input id="button" type="submit" value="Upload">
</form>
</div>
</div>
<a id="productList" style="clear:both;"/>
<br style="clear:both;"/>

<p><a href="#undefined" data-toggle="collapse">Undefined</a></p>
<div id="undefined" class="collapse"><ul>

<?php //   mysql_select_db($database_sql, $sql);
$query_subcatPercat = "SELECT id, name, active FROM products WHERE  `category` IS NULL ORDER BY name ASC";
$subcatPercat = mysql_query($query_subcatPercat, $sql) or die(mysql_error());
$row_subcatPercat = mysql_fetch_assoc($subcatPercat);
$totalRows_subcatPercat = mysql_num_rows($subcatPercat);
?>
<?php do { ?><li>
  <a href="UpdateProduct.php?id=<?php echo $row_subcatPercat['id']; ?>"><?php echo $row_subcatPercat['name']; ?></a>
    <?php if( $row_subcatPercat['active']==1 ){
		echo '- Active';
		} ?></li>
                  <?php } while ($row_subcatPercat = mysql_fetch_assoc($subcatPercat)); ?>
</ul></div>

<?php do { ?>


<?php  // mysql_select_db($database_sql, $sql);
$query_subcatPercat = "SELECT id, name, active FROM products WHERE category = ". $row_category['id']." ORDER BY name ASC";
$subcatPercat = mysql_query($query_subcatPercat, $sql) or die(mysql_error());
$row_subcatPercat = mysql_fetch_assoc($subcatPercat);
$totalRows_subcatPercat = mysql_num_rows($subcatPercat);
if ( mysql_num_rows($subcatPercat) >0){
?> 

<p><a href="#<?php echo str_replace(' ', '', $row_category['title']); ?>" data-toggle="collapse"><?php echo $row_category['title']; ?></a>
</p> <div id="<?php echo str_replace(' ', '', $row_category['title']); ?>" class="collapse"><ul>

 <?php do { ?><li>
  <a href="UpdateProduct.php?id=<?php echo $row_subcatPercat['id']; ?>"><?php echo $row_subcatPercat['name']; ?></a>
    <?php if( $row_subcatPercat['active']==1 ){
		echo '- Active';
		} ?></li>
          <?php } while ($row_subcatPercat = mysql_fetch_assoc($subcatPercat)); ?>

</ul></div>
  <?php 
} //end has count
} while ($row_category = mysql_fetch_assoc($category)); ?>
<?php include('footer.php'); ?>
              <?php
mysql_free_result($category);

mysql_free_result($brand);

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

