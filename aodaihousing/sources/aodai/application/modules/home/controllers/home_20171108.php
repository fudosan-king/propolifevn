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
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。',
            );
        $seo = array(
            'title' => 'アオザイハウジング｜ベトナムホーチミンの賃貸不動産会社',
            'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。',
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