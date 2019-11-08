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
	<div class="head_table"><div class="head_title_edit">Order Building In Map</div></div>
	<div class="clearAll"></div>
	<form name="frmManagement" id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
	   <input type="hidden" value="<?=$id?>" name="hiddenIdAdmincp" />
        <div class="row_text_field_first">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Status:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result[0][0]->status) && $result[0][0]->status==1) {
                                echo '<img src="'.PATH_URL.'static/images/admin/icons/accept.png">';
                            }
                        ?>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Building Name JP:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result[0][0]->name)) {
                                print vcp_printf($result[0][0]->name, 'jp');
                            } else {
                                print '';
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Building Name VN:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result[0][0]->name)) {
                                print vcp_printf($result[0][0]->name, 'vn');
                            } else {
                                print '';
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">District:</td>
                    <td class="right_text_field">
                        <?php
                            if($result['dictrict']) {
                                foreach (($result['dictrict']) as $key => $value) {
                                    if ((isset($result[0][0])) && $result[0][0]->district == $value->id) {
                                        print vcp_printf($value->name, 'jp');
                                    }
                                }
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Order:</td>
                    <td class="right_text_field">
                        <input class="validate[custom[onlyNumberSp]]" value="<?php if(isset($result[0][0]->order_in_map)) { print vcp_printf($result[0][0]->order_in_map); }else{ print '';} ?>" type="text" name="order_in_map" />
                    </td>
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