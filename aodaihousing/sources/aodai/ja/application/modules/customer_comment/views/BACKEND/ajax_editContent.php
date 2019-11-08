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
	<div class="head_table"><div class="head_title_edit"><?=$module?></div></div>
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
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Title:</td>
                <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->title)) { print vcp_printf($result->title); }else{ print '';} ?>" type="text" name="titleAdmincp" /></td>
            </tr>
        </table>
    </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Order:</td>
                    <td class="right_text_field"><input class="validate[required] validate[custom[onlyNumberSp]]" value="<?php if(isset($result->order)) { print vcp_printf($result->order); }else{ print '';} ?>" type="number" name="order" style="width: 100%"/></td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Description: </td>
                    <td class="right_text_field"><textarea class="validate[required]" name="description" cols="" rows="8"><?php if(isset($result->description)) { print vcp_printf($result->description); }else{ print '';} ?></textarea></td>
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
});




</script>