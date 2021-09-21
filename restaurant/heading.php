<?php

//include 'query.php';

$email_query = "SELECT Client_id FROM Client_personal_details WHERE Email='$db_email' ";
$email_result = mysqli_query($con, $email_query);


while ($rows = mysqli_fetch_assoc($email_result)) {
    $client_id_with_email = $rows['Client_id'];

}

//Total Rating 
$rating_query = "SELECT AVG(Rating) as final FROM Feedback_details WHERE Client_id= '$client_id_with_email' ";
$rating_result = mysqli_query($con, $rating_query);

while ($rows = mysqli_fetch_assoc($rating_result)) {
    $final_rating = $rows['final'];

}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>RESTAURANT</title>

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

</head>

<body>
    <!-- HEADER DESKTOP-->

    <header class="header-desktop">
        <div class="clearfix">
            <div class="content restaurant">
                <h4>
                    <a href="#"><?php echo $db_name; ?></a>
                </h4>
                <h5>
                    <span><?php echo $db_email; ?></span>
                </h5>
            </div>
        </div>
        <div class="clearfix" style="margin-left: 200px; color: blue;">
            <h3>
                <i class="fas fa-star"></i>
                <span><?php echo round($final_rating, 1) . " /5"; ?></span>
            </h3>

        </div>
        <div class="section__content">

            <div class="container-fluid">

                <div class="header-wrap">

                    <div class="header-button">

                        <div style="padding-right: 30px;">

                            <a href="success_order.php?value=<?php echo $db_client_id; ?> ">

                                <button type="button" class="btn btn-success m-l-10 m-b-10">Success
                                </button>

                            </a>

                            <a href="panding_order.php?value=<?php echo $db_client_id; ?> ">

                                <button type="submit" class="btn btn-danger m-l-10 m-b-10">Panding

                                    <span class="badge badge-light"><?php echo $panding_icon; ?></span>

                                </button>
                            </a>

                            <a href="logout.php" class="logout">
                                <button type="button" class="btn btn-warning m-l-10 m-b-10"><i
                                        class="fas fa-sign-out-alt"></i><b>Logout</b></button>
                            </a>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </header>

    <!-- HEADER DESKTOP-->

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