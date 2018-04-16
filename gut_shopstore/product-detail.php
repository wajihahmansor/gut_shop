
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


<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
<a href="index.html" class="s-text16">
	Home
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<a href="shop.php" class="s-text16">
	Shop
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<span class="s-text17">
	Food Detail
</span>
</div>


<?php
//to retrived data
include 'conn.php';
if (isset($_GET['food_id']))
    $food_id = $_GET['food_id'];
else
    $food_id = 0;

$query = "SELECT foods.food_id, foods.food_name, foods.food_img, foods.food_description, foods.food_highlight, foods.food_ingredient, foods.food_price, foods.cat_id, category.cat_id, category.cat_name FROM foods INNER JOIN category ON foods.cat_id=category.cat_id WHERE food_id = '$food_id'";
$result = mysqli_query($dbcon, $query);
$row = mysqli_fetch_assoc($result);
$food_id = $row['food_id'];
$cat_id = $row['cat_id'];
$food_highlight = $row['food_highlight'];
$food_description = $row['food_description'];
$food_ingredient = $row['food_ingredient'];
?> 


<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
<div class="flex-w flex-sb">
<div class="w-size13 p-t-30 respon5">
<div class="wrap-slick3 flex-sb flex-w">
<div class="wrap-slick3-dots"></div>

	<div class="wrap-pic-w">
		<img src="../public/images/<?php echo $row['food_img']; ?>" alt="<?php echo $row['food_name']; ?>">
	</div>
</div>
</div>

<div class="w-size14 p-t-30 respon5">
<h4 class="product-detail-name m-text16 p-b-13">
<?php echo $row['food_name']; ?>
</h4>

<span class="m-text17">
RM <?php echo $row['food_price']; ?>
</span>

<p class="s-text8 p-t-10">
<?php echo $row['food_highlight']; ?>
</p>

<!--  -->
<div class="p-t-33 p-b-60">

<form method="get" action="cart-process.php">
<div class="flex-r-m flex-w p-t-10">
	<div class="w-size16 flex-m flex-w">
		<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
		
			<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
				<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
			</button>

			<input value="1" class="size8 m-text18 t-center num-product" type="number" name="cart_quantity">

			<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
				<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
			</button>
		
		</div>

		<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
			<!-- Button -->
			<input type="hidden" name="food_id" value="<?php echo $food_id ?>">
             <input type="hidden" name="action" value="add">
			<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
				Add to Cart
			</button>
		</div>
	</div>
</div>
</form>
</div>

<div class="p-b-45">
<span class="s-text8">Categories: <?php echo $row['cat_name']; ?></span>
</div>

<!--  -->
<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
	Description
	<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
	<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
</h5>

<div class="dropdown-content dis-none p-t-15 p-b-23">
	<p class="s-text8">
		<?php echo $row['food_description']; ?>
	</p>
</div>
</div>

<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
	Ingredients
	<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
	<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
</h5>

<div class="dropdown-content dis-none p-t-15 p-b-23">
	<p class="s-text8">
		<?php echo $row['food_ingredient']; ?>
	</p>
</div>
</div>

</div>
</div>
</div>

<div style="padding-top: 10%;"></div>
<?php include 'includes/layout/footer.php'; ?>