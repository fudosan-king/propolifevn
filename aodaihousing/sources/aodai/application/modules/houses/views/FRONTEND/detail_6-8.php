<?php
$true_lang = 'なし';
$false_lang = '否';
$status_p = array('無料','有料');
$status_p_2 = array('可','否');
$data_type = array(
        0 => 'サービスアパートメント',
        1 => 'アパートメント',
        2 => '戸建'
);
?>
<?php if(!empty($item)): ?>
<div class="feture">
    <div class="header-box">
        <div class="box-icon icon-build-1">
            <h3><?=$item->name_jp;?></h3>
        </div>
        
    </div>
    <div class="box-item box-item-detail" style="padding: ;">
        <div class="deatil-top">
            <?php
                $thumb = PATH_URL . 'static/uploads/houses/' . $item->images_thumb;
                if(!@file_get_contents($thumb)) {
                    //$thumb = PATH_URL . 'static/images/no-thumb.jpg';                
                }    
            ?>
            <div class="thumb">
                <img width="192" src="<?=$thumb?>" />
            </div>
            <div class="desc">
                <table width="453" border="0">
                  <tr>
                    <td><span class="bg-x">タイプ</span></td>
                    <td><?=$data_type[$item->type];?></td>
                    <td><span class="bg-x">賃料</span></td>
                    <td><?=$item->rent?> USD</td>
                    <td><span class="bg-x">エリア</span></td>
                    <td><?=$item->area?></td>
                  </tr>
                  <tr>
                    <td><span class="bg-x">間取り</span></td>
                    <td><?=$item->house_layouts;?></td>
                    <td><span class="bg-x">面積</span></td>
                    <td><?=$item->size; ?>m&#178;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td colspan="6"><?=nl2br($item->introduction);?></td>
                  </tr>
                </table> 
            </div>
        </div>
        <div class="share">
            <div class="like">
                <span class="like_label">友達にこの物件を教える</span>
                <div class="fb-like" data-href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . $item->name_en . '/';?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
                <img class="hand_icon" src="<?=PATH_URL?>static/images/icon_handface.png" />
            </div>
        </div>
        <div class="slide">
            <?php echo modules::run('houses/slide', $images_gl); ?>
        </div>
        <div class="comment">
            <h5 class="title-comment">コメント:</h5>
            <p><?=nl2br($item->comment);?>
            </p>
        </div>
        
        <div class="share">
            <div class="like">
                <span class="like_label">友達にこの物件を教える</span>
                <div class="fb-like" data-href="<?=PATH_URL . "houses/detail/" . $item->id . '/' . $item->name_en . '/';?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
                <img class="hand_icon" src="<?=PATH_URL?>static/images/icon_handface.png" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="detail-pro">
            <table width="660" border="0">
              <tr>
                <td class="label">賃料</td>
                <td><?=$item->rent?> USD <?=$item->rent_notice==''?"<br>":''; ?><?=$item->rent_notice?></td>
                <td class="label">所在地</td>
                <td><?=$item->area?></td>
              </tr>
              <tr>
                <td class="label">間取り・面積</td>
                <td><?=$item->size?>m&#178;</td>
                <td class="label">階建</td>
                <td><?=$item->floors?></td>
              </tr>
              <tr>
                <td class="label">備え付け備品</td>
                <td colspan="3">
                <?php
                
                    if(!empty($equipment)){
                        foreach($equipment as $k=>$v){
                            if(count($equipment) == $k+1){
                                echo $v->name;
                            }else{
                                echo $v->name . '、';
                            }
                        }
                    }
                ?>
                
                </td>
              </tr>
              <tr>
                <td colspan="4" class="header-td">契約条件</td>
              </tr>
              <tr>
                <td class="label">領収書</td>
                <td><?=$item->receipt_type?></td>
                <td class="label">デポジット（預託金）</td>
                <td><?=$item->deposit?></td>
              </tr>
              <tr>
                <td class="label">デポジットの返還</td>
                <td><?=$item->deposit_return?></td>
                <td class="label">家賃</td>
                <td><?=$item->rent_condition?></td>
              </tr>
              <tr>
                <td class="label">支払方法</td>
                <td><?=$item->payment_method?></td>
                <td class="label">契約書</td>
                <td><?=nl2br($item->contract);?></td>
              </tr>
              <tr>
                <td class="label">退去事前申し出の期限</td>
                <td><?=$item->move_out?></td>
                <td class="label">入居開始時間</td>
                <td><?=$item->recent_residence?></td>
              </tr>
              <tr>
                <td colspan="4" class="header-td">サービス内容</td>
              </tr>
              <tr>
                <td class="label">電気代</td>
                <td><?=$item->electric_bill?></td>
                <td class="label">ガス代</td>
                <td><?=$item->gas_bill?></td>
              </tr>
              <tr>
                <td class="label">飲料水代</td>
                <td><?=$item->drink_water_bill?></td>
                <td class="label">水道代</td>
                <td><?=$item->water_bill?></td>
              </tr>
              <tr>
                <td rowspan="3" class="label">ランドリーサービス</td>
                <td rowspan="3"><?=$item->laundry_service?></td>
                <td rowspan="3" class="label">電話代</td>
                <td>市内通話: <?=$item->city_call_bill?></td>
              </tr>
              <tr>
                <td>市外通外：:
                <p><?=$item->country_call_bill?></p></td>
              </tr>
              <tr>
                <td>国際通外：
                <p><?=$item->international_call_bill?></p></td>
              </tr>
              <tr>
                <td class="label">掃除</td>
                <td><?=$item->cleaning?></td>
                <td class="label">ベッドメーキング</td>
                <td><?=$item->bed_making?></td>
              </tr>
              
              <tr>
                <td class="label">消耗品の補充　(トイレペーパー、石鹸、リモコンの電池）</td>
                <td><?=$item->consumables_replenishment?></td>
                <td class="label">インターネット</td>
                <td><?=$item->internet?></td>
              </tr>
              <tr>
                <td class="label">プレミアムNHK</td>
                <td><?=$item->premium_nhk;?></td>
                <td class="label">門限時間</td>
                <td><?=$item->closing_time;?></td>
              </tr>
              <tr>
                <td class="label">鍵</td>
                <td><?=$item->key?></td>
                <td class="label">友人、家族の宿泊</td>
                <td><?=$item->others_stay;?> <?=$item->others_stay_notice != ''?"<br>":''?><?=$item->others_stay_notice;?></td>
              </tr>
              <tr>
                <td class="label">家具持込</td>
                <td><?=$item->bringing_furniture?></td>
                <td class="label">ペットの持ち込み</td>
                <td><?=$item->pet;?></td>
              </tr>
              <tr>
                <td class="label">共有設備</td>
                <td colspan="3">
                
                <?php
                
                    if(!empty($common_facility)){
                        foreach($common_facility as $k=>$v){
                            if(count($common_facility) == $k+1){
                                echo $v->name;
                            }else{
                                echo $v->name . '、';
                            }
                        }
                    }
                ?>
                </td>
              </tr>
              <tr>
                <td class="label">備考</td>
                <td colspan="3"><?=nl2br($item->other_notice);?></td>
              </tr>
            </table>  
        </div>
        <?php echo modules::run('common/contact'); ?>
    </div>
    
</div>
<?php endif; ?>