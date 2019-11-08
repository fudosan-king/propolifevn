<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estate_owners extends MX_Controller
{

    private $module = 'estate_owners';
    private $table = 'houses';
    public $per_page = 7;
    public $device = 'pc';

    function __construct()
    {
        parent::__construct();
        $this->device = mobile_template();
        $this->load->model('common/common_model');
        $this->load->model('houses/houses_model');
        $this->load->model('search/search_model');
        $this->load->model('estate_owners_model', 'model');
        $this->load->model('setting_equipment_facilities/setting_equipment_facilities_model');
        if ($this->uri->segment(1) == 'admincp') {
            //MY_Output class's nocache() method
            $this->output->nocache();

            if ($this->uri->segment(2) != 'login') {
                if (!$this->session->userdata('userInfo')) {
                    header('Location: ' . PATH_URL . 'admincp/login');
                    return false;
                }
            }
            $this->template->set_template('admin');
            $this->template->write('title', 'Admin Control Panel');
        }
    }

    /* ------------------------------------ Admin Control Panel ------------------------------------ */

    public function admincp_index()
    {
        $toolBar = array('addNew', 'edit', 'show', 'hide', 'delete');
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

    public function admincp_update($id = 0)
    {
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
        $equipments_condo = array();
        $equipments_serviced = array();
        $facilities_condo = array();
        $facilities_serviced = array();
        $resultBuilding = array();
        $equipments_condo    = $this->setting_equipment_facilities_model->getEquipmentCondo();
        $equipments_serviced = $this->setting_equipment_facilities_model->getEquipmentServiced();
        $facilities_condo    = $this->setting_equipment_facilities_model->getFacilitiesCondo();
        $facilities_serviced = $this->setting_equipment_facilities_model->getFacilitiesServiced();
        if ($id != 0) {
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
            'userInfo' => $this->model->getUserInfo($id),
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
            'building_data' => $resultBuilding,
            'building_db' => $building_db,
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
                $equipmnet_facility[] = $this->houses_model->getEquipmentsDb($id);
                $equipmnet_facility[] = $this->houses_model->getFacilitiesDbAjax($id);
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

    public function admincp_delete()
    {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $result = $this->model->getDetailManagement($id);
            $this->db->where('id', $id);
            if ($this->db->delete(PREFIX . 'houses')) {
                //Xóa hình khi Delete
                @unlink(BASEFOLDER . 'static/uploads/houses/' . $result[0]->images);
                @unlink(BASEFOLDER . 'static/uploads/houses/' . $result[0]->images_thumb);
                return true;
            }
        }
    }

    public function admincp_ajaxLoadContent()
    {
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

    public function admincp_save() {
        if ($_POST) {
            //Upload Image
            $fileName = array('images_thumb' => '');
            if ($_FILES) {
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
                if ($_FILES) {
                    foreach ($fileName as $k => $v) {
                        if (isset($_FILES['fileAdmincp']['error'][$k])) {
                            $upload_path = BASEFOLDER . 'static/uploads/houses/';
                            move_uploaded_file($tmp_name[$k], $upload_path . $fileName[$k]);
                        }
                    }
                    foreach ($fileName_gallery as $k => $v) {
                        if (isset($_FILES['fileAdmincp']['error']['images_gallery'][$k])) {
                            $upload_path = BASEFOLDER . 'static/uploads/houses/gallery/';
                            $r_up = move_uploaded_file($tmp_name[$k], $upload_path . $fileName_gallery[$k]);
                        }
                    }
                }
                //End Upload Image
                print 'success';
                exit;
            }
        }
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
        $this->db->update(PREFIX . 'houses', $data);

        $update = array(
            'status' => $status,
            'id' => $this->input->post('id'),
            'module' => $this->module
        );
        $this->load->view('BACKEND/ajax_updateStatus', $update);
    }
    public function admincp_upload() {
        $uploaddir = 'static/uploads/houses/gallery/';
        $ext = strtolower(substr($_FILES['uploadfile']['name'], -4, 4));
        $file = time() . '_' . SEO(substr($_FILES['uploadfile']['name'], 0, -5)) . $ext;
        $path_file = $uploaddir . $file;
        $id = $this->model->inserImage($file);
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_file)) {
            echo '<li><a href="#" title=""><img width="101" height="101" src="' . PATH_URL . 'static/uploads/houses/gallery/' . $file . '" alt=""></a>
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
        if ($data_id) {
            $order = 0;
            foreach ($data_id as $key => $value) {
                $data = array('order' => $order);
                $this->model->update_img_sort($value, $data);
                $order++;
            }
        }
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

}