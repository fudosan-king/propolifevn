<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building extends MX_Controller {
	private $device = 'pc';
	private $currency = 'USD';
	private $limit_content = 65;
	private $string_limit_content = '...';
	private $view = '';
	private $module = 'building';
	private $table = 'cli_building';
	private $table_cate = 'category';
	private $get_id_url = '';
    private $per_page = 20;

    function __construct(){
		parent::__construct();
		$this->load->model('building_model','model');
		$this->load->model('houses/houses_model');
		$this->load->model('search/search_model');
		$this->load->model('area/area_model');

		$this->get_id_url = helper_get_Id_current();

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
		}
	}
	public function admincp_index(){
        $toolBar = array('addNew', 'show', 'hide', 'delete');
        getToolbar($this->module, $toolBar);
        
		$default_func = 'modified';
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
        $toolBar = array('back', 'save');
        getToolbar($this->module, $toolBar);
        
		$result = array();
			$result[0] = $this->model->getDetailManagement($id);
			// $result[1] = $this->model->getDetailBuilding($id);
			$result['dictrict'] = $this->model->getAreasHouse();
		$data = array(
            'result'         =>$result,
			'module'         =>$this->module,
			'id'             =>$id
		);
		$this->template->write_view('content','BACKEND/ajax_editContent',$data);
		$this->template->render();
	}

	public function admincp_save(){
		if($_POST){
			//Upload Image
			$fileName = array('images'=>'');
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
			} else {
				// Only valid choose image when create new data
				if ($this->input->post('hiddenIdAdmincp')==0) {
					print 'Please choose image';
					exit;
				}
			}


			//End Upload Image
			if($this->model->saveManagement($fileName)){
				//Upload Image
				if($_FILES){
					foreach($fileName as $k=>$v){
						if(isset($_FILES['fileAdmincp']['error'][$k])){
							$upload_path = BASEFOLDER.'static/uploads/category/';
							//move_uploaded_file($tmp_name[$k], $upload_path.$fileName[$k]);
							// compress image here
							$config['image_library'] = 'gd2';  
                     		$config['source_image'] = $tmp_name[$k];  
							$config['create_thumb'] = FALSE;  
							$config['maintain_ratio'] = TRUE;  
							$config['quality'] = '50%';  
							$config['width'] = 585;  
							$config['height'] = 411;  
							$config['new_image'] = $upload_path.$fileName[$k];  
							$this->load->library('image_lib', $config);  
							$this->image_lib->resize();  
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
			if($this->db->delete($this->table)){
				if ($result[0]->icon) {
					@unlink(BASEFOLDER.'static/uploads/category/'.$result[0]->icon);
				}
				// $this->model->hideCatDetail($id);
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
		if($this->db->update($this->table, $data))
        {
            $this->model->hideCatDetail($this->input->post('id'));
        }
		
		$update = array(
			'status'=>$status,
			'id'=>$this->input->post('id'),
			'module'=>$this->module
		);
		$this->load->view('BACKEND/ajax_updateStatus',$update);
	}

	public function get_area() {
		$area_id = null;
		if (isset($_GET['area']) && is_numeric($_GET['area'])) {
			$area_id = $_GET['area'];
		}
		return $area_id;
	}

	public function get_options() {
		$options = array();
		if ($this->get_area()) {
			$options['district'] = $this->get_area();
		}
		return $options;
	}

	public function get_opt() {
		// House
		$opt = 1;
		if (isset($_GET['opt']) && $_GET['opt'] == 'office') {
			$opt = 2;
		}
		return $opt;
	}

	public function get_label_opt() {
	    $label = 'house';
	    $opt = $this->get_opt();
	    if ($opt == 2) {
	        $label = 'office';
        }
        return $label;
    }

	public function popular() {
		$seoGoogle = array(
			'keyword' => 'ベトナム,ホーチミン,マンション,コンドミニアム,賃貸,不動産',
			'title' => 'ホーチミンの人気マンション・コンドミニアム │ アオザイハウジング',
			'description' => 'ホーチミン市で外国人に人気のマンション・コンドミニアムを詳しく掲載しております。ホーチミンの賃貸不動産ならアオザイハウジング。お気軽にご相談下さい。',
		);
		$seo = array(
			'title' => 'ホーチミンの人気マンション・コンドミニアム │ アオザイハウジング',
			'description' => 'ホーチミン市で外国人に人気のマンション・コンドミニアムを詳しく掲載しております。ホーチミンの賃貸不動産ならアオザイハウジング。お気軽にご相談下さい。',
		);

		// Only use for smart phone
		if (is_smartphone() == 'sp') {
			$config['num_links'] = 1;
		}

		$this->load->library('pagination');
		$config['total_rows'] = $this->model->getCountAll(1, 1, $this->get_options());
		$config['per_page'] = $this->per_page;
		$config['first_link'] = lang('最初');
		$config['last_link'] = lang('最後');
		$config['use_page_numbers'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;
		
		// Page
		$config['query_string_segment'] = 'p';
		$config['base_url'] = reduce_double_slashes(PATH_URL . $this->uri->uri_string());
		$this->pagination->initialize($config);

		$data = array();
		$data['currency'] = $this->currency;
		$data['language'] = current_lang_();

		$page = isset($_GET['p'])?$_GET['p']:0;
		if ($page != 0) {
			$page = $page - 1;
		}
		$cur_page = $page * $this->per_page;
		$data['list'] = $this->model->getDataBuilding(1, $this->per_page, $cur_page, 1, $this->get_options());
		$data['paging']= $this->pagination;

		// Get list all district
		$data['area'] = $this->model->getAreasHouseOffice();
		$data['get_area'] = $this->get_area();
		$data['get_label_opt'] = $this->get_label_opt();

		$this->template->write_view('content', 'FRONTEND/popular', $data);
		headerSeo($seo, $seoGoogle);
		$this->template->render();
	}
	public function luxury_serviced_apartment() {
		$seoGoogle = array(
			'keyword' => 'ベトナム,ホーチミン,サービスアパート,アパート,賃貸,不動産',
			'title' => 'ホーチミンの人気サービスアパート │ アオザイハウジング',
			'description' => 'ホーチミン市で人気のサービスアパートをお徳物件からハイクラスまで詳しく掲載しております。ホーチミンの賃貸不動産ならアオザイハウジングにお任せ下さい。日本人コンサルタントがホーチミン生活をサポートしております。',
		);
		$seo = array(
			'title' => 'ホーチミンの人気サービスアパート │ アオザイハウジング',
			'description' => 'ホーチミン市で人気のサービスアパートをお徳物件からハイクラスまで詳しく掲載しております。ホーチミンの賃貸不動産ならアオザイハウジングにお任せ下さい。日本人コンサルタントがホーチミン生活をサポートしております。',
		);

		// Only use for smart phone
		if (is_smartphone() == 'sp') {
			$config['num_links'] = 1;
		}

		$this->load->library('pagination');
		$config['total_rows'] = $this->model->getCountAll(2, 0, $this->get_options());
		$config['per_page'] = $this->per_page;
		$config['first_link'] = lang('最初');
		$config['last_link'] = lang('最後');
		$config['use_page_numbers'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;
		
		// Page
		$config['query_string_segment'] = 'p';
		$config['base_url'] = reduce_double_slashes(PATH_URL . $this->uri->uri_string());
		$this->pagination->initialize($config);

		$data = array();
		$data['currency'] = $this->currency;
		$data['language'] = current_lang_();

		$page = isset($_GET['p'])?$_GET['p']:0;
		if ($page != 0) {
			$page = $page - 1;
		}
		$cur_page = $page * $this->per_page;
		$data['list'] = $this->model->getDataBuilding(2, $this->per_page, $cur_page, 0, $this->get_options());
		$data['paging']= $this->pagination;

		// Get list all district
		$data['area'] = $this->model->getAreasHouseOffice();
		$data['get_area'] = $this->get_area();
		$data['get_label_opt'] = $this->get_label_opt();

		$this->template->write_view('content', 'FRONTEND/luxury_serviced_apartment', $data);
		headerSeo($seo, $seoGoogle);
		$this->template->render();
	}

	public function near_school_bus() {
		$seoGoogle = array(
			'keyword' => 'ベトナム,ホーチミン,日本人学校バス,アパート,マンション,サービスアパート,コンドミニアム,不動産,賃貸',
			'title' => '日本人学校のバスが停まる物件特集 │ アオザイハウジング',
			'description' => 'ホーチミン市の日本人学校のバスが停まる物件特集。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
		);
		$seo = array(
			'title' => '日本人学校のバスが停まる物件特集 │ アオザイハウジング',
			'description' => 'ホーチミン市の日本人学校のバスが停まる物件特集。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
		);

		// Only use for smart phone
		if (is_smartphone() == 'sp') {
			$config['num_links'] = 1;
		}

		$this->load->library('pagination');
		$config['total_rows'] = $this->model->getCountAll(3, 2, $this->get_options());
		$config['per_page'] = $this->per_page;
		$config['first_link'] = lang('最初');
		$config['last_link'] = lang('最後');
		$config['use_page_numbers'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;
		
		// Page
		$config['query_string_segment'] = 'p';
		$config['base_url'] = reduce_double_slashes(PATH_URL . $this->uri->uri_string());
		$this->pagination->initialize($config);

		$data = array();
		$data['currency'] = $this->currency;
		$data['language'] = current_lang_();

		$page = isset($_GET['p'])?$_GET['p']:0;
		if ($page != 0) {
			$page = $page - 1;
		}
		$cur_page = $page * $this->per_page;
		$data['list'] = $this->model->getDataBuilding(3, $this->per_page, $cur_page, 2, $this->get_options());
		$data['paging']= $this->pagination;

		// Get list all district
		$data['area'] = $this->model->getAreasHouseOffice();
		$data['get_area'] = $this->get_area();
		$data['get_label_opt'] = $this->get_label_opt();

		$this->template->write_view('content', 'FRONTEND/near_school_bus', $data);
		headerSeo($seo, $seoGoogle);
		$this->template->render();
	}

	public function detail_all() {
        $titleNameBuilding = helper_get_after_id_current();
        $titleNameBuilding = html_entity_decode($titleNameBuilding);
        $seo     = array(
            'keywords' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム ',
            'title' => $titleNameBuilding.'│ アオザイハウジング',
            'description' => 'ホーチミン市の日本人学校のバスが停まる物件 '.$titleNameBuilding.'。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
        );
        $seoGoogle = array();
		$data      = array();
		$id        = $this->get_id_url;
		$data['nameBuilding'] = $this->model->getDataByCondition("cli_building.id = ".$id);
		$id_houses            = $this->model->getIDHouseByBuilding($id,1);
		$id_houses1           = $this->model->getIDHouseByBuilding($id,0);
		$listDetail           = array();
		$count                = 0 ;
		$count1               = 0 ;
		$listArea             = array();
        $houses_id            = '';

		$listDetail1      = array();
		$listArea1        = array();
		$equipment        = array();
		$common_facility  = array();
		$equipment1       = array();
		$common_facility1 = array();
        $page = isset($_GET['p'])?$_GET['p']:0;
        if ($page != 0) {
            $page = $page - 1;
        }
        $cur_page = $page * $this->per_page;

        if(isset($id_houses)){
        	foreach ($id_houses as $key => $value) {
        	    $houses_id[]       = $value->house_id;
//				$listArea[]        = $this->model->getAreaManagement($value->house_id);
        	}
        }
        if(isset($houses_id)){
            $equipment     = $this->model->get_equipment_detail($houses_id);
            $common_facility = $this->model->get_common_facility_detail($houses_id);
            $listDetail    = $this->model->getHousesDetail($houses_id,$this->per_page,$cur_page);
            $count         = $this->model->getCountDetailHouse($houses_id);
        }
        if(isset($id_houses1)){
        	foreach ($id_houses1 as $key => $value) {
        	    $houses1_id[]   = $value->house_id;
	        	$listArea1[]    = $this->model->getAreaManagement($value->house_id);
        	}
        }
        if(isset($houses1_id)){
            $equipment1     = $this->model->get_equipment_detail($houses1_id);
            $common_facility1 = $this->model->get_common_facility_detail($houses1_id);
            $listDetail1    = $this->model->getHousesDetail($houses1_id,$this->per_page,$cur_page);
            $count1         = $this->model->getCountDetailHouse($houses1_id);
        }
        
        if(isset($equipment)){
        	$data['equipment'] = $equipment;
        }
        if(isset($common_facility)){
        	$data['facility'] = $common_facility;
        }
        if(isset($equipment1)){
        	$data['equipment1'] = $equipment1;
        }
        if(isset($common_facility1)){
        	$data['facility1'] = $common_facility1;
        }
		
		if ($this->search_model->getLayouts()) {
			$data['itemLayouts'] = $this->search_model->getLayouts();
		} else {
			$data['itemLayouts'] = array();
		}

		if ($this->search_model->getImagesHouse()) {
			$data['imagesHouse'] = $this->search_model->getImagesHouse();
		} else {
			$data['imagesHouse'] = array();
		}

		if (isset($listDetail)) {
			$data['house'] = $listDetail;
		} else {
			$data['house'] = array();
		}

		if (isset($listArea)) {
			$data['area'] = $listArea;
		} else {
			$data['area'] = array();
		}

		if (isset($listDetail1)) {
			$data['house1'] = $listDetail1;
		} else {
			$data['house1'] = array();
		}

		if (isset($listArea1)) {
			$data['area1'] = $listArea1;
		} else {
			$data['area1'] = array();
		}
		$name = helper_get_after_id_current();
        $type = '1';
        $type = $this->input->get('type');
        $data['type'] = $type;
        if($type == '2'){
            $this->load->library('pagination');
            $config['total_rows']  = $count1;
            $config['base_url'] = reduce_double_slashes(PATH_URL . $this->uri->uri_string());
            $config['per_page']   = $this->per_page;
            $config['use_page_numbers'] = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['page_query_string'] = TRUE;
            // Page
            $config['query_string_segment'] = 'p';
            // Only use for smart phone
	        if (is_smartphone() == 'sp') {
	            $config['num_links'] = 1;
	        }
            $config['first_link'] = lang('最初');
            $config['last_link']  = lang('最後');
            $this->pagination->initialize($config);
            $paging = $this->pagination;
            $data['paging'] = $paging;
        }else{
            $this->load->library('pagination');
            $config['total_rows'] = $count;
            $config['base_url'] = reduce_double_slashes(PATH_URL . $this->uri->uri_string());
            $config['per_page']   = $this->per_page;
            $config['use_page_numbers'] = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['page_query_string'] = TRUE;
            // Page
            $config['query_string_segment'] = 'p';
            // Only use for smart phone
	        if (is_smartphone() == 'sp') {
	            $config['num_links'] = 1;
	        }
            $config['first_link'] = lang('最初');
            $config['last_link']  = lang('最後');
            $this->pagination->initialize($config);
            $paging = $this->pagination;
            $data['paging'] = $paging;
        }

        $data['count']  = $count;
        $data['count1'] = $count1;

		$data['module']      = $this->module;
		$data['id']          = $this->get_id_url;
		$data['name']        = $name;
		$data['building_type'] = helper_get_action_current();
		$data['current_lang']  = current_lang_();

		$this->template->write_view('content', 'FRONTEND/detail' . $this->view, $data);
		headerSeo($seo, $seoGoogle);
		$this->template->render();
	}

	/**
	 * Detail condo
	 */
	public function detail_condo() {
		$this->detail_common(1);
	}

	/**
	 * Detail service apartment
	 */
	public function detail_service() {
		$this->detail_common(0);
	}

	/**
	 * Common detail condo and service apartment
	 */
	public function detail_common($type) {
	    $titleNameBuilding = helper_get_after_id_current();
	    $titleNameBuilding = html_entity_decode($titleNameBuilding);
		$seoGoogle = array(
            'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム ',
            'title' => $titleNameBuilding.'│ アオザイハウジング',
            'description' => 'ホーチミン市の人気マンション・コンドミニアム'.$titleNameBuilding.'。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
        );
        $seo = array(
            'title' => $titleNameBuilding.' │ アオザイハウジング',
            'description' => 'ホーチミン市の高級サービスアパート'.$titleNameBuilding.'。ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。',
        );
		$id           = helper_get_Id_current();
		$nameBuilding = $this->model->getDataByCondition("cli_building.id = ".$id);
		$id_houses    = $this->model->getIDHouseByBuilding($id, $type);
		if(isset($nameBuilding[0]->seo_description) && $nameBuilding[0]->seo_description != ""){
		    $seoGoogle['description'] = $nameBuilding[0]->seo_description;
            $seo['description'] = $nameBuilding[0]->seo_description;
        }
        if(isset($nameBuilding[0]->seo_title) && $nameBuilding[0]->seo_title != ""){
            $seoGoogle['title'] = $nameBuilding[0]->seo_title;
            $seo['title'] = $nameBuilding[0]->seo_title;
        }
        if(isset($nameBuilding[0]->seo_keyword) && $nameBuilding[0]->seo_keyword != ""){
            $seoGoogle['keyword'] = $nameBuilding[0]->seo_keyword;
        }

        if (helper_get_sort_current()) {
        	$getSort = helper_get_sort_current();
        } else {
        	$getSort = 'desc';
        }

        $getSortColumn = 'created';

        if (in_array($getSort, array('desc', 'asc'))) {
            $getSortColumn = 'created';
        }

        if (in_array($getSort, array('sortRentAsc', 'sortRentDesc'))) {
            $getSortColumn = 'rent';
        }
        $array_sort = array(
            'sort_column' => $getSortColumn,
            'sort_order_by' => $getSort,
        );

		$listDetail      = array();
		$listArea        = array();
		$equipment       = array();
		$common_facility = array();
		$name = '';
		$count = '';
        
        if($id_houses){
            $arr_ids_houses = array();
            foreach ($id_houses as $key => $value) {
				$listArea[]        = $this->model->getAreaManagement($value->house_id);
				$arr_ids_houses[]  = $value->house_id;
            }
            $cur_page = isset($_GET['per_page'])?$_GET['per_page']:0;
            $listDetail = $this->model->getDetailByHouseIds($arr_ids_houses,$this->per_page,$cur_page);
            $count      = $this->model->getCountDetailByHouseIds($arr_ids_houses,$array_sort);
            $equipment  = $this->model->get_equipment_detail($arr_ids_houses);
            $common_facility = $this->model->get_common_facility_detail($arr_ids_houses);
            $name = helper_get_after_id_current();
        }
        $this->load->library('pagination');
        $config['total_rows'] = $count;

        if (current_lang_()=='vn') {
            if(helper_get_action_current() == 'detail-condo'){
                $config['base_url'] = PATH_URL . 'vn/building/detail-condo/'.$id.'/'.$name ;
            }
            if(helper_get_action_current() == 'detail-service-apartment'){
                $config['base_url'] = PATH_URL . 'vn/building/detail-service-apartment/'.$id.'/'.$name ;
            }
        } else {
            $config['base_url'] = PATH_URL . 'building/'.helper_get_action_current().'/'.$id.'/'.$name ;
        }

        $config['per_page'] = $this->per_page;
        // Only use for smart phone
        if (is_smartphone() == 'sp') {
            $config['num_links'] = 1;
        }
        $config['first_link'] = lang('最初');
        $config['last_link'] = lang('最後');
        $this->pagination->initialize($config);

        $label_building = '';
        $allow_building_info = array(
	        'detail-condo' => '人気マンション・コンドミニアム',
	        'detail-service-apartment' => '人気サービスアパート',
	        'detail-near-school-bus' => '日本人学校のバスが停まる物件特集'
	    );
		if (helper_get_module_current() == 'building') {
	        if (in_array(helper_get_action_current(), array_keys($allow_building_info))) {
	        	$label_building = $allow_building_info[helper_get_action_current()];
	        }
	    }

	    $getLayouts = array();
	    if ($this->search_model->getLayouts()) {
	    	$getLayouts = $this->search_model->getLayouts();
	    }

	    $getImagesHouse = array();
	    if ($this->search_model->getImagesHouse()) {
	    	$getImagesHouse = $this->search_model->getImagesHouse();
	    }

	    $getNameBuilding = array();
	    if ($nameBuilding[0]) {
	    	$getNameBuilding = $nameBuilding[0];
	    }

        $data = array(
            'paging'         => $this->pagination,
            'count'          => $count,
			'itemLayouts'    => $getLayouts,
			'imagesHouse'    => $getImagesHouse,
			'nameBuilding'   => $getNameBuilding,
			'house'          => $listDetail,
			'area'           => $listArea,
			'equipment'      => $equipment,
			'facility'       => $common_facility,
			'sort'           => $getSort,
			'label_building' => $label_building,
            'module'         => $this->module,
            'id'             => $id,
            'building_type'  => helper_get_action_current(),
            'current_lang'   => current_lang_(),
    	);

    	$this->template->write_view('content', 'FRONTEND/detail_condo' . $this->view, $data);
		headerSeo($seo, $seoGoogle);
		$this->template->render();
	}
}
