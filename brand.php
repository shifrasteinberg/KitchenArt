<?php require('Connections/sql.php'); ?>
 <?php 
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title, description FROM BrandCategory WHERE active =1 AND title = '" .  $_GET['b'] ."'" ;
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
			?>  
			<?php
 $title = "" . $_GET['b'];
?> 
<?php
 $description = $row_category['description'];
?> 

<?php
   include("header.php"); ?>
<body>

  <?php include("topnav.php"); ?>
  <div class="container ship"><h3>We ship anywhere in Canada! <a href="index.php#contact">Contact Us</a> to Order</h3></div>
<div class="container">
     <?php include("sidemenu.php"); ?>
    <!--end nav div-->
 
    
    <!-- Page Content -->
	<div class="content-inner col-md-9 col-sm-8">
<h1 class="featurette-heading"><?php echo $row_category['title']?></span></h1>
      <p><?php echo $row_category['description']?></p>
      <?php 
			mysql_select_db($database_sql, $sql);
$query_subcategory = "SELECT id, title, description FROM BrandSubcategory WHERE active =1 AND  categoryID = '" .  $row_category['id'] ."' ORDER BY title ";
$subcategory = mysql_query($query_subcategory, $sql) or die(mysql_error());
$row_subcategory = mysql_fetch_assoc($subcategory);
$totalRows_subcategory = mysql_num_rows($subcategory);
			?> 
    <?php if ($totalRows_subcategory > 0) { // Show if recordset not empty ?>
      <div class="page-links-outer">
      <?php
do {  
?>
      <h4 class="page-links" id="listcat<?php echo $row_subcategory['id']?>">&#8226; <a href="#<?php echo $row_subcategory['id']?>"><?php echo $row_subcategory['title']?></a></h4>
   <?php
} while ($row_subcategory = mysql_fetch_assoc($subcategory));
  $rows = mysql_num_rows($subcategory);
  if($rows > 0) {
      mysql_data_seek($subcategory, 0);
	  $row_subcategory = mysql_fetch_assoc($subcategory);
  }
?>
      
      </div>
      
      <div class="products sub-products">
     
      <?php
do {  
?>
 <?php 
			mysql_select_db($database_sql, $sql);
$query_products = "SELECT *FROM products WHERE active =1 AND  BrandSubcategory = " .  $row_subcategory['id'] . " ORDER BY name";
$products = mysql_query($query_products, $sql) or die(mysql_error());
$row_products = mysql_fetch_assoc($products);
$totalRows_products = mysql_num_rows($products);
if ($totalRows_products > 0 ) {
		?>
            <div id="<?php echo $row_subcategory['id']?>"></div>
      <div class="row" >
      <div  class="col-md-12">
      <h2 class="section-heading"><?php echo $row_subcategory['title']?></h2>
      <p><?php echo $row_subcategory['description']?></p>
      </div>
           

      
            <?php
			$i=1;
do {  
	?>
     <div class="col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#"  data-toggle="modal" data-title="<?php echo $row_products['name']?>"   data-image="<?php
	  if ($row_products['lrgImg']== '') {
	   echo $row_products['smallImg'];}
	   else{
		   	   echo $row_products['lrgImg'];
		   }
	   
	   ?>" data-caption=" <?php echo $row_products['Line'];?>" data-description="<?php echo $row_products['description'];?> <?php if ( $row_products['Price'] != '') {
					echo "$" . $row_products['Price'];}?> <?php if ( $row_products['specialPrice'] != '') {
					echo "Now only $" . $row_products['specialPrice'];}?>" data-target="#image-gallery" data-image-id="<?php echo $i;?>">
       <span class="thumbnail-inner">
                <img class="img-responsive" src="<?php echo $row_products['smallImg']?>" alt="<?php echo $row_subcategory['title']?>">
                </span>
            </a>

            <h5 class="thumbtitle">
			<?php 
		if ($row_products['Line'] != '') {
echo '<span class="brand">'. $row_products['Line'] . '</span><br>';
		}
			
			?>
		<?php echo $row_products['name']?><br><small><?php echo $row_products['description']?></small><br>
            <span class="pay"><?php if ( $row_products['Price'] != '') {
					echo "Regular Price: $" . $row_products['Price'];}?><br>
                    <?php if ( $row_products['specialPrice'] != '') {
					echo "Now only $" . $row_products['specialPrice'];}?></span></h5>
           </div>
            <?php
			$i++;
} while ($row_products = mysql_fetch_assoc($products));
  $rows = mysql_num_rows($products);
  if($rows > 0) {
      mysql_data_seek($products, 0);
	  $row_products = mysql_fetch_assoc($products);
  }
?>
            

        
        </div><!-- /.row -->
        <?php
} //if has products
else {
	?> <script>
          $( document ).ready(function() {
    $('#listcat<?php echo $row_subcategory['id']?>').hide();
});
          </script>
	<?php }
} while ($row_subcategory = mysql_fetch_assoc($subcategory));
  $rows = mysql_num_rows($subcategory);
  if($rows > 0) {
      mysql_data_seek($subcategory, 0);
	  $row_subcategory = mysql_fetch_assoc($subcategory);
  }
?>
        
       
        
      </div>
      <?php }else {
		  ?> 
         
          <p>Sorry! This page is under construction.<br>

Please come back soon to see more of our innovative products.
</p>
     
        <?php } // Show if recordset not empty ?>

      

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        
        <h5 class="modal-caption" id="image-gallery-caption">Caption</h5>
        <h4 class="modal-title" id="image-gallery-title">Title</h4>
        <p class="text-center" id="image-gallery-description">Description</p>
        </div>
      
      <div class="modal-body">
        
        <div class="col-md-12">
          
          <img id="image-gallery-image" class="img-responsive" src="img/seforim/stonechumash.jpg">
          
          </div>
        
        
        
        
        
        </div>
      
      <div class="modal-footer">
        
        <div class="col-sm-3 col-sm-offset-3 col-xs-5 col-xs-offset-1">
          
          <button type="button" class="btn btn-primary btn-md btn-block" id="show-previous-image">< Previous</button>
          
          </div>
        
        <div class="col-sm-3 col-xs-5">
          
          <button type="button" id="show-next-image" class="btn btn-primary btn-md btn-block">Next ></button>
          
          </div>
        
        </div>
      
      </div>
    
    </div>
  
</div>
 </div>
</div>
</div>
<hr style="border-color:white;" class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      

    
<?php include("footer.php"); ?>
<script src="js/jquery.shuffle.modernizr.min.js"></script>

<script>

$(document).ready(function(){



    loadGallery(true, 'a.thumbnail');



    //This function disables buttons when needed

    function disableButtons(counter_max, counter_current){

        $('#show-previous-image, #show-next-image').show();

        if(counter_max == counter_current){

            $('#show-next-image').hide();

        } else if (counter_current == 1){

            $('#show-previous-image').hide();

        }

    }



    /**

     *

     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.

     * @param setClickAttr  Sets the attribute for the click handler.

     */



    function loadGallery(setIDs, setClickAttr){

        var current_image,

            selector,

            counter = 0;



        $('#show-next-image, #show-previous-image').click(function(){

            if($(this).attr('id') == 'show-previous-image'){

                current_image--;

            } else {

                current_image++;

            }



            selector = $('[data-image-id="' + current_image + '"]');

            updateGallery(selector);

        });



        function updateGallery(selector) {

            var $sel = selector;

            current_image = $sel.data('image-id');

            $('#image-gallery-caption').text($sel.data('caption'));

            $('#image-gallery-title').text($sel.data('title'));
			   $('#image-gallery-description').text($sel.data('description'));

            $('#image-gallery-image').attr('src', $sel.data('image'));

            disableButtons(counter, $sel.data('image-id'));

        }



        if(setIDs == true){

            $('[data-image-id]').each(function(){

                counter++;

                $(this).attr('data-image-id',counter);

            });

        }

        $(setClickAttr).on('click',function(){

            updateGallery($(this));

        });

    }

});



</script>
