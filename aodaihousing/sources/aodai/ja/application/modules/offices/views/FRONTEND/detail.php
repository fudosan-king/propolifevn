<style>
    .info-apartment {
        display: none;
    }
</style>
<?php
$catid = $this->uri->segment(2);
$module = $this->uri->segment(1);
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
<?php if($item): ?>
    <div class="content-search-block common-rows" id='scroll-buidling'>
    <div class="detail-page-content">
        <div class="container">

            <?php
            $breadcumsListData = '';
            if($breadcums) {
                if ($breadcums == 'list_data') {
                    $breadcumsListData = 'list_data';
                }
            }
            // File store under folder application/views/FRONTEND/breadcums.php
            if($breadcumsListData) {
                echo $this->load->view('FRONTEND/breadcums', array(
                    'breadcums_first' => '<a href="' . create_url() . 'search/' . $breadcumsListData .'?opt=office'.'">'.'検索結果' . '</a>',
                    'breadcums_second' => vcp_printf($item->name_en, current_lang_())
                ));
            }

            if( $breadcumsListData == ''){
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
                                <?php echo modules::run('offices/slide', $images_gl,$images_thumb); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-title">
                <h3>
                    <h3><?php echo nl2br(vcp_printf($item->name_en, current_lang_()));?><br>
                        <?php echo nl2br(vcp_printf($item->name_jp, current_lang_()));?>
                    </h3>
            </div>
            <div class="info-appartment-detail">
                <div class="info-one-detail clearfix">
                    <div class="price-appartment-detail pull-left">
                        <p>賃料</p>
                        <p><span><?php echo $item->month_rent?></span><span>USD</span></p>
                    </div>
                    <div class="favorite-social pull-left">
                        <a href="https://www.facebook.com/aodaihousing/" title="">
                            <p><span>Like us on</span><span>Facebook</span></p>
                        </a>
                    </div>
                </div>
                <div class="info-two-detail info-two-detail-office">
                    <div class="col-one-info col-one-info-office">
                        <p class="des-info-detail clearfix">
                            <span>エリア</span>
                            <span><?php echo vcp_printf($item->name, current_lang_())?></span>
                        </p>
                        <p class="des-info-detail clearfix">
                            <span>面積</span>
                            <span><?php echo $item->size?>m²</span>
                        </p>
                         <p class="des-info-detail clearfix">
                            <span>賃料</span>
                            <span>
                                <?php echo $item->size_rent?>USD/m²
                            </span>
                        </p>
                    </div>
                    <!-- <div class="col-one-info col-one-info-office">
                        <p class="des-info-detail clearfix">
                            <span>賃料</span>
                            <span>
                                <?php echo $item->size_rent?>USD/m²
                            </span>
                        </p>
                        <p class="des-info-detail clearfix">
                            <span>席数</span>
                            <span>
                                <?php
                                $size = $item->size;
                                $html_num = '-';
                                if($size<=20){
                                    $html_num = '～5席';
                                }
                                if($size>=24 && $size<=40){
                                    $html_num = '6～10席';
                                }
                                if($size>=44 && $size<=60){
                                    $html_num = '11～15席';
                                }
                                if($size>=64 && $size<=100){
                                    $html_num = '16～25席';
                                }
                                if($size>=104 && $size<=160){
                                    $html_num = '26～40席';
                                }
                                if($size>160){
                                    $html_num = '40席以上';
                                }
                                echo $html_num;
                                ?>
                            </span>
                        </p> 
                    </div> -->
                    <div class="col-two-info col-two-info-office">
                        <!-- service-detail -->
                        <?php if($common_facility){?>
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
                                                if($icon->name_image != ''){?>
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
                    <p> <?= $item->size?>m² <br/>
                        <?php echo nl2br(vcp_printf($item->introduction, current_lang_())); ?>
                    </p>
                    <a href="javascript:void(0)" class="contact-detail btn-red" data-toggle="modal" data-target="#contactModal">この物件を問い合わせる</a>
                </div>
            </div><!-- info-appartment-detail -->
            <div class="info-apartment">
                <h2 class="heading-title">類似物件</h2>
                <div class="set-slider-list">
                    <div class="row">
                        <div class="items-list-apartment owl-carousel items-list-office">
                            <?php if($category_special) {?>
                                <?php foreach ($category_special as $item) { ?>
                                    <?php $v = 0;?>
                                    <div class="col-xs-3 info-appartment-item info-appartment-item2">
                                        <div class="image-room-block">
                                             <div class="img-apartment">
                                                <a href="<?=create_url() . "offices/detail/" . $item->id . '/' . $item->name_en;?>">
                                                    <?php if($item->images_thumb != ''):?>
                                                        <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?php echo PATH_URL.'static/uploads/offices/'.$item->images_thumb ?>">
                                                    <?php else:?>
                                                        <?php foreach ($imagesOffice as $Thumb):?>
                                                            <?php if($Thumb->office_id == $item->id):
                                                                $v = $v + 1;
                                                                if($v == 1){?>
                                                                    <img src="<?=PATH_URL.'static/images/img_defer_detail.png'?>" data-src="<?php echo PATH_URL.'static/uploads/offices/gallery/'.$Thumb->name_image ?>">
                                                                <?php } ?>
                                                            <?php endif;?>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </a>
                                            </div>
                                            <div class="price-and-location">
                                                <p class="info-price"><span><?php echo $item->month_rent?></span><span>USD</span></p>
                                                <p class="info-address"><span><?php echo vcp_printf($item->name,current_lang_())?></span></p>
                                            </div>
                                        </div>
                                        <p class="des-info-appartment line-clamp-3"><a href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en;?>"><?php echo vcp_printf($item->introduction,current_lang_())?></a></p>
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
