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
	//---------------------------------------------------
	$('#sendmail').click(function(){
		var username = $('#fullname').val();
		var message = $('#message').val();
		var address = $('#address').val();
		var phonenumber = $('#phonenumber').val();
		var email = $('#mailaddress').val();
		if($('input[name="sendmail"]').hasClass('disabled')){
			return false;
		} else if (username && address && email) {
			$('input[name="sendmail"]').addClass('disabled')
			var data={
				action:"sendmailContact",
				user:username,
				mail:email,
				add:address,
				phone:phonenumber,
				message:message
			};
			$.post(ajaxurl,data,function(rdata){
					//if(rdata==1)
					$('#messageDialog').modal('show').html(rdata);
				});
				return false;
		}
		else{
			$('input[name="sendmail"]').addClass('disabled')
			return false;
		}
	});
	//---------------------------------------------------
});