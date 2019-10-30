<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?=PATH_URL.'static/images/admin/'?>favicon.png" type="image/x-icon" rel="icon" />
<link href="<?=PATH_URL.'static/images/admin/'?>favicon.png" type="image/x-icon" rel="shortcut icon" />
<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?=PATH_URL.'static/css/admin/'?>styles.css" type="text/css">
<link rel="stylesheet" type="text/css" media="screen" href="<?=PATH_URL.'static/'?>plugin/elfinder/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?=PATH_URL.'static/'?>plugin/elfinder/css/theme.css">
<link rel="stylesheet" href="<?=PATH_URL.'static/css/admin/'?>validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="http://www.position-relative.net/creation/formValidator/css/template.css" type="text/css"/>


<script type="text/javascript">
var root = '<?=PATH_URL?>';
<?php if($this->uri->segment(2)!='update_profile'){ ?>
var module = '<?=$module?>';
<?php } ?>
</script>
<script type="text/javascript" src="<?=PATH_URL.'static/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/js/jquery-ui-1.8.16.custom.min.js'?>"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/editor/scripts/innovaeditor.js'?>"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/jquery.ToTop.js'?>"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/jquery_caledar.js'?>"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/custom_forms.js'?>"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/jquery.form.js'?>"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/jquery.url.js'?>"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/ajaxupload.3.5.js'?>"></script>

<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/jquery.fancybox-1.3.4.pack.js'?>"></script>
<link href="<?=PATH_URL?>static/plugin/select/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="<?=PATH_URL?>static/plugin/select/select2.js"></script>

<script src="<?=PATH_URL?>static/js/admin/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=PATH_URL?>static/js/admin/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/admin.js'?>"></script>
<title>Admin Control Panel</title>
<!--[if ie 6]>
<style>
html, body{
behavior: url('<?php echo PATH_URL.'static/css/' ?>csshover3.htc');
}

.png{
behavior: url('<?php echo PATH_URL.'static/css/' ?>iepngfix.htc');
}
</style>
<script type="text/javascript" src="<?php echo PATH_URL.'static/js/' ?>iepngfix_tilebg.js"></script>
<![endif]-->
</head>
<body>
<div id="content">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>

			<td valign="top">
				<div class="right_content">
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
$images_gallery = array();
if (!empty($result) && $result->images_gallery != '') {
    $images_gallery = json_decode($result->images_gallery);
}
?>
<form id="frmManagement" action="<?= PATH_URL . 'admincp/' . $module . '/save/' ?>" method="post" enctype="multipart/form-data">
    <div class="table">
        <div class="head_table"><div class="head_title_edit"><?= $module ?></div></div>
        <div class="clearAll"></div>
        
        <div class="widget" style="margin-top: 0;">        
            <ul class="tabs">
                <?php foreach (config('language_code') as $key => $value): ?>
                    <li><a class="icon-<?= $key; ?>" href="#<?= $key; ?>"><?= lang('admin_' . $value); ?></a></li>
<?php endforeach; ?>
            </ul>
            <div class="tab_container">
<?php foreach (config('language_code') as $key => $value): ?>
                    <div id="<?= $key; ?>" class="tab_content">
                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field">賃料 - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <input class="validate[custom[onlyNumberSp]]" value="<?php if (isset($result->rent)) {
        print vcp_printf($result->rent, $key);
    } else {
        print '';
    } ?>" type="text" name="rent[<?= $key ?>]" />
                                    </td>
                                    <td class="left_text_field">家賃支払条件 - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field"><input value="<?php if (isset($result->rent_condition)) {
        print vcp_printf($result->rent_condition, $key);
    } else {
        print '';
    } ?>" type="text" name="rent_condition[<?= $key ?>]" /></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field">簡易紹介 - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field"><textarea name="introduction[<?= $key ?>]" cols="" rows="8"><?php if (isset($result->introduction)) {
        print vcp_printf($result->introduction, $key);
    } else {
        print '';
    } ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field">取材コメント - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field"><textarea name="comment[<?= $key ?>]" cols="" rows="8"><?php if (isset($result->comment)) {
        print vcp_printf($result->comment, $key);
    } else {
        print '';
    } ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field">備考 - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field"><textarea name="other_notice[<?= $key ?>]" cols="" rows="8"><?php if (isset($result->other_notice)) {
        print vcp_printf($result->other_notice, $key);
    } else {
        print '';
    } ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </div>
<?php endforeach; ?>
            </div>	
            <div class="fix"></div>	 
        </div>
    </div>
</form>
<style type="text/css">
    .add_new_file{
        background-color: #5BB75B;
        background-image: -moz-linear-gradient(center top , #62C462, #51A351);
        background-repeat: repeat-x;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        color: #FFFFFF;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        cursor: pointer;
    }
    .gallery td{
        padding: 15px 0;
    }
    .del_input {
        color: red;
        font-weight: bold;
        margin-left: 10px;
        cursor: pointer;
    }
    .option_list td{
        padding: 10px 0;
    }
</style>
<script type="text/javascript">

    $(document).ready(function() {
        var html = '<tr><td class="left_text_field">Image gallery(550×365):</td><td class="right_text_field"><input type="file" name="fileAdmincp[images_gallery][]"><span class="del_input">Del</span></td></tr>';
        $(".add_new_file").click(function() {
            $(".gallery").append(html).hide().show(1000);
        })
        $(".del_input").live('click', function() {
            $(this).parent().parent().remove();
        })

        $("#frmManagement").validationEngine({
            promptPosition: "bottomLeft",
            scroll: false,
        });

        $("#image-list ul").sortable({opacity: 0.6, cursor: 'move', update: function() {
                var order = $(this).sortable("serialize") + '&';
                $.post(root + "admincp/<?= $module ?>/order_img", order, function(theResponse) {
                    //$("#contentRight").html(theResponse);
                });
            }
        });
    })
</script>
				</div>
			</td>
		</tr>
	</table>
</div>

</body>
</html>