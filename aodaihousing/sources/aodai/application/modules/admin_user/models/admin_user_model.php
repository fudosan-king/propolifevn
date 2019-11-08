<?php
class Admin_user_model extends MY_Model {
	private $table = 'admin_users';

	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('`username` LIKE "%'.$this->input->post('content').'%"');
		}
		if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')==''){
			$this->db->where('created >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
		}
		if($this->input->post('dateFrom')=='' && $this->input->post('dateTo')!=''){
			$this->db->where('created <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
		}
		if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')!=''){
			$this->db->where('created >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
			$this->db->where('created <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
		}
		$query = $this->db->get($this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getTotalsearchContent(){
		$this->db->select('*');
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('`user.username` LIKE "%'.$this->input->post('content').'%"');
		}
		if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')==''){
			$this->db->where('created >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
		}
		if($this->input->post('dateFrom')=='' && $this->input->post('dateTo')!=''){
			$this->db->where('created <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
		}
		if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')!=''){
			$this->db->where('created >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
			$this->db->where('created <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
		}
		$query = $this->db->get($this->table);
		
		if($query->result()){
			return count($query->result());
		}else{
			return false;
		}
	}
	
	function getDetailManagement($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get($this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function saveManagement(){
		if($this->input->post('statusAdmincp')=='on'){
			$is_active = 1;
		}else{
			$is_active = 0;
		}
		$username = $this->input->post('titleUserAdmincp');
		$password = $this->input->post('titlePassAdmincp');
		
		if($this->input->post('hiddenIdAdmincp')==0){
			// Dung de insert vao db
			$data = array(
				'username'      => $username,
				'is_active'     => $is_active,
				'password'		=> md5($password),
				'created'       => date('Y-m-d H:i:s',time()),
			);
			
			if($this->db->insert($this->table,$data)){
				return true;
			}
		}else{
			$username = $this->input->post('titleUserAdmincp');
			//'password'      => md5($this->input->post("password")),'password'      => md5($this->input->post("password")),
			$data = array(
				'username'      => $username,
				'password'		=> ($password != '')?md5($password):$password,
				'is_active'     => $is_active,
			);
			
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			
			if($this->db->update($this->table,$data)){
				return true;
			}
		}
		return false;
	}
	
	function load_menu()
	{
		$this->db->select('*');
		$this->db->where('is_admin',0);
		$query = $this->db->get('admin_modules');
		if($query->result())
		{
			return $query->result();
		}else{
			return false;
		}
	}
}