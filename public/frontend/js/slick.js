$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 200,
    itemMargin: 150,
    asNavFor: '#slider1'
  });

  $('#slider1').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: true,
    itemWidth: 100,
    itemMargin: 10,
    sync: "#carousel"
  });

  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
