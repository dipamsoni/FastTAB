<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("location: ../login.php");
}

include 'heading_admin.php';

include 'sidebar_admin.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>ADMIN</title>

</head>

<body>
    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid p-md-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <!-- Card image -->
                            <div class="view">
                                <img class="card-img-top" src="../images/background/available_restaurant/logo.png"
                                    alt="Card image">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <!-- Field Name -->
                                <h5 class="pink-text pb-2 pt-1"><i class="fas fa-utensils"></i> Restaurant
                                </h5>
                                <!-- Title -->
                                <h5 class="card-title"><strong>Collection Of Restaurant</strong></h5>
                                <a href="available_restaurant.php">
                                    <button type="button" class="btn btn-cyan"><b>VIEW</b></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <!-- Card image -->
                            <div class="view">
                                <img class="card-img-top" src="../images/background/available_items/logo.png"
                                    alt="Card image">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <!-- Field Name -->
                                <h5 class="pink-text pb-2 pt-1"><i class="fas fa-chess-queen"></i> Items
                                </h5>
                                <!-- Title -->
                                <h5 class="card-title"><strong>Collection Of Food Items</strong></h5>
                                <a href="available_item.php">
                                    <button type="button" class="btn btn-cyan"><b>VIEW</b></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <!-- Card image -->
                            <div class="view">
                                <img class="card-img-top" src="../images/background/top_selling_restaurant/logo.png"
                                    alt="Card image">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <!-- Field Name -->
                                <h5 class="pink-text pb-2 pt-1"><i class="fab fa-sellsy"></i> Top Restaurant</h5>
                                <!-- Title -->
                                <h5 class="card-title"><strong>Top Selling Restaurants</strong></h5>
                                <a href="top_client.php">
                                    <button type="button" class="btn btn-cyan"><b>VIEW</b></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <!-- Card image -->
                            <div class="view">
                                <img class="card-img-top" src="../images/background/android_user/logo.png"
                                    alt="Card image">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <!-- FIeld Name -->
                                <h5 class="pink-text pb-2 pt-1"><i class="fab fa-sellsy"></i> FastTAB Application</h5>
                                <!-- Title -->
                                <h5 class="card-title"><strong>Application User</strong></h5>
                                <a href="app_user.php">
                                    <button type="button" class="btn btn-cyan"><b>VIEW</b></button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>