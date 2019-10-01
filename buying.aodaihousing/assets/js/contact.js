// CONTACT JS FORM

$(document).ready(function(){
	var h3 = $(".teaserBoxLink").html();
	if (h3){
		$('input[name="estates_name"]').val(h3);
	}
	$( ".btnSend" ).click(function() {
	  	if(checkInvalid()){
	  		$('#form_contact').submit();
	  	} else {
	  		return false;
	  	}
	});
	function checkInvalid() {
		$('div.error-text').html('').fadeOut(); 

		// Validate customer name
		var validCustomerName = true;
		$('#customer_name input[type=text]').removeClass('error-background');
		if ($('input[name="customer_name"]').val() == ''){
			$('#customer_name div.error-text').html('値を入力してください').fadeIn();
			$('#customer_name input[type=text]').addClass('error-background');
			validCustomerName = false;
		}

		// Validate address
		var validAddress = true;
		$('#address input[type=text]').removeClass('error-background');	
		if ($('input[name="address"]').val() == ''){
			$('#address div.error-text').html('値を入力してください').fadeIn();
			$('#address input[type=text]').addClass('error-background');
			validAddress = false;
		}

		// Validate number phone
		var validPhone = true;
		$('#phone input[type=tel]').removeClass('error-background');
		var Pattern = /\(?([0-9]{2})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
		//var Pattern = /^+91(7\d|8\d|9\d)\d{9}$/;
		// pattern support (123) 456 7899, (123).456.7899, (123)-456-7899, 123-456-7899, 123 456 7899, 1234567899
		var inputPhone = $.trim($('input[name="number_phone"]').val());
		if (inputPhone == ''){
			$('#phone div.error-text').html('値を入力してください').fadeIn();
			$('#phone input[type=tel]').addClass('error-background');
			validPhone = false;
		} else {
			validPhone = Pattern.test(inputPhone);
			if(!validPhone){
				$('#phone div.error-text').html('間違った電話番号の形式').fadeIn();
				$('#phone input[type=tel]').addClass('error-background');
			}
		}

		// Validate email
		var validEmail = true;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		$('#email input[type=email]').removeClass('error-background');	
		if ($('input[name="email"]').val() == ''){
			$('#email div.error-text').html('値を入力してください').fadeIn();
			$('#email input[type=email]').addClass('error-background');
			validEmail = false;
		}else {
			validEmail = emailReg.test($('input[name="email"]').val());
			if(!validEmail){
				$('#email div.error-text').html('間違ったEメールの形式').fadeIn();
				$('#email input[type=email]').addClass('error-background');
			}
		}

		// Validate purpose of real estate purchase
		var validInvestmentcheck = true;
		var validInvestment = $('input[name="inlineCheckbox1[]"]').is(':checked');
		var validReal_residence = $('input[name="inlineCheckbox2[]"]').is(':checked');
		if (validInvestment == true && validReal_residence == true){
			$('#checkbox div.error-text').html('2つの値を同時に選択することはできません').fadeIn();
			validInvestmentcheck = false;
		}

		var arrValid = [
            validCustomerName,
            validAddress,
            validPhone,
            validEmail,
            validInvestmentcheck
        ];
       
        var result = true;
        $.each(arrValid, function(index, val){
            result = val == true ? result : val;
        });
        
        return result;
	}

	document.addEventListener( 'wpcf7mailsent', function( event ) {
	    location = 'http://example.com/';
	}, false );
});