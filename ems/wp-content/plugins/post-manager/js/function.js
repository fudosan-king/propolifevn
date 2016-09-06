var $ =jQuery.noConflict();
/*----------------------------Random-------------------------------------*/
$.extend({ 
  password: function (length, special) {
    var iteration = 0;
    var password = "";
    var randomNumber;
    if(special == undefined){
        var special = false;
    }
    while(iteration < length){
        randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
        if(!special){
            if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
            if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
            if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
            if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
        }
        iteration++;
        password += String.fromCharCode(randomNumber);
    }
    return password;
  }
});
$(document).ready(function(){
	var $ = jQuery;
    
	$(".deletecolorpicker").live("click",function(){		$(this).parent().children(".color_mcp").val("");return false;	});
	if($(".btn_random").length>0){
		$(".btn_random").click(function(){
			randomString=$.password(10);
			$(this).parent().parent().children().children(".random_str").val(randomString);
		});		
	}
	$("#san-pham-mau-type-div").append("<div id='picker' style='float:right'></div>");
	
	$('.color_mcp').live('focusin', function() {
		$(this).parent().append("<div id='picker' style='float:left'></div>");
		var picker = $.farbtastic('#picker');		
		var $this = $(this);		
		picker.linkTo(function onColorChange(color){
			$this.css({'background-color':color});
			$this.val(color);
		});
	});	
	$('.color_mcp').live('focusout', function() {
		$("#picker").remove();
	});
	
});
/*-------------------------------------------------------------------*/
$(function() {
if($(".jquery_date").length >0)
{
	$('.jquery_date').each( function() {
		$( ".jquery_date" ).datepicker({changeMonth: true,changeYear: true, dateFormat: "yy/mm/dd"});
	});
}
if($(".jquery_datetime").length >0)
{
	$('.jquery_datetime').each( function() {
		$( ".jquery_datetime" ).datetimepicker({changeMonth: true,changeYear: true, dateFormat: "yy-mm-dd",timeFormat: "HH:mm:ss"});
	});
}
});

/*-------------------------------------------------------------------*/
function check_disable(obj,a){
$value=obj.value;
name_post='field-name-post-type'+a;
name_taxonomy ='field-name-taxonomy-type'+a;
if(($value == '5')||($value == '8'))
{
	if($value == '5')
	{
		document.getElementById('field-name-post-type'+a).name=name_post;
	}
	else
	{
		document.getElementById('field-name-post-type'+a).name=name_taxonomy;
	}
	document.getElementById('field-name-post-type'+a).removeAttribute('disabled');
	document.getElementById('field-name-post-type'+a).focus();
	
}

else
{
	document.getElementById('field-name-post-type'+a).value="";
	document.getElementById('field-name-post-type'+a).setAttribute('disabled','disabled');
}
//alert('field-name-post-type'+a);
}

jQuery(function($){$('.ure-sidebar').remove()})
jQuery(function($){
	$.each(['maso','ma-so','ma-sp','masp','codeid'], function(index, value ){	  
	if($('input[name="'+value+'"]').length){		
		$('input[name="'+value+'"]').attr('readonly','readonly');
		return false;
	}
	});
	$('#drop-orders-info').change(function(){
		var color = $('option:selected', this).attr('data-color');
		var id = $(this).attr('data-id');
		var _sOrder = $('option:selected', this).text();
		$('.colorStatus').css('background-color','#'+color);
		$.post(
			ajaxurl, 
			{
				'action': 'update_orders_status',cl:color,post_id:id,sOrder:_sOrder
			}, 
			function(response){
				//$('#my-content-id').show();
			}
		);		
	});
});

jQuery(function($){
	$('form#addtag #submit').click(function(){location.reload();});
});