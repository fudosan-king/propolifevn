<div class="arrival-block">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 arrival-title background-dot-red">
                <h2 class="heading-title-arrival"><span>new</span><span>arrival</span></h2>
                <p>新着物件</p>
                <div class="button-arrival">
                    <a href="javscript:void(0)" class="btn-view-more">もっと見る</a>
                </div>
            </div>
            <?php if($items): ?>
                <?php foreach($items as $item): ?>
                <?php
                if(current_lang_() == 'vn'){
                    $tien_te = 'USD';
                }else{
                    $tien_te = 'USD';
                }
                ?>
                <div class="col-xs-3 arrival-items">
                    <?php
                        $replace = array("-"=>"/");
                        $thumb = PATH_URL . 'static/uploads/houses/' . $item->images_thumb; 
                        if(!@file_get_contents($thumb)) {
                            //$thumb = PATH_URL . 'static/images/no-thumb.jpg';                
                        }    
                    ?>
                    <div class="img-apartment"><a href="<?=create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, 'jp', $replace));?>"><img src="<?=$thumb;?>"></a></div>
                    <div class="description-arrival-items">
                        <div class="name-appartment">
                            <h3><a href="<?=create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_(), $replace));?>" title=""><?php echo lang('物件名'); ?><?php echo vcp_printf($item->name_en, current_lang_());?></a></h3>
                            <p><?php echo vcp_printf($item->area, current_lang_()); ?></p>
                        </div>                              
                        <p class="intro-content-appartment">
                        <?php 
                            $string = mb_strlen(vcp_printf($item->introduction, current_lang_()),'utf-8');
                            if($string<=65){
                                echo vcp_printf($item->introduction, current_lang_());
                            }
                            else{
                                echo mb_substr(vcp_printf($item->introduction, current_lang_()), 0, 65, 'utf-8') . '...';
                            }
                        ?>
                        </p>
                        <p class="price-appartment"><span><?php echo vcp_printf($item->rent, current_lang_()); ?> <?=$tien_te;?></span><span>/month</span></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>                 
        </div>  
    </div>      
</div><!-- arrival-block -->