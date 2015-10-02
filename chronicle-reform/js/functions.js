jQuery(function($) {	
	$(".back-top").hide();
	$(".back-top").css({'position': 'fixed','bottom': '90px','right': '20px','z-index': '99'});
	$(".back-top").append('<a href="#"><i class="fa fa-arrow-circle-o-up"></i></a>');
	$(".back-top a").css({'font-size':'55px','color': 'rgba(33, 39, 39, 0.41)','background': 'none','position': 'relative'});	
	// fade in #back-top
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.back-top').fadeIn();
		} else {
			$('.back-top').fadeOut();
		}
	});
	// scroll body to 0px on click
	$('.back-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 400);
		return false;
	});			 
});