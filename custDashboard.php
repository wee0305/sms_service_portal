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
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SMS Service Portal - Customer Dashboard</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1>SMS Service Portal</h1>
        </div>
        
        <div>
            <h2>Customer DashBoard</h2>            
        </div>
        
        <div>
            <a href="custProfile.php" class="button">View My Profile</a><br/>
            <a href="msgService.php" class="button">Send SMS</a>
            <a class="button" onclick="logout()">Log Out</a>
        </div>
        
        <?php
        include('include/footer.php');
        ?>
        
    </body>
</html>

<script>
    function logout() {
        if (confirm("Continue to log out?")) {
            window.location.href = "index.php";
        }
    }
</script>

<?php
//close connect
mysqli_close($connection);
?>


                   
