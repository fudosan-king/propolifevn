<?php 
    $areas_num = $this->input->get("areas");
    $areas=array(
        2 => lang('quan_1'),
        11 => lang('quan_3'),
        10 => lang('quanbinhthanh'),
        5 => lang('quan_phunhuan'),
        8 => lang('quan_tanbinh'),
        13 => lang('quan_7')
    );
?>
<div class="introduce title-option"><p><?php echo lang('ー賃料を選んでくださいー'); ?></p></div>
<div class="list-services">
    <?php  
    $RENT_OFFICE=array('1000' => '1000USD以下','1001-1500' => '1001～1500USD','1501-2000' => '1501～2000USD','2001-2500' => '2001～2500USD','2501-3000' => '2501～3000USD','3001-3500' => '3001～3500USD','3501' => '3501USD以上');
    $areas = $this->input->get("areas");
    foreach ($RENT_OFFICE as $key => $value) {
        ?>
        <div class="label-services label-rent" id="<?= $key; ?>"><p><?=lang($value)?></p></div>
    <?php   
    }
    ?>
</div>

<div class="introduce title-option"><p><?php echo lang('ー面積を選んでくださいー'); ?></p></div>
<div class="list-services">
    <?php  
    $SIZE_HOUSE=array('50'=>'50㎡以下','51-81'=>'51㎡～80㎡','81-100'=>'81㎡～100㎡','101-150'=>'101㎡～150㎡','151'=>'151㎡');
    $areas = $this->input->get("areas");
    foreach ($SIZE_HOUSE as $key => $value) {
        ?>
        <div class="label-services blue-icon label-size" id="<?= $key; ?>"><p><?=lang($value)?></p></div>
    <?php 
    }
    ?>
</div>

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
        var go_to_url = "<?=PATH_URL ?>search?opt=office&areas=<?= $areas; ?>&layout=" + $("#layout").val() + "&type=" + $("#type").val() + "&size=" + $("#size").val() + "&month_rent=" + $("#rent").val();
        document.location.href = go_to_url;
    });

    $(document).on('click', '.search-vn', function () {
        var go_to_url = "<?=PATH_URL ?>vn/search?opt=office&areas=<?= $areas; ?>&layout=" + $("#layout").val() + "&type=" + $("#type").val() + "&size=" + $("#size").val() + "&month_rent=" + $("#rent").val();
        document.location.href = go_to_url;
    });
});
</script>
