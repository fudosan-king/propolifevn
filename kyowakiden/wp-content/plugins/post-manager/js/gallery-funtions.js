// JavaScript Document
jQuery(function($){	
	var num_gallery=0;
	$(".add_one_gallery").click(function(){
		num_gallery = parseInt($('#total-gallery-id').val())+1;	
		var str = $('#gallery-thumb-id').val();
		var _key = '{"key":"'+num_gallery+'","attach_id":"null","order":"0"}';
		if(str=='')
		$('#gallery-thumb-id').val(_key);
		else		
		$('#gallery-thumb-id').val(str+','+_key);
		
		var html = html_temp(num_gallery);
		$('#list-gallery-box').append(html);			
		$('#total-gallery-id').val(num_gallery);		
	});
	//---------------------------------------	
	
});

function html_temp(num){	
html='<div class="c_gallery" id="id_gallery_pro_'+num+'">'
html+='<div class="gallery-product" align="center" id="upload_image_gallery_'+num+'"><a href="" onclick="return false" class="upload_image_gallery" rel="'+num+'"></a></div>'
html+='<div class="tbar">'
html+='<div class="order"><input type="text" value="0" id="order_gallery_'+num+'" onkeyup="setOrder('+num+')" /></div>'
html+='<div class="del-gallery" onclick="delete_element('+num+')"><div  align="center" class="del-gallery-c">'
html+='<a href="#" onclick="return false;"><span class="dashicons dashicons-trash"></span></a></div></div></div>'
html+='</div>'	
return html;
}

//---------------------------------------	
function delete_element(num){
	$=jQuery;
	
	var str = $('#gallery-thumb-id').val();
	var list = JSON.parse('['+str+']');

	var send_datas = { 
		action:"delKey",
		key: parseInt(num),
		arr:list
	};
	$.post(ajaxurl,send_datas,function(data){
		$('#id_gallery_pro_'+num).fadeOut();
		$('#gallery-thumb-id').val(data);
		return false;
	});
}
//---------------------------------------	
function setOrder(id){
	
	$=jQuery;	
	
	var ord = $('#order_gallery_'+id).val();
	var str = $('#gallery-thumb-id').val();
	var list = JSON.parse('['+str+']');

	var send_datas = { 
		action:"replaceKey",
		key: parseInt(id),
		arr:list,
		order:ord,
		status:'order'
	};
	$.post(ajaxurl,send_datas,function(data){
		$('#gallery-thumb-id').val(data);
	});	
}