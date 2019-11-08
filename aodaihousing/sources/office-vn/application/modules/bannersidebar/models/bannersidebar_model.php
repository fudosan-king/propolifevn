<?php
class Bannersidebar_model extends MY_Model {
	private $table = 'banner_sidebar';

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
		if($this->input->post('statusAdmincp')=='on'){
			$status = 1;
		}else{
			$status = 0;
		}

		if($this->input->post('hiddenIdAdmincp')==0){
			$data = array(
				'title'=> $this->input->post('titleAdmincp'),
				'link'=> $this->input->post('linkAdmincp'),
                'order'=> $this->input->post('order'),
				'images'=> $fileName['images'],
				'status'=> $status,
				'created'=> date('Y-m-d H:i:s',time()),
                'publish_from'=> date('Y-m-d H:i:s',strtotime($this->input->post('vcp_publish_from'))),
                'publish_to'=> date('Y-m-d H:i:s',strtotime($this->input->post('vcp_publish_to')))
			);
			if($this->db->insert(PREFIX.$this->table,$data)){
				return true;
			}
		}else{
			//Xử lý xóa hình khi update thay đổi hình
			$result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));
			if($fileName['images']==''){
				$fileName['images'] = $result[0]->images;
			}else{
				@unlink(BASEFOLDER.'static/uploads/bannersidebar/'.$result[0]->images);
			}
			
			
			$data = array(
				'title'=> $this->input->post('titleAdmincp'),
                'link'=> $this->input->post('linkAdmincp'),
                'order'=> $this->input->post('order'),
				'images'=> $fileName['images'],
				'status'=> $status,
                'publish_from'=> date('Y-m-d H:i:s',strtotime($this->input->post('vcp_publish_from'))),
                'publish_to'=> date('Y-m-d H:i:s',strtotime($this->input->post('vcp_publish_to')))
			);
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update(PREFIX.$this->table,$data)){
				return true;
			}
		}
		return false;
	}
    
    function getlistBanner(){
		$this->db->select('*');
		$this->db->where('status',1);
        $this->db->order_by('order', 'DESC');
       
        $this->db->where('publish_from <= "'.date('Y-m-d H:i:s', mktime()).'"');
        $this->db->where('publish_to >= "'.date('Y-m-d H:i:s', mktime()).'"');
		$query = $this->db->get(PREFIX.$this->table);
        //echo $this->db->last_query();
		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
}