<?php if ($list):?>
    <div class="set-slider-list">
        <div class="row">
            <div class="items-list-apartment owl-carousel">
                <?php foreach($list as $item):
                    $thumb = '';
                    $v = 0; ?>
                    <?php
                    if(isset($item->images_thumb) && ($item->images_thumb != '')){
                        $thumb = PATH_URL . 'static/uploads/houses/' . $item->images_thumb;
                    }elseif (isset($images_houses)){
                        foreach ($images_houses as $img){
                            if(($img->house_id == $item->id) && ($v < 1)){
                                $v = $v + 1;
                                $thumb = PATH_URL . 'static/uploads/houses/gallery/' . $img->name_image;
                            }
                        }
                    }
                        $href_image   = create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, $language));
                        $rent         = isset($item->rent) ? vcp_printf($item->rent, $language) : '';
                        $info_address = vcp_printf($item->area_name, $language);
                        $href_des     = create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, $language));

                        $intro_content = mb_strlen(vcp_printf($item->introduction, $language),'utf-8');
                        if ($intro_content <= $limit_content) {
                            $text_des = vcp_printf($item->introduction, $language);
                        } else {
                            $text_des = mb_substr(vcp_printf($item->introduction, $language), 0, $limit_content, 'utf-8') . $string_limit_content;
                        }
                    ?>

                    <div class="info-appartment-item info-appartment-item2">
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
                        </div> <!-- image-room-block -->
                        <p class="quantity-rooms">
                            <?php if($itemLayOut){
                                foreach ($itemLayOut as $key =>$layOut){
                                    if($layOut->id == $item->house_layout_id){
                                        echo vcp_printf($layOut->name,current_lang_());
                                    }
                                }
                            }?>
                        </p>
                        <p class="des-info-appartment line-clamp-3">
                            <a href="<?php echo $href_des; ?>"><?php echo $text_des; ?></a>
                        </p>
                    </div><!-- info-appartment-item -->
                <?php endforeach; ?>
            </div><!-- items-list-apartment owl-carousel -->
        </div><!-- row -->
    </div><!-- set-slider-list -->
<?php endif; ?>