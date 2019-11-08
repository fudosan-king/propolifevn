<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_user extends MX_Controller {

	private $module = 'admin_user';
	private $table = 'admin_users';
	function __construct(){
		parent::__construct();
		$this->load->model($this->module.'_model','model');
		if($this->uri->segment(1)=='admincp'){
			if($this->uri->segment(2)!='login'){
				if(!$this->session->userdata('userInfo')){
					header('Location: '.PATH_URL.'admincp/login');
					return false;
				}
			}
			
			$data_menu['data_menu'] = $this->model->load_menu();
		
			$this->template->set_template('admin');
			$this->template->write_view('menu','BACKEND/menu',$data_menu);
			$this->template->write('title','Admin Control Panel');
		}
	}
	/*------------------------------------ Admin Control Panel ------------------------------------*/
	public function admincp_index(){
		if(check_permission(VIEW,$this->module) == false){
			header('Location: '.PATH_URL.'admincp/admin_error/');
		}
		
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
		if(check_permission(EDIT,$this->module) == false){
			header('Location: '.PATH_URL.'admincp/admin_error/');
		}
		
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
		if(check_permission(CREATE,$this->module) == false){
			header('Location: '.PATH_URL.'admincp/admin_error/');
		}
		
		if($_POST){		
			if($this->model->saveManagement()){
				print 'success';
				exit;
			}
		}
	}
	
	public function admincp_delete(){
		if(check_permission(DELETE,$this->module) == false){
			header('Location: '.PATH_URL.'admincp/admin_error/');
		}
		
		if($this->input->post('id')){
			$id = $this->input->post('id');
			$result = $this->model->getDetailManagement($id);
			
			$this->db->where('id',$id);
			if($this->db->delete(PREFIX.$this->table)){
				//Xóa hình khi Delete
				//@unlink(BASEFOLDER.'static/uploads/news/small/'.$result[0]->image);
				
				$this->model->delete_directory($result[0]->title);
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
			'result'		=> $result,
			'per_page'		=> $this->input->post('per_page'),
			'start'			=> $this->input->post('start'),
			'module'		=> $this->module
		);
		
		$this->session->set_userdata('start',$this->input->post('start'));
		$this->load->view('BACKEND/ajax_loadContent',$data);
	}
	
	public function admincp_ajaxUpdateStatus(){
		if(check_permission("Show",$this->module) == false){	
			$data = array('module' => $this->module);
			$this->template->write_view('content','BACKEND/error',$data);
			$this->template->render();
		}
		
		if($this->input->post('status')==0){
			$status = 1;
		}else{
			$status = 0;
		}
		$data = array(
			'is_active'=>$status
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data);
		
		$update = array(
			'status'=>$status,
			'id'=>$this->input->post('id'),
			'module'=>$this->module
		);
		$this->load->view('BACKEND/ajax_updateStatus',$update);
	}
	
	
	/*------------------------------------ End Admin Control Panel --------------------------------*/
	
	
	/*------------------------------------ FRONTEND ------------------------------------*/
	
	/*------------------------------------ End FRONTEND --------------------------------*/
}