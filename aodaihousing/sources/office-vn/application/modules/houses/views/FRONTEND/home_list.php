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
            <a href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en;?>"><img src="<?=PATH_URL_IMAGES?>static/uploads/offices/<?=$item->images_thumb;?>" /></a>
            <a href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en;?>"><h4>ＪＲ京浜東北線ファミリー物件</h4></a>
            <p class="content">
                <span><?=$item->name_jp;?></span><br />
                <span>547-1</span><br />
                <span class="orange"><?=$item->month_rent;?>万円</span><br />
                <span>築11年 | 3LDK | 15階建3階部分</span>
            </p>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
    
</div>