<div class="feture-1 feture">
    <div class="header-box">
        <div class="box-icon icon-build-1">
            <h2>最新不動産</h2>
            <div class="search">
               <form name="search" method="get" action="<?=create_url()?>search">
                   <input placeholder="物件検索キーワード" value="<?php if(isset($s))echo $s; ?>" name="s" class="input-s">
                            <input type="hidden" name="opt" value="office" />
                    <input type="submit" value="send" class="send-s">
                </form>
            </div>
        </div>
    </div>
    <div class="box-item">
        <div class="box-item-wap">
              <?php
        if (isset($items) && is_array($items)) {
            $replace = array("-"=>"/");
            $stt = 0;
            if (current_lang_() == 'vn') {
                $tien_te = 'USD';
            } else {
                $tien_te = 'USD';
            }
            foreach ($items as $key=>$item) {
                if($stt == 0)
                {
                    echo '<div class="row">';
                }
                $stt++;
                ?>
                <div class="item">
                    <a href="<?=create_url(). "offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_(), $replace); ?>" class="thumb"><img src="<?= PATH_URL_IMAGES ?>static/uploads/offices/<?= $item->images_thumb; ?>"></a>

                    <p class="area-size-rent"><span class="title-left"><?php echo lang('エリア'); ?>: </span><span class="value-right"><?php echo vcp_printf($item->area_name, current_lang_()); ?></span></p>
                    <p class="area-size-rent"><span class="title-left"><?php echo lang('面積'); ?>: </span><span class="value-right"><?php echo vcp_printf($item->size, current_lang_());?>m&#178;</span></p>
                    <p class="area-size-rent"><span class="title-left"><?php echo lang('賃料'); ?>: </span><span class="value-right"><?php echo vcp_printf($item->month_rent, current_lang_()); ?> <?=$tien_te;?></span></p>

                    <a href="<?=create_url(). "offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_(), $replace); ?>"><h4><?= vcp_printf($item->name_jp, current_lang_()); ?></h4></a>
                    
                    <a class="content" href='<?=create_url(). "offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_(), $replace); ?>'><?php //echo vcp_printf($item->introduction, current_lang_()); 

                     $introduction01=cutStringJP(vcp_printf($item->introduction, current_lang_()),70);
                     $pattern = "#<iframe[^>]+>.*?</iframe>#is";
                     echo preg_replace($pattern, "", $introduction01);
                    ?>
                        
                        ...</a>
                </div>
            <?php
            if($stt == 3 || count($items) == $key+1){
                echo '</div>';
                $stt = 0;
            }
            ?>
            
        <?php }}?>
           
        </div>
        <div class="pagination">
            <a href="<?=create_url(); ?>search?opt=office">もっと見る</a>
        </div>
    </div>
</div>