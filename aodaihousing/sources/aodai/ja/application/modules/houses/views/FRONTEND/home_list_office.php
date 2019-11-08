<div class="feture-2 feture">
    <div class="header-box">
        <div class="box-icon icon-build-2">
            <h3>ＪＲ京浜東北線ファミリー物件</h3>
            <div class="box-popup">
                <a href="<?=create_url()?>offices">もっと見る</a>
            </div>
        </div>
        
    </div>
    <div class="box-item">
    <?php if($items): ?>
        <?php foreach($items as $item): ?>
        <div class="item">
            <?php
                $thumb = PATH_URL . 'static/uploads/offices/' . $item->images_thumb;
                if(!@file_get_contents($thumb)) {
                    $thumb = PATH_URL . 'static/images/no-thumb.jpg';                
                }    
            ?>
            <a href="<?php if(current_lang_()=='jp') echo PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en; else echo PATH_URL . "vn/offices/detail/" . $item->id . '/' . $item->name_en;?>"><img src="<?=PATH_URL;?>static/images/thumb.jpg" /></a>
            <a href="<?php if(current_lang_()=='jp') echo PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en; else echo PATH_URL . "vn/offices/detail/" . $item->id . '/' . $item->name_en;?>"><h4><?=$item->name_jp;?></h4></a>
            <p class="content"><?=mb_strcut($item->introduction, 0, 100);?></p>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    </div>
    
</div>