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

if (isset($_SESSION['loginId'])) {
    $selectCommand = "SELECT * FROM `customer` WHERE cust_id='$loginID'";
    $result = mysqli_query($connection, $selectCommand);

    if ($result->num_rows == 1) {
        $customer = mysqli_fetch_object($result);

        $cust_id = $customer->cust_id;
        $cust_name = $customer->cust_name;
        $cust_ic = $customer->cust_ic;
        $cust_gender = $customer->cust_gender;
        $cust_phone = $customer->cust_phone;
        $cust_email = $customer->cust_email;
        $cust_pswd = $customer->cust_pswd;
        $comp_name = $customer->comp_name;
        $comp_phone = $customer->comp_phone;
        $comp_address = $customer->comp_address;
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SMS Service Portal - Update Customer Profile</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1>Update My Profile</h1>
        </div>
        <div id="div_update_profile">
            <!-- Input form -->
            <form action="include/updateCustDetails.php" method="POST">
                <table class="table_update_profile" id="table_update_profile">
                    <tr>
                        <td>Customer ID</td>
                        <td>
                            <?php echo $cust_id; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Name*</td>
                        <td>
                            <input type="text" name="cust_name" maxlength="50" size="30" value="<?php echo $cust_name; ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>IC*</td>
                        <td>
                            <input type="text" name="cust_ic" maxlength="14" size="30" value="<?php echo $cust_ic; ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender*</td>
                        <td>                       
                            <input type="radio" name="cust_gender" value="M" <?php echo ($cust_gender == "M") ? "checked='true'" : ""; ?> required/>
                            <label>Male</label>
                            <input type="radio" name="cust_gender" value="F" <?php echo ($cust_gender == "F") ? "checked='true'" : ""; ?> required/>
                            <label>Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile Phone*</td>
                        <td>
                            <input type="text" name="cust_phone" maxlength="13" size="30" value="<?php echo $cust_phone; ?>"required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Email*</td>
                        <td>
                            <input type="text" name="cust_email" maxlength="30" size="30" value="<?php echo $cust_email; ?>"required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Password*</td>
                        <td>
                            <input type="text" name="cust_pswd" maxlength="16" size="30" value="<?php echo $cust_pswd; ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Company Name*</td>
                        <td>
                            <input type="text" name="comp_name" maxlength="30" size="30" value="<?php echo $comp_name; ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Office Phone*</td>
                        <td>
                            <input type="text" name="comp_phone" maxlength="13" size="30" value="<?php echo $comp_phone; ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Company Address*</td>
                        <td>
                            <input type="text" name="comp_address" maxlength="100" size="30" value="<?php echo $comp_address; ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn_row">
                                <input type="submit" value="Update" name="update" class="button"/>
                                <input type="reset" value="Cancel" class="button_cxl"/>
                                <input type="button" value="Previous Page" onclick="window.location.href = 'custDashboard.php'" class="button"/>                                
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
