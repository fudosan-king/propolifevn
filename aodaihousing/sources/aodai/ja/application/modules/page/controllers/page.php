<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller {

	private $module = 'page';
	private $table = 'page';
	public $device = 'pc';

	function __construct(){
		parent::__construct();
		$this->device = mobile_template();
		$this->load->model('page_model','model');
        $this->load->model('building/building_model');
        $this->load->model('area/area_model');
        $this->load->model('estate_owners/estate_owners_model');
		if($this->uri->segment(1)=='admincp'){
            //MY_Output class's nocache() method
            $this->output->nocache();

			if($this->uri->segment(2)!='login'){
				if(!$this->session->userdata('userInfo')){
					header('Location: '.PATH_URL.'admincp/login');
					return false;
				}
			}
			$this->template->set_template('admin');
			$this->template->write('title','Admin Control Panel');
		}else{
		      //headerSeo();
		}
	}
	/*------------------------------------ Admin Control Panel ------------------------------------*/
	public function admincp_index(){
        $toolBar = array('addNew', 'show', 'hide', 'delete');
        getToolbar($this->module, $toolBar);
        
		$default_func = 'created';
		$default_sort = 'DESC';
		$data = array(
			'module'=>$this->module,
			'default_func'=>$default_func,
			'default_sort'=>$default_sort
		);
		$this->template->write_view('content','BACKEND/index',$data);
		$this->template->render();
	}
	
	public function admincp_update($id=0){
        $toolBar = array('save');
        getToolbar($this->module, $toolBar);

        $result[0] = array();
        $facilitie_db = '';
        $equipments_db = '';
        $areas_db = '';
        $category_db = '';
        $images_gl = '';
        $tagDb = '';
        $building_db = '';
        $resultBuilding = array();
        if($id!=0){
            $result = $this->model->getDetailManagement($id);
            $facilitie_db = $this->model->getFacilitiesDb($id);
            $equipments_db = $this->model->getEquipmentsDb($id);
            $areas_db = $this->model->getAreasDb($id);
            $category_db = $this->model->getCategoryDb($id);
            $building_db = $this->model->getBuildingDb($id);
            $images_gl = $this->model->getImg($id);
            $tagDb = $this->model->getTagsDB($id, 2);
            $resultBuilding = $this->model->getBuilding();
		}
		$data = array(
            'result' => $result[0],
            'module' => $this->module,
            'id' => $id,
            'facilities' => $this->model->getFacilities(0),
            'facilitie_db' => $facilitie_db,
            'equipments' => $this->model->getEquipments(0),
            'equipments_db' => $equipments_db,
            'areas' => $this->model->getAreas(1),
            'areas_db' => $areas_db,
            'category_main' => $this->model->getCategory(0),
            'category_special' => $this->model->getCategory(1, 1),
            'category_db' => $category_db,
            'layout' => $this->model->getLayout(),
            'images_gl' => $images_gl,
            'tagList' => $this->model->getTagsList(),
            'tagsDB' => $tagDb,
            'building_data'=> $resultBuilding,
            'building_db'=>$building_db
		);
		$this->template->write_view('content','BACKEND/ajax_editContent',$data);
		$this->template->render();
	}

	public function admincp_save(){
		if($_POST){
			//Upload Image
			$fileName = array('images'=>'','images_thumb'=>'');
			if($_FILES){
				foreach($fileName as $k=>$v){
					if(isset($_FILES['fileAdmincp']['error'][$k])){
						$typeFileImage = strtolower(substr($_FILES['fileAdmincp']['type'][$k],0,5));
						if($typeFileImage == 'image'){
							$tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"][$k];
							$file_name[$k] = $_FILES['fileAdmincp']['name'][$k];
							$ext = strtolower(substr($file_name[$k], -4, 4));
							if($ext=='jpeg'){
								$fileName[$k] = time().'_'.SEO(substr($file_name[$k],0,-5)).'.jpg';
							}else{
								$fileName[$k] = time().'_'.SEO(substr($file_name[$k],0,-4)).$ext;
							}
						}else{
							print 'Only upload Image.';
							exit;
						}
					}
				}
			}
			//End Upload Image
			
			if($this->model->saveManagement($fileName)){
				//Upload Image
				if($_FILES){
					foreach($fileName as $k=>$v){
						if(isset($_FILES['fileAdmincp']['error'][$k])){
							$upload_path = BASEFOLDER.'static/uploads/news/';
							move_uploaded_file($tmp_name[$k], $upload_path.$fileName[$k]);
						}
					}
				}
				//End Upload Image
				print 'success';
				exit;
			}
		}
	}
	
	public function admincp_delete(){
		if($this->input->post('id')){
			$id = $this->input->post('id');
			$result = $this->model->getDetailManagement($id);
			$this->db->where('id',$id);
			if($this->db->delete(PREFIX.$this->table)){
				//Xóa hình khi Delete
				@unlink(BASEFOLDER.'static/uploads/news/'.$result[0]->images);
				@unlink(BASEFOLDER.'static/uploads/news/'.$result[0]->images_thumb);
				return true;
			}
		}
	}
	
	public function admincp_ajaxLoadContent(){
		$this->load->library('AdminPagination');
		$config['total_rows'] = $this->model->getTotalsearchContent();
		$config['per_page'] = $this->input->post('per_page');
		$config['num_links'] = 3;
		$config['func_ajax'] = 'searchContent';
		$config['start'] = $this->input->post('start');
		$this->adminpagination->initialize($config);

		$result = $this->model->getsearchContent($config['per_page'],$this->input->post('start'));
		$data = array(
			'result'=>$result,
			'per_page'=>$this->input->post('per_page'),
			'start'=>$this->input->post('start'),
			'module'=>$this->module
		);
		$this->session->set_userdata('start',$this->input->post('start'));
		$this->load->view('BACKEND/ajax_loadContent',$data);
	}
	
	public function admincp_ajaxUpdateStatus(){
		if($this->input->post('status')==0){
			$status = 1;
		}else{
			$status = 0;
		}
		$data = array(
			'status'=>$status
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update(PREFIX.$this->table, $data);
		
		$update = array(
			'status'=>$status,
			'id'=>$this->input->post('id'),
			'module'=>$this->module
		);
		$this->load->view('BACKEND/ajax_updateStatus',$update);
	}

	/*------------------------------------ End Admin Control Panel --------------------------------*/
	
	
	/*------------------------------------ FRONTEND ------------------------------------*/
    
    public function page_service() {
        $id = 221;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
        
    }
    public function page_about() {
        $id = 222;

        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'プロポライフベトナム【会社概要】 │ アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }

    public function page_step() {
        $id = 556;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'Step page│ アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'step'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
    public function page_category_house_hcm(){
        $id = 557;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'Category house HCM page│ アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'Category house HCM'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
    public function page_hcm_office(){
        $id = 558;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'HCM Office│ アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'HCM Office'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
    public function page_temp_contract(){
        $id = 559;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'Temp Contract アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'Temp Contract'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
    public function different_house(){
        $id = 560;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'Different house アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'Different house'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }

    public function page_faq(){
        $id = 561;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'FAQ アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'FAQ'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
    public function page_about_company(){
        $id = 562;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'About Company アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'About Company'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
    public function page_map(){
        $options = array(
            'order_in_map' => true
        );
        $buildings[] = $this->building_model->getBuildingFolowDistrict(5, $options);
        $buildings[] = $this->building_model->getBuildingFolowDistrict(11, $options);
        $buildings[] = $this->building_model->getBuildingFolowDistrict(2, $options);
        $buildings[] = $this->building_model->getBuildingFolowDistrict(25, $options);
        $buildings[] = $this->building_model->getBuildingFolowDistrict(17, $options);
        $buildings[] = $this->building_model->getBuildingFolowDistrict(13, $options);
        $buildings[] = $this->building_model->getBuildingFolowDistrict(10, $options);
        $data['building'] = $buildings;

        $data['infomationArea']= $this->model->getInformationArea();
        /* Seo===================*/
        $seoGoogle = array(
            'title'       => 'ホーチミンのエリアと住居の情報│アオザイハウジング',
            'description' => 'ベトナムホーチミン市の住んだ際のイメージがつきやすいエリアの情報と住居の情報を掲載しております。住居探しならアオザイハウジングにご相談ください。',
            'keyword'     => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム',
        );
        $seo = array(
            'title' => 'ホーチミンのエリアと住居の情報│アオザイハウジング',
            'description' => 'ベトナムホーチミン市の住んだ際のイメージがつきやすいエリアの情報と住居の情報を掲載しております。住居探しならアオザイハウジングにご相談ください。',
        );
        //$this->template->write('title',$item->title);
        $this->template->write_view('content','FRONTEND/map',$data);
        headerSeo($seo, $seoGoogle);
        $this->template->render();
    }
    
    public function page_own_real_estate(){
        $id = 564;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'own_real_estate アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'own_real_estate'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }

    public function page_support_create_company(){
        $id = 565;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'page_support_create_company アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'page_support_create_company'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }

    public function page_support_office(){
        $id = 566;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'page_support_office アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'page_support_office'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }

    public function page_work_permit(){
        $id = 567;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'page_work_permit アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'page_work_permit'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
    public function page_vietnam_visa(){
        $id = 568;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'vietnam_visa アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'vietnam_visa'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
    public function page_econimical_website(){
        $id = 569;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'page_econimical_website アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'page_econimical_website'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }
 public function page_repair_office(){
        $id = 569;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => ''
            );
            $seo = array(
                'title' => 'page_repair_office アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'page_repair_office'
            );
            headerSeo($seo, $seoGoogle);       
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/startic_page',$data);
            $this->template->render();
        }
    }

    public function page_suport_vn(){
        $id = 223;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ロータスサービス【視察の流れ】 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    public function page_contracting_services(){
        $id = 233;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_register_home(){
        $id = 234;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市物件オーナー様募集 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_workshops_home(){
        $id = 235;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'レンタル工場・貸し工場│アオザイハウジング │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_contracting_process() {
        $id = 233;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市賃貸ご契約の流れ │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_shopping() {
        $id = 237;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ホーチミン,不動産,購入,買う'
            );
            headerSeo('', $seoGoogle);        
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    public function page_work_permits() {
        $id = 238;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミンでのベトナムビザ │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }

    public function page_vietnam_work_permits() {
        $id = 270;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミンでのベトナム労働許可証 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    
    public function page_incorporation() {
        $id = 239;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ベトナム,ホーチミン,ビザ,アライバルビザ,労働許可証,ビザ取得,延長'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '法人設立・駐在員事務所開設の流れ│ロータスサービス │ アオザイハウジング',
                // 'description' => 'ベトナム進出のワンストップサービスをご提供しているロータスサービスのビザ・労働許可証サポートの紹介です。'
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);                        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_find_industrial() {
        $id = 240;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ロータスサービス【ベトナム 中古工業団地を買いたい】 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_design_interior() {
        $id = 243;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミンでの内装工事 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_case_construction() {
        $id = 245;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                //'keyword' => 'ベトナム,ホーチミン,法人,駐在員事務所,工業団地,工場'
            );
            headerSeo('', $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_after_sales_service() {
        $id = 246;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                //'keyword' => 'ベトナム,ホーチミン,法人,駐在員事務所,工業団地,工場'
            );
            headerSeo('', $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_staff_introduction() {
        $id = 242;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'プロポライフベトナム│社員紹介 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/startic_page',$data);
    		$this->template->render();
        }
    }

    public function page_staff_introduce() {
        $this->load->model('page_model');
        $staffs = $this->page_model->getAllStaff();
        $data = array('staffs' => $staffs);
        $this->load->view('FRONTEND/staff', $data);
    }
    
    public function page_jobs() {
        $id = 244;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'プロポライフベトナム【採用情報】 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    public function page_support_content() {
        $id = 241;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミンでの進出後の事業ライセンス │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    public function page_aodai_support(){
        $id = 247;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市アオザイサポートデスクについて │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    public function page_interior_furniture(){
        $id = 248;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ベトナム,ホーチミン,設計,施工,内装工事,クロニクルインテリアリフォーム'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ベトナム,ホーチミン,設計,施工,内装工事,クロニクルリフォーム',
                'title' => 'ホーチミンで住居・マンションの内装なら │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    public function page_vitalify(){
        $id = 249;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,バイタリフィアジア'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'バイタリフィアジア（VITALIFY ASIA）様 ホーチミン施工事例',
                'title' => '施工事例バイタリフィアジア様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    public function page_regal(){
        $id = 250;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,リーガル'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'リーガル（REGAL）様 ホーチミン施工事例',
                'title' => '施工事例リーガル様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    public function page_fanuc(){
        $id = 251;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,ファナックベトナム'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ファナックベトナム（FANUC VIETNAM）様 ホーチミン施工事例',
                'title' => '施工事例ファナックベトナム様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    
    public function page_industrial(){
        $id = 252;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ロンハウ(LONG HAU)工業団地 ┃ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }

    public function page_serviced_apartments(){
        $id = 253;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'サービスアパートのご紹介｜アオザイハウジング │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_popular_apartment(){
        $id = 254;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'コンドミニアムのご紹介｜アオザイハウジング │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    public function page_office_information(){
        $id = 255;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ホーチミン 賃貸オフィスのご紹介｜アオザイハウジング',
                'title' => 'ホーチミン市オフィスのご案内 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_guidance_industrial_factory(){
        $id = 256;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '工業団地のご紹介│アオザイハウジング │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);     
            
            headerSeo($seo);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    
    public function page_interior_construction(){
        $id = 257;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,三幸学園,ビューティアート'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ビューティーアート専門学校B-art（学校法人三幸学園）様',
                'title' => '施工事例専門学校B-art様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    
    public function page_258(){
        $id = 258;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,三幸学園,ビューティアート'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'フォトロンベトナム（Photron Vietnam）様',
                'title' => '施工事例フォトロンベトナム様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    
    public function page_259(){
        $id = 259;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ローカルサービスアパートメント・アパートメントのご紹介',
                'title' => 'ホーチミン市住居のご案内 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_261(){
        $id = 261;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '施工事例Dong Shop SUN様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_269(){
        $id = 269;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '施工事例レストランSAMURAI様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
	
	public function page_webads(){
        $id = 260;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,ベトナム,ホームページ,WEB,広告,製作'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'プロポライフベトナム│WEB制作・集客サポート │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }


    /*--------29/10/2015--------*/
    public function page_clothing_manufacturer(){
        $id = 262;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ベトナムホーチミン近郊進出サポート① ┃ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_human_resources_consulting(){
        $id = 263;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ベトナムホーチミン近郊進出サポート② ┃ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_interior_equipment_manufacturers(){
        $id = 264;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ベトナムホーチミン近郊進出サポート③ ┃ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_gym_management(){
        $id = 265;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ベトナムホーチミン近郊進出サポート④ ┃ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }


    public function page_guidance_stores(){
        $id = 266;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市戸建・店舗のご案内 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);     
            
            headerSeo($seo);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_advanced_support(){
        $id = 267;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '会社設立とスタートアップ支援 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_short_term_apartment(){
        $id = 268;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市短期契約可能アパートのご案内 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_representative_office(){
        $id = 271;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '駐在員事務所設立とスタートアップ支援 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_272(){
        $id = 272;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン施工事例オルグローラボ様 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_273(){
        $id = 273;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン施工事例リーガル様 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_274(){
        $id = 274;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '日本とベトナム住居違い │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    /**
     * Static page introaodai
     */
    public function page_introaodai() {
        $seoGoogle = array(
            'keyword' => 'ホーチミン賃貸,ホーチミン不動産,ホーチミンサービスアパート,ホーチミンアパート,ホーチミンマンション,ホーチミンコンドミニアム,ベトナムホーチミン,賃貸,不動産,オフィス',
            'title' => 'アオザイハウジング｜ベトナムホーチミンの賃貸不動産会社',
            'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
        );
        $seo = array(
            'title' => 'アオザイハウジング｜ベトナムホーチミンの賃貸不動産会社',
            'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
        );
        headerSeo($seo, $seoGoogle);
        
        $data = array();
        
        $this->template->write_view('content','FRONTEND/introaodai', $data);
        $this->template->render();
    }

    /**
     * Static page common
     */
    public function static_page_common($page, $data = array()) {
        $data = array(
            // Seo information
            'seo'        => array(),
            // Seo google information
            'seo_google' => array(),
        );
        
        switch ($page) {
            // page/アオザイハウジングについて
            case 'intro_aodai':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'アオザイハウジングとは │ プロポライフベトナム',
                    'description' => 'アオザイハウジングは、ホーチミンで安心のアパート・サービスアパートメント・オフィスの賃貸不動産仲介サービスをご提供しております。',
                    'url'         => '',
                );
                
                // Seo google information
                $data['seo_google'] = array(
                    'title'       => 'アオザイハウジングとは │ プロポライフベトナム',
                    'description' => 'アオザイハウジングは、ホーチミンで安心のアパート・サービスアパートメント・オフィスの賃貸不動産仲介サービスをご提供しております。',
                    'keyword'     => 'ホーチミン,アオザイハウジング,日系不動産,不動産会社',
                );
                break;

            // page/ベトナム賃貸不動産 ご契約の流れ
            case 'step':
                $data['seo'] = array(
                    'title' => 'ホーチミン市賃貸ご契約の流れ │ アオザイハウジング',
                    'description' => 'ホーチミン市での賃貸契約の流れページです。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
                
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                break;

            // page/ローカルサービスアパートメント・アパートメントのご紹介
            case 'type_houses_in_hcm':
                $data['seo'] = array(
                    'title' => 'ホーチミン市住居の種類と特徴 │ アオザイハウジング', 
                    'description' => 'ホーチミン市の住居の種類と特徴になります。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
                
                $data['seo_google'] = array(
                    'title' => 'ホーチミン市住居の種類と特徴 │ アオザイハウジング', 
                    'description' => 'ホーチミン市の住居の種類と特徴になります。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                break;

            // page/ホーチミンの住居と日本の住居の違い
            case 'difference_residence_hcm_and_jp':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'ホーチミンと日本の住居の違い │ アオザイハウジング',
                    'description' => 'ホーチミン市の住居と日本の住居の違いです。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
                );
                
                // Seo google information
                $data['seo_google'] = array(
                    'title'       => 'ホーチミンと日本の住居の違い │ アオザイハウジング',
                    'description' => 'ホーチミン市の住居と日本の住居の違いです。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
                    'keyword'     => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム',
                );
                break;

            // page/住居エリア検索
            case 'map':
                // Seo information
                $data['seo'] = array(
                    'title'       => '住居エリア検索 │ アオザイハウジング',
                    'description' => 'ホーチミン市の住居エリア検索です。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
                );
                
                // Seo google information
                $data['seo_google'] = array(
                    'title'       => '住居エリア検索 │ アオザイハウジング',
                    'description' => 'ホーチミン市の住居エリア検索です。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
                    'keyword'     => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム',
                );
                break;

            // page/オフィスのご案内 or page/static_page/hcm_office
            case 'hcm_office':
                $data['seo'] = array(
                    // 'title' => 'ホーチミン 賃貸オフィスのご紹介｜アオザイハウジング',
                    'title' => 'ホーチミンのオフィスについて│アオザイハウジング',
                    'description' => 'ホーチミン市のオフィスについてです。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,ホーチミンオフィス,アパート,マンション,サービスアパート,コンドミニアム,不動産,賃貸'
                );
                break;

            // page/よくあるご質問
            case 'faq':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'よくあるご質問│アオザイハウジング',
                    'description' => 'よくあるご質問についてです。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,アパート,マンション,サービスアパート,コンドミニアム,不動産,賃貸'
                );
                break;
                
            // page/進出支援のご案内
            case 'support_open_a_company':
                $data['seo'] = array(
                    'title' => '会社設立＆スタートアップ支援 │ ロータスサービス',
                    'description' => 'ベトナムホーチミンへの進出支援ならロータスサービスにお任せ下さい。会社設立・ライセンス取得だけでなく、会社設立中には、会社を運営する為に準備すべきこともサポート。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,会社設立,法人設立,ライセンス'
                );
                break;

            // page/駐在員事務所設立＆スタートアップ支援
            case 'support_representative_office':
                $data['seo'] = array(
                    'title' => '駐在員事務所設立＆スタートアップ支援 │ ロータスサービス', 
                    'description' => 'ベトナムホーチミンへの進出支援ならロータスサービスにお任せ下さい。駐在員事務所設立だけでなく、設立中には事務所を運営する為に準備すべきこともサポート。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,駐在事務所,会社設立,法人設立,ライセンス'
                );
                break;

            // page/ベトナム労働許可証
            case 'work_permit':
                $data['seo'] = array(
                    'title' => 'ベトナム労働許可証 │ ロータスサービス',
                    'description' => 'ベトナム労働許可証とベトナムビザのことなら実績2,500超のロータスサービスにお任せ下さい。ロータスサービスは、働く方へ安心をご提供しております。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,労働許可証,レジデンスカード'
                );
                break;

            // page/ベトナムビザ・労働許可証
            case 'visa':
                $data['seo'] = array(
                    'title' => 'ベトナムビザ │ ロータスサービス',
                    'description' => 'ベトナムビザと労働許可証のことなら実績2,500件超のロータスサービスにお任せ下さい。ロータスサービスは、働く方へ安心をご提供しております。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,ビザ,レジデンスカード'
                );
                break;

            // page/割安WEBサイト制作
            case 'eco_website':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'ホーチミンでWEBサイト制作なら │ プロポライフベトナム',
                    'description' => 'ホームページ制作をお考えならならプロポライフベトナムのWEBデザイン事業部へ。初期導入費用が安価なWEBサイトをご提案しております。',
                    'url'         => '',
                );
                
                // Seo google information
                $data['seo_google'] = array(
                    'title'       => 'ホーチミンでWEBサイト制作なら │ プロポライフベトナム',
                    'description' => 'ホームページ制作をお考えならならプロポライフベトナムのWEBデザイン事業部へ。初期導入費用が安価なWEBサイトをご提案しております。',
                    'keyword'     => 'ベトナム,ホーチミン,WEBサイト,ホームページ',
                );
                break;

            // page/オフィス店舗デザイン・設計施工の流れ
            case 'repair_office':
                $data['seo'] = array(
                    'title' => 'ホーチミンでの内装工事 │ アオザイハウジング',
                    'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                break;

            // page/プロポライフベトナム社員紹介
            case 'staff':
                $data['seo'] = array(
                    'title' => 'プロポライフベトナム社員紹介 │ アオザイハウジング', 
                    'description' => 'アオザイハウジングの運営会社プロポライフベトナムの社員紹介です。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                break;

            // page/住居短期契約について
            case 'temporary_contract':
                // Seo information
                $data['seo'] = array(
                    'title'       => '',
                    'description' => '',
                    'url'         => '',
                );
                
                // Seo google information
                $data['seo_google'] = array(
                    'title'       => '',
                    'description' => '',
                    'keyword'     => '',
                );
                break;

            // page/プロポライフベトナム 会社概要
            case 'general_company':
                $data['seo'] = array(
                    'title' => '運営会社概要 │ アオザイハウジング',
                    // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                     'description' => 'アオザイハウジングの運営会社プロポライフベトナムの概要です。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,アオザイハウジング,プロポライフベトナム'
                );
                break;

            // page/アオザイサポートデスク
            case 'support_aodai':
                $data['seo'] = array(
                    'title' => 'ホーチミン市アオザイサポートデスクについて │ アオザイハウジング',
                    'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                break;

            // page/サポートオプション
            case 'support_option':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'サポートオプションについて│アオザイハウジング',
                    'description' => 'サポートオプションについてです。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,アパート,マンション,サービスアパート,コンドミニアム,不動産,賃貸'
                );
                break;
                
            // page/リーガル（REGAL）様 ホーチミン内装工事例
            case 'page_regal':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例リーガル様 │ クロニクルリフォーム',
                    'description' => 'ホーチミンでのオフィスの内装工事例リーガル様になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,内装工事,内装施工,オフィス内装,家具,インテリア'
                );
                break;

            // page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例
            case 'page_vitalify':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例バイタリフィアジア様 │ クロニクルリフォーム',
                    'description' => 'ホーチミンでのオフィスの内装工事例バイタリフィアジア様になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,内装工事,内装施工,オフィス内装,家具,インテリア'
                );
                break;

            // page/photron-vietnam
            case 'photron_vietnam':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例フォトロンベトナム様 │ クロニクルリフォーム',
                    'description' => 'ホーチミンでのオフィスの内装工事例フォトロンベトナム様になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,内装工事,内装施工,オフィス内装,家具,インテリア'
                );
                break;

            // page/センコーベトナム様
            case 'page_fanuc':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例センコー様 │ クロニクルリフォーム',
                    'description' => 'ホーチミンでのオフィスの内装工事例センコー様になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                break;

            // page/内装工事事例
            case 'page_interior_construction':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例B-art様 │ クロニクルリフォーム',
                    'description' => 'ホーチミンでのオフィスの内装工事例B-art（三幸学園）様になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,内装工事,内装施工,オフィス内装,家具,インテリア'
                );
                break;

            // page/dong-shop-sun
            case 'dong_shop_sun':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例DONG SHOP SUN様 │ クロニクルリフォーム',
                    'description' => 'ホーチミンでのオフィスの内装工事例日系質屋DONG SHOP SUN様になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,内装工事,内装施工,オフィス内装,家具,インテリア'
                );
                break;

            // page/samurai
            case 'samurai':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例レストランSAMURAI様 │ クロニクルリフォーム',
                    'description' => 'ホーチミンでのオフィスの内装工事例レストランSAMURAI様になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,内装工事,内装施工,オフィス内装,家具,インテリア'
                );
                break;

            // page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様
            case 'allGrowLabo':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例オルグロー・ラボ様 │ クロニクルリフォーム', 
                    'description' => 'ホーチミンでのオフィスの内装工事例オフショア開発オルグロー・ラボ様になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,内装工事,内装施工,オフィス内装,家具,インテリア'
                );
                break;

            // page/リーガル（REGAL）様
            case 'dearRegal':
                // Seo information
                $data['seo'] = array(
                    'title'       => 'オフィスの内装工事例リーガル様2 │ クロニクルリフォーム', 
                    'description' => 'ホーチミンでのオフィスの内装工事例靴メーカーリーガル様2になります。クロニクルリフォームでは、社員の定着率や新規採用力の向上など、働く方にも喜ばれるオフィス空間をご提供しております。',
                    'url'         => '',
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,内装工事,内装施工,オフィス内装,家具,インテリア'
                );
                break;

            // page/ホーチミンの賃貸事情とわたしたちの取り組み
            case 'banner_interior':
                $data['seo'] = array(
                    'title' => 'ホーチミンの賃貸事情とわたしたちの取り組み',
                    'description' => 'アオザイハウジングは、ご安心のご提供の為にベトナム不動産資格者、会計資格者、弁護士、日本の宅地建物取引士など専門家が在籍してサービスに取り組んでおります。',
                    'url' => ''
                );
                $data['seo_google'] = array(
                    'keyword' => 'ベトナム,ホーチミン,賃貸事情,不動産事情,会計,税務'
                );
                break;
        }
        
        return $data;
    }

    /**
     * Common static page change use for aodai renewal
     */
    public function static_page($page) {
        $data = $this->static_page_common($page);
        $vn = '';
        if (current_lang_() && current_lang_() == 'vn') {
            $vn = current_lang_() . '/';
        }
        $data['vn'] = $vn;
		$this->template->write_view('content', 'FRONTEND/' . $page, $data);
		headerSeo($data['seo'], $data['seo_google']);
		$this->template->render();
    }

    public function estate_owners() {
        $itemLayouts = $this->model->getLayouts();
        $itemAreas = $this->model->getAreasEstateOwner(1);
        $equipments = $this->estate_owners_model->getEquipmentsFolowHouse();
        $facilitys = $this->model->getFacilityFolowHouse();
        $vn = '';
        if (current_lang_() && current_lang_() == 'vn') {
            $vn = current_lang_() . '/';
        }
        $data = array(
            'itemLayouts' => $itemLayouts,
            'itemAreas'   => $itemAreas,
            'equipments'  => $equipments,
            'facilitys'   => $facilitys,
            'vn'          => $vn,
            'is_device'   => is_smartphone(),
        );

        $seoGoogle = array(
            'keyword' => 'ベトナム,ホーチミン,不動産,オーナー,管理,賃貸,貸したい',
            'title' => 'ベトナムホーチミンの不動産オーナー様へ│ アオザイハウジング',
            'description' => 'アオザイハウジングでは、ホーチミンの不動産の入居者募集、管理、売買もお手伝いしております。ホーチミン在住でなくても対応可能です。まずはお気軽にご相談ください。',
        );
        $seo = array(
            'title' => 'ベトナムホーチミンの不動産オーナー様へ│ アオザイハウジング',
            'description' => 'アオザイハウジングでは、ホーチミンの不動産の入居者募集、管理、売買もお手伝いしております。ホーチミン在住でなくても対応可能です。まずはお気軽にご相談ください。'
        );
        headerSeo($seo, $seoGoogle);

        $this->template->write_view('content', 'FRONTEND/estate_owners', $data);
        $this->template->render();
    }

    public function ajax_estate_owners(){
        if ($_POST) {
            // House_images
            $house_images = array();
            $house_images_thumb = '';
            $tmp_images = array();

            if ($_FILES) {
                foreach ($_FILES as $file) {
                    foreach ($file['name'] as $key => $file_name_origin) {
                        if ($file_name_origin) {
                            $tmp_images[$key] = $file['tmp_name'][$key];
                            $ext = strtolower(substr($file_name_origin, -4, 4));
                            if ($ext == 'jpeg' || $ext == 'jpg') {
                                $file_name_generate = time() . '_' . SEO(substr($file_name_origin, 0, -5)) . '.jpg';
                            } else {
                                $file_name_generate = time() . '_' . SEO(substr($file_name_origin, 0, -4)) . $ext;
                            }
                            $house_images[$key] = $file_name_generate;
                            // Get first image
                            if ($key == 0) {
                                $house_images_thumb = $file_name_generate;
                            }
                        }
                    }
                }
            }

            $data = array(
                //user_info
                'userName'        => $this->input->post('txtUserName'),
                'email'           => $this->input->post('txtEmail'),
                'phone'           => $this->input->post('txtPhone'),
                'address'         => $this->input->post('txtAddress'),
                
                //user_house
                'name_jp'         => $this->input->post('txtName_jp'),
                'name_en'         => $this->input->post('txtName_en'),
                'deposits'        => $this->input->post('txtDeposits'),
                'bathroom'        => $this->input->post('selBathroom'),
                'reach'           => $this->input->post('selReach'),
                'type'            => $this->input->post('selType'),
                
                //house
                'rent'            => $this->input->post('txtRent'),
                'house_layout_id' => $this->input->post('selBedroom'),
                'size'            => $this->input->post('txtSize'),
                'introduction'    => $this->input->post('txtIntroction'),
                
                //area
                'area_id'         => $this->input->post('selArea'),
                
                //equipments
                'equipment'       => $this->input->post('chkEquipment'),
                'facility'        => $this->input->post('chkFacility')
            );

            $data['house_images'] = $house_images;
            $response_house_id = $this->model->insertEstateOwners($data);
            if ($response_house_id) {
                $data['house_id'] = $response_house_id;
                // Upload image
                if ($tmp_images && $house_images) {
                    // Upload image under folder houses
                    $upload_path = BASEFOLDER . 'static/uploads/houses/';
                    $upload_path_gallery = BASEFOLDER . 'static/uploads/houses/gallery/';

                    foreach ($tmp_images as $key => $image) {
                        move_uploaded_file($image, $upload_path_gallery . $house_images[$key]);
                        if ($key == 0) {
                            copy($upload_path_gallery . $house_images[0], $upload_path . $house_images[0]);
                        }
                    }
                }
                $data['house_images'] = '';
                $result = lang('成功!');

                // Send email
                $this->load->helper('email');
                if($data['email'] != '' && valid_email($data['email'])) {
                   $this->sendMail($data);
                }
            } else {
                $result = lang('挿入に失敗しました。');
            }
            echo $result; die;
        }
    }

    public function sendMail($data = array()) {
        $html      = $this->load->view('estate_owners/FRONTEND/send_mail', $data, true);
        $subject   = '【Aodaihousing】不動産オーナー様からのお問い合わせ';
        $body      = $html;
        $emailFrom = CONTACT_MAIL;

        $this->load->model('setting_email_system/setting_email_system_model');
        $bcc_list = $this->setting_email_system_model->getListEmail('bcc');
        $cc_list  = $this->setting_email_system_model->getListEmail('cc');
        $to_list  = $this->setting_email_system_model->getListEmail('to');

        $emailFromName = 'info';
        $emailTo       = $data['email'];
        $emailToName   = $data['email'];
        $emailSent     = sendEmail($emailTo, $emailToName, $emailFrom, $emailFromName, $subject, $body, $bcc_list, $cc_list, $to_list);
    }

	/*------------------------------------ End FRONTEND --------------------------------*/
}