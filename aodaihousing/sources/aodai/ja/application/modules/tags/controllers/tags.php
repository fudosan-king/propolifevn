<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tags extends MX_Controller {
    private $per_page = 10;
    private $module = 'tags';
    private $table = 'tags';
    function __construct(){
        parent::__construct();
        $this->load->model('tags_model','model');
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
        $toolBar = array('back', 'save');
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

    public function index(){
        $tagName = "";
        if(current_lang_() == "jp") {
            $tagName = $this->uri->segment(2);
        }
        if(current_lang_() == "vn") {
            $tagName = $this->uri->segment(3);
        }
        
        if ($tagName == "") {
            $this->load->view('common/page_404');
        } else {
            $tags = $this->model->getTagByName($tagName);
            if($tags) {
                $this->load->library('pagination');
                $cur_page              = isset($_GET['per_page']) ? $_GET['per_page'] : 0;
                $items                 = $this->model->getsearchFrontEnd($this->per_page, $cur_page, $tags->id);
                $rows                  = $this->model->getCountsearchFrontEnd($tags->id);
                $config['base_url']    = PATH_URL . current_lang() . '/' . 'tag/' . $tagName;

                $this->load->library('pagination');
                $config['total_rows'] = $rows;
                $config['per_page'] = $this->per_page;
                // Only use for smart phone
                if (is_smartphone() == 'sp') {
                    $config['num_links'] = 1;
                }
                $config['first_link'] = lang('最初');
                $config['last_link'] = lang('最後');
                $this->pagination->initialize($config);

                $this->load->model('search/search_model');

                $itemLayouts = $this->search_model->getLayouts();

                $images_house_office = array();
                $equipment_house_office = array();
                $common_facility_house_office = array();
                $area_house_office = array();

                if ($items) {
                    foreach ($items as $key => $item) {
                        if ($item->tags_db_type == 1) {
                            // Offices
                            $house_office_id              = $item->office_id;
                            $images_house_office          = $this->search_model->get_all_image_offices($house_office_id);
                            $equipment_house_office       = $this->search_model->get_all_equipment_offices($house_office_id);
                            $common_facility_house_office = $this->search_model->get_all_common_facility_offices($house_office_id);
                            $area_house_office            = $this->model->get_area_by_office($house_office_id);
                        } else {
                            // Houses
                            $house_office_id              = $item->house_id;
                            $images_house_office          = $this->search_model->get_all_image_houses($house_office_id);
                            $equipment_house_office       = $this->search_model->get_all_equipment_houses($house_office_id);
                            $common_facility_house_office = $this->search_model->get_all_common_facility_houses($house_office_id);
                            $area_house_office            = $this->model->get_area_by_house($house_office_id);
                        }
                        $item->images_house_office          = $images_house_office;
                        $item->equipment_house_office       = $equipment_house_office;
                        $item->common_facility_house_office = $common_facility_house_office;
                        $item->area_house_office            = $area_house_office;
                    }
                }

                $data = array(
                    'items'       => $items,
                    'tagName'     => $tags->name,
                    'itemLayouts' => $itemLayouts,
                    'paging'      => $this->pagination,
                    'count'       => $rows
                );
                
                /* Seo===================*/
                $seoGoogle = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸',
                );
                $seo = array(
                    'title' => $tags->name . "│アオザイハウジング",
                    'description' => 'ホーチミンで安心のアパート・サービスアパートメント・オフィス・店舗の不動産賃貸仲介サービスをご提供。'
                );
                headerSeo($seo, $seoGoogle);
                
                $this->template->write_view('content', 'FRONTEND/index', $data);
                $this->template->render();
            } else {
                $this->load->view('common/page_404');
            }

            
        }
    }
    
    public function import_tag(){
        $tag_list = $this->model->getListTag();
        $list_office = $this->model->list_offices();
        $list_houses = $this->model->list_houses();
        
        if($tag_list){
            $this->model->insert_tags($tag_list, $list_office, 1);
            $this->model->insert_tags($tag_list, $list_houses, 2);
        }
    }
    
    public function get_area($id, $type){
        $item = $this->model->get_area_db($id, $type);
        if($item){
            echo vcp_printf($item->name, current_lang_());
        }
    }
    /*------------------------------------ FRONTEND ------------------------------------*/

    /*------------------------------------ End FRONTEND --------------------------------*/
}