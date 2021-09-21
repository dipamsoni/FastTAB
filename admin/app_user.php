<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("location: ../login.php");
}

include 'config.php';

include 'heading_admin.php';
include 'sidebar_admin.php';

$query = "SELECT * From Android_User ORDER BY Visit_date";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN:Appliacation User</title>

    <link rel="stylesheet" href="../resource/bootstrap-4.1/bootstrap.min.css">

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
            <h1 class="card-title">FastTAB Application User</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Mobile_Number</th>
                            <th>Address</th>
                            <th>Birth_Date</th>
                            <th>City</th>
                            <th>PinCode</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['Name']; ?></a></td>
                            <td><?php echo $rows['Gender']; ?></td>
                            <td><?php echo $rows['Moblie_Number']; ?></td>
                            <td><?php echo $rows['Address']; ?></td>
                            <td><?php echo $rows['Birth_Date']; ?></td>
                            <td><?php echo $rows['City']; ?></td>
                            <td><?php echo $rows['Pincode']; ?></td>
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