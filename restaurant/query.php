<?php

include 'config.php';

session_start();

$name = $_SESSION['username'];

//FATCH CLIENT DATA FROM DATABASE

$query = "select * from Client_personal_details where Email='" . $name . "' ";

$result = mysqli_query($con, $query);

//USING NAME AND EMAIL FORM DATABASE

while ($rows = mysqli_fetch_assoc($result)) {

    $db_client_id = $rows['Client_id'];

    $db_name = $rows['Client_name'];

    $db_email = $rows['Email'];

    /*echo "<script>
alert('<?php echo $db_client_id; ?>');
</script>";*/
}

//INSERT NEW DISH INTO DATABASE

if (isset($_POST["send_request"])) 
{

	$dish_name = $_POST["food_name"];
	
	$dish_price = $_POST["food_price"];
	
	$dish_discription = $_POST["discription"];
	
	$dish_type = $_POST["food_type"];
	
	$dish_id = rand(100, 500);
	
	
	
	$sql = "insert into Food_menu(Food_id,Client_id,Name,Price,Food_type_id,About_food,Image_path,Status) values('" .$dish_id . "','" . $db_client_id . "','" . $dish_name . "','" . $dish_price . "','" . $dish_type . "','" . $dish_discription . "','NULL','1') ";
	
	$add_item = execute($con, $sql);
	
	if ($add_item) 
	{
		echo "<script>alert('Data Store');</script>";
	} 
	else 
	{
		echo "<script>alert('Error but you can do it');</script>";
	}
}

//Fatch Number of Pending Order form the Database

$query_panding = "SELECT COUNT(Order_id) as ord_id FROM FastTAB_Order_details WHERE Client_id='" . $db_client_id . "' AND Status='1' ";

$result_panding = mysqli_query($con, $query_panding);



while ($rows = mysqli_fetch_assoc($result_panding)) {

$panding_icon = $rows['ord_id'];
}

//Fatch Dishes Name from the DataBase

$food_name = "Select Food_id,Name,Price,Food_type_id,About_food from Food_menu where Client_id='" . $db_client_id . "'
AND Status='1' ";

$food_result = mysqli_query($con, $food_name);

?>