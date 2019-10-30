<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_estate_owners extends MX_Controller
{

    private $module = 'user_estate_owners';
    private $table = 'user_info';
    public $per_page = 7;
    public $device = 'pc';

    function __construct()
    {
        parent::__construct();
        $this->device = mobile_template();
        $this->load->model('common/common_model');
        $this->load->model('user_estate_owners_model', 'model');
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

    public function admincp_update($id = 0)
    {
        $toolBar = array('save');
        getToolbar($this->module, $toolBar);
        $result[0] = array();
        $resultBuilding = array();
        if ($id != 0) {
            $userInfo = $this->model->getUserInfo($id);
            $result = $this->model->getDetailManagement($id);
        }
        $data = array(
            'result' => $result[0],
            'module' => $this->module,
            'id' => $id
        );
        $this->template->write_view('content', 'BACKEND/ajax_editContent', $data);
        $this->template->render();
    }

    public function admincp_delete()
    {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $result = $this->model->getDetailManagement($id);
            $this->db->where('id', $id);
            if ($this->db->delete(PREFIX . 'user_info')) {
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
        $a = $this->input->post('content');
        $result = $this->model->getsearchContent($config['per_page'], $this->input->post('start'));
        $data = array(
            'result' => $result,
            'per_page' => $this->input->post('per_page'),
            'start' => $this->input->post('start'),
            'module' => $this->module
        );
        $this->session->set_userdata('start', $this->input->post('start'));
        $this->load->view('BACKEND/ajax_loadContent',$data);
    }

    public function admincp_save() {
        $data =array(
            'username'=>json_encode($this->input->post('txtUserName')),
            'email'   =>$this->input->post('txtEmail'),
            'phone'   =>$this->input->post('txtPhone'),
            'address' =>json_encode($this->input->post('txtAddress'))
        );
        $response = $this->model->saveManagement($data);
        print 'success';
        exit;
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
        $this->db->update(PREFIX . 'user_info', $data);

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
                $username[$id]=$this->input->post($id.'_username_jp');
                $email[$id]=  $this->input->post($id.'_email_jp');
                $phone[$id]=  $this->input->post($id.'_phones_jp');
                $address[$id]=  $this->input->post($id.'_address_jp');

            }
            $this->model->updateListHouse($username,$email,$phone,$address);

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