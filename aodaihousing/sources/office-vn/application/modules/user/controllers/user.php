<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MX_Controller {

    private $table = 'admin_users';
    private $module = 'user';

    function __construct() {
        parent::__construct();
        $this->load->model($this->module . '_model', 'model');
        $this->load->helper('text');
        $this->load->helper('file');
        if(!checkPermission()) {
            header('Location: ' . PATH_URL . 'admincp');
        }
        date_default_timezone_set('UTC');
        if ($this->uri->segment(1) == 'admincp') {
            if ($this->uri->segment(2) != 'login') {
                if (!$this->session->userdata('userInfo')) {
                    header('Location: ' . PATH_URL . 'admincp/login');
                    return false;
                }
            }
            $this->template->set_template('admin');
			$this->template->write('title','Admin Control Panel');
        }
    }

    /* ------------------------------------ Admin Control Panel ------------------------------------ */

    public function admincp_index() {
        $toolBar = array('addNew', 'show', 'hide', 'delete');
        getToolbar($this->module, $toolBar);
        
        $default_func = 'created';
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
        $toolBar = array('back','save');
        getToolbar($this->module, $toolBar);
        
        $result[0] = array();
        if ($id != 0) {
            $result = $this->model->getDetailManagement($id);
        }

        $data = array(
            'result' => $result[0],
            'module' => $this->module,
            'id' => $id,
        );
        $this->template->write_view('content', 'BACKEND/ajax_editContent', $data);
        $this->template->render();
    }

    public function admincp_save() {
        if ($_POST) {
            if ($this->model->saveManagement()) {
                print 'success';
                exit;
            }
        }
    }

    public function admincp_delete() {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $result = $this->model->getDetailManagement($id);
            $this->db->where('id', $id);
            if ($this->db->delete($this->table)) {
                return true;
            }
        }
    }

    public function admincp_ajaxLoadContent() {
        $this->load->library('AdminPagination');
        $config['total_rows'] = $this->db->count_all_results($this->table);
        $config['per_page'] = $this->input->post('per_page');
        $config['num_links'] = 3;
        $config['func_ajax'] = 'searchContent';
        $config['start'] = $this->input->post('start');
        $this->adminpagination->initialize($config);

        $result = $this->model->getsearchContent($config['per_page'], $this->input->post('start'));
        $data = array(
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
        $this->db->update($this->table, $data);

        $update = array(
            'status' => $status,
            'id' => $this->input->post('id'),
            'module' => $this->module
        );
        $this->load->view('BACKEND/ajax_updateStatus', $update);
    }

    /* ------------------------------------ End Admin Control Panel -------------------------------- */



    /* -------------------------------------- FrontEnd -------------------------------------- */

}