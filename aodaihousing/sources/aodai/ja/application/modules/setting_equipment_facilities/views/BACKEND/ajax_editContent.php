<script type="text/javascript">
    function showRequest(formData, jqForm, options) {
        var valid = $("#frmManagement").validationEngine('validate');
        var vars = $("#frmManagement").serialize();
            return true;
            //$("#frmManagement").validationEngine();
    }
</script>
<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/6/2018
 * Time: 3:07 PM
 */
?>
<form id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
    <div class="head_table"><div class="head_title_edit"><?=$module?></div></div>
    </br>
    <div class="table">
        <div class="clearAll"></div>
        <div class="head_table"><div class="head_title_table">Condominium</div></div>
<!--        <h class="right_text_field" style="font-size: 20px">-Condominium</h>-->
        <?php
        $data_db = array();
        if(isset($equipment_condo)){
            foreach($equipment_condo as $item) {
                $data_db[] = $item->equipment_id;
            }
        }
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Equipments:</td>
                    <td class="right_text_field">
                        <?php if(isset($equipments)):?>
                            <?php foreach($equipments as $item):?>
                                <?php
                                $selected = '';
                                if(isset($data_db)){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'checked="checked"';
                                    }
                                }
                                ?>
                                <div class="warp-check">
                                    <span class="span-check"><?=vcp_printf($item->name, 'jp')?></span>
                                    <span><input <?=$selected; ?> value="<?=$item->id; ?>" type="checkbox" class="custom_chk" name="Condo_equipment[]" /></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </td>

                </tr>
            </table>
        </div>

        <?php
        $data_db = array();
        if(isset($facilities_condo)){
            foreach($facilities_condo as $item) {
                $data_db[] = $item->facility_id;
            }
        }
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Common facilities:</td>
                    <td class="right_text_field">
                        <?php if(isset($facilities)): ?>
                            <?php foreach($facilities as $item): ?>
                                <?php
                                $selected = '';
                                if(isset($data_db)){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'checked="checked"';
                                    }
                                }
                                ?>
                                <div class="warp-check">
                                    <span class="span-check"><?=vcp_printf($item->name, 'jp')?></span>
                                    <span><input <?=$selected; ?> value="<?=$item->id; ?>" type="checkbox" class="custom_chk" name="Condo_facilities[]" /></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </td>

                </tr>
            </table>
        </div>
        <div class="fix"></div>
    </div>
    </br>
    </br>
    <div class="table">
        <div class="clearAll"></div>
        <div class="head_table"><div class="head_title_table">Serviced apartment</div></div>
<!--        <h class="right_text_field" style="font-size: 20px">-Serviced apartment</h>-->

        <?php
        $data_db = array();
        if(isset($equipments_serviced)){
            foreach($equipments_serviced as $item) {
                $data_db[] = $item->equipment_id;
            }
        }
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Equipments:</td>
                    <td class="right_text_field">
                        <?php if(isset($equipments)):?>
                            <?php foreach($equipments as $item):?>
                                <?php
                                $selected = '';
                                if(isset($data_db)){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'checked="checked"';
                                    }
                                }
                                ?>
                                <div class="warp-check">
                                    <span class="span-check"><?=vcp_printf($item->name, 'jp')?></span>
                                    <span><input <?=$selected; ?> value="<?=$item->id; ?>" type="checkbox" class="custom_chk" name="Serviced_equipment[]" /></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </td>

                </tr>
            </table>
        </div>

        <?php
        $data_db = array();
        if(isset($facilities_serviced)){
            foreach($facilities_serviced as $item) {
                $data_db[] = $item->facility_id;
            }
        }
        ?>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Common facilities:</td>
                    <td class="right_text_field">
                        <?php if(isset($facilities)): ?>
                            <?php foreach($facilities as $item): ?>
                                <?php
                                $selected = '';
                                if(isset($data_db)){
                                    if(in_array($item->id,$data_db)){
                                        $selected = 'checked="checked"';
                                    }
                                }
                                ?>
                                <div class="warp-check">
                                    <span class="span-check"><?=vcp_printf($item->name, 'jp')?></span>
                                    <span><input <?=$selected; ?> value="<?=$item->id; ?>" type="checkbox" class="custom_chk" name="Serviced_facilities[]" /></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </td>

                </tr>
            </table>
        </div>
        <div class="fix"></div>
    </div>
</form>