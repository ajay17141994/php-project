<?php

// Starting session
require_once './../config-db.php';
session_start();

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if($_POST["latitude"] && $_POST["longitude"])
{
  $_SESSION["latitude"] = $_POST["latitude"];
  $_SESSION["longitude"] = $_POST["longitude"];
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
  exit;
}
else{
  $_SESSION["latitude"] = $_POST["latitude"];
  $_SESSION["longitude"] = $_POST["longitude"];
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
  exit;
}
?>