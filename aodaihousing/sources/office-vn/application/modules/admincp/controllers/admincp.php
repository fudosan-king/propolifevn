<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admincp extends MX_Controller {
	
	function __construct(){
		parent::__construct();
		
		if($this->uri->segment(2)!='login'){
			if(!$this->session->userdata('userInfo')){
				//echo "1";
				//print $this->session->userdata('userInfo');
				
				header('Location: '.PATH_URL.'admincp/login');
				return false;
			}
		}
		$this->load->model('admincp_model','model');
		
		$this->template->set_template('admin');
		$this->template->write('title','Admin Control Panel');
	}
	
	function index(){
		$data['module'] = 'admincp';
		$this->template->write_view('content','index',$data);
		$this->template->render();
	}
	
	function login(){
		if(!empty($_POST)){
			if(md5($this->input->post('pass'))==$this->model->checkLogin($this->input->post('user'))){
				$user_id = $this->model->getIdUser($this->input->post('user'));
				$this->session->set_userdata('userInfo',$this->input->post('user'));
                $this->session->set_userdata('type', $user_id[0]->type);
				print 1;
			}else{
				print 0;
			}
		}else{
			$this->load->view('BACKEND/login');
		}
	}
	
	function logout(){
		$this->session->unset_userdata('userInfo');
		header('Location: '.PATH_URL.'admincp/login');
	}
	
	function update_profile(){
		if(!empty($_POST)){
			if(md5($this->input->post('oldpassAdmincp'))==$this->model->checkLogin($this->session->userdata('userInfo'))){
				$data = array(
					'username'=> $this->session->userdata('userInfo'),
					'password'=> md5($this->input->post('newpassAdmincp')),
				);
				
				$this->db->where('username', $this->session->userdata('userInfo'));
				if($this->db->update('admin_users',$data)){
					print 'success_update_profile';
					exit;
				}
			}else{
				print 'error_update_profile';
				exit;
			}
		}else{
			$this->template->write_view('content','update_profile');
			$this->template->render();
		}
	}
	
	/******** DYNAMIC PER **********/
	private function _fillChildPerList(&$parent_list,$user_id = 0,$group_id = 0) //,$group_id = 0 ,$group_id
	{
		if(!empty($parent_list) && !empty($user_id) && !empty($group_id))
		{
			for($i=0;$i<count($parent_list);$i++)
			{
				$result = $this->model->_getChildPer($parent_list[$i]->id,$user_id,$group_id);
				if(!empty($result))
				{
					$parent_list[$i]->child_list = $this->model->_getChildPer($parent_list[$i]->id,$user_id,$group_id);
					
				}
			}
		}
	}
}