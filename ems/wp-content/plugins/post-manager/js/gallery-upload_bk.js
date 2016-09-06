// Uploading files
var file_frame;

jQuery('.upload_image_gallery').live('click', function( event ){
  rel = $(this).attr('rel');
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
	// We set multiple to false so only get one image from the uploader
	attachment = file_frame.state().get('selection').first().toJSON();
	//alert(attachment.url);
	var img = '<div class="thumb_show" align="center"><img src="'+attachment.url+'" height="150" width="180" /></div>';
	//$('#hinh-dai-dien').val(attachment.url);
	//$('.hinh-dai-dien img').attr('src',attachment.url);
	
	$_thumb_exist = $("#upload_image_gallery_"+rel+' .upload_image_gallery').find('.thumb_show').length;
	if($_thumb_exist>0){
	  $("#upload_image_gallery_"+rel+' .upload_image_gallery .thumb_show').remove();
	}
  
	$('#upload_image_gallery_'+rel+' .upload_image_gallery').append(img);
	var str = $('#gallery-thumb-id').val();
	var list = JSON.parse('['+str+']');

	var send_datas = { 
		action:"replaceKey",
		key: parseInt(rel),
		arr:list,
		attach_id:attachment.id,
		status:'attach_id'
	};
	$.post(ajaxurl,send_datas,function(data){			
		$('#gallery-thumb-id').val(data);
	});			  
	//alert(attachment.id);
	//$('#gallery-thumb-id').val(str);
	// Do something with attachment.id and/or attachment.url here
  });
  
  // Finally, open the modal
  file_frame.open();
});