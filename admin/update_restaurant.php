<?php
include 'config.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("location: ../login.php");
}

$client_id=$_GET['value'];


//insert Data
if (isset($_POST["btn_new_client"])) {
    //echo "<script>alert('Work'); </script>";
    
        $sql= "Update Client_personal_details SET Client_name='".$rest_name."',Email='".$rest_email."',Phone_Number='".$rest_number."',Address='".$rest_address."',About_client='".$rest_about."' ";

    printf($sql);

    $rest_name = $_POST["rest_name"];
    $rest_email = $_POST["rest_email"];
    $rest_number = $_POST["rest_number"];
    $rest_address = $_POST["rest_address"];
    $rest_about = $_POST["rest_about"];
    $rest_password = $_POST["rest_password"];
    $hash_password = md5($rest_password);

    $rest_open = $_POST["rest_open"];
    $rest_close = $_POST["rest_close"];
    $rest_time = $_POST["rest_time"];

    //echo $rest_time;


    //$sql = "insert into Client_personal_details values('" . $rest_id . "','" . $rest_name . "','" . $rest_address . "','" . $rest_number . "','" . $rest_email . "','" . $hash_password . "','Bhuj',370001,'" . $rest_about . "',1)";
    //printf($sql);
    $add_details = execute($con, $sql);

    if ($add_details) {
        //echo "Request sent Admin Successfully";
        echo "<script>alert('Data Store in client_personal_details');</script>";
    } else {
        //echo "Error but you can do it....!!!";
        echo "<script>alert('Error but you can do it');</script>";
    }


    if ($rest_time == "monday_friday") {
        $time_sql = "insert into Client_working(Client_id,Open_time,Close_time,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday) values('" . $rest_id . "','" . $rest_open . "','" . $rest_close . "',1,1,1,1,1,0,0)";

        $add_time = execute($con, $time_sql);

        if ($add_time) {
            //echo "Request sent Admin Successfully";
            echo "<script>alert('Data Store in Working');</script>";
        } else {
            //echo "Error but you can do it....!!!";
            echo "<script>alert('Error but you can do it');</script>";
        }
    } elseif ($rest_time == "weeked_only") {

        $time_sql = "insert into Client_working(Client_id,Open_time,Close_time,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday) values('" . $rest_id . "','" . $rest_open . "','" . $rest_close . "',0,0,0,0,0,1,1)";

        $add_time = execute($con, $time_sql);

        if ($add_time) {
            //echo "Request sent Admin Successfully";
            echo "<script>alert('Data Store in Working');</script>";
        } else {
            //echo "Error but you can do it....!!!";
            echo "<script>alert('Error but you can do it');</script>";
        }
    } elseif ($rest_time == "every_day") {
        $time_sql = "insert into Client_working(Client_id,Open_time,Close_time,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday) values('" . $rest_id . "','" . $rest_open . "','" . $rest_close . "',1,1,1,1,1,1,1)";

        $add_time = execute($con, $time_sql);

        if ($add_time) {
            //echo "Request sent Admin Successfully";
            echo "<script>alert('Data Store in Working Details');</script>";
        } else {
            //echo "Error but you can do it....!!!";
            echo "<script>alert('Error but you can do it');</script>";
        }
    } else {
        echo "<script>alert('Kindly Give your Time...!!!');</script>";
    }

    //Insert Seating Details 


    $data_seat2 = $_POST['seat2'];
    $data_seat4 = $_POST['seat4'];
    $data_seat6 = $_POST['seat6'];

    if ($data_seat2 != '') {
        $seat2_data_query = "Insert into Client_seating_details(Client_id,Capacity,Total_table_number) values('" . $rest_id . "','2','" . $data_seat2 . "') ";
        $seat2_data_result = execute($con, $seat2_data_query);
    }

    if ($data_seat4 != '') {
        $seat4_data_query = "Insert into Client_seating_details(Client_id,Capacity,Total_table_number) values('" . $rest_id . "','4','" . $data_seat4 . "') ";
        $seat4_data_result = execute($con, $seat4_data_query);
    }

    if ($data_seat6 != '') {
        $seat6_data_query = "Insert into Client_seating_details(Client_id,Capacity,Total_table_number) values('" . $rest_id . "','6','" . $data_seat6 . "') ";
        $seat6_data_result = execute($con, $seat6_data_query);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>ADMIN:New Restaurant</title>

    <!-- Icons font CSS-->
    <link href="../resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../resource/bootstrap-4.1/bootstrap.min.css">
    <script src="../resource/jquery-3.2.1.min.js"></script>
    <script src="../resource/bootstrap-4.1/popper.min.js"></script>
    <script src="../resource/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Main CSS-->
    <link href="css/new_restaurant.css" rel="stylesheet" media="all">

    <script type="text/javascript">
    /*code: 48-57 Numbers
      8  - Backspace,
      35 - home key, 36 - End key
      37-40: Arrow keys, 46 - Delete key*/

    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57) || x == 8 ||
            (x >= 35 && x <= 40) || x == 46 || (x >= 48 && x <= 57))
            return false;
        else
            return false;
    }
    </script>

</head>

<body>
    <div class="page-wrapper bg-blue font-robo">
        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Registration Info</h2>
                <div class="login-form">
                    <form method="POST" name="kpd">

                        <div class="form-group">
                            <label>Restaurant Name :</label>
                            <input class="au-input" type="text" value="<?php echo $up_rest_name; ?>" name="rest_name"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Restaurant Address :</label>
                            <textarea name="rest_address" rows="4" cols="50"><?php echo $up_rest_address; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <input class="au-input" type="text" name="rest_email" value="<?php echo $up_rest_email; ?>" required>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="city_name">
                                <option selected="selected">Bhuj</option>
                                <option disabled>More City available soon......</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Avaiable Days :</label>
                            <select class="form-control" name="rest_time">
                                <option>-Aviabale Time-</option>
                                <option value="monday_friday">Monday-Friday</option>
                                <option value="weeked_only">Weekends Only</option>
                                <option value="every_day">Every Day</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Contact No :</label>
                            <input class="au-input" type="text" value="<?php echo $up_rest_number; ?>" name="rest_number"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Open Time :</label>
                            <input class="au-input" type="time" placeholder="Enter Open Time Of Restaurant"
                                name="rest_open" required>
                        </div>

                        <div class="form-group">
                            <label>Close Time :</label>
                            <input class="au-input" type="time" placeholder="Enter Close Time Of Restaurant"
                                name="rest_close" required>
                        </div>


                        <div class="form-group">
                            <table border="1" width="350px">
                                <tr>
                                    <td colspan="2"><label>Table Details</label></td>
                                </tr>

                                <tr>
                                    <td><label>2 Seat Table:</label></td>
                                    <td><input class="au-input" type="number" name="seat2" min="0" max="5"
                                            placeholder="Maximum 5 Tables" onkeypress='return restrictAlphabets(event)'>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>4 Seat Table:</label></td>
                                    <td><input class="au-input" type="number" name="seat4" min="0" max="5"
                                            placeholder="Maximum 5 Tables" onkeypress='return restrictAlphabets(event)'>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>6 Seat Table:</label></td>
                                    <td><input class="au-input" type="number" name="seat6" min="0" max="5"
                                            placeholder="Maximum 5 Tables" onkeypress='return restrictAlphabets(event)'>
                                    </td>
                                </tr>

                            </table>
                        </div>

                        <div class="form-group">
                            <label>Vision :</label>
                            <textarea name="rest_about" rows="4" cols="50"><?php echo $up_rest_about; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Password :</label>
                            <input class="au-input" type="text" placeholder="Create Password" name="rest_password">
                        </div>

                        <div class="form-group">
                            <button class="btn btn--radius btn--green" type="submit"
                                name="btn_new_client">Submit</button>
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