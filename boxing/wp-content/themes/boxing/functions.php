<?php

function add_javascript_and_css() {
    $template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());

    # css
    echo '<link rel="stylesheet" href="' . $template_directory . '/bootstrap-3.3.5-dist/css/bootstrap.css" type="text/css">';
    echo '<link href="' . $template_directory . '/font-awesome-4.3.0/css/font-awesome.css" type="text/css" rel="stylesheet">';
    echo '<link rel="stylesheet" href="' . $template_directory . '/css/styles.css" type="text/css">';
    echo '<link rel="stylesheet" href="' . $template_directory . '/css/jquery.mCustomScrollbar.css">';

    # javascript
    echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';
    echo '<script src="' . $template_directory . '/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>';
    echo '<script type="text/javascript" src="' . $template_directory . '/js/jssor.js"></script>';
    echo '<script type="text/javascript" src="' . $template_directory . '/js/jssor.slider.js"></script>';
}

function add_fancybox() {
    $template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());

    echo '<script type="text/javascript" src="' . $template_directory . '/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>';
    echo '<link rel="stylesheet" type="text/css" href="' . $template_directory . '/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen">';
    echo '<link rel="stylesheet" type="text/css" href="' . $template_directory . '/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5">';
    echo '<script type="text/javascript" src="' . $template_directory . '/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>';
}

function wpsites_nav_class($classes, $item){
    global $post;

    if (is_home() && ($classes[4] == 'menu-item-17' || $classes[4] == 'menu-item-18' || $classes[4] == 'menu-item-19')){
        $classes[] = "active";
    }

    if ((is_page( 52 ) || is_page( 48 ) || is_page( 50 )) && ($classes[8] == 'menu-item-57' || $classes[8] == 'menu-item-58' || $classes[8] == 'menu-item-59')){
        $classes[] = "active";
    }

    if ((is_page( 70 ) || is_page( 72 ) || is_page( 74 )) && ($classes[8] == 'menu-item-76' || $classes[8] == 'menu-item-78' || $classes[8] == 'menu-item-79')){
        $classes[] = "active";
    }
    if ((is_page( 257 ) || is_page( 89 ) || is_page( 96 )) && ($classes[8] == 'menu-item-100' || $classes[8] == 'menu-item-264' || $classes[8] == 'menu-item-267')){
        $classes[] = "active";
    }

    if ((is_page( 112 ) || is_page( 116 ) || is_page( 114 )) && ($classes[8] == 'menu-item-126' || $classes[8] == 'menu-item-119' || $classes[8] == 'menu-item-130')){
        $classes[] = "active";
    }

    if ((is_page( 106 ) || is_page( 240 ) || is_page( 110 )) && ($classes[8] == 'menu-item-244' || $classes[8] == 'menu-item-246' || $classes[8] == 'menu-item-133')){
        $classes[] = "active";
    }

    if ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) && ($classes[4] == 'menu-item-126' || $classes[4] == 'menu-item-119' || $classes[4] == 'menu-item-130') && !is_home()){
        $classes[] = "active";
    }

    return $classes;
}

if ( ! is_admin() ) {
    add_action( 'wp_head', 'add_javascript_and_css', 0 );
    add_action( 'wp_head', 'add_fancybox', 0 );
    add_filter('nav_menu_css_class' , 'wpsites_nav_class' , 10 , 2);
}

function add_script_footer(){
    echo '
        <script>
            jQuery(function($){
            function popupContact() {
                $screen=window.innerWidth;
                if($screen <=767){
                    $w = $(".quick-contact").innerWidth();
                    //$left=($screen-$w)/2;
                    //$(".bg-quick-contact").css("left",$left);
                    $(".bg-quick-contact").css("width",$w);
                }
            }
            $(window).bind("load", popupContact);
            $(window).bind("resize", popupContact);
            $(window).bind("orientationchange", popupContact);

            //--------------------//
            $(".media-list li a").click(
            function(){
                $(".title-video").text($(this).attr("title"));
                var $rel = $(this).attr("rel");
                $("#media-view").attr("src","https://www.youtube.com/embed/"+$rel);
                return false;
                }
            );
            //--------------------//
            });
        </script>
    ';
}
add_action( 'wp_footer', 'add_script_footer', 0 );

function get_custom_cat_template($single_template) {
    global $post;

    if ( in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) {
        $single_template = dirname( __FILE__ ) . '/single-class.php';
    }

    if ( in_category( 'GYM-VN' ) || in_category( 'GYM-EN' ) || in_category( 'GYM-JP' )) {
        $single_template = dirname( __FILE__ ) . '/single-gym.php';
    }
    return $single_template;
}

add_filter( "single_template", "get_custom_cat_template" ) ;

?>

