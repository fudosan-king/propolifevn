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
if($result && $result->images_gallery != ''){
    $images_gallery = json_decode($result->images_gallery);
}
//print_r($userInfo);die();
?>
<form id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php if(isset($id)){ echo $id;}?>" id="FormId">
    <div class="table">
        <div class="head_table"><div class="head_title_edit"><?=$module?></div></div>
        <div class="clearAll"></div>

        <input type="hidden" value="<?=$id?>" name="hiddenIdAdmincp" />

        <div class="row_text_field_first">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">状態:</td>
                    <td class="right_text_field"><input <?php if(isset($result->status)){if($result->status==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="status" /></td>
                    <td class="left_text_field">Recommended:</td>
                    <td class="right_text_field"><input <?php if(isset($result->recommended)){ if($result->recommended==1){ ?>checked="checked"<?php }}else{ ?><?php } ?> type="checkbox" class="custom_chk" name="recommended" /></td>
                </tr>
            </table>
        </div>

        <div class="widget" style="margin-top: 0;">
            <ul class="tabs">
                <?php foreach(config('language_code') as $key=>$value): ?>
                    <li><a class="icon-<?=$key;?>" href="#<?=$key;?>"><?=lang('admin_'.$value);?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if($id){?>
            <div class="row_text_field">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td class="left_text_field">UserName:</td>
                        <td class="right_text_field" style="width:328px">
                            <label><?php if(isset($userInfo[0]->username)) { print vcp_printf($userInfo[0]->username); }else{ print '';} ?></label></td>
                        <td class="left_text_field">Email:</td>
                        <td class="right_text_field" style="width:328px">
                            <label><?php if(isset($userInfo[0]->email)) { print vcp_printf($userInfo[0]->email); }else{ print '';} ?> </label></td>
                    </tr>
                </table>
            </div>
            <div class="row_text_field">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td class="left_text_field">Phone:</td>
                        <td class="right_text_field" style="width:328px">
                            <label><?php if(isset($userInfo[0]->phone)) { print vcp_printf($userInfo[0]->phone); }else{ print '';}?></label></td>
                        <td class="left_text_field">Address:</td>
                        <td class="right_text_field" style="width:328px">
                            <label><?php if(isset($userInfo[0]->address)) { print vcp_printf($userInfo[0]->address); }else{ print '';} ?></label></td>
                    </tr>
                </table>
            </div>
            <?php }else {?>
            <div class="row_text_field">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td class="left_text_field">UserName:</td>
                        <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($userInfo[0]->username)) { print vcp_printf($userInfo[0]->username); }else{ print '';} ?>" type="text" name="txtUserName" /></td>
                        <td class="left_text_field">Email:</td>
                        <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($userInfo[0]->email)) { print vcp_printf($userInfo[0]->email); }else{ print '';} ?>" type="text" name="txtEmail" /></td>
                    </tr>
                </table>
            </div>
            <div class="row_text_field">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td class="left_text_field">Phone:</td>
                        <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($userInfo[0]->phone)) { print vcp_printf($userInfo[0]->phone); }else{ print '';} ?>" type="text" name="txtPhone" /></td>
                        <td class="left_text_field">Address:</td>
                        <td class="right_text_field"><input class="validate[required]" value="<?php if(isset($userInfo[0]->address)) { print vcp_printf($userInfo[0]->address); }else{ print '';} ?>" type="text" name="txtAddress" /></td>
                    </tr>
                </table>
            </div>
            <?php }?>

            <div class="tab_container">
                <?php foreach(config('language_code') as $key=>$value): ?>
                    <div id="<?=$key;?>" class="tab_content">
                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field">建物名（日本語読み） - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <input class="validate[required]" value="<?php if(isset($result->name_jp)) { print vcp_printf($result->name_jp, $key); }else{ print '';} ?>" type="text" name="name_jp[<?=$key?>]" /></td>
                                    <td class="left_text_field">建物名（アルファベット） - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <input class="validate[required]" value="<?php if(isset($result->name_en)) { print vcp_printf($result->name_en, $key); }else{ print '';} ?>" type="text" name="name_en[<?=$key?>]" /></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field">デポジット - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <input class="validate" value="<?php if(isset($result->deposit)) { print vcp_printf($result->deposit, $key); }else{ print '';} ?>" type="text" name="deposit[<?=$key?>]" /></td>
                                    <td class="left_text_field">賃料 - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <input class="validate[required]" value="<?php if(isset($result->rent)) { print vcp_printf($result->rent, $key); }else{ print '';} ?>" type="text" name="rent[<?=$key?>]" /></td>
                                </tr>
                            </table>
                        </div>

                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field">面積 - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <input value="<?php if(isset($result->size)) { print vcp_printf($result->size, $key); }else{ print '';} ?>" type="text" name="size[<?=$key?>]" /></td>
                                </tr>
                            </table>
                        </div>

                        <div class="row_text_field">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="left_text_field">簡易紹介 - <?php echo strtoupper($key); ?>:</td>
                                    <td class="right_text_field">
                                        <textarea name="introduction[<?=$key?>]" cols="" rows="8"><?php if(isset($result->introduction)) { print vcp_printf($result->introduction, $key) ; }else{ print '';} ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="fix"></div>
        </div>

        <?php
        $data_type = array(
            0 => 'サービスアパート・アパートメント',
            1 => 'コンドミニアム（マンション）',
            2 => '戸建て'
        );
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Area:</td>
                    <td class="right_text_field">
                        <select id="e3" style="width:300px" name="areas">
                            <?php if($areas): ?>
                                <?php foreach($areas as $key=>$item): ?>
                                    <?php
                                    $selected = '';
                                    if($areas_db){
                                        if($areas_db->area_id == $item->id){
                                            $selected = 'selected="selected"';
                                        }
                                    }
                                    ?>
                                    <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, 'jp'); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </td>

                    <td class="left_text_field">Type:</td>
                    <td class="right_text_field">
                        <select id="e4" style="width:300px" name="type">
                            <?php foreach($data_type as $key=>$item): ?>
                                <?php
                                $selected = '';
                                if($result->type == $key){
                                    $selected = 'selected="selected"';
                                }
                                ?>
                                <option <?=$selected;?>  value="<?=$key; ?>"><?=$item; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Layout:</td>
                    <td class="right_text_field">
                        <select id="e7" style="width:300px" name="house_layout_id">
                            <?php if($layout): ?>
                                <?php foreach($layout as $key=>$item): ?>
                                    <?php
                                    $selected = '';
                                    if($result->house_layout_id == $item->id){
                                        $selected = 'selected="selected"';
                                    }
                                    ?>
                                    <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, 'jp'); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </td>

                    <td class="left_text_field">Building:</td>
                    <td class="right_text_field">
                        <?php
                        $data_building_type = $building_data;
                        ?>
                        <select id="e8" style="width:300px" name="building_type">
                            <option value="">None</option>
                            <?php foreach($data_building_type as $key => $item): ?>
                                <?php
                                $selected = '';
                                if($item->id == $building_db[0]->building_id){
                                    $selected = 'selected="selected"';
                                }
                                ?>
                                <option <?php echo $selected;?> value="<?=$item->id; ?>">
                                    <?=vcp_printf($item->name, 'jp'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <?php
        $data_bathroom = array(
          '1'=> 'val1',
          '2'=> 'val2',
          '3'=> 'val3'
        );
        $data_reach = array(
            '1'=> 'Yes',
            '2'=> 'No'
        );
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">浴室数:</td>
                    <td class="right_text_field">
                        <select id="e9" style="width:300px" name="bathroom">
                            <?php if($data_bathroom): ?>
                                <?php foreach($data_bathroom as $key=>$item): ?>
                                    <?php
                                    $selected = '';
                                    if($userInfo[0]->bathroom == $item){
                                        $selected = 'selected="selected"';
                                    }
                                    ?>
                                    <option <?=$selected;?>  value="<?=$item; ?>"><?=vcp_printf($item); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </td>
                    <td class="left_text_field">家具の有無:</td>
                    <td class="right_text_field">
                        <select id="e10" style="width:300px" name="reach">
                            <?php foreach($data_reach as $key => $item): ?>
                                <?php
                                $selected = '';
                                if($userInfo[0]->reach == $key){
                                    $selected = 'selected="selected"';
                                }
                                ?>
                                <option <?php echo $selected;?> value="<?=$key; ?>"><?=vcp_printf($item); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <?php
        $data_db = array();
        if($category_db){
            foreach($category_db as $item) {
                $data_db[] = $item->cate_id;
            }
        }
        ?>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Category main:</td>
                    <td class="right_text_field">
                        <select multiple  id="e5" style="width:300px" name="category_main[]">
                            <?php if($category_main): ?>
                                <?php foreach($category_main as $key_=>$item): ?>
                                    <?php
                                    $selected = '';
                                    if($category_db){
                                        if(in_array($item->id,$data_db)){
                                            $selected = 'selected="selected"';
                                        }
                                    }
                                    ?>
                                    <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, 'jp'); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </td>

                    <td class="left_text_field">Category special:</td>
                    <td class="right_text_field">
                        <select multiple id="e6" style="width:300px" name="category_special[]">
                            <?php if($category_special): ?>
                                <?php foreach($category_special as $key_=>$item): ?>
                                    <?php
                                    $selected = '';
                                    if($category_db){
                                        if(in_array($item->id,$data_db)){
                                            $selected = 'selected="selected"';
                                        }
                                    }
                                    ?>
                                    <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, 'jp'); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <!--Tags -->
        <?php
        $tag_db = array();
        if($tagsDB){
            foreach($tagsDB as $item) {
                $tag_db[] = $item->tags_id;
            }
        }
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Tags:</td>
                    <td class="right_text_field">
                        <select multiple="multiple"  id="e1" style="width:100%" name="tags[]">
                            <?php if($tagList):?>
                                <?php foreach($tagList as $key_=>$item): ?>
                                    <?php
                                    $selected = '';
                                    if($tagsDB){
                                        if(in_array($item->id,$tag_db)){
                                            $selected = 'selected="selected"';
                                        }
                                    }
                                    ?>
                                    <option <?=$selected;?>  value="<?=$item->id; ?>"><?=vcp_printf($item->name, 'jp'); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <!-- End tags -->

        <?php
        $data_db = array();
        if(($equipments_db) && count($equipments_db) > 0){
            foreach($equipments_db as $item) {
                $data_db[] = $item->equipment_id;
            }
        }elseif($id == '0'){
            foreach ($equipments_serviced as $item){
                $data_db[] = $item->equipment_id;
            }
        }
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field <?php if(($equipments_db) && count($equipments_db) > 0){ echo 'equipment_houses';}?>">Equipments:</td>
                    <td class="right_text_field">
                        <?php if($equipments):?>
                            <?php foreach($equipments as $item):?>
                                <?php
                                $selected = '';
                                if($data_db){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'checked="checked"';
                                    }
                                }
                                ?>
                                <div class="warp-check">
                                    <span class="span-check"><?=vcp_printf($item->name, 'jp')?></span>
                                    <span><input <?=$selected; ?> value="<?=$item->id; ?>" type="checkbox" class="custom_chk chk_equipment" name="equipment[]" /></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </td>

                </tr>
            </table>
        </div>
        <?php
        $data_db = array();
        if(($facilitie_db) && count($facilitie_db) > 0){
            foreach($facilitie_db as $item) {
                $data_db[] = $item->common_facility_id;
            }
        }elseif($id == '0'){
            foreach ($facilities_serviced as $item){
                $data_db[] = $item->facility_id;
            }
        }
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field <?php if(($facilitie_db) && count($facilitie_db) > 0){ echo 'facility_houses';}?>">Common facilities:</td>
                    <td class="right_text_field">
                        <?php if($facilities): ?>
                            <?php foreach($facilities as $item): ?>
                                <?php
                                $selected = '';
                                if($data_db){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'checked="checked"';
                                    }
                                }
                                ?>
                                <div class="warp-check">
                                    <span class="span-check"><?=vcp_printf($item->name, 'jp')?></span>
                                    <span><input <?=$selected; ?> value="<?=$item->id; ?>" type="checkbox" class="custom_chk chk_facility" name="facilities[]" /></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </td>

                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Image Thumb(192×118):</td>
                    <td class="right_text_field"><input type="file" name="fileAdmincp[images_thumb]" /><?php if(isset($result->images_thumb)){ if($result->images_thumb!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.'static/uploads/houses/'.$result->images_thumb?>">Review</a><?php }} ?></td>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <div class="pics" id="image-list">
                <ul>
                    <?php if($images_gl): ?>
                        <?php foreach($images_gl as $gls): ?>
                            <li id="recordsArray_<?=$gls->id?>"><a title="" href="#"><img width="101" height="101" alt="" src="<?=PATH_URL?>static/uploads/houses/gallery/<?=$gls->name_image;?>"></a>
                                <div style="display: none;" class="actions">

                                    <a title="" href="#"><img onclick="return deleteItemGl('<?=$gls->id; ?>', this)" alt="" src="<?=PATH_URL?>static/images/admin/icons/delete.png"></a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </ul>
                <div class="fix"></div>
            </div>
            <span id="status" ></span>






            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td colspan="2">
                        <input type="button" class="add_new_file" id="upload" name="addfile" value="Add Image file">(550x365)
                    </td>
                </tr>
            </table>


            <ul id="files" ></ul>
            <script type="text/javascript" >
                $(function(){
                    var btnUpload=$('#upload');
                    var status=$('#status');
                    new AjaxUpload(btnUpload, {
                        action: root + '/admincp/'+module+'/upload',
                        name: 'uploadfile',
                        onSubmit: function(file, ext){
                            if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                                // extension is not allowed
                                status.text('Only JPG, PNG or GIF files are allowed');
                                return false;
                            }
                            status.text('Uploading...');
                        },
                        onComplete: function(file, response){
                            //On completion clear the status
                            status.text('');
                            //Add uploaded file to list
                            if(response!=="error"){
                                $('#image-list ul').append(response);
                            } else{
                                $('<li></li>').appendTo('#files').text(file).addClass('error');
                            }
                        }
                    });

                });
            </script>
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
    $(document).ready(function(){
        var html = '<tr><td class="left_text_field">Image gallery(550×365):</td><td class="right_text_field"><input type="file" name="fileAdmincp[images_gallery][]"><span class="del_input">Del</span></td></tr>';
        $(".add_new_file").click(function(){
            $(".gallery").append(html).hide().show(1000);
        })
        $(".del_input").live('click', function(){
            $(this).parent().parent().remove();
        })

        $("#frmManagement").validationEngine({
            promptPosition : "bottomLeft",
            scroll: false,
        });

        $("#image-list ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
            var order = $(this).sortable("serialize") + '&';
            $.post(root +"admincp/<?=$module?>/order_img", order, function(theResponse){
                //$("#contentRight").html(theResponse);
            });
        }
        });
    })

    $("#e4").change(function (){
        var value = $(this).val();
        var id    = $('#FormId').val();
        $.ajax({
            url: '<?php echo PATH_URL?>admincp/houses/ajax_update_type',
            type: "POST",
            dataType: 'json',
            data: {
                'type': value,
                'id'   : id
            },
            success: function(data) {
                console.log(data);
                var id_equipment = [];
                var id_facility  = [];
                if(data){
                    $.each(data,function (i,element) {
                        if(i === 1){
                            $.each(element,function (index,item){
                                id_equipment.push(item['equipment_id']);
                            })
                        }
                        if(i === 2){
                            $.each(element,function (index,item){
                                id_facility.push(item['facility_id']);
                            })
                        }
                    })
                }

                $('.chk_equipment').prev().removeClass('jqTransformChecked');
                $('.chk_equipment').removeAttr('checked');
                $('.chk_equipment').each(function (i,element){
                    if(id_equipment.indexOf($(element).val()) != '-1'){
                        $(element).prev().addClass('jqTransformChecked');
                        $(element).attr('checked', 'checked');
                    }
                });

                $('.chk_facility').prev().removeClass('jqTransformChecked');
                $('.chk_facility').removeAttr('checked');
                $('.chk_facility').each(function (i,element){
                    if(id_facility.indexOf($(element).val()) != '-1'){
                        $(element).prev().addClass('jqTransformChecked');
                        $(element).attr('checked', 'checked');
                    }
                });
            }
        })
    })
</script>