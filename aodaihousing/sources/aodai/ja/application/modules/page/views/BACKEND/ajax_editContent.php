<script type="text/javascript">
function showRequest(formData, jqForm, options) {
	var form = jqForm[0];
	/*
    if(form.titleAdmincp.value == ''){
		alert('Vui lòng điền đầy đủ thông tin.');
		return false;
	}
    */
}
</script>
<div class="table">
	<div class="head_table"><div class="head_title_edit"><?=$module?></div></div>
	<div class="clearAll"></div>

	<form id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?=$id?>" name="hiddenIdAdmincp" />
	<div class="row_text_field_first">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Status:</td>
				<td class="right_text_field"><input <?php if(isset($result->status)){ if($result->status==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="statusAdmincp" /></td>
			</tr>
		</table>
	</div>

	
    <div class="row_text_field" style="display: none;">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Start Publishing:</td>
				<td class="right_text_field"><input id="caledar_from" value="<?php if(isset($result->publish_from)) { print $result->publish_from; }else{ print '';} ?>" type="text" name="vcp_publish_from" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field" style="display: none;">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Finish Publishing:</td>
				<td class="right_text_field"><input id="caledar_to" value="<?php if(isset($result->publish_to)) { print $result->publish_to; }else{ print '';} ?>" type="text" name="vcp_publish_to" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field" style="display: none;">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Description:</td>
				<td class="right_text_field"><textarea name="descAdmincp" cols="" rows="8"><?php if(isset($result->description)) { print $result->description; }else{ print '';} ?></textarea></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">H1:</td>
				<td class="right_text_field"><textarea name="tag_h1" cols="" rows="8"><?php if(isset($result->tag_h1)) { print $result->tag_h1; }else{ print '';} ?></textarea></td>
			</tr>
		</table>
	</div>
	<!-------muti language---------------------->
    <div class="widget" style="margin-top: 0;" >       
            <ul class="tabs">
                <?php foreach(config('language_code') as $key=>$value): ?>
                    <li><a class="icon-<?=$key;?>" href="#<?=$key;?>"><?=lang('admin_'.$value);?></a></li>
                <?php endforeach; ?>
        	</ul>
            
            <div class="tab_container">
                <?php foreach(config('language_code') as $key=>$value): ?>
                    <div id="<?=$key;?>" class="tab_content">
                    
                    
                    
                    
                    <div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">Title:</td>
                				<td class="right_text_field"><input value="<?php if(isset($result->title)) { print vcp_printf($result->title, $key); }else{ print '';} ?>" type="text" name="titleAdmincp[<?=$key?>]" /></td>
                			</tr>
                		</table>
                	</div>
                	<div class="row_text_field">
                		<table cellspacing="0" cellpadding="0" border="0" width="100%">
                			<tr>
                				<td class="left_text_field">Content:</td>
                				<td class="right_text_field" style="padding-right: 0px;">
                					<textarea name="contentAdmincp[<?=$key?>]" id="contentAdmincp_<?=$key?>" cols="" rows="8"><?php if(isset($result->content)) { print vcp_printf($result->content, $key); }else{ print '';} ?></textarea>
                					<script type="text/javascript">
                						var oEdit1_<?=$key?> = new InnovaEditor("oEdit1_<?=$key?>");
                						oEdit1_<?=$key?>.width = "100%";
                						oEdit1_<?=$key?>.cmdAssetManager="modalDialogShow('"+root+"static/editor/assetmanager/assetmanager.php',640,445);";
                						oEdit1_<?=$key?>.REPLACE("contentAdmincp_<?=$key?>");
                					</script>
                				</td>
                			</tr>
                		</table>
                	</div>
                    

                    </div>
                <?php endforeach; ?>
            </div>	
            <div class="fix"></div>	 
        </div>
    <!--------------end muti language----------------------->
	
	<div class="row_text_field" style="display: none">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Image:</td>
				<td class="right_text_field"><input type="file" name="fileAdmincp[images]" /><?php if(isset($result->images)){ if($result->images!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/news/'.$result->images?>">Review</a><?php }} ?></td>
			</tr>
		</table>
	</div>
	
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Image Thumb:</td>
				<td class="right_text_field"><input type="file" name="fileAdmincp[images_thumb]" /><?php if(isset($result->images_thumb)){ if($result->images_thumb!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/news/'.$result->images_thumb?>">Review</a><?php }} ?></td>
			</tr>
		</table>
	</div>
	</form>
</div>