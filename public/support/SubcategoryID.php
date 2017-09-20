<?php
require_once './../config-db.php';

// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sub_id;
$var_id;
$qty_id;
$prc_id;
$seller_id;
$seller_place;
$seller_taluk;
$seller_district;
$seller_state;
$seller_latitude;
$seller_longitude;
$seller_phone;
if($_POST['subcategory'])
{
    // print_r ($_POST["breed"]);
    $subcategorysql = "SELECT id FROM subcategories where name='".$_POST['subcategory']."'";

    // echo $subcategorysql;

    $subcategoryresult = $conn->query($subcategorysql);
    $i=0;
    if ($subcategoryresult->num_rows > 0) {
    while($row = $subcategoryresult->fetch_assoc()) {
        $GLOBALS['sub_id']=$row["id"];
        echo $row["id"];
            }
        }
}


if($_POST['breedID'])
{
    // print_r ($_POST["breed"]);
    $subcategorysql = "SELECT id FROM varieties where name='".$_POST['breedID']."'";

    // echo $subcategorysql;

    $subcategoryresult = $conn->query($subcategorysql);
    $i=0;
    if ($subcategoryresult->num_rows > 0) {
    while($row = $subcategoryresult->fetch_assoc()) {
        $GLOBALS['var_id']=$row["id"];
    echo $row["id"];
            }
        }
}


if($_POST['quantityUnitID'] )
{
    // print_r ($_POST["breed"]);
    $subcategorysql = "SELECT id FROM scale where name='".$_POST['quantityUnitID']."'";

    // echo $subcategorysql;

    $subcategoryresult = $conn->query($subcategorysql);
    $i=0;
    if ($subcategoryresult->num_rows > 0) {
    while($row = $subcategoryresult->fetch_assoc()) {
       $GLOBALS['qty_id']=$row["id"];
    echo $row["id"];
            }
        }
}

if( $_POST['priceUnitID'] )
{
    // print_r ($_POST["breed"]);
    $subcategorysql = "SELECT id FROM scale where name='".$_POST['priceUnitID']."'";

    // echo $subcategorysql;

    $subcategoryresult = $conn->query($subcategorysql);
    $i=0;
    if ($subcategoryresult->num_rows > 0) {
    while($row = $subcategoryresult->fetch_assoc()) {
       $GLOBALS['prc_id']=$row["id"];
    echo $row["id"];
            }
        }
}


if($_POST['userInfo_mobile'])
{
    // print_r ($_POST["breed"]);
    $subcategorysql = "SELECT id, place, taluka, district, state, latitude, longitude, phone FROM sellers where phone='".$_POST['userInfo_mobile']."'";

    // echo $subcategorysql;

    $subcategoryresult = $conn->query($subcategorysql);
    $i=0;
    if ($subcategoryresult->num_rows > 0) {
    while($row = $subcategoryresult->fetch_assoc()) {
        $GLOBALS['seller_id']=$row["id"];
        $GLOBALS['seller_place']=$row["place"];
        $GLOBALS['seller_taluk']=$row["taluk"];
        $GLOBALS['seller_district']=$row["district"];
        $GLOBALS['seller_state']=$row["state"];
        $GLOBALS['seller_latitude']=$row["latitude"];
        $GLOBALS['seller_longitude']=$row["longitude"];
        $GLOBALS['seller_phone']=$row["phone"];

    echo $row["id"];
    echo $row["place"];
    echo $row["taluk"];
    echo $row["district"];
    echo $row["state"];
    echo $row["latitude"];
    echo $row["longitude"];
    echo $row["phone"];
   

            }
        }
}

if($_POST['expiryDate'])
{
            // echo $GLOBALS['seller_id'];
            echo $GLOBALS['seller_place'];
echo $GLOBALS['seller_taluk'];
echo $GLOBALS['seller_district'];
// echo $prc_id;
// echo $seller_id;
// $seller_place;
// $seller_taluk;
// $seller_district;
// $seller_state;
// $seller_latitude;
// $seller_longitude;
// $seller_phone;
$addedon=date("Y-m-d h:i:s");
$updatedon=date("Y-m-d h:i:s");


$category=$_POST['category'];
$subcategory=$_POST['Subcategory'];
$breed=$_POST['breed'];
$quantity=$_POST['quantity'];
$quantityUnit=$_POST['quantityUNIT'];
$price=$_POST['price'];
$currency=$_POST['currency'];
$postedOn=$_POST['postedDate'];
$expiryon=$_POST['expiryDate'];
     // print_r ($_POST["breed"]);
    $subcategorysql = "INSERT INTO products (id, sub_id, var_id, seller_id, place, taluka, district, state, latitude, longitude, addedOn, updatedOn, totalQty, soldQty, minOrderQty, price, isActive, isVerified, isEditable, verifiedOn, prefQtyScale, prefPriceScale, availDate, expiryDate) 
             VALUES(4,
              '$GLOBALS['sub_id']',
              '$GLOBALS['var_id']',
               '$GLOBALS['seller_id']',
                '$GLOBALS['seller_place']',
                 '$GLOBALS['seller_taluk']',
                  '$GLOBALS['seller_district']',
                   '$GLOBALS['seller_state']',
                    '$GLOBALS['seller_latitude']', 
                    '$GLOBALS['seller_longitude']',
                     '$addedon',
                      '$updatedon',
                       $quantity,
                       0,
                        0,
                        $price,
                         1,
                          0,
                          0,
                           '$addedon'
                            , '$GLOBALS['qty_id']',
                            ' $GLOBALS['prc_id']',
                             '$postedOn','$expiryon' )";

    // echo $subcategorysql;

    if ($conn->query($subcategorysql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}




?>