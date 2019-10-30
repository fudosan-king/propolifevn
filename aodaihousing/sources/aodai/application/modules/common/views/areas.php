<select id="s1" name="areas" style="width: 165px;">
    <option value=""><?php echo lang('エリア'); ?></option>
<?php
if(!empty($itemAreas)){
    foreach($itemAreas as $key=>$item){
        ?>
        <option value="<?=$key ?>"><?=lang($item);?></option>
        <?php
    }
}
?>
</select>