<?php
$data_type = array(
    0 => lang('サービスアパートメント'),
    1 => lang('アパートメント'),
    2 => lang('戸建')
);
$text_type = array(
    0 => lang('ホーチミン サービスアパート'),
    1 => lang('ホーチミン アパートメント'),
    2 => lang('ホーチミン 戸建・店舗')
);
?>
<div class="feture-1 feture">
    <div class="header-box">
        <div class="box-icon icon-build-1">
            <h3><?=$tagName; ?></h3>
            <div class="pagination-top">
                
            </div>
        </div>
    </div>
    <div class="box-item box-item-detail list">
        
        <?php if(!empty($pagin)): ?>
        <div class="pagin-wap pagin-top">
            <div class="pagination-bottom">
                <?=$pagin;?>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $key => $item): ?>
                <?php
                if ($item->typeTag == 2) { ?>
                    <?php
                    $lastChild = '';
                    if ($key == count($items) - 1) {
                        $lastChild = "last-child";
                    }
                    $date_current = $item->house_update == '' ? $item->house_created : $item->house_update;
                    $date_limit = date('Y-m-d', strtotime($date_current . " + 14 day"));
                    if (strtotime($date_limit) > time()) {
                        $icon_new = 'icon-new';
                    } else {
                        $icon_new = '';
                    }
    
                    if ($item->house_recommended == 1) {
                        $icon_new = $icon_new . '-recommended';
                    }
                    ?>
                    <div class="deatil-top <?= $lastChild ?>">
                        <div class="thumb">
                            <?php
                            $thumb = PATH_URL . 'static/uploads/houses/' . $item->house_images_thumb;
                            if (!@file_get_contents($thumb)) {
                                //$thumb = PATH_URL . 'static/images/no-thumb.jpg';
                            }
                            ?>
                            <a href="<?= create_url("houses/detail/" . $item->house_id . '/' . vcp_printf($item->house_name_en, current_lang_())); ?>">
                                <img width="192" src="<?= $thumb; ?>"/>
                            </a>
    
                        </div>
                        <div class="desc">
                            <h4 class="title"><span class="<?= $icon_new ?>">
                        <a class="title"
                           href="<?= create_url("houses/detail/" . $item->house_id . '/' . vcp_printf($item->house_name_en, current_lang_())); ?>">
                                    <?= vcp_printf($item->house_name_jp, current_lang_()); ?></span>
                                </a>
                            </h4>
                            <table style="width: 100%;" border="0">
                                <tr>
                                    <td><span class="bg-x"><?php echo lang('タイプ') ?></span></td>
                                    <td><?= $data_type[$item->house_type]; ?></td>
                                    <td><span class="bg-x"><?php echo lang('賃料'); ?></span></td>
                                    <td><?= vcp_printf($item->house_rent, current_lang_()); ?> USD</td>
                                    <td><span class="bg-x"><?php echo lang('エリア'); ?></span></td>
                                    <td><?php echo modules::run('tags/get_area', $item->house_id, $item->typeTag); ?></td>
                                </tr>
    
                                <tr>
                                    <td><span class="bg-x"><?php echo lang('間取り'); ?></span></td>
                                    <td><?= vcp_printf($item->house_layouts, current_lang_()); ?></td>
                                    <td><span class="bg-x"><?php echo lang('面積'); ?></span></td>
                                    <td><?= vcp_printf($item->house_size, current_lang_()); ?>m&#178;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
    
                                <tr>
                                    <td colspan="6"><?php echo vcp_printf($item->house_introduction, current_lang_()); ?></td>
                                </tr>
                            </table>
                        </div>
                        <p class="read-more"><a
                                href="<?= create_url("houses/detail/" . $item->house_id . '/' . vcp_printf($item->house_name_en, current_lang_())); ?>">
                                <img src="<?= PATH_URL ?>static/images/read-more<?= current_lang(); ?>.jpg"/></a>
                        </p>
                    </div>
                <?php } else {  ?>
    
                    <?php
                    $lastChild = '';
                    if ($key == count($items) - 1) {
                        $lastChild = "last-child";
                    }
                    $date_current = $item->update == '' ? $item->created : $item->update;
                    $date_limit = date('Y-m-d', strtotime($date_current . " + 14 day"));
                    if (strtotime($date_limit) > time()) {
                        $icon_new = 'icon-new';
                    } else {
                        $icon_new = '';
                    }
    
                    if ($item->recommended == 1) {
                        $icon_new = $icon_new . '-recommended';
                    }
                    ?>
                    <div class="deatil-top <?= $lastChild ?>">
                        <div class="thumb">
                            <a href="<?= create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_())); ?>">
                                <img src="<?= PATH_URL ?>static/uploads/offices/<?= $item->images_thumb; ?>" width="172px"/>
                            </a>
    
                        </div>
                        <div class="desc">
                            <h4 class="title"><span class="<?= $icon_new; ?>">
                        <a class="title"
                           href="<?= create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_())); ?>">
                                    <?= vcp_printf($item->name_jp, current_lang_()); ?></span>
                                </a>
                            </h4>
    
                            <table width="452" border="0">
                                <tr>
                                    <td><span class="bg-x"><?php echo lang('エリア'); ?></span></td>
                                    <td><?php echo modules::run('tags/get_area', $item->id, $item->typeTag); ?></td>
                                    <td><span class="bg-x"><?php echo lang('賃料'); ?></span></td>
                                    <td>
                                        <?= !empty($item->month_rent) ? vcp_printf($item->month_rent, current_lang_()) . ' USD/' . lang('月') : ''; ?>
                                        <?= !empty($item->size_rent) && !empty($item->month_rent) ? ' - ' : ''; ?>
                                        <?= !empty($item->size_rent) ? vcp_printf($item->size_rent, current_lang_()) . ' USD/m&#178;' : ''; ?>
                                </tr>
                                <tr>
                                    <td><span class="bg-x"><?php echo lang('面積'); ?></span></td>
                                    <td><?php echo vcp_printf($item->size, current_lang_()); ?>m&#178;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
    
                                <tr>
                                    <td colspan="4"><?= vcp_printf($item->introduction, current_lang_()); ?></td>
                                </tr>
                            </table>
                        </div>
                        <p class="read-more"><a
                                href="<?= create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_())); ?>">
                                <img src="<?= PATH_URL ?>static/images/read-more<?= current_lang(); ?>.jpg"/></a>
                        </p>
                    </div>
                    
                <?php } ?>
            <?php endforeach; ?>
            
            <?php if(!empty($pagin)): ?>
            <div class="pagin-wap">
                <div class="pagination-bottom">
                    <?=$pagin;?>
                </div>
            </div>
            <?php endif; ?>
            
        <?php else: ?>
            <p class="search-no"><?php lang('検索条件に該当する物件が見つかりませんでした。'); ?></p>
        <?php endif; ?>
    </div>
</div>