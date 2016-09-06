// Uploading files
var file_frame;

jQuery('.add_more_gallery').live('click', function( event ){
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
	///attachment = file_frame.state().get('selection').first().toJSON();
	//attachment = file_frame.state().get('selection');
	var selection = file_frame.state().get('selection');
	var total_id=parseInt($('#total-gallery-id').val());
	var d=1;
	
	selection.map( function( attachment ) {
	  	attachment = attachment.toJSON();
	  	key_init = total_id+d;
		//Image draw
		//num_gallery = parseInt($('#total-gallery-id').val())+1;	
		var str = $('#gallery-thumb-id').val();
		var _key = '{"key":"'+key_init+'","attach_id":"'+attachment.id+'","order":"0"}';
		if(str=='')
		$('#gallery-thumb-id').val(_key);
		else		
		$('#gallery-thumb-id').val(str+','+_key);
		
		var html = html_temp(key_init);
		$('#list-gallery-box').append(html);
		
		var img = '<div class="thumb_show" align="center"><img src="'+attachment.url+'" height="100" width="100" /></div>';
		$('#upload_image_gallery_'+key_init+' .upload_image_gallery').append(img);		
			
		//$('#total-gallery-id').val(num_gallery);	  
	  	//---------------------------------------
	  	d++;
	});		
	
	var s_length = parseInt(selection.length);
	$('#total-gallery-id').val(total_id+s_length);
  });
  
  // Finally, open the modal
  file_frame.open();
});