<?php
class BannerTopText_model extends MY_Model {
	private $table = 'banner_top_text';

	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('(`title` LIKE "%'.$this->input->post('content').'%")');
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
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return count($query->result());
		}else{
			return false;
		}
	}
	
	function getDetailManagement($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function saveManagement($fileName=''){
		$id = $this->input->post('idHidden');
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get(PREFIX.$this->table);

		if ($this->input->post('statusAdmincp')=='on') {
			$status = 1;
		} else {
			$status = 0;
		}
		
		$data = array(
			'title'             => json_encode($this->input->post('titleAdmincp')),
			'description_one'   => json_encode($this->input->post('description_one')),
			'description_two'   => json_encode($this->input->post('description_two')),
			'description_three' => json_encode($this->input->post('description_three')),
			'description_four'  => json_encode($this->input->post('description_four')),
			'status'            => $status,
			'created'           => date('Y-m-d H:i:s', time()),
			'modified'			=> date('Y-m-d H:i:s', time()),
		);
		
		if ($query->num_rows > 0) {
			// Update data by id and modified
			$data['modified'] = date('Y-m-d H:i:s', time());
			$this->db->where('id', $id);
			if ($this->db->update(PREFIX . $this->table, $data)) {
				return true;
			}
		} else {
			// insert new data
			if ($this->db->insert(PREFIX . $this->table, $data)) {
				return true;
			}
		}
		
		return false;
	}
    
    function getBanner(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->limit(1);
		$this->db->order_by('modified', 'desc');
		$query = $this->db->get(PREFIX.$this->table);
		if($query->result()){
			return $query->result();
		}else{
			return array();
		}
	}

	function hideCatDetail($cat_id = 0) {
	   return true;
	}
}