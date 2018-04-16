<?php 
  session_start();
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
<div class="topbar">
<div class="topbar-social">
	<a href="#" class="topbar-social-item fa fa-facebook"></a>
	<a href="#" class="topbar-social-item fa fa-instagram"></a>
	<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
	<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
	<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
</div>

<div class="topbar-child2">
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
</div>

<?php } else { ?>

<div class="topbar">
<div class="topbar-social">
	<a href="#" class="topbar-social-item fa fa-facebook"></a>
	<a href="#" class="topbar-social-item fa fa-instagram"></a>
	<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
	<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
	<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
</div>

<div class="topbar-child2">
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
</div>

<?php } ?>
