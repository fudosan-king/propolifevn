<style type="text/css">
    .future-3{
        margin-bottom: 25px;
        overflow: hidden;
    }
    .future-4{
        margin-bottom: 25px;
        overflow: hidden;
    }
</style>
<?php 
    $data_opt = array(1=>'house', 2=>'office');
    if(current_lang_() == 'vn'){
        $tien_te = 'USD';
    }else{
        $tien_te = 'USD';
    }
?>
<?php if(!empty($items_house) || !empty($items_office)): ?>
    <div class="feture-2 feture">
        <div class="header-box">
            <div class="box-icon icon-build-2">
                <h3>
                <?php  
                    if(!empty($get_cat)){
                        echo vcp_printf($get_cat->name, current_lang_());
                    }
                    $type_p = $get_cat->type_p;
                ?>
                </h3>
                <div class="box-popup">
                    <a href="<?=PATH_URL?>search?opt=<?=$data_opt[$type_p]; ?>&catid=<?=$get_cat->id?>&catname=<?php echo vcp_printf($get_cat->name, current_lang_()); ?>"><?php echo lang('もっと見る'); ?></a>
                </div>
            </div>
            
        </div>
        <div class="box-item">
        <?php if(!empty($items_house)):?>
            <?php foreach($items_house as $item):
                $v = 0;
                $thumb = '';
            ?>
            <div class="item">
                <?php
                    if($item->images_thumb != ''){
                        $thumb = PATH_URL_IMAGES . 'static/uploads/houses/' . $item->images_thumb;
                    }elseif (isset($imagesGalleryHouses)){
                        foreach ($imagesGalleryHouses as $img){
                            if(($img->house_id == $item->id) && ($v < 1)){
                                $v = $v + 1;
                                $thumb = PATH_URL_IMAGES . 'static/uploads/houses/gallery/' . $img->name_image;
                            }
                        }
                    }
                    if(!@file_get_contents($thumb)) {
                        //$thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
                    }    
                ?>
                <a href="<?=create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>"><img src="<?=$thumb;?>" /></a>
                
                <p class="name-building"><?php echo lang('物件名'); ?><?php echo vcp_printf($item->name_en, current_lang_());?></p>
                <p><?php echo lang('賃料'); ?>: <?php echo vcp_printf($item->rent, current_lang_()); ?> <?=$tien_te;?></p>
                <p><?php echo lang('間取り'); ?>: <?php echo vcp_printf($item->layout_name, current_lang_());?></p>
                <p><?php echo lang('エリア'); ?>: <?php echo vcp_printf($item->area_name, current_lang_()); ?></p>
                <a href="<?=create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>">
                    <h4>
                        <?php 
                            CutTextNew(vcp_printf($item->name_jp, current_lang_()), 70);
                        ?>
                    </h4>
                </a>
                <p class="content">
                    <!--<?=mb_strcut(vcp_printf($item->introduction, current_lang_()), 0, 100);?>-->
                    <?php 
                        $string = mb_strlen(vcp_printf($item->introduction, current_lang_()),'utf-8');
                        if($string<=65){
                            echo vcp_printf($item->introduction, current_lang_());
                        }
                        else{
                            echo mb_substr(vcp_printf($item->introduction, current_lang_()), 0, 65, 'utf-8') . '...';
                        }
                    ?>
                </p>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if(!empty($items_office)): ?>
            <?php foreach($items_office as $item):
                $v = 0;
                $thumb = '';?>
            <div class="item" style="min-height: 230px!important;">
                <?php
                    if($item->images_thumb != ''){
                        $thumb = PATH_URL_IMAGES . 'static/uploads/offices/' . $item->images_thumb;
                    }elseif (isset($imagesGalleryOffices)){
                        foreach ($imagesGalleryHouses as $img){
                            if(($img->office_id == $item->id) && ($v < 1)){
                                $v = $v + 1;
                                $thumb = PATH_URL_IMAGES . 'static/uploads/offices/gallery/' . $img->name_image;
                            }
                        }
                    }
                    if(!@file_get_contents($thumb)) {
                        //$thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
                    }    
                ?>
                <a href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>"><img src="<?=$thumb;?>" /></a>
                   
                <p class="name-building"><?php echo lang('物件名'); ?><?php echo vcp_printf($item->name_en, current_lang_());?></p>
                <p><?php echo lang('賃料'); ?>: <?php echo vcp_printf($item->month_rent, current_lang_()); ?> <?=$tien_te;?></p>
                <p><?php echo lang('エリア'); ?>: <?php echo vcp_printf($item->area_name, current_lang_()); ?></p>
                <a href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>">
                    <h4>
                        <?php 
                             CutTextNew(vcp_printf($item->name_jp, current_lang_()), 70);
                        ?>
                    </h4>
                </a>
                <p class="content">
                    <!--<?=mb_strcut(vcp_printf($item->introduction, current_lang_()), 0, 70);?>-->
                    <?php 
                        $string = mb_strlen(vcp_printf($item->introduction, current_lang_()),'utf-8');
                        if($string<=65){
                            echo vcp_printf($item->introduction, current_lang_());
                        }
                        else{
                            echo mb_substr(vcp_printf($item->introduction, current_lang_()), 0, 65, 'utf-8') . '...';
                        }
                    ?>
                </p>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        
    </div>
    <?php if (!empty($get_2_cat_top)): ?>
        <?php foreach ($get_2_cat_top as $key => $value): ?>
            <div class="feture-<?= $key+3; ?> feture">
                <div class="header-box">
                    <div class="box-icon icon-build-2">
                        <h3>
                        <?php  
                            echo vcp_printf($value->name, current_lang_());
                            $type_p = $value->type_p;
                        ?>
                        </h3>
                        <div class="box-popup">
                            <a href="<?=PATH_URL?>search?opt=<?=$data_opt[$type_p]; ?>&catid=<?=$value->id?>&catname=<?php echo vcp_printf($value->name, current_lang_()); ?>"><?php echo lang('もっと見る'); ?></a>
                        </div>
                    </div>
                    
                </div>
                <?php (!empty($value->items_house_2)) ? $items_house_2 = $value->items_house_2 :  $items_house_2 = array(); ?>
                <?php (!empty($value->items_office_2)) ? $items_office_2 = $value->items_office_2 :  $items_office_2 = array(); ?>
                <div class="box-item">
                <?php if(!empty($items_house_2)): ?>
                    <?php foreach($items_house_2 as $item):
                        $v = 0;
                        $thumb = '';?>
                    <div class="item">
                        <?php
                            if($item->images_thumb != ''){
                                $thumb = PATH_URL_IMAGES . 'static/uploads/houses/' . $item->images_thumb;
                            }elseif (isset($imagesGalleryHouses)){
                                foreach ($imagesGalleryHouses as $img){
                                    if(($img->house_id == $item->id) && ($v < 1)){
                                        $v = $v + 1;
                                        $thumb = PATH_URL_IMAGES . 'static/uploads/houses/gallery/' . $img->name_image;
                                    }
                                }
                            }
                            if(!@file_get_contents($thumb)) {
                                //$thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
                            }    
                        ?>
                        <a href="<?=create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>"><img src="<?=$thumb;?>" /></a>
                        <p class="name-building"><?php echo lang('物件名'); ?><?php echo vcp_printf($item->name_en, current_lang_());?></p>
                        <p><?php echo lang('賃料'); ?>: <?php echo vcp_printf($item->rent, current_lang_()); ?> <?=$tien_te;?></p>
                        <p><?php echo lang('間取り'); ?>: <?php echo vcp_printf($item->layout_name, current_lang_());?></p>
                        <p><?php echo lang('エリア'); ?>: <?php echo vcp_printf($item->area_name, current_lang_()); ?></p>
                        <a href="<?=create_url("houses/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>">
                            <h4>
                                <?php 
                                    CutTextNew(vcp_printf($item->name_jp, current_lang_()), 70);
                                ?>
                            </h4>
                        </a>
                        <p class="content">
                            <!--<?=mb_strcut(vcp_printf($item->introduction, current_lang_()), 0, 100);?>-->
                            <?php 
                                $string = mb_strlen(vcp_printf($item->introduction, current_lang_()),'utf-8');
                                if($string<=65){
                                    echo vcp_printf($item->introduction, current_lang_());
                                }
                                else{
                                    echo mb_substr(vcp_printf($item->introduction, current_lang_()), 0, 65, 'utf-8') . '...';
                                }
                            ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if(!empty($items_office_2)): ?>
                    <?php foreach($items_office_2 as $item): ?>
                    <div class="item">
                        <?php
                            $thumb = PATH_URL_IMAGES . 'static/uploads/offices/' . $item->images_thumb;
                            if(!@file_get_contents($thumb)) {
                                //$thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
                            }    
                        ?>
                        <a href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>"><img src="<?=$thumb;?>" /></a>
                        <p class="name-building"><?php echo lang('物件名'); ?><?php echo vcp_printf($item->name_en, current_lang_());?></p>
                        <p><?php echo lang('賃料'); ?>: <?php echo vcp_printf($item->month_rent, current_lang_()); ?> <?=$tien_te;?></p>
                        <p><?php echo lang('エリア'); ?>: <?php echo vcp_printf($item->area_name, current_lang_()); ?></p>
                        <a href="<?=create_url("offices/detail/" . $item->id . '/' . vcp_printf($item->name_jp, current_lang_()));?>">
                            <h4>
                                <?php 
                                     CutTextNew(vcp_printf($item->name_jp, current_lang_()), 70);
                                ?>
                            </h4>
                        </a>
                        <p class="content">
                            <!--<?=mb_strcut(vcp_printf($item->introduction, current_lang_()), 0, 70);?>-->
                            <?php 
                                $string = mb_strlen(vcp_printf($item->introduction, current_lang_()),'utf-8');
                                if($string<=65){
                                    echo vcp_printf($item->introduction, current_lang_());
                                }
                                else{
                                    echo mb_substr(vcp_printf($item->introduction, current_lang_()), 0, 65, 'utf-8') . '...';
                                }
                            ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
                
            </div>
    <?php endforeach ?>
<?php endif ?>

<?php endif; ?>