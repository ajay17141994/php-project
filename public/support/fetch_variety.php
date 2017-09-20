<?php
require_once './../config-db.php';

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$varietysql = "SELECT id,name FROM varieties where sub_id=".$_POST["subcategoryData"];
echo $varietysql;
$varietyresult = $conn->query($varietysql);
if ($varietyresult->num_rows > 0) {
while($row = $varietyresult->fetch_assoc()) {
   echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
}
}
else{
    if(isset($_POST["subcategoryData"]))
    {
        echo "<option value='0'>none</option>";
    }
}
?>