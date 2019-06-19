
<?php 

define('TEMPLATE_DIR', get_stylesheet_directory_uri()."/assets");

function lotusvn_setup(){

	load_theme_textdomain( 'lotusvn' );

	#add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	register_nav_menus( array (
		'top' => __('Top Menu', 'lotusvn'),
	) );

	add_theme_support(
		'custom-logo', array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	show_admin_bar( false );

}
add_action( 'after_setup_theme', 'lotusvn_setup');

function lotusvn_scripts(){
	wp_enqueue_style( 'lotusvn-style', get_stylesheet_uri() );
	wp_enqueue_style( 'lotusvn-bootstrap', get_theme_file_uri( '/assets/bootstrap/css/bootstrap.css' ), array( 'lotusvn-style' ), '1.1' );
	wp_enqueue_style( 'lotusvn-animsition', get_theme_file_uri( '/assets/css/animsition.min.css' ), array( 'lotusvn-style' ), '1.1' );
	wp_enqueue_style( 'lotusvn-swiper', get_theme_file_uri( '/assets/css/swiper.min.css' ), array( 'lotusvn-style' ), '1.1' );
	wp_enqueue_style( 'lotusvn-bootstrap-dropdownhover', get_theme_file_uri( '/assets/css/bootstrap-dropdownhover.min.css' ), array( 'lotusvn-style' ), '1.1' );
	
	wp_enqueue_style( 'lotusvn-common', get_theme_file_uri( '/assets/css/styles.css' ), array( 'lotusvn-style' ), '1.1' );
	wp_enqueue_style( 'lotusvn-mobile', get_theme_file_uri( '/assets/css/mobile.css' ), array( 'lotusvn-style' ), '1.1' );

	wp_enqueue_script('lotusvn-jquery', get_theme_file_uri( '/assets/js/jquery-1.9.1.min.js' ), array(), '1.9.1');

}
add_action( 'wp_enqueue_scripts', 'lotusvn_scripts');


// add_filter( 'excerpt_length', 'custom_excerpt_length' );
// function custom_excerpt_length(){
// 	return 50;
// }

function custom_short_excerpt($excerpt){
	$strMax = strlen($excerpt);
	$num = 50;
	
	if ($strMax > $num)
		$excerpt = mb_substr($excerpt, 0, $num).' [...]';
	
	return $excerpt;
}
add_filter('the_excerpt', 'custom_short_excerpt');

add_filter('the_time', 'dynamictime');
function dynamictime() {
  global $post;
  $date = $post->post_date;
  $time = get_post_time('G', true, $post);
  $mytime = time() - $time;
  if($mytime > 0 && $mytime < 2*24*60*60)
    $mytimestamp = sprintf(__('%s ago'), human_time_diff($time));
  else
    $mytimestamp = date(get_option('date_format'), strtotime($date));
  return $mytimestamp;
}

// add_filter('wp_title', 'lotusvn_title');
// function lotusvn_title( $title )
// {

//     // Return my custom title
//     return sprintf("%s %s", $title, get_bloginfo('name'));
// }

// Extras Funcions

function acf_get_layout_label($field, $layout_name){
	$layouts = get_field_object($field)['layouts'];
	$key = array_search($layout_name,array_column($layouts, 'name', 'key'));
	return $layouts[$key]['label'];
}

function woo_agr_get_all_product_with_taxonomy($taxonomy){
	return array(
						
						
		// Type & Status Parameters
		'post_type'   => 'product',
		'post_status' => 'publish',


		// Order & Orderby Parameters
		'order'               => 'DESC',
		'orderby'             => 'date',



		// Pagination Parameters
		'posts_per_page'         => -1,

		// Taxonomy Parameters
		'tax_query' => array(
			array(
				'taxonomy'         => 'product_cat',
				'field'            => 'slug',
				'terms'            => $taxonomy,
				'operator'         => 'IN',
			),
		),

		// Permission Parameters -
		'perm' => 'readable',

		// Parameters relating to caching
		'no_found_rows'          => false,
		'cache_results'          => true,
		'update_post_term_cache' => true,
		'update_post_meta_cache' => true,

	);
}

function get_nav_child_menu($menus, $parent_menu){
	$child_menus = array();
	foreach($menus as $menu){
		if($menu->menu_item_parent == $parent_menu){
			array_push($child_menus, $menu);
		}
	}
	return $child_menus;
}

add_action( 'ninja_forms_display_js', 'prefix_track_form_submission' );
function prefix_track_form_submission() {
    ?>
    
    <script>
    //<![CDATA[
        $( '.ninja-forms-form' ).on( 'submitResponse', function( e, response ) {
            var errors = response.errors;
            if ( errors == false ) {
                // This is where you put the tracking code. This only fires if form submission is successfull
                dataLayer.push({"event": "inquiry-complete"});
            }
        });
    //]]>
    </script>
    
    <?php
}

// add_action( 'admin_init', 'bb_remove_yoast_seo_admin_filters', 20 );
// function bb_remove_yoast_seo_admin_filters() {
//     global $wpseo_meta_columns ;
//     if ( $wpseo_meta_columns  ) {
//         remove_action( 'restrict_manage_posts', array( $wpseo_meta_columns , 'posts_filter_dropdown' ) );
//         remove_action( 'restrict_manage_posts', array( $wpseo_meta_columns , 'posts_filter_dropdown_readability' ) );
//     }
// }

function lotusvn_login_logo_one() { 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_url( $custom_logo_id , 'full' );
?> 
<style type="text/css"> 
body.login div#login h1 a {
background-image: url(<?php echo $image; ?>);
background-size: 100%;
width: 90px;
height: 90px;
} 
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'lotusvn_login_logo_one' );

require_once 'inc/functions_ext.php';

?>