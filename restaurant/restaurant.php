<?php

include 'query.php';

if (!isset($_SESSION["username"])) {
    header("location: ../login.php");
}

include 'leftsidebar.php';

include 'heading.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <!-- Title Page-->

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

<body class="animsition">

    <form name="kpd" method="POST">

        <div class="page-wrapper">
            <div class="main-page">
                <h3>Best Place For Foodies.</h3>
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