<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends MY_Model {

    private $table_areas = 'areas';
    private $table_areas_house = 'area_house';
    private $table_house = 'houses';
    private $table_layouts_house = 'house_layouts';
    private $table_category = 'category';

    function getAreas($type = 0, $no = true) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', $type);
        $this->db->or_where('type', 0);
        if ($no != true) {
            $this->db->or_where('type', 0);
        }
        $this->db->order_by("name", "desc");
        $query = $this->db->get(PREFIX . $this->table_areas);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getLayouts() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get(PREFIX . $this->table_layouts_house);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function search_model($data, $per_page, $cur_page) {
        if ($data['s'] != '') {
            $s = trim($data['s']);
            $spaces = preg_match('/ /', $s);
            if ($spaces > 0) {
                $s_array = explode(' ', $s);
                foreach ($s_array as $v) {
                    $this->db->like('content', mysql_real_escape_string($v));
                }
            } else {
                $this->db->like('content', mysql_real_escape_string($data['s']));
            }

            $this->db->select('*');
            $query = $this->db->get(PREFIX . $data['table'] . '_db');
            if ($query->result()) {
                $id_p = array();
                foreach ($query->result() as $k => $v) {
                    $type = $data['table'] . '_id';
                    $id_p[] = $v->$type;
                }
                if ($id_p) {
                    $this->db->distinct();
                    $this->db->select(PREFIX . 'areas' . ".name");
                    $this->db->select(PREFIX . $data['table'] . '.*');
                    $this->db->where(PREFIX . $data['table'] . '.status', 1);
                    $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
                    $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');
                    if ($data['table'] == 'houses') {
                        $this->db->join(PREFIX . 'house_layouts', PREFIX . 'house_layouts' . '.id = ' . PREFIX . $data['table'] . '.house_layout_id', 'left');
                        $this->db->select(PREFIX . 'house_layouts.name AS house_layouts');
                    }
                    $this->db->where_in(PREFIX . $data['table'] . '.id', $id_p);
                    $this->db->limit($per_page, $cur_page);
                    $this->db->order_by('update', 'desc');
                    $this->db->order_by('created', 'desc');
                    $query = $this->db->get(PREFIX . $data['table']);
                    if ($query->result()) {
                        return $query->result();
                    }
                }
                return false;
            }
            return false;
        } else {
            $this->db->distinct();
            $this->db->select(PREFIX . 'areas' . ".name");
            $this->db->select(PREFIX . $data['table'] . '.*');
            $this->db->where(PREFIX . $data['table'] . '.status', 1);
            $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
            $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');
            if ($data['size'] != '') {
                switch ($data['size']) {
                    case '50':
                        $this->db->where('size <=', 50);
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
                        $this->db->where('size >=', 151);
                        break;
                }
            }

            if ($data['localtion'] != '') {
                if ($data['localtion'] != '-1') {
                    $this->db->where(PREFIX . 'area_' . $data['areas'].'.area_id', $data['localtion']);
                } else if ($data['areas'] == 'office') {
                    $list_area=array('2','11','10','8','5','13');
                    $this->db->where_not_in(PREFIX . 'area_' . $data['areas'].'.area_id',$list_area);
                } else {
                    $list_area=array('2','11','3','10','5','13','17');
                    $this->db->where_not_in(PREFIX . 'area_' . $data['areas'].'.area_id',$list_area);
                }
            }
            if ($data['catid'] != '') {
                $this->db->join(PREFIX . 'cate_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'cate_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
                $this->db->join(PREFIX . $this->table_category, PREFIX . $this->table_category . '.id = ' . PREFIX . 'cate_' . $data['areas'] . '.cate_id', 'left');
                $this->db->where(PREFIX . $this->table_category . '.id', $data['catid']);
            }
            if ($data['table'] == 'houses') {
                if ($data['type'] != '') {
                    $this->db->where(PREFIX . $data['table'] . '.type', $data['type']);
                }
                if ($data['rent'] != '') {
                    switch ($data['rent']) {
                        case '500':
                            $this->db->where(PREFIX . $data['table'] . '.rent <=', 500);
                            break;
                        case '501-1000':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 501);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 1000);
                            break;
                        case '1001-1500':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 1001);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 1500);
                            break;
                        case '1501-2000':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 1501);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 2000);
                            break;
                        case '2001-2500':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 2001);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 2500);
                            break;
                        case '2501-3000':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 2501);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 3000);
                            break;
                        case '3001':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 3001);
                            break;
                    }
                }
                if ($data['layout'] != '') {
                    $this->db->where(PREFIX . $data['table'] . '.house_layout_id', $data['layout']);
                }
                $this->db->join(PREFIX . 'house_layouts', PREFIX . 'house_layouts' . '.id = ' . PREFIX . $data['table'] . '.house_layout_id', 'left');
                $this->db->select(PREFIX . 'house_layouts.name AS house_layouts');
            }
            if ($data['table'] == 'offices') {
                if ($data['month_rent'] != '') {
                    switch ($data['month_rent']) {
                        case '1000':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 1000);
                            break;
                        case '1001-1500':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 1001);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 1500);
                            break;
                        case '1501-2000':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 1501);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 2000);
                            break;
                        case '2001-2500':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 2001);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 2500);
                            break;
                        case '2501-3000':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 2501);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 3000);
                            break;
                        case '3001-3500':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 3001);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 3500);
                            break;
                        case '3501':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent > ', 3501);
                            break;
                    }
                }

                if ($data['size_rent'] != '') {
                    switch ($data['size_rent']) {
                        case '10':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent', 10);
                            $this->db->where(PREFIX . $data['table'] . '.size_rent', 10);
                            break;
                        case '11-25':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent >', 11);
                            $this->db->where(PREFIX . $data['table'] . '.size_rent < ', 25);
                            break;
                        case '26-49':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent >', 26);
                            $this->db->where(PREFIX . $data['table'] . '.size_rent < ', 49);
                            break;
                        case '50-99':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent >', 50);
                            $this->db->where(PREFIX . $data['table'] . '.size_rent < ', 99);
                            break;
                        case '100':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent', 100);
                            break;
                    }
                }
            }
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
    /**desciption: search
     * @param $areaName
     * @param $layout
     * @param $type
     * @param $size
     * @param $rent
     * @param $cboApartment
     * @param $search
     * @param $data
     * @param string $per_page item display of one page
     * @param int $cur_page
     * @return bool
     */
    public function getSearch($areaName,$layout,$type,$size,$rent,$cboApartment,$Search,$data,$per_page= 5 , $cur_page= 0){
        $this->db->distinct();
        $this->db->select(PREFIX . 'areas.name as area_name');
        $this->db->select(PREFIX . $data['table'] . '.*');
        $this->db->where(PREFIX . $data['table'] . '.status', 1);
        $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
        $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');
        if ($areaName != '') {
            if ($areaName != '-1') {
                $this->db->where(PREFIX . 'area_' . $data['areas'].'.area_id', $areaName);
            } else if ($data['areas'] == 'office') {
                $list_area=array('2','11','10','8','5','13');
                $this->db->where_not_in(PREFIX . 'area_' . $data['areas'].'.area_id',$list_area);
            } else {
                $list_area=array('2','11','3','10','5','13','17');
                $this->db->where_not_in(PREFIX . 'area_' . $data['areas'].'.area_id',$list_area);
            }
        }
        if ($data['table'] == 'houses') {
            $this->db->join(PREFIX . 'house_layouts', PREFIX . 'house_layouts' . '.id = ' . PREFIX . $data['table'] . '.house_layout_id', 'left');
            $this->db->order_by(PREFIX . $data['table'] . '.created', $data['sort']);
            if ($layout != '') {
                    $this->db->where(PREFIX . $data['table'] . '.type', $layout);
                }
            if ($type != '') {
                $this->db->where(PREFIX . $data['table'] . '.house_layout_id', $type);
            }
            if ($size != '') {
                $size = explode('-', $size);
                if (count($size) == 1) {
                    $this->db->where(PREFIX . $data['table'] . '.size <', intval($size[0]));
                } else {
                    $this->db->where(PREFIX . $data['table'] . '.size >', intval($size[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size <', intval($size[1]));
                }
            }
            if ($Search != '') {
                    $this->db->like(PREFIX . $data['table'] . '.size',$Search);
                    $this->db->or_like(PREFIX . $data['table'] . '.rent',$Search);
                    $this->db->or_like(PREFIX . $data['table'] . '.type',$Search);
            }
            if (isset($data['inputMin'])){
                $this->db->where(PREFIX . $data['table'] . '.rent >', intval($data['inputMin']));
            }
            if($data['inputMax']!=''){
                $this->db->where(PREFIX . $data['table'] . '.rent <', intval($data['inputMax']));
            }

        } else if ($data['table'] == 'office') {
            $this->db->order_by(PREFIX . $data['table'] . '.update', 'desc');
            $this->db->order_by(PREFIX . $data['table'] . '.created', 'desc');
            if ($type != '') {
                $this->db->where(PREFIX . $data['table'] . '.house_layout_id', $type);
            }
            if ($size != '') {
                $size = explode('-', $size);
                if (count($size) == 1) {
                    $this->db->where(PREFIX . $data['table'] . '.size <', intval($size[0]));
                } else {
                    $this->db->where(PREFIX . $data['table'] . '.size >', intval($size[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size <', intval($size[1]));
                }
            }
            if ($Search != '') {
                $this->db->like(PREFIX . $data['table'] . '.size',$Search);
                $this->db->or_like(PREFIX . $data['table'] . '.month_rent',$Search);
                $this->db->or_like(PREFIX . $data['table'] . '.type',$Search);
            }
            if (isset($data['inputMin'])){
                $this->db->where(PREFIX . $data['table'] . '.month_rent >', intval($data['inputMin']));
            }
            if($data['inputMax']!=''){
                $this->db->where(PREFIX . $data['table'] . '.month_rent <', intval($data['inputMax']));
            }
         }
        $this->db->limit('5');
        $query = $this->db->get(PREFIX . $data['table']);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getCountAll($areaName,$layout,$type,$size,$rent,$cboApartment,$Search,$data,$per_page= 5 , $cur_page= 0){
        $this->db->distinct();
        $this->db->select(PREFIX . 'areas.name as area_name');
        $this->db->select(PREFIX . $data['table'] . '.id as id');
        $this->db->select(PREFIX . $data['table'] . '.status as status');
        $this->db->where(PREFIX . $data['table'] . '.status', 1);
        $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
        $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');
        if ($areaName != '') {
            if ($areaName != '-1') {
                $this->db->where(PREFIX . 'area_' . $data['areas'].'.area_id', $areaName);
            } else if ($data['areas'] == 'office') {
                $list_area=array('2','11','10','8','5','13');
                $this->db->where_not_in(PREFIX . 'area_' . $data['areas'].'.area_id',$list_area);
            } else {
                $list_area=array('2','11','3','10','5','13','17');
                $this->db->where_not_in(PREFIX . 'area_' . $data['areas'].'.area_id',$list_area);
            }
        }
        if ($data['table'] == 'houses') {
            $this->db->join(PREFIX . 'house_layouts', PREFIX . 'house_layouts' . '.id = ' . PREFIX . $data['table'] . '.house_layout_id', 'left');
            if ($layout != '') {
                $this->db->where(PREFIX . $data['table'] . '.type', $layout);
            }
            if ($type != '') {
                $this->db->where(PREFIX . $data['table'] . '.house_layout_id', $type);
            }
            if ($size != '') {
                $size = explode('-', $size);
                if (count($size) == 1) {
                    $this->db->where(PREFIX . $data['table'] . '.size <', intval($size[0]));
                } else {
                    $this->db->where(PREFIX . $data['table'] . '.size >', intval($size[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size <', intval($size[1]));
                }
            }
            if ($Search != '') {
                $this->db->like(PREFIX . $data['table'] . '.size',$Search);
                $this->db->or_like(PREFIX . $data['table'] . '.rent',$Search);
                $this->db->or_like(PREFIX . $data['table'] . '.type',$Search);
            }
            if (isset($data['inputMin'])){
                $this->db->where(PREFIX . $data['table'] . '.rent >', intval($data['inputMin']));
            }
            if($data['inputMax']!=''){
                $this->db->where(PREFIX . $data['table'] . '.rent <', intval($data['inputMax']));
            }
        } else if ($data['table'] == 'office') {
            $this->db->order_by(PREFIX . $data['table'] . '.update', 'desc');
            $this->db->order_by(PREFIX . $data['table'] . '.created', 'desc');
            if ($layout != '') {
                $this->db->where(PREFIX . $data['table'] . '.type', $layout);
            }
            if ($type != '') {
                $this->db->where(PREFIX . $data['table'] . '.house_layout_id', $type);
            }
            if ($size != '') {
                $size = explode('-', $size);
                if (count($size) == 1) {
                    $this->db->where(PREFIX . $data['table'] . '.size <', intval($size[0]));
                } else {
                    $this->db->where(PREFIX . $data['table'] . '.size >', intval($size[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size <', intval($size[1]));
                }
            }
            if ($Search != '') {
                $this->db->like(PREFIX . $data['table'] . '.size',$Search);
                $this->db->or_like(PREFIX . $data['table'] . '.month_rent',$Search);
                $this->db->or_like(PREFIX . $data['table'] . '.type',$Search);
            }
            if (isset($data['inputMin'])){
                $this->db->where(PREFIX . $data['table'] . '.month_rent >', intval($data['inputMin']));
            }
            if($data['inputMax']!=''){
                $this->db->where(PREFIX . $data['table'] . '.month_rent <', intval($data['inputMax']));
            }
        }
                $this->db->get(PREFIX . $data['table']);
        $query = $this->db->count_all_results(PREFIX . $data['table']);
        if ($query) {
            return $query;
        } else {
            return 0;
        }
    }
    function search_count_record($data, $per_page, $cur_page) {
        if ($data['s'] != '') {
            $s = trim($data['s']);
            $spaces = preg_match('/ /', $s);
            if ($spaces > 0) {
                $s_array = explode(' ', $s);
                foreach ($s_array as $v) {
                    $this->db->like('content', mysql_real_escape_string($v));
                }
            } else {
                $this->db->like('content', mysql_real_escape_string($data['s']));
            }
            $this->db->select('*');
            $query = $this->db->get(PREFIX . $data['table'] . '_db');
            if ($query->result()) {
                $id_p = array();
                foreach ($query->result() as $k => $v) {
                    $type = $data['table'] . '_id';
                    $id_p[] = $v->$type;
                }
                if ($id_p) {
                    $this->db->distinct();
                    $this->db->select(PREFIX . 'areas' . ".name");
                    $this->db->select(PREFIX . $data['table'] . '.*');
                    $this->db->where(PREFIX . $data['table'] . '.status', 1);
                    $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
                    $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');
                    if ($data['table'] == 'houses') {
                        $this->db->join(PREFIX . 'house_layouts', PREFIX . 'house_layouts' . '.id = ' . PREFIX . $data['table'] . '.house_layout_id', 'left');
                        $this->db->select(PREFIX . 'house_layouts.name AS house_layouts');
                    }
                    $this->db->where_in(PREFIX . $data['table'] . '.id', $id_p);
                    $this->db->order_by('update', 'desc');
                    $this->db->order_by('created', 'desc');
                    $query = $this->db->get(PREFIX . $data['table']);
                    if ($query->result()) {
                        return count($query->result());
                    }
                }
                return false;
            }
            return false;
        } else {
            $this->db->distinct();
            $this->db->select(PREFIX . 'areas' . ".name");
            $this->db->select(PREFIX . $data['table'] . '.*');
            $this->db->where(PREFIX . $data['table'] . '.status', 1);
            $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
            $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');
            if ($data['size'] != '') {
                switch ($data['size']) {
                    case '50':
                        $this->db->where('size <=', 50);
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
                        $this->db->where('size >=', 151);
                        break;
                }
            }
            if ($data['localtion'] != '') {
                if ($data['localtion'] != '-1') {
                    $this->db->where(PREFIX . 'area_' . $data['areas'].'.area_id', $data['localtion']);
                } else if ($data['areas'] == 'office') {
                    $list_area=array('2','11','10','8','5','13');
                    $this->db->where_not_in(PREFIX . 'area_' . $data['areas'].'.area_id',$list_area);
                } else {
                    $list_area=array('2','11','3','10','5','13','17');
                    $this->db->where_not_in(PREFIX . 'area_' . $data['areas'].'.area_id',$list_area);
                }
            }
            if ($data['catid'] != '') {
                $this->db->join(PREFIX . 'cate_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'cate_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
                $this->db->join(PREFIX . $this->table_category, PREFIX . $this->table_category . '.id = ' . PREFIX . 'cate_' . $data['areas'] . '.cate_id', 'left');
                $this->db->where(PREFIX . $this->table_category . '.id', $data['catid']);
            }
            if ($data['table'] == 'houses') {
                if ($data['type'] != '') {
                    $this->db->where(PREFIX . $data['table'] . '.type', $data['type']);
                }
                if ($data['rent'] != '') {
                    switch ($data['rent']) {
                        case '500':
                            $this->db->where(PREFIX . $data['table'] . '.rent <=', 500);
                            break;
                        case '501-1000':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 501);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 1000);
                            break;
                        case '1001-1500':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 1001);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 1500);
                            break;
                        case '1501-2000':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 1501);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 2000);
                            break;
                        case '2001-2500':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 2001);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 2500);
                            break;
                        case '2501-3000':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 2501);
                            $this->db->where(PREFIX . $data['table'] . '.rent <= ', 3000);
                            break;
                        case '3001':
                            $this->db->where(PREFIX . $data['table'] . '.rent >= ', 3001);
                            break;
                    }
                }
                if ($data['layout'] != '') {
                    $this->db->where(PREFIX . $data['table'] . '.house_layout_id', $data['layout']);
                }
                $this->db->join(PREFIX . 'house_layouts', PREFIX . 'house_layouts' . '.id = ' . PREFIX . $data['table'] . '.house_layout_id', 'left');
                $this->db->select(PREFIX . 'house_layouts.name AS house_layouts');
            }
            if ($data['table'] == 'offices') {
                if ($data['month_rent'] != '') {
                    switch ($data['month_rent']) {
                        case '1000':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 1000);
                            break;
                        case '1001-1500':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 1001);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 1500);
                            break;
                        case '1501-2000':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 1501);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 2000);
                            break;
                        case '2001-2500':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 2001);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 2500);
                            break;
                        case '2501-3000':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 2501);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 3000);
                            break;
                        case '3001-3500':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent >', 3001);
                            $this->db->where(PREFIX . $data['table'] . '.month_rent < ', 3500);
                            break;
                        case '3501':
                            $this->db->where(PREFIX . $data['table'] . '.month_rent > ', 3501);
                            break;
                    }
                }
                if ($data['size'] != '') {
                    switch ($data['size_rent']) {
                        case '10':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent', 10);
                            $this->db->where(PREFIX . $data['table'] . '.size_rent', 10);
                            break;
                        case '11-25':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent >', 11);
                            $this->db->where(PREFIX . $data['table'] . '.size_rent < ', 25);
                            break;
                        case '26-49':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent >', 26);
                            $this->db->where(PREFIX . $data['table'] . '.size_rent < ', 49);
                            break;
                        case '50-99':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent >', 50);
                            $this->db->where(PREFIX . $data['table'] . '.size_rent < ', 99);
                            break;
                        case '100':
                            $this->db->where(PREFIX . $data['table'] . '.size_rent', 100);
                            break;
                    }
                }
            }
            $this->db->order_by(PREFIX . $data['table'] . '.update', 'desc');
            $this->db->order_by(PREFIX . $data['table'] . '.created', 'desc');
            $query = $this->db->get(PREFIX . $data['table']);
            if ($query->result()) {
                return count($query->result());
            } else {
                return false;
            }
        }
    }
    public function getAreaName(){
        $this->db->select('*');
        $this->db->from('cli_areas');
        $this->db->where('status',1);
        $query =$this->db->get();
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getCategorySpecial() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', 1);
        $this->db->where('type <>', '');
        $this->db->order_by('order', 'asc'); 
        $this->db->order_by('id', 'desc');        
        $this->db->limit(10, 0);
        $query = $this->db->get(PREFIX . $this->table_category);
        if ($query->result()) {
            return $query->result();
        } else {
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
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getOneCategorySpecial() {
        $sql = "SELECT *
                FROM
                cli_category
                WHERE
                cli_category.type = 1 AND
                cli_category.`status` = 1
                ORDER BY
                cli_category.order asc,
                cli_category.id desc
                LIMIT 0, 1
            ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function getTwoCategorySpecial() {
        $sql = "SELECT *
                FROM
                cli_category
                WHERE
                cli_category.show_top = 1 AND
                cli_category.`status` = 1
                ORDER BY
                cli_category.order asc,
                cli_category.id desc
                LIMIT 0, 2
            ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getCategoryDetailHouse($catId, $options = array(),$sort ='') {
        $sql = "SELECT DISTINCT
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
        if($sort){
            if($sort == 'asc'){
                $sql .= ' order by'.' cli_houses.update asc';
            }
            if($sort == 'desc'){
                $sql .= ' order by'.' cli_houses.update desc';
            }
            if($sort == 'sortRentAsc'){
                $sql .= ' order by'.' cast( cli_houses.rent as UNSIGNED) asc ';
            }
            if($sort == 'sortRentDesc'){
                $sql .= ' order by'.' cast( cli_houses.rent as UNSIGNED) desc ';
            }
        }
        if(!$sort){
            $sql .= 'order by' .' cli_houses.update desc';
        }
        if ($options['limit']) {
            $sql .= ' LIMIT ' . implode(', ', $options['limit']);
        }

        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getCategoryDetailHouse_450($catId, $options = array(),$sort ='') {
        $sql = "SELECT DISTINCT
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
                WHERE cli_houses.`status` = 1 AND cli_houses.rent <= 450 AND cli_category.`status` = 1 
            ";
        if($sort){
            if($sort == 'asc'){
                $sql .= ' order by'.' cli_houses.update asc';
            }
            if($sort == 'desc'){
                $sql .= ' order by'.' cli_houses.update desc';
            }
            if($sort == 'sortRentAsc'){
                $sql .= ' order by'.' cast( cli_houses.rent as UNSIGNED) asc ';
            }
            if($sort == 'sortRentDesc'){
                $sql .= ' order by'.' cast( cli_houses.rent as UNSIGNED) desc ';
            }
        }
        if(!$sort){
            $sql .= 'order by' .' cli_houses.update desc';
        }
        if ($options['limit']) {
            $sql .= ' LIMIT ' . implode(', ', $options['limit']);
        }

        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getCategoryDetailHouse7($options = array(),$sort ='', $areaId) {
        $sql = "SELECT DISTINCT
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
                WHERE cli_houses.`status` = 1 AND cli_areas.id = '{$areaId}'  AND cli_category.`status` = 1 
            ";
        if($sort){
            if($sort == 'asc'){
                $sql .= ' order by'.' cli_houses.update asc';
            }
            if($sort == 'desc'){
                $sql .= ' order by'.' cli_houses.update desc';
            }
            if($sort == 'sortRentAsc'){
                $sql .= ' order by'.' cast( cli_houses.rent as UNSIGNED) asc ';
            }
            if($sort == 'sortRentDesc'){
                $sql .= ' order by'.' cast( cli_houses.rent as UNSIGNED) desc ';
            }
        }
        if(!$sort){
            $sql .= 'order by' .' cli_houses.update desc';
        }
        if ($options['limit']) {
            $sql .= ' LIMIT ' . implode(', ', $options['limit']);
        }

        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getCategoryDetailOffice($catId) {
        $sql = "SELECT DISTINCT
                cli_offices.*,
                cli_areas.`name` AS 'area_name'
                FROM
                cli_offices
                INNER JOIN cli_cate_office ON cli_offices.id = cli_cate_office.office_id
                INNER JOIN cli_category ON cli_cate_office.cate_id = cli_category.id
                INNER JOIN cli_area_office ON cli_offices.id = cli_area_office.office_id
                INNER JOIN cli_areas ON cli_area_office.area_id = cli_areas.id
                WHERE cli_offices.`status` = 1 AND cli_category.id = $catId AND cli_category.`status` = 1 ORDER BY cli_offices.update desc, cli_offices.created desc LIMIT 0, 6
            ";

        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getCategoryDetailOffice_450($catId) {
        $sql = "SELECT DISTINCT
                cli_offices.*,
                cli_areas.`name` AS 'area_name'
                FROM
                cli_offices
                INNER JOIN cli_cate_office ON cli_offices.id = cli_cate_office.office_id
                INNER JOIN cli_category ON cli_cate_office.cate_id = cli_category.id
                INNER JOIN cli_area_office ON cli_offices.id = cli_area_office.office_id
                INNER JOIN cli_areas ON cli_area_office.area_id = cli_areas.id
                WHERE cli_offices.`status` = 1 AND cli.houses.rent <= 450 AND cli_category.`status` = 1 ORDER BY cli_offices.update desc, cli_offices.created desc LIMIT 0, 6
            ";

        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getCategoryDetailOffice7($areaId) {
        $sql = "SELECT DISTINCT
                cli_offices.*,
                cli_areas.`name` AS 'area_name'
                FROM
                cli_offices
                INNER JOIN cli_cate_office ON cli_offices.id = cli_cate_office.office_id
                INNER JOIN cli_category ON cli_cate_office.cate_id = cli_category.id
                INNER JOIN cli_area_office ON cli_offices.id = cli_area_office.office_id
                INNER JOIN cli_areas ON cli_area_office.area_id = cli_areas.id
                WHERE cli_offices.`status` = 1 AND cli_areas.id = '{$areaId}' AND cli_category.`status` = 1 ORDER BY cli_offices.update desc, cli_offices.created desc LIMIT 0, 6
            ";

        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getCategory($id) {
        $sql = "
            SELECT *
            FROM
            cli_category
            WHERE
            cli_category.id = $id
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getCurrency() {
        $language = current_lang_();
        if($language == 'vn') {
            $currency = 'USD';
        } else {
            $currency = 'USD';
        }
        return $currency;
    }

    /**
     * Show list apartment
     * @param  string $dist    [Dist: 2, 3, 7, under_450_usd]
     * @return array
     */
    public function listApartment($dist, $options = array(),$sort ='') {
        $data = array();
        $data_dist = array();
        $areaId = 0;
        switch ($dist) {
            case '2':
                // 割安アパートメント (ホーチミン市2区アパート) -> district 2
                $data_dist = $this->getCategory(296);
                break;

            case '3':
            case 'under_450_usd':
                $response = $this->getTwoCategorySpecial();
                $areaId = 11;
                if ($dist == '3') {
                     // ホーチミン単身向け450USD以下アパート特集
                    if ($response[0]) {
                        $data_dist = $response[0];
                        
                     
                    } else {
                        $data_dist = array();
                    }
                } 
                else {
                   // ホーチミン 3区 サービスアパート特集 -> district 3
                    if ($response[1]) {
                        $data_dist = $response[1];
                       
                    } else {
                        $data_dist = array();
                    }
                }
                break;

            case '7':
                // フーミーフン7区アパート -> district 7
                $data_dist = $this->getOneCategorySpecial();
                $areaId = 13;
                break;
        }
        if (isset($data_dist) ) {
            if ($dist=='2') {
                if ($data_dist->type_p == 1) {
                    // House
                    $data = $this->getCategoryDetailHouse($data_dist->id, $options,$sort );
                } else {
                    // Office
                    $data = $this->getCategoryDetailOffice($data_dist->id); 
                }
            }
            if ($dist=='under_450_usd') {
                if ($data_dist->type_p == 1) {
                    // House
                    $data = $this->getCategoryDetailHouse_450($data_dist->id, $options,$sort );
                } else {
                    // Office
                    $data = $this->getCategoryDetailOffice_450($data_dist->id); 
                }
            }
            if ($dist=='7' || $dist=='3') {
                if ($data_dist->type_p == 1) {
                    // House
                    $data = $this->getCategoryDetailHouse7($options,$sort, $areaId);
                } else {
                    // Office
                    $data = $this->getCategoryDetailOffice7($areaId); 
                }
            }
        }
        
        return $data;
    }


    public function countListApartment($dist) {
        $data = array();
        $data_dist = array();

        switch ($dist) {
            case '2':
                // 割安アパートメント (ホーチミン市2区アパート) -> district 2
                $data_dist = $this->getCountCategory(296);
                break;

            case '3':
            case 'under_450_usd':
                $response = $this->getCountTwoCategorySpecial();
                $areaId = 11;
                if ($dist == '3') {
                    // ホーチミン単身向け450USD以下アパート特集
                    if ($response[0]) {
                        $data_dist = $response[0];
                    } else {
                        $data_dist = array();
                    }
                } else {
                   // ホーチミン 3区 サービスアパート特集 -> district 3
                    if ($response[1]) {
                        $data_dist = $response[1];
                    } else {
                        $data_dist = array();
                    }
                }
                break;

            case '7':
                // フーミーフン7区アパート -> district 7
                $data_dist = $this->getCountOneCategorySpecial();
                $areaId = 13;
                break;
        }

        if (isset($data_dist)) {
            if ($dist=='2') {
                if ($data_dist->type_p == 1) {
                    // House
                    $data = $this->getCountCategoryDetailHouse($data_dist->id);
                } else {
                    // Office
                    // $data = $this->getCountCategoryDetailOffice($data_dist->id);
                }
            }
            if ($dist=='under_450_usd') {
                if ($data_dist->type_p == 1) {
                    // House
                    $data = $this->getCountCategoryDetailHouse_450($data_dist->id );
                } else {
                    // Office
                    // $data = $this->getCountCategoryDetailOffice_450($data_dist->id); 
                }
            }
            if ($dist=='7' || $dist=='3') {
                if ($data_dist->type_p == 1) {
                    // House
                    $data = $this->getCountCategoryDetailHouse7_3($areaId);
                } else {
                    // Office
                    // $data = $this->getCountCategoryDetailOffice7_3($areaId); 
                }
            }
        }
        return $data;
    }

    public function getCountCategory($id) {
        $sql = "
            SELECT *
            FROM
            cli_category
            WHERE
            cli_category.id = $id 
            AND 
            cli_category.type_p = 1
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getCountOneCategorySpecial() {
        $sql = "SELECT *
                FROM
                cli_category
                WHERE
                cli_category.type = 1 AND
                cli_category.type_p = 1 AND 
                cli_category.`status` = 1
                ORDER BY
                cli_category.order asc,
                cli_category.id desc
                LIMIT 0, 1
            ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getCountTwoCategorySpecial() {
        $sql = "SELECT *
                FROM
                cli_category
                WHERE
                cli_category.show_top = 1 AND
                cli_category.type_p = 1 AND
                cli_category.`status` = 1
                ORDER BY
                cli_category.order asc,
                cli_category.id desc
                LIMIT 0, 2
            ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getCountCategoryDetailHouse($catId)
    {
        $sql = "SELECT DISTINCT
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
        if ($query->result()) {
            return count($query->result());
        } else {
            return false;
        }
    }

    public function getCountCategoryDetailHouse_450($catId)
    {
        $sql = "SELECT DISTINCT
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
                WHERE cli_houses.`status` = 1 AND cli_houses.rent <= 450 AND cli_category.`status` = 1 
            ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return count($query->result());
        } else {
            return false;
        }
    }

    public function getCountCategoryDetailHouse7_3($areaId)
    {
        $sql = "SELECT DISTINCT
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
                WHERE cli_houses.`status` = 1 AND cli_areas.id = '{$areaId}' AND cli_category.`status` = 1
            ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return count($query->result());
        } else {
            return false;
        }
    }
}

?>