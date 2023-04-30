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
        <title>SMS Service Portal - Admin Dashboard</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1>SMS Service Portal</h1>
        </div>
        <div>
            <h2>Admin DashBoard</h2>
        </div>
        
        <div>
            <a href="index.php" class="button_logout">Log Out</a>
        </div>

        <div>
            <table class="table_cust_list" id="table_cust_list">
                <thead>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Company Name</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    include('include/conn.php');
                    $query = mysqli_query($connection, "select * from `customer`");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $row['cust_id']; ?></td>
                            <td><?php echo $row['cust_name']; ?></td>
                            <td><?php echo $row['comp_name']; ?></td>
                            <td>
                                <a href="viewCustProfile.php?cust_id=<?php echo $row['cust_id']; ?>" class="button">View Full Profile</a>
                                <a href="viewMsgList.php?cust_id=<?php echo $row['cust_id']; ?>" class="button">View Message List</a>
                                <a href="include/deleteCust.php?cust_id=<?php echo $row['cust_id']; ?>" class="button_del">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>                
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