<?php
    session_start();
    include("conn.php");
    if(isset($_POST['login']))
    {
        $cust_email = stripslashes($_POST['cust_email']);
        $cust_email = mysqli_real_escape_string($dbcon, $cust_email);
        $cust_pass = stripslashes($_POST['cust_pass']);
        $cust_pass = mysqli_real_escape_string($dbcon, $cust_pass);

        // check if user exist 
        $check = "SELECT * FROM customers WHERE cust_email='$cust_email' AND cust_pass='".md5($cust_pass)."'";
        $result = mysqli_query($dbcon, $check);
        $row = mysqli_fetch_array($result);
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            //echo "<script>swal('Good job!','You are login!', 'success'); window.location='../index'</script>";
            echo "<script>swal('You are login!');</script>";         
            echo "<script>window.open('index.php','_self')</script>";

            $_SESSION['cust_email'] = $cust_email;
            $cust_id = $row['cust_id'];
            $_SESSION['cust_id'] = $cust_id;
            if ($_SESSION['cart_now'])
            {
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
        else
        {
            //echo "<script>swal('Ops!','Invalid email or password.', 'warning'); window.location='../index'</script>";
            echo "<script>swal('Invalid email or password!');</script>";  
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>