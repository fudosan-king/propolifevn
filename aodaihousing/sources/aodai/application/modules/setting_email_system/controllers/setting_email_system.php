<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_email_system extends MX_Controller {
        private $table = 'setting_email_system';
        private $module = 'setting_email_system';
	
        function __construct(){
		parent::__construct();
		$this->load->model('setting_email_system_model','model');
		if($this->uri->segment(1)=='admincp'){
			if($this->uri->segment(2)!='login'){
				if(!$this->session->userdata('userInfo')){
					header('Location: '.PATH_URL.'admincp/login');
					return false;
				}
			}
			$this->template->set_template('admin');
		}
	}
	
	/*------------------------------------ Admin Control Panel ------------------------------------*/
	public function admincp_index(){
		$toolBar = array('addNew', 'delete');
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
		if($id!=0){
			$result = $this->model->getDetailManagement($id);
		}

		$data = array(
			'result'=>$result[0],
			'module'=>$this->module,
			'id'=>$id
		);
		$this->template->write_view('content','BACKEND/ajax_editContent',$data);
		$this->template->render();
	}

	public function admincp_save(){
		if($_POST){
			// Check email exists in db
			$resultEmail = $this->model->checkExistsEmail($this->input->post('email'));
			$id = $this->input->post('hiddenIdAdmincp');
			if ($resultEmail && $resultEmail->email && $resultEmail->id != $id) {
				print 'duplicate_email';
				exit;
			}
			// Did not change final record of type email TO (Case: change type from "TO" -> "CC" or "BCC")
			$result = $this->model->getDetailManagement($id);
			if ($id != 0 && $result[0]->type == 'to' && $this->input->post('type') != 'to' && $this->model->checkFinalRecord() == 1) {
				print 'not_change_final_record';
				exit;
			}
			if($this->model->saveManagement()){
				print 'success';
				exit;
			}
		}
	}
	
	public function admincp_delete(){
		if($this->input->post('id')){
			$id = $this->input->post('id');
			$result = $this->model->getDetailManagement($id);
			$isDelete = false;
			if ($result[0]->type == 'to') {
				// Did not delete final record of type email TO
				if ($this->model->checkFinalRecord() == 1) {
					print 'must_at_least_two_record';
					exit;
				} else {
					$isDelete = true;
				}
			} else {
				$isDelete = true;
			}
			if ($isDelete) {
				$this->db->where('id', $id);
				if ($result[0]->type == 'to') {
					// Only use for case type with value equal "to" and primary with value equal 0
					$this->db->where('primary', 0);
				}
				if($this->db->delete(PREFIX.$this->table)){
					return true;
				}
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
	/*------------------------------------ End Admin Control Panel --------------------------------*/
}