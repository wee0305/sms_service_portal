<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

/*
 * Web System :360 Interactive - SMS Service Portal
 * Author     :Chang Ching We
 * Date       :30/04/2023
 */

//session start
session_start();
if(!isset($_SESSION['loginId'])){
    echo "<h1>Warning!!</h1>";
    echo "<h2>No permission allowed to access this page!</h2>";
    echo "<a href='index.php'>Home Page</a>";
    exit();
}
