<?php
    $catid = $this->uri->segment(2);
    $module = $this->uri->segment(1);
    if($module != 'news') {
        echo modules::run('search',$catid, $module);
    }
?>
<style>
    .list-search-product-item {
        display: none;
    }

    .list-search-product-item.enable {
        display: table;
    }

    @media screen and (max-width: 1024px){
        .product-item{display: none;}
        .list-search-product-item.enable{display: block;}
    }
</style>
<div class="content-search-block common-rows" id='scroll-buidling'>
    <div class="content-search-block">
        <div class="container">
            <?php
                // File store under folder application/views/FRONTEND/breadcums.php
                echo $this->load->view('FRONTEND/breadcums', array(
                    'breadcums_first' => '検索',
                    'breadcums_second'=> '結果'
                ));
            ?>
            <div class="row">
                <div class="condition_content pull-left">
                    <span class="text">検索条件 : </span>

                    <!-- txtSearch -->
                    <?php $search = $this->input->get('txtSearch'); ?>
                    <?php if ($search != ''): ?>
                        <span class="text-box">
                            <?php echo $search ?>
                        </span>
                    <?php endif; ?>

                    <!-- cboAreaName -->
                    <?php $areaId = $this->input->get('cboAreaName'); ?>
                    <?php if ($areaId != '' && is_numeric($areaId)): ?>
                        <span class="text-box">
                            <?php foreach ($itemAreas as $area): ?>
                                <?php if ($area->id == $areaId): ?>
                                    <?php echo vcp_printf($area->name,current_lang_()); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </span>
                    <?php endif; ?>

                    <!-- cboSize -->
                    <?php if($this->input->get('cboSize')!=''): ?>
                        <span class="text-box">
                            <?php echo $this->input->get('cboSize'); echo 'm²'?>
                        </span>
                    <?php endif;?>

                    <!-- cboSizeRentSelect -->
                    <?php if($this->input->get('cboSizeRentSelect')!=''): ?>
                        <span class="text-box">
                            <?php echo $this->input->get('cboSizeRentSelect'); echo 'USD/㎡以下'?>
                        </span>
                    <?php endif; ?>

                    <!-- cboChairSelect -->
                    <?php
                        $data_option_chairSelect = array(
                            '5'     => lang('〜５席'),
                            '6-10'  => lang('６〜１０席'),
                            '11-15' => ('１１〜１５ 席'),
                            '16-25' => lang('１６〜２５席'),
                            '26-40' => lang('２６〜４０席'),
                            '40'    => lang('４０席以上')
                        );
                    ?>
                    <?php if($this->input->get('cboChairSelect')!='' && is_numeric($this->input->get('cboChairSelect'))): ?>
                        <span class="text-box">
                            <?php foreach ($data_option_chairSelect as $key=> $seat): ?>
                                <?php if($key == $this->input->get('cboChairSelect')): ?>
                                    <?php echo $seat; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </span>
                    <?php endif; ?>

                    <!-- cboRent -->
                    <?php if ($this->input->get('cboRent')!='' && is_numeric($this->input->get('cboRent'))): ?>
                        <span class="text-box">
                            <?php echo $this->input->get('cboRent');?>
                        </span>
                    <?php endif; ?>
                    
                    <!-- lblMin - lblMax -->
                    <?php
                        $labelMin = 0;
                        if($this->input->get('lblMin')!='' && is_numeric($this->input->get('lblMin'))) {
                            $labelMin = $this->input->get('lblMin');
                        }
                        $labelMax = 6000;
                        if($this->input->get('lblMax')!='' && is_numeric($this->input->get('lblMax'))) {
                            $labelMax = $this->input->get('lblMax');
                        }
                        $label_min_max = $labelMin . ' - ' . $labelMax . 'USD';
                    ?>
                    <span class="text-box">
                        <?php echo $label_min_max; ?>
                    </span>
                </div>
                <!-- <div class="count_content pull-right"><br> <strong><?php echo $count?></strong> 件</div> -->
            </div>
           
            <div class="row">
                <div class="paging pull-right">
                    <?php if($count > 6){?>
                    <p><?php echo $paging->create_links(); ?></p>
                    <?php }?>
                </div>
            </div>
            
            <div class="row">
                <div class="product-block">
                    <?php if(isset($info)): ?>
                        <?php foreach($info as $key=>$item): ?>
                            <div class="product-item list-search-product-item">
                                <div class="clearfix">
                                    <div class="wrap-img-product">
                                        <div class="img-product-item owl-carousel pull-left">
                                            <?php if ($item->list_office_images != ''): ?>
                                                <?php $list_office_images = explode(',', $item->list_office_images); ?>
                                                <?php foreach($list_office_images as $item_list_office_images): ?>
                                                    <div>
                                                        <a href="<?=create_url() . $table . "/detail/" . $item->id .  '/' . vcp_printf($item->name_en,current_lang_()); ?>">
                                                            <img src="<?=PATH_URL.'static/images/img_defer_search.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/offices/gallery/' . $item_list_office_images; ?>"
                                                                 width="359" height="298" alt="" title=""/>
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div>
                                                    <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>">
                                                        <img src="<?=PATH_URL.'static/images/img_defer_search.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/offices/' . $item->images_thumb; ?>"
                                                             width="359" height="298" alt="" title=""/>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="price_area">
                                            <p class="price">
                                                <span><?php echo $item->month_rent ;?></span>
                                                <span>USD</span>
                                            </p>
                                            <p class="local"><?= vcp_printf($item->area_name, current_lang_())?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="product-detail-right pull-right">
                                        <div class="detail-product-item">
                                            <a class="name-product-item" href= "<?=create_url() .$table. "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_());?>">
                                                <?php echo vcp_printf($item->name_en, current_lang_())?><br>
                                                <?php echo vcp_printf($item->name_jp, current_lang_())?></a>
                                            <div class="detail-product-left">
                                                <div class="detail-product-left-info-office">
                                                    <div class="left-info-item">
                                                        <span class="bold-text">エリア:</span>
                                                        <span class="common-text"><?php echo vcp_printf($item->area_name, current_lang_())?></span>
                                                    </div>
                                                    
                                                    <div class="left-info-item">
                                                        <span class="bold-text">面積:</span>
                                                        <span class="common-text"><?php echo $item->size?>m²</span>
                                                    </div>

<!--                                                    <div class="left-info-item">-->
<!--                                                        <span class="bold-text">賃料:</span>-->
<!--                                                        <span class="common-text">--><?php //echo $item->month_rent?><!--USD</span>-->
<!--                                                    </div>-->
                                                    
                                                    <div class="left-info-item">
                                                        <span class="bold-text">単価:</span>
                                                        <span class="common-text"><?php echo $item->size_rent?>USD/m²</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="product-description">
                                         <?php echo nl2br(vcp_printf($item->introduction, current_lang_()));?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="detail-product-right">
                                    <div class="list-utilities">
                                        <div class="title-condition-utilities pull-left">
                                            設備
                                        </div>
                                        
                                        <div class="list-utilities-item pull-left">
                                            <?php if ($item->list_common_facilitie_images != ''): ?>
                                                <?php $list_common_facilitie_images = explode(',', $item->list_common_facilitie_images); ?>
                                                <?php foreach($list_common_facilitie_images as $item_list_common_facilitie_images): ?>
                                                    <div class="utilities-item bg-">
                                                        <img src="<?php echo PATH_URL. 'static/images/facility_equipment_icon/'.$item_list_common_facilitie_images; ?>">
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div><!--product-item-->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div><!--product-block-->
            </div>
            
            <div class="row paging-after">
                <div class="paging pull-right">
                    <?php if($count > 6) {?>
                    <p><?php echo $paging->create_links(); ?></p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div><!-- content-search-block -->
</div><!-- content-search-block -->

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
        $(".list-search-product-item").slice(0, 3).addClass("enable");
        $(window).scroll(function(){
            var position = $('.product-block').height();
            if($(this).scrollTop() >= position){
                $(".list-search-product-item:hidden").slice(0, 17).addClass("enable");
            }
        });

        $(".select_order").change(function () {
            var valselect = $('.select_order').val();
            document.getElementById('txtSort').value = valselect;
            $("#myform").submit();
        });
        
        $('html, body').animate({
            scrollTop: $("#scroll-buidling").offset().top
        }, 1000);
    });
</script>