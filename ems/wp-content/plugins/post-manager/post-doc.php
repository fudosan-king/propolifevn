<?php
$document = array(
'id' => 'box-document-id',
'title' => 'Tài liệu tham khảo',
'page' => 'post',	
'context' => 'normal',
'priority' => 'high',
'fields' => array(
array('name' => 'Hình đại diện','id' => $prefix . 'document-thumb-id','type' => 'textarea','std' => ''),
array('name' => 'Total ID','id' => $prefix . 'total-document-id','type' => 'textarea','std' => '0')			
)
);
function document_show_box(){
global $document, $post;
getItermFileddocument($document,$post);
}
add_action('save_post', 'document_save_data');
function document_save_data($post_id) {
global $document;
if (!wp_verify_nonce($_POST['document_meta_box_nonce'], basename(__FILE__))) {return $post_id;}
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return $post_id;}
if ('page' == $_POST['post_type']) {if (!current_user_can('edit_page', $post_id)) {return $post_id;}}
elseif (!current_user_can('edit_post', $post_id)) {return $post_id;}	
foreach ($document['fields'] as $field) {
$old = get_post_meta($post_id, $field['id'], true);
$new = $_POST[$field['id']];

if ($new && $new != $old) {update_post_meta($post_id, $field['id'], $new);}
elseif ('' == $new && $old) {delete_post_meta($post_id, $field['id'], $old);}
}
}
function getItermFileddocument($document,$post){
echo '<input type="hidden" name="document_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
?>
<table class="form-table"><tr><td valign="top" style="padding:0px">
<div style="display:inline-block;border:solid 1px #ededed;position:relative">
<a href="#" style="display:block;padding:15px;" class="postdoc">
<div style="display:inline-block"><span class="dashicons dashicons-format-aside" style="font-size: 80px;height: 80px;width: 80px;line-height:80px;"></span></div>
<div style="display:inline-block;text-overflow:ellipsis;white-space:nowrap">dfas ádf ádf ádf fewtwet lkjkwjler lưekrj lkwjee</div>
</a>
</div>

<div style="display:inline-block;border:solid 1px #ededed;position:relative">
<a href="#" style="display:block;padding:15px;" class="postdoc">
<div style="display:inline-block"><span class="dashicons dashicons-format-aside" style="font-size: 80px;height: 80px;width: 80px;line-height:80px;"></span></div>
<div style="display:inline-block;text-overflow:ellipsis;white-space:nowrap">dfas ádf ádf ádf fewtwet lkjkwjler lưekrj lkwjee</div>
</a>
</div>

<?php
foreach ($document['fields'] as $field){
$meta = get_post_meta($post->ID, $field['id'], true);
echo '<textarea  name="', $field['id'], '" id="', $field['id'], '" class="hidden">', $meta ? $meta : $field['std'], '</textarea>';
}
if(get_post_meta($post->ID,'document-thumb-id',true)!=''){
$list_document =get_post_meta($post->ID,'document-thumb-id',true);
$list_document = str_replace('},','};',$list_document);
$_list = explode(';',$list_document);
}
//include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'includes/temp-document.php');
?>
<div class="clear"></div>
<div class="dotline"></div>
<div align="right"><a href="javascript:void(0)" onclick="return false" class="button-primary add_more_document"><span class="dashicons dashicons-admin-media" style="margin-top:3px;margin-right:5px;"></span>Add</a></div>
</td>
</tr>
</table>
<?php } ?>