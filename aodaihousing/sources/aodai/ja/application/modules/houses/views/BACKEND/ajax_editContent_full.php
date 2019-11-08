<script type="text/javascript">
function showRequest(formData, jqForm, options) {
	var form = jqForm[0];
	if(form.name_jp.value == ''){
		alert(' Please enter 建物名（日本語読み）');
		return false;
	}
}
</script>
<?php
$images_gallery = array();
if($result->images_gallery != ''){
    $images_gallery = json_decode($result->images_gallery);
}
?>
<div class="table">
	<div class="head_table"><div class="head_title_edit"><?=$module?></div></div>
	<div class="clearAll"></div>

	<form id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?=$id?>" name="hiddenIdAdmincp" />
	<div class="row_text_field_first">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Status:</td>
				<td class="right_text_field"><input <?php if(isset($result->status)){ if($result->status==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="status" /></td>
			</tr>
		</table>
	</div>

	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">建物名（日本語読み）:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->name_jp)) { print $result->name_jp; }else{ print '';} ?>" type="text" name="name_jp" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">建物名（アルファベット）:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->name_en)) { print $result->name_en; }else{ print '';} ?>" type="text" name="name_en" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">賃料月:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->month_rent)) { print $result->month_rent; }else{ print '';} ?>" type="text" name="month_rent" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">賃料平方メートル:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->size_rent)) { print $result->size_rent; }else{ print '';} ?>" type="text" name="size_rent" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">面積:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->size)) { print $result->size; }else{ print '';} ?>" type="text" name="size" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">階建:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->floors)) { print $result->floors; }else{ print '';} ?>" type="text" name="floors" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">領収書タイプ:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->receipt_type)) { print $result->receipt_type; }else{ print '';} ?>" type="text" name="receipt_type" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">デポジット:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->deposit)) { print $result->deposit; }else{ print '';} ?>" type="text" name="deposit" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">デポジット返還:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->deposit_return)) { print $result->deposit_return; }else{ print '';} ?>" type="text" name="deposit_return" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">家賃支払条件:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->rent_condition)) { print $result->rent_condition; }else{ print '';} ?>" type="text" name="rent_condition" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">支払方法:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->payment_method)) { print $result->payment_method; }else{ print '';} ?>" type="text" name="payment_method" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">契約書:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->contract)) { print $result->contract; }else{ print '';} ?>" type="text" name="contract" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">退去予告:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->move_out)) { print $result->move_out; }else{ print '';} ?>" type="text" name="move_out" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">最近入居期間:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->recent_residence)) { print $result->recent_residence; }else{ print '';} ?>" type="text" name="recent_residence" /></td>
			</tr>
		</table>
	</div>
    
    
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">消耗品補充:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->consumables_replenishment)) { print $result->consumables_replenishment; }else{ print '';} ?>" type="text" name="consumables_replenishment" /></td>
			</tr>
		</table>
	</div>
    
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">鍵:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->key)) { print $result->key; }else{ print '';} ?>" type="text" name="key" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">セキュリティ:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->security)) { print $result->security; }else{ print '';} ?>" type="text" name="security" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">ペット:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->pet)) { print $result->pet; }else{ print '';} ?>" type="text" name="pet" /></td>
			</tr>
		</table>
	</div>
    
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">簡易紹介:</td>
				<td class="right_text_field"><textarea name="introduction" cols="" rows="8"><?php if(isset($result->introduction)) { print $result->introduction; }else{ print '';} ?></textarea></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Common facilities:</td>
				<td class="right_text_field">
                
                <select id="e1" style="width:300px" name="common_facilities">
                <?php if(isset($facilities)): ?>
                    <?php foreach($facilities as $key=>$item): ?>
                        <?php 
                            $selected = '';
                            if(isset($facilitie_db)){
                                if($facilitie_db->common_facility_id == $item->id){
                                    $selected = 'selected="selected"';
                                }
                            }
                            
                            
                        ?>
                        <option <?=$selected;?>  value="<?=$item->id; ?>"><?=$item->name; ?></option>
                   <?php endforeach; ?>
                <?php endif; ?>
                </select>
                </td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Equipments office:</td>
				<td class="right_text_field">
                
                <select id="e2" style="width:300px" name="equipments">
                <?php if(isset($equipments)): ?>
                    <?php foreach($equipments as $key=>$item): ?>
                        <?php 
                            $selected = '';
                            if(isset($equipments_db)){
                                if($equipments_db->equipment_id == $item->id){
                                    $selected = 'selected="selected"';
                                }
                            }
                            
                            
                        ?>
                        <option <?=$selected;?>  value="<?=$item->id; ?>"><?=$item->name; ?></option>
                   <?php endforeach; ?>
                <?php endif; ?>
                </select>
                </td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Area:</td>
				<td class="right_text_field">
                
                <select id="e3" style="width:300px" name="areas">
                <?php if(isset($areas)): ?>
                    <?php foreach($areas as $key=>$item): ?>
                        <?php 
                            $selected = '';
                            if(isset($areas_db)){
                                if($areas_db->area_id == $item->id){
                                    $selected = 'selected="selected"';
                                }
                            }
                            
                            
                        ?>
                        <option <?=$selected;?>  value="<?=$item->id; ?>"><?=$item->name; ?></option>
                   <?php endforeach; ?>
                <?php endif; ?>
                </select>
                </td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">水道代:</td>
				<td class="right_text_field"><input <?php if(isset($result->water_bill)){ if($result->water_bill==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="water_bill" /></td>
                <td class="left_text_field">市内電話:</td>
				<td class="right_text_field"><input <?php if(isset($result->phone_bill)){ if($result->phone_bill==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="phone_bill" /></td>
                <td class="left_text_field">掃除:</td>
				<td class="right_text_field"><input <?php if(isset($result->cleaning)){ if($result->cleaning==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="cleaning" /></td>
                
            </tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">インターネット:</td>
				<td class="right_text_field"><input <?php if(isset($result->internet)){ if($result->internet==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="internet" /></td>
                <td class="left_text_field">プレミアムNHK:</td>
				<td class="right_text_field"><input <?php if(isset($result->premium_nhk)){ if($result->premium_nhk==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="premium_nhk" /></td>
                <td class="left_text_field">門限時間:</td>
				<td class="right_text_field"><input <?php if(isset($result->closing_time)){ if($result->closing_time==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="closing_time" /></td>
                
            </tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">家具持込可否:</td>
				<td style="width: 199px;" class="right_text_field"><input <?php if(isset($result->bringing_furniture)){ if($result->bringing_furniture==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="bringing_furniture" /></td>
                <td class="left_text_field">備考:</td>
				<td class="right_text_field"><input <?php if(isset($result->other_notice)){ if($result->other_notice==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="other_notice" /></td>
            </tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Image Thumb:</td>
				<td class="right_text_field"><input type="file" name="fileAdmincp[images_thumb]" /><?php if(isset($result->images_thumb)){ if($result->images_thumb!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/offices/'.$result->images_thumb?>">Review</a><?php }} ?></td>
			</tr>
		</table>
	</div>      
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%" class="gallery">
        <?php if(isset($images_gallery)): ?>
            <?php foreach($images_gallery as $key=>$value): ?>
			<tr>
				<td class="left_text_field">Image gallery:</td>
				<td class="right_text_field"><input type="file" name="fileAdmincp[images_gallery][]" />- <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/offices/gallery/'.$value?>">Review</a></td>
            </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
				<td class="left_text_field">Image gallery:</td>
				<td class="right_text_field"><input type="file" name="fileAdmincp[images_gallery][]" /></td>
            </tr>
        <?php endif; ?>
		</table>
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td colspan="2">
                    <input type="button" class="add_new_file" name="addfile" value="Add new file">
                </td>
            </tr>
		</table>
	</div>
	</form>
</div>
<style type="text/css">
.add_new_file{
    background-color: #5BB75B;
    background-image: -moz-linear-gradient(center top , #62C462, #51A351);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #FFFFFF;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    cursor: pointer;
}
.gallery td{
    padding: 15px 0;
}
.del_input {
  color: red;
  font-weight: bold;
  margin-left: 10px;
  cursor: pointer;
}
</style>
<script type="text/javascript">

    $(document).ready(function(){
        var html = '<tr><td class="left_text_field">Image gallery:</td><td class="right_text_field"><input type="file" name="fileAdmincp[images_gallery][]"><span class="del_input">Del</span></td></tr>';
        $(".add_new_file").click(function(){
            $(".gallery").append(html).hide().show(1000);
        })
        $(".del_input").live('click', function(){
            $(this).parent().parent().remove();
        })
    })
</script>