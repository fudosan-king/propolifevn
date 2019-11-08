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
                'keyword' => 'ホーチミン,ベトナム,賃貸,不動産,サービスアパート,アパート,コンドミニアム,オフィス,レンタルオフィス,マンション,アオザイハウジング,短期',
                'title' => '【公式】アオザイハウジング｜ホーチミン市の賃貸不動産仲介',
                'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム、オフィス、レンタルオフィスなど賃貸不動産情報なら日本人駐在のアオザイハウジングにお任せ下さい。最大級の物件から最適な物件をご紹介させて頂きます。',
            );
        $seo = array(
            'title' => '【公式】アオザイハウジング｜ホーチミン市の賃貸不動産仲介',
            'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム、オフィス、レンタルオフィスなど賃貸不動産情報なら日本人駐在のアオザイハウジングにお任せ下さい。最大級の物件から最適な物件をご紹介させて頂きます。',
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