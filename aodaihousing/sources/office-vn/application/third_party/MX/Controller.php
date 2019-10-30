<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
	
	public $current_lang = 'jp';
	public function __construct() 
	{
            $class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->_init($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
		
		/*Get language*/
		$this->current_lang = $this->uri->segment(1);
        //$this->current_lang = $this->session->userdata('site_lang');
		if($this->current_lang != 'vn'){
			$this->current_lang = 'jp';
		}
        if($this->current_lang == 'vn') {
            $this->lang->load("site", 'vietnamese');
        }else{
            $this->lang->load("site", 'japanese');
        }
        
		$data['current_lang']=$this->current_lang;
		$this->load->vars($data);

        // Controller current
        $controller_current = $this->router->fetch_class();

        // Action current
        $method_current = $this->router->fetch_method();

        // Redirect to new domain when 
        $is_redirect_page = false;

        if ($controller_current == 'home' && $method_current == 'index') {
            $is_redirect_page = true;
        }

        // Redirect old admin (aodaihousing.com/admincp) to new admin (aodaihousing.com/ja/admincp/)
        if ($controller_current == 'admincp') {
            redirect(getNewDomain() . '/admincp');
        }

        // This case appearance when click button redirect page in header page
        if ($this->getParameterIsRedirect() == true) {
            $is_redirect_page = true;
        }

        // Allow redirect page
        if ($is_redirect_page && mobile_template() == 'pc') {
            // redirect(getNewDomain());
            // // $this->detectRedirectUrl();
        }
	}
	
	public function __get($class) {
		return CI::$APP->$class;
	}
	
	public function getAdminMenu(){
		$article_list = $this->model->fetch('id,menu_title_en','article',"parent_id = 0 AND status = 1 AND `group` = '".MAIN_MENU."'",'`order` DESC, id','asc');
		return $article_list;
	}

    /**
     * Get param is redirect page
     * @return boolean [true|false]
     */
    public function getParameterIsRedirect() {
        $params_is_redirect_page = false;
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
            if (strpos($uri, IS_REDIRECT_PAGE) != false) {
                $params_is_redirect_page = true;
            }
        }
        return $params_is_redirect_page;
    }

	public function detectRedirectUrl() {
        $CI =& get_instance();
        if ($_SERVER['SERVER_NAME'] == DOMAIN_OLD) {
            // Environment production
            $uri = $_SERVER['REQUEST_URI'];
            $data_uri = explode('/', $uri);

            if($data_uri[1] ==''){
                $data_uri[1] = $data_uri[2];
                $data_uri[2] = '';
            }

            if(isset($data_uri[5])){
                redirectNewDomain('/'.$data_uri[1].'/'.$data_uri[2].'/'.$data_uri[3].'/'.$data_uri[4].'/'.$data_uri[5]);
                //aodaihousing.com/offices/detail/451/サイゴンプライムファーム,Sai%20Gon%20Prime%20Pham,ホーチミン,3区,賃貸不動産,%20Ngoc%20Thach通り近隣,賃貸オフィス,賃貸,ベトナム(71)
            }elseif(isset($data_uri[4])){
                redirectNewDomain('/'.$data_uri[1].'/'.$data_uri[2].'/'.$data_uri[3].'/'.$data_uri[4]);
            }elseif(isset($data_uri[3])){
                redirectNewDomain('/'.$data_uri[1].'/'.$data_uri[2].'/'.$data_uri[3]);
            }elseif(isset($data_uri[2]) && ($data_uri[2]) != ''){
                $data_modules = explode('?',$data_uri[2]);
                //   vn/search
                if($data_modules[0] == 'search'){
                    $data_explode = explode('&',$data_uri[2]);
                    $data_explode_catid = explode('catid',$data_uri[2]);

                    if (isset($data_explode_catid[1])){
                        //aodaihousing.com/vn/search?opt=house&catid=214&catname=フーミーフン7区アパート
                        redirectNewDomain('/vn/houses/house_detail_by_condition_all?'.$data_explode[1].'&'.$data_explode[2]);
                    }else{
                        $data_office_house = explode('=',$data_explode[0]);
                        $office_house = $data_office_house[1];

                        $data_explode1 = explode('=',$data_explode[1]);
                        $data_explode2 = explode('=',$data_explode[2]);
                        $data_explode3 = explode('=',$data_explode[3]);
                        $data_explode4 = explode('=',$data_explode[4]);
                        $data_explode5 = explode('=',$data_explode[5]);
                        $data_explode6 = explode('=',$data_explode[6]);
                        $data_explode7 = explode('=',$data_explode[7]);

                        if($office_house == 'house'){
                            $cboRentSelect = $data_explode5[1];
                        }else{
                            $cboRentSelect = $data_explode6[1];
                        }
                        $rent = explode('-',$cboRentSelect);
                        if(isset($rent[1])){
                            $lblMin = $rent[0];
                            $lblMax = $rent[1];
                        }else{
                            $lblMin = '0';
                            $lblMax = $rent[0];
                        }

                        if ($lblMin == '' || $lblMin < 0) {
                            $lblMin = 0;
                        }

                        if ($lblMax == '' || $lblMax < 0) {
                            $lblMax = 6000;
                        }

                        $cboAreaName = $data_explode1[1];
                        if (is_numeric($cboAreaName) == false || ($cboAreaName < 0)) {
                            $cboAreaName = '';
                        }

                        if(isset($data_explode2[1]) && $data_explode2[1] > 0){
                            $cboType     = $data_explode2[1];
                        }

                        if(isset($data_explode3[1]) && $data_explode3[1] > 0){
                            $cboLayOut   = $data_explode3[1];
                        }else{
                            $cboLayOut   = '';
                        }

                        $cboSize     = $data_explode4[1];

                        $cboSizeRentSelect =$data_explode7[1];
                        //aodaihousing.com/vn/search?opt=house&areas=&layout=&type=&size=&rent=501-1000&month_rent=&size_rent=&search-opt=検索
                        redirectNewDomain('/vn/'.$data_modules[0].'/list_data?opt='.$office_house.'&lblMin='.$lblMin.'&lblMax='.$lblMax.'&cboAreaName='.$cboAreaName.'&cboSize='.$cboSize.'&cboSizeRentSelect='.$cboSizeRentSelect.'&cboRentSelect='.$cboRentSelect.'&cboLayOut='.$cboLayOut.'&cboType='.$cboType);
                    }
                }else{
                    //aodaihousing.com/page/駐在員事務所設立＆スタートアップ支援
                    redirectNewDomain('/'.$data_uri[1].'/'.$data_uri[2]);
                }
            }elseif(isset($data_uri[1])){
                $data_modules = explode('?',$data_uri[1]);
                //   jp/search
                if($data_modules[0] == 'search'){
                    $data_explode = explode('&',$data_uri[1]);
                    $data_explode_catid = explode('catid',$data_uri[1]);

                    if (isset($data_explode_catid[1])){
                        //aodaihousing.com/search?opt=house&catid=214&catname=フーミーフン7区アパート
                        redirectNewDomain('/houses/house_detail_by_condition_all?'.$data_explode[1].'&'.$data_explode[2]);
                    }else{
                        $data_office_house = explode('=',$data_explode[0]);
                        $office_house = $data_office_house[1];

                        $data_explode1 = explode('=',$data_explode[1]);
                        $data_explode2 = explode('=',$data_explode[2]);
                        $data_explode3 = explode('=',$data_explode[3]);
                        $data_explode4 = explode('=',$data_explode[4]);
                        $data_explode5 = explode('=',$data_explode[5]);
                        $data_explode6 = explode('=',$data_explode[6]);
                        $data_explode7 = explode('=',$data_explode[7]);

                        if($office_house == 'house'){
                            $cboRentSelect = $data_explode5[1];
                        }else{
                            $cboRentSelect = $data_explode6[1];
                        }
                        $rent = explode('-',$cboRentSelect);
                        if(isset($rent[1])){
                            $lblMin = $rent[0];
                            $lblMax = $rent[1];
                        }else{
                            $lblMin = '0';
                            $lblMax = $rent[0];
                        }

                        if ($lblMin == '' || $lblMin < 0) {
                            $lblMin = 0;
                        }

                        if ($lblMax == '' || $lblMax < 0) {
                            $lblMax = 6000;
                        }

                        $cboAreaName = $data_explode1[1];
                        echo $cboAreaName;
                        if (is_numeric($cboAreaName) === false || ($cboAreaName < 0)) {
                            $cboAreaName = '';
                        }

                        if(isset($data_explode2[1]) && $data_explode2[1] > 0){
                            echo $data_explode2[1];
                            $cboType     = $data_explode2[1];
                        }

                        if(isset($data_explode3[1]) && $data_explode3[1] > 0){
                            $cboLayOut   = $data_explode3[1];
                        }else{
                            $cboLayOut   = '';
                        }

                        $cboSize     = $data_explode4[1];

                        $cboSizeRentSelect =$data_explode7[1];
                        //aodaihousing.com//search?opt=house&areas=&layout=&type=&size=&rent=501-1000&month_rent=&size_rent=&search-opt=検索
                        redirectNewDomain('/'.$data_modules[0].'/list_data?opt='.$office_house.'&lblMin='.$lblMin.'&lblMax='.$lblMax.'&cboAreaName='.$cboAreaName.'&cboSize='.$cboSize.'&cboSizeRentSelect='.$cboSizeRentSelect.'&cboRentSelect='.$cboRentSelect.'&cboLayOut='.$cboLayOut.'&cboType='.$cboType);
                    }
                }else{
                    //aodaihousing.com
                    redirectNewDomain('/'.$data_uri[1]);
                }
            }else{
                redirectNewDomain();
            }
        } else {
            // Environment develop and staging
            $uri = $_SERVER['REQUEST_URI'];
            $data_uri = explode('/', $uri);
            if($data_uri[2]==''){
                $data_uri[2] = $data_uri[3];
                $data_uri[3] = '';
            }

            if(isset($data_uri[6])){
                redirectNewDomain('/'.$data_uri[2].'/'.$data_uri[3].'/'.$data_uri[4].'/'.$data_uri[5].'/'.$data_uri[6]);
                //localhost/aodai_housing/offices/detail/451/サイゴンプライムファーム,Sai%20Gon%20Prime%20Pham,ホーチミン,3区,賃貸不動産,%20Ngoc%20Thach通り近隣,賃貸オフィス,賃貸,ベトナム(71)
            }elseif(isset($data_uri[5])){
                redirectNewDomain('/'.$data_uri[2].'/'.$data_uri[3].'/'.$data_uri[4].'/'.$data_uri[5]);
            }elseif(isset($data_uri[4])){
                redirectNewDomain('/'.$data_uri[2].'/'.$data_uri[3].'/'.$data_uri[4]);
            }elseif(isset($data_uri[3]) && ($data_uri[3]) != ''){
                $data_modules = explode('?',$data_uri[3]);
                //   vn/search
                if($data_modules[0] == 'search'){
                    $data_explode = explode('&',$data_uri[3]);
                    $data_explode_catid = explode('catid',$data_uri[3]);

                    if (isset($data_explode_catid[1])){
                        //localhost/aodai_housing/vn/search?opt=house&catid=214&catname=フーミーフン7区アパート
                        redirectNewDomain('/vn/houses/house_detail_by_condition_all?'.$data_explode[1].'&'.$data_explode[2]);
                    }else{
                        $data_office_house = explode('=',$data_explode[0]);
                        $office_house = $data_office_house[1];

                        $data_explode1 = explode('=',$data_explode[1]);
                        $data_explode2 = explode('=',$data_explode[2]);
                        $data_explode3 = explode('=',$data_explode[3]);
                        $data_explode4 = explode('=',$data_explode[4]);
                        $data_explode5 = explode('=',$data_explode[5]);
                        $data_explode6 = explode('=',$data_explode[6]);
                        $data_explode7 = explode('=',$data_explode[7]);

                        if($office_house == 'house'){
                            $cboRentSelect = $data_explode5[1];
                        }else{
                            $cboRentSelect = $data_explode6[1];
                        }
                        $rent = explode('-',$cboRentSelect);
                        if(isset($rent[1])){
                            $lblMin = $rent[0];
                            $lblMax = $rent[1];
                        }else{
                            $lblMin = '0';
                            $lblMax = $rent[0];
                        }

                        if ($lblMin == '' || $lblMin < 0) {
                            $lblMin = 0;
                        }

                        if ($lblMax == '' || $lblMax < 0) {
                            $lblMax = 6000;
                        }

                        $cboAreaName = $data_explode1[1];
                        if (is_numeric($cboAreaName) == false || ($cboAreaName < 0)) {
                            $cboAreaName = '';
                        }
                        if(isset($data_explode2[1]) && $data_explode2[1] > 0){
                            $cboType     = $data_explode2[1];
                        }

                        if(isset($data_explode3[1]) && $data_explode3[1] > 0){
                            $cboLayOut   = $data_explode3[1];
                        }else{
                            $cboLayOut   = '';
                        }

                        $cboSize     = $data_explode4[1];

                        $cboSizeRentSelect =$data_explode7[1];
                        //localhost/aodai_housing/vn/search?opt=house&areas=&layout=&type=0&size=&rent=&month_rent=&size_rent=&search-opt=検索
                        redirectNewDomain('/vn/'.$data_modules[0].'/list_data?opt='.$office_house.'&lblMin='.$lblMin.'&lblMax='.$lblMax.'&cboAreaName='.$cboAreaName.'&cboSize='.$cboSize.'&cboSizeRentSelect='.$cboSizeRentSelect.'&cboRentSelect='.$cboRentSelect.'&cboLayOut='.$cboLayOut.'&cboType='.$cboType);
                    }
                }else{
                    //localhost/aodai_housing/page/駐在員事務所設立＆スタートアップ支援
                    redirectNewDomain('/'.$data_uri[2].'/'.$data_uri[3]);
                }
            }elseif(isset($data_uri[2])){
                $data_modules = explode('?',$data_uri[2]);
                //   jp/search
                if($data_modules[0] == 'search'){
                    $data_explode = explode('&',$data_uri[2]);
                    $data_explode_catid = explode('catid',$data_uri[2]);

                    if (isset($data_explode_catid[1])){
                        //localhost/aodai_housing/search?opt=house&catid=214&catname=フーミーフン7区アパート
                        redirectNewDomain('/houses/house_detail_by_condition_all?'.$data_explode[1].'&'.$data_explode[2]);
                    }else{
                        $data_office_house = explode('=',$data_explode[0]);
                        $office_house = $data_office_house[1];

                        $data_explode1 = explode('=',$data_explode[1]);
                        $data_explode2 = explode('=',$data_explode[2]);
                        $data_explode3 = explode('=',$data_explode[3]);
                        $data_explode4 = explode('=',$data_explode[4]);
                        $data_explode5 = explode('=',$data_explode[5]);
                        $data_explode6 = explode('=',$data_explode[6]);
                        $data_explode7 = explode('=',$data_explode[7]);

                        if($office_house == 'house'){
                            $cboRentSelect = $data_explode5[1];
                        }else{
                            $cboRentSelect = $data_explode6[1];
                        }
                        $rent = explode('-',$cboRentSelect);
                        if(isset($rent[1])){
                            $lblMin = $rent[0];
                            $lblMax = $rent[1];
                        }else{
                            $lblMin = '0';
                            $lblMax = $rent[0];
                        }

                        if ($lblMin == '' || $lblMin < 0) {
                            $lblMin = 0;
                        }

                        if ($lblMax == '' || $lblMax < 0) {
                            $lblMax = 6000;
                        }

                        $cboAreaName = $data_explode1[1];
                        if (is_numeric($cboAreaName) == false || ($cboAreaName < 0)) {
                            $cboAreaName = '';
                        }

                        if(isset($data_explode2[1]) && $data_explode2[1] > 0){
                            $cboType     = $data_explode2[1];
                        }
                        if(isset($data_explode3[1]) && $data_explode3[1] > 0){
                            $cboLayOut   = $data_explode3[1];
                        }else{
                            $cboLayOut   = '';
                        }
                        $cboSize     = $data_explode4[1];

                        $cboSizeRentSelect = $data_explode7[1];
                        //localhost/search?opt=house&areas=&layout=&type=0&size=&rent=&month_rent=&size_rent=&search-opt=検索
                        redirectNewDomain('/'.$data_modules[0].'/list_data?opt='.$office_house.'&lblMin='.$lblMin.'&lblMax='.$lblMax.'&cboAreaName='.$cboAreaName.'&cboSize='.$cboSize.'&cboSizeRentSelect='.$cboSizeRentSelect.'&cboRentSelect='.$cboRentSelect.'&cboLayOut='.$cboLayOut.'&cboType='.$cboType);
                    }
                }else{
                    //localhost/aodai_housing
                    redirectNewDomain('/'.$data_uri[2]);
                }
            }else{
                redirectNewDomain();
            }
        }
    }
}