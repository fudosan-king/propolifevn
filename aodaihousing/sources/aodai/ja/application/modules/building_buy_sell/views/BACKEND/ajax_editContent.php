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
	<div class="head_table"><div class="head_title_edit"><?php echo fn_convert_label_module($module); ?></div></div>
	<div class="clearAll"></div>
	<form name="frmManagement" id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
    	<input type="hidden" value="<?=$id?>" name="hiddenIdAdmincp" />

        <div class="row_text_field_first">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field left_text_field_other">Status:</td>
                    <td class="right_text_field"><input <?php if(isset($result->status)){ if($result->status==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="statusAdmincp" /></td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field left_text_field_other">Order:</td>
                    <td class="right_text_field">
                        <input class="validate[custom[onlyNumberSp]]" value="<?php if(isset($result->order)) { print vcp_printf($result->order); }else{ print 0;} ?>" type="number" name="order" min='0' style='width:100px; height: 25px;'/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field left_text_field_other">Image <span class='asterisk'>(*)</span>:</td>
                    <td class="right_text_field"><input type="file" id="file" name="fileAdmincp[images]" /><?php if(isset($result->image)){ if($result->image!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/building_buy_sell/'.$result->image?>">Review</a><?php }} ?></td>
                </tr>
            </table>
        </div>

        <div class="widget" style="margin-top: 0; margin-bottom: 0; border-bottom: 0;">        
            <ul class="tabs">
                <?php foreach(config('language_code') as $key=>$value): ?>
                    <li><a class="icon-<?=$key;?>" href="#<?=$key;?>"><?=lang('admin_'.$value);?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="tab_container">
                <?php foreach(config('language_code') as $key=>$value): ?>
                    <div id="<?=$key;?>" class="tab_content">
                        <div class="row_text_field_first">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field width_two_language">Title <?php echo strtoupper($key); ?> <span class='asterisk'>(*)</span>:</td>
                                    <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->title)) { print vcp_printf($result->title, $key); }else{ print '';} ?>" type="text" name="buildingTitleAdmincp[<?php echo $key; ?>]" /></td>
                                </tr>
                            </table>
                        </div>

                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field width_two_language">Description <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <textarea name="descriptionAdmincp[<?=$key?>]" cols="" rows="8" id="descriptionAdmincp_<?=$key?>"><?php if(isset($result->description)) { print vcp_printf($result->description, $key); }else{ print '';} ?></textarea>
                                        <script>
                                            var editor_desc = CKEDITOR.replace( 'descriptionAdmincp_<?=$key?>', fn_config_toolbar_ckeditor());
                                            editor_desc.on('change', function(ev) {
                                                var get_data_desc = CKEDITOR.instances.descriptionAdmincp_<?=$key?>.getData();
                                                document.getElementById('descriptionAdmincp_<?=$key?>').innerHTML = get_data_desc;
                                            });
                                        </script>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field width_two_language">Title more <?php echo strtoupper($key); ?> <span class='asterisk'>(*)</span>:</td>
                                    <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($result->title_description_more)) { print vcp_printf($result->title_description_more, $key); }else{ print '';} ?>" type="text" name="buildingTitleMoreAdmincp[<?php echo $key; ?>]" /></td>
                                </tr>
                            </table>
                        </div>

                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field width_two_language">Description more <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <textarea name="descriptionMoreAdmincp[<?=$key?>]" cols="" rows="8" id="descriptionMoreAdmincp_<?=$key?>"><?php if(isset($result->description_more)) { print vcp_printf($result->description_more, $key); }else{ print '';} ?></textarea>
                                        <script>
                                            var editor_desc_more = CKEDITOR.replace( 'descriptionMoreAdmincp_<?=$key?>', fn_config_toolbar_ckeditor());
                                            editor_desc_more.on('change', function(ev) {
                                                var get_data_desc = CKEDITOR.instances.descriptionMoreAdmincp_<?=$key?>.getData();
                                                document.getElementById('descriptionMoreAdmincp_<?=$key?>').innerHTML = get_data_desc;
                                            });
                                        </script>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="fix"></div>
        </div>
	</form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#file').bind('change', function() {
            //this.files[0].size gets the size of your file.
            var fileSize = this.files[0].size;
            var num_limit = 5;
            var limit = num_limit * 1024 * 1024; // 5MB
            if (fileSize > limit) {
                alert('Please choose file size small than ' + num_limit + 'MB');
            }
        });
        
        $("#frmManagement").validationEngine({
            promptPosition : "bottomLeft", 
            scroll: false,
        });
    });
</script>