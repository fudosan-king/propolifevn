<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Houses extends MX_Controller {
    private $module = 'houses';
    private $table = 'houses';
    public $per_page = 6;
    public $device = 'pc';

    function __construct() {
        parent::__construct();
        $this->device = mobile_template();
        $this->load->model('common/common_model');
        $this->load->model('houses_model', 'model');
        $this->load->model('search/search_model');
        $this->load->model('setting_equipment_facilities/setting_equipment_facilities_model');
        if ($this->uri->segment(1) == 'admincp') {
            //MY_Output class's nocache() method
            $this->output->nocache();

            if ($this->uri->segment(2) != 'login') {
                if (!($this->session->userdata('userInfo'))) {
                    header('Location: ' . PATH_URL . 'admincp/login');
                    return false;
                }
            }
            $this->template->set_template('admin');
            $this->template->write('title', 'Admin Control Panel');
        }
    }

    /* ------------------------------------ Admin Control Panel ------------------------------------ */

    public function admincp_index() {
        $toolBar = array('addNew','edit', 'show', 'hide', 'delete');
        getToolbar($this->module, $toolBar);

        $default_func = 'update';
        $default_sort = 'DESC';
        $data = array(
            'module' => $this->module,

            'default_func' => $default_func,
            'default_sort' => $default_sort
        );
        $this->template->write_view('content', 'BACKEND/index', $data);
        $this->template->render();
    }

    public function admincp_update($id = 0) {
        $toolBar = array('save');
        getToolbar($this->module, $toolBar);
        $result1        = '';
        $facilitie_db   = array();
        $equipments_db  = array();
        $areas_db       = array();
        $category_db    = array();
        $images_gl      = array();
        $tagDb          = array();
        $building_db    = array();
        $equipments_condo = array();
        $equipments_serviced = array();
        $facilities_condo = array();
        $facilities_serviced = array();
        $resultBuilding = $this->model->getBuilding();
        $equipments_condo    = $this->setting_equipment_facilities_model->getEquipmentCondo();
        $equipments_serviced = $this->setting_equipment_facilities_model->getEquipmentServiced();
        $facilities_condo    = $this->setting_equipment_facilities_model->getFacilitiesCondo();
        $facilities_serviced = $this->setting_equipment_facilities_model->getFacilitiesServiced();
        $buildingCondo       = $this->model->getBuildingCondo();
        $buildingServiced    = $this->model->getBuildingServiced();
        $buildingAll         = $this->model->getBuildingAll();

        if ($id != 0) {
            $result         = $this->model->getDetailManagement($id);
            if(isset($result[0])){
                $result1 = $result[0];
            }
            $facilitie_db   = $this->model->getFacilitiesDb($id);
            $equipments_db  = $this->model->getEquipmentsDb($id);
            $areas_db       = $this->model->getAreasDb($id);
            $category_db    = $this->model->getCategoryDb($id);
            $building_db    = $this->model->getBuildingDb($id);
            $images_gl      = $this->model->getImg($id);
            $tagDb          = $this->model->getTagsDB($id, 2);
        }
        
        $data = array(
            'building_condo'   => $buildingCondo,
            'building_serviced'=> $buildingServiced,
            'building_all'     => $buildingAll,
            'result'           => $result1,
            'module'           => $this->module,
            'id'               => $id,
            'facilities'       => $this->model->getFacilities(0),
            'facilitie_db'     => $facilitie_db,
            'equipments'       => $this->model->getEquipments(0),
            'equipments_db'    => $equipments_db,
            'areas'            => $this->model->getAreas(1),
            'areas_db'         => $areas_db,
            'category_main'    => $this->model->getCategory(0),
            'category_special' => $this->model->getCategory(1, 1),
            'category_db'      => $category_db,
            'layout'           => $this->model->getLayout(),
            'images_gl'        => $images_gl,
            'tagList'          => $this->model->getTagsList(),
            'tagsDB'           => $tagDb,
            'building_data'    => $resultBuilding,
            'building_db'      => $building_db,
            'equipments_condo' => $equipments_condo,
            'equipments_serviced'=>$equipments_serviced,
            'facilities_condo' => $facilities_condo,
            'facilities_serviced'=>$facilities_serviced
        );
        
        $this->template->write_view('content', 'BACKEND/ajax_editContent', $data);
        $this->template->render();
    }

    public function admincp_ajax_update_type(){
        $equipmnet_facility[] = array();
        $type = $this->input->post('type');
        $id   = $this->input->post('id');
        if($id != '0'){
            $typeID = $this->model->getTypeAjax($id);
            if($typeID[0]->type == $type ){
                $equipmnet_facility[] = $this->model->getEquipmentsDb($id);
                $equipmnet_facility[] = $this->model->getFacilitiesDbAjax($id);
            }else{
                if($type == '0'){
                    $equipmnet_facility[] = $this->setting_equipment_facilities_model->getEquipmentServiced();
                    $equipmnet_facility[] = $this->setting_equipment_facilities_model->getFacilitiesServiced();
                }
                if($type == '1'){
                    $equipmnet_facility[] = $this->setting_equipment_facilities_model->getEquipmentCondo();
                    $equipmnet_facility[] = $this->setting_equipment_facilities_model->getFacilitiesCondo();
                }
            }
        }elseif($id == '0'){
            if($type == '1'){
                $equipmnet_facility[] = $this->setting_equipment_facilities_model->getEquipmentCondo();
                $equipmnet_facility[] = $this->setting_equipment_facilities_model->getFacilitiesCondo();
            }elseif ($type == '0'){
                $equipmnet_facility[] = $this->setting_equipment_facilities_model->getEquipmentServiced();
                $equipmnet_facility[] = $this->setting_equipment_facilities_model->getFacilitiesServiced();
            }
        }else{
            $equipmnet_facility[]='';
        }
        echo json_encode($equipmnet_facility);
        exit;
    }

    public function admincp_save() {
        if (isset($_POST)) {
            //Upload Image
            $fileName = array('images_thumb' => '');
            if (isset($_FILES)) {
                foreach ($fileName as $k => $v) {
                    if (isset($_FILES['fileAdmincp']['error'][$k])) {
                        $typeFileImage = strtolower(substr($_FILES['fileAdmincp']['type'][$k], 0, 5));
                        if ($typeFileImage == 'image') {
                            $tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"][$k];
                            $file_name[$k] = $_FILES['fileAdmincp']['name'][$k];
                            $ext = strtolower(substr($file_name[$k], -4, 4));
                            if ($ext == 'jpeg') {
                                $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -5)) . '.jpg';
                            } else {
                                $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -4)) . $ext;
                            }
                        } else {
                            print 'Only upload Image.';
                            exit;
                        }
                    }
                }
            }
            $fileName_gallery = array();
            if (isset($_FILES) && isset($_FILES['fileAdmincp']['name']['images_gallery'])) {
                foreach ($_FILES['fileAdmincp']['name']['images_gallery'] as $k => $v) {
                    if (isset($_FILES['fileAdmincp']['error']['images_gallery'][$k])) {
                        $typeFileImage = strtolower(substr($_FILES['fileAdmincp']['type']['images_gallery'][$k], 0, 5));
                        if ($typeFileImage == 'image') {
                            $tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"]['images_gallery'][$k];
                            $file_name[$k] = $_FILES['fileAdmincp']['name']['images_gallery'][$k];
                            $ext = strtolower(substr($file_name[$k], -4, 4));
                            if ($ext == 'jpeg') {
                                $fileName_gallery[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -5)) . '.jpg';
                            } else {
                                $fileName_gallery[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -4)) . $ext;
                            }
                        } else {
                            print 'Only upload Image.';
                            exit;
                        }
                    }
                }
            }
            //End Upload Image
            if ($this->model->saveManagement($fileName, $fileName_gallery)) {
                //Upload Image
                if (isset($_FILES)) {
                    foreach ($fileName as $k => $v) {
                        if (isset($_FILES['fileAdmincp']['error'][$k])) {
                            $upload_path = BASEFOLDER . 'static/uploads/houses/';
                            $upload_path_thumb = BASEFOLDER . 'static/uploads/houses/thumb_';
                            move_uploaded_file($tmp_name[$k], $upload_path_thumb . $fileName[$k]);
                            $this->optimizeImage($upload_path_thumb . $fileName[$k], 674);
                            $this->createThumbs($upload_path_thumb . $fileName[$k], $upload_path . $fileName[$k], 293);
                        }
                    }
                    foreach ($fileName_gallery as $k => $v) {
                        if (isset($_FILES['fileAdmincp']['error']['images_gallery'][$k])) {
                            $upload_path = BASEFOLDER . 'static/uploads/houses/';
                            $r_up = move_uploaded_file($tmp_name[$k], $upload_path . $fileName_gallery[$k]);
                            $this->optimizeImage($upload_path. $fileName[$k], 550);
                        }
                    }
                }
                //End Upload Image
                print 'success';
                exit;
            }
        }
    }

    public function optimizeImage( $pathToImages, $thumbWidth) 
    {
        $fnames = glob( $pathToImages );
        foreach($fnames as $fname){
            $info = pathinfo($pathToImages);
            if( isset($info['extension']) AND strtolower($info['extension']) == 'jpg')
            {
                $img = imagecreatefromjpeg( "{$pathToImages}" );
                $width = imagesx( $img );
                $height = imagesy( $img );
                $new_width = $thumbWidth;
                $new_height = floor( $height * ( $thumbWidth / $width ) );
                $tmp_img = imagecreatetruecolor( $new_width, $new_height );
                imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
                imagejpeg( $tmp_img, "{$pathToImages}" , 80);
            }
        }
    }

   public function createThumbs($pathToImages, $pathToThumbs, $thumbWidth){
        $fnames = glob( $pathToImages );
        foreach($fnames as $fname){
            $info = pathinfo($pathToImages);
            if( isset($info['extension']) AND strtolower($info['extension']) == 'jpg')
            {
                $img = imagecreatefromjpeg( "{$pathToImages}" );
                $width = imagesx( $img );
                $height = imagesy( $img );
                $new_width = $thumbWidth;
                $new_height = floor( $height * ( $thumbWidth / $width ) );
                $tmp_img = imagecreatetruecolor( $new_width, $new_height );
                imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
                imagejpeg( $tmp_img, "{$pathToThumbs}" , 80);
            }
        }
    }

    public function admincp_delete() {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $result = $this->model->getDetailManagement($id);
            $this->db->where('id', $id);
            if ($this->db->delete(PREFIX . $this->table)) {
                //Xóa hình khi Delete
                @unlink(BASEFOLDER . 'static/uploads/houses/'.$result[0]->images);
                @unlink(BASEFOLDER . 'static/uploads/houses/'.$result[0]->images_thumb);
                @unlink(BASEFOLDER . 'static/uploads/houses/thumb_'.$result[0]->images_thumb);
                return true;
            }
        }
    }

    public function admincp_deletegl() {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $result = $this->model->getGl($id);
            $this->db->where('id', $id);
            if ($this->db->delete(PREFIX . 'house_images')) {
                //Xóa hình khi Delete
                @unlink(BASEFOLDER . 'static/uploads/houses/gallery/' . $result[0]->name_image);
                @unlink(BASEFOLDER . 'static/uploads/houses/gallery/thumb_' . $result[0]->name_image);
                echo 'oke';
                return true;
            }
        }
    }

    public function admincp_ajaxLoadContent() {
        $this->load->library('AdminPagination');
        $config['total_rows'] = $this->model->getTotalsearchContent();
        $config['per_page'] = $this->input->post('per_page');
        $config['num_links'] = 3;
        $config['func_ajax'] = 'searchContent';
        $config['start'] = $this->input->post('start');
        $this->adminpagination->initialize($config);
        $images_gallery = $this->search_model->getImagesHouse();
        $result = $this->model->getsearchContent($config['per_page'], $this->input->post('start'));

        $data = array(
            'images_gallery' => $images_gallery,
            'result' => $result,
            'per_page' => $this->input->post('per_page'),
            'start' => $this->input->post('start'),
            'module' => $this->module
        );

        $this->session->set_userdata('start', $this->input->post('start'));
        $this->load->view('BACKEND/ajax_loadContent', $data);
    }

    public function admincp_ajaxUpdateStatus() {
        if ($this->input->post('status') == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update(PREFIX . $this->table, $data);

        $update = array(
            'status' => $status,
            'id' => $this->input->post('id'),
            'module' => $this->module
        );
        $this->load->view('BACKEND/ajax_updateStatus', $update);
    }

    public function admincp_upload() {
        $uploaddir = 'static/uploads/houses/gallery/';
        $uploaddir_thumb = 'static/uploads/houses/gallery/thumb_';
        $ext = strtolower(substr($_FILES['uploadfile']['name'], -4, 4));
        $file = time() . '_' . SEO(substr($_FILES['uploadfile']['name'], 0, -5)) . $ext;
        $path_file = $uploaddir . $file;
        $path_file_thumb = $uploaddir_thumb . $file;
        $id = $this->model->inserImage($file);
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_file)) {
            $this->optimizeImage($path_file, 674);
            $this->createThumbs($path_file, $path_file_thumb, 293);
            echo '<li id="recordsArray_'.$id.'"><a href="#" title=""><img width="101" height="101" src="' . PATH_URL . $path_file . '" alt=""></a>
                        <div class="actions" style="display: none;">
                            <a href="#" title=""><img src="' . PATH_URL . 'static/images/admin/icons/edit.png" alt=""></a>
                            <a href="#" title=""><img src="' . PATH_URL . 'static/images/admin/icons/delete.png" alt=""></a>
                        </div>
                    </li><input type="hidden" name="gl[]" value="' . $id . '" id="' . $id . '"  />';
        } else {
            echo "error";
        }
    }

    public function admincp_order_img() {
        $data_id = $this->input->post('recordsArray');
        if (isset($data_id)) {
            $order = 0;
            foreach ($data_id as $key => $value) {
                $data = array('order' => $order);
                $this->model->update_img_sort($value, $data);
                $order++;
            }
        }
    }

    public function admincp_popup($array_id=array()) {
          
        $data=array();
        if(isset($_GET['list_id']) && $_GET['list_id'] && $_GET['list_id']!='undefined' ){
            $list_id=$_GET['list_id'];
            $array_id=explode('-', $list_id);
        }

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

    /* ------------------------------------ End Admin Control Panel -------------------------------- */


    /* ------------------------------------ FRONTEND ------------------------------------ */

    public function index_() {

        /*
          $this->load->library('pagination');
          $cur_page = $this->uri->segment(3)?$this->uri->segment(3):0;
          $config['base_url'] = PATH_URL . 'houses/page/';
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
         */
    }

    /**@param $item:id,name_en,name_jp,type,introduction;
     * @param
     */
    public function detail() {
        if (current_lang_() == 'vn') {
            $breadcums = $this->uri->segment(6);
            $id = $this->uri->segment(4);
        } else {
            $id = $this->uri->segment(3);
            $breadcums= $this->uri->segment(5);
        }
        if (is_numeric($id) == false) {
            $this->load->view('common/page_404');
        } else {
            $item    = $this->model->getDetail($id);
            if(!$item){
                $this->load->view('common/page_404');
            }else {
                $prevRecord = $this->model->prevRecord($id);
                $nextRecord = $this->model->nextRecord($id);
                $equipment = $this->model->get_equipment_detail($id);
                $common_facility = $this->model->get_common_facility_detail($id);
                $images_gl = $this->model->getImg($id);
                $images_thumb = $this->model->getImagesThumb($id);
                $cateHouse = $this->model->getCateHouse($id);
                if (isset($cateHouse['0']->cate_id)) {
                    $cateId = $cateHouse['0']->cate_id;
                } else {
                    $cateId = null;
                }
                $itemLayOut = $this->search_model->getLayouts();

                $list_house_id = array();
                $buildingId = $this->model->getBuildingId($id);
                if (isset($buildingId)) {
                    $list_building_id = array();
                    foreach ($buildingId as $key => $building_id) {
                        $list_building_id[] = $building_id->building_id;
                    }
                    if (isset($list_building_id)) {
                        $list_building_id = implode(',', $list_building_id);
                        $houseId = $this->model->getBuildingHouse($list_building_id, $id);
                        if (isset($houseId)) {
                            foreach ($houseId as $house_id) {
                                $list_house_id[] = $house_id->house_id;
                            }
                        }
                    }
                }

                if (isset($list_house_id) && count($list_house_id) > 0) {
                    $house_building = $this->model->getHouseBuilding($list_house_id);
                } else {
                    $house_building = array();
                }
                $rent = $item->rent;
                $rent_min = check_rent_min($rent);
                $rent_max = check_rent_max($rent);
                $area_id  = $item->area_id;
                $layout_id = $item->house_layout_id;
                $building_id_house = '';
                if(isset($buildingId[0]->building_id) && $buildingId[0]->building_id != ''){
                    $building_id_house = $buildingId[0]->building_id;
                }
                    if (isset($id)) {
                    $category_special = $this->model->getHouseCategory($id,$rent_min,$rent_max,$area_id,$layout_id,$building_id_house);
                } else {
                    $category_special = array();
                }

                $data = array(
                    'itemLayOut' => $itemLayOut,
                    'breadcums' => $breadcums,
                    'house_building' => $house_building,
                    'category_special' => $category_special,
                    'item' => $item,
                    'equipment' => $equipment,
                    'common_facility' => $common_facility,
                    'images_gl' => $images_gl,
                    'id' => $item->id,
                    'current_lang' => current_lang_(),
                    'images_thumb' =>$images_thumb,
                    'imagesHouse'  => $this->search_model->getImagesHouse(),
                );

                if (isset($item->size)) {
                    $size = vcp_printf($item->size, current_lang_()) . ' m&#178;';
                } else {
                    $size = '';
                }

                if (isset($item->rent)) {
                    $rent = vcp_printf($item->rent, current_lang_()) . ' USD';
                } else {
                    $rent = '';
                }
                $title = vcp_printf($item->name_jp, current_lang_()) . ' | アオザイハウジング';


                if (!isset($item->introduction)) {
                    $description = $this->config->item('description');
                } else {
                    $description = vcp_printf($item->introduction, current_lang_());
                }
                $description = $this->before($description);

                if (!isset($item->images_thumb)) {
                    $thumb = $this->config->item('image');
                } else {
                    $thumb = PATH_URL . 'static/images/detail/' . $item->images_thumb;
                }

                $seoGoogle = array(
                    'keyword' => vcp_printf($item->area, current_lang_()) . "," . vcp_printf($item->name_jp, current_lang_())
                );
                $seo = array(
                    'image' => $thumb,
                    'title' => $title,
                    'description' => "ベトナムホーチミンの賃貸不動産ならアオザイハウジングにお任せ下さい。" . vcp_printf($item->name_jp, current_lang_()),
                    'url' => PATH_URL . 'houses/detail/' . $item->id
                );

                $view = '';
                if ($this->device != 'pc') {
                    $view = '_mobile';
                }

                $this->template->write_view('content', 'FRONTEND/detail' . $view, $data);
                headerSeo($seo, $seoGoogle);
                $this->template->render();
            }
        }
    }

    public function home_list_houses() {
        $data = array(
            'items' => $this->model->getListItem(7, 0)
        );
        $this->load->view("FRONTEND/home_list_houses", $data);
    }

    public function home_list_ofices() {
        $data = array(
            'items' => $this->model->getListItemOffice(7, 0)
        );
        $this->load->view("FRONTEND/home_list_office", $data);
    }

    public function slide($items,$images_thumb) {
        $data = array(
            'items' => $items,
            'images_thumb'=>$images_thumb
        );

        $this->load->view("FRONTEND/slide", $data);
    }
    
    public function before($string)
    {
        $string = preg_replace('/<iframe.*?\/iframe>/i','', $string);
        return $string;
    }

    public function new_arrival(){
        $data = array();
        $seoGoogle = array(
            'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
        );
        $seo = array(
            'title' => 'ホーチミン市のアパート検索｜アオザイハウジング',
            'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム,アパート、オフィスなど賃貸不動産のことならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
        );
        $cur_page = isset($_GET['per_page'])?$_GET['per_page']:0;
        $sort = $this->input->post('lblSort');
        if(isset($sort)){
            $data['sort'] = $sort;
        }
        else{
            $data['sort'] = "asc";
        }
        $data['items'] = $this->model->getListHouse($this->per_page,$cur_page,$data['sort']);
        $itemLayouts = $this->search_model->getLayouts();
        $data['itemLayouts'] = $itemLayouts;
        
        $data['imagesHouse']=$this->search_model->getImagesHouse();
        $data['equipment_houses']= $this->search_model->get_equipment_houses();
        $data['common_facility_houses']= $this->search_model->get_common_facility_houses();
        $count=$this->model->getTotalItem();
        $this->load->library('pagination');
        $config['total_rows'] = $count;
        if(current_lang_()=='vn'){
            $config['base_url'] = PATH_URL . 'vn/houses/new_arrival';
        }else{
            $config['base_url'] = PATH_URL . 'houses/new_arrival';
        }
        $config['per_page'] = $this->per_page;
        // Only use for smart phone
        if (is_smartphone() == 'sp') {
            $config['num_links'] = 1;
        }
        $config['first_link'] = lang('最初');
        $config['last_link'] = lang('最後');
        $this->pagination->initialize($config);
        $data['paging']= $this->pagination;
        $data['count']=$count;
        $this->template->write_view('content', 'FRONTEND/new_arrival', $data);
        headerSeo($seo, $seoGoogle);
        $this->template->render();
    }

    public function house_detail_by_condition($id){
        $data = array();
        $seoGoogle = array(
            'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
        );
        $seo = array(
            'title' => 'ホーチミン市のアパート検索｜アオザイハウジング',
            'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム,アパート、オフィスなど賃貸不動産のことならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
        );

        if($id == 2){
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン2区の物件検索｜アオザイハウジング',
                'description' => 'ベトナムホーチミン市の2区のサービスアパート、コンドミニアム、マンションなど賃貸不動産ならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
            );
        }
        if($id == 7){
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン７区の物件検索｜アオザイハウジング',
                'description' => 'ベトナムホーチミン市の7区フーミーフンのサービスアパート、コンドミニアム、マンションなど賃貸不動産ならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
            );
        }
        $page = isset($_GET['p'])?$_GET['p']:0;
        if ($page != 0) {
            $page = $page - 1;
        }
        $cur_page = $page * $this->per_page;
        if($cur_page =="")
                $cur_page = 0;
        $sort = $this->input->get('lblSort');
        if(isset($sort)){
            $data['sort'] = $sort;
        }
        else{
            $data['sort'] = "desc";
        }
        $list_dist_2 = $this->common_model->listApartment('2', array('limit' => array($cur_page,$this->per_page)),$data['sort']);
//        $list_dist_3 = $this->common_model->listApartment('3', array('limit' => array($cur_page,$this->per_page)),$data['sort']);
        $list_dist_7 = $this->common_model->listApartment('7', array('limit' => array($cur_page,$this->per_page)),$data['sort']);
        $list_apartment_under_450_usd = $this->common_model->listApartment('under_450_usd', array('limit' => array($cur_page,$this->per_page)),$data['sort']);
        $count_list_2 = $this->common_model->countListApartment('2');
//        $count_list_3 = $this->common_model->countListApartment('3');
        $count_list_7 = $this->common_model->countListApartment('7');
        $count_list_under_450_usd = $this->common_model->countListApartment('under_450_usd');
        $data_vin_home['categories_id']= '736';
        $list_vin_home = $this->model->getCategoriesBuilding($data_vin_home,$this->per_page,$cur_page);
        $count_vin_home = $this->model->getTotalCategoriesBuilding($data_vin_home);

        $list_promotion = $this->model->getListPromotion($this->per_page,$cur_page);
        $count_promotion = $this->model->countListPromotion();

        if($id == 'promotion'){
            $data['items'] = $list_promotion;
            $count = $count_promotion;
        }
        if($id == 'vin_home'){
            $data['items'] = $list_vin_home;
            $count = $count_vin_home;
        }
        if($id == 2){
            $data['items']= $list_dist_2;
            $count = $count_list_2;
        }
//        if($id == 3){
//            $data['items']= $list_dist_3;
//            $count = $count_list_3;
//            if(current_lang_()=='vn'){
//                $base_url = PATH_URL . 'vn/houses/ホーチミン3区サービスアパート特集' ;
//            }else{
//                $base_url = PATH_URL . 'houses/ホーチミン3区サービスアパート特集' ;
//            }
//        }
        if($id ==7){
            $data['items']= $list_dist_7;
            $count = $count_list_7;
        }
        if($id == 'under_450_usd'){
            $data['items']= $list_apartment_under_450_usd;
            $count = $count_list_under_450_usd;
        }
        if($id == 1){
            $data['items'] = $this->model->getListHouse($this->per_page,$cur_page,$data['sort']);
            $count = $this->model->getTotalItem();
        }

        $label_language = '';
        if(current_lang_()=='vn'){
            $label_language = 'vn/';
        }
        $data['label_language'] = $label_language;

        $data['breadcums']= $id;
        $itemLayouts = $this->search_model->getLayouts();
        $data['itemLayouts'] = $itemLayouts;
        $data['imagesHouse']=$this->search_model->getImagesHouse();
        $data['imagesHouse']=$this->search_model->getImagesHouse();
        $data['equipment_houses']= $this->search_model->get_equipment_houses();
        $data['common_facility_houses']= $this->search_model->get_common_facility_houses();
        $this->load->library('pagination');
        $config['total_rows'] = $count;
        $config['base_url'] = reduce_double_slashes(PATH_URL . $this->uri->uri_string());
        $config['per_page'] = $this->per_page;
        // Only use for smart phone
        if (is_smartphone() == 'sp') {
            $config['num_links'] = 1;
        }
        $config['first_link'] = lang('最初');
        $config['last_link'] = lang('最後');
        $config['use_page_numbers'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        // Page
        $config['query_string_segment'] = 'p';
        $this->pagination->initialize($config);
        $data['paging']= $this->pagination;
        $data['count']=$count;
        $this->template->write_view('content', 'FRONTEND/house_detail_by_condition', $data);
        headerSeo($seo, $seoGoogle);
        $this->template->render();
    }

    public function house_detail_by_condition_all(){
        $data = array();
        $seoGoogle = array(
            'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
        );
        $seo = array(
            'title' => 'ホーチミン市のアパート検索｜アオザイハウジング',
            'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム,アパート、オフィスなど賃貸不動産のことならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
        );
        $cur_page = isset($_GET['per_page'])?$_GET['per_page']:0;
        if($cur_page =="")
            $cur_page = 0;
        $sort = $this->input->get('lblSort');
        if(isset($sort)){
            $data['sort'] = $sort;
        }
        else{
            $data['sort'] = "desc";
        }
        $data['categories_id'] = $this->input->get('catid');
        $data['catname']       = $this->input->get('catname');
        $data['breadcums']= $data['catname'];
        $itemLayouts = $this->search_model->getLayouts();
        $data['itemLayouts'] = $itemLayouts;
        $data['imagesHouse']=$this->search_model->getImagesHouse();
        $data['equipment_houses']= $this->search_model->get_equipment_houses();
        $data['common_facility_houses']= $this->search_model->get_common_facility_houses();
        if(current_lang_()=='vn'){
            $base_url = PATH_URL . 'vn/houses/house_detail_by_condition_all' ;
        }else{
            $base_url = PATH_URL . 'houses/house_detail_by_condition_all' ;
        }
        $count = $this->model->getTotalCategoriesBuilding($data);
        $this->load->library('pagination');
        $config['total_rows'] = $count;
        $config['base_url'] = $base_url;
        $config['per_page'] = $this->per_page;
        // Only use for smart phone
        if (is_smartphone() == 'sp') {
            $config['num_links'] = 1;
        }
        $config['first_link'] = lang('最初');
        $config['last_link'] = lang('最後');
        $this->pagination->initialize($config);
        $data['paging']= $this->pagination;
        $data['count']=$count;

        $data['items'] = $this->model->getCategoriesBuilding($data, $this->per_page, $cur_page);
        $this->template->write_view('content', 'FRONTEND/house_detail_by_condition_all', $data);
        headerSeo($seo, $seoGoogle);
        $this->template->render();

    }
    /* ------------------------------------ End FRONTEND -------------------------------- */
}

