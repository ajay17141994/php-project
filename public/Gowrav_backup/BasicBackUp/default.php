
<!DOCTYPE html>
<html>
<head>
<title>Agri Bazaar</title>
</head>

<body>

<p id="demo">Click the button to get your position.</p>

<div id="locationHolder">No location</div>
<button onclick="getLocation()">Get position</button>

<script>
  var x = document.getElementById("demo");
  
  function getLocation() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
          x.innerHTML = "Geolocation is not supported by this browser.";
      }
  }
  
  function showPosition(position) {
      var latlon = position.coords.latitude + "," + position.coords.longitude;
      document.getElementById("locationHolder").innerHTML = latlon;
  }
  
  function showError(error) {
      switch(error.code) {
          case error.PERMISSION_DENIED:
              x.innerHTML = "User denied the request for Geolocation.";
              break;
          case error.POSITION_UNAVAILABLE:
              x.innerHTML = "Location information is unavailable";
              break;
          case error.TIMEOUT:
              x.innerHTML = "The request to get user location timed out.";
              break;
          case error.UNKNOWN_ERROR:
              x.innerHTML = "An unknown error occurred.";
              break;
      }
      alert("Error code " + error.code + ". " + error.message);
  }
  </script>
  
</body>
</html>