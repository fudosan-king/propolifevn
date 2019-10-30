<div class="feture-1 feture">
    <div class="header-box">
        <div class="box-icon icon-build-1">
            <h3>賃貸住宅一覧</h3>
            <div class="pagination-top">
                <?=$this->pagination->create_links();?>
            </div>
        </div>
        
    </div>
    <div class="box-item box-item-detail list">
    <?php if(!empty($items)): ?>
        <?php foreach($items as $key=>$item): ?>
        <?php
            $lastChild = '';
            if($key == count($items) - 1)
            {
                $lastChild = "last-child";
            }
        ?>
        <div class="deatil-top <?=$lastChild?>">
            <div class="thumb">
            <?php
                $thumb = PATH_URL_IMAGES . 'static/uploads/houses/' . $item->images_thumb;
                
                if(!@fopen($thumb, 'r')) {
                    //$thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
                }    
            ?>
                <a href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . $item->name_en;?>">
                    <img src="<?=$thumb?>" width="172px" />
                </a>
                
            </div>
            <div class="desc">
                <h4 class="title"><span class="icon-new">
                    <a class="title" href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . $item->name_en;?>">
                        <?=$item->name_jp;?></span>
                    </a>
                </h4>                                              
                <table width="473" border="0">
                  <tr>
                    <td><span class="bg-x">タイプ</span></td>
                    <td><?=$item->receipt_type;?></td>
                    <td><span class="bg-x">賃料</span></td>
                    <td><?=$item->month_rent?> USD</td>
                  </tr>
                  <tr>
                    <td><span class="bg-x">面積</span></td>
                    <td><?=$item->size;?>m2</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td colspan="4"><?=$item->introduction;?></td>
                  </tr>
                </table> 
            </div>
            <p class="read-more"><a href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . $item->name_en;?>">
                <img src="<?=PATH_URL_IMAGES?>static/images/read-more.jpg" /></a>
            </p>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
        <div class="pagination-bottom">
            <?=$this->pagination->create_links();?>
        </div>
    </div>
    
</div>