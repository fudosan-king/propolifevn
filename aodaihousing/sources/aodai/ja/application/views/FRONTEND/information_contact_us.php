<?php
    $controller_current = helper_get_module_current();
	$page_current = helper_get_page_current();
	$action_current = helper_get_action_current();

	$allow_page_office_design = array(
		'リーガル（REGAL）様 ホーチミン内装工事例',
		'バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例',
		'センコーベトナム様',
		'内装工事事例',
		'photron-vietnam',
		'dong-shop-sun',
		'samurai',
		'オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様',
		'リーガル（REGAL）様',
	);

	$allow_page_lotus = array(
		'進出支援のご案内',
		'駐在員事務所設立＆スタートアップ支援',
		'ベトナム労働許可証',
	);

	// Use phone number +84‐(0)28‐3827‐5068
	$phone_one = false;
	// Use phone number +84-(0)91-783-5778
	$phone_two = false;
	// Use phone number +84‐(0)8‐3824‐1578
	$phone_three = false;
	// Use phone number +84‐(0)91-663-1088
	$phone_four = false;
	// Use phone number +84‐(0)28‐3824‐1418
	$phone_five = false;
	

	$label_button_contact = '';
	if ($page_current == 'ホーチミンの住居と日本の住居の違い' || $page_current == 'サポートオプションについて') {
		$label_button_contact = lang('無料相談フォームはこちら');
		$phone_one = true;
		$phone_two = true;
	} else if($page_current == 'ベトナムビザ・労働許可証'){
        $label_button_contact = lang('相談する');
        $phone_one = true;
	}else if (in_array($page_current, $allow_page_office_design)) {
		$label_button_contact = lang('内装工事について相談する');
		$phone_three = true;
		$phone_four = true;
	} else if (in_array($page_current, $allow_page_lotus)) {
		$label_button_contact = lang('問い合わせする');
		$phone_five = true;
	} else {
		$label_button_contact = lang('問い合わせする');
		$phone_one = true;
		$phone_two = true;
	}

    // Style position button contact in center page
    $is_button_center = false;
	$allow_page_have_button_center = array(
        'detail',
        'detail-condo',
        'detail-service-apartment',
        'detail-near-school-bus',
        'page_map',
        '住居エリア検索'
    );
	if ($controller_current == 'building' && in_array($action_current, $allow_page_have_button_center )) {
        $is_button_center = true;
        $label_button_contact = lang('この物件を問い合わせする');
    }
    if ($controller_current == 'building_buy_sell' || $controller_current == 'ホーチミンの不動産売買') {
        $is_button_center = true;
        $label_button_contact = lang('この物件を問い合わせする');
    }
    if($controller_current == 'page' && in_array($action_current, $allow_page_have_button_center )){
        $is_button_center = true;
        $label_button_contact = lang('問い合わせをする');
    }

    $class_button_center = '';
    if ($is_button_center) {
        $class_button_center = 'block_center_contact';
    }
?>

<div class="contact-us-block <?php echo $class_button_center; ?>">
	<a href="#" id="showContact" data-toggle="modal" data-target="#contactModal" class="contact-detail btn-red">
		<?php echo $label_button_contact; ?>
	</a>
	
	<div class='content-tel clearfix'>
		<div class='content-tel-first'>ＴＥＬ</div>
		<div class='content-tel-second'>
			<?php if ($phone_one): ?>
				<a x-ms-format-detection="none" href="tel:+84‐(0)28‐3827‐5068"><?php echo lang('info_contact_us_number_one'); ?></a>
			<?php endif; ?>

			<?php if ($phone_two): ?>
				<a x-ms-format-detection="none" href="tel:+84-(0)91-783-5778"><?php echo lang('info_contact_us_number_two'); ?></a>
			<?php endif; ?>

			<?php if ($phone_three): ?>
				<a x-ms-format-detection="none" href="tel:+84‐(0)8‐3824‐1578"><?php echo lang('info_contact_us_number_three'); ?></a>
			<?php endif; ?>

			<?php if ($phone_four): ?>
				<a x-ms-format-detection="none" href="tel:+84‐(0)91-663-1088"><?php echo lang('info_contact_us_number_four'); ?></a>
			<?php endif; ?>

			<?php if ($phone_five): ?>
				<a x-ms-format-detection="none" href="tel:+84‐(0)28‐3824‐1418"><?php echo lang('info_contact_us_number_one_lotus'); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>