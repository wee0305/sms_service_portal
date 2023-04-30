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


<?php
$query = mysqli_query($connection, "select cust_phone from `customer` where cust_id='$loginID'");
$cust_phone = "";
while ($row = mysqli_fetch_array($query)) {
    $cust_phone = $row['cust_phone'];
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SMS Service Portal - Send SMS</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1>Send New Message</h1>           
        </div>
        <?php 
        $database = mysqli_select_db($connection, DB_DATABASE);

        /* Ensure that the customer table exists. */
        VerifyMessageTable($connection, DB_DATABASE);

        /* Initialize the key*/
        $sender_phone = "";
        $receipient_phone = "";
        $msg_content = "";
        

        /* If input fields are populated, add a row to the Message Transaction table. */
        if(isset($_POST['sender_phone'])) {
            $sender_phone = htmlentities($_POST['sender_phone']);
        }
        
        if(isset($_POST['receipient_phone'])) {
            $receipient_phone = htmlentities($_POST['receipient_phone']);
        }
        
        if(isset($_POST['msg_content'])) {
            $msg_content = htmlentities($_POST['msg_content']);
        }
        
        if (strlen($sender_phone) || strlen($receipient_phone) || strlen($msg_content)) {
            AddMsgTrans($connection, $sender_phone, $receipient_phone, $msg_content);
        }
        ?>

        <!-- Input form -->
        <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
            <table class="table_msg_service">
                <tr>
                    <td>Sender's Phone</td>
                    <td>
                        <?php echo $cust_phone ?>
                    </td>
                </tr>
                <tr>
                    <td>Receipient's Phone</td>
                    <td>
                        <input type="text" name="receipient_phone" maxlength="13" size="30" placeholder="01x-12345678" required/>
                    </td>
                </tr>
                <tr>
                    <td>Message Content</td>
                    <td>
                        <textarea rows="4" cols="70" name="msg_content" placeholder="Enter message here..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="btn_row">
                            <input type="submit" value="Submit" class="button"/>
                            <input type="reset" value="Cancel" class="button_cxl"/>
                            <input type="button" value="Previous Page" class="button" onclick="window.location.href = 'custDashboard.php'"/>
                            <input type="hidden" name="sender_phone" value="<?php $cust_phone ?>"/>
                        </div>
                    </td>
                </tr>  
            </table>
        </form>

        <!-- Display table data. -->
        <table class="table_msg_list_cust" id="table_msg_list_cust">
            <tr>

                <th>Transaction ID</th>
                <th>Created Date</th>
                <th>Created Time</th>
                <th>Sender's Phone</th>
                <th>Receipient's Phone</th>
                <th>Message Content</th>
            </tr>

            <?php
            $result = mysqli_query($connection, "SELECT * FROM msg_trans where cust_id='$loginID'");

            while ($query_data = mysqli_fetch_row($result)) {
                echo "<tr>";
                echo "<td>", $query_data[0], "</td>",
                "<td>", $query_data[1], "</td>",
                "<td>", $query_data[2], "</td>",
                "<td>", $query_data[3], "</td>",
                "<td>", $query_data[4], "</td>",
                "<td>", $query_data[5], "</td>";
                echo "</tr>";
            }
            ?>

        </table>

        <?php
        include('include/footer.php');
        ?>
        
        <!-- Clean up. -->
        <?php
        mysqli_free_result($result);
        ?>
    </body>
</html>


<?php
/* Add message content to the table. */

function AddMsgTrans($connection, $sender_phone, $receipient_phone, $msg_content) {
    $loginID = $_SESSION['loginId'];
    $query = mysqli_query($connection, "select cust_phone from `customer` where cust_id='$loginID'");

    while ($row = mysqli_fetch_array($query)) {
        $sender_phone = $row['cust_phone'];
    }

    $sp = mysqli_real_escape_string($connection, $sender_phone);
    $rp = mysqli_real_escape_string($connection, $receipient_phone);
    $mc = mysqli_real_escape_string($connection, $msg_content);

    // Set the default timezone to Kuala Lumpur
    date_default_timezone_set('Asia/Kuala_Lumpur');

    // Get the current date and time in the New York timezone
    $current_date = date('Y-m-d');
    $current_time = date('H:i:s');
        
    $query = "INSERT INTO msg_trans (created_date,created_time, sender_phone, receipient_phone, msg_content, cust_id) VALUES ('$current_date','$current_time', '$sp', '$rp', '$mc', '$loginID');";

    if (!mysqli_query($connection, $query))
        echo("<p>Error adding message data.</p>");
}

/* Check whether the table exists and, if not, create it. */

function VerifyMessageTable($connection, $dbName) {
    if (!TableExists("msg_trans", $connection, $dbName)) {
        $query = "CREATE TABLE msg_trans (
        trans_id int(11) AUTO_INCREMENT PRIMARY KEY,
        created_date date NOT NULL,
        created_time time NOT NULL,
        sender_phone varchar(14) NOT NULL,
        receipient_phone varchar(14) NOT NULL,
        msg_content varchar(200) NOT NULL,
        cust_id int(11) NOT NULL
        )";

        if (!mysqli_query($connection, $query))
            echo("<p>Error creating table.</p>");
    }
}

/* Check for the existence of a table. */

function TableExists($tableName, $connection, $dbName) {
    $t = mysqli_real_escape_string($connection, $tableName);
    $d = mysqli_real_escape_string($connection, $dbName);

    $checktable = mysqli_query($connection,
            "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

    if (mysqli_num_rows($checktable) > 0)
        return true;

    return false;
}
?>

<?php
//close connect
mysqli_close($connection);
?>
