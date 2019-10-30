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
    private $table_building_office_db = 'building_office';
    private $table_image = 'office_images';
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
            $this->db->where('(`comment` LIKE "%' . $content . '%" or introduction LIKE "%' . $content . '%" or other_notice LIKE "%' . $content . '%")');
        }

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

            $this->db->where('month_rent >=' . $this->input->post('price_from'));
        }
        if ($this->input->post('price_to') != '' && is_numeric($this->input->post('price_to'))) {
            $this->db->where('month_rent <=' . $this->input->post('price_to'));
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
            $this->db->where('(`comment` LIKE "%' . $content . '%" or introduction LIKE "%' . $content . '%" or other_notice LIKE "%' . $content . '%")');
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

            $this->db->where('month_rent >=' . $this->input->post('price_from'));
        }
        if ($this->input->post('price_to') != '' && is_numeric($this->input->post('price_to'))) {
            $this->db->where('month_rent <=' . $this->input->post('price_to'));
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

    function saveManagement($fileName = '', $fileName_gallery = '') {
        $data = array(
            'status' => '',
            'recommended' => ''
        );
        $data_test = array();

        foreach ($data as $key => $value) {
            if ($this->input->post($key) == 'on') {
                $data[$key] = 1;
            } else {
                $data[$key] = 0;
            }
        }

        $month_rent = $this->input->post('month_rent');
        $data['month_rent'] = $month_rent['jp'];
        $size = $this->input->post('size');
        $data['size'] = $size['jp'];
        $size_rent = $this->input->post('size_rent');
        $data['size_rent'] = $size_rent['jp'];

        $data_field = array(
            'name_jp' => '',
            'name_en' => '',
            'images_thumb' => '',
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
            'electric_bill' => '',
            'drink_water_bill' => '',
            'water_bill' => '',
            'phone_bill' => '',
            'closing_time' => '',
            'bringing_furniture' => '',
            'comment' => '',
            'license' => '',
            'cleaning' => '',
            'internet' => '',
            'premium_nhk' => '',
            'rent_notice' => '',
            'gas_bill' => ''
        );

        foreach ($data_field as $key => $value) {
            $data[$key] = json_encode($this->input->post($key));

            if ($key == 'month_rent') {
                $data_test[] = $this->input->post($key) . ' USD/月';
            } elseif ($key == 'size') {
                $data_test[] = $this->input->post($key) . 'm2';
            }else {
                $data_test[] = $this->input->post($key);
            }
        }
        $publish_to = $this->input->post('vcp_publish_to');

        if ($this->input->post('hiddenIdAdmincp') == 0) {

            $data['created'] = date('Y-m-d H:i:s', time());
            $data['update'] = date('Y-m-d H:i:s', time());
            $data['images_thumb'] = $fileName['images_thumb'];
            $data['images_gallery'] = json_encode($fileName_gallery);

            if ($this->db->insert(PREFIX . $this->table, $data)) {

                $id_office = $this->db->insert_id();
                /* ========save gallery============== */
                $data_gl = $this->input->post('gl');
                if ($data_gl) {
                    $data_img = array();
                    foreach ($data_gl as $gl) {
                        $data_img['office_id'] = $id_office;
                        $this->db->where('id', $gl);
                        $this->db->update(PREFIX . $this->table_image, $data_img);
                    }
                }

                /********save common_facilities*********/

                $data_common_facilities = array(
                    'office_id' => $id_office,
                    'common_facility_id' => $this->input->post('common_facilities'),
                    'created' => date('Y-m-d H:i:s', time()),
                    'modified' => date('Y-m-d H:i:s', time())
                );
                $this->db->insert(PREFIX . $this->table_facilities_db, $data_common_facilities);

                /********save equipments*********/
                $data_select = array(
                    'office_id' => $id_office,
                    'equipment_id' => $this->input->post('equipments'),
                    'created' => date('Y-m-d H:i:s', time()),
                    'modified' => date('Y-m-d H:i:s', time())
                );
                $this->db->where('office_id', $id_office);
                $this->db->insert(PREFIX . $this->table_equipments_office_db, $data_select);

                /********save areas*********/
                $data_select = array(
                    'office_id' => $id_office,
                    'area_id' => $this->input->post('areas'),
                    'created' => date('Y-m-d H:i:s', time()),
                    'modified' => date('Y-m-d H:i:s', time())
                );
                $this->db->where('office_id', $id_office);
                $this->db->insert(PREFIX . $this->table_areas_office_db, $data_select);


                /********save category*********/
                $category_main = $this->input->post('category_main');
                if ($category_main) {
                    foreach ($category_main as $item) {
                        $data_select = array(
                            'office_id' => $id_office,
                            'cate_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_category_office_db, $data_select);
                    }
                }

                $category_special = $this->input->post('category_special');
                if ($category_special) {
                    foreach ($category_special as $item) {
                        $data_select = array(
                            'office_id' => $id_office,
                            'cate_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_category_office_db, $data_select);
                    }
                }
                
                /********save tags*********/
                $tags = $this->input->post('tags');
                if ($tags) {
                    foreach ($tags as $item) {
                        $data_select = array(
                            'office_house_id' => $id_office,
                            'tags_id' => $item,
                            'type' => 1,
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
                            'office_id' => $id_office,
                            'equipment_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_equipments_office_db, $data_select);
                    }
                }

                /********save Facilities*********/
                $facilities = $this->input->post('facilities');
                if ($facilities) {
                    foreach ($facilities as $item) {
                        $data_select = array(
                            'office_id' => $id_office,
                            'common_facility_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'created' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_facilities_db, $data_select);
                    }
                }
                /* =====================Search====================== */
                $this->insertDBTmp($id_office, $data_test);
                return true;
            }
        } else {
            //Xử lý xóa hình khi update thay đổi hình
            $result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));

            if ($fileName['images_thumb'] == '') {
                $fileName['images_thumb'] = $result[0]->images_thumb;
            } else {
                @unlink(BASEFOLDER . 'static/uploads/offices/' . $result[0]->images_thumb);
            }

            $id_office = $this->input->post('hiddenIdAdmincp');
            /* ========save gallery============== */
            $data_gl = $this->input->post('gl');
            if ($data_gl) {
                $data_img = array();
                foreach ($data_gl as $gl) {
                    $data_img['office_id'] = $id_office;
                    $this->db->where('id', $gl);
                    $this->db->update(PREFIX . $this->table_image, $data_img);
                }
            }

            $data['images_thumb'] = $fileName['images_thumb'];
            $data['images_gallery'] = json_encode($fileName_gallery);
            $data['update'] = date('Y-m-d H:i:s', time());
            $this->db->where('id', $this->input->post('hiddenIdAdmincp'));

            if ($this->db->update(PREFIX . $this->table, $data)) {
                /********save common_facilities*********/

                $data_common_facilities = array(
                    'office_id' => $id_office,
                    'common_facility_id' => $this->input->post('common_facilities'),
                    'modified' => date('Y-m-d H:i:s', time())
                );
                $this->db->where('office_id', $id_office);
                $this->db->delete(PREFIX . $this->table_facilities_db);
                $this->db->insert(PREFIX . $this->table_facilities_db, $data_common_facilities);

                /********save common_facilities*********/
                $data_select = array(
                    'office_id' => $id_office,
                    'equipment_id' => $this->input->post('equipments'),
                    'modified' => date('Y-m-d H:i:s', time())
                );
                $this->db->where('office_id', $id_office);
                $this->db->delete(PREFIX . $this->table_equipments_office_db);
                $this->db->insert(PREFIX . $this->table_equipments_office_db, $data_select);

                /********save common_facilities*********/
                $data_select = array(
                    'office_id' => $id_office,
                    'area_id' => $this->input->post('areas'),
                    'modified' => date('Y-m-d H:i:s', time())
                );
                $this->db->where('office_id', $id_office);
                $this->db->delete(PREFIX . $this->table_areas_office_db);
                $this->db->insert(PREFIX . $this->table_areas_office_db, $data_select);

                /******** Update Building *********/
                $building_type = $this->input->post('building_type');
                if ($building_type) {
                    $this->db->where('office_id', $id_office);
                    $this->db->delete(PREFIX . $this->table_building_office_db);
                    
                        $data_select = array(
                            'office_id' => $id_office,
                            'building_id' => $building_type,
                            'modified' => date('Y-m-d H:i:s', time())
                        );

                        $this->db->insert(PREFIX . $this->table_building_office_db, $data_select);
                }

                /********save category*********/
                $category_main = $this->input->post('category_main');
                $this->db->where('office_id', $id_office);
                $this->db->where('type', 0);
                $this->db->delete(PREFIX . $this->table_category_office_db);
                if ($category_main) {

                    foreach ($category_main as $item) {
                        $data_select = array(
                            'office_id' => $id_office,
                            'cate_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'type' => 0
                        );

                        $this->db->insert(PREFIX . $this->table_category_office_db, $data_select);
                    }
                }

                $category_special = $this->input->post('category_special');
                $this->db->where('office_id', $id_office);
                $this->db->where('type', 1);
                $this->db->delete(PREFIX . $this->table_category_office_db);

                if ($category_special) {

                    foreach ($category_special as $item) {
                        $data_select = array(
                            'office_id' => $id_office,
                            'cate_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time()),
                            'type' => 1
                        );

                        $this->db->insert(PREFIX . $this->table_category_office_db, $data_select);
                    }
                }
                
                /********save tags*********/
                $tags = $this->input->post('tags');
                $this->db->where('office_house_id', $id_office);
                $this->db->where('type', 1);
                $this->db->delete(PREFIX . $this->table_tags_db);
                if ($tags) {

                    foreach ($tags as $item) {
                        $data_select = array(
                            'office_house_id' => $id_office,
                            'tags_id' => $item,
                            'type' => 1,
                            'modified' => date('Y-m-d H:i:s', time()),
                        );

                        $this->db->insert(PREFIX . $this->table_tags_db, $data_select);
                    }
                }

                /********save Equipments*********/
                $equipment = $this->input->post('equipment');
                $this->db->where('office_id', $id_office);
                $this->db->delete(PREFIX . $this->table_equipments_office_db);
                if ($equipment) {

                    foreach ($equipment as $item) {
                        $data_select = array(
                            'office_id' => $id_office,
                            'equipment_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time())
                        );

                        $this->db->insert(PREFIX . $this->table_equipments_office_db, $data_select);
                    }
                }

                /********save Facilities*********/
                $facilities = $this->input->post('facilities');
                $this->db->where('office_id', $id_office);
                $this->db->delete(PREFIX . $this->table_facilities_db);
                if ($facilities) {

                    foreach ($facilities as $item) {
                        $data_select = array(
                            'office_id' => $id_office,
                            'common_facility_id' => $item,
                            'modified' => date('Y-m-d H:i:s', time())
                        );

                        $this->db->insert(PREFIX . $this->table_facilities_db, $data_select);
                    }
                }

                /* =====================Search====================== */
                $this->insertDBTmp($id_office, $data_test);

                return true;
            }
        }
        return false;
    }

    function insertDBTmp($id_office, $data_test) {
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
        $this->db->where('offices_id', $id_office);
        $this->db->delete(PREFIX . 'offices_db');
        $data_select = array(
            'offices_id' => $id_office,
            'content' => implode(',', array_unique($data_test))
        );

        $this->db->insert(PREFIX . 'offices_db', $data_select);
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

    function getDetail($id) {
        $sql = "
                SELECT
                cli_offices.*, cli_areas.`name`,cli_areas.`id` as area_id
                FROM
                cli_offices
                INNER JOIN cli_area_office ON cli_offices.id = cli_area_office.office_id
                INNER JOIN cli_areas ON cli_area_office.area_id = cli_areas.id
                WHERE
                cli_offices.id = $id

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
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->result()) {
            return count($query->result());
        } else {
            return false;
        }
    }

    function getListItem($per_page, $cur_page) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->limit($per_page, $cur_page);
        $query = $this->db->get(PREFIX . $this->table);

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

    function getFacilitiesDb($id_office) {
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
        $query = $this->db->get(PREFIX . $this->table_facilities_db);

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getEquipmentsDb($id_office) {
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
        $query = $this->db->get(PREFIX . $this->table_equipments_office_db);

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

    function getAreasDb($id_office) {
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
        $query = $this->db->get(PREFIX . $this->table_areas_office_db);

        if ($query->result()) {
            return $query->row();
        } else {
            return array();
        }
    }

    function getAreas($type = 0) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('is_office', 1);
        $query = $this->db->get(PREFIX . $this->table_areas);

        if ($query->result()) {

            return $query->result();
        } else {
            return array();
        }
    }
    function getBuildingDb($id_office) {
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
        $query = $this->db->get(PREFIX . $this->table_building_office_db);

        if ($query->result()) {
            $query->free_result();
            return $query->result();
        } else {
            return array();
        }
    }

    function getCategoryDb($id_office) {
        $this->db->select('*');
        $this->db->where('office_id', $id_office);
        $query = $this->db->get(PREFIX . $this->table_category_office_db);
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

    function getCateOffice($id){
        $this->db->select('cate_id');
        $this->db->where('status',1);
        $this->db->where('cli_cate_office.office_id',$id);
        $this->db->order_by('id','random');
        $this->db->limit(1);
        $query = $this->db->get('cli_cate_office');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function getBuildingId($id){
        $this->db->select('building_id');
        $this->db->where('status',1);
        $this->db->where('cli_cate_office.office_id',$id);
        $query = $this->db->get('cli_cate_office');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function getOfficeCategory($id,$rent_min ='',$rent_max ='',$area_id,$size){
        $this->db->distinct();
        $this->db->select('month_rent,name,name_en,images_thumb,cli_offices.id,introduction');
        $this->db->join('cli_area_office','cli_offices.id = cli_area_office.office_id');
        $this->db->join('cli_areas','cli_area_office.area_id = cli_areas.id');
        if(isset($rent_min) && $rent_min != ''){
            $this->db->where('cli_offices.month_rent >=',$rent_min);
        }
        if(isset($rent_min) && $rent_min != ''){
            $this->db->where('cli_offices.month_rent <=',$rent_max);
        }
        if(isset($area_id) && $area_id != ''){
            $this->db->where('cli_area_office.area_id',$area_id);
        }
        if(isset($size) && $size != ''){
            $this->db->where('cli_offices.size',$size);
        }
        $this->db->where('cli_offices.status',1);
        $this->db->where('cli_offices.id !=',$id);
        $this->db->order_by('id','random');
        $this->db->limit(7);
        $query = $this->db->get('cli_offices');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function getBuildingOffice($list_building_id,$id){
        $this->db->select('office_id');
        $this->db->where('cli_cate_office.status',1);
        $this->db->where_in('cli_cate_office.building_id',$list_building_id);
        $this->db->where('cli_cate_office.office_id !=',$id);
        $query = $this->db->get('cli_cate_office');

        if ($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }


    function getOfficeBuiding($list_office_id =array()){
        $this->db->select('month_rent,cli_areas.name,name_en,images_thumb,cli_offices.id');
        $this->db->join('cli_area_office','cli_offices.id = cli_area_office.office_id');
        $this->db->join('cli_areas','cli_area_office.area_id = cli_areas.id');
        $this->db->where('cli_offices.status',1);
        $this->db->where_in('cli_offices.id',$list_office_id);
        $this->db->order_by('id','random');
        $this->db->limit(7);
        $query = $this->db->get('cli_offices');

        if ($query->result()){
            return $query->result();
        }else{
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
    
    function getTagsDB($id, $type) {
        $this->db->select('*');
        $this->db->where('office_house_id', $id);
        $this->db->where('type', $type);
        $query = $this->db->get(PREFIX . $this->table_tags_db);
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
            cli_equipments_office
            INNER JOIN cli_equipments ON cli_equipments_office.equipment_id = cli_equipments.id
            WHERE
            cli_equipments.`status` = 1 AND
            cli_equipments_office.office_id = $id
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
            cli_office_images
            WHERE
            cli_office_images.office_id = '$id'
            ORDER BY cli_office_images.order ASC
            
        ";
        $query = $this->db->query($sql);
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

    function get_common_facility_detail($id) {
        $sql = "
            SELECT
            cli_common_facility_office.id,
            cli_common_facilities.`name`,
            cli_common_facilities.`name_image`
            FROM
            cli_common_facility_office
            INNER JOIN cli_common_facilities ON cli_common_facility_office.common_facility_id = cli_common_facilities.id
            WHERE
            cli_common_facility_office.office_id = $id
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
        $query = $this->db->get(PREFIX . $this->table_layout_office_db);

        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function update_img_sort($id, $data_img) {
        $this->db->where('id', $id);
        $this->db->update(PREFIX . $this->table_image, $data_img);
    }

    function insertDBTmpUpdate($id) {
        $data_field = array(
            'name_jp' => '',
            'name_en' => '',
            'images_thumb' => '',
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
            'electric_bill' => '',
            'drink_water_bill' => '',
            'water_bill' => '',
            'phone_bill' => '',
            'closing_time' => '',
            'bringing_furniture' => '',
            'comment' => '',
            'license' => '',
            'cleaning' => '',
            'internet' => '',
            'premium_nhk' => '',
            'rent_notice' => '',
            'gas_bill' => ''
        );
        $result = $this->getDetailManagement($id);
        if (isset($result[0]) && $result[0]) {
            $item = $result[0];
            foreach ($result[0] as $key => $value) {
                if ($key == 'month_rent') {
                    $data_test[] = $item->$key . ' USD/月';
                } elseif ($key == 'size') {
                    $data_test[] = json_decode($item->$key) . 'm2';
                } else {
                    $data_test[] = implode(',', (array) json_decode($item->$key));
                }
            }

            $areas_db = $this->getAreasDb($id);
            if ($areas_db) {
                $tmp = $this->getAreaID($areas_db->area_id);
                if ($tmp) {
                    $data_test[] = implode(',', (array) json_decode($tmp->name));
                }
            }

            $facilitie_db = $this->getFacilitiesDb($id);
            if ($facilitie_db[0] && $facilitie_db[0]) {
                $data_tmp = $facilitie_db[0];
                $tmp = $this->getFacilitieID($data_tmp->common_facility_id);
                if ($tmp) {
                    foreach ($tmp as $k => $v) {
                        $data_test[] = $v->name;
                    }
                }
            }

            $equipments_db = $this->getEquipmentsDb($id);
            $equipments_id = array();
            if ($equipments_db) {
                foreach ($equipments_db as $key => $v) {
                    $equipments_id[] = $v->equipment_id;
                }
            }

            if ($equipments_id) {
                $tmp = $this->getEquipmentID($equipments_id);
                if ($tmp) {
                    foreach ($tmp as $k => $v) {
                        $data_test[] = implode(',', (array) json_decode($v->name));
                    }
                }
            }

            $category_db = $this->getCategoryDb($id);
            $category_id = array();
            if ($category_db) {
                foreach ($category_db as $key => $v) {
                    $category_id[] = $v->cate_id;
                }
            }
            if ($category_id) {
                $tmp = $this->getCategoryID($category_id);
                if ($tmp) {
                    foreach ($tmp as $k => $v) {
                        $data_test[] = implode(',', (array) json_decode($v->name));
                    }
                }
            }

            $category_special = $this->getCategory(1, 2);
            $category_special_id = array();
            if ($category_special[0] && isset($category_special[0])) {
                foreach ($category_special as $k => $v) {
                    $category_special_id[] = $v->id;
                }
            }
            if ($category_special_id) {
                $tmp = $this->getCategoryID($category_special_id);
                if ($tmp) {
                    foreach ($tmp as $k => $v) {
                        $data_test[] = implode(',', (array) json_decode($v->name));
                    }
                }
            }
            $this->db->where('offices_id', $id);
            $this->db->delete(PREFIX . 'offices_db');
            $data_select = array(
                'offices_id' => $id,
                'content' => implode(',', array_unique($data_test))
            );
            $this->db->insert(PREFIX . 'offices_db', $data_select);
        }
    }

    // khanh 07082014 
    function updateListHouse($rent, $introduction, $comment, $other_notice) {
        $data = array();
        foreach ($rent as $key => $value) {
            $data = array(
                'month_rent' => $rent[$key],
                'introduction' => $introduction[$key],
                'comment' => $comment[$key],
                'other_notice' => $other_notice[$key]
            );
            $this->db->where('id', $key);
            $this->db->update(PREFIX . $this->table, $data);
            $this->insertDBTmpUpdate($key);
        }
    }

    function getImagesThumb($id){
        $this->db->select('images_thumb');
        $this->db->where('id',$id);
        $query = $this->db->get('cli_offices');
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

}
