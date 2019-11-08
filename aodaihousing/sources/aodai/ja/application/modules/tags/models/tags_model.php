<?php
class Tags_model extends MY_Model {
	private $table = 'tags';
    private $table_offices = 'offices';
    private $table_houses = 'houses';
    private $table_tags_db = 'tags_db';
    
	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
        $this->db->order_by("id",'desc');
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
			return array();
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
			return array();
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
				'name'=> $this->input->post('nameAdmincp'),
                'order'=> $this->input->post('order'),
				'status'=> $status,
				'created'=> date('Y-m-d H:i:s',time()),
				'modified'=> date('Y-m-d H:i:s',time()),
                'type'		=> $this->input->post('type'),
                'type_p'		=> $this->input->post('type_p'),
                'slug' => preg_replace("/\s+/","-", $this->input->post('nameAdmincp'))
			);
			if($this->db->insert(PREFIX.$this->table,$data)){
				return true;
			}
		}else{
			$result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));
			
			$data = array(
				'name'=> $this->input->post('nameAdmincp'),
				'status'=> $status,
				'modified'=> date('Y-m-d H:i:s',time()),
                'type'		=> $this->input->post('type'),
                'type_p'		=> $this->input->post('type_p'),
                'order'=> $this->input->post('order'),
                'slug' => preg_replace("/\s+/","-", $this->input->post('nameAdmincp'))
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

    function getTagByName($tagName)
    {
        $this->db->select('*');
        $this->db->where('name',$tagName);
        $this->db->limit(1);
        $query = $this->db->get(PREFIX.$this->table);
        //echo $this->db->last_query();
        
        if($query->row()){
            return $query->row();
        }else{
            return array();
        }
    }

    function getsearchFrontEnd($limit, $page, $tagId) {
        // office type = 1
        // house type = 2

        $this->db->select('
            tdb.id as tags_db_id,
            tdb.type as tags_db_type,

            hs.update as house_update,
            hs.created as house_created,
            hs.recommended as house_recommended,
            hs.images_thumb as house_images_thumb,
            hs.id as house_id,
            hs.name_en as house_name_en,
            hs.name_jp as house_name_jp,
            hs.type as house_type,
            hs.rent as house_rent,
            hs.house_layout_id as house_layout_id,
            hs.size as house_size,
            hs.introduction as house_introduction,

            of.update as office_update,
            of.created as office_created,
            of.recommended as office_recommended,
            of.images_thumb as office_images_thumb,
            of.id as office_id,
            of.name_en as office_name_en,
            of.name_jp as office_name_jp,
            of.month_rent as office_month_rent,
            of.size_rent as office_size_rent,
            of.size as office_size,
            of.introduction as office_introduction,

            ar.name as area_name
        ');
        
        $this->db->from('cli_tags_db as tdb');

        // offices
        $this->db->join('cli_offices as of', 'tdb.office_house_id = of.id and tdb.type=1 ', 'left');
        // areas
        $this->db->join('cli_areas as ar', 'tdb.office_house_id = ar.id ', 'left');
        // houses
        $this->db->join('cli_houses as hs', 'tdb.office_house_id = hs.id and tdb.type=2 ', 'left');
        // house_layouts
        $this->db->join('cli_house_layouts as lo', 'lo.id = hs.house_layout_id and tdb.type=2 ', 'left');
        
        $this->db->where('tdb.tags_id', $tagId);
        $this->db->where('(`of`.id IS NOT NULL OR `hs`.`id` IS NOT NULL)');
        
        $this->db->group_by(array('tdb.type ', 'tdb.office_house_id'));
        
        $this->db->order_by('tdb.type', 'DESC');
        $this->db->order_by('tdb.office_house_id', 'DESC');

        $this->db->limit($limit, $page);
        
        $query = $this->db->get();

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getCountsearchFrontEnd($tagId) {
        // office type = 1
        // house type = 2

        $this->db->select('
            tdb.id as tags_db_id,
            tdb.type as tags_db_type,

            hs.update as house_update,
            hs.created as house_created,
            hs.recommended as house_recommended,
            hs.images_thumb as house_images_thumb,
            hs.id as house_id,
            hs.name_en as house_name_en,
            hs.name_jp as house_name_jp,
            hs.type as house_type,
            hs.rent as house_rent,
            hs.house_layout_id as house_layout_id,
            hs.size as house_size,
            hs.introduction as house_introduction,

            of.update as office_update,
            of.created as office_created,
            of.recommended as office_recommended,
            of.images_thumb as office_images_thumb,
            of.id as office_id,
            of.name_en as office_name_en,
            of.name_jp as office_name_jp,
            of.month_rent as office_month_rent,
            of.size_rent as office_size_rent,
            of.size as office_size,
            of.introduction as office_introduction,

            ar.name as area_name
        ');

        $this->db->from('cli_tags_db as tdb');

        // offices
        $this->db->join('cli_offices as of', 'tdb.office_house_id = of.id and tdb.type=1 ', 'left');
        // areas
        $this->db->join('cli_areas as ar', 'tdb.office_house_id = ar.id ', 'left');
        // houses
        $this->db->join('cli_houses as hs', 'tdb.office_house_id = hs.id and tdb.type=2 ', 'left');
        // house_layouts
        $this->db->join('cli_house_layouts as lo', 'lo.id = hs.house_layout_id and tdb.type=2 ', 'left');

        $this->db->where('tdb.tags_id', $tagId);
        $this->db->where('(`of`.id IS NOT NULL OR `hs`.`id` IS NOT NULL)');

        $this->db->group_by(array('tdb.type ', 'tdb.office_house_id'));

        $query = $this->db->get();

        if ($query->result()) {
            return count($query->result());
        } else {
            return array();
        }
    }

    function getTotalsearchFrontEnd($tagId){
        $this->db->select('tdb.type as typeTag');

        $this->db->from('cli_tags_db as tdb');

        //office
        $this->db->join('cli_offices as of', 'tdb.office_house_id = of.id and tdb.type=1 ', 'left');

        // house
        $this->db->join('cli_areas as ar', 'tdb.office_house_id = ar.id ', 'left');
        $this->db->join('cli_houses as hs', 'tdb.office_house_id = hs.id and tdb.type=2 ', 'left');
        $this->db->join('cli_house_layouts as lo', 'lo.id = hs.house_layout_id and tdb.type=2 ', 'left');
        $this->db->where('tdb.tags_id', $tagId);
        $this->db->where("(`of`.id IS NOT NULL OR `hs`.`id` IS NOT NULL)");
        $this->db->group_by(array("tdb.type ", "tdb.office_house_id"));
        $this->db->order_by("typeTag",'DESC');
        $this->db->order_by("tdb.office_house_id",'DESC');

        $query = $this->db->get();
        if($query->result()){
            return count($query->result());
        }else{
            return array();
        }
    }

    function get_area_by_house($house_id) {
        $this->db->select('ar.id, ar.name, ar_hs.house_id');
        $this->db->from('cli_areas as ar');
        $this->db->join('cli_area_house as ar_hs', 'ar_hs.area_id = ar.id and ar.status=1 ', 'left');
        $this->db->where('ar_hs.house_id', $house_id);
        $query = $this->db->get();

        if ($query->result()) {
            $response = $query->result();
            if($response[0]){
                return $response[0];
            }
            else{
                return array();
            }
        } else {
            return array();
        }
    }

    function get_area_by_office($office_id) {
        $this->db->select('ar.id, ar.name, ar_of.office_id');
        $this->db->from('cli_areas as ar');
        $this->db->join('cli_area_office as ar_of', 'ar_of.area_id = ar.id and ar.status=1 ', 'left');
        $this->db->where('ar_of.office_id', $office_id);
        $query = $this->db->get();
        if ($query->result()) {
            $response = $query->result();
            if($response[0]){
                return $response[0];
            }else{
                return array();
            }
        } else {
            return array();
        }
    }
    
    function getListTag(){
        $this->db->select('*');
        $this->db->where('status',1);
        $query = $this->db->get(PREFIX.$this->table);
        
        if($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }
    
    function list_offices(){
        $this->db->select('id');
        $this->db->where('status',1);
        $query = $this->db->get(PREFIX.$this->table_offices);
        
        if($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }
    
    function list_houses(){
        $this->db->select('id');
        $this->db->where('status',1);
        $query = $this->db->get(PREFIX.$this->table_houses);
        
        if($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }
    
    function insert_tags($tags, $list_data, $type){ 
        foreach ($tags as $tag) {
            foreach ($list_data as $item) {
                $data_select = array(
                    'office_house_id' => $item->id,
                    'tags_id' => $tag->id,
                    'type' => $type,
                    'modified' => date('Y-m-d H:i:s', time()),
                    'created' => date('Y-m-d H:i:s', time()),
                );
                $this->db->insert(PREFIX . $this->table_tags_db, $data_select);
            }
        }
    }
    
    function get_area_db($id, $type){
        $this->db->select(PREFIX .  'areas.name');
        if($type == 1){
            $this->db->join(PREFIX . 'area_office', PREFIX . 'areas' . '.id = ' . PREFIX .  'area_office.area_id', 'left');
            $this->db->join(PREFIX . 'offices', PREFIX . 'area_office' . '.office_id  = ' . PREFIX .  'offices.id', 'left');
        }else{
            $this->db->join(PREFIX . 'area_house', PREFIX . 'areas' . '.id = ' . PREFIX .  'area_house.area_id', 'left');
            $this->db->join(PREFIX . 'houses', PREFIX . 'area_house' . '.house_id = ' . PREFIX .  'houses.id', 'left');
            $this->db->where(PREFIX . 'houses.id',$id);
        }  
        $query = $this->db->get(PREFIX .  'areas');
        if($query->row()){
            return $query->row();
        }else{
            return array();
        }
    }
}