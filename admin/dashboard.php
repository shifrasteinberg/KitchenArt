<?php include('header.php'); ?>
<?php 

if (isset($_GET['delete'])) {
	echo '<div class="alert alert-success">Your information has been deleted</div>';
	}
?>
<p><a href="InsertCategory.php">Categories</a></p>
<p><a href="InsertSubcategory.php"> Subcategories</a></p>
<p><a href="InsertBrands.php">Brand Listing</a></p>
<p><a href="InsertSubBrands.php"> Brand Subcategories</a></p>
<p><a href="InsertProduct.php">Product Listing </a></p>
<?php include('footer.php'); ?>