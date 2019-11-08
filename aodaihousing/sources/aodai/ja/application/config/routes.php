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
$route['admincp/list_house']="admincp/list_house";


//Config Router 
$route['news/(:num)/(:any)'] = "news/detail";
$route['news/(:num)'] = "news/detail";
$route['service'] = "page/page_service/221";

$route['offices/page/(:num)'] = "offices/index";
$route['offices/page'] = "offices/index";

$route['houses/page/(:num)'] = "houses/index";
$route['houses/page'] = "houses/index";

$route['page/about'] = "page/page_about";
$route['page/page_step'] = "page/page_step";
$route['page/page_category_house_hcm'] = "page/page_category_house_hcm";
$route['page/ホーチミンのオフィスについて'] = "page/page_hcm_office";
$route['page/page_temp_contract'] =  "page/page_temp_contract";
$route['page/different_house'] =  "page/different_house";
$route['page/faq'] =  "page/page_faq";
$route['page/about_company'] = "page/page_about_company";
// $route['page/map'] = "page/page_map";
$route['page/own_real_estate'] = "page/page_own_real_estate";
$route['page/support_create_company'] = "page/page_support_create_company";
$route['page/support_office'] = "page/page_support_office";
$route['page/work_permit'] = "page/page_work_permit";
$route['page/vietnam_visa'] = "page/page_vietnam_visa";
$route['page/econimical_website'] = "page/page_econimical_website";
$route['page/repair_office'] = "page/page_repair_office";



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

$route['(vn|jp)/offices/detail/(:num)'] = "offices/detail";
$route['(vn|jp)/offices/detail/(:num)/(:any)'] = "offices/detail";
$route['(vn|jp)/offices/page/(:num)'] = "offices/index";
$route['(vn|jp)/offices/page'] = "offices/index";

$route['(vn|jp)/houses/detail/(:num)'] = "houses/detail";
$route['(vn|jp)/houses/detail/(:num)/(:any)'] = "houses/detail";
$route['(vn|jp)/houses/page/(:num)'] = "houses/index";
$route['(vn|jp)/houses/page'] = "houses/index";

$route['(vn|jp)/page/about'] = "page/page_about";
$route['(vn|jp)/page/入居までの流れ'] = "page/page_step";
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

$route['(vn|jp)/page/オフィス店舗デザイン・設計施工の流れ'] = "page/page_design_interior";
$route['page/オフィス店舗デザイン・設計施工の流れ'] = "page/page_design_interior";
$route['(vn|jp)/page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工'] = "page/page_design_interior";
$route['page/html_parallax'] = "page/page_design_interior";
$route['page/ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工'] = "page/page_design_interior";


$route['(vn|jp)/page/オフィス-店舗探し-内装工事 クロニクルインテリア'] = "page/page_interior_furniture";
$route['page/オフィス-店舗探し-内装工事 クロニクルインテリア'] = "page/page_interior_furniture";
$route['(vn|jp)/page/ベトナム ホーチミン オフィス店舗 内装工事'] = "page/page_interior_furniture";
$route['page/ベトナム ホーチミン オフィス店舗 内装工事'] = "page/page_interior_furniture";
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

$route['(vn|jp)/tag/(:any)'] = "tags/index";
$route['tag/(:any)'] = "tags/index";

$route['(vn|jp)/page/工業団地・工場のご案内'] = "page/page_guidance_industrial_factory";
$route['page/工業団地・工場のご案内'] = "page/page_guidance_industrial_factory";

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

$route['(vn|jp)/page/ホーチミンの住居について'] = "page/page_274";
$route['page/ホーチミンの住居について'] = "page/page_274";

$route['(vn|jp)/search/list_data'] = 'search/list_data';
$route['(vn|jp)/page/estate_owners']='page/estate_owners';
$route['(vn|jp)/page/insertEstate_owners']='page/insertestate_owners';


/**
 * Content of page estate_owners
 * Action: page/不動産オーナー様へ
 */
$route['page/不動産オーナー様へ'] = 'page/estate_owners';
$route['(vn|jp)/page/不動産オーナー様へ'] = 'page/estate_owners';

/**
 * Building popular
 */
$route['(vn|jp)/building/人気マンション・コンドミニアム'] = "building/popular";
$route['building/人気マンション・コンドミニアム'] = "building/popular";
$route['(vn|jp)/building/人気マンション・コンドミニアム/area/(:num)'] = "building/popular";
$route['building/人気マンション・コンドミニアム/area/(:num)'] = "building/popular";

/**
 * Building luxury serviced apartment
 */
$route['(vn|jp)/building/人気サービスアパート'] = "building/luxury_serviced_apartment";
$route['building/人気サービスアパート'] = "building/luxury_serviced_apartment";
$route['(vn|jp)/building/人気サービスアパート/area/(:num)'] = "building/luxury_serviced_apartment";
$route['building/人気サービスアパート/area/(:num)'] = "building/luxury_serviced_apartment";

/**
 * Building near school bus
 */
$route['(vn|jp)/building/日本人学校のバスが停まる物件特集'] = "building/near_school_bus";
$route['building/日本人学校のバスが停まる物件特集'] = "building/near_school_bus";
$route['(vn|jp)/building/日本人学校のバスが停まる物件特集/area/(:num)'] = "building/near_school_bus";
$route['building/日本人学校のバスが停まる物件特集/area/(:num)'] = "building/near_school_bus";

/**
 * Building detail
 */
$route['(vn|jp)/building/detail-condo/(:num)/(:any)'] = "building/detail_condo";
$route['building/detail-condo/(:num)/(:any)'] = "building/detail_condo";

$route['(vn|jp)/building/detail-service-apartment/(:num)/(:any)'] = "building/detail_service";
$route['building/detail-service-apartment/(:num)/(:any)'] = "building/detail_service";

$route['(vn|jp)/building/detail-near-school-bus/(:num)/(:any)'] = "building/detail_all";
$route['building/detail-near-school-bus/(:num)/(:any)'] = "building/detail_all";

$route['(vn|jp)/building/detail/(:num)/(:any)'] = "building/detail_all";
$route['building/detail/(:num)/(:any)'] = "building/detail_all";

/**
 * STATIC PAGE
 * Content of static page intro_aodai
 * Action: page/アオザイハウジングについて
 */
$route['page/アオザイハウジングについて'] = 'page/static_page/intro_aodai';
$route['(vn|jp)/page/アオザイハウジングについて'] = 'page/static_page/intro_aodai';

/**
 * STATIC PAGE
 * Content of static page step
 * Action: page/ベトナム賃貸不動産 ご契約の流れ
 */
$route['page/ベトナム賃貸不動産 ご契約の流れ'] = 'page/static_page/step';
$route['(vn|jp)/page/ベトナム賃貸不動産 ご契約の流れ'] = 'page/static_page/step';

/**
 * STATIC PAGE
 * Content of static page type_houses_in_hcm
 * Action: page/ローカルサービスアパートメント・アパートメントのご紹介
 */
$route['page/ローカルサービスアパートメント・アパートメントのご紹介'] = "page/static_page/type_houses_in_hcm";
$route['(vn|jp)/page/ローカルサービスアパートメント・アパートメントのご紹介'] = "page/static_page/type_houses_in_hcm";

/**
 * STATIC PAGE
 * Content of static page difference_residence_hcm_and_jp
 * Action: page/ホーチミンの住居と日本の住居の違い
 */
$route['page/ホーチミンの住居と日本の住居の違い'] = 'page/static_page/difference_residence_hcm_and_jp';
$route['(vn|jp)/page/ホーチミンの住居と日本の住居の違い'] = 'page/static_page/difference_residence_hcm_and_jp';

/**
 * STATIC PAGE
 * Content of static page map
 * Action: page/住居エリア検索
 */
$route['page/住居エリア検索'] = 'page/page_map';
$route['(vn|jp)/page/住居エリア検索'] = 'page/page_map';

/**
 * STATIC PAGE
 * Content of static page hcm_office
 * Action: page/オフィスのご案内
 */
$route['page/オフィスのご案内'] = 'page/static_page/hcm_office';
$route['(vn|jp)/page/オフィスのご案内'] = 'page/static_page/hcm_office';

/**
 * STATIC PAGE
 * Content of static page faq
 * Action: page/よくあるご質問
 */
$route['page/よくあるご質問'] = 'page/static_page/faq';
$route['(vn|jp)/page/よくあるご質問'] = 'page/static_page/faq';

/**
 * STATIC PAGE
 * Content of static page support_open_a_company
 * Action: page/進出支援のご案内
 */
$route['page/進出支援のご案内'] = 'page/static_page/support_open_a_company';
$route['(vn|jp)/page/進出支援のご案内'] = 'page/static_page/support_open_a_company';

/**
 * STATIC PAGE
 * Content of static page support_representative_office
 * Action: page/駐在員事務所設立＆スタートアップ支援
 */
$route['page/駐在員事務所設立＆スタートアップ支援'] = 'page/static_page/support_representative_office';
$route['(vn|jp)/page/駐在員事務所設立＆スタートアップ支援'] = 'page/static_page/support_representative_office';

/**
 * STATIC PAGE
 * Content of static page work_permit
 * Action: page/ベトナム労働許可証
 */
$route['page/ベトナム労働許可証'] = 'page/static_page/work_permit';
$route['(vn|jp)/page/ベトナム労働許可証'] = 'page/static_page/work_permit';

/**
 * STATIC PAGE
 * Content of static page visa
 * Action: page/ベトナムビザ・労働許可証
 */
$route['page/ベトナムビザ・労働許可証'] = 'page/static_page/visa';
$route['(vn|jp)/page/ベトナムビザ・労働許可証'] = 'page/static_page/visa';

/**
 * STATIC PAGE
 * Content of static page eco_website
 * Action: page/割安WEBサイト制作
 */
$route['page/割安WEBサイト制作'] = 'page/static_page/eco_website';
$route['(vn|jp)/page/割安WEBサイト制作'] = 'page/static_page/eco_website';

/**
 * STATIC PAGE
 * Content of static page repair_office
 * Action: page/オフィス店舗デザイン・設計施工の流れ
 */
$route['page/オフィス店舗デザイン・設計施工の流れ'] = 'page/static_page/repair_office';
$route['(vn|jp)/page/オフィス店舗デザイン・設計施工の流れ'] = 'page/static_page/repair_office';

/**
 * STATIC PAGE
 * Content of static page staff
 * Action: page/プロポライフベトナム社員紹介
 */
$route['page/プロポライフベトナム社員紹介'] = 'page/static_page/staff';
$route['(vn|jp)/page/プロポライフベトナム社員紹介'] = 'page/static_page/staff';

/**
 * STATIC PAGE
 * Content of static page temporary_contract
 * Action: page/住居短期契約について
 */
$route['page/住居短期契約について'] = 'page/static_page/temporary_contract';
$route['(vn|jp)/page/住居短期契約について'] = 'page/static_page/temporary_contract';

/**
 * STATIC PAGE
 * Content of static page general_company
 * Action: page/プロポライフベトナム 会社概要
 */
$route['page/プロポライフベトナム 会社概要'] = 'page/static_page/general_company';
$route['(vn|jp)/page/プロポライフベトナム 会社概要'] = 'page/static_page/general_company';

/**
 * STATIC PAGE
 * Content of static page support_option
 * Action: page/アオザイサポートデスク
 */
$route['(vn|jp)/page/アオザイサポートデスク'] = "page/static_page/support_option";
$route['page/アオザイサポートデスク'] = "page/static_page/support_option";

/**
 * STATIC PAGE
 * Content of static page support_option
 * Action: page/サポートオプションについて
 */
$route['(vn|jp)/page/サポートオプションについて'] = "page/static_page/support_option";
$route['page/サポートオプションについて'] = "page/static_page/support_option";

/**
 * STATIC PAGE
 * Content of static page page_regal
 * Action: page/リーガル（REGAL）様 ホーチミン内装工事例
 */
$route['(vn|jp)/page/リーガル（REGAL）様 ホーチミン内装工事例'] = "page/static_page/page_regal";
$route['page/リーガル（REGAL）様 ホーチミン内装工事例'] = "page/static_page/page_regal";

/**
 * STATIC PAGE
 * Content of static page page_vitalify
 * Action: page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例
 */
$route['(vn|jp)/page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例'] = "page/static_page/page_vitalify";
$route['page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例'] = "page/static_page/page_vitalify";

/**
 * STATIC PAGE
 * Content of static page photron-vietnam (page_258)
 * Action: page/photron-vietnam
 */
$route['(vn|jp)/page/photron-vietnam'] = "page/static_page/photron_vietnam";
$route['page/photron-vietnam'] = "page/static_page/photron_vietnam";


/**
 * STATIC PAGE
 * Content of static page page_fanuc
 * Action: page/ファナックベトナム（FANUC VIETNAM）様 ホーチミン内装工事例
 */
$route['(vn|jp)/page/ファナックベトナム（FANUC VIETNAM）様 ホーチミン内装工事例'] = "page/static_page/page_fanuc";
$route['page/ファナックベトナム（FANUC VIETNAM）様 ホーチミン内装工事例'] = "page/static_page/page_fanuc";

/**
 * STATIC PAGE
 * Content of static page page_fanuc
 * Action: page/センコーベトナム様
 */
$route['(vn|jp)/page/センコーベトナム様'] = "page/static_page/page_fanuc";
$route['page/センコーベトナム様'] = "page/static_page/page_fanuc";

/**
 * STATIC PAGE
 * Content of static page page_interior_construction
 * Action: page/内装工事事例
 */
$route['(vn|jp)/page/内装工事事例'] = "page/static_page/page_interior_construction";
$route['page/内装工事事例'] = "page/static_page/page_interior_construction";

/**
 * STATIC PAGE
 * Content of static page dong_shop_sun (page_261)
 * Action: page/dong-shop-sun
 */
$route['(vn|jp)/page/dong-shop-sun'] = "page/static_page/dong_shop_sun";
$route['page/dong-shop-sun'] = "page/static_page/dong_shop_sun";

/**
 * STATIC PAGE
 * Content of static page samurai (page_269)
 * Action: page/samurai
 */
$route['(vn|jp)/page/samurai'] = "page/static_page/samurai";
$route['page/samurai'] = "page/static_page/samurai";

/**
 * STATIC PAGE
 * Content of static page allGrowLabo (page_272)
 * Action: page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様
 */
$route['(vn|jp)/page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様'] = "page/static_page/allGrowLabo";
$route['page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様'] = "page/static_page/allGrowLabo";

/**
 * STATIC PAGE
 * Content of static page dearRegal (page_273)
 * Action: page/リーガル（REGAL）様
 */
$route['(vn|jp)/page/リーガル（REGAL）様'] = "page/static_page/dearRegal";
$route['page/リーガル（REGAL）様'] = "page/static_page/dearRegal";

/**
 * STATIC PAGE
 * Content of static page banner interior
 * Action: page/ホーチミンの賃貸事情とわたしたちの取り組み
 */
$route['(vn|jp)/page/ホーチミンの賃貸事情とわたしたちの取り組み'] = 'page/static_page/banner_interior';
$route['page/ホーチミンの賃貸事情とわたしたちの取り組み'] = 'page/static_page/banner_interior';

/**
 * LIST NEW ARRIVAL
 * Content of houses new_arrival
 * Action: houses/new_arrival
 */

$route['(vn|jp)/houses/new_arrival'] = "houses/new_arrival";
$route['houses/new_arrival'] = "houses/new_arrival";

/**
 * LIST HOUSE DETAIL BY CONDITION
 * Content of houses detail by condition
 * Action: houses/house detail by condition
 */
// new arival
$route['(vn|jp)/houses/最新賃貸物件'] = "houses/house_detail_by_condition/1";
$route['houses/最新賃貸物件'] = "houses/house_detail_by_condition/1";

// promotion
$route['(vn|jp)/houses/注目物件'] = "houses/house_detail_by_condition/promotion";
$route['houses/注目物件'] = "houses/house_detail_by_condition/promotion";

// 2区アパートメント特集
$route['(vn|jp)/houses/2区アパートメント特集'] = "houses/house_detail_by_condition/2";
$route['houses/2区アパートメント特集'] = "houses/house_detail_by_condition/2";

// ホーチミン 3区 サービスアパート特集
$route['(vn|jp)/houses/ホーチミン3区サービスアパート特集'] = "houses/house_detail_by_condition/3";
$route['houses/ホーチミン3区サービスアパート特集'] = "houses/house_detail_by_condition/3";

// フーミーフン7区アパート
$route['(vn|jp)/houses/フーミーフン7区アパート'] = "houses/house_detail_by_condition/7";
$route['houses/フーミーフン7区アパート'] = "houses/house_detail_by_condition/7";

//ビンホームズ,vinhomes特集
$route['(vn|jp)/houses/ビンホームズ,vinhomes特集'] = "houses/house_detail_by_condition/vin_home";
$route['houses/ビンホームズ,vinhomes特集'] = "houses/house_detail_by_condition/vin_home";

// ホーチミン単身向け450USD以下アパート特集
$route['(vn|jp)/houses/ホーチミン単身向け450USD以下アパート特集'] = "houses/house_detail_by_condition/under_450_usd";
$route['houses/ホーチミン単身向け450USD以下アパート特集'] = "houses/house_detail_by_condition/under_450_usd";

$route['(vn|jp)/houses/house_detail_by_condition_all'] = "houses/house_detail_by_condition_all";
$route['houses/house_detail_by_condition_all/'] = "houses/house_detail_by_condition_all";

//contact request email
$route['(vn|jp)/希望物件リクエスト'] = "contact_request_email";
$route['希望物件リクエスト'] = "contact_request_email";

//customer_comment
$route['(vn|jp)/お客様の声'] = "customer_comment";
$route['お客様の声'] = "customer_comment";

// Building buy sell
$route['(vn|jp)/building_buy_sell/ホーチミンの不動産売買'] = 'building_buy_sell/index';
$route['building_buy_sell/ホーチミンの不動産売買'] = 'building_buy_sell/index';

$route['(vn|jp)/building_buy_sell/detail/(:num)/(:any)'] = "building_buy_sell/detail";
$route['building_buy_sell/detail/(:num)/(:any)'] = "building_buy_sell/detail";