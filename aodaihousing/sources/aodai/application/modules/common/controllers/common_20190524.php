<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends MX_Controller {
    public $device = 'pc';
	public $per_page = 10;

    public  $AREA_OFFICE=array('2'=>'quan_1','11'=>'quan_3','10'=>'quan_binhthanh','8'=>'quan_tanbinh','5'=>'quan_phunhuan','13'=>'quan_7','-1'=>'quan_khac');
    public  $AREA_HOUSE=array('2'=>'quan_1','3'=>'le_thanh_ton','10'=>'quan_binhthanh','17'=>'quan_2','11'=>'quan_3','13'=>'quan_7_H','5'=>'quan_phunhuan','25'=>'quan_4','8'=>'quan_tanbinh','14'=>'quan_tanphu','22'=>'quan_govap','20'=>'quan_binhtan','12'=>'quan_5','23'=>'quan_6','24'=>'quan_8','27'=>'quan_9','18'=>'quan_10','19'=>'quan_11','21'=>'quan_12');
    //public  $AREA_HOUSE=array('2'=>'{"jp":"1区","vn":"aaa"}','3'=>'{"jp":"1区レタントン日本人街近隣","vn":"aaa"}','10'=>'{"jp":"ビンタン区","vn":"aaa"}','17'=>'{"jp":"2区","vn":"aaa"}','13'=>'{"jp":"7区フーミンフン","vn":"aaa"}','5'=>'{"jp":"フーニョン区","vn":"aaa"}','-1'=>'{"jp":"その他の区","vn":"aaa"}');
    function __construct(){
		parent::__construct();
        $this->load->model('common_model'); 
        $this->device = mobile_template();
		if(mobile_template()!='pc'){
			$this->per_page = 20;
		}
	}
	
	/*-------------------------------------- FrontEnd --------------------------------------*/
	function index(){
		//$this->template->write('title','Demo Datepicker onSelect load Ajax');
        headerSeo();
		$this->template->write_view('content','index');
		$this->template->render();
	}
    
    public function facebookPlugin() {
        $this->load->view('facebook-plugin');
    }
    
    public function banner() {  
        $this->load->model('bannersidebar/bannersidebar_model', 'bannersidebar');
        $items = $this->bannersidebar->getlistBanner();
        $data['items'] = $items;
        $this->load->view('list_bannersidebar', $data);
    }
    
    public function _404() {
        headerSeo();
        $this->load->view('404');
    }
    
    public function page_service() {
        $this->template->write('title',$item->title);
		$this->template->write_view('content','FRONTEND/detail',$data);
		$this->template->render();
    }
    public function menu() {
		$this->load->view('menu');
    }
    public function content_search($catid, $module) {
        $data = array();

        $data['areas'] = 'house';
        if(isset($_GET['opt'])) {
            $data['table'] = $_GET['opt'] == 'office'? 'offices':'houses';
            $data['areas'] = $_GET['opt'] != ''?$_GET['opt']:'house';
        }else{
            $data['table']= 'house';
        }
        $data['localtion'] = isset($_GET['areas'])?$_GET['areas']:'';
        $data['type'] = isset($_GET['type'])?$_GET['type']:'';
        $data['size'] = isset($_GET['size'])?$_GET['size']:'';
        $data['rent'] = isset($_GET['rent'])?$_GET['rent']:'';
        $data['month_rent'] = isset($_GET['month_rent'])?$_GET['month_rent']:'';
        $data['size_rent'] = isset($_GET['size_rent'])?$_GET['size_rent']:'';
        $data['layout'] = isset($_GET['layout'])?$_GET['layout']:'';

        $itemAreas = $this->common_model->getAreas(1);
        $itemLayouts = $this->common_model->getLayouts();
        
        $data['itemAreas'] = $itemAreas;
        $data['itemLayouts'] = $itemLayouts;
        
        //khanh
        $data['itemAreas_O'] = $this->AREA_OFFICE;
        $data['itemAreas_H'] = $this->AREA_HOUSE;
        
        if($module == "common" && $catid == 183){
            $this->load->view('content_search_house', $data);
        }else if($module == "common" && $catid == 184){
            $this->load->view('content_search_office', $data);
        }else{
            $this->load->view('content_search', $data);
        }
		
    }
    public function footer() {
		$this->load->view('footer');
    }

    public function footer_mobile() {
        $this->load->view('footer_mobile');
    }

    public function header_mobile() {
        $this->load->view('header_mobile');
    }

    public function menu_mobile() {
        $this->load->view('menu_mobile');
    }

    public function search_mobile(){
        $this->template->write_view('content','search_mobile');
        $this->template->render();
    }

    
    public function search_options(){
        $view = '';
        if($this->device != 'pc') {
            $view = '_mobile';
        } else {
            redirect(PATH_URL);
        }

        $this->template->write_view('content','search_options_mobile');
        $this->template->render();
    }

    public function search_options_office(){
        $view = '';
        if($this->device != 'pc') {
            $view = '_mobile';
        } else {
            redirect(PATH_URL);
        }

        $this->template->write_view('content','search_options_office_mobile');
        $this->template->render();
    }

    public function search_result(){
        $view = '';
        if($this->device != 'pc') {
            $view = '_mobile';
        } else {
            redirect(PATH_URL);
        }

        $this->template->write_view('content','search_result_mobile');
        $this->template->render();
    }

    public function map()
    {
        $this->load->view('map');
    }
    
    public function search(){
        /*
        if(empty($_GET) || $_GET['s'] == ''){
            $this->search_all();
        }else{
            if(isset($_GET['s']) && $_GET['s'] != '') {
                $this->search_all();
            }else{
                $this->search_option();
            }
        }
        */
        
        $this->search_option();
        
    }
    
    public function search_all(){
        $data = array();
        $s = isset($_GET['s'])?$_GET['s']:'';
        $data['cat_name'] = 'キーワードから探す';
        $data['items_houses'] = $this->common_model->getSearchAll($s);
        $this->template->write_view('content','search_all',$data);
        $this->template->render();
    }
    
    public function search_option() {
        $data = array();
        $data['areas'] = 'house';
        if(isset($_GET['opt'])) {
            $data['table'] = $_GET['opt'] == 'office'? 'offices':'houses';
            $data['areas'] = $_GET['opt'] != ''?$_GET['opt']:'house';
            
            if($data['table'] == 'offices'){
                $data['itemAreas'] = $this->AREA_OFFICE;
                $seoGoogle = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                $seo = array(
                    'title' => 'アオザイハウジング｜ホーチミン市アパート検索',
                    'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
            }elseif($data['table'] == 'houses'){
                $data['itemAreas'] = $this->AREA_HOUSE;
                $seoGoogle = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                $seo = array(
                    'title' => 'アオザイハウジング｜ホーチミン市アパート検索',
                    'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
            }
        }else{
            $data['itemAreas'] = $this->AREA_HOUSE;
            $data['table']= 'houses';
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );

        }
        // $seo = array(
        //     'title' => 'ホーチミン市のアパート検索｜アオザイハウジング',
        //     'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム,アパート、オフィスなど賃貸不動産のことならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
        // );
        headerSeo($seo, $seoGoogle);   
        $data['localtion'] = isset($_GET['areas'])?trim($_GET['areas']):'';
        $data['type'] = isset($_GET['type'])?trim($_GET['type']):'';
        $data['size'] = isset($_GET['size'])?trim($_GET['size']):'';
        $data['rent'] = isset($_GET['rent'])?trim($_GET['rent']):'';
        $data['month_rent'] = isset($_GET['month_rent'])?trim($_GET['month_rent']):'';
        $data['size_rent'] = isset($_GET['size_rent'])?trim($_GET['size_rent']):'';
        $data['layout'] = isset($_GET['layout'])?trim($_GET['layout']):''; 
        $data['s'] = isset($_GET['s'])?trim($_GET['s']):''; 
        $data['catid'] = isset($_GET['catid'])?trim($_GET['catid']):''; 
        $data['catname'] = isset($_GET['catname'])?trim($_GET['catname']):''; 
    
        if($data['catid'] == 217){
            if(current_lang_() == 'vn'){
                $data['catname'] = "2区アパートメント特集";
            }else{
                $data['catname'] = "2区アパートメント特集";
            }
        }
        
        if($data['catid'] == 229){
			$data['catid'] = 234;
		}
        if($data['catid'] == 199){
			$data['catid'] = 234;
		}    
        if($data['catid'] == 205){
			$data['catid'] = 269;
		}       
        if($data['catid'] == 217){
			$data['catid'] = 296;
		}
        if($data['catid'] == 207){
            redirect('http://aodaihousing.com/search?opt=house&catid=205&catname=%E3%83%AC%E3%82%BF%E3%83%B3%E3%83%88%E3%83%B3%E6%97%A5%E6%9C%AC%E4%BA%BA%E8%A1%97%E7%89%B9%E9%9B%86');
            $data['catid'] = 269;
        }
        if($data['catid'] == 208){
            redirect('http://aodaihousing.com/search?opt=house&areas=&layout=&type=&size=&rent=500&month_rent=&size_rent=&search-opt=%E6%A4%9C%E7%B4%A2');
        }

        
        $cur_page = isset($_GET['per_page'])?$_GET['per_page']:0;
        $total_row = $this->common_model->search_count_record($data, $this->per_page, $cur_page);
        $this->load->library('paginations');
        
        $config['base_url'] = PATH_URL . current_lang_() . '/' . 'search/';
        $config['total_rows'] = $total_row;
        $config['per_page'] = $this->per_page;
        $this->paginations->initialize($config);
        $this->paginations->create_links();
        $data['imagesGalleryHouses'] = $this->common_model->getImagesGalleryHouses();
        $data['imagesGalleryOffices'] = $this->common_model->getImagesGalleryOffices();
        
        $data['items'] = $this->common_model->search_model($data, $this->per_page, $cur_page);
        
        $view = '';
        if($this->device != 'pc') {
            $view = '_mobile';
        }

        if($data['areas'] == 'house'){
			$this->template->write_view('content','search_house' . $view,$data);
        }else {
            $this->template->write_view('content','search_office' . $view,$data);
        }
		$this->template->render();
    }
    
    public function areas(){
        $type = $this->input->post('type');
        $type = $type == ''? 4 : $type;
//        echo $type;
//        exit();
        if($type=='1'){
            $itemAreas=$this->AREA_HOUSE;
            $data = array(
            'itemAreas' => $itemAreas
        );
        }else if($type=='3'){
              $itemAreas=$this->AREA_OFFICE;
            $data = array(
            'itemAreas' => $itemAreas
        );
        }
      
        $this->load->view('areas', $data);
    }
    
    public function getlist_category_special(){
        $data = array(
            'itemCategory' => $this->common_model->getCategorySpecial()
        );
        $this->load->view('category_special', $data);
    }
    
    public function category_special() {
        $data = array();
        $cat_name = '';
        $cat_id = $this->uri->segment(2);
        if($cat_id == 183){
            $cat_name = 'キーワードから探す';
        }
        $category = $this->common_model->getCategory($cat_id);
        
        if(!empty($category)) {
            $data['cat_name'] = $category->name;
            $data['items_house'] = $this->common_model->getCategoryDetailHouse($cat_id);
            $data['items_office'] = $this->common_model->getCategoryDetailOffice($cat_id);
            $this->template->write_view('content','search_all',$data);
            $this->template->render();
        }else{
            $this->load->view('common/page_404');
        }
    }
    
    public function get_top_special(){
        $get_cat = $this->common_model->getOneCategorySpecial();
        $get_2_cat_top = $this->common_model->getTwoCategorySpecial();
        $items_house = array();
        $items_office = array();
        if(!empty($get_cat)){
            $catId = $get_cat->id;
            if($get_cat->type_p == 1){
                $items_house = $this->common_model->getCategoryDetailHouse($catId); 
            }else{
                $items_office = $this->common_model->getCategoryDetailOffice($catId); 
            }
        }
        if(!empty($get_2_cat_top)){
            foreach ($get_2_cat_top as $key => $value) {
                $catId = $value->id;
                if($value->type_p == 1){
                    $value->items_house_2 = $this->common_model->getCategoryDetailHouse($catId); 
                }else{
                    $value->items_office_2 = $this->common_model->getCategoryDetailOffice($catId); 
                }
            }
        }
        $data = array(
            'items_house'=>$items_house,
            'items_office'=>$items_office,
            'get_cat' => $get_cat,
            'get_2_cat_top' => $get_2_cat_top,
            'imagesGalleryHouses' => $this->common_model->getImagesGalleryHouses(),
            'imagesGalleryOffices' => $this->common_model->getImagesGalleryOffices()
        );
        $this->load->view('home_specail_category', $data);
    }
    
    public function contact($type = '', $id=""){
        $data = array(
            'type' => $type,
            'id' => $id
        );
        $this->load->view('contact', $data);
    }

    public function tags(){
        $this->load->model('houses/houses_model', "houses_model");
        

        $data = array(
            'tagsList' => $this->houses_model->getTagsList(),
        );
        $this->load->view('tags', $data);
    }
    
}