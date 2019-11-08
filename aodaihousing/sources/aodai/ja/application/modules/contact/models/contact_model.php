<?php
class Contact_model extends MY_Model {
	private $table = 'contact';

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

	function getNamebuilding($id){
	    $this->db->select('name');
        $this->db->where('id',$id);
        $query = $this->db->get('cli_building');

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
		
		if($this->input->post('homeAdmincp')=='on'){
			$home = 1;
		}else{
			$home = 0;
		}
		
		if($this->input->post('hiddenIdAdmincp')==0){
			$data = array(
				'name'=> $this->input->post('nameAdmincp'),
				'icon' => $fileName,
				'status'=> $status,
				'is_home'=> $home,
				'description'		=> $this->input->post('desAdmincp'),
                'order'		=> $this->input->post('orderAdmincp'),
				'keyword'		=> $this->input->post('keyAdmincp'),
				'created'=> date('Y-m-d H:i:s',time()),
				'modified'=> date('Y-m-d H:i:s',time())
			);
			if($this->db->insert(PREFIX.$this->table,$data)){
				return true;
			}
		}else{
			$result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));
			
			if($fileName==''){
				$fileName = $result[0]->icon;
			}else{
				@unlink(BASEFOLDER.'static/uploads/category/'.$result[0]->icon);
			}
			
			$data = array(
				'name'=> $this->input->post('nameAdmincp'),
				'icon' => $fileName,
				'status'=> $status,
				'is_home'=> $home,
				'description'		=> $this->input->post('desAdmincp'),
                'order'		=> $this->input->post('orderAdmincp'),
				'keyword'		=> $this->input->post('keyAdmincp'),
				'modified'=> date('Y-m-d H:i:s',time())
			);
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update(PREFIX.$this->table,$data)){
				return true;
			}
		}
		return false;
	}
	
	function hideCatDetail($cat_id = 0)
	{
	   return true;
		
	}
}