<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_special extends MX_Controller {

	private $module = 'category_special';
	private $table = 'category_special';
    private $module_name = 'category special';
	function __construct(){
		parent::__construct();
		$this->load->model($this->module.'_model','model');
		if($this->uri->segment(1)=='admincp'){
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
	/*------------------------------------ Admin Control Panel ------------------------------------*/
	public function admincp_index(){
        $toolBar = array('addNew', 'show', 'hide', 'delete');
        getToolbar($this->module, $toolBar);
        
		$default_func = 'created';
		$default_sort = 'DESC';
		$data = array(
			'module'=>$this->module,
			'default_func'=>$default_func,
			'default_sort'=>$default_sort,
            'module_name'=> $this->module_name
		);
		$this->template->write_view('content','BACKEND/index',$data);
		$this->template->render();
	}
	
	
	public function admincp_update($id=0){
        $toolBar = array('save');
        getToolbar($this->module, $toolBar);
        
		$result[0] = array();
		if($id!=0){
			$result = $this->model->getDetailManagement($id);
		}
		
		$data = array(
			'result'=>$result[0],
			'module'=>$this->module,
			'id'=>$id,
            'module_name'=> $this->module_name
		);
		
		$this->template->write_view('content','BACKEND/ajax_editContent',$data);
		$this->template->render();
	}

	public function admincp_save(){
		if($_POST){
			$fileName = '';
			if($_FILES){
				if(isset($_FILES['iconAdmincp']['error'])){
					$typeFileImage = strtolower(substr($_FILES['iconAdmincp']['type'],0,5));
					if($typeFileImage == 'image'){
						$tmp_name = $_FILES['iconAdmincp']["tmp_name"];
						$file_name = $_FILES['iconAdmincp']['name'];
						$ext = strtolower(substr($file_name, -4, 4));
						if($ext=='jpeg'){
							$fileName = date('Y-m-d',time()).'_'.SEO(substr($file_name,0,-5)).'.jpg';
						}else{
							$fileName = date('Y-m-d',time()).'_'.SEO(substr($file_name,0,-4)).$ext;
						}
					}else{
						print 'Only upload Image.';
						exit;
					}
				}
			}
			
			if($this->model->saveManagement($fileName)){
				if($_FILES){
					if(isset($_FILES['iconAdmincp']['error'])){
						$upload_path = BASEFOLDER.'static/uploads/category/';
						move_uploaded_file($tmp_name,$upload_path.$fileName);
					}
				}
				print 'success';
				exit;
			}
		}
	}
	
	public function admincp_delete(){
		if($this->input->post('id')){
			$id = $this->input->post('id');
			$result = $this->model->getDetailManagement($id);
			$this->db->where('id',$id);
			if($this->db->delete(PREFIX.$this->table)){
				@unlink(BASEFOLDER.'static/uploads/category/'.$result[0]->icon);
				$this->model->hideCatDetail($id);
				return true;
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
			'module'=>$this->module
		);
		$this->session->set_userdata('start',$this->input->post('start'));
		$this->load->view('BACKEND/ajax_loadContent',$data);
	}
	
	public function admincp_ajaxUpdateStatus(){
		if($this->input->post('status')==0){
			$status = 1;
		}else{
			$status = 0;
		}
		$data = array(
			'status'=>$status
		);
		$this->db->where('id', $this->input->post('id'));
		if($this->db->update(PREFIX.$this->table, $data))
		{
			$this->model->hideCatDetail($this->input->post('id'));
		}
		
		$update = array(
			'status'=>$status,
			'id'=>$this->input->post('id'),
			'module'=>$this->module
		);
		$this->load->view('BACKEND/ajax_updateStatus',$update);
	}
	/*------------------------------------ End Admin Control Panel --------------------------------*/
	
	/*------------------------------------ FRONTEND ------------------------------------*/
	
	/*------------------------------------ End FRONTEND --------------------------------*/
}