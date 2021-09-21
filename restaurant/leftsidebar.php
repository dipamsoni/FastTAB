<!DOCTYPE html>
<html lang="en">

<head>
    <title>Restaurant</title>
</head>

<body>
    <!-- MENU SIDEBAR-->

    <aside class="menu-sidebar d-none d-lg-block">

        <div class="logo">

            <a href="#">

                <img src="../images/icon/fasttab_transparant.png" alt="Cool Admin" />

            </a>

        </div>

        <div class="menu-sidebar__content">

            <nav class="navbar-sidebar">

                <ul class="list-unstyled navbar__list">

                    <li class="has-sub">

                        <a href="restaurant.php">

                            <h4><i class="fas fa-home"></i>Home</h4>

                        </a>

                    </li>
                    
                      <li class="has-sub">

                        <a href="view_details.php?value=<?php echo $db_client_id; ?>">

                            <h4><i class="fas fa-info-circle"></i>Personal Details</h4>

                        </a>

                    </li>
                    
                    <li>

                        <a href="items.php?value=<?php echo $db_client_id; ?>">

                            <h4><i class="fas fa-utensils"></i>Items</h4>

                        </a>

                    </li>
                    <li>

                        <a href="turnover.php?value=<?php echo $db_client_id; ?> ">

                            <h4><i class="fas fa-rupee-sign"></i>Turn Over</h4>

                        </a>

                    </li>

                    <li>

                        <a href="review.php?value=<?php echo $db_client_id; ?> ">

                            <h4><i class="fas fa-comment-alt"></i>Review & Rating</h4>

                        </a>

                    </li>
                    <li>

                        <a href="varification.php?value=<?php echo $db_client_id; ?> ">

                            <h4><i class="fa fa-user"></i>User varification</h4>

                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </aside>

    <!-- END MENU SIDEBAR-->
</body>

</html>