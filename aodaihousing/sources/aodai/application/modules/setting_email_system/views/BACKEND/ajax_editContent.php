<script type="text/javascript">
	function showRequest(formData, jqForm, options) {
		var valid = $("#frmManagement").validationEngine('validate');
	    var vars = $("#frmManagement").serialize();
	    if (valid == true) {
	        return true;
	    } else {
	        return false;
	    }
	}
</script>

<div class="table">
	<div class="head_table"><div class="head_title_edit"><?php echo ucwords(str_replace('_', ' ', $module)); ?></div></div>
	<div class="clearAll"></div>
	<form id="frmManagement" action="<?php echo PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $id?>" name="hiddenIdAdmincp" />

		<div class="row_text_field">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td class="left_text_field">Type:</td>
					<td class="right_text_field">
	                    <select name="type" class="validate[required]" style="width: 150px;">
	                    	<option value="">- Please Select -</option>
	                        <?php foreach(fn_type_email() as $key=>$value): ?>
	                        <?php
	                            if (isset($result->type) && strtolower(trim($result->type)) == $key) {
	                                $select = 'selected="selected"';
	                            } else {
	                                $select = '';
	                            }
	                        ?>
	                        <option <?=$select;?> value="<?=$key; ?>"><?=$value; ?></option>
	                        <?php endforeach; ?>
	                    </select>
	                </td>
				</tr>
			</table>
		</div>

		<div class="row_text_field">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td class="left_text_field">Name:</td>
					<td class="right_text_field"><input class='validate[required]' value="<?php if(isset($result->name)) { print $result->name; }else{ print '';} ?>" type="text" name="name" /></td>
				</tr>
			</table>
		</div>

		<div class="row_text_field">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td class="left_text_field">Email:</td>
					<td class="right_text_field"><input class='validate[required,custom[email]]' value="<?php if(isset($result->email)) { print $result->email; }else{ print '';} ?>" type="text" name="email" /></td>
				</tr>
			</table>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	    $("#frmManagement").validationEngine({
	        promptPosition : "bottomLeft", 
	        scroll: false,
	    });
	});
</script>