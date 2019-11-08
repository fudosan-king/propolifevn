<?php
$true_lang = 'なし';
$false_lang = '否';
$status_p = array('無料','有料');
$status_p_2 = array('可','否');
$data_type = array(
        0 => lang('サービスアパートメント'),
        1 => lang('アパートメント'),
        2 => lang('戸建')
);
if(current_lang_() == 'vn'){    
    $tien_te = 'USD';
}else{
    $tien_te = 'USD';
}

$area=array(
    3 => lang('lethanhton'),
    2 => lang('quan_1'),
    10 => lang('quanbinhthanh'),
    17 => lang('quan_2'),
    11 => lang('quan_3'),
    13 => lang('quan_7')
);
$areas = $this->input->get("areas");
?>
<?php if(!empty($item)): ?>
<div class="introduce title-option"><p><?=vcp_printf($item->name_en, current_lang_());?></p></div>
<div class="main-image">
    <!-- <a href="#"><div class="prev-img"><img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>prev_img.png"></div></a>
        <a href="#"><div class="next-img"><img src="<?=PATH_URL_IMAGES.'static/images/aodai_mobile/'?>next_img.png"></div></a>
    -->
    <div class="slide">
        <?php echo modules::run('houses/slide', $images_gl,$thumb = ''); ?>
    </div>

</div>
<div class="information">
    <div class="title-info">    
        <p><?=vcp_printf($item->name_jp, current_lang_());?></p>
    </div>
    <div class="content-info">
        <p>
            <?=nl2br(vcp_printf($item->introduction, current_lang_()));?>
        </p>
    </div>
</div>

<a href="<?=create_url(); ?>contact/contact_mobile?type=houses&amp;id=<?=$item->id?>"><div class="contact-custom email-contact"><p><?php echo lang('メールで問い合わせる'); ?></p></div></a>
<a href="tel:<?php echo lang('phone_mobile'); ?>"><div class="contact-custom mobile-contact"><p><?php echo lang('電話で今すぐ確認する'); ?></p></div></a>

<!------ table detail---- -->
<div class="title-description"><p><?php echo lang('物件概要'); ?></p></div>

<div class="form-info">
    <div class="line"></div>
    <div class="field-rows">
        <div class="left-label"><p><?php echo lang('賃料'); ?></p></div>
        <div class="right-info">
            <p><?php echo vcp_printf($item->rent, current_lang_()); ?> <?=$tien_te; ?> <?=$item->rent_notice==''?"<br>":''; ?><?php vcp_printf($item->rent_notice, current_lang_()); ?></p>
        </div>
    </div>

    <div class="field-rows">
        <div class="left-label"><p><?php echo lang('間取り'); ?></p></div>
        <div class="right-info"><p><?php echo vcp_printf($item->house_layouts, current_lang_());?></p></div>
    </div>

    <div class="field-rows">
        <div class="left-label"><p><?php echo lang('面積'); ?></p></div>
        <div class="right-info"><p><?php echo vcp_printf($item->size, current_lang_()); ?>m&#178;</p></div>
    </div>

    <div class="field-rows">
        <div class="left-label"><p><?php echo lang('住所'); ?></p></div>
        <div class="right-info"><p><?php echo vcp_printf($item->area, current_lang_()); ?></p></div> <!-- $area[$item->key] = $item->value; -->
    </div>

    <!-- <div class="field-rows">
        <div class="left-label"><p><?php echo lang('部屋番号'); ?></p></div>
        <div class="right-info"><p>1202</p></div>
    </div> -->

    <div class="field-rows">
        <div class="left-label"><p><?php echo lang('所在階'); ?></p></div>
        <div class="right-info"><p><?php echo vcp_printf($item->floors, current_lang_()); ?></p></div>
    </div>

    <div class="field-rows">
        <div class="left-label left-res"><p><?php echo lang('備品'); ?></p></div>
        <div class="right-info right-res">
            <p>
                <?php
                
                    if(!empty($equipment)){
                        foreach($equipment as $k=>$v){
                            if(count($equipment) == $k+1){
                                echo vcp_printf($v->name, current_lang_());
                            }else{
                                echo vcp_printf($v->name, current_lang_()) . '、';
                            }
                        }
                    }
                ?>
            </p>
        </div>
    </div>
</div>

<!-- ----------table 2 ---------- -->

<!-- <div class="title-description2"><p><?php echo lang('サービス内容'); ?></p></div>

<div class="form-info">
    <div class="line"></div>
    <div class="field-rows">
        <div class="left-label"><p><?php echo lang('電気代'); ?></p></div>
        <div class="right-info"><p><?php echo vcp_printf($item->electric_bill, current_lang_()); ?></p></div>
    </div>

    <div class="field-rows">
        <div class="left-label"><p><?php echo lang('飲料水代'); ?></p></div>
        <div class="right-info"><p><?php echo vcp_printf($item->drink_water_bill, current_lang_()); ?></p></div>
    </div>
</div> -->

<!------ Service contents table---- -->
<div class="title-description2 condition"><p><?php echo lang('サービス内容'); ?></p></div>

<div class="form-info">
    <div class="line-custom line1"></div>
    <div class="line-custom line2"></div>
    <div class="line-custom line3"></div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('電気代'); ?></p></div>  
        <div class="col2"><p><?php echo vcp_printf($item->electric_bill, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('ガス代'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->gas_bill,current_lang_()); ?></p></div>
    </div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('飲料水代'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->drink_water_bill, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('水道代'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->water_bill, current_lang_()); ?></p></div>
    </div>

    <div class="condition-table-rows rows-3-custom">
        <div class="col1"><p><?php echo lang('ランドリーサービス'); ?></p></div>
        <div class="col2 rows-3-custom"><p><?php echo vcp_printf($item->laundry_service, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('電話代'); ?></p></div>
        <div class="col2 split-3">
            <div class="w-3">
                <p><?php echo lang('市内通話'); ?> : <?=vcp_printf($item->city_call_bill, current_lang_())?></p>
            </div>
            <div class="w-3">
                <p><?php echo lang('市外通外'); ?>：<?php echo vcp_printf($item->country_call_bill, current_lang_()); ?></p>
            </div>
            <div class="w-3 last">
                <p><?php echo lang('国際通外'); ?>：<?php echo vcp_printf(vcp_printf($item->international_call_bill, current_lang_())); ?></p>
            </div>  
        </div>
    </div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('掃除'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->cleaning, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('ベッドメーキング'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->bed_making, current_lang_()); ?></p></div>
    </div>

    <div class="condition-table-rows consumables">
        <div class="col1 consumables"><p><?php echo lang('消耗品の補充　(トイレペーパー、石鹸、リモコンの電池'); ?>）</p></div>
        <div class="col2 consumables"><p><?php echo vcp_printf($item->consumables_replenishment, current_lang_()); ?></p></div>
        <div class="col1 consumables"><p><?php echo lang('インターネット'); ?></p></div>
        <div class="col2 consumables"><p><?php echo vcp_printf($item->internet, current_lang_()); ?></p></div>
    </div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('プレミアムNHK'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->premium_nhk, current_lang_());?></p></div>
        <div class="col1"><p><?php echo lang('門限時間'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->closing_time, current_lang_());?></p></div>
    </div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('鍵'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->key, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('友人、家族の宿泊'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->others_stay, current_lang_());?> <?=$item->others_stay_notice != ''?"<br>":''?><?php echo vcp_printf($item->others_stay_notice, current_lang_());?></p></div>
    </div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('家具持込'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->bringing_furniture, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('ペットの持ち込み'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->pet, current_lang_());?></p></div>
    </div>
</div>

<div class="condition-table-rows">
    <div class="line-custom line-bottom"></div>
    <div class="col1 bottom1"><p><?php echo lang('共有設備'); ?></p></div>
    <div class="col2 bottom2">
        <p>
            <?php
                if(!empty($common_facility)){
                    foreach($common_facility as $k=>$v){
                        if(count($common_facility) == $k+1){
                            echo vcp_printf($v->name, current_lang_());
                        }else{
                            echo vcp_printf($v->name, current_lang_()) . '、';
                        }
                    }
                }
            ?>
        </p>
    </div>
</div>

<div class="condition-table-rows">
    <div class="line-custom line-bottom"></div>
    <div class="col1 bottom1"><p><?php echo lang('備考'); ?></p></div>
    <div class="col2 bottom2"><p><?=nl2br(vcp_printf($item->other_notice, current_lang_()));?></p></div>
</div>

<!------ Condition table---- -->
<div class="title-description2 condition"><p><?php echo lang('契約条件'); ?></p></div>

<div class="form-info">
    <div class="line-custom line1"></div>
    <div class="line-custom line2"></div>
    <div class="line-custom line3"></div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('領収書'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->receipt_type, current_lang_());?></p></div>
        <div class="col1"><p><?php echo lang('デポジット（預託金）'); ?>）</p></div>
        <div class="col2"><p><?php echo vcp_printf($item->deposit, current_lang_()); ?></p></div>
    </div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('デポジットの返還'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->deposit_return, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('家賃'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->rent_condition, current_lang_()); ?></p></div>
    </div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('支払方法'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->payment_method, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('契約書'); ?></p></div>
        <div class="col2"><p><?=nl2br(vcp_printf($item->contract, current_lang_()));?></p></div>
    </div>

    <div class="condition-table-rows">
        <div class="col1"><p><?php echo lang('退去事前申し出の期限'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->move_out, current_lang_()); ?></p></div>
        <div class="col1"><p><?php echo lang('入居開始時間'); ?></p></div>
        <div class="col2"><p><?php echo vcp_printf($item->recent_residence, current_lang_()); ?></p></div>
    </div>
</div>
<a href="<?=create_url(); ?>contact/contact_mobile?type=houses&amp;id=<?=$item->id?>"><div class="contact-custom email-contact"><p><?php echo lang('メールで問い合わせる'); ?></p></div></a>
<a href="tel:<?php echo lang('phone_mobile'); ?>"><div class="contact-custom mobile-contact"><p><?php echo lang('電話で今すぐ確認する'); ?></p></div></a>

<?php endif; ?>