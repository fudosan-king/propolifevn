<div class="box-main news-box">
    <div class="header-right">
        <div class="header">
            <div class="icon icon-right-2">
                <h3>アオザイハウジングニュース</h3>
            </div>
        </div>
        <div class="line">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
    </div>
    <div class="right-item">
        <?php if($items): ?>
            <ul>
                <?php foreach($items as $item): ?>
                <li>
                    <span class="orange"><?=date("Y-m-d", strtotime($item->created));?></span>
                    <a href="<?=PATH_URL. 'news/' . $item->id.'/'.SEO($item->title)?>"><span><?=$item->title?></span></a>
                    <span class="line-dotted"></span>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
    </div>
</div>