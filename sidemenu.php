<?php require_once('Connections/sql.php'); ?>
<?php 


mysql_select_db($database_sql, $sql);
$query_brand = "SELECT id, title FROM BrandCategory WHERE active =1 AND  active = 1 ORDER BY title ASC";
$brand = mysql_query($query_brand, $sql) or die(mysql_error());
$row_brand = mysql_fetch_assoc($brand);
$totalRows_brand = mysql_num_rows($brand);
?>

<div id="nav" class="col-md-3 col-sm-4 sidenav">
      <ul class="dropdown">
        <li><a id="brandnamestitle" href="#">BRAND NAME ITEMS</a>
          <div id="brandname">
            <ul>
            <?php
do {  
?>
         <li><a href="brand.php?b=<?php echo $row_brand['title']?>"><?php echo $row_brand['title']?></a></li>
       <?php
} while ($row_brand = mysql_fetch_assoc($brand));
  $rows = mysql_num_rows($brand);
  if($rows > 0) {
      mysql_data_seek($brand, 0);
	  $row_brand = mysql_fetch_assoc($brand);
  }
?>
            </ul>
          </div>
        </li>
        <li><a id="childrentitle" href="#">CHILDRENS GIFTS</a>
          <div id="children">
            <ul>
            <?php 
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title FROM category WHERE active =1 AND  parentName = 'CHILDRENS GIFTS' ORDER BY title ASC";
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
			?> 
       
         <?php
do {  
?>
         <li><a href="category.php?t=<?php echo $row_category['title']?>"><?php echo $row_category['title']?></a></li>
       <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $row_category = mysql_fetch_assoc($category);
  }
?>
                </ul>
          </div>
        </li>
        <li><a id="giftwaretitle" href="#">GIFTWARE</a>
          <div id="giftware">
            <ul>
             <?php 
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title FROM category WHERE active =1 AND  parentName = 'GIFTWARE' ORDER BY title ASC";
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
			?> 
             <?php
do {  
?>
         <li><a href="category.php?t=<?php echo $row_category['title']?>"><?php echo $row_category['title']?></a></li>
       <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $row_category = mysql_fetch_assoc($category);
  }
?>
                      </ul>
          </div>
        </li>
        
        <li><a id="housewarestitle" href="#">HOUSEWARES</a>
          <div id="housewares">
            <ul>
             <?php 
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title FROM category WHERE active =1 AND  parentName = 'HOUSEWARES' ORDER BY title ASC";
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
			?> 
             <?php
do {  
?>
         <li><a href="category.php?t=<?php echo $row_category['title']?>"><?php echo $row_category['title']?></a></li>
       <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $row_category = mysql_fetch_assoc($category);
  }
?>
                      </ul>
          </div>
        </li>
        <li><a id="seasonaltitle" href="#">SEASONAL ITEMS</a>
          <div id="seasonal">
            <ul>
             <?php 
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title FROM category WHERE active =1 AND  parentName = 'SEASONAL ITEMS' ORDER BY title ASC";
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
			?> 
             <?php
do {  
?>
         <li><a href="category.php?t=<?php echo $row_category['title']?>"><?php echo $row_category['title']?></a></li>
       <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $row_category = mysql_fetch_assoc($category);
  }
?>
                      </ul>
          </div>
        </li>
        <li><a id="tabletoptitle" href="#">TABLETOP AND ENTERTAINING</a>
          <div id="tabletop">
            <ul>
             <?php 
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title FROM category WHERE active =1 AND  parentName = 'TABLETOP AND ENTERTAINING' ORDER BY title ASC";
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
			?> 
             <?php
do {  
?>
         <li><a href="category.php?t=<?php echo $row_category['title']?>"><?php echo $row_category['title']?></a></li>
       <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $row_category = mysql_fetch_assoc($category);
  }
?>
                      </ul>
          </div>
        </li>
        <li><a href="new.php">NEW ITEMS</a></li>
                <li><a href="specials.php">SPECIALS</a></li>
  </ul>
    </div>
   