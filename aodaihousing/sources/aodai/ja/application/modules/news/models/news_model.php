<?php
class News_model extends MY_Model {
	private $table = 'news';

	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('(`title` LIKE "%'.$this->input->post('content').'%" OR `content` = "%'.$this->input->post('content').'%")');
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
			$this->db->where('(`title` LIKE "%'.$this->input->post('content').'%" OR `content` = "%'.$this->input->post('content').'%")');
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
        $publish_to = $this->input->post('vcp_publish_to');
        
        if($publish_to == '') {
            $publish_to = date('Y-m-d H:i:s',strtotime('2030-12-30'));
        }
		if($this->input->post('hiddenIdAdmincp')==0){
			$data = array(
				'title'=> json_encode($this->input->post('titleAdmincp')),
				'description'=> $this->input->post('descAdmincp'),
				'content'=> json_encode($this->input->post('contentAdmincp')),
				'images'=> $fileName['images'],
				'images_thumb'=> $fileName['images_thumb'],
				'status'=> $status,
				'created'=> date('Y-m-d H:i:s',time()),
                'publish_from'=> date('Y-m-d H:i:s',strtotime($this->input->post('vcp_publish_from'))),
                'publish_to'=> $publish_to
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
				@unlink(BASEFOLDER.'static/uploads/news/'.$result[0]->images);
			}
			
			if($fileName['images_thumb']==''){
				$fileName['images_thumb'] = $result[0]->images_thumb;
			}else{
				@unlink(BASEFOLDER.'static/uploads/news/'.$result[0]->images_thumb);
			}
			
			$data = array(
				'title'=> json_encode($this->input->post('titleAdmincp')),
				'description'=> $this->input->post('descAdmincp'),
				'content'=> json_encode($this->input->post('contentAdmincp')),
				'images'=> $fileName['images'],
				'images_thumb'=> $fileName['images_thumb'],
				'status'=> $status,
                'publish_from'=> date('Y-m-d H:i:s',strtotime($this->input->post('vcp_publish_from'))),
                'publish_to'=> $publish_to
			);
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update(PREFIX.$this->table,$data)){
				return true;
			}
		}
		return false;
	}
    
    function getlistNews(){
		$this->db->select('
			id,
			images,
			title,
			content,
			created
		');
		$this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $this->db->limit(2, 0);

		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()) {
			return $query->result();
		} else {
			return false;
		}
	}
    
    function getDetail($id){
		$this->db->select('*');
		$this->db->where('id',$id);
        $this->db->where('status',1);
		$query = $this->db->get(PREFIX.$this->table);
		if($query->result()){
			return $query->row();
		}else{
			return false;
		}
	}
    
    function prevRecord($id) {
        $sql = "
            SELECT * 
            FROM (`cli_news`) 
            WHERE id = (SELECT MIN(id) FROM (`cli_news`) where id > $id AND status = 1) AND status = 1"; 
        $query = $this->db->query($sql);
        if($query->result()){
			return $query->row();
		}else{
			return false;
		}
    } 
    function nextRecord($id) {
        $sql = "
            SELECT * 
            FROM (`cli_news`) 
            WHERE id = (SELECT MAX(id) FROM (`cli_news`) where id < $id AND status = 1) AND status = 1";
        $query = $this->db->query($sql);
        if($query->result()){
			return $query->row();
		}else{
			return false;
		}
    } 
}