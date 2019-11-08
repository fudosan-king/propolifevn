<?php
class Offices_model extends MY_Model {
	private $table = 'offices';
    private $table_common_facilities = 'common_facilities';
    private $table_facilities_db = 'common_facility_office';
    private $table_equipments_office_db = 'equipments_office';
    private $table_equipments = 'equipments';
    private $table_areas = 'areas';
    private $table_areas_office_db = 'area_office';
    
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
	
	function saveManagement($fileName='', $fileName_gallery = ''){
        $data = array(
            'water_bill' => '',
            'phone_bill' => '',
            'cleaning' => '',
            'internet'=> '',
            'premium_nhk' => '',
            'closing_time' => '',
            'bringing_furniture' => '',
            'other_notice' => '',
            'status' => ''
        );
        
        foreach($data as $key=> $value) {
            if($this->input->post($key)=='on'){
    			$data[$key] = 1;
    		}else{
    			$data[$key] = 0;
    		}
        }
        $data_field = array(
        
            'name_jp' => '',
            'name_en' => '',
            'images_thumb' => '',
            'month_rent' => '',
            'size_rent' => '',
            'size' => '',
            'floors' => '',
            'receipt_type' => '',
            'deposit' => '',
            'deposit_return' => '',
            'rent_condition' => '',
            'payment_method' => '',
            'contract' => '',
            'move_out' => '',
            'recent_residence' => '',
            'consumables_replenishment' => '',
            'key' => '',
            'security' => '',
            'pet' => '',
            'introduction' => ''
        );
        foreach($data_field as $key=> $value) {
            $data[$key] = $this->input->post($key);
        }
        $publish_to = $this->input->post('vcp_publish_to');
       
		if($this->input->post('hiddenIdAdmincp')==0){

            $data['created'] = date('Y-m-d H:i:s',time());
            $data['images_thumb'] = $fileName['images_thumb'];
            $data['images_gallery'] = json_encode($fileName_gallery);
            
            
			if($this->db->insert(PREFIX.$this->table,$data)){
                /********save common_facilities*********/
                $id_office = $this->db->insert_id();
                $data_common_facilities = array(
                    'office_id'=>$id_office,
                    'common_facility_id'=>$this->input->post('common_facilities'),
                    'created'=>date('Y-m-d H:i:s',time()),
                    'modified'=>date('Y-m-d H:i:s',time())
                );
                $this->db->insert(PREFIX.$this->table_facilities_db,$data_common_facilities);
                
				return true;
			}
		}else{
			//Xử lý xóa hình khi update thay đổi hình
			$result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));
			
			if($fileName['images_thumb']==''){
				$fileName['images_thumb'] = $result[0]->images_thumb;
			}else{
				@unlink(BASEFOLDER.'static/uploads/offices/'.$result[0]->images_thumb);
			}
			
            
                        
			$data['images_thumb'] = $fileName['images_thumb'];
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update(PREFIX.$this->table,$data)){
			     
                /********save common_facilities*********/
                $id_office = $this->input->post('hiddenIdAdmincp');
                
                $data_common_facilities = array(
                    'office_id'=>$id_office,
                    'common_facility_id'=>$this->input->post('common_facilities'),
                    'modified'=>date('Y-m-d H:i:s',time())
                );
                $this->db->where('office_id',$id_office);
                $this->db->delete(PREFIX.$this->table_facilities_db);
                $this->db->insert(PREFIX.$this->table_facilities_db,$data_common_facilities);
                
                /********save common_facilities*********/
                $data_select = array(
                    'office_id'=>$id_office,
                    'equipment_id'=>$this->input->post('equipments'),
                    'modified'=>date('Y-m-d H:i:s',time())
                );
                $this->db->where('office_id',$id_office);
                $this->db->delete(PREFIX.$this->table_equipments_office_db);
                $this->db->insert(PREFIX.$this->table_equipments_office_db,$data_select);
                
                /********save common_facilities*********/
                $data_select = array(
                    'office_id'=>$id_office,
                    'area_id'=>$this->input->post('areas'),
                    'modified'=>date('Y-m-d H:i:s',time())
                );
                $this->db->where('office_id',$id_office);
                $this->db->delete(PREFIX.$this->table_areas_office_db);
                $this->db->insert(PREFIX.$this->table_areas_office_db,$data_select);
                
				return true;
			}
		}
		return false;
	}
    
    function getlistNews(){
		$this->db->select('*');
		$this->db->where('status',1);
        $this->db->limit(10,0);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
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
            WHERE id = (SELECT MIN(id) FROM (`cli_news`) where id > $id)";
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
            WHERE id = (SELECT MAX(id) FROM (`cli_news`) where id < $id)";
        $query = $this->db->query($sql);
        if($query->result()){
			return $query->row();
		}else{
			return false;
		}
    } 
    
    function getTotalItem(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return count($query->result());
		}else{
			return false;
		}
	}
    function getListItem($per_page, $cur_page){
		$this->db->select('*');
		$this->db->where('status', 1);
        $this->db->limit($per_page, $cur_page);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
    
    function getFacilities($type = 0){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where('type', $type);
		$query = $this->db->get(PREFIX.$this->table_common_facilities);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    function getFacilitiesDb($id_office){
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
		$query = $this->db->get(PREFIX.$this->table_facilities_db);

		if($query->result()){
			return $query->row();
		}else{
			return false;
		}
    }
    function getEquipmentsDb($id_office){
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
		$query = $this->db->get(PREFIX.$this->table_equipments_office_db);

		if($query->result()){
			return $query->row();
		}else{
			return false;
		}
    }
    
    function getEquipments($type = 0){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where('type', $type);
		$query = $this->db->get(PREFIX.$this->table_equipments);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    function getAreasDb($id_office){
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
		$query = $this->db->get(PREFIX.$this->table_areas_office_db);

		if($query->result()){
			return $query->row();
		}else{
			return false;
		}
    }
    
    function getAreas($type = 0){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where('type', $type);
        $this->db->or_where('type', 0);
		$query = $this->db->get(PREFIX.$this->table_areas);

		if($query->result()){
  
			return $query->result();
		}else{
			return false;
		}
    }
    
}