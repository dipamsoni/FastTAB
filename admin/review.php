<?php

$client_id = $_GET['value'];

session_start();

if(!isset($_SESSION['admin'])) 
{
    header("location: ../login.php"); 
}

include 'config.php';

$query = "select * from Client_personal_details where Client_id='" . $client_id . "' ";
$query1 = "select * from Feedback_details where Client_id='" . $client_id . "' ";
$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query1);

include 'heading_admin.php';

include 'sidebar_admin.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN:Review</title>
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
            <h3 style="color: #ffffff;"><?php echo $client_name; ?></h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result1)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['Rating'] . " /5"; ?></td>
                            <td><?php echo $rows['Review_details']; ?></td>
                            <td><?php echo $rows['Date']; ?></td>
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