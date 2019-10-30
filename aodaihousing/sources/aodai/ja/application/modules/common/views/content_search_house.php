<!-- search-box -->
<?php
$catid = $this->uri->segment(2);
$module = 'common';
if($module != 'news') {
    echo modules::run('search',$catid, $module);
}
?>
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
                <?php $search = $this->input->get('txtSearch');
                if ($search != ''){?>
                    <span class="text-box">
                        <?php echo $search ?>
                    </span>
                <?php }?>
                <?php
                if($module == 'common'){
                    $areaId = $this->input->get('areas');
                }else{
                    $areaId =$this->input->get('cboAreaName');
                }
                if ($areaId!=''){?>
                    <span class="text-box">
                <?php   foreach ($itemAreas as $area){
                    if ($area->id == $areaId){
                        echo vcp_printf($area->name,current_lang_());
                    }
                }
                ?>
                </span>
                <?php } ?>
                <?php
                $data_option = array(
                    0 => lang('サービスアパートメント'),
                    1 => lang('アパートメント'),
                    2 => lang('戸建')
                );
                if($module == 'common'){
                    $layout = $this->input->get('layout');
                }else{
                    $layout = $this->input->get('cboLayOut');
                }
                if ($layout !=''){
                    ?>
                    <span class="text-box">
                <?php
                foreach ($data_option as $key => $item) {
                    if ($key == $layout) {
                        echo $item;
                    }
                }
                ?>
                </span>
                <?php }
                ?>
                <?php
                if($module == 'common'){
                    $typeLayOut = $this->input->get('type');
                }else{
                    $typeLayOut=$this->input->get('cboType');
                }
                if ($typeLayOut!=''){?>
                    <span class="text-box">
                    <?php
                    foreach ($itemLayouts as $key=> $item){
                        if ($item->id == $typeLayOut){
                            echo vcp_printf($item->name,current_lang_());
                        }
                    }?>
                </span>
                <?php }?>
                <?php
                if($module == 'common'){
                    $Size = $this->input->get('size');
                }else{
                    $Size = $this->input->get('cboSize');
                }
                if($Size !=''){?>
                    <span class="text-box">
                <?php    echo $Size;echo 'm²';
                ?>
                </span>
                <?php }?>
                <?php
                if($module == 'common'){
                    $Rent = $this->input->get('rent');
                }else{
                    $Rent = $this->input->get('cboRent');
                }
                if ($Rent!=''){?>
                    <span class="text-box">
                 <?php   echo $Rent; ?>
                </span>
                <?php }?>
                <?php if($this->input->get('lblMax')!=''){?>
                    <span class="text-box">
                    <?php echo ($this->input->get('lblMin')); echo ('-'); echo ($this->input->get('lblMax')); echo 'USD'?>
                </span>
                <?php }?>
                <?php $condo = $this->input->get('cboCondo');
                if($condo != ''){?>
                    <span class="text-box">
                    <?php foreach ($itemBuildingCondo as $key =>$buildingCondo){
                        if($buildingCondo->id == $condo){
                            echo vcp_printf($buildingCondo->name,current_lang_());
                        }
                    }?>
                </span>
                <?php }?>
                <?php $sevice_aprtment = $this->input->get('cboService_aprtment');
                if($sevice_aprtment != ''){?>
                    <span class="text-box">
                    <?php foreach ($itemBuildingService_aprtment as $key =>$buildingService){
                        if($buildingService->id == $sevice_aprtment){
                            echo vcp_printf($buildingService->name,current_lang_());
                        }
                    }?>
                </span>
                <?php }?>
            </div>
            <!-- <div class="count_content pull-right"><br> <strong><?php echo $count?></strong> 件</div> -->
        </div>
        <div class="row">

            <div class="paging pull-right">
                <?php if($count >10){?>
                    <p><?php echo $paging->create_links(); ?></p>
                <?php }?>
            </div>
        </div>
        <div class="pagin-wap pagin-top">
            <div class="pagination-bottom">
            </div>
        </div>

        <?php if ($building_info): ?>
            <div class="row">
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
                    <?php foreach($info as $key=>$item):
                        ?>
                        <?php
                        $lastChild = '';
                        if($key == count($info) - 1)
                        {
                            $lastChild = "last-child";
                        }
                        ?>
                        <div class="product-item list-search-product-item">
                            <div class="clearfix">
                                <div class="wrap-img-product">
                                    <div class="img-product-item owl-carousel pull-left">
                                        <?php if($imagesHouse) {
                                            foreach ($imagesHouse as $img) {
                                                if ($img->house_id == $item->id) {
                                                    ?>
                                                    <div>
                                                        <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>">
                                                            <img src="<?php echo PATH_URL . 'static/uploads/houses/gallery/' . $img->name_image; ?>"
                                                                 width="359" height="298" alt="" title=""/>
                                                        </a>
                                                    </div>
                                                <?php }
                                            }
                                        }?>
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
                                                <span class="bold-text">サービスアパート/コンドミニアム:</span>
                                                <span class="common-text"><?php
                                                    $data_option = array(
                                                        0 => lang('サービスアパートメント'),
                                                        1 => lang('アパートメント'),
                                                        2 => lang('戸建')
                                                    );
                                                    foreach($data_option as $keydata =>$option){
                                                        if($keydata == $item->type){
                                                            echo $option;
                                                        }
                                                    }
                                                    if (!isset($item->type)){
                                                        echo 'サービスアパート';
                                                    }
                                                    ?>
                                        </span>
                                            </div>
                                            <div class="left-info-item">
                                                <span class="bold-text">間取り:</span>
                                                <span class="common-text">
                                            <?php if ($table=='houses') {
                                                if ($itemLayouts) {
                                                    ;
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
                                            }?>
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
                                        <?php if($equipment_houses){
                                            foreach ($equipment_houses as $icon){
                                                if($icon->house_id == $item->id && $icon->name_image){?>
                                                    <div class="condition-item bg-">
                                                        <img src="<?php echo PATH_URL. 'static/images/facility_equipment_icon/'.$icon->name_image; ?>">
                                                    </div>
                                                <?php }
                                            }
                                        }?>
                                    </div>
                                </div>
                                <div class="list-utilities clearfix">
                                    <div class="title-condition-utilities pull-left">
                                        設備
                                    </div>
                                    <div class="list-utilities-item pull-left">
                                        <?php if($common_facility_houses){
                                            foreach ($common_facility_houses as $icon){
                                                if($icon->house_id == $item->id){?>
                                                    <div class="utilities-item bg-">
                                                        <img src="<?php echo PATH_URL. 'static/images/facility_equipment_icon/'.$icon->name_image; ?>">
                                                    </div>
                                                <?php }
                                            }
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- product-item list-search-product-item -->
                    <?php endforeach; ?>
                <?php endif; ?>
            </div><!-- product-block -->
        </div>
        <div class="row paging-after">
            <div class="paging pull-right">
                <?php if($count > 10) {?>
                    <p><?php echo $paging->create_links(); ?></p>
                <?php }?>
            </div>
        </div>
    </div>
</div><!-- content-search-block -->
<script>
    $(document).ready(function() {
        $(".select_order").change(function () {
            var valselect = $('.select_order').val();
            document.getElementById('txtSort').value = valselect;
            $("#myform").submit();
        });
    });
</script>