<?php
$suggestion = array(
'id' => 'box-suggestion-id',
'title' => 'Image',
'page' => 'post',	
'context' => 'normal',
'priority' => 'high', 
'fields' => array(
array('name' => 'List attach ID','id' => $prefix.'suggestion-attach-id','type' => 'textarea','std' => ''),
array('name' => 'Total ID','id' => $prefix.'total-suggestion-id','type' => 'textarea','std' => '0')			
));
function suggestion_add_custom_box(){
	global $suggestion;
	add_meta_box($suggestion['id'], $suggestion['title'], 'suggestion_show_box','chronicle', $suggestion['context'], $suggestion['priority']);
}
add_action( 'add_meta_boxes', 'suggestion_add_custom_box');
//--------------------------------------------------------------------------------------------------------------------//
add_action('save_post', 'suggestion_save_data');
//--------------------------------------------------------------------------------------------------------------------//
function suggestion_save_data($post_id) {
global $suggestion;
if (!wp_verify_nonce($_POST['suggestion_meta_box_nonce'], basename(__FILE__))) {return $post_id;}
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return $post_id;}
if ('page' == $_POST['post_type']) {if (!current_user_can('edit_page', $post_id)) {return $post_id;}}
elseif (!current_user_can('edit_post', $post_id)) {return $post_id;}
foreach ($suggestion['fields'] as $field) {
$old = get_post_meta($post_id, $field['id'], true);
$new = $_POST[$field['id']];
if ($new && $new != $old) {update_post_meta($post_id, $field['id'], $new);}
elseif ('' == $new && $old) {delete_post_meta($post_id, $field['id'], $old);}
}
}
//--------------------------------------------------------------------------------------------------------------------//
function suggestion_show_box(){
global $suggestion, $post;
getItermFiledsuggestion($suggestion, $post);
}
//--------------------------------------------------------------------------------------------------------------------//
function getItermFiledsuggestion($suggestion, $post){
echo '<input type="hidden" name="suggestion_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
?>
<table class="form-table"><tr><td valign="top" style="padding:0px">
<?php
foreach ($suggestion['fields'] as $field){
$meta = get_post_meta($post->ID, $field['id'], true);
echo '<textarea  name="', $field['id'], '" id="', $field['id'], '">', $meta ? $meta : $field['std'], '</textarea>';
}
if(get_post_meta($post->ID,'suggestion-attach-id',true)!=''){
$list_suggestion =get_post_meta($post->ID,'suggestion-attach-id',true);
$list_suggestion = str_replace('},','};',$list_suggestion);
$_list = explode(';',$list_suggestion);
}
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'includes/temp-suggest.php');
?>
<div class="clear"></div>
<div class="dotline"></div>
<div align="right"><a href="#TB_inline?width=700&500=auto&inlineId=modal-suggestion" class="button-primary add_more_suggestion thickbox">
<span class="dashicons dashicons-admin-media" style="margin-top:3px;margin-right:5px;"></span>Add more Images</a></div>
</td>
</tr>
</table>
<?php } ?>
<?php if(is_admin()){

wp_register_script('suggest-funtions', plugins_url('/js/suggest-funtions.js', __FILE__));
wp_enqueue_script('suggest-funtions');
wp_register_style('datatables', plugins_url('/css/jquery.dataTables.css', __FILE__));
wp_enqueue_style( 'datatables');
wp_register_script('suggest-datatables', plugins_url('/js/jquery.dataTables.js', __FILE__));
wp_enqueue_script('suggest-datatables');
$posttype=get_post_type($_GET['post']);
if($posttype=='chronicle'){
add_thickbox();
add_action('init','getAllPostTypeFor');
add_filter( 'manage_edit-chronicle_columns', 'getAllPostTypeFor' ) ;
add_action( 'manage_chronicle_posts_custom_column', 'getAllPostTypeFor', 10, 2 );	 
}
}
function getAllPostTypeFor(){
global $post;
?>
<div id="modal-suggestion" style="display:none;">
<?php
$arg = array('post_type' => 'chronicle','orderby' => 'date','order' => 'asc','posts_per_page' =>-1,'status' => array('publish','private'));
$the_query = new WP_Query($arg);
$html='';
$dem=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
$feat_image =  wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured_preview' );
$str = '["<img src='.$feat_image[0].'>","'.get_the_title($post->ID).'","<span class=dashicons data-id='.$post->ID.'></span>"]';
if($dem==0){	$html.=$str;	}
else{$html.=','.$str;}
$dem++;
endwhile;wp_reset_query();?>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script language="javascript">
var dataSet = [<?php echo $html; ?>];
$(document).ready(function(){	
    $('#example').DataTable( {
        data: dataSet,
        columns: [
            { title: "Image" },
            { title: "Title" },
            { title: "Select" }
        ]
    } );
	//$('.dataTables_length').empty().html('<h4 style="margin:13px 0px;font-weight:bold">DANH SÁCH SẢN PHẨM</h4>');
} );
</script>

<table id="example" class="display table-suggestion" width="100%"></table>
</div>
<?php
}
?>