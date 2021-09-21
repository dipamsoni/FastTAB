<?php

include 'config.php';

/*$query="select Client_personal_details.Client_name,Food_menu.Name,Food_menu.Price,Food_menu.About_food FROM Food_menu RIGHT JOIN Client_personal_details ON Client_personal_details.Client_id=Food_menu.Client_id AND Food_menu.Status=0";/*/

$query = "select Client_personal_details.Client_name,Client_personal_details.Client_id,Food_menu.Name,Food_menu.Price,Food_menu.About_food,Food_type.Food_Type_name FROM Food_menu JOIN Client_personal_details ON Client_personal_details.Client_id=Food_menu.Client_id AND Food_menu.Status=0 JOIN Food_Type ON Food_menu.Food_Type_id=Food_Type.food_type_id AND Food_menu.Status=0";

/*$query="select * from client_personal_details CROSS JOIN food_menu,food_type where client_personal_details.Client_id=food_menu.Client_id AND food_menu.Status=0";*/

$result = mysqli_query($con, $query);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN:New Items</title>

    <!--<link rel="stylesheet" href="adminlte.min.css">-->
    <link rel="stylesheet" href="../resource/bootstrap-4.1/bootstrap.min.css">

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
    <form method="POST">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Requested Items</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Client Id</th>
                                <th>Client Name</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Type Name</th>
                                <th>About Food</th>
                                <th>Request</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            while ($rows = mysqli_fetch_assoc($result))
                            {
                                    $id=$rows['Client_id'];
                            ?>

                            <tr>
                                <td><?php echo $rows['Client_id']; ?></td>
                                <td><?php echo $rows['Client_name']; ?></td>
                                <td><?php echo $rows['Name']; ?></td>
                                <td><?php echo $rows['Price']; ?></td>
                                <td><?php echo $rows['food_type_name']; ?></td>
                                <td><?php echo $rows['About_food']; ?></td>
                                <td>
                                    <button type="submit" name="new_data_insert">Add to Database</button>
                                </td>
                            </tr>

                            <?php

                                // $while_id=$rows['Client_id'];


                            }

                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </form>
</body>

</html>


<?php

if (isset($_POST["new_data_insert"])) 
{
    echo $id;
}

?>