<?php
require_once './../config-db.php';

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

print_r ($_POST["breed"]);
$fetchunitsql = "SELECT name FROM agri_bazaar.scale where id=(SELECT prefQtyScale FROM agri_bazaar.products where var_id=(SELECT id FROM agri_bazaar.varieties where name='".$_POST["breed"]."'))";

echo $fetchunitsql;

$fetchunitresult = $conn->query($fetchunitsql);
$i=0;
if ($fetchunitresult->num_rows > 0) {
while($row = $fetchunitresult->fetch_assoc()) {
   echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
}
print_r( $output);
}
?>