<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/6/2018
 * Time: 3:04 PM
 */

class setting_equipment_facilities_model extends MY_Model
{
    private $table = 'setting_equipment_facilities';
    private $module = 'setting_equipment_facilities';
    private $table_common_facilities = 'common_facilities';
    private $table_equipments = 'equipments';
    private $table_type_equipment ='type_equipment';
    private $table_type_facility = 'type_facility';

    function getEquipments($type = 0){
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

    function getFacilities($type = 0){
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

    function getEquipmentCondo(){
        $this->db->select('*');
        $this->db->where('type_condo',1);
        $query = $this->db->get(PREFIX .$this->table_type_equipment);

        if($query->result()) {
            return $query->result();
        }else{
            return array();
        }
    }

    function getEquipmentServiced(){
        $this->db->select('*');
        $this->db->where('type_serviced',1);
        $query = $this->db->get(PREFIX .$this->table_type_equipment);

        if($query->result()) {
            return $query->result();
        }else{
            return array();
        }
    }

    function getFacilitiesCondo(){
        $this->db->select('*');
        $this->db->where('type_condo',1);
        $query = $this->db->get(PREFIX .$this->table_type_facility);

        if($query->result()) {
            return $query->result();
        }else{
            return array();
        }
    }

    function getFacilitiesServiced(){
        $this->db->select('*');
        $this->db->where('type_serviced',1);
        $query = $this->db->get(PREFIX.$this->table_type_facility);

        if($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }

    function saveManagement(){
        if(isset($_POST) && count($_POST) > 0){
            $data = array(
                'type_condo'    => '0',
                'type_serviced' => '0',
                'updated'    => date('Y-m-d H:i:s', time())
            );
            $this->db->update('cli_type_equipment',$data);
            $this->db->update('cli_type_facility',$data);
        }
        $condoEquipment = $this->input->post('Condo_equipment');
        $condoFacilities  = $this->input->post('Condo_facilities');
        $ServicedEquipment = $this->input->post('Serviced_equipment');
        $servicedFacilities = $this->input->post('Serviced_facilities');
        if(isset($condoEquipment)){
            foreach ($condoEquipment as $cde){
                $data = array(
                    'type_condo' => '1',
                    'updated'    => date('Y-m-d H:i:s', time())
                );
                $this->db->where('equipment_id',$cde);
                $this->db->update('cli_type_equipment',$data);
            }
        }

        if(isset($ServicedEquipment)){
            foreach ($ServicedEquipment as $svc){
                $data = array(
                    'type_serviced' => '1',
                    'updated'       => date('Y-m-d H:i:s', time())
                );
                $this->db->where('equipment_id',$svc);
                $this->db->update('cli_type_equipment',$data);
            }
        }

        if(isset($condoFacilities)){
            foreach ($condoFacilities as $cdf){
                $data = array(
                    'type_condo'   => '1',
                    'updated'      => date('Y-m-d H:i:s', time())
                );
                $this->db->where('facility_id',$cdf);
                $this->db->update('cli_type_facility',$data);
            }
        }

        if(isset($servicedFacilities)){
            foreach ($servicedFacilities as $svf){
                $data = array(
                    'type_serviced' => '1',
                    'updated'        => date('Y-m-d H:i:s', time())
                );
                $this->db->where('facility_id',$svf);
                $this->db->update('cli_type_facility',$data);
            }
        }
        return true;
    }

}