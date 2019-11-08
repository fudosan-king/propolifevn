<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class search_model extends MY_Model {
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
        $this->db->order_by("name", "asc");
        $query = $this->db->get(PREFIX . $this->table_areas);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    function getAreasAll() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get(PREFIX . $this->table_areas);

        if ($query->result()) {

            return $query->result();
        } else {
            return array();
        }
    }

    function getAreasHouseOffice($house_office = 1) {
        $this->db->select('*');
        $this->db->where('status', 1);
        if ($house_office == 1) {
            // House
            $this->db->where('is_house', 1);
            $this->db->order_by("position_sort_house", "asc");
        } else if ($house_office == 2) {
            // Office
            $this->db->where('is_office', 1);
            $this->db->order_by("position_sort_office", "asc");
        }
        $query = $this->db->get(PREFIX . $this->table_areas);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getLayouts() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get(PREFIX . $this->table_layouts_house);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getBuildingCondo(){
        $this->db->distinct();
        $this->db->select('cli_building.id,cli_building.name, cli_building.district ,IFNULL(cli_building.order, CAST(10000 AS SIGNED) ) as `order`');
        $this->db->where('cli_building.status',1);
        $this->db->where('cli_building.building_type',0);
        $this->db->order_by('order','asc');
        $query = $this->db->get(PREFIX.'building');
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getBuildingService_aprtment(){
        $this->db->distinct();
        $this->db->select('cli_building.id,cli_building.name, cli_building.district, IFNULL(cli_building.order, CAST(10000 AS SIGNED) ) as `order`');
        $this->db->where('cli_building.status',1);
        $this->db->where('cli_building.building_type',1);
        $this->db->order_by('order','asc');
        $query = $this->db->get(PREFIX.'building');
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    /**desciption: search
     * @param string $areaID
     * @param int $layout
     * @param int $type
     * @param int $size
     * @param int $rent
     * @param $cboApartment
     * @param int $search      
     * @param array $data
     * @param string $per_page item display of one page
     * @param int $cur_page
     * @return bool
     */
    public function getSearch($areaID,$layout,$type,$size,$cboSizeRentSelect,$rentSelect,$chair,$condo,$Service_aprtment,$search,$data,$per_page,$cur_page){
        $this->db->distinct();
        $this->db->select(
            PREFIX . 'areas.name as area_name, ' . 
            PREFIX . $data['table'] . '.id, ' . 
            PREFIX . $data['table'] . '.images_thumb, ' . 
            PREFIX . $data['table'] . '.name_en, ' . 
            PREFIX . $data['table'] . '.name_jp, ' . 
            PREFIX . $data['table'] . '.type, ' . 
            PREFIX . $data['table'] . '.introduction'
        );
        
        if ($data['table'] == 'houses') {
            $this->db->select(
                PREFIX . $data['table'] . '.house_layout_id, ' . 
                PREFIX . $data['table'] . '.rent, ' . 
                PREFIX . $data['table'] . '.size'
            );

            // Group concat house images
            $this->db->select('GROUP_CONCAT( DISTINCT ' . PREFIX . 'house_images.name_image ) AS list_house_images');
            // Group concat equipment images
            $this->db->select('GROUP_CONCAT( DISTINCT ' . PREFIX . 'equipments.name_image ) AS list_equipment_images');
        } else if ($data['table'] == 'offices') {
            $this->db->select(
                PREFIX . $data['table'] . '.month_rent, ' . 
                PREFIX . $data['table'] . '.size, ' . 
                PREFIX . $data['table'] . '.size_rent'
            );

            // Group concat office images
            $this->db->select('GROUP_CONCAT( DISTINCT ' . PREFIX . 'office_images.name_image ) AS list_office_images');
        }
        // Group concat common facilities images use for house and office
        $this->db->select('GROUP_CONCAT( DISTINCT ' . PREFIX . 'common_facilities.name_image ) AS list_common_facilitie_images');

        $this->db->where(PREFIX . $data['table'] . '.status', 1);
        $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
        $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id');
        if($areaID != ''){
            $this->db->where_in(PREFIX . 'areas' . '.id', $areaID);
        }

        if ($data['table'] == 'houses') {
            // Join house images
            $this->db->join(PREFIX . 'house_images', PREFIX . 'house_images' . '.house_id = ' . PREFIX . $data['table'] . '.id', 'left');

            // Join equipment images
            $this->db->join(PREFIX . 'equipments_house', PREFIX . 'equipments_house' . '.house_id = ' . PREFIX . $data['table'] . '.id', 'left');
            $this->db->join(PREFIX . 'equipments', PREFIX . 'equipments' . '.id = ' . PREFIX . 'equipments_house.equipment_id');

            // Join common facilities images
            $this->db->join(PREFIX . 'common_facility_house', PREFIX . 'common_facility_house' . '.house_id = ' . PREFIX . $data['table'] . '.id', 'left');
            $this->db->join(PREFIX . 'common_facilities', PREFIX . 'common_facilities' . '.id = ' . PREFIX . 'common_facility_house.common_facility_id', 'left');

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
                    if(intval($size[0])==50){
                        $this->db->where(PREFIX . $data['table'] . '.size <=', intval($size[0]));
                    }else{
                        $this->db->where(PREFIX . $data['table'] . '.size >=', intval($size[0]));
                    }
                } else {
                    $this->db->where(PREFIX . $data['table'] . '.size >=', intval($size[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size <=', intval($size[1]));
                }
            }
            if(($condo !='') && ($Service_aprtment =='')){
                $this->db->select(PREFIX . 'building.name as building_name');
                $this->db->join(PREFIX. 'building_house',PREFIX.'building_house'.'.house_id = ' . PREFIX.'houses'.'.id');
                $this->db->join(PREFIX. 'building',PREFIX.'building'.'.id = ' .PREFIX.'building_house'.'.building_id');
                $this->db->where(PREFIX.'building.id',$condo);
                $this->db->where(PREFIX.'houses.type',1);
            }
            if(($Service_aprtment!='') && ($condo =='')){
                $this->db->select(PREFIX . 'building.name as building_name');
                $this->db->join(PREFIX. 'building_house',PREFIX.'building_house'.'.house_id = ' . PREFIX.'houses'.'.id');
                $this->db->join(PREFIX. 'building',PREFIX.'building'.'.id = ' .PREFIX.'building_house'.'.building_id');
                $this->db->where(PREFIX.'building.id',$Service_aprtment);
                $this->db->where(PREFIX.'houses.type',0);
            }
            if ($search != '') {
                if(!is_numeric($search)) {
                    $stringSunrise_city = json_encode('SUNRISE CITY');
                    $stringSunrise_city = str_replace('"', '', $stringSunrise_city);
                    $stringSunrise_city = str_replace('\\', '%\\\\\\\\%', $stringSunrise_city);

                    $stringSunrize_city = json_encode('SUNRIZE CITY');
                    $stringSunrize_city = str_replace('"', '', $stringSunrize_city);
                    $stringSunrize_city = str_replace('\\', '%\\\\\\\\%', $stringSunrize_city);

                    $stringSaigon_view_residences = json_encode('SAIGON VIEW RESIDENCES');
                    $stringSaigon_view_residences = str_replace('"', '', $stringSaigon_view_residences);
                    $stringSaigon_view_residences = str_replace('\\', '%\\\\\\\\%', $stringSaigon_view_residences);

                    $stringSaigon_view_residence = json_encode('SAIGON VIEW RESIDENCE');
                    $stringSaigon_view_residence = str_replace('"', '', $stringSaigon_view_residence);
                    $stringSaigon_view_residence = str_replace('\\', '%\\\\\\\\%', $stringSaigon_view_residence);

                    $stringSaigon_view_risedence = json_encode('SAIGON VIEW RISEDENCE');
                    $stringSaigon_view_risedence = str_replace('"', '', $stringSaigon_view_risedence);
                    $stringSaigon_view_risedence = str_replace('\\', '%\\\\\\\\%', $stringSaigon_view_risedence);

                    $stringSaigon_view_riversidence = json_encode('SAIGON VIEW RIVERSIDENCE');
                    $stringSaigon_view_riversidence = str_replace('"', '', $stringSaigon_view_riversidence);
                    $stringSaigon_view_riversidence = str_replace('\\', '%\\\\\\\\%', $stringSaigon_view_riversidence);

                    $searchString = json_encode($search);
                    $searchString = str_replace('"', '', $searchString);
                    $searchString = str_replace('\\', '%\\\\\\\\%', $searchString);
                    $searchString_special = '(`cli_areas`.`name` LIKE "%' . $searchString . '%" or `name_jp` LIKE "%' . $searchString . '%" or `name_en` LIKE "%' . $searchString . '%" or  `introduction` like "%' . $searchString .'%")';
                    if ($search == 'SUNRISE CITY') {
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSunrize_city . '%" or `name_jp` LIKE "%' . $stringSunrize_city . '%" or `name_en` LIKE "%' . $stringSunrize_city . '%" or  `introduction` like "%' . $stringSunrize_city .'%"';
                    }
                    if ($search == 'SUNRIZE CITY') {
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSunrise_city . '%" or `name_jp` LIKE "%' . $stringSunrise_city . '%" or `name_en` LIKE "%' . $stringSunrise_city . '%" or  `introduction` like "%' . $stringSunrise_city .'%"';
                    }
                    if ($search == 'SAIGON VIEW RESIDENCES') {
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_residence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_residence . '%" or `name_en` LIKE "%' . $stringSaigon_view_residence . '%" or  `introduction` like "%' . $stringSaigon_view_residence .'%"';
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_risedence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_risedence . '%" or `name_en` LIKE "%' . $stringSaigon_view_risedence . '%" or  `introduction` like "%' . $stringSaigon_view_risedence .'%"';
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_riversidence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_riversidence . '%" or `name_en` LIKE "%' . $stringSaigon_view_riversidence . '%" or  `introduction` like "%' . $stringSaigon_view_riversidence .'%"';
                    }
                    if ($search == 'SAIGON VIEW RESIDENCE') {
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_residences . '%" or `name_jp` LIKE "%' . $stringSaigon_view_residences . '%" or `name_en` LIKE "%' . $stringSaigon_view_residences . '%" or  `introduction` like "%' . $stringSaigon_view_residences .'%"';
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_risedence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_risedence . '%" or `name_en` LIKE "%' . $stringSaigon_view_risedence . '%" or  `introduction` like "%' . $stringSaigon_view_risedence .'%"';
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_riversidence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_riversidence . '%" or `name_en` LIKE "%' . $stringSaigon_view_riversidence . '%" or  `introduction` like "%' . $stringSaigon_view_riversidence .'%"';
                    }
                    if($search == 'SAIGON VIEW RISEDENCE'){
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_residence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_residence . '%" or `name_en` LIKE "%' . $stringSaigon_view_residence . '%" or  `introduction` like "%' . $stringSaigon_view_residence .'%"';
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_residences . '%" or `name_jp` LIKE "%' . $stringSaigon_view_residences . '%" or `name_en` LIKE "%' . $stringSaigon_view_residences . '%" or  `introduction` like "%' . $stringSaigon_view_residences .'%"';
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_riversidence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_riversidence . '%" or `name_en` LIKE "%' . $stringSaigon_view_riversidence . '%" or  `introduction` like "%' . $stringSaigon_view_riversidence .'%"';
                    }
                    if($search == 'SAIGON VIEW RIVERSIDENCE'){
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_residence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_residence . '%" or `name_en` LIKE "%' . $stringSaigon_view_residence . '%" or  `introduction` like "%' . $stringSaigon_view_residence .'%"';
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_residences . '%" or `name_jp` LIKE "%' . $stringSaigon_view_residences . '%" or `name_en` LIKE "%' . $stringSaigon_view_residences . '%" or  `introduction` like "%' . $stringSaigon_view_residences .'%"';
                        $searchString_special .= ' OR `cli_areas`.`name` LIKE "%' . $stringSaigon_view_risedence . '%" or `name_jp` LIKE "%' . $stringSaigon_view_risedence . '%" or `name_en` LIKE "%' . $stringSaigon_view_risedence . '%" or  `introduction` like "%' . $stringSaigon_view_risedence .'%"';
                    }
                    $this->db->where($searchString_special);
                }else{
                    $this->db->like(PREFIX . $data['table'] . '.size',$search);
                    $this->db->or_like(PREFIX . $data['table'] . '.rent',$search);
                    $this->db->or_like(PREFIX . $data['table'] . '.type',$search);
                }
            }
            if (isset($data['inputMin'])){
                $this->db->where(PREFIX . $data['table'] . '.rent >=', intval($data['inputMin']));
            }
            if($data['inputMax']!=''){
                $this->db->where(PREFIX . $data['table'] . '.rent <=', intval($data['inputMax']));
            }

            if($data['sort']!= ''){
                if($data['sort']== 'desc'){
                    $this->db->order_by(PREFIX . $data['table'].'.update', 'desc');
                }
                if($data['sort']== 'asc'){
                    $this->db->order_by(PREFIX . $data['table'].'.update', 'asc');
                }
                if($data['sort']=='sortRentAsc'){
                    $this->db->order_by('cast(' . PREFIX . $data['table'].'.rent as UNSIGNED) ','asc');
                }
                if($data['sort']=='sortRentDesc'){
                    $this->db->order_by('cast(' . PREFIX . $data['table'].'.rent as UNSIGNED) ','desc');
                }
            }
            $this->db->order_by(PREFIX . $data['table'].'.update', 'desc');
            $this->db->order_by(PREFIX . $data['table'].'.created', 'desc');
        } else if ($data['table'] == 'offices') {
            // Join office images
            $this->db->join(PREFIX . 'office_images', PREFIX . 'office_images' . '.office_id = ' . PREFIX . $data['table'] . '.id', 'left');

            // Join common facilities images
            $this->db->join(PREFIX . 'common_facility_office', PREFIX . 'common_facility_office' . '.office_id = ' . PREFIX . $data['table'] . '.id', 'left');
            $this->db->join(PREFIX . 'common_facilities', PREFIX . 'common_facilities' . '.id = ' . PREFIX . 'common_facility_office.common_facility_id', 'left');

            if ($size != '') {
                $size = explode('-', $size);
                if (count($size) == 1) {
                    if(intval($size[0])==50) {
                        $this->db->where(PREFIX . $data['table'] . '.size <=', intval($size[0]));
                    }else{
                        $this->db->where(PREFIX . $data['table'] . '.size >=', intval($size[0]));
                    }
                } else {
                    $this->db->where(PREFIX . $data['table'] . '.size >=', intval($size[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size <=', intval($size[1]));
                }
            }
            if($cboSizeRentSelect != ''){
                $cboSizeRentSelect = explode('-',$cboSizeRentSelect);
                if(count($cboSizeRentSelect) == 1) {
                    if (intval($cboSizeRentSelect[0]) == 10) {
                        $this->db->where(PREFIX . $data['table'] . '.size_rent <=', intval($cboSizeRentSelect[0]));
                    } else {
                        $this->db->where(PREFIX . $data['table'] . '.size_rent >=', intval($cboSizeRentSelect[0]));
                    }
                }else {
                    $this->db->where(PREFIX . $data['table'] . '.size_rent >=', intval($cboSizeRentSelect[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size_rent <=', intval($cboSizeRentSelect[1]));
                }
            }
            if($chair != ''){
                if($chair == '5'){
                    $this->db->where(PREFIX . $data['table'] . '.size <= 20');
                }
                if($chair == '6-10'){
                    $this->db->where(PREFIX . $data['table'] . '.size >= 24');
                    $this->db->where(PREFIX . $data['table'] . '.size <= 40');
                }
                if($chair == '11-15'){
                    $this->db->where(PREFIX . $data['table'] . '.size >= 44');
                    $this->db->where(PREFIX . $data['table'] . '.size <= 60');
                }
                if($chair == '16-25'){
                    $this->db->where(PREFIX . $data['table'] . '.size >= 64');
                    $this->db->where(PREFIX . $data['table'] . '.size <= 100');
                }
                if($chair == '26-40'){
                    $this->db->where(PREFIX . $data['table'] . '.size >= 104');
                    $this->db->where(PREFIX . $data['table'] . '.size <= 160');
                }
                if($chair == '40'){
                    $this->db->where(PREFIX . $data['table'] . '.size > 160');
                }
            }
            if ($search != '') {
                if(!is_numeric($search)){
                    $searchString = json_encode($search);
                    $searchString = str_replace('"', '', $searchString);
                    $searchString = str_replace('\\', '%\\\\\\\\%', $searchString);
                    $this->db->where('(`cli_areas`.`name` like "%' . $searchString . '%" or `cli_offices`.`name_jp` like "%' . $searchString . '%" or `cli_offices`.`name_en` like "%' . $searchString . '%" or  `introduction` like "%' . $searchString . '%")');
                }else{
                    $this->db->like(PREFIX . $data['table'] . '.size',$search);
                    $this->db->or_like(PREFIX . $data['table'] . '.month_rent',$search);
                    $this->db->or_like(PREFIX . $data['table'] . '.type',$search);
                }
            }
            if (isset($data['inputMin'])){
                $this->db->where(PREFIX . $data['table'] . '.month_rent >=', intval($data['inputMin']));
            }
            if($data['inputMax']!=''){
                $this->db->where(PREFIX . $data['table'] . '.month_rent <=', intval($data['inputMax']));
            }

            if($data['sort']!= ''){
                if($data['sort']== 'desc'){
                    $this->db->order_by(PREFIX . $data['table'].'.update', 'desc');
                }
                if($data['sort']== 'asc'){
                    $this->db->order_by(PREFIX . $data['table'].'.update', 'asc');
                }
                if($data['sort']=='sortRentAsc'){
                    $this->db->order_by('cast(' . PREFIX . $data['table'].'.month_rent as UNSIGNED) ','asc');
                }
                if($data['sort']=='sortRentDesc'){
                    $this->db->order_by('cast(' . PREFIX . $data['table'].'.month_rent as UNSIGNED) ','desc');
                }
            }
            $this->db->order_by(PREFIX . $data['table'].'.update', 'desc');
            $this->db->order_by(PREFIX . $data['table'].'.created', 'desc');
        }

        $this->db->group_by(PREFIX . $data['table'] . '.id');
        $this->db->limit($per_page, $cur_page);
        $query = $this->db->get(PREFIX . $data['table']);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function getCountAll($areaID,$layout,$type,$size,$cboSizeRentSelect,$rentSelect,$chair,$condo,$Service_aprtment,$search,$data,$per_page= 5 , $cur_page= 0){
        $this->db->distinct();
        $this->db->select(PREFIX . $data['table'] . '.id');
        $this->db->where(PREFIX . $data['table'] . '.status', 1);
        $this->db->join(PREFIX . 'area_' . $data['areas'], PREFIX . $data['table'] . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.' . $data['areas'] . '_id', 'left');
        $this->db->join(PREFIX . 'areas', PREFIX . 'areas' . '.id = ' . PREFIX . 'area_' . $data['areas'] . '.area_id', 'left');
        if($areaID != ''){
            $this->db->where_in(PREFIX . 'areas' . '.id', $areaID);
        }
        if ($data['table'] == 'houses') {
            $this->db->join(PREFIX . 'house_layouts', PREFIX . 'house_layouts' . '.id = ' . PREFIX . $data['table'] . '.house_layout_id', 'left');
            $this->db->where(PREFIX . $data['table'].'.status',1);
            if ($layout != '') {
                $this->db->where(PREFIX . $data['table'] . '.type', $layout);
            }
            if ($type != '') {
                $this->db->where(PREFIX . $data['table'] . '.house_layout_id', $type);
            }
            if ($size != '') {
                $size = explode('-', $size);
                if (count($size) == 1) {
                    $this->db->where(PREFIX . $data['table'] . '.size <=', intval($size[0]));
                } else {
                    $this->db->where(PREFIX . $data['table'] . '.size >=', intval($size[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size <=', intval($size[1]));
                }
            }
            if(($condo !='') && ($Service_aprtment == '')){
                $this->db->select(PREFIX . 'building.name as building_name');
                $this->db->join(PREFIX. 'building_house',PREFIX.'building_house'.'.house_id = ' . PREFIX.'houses'.'.id');
                $this->db->join(PREFIX. 'building',PREFIX.'building'.'.id = ' .PREFIX.'building_house'.'.building_id');
                $this->db->where(PREFIX.'building.id',$condo);
                $this->db->where(PREFIX.'houses.type',1);
            }
            if(($Service_aprtment !='') && ($condo =='')){
                $this->db->select(PREFIX . 'building.name as building_name');
                $this->db->join(PREFIX. 'building_house',PREFIX.'building_house'.'.house_id = ' . PREFIX.'houses'.'.id');
                $this->db->join(PREFIX. 'building',PREFIX.'building'.'.id = ' .PREFIX.'building_house'.'.building_id');
                $this->db->where(PREFIX.'building.id',$Service_aprtment);
                $this->db->where(PREFIX.'houses.type',0);
            }
            if ($search != '') {
                if (!is_numeric($search)) {
                    $searchString = json_encode($search);
                    $searchString = str_replace('"', '', $searchString);
                    $searchString = str_replace('\\', '%\\\\\\\\%', $searchString);
                    $this->db->where('(`cli_areas`.`name` LIKE "%' . $searchString . '%" or `cli_houses`.`name_jp` LIKE "%' . $searchString . '%" or `cli_houses`.`name_en` LIKE "%' . $searchString . '%" or  `cli_houses`.`introduction` like "%' . $searchString . '%")');
                } else {
                    $this->db->like(PREFIX . $data['table'] . '.size', $search);
                    $this->db->or_like(PREFIX . $data['table'] . '.rent', $search);
                    $this->db->or_like(PREFIX . $data['table'] . '.type', $search);
                }
            }
            if (isset($data['inputMin'])){
                $this->db->where(PREFIX . $data['table'] . '.rent >=', intval($data['inputMin']));
            }
            if($data['inputMax']!=''){
                $this->db->where(PREFIX . $data['table'] . '.rent <=', intval($data['inputMax']));
            }
        } else if ($data['table'] == 'offices') {
            if ($size != '') {
                $size = explode('-', $size);
                if (count($size) == 1) {
                    if(intval($size[0])==50) {
                        $this->db->where(PREFIX . $data['table'] . '.size <=', intval($size[0]));
                    }else{
                        $this->db->where(PREFIX . $data['table'] . '.size >=', intval($size[0]));
                    }
                } else {
                    $this->db->where(PREFIX . $data['table'] . '.size >=', intval($size[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size <=', intval($size[1]));
                }
            }
            if($cboSizeRentSelect != ''){
                $cboSizeRentSelect = explode('-',$cboSizeRentSelect);
                if(count($cboSizeRentSelect) == 1) {
                    if (intval($cboSizeRentSelect[0]) == 10) {
                        $this->db->where(PREFIX . $data['table'] . '.size_rent <=', intval($cboSizeRentSelect[0]));
                    } else {
                        $this->db->where(PREFIX . $data['table'] . '.size_rent >=', intval($cboSizeRentSelect[0]));
                    }
                }else {
                    $this->db->where(PREFIX . $data['table'] . '.size_rent >=', intval($cboSizeRentSelect[0]));
                    $this->db->where(PREFIX . $data['table'] . '.size_rent <=', intval($cboSizeRentSelect[1]));
                }
            }
            if($chair != ''){
                if($chair == '5'){
                    $this->db->where(PREFIX . $data['table'] . '.size <= 20');
                }
                if($chair == '6-10'){
                    $this->db->where(PREFIX . $data['table'] . '.size >= 24');
                    $this->db->where(PREFIX . $data['table'] . '.size <= 40');
                }
                if($chair == '11-15'){
                    $this->db->where(PREFIX . $data['table'] . '.size >= 44');
                    $this->db->where(PREFIX . $data['table'] . '.size <= 60');
                }
                if($chair == '16-25'){
                    $this->db->where(PREFIX . $data['table'] . '.size >= 64');
                    $this->db->where(PREFIX . $data['table'] . '.size <= 100');
                }
                if($chair == '26-40'){
                    $this->db->where(PREFIX . $data['table'] . '.size >= 104');
                    $this->db->where(PREFIX . $data['table'] . '.size <= 160');
                }
                if($chair == '40'){
                    $this->db->where(PREFIX . $data['table'] . '.size > 160');
                }
            }
            if ($search != '') {
                if (!is_numeric($search)) {
                    $searchString = json_encode($search);
                    $searchString = str_replace('"', '', $searchString);
                    $searchString = str_replace('\\', '%\\\\\\\\%', $searchString);
                    $this->db->where('(`cli_areas`.`name` like "%' . $searchString . '%" or `cli_offices`.`name_jp` like "%' . $searchString . '%" or `cli_offices`.`name_en` like "%' . $searchString . '%" or  `introduction` like "%' . $searchString . '%")');
                } else {
                    $this->db->like(PREFIX . $data['table'] . '.size', $search);
                    $this->db->or_like(PREFIX . $data['table'] . '.month_rent', $search);
                    $this->db->or_like(PREFIX . $data['table'] . '.type', $search);
                }
            }

            if (isset($data['inputMin'])){
                $this->db->where(PREFIX . $data['table'] . '.month_rent >=', intval($data['inputMin']));
            }
            if($data['inputMax']!=''){
                $this->db->where(PREFIX . $data['table'] . '.month_rent <=', intval($data['inputMax']));
            }
        }
        $query = $this->db->count_all_results(PREFIX.$data['table']);
        if ($query) {
            return $query;
        } else {
            return 0;
        }
    }

    function getImagesHouse(){
        $this->db->select('house_id,name_image');
        $this->db->where('status',1);
        $this->db->order_by('order','ASC');
        $query = $this->db->get(PREFIX .'house_images');
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function getImagesOffice(){
        $this->db->select('office_id,name_image');
        $this->db->where('status',1);
        $query = $this->db->get(PREFIX .'office_images');
        if($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function get_common_facility_houses() {

        $sql = "
            SELECT *
            FROM
            cli_common_facility_house
            INNER JOIN cli_common_facilities ON cli_common_facility_house.common_facility_id = cli_common_facilities.id
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_equipment_houses() {
        $sql = "
            SELECT *
            FROM
            cli_equipments_house
            INNER JOIN cli_equipments ON cli_equipments_house.equipment_id = cli_equipments.id
            WHERE
            cli_equipments.`status` = 1
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_common_facility_offices() {

        $sql = "
            SELECT *
            FROM
            cli_common_facility_office
            INNER JOIN cli_common_facilities ON cli_common_facility_office.common_facility_id = cli_common_facilities.id
        ";
        $query = $this->db->query($sql);
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_all_image_houses($house_id){
        $this->db->select('house_id, name_image');
        $this->db->where('status', 1);
        $this->db->where('house_id', $house_id);
        $query = $this->db->get(PREFIX .'house_images');
        if ($query->result()) {
            $response = $query->result();
            $data = array();
            if ($response) {
                foreach ($response as $item) {
                    if ($item->house_id) {
                        $data[] = $item;
                    }
                }
            }
            return $data;
        } else {
            return array();
        }
    }

    function get_all_image_offices($office_id){
        $this->db->select('office_id, name_image');
        $this->db->where('status', 1);
        $this->db->where('office_id', $office_id);
        $query = $this->db->get(PREFIX .'office_images');
        if ($query->result()) {
            $response = $query->result();
            $data = array();
            if ($response) {
                foreach ($response as $item) {
                    if ($item->office_id) {
                        $data[] = $item;
                    }
                }
            }
            return $data;
        } else {
            return array();
        }
    }

    function get_all_equipment_houses($house_id) {
        $this->db->select('e.id, e.name_image');
        $this->db->from('cli_equipments as e');
        $this->db->join('cli_equipments_house as e_hs', 'e_hs.equipment_id = e.id ', 'left');
        $this->db->where('house_id', $house_id);
        $query = $this->db->get();
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_all_equipment_offices($office_id) {
        $this->db->select('e.id, e.name_image');
        $this->db->from('cli_equipments as e');
        $this->db->join('cli_equipments_office as e_of', 'e_of.equipment_id = e.id ', 'left');
        $this->db->where('office_id', $office_id);
        $query = $this->db->get();
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_all_common_facility_houses($house_id) {
        $this->db->select('f.id, f.name_image');
        $this->db->from('cli_common_facilities as f');
        $this->db->join('cli_common_facility_house as f_hs', 'f_hs.common_facility_id = f.id ', 'left');
        $this->db->where('house_id', $house_id);
        $query = $this->db->get();
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_all_common_facility_offices($office_id) {
        $this->db->select('f.id, f.name_image');
        $this->db->from('cli_common_facilities as f');
        $this->db->join('cli_common_facility_office as f_hs', 'f_hs.common_facility_id = f.id ', 'left');
        $this->db->where('office_id', $office_id);
        $query = $this->db->get();
        if ($query->result()) {
            return $query->result();
        } else {
            return array();
        }
    }
}