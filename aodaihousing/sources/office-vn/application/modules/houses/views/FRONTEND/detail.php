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
?>
    <?php if(!empty($item)): ?>
<div class="feture">
    <div class="header-box">
        <div class="box-icon icon-build-1">
            <h3><?=vcp_printf($item->name_jp, current_lang_());?></h3>
        </div>
        
    </div>
    <div class="box-item box-item-detail" style="padding: ;">
        <div class="deatil-top">
            <?php
            $thumb = '';
                if($item->images_thumb != ''){
                    $thumb = PATH_URL_IMAGES . 'static/uploads/houses/' . $item->images_thumb;
                }elseif (isset($images_gl)){
                    $thumb = PATH_URL_IMAGES . 'static/uploads/houses/gallery/' . $images_gl[0]->name_image;
                }
                if(!@file_get_contents($thumb)) {
                    //$thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
                }    
            ?>
            <div class="thumb">
                <img width="192" src="<?=$thumb?>" />
            </div>
            <div class="desc">
                <table width="453" border="0">
                  <tr>
                    <td><span class="bg-x"><?php echo lang('タイプ'); ?></span></td>
                    <td><?=$data_type[$item->type];?></td>
                    <td><span class="bg-x"><?php echo lang('賃料'); ?></span></td>
                    <td><?php echo vcp_printf($item->rent, current_lang_()); ?> <?=$tien_te;?></td>
                    <td><span class="bg-x"><?php echo lang('エリア'); ?></span></td>
                    <td><?php echo vcp_printf($item->area, current_lang_()); ?></td>
                  </tr>
                  <tr>
     
                    <td><span class="bg-x"><?php echo lang('間取り'); ?></span></td>
                    <td><?php echo vcp_printf($item->house_layouts, current_lang_());?></td>
                    <td><span class="bg-x"><?php echo lang('面積'); ?></span></td>
                    <td><?php echo vcp_printf($item->size, current_lang_()); ?>m&#178;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td colspan="6"><?=nl2br(vcp_printf($item->introduction, current_lang_()));?></td>
                  </tr>
                </table> 
            </div>
        </div>
        <div class="share">
            <div class="like">
                <span class="like_label"><?php echo lang('友達にこの物件を教える'); ?></span>
                <div class="fb-like" data-href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . vcp_printf($item->name_en, 'jp') . '/';?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
                <img class="hand_icon" src="<?=PATH_URL_IMAGES?>static/images/icon_handface.png" />
            </div>
        </div>
        <div class="slide">
            <?php echo modules::run('houses/slide', $images_gl,$item->images_thumb); ?>
        </div>
        <div class="comment">
            <h5 class="title-comment"><?php echo lang('コメント'); ?>:</h5>
            <p><?=nl2br(vcp_printf($item->comment, current_lang_()));?>
            </p>
        </div>
        
        <div class="share">
            <div class="like">
                <span class="like_label"><?php echo lang('友達にこの物件を教える'); ?></span>
                <div class="fb-like" data-href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . vcp_printf($item->name_en, 'jp') . '/';?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
                <img class="hand_icon" src="<?=PATH_URL_IMAGES?>static/images/icon_handface.png" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="detail-pro">
            <table width="660" border="0">
              <tr>
                <td class="label"><?php echo lang('賃料'); ?></td>
                <td><?php echo vcp_printf($item->rent, current_lang_()); ?> <?=$tien_te; ?> <?=$item->rent_notice==''?"<br>":''; ?><?php vcp_printf($item->rent_notice, current_lang_()); ?></td>
                <td class="label"><?php echo lang('所在地'); ?></td>
                <td><?php echo vcp_printf($item->area, current_lang_()); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('間取り・面積'); ?></td>
                <td><?php echo vcp_printf($item->size, current_lang_()); ?>m&#178;</td>
                <td class="label"><?php echo lang('階建'); ?></td>
                <td><?php echo vcp_printf($item->floors, current_lang_()); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('備え付け備品'); ?></td>
                <td colspan="3">
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
                
                </td>
              </tr>
              <tr>
                <td colspan="4" class="header-td"><?php echo lang('契約条件'); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('領収書'); ?></td>
                <td><?php echo vcp_printf($item->receipt_type, current_lang_());?></td>
                <td class="label"><?php echo lang('デポジット（預託金）'); ?></td>
                <td><?php echo vcp_printf($item->deposit, current_lang_()); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('デポジットの返還'); ?></td>
                <td><?php echo vcp_printf($item->deposit_return, current_lang_()); ?></td>
                <td class="label"><?php echo lang('家賃'); ?></td>
                <td><?php echo vcp_printf($item->rent_condition, current_lang_()); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('支払方法'); ?></td>
                <td><?php echo vcp_printf($item->payment_method, current_lang_()); ?></td>
                <td class="label"><?php echo lang('契約書'); ?></td>
                <td><?=nl2br(vcp_printf($item->contract, current_lang_()));?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('退去事前申し出の期限'); ?></td>
                <td><?php echo vcp_printf($item->move_out, current_lang_()); ?></td>
                <td class="label"><?php echo lang('入居開始時間'); ?></td>
                <td><?php echo vcp_printf($item->recent_residence, current_lang_()); ?></td>
              </tr>
              <tr>
                <td colspan="4" class="header-td"><?php echo lang('サービス内容'); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('電気代'); ?></td>
                <td><?php echo vcp_printf($item->electric_bill, current_lang_()); ?></td>
                <td class="label"><?php echo lang('ガス代'); ?></td>
                <td><?php echo vcp_printf($item->gas_bill,current_lang_()); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('飲料水代'); ?></td>
                <td><?php echo vcp_printf($item->drink_water_bill, current_lang_()); ?></td>
                <td class="label"><?php echo lang('水道代'); ?></td>
                <td><?php echo vcp_printf($item->water_bill, current_lang_()); ?></td>
              </tr>
              <tr>
                <td rowspan="3" class="label"><?php echo lang('ランドリーサービス'); ?></td>
                <td rowspan="3"><?php echo vcp_printf($item->laundry_service, current_lang_()); ?></td>
                <td rowspan="3" class="label"><?php echo lang('電話代'); ?></td>
                <td><?php echo lang('市内通話'); ?>: <?=vcp_printf($item->city_call_bill, current_lang_())?></td>
              </tr>
              <tr>
                <td><?php echo lang('市外通外'); ?>：
                <p><?php echo vcp_printf($item->country_call_bill, current_lang_()); ?></p></td>
              </tr>
              <tr>
                <td><?php echo lang('国際通外'); ?>：
                <p><?php echo vcp_printf(vcp_printf($item->international_call_bill, current_lang_())); ?></p></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('掃除'); ?></td>
                <td><?php echo vcp_printf($item->cleaning, current_lang_()); ?></td>
                <td class="label"><?php echo lang('ベッドメーキング'); ?></td>
                <td><?php echo vcp_printf($item->bed_making, current_lang_()); ?></td>
              </tr>
              
              <tr>
                <td class="label"><?php echo lang('消耗品の補充　(トイレペーパー、石鹸、リモコンの電池'); ?>）</td>
                <td><?php echo vcp_printf($item->consumables_replenishment, current_lang_()); ?></td>
                <td class="label"><?php echo lang('インターネット'); ?></td>
                <td><?php echo vcp_printf($item->internet, current_lang_()); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('プレミアムNHK'); ?></td>
                <td><?php echo vcp_printf($item->premium_nhk, current_lang_());?></td>
                <td class="label"><?php echo lang('門限時間'); ?></td>
                <td><?php echo vcp_printf($item->closing_time, current_lang_());?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('鍵'); ?></td>
                <td><?php echo vcp_printf($item->key, current_lang_()); ?></td>
                <td class="label"><?php echo lang('友人、家族の宿泊'); ?></td>
                <td><?php echo vcp_printf($item->others_stay, current_lang_());?> <?=$item->others_stay_notice != ''?"<br>":''?><?php echo vcp_printf($item->others_stay_notice, current_lang_());?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('家具持込'); ?></td>
                <td><?php echo vcp_printf($item->bringing_furniture, current_lang_()); ?></td>
                <td class="label"><?php echo lang('ペットの持ち込み'); ?></td>
                <td><?php echo vcp_printf($item->pet, current_lang_());?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('共有設備'); ?></td>
                <td colspan="3">
                
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
                </td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('備考'); ?></td>
                <td colspan="3"><?=nl2br(vcp_printf($item->other_notice, current_lang_()));?></td>
              </tr>
            </table>  
        </div>
        <?php 
        $type = 'houses';
        $id = $item->id;
        ?>
        <?php echo modules::run('common/contact', $type, $id); ?>
    </div>
    
</div>
<?php endif; ?>