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


?>
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
    <div class="row_text_field_first">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Show on Top page:</td>
                <td class="right_text_field"><input <?php if(isset($result->show_top)){ if($result->show_top==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="show_topAdmincp" /></td>
            </tr>
        </table>
    </div>
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Name JP:</td>
				<td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->name)) { print vcp_printf($result->name, 'jp'); }else{ print '';} ?>" type="text" name="nameAdmincp[jp]" /></td>
			</tr>
		</table>
	</div>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Name VN:</td>
				<td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->name)) { print vcp_printf($result->name, 'vn'); }else{ print '';} ?>" type="text" name="nameAdmincp[vn]" /></td>
			</tr>
		</table>
	</div>
    <?php
    $option = array(0=>'Main Category', 1=>'Special Category')
    ?>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Type Category:</td>
				<td class="right_text_field">
                    <select name="type" class="custom_select" style="width: 150px;">
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
    <?php
    $option = array(1=>'Houses', 2=>'Offices');
    ?>
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Type:</td>
				<td class="right_text_field">
                    <select name="type_p" class="custom_select" style="width: 150px;">
                        <?php foreach($option as $key=>$value): ?>
                        <?php
                            if($result->type_p == $key){
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
    <div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Order:</td>
				<td class="right_text_field"><input class="" value="<?php if(isset($result->order)) { print $result->order ; }else{ print '';} ?>" type="text" name="order" /></td>
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