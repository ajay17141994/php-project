<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'root';
const DB_NAME = 'agri_bazaar';
// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
print_r ($_POST["breed"]);
$subcategorysql = "SELECT name FROM agri_bazaar.scale where id=(SELECT prefQtyScale FROM agri_bazaar.products where var_id=(SELECT id FROM agri_bazaar.varieties where name='".$_POST["breed"]."'))";

echo $subcategorysql;

$subcategoryresult = $conn->query($subcategorysql);
$i=0;
if ($subcategoryresult->num_rows > 0) {
while($row = $subcategoryresult->fetch_assoc()) {
   echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
}
print_r( $output);
}
?>