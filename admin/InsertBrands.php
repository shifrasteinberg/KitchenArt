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
$img = str_replace("../", "", $_POST['image']);
  $insertSQL = sprintf("INSERT INTO BrandCategory (title, `description`,image, active, new) VALUES (%s,%s, %s,%s, %s)",
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['description'], "text"),
					GetSQLValueString($img, "text"),
  GetSQLValueString(isset($_POST['active']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['new']) ? "true" : "", "defined","1","0"));


  mysql_select_db($database_sql, $sql);
  $Result1 = mysql_query($insertSQL, $sql) or die(mysql_error());

  /*$insertGoTo = "InsertBrands.php?complete=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));*/
}

mysql_select_db($database_sql, $sql);
$query_Recordset1 = "SELECT * FROM BrandCategory ORDER BY title ASC";
$Recordset1 = mysql_query($query_Recordset1, $sql) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><h4>Insert New Brand</h4>

<form action="?complete=1" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title:</td>
      <td><input type="text" name="title" value="" size="32" />
      <br>
      <em>No extra characters allowed, like comma</em></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Description:</td>
      <td><input type="text" name="description" value="" size="32" /></td>
    </tr><tr valign="baseline">
      <td nowrap="nowrap" align="right">Image:</td>
      <td><p>
        <input type="text" name="image" id="smallImg" value=""  /><br />
<em>Start with the images folder</em>
      </p>
        </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Active:</td>
      <td><input type="checkbox" name="active" value="1" checked="checked" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">New</td>
      <td><input name="new" type="checkbox" required id="new" value="1" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<form id="formsm" action="uploadsm.php" method="post" enctype="multipart/form-data">
Upload Regular Image
  <input id="uploadImage" type="file" accept="image/*" name="image" />
  <input id="button" type="submit" value="Upload">
</form>
<h4>Current Brands</h4>
<p><em>Click to edit</em></p>
<ul>
<?php do { ?>
  <li><a href="UpdateBrand.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['title']; ?></a>
    <?php if( $row_Recordset1['active'] ==1) {
		echo '- Active';
		} ?></li><?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </ul>
<?php include('footer.php'); ?>
<?php
mysql_free_result($Recordset1);
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