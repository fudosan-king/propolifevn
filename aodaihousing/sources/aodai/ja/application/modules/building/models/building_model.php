<?php

class Building_model extends MY_Model {

	private $table = 'cli_building';
	private $table_areas = 'areas';
	private $table_buiding_house = 'building_house';
	private $table_house = 'houses';
	private $table_area_house = 'area_house';
	/**
	 * Process data
	 */
	public function processData($data = array()) {
		$current_time = date('Y-m-d H:i:s', time());
		// Only use for new data
		if ($data['isNew']) {
        	$data['created'] = $current_time;
			unset($data['isNew']);
		}

		// Only use for insert or update data
		if ($data['isUpdate']) {
			$data['modified'] = $current_time;
			unset($data['isUpdate']);
		}

		// Only use for delete data
		if ($data['isDelete']) {
        	$data['deleted'] = $current_time;
        	$data['status'] = 0;
			unset($data['isDelete']);
		}

        return $data;
	}

	/**
	 * Check exists data
	 */
	public function checkExistsData($data = array()) {
		if ($data) {
			$this->db->select('*');
			$data['status'] = 1;
	        $this->db->where($data);
	        $this->db->limit(1);
	        $this->db->order_by('created', 'desc');
	        $query = $this->db->get($this->table);

	        if ($query->result()) {
	        	$response = $query->result();
	            return isset($response[0]->id) ? $response[0]->id : false;
	        }
       	}
        return false;
	}

	/**
	 * Insert or update data
	 */
	public function upsert($data = array()) {
		if ($data) {
			$id = $this->checkExistsData(array(
				'type' => $data['type']
			));
			if ($id) {
				// Update
				$data['isUpdate'] = true;
				$data = $this->processData($data);
				$where = array('id' => $id);
				$this->update($data, $where);
			} else {
				// Insert
				$data['isNew'] = true;
				$data = $this->processData($data);
				$this->insert($data);
			}
		}
	}
	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
        $this->db->order_by("modified",'desc');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);


            $this->db->where('(`name` LIKE "%' . $content . '%" or id LIKE "%' . $content . '%")');
        }

        // search with key word title
        if ($this->input->post('title') != '') {
            $content = json_encode($this->input->post('title'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $content = $this->removeCommaAndDot($content);
            $this->db->where('(
                REPLACE (name, ",", " ") LIKE "%' . $content . '%" )');
        }

        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') == '') {
            $this->db->where('created >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('created <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('created >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('created <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('price_from') != '' && is_numeric($this->input->post('price_from'))) {

            $this->db->where('rent >=' . $this->input->post('price_from'));
        }
        if ($this->input->post('price_to') != '' && is_numeric($this->input->post('price_to'))) {
            $this->db->where('rent <=' . $this->input->post('price_to'));
        }
		$query = $this->db->get($this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getTotalsearchContent(){
		$this->db->select('*');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $this->db->where('(`name` LIKE "%' . $content . '%" or id LIKE "%' . $content . '%")');
        }

        // search with key word title
        if ($this->input->post('title') != '') {
            $content = json_encode($this->input->post('title'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $content = $this->removeCommaAndDot($content);
            $this->db->where('(
                REPLACE (name, ",", " ") LIKE "%' . $content . '%")');
        }

        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') == '') {
            $this->db->where('created >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('created <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('created >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('created <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('price_from') != '' && is_numeric($this->input->post('price_from'))) {
            $this->db->where('rent >=' . $this->input->post('price_from'));

        }

        if ($this->input->post('price_to') != '' && is_numeric($this->input->post('price_to'))) {
            $this->db->where('rent <=' . $this->input->post('price_to'));
        }
		
		$query = $this->db->get($this->table);

		if($query->result()){
			return count($query->result());
		}else{
			return false;
		}
	}
	function getAreasHouse($type = 0) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('is_house', 1);
        $query = $this->db->get(PREFIX . $this->table_areas);

        if ($query->result()) {

            return $query->result();
        } else {
            return false;
        }
    }

    function getAllIDBuilding(){
    	$this->db->select('id');
        $this->db->where('status', 1);

        $query = $this->db->get($this->table);
        if ($query->result()) {

            return $query->result();
        } else {
            return false;
        }
    }

    function getAreaManagement($id_house){
    	$this->db->select('cli_areas.name');
    	$this->db->join(PREFIX . $this->table_area_house, 'cli_area_house.area_id = cli_areas.id');
        $this->db->where('status', 1);
        $this->db->where('cli_area_house.house_id', $id_house);

        $query = $this->db->get(PREFIX . $this->table_areas);
        if ($query->result()) {
        	$result = $query->result();
            $result_data = array();
            if ($result[0]) {
            	$result_data = $result[0];
            }
            return $result_data;
        } else {
            return array();
        }
    }

    function getIDHouseByBuilding($id,$type){
    	$this->db->select('house_id');
    	$this->db->join(PREFIX . $this->table_house, 'cli_houses.id = cli_building_house.house_id');
        $this->db->where('building_id', $id);
//        $this->db->where('cli_houses.type', $type);
        $query = $this->db->get(PREFIX . $this->table_buiding_house);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }
    function getDetailHouse($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->where('status',1);
		$this->db->order_by('update','desc');
        $query = $this->db->get(PREFIX .$this->table_house);

		if ($query->result()) {
        	$result = $query->result();
        	$result_data = array();
        	if ($result[0]) {
        		$result_data = $result[0];
        	}
            return $result_data;
        } else {
            return array();
        }
	}

	function getHousesDetail($id=array(),$per_page,$cur_page){
        $this->db->distinct();
        $this->db->select(PREFIX . 'areas.name as area');
        $this->db->select(PREFIX . 'areas.status as status_area');
        $this->db->select(PREFIX . 'houses.*');
        $this->db->where(PREFIX . 'houses.status', 1);
        $this->db->join(PREFIX . 'area_house', PREFIX . 'houses.id = ' . PREFIX . 'area_house.house_id', 'left');
        $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_house.area_id', 'left');
        $this->db->where_in(PREFIX .'houses.id',$id);
        $this->db->order_by('update','desc');
        $this->db->limit($per_page,$cur_page);
        $query = $this->db->get(PREFIX .$this->table_house);
        if($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

	function getCountDetailHouse($id)
    {
        $this->db->select('*');
        $this->db->where_in('id', $id);
        $this->db->where('status',1);
        $query = $query = $this->db->count_all_results(PREFIX . $this->table_house);
        if ($query) {
            return $query;
        } else {
            return 0;
        }
    }

    function getDetailByHouseIds($ids = array(),$per_page,$cur_page){
        if (!$ids || !is_array($ids)) {
            return array();
        }
        $this->db->select('*');
        $this->db->where('status',1);
        $this->db->where_in('id', $ids);
        $this->db->order_by('update','desc');
        $this->db->limit($per_page,$cur_page);

        $query = $this->db->get(PREFIX .$this->table_house);
        if($query->result()) {
            return $query->result();
        }else{
            return array();
        }
    }

    function getCountDetailByHouseIds($ids = array())
    {
        if (!$ids || !is_array($ids)) {
            return array();
        }
        $this->db->select('*');
        $this->db->where('status',1);
        $this->db->where_in('id', $ids);
        $query = $this->db->count_all_results(PREFIX . $this->table_house);
        if ($query) {
            return $query;
        } else {
            return 0;
        }
    }

    function get_equipment_detail($ids = array())
    {
        if(!$ids || !is_array($ids)){
            return array();
        }
        $this->db->select('*');
        $this->db->join('cli_equipments','cli_equipments_house.equipment_id = cli_equipments.id');
        $this->db->where_in('house_id',$ids);
        $this->db->order_by('house_id','asc');
        $query = $this->db->get('cli_equipments_house');
        if($query->result()) {
            return $query->result();
        }else{
            return array();
        }
    }

    function get_common_facility_detail($ids = array())
    {
        if(!$ids || !is_array($ids)){
            return array();
        }
        $this->db->select('*');
        $this->db->join('cli_common_facilities','cli_common_facility_house.common_facility_id = cli_common_facilities.id');
        $this->db->where_in('house_id',$ids);
        $this->db->order_by('house_id','asc');
        $query = $this->db->get('cli_common_facility_house');
        if($query->result()) {
            return $query->result();
        }else{
            return array();
        }
    }

    function getDetailManagement($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get($this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}

	/**
	 * Update data
	 */
	public function update($data = array(), $where = array()) {
		if ($data && $where) {
			$this->db->where($where);
			$this->db->update($this->table, $data);
		}
	}

	/**
	 * Insert data
	 */
	public function insert($data = array()) {
		if ($data) {
			$this->db->set($data);
			$this->db->insert($this->table);
		}
	}

	/**
	 * Delete by id
	 */
	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	/**
	 * Delete by data
	 */
	public function deleteByData($data = array()) {
		if ($data) {
			$id = $this->checkExistsData(array(
				'type' => $data['type'],
				'type_id' => $data['type_id']
			));
			if ($id) {
				$data['isDelete'] = true;
				$data = $this->processData($data);
				$where = array('id' => $id);
				$this->update($data, $where);
			}
		}
	}

	/**
	 * Get data by condition
	 */
	public function getDataByCondition($condition = array(),$per_page = 2, $cur_page = 0) {
		$data = array();
		if ($condition) {
        	$this->db->distinct();
        	$this->db->select('cli_building.name, cli_building.id,cli_building.image,cli_building.description,cli_building.district,seo_description,seo_title,seo_keyword,IFNULL(cli_building.order, CAST(10000 AS SIGNED) ) as `order`');
			// $this->db->join('cli_building_house','cli_building_house.building_id = cli_building.id');
	        // $this->db->join('cli_houses','cli_houses.id = cli_building_house.house_id');
			$this->db->where($condition);
			$this->db->order_by('order','asc');
            $this->db->order_by('modified', 'desc');
            $this->db->limit($per_page, $cur_page);
			$query = $this->db->get($this->table);
//            $query = $this->db->query($query,1000);

            if ($query->result()) {
				$data = $query->result();
			}
		}
		return $data;
	}

	public function getCountData($condition = array()){
		$data = array();
		if ($condition) {
			$this->db->select('count(id) as count');
			// $this->db->join('cli_building_house','cli_building_house.building_id = cli_building.id');
	        // $this->db->join('cli_houses','cli_houses.id = cli_building_house.house_id');
			$this->db->where($condition);
			$data = $this->db->count_all_results($this->table);
		}
		return $data;
	}

	/**
	 * Get data houses of building
	 */
	public function getDataHousesOfBuilding($id) {
		$this->db->select('cli_houses.*, cli_house_layouts.name as house_layouts, cli_areas.name as area');
        $this->db->from('cli_houses');
        $this->db->join('cli_area_house', 'cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_house_layouts', 'cli_houses.house_layout_id = cli_house_layouts.id');
        $this->db->join('cli_areas', 'cli_area_house.area_id = cli_areas.id');
        $this->db->where('cli_houses.id', $id);
        $this->db->where('cli_houses.status', 1);
        $this->db->order_by('update', 'desc');
        $this->db->order_by('created', 'desc');
        $query = $this->db->get();

        if ($query->result()) {
        	$response = $query->result();
            return isset($response[0]) ? $response[0] : false;
        } else {
            return false;
        }
	}

	/**
	 * Get data offices of building
	 */
	public function getDataOfficesOfBuilding($id) {
		$this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get(PREFIX . 'offices');

        if ($query->result()) {
        	$response = $query->result();
            return isset($response[0]) ? $response[0] : false;
        } else {
            return false;
        }
	}
	/**
	 * Get list building by area id
	 */
	public function getBuildingFolowDistrict($district, $options = array()){
		$this->db->distinct();
        $this->db->select('cli_building.name, cli_building.id,cli_building.image,cli_building.description,cli_building.district,cli_building.order_in_map');
        $this->db->where('cli_building.district', $district);
        $this->db->where('cli_building.status',1);
        if ($options['order_in_map']) {
            $this->db->order_by('order_in_map', 'asc');
            $this->db->order_by('modified', 'desc');
        }
        $query = $this->db->get($this->table);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
	}
	public function getCountAll($feature, $type, $condition_more = array()){
		if ($feature == 1) {
			$condition = array(
				'feature_popular' => 1,
				'cli_building.status' => 1,
				// 'cli_houses.type' => $type
			);
		}
		elseif ($feature == 2) {
			$condition = array(
				'feature_house_ex' => 1,
				'cli_building.status' => 1,
				// 'cli_houses.type' => $type
			);
		}
		elseif ($feature == 3) {
			$condition = array(
				'feature_near_bus' => 1,
				'cli_building.status' => 1,
				// 'cli_houses.type' => $type
			);
		}

		if ($condition_more && is_array($condition_more)) {
			$condition = array_merge($condition, $condition_more);
		}

		$count = $this->getCountData($condition);
		return $count;
	}

	public function getDataBuilding($feature, $per_page, $cur_page, $type, $condition_more = array()) {
		$data = array();
		if ($feature == 1) {
			$condition = array(
				'feature_popular' => 1,
				'cli_building.status' => 1,
				//'cli_houses.type' => $type
			);
		}
		elseif ($feature == 2) {
			$condition = array(
				'feature_house_ex' => 1,
				'cli_building.status' => 1,
				//'cli_houses.type' => $type
			);
		}
		elseif ($feature == 3) {
			$condition = array(
				'feature_near_bus' => 1,
				'cli_building.status' => 1,
				//'cli_houses.type' => $type
			);
		}

		if ($condition_more && is_array($condition_more)) {
			$condition = array_merge($condition, $condition_more);
		}

		$response = $this->getDataByCondition($condition, $per_page, $cur_page);
		
		return $response;
	}
	
	function saveManagement($fileName=''){
		if($this->input->post('statusAdmincp')=='on'){
			$status = 1;
		}else{
			$status = 0;
		}
		if($this->input->post('popularAdmincp')=='on'){
			$popular = 1;
		}else{
			$popular = 0;
		}
		if($this->input->post('houseExAdmincp')=='on'){
			$house_ex = 1;
		}else{
			$house_ex = 0;
		}
		if($this->input->post('nearBusAdmincp')=='on'){
			$near_bus = 1;
		}else{
			$near_bus = 0;
		}

		if($this->input->post('hiddenIdAdmincp')==0){
			$data = array(
                'image'                 => $fileName['images'],
                'address'               => json_encode($this->input->post('addressAdmincp')),
                'name'                  => json_encode($this->input->post('buildingNameAdmincp')),
                'feature_popular'       => $popular,
                'feature_house_ex'      => $house_ex,
                'feature_near_bus'      => $near_bus,
                'building_type'         => $this->input->post('buildingType'),
                'order'                 => $this->input->post('order'),
                'district'              => $this->input->post('dictrict'),
                'description'           => $this->input->post('description'),
                'created'               => date('Y-m-d H:i:s',time()),
                'modified'              => date('Y-m-d H:i:s',time()),
                'modified_order_in_map' => date('Y-m-d H:i:s',time()),
                'seo_description'       => $this->input->post('seo_description'),
                'seo_title'             => $this->input->post('seo_title'),
                'seo_keyword'           => $this->input->post('seo_keyword'),
			);
			if($this->db->insert($this->table,$data)){
				return true;
			}
		}else{
			$result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));
			$data   = array(
                'address'           =>json_encode($this->input->post('addressAdmincp')),
                'name'              => json_encode($this->input->post('buildingNameAdmincp')),
				'feature_popular'   =>  $popular,
				'feature_house_ex'  => $house_ex,
				'feature_near_bus'  => $near_bus,
                'building_type'     => $this->input->post('buildingType'),
                'order'             => $this->input->post('order'),
                'district'          => $this->input->post('dictrict'),
				'description'       => $this->input->post('description'),
				'modified'          => date('Y-m-d H:i:s',time()),
				'status'            => $status,
                'seo_description'       => $this->input->post('seo_description'),
                'seo_title'             => $this->input->post('seo_title'),
                'seo_keyword'           => $this->input->post('seo_keyword'),
            );

            if ($fileName['images'] == '') {
                $fileName['images'] = $result[0]->image;
            } else {
                @unlink(BASEFOLDER . 'static/uploads/category/' . $result[0]->image);
            }
            $data['image'] = $fileName['images'];
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update($this->table,$data)){
				return true;
			}
		}
		return false;
	}

    function hideCatDetail($cat_id = 0)
    {
        return true;

    }

    function getAreasHouseOffice()
    {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('is_building', 1);
        $this->db->order_by("position_sort_building", "asc");
        $query = $this->db->get(PREFIX . $this->table_areas);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }
}
