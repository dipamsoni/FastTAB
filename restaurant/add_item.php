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

</head>

<body class="animsition">

    <form name="kpd" method="POST">

        <div class="page-wrapper">
            <div class="main-page">
                <div class="modal-content" style="background-color: #58D68D">

                    <div class="modal-header">

                        <h5 class="modal-title">Add Details Of The Dish</h5>
                    </div>

                    <div class="modal-body">

                        <p>

                            <div class="card">

                                <div class="card-body">

                                    <div class="container">

                                        <div class="login-wrap">

                                            <div class="login-content">

                                                <div class="login-form">

                                                    <form method="POST">

                                                        <div class="form-group">

                                                            <label style="color: #000000;">Food Name</label>

                                                            <input class="form-control" type="text" name="food_name"
                                                                id="food_name" placeholder="Enter Food Name">

                                                        </div>



                                                        <div class="form-group">

                                                            <label style="color: #000000;">Food Price</label>

                                                            <input class="form-control" type="text" name="food_price"
                                                                id="food_price" placeholder="Enter Food Price">

                                                        </div>





                                                        <div class="form-group">

                                                            <label for="comment"
                                                                style="color: #000000;">Description:</label>

                                                            <textarea class="form-control" rows="5" name="discription"
                                                                id="discription"></textarea>

                                                        </div>



                                                        <div class="form-group">

                                                            <label style="color: #000000;">Food Type :</label>

                                                            <select class="form-control" name="food_type"
                                                                id="food_type">

                                                                <option>SELECT TYPE</option>

                                                                <option value="1">Gujarati</option>

                                                                <option value="2">South Indian</option>

                                                                <option value="3">Pizza</option>

                                                                <option value="5">Chinese</option>

                                                                <option value="4">Fast Food</option>

                                                                <option value="7">French</option>

                                                                <option value="6">German</option>

                                                                <option><a href="#">Add New Type</a></option>

                                                            </select>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </p>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        <button type="submit" class="btn btn-primary" name="send_request">Add to Menu</button>

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