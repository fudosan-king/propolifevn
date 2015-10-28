<?php

function add_javascript_and_css() {
    $template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());

    # css
    echo '<link rel="stylesheet" href="' . $template_directory . '/bootstrap-3.3.5-dist/css/bootstrap.css" type="text/css">';
    echo '<link href="' . $template_directory . '/font-awesome-4.3.0/css/font-awesome.css" type="text/css" rel="stylesheet">';
    echo '<link rel="stylesheet" href="' . $template_directory . '/css/styles.css" type="text/css">';
    echo '<link rel="stylesheet" href="' . $template_directory . '/css/jquery.mCustomScrollbar.css">';

    # javascript
    echo '<script src="' . $template_directory . '/js/jquery-1.11.0.js"></script>';
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

    if ((is_page( 827 ) || is_page( 824 ) || is_page( 829 )) && ($classes[8] == 'menu-item-831' || $classes[8] == 'menu-item-832' || $classes[8] == 'menu-item-833')){
        $classes[] = "active";
    }

    if ((is_page( 1038 ) || is_page( 1036 ) || is_page( 1040 )) && ($classes[8] == 'menu-item-1066' || $classes[8] == 'menu-item-1064' || $classes[8] == 'menu-item-1063')){
        $classes[] = "active";
    }

    if ((in_category( 'NEWS-VN' ) || in_category( 'NEWS-EN' ) || in_category( 'チャート' )) && ($classes[4] == 'menu-item-831' || $classes[4] == 'menu-item-832' || $classes[4] == 'menu-item-833') && !is_home()){
        $classes[] = "active";
    }

    if ((in_category( 'CLASS-VN' ) || in_category( 'CLASS-EN' ) || in_category( 'CLASS-JP' )) && ($classes[4] == 'menu-item-126' || $classes[4] == 'menu-item-119' || $classes[4] == 'menu-item-130') && !is_home()){
        $classes[] = "active";
    }

    if ((in_category( 'LESSON-VN' ) || in_category( 'LESSON-EN' ) || in_category( 'LESSON-JP' )) && ($classes[4] == 'menu-item-1066' || $classes[4] == 'menu-item-1064' || $classes[4] == 'menu-item-1063') && !is_home()){
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

    if ( in_category( 'NEWS-VN' ) || in_category( 'NEWS-EN' ) || in_category( 'チャート' )) {
        $single_template = dirname( __FILE__ ) . '/single-news.php';
    }

    if ( in_category( 'LESSON-VN' ) || in_category( 'LESSON-EN' ) || in_category( 'LESSON-JP' )) {
        $single_template = dirname( __FILE__ ) . '/single-lesson.php';
    }

    return $single_template;
}

add_filter( "single_template", "get_custom_cat_template" ) ;

function get_custom_archive_template($archive_template) {
    global $post;
    if ( in_category( 'NEWS-VN' ) || in_category( 'NEWS-EN' ) || in_category( 'チャート' )) {
        $archive_template = dirname( __FILE__ ) . '/archive-news.php';
    }

    return $archive_template;
}

add_filter( "archive_template", "get_custom_archive_template" ) ;

function get_archives_link_customer($url, $text, $format = 'html', $before = '', $after = '', $cat) {
    $text = wptexturize($text);
    $url = esc_url($url) . '&cat=' . $cat;

    $link_html = "\t<li class='list-group-item'>$before<a href='$url'>$text</a>$after</li>\n";

    $link_html = apply_filters( 'get_archives_link_customer', $link_html );

    return $link_html;
}

function wp_get_archives_customer( $args = '' ) {
    global $wpdb, $wp_locale;

    $defaults = array(
        'type' => 'monthly', 'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1, 'order' => 'DESC', 'cat' => ''
    );

    $r = wp_parse_args( $args, $defaults );

    $r['type'] = 'monthly';

    if ( ! empty( $r['limit'] ) ) {
        $r['limit'] = absint( $r['limit'] );
        $r['limit'] = ' LIMIT ' . $r['limit'];
    }

    $order = strtoupper( $r['order'] );
    if ( $order !== 'ASC' ) {
        $order = 'DESC';
    }

    $archive_week_separator = '&#8211;';

    $archive_date_format_over_ride = 0;

    $archive_day_date_format = 'Y/m/d';

    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';

    if ( ! $archive_date_format_over_ride ) {
        $archive_day_date_format = get_option( 'date_format' );
        $archive_week_start_date_format = get_option( 'date_format' );
        $archive_week_end_date_format = get_option( 'date_format' );
    }

    $where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );

    $join = apply_filters( 'getarchives_join', '', $r );

    $output = '';

    $last_changed = wp_cache_get( 'last_changed', 'posts' );
    if ( ! $last_changed ) {
        $last_changed = microtime();
        wp_cache_set( 'last_changed', $last_changed, 'posts' );
    }

    $limit = $r['limit'];
    $cat = $r['cat'];

    if ( 'monthly' == $r['type'] ) {
        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date $order $limit";
        $key = md5( $query );
        $key = "wp_get_archives:$key:$last_changed";
        if ( ! $results = wp_cache_get( $key, 'posts' ) ) {
            $results = $wpdb->get_results( $query );
            wp_cache_set( $key, $results, 'posts' );
        }
        if ( $results ) {
            $after = $r['after'];
            foreach ( (array) $results as $result ) {
                $url = get_month_link( $result->year, $result->month );
                /* translators: 1: month name, 2: 4-digit year */
                $text = sprintf( __( '%1$s %2$d' ), $wp_locale->get_month( $result->month ), $result->year );
                if ( $r['show_post_count'] ) {
                    $r['after'] = '&nbsp;(' . $result->posts . ')' . $after;
                }

                $output .= get_archives_link_customer( $url, $text, $r['format'], $r['before'], $r['after'], $cat );
            }
        }
    }
    if ( $r['echo'] ) {
        echo $output;
    } else {
        return $output;
    }
}

function theme_name_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    // $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    // $site_description = get_bloginfo( 'description', 'display' );
    // if ( $site_description && ( is_home() || is_front_page() ) ) {
    //     $title .= " $sep $site_description";
    // }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    if ( ! ( is_front_page() ) and ! ( is_home() ) ) {
        $title = str_replace('サムライボクシングジム', 'ベトナムホーチミン市ボクシングエクササイズジム', $title);
    }

    return $title;
}
add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );

?>

