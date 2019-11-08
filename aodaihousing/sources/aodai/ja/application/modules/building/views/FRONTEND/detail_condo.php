<form action="<?php PATH_URL.'building/detail-condo'?>"></form>
<div class="wrapper-content-block">
	<div class="content-search-block">
		<div class="container">

            <?php
            // File store under folder application/views/FRONTEND/breadcums.php
            echo $this->load->view('FRONTEND/breadcums');
            ?>

				<div class="">
					<div class="product-features clearFix">
						<div class="product-features-left pull-left">
							<a>
								<?=vcp_printf($nameBuilding->name, current_lang_());?>
                            </a>
							<p>
								<?=nl2br($nameBuilding->description);?>
							</p>
						</div>
						<div class="product-features-right pull-right">
                            <?php if ($nameBuilding->image): ?>
                                <img src="<?php echo PATH_URL . 'static/uploads/category/' . $nameBuilding->image ?>">
                            <?php endif; ?>
						</div>
					<div class="clear"></div>
					</div>
                    <!-- Contact us button -->
                    <?php
                    // File store under folder application/views/FRONTEND/information_contact_us.php
                    echo $this->load->view('FRONTEND/information_contact_us');
                    ?>
				</div>
				<div class="row">
					<div class="pull-left text-condition"><?php echo $label_building; ?></div>
				</div>
		<div class="row">
			<?php $table = 'houses';?>
        	<div class="product-block">
            <?php if($house): ?>
            <?php foreach($house as $key => $item):?>
                <div class="product-item list-search-product-item condo-product-item">
                            <div class="clearfix overlay-fix">
                                <div class="wrap-img-product">
                                    <div class="img-product-item owl-carousel pull-left">
                                        <?php if($imagesHouse) {
                                            $v = '0';
                                            foreach ($imagesHouse as $img) {
                                                if ($img->house_id == $item->id) {
                                                    $v = $v + 1;
                                                    ?>
                                                    <div>
                                                        <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>">
                                                            <img src="<?php echo PATH_URL . 'static/uploads/houses/gallery/' . $img->name_image; ?>"
                                                                 width="359" height="298" alt="" title=""/>
                                                        </a>
                                                    </div>
                                                <?php }
                                            }
                                            if($v == '0' && isset($item->images_thumb)){
                                                ?>
                                                <div>
                                                    <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>">
                                                        <img src="<?php echo PATH_URL . 'static/uploads/houses/' . $item->images_thumb; ?>"
                                                             width="359" height="298" alt="" title=""/>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                        }?>
                                    </div>
                                    <div class="price_area">
                                        <p class="price">
                                            <span>
                                                <?php
                                                    if($item->rent) {
                                                        echo $item->rent;
                                                    }
                                                ?>
                                            </span>
                                            <span>USD</span>
                                        </p>
                                        <p class="local"><?php echo vcp_printf($area[$key]->name, current_lang_())?></p>
                                    </div>
                                </div>
                                <div class="product-detail-right pull-right">
                                    <div class="detail-product-item">
                                        <a class="name-product-item" href="<?=create_url() .$table. "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_());?>">
                                <?php echo vcp_printf($item->name_en, current_lang_());?><br>
                                <?php echo vcp_printf($item->name_jp, current_lang_());?></a>
                                        <div class="detail-product-left">
                                            <div class="left-info-item">
                                                <span class="bold-text">エリア:</span>
                                                <span class="common-text"><?php echo vcp_printf($area[$key]->name, current_lang_())?></span>
                                            </div>
                                            <div class="left-info-item">
                                                <span class="bold-text">賃料:</span>
                                                <span class="common-text">
                                                <span>
                                                    <?php
                                                        if($item->rent) {
                                                            echo $item->rent . ' USD';
                                                        }
                                                    ?>
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
                                                    <?php
                                                        if ($table=='houses') {
                                                            if ($item->house_layout_id) {
                                                                if ($itemLayouts) {
                                                                    foreach ($itemLayouts as $layout) {
                                                                        $select = '';
                                                                        if ($layout->id == $item->house_layout_id) {
                                                                            echo vcp_printf($layout->name, current_lang_());
                                                                        }
                                                                    }
                                                                }
                                                            } else {
                                                                echo lang('間取り');
                                                            }
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="left-info-item">
                                                <span class="bold-text">面積:</span>
                                                <span class="common-text">
                                                    <?php
                                                        if($item->size) {
                                                            echo $item->size . 'm';
                                                            echo '<sup>2</sup>';
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- detail-product-item -->
                                      <div class="product-description">
                                        <?php echo nl2br(vcp_printf($item->introduction, current_lang_()));?>
                                     </div>
                                </div><!-- product-detail-right -->
                            </div>
                            <div class="detail-product-right">
                                <div class="list-condition clearfix">
                                    <div class="title-condition-utilities pull-left">家賃に含む<br>サービス等</div>
                                    <div class="list-condition-item pull-left">
                                        <?php if($equipment){
                                                foreach ($equipment as $icon){
                                                    if($icon->house_id == $item->id){?>
                                                        <div class="condition-item">
                                                            <img src="<?php echo PATH_URL .'static/images/facility_equipment_icon/'.$icon->name_image; ?>">
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
                                        <?php if($facility){
                                                foreach ($facility as $icon){
                                                    if($icon->house_id == $item->id){?>
                                                        <div class="utilities-item bg-orage">
                                                            <img src="<?php echo PATH_URL .'static/images/facility_equipment_icon/'.$icon->name_image; ?>">
                                                        </div>
                                                    <?php }
                                                }
                                            }?>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-detail-product">
                                <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>" class="btn-view-more btn-overlay btn-fixed pull-right">もっと見る</a>
                            </div>
                        </div><!--product-item-->
            <?php endforeach; ?>
        <?php endif;?>
            	</div>
            </div>
            <div class="row paging-after">
                <div class="paging pull-right">
                    <?php
                    if($count > 6){
                        echo $paging->create_links();
                    } ?>
                </div>
            </div>
            	
                
		</div>
	</div>
</div><!-- content-search-block -->
<script>
    $(document).ready(function() {
        $(".select_order").change(function () {
            var valselect = $('.select_order').val();
            var pathname = window.location.pathname;
            var arr_pathname = pathname.split('/');
            pathname = arr_pathname[1] + '/' +
                arr_pathname[2] + '/' +
                arr_pathname[3] +  '/' +
                arr_pathname[4] + '/' +
                arr_pathname[5];
            var lang = '<?php echo current_lang_();?>';
            if (lang == 'vn') {
                pathname += '/' + arr_pathname[6];
            }
            var origin = window.location.origin;
            window.location.href = origin + '/' + pathname + '/sort/' + valselect;
        });
    });
</script>