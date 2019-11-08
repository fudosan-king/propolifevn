<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MX_Controller {
	public $device = 'pc';
	private $module = 'news';
	private $table = 'news';
	function __construct(){
		parent::__construct();
		$this->device = mobile_template();
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
			'default_sort'=>$default_sort
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
			'id'=>$id
		);
		$this->template->write_view('content','BACKEND/ajax_editContent',$data);
		$this->template->render();
	}

	public function admincp_save(){
		if($_POST){
			//Upload Image
			$fileName = array('images'=>'','images_thumb'=>'');
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
							$upload_path = BASEFOLDER.'static/uploads/news/';
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
			if($this->db->delete(PREFIX.$this->table)){
				//Xóa hình khi Delete
				@unlink(BASEFOLDER.'static/uploads/news/'.$result[0]->images);
				@unlink(BASEFOLDER.'static/uploads/news/'.$result[0]->images_thumb);
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
		$this->db->update(PREFIX.$this->table, $data);
		
		$update = array(
			'status'=>$status,
			'id'=>$this->input->post('id'),
			'module'=>$this->module
		);
		$this->load->view('BACKEND/ajax_updateStatus',$update);
	}
	/*------------------------------------ End Admin Control Panel --------------------------------*/
	
	
	/*------------------------------------ FRONTEND ------------------------------------*/
	public function getlist_news() {
	   $this->load->model('news/news_model', 'news');
	   $items = $this->news->getlistNews();
       $data['items'] = $items;
       $this->load->view('FRONTEND/list-sidebar', $data);
	}
    
    public function detail() {
        
        $id = $this->uri->segment(3);
        if(!is_numeric($id)){
            $id = $this->uri->segment(2);
        }
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $prevRecord = $this->model->prevRecord($id);
            $nextRecord = $this->model->nextRecord($id);
            $data = array(
    			'item'=>$item,
                'prevRecord'=>$prevRecord,
                'nextRecord'=>$nextRecord
    		);
            
            $title = empty($item->title)? $this->config->item('title'):vcp_printf($item->title, current_lang_());
            $seo = array(
                'title' => 'スタッフブログ│アオザイハウジング│'.$title ,
                'description'=> 'アオザイハウジングのスタッフブログです。ホーチミン現地よりホーチミンの様子や賃貸不動産の情報、地域情報、生活情報などを書いております。',
                'keywords' => 'ホーチミン,地域情報,生活情報,不動産,賃貸',
            );
            headerSeo($seo);
            //$title = empty($item->title)? $this->config->item('title'):vcp_printf($item->title, current_lang_());
            //$this->template->write('title',$title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
        
    }
	/*------------------------------------ End FRONTEND --------------------------------*/
}