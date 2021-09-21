<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("location: ../login.php");
}

include 'config.php';

include 'heading_admin.php';

include 'sidebar_admin.php';

$query = "SELECT COUNT(Order_id) as 'big',Client_personal_details.Client_id,Client_personal_details.Client_name,Client_personal_details.Email,Client_personal_details.Address,Client_personal_details.City,Client_personal_details.Phone_Number FROM FastTAB_Order_details JOIN Client_personal_details WHERE FastTAB_Order_details.Client_id=Client_personal_details.Client_id GROUP BY Client_id ORDER BY big DESC ";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>ADMIN:TOP Selling Restaurant</title>

    <link href="../resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../resource/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="../resource/bootstrap-4.1/bootstrap.min.css">
    <link rel="stylesheet" href="../resource/mdb/mdb.min.css">
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
            <h1 class="card-title">TOP SELLING RESTAURANTS</h1>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Total Orders</th>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['big']; ?></a></td>
                            <td><?php echo $rows['Client_id']; ?></a></td>
                            <td><?php echo $rows['Client_name']; ?></td>
                            <td><?php echo $rows['Phone_Number']; ?></td>
                            <td><?php echo $rows['Email']; ?></td>
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
