<?php
class Offices_model extends MY_Model {
	private $table = 'offices';
    private $table_common_facilities = 'common_facilities';
    private $table_facilities_db = 'common_facility_office';
    private $table_equipments_office_db = 'equipments_office';
    private $table_equipments = 'equipments';
    private $table_areas = 'areas';
    private $table_areas_office_db = 'area_office';
    private $table_category = 'category';
    private $table_category_office_db = 'cate_office';
    private $table_image = 'office_images';
    
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
            'status' => ''
        );
        $data_test = array();
        
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
            'introduction' => '',
            'other_notice' => '',
            'electric_bill'=> '',
            'drink_water_bill'=>'',
            'water_bill'=>'',
            'phone_bill'=>'',
            'closing_time'=>'',
            'bringing_furniture'=>'',
            'comment'=>'',
            'license'=>'',
            'cleaning' => '',
            'internet'=> '',
            'premium_nhk' => '',
            'rent_notice'=> '',
            'gas_bill'=> ''
        );
        
        foreach($data_field as $key=> $value) {
            $data[$key] = $this->input->post($key);
            
            if($key == 'month_rent'){
                $data_test[] = $this->input->post($key) . ' USD/月';
            }elseif($key == 'size') {
                $data_test[] = $this->input->post($key) . 'm2';
            }else{
                $data_test[] = $this->input->post($key);
            }
            
        }
        $publish_to = $this->input->post('vcp_publish_to');
       
		if($this->input->post('hiddenIdAdmincp')==0){

            $data['created'] = date('Y-m-d H:i:s',time());
            $data['images_thumb'] = $fileName['images_thumb'];
            $data['images_gallery'] = json_encode($fileName_gallery);
            
			if($this->db->insert(PREFIX.$this->table,$data)){
                
                $id_house = $this->db->insert_id();
                /*========save gallery==============*/
    			$data_gl = $this->input->post('gl');
                if(!empty($data_gl)){
                    $data_img = array();
                    foreach($data_gl as $gl) {
                        $data_img['office_id'] = $id_house;
                        $this->db->where('id', $gl);
                        $this->db->update(PREFIX.$this->table_image, $data_img);
                    }
                }
                /********save common_facilities*********/
                
                $data_common_facilities = array(
                    'office_id'=>$id_house,
                    'common_facility_id'=>$this->input->post('common_facilities'),
                    'created'=>date('Y-m-d H:i:s',time()),
                    'modified'=>date('Y-m-d H:i:s',time())
                );
                $this->db->insert(PREFIX.$this->table_facilities_db,$data_common_facilities);
                
                /********save equipments*********/
                $data_select = array(
                    'office_id'=>$id_house,
                    'equipment_id'=>$this->input->post('equipments'),
                    'created'=>date('Y-m-d H:i:s',time()),
                    'modified'=>date('Y-m-d H:i:s',time())
                );
                $this->db->where('office_id',$id_house);
                $this->db->insert(PREFIX.$this->table_equipments_office_db,$data_select);
                
                /********save areas*********/
                $data_select = array(
                    'office_id'=>$id_house,
                    'area_id'=>$this->input->post('areas'),
                    'created'=>date('Y-m-d H:i:s',time()),
                    'modified'=>date('Y-m-d H:i:s',time())
                );
                $this->db->where('office_id',$id_house);
                $this->db->insert(PREFIX.$this->table_areas_office_db,$data_select);
                
                /********save category*********/
                $categories = $this->input->post('category_main');
                if(!empty($categories)) {
                    foreach($categories as $item) {
                        $data_select = array(
                            'office_id'=>$id_house,
                            'cate_id'=>$item,
                            'modified'=>date('Y-m-d H:i:s',time()),
                            'created'=>date('Y-m-d H:i:s',time()),
                        );
                        
                        $this->db->insert(PREFIX.$this->table_category_office_db,$data_select);
                    }
                }
              
                $categories = $this->input->post('category_special');
                if(!empty($categories)) {
                    foreach($categories as $item) {
                        $data_select = array(
                            'office_id'=>$id_house,
                            'cate_id'=>$item,
                            'modified'=>date('Y-m-d H:i:s',time()),
                            'created'=>date('Y-m-d H:i:s',time()),
                        );
                        
                        $this->db->insert(PREFIX.$this->table_category_office_db,$data_select);
                    }
                }
                
                /********save Equipments*********/
                $cat = $this->input->post('equipment');
                if(!empty($cat)) {
                    foreach($cat as $item) {
                        $data_select = array(
                            'office_id'=>$id_house,
                            'equipment_id'=>$item,
                            'modified'=>date('Y-m-d H:i:s',time()),
                            'created'=>date('Y-m-d H:i:s',time()),
                        );
                        
                        $this->db->insert(PREFIX.$this->table_equipments_office_db,$data_select);
                    }
                }
                
                /********save Facilities*********/
                $cat = $this->input->post('facilities');
                if(!empty($cat)) {
                    foreach($cat as $item) {
                        $data_select = array(
                            'office_id'=>$id_house,
                            'common_facility_id'=>$item,
                            'modified'=>date('Y-m-d H:i:s',time()),
                            'created'=>date('Y-m-d H:i:s',time()),
                        );
                        
                        $this->db->insert(PREFIX.$this->table_facilities_db,$data_select);
                    }
                }
                /*=====================Search======================*/
                $this->insertDBTmp($id_house, $data_test);
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
            
            $id_office = $this->input->post('hiddenIdAdmincp');
            /*========save gallery==============*/
    			$data_gl = $this->input->post('gl');
                if(!empty($data_gl)){
                    $data_img = array();
                    foreach($data_gl as $gl) {
                        $data_img['office_id'] = $id_office;
                        $this->db->where('id', $gl);
                        $this->db->update(PREFIX.$this->table_image, $data_img);
                    }
                }
            
                        
			$data['images_thumb'] = $fileName['images_thumb'];
            $data['images_gallery'] = json_encode($fileName_gallery);
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update(PREFIX.$this->table,$data)){                
                
                /********save areas*********/
                $data_select = array(
                    'office_id'=>$id_office,
                    'area_id'=>$this->input->post('areas'),
                    'modified'=>date('Y-m-d H:i:s',time())
                );
                $this->db->where('office_id',$id_office);
                $this->db->delete(PREFIX.$this->table_areas_office_db);
                $this->db->insert(PREFIX.$this->table_areas_office_db,$data_select);
                
                
                /********save category_main*********/
                $categories = $this->input->post('category_main');
                $this->db->where('office_id',$id_office);
                $this->db->where('type',0);
                $this->db->delete(PREFIX.$this->table_category_office_db);
                if(!empty($categories)) {
                    
                    foreach($categories as $item) {
                        $data_select = array(
                            'office_id'=>$id_office,
                            'cate_id'=>$item,
                            'modified'=>date('Y-m-d H:i:s',time()),
                            'type'=>0
                        );
                        
                        $this->db->insert(PREFIX.$this->table_category_office_db,$data_select);
                    }
                }
              
                
                $categories = $this->input->post('category_special');
                $this->db->where('office_id',$id_office);
                $this->db->where('type',1);
                $this->db->delete(PREFIX.$this->table_category_office_db);

                if(!empty($categories)) {
                    
                    foreach($categories as $item) {
                        $data_select = array(
                            'office_id'=>$id_office,
                            'cate_id'=>$item,
                            'modified'=>date('Y-m-d H:i:s',time()),
                            'type'=>1
                        );
                        
                        $this->db->insert(PREFIX.$this->table_category_office_db,$data_select);
                    }
                }
                
                /********save Equipments*********/
                $cat = $this->input->post('equipment');
                $this->db->where('office_id',$id_office);
                $this->db->delete(PREFIX.$this->table_equipments_office_db);
                if(!empty($cat)) {
                    
                    foreach($cat as $item) {
                        $data_select = array(
                            'office_id'=>$id_office,
                            'equipment_id'=>$item,
                            'modified'=>date('Y-m-d H:i:s',time())
                        );
                        
                        $this->db->insert(PREFIX.$this->table_equipments_office_db,$data_select);
                    }
                }
                /********save Facilities*********/
                $cat = $this->input->post('facilities');
                $this->db->where('office_id',$id_office);
                $this->db->delete(PREFIX.$this->table_facilities_db);
                if(!empty($cat)) {
                    
                    foreach($cat as $item) {
                        $data_select = array(
                            'office_id'=>$id_office,
                            'common_facility_id'=>$item,
                            'modified'=>date('Y-m-d H:i:s',time())
                        );
                        
                        $this->db->insert(PREFIX.$this->table_facilities_db,$data_select);
                    }
                }
                
                /*=====================Search======================*/
                $this->insertDBTmp($id_office, $data_test);
				return true;
			}
		}
		return false;
	}
    
    function insertDBTmp($id_office, $data_test){
         if($this->input->post('areas') != '') {
            $tmp  = $this->getAreaID($this->input->post('areas'));
            if(!empty($tmp)){
                $data_test[] = $tmp->name;
            }
        }
        if($this->input->post('category_main') != '') {
            $tmp  = $this->getCategoryID($this->input->post('category_main'));
            if(!empty($tmp)){
                foreach($tmp as $k=>$v){
                    $data_test[] = $v->name;
                }
            }
        }
        if($this->input->post('category_special') != '') {
            $tmp  = $this->getCategoryID($this->input->post('category_special'));
            if(!empty($tmp)){
                foreach($tmp as $k=>$v){
                    $data_test[] = $v->name;
                }
            }
        }
        if($this->input->post('equipment') != '') {
            $tmp  = $this->getEquipmentID($this->input->post('equipment'));
            if(!empty($tmp)){
                foreach($tmp as $k=>$v){
                    $data_test[] = $v->name;
                }
            }
        }
        if($this->input->post('facilities') != '') {
            $tmp  = $this->getFacilitieID($this->input->post('facilities'));
            if(!empty($tmp)){
                foreach($tmp as $k=>$v){
                    $data_test[] = $v->name;
                }
            }
        }
        $this->db->where('offices_id',$id_office);
        $this->db->delete(PREFIX.'offices_db');
        $data_select = array(
            'offices_id'=>$id_office,
            'content'=>implode(',', array_unique($data_test))
        );
        
        $this->db->insert(PREFIX.'offices_db',$data_select);
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
		$sql = "
                SELECT
                cli_offices.*, cli_areas.`name`
                FROM
                cli_offices
                INNER JOIN cli_area_office ON cli_offices.id = cli_area_office.office_id
                INNER JOIN cli_areas ON cli_area_office.area_id = cli_areas.id
                WHERE
                cli_offices.id = $id

        ";
        $query = $this->db->query($sql);
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
			return $query->result();
		}else{
			return false;
		}
    }
    function getEquipmentsDb($id_office){
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
		$query = $this->db->get(PREFIX.$this->table_equipments_office_db);

		if($query->result()){
			return $query->result();
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
    
    function getCategoryDb($id_house){
        $this->db->select('*');
        $this->db->where('office_id', $id_house);
		$query = $this->db->get(PREFIX.$this->table_category_office_db);
		if($query->result()){
		  $query->free_result();
			return $query->result();
		}else{
			return false;
		}
    }
    
    function getCategory($type = 0, $type_p = ''){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where('type', $type);
        if($type_p != '') {
            $this->db->where('type_p', $type_p);
        }
		$query = $this->db->get(PREFIX.$this->table_category);
		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    function get_equipment_detail($id) {
        $sql = "
            SELECT *
            FROM
            cli_equipments_office
            INNER JOIN cli_equipments ON cli_equipments_office.equipment_id = cli_equipments.id
            WHERE
            cli_equipments.`status` = 1 AND
            cli_equipments_office.office_id = $id
        ";
        $query = $this->db->query($sql);
        if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    function inserImage($file){
        $data_select = array(
            'name_image'=>$file,
            'created'=>date('Y-m-d H:i:s',time())
        );
        $this->db->insert(PREFIX.$this->table_image,$data_select);
        return $this->db->insert_id();
    }
    
    function getImg($id){
        $sql = "
            SELECT *
            FROM
            cli_office_images
            WHERE
            cli_office_images.office_id = $id
        ";
        $query = $this->db->query($sql);
        if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    function getGl($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get(PREFIX.$this->table_image);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
    function get_common_facility_detail($id){
        
        $sql = "
            SELECT
            cli_common_facility_office.id,
            cli_common_facilities.`name`
            FROM
            cli_common_facility_office
            INNER JOIN cli_common_facilities ON cli_common_facility_office.common_facility_id = cli_common_facilities.id
            WHERE
            cli_common_facility_office.office_id = $id


        ";
        $query = $this->db->query($sql);
        if($query->result()){
			return $query->result();
		}else{
			return false;
		}
        
    }
    
    /***********************search***********************/
    
    function getAreaID($id){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where('id', $id);
		$query = $this->db->get(PREFIX.$this->table_areas);

		if($query->result()){
  
			return $query->row();
		}else{
			return false;
		}
    }
    function getCategoryID($id){
        $this->db->select('name');
		$this->db->where('status', 1);
        $this->db->where_in('id', $id);
        
		$query = $this->db->get(PREFIX.$this->table_category);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    function getEquipmentID($id){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where_in('id', $id);
		$query = $this->db->get(PREFIX.$this->table_equipments);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    function getFacilitieID($id){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where_in('id', $id);
		$query = $this->db->get(PREFIX.$this->table_common_facilities);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    function getLayoutID($id){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where_in('id', $id);
		$query = $this->db->get(PREFIX.$this->table_layout_office_db);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
}