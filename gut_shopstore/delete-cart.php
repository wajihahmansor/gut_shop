<?php
  ob_start();
  include("cart.php");
  if(isset($_GET['food_id'])!="")
  {
  $delete=$_GET['food_id'];
  $delete=mysqli_query("DELETE FROM foods WHERE food_id='$delete'");
  if($delete)
  {
      header("Location:cart.php");
  }
  else
  {
      echo mysqli_error();
  }
  }
  ob_end_flush();
?>