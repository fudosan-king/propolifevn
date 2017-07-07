jQuery(function(jQuery) {
    //menu
    // jQuery(".navbar-toggle").on('click', function() {
    //   jQuery(this).toggleClass("on");
    // });

    //matchHeight columm
    jQuery('.boxmH').matchHeight();

   // Create a clone of the menu, right next to original.
   /* jQuery('.menu').addClass('original').clone().insertAfter('.menu').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

    scrollIntervalID = setInterval(stickIt, 10);*/


    

    /* customer */
    jQuery('.owl_customer').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1024:{
            items:4,
            nav:true,
            loop:false
        },
        1170:{
            items:6,
            nav:true,
            loop:false
        }
    }
})


});

//---------------------------------------------------

//
var windowSize = jQuery(window).height();

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > windowSize) {
    jQuery('.menu').css({
      'position' : 'fixed',
      'top': '0',
      'width' : '100%',
      'box-shadow' : '0px 0px 10px 0px rgba(0, 0, 0, 0.2)',
      'z-index' : '100'
    });
    
  } else {    
    jQuery('.menu').css({
      'position' : 'relative',
      'box-shadow' : 'none'
    });
  }
});

function collapseNavbar() {
    if (jQuery(".navbar").offset().top > 50) {
        jQuery(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        jQuery(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
}

jQuery(window).scroll(collapseNavbar);
jQuery(document).ready(collapseNavbar);

// Closes the Responsive Menu on Menu Item Click
jQuery('.navbar-collapse ul li a').click(function() {
    jQuery(this).closest('.collapse').collapse('toggle');
});

(function(jQuery){
    jQuery(window).on("load",function(){
        jQuery(".content").mCustomScrollbar();
    });


})(jQuery);



 

 