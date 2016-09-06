<?php
add_action('admin_menu', 'seo_add_pages');
function seo_add_pages() {
    add_options_page(__('SEO Settings','menu-seo'), __('SEO Settings','menu-seo'), 'manage_options', 'seo-settings', 'seo_settings_page');
}
function seo_settings_page() {
    if (!current_user_can('manage_options')){
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }
	$seo_index_title = 'seo_index_title';
	$seo_index_description = 'seo_index_description';
	$seo_index_metakeyword = 'seo_index_metakeyword';

    $hidden_field_name = 'mt_submit_hidden';
    // Read in existing option value from database
	
	$val_seo_index_title = get_option($seo_index_title);
	$val_seo_index_description = get_option($seo_index_description);
	$val_seo_index_metakeyword = get_option($seo_index_metakeyword);
	
    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
		
		$val_seo_index_title = $_POST[$seo_index_title];
		$val_seo_index_description = $_POST[$seo_index_description];
		$val_seo_index_metakeyword = $_POST[$seo_index_metakeyword];
		
        // Save the posted value in the database
        update_option($seo_index_title, $val_seo_index_title);
		update_option($seo_index_description, $val_seo_index_description);
		update_option($seo_index_metakeyword, $val_seo_index_metakeyword);
        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Seo settings saved.', 'menu-seo' ); ?></strong></p></div>
<?php
}
// Now display the settings editing screen
echo '<div class="wrap">';
// header
echo "<h2>" . __( 'Seo Plugin Settings', 'menu-seo' ) . "</h2>";
// settings form 
?>
<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<form name="form1" method="post" action="">
<div  id="post-body-content">
<div class="meta-box-sortables ui-sortable">
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br></div>
<h3 class="hndle"><span>Manager Seo Index Page</span></h3>
<div class="inside">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<table class="seo">

<tr class="form-field">
<th scope="row" valign="top" align="left" width="20%">
<label for="<?php echo $seo_index_title; ?>"><?php _e("Title:", 'menu-seo' ); ?> </label>
</th>
<td align="left">
<input type="text" name="<?php echo $seo_index_title; ?>" value="<?php echo $val_seo_index_title; ?>" style="margin: 0px;">
</td>
</tr>

<tr class="form-field">  
<th scope="row" valign="top" align="left" width="20%">
<label for="<?php echo $seo_index_description; ?>"><?php _e("Description:", 'menu-seo' ); ?> </label>
</th>
<td align="left"><textarea name="<?php echo $seo_index_description; ?>"><?php echo $val_seo_index_description; ?></textarea></td>
</tr>

<tr class="form-field">  
<th scope="row" valign="top" align="left" width="20%">
<label for="<?php echo $seo_index_metakeyword; ?>"><?php _e("Meta keyword:", 'menu-seo' ); ?> </label>
</th>
<td align="left"><textarea name="<?php echo $seo_index_metakeyword; ?>"><?php echo $val_seo_index_metakeyword; ?></textarea></td>
</tr>

</table>
</div>
</div>
</div>
</div>

<div id="postbox-container-1">
<div  class="meta-box-sortables ui-sortable">
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br></div>
<h3 class="hndle"><span>Publish</span></h3>
<div class="inside">

<p class="submit" style="padding: 0px;margin: 0px;">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" style="margin: 0px;" />
</p>
</div>
</div>
</div>
</div>
<div style="clear:both"></div>
</form>
</div>
</div>
<?php 
}
?>