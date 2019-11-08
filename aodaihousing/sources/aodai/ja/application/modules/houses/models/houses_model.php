<?php

class Houses_model extends MY_Model {

    private $table = 'houses';
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
            $this->db->where('(`comment` LIKE "%' . $content . '%" or introduction LIKE "%' . $content . '%" or other_notice LIKE "%' . $content . '%" or name_jp LIKE "%' . $content . '%" or name_en LIKE "%' . $content . '%")');
        }

        // search with key word title
         if ($this->input->post('title') != '') {
            $content = json_encode($this->input->post('title'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $content = $this->removeCommaAndDot($content);
            $this->db->where('(
                REPLACE (name_jp, ",", " ") LIKE "%' . $content . '%"
                or REPLACE (name_en, ",", " ") LIKE "%' . $content . '%")');
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
            return $query->result();
        } else {
            return array();
        }
    }

    function getTotalsearchContent() {
        $this->db->select('*');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $this->db->where('(`comment` LIKE "%' . $content . '%" or introduction LIKE "%' . $content . '%" or other_notice LIKE "%' . $content . '%" or name_jp LIKE "%' . $content . '%" or name_en LIKE "%' . $content . '%")');
        }

         // search with key word title
        if ($this->input->post('title') != '') {
            $content = json_encode($this->input->post('title'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $content = $this->removeCommaAndDot($content);
            $this->db->where('(
                REPLACE (name_jp, ",", " ") LIKE "%' . $content . '%"
                or REPLACE (name_en, ",", " ") LIKE "%' . $content . '%")');
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
            return array();
        }
    }

    function getGl($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get(PREFIX . $this->table_image);

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }
    function getBuilding(){
        $this->db->select('*');
        $query = $this->db->get(PREFIX . $this->table_building);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getBuildingCondo(){
        $this->db->select('*');
        $this->db->where('building_type',0);
        $query = $this->db->get(PREFIX . $this->table_building);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getBuildingServiced(){
        $this->db->select('*');
        $this->db->where('building_type',1);
        $query = $this->db->get(PREFIX . $this->table_building);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getBuildingAll(){
        $this->db->select('*');
        $this->db->where('building_type',2);
        $query = $this->db->get(PREFIX . $this->table_building);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }


    function saveManagement($fileName = '', $fileName_gallery = '') {
        $data = array(
            'status' => '',
            'recommended' => '',
            'promotion' => ''
        );
        $data_test = array();
        foreach ($data as $key => $value) {
            if ($this->input->post($key) == 'on') {
                $data[$key] = 1;
            } else {
                $data[$key] = 0;
            }
        }
        $data['house_layout_id'] = $this->input->post('house_layout_id');
        $data['type'] = $this->input->post('type');
        $rent = $this->input->post('rent');
        $data['rent'] = $rent['jp'];
        $size = $this->input->post('size');
        $data['size'] = $size['jp'];

        $data_field = array(
            'name_en' => '',
            'name_jp' => '',
            'introduction' => '',
            'comment' => '',
            'floors' => '',
            'receipt_type' => '',
            'deposit' => '',
            'deposit_return' => '',
            'contract' => '',
            'move_out' => '',
            'other_notice' => '',
            'payment_method' => '',
            'recent_residence' => '',
            'cleaning_day_week' => '',
            'bed_making' => '',
            'bed_making_day_week' => '',
            'consumables_replenishment' => '',
            'closing_time' => '',
            'key' => '',
            'others_stay' => '',
            'others_stay_notice' => '',
            'rent_condition' => '',
            'electric_bill' => '',
            'gas_bill' => '',
            'drink_water_bill' => '',
            'water_bill' => '',
            'laundry_service' => '',
            'city_call_bill' => '',
            'country_call_bill' => '',
            'international_call_bill' => '',
            'cleaning' => '',
            'internet' => '',
            'premium_nhk' => '',
            'bringing_furniture' => '',
            'pet' => '',
            'rent_notice' => ''
        );
        foreach ($data_field as $key => $value) {
            $data[$key] = json_encode($this->input->post($key));

            if ($key == 'rent') {
                $data_test[] = $this->input->post($key) . ' USD';
            } elseif ($key == 'size') {
                $data_test[] = $this->input->post($key) . 'm2';
            } else {
                $data_test[] = $this->input->post($key);
            }
        }

        $publish_to = $this->input->post('vcp_publish_to');

        // Using for building type: 1: 人気マンションコンドミニアム(popular), 2: 高級サービスアパート (luxury serviced apartment), 3: 日本人学校のバスが停まる物件特集 (near school bus)


        if ($this->input->post('hiddenIdAdmincp') == 0) {

            $data['created'] = date('Y-m-d H:i:s', time());
            $data['update'] = date('Y-m-d H:i:s', time());
            $data['images_thumb'] = $fileName['images_thumb'];
            $data['images_gallery'] = json_encode($fileName_gallery);

            if ($this->db->insert(PREFIX . $this->table, $data)) {
                $id_house = $this->db->insert_id();


                /*******gallery**************/
                $data_gl = $this->input->post('gl');
                if ($data_gl) {
                    $data_img = array();
                    foreach ($data_gl as $gl) {
                        $data_img['house_id'] = $id_house;
                        $this->db->where('id', $gl);
                        $this->db->update(PREFIX . $this->table_image, $data_img);
                    }
                }

                /********save areas*********/
                $data_select = array(
                    'house_id' => $id_house,
                    'area_id' => $this->input->post('areas'),
                    'created' => date('Y-m-d H:i:s', time()),
                    'modified' => date('Y-m-d H:i:s', time())
                );
                $this->db->where('house_id', $id_house);
                $this->db->insert(PREFIX . $this->table_areas_house_db, $data_select);


                /********save building*********/
                $type = $this->input->post('type');
                if($type == '0'){
                    $building_type = $this->input->post('building_type');
                }
                if($type == '1'){
                    $building_type = $this->input->post('building_type1');
                }
                if($type == '2'){
                    $building_type = $this->input->post('building_type2');
                }
                $this->db->where('house_id', $id_house);
                $this->db->delete(PREFIX . $this->table_building_house_db);
                if ($building_type) {
                        $data_select = array(
                            'house_id' => $id_house,
                            'building_id' => $building_type,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );
                $this->db->insert(PREFIX . $this->table_building_house_db, $data_select);

                }

                /********save category*********/
                $category_main = $this->input->post('category_main');
                if ($category_main) {
                    foreach ($category_main as $item) {
                        $data_select = array(
                            'house_id' => $id_house,
                            'cate_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_category_house_db, $data_select);
                    }
                }

                $category_special = $this->input->post('category_special');
                if ($category_special) {
                    foreach ($category_special as $item) {
                        $data_select = array(
                            'house_id' => $id_house,
                            'cate_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_category_house_db, $data_select);
                    }
                }

                /********save tags*********/
                $tags = $this->input->post('tags');
                if ($tags) {
                    foreach ($tags as $item) {
                        $data_select = array(
                            'office_house_id' => $id_house,
                            'tags_id' => $item,
                            'type' => 2,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_tags_db, $data_select);
                    }
                }

                /********save Equipments*********/
                $equipment = $this->input->post('equipment');
                if ($equipment) {
                    foreach ($equipment as $item) {
                        $data_select = array(
                            'house_id' => $id_house,
                            'equipment_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_equipments_house_db, $data_select);
                    }
                }

                /********save Facilities*********/
                $facilities = $this->input->post('facilities');
                if ($facilities) {
                    foreach ($facilities as $item) {
                        $data_select = array(
                            'house_id' => $id_house,
                            'common_facility_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_facilities_db, $data_select);
                    }
                }

                /* ============Search================ */
                $this->insertDBTmp($id_house, $data_test);

                return true;
            }
        } else {
            //Xử lý xóa hình khi update thay đổi hình
            $result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));

            if ($fileName['images_thumb'] == '') {
                $fileName['images_thumb'] = $result[0]->images_thumb;
            } else {
                @unlink(BASEFOLDER . 'static/uploads/houses/' . $result[0]->images_thumb);
            }

            $data['images_gallery'] = json_encode($fileName_gallery);
            $data['images_thumb'] = $fileName['images_thumb'];
            $data['update'] = date('Y-m-d H:i:s', time());

            $id_house = $this->input->post('hiddenIdAdmincp');
            $data_gl = $this->input->post('gl');
            if ($data_gl) {
                $data_img = array();
                foreach ($data_gl as $gl) {
                    $data_img['house_id'] = $id_house;
                    $this->db->where('id', $gl);
                    $this->db->update(PREFIX . $this->table_image, $data_img);
                }
            }

            $this->db->where('id', $this->input->post('hiddenIdAdmincp'));
            if ($this->db->update(PREFIX . $this->table, $data)) {

                /********save areas*********/
                $data_select = array(
                    'house_id' => $id_house,
                    'area_id' => $this->input->post('areas'),
                    'modified' => date('Y-m-d H:i:s', time())
                );
                $this->db->where('house_id', $id_house);
                $this->db->delete(PREFIX . $this->table_areas_house_db);
                $this->db->insert(PREFIX . $this->table_areas_house_db, $data_select);



                /******** Update Building *********/
                $type = $this->input->post('type');
                if($type == '0'){
                    $building_type = $this->input->post('building_type');
                }
                if($type == '1'){
                    $building_type = $this->input->post('building_type1');
                }
                if($type == '2'){
                    $building_type = $this->input->post('building_type2');
                }
                $this->db->where('house_id', $id_house);
                $this->db->delete(PREFIX . $this->table_building_house_db);

                if ($building_type) {
                    $data_select = array(
                        'house_id' => $id_house,
                        'building_id' => $building_type,
                        'modified' => date('Y-m-d H:i:s', time())
                    );
                    $this->db->insert(PREFIX . $this->table_building_house_db, $data_select);
                }

                /********save category*********/
                $category_main = $this->input->post('category_main');
                $this->db->where('house_id', $id_house);
                //$this->db->where('type', 0);
                $this->db->delete(PREFIX . $this->table_category_house_db);
                if ($category_main) {
                    foreach ($category_main as $item) {
                        $data_select = array(
                            'house_id' => $id_house,
                            'cate_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'type' => 0
                        );
                        $this->db->insert(PREFIX . $this->table_category_house_db, $data_select);
                    }
                }

                $category_special = $this->input->post('category_special');
//                $this->db->where('house_id', $id_house);
//                $this->db->where('type', 1);
//                $this->db->delete(PREFIX . $this->table_category_house_db);
                if ($category_special) {

                    foreach ($category_special as $item) {
                        $data_select = array(
                            'house_id' => $id_house,
                            'cate_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'type' => 1
                        );

                        $this->db->insert(PREFIX . $this->table_category_house_db, $data_select);
                    }
                }

                /********save tags*********/
                $tags = $this->input->post('tags');
                $this->db->where('office_house_id', $id_house);
                $this->db->where('type', 2);
                $this->db->delete(PREFIX . $this->table_tags_db);
                if ($tags) {
                    foreach ($tags as $item) {
                        $data_select = array(
                            'office_house_id' => $id_house,
                            'tags_id' => $item,
                            'type' => 2,
                            'modified' => date('Y-m-d H:i:s', time()),
                        );
                        $this->db->insert(PREFIX . $this->table_tags_db, $data_select);
                    }
                }

                /********save Equipments*********/
                $equipment = $this->input->post('equipment');
                if (isset($equipment)) {
                    $this->db->where('house_id', $id_house);
                    $this->db->delete(PREFIX . $this->table_equipments_house_db);
                    if ($equipment) {
                        foreach ($equipment as $item) {
                            $data_select = array(
                                'house_id' => $id_house,
                                'equipment_id' => $item,
                                'modified' => date('Y-m-d H:i:s', time())
                            );
                            $this->db->insert(PREFIX . $this->table_equipments_house_db, $data_select);
                        }
                    }
                }

                /********save Facilities*********/
                $facilities = $this->input->post('facilities');
                if (isset($facilities)) {
                    $this->db->where('house_id', $id_house);
                    $this->db->delete(PREFIX . $this->table_facilities_db);
                    if ($facilities) {
                        foreach ($facilities as $item) {
                            $data_select = array(
                                'house_id' => $id_house,
                                'common_facility_id' => $item,
                                'modified' => date('Y-m-d H:i:s', time())
                            );
                            $this->db->insert(PREFIX . $this->table_facilities_db, $data_select);
                        }
                    }
                }

                /* ============Search================ */
                $this->insertDBTmp($id_house, $data_test);


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
            return array();
        }
    }

    function getHouse($en) {
        $this->db->select('rent,images_thumb,id,name_en');
        $this->db->where('status',1);
        $this->db->where('name_en',$en);
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->result()){
            return $query->result();
        } else {
          return array();
        }
    }

    function getDetail($id) {
        $sql = "SELECT cli_houses.*, cli_house_layouts.name as house_layouts, cli_common_facilities.`name` AS common_facility_house, cli_areas.`name` as area, cli_equipments.`name` as equipment_house,cli_areas.`id` as area_id
                FROM
                cli_houses
                LEFT JOIN cli_common_facility_house ON cli_houses.id = cli_common_facility_house.house_id
                LEFT JOIN cli_common_facilities ON cli_common_facility_house.common_facility_id = cli_common_facilities.id
                LEFT JOIN cli_equipments_house ON cli_houses.id = cli_equipments_house.house_id
                LEFT JOIN cli_equipments ON cli_equipments_house.equipment_id = cli_equipments.id
                LEFT JOIN cli_area_house ON cli_houses.id = cli_area_house.house_id
                LEFT JOIN cli_areas ON cli_area_house.area_id = cli_areas.id
                LEFT JOIN cli_house_layouts ON cli_houses.house_layout_id = cli_house_layouts.id
                WHERE cli_houses.id = $id AND cli_houses.status = 1
            ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->row();
        } else {
            return array();
        }
    }

    function prevRecord($id) {
        $sql = "
            SELECT *
            FROM (`cli_news`)
            WHERE id = (SELECT MIN(id) FROM (`cli_news`) where id > $id)";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->row();
        } else {
            return array();
        }
    }

    function nextRecord($id) {
        $sql = "
            SELECT *
            FROM (`cli_news`)
            WHERE id = (SELECT MAX(id) FROM (`cli_news`) where id < $id)";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->row();
        } else {
            return array();
        }
    }

    function getTotalItem() {
        $this->db->select('cli_houses.*, cli_areas.name as area_name');
        $this->db->from('cli_houses');
        $this->db->join('cli_area_house', 'cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_areas', 'cli_area_house.area_id = cli_areas.id');
        $this->db->where('cli_houses.status', 1);
        $query = $this->db->count_all_results();
        if ($query) {
            return $query;
        } else {
            return 0;
        }
    }
    function getListHouse($per_page = 0, $cur_page = 0, $soft = 'desc'){
        $this->db->select('cli_houses.*, cli_areas.name as area_name');
        $this->db->from('cli_houses');
        $this->db->join('cli_area_house', 'cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_areas', 'cli_area_house.area_id = cli_areas.id');
        $this->db->where('cli_houses.status', 1);
        $this->db->limit($per_page, $cur_page);
        $this->db->order_by('update','desc');
        $this->db->order_by('created','desc');
//        if($soft){
//            if($soft == 'asc'){
//                $this->db->order_by('update',$soft);
//            }
//            if($soft == 'desc'){
//                $this->db->order_by('update',$soft);
//            }
//            if($soft == 'sortRentAsc'){
//                $this->db->order_by('cast(' . PREFIX .'houses'.'.rent as UNSIGNED) ','asc');
//            }
//            if($soft == 'sortRentDesc'){
//                $this->db->order_by('cast(' . PREFIX .'houses'.'.rent as UNSIGNED) ','desc');
//
//            }
//        }else{
//            $this->db->order_by('update','desc');
//        }
        $query = $this->db->get();

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }
    function getListItem($per_page, $cur_page) {
        $this->db->distinct();
        $this->db->select('
            cli_houses.id,
            cli_houses.name_en,
            cli_houses.name_jp,
            cli_houses.house_layout_id,
            cli_houses.introduction,
            cli_houses.rent,
            cli_houses.images_thumb,
            cli_house_layouts.name as house_layouts,
            cli_areas.name as area
        ');

        // Group concat house images
        $this->db->select('GROUP_CONCAT( ' . PREFIX . 'house_images.name_image ) AS list_house_images');
        $this->db->select('CONCAT( ' . PREFIX . 'house_layouts.name ) AS list_name_house_layouts');

        $this->db->from('cli_houses');
        $this->db->join('cli_area_house', 'cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_house_layouts', 'cli_houses.house_layout_id = cli_house_layouts.id');
        $this->db->join('cli_areas', 'cli_area_house.area_id = cli_areas.id');
        // Join house images
        $this->db->join(PREFIX . 'house_images', PREFIX . 'house_images' . '.house_id = ' . PREFIX . $this->table . '.id', 'left');
        $this->db->where('cli_houses.status', 1);
        $this->db->where('cli_houses.promotion !=',1);
        $this->db->limit($per_page, $cur_page);
        $this->db->order_by(PREFIX . $this->table . '.update', 'desc');
        $this->db->order_by(PREFIX . $this->table . '.created', 'desc');
        $this->db->group_by(PREFIX . $this->table . '.id');
        $query = $this->db->get();

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getListItemBack($per_page, $cur_page){
        $this->db->distinct();
        $this->db->select('
            cli_houses.id,
            cli_houses.name_en,
            cli_houses.name_jp,
            cli_houses.house_layout_id,
            cli_houses.introduction,
            cli_houses.rent,
            cli_houses.images_thumb,
            cli_house_layouts.name as house_layouts,
            cli_areas.name as area
        ');

        // Group concat house images
        $this->db->select('GROUP_CONCAT( ' . PREFIX . 'house_images.name_image ) AS list_house_images');
        $this->db->select('CONCAT( ' . PREFIX . 'house_layouts.name ) AS list_name_house_layouts');

        $this->db->from('cli_houses');
        $this->db->join('cli_area_house', 'cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_house_layouts', 'cli_houses.house_layout_id = cli_house_layouts.id');
        $this->db->join('cli_areas', 'cli_area_house.area_id = cli_areas.id');
        // Join house images
        $this->db->join(PREFIX . 'house_images', PREFIX . 'house_images' . '.house_id = ' . PREFIX . $this->table . '.id', 'left');
        $this->db->where('cli_houses.status', 1);
        $this->db->where('cli_houses.promotion',1);
        $this->db->limit($per_page, $cur_page);
        $this->db->order_by(PREFIX . $this->table . '.update', 'desc');
        $this->db->order_by(PREFIX . $this->table . '.created', 'desc');
        $this->db->group_by(PREFIX . $this->table . '.id');
        $query = $this->db->get();

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getListItemOffice($per_page, $cur_page) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->limit($per_page, $cur_page);
        $query = $this->db->get(PREFIX . "offices");

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
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
            return array();
        }
    }

    function getFacilitiesDb($id_house) {
        $this->db->select('*');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_facilities_db);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getFacilitiesDbAjax($id_house) {
        $this->db->select('id,common_facility_id as facility_id');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_facilities_db);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
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
            return array();
        }
    }

    function getAreasDb($id_house) {
        $this->db->select('*');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_areas_house_db);

        if ($query->result()) {
            return $query->row();
        } else {
            return array();
        }
    }

    function getAreas() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('is_house', 1);
        $query = $this->db->get(PREFIX . $this->table_areas);

        if ($query->result()) {

            return $query->result();
        } else {
            return array();
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
            return array();
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
            return array();
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
            return array();
        }
    }

    function getCateHouse($id){
        $this->db->select('cate_id,building_id');
        $this->db->where('status',1);
        $this->db->where('cli_cate_house.house_id',$id);
        $this->db->order_by('id','random');
        $this->db->limit(1);
        $query = $this->db->get('cli_cate_house');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function getHouseCategory($id,$rent_min ='',$rent_max = '',$area_id,$layout_id,$buildingId){
        $this->db->distinct();
        $this->db->select('rent,cli_houses.id,name,name_en,images_thumb,house_layout_id,introduction,cli_building_house.building_id');
        $this->db->join('cli_area_house','cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_areas','cli_area_house.area_id = cli_areas.id');
        $this->db->join('cli_building_house','cli_houses.id = cli_building_house.house_id');
        if(isset($rent_min) && $rent_min != ''){
            $this->db->where('cli_houses.rent >=',$rent_min);
        }
        if(isset($rent_min) && $rent_min != ''){
            $this->db->where('cli_houses.rent <=',$rent_max);
        }
        $this->db->where('cli_houses.status',1);
        $this->db->where('cli_houses.id !=',$id);
        if(isset($area_id) && $area_id != ''){
            $this->db->where('cli_area_house.area_id',$area_id);
        }
        if(isset($layout_id) && $layout_id != ''){
            $this->db->where('cli_houses.house_layout_id',$layout_id);
        }
        if(isset($buildingId) && $buildingId != ''){
            $this->db->where('cli_building_house.building_id !=',$buildingId);
        }
        $this->db->order_by('id','random');
        $this->db->limit(7);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('cli_houses');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function getBuildingHouse($list_building_id,$id){
        $this->db->select('house_id');
        $this->db->where_in('cli_building_house.building_id',$list_building_id);
        $this->db->where('cli_building_house.house_id !=',$id);
        $query = $this->db->get('cli_building_house');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function getBuildingId($id){
        $this->db->select('building_id');
        $this->db->where('cli_building_house.house_id',$id);
        $query = $this->db->get('cli_building_house');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

        function getHouseBuilding($housesId = array()){
        $this->db->distinct();
        $this->db->select ('rent,cli_areas.name,name_en,images_thumb,cli_houses.id,house_layout_id,introduction');
        $this->db->join('cli_area_house','cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_areas','cli_area_house.area_id = cli_areas.id');
        $this->db->where('cli_houses.status',1);
        $this->db->where_in('cli_houses.id',$housesId);
        $this->db->limit(7);
        $query = $this->db->get('cli_houses');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function getLayout() {
        $this->db->select('*');
        $query = $this->db->get(PREFIX . $this->table_layout_house_db);

        if ($query->result()) {
            $query->free_result();
            return $query->result();
        } else {
            return array();
        }
    }

    function get_equipment_detail($id) {
        $sql = "
            SELECT *
            FROM
            cli_equipments_house
            INNER JOIN cli_equipments ON cli_equipments_house.equipment_id = cli_equipments.id
            WHERE
            cli_equipments.`status` = 1 AND
            cli_equipments_house.house_id = $id
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_common_facility_detail($id) {
        $sql = "
            SELECT
            cli_common_facility_house.id,
            cli_common_facilities.`name`,
            cli_common_facilities.`name_image`
            FROM
            cli_common_facility_house
            INNER JOIN cli_common_facilities ON cli_common_facility_house.common_facility_id = cli_common_facilities.id
            WHERE
            cli_common_facility_house.house_id = $id
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }


    function inserImage($file) {
        $data_select = array(
            'name_image' => $file,
            'created' => date('Y-m-d H:i:s', time())
        );
        $this->db->insert(PREFIX . $this->table_image, $data_select);
        return $this->db->insert_id();
    }

    function getImg($id) {
        $sql = "
            SELECT *
            FROM
            cli_house_images
            WHERE
            cli_house_images.house_id = '$id'
            ORDER BY cli_house_images.order ASC
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    /*     * *********************search********************** */

    function getAreaID($id) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('id', $id);
        $query = $this->db->get(PREFIX . $this->table_areas);

        if ($query->result()) {

            return $query->row();
        } else {
            return array();
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

    function getEquipmentID($id) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where_in('id', $id);
        $query = $this->db->get(PREFIX . $this->table_equipments);

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
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
            return array();
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
            return array();
        }
    }
    // khanh 07082014
    function updateListHouse($rent,$introduction,$comment,$other_notice){
        $data=array();
        foreach ($rent as $key=>$value){
            $data=array(
                'rent'=>$rent[$key],
                'introduction'=>$introduction[$key],
                'comment'=>$comment[$key],
                'other_notice'=>$other_notice[$key]
            );
            $this->db->where('id',$key);
            $this->db->update(PREFIX . $this->table,$data);
            $this->insertDBTmpUpdate($key);
        }
    }

    function update_img_sort($id, $data_img){
        $this->db->where('id', $id);
        $this->db->update(PREFIX.$this->table_image, $data_img);
    }

    function insertDBTmpUpdate($id) {
        $data_field = array(
            'name_en' => '',
            'name_jp' => '',
            'introduction' => '',
            'comment' => '',
            'floors' => '',
            'receipt_type' => '',
            'deposit' => '',
            'deposit_return' => '',
            'contract' => '',
            'move_out' => '',
            'other_notice' => '',
            'payment_method' => '',
            'recent_residence' => '',
            'cleaning_day_week' => '',
            'bed_making' => '',
            'bed_making_day_week' => '',
            'consumables_replenishment' => '',
            'closing_time' => '',
            'key' => '',
            'others_stay' => '',
            'others_stay_notice' => '',
            'rent_condition' => '',
            'electric_bill' => '',
            'gas_bill' => '',
            'drink_water_bill' => '',
            'water_bill' => '',
            'laundry_service' => '',
            'city_call_bill' => '',
            'country_call_bill' => '',
            'international_call_bill' => '',
            'cleaning' => '',
            'internet' => '',
            'premium_nhk' => '',
            'bringing_furniture' => '',
            'pet' => '',
            'rent_notice' => ''
        );
        $result = $this->getDetailManagement($id);
        if(isset($result[0]) && $result[0]){
            $item = $result[0];
            foreach ($data_field as $key => $value) {
                if ($key == 'rent') {
                    $data_test[] = $item->$key . ' USD';
                } elseif ($key == 'size') {
                    $data_test[] = $item->$key . 'm2';
                } else {
                    $data_test[] = implode(',', (array)json_decode($item->$key));
                }
            }

            $areas_db = $this->getAreasDb($id);
            if($areas_db) {
                $tmp  = $this->getAreaID($areas_db->area_id);
                if($tmp){
                    $data_test[] = implode(',', (array)json_decode($tmp->name));
                }
            }

            $category_db = $this->getCategoryDb($id);
            $category_id = array();
            if($category_db){
                foreach($category_db as $key=>$v)
                {
                    $category_id[] = $v->cate_id;
                }
            }
            if($category_id) {
                $tmp  = $this->getCategoryID($category_id);
                if($tmp){
                    foreach($tmp as $k=>$v){
                        $data_test[] = implode(',', (array)json_decode($v->name));
                    }
                }
            }

            $category_special = $this->getCategory(1, 2);
            $category_special_id = array();
            if($category_special[0] && isset($category_special[0]))
            {
                foreach($category_special as $k=>$v){
                    $category_special_id[] = $v->id;
                }
            }
            if($category_special_id) {
                $tmp  = $this->getCategoryID($category_special_id);
                if($tmp){
                    foreach($tmp as $k=>$v){
                        $data_test[] = implode(',', (array)json_decode($v->name));
                    }
                }
            }

            $facilitie_db = $this->getFacilitiesDb($id);
            if($facilitie_db[0] && $facilitie_db[0]) {
                $data_tmp = $facilitie_db[0];
                $tmp  = $this->getFacilitieID($data_tmp->common_facility_id);
                if($tmp){
                    foreach($tmp as $k=>$v){
                        $data_test[] = $v->name;
                    }
                }
            }

            $equipments_db = $this->getEquipmentsDb($id);
            $equipments_id = array();
            if($equipments_db){
                foreach($equipments_db as $key=>$v)
                {
                    $equipments_id[] = $v->equipment_id;
                }
            }

            if($equipments_id) {
                $tmp  = $this->getEquipmentID($equipments_id);
                if($tmp){
                    foreach($tmp as $k=>$v){
                        $data_test[] = implode(',', (array)json_decode($v->name));
                    }
                }
            }
            if ($item->house_layout_id != "") {
                $tmp = $this->getLayoutID($item->house_layout_id);
                if (isset($tmp[0]) && $tmp[0]) {
                    foreach ($tmp as $k => $v) {
                        $data_test[] = implode(',', (array)json_decode($v->name));
                    }
                }
            }

            $this->db->where('houses_id', $id);
            $this->db->delete(PREFIX . 'houses_db');
            $data_select = array(
                'houses_id' => $id,
                'content' => implode(',', array_unique($data_test))
            );
            $this->db->insert(PREFIX . 'houses_db', $data_select);

        }
    }

    function getEquipmentsDb($id_house) {
        $this->db->select('*');
        $this->db->where('house_id', $id_house);
        $query = $this->db->get(PREFIX . $this->table_equipments_house_db);

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
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
            return array();
        }
    }

    function getTagsList() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get(PREFIX . $this->table_tags);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getCategoriesBuilding($data, $per_page, $cur_page){
        $data['areas'] = 'house';
        $data['table']= 'houses';
        $this->db->distinct();
        $this->db->select(PREFIX . 'areas.name as area_name');
        $this->db->select(PREFIX . $data['table'] . '.*');
        $this->db->where(PREFIX . $data['table'] . '.status', 1);
        $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
        $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');

        if ($data['categories_id'] != '') {
            $this->db->join(PREFIX . 'cate_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'cate_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
            $this->db->join(PREFIX . $this->table_category, PREFIX . $this->table_category . '.id = ' . PREFIX . 'cate_' . $data['areas'] . '.cate_id', 'left');
            $this->db->where(PREFIX . $this->table_category . '.id', $data['categories_id']);

            $this->db->order_by(PREFIX . $data['table'] . '.update', 'desc');
            $this->db->order_by(PREFIX . $data['table'] . '.created', 'desc');
            $this->db->limit($per_page, $cur_page);

            $query = $this->db->get(PREFIX . $data['table']);

            if ($query->result()) {

                return $query->result();
            } else {
                return false;
            }
        }
    }

    function getTotalCategoriesBuilding($data)
    {
        $data['areas'] = 'house';
        $data['table']= 'houses';
        $this->db->distinct();
        $this->db->select(PREFIX . 'areas.name as area_name');
        $this->db->select(PREFIX . $data['table'] . '.*');
        $this->db->where(PREFIX . $data['table'] . '.status', 1);
        $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
        $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');

        if ($data['categories_id'] != '') {
            $this->db->join(PREFIX . 'cate_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'cate_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
            $this->db->join(PREFIX . $this->table_category, PREFIX . $this->table_category . '.id = ' . PREFIX . 'cate_' . $data['areas'] . '.cate_id', 'left');
            $this->db->where(PREFIX . $this->table_category . '.id', $data['categories_id']);

            $query = $this->db->get(PREFIX . $data['table']);
            if ($query->result()) {
                return count($query->result());
            } else {
                return 0;
            }
        }
    }

    function getTypeAjax($id){
        $this->db->select('type');
        $this->db->where('id',$id);
        $query = $this->db->get('cli_houses');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getImagesThumb($id){
        $this->db->select('images_thumb');
        $this->db->where('id',$id);
        $query = $this->db->get('cli_houses');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getListPromotion($per_page, $cur_page){
        $this->db->select('cli_houses.*, cli_areas.name as area_name');
        $this->db->from('cli_houses');
        $this->db->join('cli_area_house', 'cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_areas', 'cli_area_house.area_id = cli_areas.id');
        $this->db->where('cli_houses.status', 1);
        $this->db->where('cli_houses.promotion',1);
        $this->db->limit($per_page, $cur_page);
        $this->db->order_by('update','desc');
        $this->db->order_by('created','desc');
        $query = $this->db->get();

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function countListPromotion(){
        $this->db->select('cli_houses.*, cli_areas.name as area_name');
        $this->db->from('cli_houses');
        $this->db->join('cli_area_house', 'cli_houses.id = cli_area_house.house_id');
        $this->db->join('cli_areas', 'cli_area_house.area_id = cli_areas.id');
        $this->db->where('cli_houses.status', 1);
        $this->db->where('cli_houses.promotion',1);
        $query = $this->db->count_all_results();
        if ($query) {
            return $query;
        } else {
            return 0;
        }
    }
}
