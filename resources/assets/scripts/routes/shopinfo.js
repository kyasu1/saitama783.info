export default {
  init() {
    // JavaScript to be fired on the home page
    console.log("TEST");
    function initMap() {
      // Create a map object and specify the DOM element for display.
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
      });
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
