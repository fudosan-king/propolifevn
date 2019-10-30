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
                'keyword' => 'ホーチミン,ベトナム,賃貸,不動産,サービスアパート,アパート,マンション,コンドミニアム,オフィス,不動産屋,不動産会社,レンタルオフィス,マンション,アオザイハウジング',
                'title' => '【公式】アオザイハウジング｜ベトナムホーチミン市の賃貸不動産',
                'description' => 'ベトナムホーチミン市のサービスアパート、マンション、コンドミニアム、オフィス、レンタルオフィスなどの賃貸不動産情報なら日本人駐在、ホーチミン市最大級の不動産紹介会社アオザイハウジングにお任せ下さい。最適な物件をご紹介させて頂いております。',
            );
        $seo = array(
            'title' => '【公式】アオザイハウジング｜ベトナムホーチミン市の賃貸不動産',
            'description' => 'ベトナムホーチミン市のサービスアパート、マンション、コンドミニアム、オフィス、レンタルオフィスなどの賃貸不動産情報なら日本人駐在、ホーチミン市最大級の不動産紹介会社アオザイハウジングにお任せ下さい。最適な物件をご紹介させて頂いております。',
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