<?php

include 'config.php';

session_start();

$link_ord_id = $_GET['value'];

$name_query = "SELECT Android_User.Name,Android_User.Moblie_Number,FastTAB_Order_details.Client_id,Client_personal_details.Client_name FROM Android_User JOIN FastTAB_Order_details ON Android_User.Fasttab_user_id = FastTAB_Order_details.User_id JOIN Client_personal_details ON Client_personal_details.Client_id = FastTAB_Order_details.Client_id WHERE FastTAB_Order_details.Order_id='$link_ord_id' ";

$name_result = mysqli_query($con, $name_query);

while ($rows = mysqli_fetch_assoc($name_result)) {
    $user_name = $rows['Name'];
    $mobile = $rows['Moblie_Number'];
    $cname = $rows['Client_name'];
}

$link_ord_details = "SELECT * from FastTAB_Order_details where Order_id='$link_ord_id' ";
$link_ord_result = mysqli_query($con, $link_ord_details);

while ($rows = mysqli_fetch_assoc($link_ord_result))
{
    $client_id = $rows['Client_id'];
    $arriving_time = $rows['Arriving_time'];
    $arriving_date = $rows['Arriving_date'];
    $c_gst = $rows['C_G_S_T'];
    $s_gst = $rows['S_G_S_T'];
    $final_amount = $rows['Total_amount'];
}

$dish_price = $final_amount - $c_gst - $s_gst;


//submit bill to database
if (isset($_POST['create_bill'])) 
{
    /*foreach ($mark as $out) 
    {

        $comma_food_name = "select Name,Price from Food_menu WHERE food_id ='$out' ";
        $comma_food_name_res = mysqli_query($con, $comma_food_name);

        while ($rows = mysqli_fetch_assoc($comma_food_name_res)) 
        {
            $top_id=$out;
            $top_name=$rows['Name'];
            $top_price=$rows['Price'];
                                                        
            $top_sql = "INSERT into Top_item_table(Food_id,Name,Price,Client_id) values('".$out."','".$top_name."','".$top_price."','".$client_id."') ";
            $top_result = mysqli_query($con, $top_sql);
        
        }
    }*/
    
    $update_bill = "UPDATE FastTAB_Order_details SET Status=0 WHERE Order_id = '$link_ord_id' ";
    $update_res = mysqli_query($con, $update_bill);
    if ($update_res)
    {
       // echo "<script>alert('FastTAB Update'); </script>";
        header("Location: restaurant.php");
    }
}

//Comma Seprated value

$test = "SELECT * FROM Online_Order_food WHERE Order_id= '$link_ord_id' ";

//$test="SELECT FastTAB_Order_details.Order_id,FastTAB_Order_details.Total_amount,online_order_food.Food_name,food_menu.Name,food_menu.Price FROM FastTAB_Order_details JOIN online_order_food ON online_order_food.Order_id='$ord_id' JOIN food_menu ON food_menu.Food_id=online_order_food.Food_name";

$result_test = mysqli_query($con, $test);
while ($rows = mysqli_fetch_assoc($result_test)) {
    $mark = explode(",", $rows['Food_name']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Title Page-->
    <title>RESTAURANT</title>

    <!-- Icons font CSS-->
    <link href="../resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="../css/theme.css">

    <link rel="stylesheet" href="../resource/bootstrap-4.1/bootstrap.min.css">

    <!-- Main CSS-->

    <link rel="stylesheet" href="css/bill.css">

</head>

<body>
    <div class="page-wrapper bg-blue font-robo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-"></div>
                <div class="col-lg-4ccol-sm-12">
                    <div class="card card-2">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title" style="text-align: center;">Final Bill</h2>
                            <div class="login-form">
                                <form method="POST" name="kpd">
                                    <div class="form-group">
                                        <label><?php echo $arriving_date; ?></label>
                                        <label class="float-right"><?php echo $arriving_time; ?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Restaurant :</label>
                                        <label><?php echo $cname; ?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Customer Name :</label>
                                        <label><?php echo $user_name; ?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Customer Mobile No:</label>
                                        <label><?php echo '+91 ' . $mobile; ?></label>
                                    </div>

                                    <div class="form-group">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Items Id</th>
                                                        <th>Food Name</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php

                                                        foreach ($mark as $out) {
                                                        $comma_food_name = "select Name,Price from Food_menu WHERE food_id ='$out' ";
                                                        $comma_food_name_res = mysqli_query($con, $comma_food_name);

                                                        while ($rows = mysqli_fetch_assoc($comma_food_name_res)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $out; ?></td>
                                                        <td><?php echo $rows['Name']; ?></td>
                                                        <td><?php echo $rows['Price']; ?></td>
                                                    </tr>

                                                    <?php
                                                
                                                        }

                                                    }
                                                    ?>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Total :</label>
                                        <label class="float-right"><?php echo $dish_price; ?></label>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>CGST 2.5% :</label>
                                        <label class="float-right"><?php echo $c_gst; ?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>SGST 2.5% :</label>
                                        <label class="float-right"><?php echo $s_gst; ?></label>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Total Payable Amount :</label>
                                        <label class="float-right"><?php echo $final_amount; ?></label>
                                    </div>



                                    <div class="form-group">
                                        <button class="btn btn-primary float-right" type="submit"
                                            name="create_bill">GENERATE BILL</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="../resource/jquery.min.js"></script>

</body>

</html>
<!-- end document-->