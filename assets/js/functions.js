(function ($) {
  'use strict';

  $(document).ready(function () {

	// $('#amount_range').slider({
  //   range: true,
  //   min: 100000,
  //   max: 10000000,
  //   values: [ 500000, 9000000 ],
  //   slide: function(event, ui) {
  //     $("#range_from").val(ui.values[ 0 ]);
  //     $("#range_to").val(ui.values[ 1 ]);
  //   }
  // });

	// $("#credit_amount").val($("#credit_amount_range").slider("value"));

	// $('#credit_amount').change(function(){
	// 	var amount_val = $('#credit_amount').val();
	// 		$('#credit_amount_range').slider('value', amount_val);
  // });


  //маска телефона
  if (typeof IMask !== "undefined") {
    var inputTel = document.querySelectorAll('.inpmask');
    var inputTelMask = [];
    var maskOptions = {
        mask: '+{7}(000)000-00-00',
        lazy: false,
        autofix: true,
    };
    for (var i = 0; i < inputTel.length; i++) {
        inputTel[i].addEventListener('focus', function (e) {
            inputTelMask[i] = IMask(this, maskOptions);
            inputTelMask[i].updateValue();
            inputTelMask[i].alignCursor();
        });
    }
  }
  


  var mainDomSlider = new Swiper('#mainDomSlider', {
    navigation: {
      nextEl: '.main-slider__next',
      prevEl: '.main-slider__prev',
    },
    pagination: {
      el: '.main-slider__pag',
    },
  });


  // GLightbox - для увеличения фото
if (typeof GLightbox !== "undefined") {
  var lightboxDocuments = GLightbox({
      selector: 'glightboxLink',
      moreText: false,
  });
}


// Modals
var xMod = new HystModal.modal({
    linkAttributeName: 'data-hystmodal',
});









  //показ карты
  $('.acf-map').each(function(){
      var map = initMap( $(this) );
  });
















  }); //end ready







// Google MAP
function initMap( $el ) {
  // Find marker elements within map.
  var $markers = $el.find('.marker');

  // Create gerenic map.
  var mapArgs = {
      zoom        : $el.data('zoom') || 16,
      mapTypeId   : google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map( $el[0], mapArgs );

  // Add markers.
  map.markers = [];
  $markers.each(function(){
      initMarker( $(this), map );
  });

  // Center map based on markers.
  centerMap( map );

  // Return map instance.
  return map;
}




function initMarker( $marker, map ) {
  // Get position from marker.
  var lat = $marker.data('lat');
  var lng = $marker.data('lng');
  var latLng = {
      lat: parseFloat( lat ),
      lng: parseFloat( lng )
  };

  // Create marker instance.
  var marker = new google.maps.Marker({
      position : latLng,
      map: map
  });

  // Append to reference for later use.
  map.markers.push( marker );

  // If marker contains HTML, add it to an infoWindow.
  if( $marker.html() ){

      // Create info window.
      var infowindow = new google.maps.InfoWindow({
          content: $marker.html()
      });

      // Show info window when marker is clicked.
      google.maps.event.addListener(marker, 'click', function() {
          infowindow.open( map, marker );
      });
  }
}


function centerMap( map ) {
  // Create map boundaries from all map markers.
  var bounds = new google.maps.LatLngBounds();
  map.markers.forEach(function( marker ){
      bounds.extend({
          lat: marker.position.lat(),
          lng: marker.position.lng()
      });
  });

  // Case: Single marker.
  if( map.markers.length == 1 ){
      map.setCenter( bounds.getCenter() );

  // Case: Multiple markers.
  } else{
      map.fitBounds( bounds );
  }
}





}(jQuery));

