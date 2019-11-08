<?php
class Area_model extends MY_Model {
	private $table = 'areas';

	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('`name` LIKE "%'.$this->input->post('content').'%"');
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
			$this->db->where('`name` LIKE "%'.$this->input->post('content').'%"');
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
		$this->db->where('id',$id);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	function getAllIDArea(){
		$this->db->select('id');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	function saveManagement($fileName=''){
		if($this->input->post('statusAdmincp')=='on'){
			$status = 1;
		}else{
			$status = 0;
		}
		
		$is_house = 0;
		$is_office = 0;
		if ($this->input->post('type') == '1') {
			$is_house = 1;
		} else if ($this->input->post('type') == '3') {
			$is_office = 1;
		} else {
			$is_house = 1;
			$is_office = 1;
		}
		
		if($this->input->post('hiddenIdAdmincp')==0){
			$data = array(
				'information' => json_encode($this->input->post('information')),
				'name'        => json_encode($this->input->post('nameAdmincp')),
				'status'      => $status,
				'created'     => date('Y-m-d H:i:s',time()),
				'modified'    => date('Y-m-d H:i:s',time()),
				'type'        => $this->input->post('type'),
				'is_house'	  => $is_house,
				'is_office'	  => $is_office
			);

			if ($is_house) {
				$max_number = $this->db->select('*')->order_by('position_sort_house','desc')->limit(1)->get(PREFIX.$this->table)->row('position_sort_house');
				$data['position_sort_house'] = $max_number + 1;
			}

			if ($is_office) {
				$max_number = $this->db->select('*')->order_by('position_sort_office','desc')->limit(1)->get(PREFIX.$this->table)->row('position_sort_office');
				$data['position_sort_office'] = $max_number + 1;
			}

			if($this->db->insert(PREFIX.$this->table, $data)){
				return true;
			}
		}else{
			$result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));
			
			$data = array(
				'information' => json_encode($this->input->post('information')),
				'name'        => json_encode($this->input->post('nameAdmincp')),
				'status'      => $status,
				'modified'    => date('Y-m-d H:i:s',time()),
				'type'        => $this->input->post('type'),
				'is_house'	  => $is_house,
				'is_office'	  => $is_office
			);

			if ($this->input->post('type') == '1') {
				if ($result[0]->type != $this->input->post('type')) {
					// Change from both or office to house
					$max_number = $this->db->select('*')->order_by('position_sort_house','desc')->limit(1)->get(PREFIX.$this->table)->row('position_sort_house');
					$data['position_sort_house'] = $max_number + 1;
				}
			} else if ($this->input->post('type') == '3') {
				if ($result[0]->type != $this->input->post('type')) {
					// Change from both or house to office
					$max_number = $this->db->select('*')->order_by('position_sort_office','desc')->limit(1)->get(PREFIX.$this->table)->row('position_sort_office');
					$data['position_sort_office'] = $max_number + 1;
				}
			} else {
				if ($result[0]->type != '0') {
					// Change from house or office to both
					$max_number = $this->db->select('*')->order_by('position_sort_office','desc')->limit(1)->get(PREFIX.$this->table)->row('position_sort_office');
					$data['position_sort_office'] = $max_number + 1;

					$max_number = $this->db->select('*')->order_by('position_sort_house','desc')->limit(1)->get(PREFIX.$this->table)->row('position_sort_house');
					$data['position_sort_house'] = $max_number + 1;
				}
			}

			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update(PREFIX.$this->table,$data)){
				return true;
			}
		}
		return false;
	}
	
	function hideCatDetail($cat_id = 0) {
	   return true;
	}
	
	function getAllArea() {
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}
}