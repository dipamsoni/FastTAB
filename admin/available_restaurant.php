<?php

session_start();

include 'config.php';

include 'heading_admin.php';
include 'sidebar_admin.php';

$query = "select * from Client_personal_details";
$result = mysqli_query($con, $query);


if(isset($_POST['update_client']))
{
    header('Location: update_restaurant.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>ADMIN:Available Restaurant</title>

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
            <h3 class="card-title">Available Restaurants</h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <form method="POST">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>City</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['Client_id']; ?></td>
                            <td><?php echo $rows['Client_name']; ?></td>
                            <td><?php echo $rows['Address']; ?></td>
                            <td><?php echo $rows['Phone_Number']; ?></td>
                            <td><?php echo $rows['Email']; ?></td>
                            <td><?php echo $rows['City']; ?></td>
                        </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                </form>
            </div>

        </div>
    </div>

</body>

</html>