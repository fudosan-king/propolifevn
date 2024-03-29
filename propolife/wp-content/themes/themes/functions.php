<?php
add_action('wp_head','pluginname_ajaxurl');

add_theme_support( 'post-thumbnails' );

// Load external file to add support for MultiPostThumbnails. Allows you to set more than one "feature image" per post.
require_once('multiple-post-thumbnails/multi-post-thumbnails.php');
function pluginname_ajaxurl() {?>
<script type="text/javascript">var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';</script>
<?php
}
function htmlContactButton(){global $lienhe;$hl = explode(';',$lienhe['hotline']);
	ob_start();?>
    <div style="font-size:25px;background-color:#ffffff;padding:5px 10px;color:#000000;display: inline-block;border-radius: 25px;"><?php echo $hl[1];?></div>
    <div class="clearfix"></div>
	<a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-default btn-lg btn-contact" style="color: #04978D;">
    <i class="fa fa-envelope"></i><span class="hidden-xs">WEBから相談</span>
    </a>
<?php
	$cform = ob_get_contents();
	ob_end_clean();
	return $cform;
}

function htmlContactButton2(){
	ob_start();?>
    <div align="center" style="margin:15px 0px;"><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-success btn-lg btn-big">内装工事について相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<?php
	$cform = ob_get_contents();
	ob_end_clean();
	return $cform;
}
function htmlContactButton3(){
	ob_start();?>
<div align="center" style="margin-bottom:15px;"><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-success btn-lg btn-big">相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<?php
	$cform = ob_get_contents();
	ob_end_clean();
	return $cform;
}
function htmlContactButton4(){
	ob_start();?>
<div align="center" style="margin-top:30px;"><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-success btn-lg btn-big">ロンハウ工業団地相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<?php
	$cform = ob_get_contents();
	ob_end_clean();
	return $cform;
}
function htmlContactButton5(){
	ob_start();?>
<div align="center" style="margin-top:30px;"><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-success btn-lg btn-big">相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<?php
	$cform = ob_get_contents();
	ob_end_clean();
	return $cform;
}
function htmlContactButton6(){
	ob_start();?>
<div align="center" style="margin-top:30px;"><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-success btn-lg btn-big">制作について相談する<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<?php
	$cform = ob_get_contents();
	ob_end_clean();
	return $cform;
}
function htmlAboutButton(){
    ob_start();?>
<div align="center" style="margin-top:30px; margin-bottom:15px;"><a href="<?php echo get_permalink(get_page_by_path('about')); ?>" class="btn btn-success btn-lg btn-big">会社概要<i class="fa fa-chevron-circle-right" style="margin:0px 0px 0px 10px;color:#ffffff"></i></a></div>
<?php
    $cform = ob_get_contents();
    ob_end_clean();
    return $cform;
}
/*-----------------------------------------------------------------------*/
function new_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'Propolife Viet Nam' ), max( $paged, $page ) );

	return $title;
}

/*-----------------------------------------------------------------------*/
add_filter( 'wp_title', 'new_wp_title', 10, 2 );
/*-----------------------------------------------------------------------*/
function get_page_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
/*-----------------------------------------------------------------------*/
function getExcerptByID($page_id){
	$content_post = get_post($page_id);
	$my_excerpt = $content_post->post_excerpt;
	$my_excerpt = apply_filters('the_excerpt', $my_excerpt);
	$my_excerpt = str_replace(']]>', ']]&gt;', $my_excerpt);
	return $my_excerpt;
}
/*-----------------------------------------------------------------------*/
function getContentByID($page_id){
	$content_post = get_post($page_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}
/*-----------------------------------------------------------------------*/
function get_limit_characters($str,$max){
//$content_post = get_post($page_id);
//$content = $content_post->post_content;
//$content = preg_replace(" (\[.*?\])",'',$str);
//$content = strip_shortcodes($content);
$content = strip_tags($str);
$content = substr($content, 0, $max);
$content = substr($content, 0, strripos($content, "。"));
//$content = trim(preg_replace( '/\s+/', ' ', $content));
$content = $content.'。。。';
return $content;
}
/*-----------------------------------------------------------------------*/
include('functions/theme-script.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-alert.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-mail.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-shopcart.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-display.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-url.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-dashboard.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-login.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-order.php');
/*-----------------------------------------------------------------------*/
include('functions/theme-option.php');
/*-----------------------------------------------------------------------*/
add_image_size('web-thumb',263,300,true);
/*-----------------------------------------------------------------------*/
add_image_size('perth-thumb',360,270,true);
/*-----------------------------------------------------------------------*/
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10,0);
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');

function stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
		wp_deregister_script('jquery');
	}
}
add_action('init', 'stop_loading_wp_embed_and_jquery');
// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => '2nd Feature Image',
        'id' => 'feature-image-2',
        'post_type' => 'page'
        )
    );
};

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

?>
