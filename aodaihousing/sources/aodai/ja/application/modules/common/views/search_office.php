<?php
$catname = $catname == ''? lang('office_list'): $catname; ?>
<div class="feture-1 feture">
    <div class="header-box">
        <div class="box-icon icon-build-1">
            <h3> <?=$catname;?></h3>
            <div class="pagination-top">
                
            </div>
        </div>
        
    </div>
    <div class="box-item box-item-detail list">
    
    <div class="pagin-wap pagin-top">
        <div class="pagination-bottom">
            <?=$this->paginations->create_links();?>
        </div>
    </div>
    
    <?php if($items): ?>
        <?php foreach($items as $key=>$item): ?>
        <?php
            $lastChild = '';
            if($key == count($items) - 1)
            {
                $lastChild = "last-child";
            }
            $date_current = $item->update == ''? $item->created:$item->created;
            $date_limit = date('Y-m-d', strtotime($date_current . " + 14 day"));
            if(strtotime($date_limit) > time()){
                $icon_new = 'icon-new';
            }else{
                $icon_new = '';
            }
			
			if($item->recommended == 1) {
                $icon_new = $icon_new . '-recommended';
            }
        ?>
        <div class="deatil-top <?=$lastChild?>">
            <div class="thumb">
                <a href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>">
                    <img src="<?=PATH_URL?>static/uploads/offices/<?=$item->images_thumb;?>" width="172px" />
                </a>
                
            </div>
            <div class="desc">
                <h4 class="title"><span class="<?=$icon_new;?>">
                    <a class="title" href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>">
                        <?=vcp_printf($item->name_jp, current_lang_());?></span>
                    </a>
                </h4>              
                                                
                <table width="452" border="0">
                  <tr>
                    <td><span class="bg-x"><?php echo lang('エリア'); ?></span></td>
                    <td><?=vcp_printf($item->name, current_lang_());?></td>
                    <td><span class="bg-x"><?php echo lang('賃料'); ?></span></td>
                    <td>
                        <?php
                            $get_item_month_rent = '';
                            if ($item->month_rent) {
                                $get_item_month_rent = vcp_printf($item->month_rent, current_lang_()). ' USD/'.lang('月');
                            }
                            echo $get_item_month_rent;

                            $get_item_month_size_rent = '';
                            if ($item->size_rent && $item->month_rent) {
                                $get_item_month_size_rent = ' - ';
                            }
                            echo $get_item_month_size_rent;

                            $get_item_size_rent = '';
                            if ($item->size_rent) {
                                $get_item_size_rent = vcp_printf($item->size_rent, current_lang_()). ' USD/m&#178;';
                            }
                            echo $get_item_size_rent;
                        ?>
                  </tr>
                  <tr>
                    <td><span class="bg-x"><?php echo lang('面積'); ?></span></td>
                    <td><?php echo vcp_printf($item->size, current_lang_());?>m&#178;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td colspan="4"><?= nl2br(vcp_printf($item->introduction, current_lang_()));?></td>
                  </tr>
                </table> 
            </div>
            <p class="read-more"><a href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>">
                <img src="<?=PATH_URL?>static/images/read-more<?=current_lang();?>.jpg" /></a>
            </p>
        </div>
        <?php endforeach; ?>
    
        <div class="pagination-bottom">
            <?=$this->paginations->create_links();?>
        </div>
    <?php else: ?>
        <p class="search-no"><?php echo lang('検索条件に該当する物件が見つかりませんでした。'); ?></p>
    <?php endif; ?>
    </div>
    
</div>
<?php if(isset($_GET['scroller']) && $_GET['scroller'] == true): ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(this).scrollTop(391);
    })
</script>
<?php endif; ?>