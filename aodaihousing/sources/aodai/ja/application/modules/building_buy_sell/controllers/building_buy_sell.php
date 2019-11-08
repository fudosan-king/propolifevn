<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building_buy_sell extends MX_Controller {
	private $device = 'pc';
	private $module = 'building_buy_sell';
	private $table  = 'cli_building_buy_sell';
	private $per_page = 20;
	private $path_folder_image = 'static/uploads/building_buy_sell';

    function __construct(){
		parent::__construct();
		$this->device = mobile_template();
		$this->load->model('building_buy_sell_model', 'model');

		if ($this->uri->segment(1)=='admincp') {
			//MY_Output class's nocache() method
        	$this->output->nocache();

			if ($this->uri->segment(2)!='login') {
				if (!$this->session->userdata('userInfo')) {
					header('Location: '.PATH_URL.'admincp/login');
					return false;
				}
			}
			$this->template->set_template('admin');
			$this->template->write('title','Admin Control Panel');
		}
	}
	
	public function admincp_index() {
        $toolBar = array('addNew', 'show', 'hide', 'delete');
        getToolbar($this->module, $toolBar);
        
		$default_func = 'modified';
		$default_sort = 'DESC';
		$data = array(
			'module'=>$this->module,
			'default_func'=>$default_func,
			'default_sort'=>$default_sort
		);
		$this->template->write_view('content','BACKEND/index',$data);
		$this->template->render();
	}
	
	public function admincp_update($id=0) {
        $toolBar = array('back', 'save');
        getToolbar($this->module, $toolBar);
        
		$result = $this->model->getDetailManagement($id);
		$data = array(
			'result' => $result,
			'module' => $this->module,
			'id'     => $id
		);
		$this->template->write_view('content','BACKEND/ajax_editContent',$data);
		$this->template->render();
	}

	public function admincp_save() {
		if ($_POST) {
			//Upload Image
			$fileName = array('images'=>'');
			if ($_FILES) {
				foreach ($fileName as $k=>$v) {
					if (isset($_FILES['fileAdmincp']['error'][$k])) {
						$typeFileImage = strtolower(substr($_FILES['fileAdmincp']['type'][$k],0,5));
						if ($typeFileImage == 'image') {
							$tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"][$k];
							$file_name[$k] = $_FILES['fileAdmincp']['name'][$k];
							$ext = strtolower(substr($file_name[$k], -4, 4));
							if ($ext=='jpeg') {
								$fileName[$k] = time().'_'.SEO(substr($file_name[$k],0,-5)).'.jpg';
							} else {
								$fileName[$k] = time().'_'.SEO(substr($file_name[$k],0,-4)).$ext;
							}
						} else {
							print 'Only upload Image.';
							exit;
						}
					}
				}
			} else {
				// Only valid choose image when create new data
				if ($this->input->post('hiddenIdAdmincp')==0) {
					print 'Please choose image';
					exit;
				}
			}

			//End Upload Image
			if ($this->model->saveManagement($fileName)) {
				//Upload Image
				if ($_FILES) {
					foreach ($fileName as $k=>$v) {
						if (isset($_FILES['fileAdmincp']['error'][$k])) {
							$upload_path = BASEFOLDER . $this->path_folder_image . '/';
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
	
	public function admincp_delete() {
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
			$result = $this->model->getDetailManagement($id);
			$this->db->where('id', $id);
			if ($this->db->delete($this->table)) {
				if ($result->image) {
					@unlink(BASEFOLDER . $this->path_folder_image . '/' . $result->image);
				}
				return true;
			}
		}
	}
	
	public function admincp_ajaxLoadContent() {
		$this->load->library('AdminPagination');
		$config['total_rows'] = $this->model->getTotalsearchContent();
		$config['per_page'] = $this->input->post('per_page');
		$config['num_links'] = 3;
		$config['func_ajax'] = 'searchContent';
		$config['start'] = $this->input->post('start');
		$this->adminpagination->initialize($config);

		$result = $this->model->getsearchContent($config['per_page'], $this->input->post('start'));
		$data = array(
			'result'=>$result,
			'per_page'=>$this->input->post('per_page'),
			'start'=>$this->input->post('start'),
			'module'=>$this->module
		);
		$this->session->set_userdata('start',$this->input->post('start'));
		$this->load->view('BACKEND/ajax_loadContent', $data);
	}
	
	public function admincp_ajaxUpdateStatus() {
		$id = $this->input->post('id');
		if ($this->input->post('status')==0) {
			$status = 1;
		} else {
			$status = 0;
		}
		
		$data = array(
			'status'=>$status
		);
		
		$this->db->where('id', $id);
		if ($this->db->update($this->table, $data)) {
            $this->model->hideCatDetail($id);
        }
		
		$update = array(
			'status'=>$status,
			'id'=>$this->input->post('id'),
			'module'=>$this->module
		);
		$this->load->view('BACKEND/ajax_updateStatus', $update);
	}

	public function index() {
		$seoGoogle = array(
            'keyword' => 'ベトナム,ホーチミン,不動産,売買,管理,購入',
            'title' => 'ホーチミンで不動産の売買・管理なら│アオザイハウジング',
            'description' => 'アオザイハウジングではベトナムホーチミンで分譲されている新築コンドミニアムや立地条件が良い築浅中古物件の売買、購入後の不動産管理、納税のお手伝いもさせて頂いております。ホーチミンの不動産売買・賃貸・管理のことならアオザイハウジングにお気軽にご相談ください。',
        );
        
        $seo = array(
            'title' => 'ホーチミンで不動産の売買・管理なら│アオザイハウジング',
            'description' => 'アオザイハウジングではベトナムホーチミンで分譲されている新築コンドミニアムや立地条件が良い築浅中古物件の売買、購入後の不動産管理、納税のお手伝いもさせて頂いております。ホーチミンの不動産売買・賃貸・管理のことならアオザイハウジングにお気軽にご相談ください。',
        );
		
		$data = array();
		$data['language'] = current_lang_();
		$count = $this->model->getCountData();
        $page = isset($_GET['p'])?$_GET['p']:0;
        if ($page != 0) {
            $page = $page - 1;
        }
        $cur_page = $page * $this->per_page;
		$data['list'] = $this->model->getDataByCondition($this->per_page, $cur_page);
        $this->load->library('pagination');
        $config['total_rows'] = $count;
        $config['base_url'] = reduce_double_slashes(PATH_URL . $this->uri->uri_string());
        $config['per_page'] = $this->per_page;
        $config['use_page_numbers'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        // Page
        $config['query_string_segment'] = 'p';
        // Only use for smart phone
        if (is_smartphone() == 'sp') {
            $config['num_links'] = 1;
        }
        $config['first_link'] = lang('最初');
        $config['last_link'] = lang('最後');
        $this->pagination->initialize($config);
        $data['paging']= $this->pagination;

        $this->template->write_view('content', 'FRONTEND/index', $data);
		headerSeo($seo, $seoGoogle);
        $this->template->render();
	}

	public function detail() {
		$id = helper_get_Id_current();
		$exists = $this->model->checkExistsData(array('id' => $id));
		if (!$exists) {
			$this->load->view('common/page_404');
			return false;
		}

		$information = $this->model->getDetailManagement($id);

		$titleSeo = trim(vcp_printf($information->title, current_lang_()));
	    $titleSeo = html_entity_decode($titleSeo);
		$seoGoogle = array(
            'keyword' => 'ベトナム,ホーチミン,不動産,購入,売買',
            'title' => $titleSeo.'│アオザイハウジング',
            'description' => 'アオザイハウジングでは、ホーチミンの分譲マンションなど不動産購入もサポートしております。',
        );
        $seo = array(
            'title' => $titleSeo.'│アオザイハウジング',
            'description' => 'アオザイハウジングでは、ホーチミンの分譲マンションなど不動産購入もサポートしております。',
        );

        $data = array(
			'id'           => $id,
			'current_lang' => current_lang_(),
        	'information'  => $information,
    	);

    	$this->template->write_view('content', 'FRONTEND/detail', $data);
		headerSeo($seo, $seoGoogle);
		$this->template->render();
	}
}