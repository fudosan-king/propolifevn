<?php

class Setting_email_system_model extends MY_Model {
    private $table = 'setting_email_system';
    private $module = 'setting_email_system';
        
	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('`name` LIKE "%'.$this->input->post('content').'%" or `email` LIKE "%'.$this->input->post('content').'%"');
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
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getTotalsearchContent(){
		$this->db->select('*');
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('`name` LIKE "%'.$this->input->post('content').'%" or `email` LIKE "%'.$this->input->post('content').'%"');
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
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return count($query->result());
		}else{
			return false;
		}
	}
	
	function getDetailManagement($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get(PREFIX.$this->table);

		if ($query->result()) {
			return $query->result();
		} else {
			return false;
		}
	}

	function getListEmail($type = 'to') {
		if (!array_key_exists($type, fn_type_email())) {
			return array();
		}

		$this->db->select('name, email');
		$this->db->where('type', $type);
		$query = $this->db->get(PREFIX.$this->table);

		$result = array();
		if ($query->result()) {
			foreach ($query->result() as $item) {
				$result[$item->email] = array(
					'name' => $item->name,
					'email' => $item->email,
				);
			}
		}
		return $result;
	}

	function checkFinalRecord(){
		$query = $this->db->query('SELECT * FROM ' . PREFIX . $this->table . ' WHERE type = "to"');
		return $query->num_rows();
	}

	function checkExistsEmail($email) {
	    $this->db->select('*');
		$this->db->where('email', $email);
		$this->db->limit(1);
		$query = $this->db->get(PREFIX.$this->table);

		if ($query->result()) {
			$result = $query->result();
			return isset($result[0]) ? $result[0] : 0;
		} else {
			return false;
		}
	}
	
	function saveManagement($fileName=''){
		$current_time = date('Y-m-d H:i:s', time());
		$email        = trim($this->input->post('email'));
		$name         = trim($this->input->post('name'));
		$type         = strtolower(trim($this->input->post('type')));

		$data = array(
			'modified' => $current_time,
			'type'     => $type,
			'email'    => $email,
			'name'     => $name,
			'primary'  => 0
		);

		if ($type == 'to') {
			$this->db->update(PREFIX.$this->table, array('primary' => 0));
			$data['primary'] = 1;
		}

		if ($this->input->post('hiddenIdAdmincp') == 0) {
			$data['created'] = $current_time;
			if($this->db->insert(PREFIX.$this->table, $data)){
				return true;
			}
		} else {
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if ($this->db->update(PREFIX.$this->table, $data)) {
				return true;
			}
		}
		return false;
	}
}