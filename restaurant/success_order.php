<?php
//include 'config.php';
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
//$query = "SELECT Order_id,Table_booked_time,Booking_Date,Total_amount FROM FastTAB_Order_details WHERE Client_id='".$client_id."' AND Status=0";

//$query = "SELECT FastTAB_Order_details.Order_id,FastTAB_Order_details.Booking_time,FastTAB_Order_details.Booking_Date,FastTAB_Order_details.Total_amount,Online_Order_food.Food_id,Food_menu.Name,Food_menu.Price,FastTAB_Order_details.Client_id FROM FastTAB_Order_details JOIN Online_Order_food ON FastTAB_Order_details.Order_id=Online_Order_food.Order_id JOIN Food_menu ON Online_Order_food.Food_id=Food_menu.Food_id AND FastTAB_Order_details.Status=0 AND FastTAB_Order_details.Client_id='" . $client_id . "' ORDER BY Arriving_date DESC ";

$query = "SELECT FastTAB_Order_details.Order_id,FastTAB_Order_details.Arriving_time,FastTAB_Order_details.Arriving_date,FastTAB_Order_details.Total_amount,Online_Order_food.Food_name FROM FastTAB_Order_details JOIN Online_Order_food ON FastTAB_Order_details.Order_id=Online_Order_food.Order_id AND FastTAB_Order_details.Status=0 WHERE FastTAB_Order_details.Client_id='" . $client_id . "' ORDER BY Arriving_date DESC";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>AVAILAVLE ITEMS</title>

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
            <h2 class="card-title">Available Items</h2>
            <h3><?php echo $client_name; ?></h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ORDER ID</th>
                            <th>Customer Arriving Time</th>
                            <th>Customer Arriving Date</th>
                            <!--<th>Price</th>-->
                            <th>Name</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['Order_id']; ?></td>
                             <?php 
                                    
                                    $oderid=$rows['Order_id'];  
                                    /*echo "<script>alert('<?php echo $oderid; ?>');</script>"; */
                                    
                                    $foodname=" SELECT * FROM Online_Order_food WHERE Order_id='".$oderid."' ";
                                    
                                    $food=mysqli_query($con,$foodname);
                                    
                                    if($food)
                                    {
                                        while($row=mysqli_fetch_assoc($food))
                                        {
                                            $mark = explode(",", $row['Food_name']);
                                            /*echo "<script>alert('<?php print $mark; ?>');</script>";*/
                                        }
                                        
                                        
                                    }
                                        
                                ?>
                            <td><?php echo $rows['Arriving_time']; ?></td>
                            <td><?php echo $rows['Arriving_date']; ?></td>
                            <td><?php
                                foreach ($mark as $out)
                                        {
                                            $comma_food_name = "select Name,Price from Food_menu WHERE food_id ='$out' ";
                                            $comma_food_name_res = mysqli_query($con, $comma_food_name);
                                            while ($ro = mysqli_fetch_assoc($comma_food_name_res))
                                            {
                                                echo $ro['Name'].",";
                                            }
                                        }
                                
                                ?></td>
                            <td><?php echo $rows['Total_amount']; ?></td>
                            <td><span class="badge badge-success">Complete</span></td>
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