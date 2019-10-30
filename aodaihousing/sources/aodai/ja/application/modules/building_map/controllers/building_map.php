<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building_map extends MX_Controller {
	private $device = 'pc';
	private $currency = 'USD';
	private $limit_content = 65;
	private $string_limit_content = '...';
	private $view = '';
	private $module = 'building';
	private $table = 'cli_building';
	private $table_cate = 'category';
	private $get_id_url = '';
    private $per_page = 6;

    function __construct(){
		parent::__construct();
		$this->load->model('building_map/building_map_model','model');
		$this->load->model('area/area_model');

		$this->get_id_url = helper_get_Id_current();

		if($this->uri->segment(1)=='admincp'){
			//MY_Output class's nocache() method
        	$this->output->nocache();

			if($this->uri->segment(2)!='login'){
				if(!$this->session->userdata('userInfo')){
					header('Location: '.PATH_URL.'admincp/login');
					return false;
				}
			}
			$this->template->set_template('admin');
			$this->template->write('title','Admin Control Panel');
		}
	}
	public function admincp_index(){
        $toolBar = array();
        getToolbar($this->module, $toolBar);
        
		$default_func = 'modified_order_in_map';
		$default_sort = 'DESC';
		$data = array(
			'module'=>$this->module.'_map',
			'default_func'=>$default_func,
			'default_sort'=>$default_sort
		);
		$this->template->write_view('content','BACKEND/index',$data);
		$this->template->render();
	}
	
	
	public function admincp_update($id=0){
        $toolBar = array('back', 'save');
        getToolbar($this->module, $toolBar);
        
		$result = array();
			$result[0] = $this->model->getDetailManagement($id);
			$result['dictrict'] = $this->model->getAreasHouse();
		$data = array(
			'result' =>$result,
			'module' =>$this->module.'_map',
			'id'     =>$id
		);
		$this->template->write_view('content','BACKEND/ajax_editContent',$data);
		$this->template->render();
	}

	public function admincp_save(){
		if($_POST){
			//End Upload Image
			if($this->model->saveManagement()){
				//End Upload Image
				print 'success';
				exit;
			}
		}
	}
	
	public function admincp_ajaxLoadContent(){
		$this->load->library('AdminPagination');
		$config['total_rows'] = $this->model->getTotalsearchContent();
		$config['per_page'] = $this->input->post('per_page');
		$config['num_links'] = 3;
		$config['func_ajax'] = 'searchContent';
		$config['start'] = $this->input->post('start');
		$this->adminpagination->initialize($config);

		$result = $this->model->getsearchContent($config['per_page'],$this->input->post('start'));
		$data = array(
			'result'=>$result,
			'per_page'=>$this->input->post('per_page'),
			'start'=>$this->input->post('start'),
			'module'=>$this->module.'_map'
		);
		$this->session->set_userdata('start',$this->input->post('start'));
		$this->load->view('BACKEND/ajax_loadContent',$data);
	}
}