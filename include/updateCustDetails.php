<?php

/*
 * Web System :360 Interactive - SMS Service Portal
 * Author     :Chang Ching We
 * Date       :30/04/2023
 */

    include 'session.php';
    $loginID = $_SESSION['loginId'];
    include('conn.php');

    if(isset($_POST['update'])) {
        $cust_name = $_POST['cust_name'];
        $cust_ic = $_POST['cust_ic'];
        $cust_gender = $_POST['cust_gender'];
        $cust_phone = $_POST['cust_phone'];
        $cust_email = $_POST['cust_email'];
        $cust_pswd = $_POST['cust_pswd'];
        $comp_name = $_POST['comp_name'];
        $comp_phone = $_POST['comp_phone'];
        $comp_address = $_POST['comp_address'];
    }
    
    $editCommand = "UPDATE `customer` SET `cust_name`='$cust_name', `cust_ic`='$cust_ic', `cust_gender`='$cust_gender', `cust_phone`='$cust_phone', `cust_email`='$cust_email', `cust_pswd`='$cust_pswd', `comp_name`='$comp_name', `comp_phone`='$comp_phone', `comp_address`='$comp_address' WHERE cust_id='$loginID'";
    $result = mysqli_query($connection, $editCommand);

    // Check if the query is successful
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }
    
    echo "<script language='javascript'>\r\n";
    echo "alert('User profile updated.');\r\n";
    echo "console.log('Redirecting to custProfile.php...');\r\n";
    echo "location.href = '../custProfile.php';\r\n";
    echo "</script>";
    exit();
?>