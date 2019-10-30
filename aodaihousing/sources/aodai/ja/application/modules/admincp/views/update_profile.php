<script type="text/javascript">
function showRequest(formData, jqForm, options) {
	var form = jqForm[0];
	if(form.oldpassAdmincp.value == '' || form.newpassAdmincp.value == '' || form.renewpassAdmincp.value == ''){
		alert('Please complete the information.');
		return false;
	}
	
	if(form.newpassAdmincp.value != form.renewpassAdmincp.value){
		alert('New password & Re-new password incorrect.');
		return false;
	}
}
</script>
<div class="table">
	<div class="head_table"><div class="head_title_edit">Update profile</div></div>
	<div class="clearAll"></div>

	<form id="frmManagement" action="<?=PATH_URL.'admincp/update_profile/'?>" method="post" enctype="multipart/form-data">
	<div class="row_text_field_first">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Old password:</td>
				<td class="right_text_field"><input value="" type="password" name="oldpassAdmincp" /></td>
			</tr>
		</table>
	</div>

	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">New password:</td>
				<td class="right_text_field"><input value="" type="password" name="newpassAdmincp" /></td>
			</tr>
		</table>
	</div>
	
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Re-new password:</td>
				<td class="right_text_field"><input value="" type="password" name="renewpassAdmincp" /></td>
			</tr>
		</table>
	</div>
	</form>
</div>