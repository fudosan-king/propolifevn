<?php
    $data_type = array(
        0 => lang('サービスアパートメント'),
        1 => lang('アパートメント'),
        2 => lang('戸建')
    );
    $text_type = array(
        0 =>lang('ホーチミン サービスアパート'),
        1 =>lang('ホーチミン アパートメント'),
        2 => lang('ホーチミン 戸建・店舗')
    );
   
    
    $catname = $catname == ''? lang('office_list'): $catname;
    if(isset($type)&& $type!='')$catname=$text_type[$type];
?>

<?php if($items): ?>
<?php foreach($items as $key=>$item): ?>

<div class="apartment-info">
    <div class="name name-width-33"><p><span class="label"><?php echo lang('タイプ') ?>:</span><?php echo lang('オフィス') ?></p></div>
    <div class="name name-width-66 name-320"><p><span class="label"><?php echo lang('物件名') ?></span> 
       <!--  <?=vcp_printf($item->name_jp, current_lang_());?> -->
        <?php
            $str =vcp_printf($item->name_jp, current_lang_());
            echo mb_substr($str,0,10). '...';
        ?></p>
    </div>

    <div class="name name-width-66 name-480"><p><span class="label"><?php echo lang('物件名') ?></span> 
        <?php
            $str =vcp_printf($item->name_jp, current_lang_());
            echo mb_substr($str,0,17). '...';
        ?></p>
    </div>

    <div class="name name-width-66 name-768"><p><span class="label"><?php echo lang('物件名') ?></span> 
        <?php
            $str =vcp_printf($item->name_jp, current_lang_());
            echo mb_substr($str,0,35). '...';
        ?></p>
    </div>

    <div class="name name-width-66 name-1024"><p><span class="label"><?php echo lang('物件名') ?></span> 
        <?php
            $str =vcp_printf($item->name_jp, current_lang_());
            echo mb_substr($str,0,55). '...';
        ?></p>
    </div>

    <?php 
        $thumb = PATH_URL . 'static/uploads/offices/' . $item->images_thumb;
            if(!@file_get_contents($thumb)) {
        }    
    ?>
    <div class="list-left">
        <div class="list-left-table">
            <?php if(vcp_printf($item->name_jp, current_lang_()) == ""){?>
                <a href="<?=PATH_URL?>vn/offices/detail/<?= $item->id . '/' .vcp_printf($item->name_en)?>">
            <?php }else{ ?>
                <a href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_en, current_lang_()));?>">
            <?php } ?>
                <img src="<?=$thumb; ?>" class="img-responsive">
            </a>
        </div>
    </div>

    <div class="list-right">
        <div class="rent">
            <!-- <div class="line-apart"></div>  -->
            <div class="w-2 w-100">
                <div><p><span class="label"><?php echo lang('rent'); ?>:</span> 
                    <?php
                        $get_item_month_rent = '';
                        if ($item->month_rent) {
                            $get_item_month_rent = vcp_printf($item->month_rent, current_lang_()). ' USD/'.lang('月');
                        }
                        echo $get_item_month_rent;
                        
                        $get_item_month_size_rent = '';
                        if ($item->month_rent && $item->size_rent) {
                            $get_item_month_size_rent = ' - ';
                        }
                        echo $get_item_month_size_rent;

                        $get_item_size_rent = '';
                        if ($item->size_rent) {
                            $get_item_size_rent = vcp_printf($item->size_rent, current_lang_()). ' USD/m&#178;';
                        }
                        echo $get_item_size_rent;
                    ?>
                <div class="rows-2 ws-480"><p><span class="label"><?php echo lang('エリア'); ?>:</span> 
                <!-- <?=vcp_printf($item->name, current_lang_());?></p> -->
                <?php
                    $str =vcp_printf($item->name, current_lang_());
                    echo mb_substr($str,0,7). '...';
                ?></p>
                </div>

                <div class="rows-2 ws-320"><p><span class="label"><?php echo lang('エリア'); ?>:</span> 
                <!-- <?=vcp_printf($item->name, current_lang_());?></p> -->
                <?php
                    $str =vcp_printf($item->name, current_lang_());
                    echo mb_substr($str,0,5). '...';
                ?></p>
                </div>

                <div class="rows-2 ws-custom"><p><span class="label"><?php echo lang('エリア'); ?>:</span> 
                <!-- <?=vcp_printf($item->name, current_lang_());?></p> -->
                <?php
                    $str =vcp_printf($item->name, current_lang_());
                    echo $str;
                ?></p>
                </div>

            </div>
        </div>
        
        <div class="floor">
            <div class="line-apart"></div> 
            <div class="w-20"><p><span class="label"><?php echo lang('面積'); ?>: </span> <?=vcp_printf($item->size, current_lang_()); ?>m&#178;</p></div>
            <div class="w-20 view-detail">
            <?php if(vcp_printf($item->name_jp, current_lang_()) == ""){?>
                <a href="<?=PATH_URL?>vn/offices/detail/<?= $item->id . '/' .vcp_printf($item->name_en)?>"><p><?php echo lang('詳しく見る'); ?></p></a>
            <?php }else{ ?>
                <a href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_en, current_lang_()));?>"><p><?php echo lang('詳しく見る'); ?></p></a>    
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<div class="pagination-bottom">
    <?=$this->paginations->create_links();?>
</div>
<!-- <div class="paging">
    <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>circle1.png" class="img-responsive">
    <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>circle1.png" class="img-responsive">
    <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>circle1.png" class="img-responsive">
    <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>circle1.png" class="img-responsive">
    <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>circle1.png" class="img-responsive">
</div> -->
<?php else: ?>
    <p class="search-no"><?php echo lang('検索条件に該当する物件が見つかりませんでした。'); ?></p>
<?php endif; ?>