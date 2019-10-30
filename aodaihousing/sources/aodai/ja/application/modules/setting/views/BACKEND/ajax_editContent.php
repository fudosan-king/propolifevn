<script type="text/javascript">
function save(){
	var options = {
		beforeSubmit:  showRequest,  // pre-submit callback 
		success:       showResponse  // post-submit callback 
    };
	$('#frmManagement').ajaxSubmit(options);
}

function showRequest(formData, jqForm, options) {
	var form = jqForm[0];
	if(form.gd_key.value == ''){
		alert('Vui lòng điền đầy đủ thông tin.');
		return false;
	}
        if(form.gd_value.value == ''){
		alert('Vui lòng điền đầy đủ thông tin.');
		return false;
	}
        if(form.gd_description.value == ''){
		alert('Vui lòng điền đầy đủ thông tin.');
		return false;
	}
}
</script>

<div class="table">
	<div class="head_table"><div class="head_title_edit"><?php echo $module?></div></div>
	<div class="clearAll"></div>
	<form id="frmManagement" action="<?php echo PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo $id?>" name="hiddenIdAdmincp" />
	<div class="row_text_field_first">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Status:</td>
				<td class="right_text_field"><input <?php if(isset($result->status)){ if($result->status==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="statusAdmincp" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Key:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->key)) { print $result->key; }else{ print '';} ?>" type="text" name="gd_key" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Value:</td>
				<td class="right_text_field"><textarea name="gd_value"><?php if(isset($result->value)) { print $result->value; }else{ print '';} ?></textarea></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Description:</td>
				<td class="right_text_field"><textarea name="gd_description"><?php if(isset($result->description)) { print $result->description; }else{ print '';} ?></textarea></td>
			</tr>
		</table>
	</div>
	
	</form>
</div>