<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Block extends MX_Controller {
	private $device = 'pc';
	private $currency = 'USD';
	private $language = 'jp';
	private $limit_content = 80;
	private $string_limit_content = '...';

	function __construct(){
		parent::__construct();
		$this->device = mobile_template();

		// Load houses model
		$this->load->model('common/common_model');
		$this->load->model('houses/houses_model');
		$this->load->model('news/news_model');
        $this->load->model('search/search_model');

        // Get and set currency
		$this->currency = $this->common_model->getCurrency();
	
		// Get and set language
		$this->language = current_lang_();
	}

	public function arrival() {
		$data = array();
		$list = $this->houses_model->getListItem(7, 0);
		$list_back = $this->houses_model->getListItemBack(3, 0);
		$data['list'] = $list;
		$data['list_back'] = $list_back;
		$data['currency'] = $this->currency;
		$data['language'] = $this->language;
		$data['limit_content'] = $this->limit_content;
		$data['string_limit_content'] = $this->string_limit_content;
		$this->load->view('arrival', $data);
	}

	public function benefit() {
		$this->load->view('benefit');
	}

	public function feature() {
		$data = array();

		$data['note']               = 'page/ベトナム賃貸不動産 ご契約の流れ';
		$data['building_3_stories'] = 'page/ローカルサービスアパートメント・アパートメントのご紹介';
		$data['home_person']        = 'page/ホーチミンの住居と日本の住居の違い';
		$data['map']                = 'page/住居エリア検索';
		$data['hcm_office']         = 'page/オフィスのご案内';
		$data['faq']                = 'page/よくある質問';
		$data['support_option']     = 'page/サポートオプションについて';
		$data['question']           = 'page/よくあるご質問';

		$this->load->view('feature', $data);
	}

	public function info_apartment() {
		$data = array();

		// 割安アパートメント (2区アパートメント特集)
		$list_dist_2 = $this->common_model->listApartment('2', array('limit' => array(0, 6)));
		$data['list_dist_2'] = $list_dist_2;

		// ホーチミン 3区 サービスアパート特集
//		$list_dist_3 = $this->common_model->listApartment('3', array('limit' => array(0, 6)));
//		$data['list_dist_3'] = $list_dist_3;

		// フーミーフン7区アパート
		$list_dist_7 = $this->common_model->listApartment('7', array('limit' => array(0, 6)));
		$data['list_dist_7'] = $list_dist_7;

		// ホーチミン単身向け450USD以下アパート特集
		$list_apartment_under_450_usd = $this->common_model->listApartment('under_450_usd', array('limit' => array(0, 6)));
		$data['list_apartment_under_450_usd'] = $list_apartment_under_450_usd;

        //ビンホームズ,vinhomes特集
        $data_vin_home['categories_id']='736';
        $list_vin_home = $this->houses_model->getCategoriesBuilding($data_vin_home,6,0);
        $data['list_vin_home'] = $list_vin_home;

        $data['images_houses'] = $this->search_model->getImagesHouse();
		$data['currency'] = $this->currency;
		$data['language'] = $this->language;
		$data['limit_content'] = $this->limit_content;
		$data['string_limit_content'] = $this->string_limit_content;
		$data['itemLayOut']= $this->search_model->getLayouts();

		$this->load->view('info_apartment', $data);
	}

	public function introduction_staff_company() {
		$this->load->view('introduction_staff_company');
	}

	public function support() {
		$data = array();

		$data['support_one']   = 'page/進出支援のご案内';
		$data['support_two']   = 'page/駐在員事務所設立＆スタートアップ支援';
		$data['support_three'] = 'page/ベトナム労働許可証';
		$data['support_four']  = 'page/ベトナムビザ・労働許可証';
		$data['support_five']  = 'page/割安WEBサイト制作';
		$data['support_six']   = 'page/オフィス店舗デザイン・設計施工の流れ';

		$this->load->view('support', $data);
	}

	public function website_information() {
		$data = array();

		// News
		$news = $this->news_model->getlistNews();
		$data['news'] = $news;

		$data['language'] = $this->language;
		$data['limit_content'] = 140;
		$data['limit_title'] = 55;
		$data['string_limit_content'] = $this->string_limit_content;
		$this->load->view('website_information', $data);
	}

	public function banner() {
		$this->load->view('banner');
	}

	public function three_feature_appartment_home() {
		$this->load->view('three_feature_appartment_home');
	}

	public function introduce_district() {
		$this->load->view('introduce_district');
	}

	public function promotion() {
		$this->load->view('promotion');
	}

	public function voucher() {
		$this->load->view('voucher');
	}

	public  function banner_new(){
        $this->load->view('banner_new');
    }

    public function banner_contact(){
	    $this->load->view('banner_contact');
    }

    public function banner_interior() {
    	$this->load->view('banner_interior');	
    }

    public function building_buy_sell() {
    	$this->load->view('building_buy_sell');	
    }
}