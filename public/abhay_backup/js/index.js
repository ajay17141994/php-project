var sticky = document.querySelector('.sticky');
        var origOffsetY = sticky.offsetTop;

        function onScroll(e) {
        window.scrollY >= origOffsetY ? sticky.classList.add('fixed') :
                                        sticky.classList.remove('fixed');
        window.scrollY >= origOffsetY ? $("#user_detail").css('display','block') :
                                        $("#user_detail").css('display','none');;
        }

        document.addEventListener('scroll', onScroll);

        

        // retrieving search box places google function goes here.......
        function initAutocomplete() {
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

        });
      } // retrieving search box places google function goes here.......

        
        // gettion location javascript goes here..........
        getLocation();
        showPosition();
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }
        function showPosition(position) {
            googleLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            console.log(position.coords.latitude);
        console.log( "Latitude: " + position.coords.latitude + 
            "<br>Longitude: " + position.coords.longitude); 
            geocoder = new google.maps.Geocoder();
                            geocoder.geocode({
                                'latLng': googleLatLng
                            }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                var alamat = results[0].formatted_address;
                                //   document.getElementById("location").innerHTML = alamat;
                                console.log(alamat);
                                //   $(".location").text=alamat;
                                document.getElementById("location").innerHTML = alamat;
                                }
                            }
                        });
        }//getting location ends here..........


        
        
        
        function show()
        {
            $('.listing_view').css('display','block');
            $('.userInfo').css('display','block');
            // $('.sticky_div').css('display','block');

        }

