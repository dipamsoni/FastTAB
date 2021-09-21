<?php

include 'query.php';

if (!isset($_SESSION["username"])) {
    header("location: ../login.php");
}

include 'leftsidebar.php';

$client_id = $_GET["value"];

include 'heading.php';

if (isset($_POST['verify_request']))
{

    $code = $_POST['verify_code'];

    $sql = "select count(OTP) as code from FastTAB_Order_details where OTP='" . $code . "' AND Client_id= '" . $client_id . "' ";

    $pr = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($pr);

    if ($row["code"] == 1)
    {
        echo "<script>alert('User Verified'); </script>";
        
        $user = "SELECT Android_User.Name,Android_User.Moblie_Number,Android_User.Email FROM Android_User JOIN FastTAB_Order_details ON Android_User.Fasttab_user_id=FastTAB_Order_details.User_id AND FastTAB_Order_details.OTP='".$code."' ";
        $user_result = mysqli_query($con, $user);
    }
    else
    {
        echo "<script>alert('No user'); </script>";
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <!-- Title Page-->

    <title>ADD ITEMS</title>

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
    .modal-content {
        height: 650px;
    }
    </style>

</head>

<body class="animsition">

    <form name="kpd" method="POST">

        <div class="page-wrapper">
            <div class="main-page">
                <div class="modal-content" style="background-color: #58D68D">

                    <div class="modal-header">

                        <h5 class="modal-title">User Varification</h5>
                    </div>

                    <div class="modal-body">

                        <p>

                            <div class="card">

                                <div class="card-body">

                                    <div class="container">

                                        <div class="login-wrap">

                                            <div class="login-content">

                                                <div class="login-form">

                                                    <form action="" method="POST">

                                                        <div class="form-group">

                                                            <label style="color: #000000;">Enter User Code</label>

                                                            <input class="form-control" type="text" name="verify_code"
                                                                id="verify_code" placeholder="Enter Varification Code">
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary"
                                                                name="verify_request">VERIFY</button>
                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </p>
                        
                        <p>
                            <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while ($rows = mysqli_fetch_assoc($user_result)) {

                        ?>
                        <tr>
                            <td><?php echo $rows['Name']; ?></td>
                            <td><?php echo $rows['Moblie_Number']; ?></td>                  
                            <td><?php echo $rows['Email']; ?></td>                  
                        </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
                        </p>

                    </div>

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

    </form>

</body>

</html>

<!-- end document-->