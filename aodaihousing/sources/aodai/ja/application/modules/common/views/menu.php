<?php
$module =  $this->router->fetch_class();
$function = $this->router->fetch_method();
$page_about = '';
$page_home = '';
$page_suport_vn = '';
$page_contracting_services = '';
$page_register_home = '';
$page_workshops_home = '';
$cateory_183 = '';
$cateory_184 = '';
$page_contracting_process = '';
$page_shopping = '';
$page_work_permits = '';
$page_vietnam_work_permits = '';
$page_incorporation = '';
$page_find_industrial = '';
$page_support_content = '';
$page_advanced_support = '';
$page_representative_office = '';
$page_design_interior = '';
$page_case_construction = '';
$page_after_sales_service = '';
$page_staff_introduction = '';
$page_jobs = '';
$page_aodai_support='';
$page_interior_furniture = '';
$page_vitalify= '';
$page_regal = '';
$page_fanuc = '';
$page_industrial = '';
$page_popular_apartment = '';
$page_serviced_apartments = '';
$page_office_information = '';
$page_guidance_industrial_factory = '';
$page_guidance_stores = '';

$page_interior_construction = '';
$page_258 = "";
$page_259 = "";
$page_261 = "";
$page_269 = "";
$page_272 = "";
$page_273 = "";
$page_274 = "";
$page_275 = "";

$page_clothing_manufacturer = '';
$page_human_resources_consulting = '';
$page_interior_equipment_manufacturers = '';
$page_gym_management = '';

$page_short_term_apartment = '';

$opt = isset($_GET['opt']) && $_GET['opt'] != '' ? $_GET['opt']:'';
$catid = $this->uri->segment(2);
if($module == "page" && $function == "page_about"){
    $page_about = 'active';
}
if($module == "page" && $function == "page_suport_vn"){
     $page_suport_vn = 'active';
     
}
if($module == "page" && $function == "page_contracting_services"){
    $page_contracting_services = 'active';
}
if($module == "page" && $function == "page_register_home"){
    $page_register_home = 'active';
}
if($module == "page" && $function == "page_workshops_home"){
    $page_workshops_home = 'active';
}
if($module == "page" && $function == "page_industrial"){
    $page_industrial = 'active';
}

if($module == "page" && $function == "page_clothing_manufacturer"){
    $page_clothing_manufacturer = 'active';
}

if($module == "page" && $function == "page_human_resources_consulting"){
    $page_human_resources_consulting = 'active';
}

if($module == "page" && $function == "page_interior_equipment_manufacturers"){
    $page_interior_equipment_manufacturers = 'active';
}

if($module == "page" && $function == "page_gym_management"){
    $page_gym_management = 'active';
}

if($module == "page" && $function == "page_258"){
    $page_258 = 'active';
}

if($module == "page" && $function == "page_259"){
    $page_259 = 'active';
}

if($module == "page" && $function == "page_short_term_apartment"){
    $page_short_term_apartment = 'active';
}

if($module == "page" && $function == "page_261"){
    $page_261 = 'active';
}


if($module == "page" && $function == "page_269"){
    $page_269 = 'active';
}
if($module == "page" && $function == "page_272"){
    $page_272 = 'active';
}
if($module == "page" && $function == "page_273"){
    $page_273 = 'active';
}
if($module == "page" && $function == "page_274"){
    $page_274 = 'active';
}
if($module == "page" && $function == "page_275"){
    $page_275 = 'active';
}


if($module == "page" && $function == "page_contracting_process"){
    $page_contracting_process = 'active';
}
if($module == "page" && $function == "page_shopping"){
    $page_shopping = 'active';
}
if($module == "page" && $function == "page_work_permits"){
    $page_work_permits = 'active';
}
if($module == "page" && $function == "page_vietnam_work_permits"){
    $page_vietnam_work_permits = 'active';
}
if($module == "page" && $function == "page_incorporation"){
    $page_incorporation = 'active';
}

if($module == "page" && $function == "page_find_industrial"){
    $page_find_industrial = 'active';
}

if($module == "page" && $function == "page_support_content"){
    $page_support_content = 'active';
}

if($module == "page" && $function == "page_advanced_support"){
    $page_advanced_support = 'active';
}

if($module == "page" && $function == "page_representative_office"){
    $page_representative_office = 'active';
}

if($module == "page" && $function == "page_design_interior"){
    $page_design_interior = 'active';
}
if($module == "page" && $function == "page_interior_furniture"){
    $page_interior_furniture = 'active';
}
if($module == "page" && $function == "page_office_information"){
    $page_office_information = 'active';
}
if($module == "page" && $function == "page_guidance_industrial_factory"){
    $page_guidance_industrial_factory = 'active';
}

if($module == "page" && $function == "page_guidance_stores"){
    $page_guidance_stores = 'active';
}

if($module == "page" && $function == "page_vitalify"){
    $page_vitalify = 'active';
}
if($module == "page" && $function == "page_regal"){
    $page_regal = 'active';
}
if($module == "page" && $function == "page_fanuc"){
    $page_fanuc = 'active';
}



if($module == "page" && $function == "page_case_construction"){
    $page_case_construction = 'active';
}
if($module == "page" && $function == "page_after_sales_service"){
    $page_after_sales_service = 'active';
}
if($module == "page" && $function == "page_staff_introduction"){
    $page_staff_introduction = 'active';
}
if($module == "page" && $function == "page_jobs"){
    $page_jobs = 'active';
}
if($module == "page" && $function == "page_aodai_support"){
    $page_aodai_support = 'active';
}
if($module == "page" && $function == "page_serviced_apartments"){
    $page_serviced_apartments = 'active';
}

if($module == "page" && $function == "page_popular_apartment"){
    $page_popular_apartment = 'active';
}

if($module == "page" && $function == "page_interior_construction"){
    $page_interior_construction = 'active';
}


if($module == "home" ){
    $page_home = 'active';
}
if($opt == "house"){
    $cateory_183 = 'active';
}
if($opt == "office"){
    $cateory_184 = 'active';
}

$active_1 = '';
$active_2 = '';
$active_3 = '';
$active_4 = '';
$active_5 = '';
$active_6 = '';
$active_7 = '';
$active_8 = '';
$active_9 = '';
$active_10 = '';
$active_11 = '';
$active_12 = '';

if (helper_get_page_current() == "ベトナム賃貸不動産 ご契約の流れ") {
    $active_1 = 'active';
}

if (helper_get_page_current() == "ローカルサービスアパートメント・アパートメントのご紹介") {
    $active_2 = 'active';
}

if (helper_get_page_current() == "ホーチミンの住居と日本の住居の違い") {
    $active_3 = 'active';
}

if (helper_get_page_current() == "住居エリア検索") {
    $active_4 = 'active';
}

if (helper_get_page_current() == "人気マンション・コンドミニアム") {
    $active_5 = 'active';
}

if (helper_get_page_current() == "人気サービスアパート") {
    $active_6 = 'active';
}

if (helper_get_page_current() == "日本人学校のバスが停まる物件特集") {
    $active_7 = 'active';
}

if (helper_get_page_current() == "オフィスのご案内") {
    $active_8 = 'active';
}

if (helper_get_page_current() == "サポートオプションについて") {
    $active_9 = 'active';
}

if (helper_get_page_current() == "よくあるご質問") {
    $active_10 = 'active';
}

if (helper_get_page_current() == "不動産オーナー様へ") {
    $active_11 = 'active';
}

if (helper_get_page_current() == "プロポライフベトナム 会社概要") {
    $active_12 = 'active';
}

?>

<ul class="sub-menu-list-header">
    <li class="<?=$page_home; ?>" onclick='window.location.href="<?php echo create_url();?>"'>
        <a href="<?=create_url(); ?>">検索トップページ</a>
    </li>
    
    <li class='<?php echo $active_1; ?>' onclick='window.location.href="<?=create_url(); ?>page/ベトナム賃貸不動産 ご契約の流れ"'>
        <a href="<?=create_url(); ?>page/ベトナム賃貸不動産 ご契約の流れ"><p>入居までの流れ</p></a>
    </li>
    
    <li class='<?php echo $active_2; ?>' onclick='window.location.href="<?=create_url(); ?>page/ローカルサービスアパートメント・アパートメントのご紹介"'>
        <a href="<?=create_url(); ?>page/ローカルサービスアパートメント・アパートメントのご紹介"><p>ホーチミンの住居の種類と注意点</p></a>
    </li>
    
    <li class='<?php echo $active_3; ?>' onclick='window.location.href="<?=create_url(); ?>page/ホーチミンの住居と日本の住居の違い"'>
        <a href="<?=create_url(); ?>page/ホーチミンの住居と日本の住居の違い"><p>ホーチミンと日本の住居の違い</p></a>
    </li>
    
    <li class='<?php echo $active_4; ?>' onclick='window.location.href="<?=create_url(); ?>page/住居エリア検索"'>
        <a href="<?=create_url(); ?>page/住居エリア検索"><p>住居エリア検索</p></a>
    </li>
    
    <li class='<?php echo $active_5; ?>' onclick='window.location.href="<?=create_url(); ?>building/人気マンション・コンドミニアム"'>
        <a href="<?=create_url(); ?>building/人気マンション・コンドミニアム"><p>人気マンション・コンドミニアム</p></a>
    </li>
    
    <li class='<?php echo $active_6; ?>' onclick='window.location.href="<?=create_url(); ?>building/人気サービスアパート"'>
        <a href="<?=create_url(); ?>building/人気サービスアパート"><p>人気サービスアパート</p></a>
    </li>
    
    <li class='<?php echo $active_7; ?>' onclick='window.location.href="<?=create_url(); ?>building/日本人学校のバスが停まる物件特集"'>
        <a href="<?=create_url(); ?>building/日本人学校のバスが停まる物件特集"><p>日本人学校のバスが停まるアパート</p></a>
    </li>
    
    <li class='<?php echo $active_8; ?>' onclick='window.location.href="<?=create_url(); ?>page/オフィスのご案内"'>
        <a href="<?=create_url(); ?>page/オフィスのご案内"><p>ホーチミンのオフィスについて</p></a>
    </li>

    <li class='<?php echo $active_9; ?>' onclick='window.location.href="<?=create_url(); ?>page/サポートオプションについて"'>
        <a href="<?=create_url(); ?>page/サポートオプションについて"><p>サポートオプションについて</p></a>
    </li>
    
    <li class='<?php echo $active_10; ?>' onclick='window.location.href="<?=create_url(); ?>page/よくあるご質問"'>
        <a href="<?=create_url(); ?>page/よくあるご質問"><p>よくあるご質問</p></a>
    </li>
    
    <li class='<?php echo $active_11; ?>' onclick='window.location.href="<?=create_url(); ?>page/不動産オーナー様へ"'>
        <a href="<?=create_url(); ?>page/不動産オーナー様へ"><p>不動産オーナー様へ</p></a>
    </li>
    
    <li class='<?php echo $active_12; ?>' onclick='window.location.href="<?=create_url(); ?>page/プロポライフベトナム 会社概要"'>
        <a href="<?=create_url(); ?>page/プロポライフベトナム 会社概要"><p>運営会社概要</p></a>
    </li>
    
    <li><a class="popUp" id="showContact" data-toggle="modal" data-target="#contactModal" href="javascript:void(0)">お問い合わせ</a></li>
</ul>