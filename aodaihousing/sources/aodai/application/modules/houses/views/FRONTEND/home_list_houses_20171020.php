<div class="feture-1 feture">
    <div class="header-box">
        <div class="box-icon icon-build-1">
            <h3><?php echo lang('最新賃貸物件'); ?></h3>
            <div class="box-popup">
                <a href="<?=PATH_URL?>search?opt=house"><?php echo lang('もっと見る'); ?></a>
            </div>
        </div>
        
    </div>
    <div class="box-item">
    <?php if(!empty($items)): ?>
        <?php foreach($items as $item): ?>
        <div class="item" style="min-height: 255px!important;">
            <?php
                $replace = array("-"=>"/");
                $thumb = PATH_URL . 'static/uploads/houses/' . $item->images_thumb; 
                if(!@file_get_contents($thumb)) {
                    //$thumb = PATH_URL . 'static/images/no-thumb.jpg';                
                }    
            ?>
            <a href="<?=create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, 'jp', $replace));?>"><img src="<?=$thumb;?>" /></a>
            <a href="<?=create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_(), $replace));?>">
            <h4>
                <?php 
                    CutTextNew(vcp_printf($item->name_jp, current_lang_()), 70);
                ?>
            </h4>
            </a>
            <p class="content">
                <!--<?=CutText(vcp_printf($item->introduction, current_lang_()), 70);?>-->
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
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    </div>

</div>