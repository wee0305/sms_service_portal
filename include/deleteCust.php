<?php

/*
 * Web System :360 Interactive - SMS Service Portal
 * Author     :Chang Ching We
 * Date       :30/04/2023
 */

   $cust_id = $_GET['cust_id'];
   include('conn.php');
           
    echo "<script language='javascript'>";
    mysqli_query($connection, "delete from `msg_trans` where cust_id='$cust_id'");
    mysqli_query($connection, "delete from `customer` where cust_id='$cust_id'");
    echo "alert('Customer Account and Message Transactions has been permanently deleted.');";
    echo "location.href = '../admDashboard.php';";
    echo "</script>";
?>