<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller {

	private $module = 'page';
	private $table = 'page';
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
		}else{
		      //headerSeo();
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
    
    public function page_service() {
        $id = 221;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
        
    }
    public function page_about() {
        $id = 222;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'プロポライフベトナム【会社概要】 │ アオザイハウジング',
                // 'description' => '安心の不動産賃貸仲介・法人設立進出サポート・内装デザイン設計施工を行っているプロポライフベトナムの会社概要です。' 
                 'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/page_about',$data);
    		$this->template->render();
        }
    }
    
    public function page_suport_vn(){
        $id = 223;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ロータスサービス【視察の流れ】 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    public function page_contracting_services(){
        $id = 233;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_register_home(){
        $id = 234;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市物件オーナー様募集 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_workshops_home(){
        $id = 235;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'レンタル工場・貸し工場│アオザイハウジング │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_contracting_process() {
        $id = 233;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市賃貸ご契約の流れ │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_shopping() {
        $id = 237;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ホーチミン,不動産,購入,買う'
            );
            headerSeo('', $seoGoogle);        
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    public function page_work_permits() {
        $id = 238;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,ビザ,アライバルビザ'
            );
            $seo = array(
                'title' => 'ベトナムビザ │ ロータスサービス',
                'description' => 'ベトナムビザなら2,500件超の取り扱い実績のロータスサービスへ。ロータスサービスは、経験豊富な日本人担当者とベトナム法の運用に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスです。'
            );
            headerSeo($seo, $seoGoogle);        
            
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/page_work_permits',$data);
    		$this->template->render();
        }
    }

    public function page_vietnam_work_permits() {
        $id = 270;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
                'item'=>$item
            );
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,労働許可証,免除申請,更新,レジデンスカード'
            );
            $seo = array(
                'title' => 'ベトナム労働許可証 │ ロータスサービス',
                'description' => 'ベトナムの労働許可証、免除申請ならロータスサービスにお任せ下さい。新規取得、更新ともにレジデンスカードまで対応しております。ロータスサービスは、経験豊富な日本人担当者とベトナム法の運用に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスです。'
            );
            headerSeo($seo, $seoGoogle);        
            
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    
    public function page_incorporation() {
        $id = 239;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ベトナム,ホーチミン,ビザ,アライバルビザ,労働許可証,ビザ取得,延長'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '法人設立・駐在員事務所開設の流れ│ロータスサービス │ アオザイハウジング',
                // 'description' => 'ベトナム進出のワンストップサービスをご提供しているロータスサービスのビザ・労働許可証サポートの紹介です。'
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);                        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_find_industrial() {
        $id = 240;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ロータスサービス【ベトナム 中古工業団地を買いたい】 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_design_interior() {
        $id = 243;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミンでの内装工事 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_case_construction() {
        $id = 245;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                //'keyword' => 'ベトナム,ホーチミン,法人,駐在員事務所,工業団地,工場'
            );
            headerSeo('', $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_after_sales_service() {
        $id = 246;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                //'keyword' => 'ベトナム,ホーチミン,法人,駐在員事務所,工業団地,工場'
            );
            headerSeo('', $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    
    public function page_staff_introduction() {
        $id = 242;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'プロポライフベトナム│社員紹介 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/page_staff_introduction',$data);
    		$this->template->render();
        }
    }
    
    public function page_jobs() {
        $id = 244;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);
            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'プロポライフベトナム【採用情報】 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    public function page_support_content() {
        $id = 241;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,ライセンス'
            );
            $seo = array(
                'title' => 'ベトナム進出後支援 │ ロータスサービス',
                'description' => 'ベトナムホーチミンで進出後のサポートならロータスサービスへ。ロータスサービスは、経験豊富な日本人担当者とベトナム法の運用に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスです。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }
    public function page_aodai_support(){
        $id = 247;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市アオザイサポートデスクについて │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    public function page_interior_furniture(){
        $id = 248;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ベトナム,ホーチミン,設計,施工,内装工事,クロニクルインテリアリフォーム'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ベトナム,ホーチミン,設計,施工,内装工事,クロニクルリフォーム',
                'title' => 'ホーチミンで住居・マンションの内装なら │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    public function page_vitalify(){
        $id = 249;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,バイタリフィアジア'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'バイタリフィアジア（VITALIFY ASIA）様 ホーチミン施工事例',
                'title' => '施工事例バイタリフィアジア様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    public function page_regal(){
        $id = 250;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,リーガル'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'リーガル（REGAL）様 ホーチミン施工事例',
                'title' => '施工事例リーガル様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    public function page_fanuc(){
        $id = 251;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,ファナックベトナム'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ファナックベトナム（FANUC VIETNAM）様 ホーチミン施工事例',
                'title' => '施工事例ファナックベトナム様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
        
    }
    
    public function page_industrial(){
        $id = 252;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
    			'item'=>$item
    		);
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ロンハウ(LONG HAU)工業団地 ┃ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
    		$this->template->write_view('content','FRONTEND/detail',$data);
    		$this->template->render();
        }
    }

    public function page_serviced_apartments(){
        $id = 253;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'サービスアパートのご紹介｜アオザイハウジング │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_popular_apartment(){
        $id = 254;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'コンドミニアムのご紹介｜アオザイハウジング │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    public function page_office_information(){
        $id = 255;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ホーチミン 賃貸オフィスのご紹介｜アオザイハウジング',
                'title' => 'ホーチミン市オフィスのご案内 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_guidance_industrial_factory(){
        $id = 256;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '工業団地のご紹介│アオザイハウジング │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);     
            
            headerSeo($seo);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    
    public function page_interior_construction(){
        $id = 257;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,三幸学園,ビューティアート'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ビューティーアート専門学校B-art（学校法人三幸学園）様',
                'title' => '施工事例専門学校B-art様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    
    public function page_258(){
        $id = 258;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,内装工事,設計,施工事例,三幸学園,ビューティアート'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'フォトロンベトナム（Photron Vietnam）様',
                'title' => '施工事例フォトロンベトナム様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
    
    public function page_259(){
        $id = 259;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                // 'title' => 'ローカルサービスアパートメント・アパートメントのご紹介',
                'title' => 'ホーチミン市住居のご案内 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_261(){
        $id = 261;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '施工事例Dong Shop SUN様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_269(){
        $id = 269;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '施工事例レストランSAMURAI様 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }
	
	public function page_webads(){
        $id = 260;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                // 'keyword' => 'ホーチミン,ベトナム,ホームページ,WEB,広告,製作'
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'プロポライフベトナム│WEB制作・集客サポート │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }


    /*--------29/10/2015--------*/
    public function page_clothing_manufacturer(){
        $id = 262;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,進出支援,ライセンス'
            );
            $seo = array(
                'title' => 'ベトナムホーチミン近郊進出サポート① ┃ ロータスサービス',
                'description' => 'ベトナムホーチミンで進出後のサポートならロータスサービスへ。ロータスサービスは、経験豊富な日本人担当者とベトナム法の運用に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスです。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_human_resources_consulting(){
        $id = 263;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,進出支援,ライセンス'
            );
            $seo = array(
                'title' => 'ベトナムホーチミン近郊進出サポート② ┃ ロータスサービス',
                'description' => 'ベトナムホーチミンで進出後のサポートならロータスサービスへ。ロータスサービスは、経験豊富な日本人担当者とベトナム法の運用に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスです。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_interior_equipment_manufacturers(){
        $id = 264;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,進出支援,ライセンス'
            );
            $seo = array(
                'title' => 'ベトナムホーチミン近郊進出サポート③ ┃ ロータスサービス',
                'description' => 'ベトナムホーチミンで進出後のサポートならロータスサービスへ。ロータスサービスは、経験豊富な日本人担当者とベトナム法の運用に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスです。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_gym_management(){
        $id = 265;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,進出支援,ライセンス'
            );
            $seo = array(
                'title' => 'ベトナムホーチミン近郊進出サポート④ ┃ ロータスサービス',
                'description' => 'ベトナムホーチミンで進出後のサポートならロータスサービスへ。ロータスサービスは、経験豊富な日本人担当者とベトナム法の運用に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスです。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }


    public function page_guidance_stores(){
        $id = 266;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'id' => $id,
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市戸建・店舗のご案内 │ アオザイハウジング',
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            headerSeo($seo, $seoGoogle);     
            
            headerSeo($seo);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_advanced_support(){
        $id = 267;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,進出支援,会社設立,法人設立,ライセンス'
            );
            $seo = array(
                'title' => '会社設立とスタートアップ支援 │ ロータスサービス',
                'description' => 'ベトナムホーチミンでの進出支援ならロータスサービスにお任せ下さい。ロータスサービスは、経験豊富な日本人担当者とベトナム法に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスになります。'
            );
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_short_term_apartment(){
        $id = 268;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン市短期契約可能アパートのご案内 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_representative_office(){
        $id = 271;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,進出支援,駐在員事務所,駐在,ライセンス'
            );
            $seo = array(
                'title' => '駐在員事務所設立とスタートアップ支援 │ ロータスサービス', 
                'description' => 'ベトナムホーチミンでの進出支援ならロータスサービスにお任せ下さい。ロータスサービスは、経験豊富な日本人担当者とベトナム法に長けたベトナム人弁護士で安心を提供させて頂いている進出サービスです。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_272(){
        $id = 272;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン施工事例オルグローラボ様 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_273(){
        $id = 273;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミン施工事例リーガル様 │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

    public function page_274(){
        $id = 274;
        if(is_numeric($id) == false) {
            $this->load->view('common/page_404');
        }else {
            $item = $this->model->getDetail($id);

            $data = array(
                'item'=>$item
            );
            
            /* Seo===================*/
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => '日本とベトナム住居違い │ アオザイハウジング', 
                'description' => 'ホーチミンのサービスアパート、マンション、コンドミニアム、オフィスなど賃貸不動産なら情報最大級のアオザイハウジングにお任せ下さい。仲介手数料無料にてご紹介しております。日本人駐在でご案内から契約関係書類作成、フォローまで安心。'
            );
            
            headerSeo($seo, $seoGoogle);        
            //$this->template->write('title',$item->title);
            $this->template->write_view('content','FRONTEND/detail',$data);
            $this->template->render();
        }
    }

	/*------------------------------------ End FRONTEND --------------------------------*/
}
