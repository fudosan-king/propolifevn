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
                'title' => 'アオザイハウジング｜ホーチミンの日系不動産会社・賃貸・不動産物件情報',
                'description' => 'ホーチミンで賃貸は安心のアオザイハウジング。日本人コンサルタントがホーチミン生活をサポート。賃貸仲介手数料無料。最大級のサービスアパート・マンション・オフィスの賃貸不動産物件情報。弁護士、会計資格者、不動産資格者在籍。',
            );
        $seo = array(
            'title' => 'アオザイハウジング｜ホーチミンの日系不動産会社・賃貸・不動産物件情報',
            'description' => 'ホーチミンで賃貸は安心のアオザイハウジング。日本人コンサルタントがホーチミン生活をサポート。賃貸仲介手数料無料。最大級のサービスアパート・マンション・オフィスの賃貸不動産物件情報。弁護士、会計資格者、不動産資格者在籍。',
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