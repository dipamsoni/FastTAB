<?php


include 'query.php';

if (!isset($_SESSION["username"]))
{
    header("location: ../login.php");
}

include 'leftsidebar.php';

include 'heading.php';

$client_id = $_GET["value"];

//FATCH CLIENT DATA FROM DATABASE

$query_name = "SELECT Client_name FROM Client_personal_details WHERE Client_id='" . $client_id . "' ";
$name_result = mysqli_query($con, $query_name);

$query = "SELECT SUM(Total_amount) as turn_over,COUNT(Order_id) as ord_id FROM FastTAB_Order_details WHERE Client_id='" . $client_id . "' AND Status='0' ";
$result = mysqli_query($con, $query);

/*if($result)
{
	echo "<script>alert('Select work');</script>";
}
else
{
	echo "<script>alert('error but you can do it...!!!');</script>";
}*/

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>TurnOver</title>

    <!-- Fontfaces CSS-->

    <link href="../css/font-face.css" rel="stylesheet" media="all">

    <link href="../resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <link href="../resource/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

    <link href="../resource/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->

    <link href="../resource/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- resource CSS-->

    <link href="../resource/animsition/animsition.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->

    <link href="../css/theme.css" rel="stylesheet" media="all">

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
    }
    </style>
</head>

<body>
    <div class="main-page">

        <?php

        while ($rows = mysqli_fetch_assoc($name_result)) {
            $client_name = $rows['Client_name'];
        }
        ?>
        <div class="card-header border-transparent">
            <h2 class="card-title">Total Turnover</h2>
            <h3><?php echo $client_name; ?></h3>
        </div>


        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Total</th>
                            <th>Successfully Orders</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['turn_over'] . ".00 Rs"; ?></td>
                            <td><?php echo $rows['ord_id']; ?></td>                  
                        </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <!-- Jquery JS-->

    <script src="../resource/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap JS-->

    <script src="../resource/bootstrap-4.1/popper.min.js"></script>

    <script src="../resource/bootstrap-4.1/bootstrap.min.js"></script>

    <script src="../resource/animsition/animsition.min.js"></script>

    </script>

    <!-- Main JS-->

    <script src="../js/main.js"></script>
    <script src="js/restaurant.js"></script>
</body>

</html>