<?php
session_start();

/*if (!isset($_SESSION['admin'])) {
    header("location: ../login.php");
}*/

include 'config.php';

$client_id=$_GET['value'];

    //echo "<script>alert('Work'); </script>";

    $rest_open = $_POST["rest_open"];
    $rest_close = $_POST["rest_close"];
    $rest_time = $_POST["rest_time"];



//Fatch in Client Personal Details
    $sql = "SELECT * FROM Client_personal_details where Client_id='".$client_id."' ";
    $show_details = execute($con, $sql);
    
    while ($rows = mysqli_fetch_assoc($show_details)) 
    {
        $rest_name = $rows["Client_name"];
        $rest_email = $rows["Email"];
        $rest_number = $rows["Phone_Number"];
        $rest_address = $rows["Address"];
        $rest_about = $rows["About_client"];
        $rest_city = $rows["City"];
    }
    
//Fatch in Client Working Details

    $time_sql="SELECT Open_time,Close_time,Days FROM Client_working where Client_id='".$client_id."' ";
    //printf($time_sql);
    $time_result = execute($con, $time_sql);
    
    while ($rows = mysqli_fetch_assoc($time_result)) 
    {
        $rest_open = $rows["Open_time"];
        $rest_close = $rows["Close_time"];
        $rest_day = $rows["Days"];
    }

//Fatch in Client Seating Details

    $seat2_sql="SELECT Total_table_number FROM Client_seating_details where Client_id='".$client_id."' AND Capacity='2' ";
    $seat2_result = execute($con, $seat2_sql);
    
    while ($rows = mysqli_fetch_assoc($seat2_result)) 
    {
         $seat2 = $rows["Total_table_number"];
    }
    
    $seat4_sql="SELECT Total_table_number FROM Client_seating_details where Client_id='".$client_id."' AND Capacity='4' ";
    $seat4_result = execute($con, $seat4_sql);
    
    while ($rows = mysqli_fetch_assoc($seat4_result)) 
    {
         $seat4 = $rows["Total_table_number"];
    }
    
    $seat6_sql="SELECT Total_table_number FROM Client_seating_details where Client_id='".$client_id."' AND Capacity='6' ";
    $seat6_result = execute($con, $seat6_sql);
    
    while ($rows = mysqli_fetch_assoc($seat6_result)) 
    {
         $seat6 = $rows["Total_table_number"];
    }
    
    if(isset($_POST["update"]))
    {
        /*echo "<script>alert('<?php print $mark; ?>');</script>";*/
        
        $restname=$_POST["rest_name"];
        $rest_address=$_POST["rest_address"];
        $rest_email=$_POST["rest_email"];
        $city=$_POST["city"];
        $avaibleday=$_POST["avaibleday"];
        $con=$_POST["con"];
        $rest_open=$_POST["rest_open"];
        /*echo "<script>alert('<?php print $restname; ?>');</script>";*/
        $cap="UPDATE `Client_personal_details` SET `Client_name`='".$restname."',`Address`='".$rest_address."',`Email`='".$rest_email."',`City`='".$city."',`Phone_Number`='".$con."' WHERE `Client_id` ='".$client_id."' ";
        $qu = mysqli_query($con,$cap);
        if($qu)
        {
            
        }
        
    
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Restaurant:Personal Details</title>

    <!-- Icons font CSS-->
    <link href="../resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../resource/bootstrap-4.1/bootstrap.min.css">
    <script src="../resource/jquery-3.2.1.min.js"></script>
    <script src="../resource/bootstrap-4.1/popper.min.js"></script>
    <script src="../resource/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Main CSS-->
    <link href="../admin/css/new_restaurant.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper bg-blue font-robo">
        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Personal Details</h2>
                <div class="login-form">
                    <form method="POST" name="kpd">

                        <div class="form-group">
                            <label>Restaurant Name :</label>
                            <input class="au-input" type="text" name="rest_name" value="<?php echo $rest_name; ?> " id="rest_name">
                        </div>

                        <div class="form-group">
                            <label>Restaurant Address :</label>
                            <textarea name="rest_address" rows="4" cols="50" id="rest_address"><?php echo $rest_address; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <input class="au-input" type="text" name="rest_email" value="<?php echo $rest_email; ?>" id="rest_email">
                        </div>

                        <div class="form-group">
                            <label>City:</label>
                            <input class="au-input" type="text" name="city" value="<?php echo $rest_city; ?> id="city"">
                        </div>

                        <div class="form-group">
                            <label>Avaiable Days :</label>
                            <input class="au-input" name="avaibleday" type="text" value="<?php echo $rest_day; ?> " name="avaibleday" readonly>
                        </div>

                        <div class="form-group">
                            <label>Contact No :</label>
                            <input class="au-input" type="text" name="con" name="rest_number" value="<?php echo $rest_number; ?>" id="con">
                        </div>

                        <div class="form-group">
                            <label>Open Time :</label>
                            <input class="au-input" type="text" name="rest_open" value="<?php echo $rest_open; ?>" id="rest_open">
                        </div>

                        <div class="form-group">
                            <label>Close Time :</label>
                            <input class="au-input" type="text" name="rest_close" value="<?php echo $rest_close; ?>" readonly>
                        </div>


                        <div class="form-group">
                            <table border="1" width="350px">
                                <tr>
                                    <td colspan="2"><label>Table Details</label></td>
                                </tr>

                                <tr>
                                    <td><label>2 Seat Table:</label></td>
                                    <td><input class="au-input" type="text" name="rest_close" value="<?php echo $seat2; ?>" readonly></td>
                                </tr>

                                <tr>
                                    <td><label>4 Seat Table:</label></td>
                                    <td><input class="au-input" type="text" name="rest_close" value="<?php echo $seat4; ?>" readonly></td>
                                </tr>

                                <tr>
                                    <td><label>6 Seat Table:</label></td>
                                    <td><input class="au-input" type="text" name="rest_close" value="<?php echo $seat6; ?>" readonly></td>
                                </tr>
                                
                                

                            </table>
                        </div>

                        <div class="form-group">
                            <label>Vision :</label>
                            <textarea name="rest_about" rows="20" cols="50" readonly><?php echo $rest_about; ?>"</textarea>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../resource/jquery-3.2.1.min.js"></script>

</body>

</html>
<!-- end document-->