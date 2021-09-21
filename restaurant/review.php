<?php
//include 'config.php';
include 'query.php';

if (!isset($_SESSION["username"])) {
    header("location: ../login.php");
}

include 'leftsidebar.php';

include 'heading.php';

$client_id = $_GET['value'];
$query = "select Client_name from Client_personal_details where Client_id='" . $client_id . "' ";
$result = mysqli_query($con, $query);

//3 to 5 Star
$rating_count_good = "SELECT COUNT(Rating) as Total FROM Feedback_details WHERE Rating>=3 AND Client_id='" . $client_id . "' ";
$count_result_good = mysqli_query($con, $rating_count_good);

//1 to 2 Star
$rating_count_sad = "SELECT COUNT(Rating) as Total FROM Feedback_details WHERE Rating<3 AND Client_id='" . $client_id . "' ";
$count_result_sad = mysqli_query($con, $rating_count_sad);

if (isset($_POST["btn_rating_info"]))
{
    $emoji_details=$_POST['btn_rating_info'];
    /*echo "<script>alert('<?php echo $emoji_details; ?>'); </script>";*/

    if ($emoji_details=='Good')
    {
        $rating_review = "SELECT * FROM Feedback_details WHERE Rating>=3 AND Client_id='" . $client_id . "' ";
        $rating_result = mysqli_query($con, $rating_review);
    }
    //if($emoji_details=='Bad')
    else
    {
        $rating_review = "SELECT * FROM Feedback_details WHERE Rating<3 AND Client_id='" . $client_id . "' ";
        $rating_result = mysqli_query($con, $rating_review);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../resource/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../resource/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">



    <link href="../resource/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <link href="../resource/animsition/animsition.min.css" rel="stylesheet" media="all">

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

        while ($rows = mysqli_fetch_assoc($result)) {
            $client_name = $rows['Client_name'];
        }

        while ($rows = mysqli_fetch_assoc($count_result_good)) {
            $total_good = $rows['Total'];
        }

        while ($rows = mysqli_fetch_assoc($count_result_sad)) {
            $total_sad = $rows['Total'];
        }
        ?>
        <div class="card-header border-transparent">
            <h2 class="card-title">Review & Rating</h2>
            <h3>
                <form method="POST">

                <button type="submit" value="Good" name="btn_rating_info" class="btn btn-success m-l-10 m-b-10"><i class="fa fa-smile-o" aria-hidden="true">&nbsp;<span class="badge badge-light"><?php echo $total_good; ?></span></i></button>

                <button type="submit" value="Bad" name="btn_rating_info" class="btn btn-danger m-l-10 m-b-10"><i class="fa fa-frown-o" aria-hidden="true">&nbsp;<span class="badge badge-light"><?php echo $total_sad; ?></span></i></button>

               <!-- <select name="about_star">
                    <option value="5">Excellent</option>
                    <option value="4">Good</option>
                    <option value="3">Fair</option>
                    <option value="2">Poor</option>
                    <option value="1">Very Poor</option>
                </select>-->

            </form>
            </h3>
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

                        while ($rows = mysqli_fetch_assoc($rating_result)) {

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


    <script src="../resource/jquery-3.2.1.min.js"></script>


    <script src="../resource/bootstrap-4.1/popper.min.js"></script>
    <script src="../resource/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="../resource/animsition/animsition.min.js"></script>

    <script src="../js/main.js"></script>
    <script src="js/restaurant.js"></script>
</body>

</html>
