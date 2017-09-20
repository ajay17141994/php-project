<?php
require_once 'config-db.php';
// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if( $_GET["phone"] || $_GET["crop"] ) {

	if($_GET["usertype"]=="buyer")
	{
		//User Auth and Login
		$sql = "SELECT * FROM buyers as s1 where s1.phone = " . $_GET['phone'];
		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
            // Create Session for Seller
			header("Location: ./buyer.php");
            die();           
		}
		else{
			echo "User error..! Buyer not Found.!";
			exit();
		}
	}
	else{
		// User Auth and Login
		$sql = "SELECT * FROM sellers as s1 where s1.phone = " . $_GET['phone'];
		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
            // Create Session for Seller
			header("Location: ./seller.php");
            die();           
		}
		else{
			echo "User error..! Seller not Found.!";
			exit();
		}
	}
}
else {
	echo "Invalid Request";
	exit();
}
?>
