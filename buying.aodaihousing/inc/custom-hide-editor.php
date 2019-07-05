<?php
	add_action( 'init', function() {
	    remove_post_type_support( 'sale-estates', 'editor' );
	    remove_post_type_support( 'news', 'editor' );
	}, 99);

	function remove_pages_editor(){
	  if(get_the_ID() == 5 || get_the_ID() == 15) {
	     remove_post_type_support( 'page', 'editor' );
	  } // end if
	 } // end remove_pages_editor
	add_action( 'add_meta_boxes', 'remove_pages_editor' );
?>