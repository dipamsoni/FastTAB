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



            <!-- PAGE CONTAINER-->

            <div class="page-container">


                <!-- MAIN CONTENT-->

                <div class="main-content">

                    <div class="container-fluid" style="color: white;">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="overview-wrap">

                                    <h1>Available Dishes</h1>
                                    <a href="add_item.php" class="float-right">
                                        <button type="button" class="btn btn-primary">
                                            + ADD ITEM
                                        </button>
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="container-fluid">

                        <!-- /.card-header -->

                        <div class="card-body p-0 bgtext" style="color: white;">

                            <div class="table-responsive">

                                <table class="table m-0">

                                    <thead>

                                        <tr>
                                            <th>DELETE</th>

                                            <th>Food ID</th>

                                            <th>Name</th>

                                            <th>Price</th>

                                            <th>Food Type Name</th>

                                            <th>About Food</th>

                                            <th>Status</th>

                                        </tr>

                                    </thead>

                                    <tbody>



                                        <?php



                                        while ($rows = mysqli_fetch_assoc($food_result)) {
                                        ?>

                                        <tr>
                                            <td><button type="submit" name="delete_item" class="btn btn-danger"
                                                    value="<?php echo $rows['Food_id']; ?>">DELETE</button></td>
                                            <td><?php echo $rows['Food_id']; ?></td>

                                            <td><?php echo $rows['Name']; ?></td>

                                            <td><?php echo $rows['Price']; ?></td>

                                            <td><?php 
                                            $foodid=$rows['Food_type_id']; 
                                            $foodtype="SELECT `Food_type_name` FROM `Food_Type` WHERE `Food_type_id`='".$foodid."'";
                                            $type=mysqli_query($con,$foodtype);
                                            if($type)
                                            {
                                                $row=mysqli_fetch_assoc($type);
                                                echo $row['Food_type_name'];
                                            }
                                            ?>
                                            </td>

                                            <td><?php echo $rows['About_food']; ?></td>

                                            <td><span class="badge badge-success">Live</span></td>

                                        </tr>



                                        <?php
                                        }
                                    
                                        ?>

                                    </tbody>

                                </table>

                            </div>

                            <!-- /.table-responsive -->

                        </div>

                        <!-- /.card-footer -->

                    </div>

                    <!-- /.card -->

                    <!--<div class="container-fluid item">

                    <div class="row">

                        <div class="col-lg-3 style">

                            <div class="card client">

                                <img class="card-img-top" src="food items/dhoso/collage.png" alt="Card image cap">

                                <div class="card-body">

                                    <h2 class="card-title">dosa</h2>

                                </div>

                                <div class="card-body">

                                    <a href="dosa.html">

                                        <button type="button" class="btn btn-primary">

                                            <i class="fa fa-eye"></i>&nbsp; SHOW</button>

                                    </a>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 style">

                            <div class="card client">

                                <img class="card-img-top" src="food items/soups/soup collage.png"

                                    alt="Card image cap">

                                <div class="card-body">

                                    <h2 class="card-title">soup</h2>

                                </div>

                                <div class="card-body">

                                    <a href="soup.html">

                                        <button type="button" class="btn btn-primary">

                                            <i class="fa fa-eye"></i>&nbsp; SHOW</button>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>-->

                </div>

                <div class="clearer"></div>



            </div>

            <!-- END MAIN CONTENT-->

            <!-- END PAGE CONTAINER-->

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


<?php
if (isset($_POST['delete_item'])) {
                                            //echo "<script>confirm('Are You really want to Delete Dish from the Menu');</script>";
                                            $fid = $_POST['delete_item'];

                                            $delete_food = "DELETE FROM Food_menu WHERE Food_id = '$fid' ";
                                            $delete_result = mysqli_query($con, $delete_food);
                                        }

?>