<!-- search-box -->
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
    <!-- content-search -->
    <div class="content-search-block">
        <div class="container">
            <?php
                // File store under folder application/views/FRONTEND/breadcums.php
                echo $this->load->view('FRONTEND/breadcums', array(
                    'breadcums_first' => '検索結果'
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

                    <!-- cboLayOut -->
                    <?php
                        $data_option = array(
                            0 => lang('サービスアパートメント'),
                            1 => lang('アパートメント'),
                            2 => lang('戸建')
                        );
                        $layout = $this->input->get('cboLayOut');
                    ?>
                    <?php if ($layout !='' && is_numeric($layout)): ?>
                        <span class="text-box">
                            <?php
                                foreach ($data_option as $key => $item) {
                                    if ($key == $layout) {
                                        echo $item;
                                    }
                                }
                            ?>
                        </span>
                    <?php endif; ?>

                    <!-- cboType -->
                    <?php $typeLayOut=$this->input->get('cboType'); ?>
                    <?php if ($typeLayOut!='' && is_numeric($typeLayOut)): ?>
                        <span class="text-box">
                            <?php
                                foreach ($itemLayouts as $key=> $item){
                                    if ($item->id == $typeLayOut){
                                        echo vcp_printf($item->name,current_lang_());
                                    }
                                }
                            ?>
                        </span>
                    <?php endif; ?>
                   
                    <!-- cboSize -->
                    <?php if($this->input->get('cboSize')!=''): ?>
                        <span class="text-box">
                            <?php echo $this->input->get('cboSize'); echo 'm²'?>
                        </span>
                    <?php endif;?>
                    
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

                    <!-- cboCondo -->
                    <?php $condo = $this->input->get('cboCondo'); ?>
                    <?php if($condo != '' && is_numeric($condo)): ?>
                        <?php
                            foreach ($itemBuildingCondo as $key =>$buildingCondo) {
                                if($buildingCondo->id == $condo) {
                                    echo '<span class="text-box">';
                                        echo vcp_printf($buildingCondo->name,current_lang_());
                                    echo '</span>';
                                }
                            }
                        ?>
                    <?php endif; ?>

                    <!-- cboService_aprtment -->
                    <?php $sevice_aprtment = $this->input->get('cboService_aprtment'); ?>
                    <?php if($sevice_aprtment != '' && is_numeric($sevice_aprtment)): ?>
                            <?php
                                foreach ($itemBuildingService_aprtment as $key =>$buildingService){
                                    if ($buildingService->id == $sevice_aprtment) {
                                        echo '<span class="text-box">';
                                            echo vcp_printf($buildingService->name,current_lang_());
                                        echo '</span>';
                                    }
                                }
                            ?>
                        </span>
                    <?php endif; ?>
                </div>
               <!--  <div class="count_content pull-right"><br> <strong><?php echo $count?></strong> 件</div> -->
            </div>
            
            <div class="row">
                <div class="paging pull-right">
                    <?php if($count >6){?>
                    <p><?php echo $paging->create_links(); ?></p>
                    <?php }?>
                </div>
            </div>
            
            <div class="pagin-wap pagin-top">
                <div class="pagination-bottom"></div>
            </div>

            <?php if ($building_info): ?>
                <div class="">
                    <div class="product-features clearFix">
                        <div class="product-features-left pull-left">
                            <a>
                                <?php echo vcp_printf($building_info->name, current_lang_());?>
                            </a>
                            <p>
                                <?php echo nl2br($building_info->description);?>
                            </p>
                        </div>
                        
                        <div class="product-features-right pull-right">
                            <img src="<?php echo PATH_URL . 'static/uploads/category/' . $building_info->image ?>">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="product-block">
                    <?php if($info): ?>
                        <?php foreach($info as $key=>$item): ?>
                            <div class="product-item list-search-product-item">
                                <div class="clearfix">
                                    <div class="wrap-img-product">
                                        <div class="img-product-item owl-carousel pull-left">
                                            <?php if ($item->list_house_images != ''): ?>
                                                <?php $list_house_images = explode(',', $item->list_house_images); ?>
                                                <?php foreach ($list_house_images as $item_list_house_images): ?>
                                                    <?php
                                                    $images = 'static/uploads/houses/gallery/' . $item_list_house_images;
                                                    $thumb_images = 'static/uploads/houses/gallery/thumb_' . $item_list_house_images;
                                                    if(file_exists($thumb_images) && is_file($thumb_images)){
                                                        $images_list = $thumb_images;
                                                    }else{
                                                        $images_list = $images;
                                                    }?>
                                                    <div>
                                                        <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>">
                                                            <img src="<?=PATH_URL.'static/images/img_defer_search.png'?>" data-src="<?php echo PATH_URL . $images_list?>"
                                                                 width="359" height="298" alt="" title=""/>
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <?php
                                                $images = 'static/uploads/houses/' . $item->images_thumb;
                                                $thumb_images = 'static/uploads/houses/thumb_' . $item->images_thumb;
                                                if(file_exists($thumb_images) && is_file($thumb_images)){
                                                    $images_list = $thumb_images;
                                                }else{
                                                    $images_list = $images;
                                                }?>
                                                <div>
                                                    <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>">
                                                        <img src="<?=PATH_URL.'static/images/img_defer_search.png'?>" data-src="<?php echo PATH_URL . $images_list ?>"
                                                             width="359" height="298" alt="" title=""/>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="price_area">
                                            <p class="price">
                                                <span>
                                                    <?php
                                                    if($table == 'offices')
                                                    { echo $item->month_rent ;
                                                    }else{
                                                        echo $item->rent;
                                                    } ?>
                                                </span> 
                                                <span>USD</span>
                                            </p>
                                            <p class="local">
                                                <?= vcp_printf($item->area_name, current_lang_())?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="product-detail-right pull-right">
                                        <div class="detail-product-item">
                                            <a class="name-product-item" href="<?=create_url() .$table. "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_());?>">
                                                <?php echo vcp_printf($item->name_en, current_lang_())?><br>
                                                <?php echo vcp_printf($item->name_jp, current_lang_())?>
                                            </a>
                                            <div class="detail-product-left">
                                               <div class="left-info-item">
                                                    <span class="bold-text">エリア:</span>
                                                    <span class="common-text"><?= vcp_printf($item->area_name, current_lang_())?></span>
                                                </div>
                                                
                                                <div class="left-info-item">
                                                    <span class="bold-text">賃料:</span>
                                                    <span class="common-text">
                                                    <span>
                                                        <?php echo $item->rent;?> USD
                                                    </span>
                                                </div>
                                                
                                                <div class="left-info-item">
                                                    <span class="bold-text">種類:</span>
                                                    <span class="common-text">
                                                        <?php
                                                            $data_option = array(
                                                                0 => lang('サービスアパートメント'),
                                                                1 => lang('アパートメント'),
                                                                2 => lang('戸建')
                                                            );
                                                            
                                                            foreach ($data_option as $keydata =>$option){
                                                                if ($keydata == $item->type) {
                                                                    echo $option;
                                                                }
                                                            }
                                                            
                                                            if (!isset($item->type)) {
                                                                echo 'サービスアパート';
                                                            }
                                                        ?>
                                                    </span>
                                                </div>
                                                
                                                <div class="left-info-item">
                                                    <span class="bold-text">間取り:</span>
                                                    <span class="common-text">
                                                        <?php
                                                            if ($table=='houses') {
                                                                if ($itemLayouts) {
                                                                    foreach ($itemLayouts as $key => $layout) {
                                                                        $select = '';
                                                                        if ($layout->id == $item->house_layout_id) {
                                                                            echo nl2br(vcp_printf($layout->name, current_lang_()));
                                                                        }
                                                                    }
                                                                }
                                                                
                                                                if (!isset($item->house_layout_id)) {
                                                                    echo lang('間取り');
                                                                }
                                                            }
                                                        ?>
                                                    </span>
                                                </div>
                                                
                                                <div class="left-info-item">
                                                    <span class="bold-text">面積:</span>
                                                    <span class="common-text">
                                                        <?php echo $item->size;?>m
                                                        <sup>2</sup>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="product-description">
                                            <?php echo nl2br(vcp_printf($item->introduction, current_lang_()));?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="detail-product-right">
                                    <div class="list-condition clearfix">
                                        <div class="title-condition-utilities pull-left">家賃に含む<br>サービス等</div>
                                        <div class="list-condition-item pull-left">
                                            <?php if ($item->list_equipment_images != ''): ?>
                                                <?php $list_equipment_images = explode(',', $item->list_equipment_images); ?>
                                                <?php foreach($list_equipment_images as $item_list_equipment_images): ?>
                                                    <div class="condition-item bg-">
                                                        <img src="<?php echo PATH_URL. 'static/images/facility_equipment_icon/'.$item_list_equipment_images; ?>">
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="list-utilities clearfix">
                                        <div class="title-condition-utilities pull-left">
                                            設備
                                        </div>
                                        <div class="list-utilities-item pull-left">
                                            <?php if ($item->list_common_facilitie_images != ''): ?>
                                                <?php $list_common_facilitie_images = explode(',', $item->list_common_facilitie_images); ?>
                                                <?php foreach($list_common_facilitie_images as $item_list_common_facilitie_images): ?>
                                                    <div class="utilities-item bg-">
                                                        <img src="<?php echo PATH_URL. 'static/images/facility_equipment_icon/'.$item_list_common_facilitie_images; ?>" width="69" height="41" alt="" title="">
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="btn-detail-product">
                                    <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>" class="btn-view-more btn-overlay btn-fixed btn-houses pull-right">もっと見る</a>
                                </div>
                            </div><!-- product-item list-search-product-item -->
                        <?php endforeach; ?>
                    <?php endif; ?>               
                </div><!-- product-block -->
            </div>
            
            <div class="row paging-after">
                <div class="paging pull-right">
                    <?php if($count > 6) {?>
                    <p><?php echo $paging->create_links(); ?></p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
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