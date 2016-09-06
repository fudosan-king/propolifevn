<?php
function display_meta_box_seo() {	
global $seo, $post;	
getItermFiled($seo, $post);
}
function seo_add_custom_box() {
$post_types = get_post_types( '', 'names' ); 
foreach ( $post_types as $post_type ) {
add_meta_box('customer-seo',__( 'Post SEO', 'woothemes' ),'display_meta_box_seo',$post_type);
}    
}

add_action( 'add_meta_boxes', 'seo_add_custom_box' );

function seo_save_data($post_id) {
global $seo;	
$list_array = array(
0=>$seo
);

// check autosave
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
return $post_id;
}

// check permissions
if ('page' == $_POST['post_type']) {
if (!current_user_can('edit_page', $post_id)) {			
return $post_id;
}
}
elseif (!current_user_can('edit_post', $post_id)) {
return $post_id;
}

foreach($list_array as $list){	
foreach ($list['fields'] as $field) {
$old = get_post_meta($post_id, $field['id'], true);
$new = $_POST[$field['id']];

if ($new && $new != $old) {
update_post_meta($post_id, $field['id'], $new);
}
elseif ('' == $new && $old) {
delete_post_meta($post_id, $field['id'], $old);
}
}
}
}
add_action('save_post', 'seo_save_data');
?>