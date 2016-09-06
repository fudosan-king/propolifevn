// Uploading files
var file_frame;
//var dem=0;
  jQuery('.upload_image_button').live('click', function( event ){
									
    event.preventDefault();
 
    // If the media frame already exists, reopen it.
    if ( file_frame ) {
      file_frame.open();
      return;
    }
 
    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: true  // Set to true to allow multiple files to be selected
    });
	
 
    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
	var id = ($('.fancybox-inner .show_banner').attr('id'));	
	
	//lay nhieu duong dan tu thu vien hinh
	var selection = file_frame.state().get('selection');
		var str = $('input[name="binfo[gallery_datas_'+id+']"]').val();
		selection.map( function( attachment ) {
		  attachment = attachment.toJSON();
		  if(str==''){
			  str= attachment.id;
			}
		else{str=str+','+attachment.id;}		
		$('#'+id).append('<div class="slideshow_popup_image popup_gal_'+attachment.id+'" align="center"><div class="del_banner_gallery" onclick="del_element_gallery('+id+','+attachment.id+')"></div><div align="center" class="content_image"><img src="'+attachment.url+'" height="100" /></div><div><input type="text" value="" name="binfo[order_'+attachment.id+']" placeholder="Thứ tự" class="slideshow_order"></div></div>');
		  //alert(attachment.url);	 	
		  // Do something with attachment.id and/or attachment.url here
		});	
		$('input[name="binfo[gallery_datas_'+id+']"]').val(str);

		//lay 1 hinh dau tien tu thu vien hinh								  
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();
	  $('.uploadphoto_'+id).empty();
	  $('.uploadphoto_'+id).append('<img src="'+attachment.url+'" style="max-height: 156px;vertical-align: middle;max-width:272px;" />');
 		//alert(attachment.url);
      // Do something with attachment.id and/or attachment.url here
    });
 
    // Finally, open the modal
    file_frame.open();
  });

jQuery(function($){	

	$(".add-new-banner").click(function(){
		
		var number = parseInt($('input[name="binfo[total_number_banner]"]').val())+1;
		$('input[name="binfo[total_number_banner]"]').val(number);
		
		var str = $('input[name="binfo[arr_banner]"').val();
		if(str=='')
		$('input[name="binfo[arr_banner]"').val(number);
		else		
		$('input[name="binfo[arr_banner]"').val(str+','+number);
		
		var html = html_option(number);		
		$('#post-body-content .meta-box-sortables').append(html);

	});
	//---------------------------------------
	
	$(".add-new-cate").click(function(){
		var cat= $('input[name = "binfo[categories]"]').val();
		$('#op_categories').append('<option>'+cat+'</option>');
	});
	//---------------------------------------	
	//	$(".ls-cont-uploadphoto").click(function(){
	//		$.fancybox({
	//			wrapCSS    : 'fancy',
	//			  openEffect  : 'none',
	//			  closeEffect	: 'none',
	//				modal:false,
	//			  helpers : {
	//				  title : {
	//					  type : 'over'
	//				  }
	//			  }
	//		  }
	//		);
	//	});	
	//---------------------------------------	
	
	//$(".ls-cont-uploadphoto").click(function(){
		//$.fancybox('.fancy');
		//alert($(this).attr('id'));
	//});
			
  //---------------------------------------	s
	
});

function html_option(num){

html='<div id="number_banner_'+num+'">'
html+='<div class="postbox">'

html+='<button type="button" class="handlediv button-link btn-collapse" aria-expanded="true">'
html+='<span class="screen-reader-text">Toggle panel: <?php echo $titlebanner; ?></span>'
html+='<span class="toggle-indicator" aria-hidden="true"></span>'
html+='</button>'
html+='<h2 class="hndle ui-sortable-handle" id="title_banner_'+num+'"><span>Banner slideshow '+num+'</span></h2>'

html+='<input type="hidden"  name="binfo[banner_title_'+num+']"  value="">'
html+='<div class="inside">'

html+='<div class="bimage_outer">'
html+='<table width="100%">'
html+='<tr>'
html+='<td>'

html+='<div class="bimge_div">'
html+='<a class="bimge_content ls-cont-uploadphoto b_dashed uploadphoto_'+num+'" href="#fancy_'+num+'" onclick="getID('+num+')"></a>'

html+='<div id="fancy_'+num+'" align="left" class="banner-fancybox"><div class="title-fancybox">CHOOSE IMAGE FROM LIBRARY</div>'
html+='<input type="hidden" name="binfo[gallery_datas_'+num+']"  />'
html+='<div class="dotline"></div>'
html+='<div id="'+num+'" class="show_banner"></div>'
html+='<div class="clear"></div>'
html+='<div class="dotline"></div>'
html+='<div class="tablenav bottom" align="right"><a href="#" class="upload_image_button button button-primary" title="Add Images">Add Image</a>'
html+='<a href="#" class="button apply-button" title="Add Images" onclick="$.fancybox.close(true);return false">Apply</a>'
html+='<a href="#" class="button" title="Add Images" onclick="$.fancybox.close(true);return false">Cancel</a>'
html+='</div></div>'

html+='</div>'
html+='</td>'
html+='<td width="62%">'
html+='<label class="ls_label">Alt Text:</label><br>'
html+='<input type="text" class="ls_input" name="binfo[banneralt_'+num+']" value="" placeholder="Enter Alt text">'
html+='<label class="ls_label">Title:</label><br>'
html+='<input type="text" class="ls_input" name="binfo[img_title_'+num+']" value="" placeholder="Enter Title">'
html+='<label class="ls_label">Url:</label><br>'
html+='<input type="text" class="ls_input" name="binfo[bannerurl_'+num+']" value="" placeholder="http://">'
html+='</td>'
html+='</tr>'
html+='</table>'

html+='<div align="right" class="bottom-bar">'
html+='<a class="button delete_banner button-primary" href="#" style="float:right" onclick="delete_banner('+num+')">Delete banner</a>'
html+='<div style="float:right">'
html+='<label>Show:</label><input type="radio" name="binfo[hienthi_banner_'+num+']" value="1" /><label>Yes</label>'
html+='<input type="radio" name="binfo[hienthi_banner_'+num+']" value="0" /><label>No</label>'
html+='<label style="margin-left:20px">Select a categories:</label>'
html+='<select id="op_banner_'+num+'" name="binfo[op_banner_'+num+']" onchange="changeOb('+num+')">'

html+=$("input[name='op_add_more']").val()

html+='</select>'
html+='</div>'
html+='<div class="clear"></div>'
html+='</div>'
html+='</div>'
html+='</div>'
html+='</div>'
html+='</div>'
return html;
}

function delete_banner(num){
	$('#number_banner_'+num).fadeOut('slow').remove();
	var str=$('input[name="binfo[arr_banner]"').val();
	var arr= splitArray(str,num);

	$('input[name="binfo[arr_banner]"').val(arr);
	if($('input[name="binfo[arr_banner]"').val()=='')
		$('input[name="binfo[total_number_banner]"]').val(-1);
	return false;
}

function getID(num){
	var $=jQuery;
	$.fancybox('#fancy_'+num);
}

function changeOb(num){
	$('#title_banner_'+num).html('Banner '+$('#op_banner_'+num+' option:selected').text());
	$('input[name="binfo[banner_title_'+num+']"]').val($('#op_banner_'+num+' option:selected').text());
}

function del_element_gallery(id,order){
	var $=jQuery;
	var str = $('input[name="binfo[gallery_datas_'+id+']"]').val();	

	var arr= splitArray(str,order);

	$('#'+id+' .popup_gal_'+order).fadeOut('slow');
	$('input[name="binfo[gallery_datas_'+id+']"]').val(arr);
}

function splitArray(str,order){
	var arr= new Array();
	str=str.split(',');
	j=0;
	for(var i=0;i<str.length;i++){
		if(str[i]!=order){
		arr[j]=str[i];
		j++;
		}		
	}
	return arr;
}

jQuery(function(){$('.btn-collapse').live('click',function(){
	if($(this).attr('aria-expanded')=='true'){
		$(this).parent('.postbox').addClass('closed');
		$(this).attr('aria-expanded','false');
	}
	else{
		$(this).parent('.postbox').removeClass('closed');
		$(this).attr('aria-expanded','true');}		
	});
})