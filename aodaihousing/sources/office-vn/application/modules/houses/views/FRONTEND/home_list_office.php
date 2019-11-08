<div class="feture-2 feture">
    <div class="header-box">
        <div class="box-icon icon-build-2">
            <h3>ＪＲ京浜東北線ファミリー物件</h3>
            <div class="box-popup">
                <a href="<?=PATH_URL?>offices">もっと見る</a>
            </div>
        </div>
        
    </div>
    <div class="box-item">
    <?php if(!empty($items)): ?>
        <?php foreach($items as $item): ?>
        <div class="item">
            <?php
                $thumb = PATH_URL_IMAGES . 'static/uploads/offices/' . $item->images_thumb;
                if(!@file_get_contents($thumb)) {
                    $thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
                }    
            ?>
            <a href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en;?>"><img src="<?=PATH_URL_IMAGES;?>static/images/thumb.jpg" /></a>
            <a href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en;?>"><h4><?=$item->name_jp;?></h4></a>
            <p class="content"><?=mb_strcut($item->introduction, 0, 100);?></p>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    </div>
    
</div>