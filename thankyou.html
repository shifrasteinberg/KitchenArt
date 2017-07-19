<?php
 $title = 'New Items Gifts and Products'
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
<h1 class="featurette-heading">What's New: <span class="text-muted">Our Latest Products</span></h1>
     <hr>
     <p class="lead" style="margin-bottom:5px;">Sign up to receive the latest updates and specials, at advance notice, straight to your inbox!</p>
          <form class="jotform-form col-md-12" action="https://submit.jotform.us/submit/71658307846163/" method="post" name="form_71658307846163" id="71658307846163" accept-charset="utf-8">
  <input type="hidden" name="formID" value="71658307846163" />
  <div class="form-all">
    <ul class="form-section page-section">
      <li style="list-style:none;" class="form-line col-md-4" data-type="control_textbox" id="id_1">
        <label class="form-label form-label-left form-label-auto mid-page-label" id="label_1" for="input_1">  </label>
        <div id="cid_1" class="form-input jf-required">
          <input type="text" id="input_1" name="q1_input1" data-type="input-textbox" class="form-control" size="20" value="" placeholder="NAME" data-component="textbox" width="100%" />
        </div>
      </li>
      <li style="list-style:none;" class="form-line form-group col-md-5" data-type="control_email" id="id_3">
        <label class="form-label form-label-left form-label-auto mid-page-label" id="label_3" for="input_3">  </label>
        <div id="cid_3" class="form-input jf-required">
          <input type="email" id="input_3" name="q3_input3" class="form-control validate[Email]" size="30" value="" placeholder="E-MAIL ADDRESS" data-component="email" width="100%" />
        </div>
      </li>
      <li style="list-style:none;" class="form-line col-md-3" data-type="control_button" id="id_2">
      <div class="form-group">
        <div id="cid_2" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <button id="input_2" type="submit" class="btn btn-primary" data-component="button" width="100%">
              SUBSCRIBE
            </button>
          </div>
        </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <script>
  JotForm.showJotFormPowered = "0";
  </script>
  <input type="hidden" id="simple_spc" name="simple_spc" value="71658307846163" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "71658307846163-71658307846163";
  </script>
</form>
     <hr style="clear:both; margin-bottom:0;"> 
           <div class="page-links-outer">
      
      <h4 class="page-links">&#8226; <a href="#brands">Brands</a></h4>
  	<h4 class="page-links">&#8226; <a href="#styles">Styles</a></h4>
    <h4 class="page-links">&#8226; <a href="#products">Products</a></h4>	
      
      </div>
      
         <div class="products sub-products">
      
      <div class="row" >
      <div  class="col-md-12">
      <h2 id="brands" class="section-heading">New Brands</h2>
      <p>Click to view products from a particular new brand.</p>
      
       <?php 
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT id, title, image, description FROM BrandCategory WHERE active =1 AND NEW =1" ;
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
			?>  
           
	  <?php
do {  

?>
</div>
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
		?>" alt="<?php echo $row_category['title']?>" border="0"></span></a>
        <h5 class="thumbtitle" id="listcat<?php echo $row_category['id']?>"><?php echo $row_category['title']?></h5>
   <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $category = mysql_fetch_assoc($category);
  }
?>
    
      </div><?php
	  $category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);



?>
</div>
<!--end brands-->

 <div class="row" >
     
      
       <?php 
	   $currentSubBrand= '';
			mysql_select_db($database_sql, $sql);
$query_category = "SELECT BrandSubcategory.id, BrandSubcategory.title, BrandSubcategory.description, BrandCategory.title AS brandtitle, products.name, products.smallImg
FROM BrandSubcategory
 LEFT JOIN BrandCategory ON BrandSubcategory.categoryID = BrandCategory.id
RIGHT JOIN products ON BrandSubcategory.id = products.brandSubcategory
 WHERE BrandSubcategory.active =1 
AND BrandSubcategory.NEW =1
ORDER BY products.smallImg" ;
$category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
//echo 'amt of products'. $totalRows_products;
			if ($totalRows_category > 0 ) {

			?>  
            
             <div  class="col-md-12">
      <h2 id="styles" class="section-heading">New Styles</h2>
<p>Click to view more products.</p>
	  <?php

do { 
//only do 1 per subbrand
if ($currentSubBrand != $row_category['title']) {
$currentSubBrand= $row_category['title'] ;  
?>
</div>
		<div class="col-md-4 col-xs-6 thumb">
        
        <a class="thumbnail" href="brand.php?b=<?php echo $row_category['brandtitle']. '#'.$row_category['id']?>">
        <span class="thumbnail-inner">
        <img class="img-responsive" src="
		<?php 
		//doesn't have an image now
		if ($row_category['smallImg'] == '' ){
			echo 'images/Untitled-1.jpg';
		}else{
		echo $row_category['smallImg'];
		}
		?>" alt="<?php echo $row_category['title']?>" border="0"></span></a>
        <h5 class="thumbtitle" id="listcat<?php echo $row_category['id']?>"><?php echo $row_category['brandtitle'];?>&nbsp; <?php echo $row_category['title']?></h5>
   <?php
}//end only 1 per subbrand
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $category = mysql_fetch_assoc($category);
  }
?>
    
      </div>
      
      <?php
	  $category = mysql_query($query_category, $sql) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);



?>
</div>
<?php 
			}//ebnd if has subbrand
?> 
<!--end subbrands-->

 <?php 
			mysql_select_db($database_sql, $sql);
$query_products = "SELECT *FROM products WHERE active =1 AND NEW = 1". " ORDER BY name" ;
$products = mysql_query($query_products, $sql) or die(mysql_error());
$row_products = mysql_fetch_assoc($products);
$totalRows_products = mysql_num_rows($products);

if ($totalRows_products > 0 ) {
		?>
            <div id=""></div>
      <div class="row" >
      <div  class="col-md-12">
      <h2 id="products">New Products</h2>
        </div>
            <?php
			$i=1;
do {  
$brandtitle ='';
	if ($row_products['brand'] != '') {
			mysql_select_db($database_sql, $sql);
$query_brand = "SELECT * FROM BrandCategory WHERE id = " . $row_products['brand'] ;
$brandname = mysql_query($query_brand, $sql) or die(mysql_error());
$row_brand = mysql_fetch_assoc($brandname);
$brandtitle = $row_brand['title'] ;
}

?> <div class="col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#"  data-toggle="modal" data-title="<?php echo $row_products['name']?>"   data-image="<?php
	  if ($row_products['lrgImg']== '') {
	   echo $row_products['smallImg'];}
	   else{
		   	   echo $row_products['lrgImg'];
		   }
	   
	   ?>" data-caption="<?php echo $brandtitle;?>   <?php echo $row_products['Line'];?>" data-description="<?php echo $row_products['description'];?> <?php if ( $row_products['Price'] != '') {
					echo "$" . $row_products['Price'];}?>" data-target="#image-gallery" data-image-id="<?php echo $i;?>">
       <span class="thumbnail-inner">
                <img class="img-responsive" src="<?php echo $row_products['smallImg']?>" alt="<?php echo $row_subcategory['title']?>">
                </span>
            </a>

            <h5 class="thumbtitle">
			<?php 
		
echo '<span class="brand">' . $brandtitle .' ' . $row_products['Line'] . '</span><br>';
			
			?>
		<?php echo $row_products['name']?><br><small><?php echo $row_products['description']?><br>
            <?php if ( $row_products['Price'] != '') {
					echo "$" . $row_products['Price'];}?></small></h5>
           </div>
            <?php
			$i++;
} while ($row_products = mysql_fetch_assoc($products));
  $rows = mysql_num_rows($products);
  if($rows > 0) {
      mysql_data_seek($products, 0);
	  $row_products = mysql_fetch_assoc($products);
  }
}
?>
            

        
        </div><!-- /.row -->
      

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

