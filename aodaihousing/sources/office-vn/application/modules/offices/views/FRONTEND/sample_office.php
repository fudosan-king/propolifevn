<?php if (!empty($items) && is_array($items)): 
if (current_lang_() == 'vn') {
    $tien_te = 'USD';
} else {
    $tien_te = 'USD';
}
?>
    <div class="carousel">
        <?php $num=count($items); ?>
        <?php if($num>3): ?>
        <a href="javascript:void(0)" class="prev"></a>
        <?php endif;?>
        <div class="jCarouselLite">
            <ul>
                <?php foreach ($items as $key => $item): ?>
                    <li>
                        <a href="<?= PATH_URL . "offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()); ?>">
                            <div class="sroll_content">
                                <img src="<?= PATH_URL_IMAGES ?>static/uploads/offices/<?= $item->images_thumb; ?>" alt="" height="120" width="183">
                                <p class="area-size-rent"><span class="title-left"><?php echo lang('エリア'); ?>: </span><span class="value-right"><?php echo vcp_printf($item->area_name, current_lang_()); ?></span></p>
                                <p class="area-size-rent"><span class="title-left"><?php echo lang('面積'); ?>: </span><span class="value-right"><?php echo vcp_printf($item->size, current_lang_());?>m&#178;</span></p>
                                <p class="area-size-rent"><span class="title-left"><?php echo lang('賃料'); ?>: </span><span class="value-right"><?php echo vcp_printf($item->month_rent, current_lang_()); ?> <?=$tien_te;?></span></p>

                                <div class="caption">
                                    <p><?=vcp_printf($item->name_jp, current_lang_()); ?></p>
                                </div>                    
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php if($num>3): ?>
        <a href="javascript:void(0)" class="next"></a>
        <?php endif;?>
        <div class="clear"></div>   
    </div>
<?php endif; ?>