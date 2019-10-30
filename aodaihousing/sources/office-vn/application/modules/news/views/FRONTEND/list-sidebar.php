<div class="box-main news-box">
    <div class="header-right">
        <div class="header">
            <div class="icon icon-right-2">
                <h3><?php echo change_language('アオザイ インフォメーション', 'Tin tức'); ?></h3>
            </div>
        </div>
        <div class="line">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
    </div>
    <div class="right-item">
        <?php if(!empty($items)): ?>      
            <ul>
                <?php foreach($items as $key=>$item): ?>
                
                    <?php if(count($items) == $key+1): ?>
                        <li>
                            <a href="<?=create_url('news/' . $item->id.'/'.vcp_printf($item->title, 'jp'))?>"><span>もっと見る &raquo;</span></a>
                            <span class="line-dotted"></span>
                        </li>
                    <?php else: ?>
                        <li>
                            <a class="date" href="<?=create_url('news/' . $item->id.'/'.vcp_printf($item->title, current_lang_()))?>"><span class="orange"><?=date("Y-m-d", strtotime($item->created));?></span></span></a>
                            <a href="<?=create_url('news/' . $item->id.'/'.vcp_printf($item->title, current_lang_()))?>"><span><?=vcp_printf($item->title, current_lang_()); ?></span></a>
                            <span class="line-dotted"></span>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
    </div>
</div>