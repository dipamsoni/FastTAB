<?php

session_start();

if(!isset($_SESSION['admin'])) 
{
    header("location: ../login.php"); 
}

include 'heading_admin.php';

include 'sidebar_admin.php';

include 'config.php';

$query = "SELECT FastTAB_Order_details.Arriving_time,FastTAB_Order_details.Arriving_date,FastTAB_Order_details.Total_amount,Client_personal_details.Client_name,Client_personal_details.Phone_Number,Android_User.Name,Android_User.Moblie_Number FROM FastTAB_Order_details JOIN Client_personal_details ON FastTAB_Order_details.Client_id=Client_personal_details.Client_id JOIN Android_User ON FastTAB_Order_details.User_id=Android_User.Fasttab_user_id WHERE FastTAB_Order_details.Status=1";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>ADMIN:Current Order</title>

    <link rel="stylesheet" href="../resource/bootstrap-4.1/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">

    <style>
    .card-body.p-0 .table tbody>tr>td:first-of-type,
    .card-body.p-0 .table tbody>tr>th:first-of-type,
    .card-body.p-0 .table thead>tr>td:first-of-type,
    .card-body.p-0 .table thead>tr>th:first-of-type {
        padding-left: 1.5rem
    }

    .card-body.p-0 .table tbody>tr>td:last-of-type,
    .card-body.p-0 .table tbody>tr>th:last-of-type,
    .card-body.p-0 .table thead>tr>td:last-of-type,
    .card-body.p-0 .table thead>tr>th:last-of-type {
        padding-right: 1.5rem
    }

    .table {
        text-align: center;
        color: #ffffff;
    }

    .card-title {
        color: #ffffff;
    }
    </style>
</head>

<body>

    <div class="main-page">
        <div class="card-header border-transparent">
            <h3 class="card-title">Current Orders</h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Client Name</th>
                            <th>Client Phone Number</th>
                            <th>User Name</th>
                            <th>User Phone Number</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result)) {

                        ?>

                       <tr>
                            <td><?php echo $rows['Arriving_date']; ?></td>
                            <td><?php echo $rows['Arriving_time']; ?></td>
                            <td><?php echo $rows['Client_name']; ?></a></td>
                            <td><?php echo $rows['Phone_Number']; ?></td>
                            <td><?php echo $rows['Name']; ?></a></td>
                            <td><?php echo $rows['Moblie_Number']; ?></td>
                            <td><?php echo $rows['Total_amount']; ?></td>
                        </tr>

                        <?php
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>