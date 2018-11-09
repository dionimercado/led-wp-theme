// jQuery.noConflict();

jQuery(function($){


    // jQuery('.fancybox').fancybox({
    //     margin: 0,
    //     padding: 0,
    // });

    jQuery(".led-events").owlCarousel({
      loop: true,
      center:false,
      startPosition: 0,
      margin:20,
      dots: false,
      autoplay: true,
      autoplayTimeout: 8000,
      navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
      ],
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              margin: 10,
              nav:false,
              loop:false,
              stagePadding: 80,
              startPosition: 1,
          },
          600:{
              items:2,
              nav:false,
          },
          1000:{
              items:3,
              nav:false,
              loop:false
          }
      }
    });

    jQuery(".led-packages").owlCarousel({
      loop: true,
      center:false,
      startPosition: 0,
      margin:20,
      dots: false,
      autoplay: true,
      autoplayTimeout: 8000,
      navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
      ],
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              margin: 10,
              nav:false,
              loop:false,
              stagePadding: 80,
              startPosition: 1,
          },
          600:{
              items:3,
              nav:false,
          },
          1000:{
              items:4,
              nav:false,
              loop:false
          }
      }
    });

});
