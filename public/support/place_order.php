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

$sql = 'INSERT INTO orders (pro_id, buyer_id, req_qty, prefQtyScale ) VALUES (' . $_POST["ord_pro_id"] . ' , ' . $_POST["ord_buyer_id"] .' , '. $_POST["ord_reqQty"].' , ' . $_POST["ord_prefQtyScale"].')';
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo '<meta http-equiv="refresh" content="2;url=' . $_SERVER['HTTP_REFERER'] .'">';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<meta http-equiv="refresh" content="2;url=' . $_SERVER['HTTP_REFERER'] .'">';    
}

$conn->close();
?>
