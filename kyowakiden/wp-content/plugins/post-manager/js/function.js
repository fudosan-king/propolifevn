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
	
	// Sortable album
	if($(".album-list-image").length>0){
		$(".album-list-image").sortable();
	}
	
	// Save album
	$("#publish").live("click",function(){
		var albums = new Array();
		if($(".album-list-image").length>0){
			$(".album-list-image").find("li").each(function(){
				albums.push({
					id:$(this).children("input.idattch").val(),
					caption:$(this).children("input.album-title").val()
				});
			});
			$(".album-list-image").prev(".album_json_data").val(JSON.stringify(albums));
		}
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

function delete_img_upload($a,$key,$postid,$url_plugin)
{
url = $url_plugin+'post-delete-img.php';
jQuery(document).ready(function($) 

	{		
		$('.delete'+$a).click(function () {
			$.post('', {
				//a: $(this).find('input.post_id6').attr('value')
			}, function(data) {
				//var content = $( data ).find( '#content_delete' );
				var content='<input type="hidden" name="delete-'+$key+'" value="'+$key+'" />';
				//$( "#title_upload_ajax" ).empty().append( content);
				$( "#title_upload_ajax"+$a ).empty().append('');
				$( "#img_upload_ajax"+$a ).empty().append(content);
			});
		});

	}
);
}
function backup_db(url){
	var theAnswer = confirm("Do you want to backup your database of website?");
	 if (theAnswer){
     
	 window.location.href=url;
	 	 
	}
	
 //otherwise display another message
	else{
    return false;
	}
}


// Album in post type
var file_frame;
function open_wp_media_ablum(obj){
	var $ = jQuery;
	var parent = $(obj).parents(".w-album");
	var album_container = $(obj).prev(".album-list-image");
	if (file_frame) {
		file_frame.open();
		return false;
	}
	
	file_frame = wp.media.frames.file_frame = wp.media({
		title: jQuery(this).data('uploader_title'),
		button: {
			text: "Insert to album",
		},
		multiple: true
	});
	
	file_frame.on("select", function () {
		var selection = file_frame.state().get('selection');
		selection.map(function( attachment ){
			attachment = attachment.toJSON();
			var html = 	"<li>";
			html	+=	"	<input class='idattch' type='hidden' value='"+attachment.id+"' />";
			html	+=	"	<img class='album-img' src='"+attachment.url+"' />";
			html	+=	"	<input placeholder='Caption..' type='text' class='album-title' />";
			html	+=	"	<a onclick='return remove_image_album(this)' class='album-remove' href='#'>x</a>";
			html 	+=	"</li>";
			album_container.append(html);
		});
		
	});
	// Finally, open the modal
	file_frame.open();
	return false;
}

// Remove image album
function remove_image_album(obj){
	var $ = jQuery;
	$(obj).parent("li").css({
		'border-color': 'red'
	}).fadeOut("slow",function(){
		$(this).remove();
	});
	return false;
}

// Update post meta
function update_post_meta($this, $post_id,$meta_key){
    $($this).children("i")
        .toggleClass("icon-ok")
        .toggleClass("icon-remove")
        .toggleClass("icon-red")
        .toggleClass("icon-green");
    var $meta_value = $($this).attr("rel");
    $.post(ajaxurl,{action:"manager_update_post_meta",post_id:$post_id,meta_key:$meta_key,meta_value:$meta_value},function(rdata){
        if($meta_value=='on'){
            $($this).attr("rel","");
        }else{
            $($this).attr("rel","on");
        }
    },'json');
    return false;
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