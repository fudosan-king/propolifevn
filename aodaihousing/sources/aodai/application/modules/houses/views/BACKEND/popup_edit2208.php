<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="<?= PATH_URL . 'static/images/admin/' ?>favicon.png" type="image/x-icon" rel="icon" />
        <link href="<?= PATH_URL . 'static/images/admin/' ?>favicon.png" type="image/x-icon" rel="shortcut icon" />
        <link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="<?= PATH_URL . 'static/css/admin/' ?>styles.css" type="text/css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= PATH_URL . 'static/' ?>plugin/elfinder/css/elfinder.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= PATH_URL . 'static/' ?>plugin/elfinder/css/theme.css">
        <link rel="stylesheet" href="<?= PATH_URL . 'static/css/admin/' ?>validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="http://www.position-relative.net/creation/formValidator/css/template.css" type="text/css"/>


        <script type="text/javascript">
            var root = '<?= PATH_URL ?>';
<?php if ($this->uri->segment(2) != 'update_profile') { ?>
                var module = '<?= $module ?>';
<?php } ?>
        </script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/js/jquery-1.7.1.min.js' ?>"></script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/js/jquery-ui-1.8.16.custom.min.js' ?>"></script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/editor/scripts/innovaeditor.js' ?>"></script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/js/admin/jquery.ToTop.js' ?>"></script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/js/admin/jquery_caledar.js' ?>"></script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/js/admin/custom_forms.js' ?>"></script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/js/admin/jquery.form.js' ?>"></script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/js/admin/jquery.url.js' ?>"></script>
        <script type="text/javascript" src="<?= PATH_URL . 'static/js/admin/ajaxupload.3.5.js' ?>"></script>
        <link rel="stylesheet" href="<?= PATH_URL ?>static/plugin/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
        <script type="text/javascript" src="<?= PATH_URL ?>static/plugin/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>

        <link href="<?= PATH_URL ?>static/plugin/select/select2.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?= PATH_URL ?>static/plugin/select/select2.js"></script>

        <script src="<?= PATH_URL ?>static/js/admin/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= PATH_URL ?>static/js/admin/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

        <script type="text/javascript" src="<?= PATH_URL . 'static/js/admin/admin.js' ?>"></script>
        <title>Admin Control Panel</title>
        <!--[if ie 6]>
        <style>
        html, body{
        behavior: url('<?php echo PATH_URL . 'static/css/' ?>csshover3.htc');
        }
        
        .png{
        behavior: url('<?php echo PATH_URL . 'static/css/' ?>iepngfix.htc');
        }
        </style>
        <script type="text/javascript" src="<?php echo PATH_URL . 'static/js/' ?>iepngfix_tilebg.js"></script>
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
//                            $images_gallery = array();
//                            if (!empty($result) && $result->images_gallery != '') {
//                                $images_gallery = json_decode($result->images_gallery);
//                            }
                            ?>
                            <?php if (isset($items)): ?>

                                <form id="frmManagement" action="<?= PATH_URL . 'admincp/' . $module . '/saveList/' ?>" method="post" enctype="multipart/form-data">
                                    <div class="table">
                                        <div class="clearAll"><?php echo count($items); ?></div>
                                        <?php foreach ($items as $key_array => $result): ?>
                                            <?php $result = $result[0]; ?>
                                            <input type="hidden" value="<?php echo $result->id; ?>" name="list_id[]"/>
                                            <div class="widget" style="margin-top: 20px;">        
                                                <ul class="tabs">
                                                    <?php foreach (config('language_code') as $key => $value): ?>
                                                        <li><a class="icon-<?= $key; ?>" href="#<?= $key . $result->id; ?>"><?= lang('admin_' . $value); ?></a></li>
                                                    <?php endforeach; ?>
                                                    <div style="margin: 10px 0 0 130px;font-weight: bold"><span><?php print vcp_printf($result->name_jp, $key); ?></span></div>
                                                </ul>
                                                <div class="tab_container">
                                                    <?php foreach (config('language_code') as $key => $value): ?>
                                                        <div id="<?= $key . $result->id; ?>" class="tab_content">
                                                            <div class="row_text_field">
                                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td class="left_text_field">賃料 - <?php echo strtoupper($key); ?>:</td>
                                                                        <td class="right_text_field" style="<?php if($key_array == 0)echo "width:70% !important";?>">
                                                                            <input  class="validate[custom[onlyNumberSp]]" style="width:100% !important" value="<?php
                                                                            if (isset($result->rent)) {
                                                                                print vcp_printf($result->rent, $key);
                                                                            } else {
                                                                                print '';
                                                                            }
                                                                            ?>" type="text" name="<?php echo $result->id ?>_rent_<?= $key; ?>" id="rent_<?php echo $key_array.$key; ?>" />
                                                                        
                                                                        
                                                                        </td>
                                                                        <?php if ($key_array == 0): ?>
                                                                        <td class="apply_td">
                                                                                <a  href="javascript:void(0)" onclick="return aplly_all_rent(<?php echo $number ?>)">
                                                                                    <span class="apply">apply all</span>
                                                                                </a>
                                                                        </td>

                                                                        <?php endif; ?>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="row_text_field">
                                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td class="left_text_field">簡易紹介 - <?php echo strtoupper($key); ?>:</td>
                                                                        <td class="right_text_field" style="<?php if($key_array == 0)echo "width:70% !important";?>"><textarea width="100%"  id="introduction_<?php echo $key_array.$key; ?>" name="<?php echo $result->id ?>_introduction[<?= $key; ?>]" cols="" rows="2"><?php
                                                                                if (isset($result->introduction)) {
                                                                                    print vcp_printf($result->introduction, $key);
                                                                                } else {
                                                                                    print '';
                                                                                }
                                                                                ?></textarea></td>
                                                                        <?php if ($key_array == 0): ?>
                                                                            <td class="apply_td">

                                                                                <a  href="javascript:void(0)" onclick="return aplly_all_introduction(<?php echo $number ?>)">
                                                                                    <span class="apply">apply all</span>
                                                                                </a>

                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="row_text_field">
                                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td class="left_text_field">取材コメント - <?php echo strtoupper($key); ?>:</td>
                                                                        <td class="right_text_field" style="<?php if($key_array == 0)echo "width:70% !important";?>"><textarea width="100%" id="comment_<?php echo $key_array.$key; ?>" name="<?php echo $result->id ?>_comment[<?= $key; ?>]" cols="" rows="2"><?php
                                                                                if (isset($result->comment)) {
                                                                                    print vcp_printf($result->comment, $key);
                                                                                } else {
                                                                                    print '';
                                                                                }
                                                                                ?></textarea></td>
                                                                        <?php if ($key_array == 0): ?>
                                                                            <td class="apply_td">

                                                                                <a  href="javascript:void(0)" onclick="return aplly_all_comment(<?php echo $number ?>)">
                                                                                    <span class="apply">apply all</span>
                                                                                </a>

                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="row_text_field">
                                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td class="left_text_field">備考 - <?php echo strtoupper($key); ?>:</td>
                                                                        <td class="right_text_field" style="<?php if($key_array == 0)echo "width:70% !important";?>"><textarea width="100%" id="other_notice_<?php echo $key_array.$key; ?>" name="<?php echo $result->id ?>_other_notice[<?= $key; ?>]" cols="" rows="2"><?php
                                                                                if (isset($result->other_notice)) {
                                                                                    print vcp_printf($result->other_notice, $key);
                                                                                } else {
                                                                                    print '';
                                                                                }
                                                                                ?></textarea></td>
                                                                        <?php if ($key_array == 0): ?>
                                                                        <td class="apply_td">

                                                                                <a  href="javascript:void(0)" onclick="return aplly_all_other_notice(<?php echo $number ?>)">
                                                                                    <span class="apply">apply all</span>
                                                                                </a>

                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>	
                                                <div class="fix"></div>	 

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="midNav">
                                        <ul>
                                            <li class="midNav_last_child">
                                                <a  href="javascript:void(0)" onclick="return submitForm()">
                                                    <span class="save_popup">Save</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            <?php else: ?>
                                <div class="table">
                                    <div class="clearAll"></div>
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr class="row1">
                                            <td class="th_last td_center" colspan="50" style="font-size: 20px; padding: 50px 0">No data</td>
                                        </tr>
                                    </table>
                                </div>
                            <?php endif; ?>

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
                                });
                                function submitForm()
                                {
                                    $("#frmManagement").submit();
                                }
                            </script>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="plan-selection" id="save_success" style=" display: none;width: 100%;margin-left: -200px">
            <div class="wrapper clearfix" style="margin-top: 30px">
                保存しました!
            </div>
        </div>

    </body>
</html>
<style>
    .plan-selection {
        overflow: hidden;
        text-align: center;
        font-family: ProximaNovaLight,"Helvetica Neue",Helvetica,Arial,sans-serif;
        font-weight: 400;
        font-size: 18px;
        position: fixed;
        z-index: 300;
        bottom: 0;
        right: 0;
        opacity: 1;
        background: rgba(15, 14, 14, 0.45);
        color: #fff;
        height: 100%;
        width: auto;
        -webkit-transition: bottom .3s ease-in-out 0s;
        -moz-transition: bottom .3s ease-in-out 0s;
        -o-transition: bottom .3s ease-in-out 0s;
        transition: bottom .3s ease-in-out 0s;
    }
    .midNav{
        position: fixed;
        top: 0;
        right: 0;
        opacity: 1;
    }
    .table{
        border: none;
    }
    .tab_content {
        border-left: 1px solid #d5d5d5;
        border-right: 1px solid #d5d5d5;
    }

</style>
<script>
    function aplly_all_rent($number) {
        var rent_jp = $("#rent_0jp").val();
        var rent_vn = $("#rent_0vn").val();

        for (var i = 1; $number >= i; i++) {
            $("#rent_" + i+'jp').val(rent_jp);
            $("#rent_" + i+'vn').val(rent_vn);
        }

    }
    function aplly_all_introduction($number) {
        var introduction_jp = $("#introduction_0jp").val();
        var introduction_vn = $("#introduction_0vn").val();
        for (var i = 1; $number >= i; i++) {
            $("#introduction_" + i+'jp').val(introduction_jp);
            $("#introduction_" + i+'vn').val(introduction_vn);
        }
    }

    function aplly_all_comment($number) {
        var comment_jp = $("#comment_0jp").val();
        var comment_vn = $("#comment_0vn").val();
        for (var i = 1; $number >= i; i++) {
            $("#comment_" + i+'jp').val(comment_jp);
            $("#comment_" + i+'vn').val(comment_vn);
        }
    }
    function aplly_all_other_notice($number) {
        var other_notice_jp = $("#other_notice_0jp").val();
        var other_notice_vn = $("#other_notice_0jp").val();
        for (var i = 1; $number >= i; i++) {
            $("#other_notice_" + i+'jp').val(other_notice_jp);
            $("#other_notice_" + i+'vn').val(other_notice_vn);
        }
    }
</script>