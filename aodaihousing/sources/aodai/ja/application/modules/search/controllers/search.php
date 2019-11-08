<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MX_Controller {
    public $device = 'pc';
    public $per_page = 20;
    
    function __construct(){
        parent::__construct();
        $this->load->model('search_model');
        $this->load->model('building/building_model');
        $this->device = mobile_template();
    }

    public function index() {
        $data = array();
        $house_office = 1;
        $data['areas'] = 'house';
        if (isset($_GET['opt'])) {
            $data['table'] = $_GET['opt'] == 'office'? 'offices':'houses';
            $data['areas'] = $_GET['opt'] != '' ? $_GET['opt'] : 'house';
        } else {
            $data['table'] = 'houses';
        }
        if($data['table'] == 'houses'){
            $house_office = 1;
        }else{
            $house_office = 2;
        }

        $data['localtion']            = isset($_GET['areas'])?$_GET['areas']:'';
        $data['type']                 = isset($_GET['type'])?$_GET['type']:'';
        $data['size']                 = isset($_GET['size'])?$_GET['size']:'';
        $data['rent']                 = isset($_GET['rent'])?$_GET['rent']:'';
        $data['month_rent']           = isset($_GET['month_rent'])?$_GET['month_rent']:'';
        $data['size_rent']            = isset($_GET['size_rent'])?$_GET['size_rent']:'';
        $data['layout']               = isset($_GET['layout'])?$_GET['layout']:'';
        $itemAreas                    = $this->search_model->getAreasHouseOffice($house_office);
        $itemLayouts                  = $this->search_model->getLayouts();
        $itemBuildingCondo            = $this->search_model->getBuildingCondo();
        $itemBuildingService_aprtment = $this->search_model->getBuildingService_aprtment();
        $data['itemCondo']            = $itemBuildingCondo;
        $data['itemService_aprtment'] = $itemBuildingService_aprtment;
        $data['itemAreas']            = $itemAreas;
        $data['itemLayouts']          = $itemLayouts;
        $data['inputMin']             = $this->input->get('lblMin');
        $data['inputMax']             = $this->input->get('lblMax');

        $is_home      = $this->router->fetch_class() === 'home' ? true: false;
        $check_house  = '';
        $check_office = '';
        $module       =  $this->router->fetch_class();
        $opt          = isset($_GET['opt']) ? $_GET['opt'] : 'house';

        if (helper_get_module_current() == 'houses') {
            $data['active_house'] = 'active';
            $data['active_office'] = '';
            $opt = 'house';
        }

        if (helper_get_module_current() == 'offices') {
            $data['active_house'] = '';
            $data['active_office'] = 'active';
            $opt = 'office';
        }

        if ($opt == 'house') {
            $check_house = 'checked="checked"';
        } elseif ($opt == 'office') {
            $check_office = 'checked="checked"';
        }
  
        $opt_select = array(
            'house' => lang('賃貸住宅'),
            'office' => lang('オフィス・店舗')
        );
        
        $data['is_home']      = $is_home;
        $data['check_house']  = $check_house;
        $data['module']       = $module;
        $data['check_office'] = $check_office;
        $data['opt']          = $opt;
        $data['opt_select']   = $opt_select;

        $data['active_house'] = ($opt == 'house') ? 'active' : '';
        $data['active_office'] = ($opt == 'office') ? 'active' : '';
        $data['cboAreaId'] = $this->input->get('cboAreaName');


        $data_option_type_house = array(
            0 => lang('サービスアパートメント'),
            1 => lang('アパートメント'),
            2 => lang('戸建')
        );

        $data['data_option_type_house'] = $data_option_type_house;
        $data['cboLayOut'] = $this->input->get('cboLayOut');
        if ($data['cboLayOut']=='') {
            $data['layoutdf'] = lang('住居タイプ');
        } else {
            $data['layoutdf'] = $data_option_type_house[$data['cboLayOut']];
        }
        $data['type'] = $this->input->get('cboType');
        $data['cboCondo'] = $this->input->get('cboCondo');

        $data_option_areas = array(
            '50'      => lang('50㎡以下'),
            '51-80'   => lang('51㎡～80㎡'),
            '81-100'  => lang('81㎡～100㎡'),
            '101-150' => lang('101㎡～150㎡'),
            '151'     => lang('151㎡以上')
        );
        $data['data_option_areas'] = $data_option_areas;
        $data['cboSize'] = $this->input->get('cboSize');

        if (isset($data_option_areas[$data['cboSize']])) {
            $data['sizedf'] = $data_option_areas[$data['cboSize']];
        } else {
            $data['sizedf'] = lang('面積');
        }

        $data['service_aprtment'] = $this->input->get('cboService_aprtment');
        $data_option_rentSelect = array(
            '500'       => lang('500USD以下'),
            '501-1000'  => lang('501～1000USD'),
            '1001-1500' => lang('1001～1500USD'),
            '1501-2000' => lang('1501～2000USD'),
            '2001-2500' => lang('2001～2500USD'),
            '2501-3000' => lang('2501～3000USD'),
            '3001-3500' => lang('3001～3500USD'),
            '3501'      => lang('3501USD以上')
        );
        $data['data_option_rentSelect']= $data_option_rentSelect;
        $data['cboRentSelect']= $this->input->get('cboRentSelect');

        if (isset($data_option_rentSelect[$data['cboRentSelect']])) {
            $data['rentdf'] = $data_option_rentSelect[$data['cboRentSelect']];
        } else {
            $data['rentdf'] = lang('賃料');
        }

        $data_option_sizeRentSelect = array(
                '10'    => lang('10USD/㎡以下'),
                '11-25' => lang('11～25USD/㎡'),
                '26-49' => lang('26～49USD/㎡'),
                '50-99' => lang('50～99USD/㎡'),
                '100'   => lang('100USD/㎡以上')
        );
        $data['data_option_sizeRentSelect'] = $data_option_sizeRentSelect;
        $data['cboSizeRentSelect'] = $this->input->get('cboSizeRentSelect');

        if (isset($data_option_sizeRentSelect[$data['cboSizeRentSelect']])) {
            $data['sizeRentdf'] = $data_option_sizeRentSelect[$data['cboSizeRentSelect']];
        } else {
            $data['sizeRentdf'] = lang('㎡単価（USD/㎡）');
        }

        $data_option_chairSelect = array(
            '5'     => lang('〜５席'),
            '6-10'  => lang('６〜１０席'),
            '11-15' => lang('１１〜１５ 席'),
            '16-25' => lang('１６〜２５席'),
            '26-40' => lang('２６〜４０席'),
            '40'    => lang('４０席以上')
        );
        $data['data_option_chairSelect']= $data_option_chairSelect;
        $data['cboChairSelect']= $this->input->get('cboChairSelect');

        if (isset($data_option_chairSelect[$data['cboChairSelect']])) {
            $data['chairdf'] = $data_option_chairSelect[$data['cboChairSelect']];
        } else {
            $data['chairdf'] = lang('席数');
        }

        $allow_page_building = array(
            '人気マンション・コンドミニアム',
            '人気サービスアパート',
            '日本人学校のバスが停まる物件特集'
        );
        
        $is_building = false;
        if (helper_get_module_current() == 'building' && in_array(helper_get_action_current(), $allow_page_building)) {
            $is_building = true;
        }
        $data['is_building'] = $is_building;

        $this->load->view('index', $data);
    }

    public function list_data($page_redirect = '',$data_old = '') {
        $data = array();
        $data['areas'] = 'house';
        if (isset($_GET['opt'])) {
            $data['table'] = $_GET['opt'] == 'office'? 'offices':'houses';
            $data['areas'] = $_GET['opt'] != ''?$_GET['opt']:'house';
            if ($data['table'] == 'offices') {
                $seoGoogle = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                $seo = array(
                    'title' => 'アオザイハウジング｜ホーチミン市アパート検索',
                    'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
            } elseif($data['table'] == 'houses') {
                $seoGoogle = array(
                    'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
                );
                $seo = array(
                    'title' => 'アオザイハウジング｜ホーチミン市アパート検索',
                    'description' => 'ホーチミンのサービスアパート、マンション、オフィスの賃貸不動産なら情報最大級のアオザイハウジングへ。仲介手数料、更新手数料無料にてご紹介。日本人担当が日本語での契約書類作成と入居後フォローまで安心。'
                );
            }
        } else {
            $data['table']= 'houses';
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
        }
        
        $seo = array(
            'title' => 'ホーチミン市のアパート検索｜アオザイハウジング',
            'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム,アパート、オフィスなど賃貸不動産のことならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
        );
        
        $itemLayouts         = $this->search_model->getLayouts();
        $data['itemLayouts'] = $itemLayouts;

        $layout                               = $this->input->get('cboLayOut');
        $type                                 = $this->input->get('cboType');
        $condo                                = $this->input->get('cboCondo');
        $Service_aprtment                     = $this->input->get('cboService_aprtment');
        $size                                 = $this->input->get('cboSize');
        $cboApartment                         = $this->input->get('cboApartment');
        $cboSizeRentSelect                    = $this->input->get('cboSizeRentSelect');
        $rentSelect                           = $this->input->get('cboRentSelect');
        $chair                                = $this->input->get('cboChairSelect');
        $search                               = $this->input->get('txtSearch');
        $data['itemBuildingCondo']            = $this->search_model->getBuildingCondo();
        $data['itemBuildingService_aprtment'] = $this->search_model->getBuildingService_aprtment();
        $data['itemAreas']                    = $this->search_model->getAreasAll();
        
        // Building information
        if ($condo) {
            $building_id = $condo;
        } else {
            $building_id = $Service_aprtment;
        }
        
        $building_data = $this->building_model->getDetailManagement($building_id);
        $data['building_info'] = isset($building_data[0]) ? $building_data[0] : array();

        $option = 0;
        $areaID = '';
        foreach ($data['itemAreas'] as $item){
            $areaOption =vcp_printf($item->name,current_lang_());
            if($areaOption == $search){
                $option = 1;
                $areaIDKeywork[] = $item->id;
            }
        }
        if(isset($areaIDKeywork)) {
            $areaID = implode(", ", $areaIDKeywork);
        }
        $data['option']= $option;
        if($this->input->get('cboAreaName')) {
            $areaID = $this->input->get('cboAreaName');
        }

        $page = isset($_GET['p'])?$_GET['p']:0;
        if ($page != 0) {
            $page = $page - 1;
        }
        $cur_page = $page * $this->per_page;

        $data['inputMin']                     = $this->input->get('lblMin');
        $data['inputMax']                     = $this->input->get('lblMax');
        $data['sort']                         = $this->input->get('txtSort');
        $data['info']                         = $this->search_model->getSearch($areaID, $layout, $type, $size,$cboSizeRentSelect,$rentSelect,$chair, $condo, $Service_aprtment, $search, $data, $this->per_page, $cur_page);
        $data['cat_name']                     = 'キーワードから探す';
        $count                                = $this->search_model->getCountAll($areaID, $layout, $type, $size,$cboSizeRentSelect,$rentSelect,$chair, $condo, $Service_aprtment, $search, $data);

        // Only use for smart phone
        if (is_smartphone() == 'sp') {
            $config['num_links'] = 1;
        }

        $this->load->library('pagination');
        $config['total_rows'] = $count;
        $config['per_page'] = $this->per_page;
        $config['first_link'] = lang('最初');
        $config['last_link'] = lang('最後');
        $config['use_page_numbers'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        // Page
        $config['query_string_segment'] = 'p';
        $config['base_url'] = reduce_double_slashes(PATH_URL . $this->uri->uri_string());
        $this->pagination->initialize($config);

        $data['paging'] = $this->pagination;
        $data['count']  = $count;

        if($Service_aprtment == '63'){
            $seo = array(
                'title' => 'ビンホームズサービスレジデンス│アオザイハウジング',
                'description' => 'ビンホームズサービスレジデンスならアオザイハウジングまで。ただ今セントラルパークとゴールデンリバーの2物件を仲介手数料、更新手数料無料でご紹介しております。',
                'keyword' => 'ベトナム,ホーチミン,ビンホームズ,サービス',
            );

            $seoGoogle = array(
                'title' => 'ビンホームズサービスレジデンス│アオザイハウジング',
                'description' => 'ビンホームズサービスレジデンスならアオザイハウジングまで。ただ今セントラルパークとゴールデンリバーの2物件を仲介手数料、更新手数料無料でご紹介しております。',
                'keyword' => 'ベトナム,ホーチミン,ビンホームズ,サービス',
            );
        }
        if($areaID == '10' & $Service_aprtment != '63' && $data['inputMin'] != '400' && $data['inputMax'] != '1000'){
            $seoGoogle = array(
                'keyword' => 'ベトナム,ホーチミン,不動産,賃貸,アパート,マンション,サービスアパート,コンドミニアム'
            );
            $seo = array(
                'title' => 'ホーチミンビンタン区の物件検索｜アオザイハウジング',
                'description' => 'ベトナムホーチミン市のビンタン区のサービスアパート、コンドミニアム、マンションなど賃貸不動産ならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
            );
        }

        if($data['inputMin'] == '400' && $data['inputMax'] == '1000' && $areaID != '10' && $Service_aprtment != '63'){
            $seo = array(
                'title' => 'ホーチミン市の単身アパート｜アオザイハウジング',
                'description' => 'ベトナムホーチミン市のサービスアパート、コンドミニアム,アパート、オフィスなど賃貸不動産のことならアオザイハウジングにお任せ下さい。紹介手数料無料・物件数最大級、日本人常駐でご案内から交渉、契約書作成、入居後フォローなどサービス充実。'
            );
            $seoGoogle = array(
                'title' => 'ホーチミン市の単身アパート｜アオザイハウジング'
            );
        }

        if ($data['areas']=='house') {
            $this->template->write_view('content', 'search_houses', $data);
            headerSeo($seo, $seoGoogle);
            $this->template->render();
        } else {
            $this->template->write_view('content', 'search_offices', $data);
            headerSeo($seo, $seoGoogle);
            $this->template->render();
        }
    }
}