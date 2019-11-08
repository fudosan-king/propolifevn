<div class="banner img-responsive">

    <img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>bg_cogai.jpg" alt="" class="img-responsive">

    <div class="bg-category"></div>
    <div class="category-info">
        <p><?php echo lang('仲介手数料無料'); ?></p>
        <img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>logo.png" alt="" class="img-responsive">
    </div>
</div>

<div class="introduce"><p><?php echo lang('ホーチミンの賃貸物件を探す'); ?></p></div>
<?php if(current_lang_() == 'vn'){?>
<div class="list-district">
    <?php  
    $AREA_HOUSE=array('10'=>'quan_binhthanh','17'=>'quan_2','13'=>'quan_7_H','2'=>'quan_1','3'=>'le_thanh_ton','11'=>'quan_3','25'=>'quan_4','5'=>'quan_phunhuan');
    foreach ($AREA_HOUSE as $key => $value) {
        ?>
        <a href="<?=PATH_URL ?>vn/search_options?opt=house&areas=<?=$key?>">
            <div class="label-district"><p><?=lang($value)?></p></div>
        </a>
    <?php 
    }
    ?>
</div> 

<?php }else{ ?>


<div class="Tab">
    <div class="headTab">
        <div onclick="Tab('contentTab-1',this);" class="tabs-1">住宅・戸建</div>
        <div onclick="Tab('contentTab-2',this);" class="tabs-2">オフィス</div>
    </div>
    <div class="tab-content">
        <div id="contentTab-1" class="tab-pane">
            <div class="list-district">
                <?php  
                $AREA_HOUSE=array('10'=>'quan_binhthanh','17'=>'quan_2','13'=>'quan_7_H','2'=>'quan_1','3'=>'le_thanh_ton','11'=>'quan_3','25'=>'quan_4','5'=>'quan_phunhuan');
                foreach ($AREA_HOUSE as $key => $value) {
                    ?>
                    <a href="<?=PATH_URL ?>search_options?opt=house&areas=<?=$key?>">
                        <div class="label-district"><p><?=lang($value)?></p></div>
                    </a>
                <?php 
                }
                ?>
            </div>
        </div><!-- contentTab-1 -->

        <div id="contentTab-2" class="tab-pane">
            <div class="list-district">
                <?php  
                $AREA_HOUSE=array('2'=>'quan_1','11'=>'quan_3','10'=>'quan_binhthanh','5'=>'quan_phunhuan','13'=>'quan_7','-1'=>'quan_khac');
                foreach ($AREA_HOUSE as $key => $value) {
                    ?>
                    <a href="<?=PATH_URL ?>search_options_office?opt=office&areas=<?=$key?>">
                        <div class="label-district"><p><?=lang($value)?></p></div>
                    </a>
                <?php 
                }
                ?>
            </div>
        </div><!-- contentTab-2 -->
    </div>
</div>
<?php } ?>

<script type="text/javascript">
jQuery(document).ready(function() {
    var type = window.location.hash.substr(1);
    if (type == 'houses' || type =='' ) {
        $('.headTab .tabs-1').trigger('click');
    } else if(type == 'offices') {
         $('.headTab .tabs-2').trigger('click');
    }
});
</script>