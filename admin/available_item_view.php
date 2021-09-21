<?php
session_start();


if(!isset($_SESSION['admin']))
{
    header("location: ../login.php");
}

$client_item=$_GET['value'];

include 'config.php';

include 'heading_admin.php';
include 'sidebar_admin.php';


$query = "select * from Client_personal_details where Client_id='".$client_item."' ";
//$query1 = "select * from Food_menu where Client_id='".$client_item."' AND Status=1";


$query = "select * from Client_personal_details where Client_id='" . $client_item . "' ";
//$query1 = "select * from Food_menu where Client_id='".$client_item."' AND Status=1";

$query1 = "SELECT Food_menu.Food_id,Food_Type.Food_Type_name, Food_menu.Name, Food_menu.Price,Food_menu.About_food FROM Food_Type JOIN Food_menu ON Food_Type.Food_type_id=Food_menu.Food_Type_id AND Client_id='" . $client_item . "' ";

$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query1);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>ADMIN:Available Items</title>

    <link href="../resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../resource/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

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
        <?php

        while ($rows = mysqli_fetch_assoc($result)) {
            $client_name = $rows['Client_name'];
        }
        ?>
        <div class="card-header border-transparent">
            <h2 class="card-title">Available Items</h2>
            <h3 style="color: #ffffff"><?php echo $client_name; ?></h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Food ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Food Type ID</th>
                            <th>About Food</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result1)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['Food_id']; ?></td>

                            <td><?php echo $rows['Name']; ?></td>
                            <td><?php echo $rows['Price']; ?></td>
                            <td><?php echo $rows['Food_Type_name']; ?></td>
                            <td><?php echo $rows['About_food']; ?></td>
                            <td><span class="badge badge-success">Available</span></td>
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
