<?php
	$array_breadcums = array(lang('トップページ'));
	$page_current = helper_get_page_current();
	$vn = '';
	$class_page = '';
	if (current_lang_() && current_lang_() == 'vn') {
		$vn = current_lang_() . '/';
	}

	// Static page: page/オフィス店舗デザイン・設計施工の流れ
	$static_office_design = '<a href="' . PATH_URL . $vn . 'page/オフィス店舗デザイン・設計施工の流れ">' . lang('オフィス店舗デザイン・設計施工の流れ') . '</a>';
	switch ($page_current) {
		// page/ベトナム賃貸不動産 ご契約の流れ
		case 'ベトナム賃貸不動産 ご契約の流れ':
			$array_breadcums[] = lang('入居までの流れ');
			break;

		// page/ローカルサービスアパートメント・アパートメントのご紹介
		case 'ローカルサービスアパートメント・アパートメントのご紹介':
			$array_breadcums[] = lang('ホーチミンの住居の種類と注意点');
			break;

		// page/ホーチミンの住居と日本の住居の違い
		case 'ホーチミンの住居と日本の住居の違い':
			$array_breadcums[] = lang('ホーチミンの住居と日本の住居の違い');
			break;

		// page/住居短期契約について
		case '住居短期契約について':
			$array_breadcums[] = lang('住居短期契約について');
			break;

		// page/オフィスのご案内
		case 'オフィスのご案内':
			$array_breadcums[] = lang('ホーチミンのオフィスについて');
			break;

		// page/よくあるご質問
		case 'よくあるご質問':
			$array_breadcums[] = lang('よくあるご質問');
			break;

		// page/不動産オーナー様へ
		case '不動産オーナー様へ':
			$array_breadcums[] = lang('不動産オーナー様へ');
			break;

		// page/サポートオプションについて
		case 'サポートオプションについて':
			$array_breadcums[] = lang('サポートオプションについて');
			break;

		// page/進出支援のご案内
		case '進出支援のご案内':
			$array_breadcums[] = lang('会社設立＆スタートアップ支援');
			break;

		// page/駐在員事務所設立＆スタートアップ支援
		case '駐在員事務所設立＆スタートアップ支援':
			$array_breadcums[] = lang('駐在員事務所設立＆スタートアップ支援');
			break;

		// page/ベトナム労働許可証
		case 'ベトナム労働許可証':
			$array_breadcums[] = lang('ベトナム労働許可証');
			break;

		// page/ベトナムビザ・労働許可証
		case 'ベトナムビザ・労働許可証':
			$array_breadcums[] = lang('ベトナムビザ');
			break;

		// page/割安WEBサイト制作
		case '割安WEBサイト制作':
			$array_breadcums[] = lang('割安WEBサイト制作');
			break;

		// page/オフィス店舗デザイン・設計施工の流れ
		case 'オフィス店舗デザイン・設計施工の流れ':
			$array_breadcums[] = lang('オフィス内装工事');
			break;

		// page/プロポライフベトナム 会社概要
		case 'プロポライフベトナム 会社概要':
			$array_breadcums[] = lang('運営会社');
			break;

		// page/アオザイハウジングについて
		case 'アオザイハウジングについて':
			$array_breadcums[] = lang('アオザイハウジングについて');
			break;

		// page/住居エリア検索
		case '住居エリア検索':
			$class_page = 'page-map';
			$array_breadcums[] = lang('住居エリア検索');
			break;

		// page/プロポライフベトナム社員紹介
		case 'プロポライフベトナム社員紹介':
			$array_breadcums[] = lang('プロポライフベトナム社員紹介');
			break;

        // houses/house_detail_by-condition/2区アパートメント特集
        case '2区アパートメント特集':
            $array_breadcums[] = lang('2区アパートメント特集');
            break;

        // houses/house_detail_by-condition/ホーチミン 3区 サービスアパート特集
        case 'ホーチミン 3区 サービスアパート特集':
            $array_breadcums[] = lang('ホーチミン 3区 サービスアパート特集');
            break;

        // houses/house_detail_by-condition/フーミーフン7区アパート
        case 'フーミーフン7区アパート':
            $array_breadcums[] = lang('フーミーフン7区アパート');
            break;

        // houses/house_detail_by-condition/ホーチミン単身向け450USD以下アパート特集
        case 'ホーチミン単身向け450USD以下アパート特集':
            $array_breadcums[] = lang('ホーチミン単身向け450USD以下アパート特集');
            break;

        // houses/house_detail_by-condition/最新賃貸物件
        case '最新賃貸物件':
            $array_breadcums[] = lang('最新賃貸物件');
            break;

		// page/リーガル（REGAL）様 ホーチミン内装工事例
        case 'リーガル（REGAL）様 ホーチミン内装工事例':
            $array_breadcums[] = $static_office_design;
            $array_breadcums[] = lang('リーガル（REGAL）様 ホーチミン内装工事例');
            break;

        // page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例
        case 'バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例':
            $array_breadcums[] = $static_office_design;
            $array_breadcums[] = lang('バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例');
            break;

        // page/センコーベトナム様
        case 'abc':
        case 'センコーベトナム様':
            $array_breadcums[] = $static_office_design;
            $array_breadcums[] = lang('センコーベトナム様 （国際物流）');
            break;

        // page/内装工事事例
        case '内装工事事例':
            $array_breadcums[] = $static_office_design;
            $array_breadcums[] = lang('内装工事事例');
            break;

        // page/photron-vietnam
        case 'photron-vietnam':
        	$array_breadcums[] = $static_office_design;
        	$array_breadcums[] = lang('フォトロンベトナム（Photron Vietnam）様');
        	break;

        // page/dong-shop-sun
        case 'dong-shop-sun':
        	$array_breadcums[] = $static_office_design;
        	$array_breadcums[] = lang('DONG SHOP SUN様');
        	break;

        // page/samurai
        case 'samurai':
        	$array_breadcums[] = $static_office_design;
        	$array_breadcums[] = lang('レストランSAMURAI様');
        	break;

        // page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様
        case 'オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様':
        	$array_breadcums[] = $static_office_design;
        	$array_breadcums[] = lang('オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様');
        	break;

        // page/リーガル（REGAL）様
        case 'リーガル（REGAL）様':
        	$array_breadcums[] = $static_office_design;
        	$array_breadcums[] = lang('リーガル（REGAL）様');
        	break;

        // page/ホーチミンの賃貸事情とわたしたちの取り組み
        case 'ホーチミンの賃貸事情とわたしたちの取り組み':
			$array_breadcums[] = lang('ホーチミンの賃貸事情とわたしたちの取り組み');
        	break;

		//houses/house_detail_by-condition/新着物件
		case  '注目物件':
			$array_breadcums[] = lang('注目物件');
			break;
	}

    $allow_building_info = array(
        'detail-condo' => '人気マンション・コンドミニアム',
        'detail-service-apartment' => '人気サービスアパート',
        'detail-near-school-bus' => '日本人学校のバスが停まる物件特集'
    );
	if (helper_get_module_current() == 'building') {
	    if (in_array(helper_get_action_current(), $allow_building_info)) {
            $array_breadcums[] = helper_get_action_current();
        }

        if (in_array(helper_get_action_current(), array_keys($allow_building_info))) {
        	$label_breadcums_first = $allow_building_info[helper_get_action_current()];
            $array_breadcums[] = '<a href="' . PATH_URL . $vn . helper_get_module_current() . '/' . $label_breadcums_first . '">' . $label_breadcums_first . '</a>';
            $array_breadcums[] = helper_get_after_id_current();
        } else {
        	if (helper_get_after_id_current() && helper_get_Id_current() != 'area') {
	        	// Use for map: page/住居エリア検索
	        	$array_breadcums[] = '<a href="' . PATH_URL . $vn . 'page/住居エリア検索">住居エリア検索</a>';
	        	$array_breadcums[] = helper_get_after_id_current();
        	}
        }
    }

    if (isset($breadcums_first)) {
        $array_breadcums[] = $breadcums_first;
    }

    if (isset($breadcums_second)) {
        $array_breadcums[] = $breadcums_second;
    }

    if(helper_get_module_current() == 'contact'){
	    $array_breadcums[] = 'WEBからの お問い合わせ';
    }

    if(helper_get_module_current() == '希望物件リクエスト'){
        $array_breadcums[] = '希望物件リクエスト';
    }

    if(helper_get_module_current() == 'お客様の声'){
        $array_breadcums[] = 'お客様の声';
    }

    /**
     * Building buy sell
     */
    if (helper_get_module_current() == 'ホーチミンの不動産売買' || helper_get_module_current() == 'building_buy_sell') {
    	if (helper_get_action_current() == 'detail') {
            $array_breadcums[] = '<a href="' . PATH_URL . $vn . 'building_buy_sell/ホーチミンの不動産売買">ホーチミンの不動産売買</a>';
            // Title call from file application/modules/building_buy_sell/views/FRONTEND/detail.php
    		$array_breadcums[] = isset($title) ? $title : '';
    	} else {
    		$array_breadcums[] = 'ホーチミンの不動産売買';
    	}
    }
?>

<div class="row">
	<div class="breadcums <?php echo $class_page?>">
		<?php if (count($array_breadcums) == 2): ?>
			<span>
				<a href='<?php echo PATH_URL . $vn; ?>'><?php echo $array_breadcums[0]; ?></a>  /  
				<?php echo $array_breadcums[1]; ?>
			</span>
		<?php endif; ?>
		
		<?php if (count($array_breadcums) == 3): ?>
			<span>
				<a href='<?php echo PATH_URL . $vn; ?>'><?php echo $array_breadcums[0]; ?></a>  /  
				<?php echo $array_breadcums[1]; ?>  /  
				<?php echo $array_breadcums[2]; ?>
			</span>
		<?php endif; ?>
	</div>
</div>