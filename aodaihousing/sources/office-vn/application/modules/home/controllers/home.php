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
                'keyword' => 'ホーチミン,オフィス,レンタルオフィス,office,賃貸,不動産',
                'title' => 'アオザイハウジング｜ホーチミンのオフィス/レンタルオフィス',
                'description' => 'ホーチミンのオフィス・レンタルオフィスサイトです。オフィスの増床からスタートアップのオフィスまで。一緒にアパートやマンションも探せます。',
            );
        $seo = array(
            'title' => 'アオザイハウジング｜ホーチミンのオフィス/レンタルオフィス',
            'description' => 'ホーチミンのオフィス・レンタルオフィスサイトです。オフィスの増床からスタートアップのオフィスまで。一緒にアパートやマンションも探せます。',
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