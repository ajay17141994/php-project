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
$name=$_POST["name"];
$place=$_POST["places"];
$taluk=$_POST["taluk"];
$district=$_POST["district"];
$state=$_POST["state"];
$lat=$_POST["latitude"];
$lon=$_POST["longitude"];
$phone=$_POST["phone_no"];
$addedon=date("Y-m-d h:i:s");
$updatedon=date("Y-m-d h:i:s");


    $query    = "INSERT INTO sellers (name, profilePic, place, taluka, district, state, latitude, longitude, phone, addedOn, updatedOn) 
             VALUES('$name','http://www.freevectors.net/files/large/FreeVectorBusinessManAvatarSilhouette.jpg', '$place', '$taluk', '$district', '$state', '$lat', '$lon', '$phone', '$addedon', '$updatedon')";
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>