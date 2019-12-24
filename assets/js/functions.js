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
  

  //Object Page and JK page Main Slider
  var mainDomSlider = new Swiper('#mainDomSlider', {
    navigation: {
      nextEl: '.main-slider__next',
      prevEl: '.main-slider__prev',
    },
    pagination: {
      el: '.main-slider__pag',
    },
  });



  //Object slider in Catalog
  let catalogSlider = [];
  let catalogThumb = [];
  $('.filter-result-item').each(function( resindex ) {

    catalogThumb[resindex] = new Swiper( $(this).find('.filter-result-thumbs'), {
      direction:'horizontal',
      spaceBetween: 5,
      slidesPerView: 3,
      shortSwipes: false,
      // simulateTouch: false,
      longSwipes: false,
      followFinger: false,
      allowTouchMove: false,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
        breakpoints:{
          769:{
            direction:'vertical',
            spaceBetween: 2,
          }
        }
    });

    catalogSlider[resindex] = new Swiper( $(this).find('.filter-result-swiper'), {
      spaceBetween: 10,
      thumbs: {
        swiper: catalogThumb[resindex],
      }
    });


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




  //Filter DropDowns
  $('.dropdown-redlink').on('click', function(e){
    $(this).closest('.dropdown-inside').find('.jsOpenBlock').toggleClass('active');
  });

  document.addEventListener('click', function(e){
    if(e.target.closest('.dropdown-inside')) return;
    $('.jsOpenBlock').removeClass('active');
  });

















  //YANDEX MAP

if (typeof ymaps !== "undefined") {

  ymaps.ready(function(){

    //показ карты
    $('.acf-map').each(function(){
        var map = initYaMap( $(this) );
    });

  });


  function initYaMap($el) {

      // Find marker elements within map.
      let $markers = $el.find('.marker');

      // Get position from marker.
      let lat = parseFloat($markers.data('lat'));
      let lng = parseFloat($markers.data('lng'));


      let myMap = new ymaps.Map($el[0], {
          center: [lat, lng],
          controls: ['zoomControl'],
          zoom: $el.data('zoom') || 16,
      });
      myMap.behaviors.disable(['rightMouseButtonMagnifier', 'scrollZoom']);




      let markOptions = {
          iconLayout: 'default#image',
          iconImageHref: '/wp-content/themes/cman/assets/img/locator.png',
          iconImageSize: [60, 60],
          iconImageOffset: [-30, -60],
      }

      let myPlacemark = new ymaps.Placemark([lat, lng], false, markOptions);

      myMap.geoObjects.add(myPlacemark);


  };

  //END
}














  }); //end ready





}(jQuery));

