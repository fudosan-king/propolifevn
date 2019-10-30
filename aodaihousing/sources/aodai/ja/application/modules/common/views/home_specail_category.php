<?php if ($list): ?>
    <div class="set-slider-list">
        <div class="row">
            <div class="items-list-apartment owl-carousel">
                <?php foreach($list as $item):?>
                    <?php
                        $thumb = PATH_URL . 'static/uploads/houses/' . $item->images_thumb;
                        if(!@file_get_contents($thumb)) {
                            $thumb = PATH_URL . 'static/images/no-thumb.jpg';                
                        }
                        $href_image   = create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, $language));
                        $rent         = vcp_printf($item->rent, $language);
                        $info_address = vcp_printf($item->area_name, $language);
                        $href_des     = create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, $language));
                        $text_des     = vcp_printf($item->layout_name, $language);
                    ?>

                    <div class="info-appartment-item">
                        <div class="image-room-block">
                            <div class="img-apartment">
                                <a href="<?php echo $href_image; ?>">
                                    <img src="<?php echo $thumb;?>" alt=""/>
                                </a>                        
                            </div><!-- img-apartment -->
                        
                            <div class="price-and-location clearfix">
                                <p class="info-price">
                                    <span><?php echo $rent; ?></span>
                                    <span><?php echo $currency; ?></span>
                                </p>
                               
                                <p class="info-address">
                                    <span><?php echo $info_address; ?></span>
                                </p>
                            </div><!-- price-and-location clearfix -->
                        </div>                        
                        <p class="des-info-appartment">
                            <a href="<?php echo $href_des; ?>"><?php echo $text_des; ?></a>
                        </p>
                    </div><!-- info-appartment-item -->
                <?php endforeach; ?>
            </div><!-- items-list-apartment owl-carousel -->
        </div><!-- row -->
    </div><!-- set-slider-list -->
<?php endif; ?>