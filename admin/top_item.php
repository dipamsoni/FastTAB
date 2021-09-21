<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("location: ../login.php");
}

include 'config.php';

include 'heading_admin.php';
include 'sidebar_admin.php';

$query = "SELECT COUNT(Online_Order_food.Food_name) as 'total',Food_menu.Name,Food_menu.Client_id FROM Online_Order_food JOIN Food_menu on Online_Order_food.Food_id=Food_menu.Food_id GROUP by Online_Order_food.Food_name ORDER BY total DESC ";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN:TOP Selling Restaurant Items</title>

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
            <h1 class="card-title">TOP SELLING ITEMS</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Total</th>
                            <th>Food Name</th>
                            <th>Client ID</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['total']; ?></a></td>
                            <td><?php echo $rows['Name']; ?></td>
                            <td><?php echo $rows['Client_id']; ?></td>
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