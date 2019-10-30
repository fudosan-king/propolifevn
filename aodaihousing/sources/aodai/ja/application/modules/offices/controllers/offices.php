<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offices extends MX_Controller {

	private $module = 'offices';
	private $table = 'offices';
    public $per_page = 7;
    public $device = 'pc';

	function __construct(){
		parent::__construct();
		$this->device = mobile_template();
		$this->load->model('offices_model','model');
        $this->load->model('search/search_model');
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
	/*------------------------------------ Admin Control Panel ------------------------------------*/
	public function admincp_index(){
        $toolBar = array('addNew','edit', 'show', 'hide', 'delete');
        getToolbar($this->module, $toolBar);
        
		$default_func = 'update';
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
        
		$result1 = '';
        $facilitie_db = '';
        $equipments_db = '';
        $category_db = '';
        $areas_db = '';
        $images_gl = '';
        $building_db = '';
        $tagDb = "";
        $resultBuilding =  $this->model->getBuilding();
        if($id != 0){
            $result      = $this->model->getDetailManagement($id);
            if(isset($result[0])){
                $result1 = $result[0];
            }
            $facilitie_db   = $this->model->getFacilitiesDb($id);
            $equipments_db  = $this->model->getEquipmentsDb($id);
            $areas_db       = $this->model->getAreasDb($id);
            $category_db    = $this->model->getCategoryDb($id);
            $building_db    = $this->model->getBuildingDb($id);
            $images_gl      = $this->model->getImg($id);
            $tagDb          = $this->model->getTagsDB($id, 1);
		}
		$data = array(
            'result'           => $result1,
            'module'           => $this->module,
            'id'               => $id,
            'facilities'       => $this->model->getFacilities(1),
            'facilitie_db'     => $facilitie_db,
            'equipments'       => $this->model->getEquipments(1),
            'equipments_db'    => $equipments_db,
            'areas'            => $this->model->getAreas(3),
            'areas_db'         => $areas_db,
            'category_main'    => $this->model->getCategory(0),
            'category_special' => $this->model->getCategory(1, 2),
            'category_db'      => $category_db,
            'images_gl'        => $images_gl,
            'tagList'          => $this->model->getTagsList(),
            'tagsDB'           => $tagDb,
            'building_data'    => $resultBuilding,
            'building_db'      => $building_db
		);

        $this->template->write_view('content','BACKEND/ajax_editContent',$data);
		$this->template->render();
	}

	public function admincp_save(){
		if($_POST){
			//Upload Image
			$fileName = array('images_thumb'=>'');
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
            $fileName_gallery = array();
            if(isset($_FILES) && isset($_FILES['fileAdmincp']['name']['images_gallery'])){
				foreach($_FILES['fileAdmincp']['name']['images_gallery'] as $k=>$v){
					if(isset($_FILES['fileAdmincp']['error']['images_gallery'][$k])){
						$typeFileImage = strtolower(substr($_FILES['fileAdmincp']['type']['images_gallery'][$k],0,5));
						if($typeFileImage == 'image'){
							$tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"]['images_gallery'][$k];
							$file_name[$k] = $_FILES['fileAdmincp']['name']['images_gallery'][$k];
							$ext = strtolower(substr($file_name[$k], -4, 4));
							if($ext=='jpeg'){
								$fileName_gallery[$k] = time().'_'.SEO(substr($file_name[$k],0,-5)).'.jpg';
							}else{
								$fileName_gallery[$k] = time().'_'.SEO(substr($file_name[$k],0,-4)).$ext;
							}
						}else{
							print 'Only upload Image.';
							exit;
						}
					}
				}
			}
			//End Upload Image
			
			if($this->model->saveManagement($fileName, $fileName_gallery)){
				//Upload Image
				if($_FILES){
					foreach($fileName as $k=>$v){
						if(isset($_FILES['fileAdmincp']['error'][$k])){
							$upload_path = BASEFOLDER.'static/uploads/offices/';
							move_uploaded_file($tmp_name[$k], $upload_path.$fileName[$k]);
						}
					}
                    foreach($fileName_gallery as $k=>$v){
						if(isset($_FILES['fileAdmincp']['error']['images_gallery'][$k])){
							$upload_path = BASEFOLDER.'static/uploads/offices/gallery/';
							$r_up = move_uploaded_file($tmp_name[$k], $upload_path.$fileName_gallery[$k]);
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
				@unlink(BASEFOLDER.'static/uploads/offices/'.$result[0]->images);
				@unlink(BASEFOLDER.'static/uploads/offices/'.$result[0]->images_thumb);
				return true;
			}
		}
	}
    
    public function admincp_deletegl(){
		if($this->input->post('id')){
			$id = $this->input->post('id');
            $result = $this->model->getGl($id);
			$this->db->where('id',$id);
			if($this->db->delete(PREFIX.'office_images')){
				//Xóa hình khi Delete
				@unlink(BASEFOLDER.'static/uploads/offices/gallery/'.$result[0]->name_image);
                echo 'oke';
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
        $images_gallery = $this->search_model->getImagesOffice();

        $result = $this->model->getsearchContent($config['per_page'],$this->input->post('start'));
		$data = array(
		    'images_gallery' => $images_gallery,
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
    
    public function admincp_upload(){
		$uploaddir = 'static/uploads/offices/gallery/'; 
        
        $ext = strtolower(substr($_FILES['uploadfile']['name'], -4, 4));
        $file = time().'_'.SEO(substr($_FILES['uploadfile']['name'],0,-5)). $ext;
        $path_file = $uploaddir . $file;
        $id = $this->model->inserImage($file);
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_file)) { 
          echo '<li><a href="#" title=""><img width="101" height="101" src="'.PATH_URL.'static/uploads/offices/gallery/'.$file.'" alt=""></a>
                        <div class="actions" style="display: none;">
                            <a href="#" title=""><img src="'.PATH_URL.'static/images/admin/icons/edit.png" alt=""></a>
                            <a href="#" title=""><img src="'.PATH_URL.'static/images/admin/icons/delete.png" alt=""></a>
                        </div>
                    </li><input type="hidden" name="gl[]" value="'.$id.'" id="'.$id.'"  />';
                    
        } else {
        	echo "error";
        }
	}
    
    public function admincp_order_img(){
        $data_id = $this->input->post('recordsArray');
        if(isset($data_id)){
            $order = 0;
            foreach($data_id as $key=>$value){
                $data = array('order'=>$order);
                $this->model->update_img_sort($value, $data);
                $order++;
            }
        }
    }
    public function admincp_popup($array_id=array()) {
          
       // $array_id=array();
        $data=array();
        if(isset($_GET['list_id']) && $_GET['list_id'] && $_GET['list_id']!='undefined' ){
            $list_id=$_GET['list_id'];
            $array_id=explode('-', $list_id);
        }
        
     //   $array_id=array('0'=>'75','1'=>'76','2'=>'77');
//        $toolBar = array('save');
//        getToolbar($this->module, $toolBar);
        if ($array_id != null):
            foreach ($array_id as $key => $id) {
                $result[$key] = $this->model->getDetailManagement($id);
            }
         $length=sizeof($array_id);
        $data = array(
            'items' => $result,
            'module' => $this->module,
            'id' => $id,
            'number'=>$length
        );
        endif;
        $this->load->view('BACKEND/popup_edit', $data);
    }
    
    public function admincp_saveList(){
        $rent=array();
        $introduction=array();
        $comment=array();
        $other_notice=array();
        
        $list_id=$this->input->post('list_id');
        if($list_id !=null){
        foreach ($list_id as $id){
        $rent[$id]=$this->input->post($id.'_rent_jp');
        $introduction[$id]= json_encode( $this->input->post($id.'_introduction'));
        $comment[$id]=  json_encode($this->input->post($id.'_comment'));
        $other_notice[$id]=  json_encode($this->input->post($id.'_other_notice'));
        }
        $this->model->updateListHouse($rent,$introduction,$comment,$other_notice);
          
         $this->admincp_popup($list_id);
        }
    }
	/*------------------------------------ End Admin Control Panel --------------------------------*/
	
	
	/*------------------------------------ FRONTEND ------------------------------------*/
    public function index()
    {
        $this->load->library('pagination');
        $cur_page = $this->uri->segment(3)?$this->uri->segment(3):0;
        if(current_lang_()=='vn'){
            $config['base_url'] = PATH_URL . 'vn/offices/page/';
        }else{
            $config['base_url'] = PATH_URL . 'offices/page/';
        }
        $config['total_rows'] = $this->model->getTotalItem();
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 3;
        // Only use for smart phone
        if (is_smartphone() == 'sp') {
            $config['num_links'] = 1;
        }
        $config['first_link'] = lang('最初');
        $config['last_link'] = lang('最後');
        $this->pagination->initialize($config);
        $this->pagination->create_links();
         
        $data = array(
            'items' => $this->model->getListItem($this->per_page, $cur_page)
        );
        
        $this->template->write_view('content','FRONTEND/index', $data);
		$this->template->render();
    }
    
    public function detail() {
        if (current_lang_() == 'vn') {
            $breadcums = $this->uri->segment(6);
            $id = $this->uri->segment(4);
        } else {
            $id = $this->uri->segment(3);
            $breadcums= $this->uri->segment(5);
        }
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item  = $this->model->getDetail($id);
            if(!$item){
                $this->load->view('common/page_404');
            }else {
                $equipment = $this->model->get_equipment_detail($id);
                $prevRecord = $this->model->prevRecord($id);
                $nextRecord = $this->model->nextRecord($id);
                $images_gl = $this->model->getImg($id);
                $images_thumb = $this->model->getImagesThumb($id);
                $common_facility = $this->model->get_common_facility_detail($id);
                $cateOffice = $this->model->getCateOffice($id);
                $cateId = isset($cateOffice['0']->cate_id) ? $cateOffice['0']->cate_id : null;

                $list_office_id = array();
                $buildingId = $this->model->getBuildingId($id);
                if (isset($buildingId)) {
                    $list_building_id = array();
                    foreach ($buildingId as $building_id) {
                        $list_building_id[] = $building_id->building_id;
                    }

                    if (isset($list_building_id)) {
                        $list_building_id = implode(',', $list_building_id);
                        $officeId = $this->model->getBuildingOffice($list_building_id, $id);
                        if (isset($officeId)) {
                            foreach ($officeId as $office_id) {
                                $list_office_id[] = $office_id->office_id;
                            }
                            if (isset($list_office_id)) {
                                $list_office_id = implode(',', $list_office_id);
                            }
                        }
                    }
                }

                $rent = $item->month_rent;
                $rent_min = check_rent_min($rent);
                $rent_max = check_rent_max($rent);
                $area_id = $item->area_id;
                $size    = $item->size;

                $data = array(
                    'breadcums' => $breadcums,
                    'office_building' => isset($list_office_id) ? $this->model->getOfficeBuiding($list_office_id) : array(),
                    'category_special' => isset($id) ? $this->model->getOfficeCategory($id,$rent_min,$rent_max,$area_id,$size) : array(),
                    'item' => $item,
                    'equipment' => $equipment,
                    'common_facility' => $common_facility,
                    'images_gl' => $images_gl,
                    'current_lang' => current_lang_(),
                    'id' => $item->id,
                    'images_thumb'=>$images_thumb,
                    'imagesOffice' => $this->search_model->getImagesOffice(),
                );
                $rent = isset($item->month_rent) ? vcp_printf($item->month_rent, current_lang_()) . ' USD/月' : '';
                $rent .= isset($item->size_rent) && isset($item->month_rent) ? ' - ' : '';
                $rent .= isset($item->size_rent) ? vcp_printf($item->size_rent, current_lang_()) . ' USD/m&#178;' : '';
                $size = isset($item->size) ? vcp_printf($item->size, current_lang_()) . ' USD/m&#178;' : '';
                $title = vcp_printf($item->name_jp, current_lang_()) . ' | アオザイハウジング';;
                $description = !($item->introduction) ? $this->config->item('description') : vcp_printf($item->introduction, current_lang_());
                $thumb = !($item->images_thumb) ? $this->config->item('image') : PATH_URL . 'static/uploads/offices/' . $item->images_thumb;;
                $seoGoogle = array(
                    'keyword' => vcp_printf($item->name, current_lang_()) . "," . vcp_printf($item->name_jp, current_lang_())
                );

                $seo = array(
                    'image' => $thumb,
                    'title' => $title,
                    'description' => "ベトナムホーチミンの賃貸不動産ならアオザイハウジングにお任せ下さい。" . vcp_printf($item->name_jp, current_lang_()),
                    'url' => PATH_URL . 'offices/detail/' . $item->id
                );

                $view = '';
                if ($this->device != 'pc') {
                    $view = '_mobile';
                }


                //$this->template->write('title',$title);
                $this->template->write_view('content', 'FRONTEND/detail' . $view, $data);
                headerSeo($seo, $seoGoogle);
                $this->template->render();
            }
        }
    }
    
    public function home_list()
    {
        $data = array(
            'items' => $this->model->getListItem(6, 0)
        );
        $this->load->view("FRONTEND/home_list", $data);
    }
    
    public function slide($items,$images_thumb){
        $data = array(
            'items' =>$items,
            'images_thumb'=>$images_thumb
        );
        
        $this->load->view("FRONTEND/slide", $data);
    }
	/*------------------------------------ End FRONTEND --------------------------------*/
}