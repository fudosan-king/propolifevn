<div class="wrapper-content-block">
    <form id="myFormId" class='formEstate' method="post" enctype="multipart/form-data">
        <input type="hidden" id="please_enter" value="<?php echo lang('を入力してください')?>">
        <input type="hidden" id="please_select" value="<?php echo lang('を選択してください')?>">
        <input type="hidden" id="number" value="<?php echo lang('数')?>">
        <input type="hidden" id="invalid" value="<?php echo lang('無効')?>">
        <div class="bds-host-block">
            <div class="container">
                <!-- Breadcums -->
                <?php 
                    // File store under folder application/views/FRONTEND/breadcums.php
                    echo $this->load->view('FRONTEND/breadcums');
                ?>

                <div class="bds-host">
                    <div class="content">
                        <div class="content-heading">
                            <?php echo lang('不動産オーナー様へ')?>
                        </div>
                        <div class="bt-solid"></div>
                        <div class="content-description">
                            <p class="common-text">
                            <?php echo lang('estate_owners_bold-text_1')?>
                        </div>
                        <div class="content-form">
                            <div class="row">
                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-username"><?php echo lang('お名前')?> <span>*</span></p>
                                    <div class="info-input pull-right">
                                         <input data-title='<?php echo lang('お名前');?>' type="text" class="inputRequire" name="txtUserName" id="txtUserName"/>
                                    </div>
                                    
                                </div>

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-email"><?php echo lang('Eメール')?> <span>*</span></p>
                                    <div class="info-input pull-right">
                                        <input data-title='<?php echo lang('Eメール');?>' type="email" class="inputRequire" name="txtEmail" id="txtEmail"/>
                                    </div>
                                </div>

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-phone"><?php echo lang('お電話番号')?> <span>*</span></p>
                                    <div class="info-input pull-right">
                                        <input data-title='<?php echo lang('お電話番号');?>' type="tel" class="inputRequire" name="txtPhone" id="txtPhone"/>
                                    </div>
                                </div>

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-address"><?php echo lang('物件住所')?> <span>*</span></p>
                                    <div class="info-input pull-right">
                                        <input data-title='<?php echo lang('物件住所');?>' type="text" class="inputRequire" name="txtAddress" id="txtAddress"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="data-heading"><?php echo lang('物件について')?></div>
                            </div>

                            <div class="row">
                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-name-en"><?php echo lang('建物名（アルファベット）')?>  <span>*</span></p>
                                    <div class="info-input pull-right">
                                        <input data-title='<?php echo lang('建物名（アルファベット）');?>' type="text" class="inputRequire" name="txtName_en" id="txtName_en"/>
                                    </div>
                                </div>

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-name-jp"><?php echo lang('建物名（日本語読み）')?>  <span>*</span></p>
                                    <div class="info-input pull-right">
                                        <input data-title='<?php echo lang('建物名（日本語読み）');?>' type="text" class="inputRequire" name="txtName_jp" id="txtName_jp"/>
                                    </div>
                                </div>

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-rent"><?php echo lang('賃料')?> <USD> <span>*</span></p>
                                    <div class="info-input pull-right">   
                                        <input data-title='<?php echo lang('賃料');?>' type="text" class="inputRequire" name="txtRent" id="txtRent"/>
                                    </div>
                                </div>

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-bedroom"><?php echo lang('間取り')?> <span>*</span></p>
                                    <div class="info-input pull-right">
                                        <select class='select-dropdown selectRequire' name="selBedroom" id="txtBedroom" data-title='<?php echo lang('間取り');?>'>
                                        <option  value=""><?php echo lang('間取りを選択してください')?></option>
                                        <?php if($itemLayouts): ?>
                                            <?php foreach($itemLayouts as $key=>$item): ?>
                                                <?php
                                                $select = '';
                                                ?>
                                                <option <?=$select?> value="<?=$item->id?>"><?php echo vcp_printf($item->name, current_lang_())?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-deposit"><?php echo lang('デポジット')?></p>
                                    <div class="info-input pull-right">
                                        <input data-title='<?php echo lang('デポジット');?>' type="text" class="inputRequire" name="txtDeposits" id="txtDeposits"/>
                                    </div>
                                </div>
                                <?php if($is_device == 'sp'):?>
                                    <div class="data-field clearfix">
                                        <p class="bold-text pull-left" id="scroll-position-area"><?php echo lang('エリア')?> <span>*</span></p>
                                        <div class="info-input pull-right">
                                            <select class='select-dropdown selectRequire' name="selArea" id="selArea" data-title='<?php echo lang('エリア');?>'>
                                                <option  value=""><?php echo lang('エリアを選択してください')?></option>
                                                <?php if($itemAreas): ?>
                                                    <?php foreach($itemAreas as $key=>$item): ?>
                                                        <?php
                                                        $select = '';
                                                        ?>
                                                        <option <?=$select?> value="<?=$item->id?>"><?php echo vcp_printf($item->name,current_lang_());?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php else:?>
                                    <input type="hidden" value="" id="selArea" name="selArea">
                                    <div class="data-field clearfix">
                                        <p class="bold-text pull-left" id="scroll-position-area"><?php echo lang('エリア')?> <span>*</span></p>
                                        <div class="info-input pull-right">
                                            <div class="limited-view">
                                                <div class="label-tab">
                                                <span class="label-text" value="">
                                                    エリアを選択してください
                                                </span>
                                                </div>

                                                <ul class="dropdown-menu" value="">
                                                    <li class="active option">
                                                        エリアを選択してください
                                                    </li>
                                                    <?php if($itemAreas):?>
                                                        <?php foreach($itemAreas as $key=>$item): ?>
                                                            <?php
                                                            $select = '';
                                                            ?>
                                                            <li class="option <?php if($key > 4){ echo "child disable";}?>" value="<?=$item->id?>" style="<?php if($key > 4){ echo "display:none";}?>">
                                                                <?php echo vcp_printf($item->name, current_lang_()); ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                    <li class="option parent" value="">
                                                        その他
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;?>

                               <!--  <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-reach"><?php echo lang('家具の有無')?> <span>*</span></p>
                                    <div class="info-input pull-right"> 
                                        <select class='select-dropdown selectRequire' name="selReach" id="selReach" data-title='<?php echo lang('家具の有無');?>'>
                                        <option  value=""><?php echo lang('値を選択してください')?></option>
                                        <option value="1"><?php echo lang('estate_owners_option_reach_1')?></option>
                                        <option value="2"><?php echo lang('estate_owners_option_reach_2')?></option>
                                        </select>
                                    </div>
                                </div> -->

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-type"><?php echo lang('住居タイプ')?> <span>*</span></p>
                                    <div class="info-input pull-right"> 
                                        <select class='select-dropdown selectRequire' name="selType" id="selType" data-title='<?php echo lang('住居タイプ');?>'>
                                        <option value=""><?php echo lang('住居タイプを選択してください')?></option>
                                        <?php
                                        $data_option = array(
                                            1 => lang('アパートメント'),
                                            0 => lang('サービスアパートメント'),
                                            2 => lang('戸建')
                                        );
                                        foreach($data_option as $key=>$item){
                                            $select = '';
                                            ?>
                                            <option <?=$select;?> value="<?=$key?>"><?=$item;?></option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="data-field clearfix">
                                    <p class="bold-text pull-left" id="scroll-position-size"><?php echo lang('面積')?> <span>*</span></p>
                                    <div class="info-input pull-right"> 
                                        <input data-title='<?php echo lang('面積')?>' type="text"  name="txtSize" class="inputRequire"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row option-group-item clearfix">
                                <div class="data-text checkbox-label-block-first pull-left"><?php echo lang('賃料に含まれるもの')?></div>
                                <div class="checkbox-block checkbox-block-first pull-right">
                                    <?php if($equipments):
                                        foreach ($equipments as $equipment):?>
                                            <div class="data-field-small">
                                                <label>
                                                    <input name="chkEquipment[]" type="checkbox" class="checkedval" value=" <?php echo $equipment->id?>" />
                                                    <span class="data-name"><?php echo vcp_printf($equipment->name,current_lang_())?></span>
                                                </label>
                                            </div>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="row option-group-item clearfix">
                                <div class="data-text checkbox-label-block-second pull-left"><?php echo lang('設備')?>
                                    
                                </div>
                                <div class="checkbox-block checkbox-block-second pull-left">
                                    <?php if($facilitys):
                                        foreach ($facilitys as $facility):?>
                                            <div class="data-field-small">
                                                <label>
                                                    <input name="chkFacility[]" type="checkbox" class="checkedval" value=" <?php echo $facility->id?>" />
                                                    <span><?php echo vcp_printf($facility->name,current_lang_())?></span>
                                                </label>
                                            </div>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="row option-group-item clearfix">
                                <div class="data-text"><?php echo lang('物件の強み弱み、ご質問などご記入下さい。')?></div>
                                <div class="data-field-large"><textarea name="txtIntroction"></textarea></div>
                            </div>
                            <div class="row option-group-item upload-reference clearfix">
                                <div class="data-text"><?php echo lang('画像アップロード')?></div>
                                <div class="data-group">
                                    <div class="data-upload">
                                        <input type="text" disabled/>
                                        <label for="file-upload1" class="btn-upload">
                                         <?php echo lang('参照')?>
                                        </label>
                                        <input type="file" name="txtFile[]" id ="file-upload1"/>
                                    </div>
                                    <div class="data-upload">
                                        <input type="text"  disabled/>
                                        <label for="file-upload2" class="btn-upload">
                                        <?php echo lang('参照')?>
                                        </label>
                                        <input type="file" name="txtFile[]" id="file-upload2"/>
                                    </div>
                                    <div class="data-upload">
                                        <input type="text" disabled/>
                                        <label for="file-upload3" class="btn-upload">
                                        <?php echo lang('参照')?>
                                        </label>
                                        <input type="file" name="txtFile[]" id="file-upload3"/>
                                    </div>
                                    <div class="data-upload">
                                        <input type="text"  />
                                        <label for="file-upload4" class="btn-upload">
                                        <?php echo lang('参照')?>
                                        </label>
                                        <input type="file" name="txtFile[]" id="file-upload4"/>
                                    </div>
                                    <div class="data-upload">
                                        <input type="text"  />
                                        <label for="file-upload5" class="btn-upload">
                                        <?php echo lang('参照')?>
                                        </label>
                                        <input type="file" name="txtFile[]" id="file-upload5"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="data-policy">
                                    <span><?php echo lang('estate_owners_data-policy_span_1')?></span><?php echo lang('estate_owners_data-policy_span_2')?>
                                </div>

                                <div class="capcha">
                                    <div class="g-recaptcha" data-sitekey="your_site_key" hl="vi"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="data-button">
                                    <input class='save_estate_owners' type="button" value="送信する" name="btnSend"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- content-search-block -->
        <!--  display information  -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo lang('estate_owners_modal-title_1')?></h4>
                    </div>

                    <div class="modal-body">
                        <ul class="list">
                        </ul>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('estate_owners_btn btn-default_1')?></button>
                        <button type="button" class="btn btn-red btnSave" value="" name="btnSave"><?php echo lang('estate_owners_btn btn-red_1')?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div><!-- wrapper-content-block -->
<script type="text/javascript" src="<?php echo PATH_URL . 'static/js/';?>jquery-3.3.1.min.js"></script>
<script>
    $(function(){
        var aodai = new AODAI();
        $('.save_estate_owners').on('click', function(){
            var result = aodai.validateEstateOwners();
            if (result === true) {
                aodai.validateConfirmInfoClick();
            } else {
                return false;
            }
        });
       
        $('.btnSave').on('click', function(){
            $('.btnSave').attr('disabled', 'disabled');
            var form = $('#myFormId')[0];
            var formData = new FormData(form);
            $.ajax({
                url: '<?php echo PATH_URL?>/page/ajax_estate_owners',
                type: "POST",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                data: formData
            })
            .done(function(response) {
                if (response) {
                    alert(response);
                    window.location.href = '<?php echo PATH_URL . $vn; ?>page/不動産オーナー様へ';
                }
            });
        });
    });
</script>

<script>
    var labelTab = $('.label-tab');
    var labelText = labelTab.find('.label-text');
    var linkActive = labelTab.next().find('li.active');
    var text = linkActive.text();

    labelText.text(text);
//
    $(document).off('click.toggleActive').on('click.toggleActive', '.dropdown-menu li', function(e) {
        e.preventDefault();
        var self = $(this);

        if(self.hasClass('active')) {
            return;
        }

        $('.dropdown-menu li').removeClass('active');
        self.addClass('active');
        labelText.text(self.text());
    });

    labelTab.on('click', function() {
        $('.dropdown-menu').slideToggle();
    });

    $('.select ul li.option').click(function() {
        $(this).siblings().children().remove();
        var a = $(this).siblings().toggle();
    });


    $('.option').click(function () {
        $('.dropdown-menu').css('display','none');
        var id = $(this).val();
        $('#selArea').val(id);
    });

    $('.parent').mouseover(function() {
        $('.dropdown-menu').css('display','block');
        if($('.child').hasClass('disable')){
            $('.child').css('display','block');
            $('.child').removeClass('disable');
            $('.parent').addClass('disable');
            $('.parent').css('display','none');
        }
    });

    $('.dropdown-menu').mouseleave(function () {
        if(!$('.child').hasClass('disable')){
            $('.child').addClass('disable');
            $('.child').css('display','none');
            $('.parent').removeClass('disable');
            $('.parent').css('display','block');
        }
    });

//	var device = '<?php //echo $is_device;?>//';
//		if(device === 'sp'){
//            $('.parent').on('touchmove',function(){
//                $('.dropdown-menu').css('display','block');
//                if($('.child').hasClass('disable')){
//                    $('.child').css('display','block');
//                    $('.child').removeClass('disable');
//                    $('.parent').addClass('disable');
//                    $('.parent').css('display','none');
//                }
//            });
//		}
</script>