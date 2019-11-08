<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

    public $device = 'pc';

	function __construct(){
		parent::__construct();
        $this->device = mobile_template();
	}
	
	/*-------------------------------------- FrontEnd --------------------------------------*/
	function index(){
	    $seoGoogle = array(
                'keyword' => '賃貸,ホーチミン,不動産,ベトナム,サービスアパート,アパート,コンドミニアム,オフィス,ホーチミン市,アオザイハウジング,プロポライフベトナム,日本人街,駐在,',
                'title' => 'アオザイハウジング｜ホーチミン市の賃貸不動産仲介',
                'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム、オフィスなど賃貸不動産のことならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。',
            );
        $seo = array(
            'title' => 'アオザイハウジング｜ホーチミン市の賃貸不動産仲介',
            'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム、オフィスなど賃貸不動産のことならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。',
            'url' => PATH_URL
        );
         

        $view = '';
        if($this->device != 'pc') {
            $view = '_mobile';
        }

        $this->template->write_view('content', 'index' . $view);
		headerSeo($seo, $seoGoogle);
        $this->template->render();

        /*$this -> load -> library('Mobile_Detect');
        $detect = new Mobile_Detect();
        if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
            $this->template->write_view('content','index_mobile');
        } else {
            $this->template->write_view('content','index');
        }
		$this->template->render();*/
	}
}