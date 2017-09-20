        
        // gettion location javascript goes here..........
        
        
        function getLocation() {

            if (navigator.geolocation) {
                var options = {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                  };
                  
                  function success(pos) {
                    var crd = pos.coords;
                  
                    console.log('Your current position is:');
                    console.log(`Latitude : ${crd.latitude}`);
                    console.log(`Longitude: ${crd.longitude}`);
                    console.log(`More or less ${crd.accuracy} meters.`);

                    //alert(pos.coords.latitude);
                    $("#latitude").val(pos.coords.latitude);
                    $("#longitude").val(pos.coords.longitude);
                    document.getElementById("locationform").submit();
                  };
                  
                  function error(err) {
                    console.warn(`ERROR(${err.code}): ${err.message}`);
                    alert(`ERROR(${err.code}): ${err.message}`);
                  };
                  
                  navigator.geolocation.getCurrentPosition(success, error, options);
            } else {
                console.log("Geolocation is not supported by this browser.");
                alert("Geolocation is not supported by this browser.");
            }
        }
        

