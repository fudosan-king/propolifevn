
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
	
}

function showResponse(responseText, statusText, xhr, $form) {
	if(responseText=='success'){
		location.href=root+"admincp/"+module+"/#/save";
	}
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
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr style="display: none;">
				<td class="left_text_field">Email:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->email)) { print $result->email; }else{ print '';} ?>" type="text" name="vs_email" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">User name:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->username)) { print $result->username; }else{ print '';} ?>" type="text" name="vcp_username" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Fullname:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->fullname)) { print $result->fullname; }else{ print '';} ?>" type="text" name="vs_fullname" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Password:</td>
				<td class="right_text_field"><input value="" type="password" name="vs_password" /></td>
			</tr>
		</table>
	</div>
    <?php
    $option = array(2=>'User', 1=>'Supper admin')
    ?>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Type:</td>
				<td class="right_text_field">
                
                    <select style="width: 200px;" class="type custom_select" name="type">
                         <?php foreach($option as $key=>$value): ?>
                        <?php
                            if($result->type == $key){
                                $select = 'selected="selected"';
                            }else
                                $select = '';
                        ?>
                        <option <?=$select;?>  value="<?=$key; ?>"><?=$value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
			</tr>
		</table>
	</div>
	</form>
</div>
