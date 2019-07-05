<?php
/**
 * Implement the Custom function
 */

// Define google map api key
define( 'API_KEY','AIzaSyD7l3ljlmNTVQ535YkuU9OOpLLb8tcNQC8' );

// Require branch function
require get_parent_theme_file_path( '/inc/custom-header.php' );
require get_parent_theme_file_path( '/inc/custom-pagination.php');
require get_parent_theme_file_path( '/inc/custom-google-map-api.php');
require get_parent_theme_file_path( '/inc/custom-post-type.php');
require get_parent_theme_file_path( '/inc/custom-contact.php');
require get_parent_theme_file_path( '/inc/custom-menu-wp.php');
require get_parent_theme_file_path( '/inc/custom-hide-editor.php');

add_theme_support( 'post-thumbnails' );

?>