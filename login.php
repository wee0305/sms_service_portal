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

<!-- login -->
<?php
//connect sms_service_db
include 'include/conn.php';

$loginId = $psw = $errMsgID = $errMsgPsw = "";

if (isset($_POST['login'])) {

    $loginId = isset($_POST['loginId']) ? trim($_POST['loginId']) : null;
    $psw = isset($_POST['psw']) ? trim($_POST['psw']) : null;
    $adminSql = "SELECT stf_id, stf_pswd FROM staff WHERE stf_id = '$loginId' AND stf_pswd = '$psw'";
    $customerSql = "SELECT cust_id, cust_pswd FROM customer WHERE cust_id = '$loginId' AND cust_pswd = '$psw'";

    //id
    if ($loginId == "" || $loginId == null) {
        $errMsgID = "* Please enter your id!";
    }

    if ($psw == "" || $psw == null) {
        $errMsgPsw = "* Please enter your password!";
    }

    $test = "";
    //if errMsg is empty, then proceed to this, else will display error message
    if (empty($errMsgID) && empty($errMsgPsw)) {
        //combine string and num to one variable
        $id = substr($loginId, 0, 2);

        //check whether is admin login or member login
        if ($id == "AD") { //admin login
            $sql = mysqli_query($connection, $adminSql);
            $row = mysqli_fetch_assoc($sql);
            if (mysqli_num_rows($sql) === 1) {
                if ($row['stf_id'] === $loginId && $row['stf_pswd'] === $psw) {
                    session_start();
                    $_SESSION['loginId'] = $_POST['loginId'];
                    $loginID = $_SESSION['loginId'];
                    $name = $stf_name = "";
                    $selectCommand = "SELECT stf_name FROM staff WHERE stf_id = '$loginID'";
                    $result = mysqli_query($connection, $selectCommand);
                    while ($name = mysqli_fetch_array($result)) {
                        $stf_name = $name['stf_name'];
                    }
                    echo "<script>alert('Welcome $stf_name, let\'s proceed to Admin Dashboard!')</script>";
                    echo "<script type='text/javascript'>window.location.replace('admDashboard.php') </script>";
                } else {
                    $errMsgID = "* Invalid ID!";
                    $errMsgPsw = "* Invalid Password!";
                }
            } else {
                $errMsgID = "* Invalid ID!";
                $errMsgPsw = "* Invalid Password!";
            }
        } else { //member login
            $sql = mysqli_query($connection, $customerSql);
            $row = mysqli_fetch_assoc($sql);
            if (mysqli_num_rows($sql) === 1) {
                if ($row['cust_id'] === $loginId && $row['cust_pswd'] === $psw) {
                    session_start();
                    $_SESSION['loginId'] = $_POST['loginId'];
                    $loginID = $_SESSION['loginId'];
                    $name = $cust_name = "";
                    $selectCommand = "SELECT cust_name FROM customer WHERE cust_id = '$loginID'";
                    $result = mysqli_query($connection, $selectCommand);
                    while ($name = mysqli_fetch_array($result)) {
                        $cust_name = $name['cust_name'];
                    }
                    echo "<script>alert('Welcome $cust_name, let\'s proceed to Customer Dashboard!')</script>";
                    echo "<script type='text/javascript'>window.location.replace('custDashboard.php') </script>";
                } else {
                    $errMsgID = "* Invalid ID!";
                    $errMsgPsw = "* Invalid Password!";
                }
            } else {
                $errMsgID = "* Invalid ID!";
                $errMsgPsw = "* Invalid Password!";
            }
        }
    }
}
?>

<html>  
    <head>  
        <meta charset="UTF-8">
        <title>SMS Service Portal - Login</title>
        <?php
        include('include/nav.php');
        ?>
        <link rel="stylesheet" href="css/style.css">
    </head>  

    <body>  

        <div>  
            <form action = "login.php" method = "POST">
                <div>
                    <h1>Login</h1>  
                </div>
                <div>  
                    <label> User ID </label><br>
                    <input type="text" name="loginId" value="<?php echo $loginId ?>" placeholder="id">
                </div>
                <?php
                if (isset($errMsgID)) {
                    echo "<div class='error'>" . $errMsgID . "</div>";
                }
                ?>
                <br/>
                <div>  
                    <label> Password </label><br>
                    <input type="password" name="psw" placeholder="Password">
                </div>
                <?php
                if (isset($errMsgID)) {
                    echo "<div class='error'>" . $errMsgPsw . "</div>";
                }
                ?>
                <br/>
                <div>     
                    <input type ="submit" value = "Login" name="login" class="button"/> 
                    <input type="reset" value="Cancel" class="button_cxl"/>
                    <input type="button" value="Back To Home" onclick="window.location.href = 'index.php'" class="button"/>
                </div>  
            </form>  
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
