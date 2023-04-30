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
$cust_id = $_GET['cust_id'];
$query = mysqli_query($connection, "select * from `customer` where cust_id='$cust_id'");
$row = mysqli_fetch_array($query);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SMS Service Portal - Message List</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1>SMS Service Portal</h1>  
        </div>
        <div>
            <h2>Customer Message List</h2>  
        </div>
        <div>
            <table class="table_msg_list" id="table_msg_list">
                <thead>
                <th>Transaction ID</th>
                <th>Created Date</th>
                <th>Created Time</th>
                <th>Sender Phone</th>
                <th>Receipient Phone</th>
                <th>Message Content</th>
                </thead>
                <tbody>
                    <?php
                    $cust_query = mysqli_query($connection, "select * from `msg_trans` where cust_id='$cust_id'");
                    while ($row = mysqli_fetch_array($cust_query)) {
                        ?>

                        <tr>
                            <td><?php echo $row['trans_id']; ?></td>
                            <td><?php echo $row['created_date']; ?></td>
                            <td><?php echo $row['created_time']; ?></td>
                            <td><?php echo $row['sender_phone']; ?></td>
                            <td><?php echo $row['receipient_phone']; ?></td>
                            <td><?php echo $row['msg_content']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div>
            <input type="button" value="Previous Page" onclick="window.location.href = 'admDashboard.php'" class="button_back"/>                           
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