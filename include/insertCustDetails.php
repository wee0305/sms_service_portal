<?php

/*
 * Web System :360 Interactive - SMS Service Portal
 * Author     :Chang Ching We
 * Date       :30/04/2023
 */
    include('conn.php');

    $cust_name = $_POST['cust_name'];
    $cust_ic = $_POST['cust_ic'];
    $cust_gender = $_POST['cust_gender'];
    $cust_phone = $_POST['cust_phone'];
    $cust_email = $_POST['cust_email'];
    $cust_pswd = $_POST['cust_pswd'];
    $comp_name = $_POST['comp_name'];
    $comp_phone = $_POST['comp_phone'];
    $comp_address = $_POST['comp_address'];

    mysqli_query($connection, "INSERT INTO `customer` (cust_name, cust_ic, cust_gender, cust_phone, cust_email, cust_pswd, comp_name, comp_phone, comp_address) values ('$cust_name','$cust_ic','$cust_gender','$cust_phone','$cust_email', '$cust_pswd', '$comp_name', '$comp_phone', '$comp_address')");

    $query = "SELECT cust_id FROM customer ORDER BY cust_id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $cust_id = $row['cust_id'];
    
    echo "<script language='javascript'>\r\n";
    echo "alert('Successfully Registered. Your User ID is " . $cust_id . ". Please login your account to enjoy the services!');\r\n";
    echo "console.log('Redirecting to login.php...');\r\n";
    echo "location.href = '../login.php';\r\n";
    echo "</script>";
    exit();
?>