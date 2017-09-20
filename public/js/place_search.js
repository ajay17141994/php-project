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

