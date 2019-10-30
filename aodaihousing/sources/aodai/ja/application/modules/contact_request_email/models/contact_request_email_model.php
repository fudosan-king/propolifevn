<?php
class contact_request_email_model extends MY_Model {
	private $table = 'contact_request_email';

	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('(
				`client_company_name` LIKE "%'.$this->input->post('content').'%" OR 
				`client_phone` LIKE "%'.$this->input->post('content').'%" OR 
				`client_email` LIKE "%'.$this->input->post('content').'%" OR 
				`client_name` LIKE "%'.$this->input->post('content').'%"
			)');
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
			$this->db->where('(
				`client_company_name` LIKE "%'.$this->input->post('content').'%" OR 
				`client_phone` LIKE "%'.$this->input->post('content').'%" OR 
				`client_email` LIKE "%'.$this->input->post('content').'%" OR 
				`client_name` LIKE "%'.$this->input->post('content').'%"
			)');
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
	
	function hideCatDetail($cat_id = 0)
	{
	   return true;
		
	}

	function getDataProperty_type(){
	    $this->db->select('*');
	    $this->db->where('status',1);
        $query = $this->db->get(PREFIX.'property_type');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }

    function getDataFloor_plans(){
        $this->db->select('*');
        $this->db->where('status',1);
        $query = $this->db->get(PREFIX.'floor_plans');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }

	function getproperty_type($id){
	    $this->db->select('*');
	    $this->db->join('cli_property_type','cli_property_type.id = cli_cre_pt.property_type_id');
	    $this->db->where('contact_request_email_id',$id);
	    $query = $this->db->get(PREFIX.'cre_pt');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }

    function getfloorplans($id){
        $this->db->select('*');
        $this->db->join('cli_floor_plans','cli_floor_plans.id = cli_cre_fp.floor_plans_id');
        $this->db->where('contact_request_email_id',$id);
        $query = $this->db->get(PREFIX.'cre_fp');

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }

	function saveManagement($data){
	    // insert cli_contact_request_mail
        $this->db->insert(PREFIX.$this->table, $data);
        $contact_request_email_id = $this->db->insert_id();

        // insert cli_cre_pt
        $data_property_type = $this->input->post('property_type');
        if ($data_property_type) {
            foreach ($data_property_type as $item) {
                $data_select = array(
                    'contact_request_email_id' => $contact_request_email_id,
                    'property_type_id'       => $item,
                    'created' => date('Y-m-d H:i:s', time()),
                    'updated' => date('Y-m-d H:i:s', time()),
                );
                $this->db->insert(PREFIX . 'cre_pt', $data_select);
            }
        }

        //insert cli_cre_ft
        $data_floor_plans = $this->input->post('floor_plans');
        if($data_floor_plans) {
            foreach ($data_floor_plans as $item) {
                $data_select = array(
                  'contact_request_email_id' => $contact_request_email_id,
                  'floor_plans_id'           => $item,
                  'created' => date('Y-m-d H:i:s', time()),
                  'updated' => date('Y-m-d H:i:s', time()),
                );
                $this->db->insert(PREFIX . 'cre_fp', $data_select);
            }
        }
        return $contact_request_email_id;
	}
}