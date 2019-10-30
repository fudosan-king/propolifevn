<?php
$module = $this->uri->segment(1);
?>
<?php if($module != 'news'): ?>
    <?php
    $catid = $this->uri->segment(2);
    $module =  $this->router->fetch_class();
    ?>
    <?php echo modules::run('common/content_search', $catid, $module); ?>
<?php endif; ?>
</div><!--content-result-->
</div><!-- container -->
</div><!-- search-box -->
<div class="content-search-block">
    <div class="container">
        <div class="row">
            <div class="breadcums">
                <span>トップページ / 検索 / <a href="<?=create_url().'' ?>" methods="get">結果</a></span>
            </div>
        </div>
        <div class="row">
            <div class="condition_content pull-left">
                <span class="text">検索条件 : </span>
                <span class="text-box">
                <?php
                if ($this->input->get('cboAreaName')==''){
                    echo '１区';
                }else{
                    echo $this->input->get('cboAreaName');
                }
                ?>
                </span>
                <span class="text-box">
                <?php
                if ($this->input->get('cboLayOut')==''){
                    echo 'サービスアパート ';
                }else {
                    echo $this->input->get('cboLayOut');
                }
                ?>
                </span>
                <span class="text-box">
                <?php
                if($this->input->get('cboType')==''){
                    echo '2LDK(2ベットルーム)';
                }else{
                    echo $this->input->get('cboType');
                }?>
            </span>
                <span class="text-box">
                <?php
                if($this->input->get('cboSize')==''){
                    echo '500USD以下';
                }else{
                    echo $this->input->get('cboSize');
                }?>
            </span>
                <span class="text-box">
                <?php
                if ($this->input->get('cboRent')==''){
                    echo '50m2以下';
                }else{
                    echo $this->input->get('cboRent');
                }?>
            </div>
            <!-- <div class="count_content pull-right">該当物件数<br> <strong>12</strong> 件</div> -->
        </div>
        <div class="row">
            
            <div class="paging pull-right">
                <p><?php echo $paging->create_links(); ?></p>
            </div>
        </div>
        <div class="pagin-wap pagin-top">
            <div class="pagination-bottom">
            </div>
        </div>
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
        <div class="row">
            <div class="product-block">
                <div class="product-item">
                    <div class="wrap-img-product">
                        <div class="img-product-item owl-carousel pull-left">
                            <div <?=$lastChild?>>
                                <?php
                                $thumb = PATH_URL . 'static/images/items/' . $item->images_thumb;
                                if(!@file_get_contents($thumb)) {
                                    $thumb = PATH_URL . 'static/images/no-thumb.jpg';
                                }
                                ?>
                                <a href="<?=create_url() .$table. "/detail/" . $item->id . '/' . $item->name_en;?>">
                                    <img src="<?=$thumb?>" width="172px" />
                                </a>
                            </div>
                            <div>
                                <?php
                                $thumb = PATH_URL . 'static/images/items/' . $item->images_thumb;
                                if(!@file_get_contents($thumb)) {
                                    $thumb = PATH_URL . 'static/images/no-thumb.jpg';
                                }
                                ?>
                                <a href="<?=create_url() .$table. "/detail/" . $item->id . '/' . $item->name_en;?>">
                                    <img src="<?=$thumb?>" width="172px" />
                                </a>
                            </div>
                        </div>
                        <div class="price_area">
                            <p class="price"><span>
                                    <?php
                                    if($table == 'offices')
                                        { echo $item->month_rent ;
                                        }else{
                                          echo $item->rent;
                                    } ?>
                                </span> USD</p>
                            <p class="local"><?= vcp_printf($item->area_name, current_lang_())?></p>
                        </div>
                    </div>
                    <div class="product-detail-right pull-right">
                        <div class="detail-product-item">
                            <a class="name-product-item" href="<?=create_url() .$table. "/detail/" . $item->id . '/' . $item->name_en;?>"><?php echo vcp_printf($item->name_en, current_lang_())?><br><?php echo vcp_printf($item->name_jp, current_lang_())?></a>
                            <div class="detail-product-left">
                                <ul>
                                    <li><?php
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
                                    </li>
                                    <li>
                                        <?php echo $item->size;?>m
                                        <sup>2</sup>
                                    </li>
                                    <li>
                                        <?php if ($table=='houses') {
                                            if ($itemLayouts) {
                                                ;
                                                foreach ($itemLayouts as $key => $layout) {
                                                    $select = '';
                                                    if ($layout->id == $item->house_layout_id) {
                                                        echo vcp_printf($layout->name, current_lang_());
                                                    }
                                                }
                                            }
                                            if (!isset($item->house_layout_id)) {
                                                echo lang('間取り');
                                            }
                                        }?>
                                    </li>

                                    <li>1バスルーム</li>
                                    <li><?php echo vcp_printf($item->name_en, current_lang_())?></li>
                                </ul>
                            </div>
                            <div class="detail-product-right">
                                <div class="list-condition">
                                     <div class="title-condition-utilities">家賃に含む<br>サービス等</div>
                                    <div class="list-condition-item">
                                        <div class="condition-item bg-">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-1.png">
                                        </div>
                                        <div class="condition-item bg-">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-2.png">
                                        </div>
                                        <div class="condition-item bg-blue">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-3.png">
                                        </div>
                                        <?php if (isset($item->pet)){?>
                                            <div class="condition-item bg-blue">
                                                <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-4.png">
                                            </div>
                                        <?php }?>
                                        <div class="condition-item bg-blue">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-5.png">
                                        </div>
                                        <?php if (isset($item->consumables_replenishment)){?>
                                            <div class="condition-item bg-gray">
                                                <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-6.png">
                                            </div>
                                        <?php }?>
                                        <?php if (isset($item->phone_bill)){?>
                                            <div class="condition-item bg-gray">
                                                <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-7.png">
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="list-utilities">
                                    <div class="title-condition-utilities">
                                        設備
                                    </div>
                                    <div class="list-utilities-item">
                                    <?php if (isset($item->other_notice)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-8.png">
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->water_bill)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-9.png">
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->drink_water_bill)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-10.png">
                                        </div>
                                    <?php }?>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-11.png">
                                    </div>
                                    <?php if (isset($item->cleaning)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-12.png">
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->electric_bill)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-13.png">
                                        </div>
                                    <?php }?>
                                                                    <?php if (isset($item->closing_time)){?>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-14.png">
                                    </div>
                                                                    <?php }?>
                                                                    <?php if (isset($item->security)){?>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-15.png">
                                    </div>
                                                                    <?php }?>
                                    <?php if (isset($item->internet)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-16.png">
                                        </div>
                                    <?php }?>
                                    <?php if (isset($item->laundry_service)){?>
                                        <div class="utilities-item bg-orage">
                                            <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon-search-17.png">
                                        </div>
                                    <?php }?>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon_facility_elevator.png">
                                    </div>
                                    <!--                                --><?php //}?>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon_facility_guard.png">
                                    </div>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon_facility_parking.png">
                                    </div>
                                    <!--                                --><?php //}?>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon_facility_pool.png">
                                    </div>
                                    <!--                                --><?php //}?>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon_facility_power.png">
                                    </div>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon_facility_shop_restaurant.png">
                                    </div>
                                    <div class="utilities-item bg-orage">
                                        <img src="<?= PATH_URL ?>static/images/facility_equipment_icon/icon_facility_tennis.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="product-description">
                            <?php echo vcp_printf($item->introduction, current_lang_())?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <div class="paging pull-right">
                    <p><span></span> <a class="active" <?php echo $paging->create_links(); ?>></p>
                </div>
            </div>
        </div>
<script>
    $(document).ready(function() {
        $(".select_order").change(function () {
            var valselect = $('.select_order').val();
            document.getElementById('txtSort').value = valselect;
            $("#myform").submit();
        });
    });
</script>
