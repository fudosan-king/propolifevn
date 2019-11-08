<script type="text/javascript">
function showRequest(formData, jqForm, options) {
	var form = jqForm[0];
	if(form.titleUserAdmincp.value == ''){
		alert('Vui lòng điền đầy đủ thông tin.');
		return false;
	}
}
</script>
<div class="error"></div>
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
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Username:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->username)) { print $result->username; }else{ print '';} ?>" type="text" name="titleUserAdmincp" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Password:</td>
				<td class="right_text_field"><input value="" type="password" name="titlePassAdmincp" /></td>
			</tr>
		</table>
	</div>
	</form>
</div>