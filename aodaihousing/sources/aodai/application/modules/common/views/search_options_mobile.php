<?php 
    $areas_num = $this->input->get("areas");
    $areas=array(
        3 => lang('lethanhton'),
        2 => lang('quan_1'),
        10 => lang('quanbinhthanh'),
        17 => lang('quan_2'),
        11 => lang('quan_3'),
        13 => lang('quan_7')
    );
?>

<?php 
    if ($areas_num != ""){
?>
    <div class="introduce title-option"><p><?=$areas[$areas_num] ?><?php echo lang('賃貸物件を探す'); ?></p></div>
<?php 
}else {
?>
    <div class="introduce title-option"><p><?php echo lang('ータイプを選んでくださいー'); ?></p></div>
<?php 
}
?>

<div class="list-services">
    <?php  
    // $TYPE_HOUSE=array('0'=>'サービスアパートメント','1'=>'アパートメント・マンション','2'=>'一戸建て','3'=>'店舗');
    $TYPE_HOUSE=array('0'=>'サービスアパート','1'=>'マンション・コンドミニアム','2'=>'一戸建て');
    foreach ($TYPE_HOUSE as $key => $value) {
        ?>
        <div class="label-services type-name" id="<?php ($key==3) ? print '2': print $key; ?>"><p><?=lang($value)?></p></div>
    <?php       
    }
    ?>

</div>

<div class="btn-search enter-search"><p><?php echo lang('検索'); ?></p></div>

<div class="introduce title-option">
    <p>
        <?php echo lang('更に条件を絞ることができます'); ?><br>
        <?php echo lang('ー間取りを選んでくださいー'); ?>
    </p>
</div>

<div class="list-services">
    <?php  
    $LAYOUT_HOUSE=array('11'=>'studioタイプ（ワンルーム）','12'=>'１LDK（１ベッドルーム）','13'=>'２LDK（２ベッドルーム）','14'=>'３LDK（３ベッドルーム）','15'=>'４LDK（４ベッドルーム）');
    $areas = $this->input->get("areas");
    foreach ($LAYOUT_HOUSE as $key => $value) {
        ?>
        <div class="label-services blue-icon layout-name" id="<?= $key; ?>"><p><?=lang($value)?></p></div>
    <?php 
    }
    ?>
</div>

<div class="introduce title-option"><p><?php echo lang('ー賃料を選んでくださいー'); ?></p></div>
<div class="list-services">
    <?php  
    $RENT_HOUSE=array('500'=>'500USD以下','501-1000'=>'501～1000USD','1001-1500'=>'1001～1500USD',
        '1501-2000'=>'1501～2000USD','2001-2500'=>'2001～2500USD','2501-3000'=>'2501～3000USD','3001'=>'3001USD以上');
    $areas = $this->input->get("areas");
    foreach ($RENT_HOUSE as $key => $value) {
        ?>
        <div class="label-services label-rent" id="<?= $key; ?>"><p><?=lang($value)?></p></div>
    <?php   
    }
    ?>
</div>

<!-- <div class="introduce title-option"><p><?php echo lang('ー面積を選んでくださいー'); ?></p></div> -->
<!-- <div class="list-services">
    <?php  
    $SIZE_HOUSE=array('50'=>'50㎡以下','51-81'=>'51㎡～80㎡','81-100'=>'81㎡～100㎡','101-150'=>'101㎡～150㎡','151'=>'151㎡');
    $areas = $this->input->get("areas");
    foreach ($SIZE_HOUSE as $key => $value) {
        ?>
        <div class="label-services blue-icon label-size" id="<?= $key; ?>"><p><?=lang($value)?></p></div>
    <?php 
    }
    ?>
</div> -->

<!--<?php if(current_lang_() == 'vn'){ ?> 
    <div id="scrollSearch" class="scroll-search-vn">
<?php }else{ ?>
    <div id="scrollSearch" class="scroll-search"> 
<?php } ?>
    <p><?php echo lang('検索'); ?></p>
</div>-->

<?php 
$areas = $this->input->get("areas");
?>
<input type="hidden" id="type" value="">
<input type="hidden" id="layout" value="">
<input type="hidden" id="rent" value="">
<input type="hidden" id="size" value="">    

<?php if(current_lang_() == 'vn'){ ?>
    <div class="btn-search search-vn"><p><?php echo lang('検索'); ?></p></div>
<?php }else{ ?>
    <div class="btn-search"><p><?php echo lang('検索'); ?></p></div>
<?php } ?>

<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click', '.type-name', function () { 
        var type = this.id;
        $("#type").val(type);
        $('.type-name').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on('click', '.layout-name', function () {
        var layout = this.id;
        $("#layout").val(layout);
        $('.layout-name').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on('click', '.label-rent', function () {
        var rent = this.id;
        $("#rent").val(rent);
        $('.label-rent').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on('click', '.label-size', function () {
        var size = this.id;
        $("#size").val(size);
        $('.label-size').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on('click', '.btn-search', function () {
        var go_to_url = "<?=PATH_URL ?>search?opt=house&areas=<?= $areas; ?>&layout=" + $("#layout").val() + "&type=" + $("#type").val() + "&size=" + $("#size").val() + "&rent=" + $("#rent").val();
        document.location.href = go_to_url;
    });

    $(document).on('click', '.search-vn', function () {
        var go_to_url = "<?=PATH_URL ?>vn/search?opt=house&areas=<?= $areas; ?>&layout=" + $("#layout").val() + "&type=" + $("#type").val() + "&size=" + $("#size").val() + "&rent=" + $("#rent").val();
        document.location.href = go_to_url;
    });

    /*$(document).on('click', '.scroll-search', function () {
        var go_to_url = "<?=PATH_URL ?>search?opt=house&areas=<?= $areas; ?>&layout=" + $("#layout").val() + "&type=" + $("#type").val() + "&size=" + $("#size").val() + "&rent=" + $("#rent").val();
        document.location.href = go_to_url;
    });

    $(document).on('click', '.scroll-search-vn', function () {
        var go_to_url = "<?=PATH_URL ?>vn/search?opt=house&areas=<?= $areas; ?>&layout=" + $("#layout").val() + "&type=" + $("#type").val() + "&size=" + $("#size").val() + "&rent=" + $("#rent").val();
        document.location.href = go_to_url;
    });*/
});
</script>
