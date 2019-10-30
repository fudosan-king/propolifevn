<style>
    .info-apartment {
        display: none;
    }
</style>
<?php
$catid = $this->uri->segment(2);
$module = 'houses';
if($module != 'news') {
    echo modules::run('search',$catid, $module);
}
?>
<?php
$true_lang = 'なし';
$false_lang = '否';
$status_p = array('無料','有料');
$status_p_2 = array('可','否');
$data_type = array(
        0 => lang('サービスアパートメント'),
        1 => lang('アパートメント'),
        2 => lang('戸建')
);
if(current_lang_() == 'vn'){
    $tien_te = 'USD';
}else{
    $tien_te = 'USD';
}
?>
<?php if(isset($item)): ?>
<div class="content-search-block common-rows" id='scroll-buidling'>
<div class="detail-page-content">
            <div class="container">

                <?php
                $breadcumsListData = '';
                $breadcumsName = '';
                if(isset($breadcums)){
                    if($breadcums == 1){
                        $breadcumsName = '最新賃貸物件';
                    }
                    if($breadcums == 2){
                        $breadcumsName = '2区アパートメント特集';
                    }
                    if($breadcums == 3){
                        $breadcumsName = 'ホーチミン3区サービスアパート特集';
                    }
                    if($breadcums == 7){
                        $breadcumsName = 'フーミーフン7区アパート';
                    }
                    if($breadcums == 'under_450_usd'){
                        $breadcumsName = 'ホーチミン単身向け450USD以下アパート特集';
                    }
                    if($breadcums == 'promotion'){
                        $breadcumsName = '注目物件';
                    }
                    if ($breadcums =='list_data'){
                        $breadcumsListData = 'list_data';
                    }
                }
                if($breadcumsName!='') {
                    // File store under folder application/views/FRONTEND/breadcums.php
                    echo $this->load->view('FRONTEND/breadcums', array(
                        'breadcums_first' => '<a href="' . PATH_URL . 'houses/' . $breadcumsName . '">' . $breadcumsName . '</a>',
                        'breadcums_second' => vcp_printf($item->name_en, current_lang_())
                    ));
                }

                if($breadcumsListData!='') {
                    echo $this->load->view('FRONTEND/breadcums', array(
                        'breadcums_first' => '<a href="' . PATH_URL . 'search/' . $breadcumsListData . '?opt=house'. '">' . '検索結果' . '</a>',
                        'breadcums_second' => vcp_printf($item->name_en, current_lang_())
                    ));
                }

                if( $breadcumsListData == '' && $breadcumsName == ''){
                    echo $this->load->view('FRONTEND/breadcums',array(
                       'breadcums_first' => vcp_printf($item->name_en, current_lang_())
                    ));
                }
                ?>

                <div class="list-detail-images">
                    <div class="row">
                        <div class="col-xs-5 thumb-list">
                            <div class="images-thumb-list">
                                <div class="btn-zoom-in">
                                    <a></a>
                                </div>
                                <ul id="imageGallery">
                                    <?php echo modules::run('houses/slide', $images_gl,$images_thumb); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-title">
                    <h3><?php echo nl2br(vcp_printf($item->name_en, current_lang_()));?><br>
                        <?php echo nl2br(vcp_printf($item->name_jp, current_lang_()));?>
                    </h3>
                </div>
                <div class="info-appartment-detail">
                    <div class="info-one-detail clearfix">
                        <div class="price-appartment-detail pull-left">
                            <p>賃料</p>
                            <p><span><?= $item->rent?></span><span>USD</span></p>
                        </div>
                        <div class="favorite-social pull-left">
                            <a href="https://www.facebook.com/aodaihousing/" title=""><p><span>Like us on</span><span>Facebook</span></p></a>
                        </div>
                    </div>
                    <div class="info-two-detail clearfix">
                        <div class="col-one-info pull-left">
                            <p class="des-info-detail clearfix">
                                <span>エリア</span>
                                <span><?php echo vcp_printf($item->area, current_lang_())?></span>
                            </p>
                            <p class="des-info-detail clearfix">
                                <span>住居タイプ</span>
                                <span>
                                    <?php
                                    $data_option = array(
                                        0 => lang('サービスアパートメント'),
                                        1 => lang('アパートメント'),
                                        2 => lang('戸建')
                                    );
                                    foreach($data_option as $keydata =>$option){
                                        if($keydata == $item->type){
                                            echo $option;
                                        }
                                    }?>
                                </span>
                            </p>
                            <p class="des-info-detail clearfix">
                                <span>面積</span>
                                <span><?= $item->size?>m²</span>
                            </p>
                            <p class="des-info-detail clearfix">
                                <span>間取り</span>
                                <span><?php echo vcp_printf($item->house_layouts, current_lang_())?></span>
                            </p>
                            <p class="des-info-detail clearfix">
                                <span>契約書言語の表示</span>
                                <span><?php echo vcp_printf($item->contract, current_lang_())?></span>
                                
                            </p>
                            <p class="des-info-detail clearfix">
                                <span>家賃支払条件</span>
                                <span><?php echo nl2br(vcp_printf($item->rent_condition,current_lang_()))?></span>

                            </p>
                            <p class="des-info-detail clearfix">
                                <span>デポジット</span>
                                <span><?php echo nl2br(vcp_printf($item->deposit,current_lang_()))?></span>

                            </p>

                        </div>

                        <div class="col-two-info pull-left">
                            <?php if(isset($equipment)){?>
                            <div class="service-detail">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="title-condition-utilities">
                                        家賃に含む<br/>サービス等
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <ul>
                                                <?php foreach ($equipment as $icon){
                                                    if(isset($icon->name_image)){?>
                                                        <li>
                                                            <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?php echo PATH_URL .'static/images/facility_equipment_icon/'.$icon->name_image; ?>">
                                                        </li>
                                                    <?php }
                                                }?>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- service-detail -->
                            <?php }?>
                            <?php if(isset($common_facility)){?>
                            <div class="facilities-detail">
                                <div class="row">
                                        <div class="col-xs-4">
                                            <div class="title-condition-utilities">
                                            設備
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <ul>
                                                <?php foreach ($common_facility as $icon){
                                                    if(isset($icon->name_image)){?>
                                                        <li>
                                                            <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?php echo PATH_URL .'static/images/facility_equipment_icon/'.$icon->name_image; ?>">
                                                        </li>
                                                    <?php }
                                                }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div><!-- col-two-info -->
                    </div>
                    <div class="info-three-detail">
                        <p> <?= $item->size?>m² <?=vcp_printf($item->house_layouts, current_lang_())?><br/>
                            <?php echo nl2br(vcp_printf($item->introduction, current_lang_())); ?>
                        </p>
                        <a href="javascript:void(0)" class="contact-detail btn-red overlay-detail" data-toggle="modal" data-target="#contactModal">この物件を問い合わせる</a>
                    </div>
                </div><!-- info-appartment-detail -->
                <div class="info-apartment">
                    <h2 class="heading-title">同じ建物内の物件</h2>
                    <div class="set-slider-list">
                        <div class="row">
                            <div class="items-list-apartment owl-carousel">
                               <?php if(isset($house_building)) {?>
                                    <?php foreach ($house_building as $item) { ?>
                                       <?php $v = 0;?>
                                       <div class="col-xs-3 info-appartment-item info-appartment-item2">
                                            <div class="image-room-block">
                                                <div class="img-apartment">
                                                    <a href="<?=create_url() . "houses/detail/" . $item->id . '/' .vcp_printf($item->name_en,current_lang_());?>">
                                                        <?php if($item->images_thumb != ''):?>
                                                            <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?php echo PATH_URL.'static/uploads/houses/'.$item->images_thumb ?>">
                                                        <?php else:?>
                                                            <?php foreach ($imagesHouse as $Thumb):?>
                                                                <?php if($Thumb->house_id == $item->id):
                                                                    $v = $v + 1;
                                                                    if($v == 1){?>
                                                                        <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?php echo PATH_URL.'static/uploads/houses/gallery/'.$Thumb->name_image ?>">
                                                                   <?php } ?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </a>
                                                </div>
                                                <div class="price-and-location">
                                                    <p class="info-price"><span><?php echo $item->rent?></span><span>USD</span></p>
                                                    <p class="info-address"><span><?php echo vcp_printf($item->name,current_lang_())?></span></p>
                                                </div>
                                            </div>
                                            <p class="quantity-rooms">
                                                <?php if(isset($itemLayOut)){
                                                    foreach ($itemLayOut as $key =>$layOut){
                                                        if($layOut->id == $item->house_layout_id){
                                                            echo vcp_printf($layOut->name,current_lang_());
                                                        }
                                                    }
                                                }?>
                                            </p>
                                            <p class="des-info-appartment line-clamp-3"><a href="<?=create_url() . "houses/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_());?>"><?php echo vcp_printf($item->introduction,current_lang_())?></a></p>
                                        </div>
                                    <?php
                                    }
                                }?>
                            </div><!-- row -->
                        </div><!-- items-list-apartment -->
                    </div>
                </div><!-- info-apartment -->
                <div class="info-apartment">
                    <h2 class="heading-title">類似物件</h2>
                    <div class="set-slider-list">
                        <div class="row">
                            <div class="items-list-apartment owl-carousel">
                                <?php if(isset($category_special)) {?>
                                    <?php foreach ($category_special as $item) {?>
                                        <?php $v = 0;?>
                                        <div class="col-xs-3 info-appartment-item info-appartment-item2">
                                            <div class="image-room-block">
                                                <div class="img-apartment">
                                                    <a href="<?=create_url() . "houses/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_());?>">
                                                        <?php if($item->images_thumb != ''):?>
                                                            <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?php echo PATH_URL.'static/uploads/houses/'.$item->images_thumb ?>">
                                                        <?php else:?>
                                                            <?php foreach ($imagesHouse as $Thumb):?>
                                                                <?php if($Thumb->house_id == $item->id):
                                                                    $v = $v + 1;
                                                                    if($v == 1){?>
                                                                        <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?php echo PATH_URL.'static/uploads/houses/gallery/'.$Thumb->name_image ?>">
                                                                    <?php } ?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </a>
                                                </div>
                                                <div class="price-and-location">
                                                    <p class="info-price"><span><?php echo $item->rent?></span><span>USD</span></p>
                                                    <p class="info-address"><span><?php echo vcp_printf($item->name,current_lang_())?></span></p>
                                                </div>
                                            </div>
                                            <p class="quantity-rooms">
                                                <?php if(isset($itemLayOut)){
                                                    foreach ($itemLayOut as $key =>$layOut){
                                                        if($layOut->id == $item->house_layout_id){
                                                            echo vcp_printf($layOut->name,current_lang_());
                                                        }
                                                    }
                                                }?>
                                            </p>
                                            <p class="des-info-appartment line-clamp-3"><a href="<?=create_url() . "houses/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_());?>"><?php echo vcp_printf($item->introduction,current_lang_())?></a></p>
                                        </div>
                                    <?php
                                    }
                                }?>
                            </div><!-- row -->
                        </div><!-- items-list-apartment -->
                    </div>
                </div><!-- info-apartment -->
            </div>
        </div>
</div><!-- content-search-block -->
<?php endif; ?>
<script>
    function init() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i=0; i<imgDefer.length; i++) {
            if(imgDefer[i].getAttribute('data-src')) {
                imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
            }
        }   
    }
    window.onload = init;
    $(document).ready(function() {
        $('html, body').animate({
            scrollTop: $("#scroll-buidling").offset().top
        }, 500);
        
        $(window).scroll(function(){
            var position = $('.detail-page-content .container').height() - 100;
            if($(this).scrollTop() >= position){
                $(".info-apartment:hidden").show();
            }
        });
    });
</script>
