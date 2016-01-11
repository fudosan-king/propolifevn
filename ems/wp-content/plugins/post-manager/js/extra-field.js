jQuery(function($){
$(".add-size").click(function(){
	var _size = $('#txt-add-size').val();
	var _arrsize = $('#tmp-list-size').val();	
	flag=checkAddElement(_arrsize,_size,'size');	
	if(flag==-1 && _size!=''){
	num = parseInt($('#total-list-size').val())+1;
	html='<div class="size-box" id="size_box_'+num+'">'
	html+='<input type="radio" name="size-radio" id="size-radio-'+num+'" class="radio" value="'+_size+'" />'
	html+='<label for="size-radio-'+num+'" class="extraField" aria-label="size" aria-data="'+_size+'">'+_size+'</label>'	
	html+='<div align="center" class="minus" onclick=findAndRemove("size",'+num+')><span class="dashicons dashicons-no-alt"></span></div>'
	html+='</div>';
	
	$('#total-list-size').val(num);
	var _key = '{'
		_key+='"key":"'+num+'",'
		_key+='"size":"'+_size+'"'
		_key+='}';
	if(_arrsize=='')
	$('#tmp-list-size').val(_key);
	else{$('#tmp-list-size').val(_arrsize+','+_key);}
	$('#show-list-size').append(html);
	$('#txt-add-size').val('');
	
	var _listSize = $('#tmp-list-size').val();
	var _listTotal = $('#total-list-size').val();
	$.post(ajaxurl,{'action': 'update_list_extra_field',list:_listSize,total:_listTotal,field:'size'},function(response){});
	}
	
});
//---------------------------------------
$(".add-color").click(function(){
	var _color = $('#txt-add-color').val();
	var _arrcolor = $('#tmp-list-color').val();
	flag=checkAddElement(_arrcolor,_color,'color');	
	if(flag==-1 && _color!=''){
	num = parseInt($('#total-list-color').val())+1;	
	html='<div class="color-box" id="color_box_'+num+'">'
	html+='<input type="radio" name="color-radio" id="color-radio-'+num+'" class="radio"  value="'+_color+'" />'
	html+='<label for="color-radio-'+num+'" style="background-color:'+_color+'" class="extraField" aria-label="color" aria-data="'+_color+'">&nbsp;</label>'	
	html+='<div align="center" class="minus" onclick=findAndRemove("color",'+num+')><span class="dashicons dashicons-no-alt"></span></div>'
	html+='</div>';
	
	$('#total-list-color').val(num);
	var _key='{'
		_key+='"key":"'+num+'",'
		_key+='"color":"'+_color+'"'
		_key+='}';
	if(_arrcolor=='')
	$('#tmp-list-color').val(_key);
	else{$('#tmp-list-color').val(_arrcolor+','+_key);}
	$('#show-list-color').append(html);
	$('#txt-add-color').val('');
	var _listColor = $('#tmp-list-color').val();
	var _listTotal = $('#total-list-color').val();
	$.post(ajaxurl,{'action': 'update_list_extra_field',list:_listColor,total:_listTotal,field:'color'},function(response){});
	}
});

//---------------------------------------	
});
jQuery(function($){
$('.my-color-picker').wpColorPicker({
defaultColor: true,
change: function(event, ui){},
clear: function() {},
hide: true,
palettes: true
});
//---------------------------------------
$('.extraField').live('click',function(){
	var label = $(this).attr('aria-label');	
	var data = $(this).attr('aria-data').replace(/[^a-z0-9\s]/gi, '');	
	
	var _s = $('input[name="'+label+'"]').val();
	if(_s==''){
		$('input[name="'+label+'"]').val(data);
		drawHtml(label,data);
	}
	else{
		flag=checkBeforeInsertElement(_s,data);
		if(flag==-1){
		_s =_s+','+data;
		$('input[name="'+label+'"]').val(_s);
		drawHtml(label,data);
		}
	}
	//_s = $('input[name="'+label+'"]').val();
	//var obj =_s.split(',');
	//+++++++++++++++++++++++++++++++++++
	//alert(obj.length);		
});
//---------------------------------------
});
//---------------------------------------	
function findAndRemove(name,key) {
	var $=jQuery;
	var obj = JSON.parse('['+$('#tmp-list-'+name).val()+']');
	var v = $('#'+name+'-radio-'+key).val();
		
	$('#'+name+'_box_'+key).fadeOut();
	
	var arr = [];
	for(var i = 0; i < obj.length; i++){
		if(obj[i].key!=key){
			arr.push(JSON.stringify(obj[i]));
		}
	}
	$('#tmp-list-'+name).val(arr.join(','));
	
	var _s = $('input[name="'+name+'"]').val();
	$('#'+name+'-box-'+v).fadeOut().remove();
	var _new = findAndRemoveArray(_s,v);	
	$('input[name="'+name+'"]').val(_new);
	
	var _listItem = $('#tmp-list-'+name).val();
	var _listTotal = $('#total-list-'+name).val();
	var _extra = $('input[name="'+name+'"]').val();
	var _postID = $('#post_ID').val();

	$.post(ajaxurl,{'action': 'update_list_extra_field',list:_listItem,total:_listTotal,field:name,extra:_extra,post:_postID},function(response){});
}
//---------------------------------------
function checkBeforeInsertElement(e,data){
	var obj =e.split(',');		
	for(var i = 0; i < obj.length; i++){
		if(obj[i]==data){
			return data;
		}		
	}
	return -1;
}
//---------------------------------------
function checkAddElement(e,data,pos){	
	var obj = JSON.parse('['+e+']');
	
	switch(pos){
	case 'size':
	for(var i = 0; i < obj.length; i++){
		if(obj[i].size==data){
			return data;
		}
	}
	return -1;	
	break;
	case 'color':
	for(var i = 0; i < obj.length; i++){
		if(obj[i].color==data){
			return data;
		}
	}
	return -1;
	break;	
	}
}
//---------------------------------------
function findAndRemoveArray(s,key) {
	var $=jQuery;	
	var obj =s.split(',');	
	var arr = [];
	for(var i = 0; i < obj.length; i++){		
		if(obj[i]!=key){
			arr.push(obj[i]);
		}
	}
	return arr;
}
//---------------------------------------
function drawHtml(label,data){
	switch(label){
	case 'size':
	html='<div class="size-box" id="size-box-'+data+'">'
	html+='<div align="center" class="bl-size">'+data+'</div>'	
	html+='<div align="center" class="minus" onclick=findAndRemoveExtraPost("size","'+data+'")><span class="dashicons dashicons-no-alt"></span></div>'
	html+='</div>';
	$('#'+label+' .meta-controls').append(html);
	break;
	case 'color':
	html='<div class="color-box" id="color-box-'+data+'">'
	html+='<div align="center" style="background-color:#'+data+'">&nbsp;</div>'	
	html+='<div align="center" class="minus" onclick=findAndRemoveExtraPost("color","'+data+'")><span class="dashicons dashicons-no-alt"></span></div>'
	html+='</div>';
	$('#'+label+' .meta-controls').append(html);	
	break;
	}
}
//---------------------------------------
function findAndRemoveExtraPost(label,data){
	$('#'+label+'-box-'+data).fadeOut();
	
	var _s = $('input[name="'+label+'"]').val();
	var _new = findAndRemoveArray(_s,data);	
	$('input[name="'+label+'"]').val(_new);
}