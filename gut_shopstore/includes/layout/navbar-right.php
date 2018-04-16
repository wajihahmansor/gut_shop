<!-- Header Mobile -->
<div class="wrap_header_mobile">
<!-- Logo moblie -->
<a href="index.html" class="logo-mobile">
<img src="img/logos.png" alt="IMG-LOGO">
</a>

<!-- Button show menu -->
<div class="btn-show-menu">
<!-- Header Icon mobile -->
<div class="header-icons-mobile">

<?php 
  //session_start();
  include 'conn.php'; 
  if(isset($_SESSION['cust_email']))
  {
    $cust_email = $_SESSION['cust_email'];

    $query = "SELECT * FROM customers WHERE cust_email = '$cust_email'";
    $result = mysqli_query($dbcon, $query);
    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);
    if ($num == 1)
    {
      $cust_name = $row['cust_name'];
      $cust_id = $row['cust_id'];
      $_SESSION['cust_id'] = $cust_id;

      $query = "SELECT COUNT(food_id) AS cart_now FROM cart WHERE cust_id = '$cust_id'";
      $result = mysqli_query($dbcon, $query);
      $cart = mysqli_fetch_assoc($result);
      $cart_now = $cart['cart_now'];
    }
    
?>

<div class="header-wrapicon1">
<img src="img/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
<!-- Header cart noti -->
<div class="header-cart header-dropdown">

<div class="header-cart-buttons">
<div class="header-cart-wrapbtn">
	<!-- Button -->
	<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
		Profile
	</a>
</div>

<div class="header-cart-wrapbtn">
	<!-- Button -->
	<a href="logout.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
		Logout
	</a>
</div>
</div>
</div>
</div>

<?php } else { ?>

<div class="header-wrapicon1">
<img src="img/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
<!-- Header cart noti -->
</div>

<?php } ?>

<span class="linedivide2"></span>

<div class="header-wrapicon2">
<img src="img/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
<span class="header-icons-noti">
<?php 
if (isset($_SESSION['cust_email']))
{
$count_cart = 0;
if (isset($_SESSION['cart_now']) && ($_SESSION['cart_now'] != null) && ($_SESSION['cart_now']) != "")
{
  $count_cart = count($_SESSION['cart_now']) + $cart_now;
  echo $count_cart;
}
else
{
  $count_cart = $cart_now;
  echo $count_cart;
}
}
else
{
echo count(@$_SESSION['cart_now']);
}
?>
</span>

<!-- Header cart noti -->
<div class="header-cart header-dropdown">


<div class="header-cart-buttons">
<div class="header-cart-wrapbtn">
<!-- Button -->
<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
	View Cart
</a>
</div>

<div class="header-cart-wrapbtn">
<!-- Button -->
<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
	Check Out
</a>
</div>
</div>
</div>
</div>
</div>

<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</div>
</div>
</div>


<?php 
  //session_start();
  include 'conn.php'; 
  if(isset($_SESSION['cust_email']))
  {
    $cust_email = $_SESSION['cust_email'];

    $query = "SELECT * FROM customers WHERE cust_email = '$cust_email'";
    $result = mysqli_query($dbcon, $query);
    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);
    if ($num == 1)
    {
      $cust_name = $row['cust_name'];
      $cust_id = $row['cust_id'];
      $_SESSION['cust_id'] = $cust_id;

      $query = "SELECT COUNT(food_id) AS cart_now FROM cart WHERE cust_id = '$cust_id'";
      $result = mysqli_query($dbcon, $query);
      $cart = mysqli_fetch_assoc($result);
      $cart_now = $cart['cart_now'];
    }
    
?>
<!-- Menu Mobile -->
<div class="wrap-side-menu" >
<nav class="side-menu">
<ul class="main-menu">

<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
	<div class="topbar-child2-mobile">
		<span class="topbar-email">
			<?php echo $cust_name; ?> |
		</span>

		<div class="topbar-language rs1-select2">
			<select class="selection-1" name="time">
				<option>MYR</option>
				<option>USD</option>
				<option>EUR</option>
			</select>
		</div>
	</div>
</li>

<li class="item-topbar-mobile p-l-10">
	<div class="topbar-social-mobile">
		<a href="#" class="topbar-social-item fa fa-facebook"></a>
		<a href="#" class="topbar-social-item fa fa-instagram"></a>
		<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
		<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
		<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
	</div>
</li>
</ul>
</nav>
</div>

<?php } else { ?>

<div class="wrap-side-menu" >
<nav class="side-menu">
<ul class="main-menu">

<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
	<div class="topbar-child2-mobile">
		<span class="topbar-email">
			<a href="login.php">Login</a> | <a href="register.php">Register</a> 
		</span>

		<div class="topbar-language rs1-select2">
			<select class="selection-1" name="time">
				<option>MYR</option>
				<option>USD</option>
				<option>EUR</option>
			</select>
		</div>
	</div>
</li>

<li class="item-topbar-mobile p-l-10">
	<div class="topbar-social-mobile">
		<a href="#" class="topbar-social-item fa fa-facebook"></a>
		<a href="#" class="topbar-social-item fa fa-instagram"></a>
		<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
		<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
		<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
	</div>
</li>
</ul>
</nav>
</div>

<?php } ?>