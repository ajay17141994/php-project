<?php
$data=$_POST['Pincode'];
$url="http://postalpincode.in/api/pincode/".$data."";
$result = file_get_contents($url);
// $vars = json_decode($result, true);
echo $result; 
?>