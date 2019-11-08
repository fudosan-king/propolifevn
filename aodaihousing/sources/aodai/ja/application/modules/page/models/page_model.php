<?php
class Page_model extends MY_Model {
	private $table = 'page';
    private $table_facilities_db = 'common_facility_house';
    private $table_equipments_house_db = 'equipments_house';
    private $table_areas_house_db = 'area_house';
    private $table_category = 'category';
    private $table_category_house_db = 'cate_house';
    private $table_building_house_db = 'building_house';
    private $table_image = 'house_images';
    private $table_layout_house_db = 'house_layouts';
    private $table_tags = 'tags';
    private $table_tags_db = 'tags_db';
    private $table_building = 'building';

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
    function getFacilitiesDb($id_house) {
        $this->db->select('*');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_facilities_db);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getEquipmentsDb($id_house) {
        $this->db->select('*');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_equipments_house_db);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getAreasDb($id_house) {
        $this->db->select('*');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_areas_house_db);

        if ($query->result()) {
            return $query->row();
        } else {
            return false;
        }
    }
    function getCategoryDb($id_house) {
        $this->db->select('*');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_category_house_db);

        if ($query->result()) {
            $query->free_result();
            return $query->result();
        } else {
            return false;
        }
    }
    function getBuildingDb($id_house) {
        $this->db->select('*');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_building_house_db);

        if ($query->result()) {
            $query->free_result();
            return $query->result();
        } else {
            return false;
        }
    }
    function getImg($id) {
        $sql = "
            SELECT *
            FROM
            cli_house_images
            WHERE
            cli_house_images.house_id = $id
            ORDER BY cli_house_images.order ASC
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getTagsDB($id, $type) {
        $this->db->select('*');
        $this->db->where('office_house_id', $id);
        $this->db->where('type', $type);
        $query = $this->db->get(PREFIX . $this->table_tags_db);
        // echo $this->db->last_query();exit;
        if ($query->result()) {
            $query->free_result();
            return $query->result();
        } else {
            return false;
        }
    }
    function getBuilding(){
        $this->db->select('*');
        $query = $this->db->get(PREFIX . $this->table_building);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getFacilities($type = 0) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', $type);
        $query = $this->db->get('cli_common_facilities');

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getCategory($type = 0, $type_p = '') {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', $type);
        if ($type_p != '') {
            $this->db->where('type_p', $type_p);
        }

        $query = $this->db->get(PREFIX . $this->table_category);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getLayout() {
        $this->db->select('*');
        $query = $this->db->get(PREFIX . $this->table_layout_house_db);

        if ($query->result()) {
            $query->free_result();
            return $query->result();
        } else {
            return false;
        }
    }
    function getTagsList() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get(PREFIX . $this->table_tags);
        if ($query->result()) {
            return $query->result();
        } else {
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
                'tag_h1'=> $this->input->post('tag_h1'),
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
                'tag_h1'=> $this->input->post('tag_h1'),
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

    function getAllStaff(){
		$this->db->select('content');
        $this->db->where('status', 1);
        $this->db->where('id', 242);
		
		$query = $this->db->get(PREFIX.$this->table);
		
		$data = array(
			'image' => array(),
			'info_first' => array(),
			'info_second' => array()
		);
		
		if($query->result()){
			$res = $query->result();
			if ($res) {
                $html = '';
                if ($res[0]->content) {
                    $html = vcp_printf($res[0]->content, current_lang_());
                }
				
				// Get all images
				preg_match_all( '@src="([^"]+)"@' , $html, $match);
				$images = array_pop($match);
				if ($images && is_array($images)) {
					foreach ($images as $key => $image) {
						$img = explode('/', $image);
						$last_element_image = count($img) - 1;
						$real_image = $img[$last_element_image];
						$images[$key] = $real_image;
					}
				}
				$data['images'] = $images;

				// Get all info first
				preg_match_all( '@<h4>([^</h4>]+)@' , $html, $match);
				$info_first = array_pop($match);
				$data['info_first'] = $info_first;

				// Get all info second
				preg_match_all( '@<div class="prof-detail">([^</div>]+)@' , $html, $match);
				$info_second = array_pop($match);
				$data['info_second'] = $info_second;
			}
		}

		return $data;
	}

	function getLayouts(){
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get('cli_house_layouts');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getAreas($type = 0,$no = true) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', $type);
        $this->db->or_where('type', 0);
        if ($no != true) {
            $this->db->or_where('type', 0);
        }
        $this->db->order_by("name", "asc");
        $query = $this->db->get('cli_areas');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getAreasEstateOwner($type = 0, $no = true) {
        $this->db->select('*');
        $this->db->where_in('is_estate_owners',1);
        $this->db->order_by('position_sort_estate_owners','ASC');
        $query = $this->db->get('cli_areas');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getEquipments(){
	    $this->db->select('*');
	    $this->db->where('status',1);
	    $query = $this->db->get('cli_equipments');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getFacility(){
        $this->db->select('name,id');
        $this->db->where('status',1);
        $query = $this->db->get('cli_common_facilities');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getFacilityFolowHouse(){
        $this->db->select('name,id');
        $this->db->where('status',1);
        $this->db->where('type',0);
        $query = $this->db->get('cli_common_facilities');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * Insert or Update information use for Estate Owners
     */
    function insertEstateOwners($data = array()) {
        // Insert houses
	    $data_houses = array(
            'deposit'       =>$data['deposits'],
            'name_jp'       =>$data['name_jp'],
	        'name_en'       =>$data['name_en'],
	        'estate_owners' =>1,
	        'status'        =>0,
	        'rent'          => $data['rent'],
            'house_layout_id'=>$data['house_layout_id'],
            'size'          =>$data['size'],
            'introduction'  =>$data['introduction'],
            'images_thumb'  => isset($data['house_images'][0]) ? $data['house_images'][0] : '',
            'type'          =>$data['type'],
            'created'       =>date('Y-m-d H:i:s',time()),
            'update'        =>date('Y-m-d H:i:s',time())
        );
	    $this->db->insert('cli_houses',$data_houses);
        $house_id = $this->db->insert_id();

        // Insert user info
	    $data_user_info = array(
	        'update'    =>date('Y-m-d H:i:s',time()),
	        'created'   =>date('Y-m_d H:i:s',time()),
            'username'  =>$data['userName'],
            'email'     =>$data['email'],
            'phone'     =>$data['phone'],
            'address'   =>$data['address'],
            'status'    =>1
        );
	    $this->db->insert('cli_user_info',$data_user_info);
	    $user_info_id = $this->db->insert_id();

	    // Insert user house
	    $data_user_house = array(
            'bathroom'      =>$data['bathroom'],
            'reach'         =>$data['reach'],
            'house_id'      =>$house_id,
            'user_info_id'  =>$user_info_id
        );
	    $this->db->insert('cli_user_house',$data_user_house);

        // Insert area house
        $data_area_house = array(
            'house_id'  =>$house_id,
            'area_id'   =>$data['area_id'],
            'created'   =>date('Y-m-d H:i:s',time())

        );
        $this->db->insert('cli_area_house',$data_area_house);

        // Insert facility
        if($data['facility']) {
            foreach ($data['facility'] as $facility) {
                $data_equipment = array(
                    'house_id'          =>$house_id,
                    'common_facility_id'=>$facility,
                    'created'           =>date('Y-m-d H:i:s',time())
                );
                $this->db->insert('cli_common_facility_house',$data_equipment);
            }
        }

        // Insert equipment
        if($data['equipment']) {
            foreach ($data['equipment'] as $equipment) {
                $data_equipment = array(
                    'house_id'      =>$house_id,
                    'equipment_id'  =>$equipment,
                    'created'       =>date('Y-m-d H:i:s',time())
                );
                $this->db->insert('cli_equipments_house',$data_equipment);
            }
        }

        // Insert house images
        if($data['house_images']) {
            foreach ($data['house_images'] as $image) {
                $data_image_house = array(
                    'house_id'  =>$house_id,
                    'name_image'=>$image,
                    'created'   =>date('Y-m-d H:i:s',time())
                );
                $this->db->insert('cli_house_images', $data_image_house);
            }
        }
        return $house_id;
    }

    function getInformationArea(){
        $array=array('5','11','2','25','17','13','10');
        $this->db->select('id,information');
        $this->db->where_in('id',$array);
        $query = $this->db->get('cli_areas');

        if ($query->result()) {
            $query->free_result();
            return $query->result();
        } else {
            return false;
        }
    }
}