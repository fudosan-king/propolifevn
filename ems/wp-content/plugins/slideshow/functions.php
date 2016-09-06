<?php
function get_all_tax(){
$taxList = get_taxonomies();
unset($taxList['post_tag']);unset($taxList['category']);unset($taxList['nav_menu']);unset($taxList['link_category']);unset($taxList['post_format']);return $taxList;
}

function get_current_slug(){
$taxList = get_all_tax();
foreach($taxList as $tax){if(get_query_var($tax)!=''){return $tax;break;}}	
}

function get_all_custom_slug(){	
	$html = '';
	$html.='<option value="chon-chuyen-muc-banner">Chọn chuyên mục banner</option>';
	$html.='<option value="trang-chu">Trang chủ</option>';
	$terms = get_all_tax();
	$post_types = get_post_types();	

	foreach ( $terms as $term ) {
		$the_tax = get_taxonomy($term);
		$term_child = get_terms($term,array('orderby'=> 'name','order'=> 'ASC','hide_empty'=> 0));
		foreach($term_child as $child)
		//$html.= '<option value="'.$term.'">'.$the_tax->labels->name.'</option>';
		$html.= '<option value="'.$child->slug.'">'.$child->name.'</option>';
	}	
	
	unset($post_types['attachment']);
	unset($post_types['revision']);
	unset($post_types['nav_menu_item']);
	unset($post_types['mediapage']);
	unset($post_types['page']);
	unset($post_types['post']);
	
	$args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args);
		
	foreach ( $post_types as $post_type ) {
		$html.= '<option value="'.$post_type.'">'.get_post_type_object($post_type)->labels->singular_name.'</option>';
	}	

	for($i=0;$i<count($pages);$i++) {
		$status = get_post_meta($pages[$i]->ID,'op_hide',true);
		if($status=='off' || $status==''){		
			$html.= '<option value="'.$pages[$i]->post_name.'">'.$pages[$i]->post_title.'</option>';
		}
	}

	return $html;
}

function get_all_custom_select_slug($value){	
	$html = '';
	$html.='<option value="chon-chuyen-muc-banner">Chọn chuyên mục banner</option>';
	if($value=='trang-chu'){
		$html.='<option value="trang-chu" selected="selected">Trang chủ</option>';
	}
	else{
		$html.='<option value="trang-chu">Trang chủ</option>';
	}
	$terms = get_all_tax();
	$post_types = get_post_types();
	
	foreach ( $terms as $term ) {
		$the_tax = get_taxonomy($term);
		$term_child = get_terms($term,array('orderby'=> 'name','order'=> 'ASC','hide_empty'=> 0));		
		foreach($term_child as $child){
			if($child->slug==$value){
				//$html.= '<option value="'.$term.'" selected="selected">'.$the_tax->labels->name.'</option>';
				$html.= '<option value="'.$child->slug.'" selected="selected">'.$child->name.'</option>';
			}
			else{
				//$html.= '<option value="'.$term.'">'.$the_tax->labels->name.'</option>';
				$html.= '<option value="'.$child->slug.'">'.$child->name.'</option>';				
			}
		}	
	}	
	
	unset($post_types['attachment']);
	unset($post_types['revision']);
	unset($post_types['nav_menu_item']);
	unset($post_types['mediapage']);
	unset($post_types['page']);
	unset($post_types['post']);
	
	$args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args);	
		
	foreach ( $post_types as $post_type ) {
		if($post_type==$value){
			$html.= '<option value="'.$post_type.'" selected="selected">'.get_post_type_object($post_type)->labels->singular_name.'</option>';
		}
		else{
			$html.= '<option value="'.$post_type.'">'.get_post_type_object($post_type)->labels->singular_name.'</option>';
		}		
	}
	
	for($i=0;$i<count($pages);$i++) {
		$status = get_post_meta($pages[$i]->ID,'op_hide',true);
		if($status=='off' || $status==''){
			if($pages[$i]->post_name==$value){
				$html.= '<option value="'.$pages[$i]->post_name.'" selected="selected">'.$pages[$i]->post_title.'</option>';
			}
			else{
				$html.= '<option value="'.$pages[$i]->post_name.'">'.$pages[$i]->post_title.'</option>';
			}
		}
	}	
	return $html;
}

//--------------------------------------------------------------------
function export_slideshow($gal,$url,$w,$h,$title){
foreach($gal as $g){
$img = wp_get_attachment_image_src($g,'slideshow_large');
?>
<div><a href="<?php echo $url; ?>" target="_blank" title="<?php echo $title; ?>"><img u="image" src="<?php echo $img[0]; ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" /></a></div>	
<?php	
}
add_action('wp_footer','script_slideshow');
}
//--------------------------------------------------------------------
function script_slideshow(){
?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/admin-themes/css/stylejssor.css" type="text/css" media="screen"/>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jssor.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jssor.slider.js"></script>
<script>
jQuery(document).ready(function ($) {
var _SlideshowTransitions = [{ $Duration: 1200, $Opacity: 2 }];
var options = {
$AutoPlay: true,
$AutoPlaySteps: 1,
$AutoPlayInterval: 3000,
$PauseOnHover: 1,
$ArrowKeyNavigation: true, 
$SlideDuration: 500,
$MinDragOffsetToSlide: 20,
//$SlideWidth: 600,
//$SlideHeight: 300,
$SlideSpacing: 0,
$DisplayPieces: 1,
$ParkingPosition: 0,
$UISearchMode: 1,
$PlayOrientation: 1,
$DragOrientation: 3,
$SlideshowOptions: {
$Class: $JssorSlideshowRunner$,
$Transitions: _SlideshowTransitions,
$TransitionsOrder: 1,
$ShowLink: true
},
$BulletNavigatorOptions: {
$Class: $JssorBulletNavigator$,
$ChanceToShow:0,
$AutoCenter: 1,
$Steps: 1,
$Lanes: 1,
$SpacingX: 10,
$SpacingY: 10,
$Orientation: 1
},
$ArrowNavigatorOptions: {
$Class: $JssorArrowNavigator$,
$ChanceToShow: 0, 
$AutoCenter: 2,
$Steps: 1
}
};
var jssorslider = new $JssorSlider$("sliderview", options);
function ScaleSlider() {
var parentWidth = jssorslider.$Elmt.parentNode.clientWidth;
if (parentWidth)
jssorslider.$ScaleWidth(Math.min(parentWidth, "<?php echo get_option('binfo[bannerwidth]'); ?>"));
else
window.setTimeout(ScaleSlider, 30);
}
ScaleSlider();
$(window).bind("load", ScaleSlider);
$(window).bind("resize", ScaleSlider);
$(window).bind("orientationchange", ScaleSlider);
});
</script>
<?php }?>