<?php include 'conn.php'; ?>
<?php include 'includes/layout/head.php'; ?>
<body class="animsition">

<!-- Header -->
<header class="header1">
<!-- Header desktop -->
<div class="container-menu-header">
<?php include 'includes/layout/topbar.php'; ?>
<?php include 'includes/layout/navbar-left.php'; ?>
</div>
<?php include 'includes/layout/navbar-right.php'; ?>
</header>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(img/crepes.jpg);">
	<h2 class="l-text2 t-center">
		CREPE
	</h2>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
<?php include 'includes/layout/category.php'; ?>

<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

<!-- Product -->
<div class="row">

<?php
include "conn.php";
$query = "SELECT * FROM foods WHERE cat_id='4'";
if($result = mysqli_query($dbcon, $query))
{ 
$product_list = '';
$cart_quantity = 1;

//fetch results set as object and output HTML
while($row = mysqli_fetch_object($result))
{
  	$product_list .= <<<EOT

<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
<form method="get" action="cart-process.php">
<!-- Block2 -->
<div class="block2">
<div class="block2-img wrap-pic-w of-hidden pos-relative">
<img src="../public/images/{$row->food_img}" alt="{$row->food_name}">

<div class="block2-overlay trans-0-4">
	<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
		<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
		<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
	</a>

	<div class="block2-btn-addcart w-size1 trans-0-4">
		<!-- Button -->
		<input type="hidden" name="cart_quantity" value="$cart_quantity"/>
		<input type="hidden" name="food_id" value="{$row->food_id}"/>
		<input type="hidden" name="action" value="add"/>
		<button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
			Add to Cart
		</button>
	</div>
</div>
</div>

<div class="block2-txt p-t-20">
<a href="product-detail.php?food_id={$row->food_id}" class="block2-name dis-block s-text3 p-b-5">
	{$row->food_name}
</a>

<span class="block2-price m-text6 p-r-5">
	RM {$row->food_price}
</span>
</div>
</div>
</form>
</div>
EOT;
}
$product_list .= '';
echo $product_list;
}
?>

</div>

<!-- Pagination -->
<!--<div class="pagination flex-m flex-w p-t-26">
	<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
	<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
</div>-->
</div>
</div>
</div>
</section>


<?php include 'includes/layout/footer.php' ?>