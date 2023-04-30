<?php

/*
 * Web System :360 Interactive - SMS Service Portal
 * Author     :Chang Ching We
 * Date       :30/04/2023
 */

    include('conn.php');
    
    $cust_email = $_POST['cust_email'];
    $cust_pswd = $_POST['cust_pswd'];

    //to prevent from mysqli injection  
    $cust_email = stripcslashes($cust_email);
    $cust_pswd = stripcslashes($cust_pswd);
    $cust_email = mysqli_real_escape_string($connection, $cust_email);
    $cust_pswd = mysqli_real_escape_string($connection, $cust_pswd);

    $sql = "select * from customer where cust_email = '$cust_email' and cust_pswd = '$cust_pswd'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        header('location:custDashboard.php');
    } else {
        echo "<h1> Login failed. Invalid email or password.</h1>";
    }
?>  