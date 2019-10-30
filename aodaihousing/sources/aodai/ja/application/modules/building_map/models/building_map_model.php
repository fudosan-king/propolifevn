<?php

class Building_map_model extends MY_Model {

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
        $this->db->order_by("order_in_map",'asc');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $this->db->where('(`name` LIKE "%' . $content . '%" or id LIKE "%' . $content . '%" or district LIKE "%' . $content . '%")');
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
            $this->db->where('modified >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('modified <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('modified >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('modified <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('price_from') != '' && is_numeric($this->input->post('price_from'))) {

            $this->db->where('rent >=' . $this->input->post('price_from'));
        }
        if ($this->input->post('price_to') != '' && is_numeric($this->input->post('price_to'))) {
            $this->db->where('rent <=' . $this->input->post('price_to'));
        }
        $query = $this->db->get($this->table);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function getTotalsearchContent(){
        $this->db->select('*');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $this->db->where('(`name` LIKE "%' . $content . '%" or id LIKE "%' . $content . '%" or district LIKE "%' . $content . '%")');
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
            $this->db->where('modified >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('modified <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('modified >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('modified <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('price_from') != '' && is_numeric($this->input->post('price_from'))) {
            $this->db->where('rent >=' . $this->input->post('price_from'));

        }

        if ($this->input->post('price_to') != '' && is_numeric($this->input->post('price_to'))) {
            $this->db->where('rent <=' . $this->input->post('price_to'));
        }
        
        $query = $this->db->get($this->table);

        if ($query->result()) {
            return count($query->result());
        } else {
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

    function getDetailManagement($id){
        $this->db->select('*');
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);

        if ($query->result()) {
            return $query->result();
        } else {
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
    
    function saveManagement() {
        $data = array(
            'order_in_map' => $this->input->post('order_in_map'),
            'modified_order_in_map' => date('Y-m-d H:i:s', time())
        );
        $this->db->where('id', $this->input->post('hiddenIdAdmincp'));
        if ($this->db->update($this->table, $data)) {
            return true;
        }
        return false;
    }
}