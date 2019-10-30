<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MX_Controller {

	private $module = 'contact';
	private $table = 'contact';
    private $module_name = 'Danh sách liên hệ';

    public $device = 'pc';

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
        $toolBar = array('show', 'hide', 'delete');
        getToolbar($this->module, $toolBar);
        
		$default_func = 'created';
		$default_sort = 'DESC';
		$data = array(
			'module'=>$this->module,
			'default_func'=>$default_func,
			'default_sort'=>$default_sort,
            'module_name'=>$this->module_name
		);
		$this->template->write_view('content','BACKEND/index',$data);
		$this->template->render();
	}
	
	
	public function admincp_update($id=0){
		$toolBar = array('back');
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
	
    public function contact_step1(){
          //mail("phungv@gmail.com", "Test Subject", "Test Message");  
        $error = 0;
        $step2 = false;
        $data = array();
        foreach($_POST as $key=>$value) {
            $data[$key] = $value;
        }
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $data['lang'] = $lang;
        $message_er = array( 
        );
        
        if(isset($_POST['send']) && $_POST['send'] == lang('記入内容確認へ')){
            $data_er = array(
                
            );
        
            if($lang == 'ja'){
                $data_er['name'] = $this->input->post('name'); 
                $data_er['name_hiragana'] = $this->input->post('name_hiragana');
                if($data_er['name'] == '') {
                    $message_er['name'] = 'お名前（漢字）を入力してください。';
                    $error = 1;
                } 
                
				if($this->device!='mobile'){
					if($data_er['name_hiragana'] == '') {
						$message_er['name_hiragana'] = 'お名前（ひらがな）を入力してください。';
						$error = 1;
					}
				}
            }else{
                $data_er['name_alphabet'] = $this->input->post('name_alphabet'); 
                if($data_er['name_alphabet'] == '') {
                    $message_er['name_alphabet'] = 'お名前（アルファベット）';
                    $error = 1;
                } 
            }
            
            $data_er['email'] = $this->input->post('email'); 
            if($data_er['email'] == '') {
                $message_er['email'] = 'メールアドレスを入力してください。';
                $error = 1;
            }elseif(!filter_var($data_er['email'], FILTER_VALIDATE_EMAIL)){
                $message_er['email'] = 'メールアドレスが正しくありません。';
                $error = 1;
            }
            
            $data_er['phone'] = $this->input->post('phone'); 
            if($data_er['phone'] == '') {
                $message_er['phone'] = ' 電話番号を入力してください。';
                $error = 1;
            }elseif(!is_numeric($data_er['phone'])) {
                $message_er['phone'] = ' 電話番号は数字のみで入力してください';
                $error = 1;
            }
            $data_er['content'] = $this->input->post('content'); 
            if($data_er['content'] == '') {
                $message_er['content'] = 'お問い合わせ内容を入力してください。';
                $error = 1;
            }  
            if($error == 0){
                $type = isset($_GET['type']) ? $_GET['type']:'';
                $id = isset($_GET['id']) ? $_GET['id']:'';
        
                $data['type'] = $type;
                $data['id'] = $id;
                
                if($this->device=='mobile'){
					$data_insert = array(
						'name' => $this->input->post('name'),
						'name_hiragana' => $this->input->post('name_hiragana'),
						'name_alphabet' => $this->input->post('name_alphabet'),
						'tel' => $this->input->post('phone'),
						'email' => $this->input->post('email'),
						'content' => $this->input->post('content'),
						'address'=>$this->input->post('address'),
						'created'=> date('Y-m-d H:i:s',time()),
						'type' => $type,
						'id_client' => $id,
						'contents_4_value' => $this->input->post('date_from').' - '.$this->input->post('date_to')
					);
					$this->db->insert(PREFIX.'contact',$data_insert);
					//$this->sendMail($data_insert);
				}else{
					$this->load->view('FRONTEND/step2', $data);
					$step2 = true;
				}
            }
        }
        $data['error'] = $error;
        $data['message_er'] = $message_er;
		if($this->device=='mobile'){
			if(isset($_POST['send']) && $_POST['send'] == lang('記入内容確認へ')){
				print json_encode(array('error'=>$error,'mes'=>$message_er));exit;
			}
		}
        if($step2 == false){
            $this->load->view('FRONTEND/step1', $data);
        }
        
    }
    
    public function contact_step2(){
        $this->load->view('FRONTEND/step2');
    }
    
    public function contact_step3(){
        $this->load->helper('url');
        $type = isset($_GET['type']) ? $_GET['type']:'';
        $id = isset($_GET['id']) ? $_GET['id']:'';
        if($this->input->post('step') == "step3"){
            $data = array(
                'name' => $this->input->post('name'),
                'name_hiragana' => $this->input->post('name_hiragana'),
                'name_alphabet' => $this->input->post('name_alphabet'),
                'tel' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'content' => $this->input->post('content'),
                'address'=>$this->input->post('address'),
                'created'=> date('Y-m-d H:i:s',time()),
                'type' => $type,
                'id_client' => $id,
                
            );
            $this->db->insert(PREFIX.'contact',$data);
            $this->sendMail($data);
        }else{
            redirect(PATH_URL . 'contact/contact_step1');
        }
        $this->load->view('FRONTEND/step3');
    }
    
    public function is_valid_email($email)
    {
    	if(preg_match("/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/", $email) > 0)
    		return true;
    	else
    		return false;
    }
    
    public function sendMail($data)
    {
        $html = $this->load->view('FRONTEND/send_mail', $data, true);
        $subject = '【Aodaihousing】Webからの問合せ';
        $body = $html;
        $emailFrom = 'info@aodaihousing.com';
        //$emailFrom = 'congphung@jv-it.com.vn';
         $bcc_list = array(
            // array('name'=>'suzuki', 'email'=> 'suzuki@propolife.co.jp'),
            // array('name'=>'wada', 'email'=> 'wada@aodaihousing.com'),
            // array('name'=>'dung', 'email'=> 'dung@aodaihousing.com'),
            // array('name'=>'info', 'email'=> 'info@propolifevietnam.com'),
            // array('name'=>'m.watanabe', 'email'=> 'm.watanabe@aodaihousing.com'),
            // array('name'=>'ebuchi', 'email'=> 'ebuchi@propolifevietnam.com'),
            // array('name'=>'linh', 'email'=> 'linh@aodaihousing.com'),
            // array('name'=>'ha', 'email'=> 'ha@aodaihousing.com'),
            // array('name'=>'vi', 'email'=> 'vi@aodaihousing.com')   

            array('name'=>'suzuki', 'email'=> 'suzuki@propolifevietnam.com'),
            array('name'=>'suzuki', 'email'=> 'suzuki@propolife.co.jp'),
            array('name'=>'wada', 'email'=> 'wada@aodaihousing.com'),
            array('name'=>'m.watanabe', 'email'=> 'm.watanabe@aodaihousing.com'),
            array('name'=>'ebuchi', 'email'=> 'ebuchi@propolifevietnam.com'),
            array('name'=>'dung', 'email'=> 'dung@aodaihousing.com')
        );
        $emailFromName = 'info';
        $emailTo = $data['email'];
        $emailToName = $data['email'];
        $emailSent = sendEmail($emailTo, $emailToName, $emailFrom, $emailFromName, $subject, $body, $bcc_list);
       // $emailSent = sendEmail($emailTo, $emailToName, $emailFrom, $emailFromName, $subject, $body);
    }
	/*------------------------------------ End FRONTEND --------------------------------*/

	/*-----------CONTACT MOBILE---------------*/
	public function contact_mobile(){
	    $seoGoogle = array(
                'keyword' => '',
                'title' => 'お問い合わせ │ プロポライフベトナム',
                'description' => '',
            );
        $seo = array(
            'title' => 'お問い合わせ │ プロポライフベトナム',
            'description' => '',
            'url' => PATH_URL
        );
        headerSeo($seo, $seoGoogle);
		$this->load->model('houses/houses_model');
		if($this->input->get('id')){
			$item = $this->houses_model->getDetail($this->input->get('id'));
			$data['title'] = vcp_printf($item->name_en, current_lang_());
		}else{
			$data['title'] = '';
		}
		$this->template->write_view('content','FRONTEND/contact_mobile',$data);
		$this->template->render();
	}

	/*-------------End contact mobile----------*/

}