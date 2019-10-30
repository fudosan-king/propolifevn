
<?php

class User_estate_owners_model extends MY_Model
{

    private $table = 'user_info';
    private $table_common_facilities = 'common_facilities';
    private $table_facilities_db = 'common_facility_house';
    private $table_equipments_house_db = 'equipments_house';
    private $table_equipments = 'equipments';
    private $table_areas = 'areas';
    private $table_areas_house_db = 'area_house';
    private $table_category = 'category';
    private $table_category_house_db = 'cate_house';
    private $table_building_house_db = 'building_house';
    private $table_image = 'house_images';
    private $table_layout_house_db = 'house_layouts';
    private $table_tags = 'tags';
    private $table_tags_db = 'tags_db';
    private $table_building = 'building';

    function getsearchContent($limit, $page) {
        $this->db->select('*');
        $this->db->limit($limit, $page);
        $this->db->order_by($this->input->post('func_order_by'), $this->input->post('order_by'));
        $this->db->order_by('created', 'desc');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);


            $this->db->where('(`username` LIKE "%' . $content . '%" or email LIKE "%' . $content . '%" or phone LIKE "%' . $content . '%"or address LIKE "%' . $content . '%")');
        }

        // search with key word title
        if ($this->input->post('title') != '') {
            $content = json_encode($this->input->post('title'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $content = $this->removeCommaAndDot($content);
            $this->db->where('(
                REPLACE (username, ",", " ") LIKE "%' . $content . '%" )');
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

        $query = $this->db->get(PREFIX . $this->table);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getTotalsearchContent() {
        $this->db->select('*');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);

            $this->db->where('(`username` LIKE "%' . $content . '%" or email LIKE "%' . $content . '%" or phone LIKE "%' . $content . '%"or address LIKE "%' . $content . '%")');
        }

        // search with key word title
        if ($this->input->post('title') != '') {
            $content = json_encode($this->input->post('title'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $content = $this->removeCommaAndDot($content);
            $this->db->where('(
                REPLACE (username, ",", " ") LIKE "%' . $content . '%" )');
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

        $query = $this->db->get(PREFIX . $this->table);
        if ($query->result()) {
            return count($query->result());
        } else {
            return false;
        }
    }

    function getDetailManagement($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getUserInfo($id){
        $this->db->select('*');
        $this->db->join('cli_user_info','cli_user_house.user_info_id = cli_user_info.id');
        $this->db->where('cli_user_house.house_id',$id);
        $query =$this->db->get('cli_user_house');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getGl($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get(PREFIX . $this->table_image);

        if ($query->result()) {
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
    function saveManagement($data) {
        if($this->input->post('statusAdmincp')=='on'){
            $status = 1;
        }else{
            $status = 0;
        }
        if($this->input->post('hiddenIdAdmincp')==0) {
            $data_user_insert = array(
                'status'  => $status,
                'created' => date('Y-m-d H:i:s',time()),
                'update'  => date('Y-d-m H:i:s',time()),
                'username'=>$data['username'],
                'email'   =>$data['email'],
                'phone'   =>$data['phone'],
                'address' =>$data['address']
            );
            if($this->db->insert(PREFIX.$this->table,$data_user_insert)){
                return true;
            }
        }else{
            $data_user_update = array(
                'status'  =>$status,
                'update'  =>date('Y-m-d H:i:s',time()),
                'username'=>$data['username'],
                'email'   =>$data['email'],
                'phone'   =>$data['phone'],
                'address' =>$data['address']
            );
            $this->db->where('id',$this->input->post('hiddenIdAdmincp'));
            if($this->db->update(PREFIX.$this->table,$data_user_update)){
                return true;
            }
        }
        return false;
    }

    function insertDBTmp($id_house, $data_test) {
        $tmp = array();
        foreach ($data_test as $items) {
            if (is_array($items)) {
                $tmp[] = implode(",", $items);
            }
        }
        $data_test = $tmp;

        if ($this->input->post('areas') != '') {
            $tmp = $this->getAreaID($this->input->post('areas'));
            if ($tmp) {
                $data_test[] = $tmp->name;
            }
        }
        if ($this->input->post('category_main') != '') {
            $tmp = $this->getCategoryID($this->input->post('category_main'));
            if ($tmp) {
                foreach ($tmp as $k => $v) {
                    $data_test[] = $v->name;
                }
            }
        }
        if ($this->input->post('category_special') != '') {
            $tmp = $this->getCategoryID($this->input->post('category_special'));
            if ($tmp) {
                foreach ($tmp as $k => $v) {
                    $data_test[] = $v->name;
                }
            }
        }
        if ($this->input->post('equipment') != '') {
            $tmp = $this->getEquipmentID($this->input->post('equipment'));
            if ($tmp) {
                foreach ($tmp as $k => $v) {
                    $data_test[] = $v->name;
                }
            }
        }
        if ($this->input->post('facilities') != '') {
            $tmp = $this->getFacilitieID($this->input->post('facilities'));
            if ($tmp) {
                foreach ($tmp as $k => $v) {
                    $data_test[] = $v->name;
                }
            }
        }
        if ($this->input->post('house_layout_id') != '') {
            $tmp = $this->getLayoutID($this->input->post('house_layout_id'));
            if ($tmp) {
                foreach ($tmp as $k => $v) {
                    $data_test[] = $v->name;
                }
            }
        }
        $this->db->where('houses_id', $id_house);
        $this->db->delete(PREFIX . 'houses_db');
        $data_select = array(
            'houses_id' => $id_house,
            'content' => implode(',', array_unique($data_test))
        );

        $this->db->insert(PREFIX . 'houses_db', $data_select);
    }

    function getlistNews() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->limit(10, 0);
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->result()) {
            return $query->result();
        } else {
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

        if ($query->result()) {
            $query->free_result();
            return $query->result();
        } else {
            return false;
        }
    }
    function getFacilities($type = 0) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', $type);
        $query = $this->db->get(PREFIX . $this->table_common_facilities);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getEquipments($type = 0) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', $type);
        $query = $this->db->get(PREFIX . $this->table_equipments);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getAreas($type = 0) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', $type);
        $this->db->or_where('type', 0);
        $query = $this->db->get(PREFIX . $this->table_areas);

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

    function insertDBTmpUpdate($id) {

        $data_field = array(
            'username' => '',
            'email' => '',
            'phone' => '',
            'address'=> ''
        );
        $result = $this->getDetailManagement($id);
        if(isset($result[0]) && $result[0]){
            $item = $result[0];
            foreach ($data_field as $key => $value) {
                if ($key == 'email') {
                    $data_test[] = $item->$key ;
                } elseif ($key == 'phone') {
                    $data_test[] = $item->$key ;
                } else {
                    $data_test[] = $item->$key;
                }
            }
        }
    }

    function getAreaID($id) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('id', $id);
        $query = $this->db->get(PREFIX . $this->table_areas);

        if ($query->result()) {

            return $query->row();
        } else {
            return false;
        }
    }

    function getEquipmentID($id) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where_in('id', $id);
        $query = $this->db->get(PREFIX . $this->table_equipments);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getFacilitieID($id) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where_in('id', $id);
        $query = $this->db->get(PREFIX . $this->table_common_facilities);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getLayoutID($id) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where_in('id', $id);
        $query = $this->db->get(PREFIX . $this->table_layout_house_db);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function updateListHouse($username,$email,$phone,$address){
        $data=array();
        foreach ($username as $key=>$value){
            $data=array(
                'username'=>$username[$key],
                'email'=>$email[$key],
                'phone'=>$phone[$key],
                'address'=>$address[$key]
            );
            $this->db->where('id',$key);
            $this->db->update(PREFIX . $this->table,$data);
            $this->insertDBTmpUpdate($key);
        }
    }

    function getCategoryID($id) {
        $this->db->select('name');
        $this->db->where('status', 1);
        $this->db->where_in('id', $id);

        $query = $this->db->get(PREFIX . $this->table_category);

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }


}
