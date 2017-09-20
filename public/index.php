<?php
require_once 'config-db.php';
session_start();
// Create connection
$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, 'utf8');

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if( $_POST["phone"] || $_POST["crop"] ) {
	// 	Starting session
	if($_POST["lang"])
	  {
		$_SESSION["lang"] = $_POST["lang"];
	}
	else{
		$_SESSION["lang"] = "en";
	}
  
	if($_POST["usertype"]=="buyer")
		{
		//User Auth and Login
		$sql = "SELECT * FROM buyers as b1 where b1.phone = " . $_POST['phone'];
    $result = $conn->query($sql);
		if ($result->num_rows == 1) {
			$row1 = $result->fetch_assoc();
			// 			Create Session for Seller
      $_SESSION["name"] = $row1["name"];
			$_SESSION["phone"] = $row1["phone"];
			$_SESSION["id"] = $row1["id"];
      $_SESSION["usertype"] = $_POST["usertype"];
      $_SESSION["profilepic"] = $row1["profilePic"];
      $_SESSION["taluka"] = $row1["taluka"];
      $_SESSION["district"] = $row1["district"];
      $_SESSION["state"] = $row1["state"];
      $_SESSION["place"] = $row1["place"];
      $_SESSION["user"] = "buyer";
      //$_SESSION["category"] = "crops";
      header("Location: ./buyer.php");
			die();
		}
		else{
			session_destroy();
		}
		
	}
	else if($_POST["usertype"]=="seller")
	{
		//User Auth and Login
		$sql = "SELECT * FROM sellers as s1 where s1.phone = " . $_POST['phone'];
		$result = $conn->query($sql);
    if ($result->num_rows == 1) {
      $row1 = $result->fetch_assoc();
      // 			Create Session for Seller      
      $_SESSION["name"] = $row1["name"];
			$_SESSION["phone"] = $row1["phone"];
			$_SESSION["id"] = $row1["id"];
      $_SESSION["usertype"] = $_POST["usertype"];
      $_SESSION["profilepic"] = $row1["profilePic"];
      $_SESSION["taluka"] = $row1["taluka"];
      $_SESSION["district"] = $row1["district"];
      $_SESSION["state"] = $row1["state"];
      $_SESSION["place"] = $row1["place"];
      $_SESSION["user"] = "seller";
      //$_SESSION["category"] = "crops";
      header("Location: ./seller.php");
			die();
		}
		else{
			session_destroy();
		}
	}
	else{
		session_destroy();
	}
}
// Destroying session
session_destroy();
?>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--SWIPPER MINIFIED FILES starts here; CSS, JQUERY, JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script> <!--SWIPPER MINIFIED FILES ends here; CSS, JQUERY, JS -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
#googlemaps { 
  height: 100%; 
  width: 100%; 
  position:absolute; 
  top: 0; 
  left: 0; 
  z-index: 0; /* Set z-index to 0 as it will be on a layer below the modal form */
}

.modal-body {
  height:80px !important;
}

</style>

<!-- <script src="js/place_search.js"></script> -->
<script src="js/location.js"></script>

<?php
if(!isset($_SESSION["latitude"]) || !isset($_SESSION["longitude"])){
{
    echo '<script> getLocation(); </script>';
}
}
?>


 </head>
<body onload="open_modal()"> 
<div id="googlemaps"></div>
<form method="POST" action="support/set_location.php" id="locationform">
        <input type="hidden" id="latitude" name="latitude" value="0" />
        <input type="hidden" id="longitude" name="longitude" value="0" />
</form>
<!-- Modal -->
  <div class="modal fade" id="login-modal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-center">Agri Bazaar</h1>
        </div>
        <div class="modal-body">
          <form id="loginForm" method="post" action="">
            <div class="form-group text-center"> 
                <input class="form-control input-lg" name="phone" id="phone" type="text" placeholder="Enter Valid Phone Number" >
                <input type="hidden" id="usertype" name="usertype" value="seller" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="text-center"> 
            <button type="button" id="seller" class="btn btn-primary btn-lg" onclick="login(this.id)">Seller Login</button>
            <button type="button" id="buyer" class="btn btn-secondary btn-lg" onclick="login(this.id)">Buyer Login</button>
          </div>
        </div>
      </div>
    </div>
  </div>



<!-- Include the Google Maps API library - required for embedding maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2_K7RS6zdFah_Llge09tKsbiLRx3CceA"></script>

<script type="text/javascript">
function open_modal(){
        $('#login-modal').modal({backdrop: 'static', keyboard: false})  
    }
$('#login-modal').on('hide.bs.modal', function(e){
  if( $('#block').is(':checked') ) {
     e.preventDefault();
     e.stopImmediatePropagation();
     return false; 
   }
});
// The latitude and longitude of your business / place
var position = [<?php echo $_SESSION["latitude"];?>, <?php echo $_SESSION["longitude"];?>];
function showGoogleMaps() {
    var latLng = new google.maps.LatLng(position[0], position[1]);
    var mapOptions = {
        zoom: 16, // initialize zoom level - the max value is 21
        streetViewControl: false, // hide the yellow Street View pegman
        scaleControl: false, // allow users to zoom the Google Map
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI:true,
        center: latLng
    };
    map = new google.maps.Map(document.getElementById('googlemaps'),
        mapOptions);
}
google.maps.event.addDomListener(window, 'load', showGoogleMaps);


function login(usertype) {
var phone = document.getElementById("phone").value;
if (validation()) // Calling validation function
  {
      $("#usertype").val(usertype);
      document.getElementById("loginForm").submit();
  }
}

// Name and Email validation Function.
function validation()
{
  var phone = document.getElementById("phone").value;
  var phoneReg = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  if( phone ==='')
    {
      alert("Please fill all fields...!!!!!!");
      return false;
    }
  else if(!(phone).match(phoneReg))
    {
      alert("Invalid Phone...!!!!!!");
      return false;
    }
  else
    {
      return true;
    }
}
</script>

</body>
</html>