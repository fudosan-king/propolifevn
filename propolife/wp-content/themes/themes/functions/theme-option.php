<?php 

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'New Theme!',
		'menu_slug' 	=> 'sgvink-theme-settings',
		'capability'	=> 'edit_posts',
		'icon_url'      => false,
		'redirect'		=> true,

	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'General Settings Page',
		'menu_title'	=> 'General',
		'parent_slug'	=> 'sgvink-theme-settings',
		'update_button'		=> __('Update', 'acf'),
		'updated_message'	=> __("Self Theme Options Updated", 'acf'),
	));
	
}

?>