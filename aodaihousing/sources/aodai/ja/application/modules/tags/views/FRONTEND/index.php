<!-- content-search -->
<div class="wrapper-content-block vn-visa-block">
    <div class="container">
        <div class="tag-block">
            <div class="">
                <h4 class="red-heading-title"><?php echo $tagName; ?></h4>
            </div>
            <div class="bt-solid"></div>
<!--            <div class="row">-->
                <div class="paging pull-right">
                    <?php if($count > 10) {?>
                        <p><?php echo $paging->create_links(); ?></p>
                    <?php }?>
                </div>
<!--            </div><!-- .row -->

            <?php if (!$items): ?>
                <div class="row">
                    <?php echo lang('検索条件に該当する物件が見つかりませんでした。'); ?>
                </div>
            <?php else: ?>
            <div class="row">
                <div class="product-block">
                    <?php foreach ($items as $key => $item): ?>
                        <?php
                            if ($item->tags_db_type == 1) {
                                // Information of offices
                                $table                    = 'offices';
                                $house_office_id          = $item->office_id;
                                $rent                     = $item->office_month_rent;
                                $name_en                  = $item->office_name_en;
                                $name_jp                  = $item->office_name_jp;
                                $size                     = $item->office_size;
                                $introduction             = $item->office_introduction;
                            } else {
                                // Information of houses
                                $table                    = 'houses';
                                $house_office_id          = $item->house_id;
                                $rent                     = $item->house_rent;
                                $name_en                  = $item->house_name_en;
                                $name_jp                  = $item->house_name_jp;
                                $size                     = $item->house_size;
                                $introduction             = $item->house_introduction;
                            }
                            
                            $href_detail                  = create_url() . $table . '/detail/' . $house_office_id . '/' . $name_en;
                            $path_house_office_image      = PATH_URL . 'static/uploads/' . $table . '/gallery/';
                            $path_facility_equipment_icon = PATH_URL. 'static/images/facility_equipment_icon/';
                        ?>
                        <div class="product-item list-search-product-item">
                            <div class="clearfix">
                                <div class="wrap-img-product">
                                    <div class="img-product-item owl-carousel pull-left">
                                        <?php $v = 0;?>
                                        <?php if($item->images_house_office): ?>
                                            <?php foreach ($item->images_house_office as $img):
                                                $v = $v + 1;
                                                ?>
                                                <?php if ($img->name_image): ?>
                                                    <div>
                                                        <a href="<?php echo $href_detail; ?>">
                                                            <img src="<?php echo $path_house_office_image . $img->name_image; ?>" width="359" height="298" alt="" title=""/>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php if(($v == 0) && isset($item->house_images_thumb)){ ?>
                                            <div>
                                                <a href="<?php echo $href_detail; ?>">
                                                    <img src="<?php echo PATH_URL .'static/uploads/'.$table.'/'.$item->house_images_thumb ?>" width="359" height="298" alt="" title=""/>
                                                </a>
                                            </div>
                                       <?php }?>
                                    </div><!-- .img-product-item owl-carousel pull-left -->

                                    <div class="price_area">
                                        <p class="price">
                                            <span><?php echo $rent; ?></span> 
                                            <span>USD</span>
                                        </p>
                                        
                                        <p class="local">
                                            <?php echo vcp_printf($item->area_house_office->name, current_lang_()); ?>
                                        </p>
                                    </div><!-- .price_area -->
                                </div><!-- .wrap-img-product -->
                                <div class="product-detail-right pull-right">
                                    <div class="detail-product-item">
                                        <a class="name-product-item" href="<?php echo $href_detail; ?>">
                                            <?php echo vcp_printf($name_en, current_lang_()); ?><br>
                                            <?php echo vcp_printf($name_jp, current_lang_()); ?>
                                        </a>
                                       
                                        <div class="detail-product-left">
                                            <div class="left-info-item">
                                                <span class="bold-text">エリア:</span>
                                                <span class="common-text"><?php echo vcp_printf($item->area_house_office->name, current_lang_())?></span>
                                            </div>
                                            <div class="left-info-item">
                                                <span class="bold-text">賃料:</span>
                                                <span class="common-text"><?php echo $rent;?>  USD</span>
                                            </div>
                                                <?php if ($table == 'houses'): ?>
                                            <div class="left-info-item">
                                                    <span class="bold-text">住居タイプ:</span>
                                                    <span class="common-text">
                                                        <?php
                                                            $data_option = array(
                                                                0 => lang('サービスアパートメント'),
                                                                1 => lang('アパートメント'),
                                                                2 => lang('戸建')
                                                            );
                                                            echo isset($data_option[$item->house_type]) ? $data_option[$item->house_type] : 'サービスアパート';
                                                        ?>
                                                    </span>
                                            </div>
                                                <?php endif; ?>
                                                <?php if ($table == 'houses'): ?>
                                            <div class="left-info-item">
                                                <span class="bold-text">間取り:</span>
                                                <span class="common-text">
                                                    <?php
                                                        if (!isset($item->house_layout_id)) {
                                                            echo lang('間取り');
                                                        } else {
                                                            if ($itemLayouts) {
                                                                foreach ($itemLayouts as $key => $layout) {
                                                                    $select = '';
                                                                    if ($layout->id == $item->house_layout_id) {
                                                                        echo vcp_printf($layout->name, current_lang_());
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                                <?php endif; ?>
                                            <div class="left-info-item">
                                                <span class="bold-text">面積:</span>
                                                <span class="common-text">
                                                    <?php echo $size;?>m
                                                    <sup>2</sup>
                                                </span>
                                            </div>
                                        </div><!-- .detail-product-left -->
                                    </div>
                                    <div class="product-description">
                                        <?php echo nl2br(vcp_printf($introduction, current_lang_())); ?>
                                    </div><!-- .product-description -->
                                </div>
                            </div>
                            
                            <div class="detail-product-right">
                                <div class="list-condition clearfix">
                                    <div class="title-condition-utilities pull-left">家賃に含む<br>サービス等</div>
                                    <div class="list-condition-item pull-left">
                                        <?php if($item->equipment_house_office): ?>
                                            <?php foreach ($item->equipment_house_office as $icon): ?>
                                                <?php if ($icon->name_image): ?>
                                                    <div class="condition-item bg-">
                                                        <img src="<?php echo $path_facility_equipment_icon . $icon->name_image; ?>">
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div><!-- .list-condition-item -->
                                </div><!-- .list-condition -->

                                <div class="list-utilities clearfix">
                                    <div class="title-condition-utilities pull-left">
                                    設備
                                    </div>
                                    <div class="list-utilities-item pull-left">
                                    <?php if($item->common_facility_house_office): ?>
                                        <?php foreach ($item->common_facility_house_office as $icon): ?>
                                            <?php if ($icon->name_image): ?>
                                                <div class="utilities-item bg-">
                                                    <img src="<?php echo $path_facility_equipment_icon . $icon->name_image; ?>">
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </div>
                                </div><!-- .list-utilities -->
                            </div><!-- .detail-product-right -->
                        </div><!-- product-item list-search-product-item -->
                    <?php endforeach; ?>
             <?php endif;?>
                </div><!-- product-block -->
            </div>
            <div class="paging pull-right">
                <?php if($count > 10) {?>
                    <p><?php echo $paging->create_links(); ?></p>
                <?php }?>
            </div>
        </div>
    </div><!-- .container -->
</div><!-- .content-search-block -->