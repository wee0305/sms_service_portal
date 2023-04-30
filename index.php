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

<html>
    <head>
        <meta charset="UTF-8">
        <title>360 Interactive - SMS Service Portal</title>
        <?php
        include('include/nav.php');
        ?>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h2>SMS Service Portal</h2> 
        </div>
        <div>
            <a href="signUp.php" class="button">New Customer</a><br/>
            <a href="login.php" class="button">Sign in with Existing Account</a><br/>
        </div>
        
        <?php
        include('include/footer.php');
        ?>
    </body>
</html>