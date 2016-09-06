<?php
@session_start();
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {?>
<script type="text/javascript">var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';</script>
<?php
}
function htmlContactButton(){
	ob_start();?>
    <div class="clearfix"></div>
	<a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-default btn-lg btn-danger" style="color: #ffffff;margin-bottom:25px;">
    <i class="fa fa-envelope" style="margin-right:5px;"></i><span class="hidden-xs">WEBからの お問い合わせ</span>
    </a>
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'Emscafe' ), max( $paged, $page ) );

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
	$my_post = get_post($page_id);
	$my_excerpt=$my_post->post_excerpt;		
	return $my_excerpt;
}

function getContentByID($page_id){
	$content_post = get_post($page_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
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
?>