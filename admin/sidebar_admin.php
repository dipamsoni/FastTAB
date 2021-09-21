<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Sidebar Admin -->
    <!-- <title>Sidebar Admin</title> -->

    <link href="../resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../resource/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="../resource/bootstrap-4.1/bootstrap.min.css">
    <link rel="stylesheet" href="../resource/mdb/mdb.min.css">
    <link rel="stylesheet" href="css/admin.css">

    <script>
    function coming_soon() {
        alert("Offers Coming Soon");
    }
    </script>
</head>

<body>
    <aside class="menu-sidebar d-lg-block">
        <div class="logo">
            <a href="admin.php">
                <img src="../images/icon/fasttab_transparant.png" alt="" />
            </a>
        </div>
        <div class="menu-sidebar__content">
            <nav class=" navbar-sidebar img">
                <ul class="list-unstyled navbar__list p-4">
                    <li class="active has-sub">
                        <a href="admin.php"><i class="fas fa-home mr-3"></i> Home</a>
                    </li>
                    <li>
                        <a href="current_order.php"><i class="fa fa-clock mr-3"></i> Current Orders</a>
                    </li>
                    <li>
                        <a href="completed_order.php"><i class="fa fa-check mr-3"></i> Completed Orders</a>
                    </li>
                    <!--<li>
                        <a href="new_items.php"><i class="fas fa-cart-plus mr-3"></i> New Items</a>
                    </li>-->
                    <li>
                        <a href="new_restaurant.php"><i class="fas fa-calendar-plus mr-3"></i> New Restaurents</a>
                    </li>
                    <li>
                        <a href="customer_pannel.php"><i class="fas fa-address-book mr-3"></i>Comments & Ratings</a>
                    </li>
                    <!--<li>
                        <a href="#"><i class="fas fa-utensils mr-3"></i> Restaurent Pannel</a>
                    </li>-->
                </ul>

                <div class="footer p-4">
                    <p>
                        Copyright &copy;
                        <script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | This site is made with by <a href="admin.php">ThunderCode</a>
                    </p>
                </div>
            </nav>
        </div>
    </aside>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>