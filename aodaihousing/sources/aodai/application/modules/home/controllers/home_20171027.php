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
                'keyword' => 'ベトナム,ホーチミン賃貸,ホーチミン不動産,ホーチミンサービスアパート,ホーチミンアパート,ホーチミンマンション,ホーチミンコンドミニアム,ホーチミンベトナム,賃貸,不動産,オフィス',
                'title' => 'アオザイハウジング｜ベトナムホーチミンの賃貸不動産会社',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィス、レンタルオフィスなど賃貸物件探しなら情報最大級の不動産会社アオザイハウジングにお任せ下さい。日本人駐在でご案内から契約書作成、フォローまで安心。',
            );
        $seo = array(
            'title' => 'アオザイハウジング｜ベトナムホーチミンの賃貸不動産会社',
            'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィス、レンタルオフィスなど賃貸物件探しなら情報最大級の不動産会社アオザイハウジングにお任せ下さい。日本人駐在でご案内から契約書作成、フォローまで安心。',
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