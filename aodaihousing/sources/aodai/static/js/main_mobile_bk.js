$(document).ready(function(){
    jQuery('.navbar-toggle').click(function(){
        var tmp=jQuery('.nav-res');
        if(tmp.is(':hidden') === true){
             tmp.slideDown();
              $('.navbar-toggle').addClass('nav-show');
              $('.wrapper-content').show();
         }else{
            tmp.slideUp();
            $('.navbar-toggle').removeClass('nav-show');
            $('.wrapper-content').hide();
         }
    });

	$('.wrapper-content').click(function(){
		jQuery('.navbar-toggle').trigger('click');
	})

    jQuery(window).scroll(function(){
        var scroll= $(window).scrollTop();
        if(scroll<100){
            $('#scrollTopDevice').fadeOut();
        }else{
            $('#scrollTopDevice').fadeIn();
        }
    });

    /*jQuery(window).scroll(function(){
        var top_about= $('.btn-search').offset().top;
        var scroll= $(window).scrollTop();
        if(scroll<top_about/1.5){
            $('#scrollSearch').fadeIn();
        }else{
            $('#scrollSearch').fadeOut();
        }
    });*/
});

function scrollAnimate(){
    $("html, body").animate({
        scrollTop: 0
    }, 500);
}

(function (){
    var els = [ 'section', 'article', 'hgroup', 'header', 'footer', 'nav', 'aside', 
    'figure', 'mark', 'time', 'ruby', 'rt', 'rp' ];
    for (var i=0; i<els.length; i++){
        document.createElement(els[i]);
    }
})();



