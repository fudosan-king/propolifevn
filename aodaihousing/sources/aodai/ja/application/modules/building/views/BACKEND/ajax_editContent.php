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
                <td class="right_text_field"><input <?php if(isset($result[0][0]->status)){ if($result[0][0]->status==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="statusAdmincp" /></td>
            </tr>
        </table>
    </div>
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Building Name JP:</td>
                <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result[0][0]->name)) { print vcp_printf($result[0][0]->name, 'jp'); }else{ print '';} ?>" type="text" name="buildingNameAdmincp[jp]" /></td>
            </tr>
        </table>
    </div>
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Building Name VN:</td>
                <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result[0][0]->name)) { print vcp_printf($result[0][0]->name, 'vn'); }else{ print '';} ?>" type="text" name="buildingNameAdmincp[vn]" /></td>
            </tr>
        </table>
    </div>
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Address JP:</td>
                <td class="right_text_field"><input class="" value="<?php if(isset($result[0][0]->address)) { print vcp_printf($result[0][0]->address, 'jp'); }else{ print '';} ?>" type="text" name="addressAdmincp[jp]" /></td>
            </tr>
        </table>
    </div>
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Address VN:</td>
                <td class="right_text_field"><input class="" value="<?php if(isset($result[0][0]->address)) { print vcp_printf($result[0][0]->address, 'vn'); }else{ print '';} ?>" type="text" name="addressAdmincp[vn]" /></td>
            </tr>
        </table>
    </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Order:</td>
                    <td class="right_text_field"><input class="validate[custom[onlyNumberSp]]" value="<?php if(isset($result[0][0]->order)) { print vcp_printf($result[0][0]->order); }else{ print '';} ?>" type="text" name="order" /></td>
                </tr>
            </table>
        </div>
    <div class="row_text_field_first">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">
                </td>
                <td>
                    <label>
                        <input <?php if(isset($result[0][0]->feature_popular)){ if($result[0][0]->feature_popular==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="popularAdmincp" /> <span>Popular</span>
                    </label>
                </td>
                <td>
                    <label>
                        <input <?php if(isset($result[0][0]->feature_house_ex)){ if($result[0][0]->feature_house_ex==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="houseExAdmincp" /> <span>House Exelen</span> 
                    </label>
                    
                </td>
                <td>
                    <label>
                        <input <?php if(isset($result[0][0]->feature_near_bus)){ if($result[0][0]->feature_near_bus==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="nearBusAdmincp" /> <span>House near bus</span> 
                    </label>
                    
                </td> 
            </tr>
        </table>
    </div>
    <?php
    $option = array(0 =>'Condo', 1=>'Service aprtment')
    ?>
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Building Type:</td>
                <td class="right_text_field">
                    <select name="buildingType" class="custom_select" style="width: 150px;">
                        <?php
                        if($option) {
                            foreach ($option as $key => $value) { ?>
                                <?php
                                if ((isset($result[0][0])) &&$result[0][0]->building_type == $key) {
                                    $select = 'selected="selected"';
                                } else
                                    $select = '';
                                ?>
                                <option <?= $select; ?> value="<?= $key; ?>"><?= $value; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">District:</td>
                <td class="right_text_field">
                    <select name="dictrict" class="custom_select " style="width: 200px;">
                        <?php if($result['dictrict']) {
                            foreach (($result['dictrict']) as $key => $value){ ?>
                                <?php
                                if ((isset($result[0][0])) && $result[0][0]->district == $value->id) {
                                    $select = 'selected="selected"';
                                } else
                                    $select = '';
                                ?>
                                <option <?= $select; ?>
                                        value="<?php echo($value->id); ?>"><?php print vcp_printf($value->name, 'jp'); ?></option>
                            <?php }
                        }?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="row_text_field">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td class="left_text_field">Image Thumb: <br>(Format JPG - 390x274)</td>
                <td class="right_text_field"><input type="file" id="image_file" name="fileAdmincp[images]" /><?php if(isset($result[0][0]->image)){ if($result[0][0]->image!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/category/'.$result[0][0]->image?>">Review</a><?php }} ?></td>
            </tr>
        </table>
    </div>  
<div class="row_text_field">
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td class="left_text_field">Description: </td>
            <td class="right_text_field"><textarea name="description" cols="" rows="8"><?php if(isset($result[0][0]->description)) { print vcp_printf($result[0][0]->description, $key); }else{ print '';} ?></textarea></td>
        </tr>
    </table>
</div>
<div class="row_text_field">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td class="left_text_field">Seo Description: </td>
			<td class="right_text_field"><textarea name="seo_description" cols="" rows="8"><?php if(isset($result[0][0]->seo_description)) { print vcp_printf($result[0][0]->seo_description, $key); }else{ print '';} ?></textarea></td>
		</tr>
	</table>
</div>
<div class="row_text_field">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td class="left_text_field">Seo Title: </td>
			<td class="right_text_field"><textarea name="seo_title" cols="" rows="8"><?php if(isset($result[0][0]->seo_title)) { print vcp_printf($result[0][0]->seo_title, $key); }else{ print '';} ?></textarea></td>
		</tr>
	</table>
</div>
<div class="row_text_field">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td class="left_text_field">Seo Keyword: </td>
			<td class="right_text_field"><textarea name="seo_keyword" cols="" rows="8"><?php if(isset($result[0][0]->seo_keyword)) { print vcp_printf($result[0][0]->seo_keyword, $key); }else{ print '';} ?></textarea></td>
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

var _URL = window.URL || window.webkitURL;

$("#image_file").change(function(e) {
  var _this = this;
  var file = this.files[0]; //get file  
  var fileName = e.target.files[0].name;
  var img;
  var sizeKB = file.size / 1024;
  var extension = fileName.substr((fileName.lastIndexOf('.') + 1));

  if (file) {
    img = new Image();
    img.onload = function() {
      if (extension != 'jpg') {
        $(_this).val('');
        alert("please, select jpg image");
      } else if (this.width > 390 || this.height > 274) {
        $(_this).val('');
        alert("please, resize image to 390x274");
      }
    };
    img.src = _URL.createObjectURL(file);
  }
});

</script>