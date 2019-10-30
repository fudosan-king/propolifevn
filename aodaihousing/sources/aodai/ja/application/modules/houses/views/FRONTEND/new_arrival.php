<?php
    $catid = $this->uri->segment(2);
    $module = $this->uri->segment(1);
    if($module != 'news') {
        echo modules::run('search',$catid, $module);
    }
?>
<!-- content-search -->
<div class="content-search-block">
    <div class="container">
        <?php
        if($breadcums == 1 ){
            $breadcums_first = '最新賃貸物件';
        }
        if($breadcums == 2 ){
            $breadcums_first = '2区アパートメント特集';
        }
        if($breadcums == 3 ){
            $breadcums_first = 'ホーチミン 3区 サービスアパート特集';
        }
        if($breadcums == 7 ){
            $breadcums_first = 'フーミーフン7区アパート';
        }
        if($breadcums == 'under_450_usd' ){
            $breadcums_first = 'ホーチミン単身向け450USD以下アパート特集';
        }
        // File store under folder application/views/FRONTEND/breadcums.php
        echo $this->load->view('FRONTEND/breadcums', array(
            'breadcums_first' => $breadcums_first,
        ));
        ?>
        <div class="row">
            <div class="condition_content pull-left">
                <span class="text">検索条件 : </span>
                <?php
                $data_option = array(
                    0 => lang('サービスアパートメント'),
                    1 => lang('アパートメント'),
                    2 => lang('戸建')
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="order_condition pull-left">
                <div class="order_condition pull-left">
                    <div class="select_order_area">
                    <form method="post" id="formNewArrival" action="">
                        <span>並び替え：</span>
                        <select data-toggle="dropdown" class="select_order" name="lblSort">
                            <ul class="dropdown-menu">
                                <option value="desc" <?php if($sort =='desc'){echo 'selected'; }?>><a><?php echo lang('登録日: 新しい順')?></a></option>
                                <option value="asc" <?php if($sort =='asc'){echo 'selected'; }?>><a><?php echo lang('登録日：昇順')?></a></option>
                            </ul>
                        </select>
                    </form>
                    </div>
                </div>
            </div>
            <div class="paging pull-right">
                <?php if($count > 7) {?>
                    <p><?php echo $paging->create_links(); ?></p>
                <?php }?>
            </div>
        </div>
        <div class="pagin-wap pagin-top">
            <div class="pagination-bottom">
            </div>
        </div>
        <div class="row">
            <div class="product-block">
                <?php if($items): ?>
                <?php foreach($items as $key=>$item):
                ?>
                <?php
                $lastChild = '';
                if($key == count($items) - 1)
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
                                                <a href="<?php echo PATH_URL . "houses/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()).'/'.$breadcums; ?>">
                                                    <img src="<?php echo PATH_URL . 'static/uploads/houses/gallery/' . $img->name_image; ?>"
                                                         width="359" height="298" alt="" title=""/>
                                                </a>
                                            </div>
                                        <?php }
                                    }
                                }?>
                            </div>
                            <div class="price_area">
                                <p class="price"><span>
                                        <?php
                                        echo $item->rent;
                                        ?>
                                    </span>
                                    <span>
                                         USD
                                    </span></p>
                                <p class="local"><?= vcp_printf($item->area_name, current_lang_())?></p>
                            </div>
                        </div>
                        <div class="product-detail-right pull-right">
                            <div class="detail-product-item">
                                <a class="name-product-item" href="<?=PATH_URL ."houses/detail/" . $item->id . '/' .vcp_printf($item->name_en,current_lang_()).'/'.$breadcums;?>">
                                    <?php echo vcp_printf($item->name_en, current_lang_())?><br>
                                    <?php echo vcp_printf($item->name_jp, current_lang_())?></a>
                                <div class="detail-product-left">
                                    <div class="left-info-item">
                                        <span class="bold-text">エリア:</span>
                                        <span class="common-text"><?php echo vcp_printf($item->name_en, current_lang_())?></span>
                                    </div>
                                    <div class="left-info-item">
                                        <span class="bold-text">賃料:</span>
                                        <span class="common-text"><?php echo $item->rent;?> USD</span>
                                    </div>
                                    <div class="left-info-item">
                                    <span class="bold-text">住居タイプ:</span>
                                    <span class="common-text">
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
                                        }
                                        if (!isset($item->type)){
                                            echo 'サービスアパート';
                                        }
                                        ?>
                                    </span>
                                    </div>
                                    <div class="left-info-item">
                                    <span class="bold-text">間取り:</span>
                                    <span class ="common-text">
                                        <?php
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
                    </div><!-- detail-product-right -->
                </div><!-- product-item list-search-product-item -->
                <?php endforeach; ?>
                <?php endif; ?>
            </div><!-- product-block -->
        </div>
        <div class="row paging-after">
            <div class="paging pull-right">
               <?php if($count > 7) {?>
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
            $("#formNewArrival").submit();
        });
    });
</script>
