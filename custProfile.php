<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template

/*
 * Web System :360 Interactive - SMS Service Portal
 * Author     :Chang Ching We
 * Date       :30/04/2023
 */

-->

<?php
//session start
include './include/session.php';
$loginID = $_SESSION['loginId'];
include './include/conn.php';
$query = mysqli_query($connection, "select * from `customer` where cust_id='$loginID'");
$row = mysqli_fetch_array($query);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SMS Service Portal - Customer Profile</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>   
            <h1>SMS Service Portal</h1>
        </div>
        <div>
            <h2>Customer Profile</h2>
        </div>
        <div>
            <table class="table_cust_prof_cust" id="table_cust_prof_cust">
                <tbody>
                    <?php
                    $cust_query = mysqli_query($connection, "select * from `customer` where cust_id='$loginID'");
                    while ($row = mysqli_fetch_array($cust_query)) {
                        ?>
                        <tr>
                            <td>Customer ID</td>
                            <td>:</td>
                            <td><?php echo $row['cust_id']; ?></td>
                        </tr>
                        <tr>
                            <td>Customer Name</td>
                            <td>:</td>
                            <td><?php echo $row['cust_name']; ?></td>
                        </tr>
                        <tr>
                            <td>IC</td>
                            <td>:</td>
                            <td><?php echo $row['cust_ic']; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><?php echo $row['cust_gender']; ?></td>
                        </tr>
                        <tr>
                            <td>Mobile No.</td>
                            <td>:</td>
                            <td><?php echo $row['cust_phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $row['cust_email']; ?></td>
                        </tr>
                        <tr>
                            <td>Company Name</td>
                            <td>:</td>
                            <td><?php echo $row['comp_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Company Phone</td>
                            <td>:</td>
                            <td><?php echo $row['comp_phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Company Address</td>
                            <td>:</td>
                            <td><?php echo $row['comp_address']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div>
            <input type="button" value="Update My Profile" class="button" onclick="window.location.href ='updateProfile.php'"/>
            <input type="button" value="Previous Page" class="button" onclick="window.location.href ='custDashboard.php'"/>
        </div>
        
    <?php
    include('include/footer.php');
    ?>
    
</body>
</html>

<?php
//close connect
mysqli_close($connection);
?>