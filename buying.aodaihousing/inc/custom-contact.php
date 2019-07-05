<?php
	add_action('admin_menu', 'register_custom_menu_page');

	function config_smtp_email( $phpmailer ) {
		//Server settings
		$phpmailer->isSMTP();
		$phpmailer->Host       = 'smtp.gmail.com';
		$phpmailer->SMTPAuth   = true;
		$phpmailer->Port       = 465;
		$phpmailer->Username   = 'propolifevn@gmail.com';
		$phpmailer->Password   = 'qqawtigjgfesgien';
		$phpmailer->SMTPSecure = 'ssl';
		$phpmailer->FromName   = '売買サイトの反響';

	}

	add_action( 'phpmailer_init', 'config_smtp_email' );


	function remove_unit_tag($url){
	    $remove_unit_tag = explode('#',$url);
	    $new_url = $remove_unit_tag[0];
	    return $new_url;
	}

	add_filter('wpcf7_form_action_url', 'remove_unit_tag');

?>