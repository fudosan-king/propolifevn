<?php
$true_lang = 'なし';
$false_lang = '否';
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
            <h3><?php echo vcp_printf($item->name_jp, current_lang_());?></h3>
        </div>
        
    </div>
    <div class="box-item box-item-detail">
        <div class="deatil-top">
            <?php
                $thumb = PATH_URL_IMAGES . 'static/uploads/offices/' . $item->images_thumb;
                if(!@file_get_contents($thumb)) {
                    //$thumb = PATH_URL_IMAGES . 'static/images/no-thumb.jpg';                
                }    
            ?>
            <div class="thumb">
                <img src="<?=$thumb?>" width="172px" />
            </div>
            <div class="desc"> 
                <table width="473" border="0">
                  <tr>
                    <td><span class="bg-x"><?php echo lang('エリア'); ?></span></td>
                    <td><?php echo vcp_printf($item->name, current_lang_());?></td>
                    <td><span class="bg-x"><?php echo lang('賃料'); ?></span></td>
                    <td>
                        <?=!empty($item->month_rent)? vcp_printf($item->month_rent, current_lang_()) . ' ' .$tien_te .'/'. lang('月'): ''; ?>
                        <?=!empty($item->size_rent) && !empty($item->month_rent)? ' - ':'';?>
                        <?=!empty($item->size_rent)? vcp_printf($item->size_rent, current_lang_()) . ' ' .$tien_te .'/m&#178;':'';?>
                  </tr>
                  <tr>
                    <td><span class="bg-x"><?php echo lang('面積'); ?></span></td>
                    <td><?php echo vcp_printf($item->size, current_lang_());?>m&#178;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td colspan="4"><?=nl2br(vcp_printf($item->introduction, current_lang_()));?></td>
                  </tr>
                </table>
            </div>
        </div>
        <div class="share">
            <div class="like">
                <span class="like_label"><?php echo lang('友達にこの物件を教える'); ?></span>
                <div class="fb-like" data-href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . vcp_printf($item->name_en, 'jp') . '/';?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
                <img class="hand_icon" src="<?=PATH_URL_IMAGES?>static/images/icon_handface.png" />
            </div>
        </div>
        <div class="slide">
            <?php echo modules::run('offices/slide', $images_gl); ?>
        </div>
        <div class="comment">
            <h5 class="title-comment"><?php echo lang('コメント'); ?>:</h5>
            <p><?=nl2br(vcp_printf($item->comment, current_lang_()));?>
            </p>
        </div>
        <div class="share">
            <div class="like">
                <span class="like_label"><?php echo lang('友達にこの物件を教える'); ?></span>
                <div class="fb-like" data-href="<?=PATH_URL . "offices/detail/" . $item->id . '/' . vcp_printf($item->name_en, 'jp') . '/';?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
                <img class="hand_icon" src="<?=PATH_URL_IMAGES?>static/images/icon_handface.png" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="detail-pro">
            <table width="660" border="0">
              <tr>
                <td width="152" class="label"><?php echo lang('賃料　平米単価'); ?>/<?=$tien_te?></td>
                <td width="197">
                    <?=!empty($item->month_rent)? vcp_printf($item->month_rent, current_lang_()) . ' ' .$tien_te .'/'. lang('月'): ''; ?>
                    <?=!empty($item->size_rent) && !empty($item->month_rent)? ' - ':'';?>
                    <?=!empty($item->size_rent)? vcp_printf($item->size_rent, current_lang_()) . ' ' .$tien_te .'/m&#178;':'';?>
                    <?php echo vcp_printf($item->rent_notice, current_lang_());?>
                </td>
                </td>
                <td width="132" class="label"><?php echo lang('所在地'); ?></td>
                <td><?php echo vcp_printf($item->name, current_lang_());?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('広さ'); ?></td>
                <td><?php echo vcp_printf($item->size, current_lang_());?>m&#178;</td>
                <td><?php echo lang('階建'); ?></td>
                <td><?php echo vcp_printf($item->floors, current_lang_());?></td>
              </tr>
              <tr>
                <td colspan="4" class="header-td"><?php echo lang('サービス内容'); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('電気代'); ?></td>
                <td><?php echo vcp_printf($item->electric_bill, current_lang_())?></td>
                <td class="label"><?php echo lang('ガス代'); ?></td>
                <td><?php echo vcp_printf($item->gas_bill, current_lang_())?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('飲料水代'); ?></td>
                <td><?php echo vcp_printf($item->drink_water_bill, current_lang_());?></td>
                <td class="label"><?php echo lang('水道代'); ?></td>
                <td><?php echo vcp_printf($item->water_bill, current_lang_())?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('掃除'); ?></td>
                <td><?php echo vcp_printf($item->cleaning, current_lang_());?></td>
                <td class="label"><?php echo lang('電話代'); ?></td>
                <td><?php echo vcp_printf($item->phone_bill, current_lang_())?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('消耗品の補充　(トイレペーパー、石鹸、リモコンの電池）'); ?></td>
                <td><?php echo vcp_printf($item->consumables_replenishment, current_lang_());?></td>
                <td class="label"><?php echo lang('インターネット'); ?></td>
                <td><?php echo vcp_printf($item->internet, current_lang_())?></td>
              </tr>
               <tr>
                <td class="label"><?php echo lang('プレミアムNHK'); ?></td>
                <td><?php echo vcp_printf($item->premium_nhk, current_lang_());?></td>
                <td class="label"><?php echo lang('門限時間'); ?></td>
                <td><?php echo vcp_printf($item->closing_time, current_lang_())?></td>
              </tr>
              
               <tr>
                <td class="label"><?php echo lang('鍵'); ?></td>
                <td><?php echo vcp_printf($item->key, current_lang_());?></td>
                <td class="label"><?php echo lang('セキュリティ'); ?></td>
                <td><?php echo vcp_printf($item->security, current_lang_());?></td>
              </tr>
               <tr>
                <td class="label"><?php echo lang('家具持込'); ?></td>
                <td><?php echo vcp_printf($item->bringing_furniture, current_lang_())?></td>
                <td class="label"><?php echo lang('ペットの持ち込み'); ?></td>
                <td><?php echo vcp_printf($item->pet, current_lang_())?></td>
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
                <td colspan="4" class="header-td"><?php echo lang('契約条件'); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('領収書'); ?></td>
                <td><?php echo vcp_printf($item->receipt_type, current_lang_()); ?></td>
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
                <td><?php echo vcp_printf($item->contract, current_lang_()); ?></td>
              </tr>
              <tr>
                <td class="label"><?php echo lang('退去事前申し出の期限'); ?></td>
                <td><?php echo vcp_printf($item->move_out, current_lang_()); ?></td>
                <td class="label"><?php echo lang('最近入居期間'); ?></td>
                <td><?php echo vcp_printf($item->recent_residence, current_lang_()); ?></td>
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
                <td class="label"><?php echo lang('備考'); ?></td>
                <td colspan="3"><?=nl2br(vcp_printf($item->other_notice, current_lang_()));?></td>
              </tr>
            </table>
        </div>
        <?php 
        $type = 'offices';
        $id = $item->id;
        ?>
        <?php echo modules::run('common/contact', $type, $id); ?>
    </div>
    
</div>
<?php endif; ?>