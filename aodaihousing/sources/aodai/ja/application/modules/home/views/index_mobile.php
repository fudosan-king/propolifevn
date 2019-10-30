<div class="banner img-responsive">

    <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>bg_cogai.jpg" alt="" class="img-responsive">
    
    <div class="bg-category"></div>
    <div class="category-info">
        <p><?php echo lang('仲介手数料無料'); ?></p>
        <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>logo.png" alt="" class="img-responsive">
    </div>
</div>

<div class="banner img-responsive">

    <img src="<?=PATH_URL.'static/images/aodai_mobile/'?>banner_top_0507.png" alt="" class="img-responsive">
</div>

<div class="introduce"><p><?php echo lang('ホーチミンの賃貸物件を探す'); ?></p></div>
<?php if(current_lang_() == 'vn'){?>
<div class="list-district">
    <?php  
    $AREA_HOUSE=array('3'=>'lethanhton','2'=>'quan_1','10'=>'quanbinhthanh','17'=>'quan_2','11'=>'quan_3','13'=>'quan_7');
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
                $AREA_HOUSE=array('3'=>'lethanhton','2'=>'quan_1','10'=>'quanbinhthanh','17'=>'quan_2','11'=>'quan_3','13'=>'quan_7');
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
                $AREA_HOUSE=array('2'=>'quan_1','11'=>'quan_3','10'=>'quanbinhthanh','5'=>'quan_phunhuan','8'=>'quan_tanbinh','13'=>'quan_7');
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