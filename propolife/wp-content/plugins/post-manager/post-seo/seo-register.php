<?php
$seo = array(
'id' => 'customer-seo',
'title' => 'Customer SEO',
'page' => 'page',	
'context' => 'normal',
'priority' => 'high',
'fields' => array(
array('name' => 'Title Page:','id' => $prefix . 'title-page','type' => 'text','std' => ''),			
array('name' => 'Description:','id' => $prefix . 'description','type' => 'textarea','std' => ''),		
array('name' => 'Meta keywords:','id' => $prefix . 'meta-key','type' => 'textarea','std' => '')		
)
);
function getItermFiled($list_fields,$post){	
echo '<table>';
foreach ($list_fields['fields'] as $field) {
$meta = get_post_meta($post->ID, $field['id'], true);
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'../includes/content-controls.php');
}
echo '</table>';
}
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'post-seo-add-post-field.php');
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'tax-seo-register-field.php');
include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'seo-settings.php');
?>