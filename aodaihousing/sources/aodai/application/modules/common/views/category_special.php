<?php 
    $data_opt = array(1=>'house', 2=>'office');
?>
<div class="right-item">
        <ul>
        <?php if(!empty($itemCategory)): ?>
            <?php foreach($itemCategory as $item): ?>
            <?php $type_p = $item->type_p; ?>
            <li>
            <?php
            if($item->id == 208){
                $catName = "単身者向け特集";
            }else{
                $catName = $item->name;
            }
            ?>
                <a href="<?=create_url(); ?>search?opt=<?=$data_opt[$type_p]; ?>&catid=<?=$item->id?>&catname=<?=vcp_printf($item->name, current_lang_()); ?>"><span><?=vcp_printf($item->name, current_lang_()); ?></span></a>
                <span class="line-dotted"></span>
            </li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</div>