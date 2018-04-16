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

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
<div class="container">
<div class="row">

	<div class="col-md-3 p-b-30">
		
	</div>

<div class="col-md-6 p-b-30">
	<form method="post" action="loginprocess.php">
		<h4 class="m-text26 p-b-36 p-t-15">
			LOGIN FORM
		</h4>

		<div class="bo4 of-hidden size15 m-b-20">
			<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cust_email" placeholder="Email Address">
		</div>

		<div class="bo4 of-hidden size15 m-b-20">
			<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="cust_pass" placeholder="Full Name">
		</div>

		<div class="w-size25">
			<!-- Button -->
			<button type="submit" name="login" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
				Send
			</button>
		</div>
	</form>
</div>
</div>
</div>
</section>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>