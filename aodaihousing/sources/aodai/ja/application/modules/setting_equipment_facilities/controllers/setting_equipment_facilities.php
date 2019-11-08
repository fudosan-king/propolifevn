<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_equipment_facilities extends MX_Controller
{
    private $table = 'setting_equipment_facilities';
    private $module = 'setting_equipment_facilities';

    function __construct()
    {
        parent::__construct();
        $this->load->model('setting_equipment_facilities_model', 'model');
        if ($this->uri->segment(1) == 'admincp') {
            //MY_Output class's nocache() method
            $this->output->nocache();

            if ($this->uri->segment(2) != 'login') {
                if (!$this->session->userdata('userInfo')) {
                    header('Location: ' . PATH_URL . 'admincp/login');
                    return false;
                }
            }
            $this->template->set_template('admin');
            //$this->template->write('title','Admin Control Panel');
        }
    }
    /*------------------------------------ Admin Control Panel ------------------------------------*/
    public function admincp_index(){
        $toolBar = array('save_setting');
        getToolbar($this->module, $toolBar);
        $equipments_condo    = $this->model->getEquipmentCondo();
        $equipments_serviced = $this->model->getEquipmentServiced();
        $facilities_condo    = $this->model->getFacilitiesCondo();
        $facilities_serviced = $this->model->getFacilitiesServiced();
        $equipments ='';
        $facilities ='';
        $equipments = $this->model->getEquipments(0);
        $facilities = $this->model->getFacilities(0);
        $data = array(
            'equipment_condo'       =>$equipments_condo,
            'equipments_serviced'   =>$equipments_serviced,
            'facilities_condo'      =>$facilities_condo,
            'facilities_serviced'   =>$facilities_serviced,
            'equipments'            =>$equipments,
            'facilities'            =>$facilities,
            'start'                 => $this->input->post('start'),
            'module'                => $this->module
        );
        $this->template->write_view('content','BACKEND/ajax_editContent',$data);
        $this->template->render();
    }

    public function admincp_save(){
        if($this->model->saveManagement()){
            print 'success';
            redirect(PATH_URL.'admincp/setting_equipment_facilities/');
        }
    }
}