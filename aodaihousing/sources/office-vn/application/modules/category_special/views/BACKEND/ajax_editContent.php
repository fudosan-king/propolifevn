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
<div class="table">
	<div class="head_table"><div class="head_title_edit"><?=$module_name?></div></div>
	<div class="clearAll"></div>
	<form name="frmManagement" id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?=$id?>" name="hiddenIdAdmincp" />
	<div class="row_text_field_first">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Status:</td>
				<td class="right_text_field"><input <?php if(isset($result->status)){ if($result->status==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="statusAdmincp" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field_first" style="display: none;">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Home :</td>
				<td class="right_text_field"><input <?php if(isset($result->is_home)){ if($result->is_home==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="homeAdmincp" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Order:</td>
				<td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->order)) { print $result->order; }else{ print '';} ?>" type="text" name="orderAdmincp" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Title:</td>
				<td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->name)) { print $result->name; }else{ print '';} ?>" type="text" name="nameAdmincp" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Description:</td>
				<td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->description)) { print $result->description; }else{ print '';} ?>" type="text" name="desAdmincp" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Keywords:</td>
				<td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->keyword)) { print $result->keyword; }else{ print '';} ?>" type="text" name="keyAdmincp" /></td>
			</tr>
		</table>
	</div>
	<div class="row_text_field" style="display: none;">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Icon:</td>
				<td class="right_text_field"><input type="file" name="iconAdmincp" />&nbsp;<?php if(isset($result->icon)){ if(isset($result->icon)){ ?>- <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/category/'.$result->icon?>">Review</a><?php }} ?></td>
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
    /*
    $(".save").live('click', function () {
            var valid = $("#frmManagement").validationEngine('validate');
            var vars = $("#frmManagement").serialize();
            if (valid == true) {
                return true;
            } else {
                return false;
                //$("#frmManagement").validationEngine();
            }
        });
        */
})
</script>