<div class="arrival-block slideInUp">
    <div class="container">
        <div class="row row_houses_arrival">
            <div class="col-xs-3 arrival-title background-dot-red">
                <h2 class="heading-title-arrival"><span>new</span><span>arrival</span></h2>
                <p>新着物件</p>
                <div class="button-arrival">
                    <a href="houses/最新賃貸物件" class="btn-view-more btn-overlay btn-visible">もっと見る</a>
                </div>
            </div>

            <?php if ($list && is_array($list)): ?>
                <?php foreach($list as $item): ?>
                    <?php
                        $thumb = '';
                        $v = 0;
                        $replace = array("-" => "/");

                        $list_house_images = explode(',', $item->list_house_images);
                        /*if ($item->list_house_images != '') {
                            $list_house_images = explode(',', $item->list_house_images);
                            if (count ($list_house_images) > 0) {
                                $thumb = PATH_URL . 'static/uploads/houses/gallery/' . $list_house_images[0];
                            }
                        }*/

                        $href_link = create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, $language, $replace));
                        $href_h3 = create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, $language, $replace));
                        $content_h3 = vcp_printf($item->name_en, $language);

                        if ($item->list_name_house_layouts != '') {
                            $content_under_h3 = vcp_printf($item->list_name_house_layouts, current_lang_());
                        }

                        $intro_content = mb_strlen(vcp_printf($item->introduction, $language),'utf-8');
                        if($intro_content <= $limit_content){
                            $content_appartment = vcp_printf($item->introduction, $language);
                        }
                        else{
                            $content_appartment = mb_substr(vcp_printf($item->introduction, $language), 0, $limit_content, 'utf-8') . $string_limit_content;
                        }

                        $price = vcp_printf($item->rent, $language);
                    ?>
                    
                    <div class="col-xs-3 arrival-items">
                        <div class="img-apartment">
                            <a href="<?php echo $href_link; ?>">
                            <?php
                            $thumb = 'static/uploads/houses/' . $item->images_thumb;
                            $thumb_image_gallary = 'static/uploads/houses/gallery/thumb_' . $list_house_images[0];
                            $image_gallary = 'static/uploads/houses/gallery/' . $list_house_images[0];
                            if(file_exists($thumb) && is_file($thumb)){
                                echo '<img class="lazyload" data-original="'.PATH_URL.$thumb.'" alt="">';
                            }elseif(file_exists($thumb_image_gallary) && is_file($thumb_image_gallary)){
                                echo  '<img class="lazyload" data-original="'.PATH_URL.$thumb_image_gallary.'" alt="">' ;
                            }elseif(file_exists($image_gallary) && is_file($image_gallary)){
                                echo '<img class="lazyload" data-original="'.PATH_URL.$image_gallary.'" alt="">' ;
                            }
                            ?>
                            </a>
                        </div>
                        <div class="description-arrival-items">
                            <div class="name-appartment">
                                <h3><a href="<?php echo $href_h3; ?>" title=""><?php echo $content_h3; ?></a></h3>
                                <p><?php echo $content_under_h3; ?></p>
                                <p><?php if(isset($item->area) && $item->area != ''){echo vcp_printf($item->area, $language);}?></p>
                            </div>
                            <p class="intro-content-appartment line-clamp-5"><?php echo $content_appartment; ?></p>
                            <p class="price-appartment"><span><?php echo $price . ' ' . $currency; ?></span><span>/month</span></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
		<div class="row">
			<div class="col-xs-12 title-promotion"></div>
		</div>
		<div class="row row_houses_arrival">
			<div class="col-xs-3 arrival-title background-dot-red">
				<h2 class="heading-title-arrival"><span>spot</span><span></span></h2>
				<p>注目物件</p>
				<div class="button-arrival" style="margin-top: 120px">
					<a href="houses/注目物件" class="btn-view-more btn-overlay btn-visible">もっと見る</a>
				</div>
			</div>
            <?php if ($list_back && is_array($list_back)): ?>
                <?php foreach($list_back as $key => $item): ?>
                    <?php
                    $thumb = '';
                    $v = 0;
                    $replace = array("-" => "/");

                    $list_house_images = explode(',', $item->list_house_images);

                    $href_link = create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, $language, $replace));
                    $href_h3 = create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, $language, $replace));
                    $content_h3 = vcp_printf($item->name_en, $language);

                    if ($item->list_name_house_layouts != '') {
                        $content_under_h3 = vcp_printf($item->list_name_house_layouts, current_lang_());
                    }

                    $intro_content = mb_strlen(vcp_printf($item->introduction, $language),'utf-8');
                    if($intro_content <= $limit_content){
                        $content_appartment = vcp_printf($item->introduction, $language);
                    }
                    else{
                        $content_appartment = mb_substr(vcp_printf($item->introduction, $language), 0, $limit_content, 'utf-8') . $string_limit_content;
                    }

                    $price = vcp_printf($item->rent, $language);
                    ?>
                    <?php if($key < 1):?>
						<div class="col-xs-3 arrival-items arrival-items_back">
							<div class="img-apartment">
								<a href="<?php echo $href_link; ?>">
                                    <?php
                                    $thumb = 'static/uploads/houses/' . $item->images_thumb;
                                    $thumb_image_gallary = 'static/uploads/houses/gallery/thumb_' . $list_house_images[0];
                                    $image_gallary = 'static/uploads/houses/gallery/' . $list_house_images[0];
                                    if(file_exists($thumb) && is_file($thumb)){
                                        echo '<img class="lazyload" data-original="'.PATH_URL.$thumb.'" alt="">';
                                    }elseif(file_exists($thumb_image_gallary) && is_file($thumb_image_gallary)){
                                        echo  '<img class="lazyload" data-original="'.PATH_URL.$thumb_image_gallary.'" alt="">' ;
                                    }elseif(file_exists($image_gallary) && is_file($image_gallary)){
                                        echo '<img class="lazyload" data-original="'.PATH_URL.$image_gallary.'" alt="">' ;
                                    }
                                    ?>
								</a>
							</div>
							<div class="description-arrival-items">
								<div class="name-appartment">
									<h3><a href="<?php echo $href_h3; ?>" title=""><?php echo $content_h3; ?></a></h3>
									<p><?php echo $content_under_h3; ?></p>
									<p><?php if(isset($item->area) && $item->area != ''){echo vcp_printf($item->area, $language);}?></p>
								</div>
								<p class="intro-content-appartment line-clamp-5"><?php echo $content_appartment; ?></p>
								<p class="price-appartment"><span><?php echo $price . ' ' . $currency; ?></span><span>/month</span></p>
							</div>
						</div>
                    <?php else:?>
						<div class="col-xs-3 arrival-items">
							<div class="img-apartment">
								<a href="<?php echo $href_link; ?>">
                                    <?php
                                    $thumb = 'static/uploads/houses/' . $item->images_thumb;
                                    $thumb_image_gallary = 'static/uploads/houses/gallery/thumb_' . $list_house_images[0];
                                    $image_gallary = 'static/uploads/houses/gallery/' . $list_house_images[0];
                                    if(file_exists($thumb) && is_file($thumb)){
                                        echo '<img class="lazyload" data-original="'.PATH_URL.$thumb.'" alt="">';
                                    }elseif(file_exists($thumb_image_gallary) && is_file($thumb_image_gallary)){
                                        echo  '<img class="lazyload" data-original="'.PATH_URL.$thumb_image_gallary.'" alt="">' ;
                                    }elseif(file_exists($image_gallary) && is_file($image_gallary)){
                                        echo '<img class="lazyload" data-original="'.PATH_URL.$image_gallary.'" alt="">' ;
                                    }
                                    ?>
								</a>
							</div>
							<div class="description-arrival-items">
								<div class="name-appartment">
									<h3><a href="<?php echo $href_h3; ?>" title=""><?php echo $content_h3; ?></a></h3>
									<p><?php echo $content_under_h3; ?></p>
									<p><?php if(isset($item->area) && $item->area != ''){echo vcp_printf($item->area, $language);}?></p>
								</div>
								<p class="intro-content-appartment line-clamp-5"><?php echo $content_appartment; ?></p>
								<p class="price-appartment"><span><?php echo $price . ' ' . $currency; ?></span><span>/month</span></p>
							</div>
						</div>
                    <?php endif;?>
                <?php endforeach; ?>
            <?php endif; ?>
		</div>
		</div>
</div>