<?php
/*-----------------------------------------------------------------------*/
function wp_admin_bar_remove() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
/*-----------------------------------------------------------------------*/
add_action('wp_before_admin_bar_render', 'wp_admin_bar_remove', 0);
function change_footer_admin () {  
  echo 'Theme made by <a href="http://www.propolifevietnam.com">Propolife Viet Nam</a>';  
}  
add_filter('admin_footer_text', 'change_footer_admin');
/*-----------------------------------------------------------------------*/
function change_footer_version() {echo 'Propolife Admin ';}
add_filter( 'update_footer', 'change_footer_version', 9999);
/*-----------------------------------------------------------------------*/
function remove_metaboxes(){
 remove_meta_box( 'postcustom' , 'page' , 'normal' ); //removes custom fields for page
 remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); //removes comments status for page
 remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); //removes comments for page
}
add_action( 'admin_menu' , 'remove_metaboxes' );
?>