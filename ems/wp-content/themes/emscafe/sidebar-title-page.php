<?php
if(is_page() || is_singular()){
$titlepage = get_post_meta($post->ID,'title-page',true);
$description = get_post_meta($post->ID,'description',true);
$metakeyword = get_post_meta($post->ID,'meta-key',true);
}
if(is_home()){
$titlepage = get_option('seo_index_title');
$description = get_option('seo_index_description');
$metakeyword = get_option('seo_index_metakeyword');
}
if(is_tax()){
	$link = $_SERVER['QUERY_STRING'];
	$arr = array();
	$arr=explode( '=', $link );
	$tax = $arr[0];
	$slug = $arr[1];
	$terms = get_term_by('slug',$slug,$tax);		
	$titlepage = get_tax_meta($terms->term_taxonomy_id,'term_meta[title_meta]',true);
	$description = get_tax_meta($terms->term_taxonomy_id,'term_meta[description_meta]',true);
	$metakeyword = get_tax_meta($terms->term_taxonomy_id,'term_meta[keyword_meta]',true);
}
?>
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="UTF-8">
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $metakeyword; ?>" />
<?php if($titlepage=='') {?>
<title><?php wp_title('|', true, 'right'); ?></title>
<?php } else { ?>
<title><?php echo $titlepage; ?></title>
<?php } ?>