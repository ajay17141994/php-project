<?php
require_once './../config-db.php';

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$updateNAME=$_POST['updateNAME'];
$updateMOBILE=$_POST['updateMOBILE'];
$updatePLACE=$_POST['updatePLACE'];
$updateTALUK=$_POST['updateTALUK'];
$updateDISTRICT=$_POST['updateDISTRICT'];
$updateSTATE=$_POST['updateSTATE'];

$updatedINFOsql = "UPDATE sellers SET name='$updateNAME', place='$updatePLACE', taluka='$updateTALUK', district='$updateDISTRICT', state='$updateSTATE'
WHERE phone='$updateMOBILE'";

if ($conn->query($updatedINFOsql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>