<?php require('includes/layout/head.php'); ?>
<?php 
    error_reporting(0);
    session_start(); 
    include 'conn.php';

    //function to check if an item exists
    function productExists($food_id) 
    {
        global $dbcon;
        $sql_product = " SELECT * FROM foods";
        $result_product = mysqli_query($dbcon, $sql_product);
        $num_result = mysqli_num_rows($result_product);
        return $num_result > 0;
    }

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
        }
    }

?>

<?php
    $food_id = $_GET['food_id'];   // the product id from the URL 
    $action = $_GET['action'];      // the action from the URL 
    $cart_quantity = $_GET['cart_quantity'];  // quantity of items order
    
     //if there is an item_id and that item_id doesn't exist display an error message
    if($food_id && !productExists($food_id))
    {
        die("Error. Product does not exist.");
    }

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
            switch($action)// decide what to do 
            { 
                case "add":
                    // $_SESSION['cart_now'][$product_id] = $order_quantity;
                    $add_sql = "INSERT INTO cart (food_id, cart_quantity, cust_id) VALUES ('$food_id','$cart_quantity', '$cust_id')";
                    $add_result = mysqli_query($dbcon, $add_sql); 
                    echo "<script>swal('Item does not exist.');history.back();</script>";
                break;

                case "remove":
                    unset($_SESSION['cart_now'][$food_id]);
                    $remove_sql = "DELETE FROM cart WHERE food_id = '$food_id' AND cust_id = '$cust_id'";
                    $remove_result = mysqli_query($dbcon, $remove_sql);
                    echo "<script>swal('Successful deleted!!!');history.back();</script>";
                    //echo $remove_result;
                break;

                case "empty":
                    unset($_SESSION['cart_now']); 
                    $empty_sql = "DELETE FROM cart WHERE cust_id = '$cust_id'";
                    $empty_result = mysqli_query($dbcon, $empty_sql);   
                break;
            }
        }
    }

    else
    {
       switch($action) // decide what to do 
        { 
            case "add":
                $_SESSION['cart_now'][$food_id] = $cart_quantity;
                echo '<script>swal("Good job!", "You clicked the button!", "success");history.back();</script>';
            break;

            case "remove":
                unset($_SESSION['cart_now'][$food_id]);
                echo "<script>swal('Noted!', 'Removed from cart.', 'danger');history.back();</script>";
            break;

            case "empty":
                unset($_SESSION['cart_now']); 
                echo "<script>swal('Okay', 'Your cart is empty.', 'success');history.back();</script>";
            break;
        } 
    }
    //header("Location:cart.php");
    //echo "<script>swal('Successful added to cart!!!'); window.location='cart.php'</script>";
    //header("Location:cart_view");   // print_r($_SESSION['cart_now']);
?>


</html>