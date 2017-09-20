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
if($_POST["lang"])
{
  $_SESSION["lang"] = $_POST["lang"];
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
  exit;
}
else{
  if($_SESSION["lang"]=="en")
    $_SESSION["lang"] = "kn";
  else
    $_SESSION["lang"] = "en";
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
  exit;
}
?>