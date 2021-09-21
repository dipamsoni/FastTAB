<?php
//include 'config.php';
include 'query.php';

if (!isset($_SESSION["username"]))
{
    header("location: ../login.php");
}

include 'leftsidebar.php';


$client_id = $_GET["value"];

//FATCH CLIENT DATA FROM DATABASE

$query_name = "SELECT Client_name FROM Client_personal_details WHERE Client_id='" . $client_id . "' ";

$name_result = mysqli_query($con, $query_name);

//$query = "SELECT Order_id,Table_booked_time,Booking_Date,Total_amount FROM FastTAB_Order_details WHERE Client_id='".$client_id."' AND Status=1";

$query = "SELECT FastTAB_Order_details.Order_id,FastTAB_Order_details.Arriving_time,FastTAB_Order_details.Arriving_date,FastTAB_Order_details.Total_amount,Online_Order_food.Food_name,FastTAB_Order_details.Client_id,FastTAB_Order_details.Table_id,FastTAB_Order_details.Table_id_two FROM FastTAB_Order_details JOIN Online_Order_food ON FastTAB_Order_details.Order_id=Online_Order_food.Order_id WHERE FastTAB_Order_details.Client_id='" . $client_id . "' AND FastTAB_Order_details.Status=1 ORDER BY Arriving_date DESC ";

//$query = "SELECT order_details.Order_id,order_details.Arriving_time,order_details.Arriving_date,order_details.Total_amount,online_order_food.Food_name FROM order_details JOIN online_order_food ON order_details.Order_id=online_order_food.Order_id AND order_details.Status=1 WHERE Order_details.Client_id='" . $client_id . "' ORDER BY Arriving_date DESC ";

$result = mysqli_query($con, $query);

include 'heading.php';



?>



<!DOCTYPE html>
<html lang="en">

<head>

    <title>PENDING ORDER</title>

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
            <h2 class="card-title">Pending Orders</h2>
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
                            <th>Table1</th>
                            <th>Table2</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($result)) {
                            
                            $table2=$rows["Table_id_two"];
                            
                            /*echo "<script>alert('<?php echo $table2; ?>'); </script>";*/
                            
                            if($table2 == "NULL" OR $table2 == "null")
                            {
                                $tab2="No Table Selected";
                            }
                            else
                            {
                                $table_two_id=$rows["Table_id_two"];
                                $table_id= $rows['Table_id'];
                                $cap="SELECT `Capacity` FROM `Client_seating_details` WHERE `Table_id` ='".$table_two_id."'  ";
                                $qu = mysqli_query($con,$cap);
                                if($qu)
                                {
                                    $r = mysqli_fetch_assoc(($qu));
                                    $tab2= "Capacity ".$r['Capacity'];
                                }
                            }
                            

                        ?>

                        <form action="" method="POST">
                            
                                <td><input type="hidden" name="order_id" value="<?php echo $rows['Order_id']; ?>">
                                    <?php echo $rows['Order_id']; $oderid=$rows['Order_id']; ?></td>
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
                                <td><input type="hidden" name="arriving_time"
                                        value="<?php echo $rows['Arriving_time']; ?>"><?php echo $rows['Arriving_time']; ?>
                                </td>
                                <td><input type="hidden" name="arriving_date"
                                        value="<?php echo $rows['Arriving_date']; ?>"><?php echo $rows['Arriving_date']; ?>
                                </td>
                               <!-- <td><input type="hidden" name="price"
                                        value="<?php echo $rows['Price']; ?>"><?php echo $rows['Price']; ?></td>-->

                                <td><input type="hidden" name="name" value="<?php echo $rows['Food_name']; ?>">
                                
                                <?php
                                foreach ($mark as $out)
                                        {
                                            $comma_food_name = "select Name,Price from Food_menu WHERE food_id ='$out' ";
                                            $comma_food_name_res = mysqli_query($con, $comma_food_name);
                                            while ($ro = mysqli_fetch_assoc($comma_food_name_res))
                                            {
                                                echo $ro['Name'].",";
                                            }
                                        }
                                
                                ?>
                                </td>
                                
                                <td><input type="hidden" name="Table_no"
                                        value="<?php echo $rows['Table_id']; ?>">
                                        <?php
                                        $table_id= $rows['Table_id'];
                                        $cap="SELECT `Capacity` FROM `Client_seating_details` WHERE `Table_id` ='".$table_id."'  ";
                                        $qu = mysqli_query($con,$cap);
                                        if($qu)
                                        {
                                            $r = mysqli_fetch_assoc(($qu));
                                            echo "Capacity ".$r['Capacity'];
                                        }
                                        ?>
                                        </td>
                                        
                                <td><input type="hidden" name="Table2_no"
                                        value="<?php echo $tab2; ?>"><?php echo $tab2; ?></td>
                                
                                <td><input type="hidden" name="total"
                                        value="<?php echo $rows['Total_amount']; ?>"><?php echo $rows['Total_amount']; ?>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning" name="gen">
                                        <a href="bill.php?value=<?php echo $rows['Order_id']; ?>" style="color:black;"><b>GENERATE</b></a>
                                    </button>
                                </td>
                                
                            </tr>
                        </form>

                        <?php
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    
    <button type="submin" class="btn btn-info"><a href="bill.php">GO</a></button>

    <!-- Jquery JS-->

    <script src="../resource/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap JS-->

    <script src="../resource/bootstrap-4.1/popper.min.js"></script>
    <script src="../resource/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="../resource/animsition/animsition.min.js"></script>

    <!-- Main JS-->

    <script src="../js/main.js"></script>
    <script src="js/restaurant.js"></script>
</body>

</html>