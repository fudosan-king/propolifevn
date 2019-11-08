<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';

//Config Router Admincp
$route['admincp'] = "admincp";
$route['admincp/login'] = "admincp/login";
$route['admincp/logout'] = "admincp/logout";
$route['admincp/update_profile'] = "admincp/update_profile";
$route['admincp/(:any)/(:any)/(:any)/(:any)'] = "$1/admincp_$2/$3/$4";
$route['admincp/(:any)/(:any)/(:any)'] = "$1/admincp_$2/$3";
$route['admincp/(:any)/(:any)'] = "$1/admincp_$2";
$route['admincp/(:any)'] = "$1/admincp_index";

//Config Router 
$route['news/(:num)/(:any)'] = "news/detail";
$route['news/(:num)'] = "news/detail";
$route['service'] = "page/page_service/221";

$route['offices/page/(:num)'] = "offices/index";
$route['offices/page'] = "offices/index";

$route['houses/page/(:num)'] = "houses/index";
$route['houses/page'] = "houses/index";

$route['page/about'] = "page/page_about";
$route['page/プロポライフベトナム 会社概要'] = "page/page_about";
$route['page/ベトナム視察進出支援'] = "page/page_suport_vn";
$route['page/住居ご契約の流れ'] = "page/page_contracting_services";
$route['page/物件オーナー募集中'] = "page/page_register_home";
$route['page/ベトナム 物件オーナー募集'] = "page/page_register_home";
$route['page/工場・倉庫'] = "page/page_workshops_home";
// $route['page/ベトナムレンタル工場・工業団地'] = "page/page_workshops_home";
$route['page/ご契約の流れ'] = "page/page_contracting_process";
$route['page/ベトナム賃貸不動産 ご契約の流れ'] = "page/page_contracting_process";
$route['page/物件を買いたい'] = "page/page_shopping";
// $route['page/ビザ・労働許可証'] = "page/page_work_permits";
$route['page/ビザ・労働許可証取得'] = "page/page_work_permits";
$route['page/ベトナムビザ・労働許可証'] = "page/page_work_permits";
$route['page/法人設立・起業サポート'] = "page/page_incorporation";
$route['page/ベトナム法人設立,駐在員事務所開設の流れ'] = "page/page_incorporation";
$route['page/中古工業団地'] = "page/page_find_industrial";

$route['search'] = "common/search";
$route['category/(:num)/(:any)'] = "common/category_special";

$route['lang/(vn|jp)'] = "lang/switchLanguage";
/*============ lang vn ===============*/
$route['(vn|jp)'] = "home/index";

$route['(vn|jp)/news/(:num)/(:any)'] = "news/detail";
$route['(vn|jp)/news/(:num)'] = "news/detail";
$route['(vn|jp)/service'] = "page/page_service/221";

$route['(vn|jp)/offices/detail/(:num)/(:any)'] = "offices/detail";
$route['(vn|jp)/offices/page/(:num)'] = "offices/index";
$route['(vn|jp)/offices/page'] = "offices/index";

$route['(vn|jp)/houses/detail/(:num)/(:any)'] = "houses/detail";
$route['(vn|jp)/houses/page/(:num)'] = "houses/index";
$route['(vn|jp)/houses/page'] = "houses/index";

$route['(vn|jp)/page/about'] = "page/page_about";
$route['(vn|jp)/page/プロポライフベトナム 会社概要'] = "page/page_about";
$route['(vn|jp)/page/ベトナム視察進出支援'] = "page/page_suport_vn";
$route['(vn|jp)/page/住居ご契約の流れ'] = "page/page_contracting_services";
$route['(vn|jp)/page/物件オーナー募集中'] = "page/page_register_home";
$route['(vn|jp)/page/ベトナム 物件オーナー募集'] = "page/page_register_home";

$route['(vn|jp)/page/工場・倉庫'] = "page/page_workshops_home";
// $route['(vn|jp)/page/ベトナムレンタル工場・工業団地'] = "page/page_workshops_home";
$route['(vn|jp)/page/ご契約の流れ'] = "page/page_contracting_process";
$route['(vn|jp)/page/ベトナム賃貸不動産 ご契約の流れ'] = "page/page_contracting_process";
$route['(vn|jp)/page/物件を買いたい'] = "page/page_shopping";
// $route['(vn|jp)/page/ビザ・労働許可証'] = "page/page_work_permits";
$route['(vn|jp)/page/ビザ・労働許可証取得'] = "page/page_work_permits";

$route['(vn|jp)/page/ベトナムビザ・労働許可証'] = "page/page_work_permits";
$route['(vn|jp)/page/法人設立・起業サポート'] = "page/page_incorporation";
$route['(vn|jp)/page/ベトナム法人設立,駐在員事務所開設の流れ'] = "page/page_incorporation";
$route['(vn|jp)/page/中古工業団地'] = "page/page_find_industrial";


$route['(vn|jp)/search'] = "common/search";
$route['(vn|jp)/category/(:num)/(:any)'] = "common/category_special";

$route['(vn|jp)/common/areas'] = "common/areas";
$route['(vn|jp)/contact/contact_step1'] = "contact/contact_step1";
$route['(vn|jp)/contact/contact_step3'] = "contact/contact_step3";

$route['(vn|jp)/page/オフィス店舗デザイン・設計施工の流れ'] = "page/page_design_interior";
$route['page/オフィス店舗デザイン・設計施工の流れ'] = "page/page_design_interior";
$route['(vn|jp)/page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工'] = "page/page_design_interior";
$route['page/html_parallax'] = "page/page_design_interior";
$route['page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工'] = "page/page_design_interior";


$route['(vn|jp)/page/オフィス-店舗探し-内装工事 クロニクルインテリア'] = "page/page_interior_furniture";
$route['page/オフィス-店舗探し-内装工事 クロニクルインテリア'] = "page/page_interior_furniture";
$route['page/html_parallax2'] = "page/page_interior_furniture";

$route['(vn|jp)/page/施工事例'] = "page/page_case_construction";
$route['page/施工事例'] = "page/page_case_construction";

$route['(vn|jp)/page/サービスアパートメントのご案内'] = "page/page_serviced_apartments";
$route['page/サービスアパートメントのご案内'] = "page/page_serviced_apartments";

$route['(vn|jp)/page/人気アパートメントのご案内'] = "page/page_popular_apartment";
$route['page/人気アパートメントのご案内'] = "page/page_popular_apartment";

$route['(vn|jp)/page/アフターサービス'] = "page/page_after_sales_service";
$route['page/アフターサービス'] = "page/page_after_sales_service";

$route['(vn|jp)/page/社員紹介'] = "page/page_staff_introduction";
$route['page/社員紹介'] = "page/page_staff_introduction";
$route['(vn|jp)/page/プロポライフベトナム社員紹介'] = "page/page_staff_introduction";
$route['page/プロポライフベトナム社員紹介'] = "page/page_staff_introduction";

$route['(vn|jp)/page/スタッフ募集'] = "page/page_jobs";
$route['page/スタッフ募集'] = "page/page_jobs";
$route['(vn|jp)/page/プロポライフベトナム 採用情報'] = "page/page_jobs";
$route['page/プロポライフベトナム 採用情報'] = "page/page_jobs";

$route['(vn|jp)/page/サポート内容'] = "page/page_support_content";
$route['page/サポート内容'] = "page/page_support_content";
$route['(vn|jp)/page/ベトナム法人設立,駐在員事務所開設サポート'] = "page/page_support_content";
$route['page/ベトナム法人設立,駐在員事務所開設サポート'] = "page/page_support_content";

$route['(vn|jp)/page/アオザイサポートデスク'] = "page/page_aodai_support";
$route['page/アオザイサポートデスク'] = "page/page_aodai_support";

$route['(vn|jp)/page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例'] = "page/page_vitalify";
$route['page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例'] = "page/page_vitalify";
$route['(vn|jp)/page/リーガル（REGAL）様 ホーチミン内装工事例'] = "page/page_regal";
$route['page/リーガル（REGAL）様 ホーチミン内装工事例'] = "page/page_regal";
$route['(vn|jp)/page/ファナックベトナム（FANUC VIETNAM）様 ホーチミン内装工事例'] = "page/page_fanuc";
$route['page/ファナックベトナム（FANUC VIETNAM）様 ホーチミン内装工事例'] = "page/page_fanuc";

$route['(vn|jp)/page/ロンハウ工業団地'] = "page/page_industrial";
$route['page/ロンハウ工業団地'] = "page/page_industrial";

/*  29-10-2015   */
$route['(vn|jp)/page/R社（衣料品メーカー）様'] = "page/page_clothing_manufacturer";
$route['page/R社（衣料品メーカー）様'] = "page/page_clothing_manufacturer";

$route['(vn|jp)/page/R社（人材コンサルティング）様'] = "page/page_human_resources_consulting";
$route['page/R社（人材コンサルティング）様'] = "page/page_human_resources_consulting";

$route['(vn|jp)/page/E社（内装設備メーカー）様'] = "page/page_interior_equipment_manufacturers";
$route['page/E社（内装設備メーカー）様'] = "page/page_interior_equipment_manufacturers";

$route['(vn|jp)/page/S社（ジム運営）様'] = "page/page_gym_management";
$route['page/S社（ジム運営）様'] = "page/page_gym_management";



$route['(vn|jp)/page/オフィスのご案内'] = "page/page_office_information";
$route['page/オフィスのご案内'] = "page/page_office_information";
$route['(vn|jp)/tag/(:any)'] = "tags/index";
$route['tag/(:any)'] = "tags/index";

$route['(vn|jp)/page/工業団地・工場のご案内'] = "page/page_guidance_industrial_factory";
$route['page/工業団地・工場のご案内'] = "page/page_guidance_industrial_factory";

$route['(vn|jp)/page/内装工事事例'] = "page/page_interior_construction";
$route['page/内装工事事例'] = "page/page_interior_construction";

$route['(vn|jp)/page/photron-vietnam'] = "page/page_258";
$route['page/photron-vietnam'] = "page/page_258";

$route['(vn|jp)/page/dong-shop-sun'] = "page/page_261";
$route['page/dong-shop-sun'] = "page/page_261";

$route['(vn|jp)/page/samurai'] = "page/page_269";
$route['page/samurai'] = "page/page_269";

$route['(vn|jp)/page/ローカルサービスアパートメント・アパートメントのご紹介'] = "page/page_259";
$route['page/ローカルサービスアパートメント・アパートメントのご紹介'] = "page/page_259";

$route['(vn|jp)/page/短期アパートのご案内'] = "page/page_short_term_apartment";
$route['page/短期アパートのご案内'] = "page/page_short_term_apartment";

$route['(vn|jp)/page/駐在員事務所設立＆スタートアップ支援'] = "page/page_representative_office";
$route['page/駐在員事務所設立＆スタートアップ支援'] = "page/page_representative_office";

$route['(vn|jp)/page/WEB広告をしたい'] = "page/page_webads";
$route['page/WEB広告をしたい'] = "page/page_webads";

$route['(vn|jp)/search_options'] = "common/search_options";
$route['search_options'] = "common/search_options";

$route['(vn|jp)/search_options_office'] = "common/search_options_office";
$route['search_options_office'] = "common/search_options_office";

$route['(vn|jp)/search_result'] = "common/search_result";
$route['search_result'] = "common/search_result";

$route['(vn|jp)/contact/contact_mobile'] = "contact/contact_mobile";
/* End of file routes.php */
/* Location: ./appliccation/config/routes.php */


$route['(vn|jp)/page/戸建・店舗のご案内'] = "page/page_guidance_stores";
$route['page/戸建・店舗のご案内'] = "page/page_guidance_stores";

$route['(vn|jp)/page/進出支援のご案内'] = "page/page_advanced_support";
$route['page/進出支援のご案内'] = "page/page_advanced_support";

$route['page/ベトナム労働許可証'] = "page/page_vietnam_work_permits";

$route['(vn|jp)/page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様'] = "page/page_272";
$route['page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様'] = "page/page_272";

$route['(vn|jp)/page/リーガル（REGAL）様'] = "page/page_273";
$route['page/リーガル（REGAL）様'] = "page/page_273";

$route['(vn|jp)/page/ホーチミンの住居について'] = "page/page_274";
$route['page/ホーチミンの住居について'] = "page/page_274";