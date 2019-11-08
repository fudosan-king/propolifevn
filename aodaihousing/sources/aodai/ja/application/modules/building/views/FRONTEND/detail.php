<div class="wrapper-content-block">
	<div class="content-search-block">
		<div class="container">
            <!-- Breadcums -->
            <?php
                // File store under folder application/views/FRONTEND/breadcums.php
                echo $this->load->view('FRONTEND/breadcums');
            ?>

			<div class="">
				<div class="product-features clearFix">
					<div class="product-features-left pull-left">
						<a>
                            <!-- <?//=vcp_printf($nameBuilding[0]->name, 'vn');?><br> -->
							<?=vcp_printf($nameBuilding[0]->name, current_lang_());?>
                        </a>
						<p>
							<?=nl2br($nameBuilding[0]->description);?>
						</p>
					</div>
					
                    <div class="product-features-right pull-right">
                        <?php if ($nameBuilding[0]->image): ?>
                            <img src="<?php echo PATH_URL . 'static/uploads/category/' . $nameBuilding[0]->image ?>">
                        <?php endif; ?>
					</div>
                    <input type="hidden" name="id_building" value="<?php if(isset($id)){echo $id;}?>">
                    <input type="hidden" name="name_building" value="<?php if(isset($name)){echo $name;}?>">
                    <div class="tab-area">
                        <ul>
<!--                            <li class="tab-items-2 --><?php //if(isset($type) && $type == '2'){echo 'active';}?><!--" data-id="2"><a>コンドミニアム</a></li>-->
<!--                             <li class="tab-items-1 --><?php //if(isset($type) && $type != '2'){echo 'active';}?><!--" data-id="1"><a>サービスアパートメント</a></li> -->
                        </ul>
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
				<div class="pull-left text-condition">
                    <?php
                        if (helper_get_module_current() == 'building') {
                            if (helper_get_action_current() == 'detail') {
                                // Use for page: page/住居エリア検索
                                echo '住居エリア検索';
                            } else {
                                // Use for page detail near school bus
                                echo '日本人学校のバスが停まる物件特集';
                            }
                        }
                    ?>
                    </div>
			</div>
            
            <div class="tab-content">
                <div id="tabs-1" class="<?php if(isset($type) && $type != '2'){echo 'tab-active';}?>" style="<?php if(isset($type) && $type == '2'){echo 'display:none';}?>">
	            <div class="row">
			        <?php $table = 'houses'; ?>
                	<div class="product-block">
                        <?php if($house): ?>
                            <?php foreach($house as $key => $item): ?>
                            	<div class="product-item list-search-product-item condo-product-item">
                                    <div class="clearfix">
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
                                                        $get_rent = '';
                                                        if ($item->rent) {
                                                            $get_rent = $item->rent;
                                                        }
                                                        echo $get_rent;
                                                    ?>
                                                    </span> 
                                                    <span>USD</span>
                                                </p>
                                                <p class="local"><?php if(isset($item->area) &&($item->status_area == 1)){ echo vcp_printf($item->area, current_lang_());}else{ echo lang('1区');}?></p>
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
                                                        <span class="common-text"><?php if(isset($item->area) && ($item->status_area == 1)){ echo vcp_printf($item->area, current_lang_());}else{ echo lang('1区');}?></span>
                                                    </div>
                                                    <div class="left-info-item">
                                                        <span class="bold-text">賃料:</span>
                                                        <span class="common-text">
                                                        <span>
                                                            <?php
                                                                $get_rent = '';
                                                                if ($item->rent) {
                                                                    $get_rent = $item->rent;
                                                                }
                                                                echo $get_rent . ' USD';
                                                            ?>
                                                        </span>
                                                    </div>
                                                    <div class="left-info-item">
                                                        <span class="bold-text">種類:</span>
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
                                                                    foreach ($itemLayouts as  $layout) {
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
                                                        </span>
                                                    </div>
                                                    <div class="left-info-item">
                                                        <span class="bold-text">面積:</span>
                                                        <span class="common-text">
                                                            <?php
                                                                $get_size = '';
                                                                if ($item->size) {
                                                                    $get_size = $item->size;
                                                                }
                                                                echo $get_size . ' m';
                                                            ?>
                                                            <sup>2</sup>
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
                                        <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . vcp_printf($item->name_en,current_lang_()); ?>" class="btn-view-more btn-overlay btn-fixed btn-houses pull-right">もっと見る</a>
                                    </div>
                                </div><!--product-item-->
                            <?php endforeach; ?>
                        <?php endif;?>
                	</div>
                </div>
                    <div class="row paging-after">
                        <div class="paging pull-right">
                            <?php if(isset($count) && $count > 20) {?>
                                <p><?php echo $paging->create_links(); ?></p>
                            <?php }?>
                        </div>
                    </div>
            </div><!-- end .tabs-1 -->
            
            <div id="tabs-2" class="<?php if(isset($type) && $type == '2'){echo 'tab-active';}?>" style="<?php if(isset($type) && $type == '2'){echo 'display:block';}?>">
                <div class="row">
                    <?php $table = 'houses';?>
                    <div class="product-block">
                        <?php if($house1): ?>
                            <?php foreach($house1 as $key => $item): ?>
                                <div class="product-item list-search-product-item condo-product-item">
                                    <div class="clearfix">
                                        <div class="wrap-img-product">
                                            <div class="img-product-item owl-carousel pull-left">
                                                <?php if($imagesHouse) {
                                                    foreach ($imagesHouse as $img) {
                                                        if ($img->house_id == $item->id) {
                                                            ?>
                                                            <div>
                                                                <a href="<?=create_url() . $table . "/detail/" . $item->id . '/' . $item->name_en; ?>">
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
                                                        $get_rent = '';
                                                        if ($item->rent) {
                                                            $get_rent = $item->rent;
                                                        }
                                                        echo $get_rent;
                                                    ?>
                                                    </span> 
                                                    <span>USD</span>
                                                </p>
                                                <p class="local"><?php echo vcp_printf($area1[$key]->name, current_lang_())?></p>
                                            </div>
                                        </div>                          
                                        
                                        <div class="product-detail-right pull-right">
                                            <div class="detail-product-item">
                                                <a class="name-product-item" href="<?=create_url() .$table. "/detail/" . $item->id . '/' . $item->name_en;?>">
                                                    <?php echo vcp_printf($item->name_en, current_lang_());?><br>
                                                    <?php echo vcp_printf($item->name_jp, current_lang_());?>
                                                </a>
                                                
                                                <div class="detail-product-left">
                                                    <div class="left-info-item">
                                                        <span class="bold-text">エリア:</span>
                                                        <span class="common-text"><?php echo vcp_printf($area1[$key]->name, current_lang_())?></span>
                                                    </div>
                                                    
                                                    <div class="left-info-item">
                                                        <span class="bold-text">賃料:</span>
                                                        <span class="common-text">
                                                        <span>
                                                            <?php
                                                                $get_rent = '';
                                                                if ($item->rent) {
                                                                    $get_rent = $item->rent;
                                                                }
                                                                echo $get_rent . ' USD';
                                                            ?>
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
                                                                    foreach ($itemLayouts as $layout) {
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
                                                        </span>
                                                    </div>
                                                    
                                                    <div class="left-info-item">
                                                        <span class="bold-text">面積:</span>
                                                        <span class="common-text">
                                                            <?php
                                                                $get_size = '';
                                                                if ($item->size) {
                                                                    $get_size = $item->size;
                                                                }
                                                                echo $get_size . 'm';
                                                            ?>
                                                            <sup>2</sup>
                                                        </span>
                                                    </div>
                                                </div><!-- end .detail-product-left -->
                                            </div><!-- detail-product-item -->
                                            <div class="product-description">
                                                <?php echo nl2br(vcp_printf($item->introduction, current_lang_()));?>
                                            </div><!-- end .product-description -->
                                        </div><!-- product-detail-right -->
                                    </div><!-- end .clearfix -->
                                    <div class="detail-product-right">
                                        <div class="list-condition clearfix">
                                            <div class="title-condition-utilities pull-left">家賃に含む<br>サービス等</div>
                                            <div class="list-condition-item pull-left">
                                                <?php if($equipment1){
                                                        foreach ($equipment1[$key] as $icon){
                                                            if($icon->name_image != ''){?>
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
                                                <?php if($facility1){
                                                        foreach ($facility1[$key] as $icon) {
                                                            if($icon->name_image != ''){?>
                                                                <div class="utilities-item bg-orage">
                                                                    <img src="<?php echo PATH_URL .'static/images/facility_equipment_icon/'.$icon->name_image; ?>">
                                                                </div>
                                                            <?php }
                                                        }
                                                    }?>
                                            </div>  
                                        </div>
                                    </div><!-- end .detail-product-right -->
                                </div><!--product-item-->
                            <?php endforeach; ?>
                        <?php endif;?>
                    </div><!-- end .product-block -->
                </div><!-- end .row -->
                <div class="row paging-after">
                    <div class="paging pull-right">
                        <?php if(isset($count1) && $count1 > 20) {?>
                            <p><?php echo $paging->create_links(); ?></p>
                        <?php }?>
                    </div>
                </div>
            </div><!-- end .tabs-2 -->
		</div><!-- end .container -->
	</div><!-- end .content-search-block -->
</div><!-- content-search-block -->
