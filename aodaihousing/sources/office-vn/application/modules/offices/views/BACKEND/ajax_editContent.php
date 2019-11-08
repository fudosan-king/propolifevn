<script type="text/javascript">
function showRequest(formData, jqForm, options) {
	var valid = $("#frmManagement").validationEngine('validate');
    var vars = $("#frmManagement").serialize();
     
    if (valid == true) {
      
        return true;
    } else {
        return false;
        //$("#frmManagement").validationEngine();
    }
}
</script>
<?php
if(isset($result->images_gallery) && $result->images_gallery != ''){
    $images_gallery = json_decode($result->images_gallery);
}
?>

<form id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
        <div class="widget">       
            <ul class="tabs">
                <?php foreach(config('language_code') as $key=>$value): ?>
                    <li><a class="icon-<?=$key;?>" href="#<?=$key;?>"><?=lang('admin_'.$value);?></a></li>
                <?php endforeach; ?>
        	</ul>
            <?php
            $string = strval(' {"vn":"Nguyen Cong Tru \u901a\u308a 1\u533a  (26)","jp":"Nguyen Cong Tru \u901a\u308a 1\u533a  (26)"}');
            $tmp = vcp_printf($string, 'jp');
            
            ?>
            
            <div class="tab_container">
                <?php foreach(config('language_code') as $key=>$value): ?>
                    <div id="<?=$key;?>" class="tab_content">
                    
                    
                    
                    

                	<div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">建物名（日本語読み） - <?php echo strtoupper($key); ?>:</td>
                                
                				<td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->name_jp)) { print vcp_printf($result->name_jp, $key); }else{ print '';} ?>" type="text" name="name_jp[<?=$key; ?>]" /></td>
                                <td class="left_text_field">建物名（アルファベット） - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->name_en)) { print vcp_printf($result->name_en, $key); }else{ print '';} ?>" type="text" name="name_en[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">賃料月 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input class="validate[custom[number]]" value="<?php if(isset($result->month_rent)) { print vcp_printf($result->month_rent, $key); }else{ print '';} ?>" type="text" name="month_rent[<?=$key; ?>]" /></td>
                                <td class="left_text_field">賃料平方メートル - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input class="validate[custom[number]]" value="<?php if(isset($result->size_rent)) { print  vcp_printf($result->size_rent, $key); }else{ print '';} ?>" type="text" name="size_rent[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">賃料補足 - <?php echo strtoupper($key); ?>:</td>
                                                <td class="right_text_field"><input value="<?php if(isset($result->rent_notice)) { print vcp_printf($result->rent_notice, $key); }else{ print '';} ?>"  type="text" name="rent_notice[<?=$key; ?>]" /></td>
                                <td class="left_text_field">面積 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->size)) { print vcp_printf($result->size, $key); }else{ print '';} ?>"  type="text" name="size[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">階建 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->floors)) { print vcp_printf($result->floors, $key); }else{ print '';} ?>" type="text" name="floors[<?=$key; ?>]" /></td>
                                <td class="left_text_field">領収書タイプ - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->receipt_type)) { print vcp_printf($result->receipt_type, $key); }else{ print '';} ?>" type="text" name="receipt_type[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">デポジット - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->deposit)) { print vcp_printf($result->deposit, $key); }else{ print '';} ?>" type="text" name="deposit[<?=$key; ?>]" /></td>
                                <td class="left_text_field">デポジット返還 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->deposit_return)) { print vcp_printf($result->deposit_return, $key); }else{ print '';} ?>" type="text" name="deposit_return[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">家賃支払条件 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->rent_condition)) { print vcp_printf($result->rent_condition, $key); }else{ print '';} ?>" type="text" name="rent_condition[<?=$key; ?>]" /></td>
                                <td class="left_text_field">支払方法 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->payment_method)) { print vcp_printf($result->payment_method, $key); }else{ print '';} ?>" type="text" name="payment_method[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">契約書 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->contract)) { print vcp_printf($result->contract, $key); }else{ print '';} ?>" type="text" name="contract[<?=$key; ?>]" /></td>
                                <td class="left_text_field">退去予告 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->move_out)) { print vcp_printf($result->move_out, $key); }else{ print '';} ?>" type="text" name="move_out[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">入居開始時間 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->recent_residence)) { print vcp_printf($result->recent_residence, $key); }else{ print '';} ?>" type="text" name="recent_residence[<?=$key; ?>]" /></td>
                                <td class="left_text_field">消耗品補充 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->consumables_replenishment)) { print vcp_printf($result->consumables_replenishment, $key); }else{ print '';} ?>" type="text" name="consumables_replenishment[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    
                    
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">鍵 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->key)) { print vcp_printf($result->key, $key); }else{ print '';} ?>" type="text" name="key[<?=$key; ?>]" /></td>
                                <td class="left_text_field">セキュリティ - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->security)) { print vcp_printf($result->security, $key); }else{ print '';} ?>" type="text" name="security[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">電気代 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->electric_bill)) { print vcp_printf($result->electric_bill, $key); }else{ print '';} ?>" type="text" name="electric_bill[<?=$key; ?>]" /></td>
                                <td class="left_text_field">飲料水代 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->drink_water_bill)) { print vcp_printf($result->drink_water_bill, $key); }else{ print '';} ?>" type="text" name="drink_water_bill[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">水道代 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->water_bill)) { print vcp_printf($result->water_bill, $key); }else{ print '';} ?>" type="text" name="water_bill[<?=$key; ?>]" /></td>
                                <td class="left_text_field">電話代 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->phone_bill)) { print vcp_printf($result->phone_bill, $key); }else{ print '';} ?>" type="text" name="phone_bill[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">門限時間 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->closing_time)) { print vcp_printf($result->closing_time, $key); }else{ print '';} ?>" type="text" name="closing_time[<?=$key; ?>]" /></td>
                                <td class="left_text_field">セキュリティ - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->security)) { print vcp_printf($result->security, $key); }else{ print '';} ?>" type="text" name="security[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                                <td class="left_text_field">プレミアムNHK - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input style="width: 87%;" value="<?php if(isset($result->premium_nhk)) { print vcp_printf($result->premium_nhk, $key); }else{ print '';} ?>" type="text" name="premium_nhk[<?=$key; ?>]" /></td>
                                <td class="left_text_field">ライセンス - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->license)) { print vcp_printf($result->license, $key); }else{ print '';} ?>" type="text" name="license[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                                <td class="left_text_field">インターネット - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->internet)) { print vcp_printf($result->internet, $key); }else{ print '';} ?>" type="text" name="internet[<?=$key; ?>]" /></td>
                                <td class="left_text_field">掃除 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->cleaning)) { print vcp_printf($result->cleaning, $key); }else{ print '';} ?>" type="text" name="cleaning[<?=$key; ?>]" /></td>
                                
                                
                                
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                                <td class="left_text_field">ガス代 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->gas_bill)) { print vcp_printf($result->gas_bill, $key); }else{ print '';} ?>" type="text" name="gas_bill[<?=$key; ?>]" /></td>
                                <td class="left_text_field">家具持込可否 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->bringing_furniture)) { print vcp_printf($result->bringing_furniture, $key); }else{ print '';} ?>" type="text" name="bringing_furniture[<?=$key; ?>]" /></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                                <td class="left_text_field">ペット - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><input style="width: 36%;" value="<?php if(isset($result->pet)) { print vcp_printf($result->pet, $key); }else{ print '';} ?>" type="text" name="pet[<?=$key; ?>]" /></td>
                                <td></td>
                                <td></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">簡易紹介 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><textarea name="introduction[<?=$key; ?>]" cols="" rows="8"><?php if(isset($result->introduction)) { print vcp_printf($result->introduction, $key); }else{ print '';} ?></textarea></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">取材コメント - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><textarea name="comment[<?=$key; ?>]" cols="" rows="8"><?php if(isset($result->comment)) { print vcp_printf($result->comment, $key); }else{ print '';} ?></textarea></td>
                			</tr>
                		</table>
                	</div>
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">備考 - <?php echo strtoupper($key); ?>:</td>
                				<td class="right_text_field"><textarea name="other_notice[<?=$key; ?>]" cols="" rows="8"><?php if(isset($result->other_notice)) { print vcp_printf($result->other_notice, $key); }else{ print '';} ?></textarea></td>
                			</tr>
                		</table>
                	</div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    </div>
                <?php endforeach; ?>
            </div>	
            <div class="fix"></div>	 
        </div>










<div class="table">
	<div class="head_table"><div class="head_title_edit"><?=$module?></div></div>
	<div class="clearAll"></div>

	
	<input type="hidden" value="<?=$id?>" name="hiddenIdAdmincp" />
	
    
    



	<div class="row_text_field_first">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Status:</td>
				<td class="right_text_field"><input <?php if(isset($result->status)){ if($result->status==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="status" /></td>
				<td class="left_text_field">Recommended:</td>
				<td class="right_text_field"><input <?php if(isset($result->recommended)){ if($result->recommended==1){ ?>checked="checked"<?php }}else{ ?><?php } ?> type="checkbox" class="custom_chk" name="recommended" /></td>
			</tr>
		</table>
	</div>
    
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
                <td class="left_text_field">Area:</td>
				<td class="right_text_field">
                
                <select id="e3" style="width:300px" name="areas">
                <?php if(!empty($areas)): ?>
                    <?php foreach($areas as $key_=>$item): ?>
                        <?php 
                            $selected = '';
                            if(!empty($areas_db)){
                                if($areas_db->area_id == $item->id){
                                    $selected = 'selected="selected"';
                                }
                            }
                            
                            
                        ?>
                        <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, current_lang_()); ?></option>
                   <?php endforeach; ?>
                <?php endif; ?>
                </select>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
			</tr>
		</table>
	</div>
    <?php
        $data_db = array();  
        if(!empty($category_db)){
            foreach($category_db as $item) {
                $data_db[] = $item->cate_id;
            }
        }  
    ?>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
                <td class="left_text_field">Category main:</td>
				<td class="right_text_field">
                    <select multiple  id="e5" style="width:300px" name="category_main[]">
                    <?php if(!empty($category_main)): ?>
                        <?php foreach($category_main as $key_=>$item): ?>
                            <?php 
                                $selected = '';
                                if(!empty($category_db)){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'selected="selected"';
                                    }
                                }
                            ?>
                            <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, 'jp'); ?></option>
                       <?php endforeach; ?>
                    <?php endif; ?>
                    </select>
                </td>
				<td class="left_text_field">Category special:</td>
				<td class="right_text_field">
                    <select multiple id ="e6" style="width:300px" name="category_special[]">
                    <?php if(!empty($category_special)): ?>
                        <?php foreach($category_special as $key_=>$item): ?>
                            <?php 
                                $selected = '';
                                if(!empty($category_db)){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'selected="selected"';
                                    }
                                }
                            ?>
                            <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, 'jp'); ?></option>
                       <?php endforeach; ?>
                    <?php endif; ?>
                    </select>
                </td>
			</tr>
		</table>
	</div>

<!--Tags -->
<?php
$tag_db = array();  
if(!empty($tagsDB)){
    foreach($tagsDB as $item) {
        $tag_db[] = $item->tags_id;
    }
}  
?>
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Tags:</td>
                <td class="right_text_field">
                    <select multiple="multiple"  id="e1" style="width:100%" name="tags[]">
                    <?php if(!empty($tagList)): ?>
                        <?php foreach($tagList as $key_=>$item): ?>
                            <?php 
                                $selected = '';
                                if(!empty($tagsDB)){
                                    if(in_array($item->id,$tag_db)){
                                        $selected = 'selected="selected"';
                                    }
                                }
                            ?>
                            <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, 'jp'); ?></option>
                       <?php endforeach; ?>
                    <?php endif; ?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
<!-- End tags -->
    
    <?php
    $data_db = array();  
        if(!empty($equipments_db)){
            foreach($equipments_db as $item) {
                $data_db[] = $item->equipment_id;
            }
        }  
    ?>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Equipments:</td>
				<td class="right_text_field">
                    <?php if(!empty($equipments)): ?>
                        <?php foreach($equipments as $item): ?>
                            <?php 
                                $selected = '';
                                if(!empty($data_db)){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'checked="checked"';
                                    }
                                }
                            ?>
                            <div class="warp-check">
                                <span class="span-check"><?=vcp_printf($item->name, 'jp'); ?></span>
                                <span><input <?=$selected; ?> value="<?=$item->id; ?>" type="checkbox" class="custom_chk" name="equipment[]" /></span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?> 
                
                </td>
				
			</tr>
		</table>
	</div>
    <?php
    $data_db = array();  
        if(!empty($facilitie_db)){
            foreach($facilitie_db as $item) {
                $data_db[] = $item->common_facility_id;
            }
        }
    ?>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Common facilities:</td>
				<td class="right_text_field">
                    <?php if(!empty($facilities)): ?>
                        <?php foreach($facilities as $item): ?>
                            <?php 
                                $selected = '';
                                if(!empty($data_db)){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'checked="checked"';
                                    }
                                }
                            ?>
                            <div class="warp-check">
                                <span class="span-check"><?php echo vcp_printf($item->name, 'jp')?></span>
                                <span><input <?=$selected; ?> value="<?=$item->id; ?>" type="checkbox" class="custom_chk" name="facilities[]" /></span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?> 
                
                </td>
				
			</tr>
		</table>
	</div>
    
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Image Thumb(192×118):</td>
				<td class="right_text_field"><input type="file" name="fileAdmincp[images_thumb]" /><?php if(isset($result->images_thumb)){ if($result->images_thumb!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/offices/'.$result->images_thumb?>">Review</a><?php }} ?></td>
			</tr>
		</table>
	</div>      
    <div class="row_text_field">
		
        <div class="pics" id="image-list">
                <ul>
                <?php if(!empty($images_gl)): ?>
                    <?php foreach($images_gl as $gls): ?>
                        <li id="recordsArray_<?=$gls->id?>"><a title="" href="#"><img width="101" height="101" alt="" src="<?=PATH_URL_IMAGES?>static/uploads/offices/gallery/<?=$gls->name_image;?>"></a>
                            <div style="display: none;" class="actions">
                            
                                <a title="" href="javascript:void(0)"><img onclick="deleteItemGl('<?=$gls->id; ?>', this)" alt="" src="<?=PATH_URL_IMAGES?>static/images/admin/icons/delete.png"></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                </ul> 
                <div class="fix"></div>
            </div>
            <span id="status" ></span>
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td colspan="2">
                    <input type="button" class="add_new_file" id="upload" name="addfile" value="Add Image file">(550x365)
                </td>
            </tr>
		</table>

		
		<ul id="files" ></ul>
<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: root + '/admincp/'+module+'/upload',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				//On completion clear the status
				status.text('');
				//Add uploaded file to list
				if(response!=="error"){
					$('#image-list ul').append(response);
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
</script>



	</div>
	
</div>
</form>
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
        var html = '<tr><td class="left_text_field">Image gallery(550×365):</td><td class="right_text_field"><input type="file" name="fileAdmincp[images_gallery][]"><span class="del_input">Del</span></td></tr>';
        $(".add_new_file").click(function(){
            $(".gallery").append(html).hide().show(1000);
        })
        $(".del_input").live('click', function(){
            $(this).parent().parent().remove();
        })
        
        $("#frmManagement").validationEngine({
            promptPosition : "bottomLeft", 
            scroll: false,
        });
        
        
        $("#image-list ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&'; 
			$.post(root +"admincp/<?=$module?>/order_img", order, function(theResponse){
				//$("#contentRight").html(theResponse);
			}); 															 
		}								  
		});
        
    })
</script>

