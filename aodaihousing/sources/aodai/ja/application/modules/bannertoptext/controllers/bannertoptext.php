<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BannerTopText extends MX_Controller {
	private $module = 'bannertoptext';
    private $module_name = 'Banner top text';
	private $table = 'banner_top_text';
	function __construct(){
		parent::__construct();
		$this->load->model('bannertoptext_model','model');
		if($this->uri->segment(1)=='admincp'){
			//MY_Output class's nocache() method
        	$this->output->nocache();

			if($this->uri->segment(2)!='login'){
				if(!$this->session->userdata('userInfo')){
					header('Location: '.PATH_URL.'admincp/login');
					return false;				}
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
			'module'       => $this->module,
			'module_name'  => $this->module_name,
			'default_func' => $default_func,
			'default_sort' => $default_sort
		);
		$this->template->write_view('content','BACKEND/index',$data);
		$this->template->render();
	}
	
	public function admincp_update($id=0){
        $toolBar = array('save');
        getToolbar($this->module, $toolBar);
        
		$result[0] = array();
		if ($id!=0) {
			$result = $this->model->getDetailManagement($id);
		}
		
		// Data use for insert or update
		$data = array(
			'result'       => $result[0],
			'module'       => $this->module,
			'module_name'  => $this->module_name,
			'id'           => $id,
			'descriptions' => array(
				'one'   => 'description_one',
				'two'   => 'description_two',
				'three' => 'description_three',
				'four'  => 'description_four',
			)
		);

		// Status
		$checked_status = "";
		if (isset($result[0]->status) && $result[0]->status == 1) {
			$checked_status = "checked";
		}
		$data['checked_status'] = $checked_status;

		// Id use for case insert or update data
		$idHidden = '';
		if (isset($result[0]->id)) {
			$idHidden = $result[0]->id;
		} else {
			$idHidden = '';
		}
		$data['idHidden'] = $idHidden;

		// Title JP
		$title_desc_jp = '';
		if (isset($result[0]->title)) {
			$title_desc_jp = vcp_printf($result[0]->title, 'jp');
		} else {
			$title_desc_jp = '';
		}
		$data['title_desc_jp'] = $title_desc_jp;

		// Title VN
		$title_desc_vn = '';
		if (isset($result[0]->title)) {
			$title_desc_vn = vcp_printf($result[0]->title, 'vn');
		} else {
			$title_desc_vn = '';
		}
		$data['title_desc_vn'] = $title_desc_vn;

		$this->template->write_view('content', 'BACKEND/ajax_editContent', $data);
		$this->template->render();
	}

	public function admincp_save(){
		if($_POST){
			//Upload Image
			$fileName = array('images'=>'', 'images_en'=>'');
			if($_FILES){
				foreach($fileName as $k=>$v){
					if(isset($_FILES['fileAdmincp']['error'][$k])){
						$typeFileImage = strtolower(substr($_FILES['fileAdmincp']['type'][$k],0,5));
						if($typeFileImage == 'image'){
							$tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"][$k];
							$file_name[$k] = $_FILES['fileAdmincp']['name'][$k];
							$ext = strtolower(substr($file_name[$k], -4, 4));
							if($ext=='jpeg'){
								$fileName[$k] = time().'_'.SEO(substr($file_name[$k],0,-5)).'.jpg';
							}else{
								$fileName[$k] = time().'_'.SEO(substr($file_name[$k],0,-4)).$ext;
							}
						}else{
							print 'Only upload Image.';
							exit;
						}
					}
				}
			}
			//End Upload Image
			
			if($this->model->saveManagement($fileName)){
				//Upload Image
				if($_FILES){
					foreach($fileName as $k=>$v){
						if(isset($_FILES['fileAdmincp']['error'][$k])){
							$upload_path = BASEFOLDER.'static/uploads/bannerhome/';
							move_uploaded_file($tmp_name[$k], $upload_path.$fileName[$k]);
						}
					}
				}
				//End Upload Image
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
			$this->db->delete(PREFIX.$this->table);
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
	
	public function get_banner() {
	   $this->load->model('bannertoptext/bannertoptext_model', 'bannerTopText');
	   $item = $this->bannerTopText->getBanner();
       $data['items'] = $item;
       $this->load->view('FRONTEND/get_banner', $data);
	}
	/*------------------------------------ FRONTEND ------------------------------------*/
	
	/*------------------------------------ End FRONTEND --------------------------------*/
}