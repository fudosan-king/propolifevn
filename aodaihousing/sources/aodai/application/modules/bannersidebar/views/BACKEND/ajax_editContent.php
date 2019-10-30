<script type="text/javascript">
function showRequest(formData, jqForm, options) {
	var form = jqForm[0];
	if(form.titleAdmincp.value == ''){
		alert('Vui lòng điền đầy đủ thông tin.');
		return false;
	}
}
</script>
<div class="table">
	<div class="head_table"><div class="head_title_edit"><?=$module_name?></div></div>
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
				<td class="left_text_field">Title:</td>
				<td class="right_text_field"><input data-validation-engine="validate[required]" value="<?php if(isset($result->title)) { print $result->title; }else{ print '';} ?>" type="text" name="titleAdmincp" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Start Publishing:</td>
				<td class="right_text_field"><input id="caledar_from" value="<?php if(isset($result->publish_from)) { print date("Y-m-d",strtotime($result->publish_from)); }else{ print '';} ?>" type="text" name="vcp_publish_from" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Finish Publishing:</td>
				<td class="right_text_field"><input id="caledar_to" value="<?php if(isset($result->publish_to)) { print date("Y-m-d",strtotime($result->publish_to));}else{ print '';} ?>" type="text" name="vcp_publish_to" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Order:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->order)) { print $result->order; } ?>" type="text" name="order" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Link:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->link)) { print $result->link; }else{ print 'http://';} ?>" type="text" name="linkAdmincp" /></td>
			</tr>
		</table>
	</div>
	
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Image(230×80):</td>
				<td class="right_text_field"><input type="file" name="fileAdmincp[images]" /><?php if(isset($result->images)){ if($result->images!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/bannersidebar/'.$result->images?>">Review</a><?php }} ?></td>
			</tr>
		</table>
	</div>
	</form>
</div>