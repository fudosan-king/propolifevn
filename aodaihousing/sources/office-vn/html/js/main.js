$(document).ready(function () {
    // Language select
    $('.current_lang').click(function(e){
		e.stopPropagation();
		$(this).toggleClass('open');
		$('.lang_drop').toggle();
	});
	$('html').click(function(){
		if ($('.current_lang').hasClass('open')) {
			$('.lang_drop').toggle();
			$('.current_lang').removeClass('open');
		}
	});
    $(window).scroll(function(){
        if($(this).scrollTop()!=0){
            $('#top').fadeIn();
        }
        else{
            $('#top').fadeOut();
        }
        //console.log($(this).scrollTop());
        console.log($("html").height());
    });
    $('#top').click(function(){
        $('body,html').animate({scrollTop:0},800);
    });
});
