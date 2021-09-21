<?php

$host = "localhost";    /* Host name */
$user = "id11945813_kpdjps123";         /* User */
$password = "kpd637288";         /* Password */
$dbname = "id11945813_fasttab";   /* Database name */


// Create connection
$con = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}

function execute($con, $sql)
{
	$res = mysqli_query($con, $sql);
	return $res;
}

?>