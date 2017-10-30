jQuery(function($) {
	$(".back-top").hide();	
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

jQuery(function ($) {
	$('span.onsale').each(function () {
		var $title = $(this).prev();
		var $container = $(this).parent().parent();
		if(!$container.hasClass('onsale-container')) {
			$container.addClass('onsale-container');
		}
		if($title.hasClass('list-title')) {
			$title.css('background-color', '#F5BD31');
			$title.css('height', '57px');
		}
	});
});