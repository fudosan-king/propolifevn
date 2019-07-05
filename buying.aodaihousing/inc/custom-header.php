<?php
/**
 * Set up the WordPress core custom header feature.
 *
 * @uses twentyseventeen_header_style()
 */
define ("ASSETS_PATH", get_template_directory().'/assets');
define ("ASSETS_URI", get_template_directory_uri().'/assets');

// Add navs menu
function init_theme_setup() {
  register_nav_menus( array( 
    'header' => 'Header menu', 
    'footer' => 'Footer menu' 
  ) );
}
add_action( 'init',  'init_theme_setup'); 

// Remove WordPress Admin Bar CSS
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

// class Uri
class Uri
{
	
	function __construct()
	{
		
	}

	public static function init() {
		
	}

	public static function the_assets_uri(){
		echo ASSETS_URI;
	}

	public static function get_assets_uri(){
		return ASSETS_URI;
	}
}

// class Path
class Path
{
	
	function __construct()
	{
		
	}

	public static function init() {
		
	}

	public static function the_assets_path(){
		echo ASSETS_PATH;
	}

	public static function get_assets_path(){
		return ASSETS_PATH;
	}
}
?>