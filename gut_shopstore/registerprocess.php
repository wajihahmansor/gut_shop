<?php
    session_start();
    include("conn.php");
    if(isset($_POST['register']))
    {
        $cust_name = stripslashes(ucwords($_POST['cust_name']));
        $cust_name = mysqli_real_escape_string($dbcon, $cust_name);
        $cust_email = stripslashes($_POST['cust_email']);
        $cust_email = mysqli_real_escape_string($dbcon, $cust_email);
        $cust_pass = stripslashes($_POST['cust_pass']);
        $cust_pass = mysqli_real_escape_string($dbcon, $cust_pass);
        
        $query = "INSERT INTO customers (cust_name, cust_email, cust_pass, created_at)
                  VALUES('$cust_name', '$cust_email', '".md5($cust_pass)."', now())";
        $result = mysqli_query($dbcon, $query);
        if($result)
        {
            echo "<script>swal('You are registered!');</script>";  
            echo "<script>window.open('login.php', '_self')</script>";
        }
        else
        {
            //echo $result;
            echo "<script>swal('Ops, something went wrong...');</script>";  
            echo "<script>window.open('register.php', '_self')</script>";
        }
    }
?>