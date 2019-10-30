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
?>



<div class="menu">
    <div class="menu-item">
        <ul>
            <li class="<?=$page_home; ?>"><a class="active" href="<?=create_url(); ?>"><span><?php echo lang("ホーム") ?></span></a></li>
            <li class="<?=$page_259; ?> <?=$page_short_term_apartment; ?> <?=$page_office_information?> <?=$page_guidance_industrial_factory?> <?=$page_guidance_stores?> <?=$page_popular_apartment?> <?=$page_serviced_apartments?> <?=$cateory_183?> <?=$cateory_184?> <?=$page_aodai_support;?> <?=$page_contracting_process;?> <?=$page_register_home; ?><?=$page_275; ?>">
                <a href="#"><span><?php echo change_language('物件を借りたい', 'Cho Thuê') ?></span></a>
                <ol class="sub-menu sub-1 sub-1-2">
                    <li><a class="<?=$cateory_183?>" href="<?=create_url(); ?>search?opt=house"><span><?php echo lang("賃貸住宅") ?></span></a></li>

                    <li><a class="<?=$cateory_184?>" href="<?=create_url(); ?>search?opt=office"><span><?php echo lang("office_menu") ?></span></a></li>

                    <li><a class="<?=$page_contracting_process;?>" href="<?=create_url(); ?>page/ベトナム賃貸不動産 ご契約の流れ" class="last-child"><span><?php echo lang("ご契約の流れ") ?></span></a></li>
                    
                    <!-- <li><a class="<?=$page_275;?>" href="<?=create_url(); ?>page/ホーチミンの住居について" class="last-child"><span><?php echo change_language("ホーチミンの住居について", "ホーチミンの住居について") ?></span></a></li> -->
                    
                    <li><a class="<?=$page_259;?>" href="<?=create_url(); ?>page/ローカルサービスアパートメント・アパートメントのご紹介" class="last-child"><span><?php echo change_language("ホーチミンの住居の種類","ホーチミンの住居の種類") ?></span></a></li>

                    <li><a class="<?=$page_short_term_apartment;?>" href="<?=create_url(); ?>page/短期アパートのご案内" class="last-child"><span style="letter-spacing: -0.7px !important;"><?php echo change_language("住宅短期契約について","住宅短期契約について") ?></span></a></li>

                    <li><a class="<?=$page_office_information;?>" href="<?=create_url(); ?>page/オフィスのご案内" class="last-child"><span><?php echo change_language("オフィスについて","オフィスについて") ?></span></a></li>
                    
                    <!-- <li><a class="<?=$page_guidance_industrial_factory;?>" href="<?=create_url(); ?>page/工業団地・工場のご案内" class="last-child"><span><?php echo change_language("工業団地のご案内","工業団地のご案内") ?></span></a></li> -->
                    
                    <!-- <li><a class="<?=$page_guidance_stores;?>" href="<?=create_url(); ?>page/戸建・店舗のご案内" class="last-child"><span><?php echo change_language("戸建・店舗のご案内","戸建・店舗のご案内") ?></span></a></li> -->
                    <li><a class="<?=$page_aodai_support;?>" href="<?=create_url(); ?>page/アオザイサポートデスク" class="last-child"><span><?php echo change_language("アオザイハウジングのサポート","アオザイハウジングのサポート") ?></span></a></li>
                    <!-- <li><a class="<?=$page_register_home; ?>" href="<?=create_url(); ?>page/ベトナム 物件オーナー募集"><span><?php echo lang("物件オーナー募集中") ?></span></a></li> -->
                    <!-- <li><a class="<?=$page_popular_apartment;?>" href="<?=create_url(); ?>page/人気アパートメントのご案内" class="last-child"><span><?php echo change_language("コンドミニアムのご紹介","コンドミニアムのご紹介") ?></span></a></li>
                    <li><a class="<?=$page_serviced_apartments;?>" href="<?=create_url(); ?>page/サービスアパートメントのご案内" class="last-child"><span><?php echo change_language("サービスアパートのご案内","サービスアパートのご案内") ?></span></a></li> -->
                </ol>
            </li> 
            <li class="<?=$page_incorporation; ?> <?=$page_workshops_home;?> <?=$page_industrial; ?> <?=$page_advanced_support?> <?=$page_representative_office?> <?=$page_support_content?> <?=$page_work_permits; ?>  <?=$page_vietnam_work_permits; ?> <?=$page_suport_vn; ?> <?=$page_find_industrial; ?> <?=$page_clothing_manufacturer; ?> <?=$page_human_resources_consulting; ?> <?=$page_interior_equipment_manufacturers; ?> <?=$page_gym_management; ?>">
                <a href="#"><span><?=change_language('ベトナムへ進出したい','Có nhu cầu lập nghiệp tại Việt Nam')?></span></a>
                <ol class="sub-menu">
                    <li><a class="<?=$page_advanced_support?>" href="<?=create_url(); ?>page/進出支援のご案内"><span><?php echo change_language('会社設立＆スタートアップ支援', '会社設立＆スタートアップ支援') ?></span></a></li>

                    <li><a class="<?=$page_representative_office?>" href="<?=create_url(); ?>page/駐在員事務所設立＆スタートアップ支援"><span><?php echo change_language('駐在員事務所設立＆スタートアップ支援', '駐在員事務所設立＆スタートアップ支援') ?></span></a></li>

                    <li>
                        <a class="<?=$page_vietnam_work_permits; ?>" href="<?=create_url(); ?>page/ベトナム労働許可証"><span><?php echo lang("ベトナム労働許可証") ?> </span></a>
                    </li>

                    <li>
                        <a class="<?=$page_work_permits; ?>" href="<?=create_url(); ?>page/ベトナムビザ・労働許可証"><span><?php echo lang("ベトナムビザ") ?> </span></a>
                    </li>

                    <li><a class="<?=$page_support_content?>" href="<?=create_url(); ?>page/ベトナム法人設立,駐在員事務所開設サポート"><span><?php echo change_language('進出後の事業ライセンス', '進出後の事業ライセンス') ?></span></a></li>

                    <li><a class="<?=$page_industrial; ?>" href="<?=create_url(); ?>page/ロンハウ工業団地"><span><?php echo change_language("ロンハウ工業団地","ロンハウ工業団地") ?></span></a></li>
                    
                    <li><a class="<?=$page_clothing_manufacturer; ?>" href="<?=create_url(); ?>page/R社（衣料品メーカー）様"><span><?php echo change_language("進出サポート事例①","Thành tích hỗ trợ lập chi nhánh①") ?></span></a></li>
                    <li><a class="<?=$page_human_resources_consulting; ?>" href="<?=create_url(); ?>page/R社（人材コンサルティング）様"><span><?php echo change_language("進出サポート事例②","Thành tích hỗ trợ lập chi nhánh②") ?></span></a></li>
                    <li><a class="<?=$page_interior_equipment_manufacturers; ?>" href="<?=create_url(); ?>page/E社（内装設備メーカー）様"><span><?php echo change_language("進出サポート事例③","Thành tích hỗ trợ lập chi nhánh③") ?></span></a></li>
                    <li><a class="<?=$page_gym_management; ?>" href="<?=create_url(); ?>page/S社（ジム運営）様"><span><?php echo change_language("進出サポート事例④","Thành tích lập chi nhánh hỗ trợ④") ?></span></a></li>

                    
                    <!-- <li><a class="<?=$page_incorporation; ?>" href="<?=create_url(); ?>page/ベトナム法人設立,駐在員事務所開設の流れ"><span> <?php echo change_language("サポートの流れ ","Hỗ trợ các thủ tục thành lập công ty.") ?></span></a></li> -->
                    <!-- <li><a class="<?=$page_suport_vn; ?>" href="<?=create_url(); ?>page/ベトナム視察進出支援"><span> <?php echo lang("市場調査・視察") ?></span></a></li>-->
                    <!-- <li><a class="<?=$page_workshops_home;?>" href="<?=create_url(); ?>page/ベトナムレンタル工場・工業団地" class="last-child"><span><?php echo lang("工場・倉庫") ?></span></a></li> -->
                    <!-- <li><a class="<?=$page_find_industrial; ?>" href="<?=create_url(); ?>page/中古工業団地"><span><?php echo lang("find_industrial") ?></span></a></li>-->
                </ol>

            </li>
            <li class="<?=$page_261; ?><?=$page_258; ?><?=$page_269; ?><?=$page_273; ?><?=$page_274; ?><?=$page_design_interior; ?> <?=$page_case_construction?> <?=$page_after_sales_service; ?> <?=$page_interior_furniture;?>  <?=$page_vitalify;?>  <?=$page_regal;?>  <?=$page_fanuc;?> <?=$page_interior_construction; ?>">
                <a href="#"><span><?php echo change_language('内装工事をしたい', 'Thiết kế và lắp đặt nội thất') ?></span></a>
                <ol class="sub-menu sub-1 sub-1-4">
                   <li><a class="<?=$page_design_interior; ?>" href="<?=create_url(); ?>page/オフィス店舗デザイン・設計施工の流れ"><span> オフィス・店舗</span></a></li>
                   <li><a class="<?=$page_interior_furniture; ?>" href="<?=create_url(); ?>page/ベトナム ホーチミン オフィス店舗 内装工事"><span>住居</span></a></li>
                   <li><a class="<?=$page_regal; ?>" href="<?=create_url(); ?>page/リーガル（REGAL）様 ホーチミン内装工事例"><span>施工事例①</span></a></li>
                   <li><a class="<?=$page_vitalify; ?>" href="<?=create_url(); ?>page/バイタリフィアジア（VITALIFY ASIA）様 ホーチミン内装工事例"><span>施工事例②</span></a></li>
                   <li><a class="<?=$page_fanuc; ?>" href="<?=create_url(); ?>page/ファナックベトナム（FANUC VIETNAM）様 ホーチミン内装工事例"><span>施工事例③</span></a></li>
                   <li><a class="<?=$page_interior_construction; ?>" href="<?=create_url(); ?>page/内装工事事例"><span>施工事例④</span></a></li> 
                   <li><a class="<?=$page_258; ?>" href="<?=create_url(); ?>page/photron-vietnam"><span>施工事例⑤</span></a></li> 
                   <li><a class="<?=$page_261; ?>" href="<?=create_url(); ?>page/dong-shop-sun"><span>施工事例⑥</span></a></li> 
                   <li><a class="<?=$page_269; ?>" href="<?=create_url(); ?>page/samurai"><span>施工事例⑦</span></a></li>
                   <li><a class="<?=$page_273; ?>" href="<?=create_url(); ?>page/オルグロー・ラボ（AllGrowLabo Co.,Ltd.）様"><span>施行事例⑧</span></a></li> 
                   <li><a class="<?=$page_274; ?>" href="<?=create_url(); ?>page/リーガル（REGAL）様"><span>施行事例⑨</span></a></li> 
                   
                   <li style="display: none;"><a class="<?=$page_case_construction?>" href="<?=create_url(); ?>page/施工事例"><span>施工事例</span></a></li> 
                   <li style="display: none;"><a class="<?=$page_after_sales_service; ?>" href="<?=create_url(); ?>page/アフターサービス"><span>アフターサービス</span></a></li>
                   
                    
                </ol>
            </li>



			<!-- <li <?php if($this->uri->segment(2)=='WEB広告をしたい' || $this->uri->segment(3)=='WEB広告をしたい'){ print 'class="active"'; } ?>><a href="<?=create_url(); ?>page/WEB広告をしたい"><span style="letter-spacing: -0.5px !important;">WEB制作・オフショア</span></a></li> -->

            <li <?php if($this->uri->segment(2)=='WEB広告をしたい' || $this->uri->segment(3)=='WEB広告をしたい'){ print 'class="active"'; } ?>>
                <a href="<?=create_url(); ?>page/WEB広告をしたい"><span style="letter-spacing: -0.5px !important;"><?php echo lang("サイト制作したい") ?></span></a>
                <ol class="sub-menu">
                    <li><a target="_blank" href="http://www.propolifevietnam.com/web%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6.html"><span>サービスについて</span></a></li>

                    <li><a target="_blank" href="http://www.propolifevietnam.com/web.html"><span>WEBサイト制作</span></a></li>

                    <li><a target="_blank" href="http://www.propolifevietnam.com/web%E5%BA%83%E5%91%8A%E6%94%AF%E6%8F%B4.html"><span>WEB広告サポート</span></a></li>
                </ol>
            </li>

            <li class="<?=$page_about; ?> <?=$page_staff_introduction; ?> <?=$page_jobs; ?>">
                <a href="#"><span><?php echo lang("運営会社概要") ?></span></a>
                <ol class="sub-menu">
                    <li><a class="<?=$page_about; ?>" href="<?=create_url(); ?>page/プロポライフベトナム 会社概要"><span>運営会社概要</span></a></li>
                    <li><a class="<?=$page_staff_introduction; ?>" href="<?=create_url(); ?>page/プロポライフベトナム社員紹介"><span>スタッフ紹介</span></a></li>
                    <li><a class="<?=$page_jobs; ?>" href="<?=create_url(); ?>page/プロポライフベトナム 採用情報"><span>採用情報</span></a></li>
                </ol>
            </li>
           
        </ul>
    </div>
</div>