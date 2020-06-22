<?php 

function phone_title_map($title=''){
	$page_info = get_page_by_path( 'general_addition_info' );

	$profile_group = get_field('company_profile', $page_info->ID);

	$phone_list = $profile_group['phone_list'];

	return $phone_list;
}

?>