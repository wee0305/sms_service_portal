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
include('include/conn.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SMS Service Portal - Sign Up</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1>Sign Up Form</h1>
        </div>
        <div id="div_sign_up">
            <!-- Input form -->
            <form action="include/insertCustDetails.php" method="POST">
                <table class="table_sign_up" id="table_sign_up">
                    <tr>
                        <td>Name*</td>
                        <td>
                            <input type="text" name="cust_name" maxlength="50" size="30" placeholder="Your name" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>IC*</td>
                        <td>
                            <input type="text" name="cust_ic" maxlength="14" size="30" placeholder="XXXXXX-XX-XXXX" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender*</td>
                        <td>                       
                            <input type="radio" name="cust_gender" value="M" required/>
                            <label>Male</label>
                            <input type="radio" name="cust_gender" value="F" required/>
                            <label>Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile Phone*</td>
                        <td>
                            <input type="text" name="cust_phone" maxlength="13" size="30" placeholder="01x-12345678" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Email*</td>
                        <td>
                            <input type="text" name="cust_email" maxlength="30" size="30" placeholder="your-email@mail.com" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Password*</td>
                        <td>
                            <input type="text" name="cust_pswd" maxlength="16" size="30" placeholder="8 - 16 alpha-numeric combination" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Company Name*</td>
                        <td>
                            <input type="text" name="comp_name" maxlength="30" size="30" placeholder="ABC Sdn Bhd" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Office Phone*</td>
                        <td>
                            <input type="text" name="comp_phone" maxlength="13" size="30" placeholder="03-12345678" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Company Address*</td>
                        <td>
                            <input type="text" name="comp_address" maxlength="100" size="30" placeholder="Your company address" required/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn_row">
                                <input type="submit" value="Submit" class="button"/>
                                <input type="reset" value="Cancel" class="button_cxl"/>
                                <input type="button" value="Back To Home" onclick="window.location.href = 'index.php'" class="button"/>                                
                            </div>
                        </td>
                    </tr>
                </table>
            </form>            
        </div>
    </body>
</html>                      

<?php
//close connect
mysqli_close($connection);
?>
