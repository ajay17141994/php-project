<?php
require_once './../config-db.php';

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$subcategorysql = "SELECT id,name FROM subcategories where cat_id=".$_POST["categoryData"];
$subcategoryresult = $conn->query($subcategorysql);
if ($subcategoryresult->num_rows > 0) {
while($row = $subcategoryresult->fetch_assoc()) {
   if(isset($_POST["categoryData"]))
    echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
}
}
?>