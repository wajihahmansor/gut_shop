<?php
    //session_start(); 
    include 'conn.php';

    if(isset($_SESSION['cust_email']))
    {
        $cust_email = $_SESSION['cust_email'];
    
        $sql = "SELECT * FROM customers WHERE cust_email = '$cust_email'";
        $result = mysqli_query($dbcon, $sql);
        $num_result = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($num_result == 1)
        {
            $cust_id = $row['cust_id'];
            $_SESSION['cust_id'] = $cust_id;

            $query = "SELECT COUNT(*) AS cart_now, cart_id FROM cart WHERE cust_id = '$cust_id'";
            $result = mysqli_query($dbcon, $query);
            $cart_now = mysqli_fetch_assoc($result);
            $order_row = mysqli_fetch_array($result);
            $cart_now = $cart_now['cart_now']; 
        }
    }
?> 

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
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(img/bread3.jpg);">
	<h2 class="l-text2 t-center">CART</h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">

<?php
    $product_total = 0;
    $total_session_cart = 0;
    $total_cart = 0;
    $order_total = 0;
?>
	<!-- Cart item -->
	<div class="container-table-cart pos-relative">
		<div class="wrap-table-shopping-cart bgwhite">
			<table class="table-shopping-cart">
				<tr class="table-head">
					<th class="column-1"></th>
					<th class="column-2">Product</th>
					<th class="column-3">Price</th>
					<th class="column-2">Quantity</th>
					<th class="column-5">Total</th>
				</tr>
<?php 

if (isset($_SESSION['cart_now']) && ($_SESSION['cart_now'] != null) && ($_SESSION['cart_now']) != "")
{
foreach($_SESSION['cart_now'] as $food_id => $cart_quantity) 
{
$sql = sprintf("SELECT food_id, food_name, food_price, food_img FROM foods WHERE food_id = %d;", $food_id); 
$result = mysqli_query($dbcon, $sql);
$num_row = mysqli_num_rows($result);

if($num_row > 0)
{
list($food_id, $food_name, $food_price, $food_img) = mysqli_fetch_row($result);
$product_total = sprintf("%01.2f", $food_price * $cart_quantity); 
$total_session_cart = sprintf("%01.2f", $product_total + $total_session_cart);

	echo "<tr class='table-row'>";
	echo "<td class='column-1'>";
	echo "<div class='cart-img-product b-rad-4 o-f-hidden'>";
	echo "<img src='../public/images/$food_img' alt='IMG-PRODUCT'>";
	echo "</div>";
	echo "</td>";
	echo "<td class='column-2'>$food_name</td>";
	echo "<td class='column-3'>RM $food_price</td>";
	echo "<td class='column-2'>$cart_quantity</td>";
	echo "<td class='column-5'>RM $product_total</td>";
	echo "<td><a href='cart-process.php?action=remove&food_id=$food_id'><i class='fa fa-trash-o'></i></a></td></tr>";
	echo "</tr>";

}
}
}

if (isset($_SESSION['cust_id']))
{
$cart_sql = sprintf("SELECT foods.food_id, foods.food_name, foods.food_price, foods.food_img, cart.cart_id, cart.cart_quantity 
					FROM cart INNER JOIN foods
					ON cart.food_id = foods.food_id 
					WHERE cart.cust_id = '%d'", $cust_id);
$cart_result = mysqli_query($dbcon, $cart_sql);
$cart_num_row = mysqli_num_rows($cart_result);
$row = mysqli_fetch_assoc($cart_result);

for($i=0; $i<$cart_num_row; $i++)
{
    $food_id = $row['food_id'];
    $food_img = $row['food_img'];
    $food_price = $row['food_price'];
    $food_name = $row['food_name'];
    $cart_quantity = $row['cart_quantity'];
    $product_total = sprintf("%01.2f", $food_price * $cart_quantity); 
    $total_cart = sprintf("%01.2f", $product_total + $total_cart);
	    echo "<tr class='table-row'>";
		echo "<td class='column-1'>";
		echo "<div class='cart-img-product b-rad-4 o-f-hidden'>";
		echo "<img src='../public/images/$food_img' alt='IMG-PRODUCT'>";
		echo "</div>";
		echo "</td>";
		echo "<td class='column-2'>$food_name</td>";
		echo "<td class='column-3'>RM $food_price</td>";
		echo "<td class='column-4'>$cart_quantity</td>";
		echo "<td class='column-5'>RM $product_total</td>";
		echo "<td><a href='cart-process.php?action=remove&food_id=$food_id'><i class='fa fa-trash-o'></i></a></td></tr>";
		echo "</tr>";
}
}
$order_total = sprintf("%01.2f", $total_session_cart + $total_cart);
?>

				</tr>

			</table>
		</div>
	</div>

	<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
		<div class="flex-w flex-m w-full-sm">
		</div>

		<div class="size10 trans-0-4 m-t-10 m-b-10">
			<!-- Button -->
			<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="location.href='shop.php'">
				Update Cart
			</button>
		</div>
	</div>

	<!-- Total -->
	<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
		<h5 class="m-text20 p-b-24">
			Cart Totals
		</h5>

		<!--  -->
		<div class="flex-w flex-sb-m p-b-12">
			<span class="s-text18 w-size19 w-full-sm">
				Subtotal:
			</span>

			<span class="m-text21 w-size20 w-full-sm">
				RM <?php echo $order_total; ?>
			</span>
		</div>

		<!--  -->
		<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
			<span class="s-text18 w-size19 w-full-sm">
				Delivery
			</span>

			<div class="w-size20 w-full-sm">
				<p class="s-text8 p-b-23">
					RM 
				</p>
			</div>

			<span class="s-text18 w-size19 w-full-sm">
				State Available
			</span>

			<div class="w-size20 w-full-sm">
				<p class="s-text8 p-b-23">
					Kedah
				</p>
			</div>

			<span class="s-text18 w-size19 w-full-sm">
				Country
			</span>

			<div class="w-size20 w-full-sm">
				<select class="selection-2" name="country">
					<option>Select a country...</option>
					<option>Alor Setar</option>
					<option>Kulim</option>
					<option>Sungai Petani</option>
				</select>
			</div>

		</div>

		<!--  -->
		<div class="flex-w flex-sb-m p-t-26 p-b-30">
			<span class="m-text22 w-size19 w-full-sm">
				Total:
			</span>

			<span class="m-text21 w-size20 w-full-sm">
				RM <?php echo $order_total; ?>
			</span>
		</div>

		<?php $_SESSION['order_total'] = $order_total; ?>

		<div class="size15 trans-0-4">
			<!-- Button -->
			<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
				Proceed to Checkout
			</button>
		</div>
	</div>
</div>
</section>

<?php include 'includes/layout/footer.php'; ?>