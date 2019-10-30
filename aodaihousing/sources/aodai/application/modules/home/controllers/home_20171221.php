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
                'keyword' => 'ホーチミン賃貸,ホーチミン不動産,ホーチミンサービスアパート,ホーチミンアパート,ホーチミンマンション,ホーチミンコンドミニアム,ベトナムホーチミン,賃貸,不動産,オフィス',
                'title' => 'アオザイハウジング｜ベトナムホーチミンの賃貸不動産会社',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
            );
        $seo = array(
            'title' => 'アオザイハウジング｜ベトナムホーチミンの賃貸不動産会社',
            'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
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