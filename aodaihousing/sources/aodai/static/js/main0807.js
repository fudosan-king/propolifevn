$(document).ready(function () {
    $('.wrapper-main').append('<div id="top">Back to Top</div>');
    var offset = $('.footer').offset();
    var right = offset.left - 73;
    var top = offset.top;
    top = $('.wrapper-main').height();
    
    
    

    $('#top').css({right: right});
    //$('#top').css('bottom', "-53");
    $(window).scroll(function () {
        if ($(window).scrollTop() != 0) {
            //$('#top').fadeIn();
        } else {
            //$('#top').fadeOut();
        }
    });
    $('#top').click(function () {
        $('html, body').animate({
                scrollTop: 0
            }, 500);
    });
    $(".iframe").fancybox({
		'width'				: '790px',
		'height'			: '75%',
        'autoScale'     	: false,
        'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
        'closeBtn'   : true
	});
    $(".popup_p").fancybox({
		'width'				: '850px',
        'autoScale'     	: false,
        'transitionIn'		: 'none',
		'transitionOut'		: 'none',
        'closeBtn'   : true
	});
    $(".f_map").fancybox({
		'width'				: '790px',
		'height'			: '75%',
        'autoScale'     	: false,
        'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
        'closeBtn'   : true
	});
    
    $(".option-icon-1").click(function(){
        $(".option-icon-1 input[type=radio]").attr('checked', true);
        $('.ofice-option').hide();
        $(".select_hide").show();
        $.post(root + current_lang + '/common/areas/', {'type':1}, function(data) {
            //$("#areas div").remove();
            $("#areas").html(data); 
            $('#s1').select2();

        });
    })
    $(".option-icon-2").click(function(){
        $(".option-icon-2 [type=radio]").attr('checked', true);
        $('.ofice-option').show();
        $(".select_hide").hide();
        $.post(root + current_lang + '/common/areas/', {'type':3}, function(data) {
           $("#areas").html(data); 
           $('#s1').select2();

        });
    })
    //Custom select
    $("#s1").select2();
    $("#s2").select2();
	$("#s3").select2();
    $("#s4").select2();
    $("#s5").select2();
    $("#s6").select2();
    $("#s7").select2();
    //Search
    $(".opt-1").change(function(){
       $("#select-customcategory-1").text($(".opt-1 option:selected").text());
    });
    $("#select-customcategory-1").click(function(){
        $(".opt-1").trigger('focus');
    })
    $(".opt-2").change(function(){
       $("#select-customcategory-2").text($(".opt-2 option:selected").text());
    });
    $("#select-customcategory-2").click(function(){
        $(".opt-2").trigger('focus');
    })
    ///end
    
    
    $(".wrap-s input[type=text]").click(function(){
        
        if($(this).val() == '物件検索キーワード') {
            $(this).val('');
        }
    })
    $(".wrap-s input[type=text]").focusout(function(){
        if($(this).val() == '') {
            $(this).attr('placeholder', '物件検索キーワード');
        }
    })
    $(".f-search input[type=text]").click(function(){
        if($(this).val() == '物件検索キーワード') {
            $(this).attr('placeholder', '');
        }
    })
    $(".f-search input[type=text]").focusout(function(){
        if($(this).val() == '') {
            $(this).attr('placeholder', '物件検索キーワード');
        }
    })
    console.log($('.head script').eq(1).val());
});
