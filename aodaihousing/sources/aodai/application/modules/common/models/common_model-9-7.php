<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends MY_Model {
    private $table_areas = 'areas';
    private $table_areas_house = 'area_house';
    private $table_house = 'houses';
    private $table_layouts_house = 'house_layouts';
    private $table_category = 'category';
	function getAreas($type = 0, $no = true){
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where('type', $type);
        $this->db->or_where('type', 0);
        if($no != true){
            $this->db->or_where('type', 0);
        }
        
		$query = $this->db->get(PREFIX.$this->table_areas);

		if($query->result()){
  
			return $query->result();
		}else{
			return false;
		}
    }
    
    function getLayouts(){
        $this->db->select('*');
		$this->db->where('status', 1);
		$query = $this->db->get(PREFIX.$this->table_layouts_house);

		if($query->result()){
  
			return $query->result();
		}else{
			return false;
		}
    }
    
    function search_model($data, $per_page, $cur_page){
        if($data['s'] != '') {
            $s = trim($data['s']);
            $spaces = preg_match('/ /',$s);
            if($spaces>0){
                $s_array = explode(' ', $s);
                foreach($s_array as $v){
                    $this->db->like('content', mysql_real_escape_string($v));
                }
            }else{
                $this->db->like('content', mysql_real_escape_string($data['s']));
            }
            $this->db->select('*');
            
            $query = $this->db->get(PREFIX.$data['table']. '_db');
            //echo $this->db->last_query();
            if($query->result()){
  
                
                $id_p = array();
                foreach($query->result() as $k=>$v) {
                    $type = $data['table'].'_id';
                    $id_p[] = $v->$type;
                }
                if(!empty($id_p)){
                    $this->db->distinct();
                    $this->db->select(PREFIX.'areas'.".name");
                    $this->db->select(PREFIX.$data['table'].'.*');
                    $this->db->where(PREFIX.$data['table'].'.status', 1);
                    $this->db->join(PREFIX.'area_'.$data['areas'],  PREFIX.$data['table'].'.id = ' . PREFIX.'area_'.$data['areas'].'.'.$data['areas'].'_id', 'inner');
                    $this->db->join(PREFIX.'areas',  PREFIX.'areas'.'.id = ' . PREFIX.'area_'.$data['areas'].'.area_id', 'inner');
                    if($data['table'] == 'houses'){
                        $this->db->join(PREFIX.'house_layouts',  PREFIX.'house_layouts'.'.id = ' . PREFIX.$data['table'].'.house_layout_id', 'inner');
                        $this->db->select(PREFIX.'house_layouts.name AS house_layouts');
                    }
                    $this->db->where_in(PREFIX.$data['table'].'.id', $id_p);
                    $this->db->limit($per_page, $cur_page);
                    $this->db->order_by('id', 'desc');
                    $query = $this->db->get(PREFIX.$data['table']);
                    //echo $this->db->last_query();
                    if($query->result()){
            			return $query->result();
            		}
                }
                return false;
                
    		}
            return false;
        }else {
            $this->db->distinct();
            $this->db->select(PREFIX.'areas'.".name");
            $this->db->select(PREFIX.$data['table'].'.*');
            $this->db->where(PREFIX.$data['table'].'.status', 1);
            $this->db->join(PREFIX.'area_'.$data['areas'],  PREFIX.$data['table'].'.id = ' . PREFIX.'area_'.$data['areas'].'.'.$data['areas'].'_id', 'inner');
            $this->db->join(PREFIX.'areas',  PREFIX.'areas'.'.id = ' . PREFIX.'area_'.$data['areas'].'.area_id', 'inner');
            if($data['size'] != '') {
                
                switch($data['size']){
                    case '50':
                        $this->db->where('size', $data['size']);
                        break;
                    case '51-81':
                        $this->db->where('size >= ', 51);
                        $this->db->where('size <= ', 81);
                        break;
                    case '81-100':
                        $this->db->where('size >= ', 81);
                        $this->db->where('size <= ', 100);
                        break;
                    case '101-150':
                        $this->db->where('size >= ', 101);
                        $this->db->where('size <= ', 150);
                        break;
                    case '151':
                        $this->db->where('size >=', $data['size']);
                        break;
                }
            }
            
            if($data['localtion'] != '') {
                $this->db->where(PREFIX.'areas.id', $data['localtion']);
            }
        
            if($data['catid'] != '') {
                $this->db->join(PREFIX.'cate_'.$data['areas'],  PREFIX.$data['table'].'.id = ' . PREFIX.'cate_'.$data['areas'].'.'.$data['areas'].'_id', 'inner');
                $this->db->join(PREFIX.$this->table_category,  PREFIX.$this->table_category.'.id = ' . PREFIX.'cate_'.$data['areas'].'.cate_id', 'inner');
                $this->db->where(PREFIX.$this->table_category.'.id', $data['catid']);
            }
        
        
            if($data['table'] == 'houses'){
                if($data['type'] != '') {
                    $this->db->where(PREFIX.$data['table'].'.type', $data['type']);
                }
                if($data['rent'] != '') {
                    switch($data['rent']){
                        case '500':
                            $this->db->where(PREFIX.$data['table'].'.rent', 500);
                            break;
                        case '501-1000':
                            $this->db->where(PREFIX.$data['table'].'.rent >= ', 501);
                            $this->db->where(PREFIX.$data['table'].'.rent <= ', 1000);
                            break;
                        case '1001-1500':
                            $this->db->where(PREFIX.$data['table'].'.rent >= ', 1001);
                            $this->db->where(PREFIX.$data['table'].'.rent >= ', 1500);
                            break;
                        case '1501':
                            $this->db->where(PREFIX.$data['table'].'.rent >= ', 1501);
                            break;
                    }
                }
                if($data['layout'] != '') {
                    $this->db->where(PREFIX.$data['table'].'.house_layout_id', $data['layout']);
                }
                $this->db->join(PREFIX.'house_layouts',  PREFIX.'house_layouts'.'.id = ' . PREFIX.$data['table'].'.house_layout_id', 'inner');
                $this->db->select(PREFIX.'house_layouts.name AS house_layouts');
            }
            if($data['table'] == 'offices'){
                if($data['month_rent'] != '') {
                    switch($data['month_rent']){
                        case '1501-1501':
                            $this->db->where(PREFIX.$data['table'].'.month_rent >', 1501);
                            $this->db->where(PREFIX.$data['table'].'.month_rent < ', 1501);
                            break;
                        case '2001-2500':
                            $this->db->where(PREFIX.$data['table'].'.month_rent >', 2001);
                            $this->db->where(PREFIX.$data['table'].'.month_rent < ', 2500);
                            break;
                        case '2501-3000':
                            $this->db->where(PREFIX.$data['table'].'.month_rent >', 2501);
                            $this->db->where(PREFIX.$data['table'].'.month_rent < ', 3000);
                            break;
                        case '3501-3500':
                            $this->db->where(PREFIX.$data['table'].'.month_rent >', 3501);
                            $this->db->where(PREFIX.$data['table'].'.month_rent < ', 3500);
                            break;
                        case '3501':
                            $this->db->where(PREFIX.$data['table'].'.month_rent > ', 3501);
                            break;
                    }                               
                }
                
                if($data['size_rent'] != '') {
                    switch($data['size_rent']){
                        case '10':
                            $this->db->where(PREFIX.$data['table'].'.size_rent', 10);
                            $this->db->where(PREFIX.$data['table'].'.size_rent', 10);
                            break;
                        case '11-25':
                            $this->db->where(PREFIX.$data['table'].'.size_rent >', 11);
                            $this->db->where(PREFIX.$data['table'].'.size_rent < ', 25);
                            break;
                        case '26-49':
                            $this->db->where(PREFIX.$data['table'].'.size_rent >', 26);
                            $this->db->where(PREFIX.$data['table'].'.size_rent < ', 49);
                            break;
                        case '50-99':
                            $this->db->where(PREFIX.$data['table'].'.size_rent >', 50);
                            $this->db->where(PREFIX.$data['table'].'.size_rent < ', 99);
                            break;
                        case '100':
                            $this->db->where(PREFIX.$data['table'].'.size_rent', 100);
                            break;
                    }     
                }
            }
            $this->db->limit($per_page, $cur_page);
            $this->db->order_by('id', 'desc');
            $query = $this->db->get(PREFIX.$data['table']);
            //echo $this->db->last_query();
            if($query->result()){
      
    			return $query->result();
    		}else{
    			return false;
    		}
        }
        
    }
    
    function search_count_record($data){
        if($data['s'] != '') {
            $s = trim($data['s']);
            $spaces = preg_match('/ /',$s);
            if($spaces>0){
                $s_array = explode(' ', $s);
                foreach($s_array as $v){
                    $this->db->like('content', mysql_real_escape_string($v));
                }
            }else{
                $this->db->like('content', mysql_real_escape_string($data['s']));
            }
            $this->db->select('*');
            
            $query = $this->db->get(PREFIX.$data['table']. '_db');
            //echo $this->db->last_query();
            if($query->result()){
  
                
                $id_p = array();
                foreach($query->result() as $k=>$v) {
                    $type = $data['table'].'_id';
                    $id_p[] = $v->$type;
                }
                if(!empty($id_p)){
                    $this->db->distinct();
                    $this->db->select(PREFIX.'areas'.".name");
                    $this->db->select(PREFIX.$data['table'].'.*');
                    $this->db->where(PREFIX.$data['table'].'.status', 1);
                    $this->db->join(PREFIX.'area_'.$data['areas'],  PREFIX.$data['table'].'.id = ' . PREFIX.'area_'.$data['areas'].'.'.$data['areas'].'_id', 'inner');
                    $this->db->join(PREFIX.'areas',  PREFIX.'areas'.'.id = ' . PREFIX.'area_'.$data['areas'].'.area_id', 'inner');
                    if($data['table'] == 'houses'){
                        $this->db->join(PREFIX.'house_layouts',  PREFIX.'house_layouts'.'.id = ' . PREFIX.$data['table'].'.house_layout_id', 'inner');
                        $this->db->select(PREFIX.'house_layouts.name AS house_layouts');
                    }
                    $this->db->where_in(PREFIX.$data['table'].'.id', $id_p);
                    $this->db->limit($per_page, $cur_page);
                    $this->db->order_by('id', 'desc');
                    $query = $this->db->get(PREFIX.$data['table']);
                    //echo $this->db->last_query();
                    if($query->result()){
            			return count($query->result());
            		}
                }
                return false;
                
    		}
            return false;
        }else {
            $this->db->distinct();
            $this->db->select(PREFIX.'areas'.".name");
            $this->db->select(PREFIX.$data['table'].'.*');
            $this->db->where(PREFIX.$data['table'].'.status', 1);
            $this->db->join(PREFIX.'area_'.$data['areas'],  PREFIX.$data['table'].'.id = ' . PREFIX.'area_'.$data['areas'].'.'.$data['areas'].'_id', 'inner');
            $this->db->join(PREFIX.'areas',  PREFIX.'areas'.'.id = ' . PREFIX.'area_'.$data['areas'].'.area_id', 'inner');
            if($data['size'] != '') {
                
                switch($data['size']){
                    case '50':
                        $this->db->where('size', $data['size']);
                        break;
                    case '51-81':
                        $this->db->where('size >= ', 51);
                        $this->db->where('size <= ', 81);
                        break;
                    case '81-100':
                        $this->db->where('size >= ', 81);
                        $this->db->where('size <= ', 100);
                        break;
                    case '101-150':
                        $this->db->where('size >= ', 101);
                        $this->db->where('size <= ', 150);
                        break;
                    case '151':
                        $this->db->where('size >=', $data['size']);
                        break;
                }
            }
            
            if($data['localtion'] != '') {
                $this->db->where(PREFIX.'areas.id', $data['localtion']);
            }
        
            if($data['catid'] != '') {
                $this->db->join(PREFIX.'cate_'.$data['areas'],  PREFIX.$data['table'].'.id = ' . PREFIX.'cate_'.$data['areas'].'.'.$data['areas'].'_id', 'inner');
                $this->db->join(PREFIX.$this->table_category,  PREFIX.$this->table_category.'.id = ' . PREFIX.'cate_'.$data['areas'].'.cate_id', 'inner');
                $this->db->where(PREFIX.$this->table_category.'.id', $data['catid']);
            }
        
        
            if($data['table'] == 'houses'){
                if($data['type'] != '') {
                    $this->db->where(PREFIX.$data['table'].'.type', $data['type']);
                }
                if($data['rent'] != '') {
                    switch($data['rent']){
                        case '500':
                            $this->db->where(PREFIX.$data['table'].'.rent', 500);
                            break;
                        case '501-1000':
                            $this->db->where(PREFIX.$data['table'].'.rent >= ', 501);
                            $this->db->where(PREFIX.$data['table'].'.rent <= ', 1000);
                            break;
                        case '1001-1500':
                            $this->db->where(PREFIX.$data['table'].'.rent >= ', 1001);
                            $this->db->where(PREFIX.$data['table'].'.rent >= ', 1500);
                            break;
                        case '1501':
                            $this->db->where(PREFIX.$data['table'].'.rent >= ', 1501);
                            break;
                    }
                }
                if($data['layout'] != '') {
                    $this->db->where(PREFIX.$data['table'].'.house_layout_id', $data['layout']);
                }
                $this->db->join(PREFIX.'house_layouts',  PREFIX.'house_layouts'.'.id = ' . PREFIX.$data['table'].'.house_layout_id', 'inner');
                $this->db->select(PREFIX.'house_layouts.name AS house_layouts');
            }
            if($data['table'] == 'offices'){
                if($data['month_rent'] != '') {
                    switch($data['month_rent']){
                        case '1501-1501':
                            $this->db->where(PREFIX.$data['table'].'.month_rent >', 1501);
                            $this->db->where(PREFIX.$data['table'].'.month_rent < ', 1501);
                            break;
                        case '2001-2500':
                            $this->db->where(PREFIX.$data['table'].'.month_rent >', 2001);
                            $this->db->where(PREFIX.$data['table'].'.month_rent < ', 2500);
                            break;
                        case '2501-3000':
                            $this->db->where(PREFIX.$data['table'].'.month_rent >', 2501);
                            $this->db->where(PREFIX.$data['table'].'.month_rent < ', 3000);
                            break;
                        case '3501-3500':
                            $this->db->where(PREFIX.$data['table'].'.month_rent >', 3501);
                            $this->db->where(PREFIX.$data['table'].'.month_rent < ', 3500);
                            break;
                        case '3501':
                            $this->db->where(PREFIX.$data['table'].'.month_rent > ', 3501);
                            break;
                    }                               
                }
                
                if($data['size_rent'] != '') {
                    switch($data['size_rent']){
                        case '10':
                            $this->db->where(PREFIX.$data['table'].'.size_rent', 10);
                            $this->db->where(PREFIX.$data['table'].'.size_rent', 10);
                            break;
                        case '11-25':
                            $this->db->where(PREFIX.$data['table'].'.size_rent >', 11);
                            $this->db->where(PREFIX.$data['table'].'.size_rent < ', 25);
                            break;
                        case '26-49':
                            $this->db->where(PREFIX.$data['table'].'.size_rent >', 26);
                            $this->db->where(PREFIX.$data['table'].'.size_rent < ', 49);
                            break;
                        case '50-99':
                            $this->db->where(PREFIX.$data['table'].'.size_rent >', 50);
                            $this->db->where(PREFIX.$data['table'].'.size_rent < ', 99);
                            break;
                        case '100':
                            $this->db->where(PREFIX.$data['table'].'.size_rent', 100);
                            break;
                    }     
                }
            }
            $this->db->order_by('id', 'desc');
            $query = $this->db->get(PREFIX.$data['table']);
            //echo $this->db->last_query();
            if($query->result()){
      
    			return count($query->result());
    		}else{
    			return false;
    		}
        }
    }
    
    public function getSearchAll($s){
        $sql = "
                SELECT DISTINCT cli_houses.*, cli_house_layouts.`name` AS 'layout_name', cli_areas.`name` AS 'area_name'
                FROM cli_houses INNER JOIN cli_cate_house ON cli_houses.id = cli_cate_house.house_id INNER JOIN cli_category ON cli_cate_house.cate_id = cli_category.id INNER JOIN cli_area_house ON cli_houses.id = cli_area_house.house_id INNER JOIN cli_areas ON cli_area_house.area_id = cli_areas.id INNER JOIN cli_house_layouts ON cli_houses.house_layout_id = cli_house_layouts.id
                WHERE
                cli_houses.`status` = 1 AND
                cli_category.`status` = 1 
                 
        ";
        
        if($s != '') {
            $sql = $sql . " AND cli_houses.name_jp LIKE '%$s%' AND
                            cli_areas.`name` LIKE '%$s%'";
        }
		$query = $this->db->query($sql);
		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    public function getCategorySpecial() {
        $this->db->select('*');
		$this->db->where('status', 1);
        $this->db->where('type', 1);
        $this->db->where('type <>', '');
        $this->db->order_by('id', 'desc');
		$query = $this->db->get(PREFIX.$this->table_category);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    public function getCategoryDetail($cat_id) {
        $sql = "SELECT DISTINCT
                cli_houses.*
                FROM
                cli_houses
                INNER JOIN cli_cate_house ON cli_houses.id = cli_cate_house.house_id
                INNER JOIN cli_category ON cli_cate_house.cate_id = cli_category.id
                WHERE
                cli_houses.`status` = 1 AND
                cli_category.id = $cat_id AND
                cli_category.`status` = 1
            ";
		$query = $this->db->query($sql);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    public function getOneCategorySpecial(){
        $sql = "SELECT *
                FROM
                cli_category
                WHERE
                cli_category.type = 1 AND
                cli_category.`status` = 1
                ORDER BY
                cli_category.id desc
                LIMIT 0, 1

            ";
		$query = $this->db->query($sql);

		if($query->result()){
			return $query->row();
		}else{
			return false;
		}
    }
    public function getCategoryDetailHouse($catId){
        $sql = "
                SELECT DISTINCT
                cli_houses.*,
                cli_house_layouts.`name` AS 'layout_name',
                cli_areas.`name` AS 'area_name'
                FROM
                cli_houses
                INNER JOIN cli_cate_house ON cli_houses.id = cli_cate_house.house_id
                INNER JOIN cli_category ON cli_cate_house.cate_id = cli_category.id
                INNER JOIN cli_area_house ON cli_houses.id = cli_area_house.house_id
                INNER JOIN cli_areas ON cli_area_house.area_id = cli_areas.id
                INNER JOIN cli_house_layouts ON cli_houses.house_layout_id = cli_house_layouts.id
                WHERE cli_houses.`status` = 1 AND cli_category.id = $catId AND cli_category.`status` = 1
            ";
		$query = $this->db->query($sql);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    public function getCategoryDetailOffice($catId){
        $sql = "SELECT DISTINCT
                cli_offices.*,
                cli_areas.`name` AS 'area_name'
                FROM
                cli_offices
                INNER JOIN cli_cate_office ON cli_offices.id = cli_cate_office.office_id
                INNER JOIN cli_category ON cli_cate_office.cate_id = cli_category.id
                INNER JOIN cli_area_office ON cli_offices.id = cli_area_office.office_id
                INNER JOIN cli_areas ON cli_area_office.area_id = cli_areas.id
                WHERE cli_offices.`status` = 1 AND cli_category.id = $catId AND cli_category.`status` = 1

            ";
		$query = $this->db->query($sql);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
    }
    
    public function getCategory($id){
        $sql = "
            SELECT *
            FROM
            cli_category
            WHERE
            cli_category.id = $id
        ";
        $query = $this->db->query($sql);
        if($query->result()){
			return $query->row();
		}else{
			return false;
		}
    }
}
?>