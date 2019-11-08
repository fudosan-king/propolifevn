<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_request_email extends MX_Controller {

	private $module = 'contact_request_email';
	private $table = 'contact_request_email';
    private $module_name = 'Manager Request Mail';

    public $device = 'pc';

	function __construct(){
		parent::__construct();
		$this->device = mobile_template();
		$this->load->model('contact_request_email_model','model');
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
		if($result == ''){
            $this->load->view('common/page_404');
        }else{
            $data = array(
                'result'=>$result[0],
                'module'=>$this->module,
                'id'    =>$id,
                'property_type' => $this->model->getproperty_type($id),
                'floor_plans'   => $this->model->getfloorplans($id),
            );

            $this->template->write_view('content','BACKEND/ajax_editContent',$data);
            $this->template->render();
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
			'module'=>$this->module,
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

	public function index() {
        $seoGoogle = array(
            'keyword' => "ホーチミン物件,ホーチミンお部屋,ホーチミンエリア,ホーチミン生活",
        );
        $seo = array(
            'title' => "希望物件リクエスト│アオザイハウジング",
            'description' => "希望を登録すると、経験豊富な現地のプロがご提案しております。特に始めてホーチミンで生活を送られる方にお勧めです。",
        );
	    $dataProperty_type = $this->model->getDataProperty_type();
	    $dataFloor_plans   = $this->model->getDataFloor_plans();
	    $data = array(
	        'dataProperty_type' => $dataProperty_type,
            'dataFloor_plans'   => $dataFloor_plans,
        );
        $this->template->write_view('content', 'FRONTEND/index', $data);
        headerSeo($seo, $seoGoogle);
        $this->template->render();
    }
	
   	public function ajax_contact_request() {
       	if (isset($_POST)) {
       		if ($this->input->post('contract_personal')=='on') {
				$contract_personal = 1;
			} else {
				$contract_personal = 0;
			}

			if ($this->input->post('contract_company')=='on') {
				$contract_company = 1;
			} else {
				$contract_company = 0;
			}

           	$data = array(
               'location'               => $this->input->post('location'),
               'space_size'             => isset($_POST['space_size'])? $_POST['space_size']:'',
               'exchenge_flg'           => 2,
               'united_budget'          => isset($_POST['united_budget'])? $_POST['united_budget']:'',
               'move_in_date_month'     => isset($_POST['move_in_date_month'])? $_POST['move_in_date_month']:'',
               'move_in_date_undicided' => 0,
               'client_company_name'    => $this->input->post('client_company_name'),
               'client_name'            => $this->input->post('client_name'),
               'client_email'           => isset($_POST['client_email'])? $_POST['client_email']:'',
               'client_phone'           => isset($_POST['client_phone'])? $_POST['client_phone']:'',
               'contract_personal'      => $contract_personal,
               'contract_company'       => $contract_company,
               'created'                => date('Y-m-d H:i:s', time()),
               'updated'                => date('Y-m-d H:i:s', time()),
               'status'                 => 1 
           	);

       		$id = $this->model->saveManagement($data);
           	$data['property_type'] = $this->model->getproperty_type($id);
           	$data['floor_plans']   = $this->model->getfloorplans($id);
           	
           	$this->load->helper('email');
           	if($data['client_email'] != '' && valid_email($data['client_email'])) {
               $this->sendMail($data);
       		}
           	$result = 'メール送信しました。';
       	} else {
           $result = lang('挿入に失敗しました。');
       	}
       	echo $result; die;
   	}

    public function sendMail($data)
    {
        $html = $this->load->view('FRONTEND/send_mail', $data, true);
        $subject = $this->device != "mobile" ? '【Aodaihousing】Webからの問合せ' : '【Aodaihousing】Web smartからの問合せ';
        $body = $html;
        $emailFrom = CONTACT_MAIL;
        $this->load->model('setting_email_system/setting_email_system_model');
        $bcc_list = $this->setting_email_system_model->getListEmail('bcc');
        $cc_list  = $this->setting_email_system_model->getListEmail('cc');
        $to_list  = $this->setting_email_system_model->getListEmail('to');

        $emailFromName = 'info';
        $emailTo = $data['client_email'];
        $emailToName = $data['client_email'];
        $emailSent = sendEmail($emailTo, $emailToName, $emailFrom, $emailFromName, $subject, $body, $bcc_list, $cc_list, $to_list);
    }

	/*-------------End contact mobile----------*/

}