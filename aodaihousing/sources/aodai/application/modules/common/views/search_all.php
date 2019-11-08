<div class="feture-1 feture">
    <div class="header-box">
        <div class="box-icon icon-build-1">
            <h3><?=$cat_name;?></h3>
        </div>
        
    </div>
    <div class="box-item box-item-detail list">
    <?php
    $type = array(
        'サービスアパートメント',
        'アパートメント',
        '戸建'
    );
    ?>
    <?php if(!empty($items_houses)): ?>
        <?php foreach($items_houses as $key=>$item): ?>
        <?php
            $lastChild = '';
            if($key == count($items_houses) - 1)
            {
                $lastChild = "last-child";
            }
        ?>
        <div class="deatil-top <?=$lastChild?>">
            <div class="thumb">
            <?php
                $thumb = PATH_URL_IMAGES . 'static/uploads/houses/' . $item->images_thumb;
                if(!@file_get_contents($thumb)) {
                    $thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
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
                    <td><?=$type[$item->type];?></td>
                    <td><span class="bg-x">賃料</span></td>
                    <td><?=$item->rent?> USD</td>
                    <td><span>&nbsp;</span></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><span class="bg-x">エリア</span></td>
                    <td><?=$item->area_name;?></td>
                    <td><span class="bg-x">間取り</span></td>
                    <td><?=$item->layout_name?></td>
                    <td><span class="bg-x">面積</span></td>
                    <td><?=$item->size;?></td>
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
    
    
    
    <?php if(!empty($items_office)): ?>
        <?php foreach($items_office as $key=>$item): ?>
        <?php
            $lastChild = '';
            if($key == count($items_office) - 1)
            {
                $lastChild = "last-child";
            }
        ?>
        <div class="deatil-top <?=$lastChild?>">
            <div class="thumb">
                <a href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en;?>">
                    <img src="<?=PATH_URL_IMAGES?>static/uploads/offices/<?=$item->images_thumb;?>" width="172px" />
                </a>
                
            </div>
            <div class="desc">
                <h4 class="title"><span class="icon-new">
                    <a class="title" href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en;?>">
                        <?=$item->name_jp;?></span>
                    </a>
                </h4>                                              
                <table width="473" border="0">
                  <tr>
                    <td><span class="bg-x">エリア</span></td>
                    <td><?=$item->area_name;?></td>
                    <td><span class="bg-x">賃料</span></td>
                    <td><?=$item->size_rent>0?(int)$item->month_rent/(int)$item->size_rent:0?></td>
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
            <p class="read-more"><a href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . $item->name_en;?>">
                <img src="<?=PATH_URL_IMAGES?>static/images/read-more.jpg" /></a>
            </p>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
        <div class="pagination-bottom">
            
        </div>
    </div>

</div>
<?php if(isset($_GET['scroller']) && $_GET['scroller'] == true): ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(this).scrollTop(391);
    })
</script>
<?php endif; ?>