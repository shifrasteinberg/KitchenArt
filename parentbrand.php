<?php
 $title = "Brand Name Items and Products";
?> 
      <?php include("header.php"); ?>
<body>

  <?php include("topnav.php"); ?>
   <div class="container ship"><h3>We ship anywhere in Canada! <a href="index.php#contact">Contact Us</a> to Order</h3></div>
<div class="container">
     <?php include("sidemenu.php"); ?>
     
    <div class="content-inner">
<h1 class="featurette-heading">Brand Names</h1>

      	<div class="products col-md-9 col-sm-8">
     			<?php 
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title, image FROM BrandCategory where active = 1 ORDER BY title ASC";
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
			?> 
       
         <?php
do {  
?>
	
           <div class="col-md-4  col-xs-6 thumb">

      <a class="thumbnail" href="brand.php?b=<?php echo $row_category['title']?>">
       <span class="thumbnail-inner">
               
      <img class="img-responsive" src="
		<?php 
		if ($row_category['image'] == '' ){
			echo 'images/Untitled-1.jpg';
		}else{
		echo $row_category['image'];
		}
		?>" alt="<?php echo $row_category['title']?>" border="0">
                </span>
      </a>
      <h5 class="thumbtitle"><?php echo $row_category['title']?></h5>
                    
     </div> 
      
       <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $row_category = mysql_fetch_assoc($category);
  }
?>
        
          
         
         </div>
    </div>
     

      
    <!--end content div-->
          
	
</div><!--end container div-->
  <?php include("footer.php"); ?>
</body>
</html>
