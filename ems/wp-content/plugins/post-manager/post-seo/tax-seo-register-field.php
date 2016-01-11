<?php
function taxonomy_add_new_meta_field() {
?>
<div class="form-field form-edit">
<label for="term_meta[title_meta]">Title:</label>
<input type="text" name="term_meta[title_meta]" id="term_meta[title_meta]" value="" size="40">		
</div>

<div class="form-field form-edit">
<label for="term_meta[keyword_meta]">Meta keywords:</label>
<textarea name="term_meta[keyword_meta]" rows="5" cols="40"></textarea>   
</div>

<div class="form-field form-edit">
<label for="term_meta[description_meta]">Meta description:</label>
<textarea name="term_meta[description_meta]" rows="5" cols="40"></textarea>   
</div>    
<?php
}
function taxonomy_edit_meta_field($term) { 
$t_id = $term->term_id;
$title = get_tax_meta($t_id,'term_meta[title_meta]',true);
$keyword = get_tax_meta($t_id,'term_meta[keyword_meta]',true);
$description = get_tax_meta($t_id,'term_meta[description_meta]',true);
?>
<tr class="form-field">
<td valign="top" class="seo-label"><div style="margin-top:15px">Title:</div></td>
<td>
<input type="text" name="term_meta[title_meta]" id="term_meta[title_meta]" value="<?php echo esc_attr($title) ? esc_attr($title) : ''; ?>"  style="margin-top:15px;margin-bottom:5px" />
</td>
</tr>

<tr class="form-field">
<td valign="top" class="seo-label"><div>Meta keywords:</div></td>
<td>
<textarea type="text" name="term_meta[keyword_meta]" id="term_meta[keyword_meta]" rows="5" cols="50" class="large-text">
<?php echo esc_attr($keyword) ? esc_attr($keyword) : ''; ?>
</textarea>
</td>
</tr>

<tr class="form-field">
<td valign="top" class="seo-label"><div>Meta description:</div></td>
<td>
<textarea type="text" name="term_meta[description_meta]" id="term_meta[description_meta]" rows="5" cols="50" class="large-text">
<?php echo esc_attr($description) ? esc_attr($description) : ''; ?>
</textarea>
</td>
</tr>    
<?php
}
function save_taxonomy_custom_meta($term_id){
	$term_meta = array();
	if ( isset( $_POST['term_meta'] ) ) {
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			$term_meta[$key] = $_POST['term_meta'][$key];
			/*echo 'Term ID:'.$term_id.'<br>';
			echo '<pre>';
			print_r($_POST['term_meta']);
			echo $term_meta[$key].':'.$key;
			echo '</pre>';*/	
			update_tax_meta($term_id, 'term_meta['.$key.']',$term_meta[$key]);
		}
	}
}

function getAllTax(){	
	$tax = get_taxonomies();		
	unset($tax['post_tag']);unset($tax['nav_menu']);unset($tax['link_category']);unset($tax['post_format']);
	foreach($tax as $t){		
		add_action( $t.'_add_form_fields', 'taxonomy_add_new_meta_field');
		add_action( $t.'_edit_form_fields', 'taxonomy_edit_meta_field');
		add_action( 'edited_'.$t, 'save_taxonomy_custom_meta', 10, 2 );
		add_action('created_'.$t, 'save_taxonomy_custom_meta', 10, 2);
	}	
}

//add_action('admin_menu','getAllTax');
//add_action('init','getAllTax');
add_action('admin_init','getAllTax');
?>