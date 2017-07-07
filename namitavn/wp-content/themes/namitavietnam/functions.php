<?php

define('ASSETS_DIR', get_bloginfo( 'template_url' ).'/assets');
define('TEMPLPART', 'templates-part');

add_filter( 'show_admin_bar', '__return_false' );

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

load_theme_textdomain('namitavietnam', get_template_directory().'/languages' );

function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

register_nav_menus( array(
    'header' => __('Header menu', 'namitavietnam'),
    'footer' => __('Footer menu', 'namitavietnam'),
 ) );



if (!function_exists('namita_enqueue_scripts_styles')){

    function namita_enqueue_scripts_styles(){

        wp_enqueue_style( 'bootstrap', ASSETS_DIR.'/bootstrap/css/bootstrap.css');
        wp_enqueue_style( 'font-awsome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style( 'fonts-googleapis', 'https://fonts.googleapis.com/css?family=Lato:400,700');
        wp_enqueue_style( 'owl', ASSETS_DIR.'/owlcarousel/assets/owl.carousel.min.css');
        wp_enqueue_style( 'owl-default', ASSETS_DIR.'/owlcarousel/assets/owl.theme.default.min.css');
        wp_enqueue_style( 'default-style', ASSETS_DIR.'/css/styles.css');
        wp_enqueue_style( 'mobile-style', ASSETS_DIR.'/css/mobile.css');

        wp_enqueue_style( 'swiper', ASSETS_DIR.'/css/swiper.min.css');
        wp_enqueue_style( 'customScrollbar', ASSETS_DIR.'/css/jquery.mCustomScrollbar.css');

        wp_enqueue_script( 'jquery', ASSETS_DIR .'/js/jquery-1.9.1.min.js');
        wp_enqueue_script( 'jquery-easing', ASSETS_DIR .'/js/jquery.easing.1.3.js');
        wp_enqueue_script( 'jquery-bootstrap', ASSETS_DIR .'/bootstrap/js/bootstrap.min.js');
        wp_enqueue_script( 'jquery-owl', ASSETS_DIR .'/owlcarousel/owl.carousel.js');
        wp_enqueue_script( 'jquery-matchHeight', ASSETS_DIR .'/js/jquery.matchHeight-min.js');
        wp_enqueue_script( 'script-clamp', ASSETS_DIR .'/js/clamp.js');
        wp_enqueue_script( 'script-function', ASSETS_DIR .'/js/functions.js');
        wp_enqueue_script( 'script-swiper', ASSETS_DIR .'/js/swiper.jquery.min.js');
        wp_enqueue_script( 'script-customScrollbar', ASSETS_DIR .'/js/jquery.mCustomScrollbar.concat.min.js');

    }

    add_action( 'wp_enqueue_scripts', 'namita_enqueue_scripts_styles');

}

add_filter('acf/prepare_field', 'qtranslate_logo_content_acf_fields');
function qtranslate_logo_content_acf_fields($field){
    if (strpos($field['wrapper']['class'], 'qtranslation') !== false){
        $field['class'] = 'qtranslation';
    }
    return $field;
}

include_once('includes/custom-admin-menu.php');

include_once('includes/custom-custom-post.php');

include_once('includes/custom-admin-sub-menu.php');

include_once('includes/set-custom-post-filter.php');

include_once('includes/common.php');

?>
