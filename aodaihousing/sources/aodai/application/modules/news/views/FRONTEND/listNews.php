<div class="feture-1">
    <h3 class="title-relative">その他のニュース</h3>
    <ul class="relative">
        <?php if(isset($items)&& is_array($items)):?>
        <?php foreach($items as $item){ ?>
        <li><span><a href="<?=create_url('news/' . $item->id.'/'.vcp_printf($item->title, current_lang_()))?>"><?=date("Y", strtotime($item->created))?>年<?=date("m", strtotime($item->created))?>月<?=date("d", strtotime($item->created))?>日</a></span>
            <a href="<?=create_url('news/' . $item->id.'/'.vcp_printf($item->title, current_lang_()))?>"><?php echo vcp_printf($item->title, current_lang_())?></a>
        </li>
        <?php } ?>
                <?php endif; ?>        
    </ul>
</div>