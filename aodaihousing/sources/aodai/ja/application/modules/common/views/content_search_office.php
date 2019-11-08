<?php
$catid = $this->uri->segment(2);
$module = 'common';
if($module != 'news') {
    echo modules::run('search',$catid, $module);
}
?>
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
                <?php }?>
                <?php
                if($module == 'common'){
                    $Size = $this->input->get('size');
                }else{
                    $Size = $this->input->get('cboSize');
                }
                if($Size!=''){?>
                    <span class="text-box">
                <?php
                echo $Size; echo 'm²'?>
                </span>
                <?php }?>
                <?php
                if($module=='common'){
                    $Size_Rent = $this->input->get('size_rent');
                }else{
                    $Size_Rent = $this->input->get('cboSizeRentSelect');
                }
                if($Size_Rent!=''){?>
                    <span class="text-box">
                <?php
                echo $Size_Rent; echo 'USD/㎡以下'?>
                </span>
                <?php }?>
                <?php
                $data_option_chairSelect = array(
                    '5'     => lang('〜５席'),
                    '6-10'  => lang('６〜１０席'),
                    '11-15' => ('１１〜１５ 席'),
                    '16-25' => lang('１６〜２５席'),
                    '26-40' => lang('２６〜４０席'),
                    '40'    => lang('４０席以上')
                );
                if($this->input->get('cboChairSelect')!=''){?>
                    <span class="text-box">
                <?php  foreach ($data_option_chairSelect as $key=> $seat){
                    if($key == $this->input->get('cboChairSelect')){
                        echo $seat;
                    }
                }
                ?>
                </span>
                <?php }?>
                <?php
                if($module == 'common'){
                    $Rent = $this->input->get('month_rent');
                }else{
                    $Rent = $this->input->get('cboRent');
                }
                if ($Rent!=''){?>
                    <span class="text-box">
                 <?php   echo $Rent;?>
                </span>
                <?php }?>
                <?php if($this->input->get('lblMax')!=''){?>
                    <span class="text-box">
                    <?php echo ($this->input->get('lblMin')); echo ('-'); echo ($this->input->get('lblMax')); echo 'USD'?>
                </span>
                <?php }?>
            </div>
            <!-- <div class="count_content pull-right"><br> <strong><?php echo $count?></strong> 件</div> -->
        </div>
        <div class="row">

            <div class="paging pull-right">
                <?php if($count > 10){?>
                    <p><?php echo $paging->create_links(); ?></p>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="product-block">
                <?php if(isset($info)): ?>
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
                                        <?php if(isset($imagesOffice)) {
                                            foreach ($imagesOffice as $img) {
                                                if ($img->office_id == $item->id) {
                                                    ?>
                                                    <div>
                                                        <a href="<?=create_url() . $table . "/detail/" . $item->id .  '/' . vcp_printf($item->name_en,current_lang_()); ?>">
                                                            <img src="<?php echo PATH_URL . 'static/uploads/offices/gallery/' . $img->name_image; ?>"
                                                                 width="359" height="298" alt="" title=""/>
                                                        </a>
                                                    </div>
                                                <?php }
                                            }
                                        }?>
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
                                            <?php echo vcp_printf($item->name_jp, current_lang_())?></a></a>
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
                                                <div class="left-info-item">
                                                    <span class="bold-text">賃料:</span>
                                                    <span class="common-text"><?php echo $item->size_rent?>USD/m²</span>
                                                </div>
                                                <!--    <div class="left-info-item">
                                                <span class="bold-text">席数:</span>
                                                <span class="common-text"><?php
                                                $size = $item->size;
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
                                                echo isset($html_num) ? $html_num : '-';
                                                ?>

                                                </span>
                                            </div> -->
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
                                        <?php if(isset($common_facility_offices)){
                                            foreach ($common_facility_offices as $icon){
                                                if($icon->office_id == $item->id && isset($icon->name_image)){?>
                                                    <div class="utilities-item bg-">
                                                        <img src="<?php echo PATH_URL. 'static/images/facility_equipment_icon/'.$icon->name_image;?>">
                                                    </div>
                                                <?php }
                                            }
                                        }?>
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