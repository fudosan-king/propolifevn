<style>
    ::-webkit-input-placeholder { text-align:right; }
    input:-moz-placeholder {  text-align:right; }
    ::-moz-placeholder { /* Firefox  */
        text-align:right;
    }
    :-ms-input-placeholder { /* IE 10+ */
        text-align:right;
    }
</style>
<main>
        <div class="wrapper-content-block">
            <div class="container">
                <!-- Breadcums -->
                <?php
                // File store under folder application/views/FRONTEND/breadcums.php
                echo $this->load->view('FRONTEND/breadcums');
                ?>
                <div class="global-form-request">
                    <form id="mail_form" action="" method="POST">
                        <section id="section_cnt">
                            <h2 class="txtForm">
                                <span class="icn02">
                                    希望条件を入力して送信して下さい。希望に合った物件をお探しし、日本人スタッフからご連絡致します。
                                </span>
                            </h2>
                            <table class="tblForm01">
                                <colgroup>
                                    <col class="w021per">
                                </colgroup>
                                <tbody>
                                <tr class="columnrequired01">
                                    <th class="tblCell01 vaT">物件種別 (<a class="error">*</a>)
                                    </th>
                                    <td colspan="3" class="">
                                        <ul class="formCheckboxList01 equalHeight proprtty_type">
                                            <?php if(isset($dataProperty_type)){?>
                                                <?php foreach ($dataProperty_type as $value){?>
                                                    <li>
                                                        <label class="formCheckbox01"><input class="required property_types required_new" type="checkbox" name="property_type[]" value="<?php echo $value->id?>" id="property_types">
                                                            <span><?php echo $value->name_jp?></span>
                                                        </label>
                                                    </li>
                                                <?php }?>
                                            <?php }?>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="columnrequired01">
                                    <th class="tblCell01 vaT">希望エリアとご希望 (<a class="error">*</a>)
                                    </th>
                                    <td colspan="3" class="">
                                        <textarea name="location" rows="3" class="formTextarea01 required required_new hope_area"></textarea>
                                    </td>
                                </tr>
                                <tr class="column">
                                    <th class="tblCell01 vaT">希望間取り
                                    </th>
                                    <td colspan="3">
                                        <ul class="formCheckboxList01 equalHeight">
                                            <?php if(isset($dataFloor_plans)){?>
                                                <?php foreach ($dataFloor_plans as $value){ ?>
                                                    <li>
                                                        <label class="formCheckbox01"><input class="" type="checkbox" name="floor_plans[]" value="<?php echo $value->id?>" id="floor_plans">
                                                            <span><?php echo $value->name_jp?></span>
                                                        </label>
                                                    </li>
                                                <?php }?>
                                            <?php }?>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="formText01 formSize120px boderremove">
                                    <th class="tblCell01 vaT">面積
                                    </th>
                                    <td colspan="3">
                                        <dl class="formTextList02">
                                            <dt>
                                                <span>
                                                    <input type="text" class="formText01 formSize120px request-number" name="space_size" value="" min='1' max='9999999999'>
                                                </span>
                                                <span>㎡以上
                                            </dt>
                                            <dd></dd>
                                        </dl>
                                    </td>
                                </tr>
                                <tr class="formText01 formSize120px united_budget boderremove">
                                    <th class="tblCell01 vaT">ご予算上限
                                    </th>
                                    <td colspan="3">
                                        <dl class="formTextList02">
                                            <dt>
                                                <span>
                                                    <input type="text" class="formText01 formSize120px request-number" name="united_budget" value="" disabled="" min='1' max='9999999999'>
                                                </span>
                                                <span>USD</span>
                                            </dt>
                                            <dd></dd>
                                        </dl>
                                    </td>
                                </tr>
                            
                                <tr class="formText01 formSize120px boderremove">
                                    <th class="tblCell01 vaT">希望時期
                                    </th>
                                    <td colspan="3">
                                        <!-- Month -->
                                        <div class='move_type'>
                                            <span>
                                                <input type="text" name="move_in_date_month" value="" pattern="\d*" inputmode="numeric" min='1' class='request-number formText01 formSize120px'>
                                            </span>
                                            <span>月頃</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="formText01 formSize120px boderremove">
                                    <th class="tblCell01 vaT">契約形態
                                    </th>
                                    <td colspan="3">
                                        <ul class="formCheckboxList01 equalHeight">
                                            <li>
                                                <label class='formCheckbox01'>
                                                    <input type="checkbox" name="contract_personal" id="contract_personal">
                                                    <span>個人での契約</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class='formCheckbox01'>
                                                    <input type="checkbox" name="contract_company" id="contract_company">
                                                    <span>法人での契約</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="column">
                                    <th class="tblCell01 vaT">会社名
                                    </th>
                                    <td colspan="3">
                                        <dl class="formTextList02">
                                            <dt>
                                                <span><input type="text" class="formText01  maxlength company_name " name="client_company_name" value=""></span>
                                            </dt>
                                        </dl>
                                    </td>
                                </tr>
                                <tr class="columnrequired01">
                                    <th class="tblCell01 vaT">お名前 (<a class="error">*</a>)
                                    </th>
                                    <td colspan="3" class="">
                                        <dl class="formTextList02">
                                            <dt>
                                                <span><input type="text" class="formText01 required maxlength client_name required_new" name="client_name" value=""></span>
                                            </dt>

                                        </dl>
                                    </td>
                                </tr>

                                <tr class="columnrequired01">
                                    <th class="tblCell01 vaT">メールアドレス欄 (<a class="error">*</a>)
                                    </th>
                                    <td colspan="3" class="">
                                        <dl class="formTextList02">
                                            <dt>
                                                <span><input type="email" class="formText01 required required-peir email maxlength mail" name="client_email" id="client_email" value=""></span>
                                            </dt>

                                        </dl>
                                    </td>
                                </tr>

                                <tr class="columnrequired01">
                                    <th class="tblCell01 vaT">電話番号欄 (<a class="error">*</a>)
                                    </th>
                                    <td colspan="3" class="">
                                        <dl class="formTextList02">
                                            <dt>
                                                <span><input type="phone" class="formText01  required-peir phone maxlength tel request-number" name="client_phone" value="" pattern="\d*" inputmode="numeric"  min='1'></span>
                                            </dt>

                                        </dl>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </section>
                        <section id="section_cnt">
                            <div class="boxForm02">
                                <ul class="linkBtn01 ">
                                    <li>
                                        <a id="btnSave" name="btnSave" class="btnSave">
                                            <div class="icn01">
                                                <span class="txt01">メールを送信する</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                        <div class="request-email"></div>
                    </form>
                </div>
            </div><!-- container -->
        </div><!-- hcm-office-block -->
</main>
<script type="text/javascript" src="<?php echo PATH_URL . 'static/js/';?>jquery-3.3.1.min.js"></script>
<script src="<?=PATH_URL?>html/js/form-contact.js"></script>
<script src="<?=PATH_URL?>html/lib/sweetalert/sweetalert.min.js"></script>
<script>
    $(function(){
        var aodai = new AODAI();
        $('.btnSave').on('click', function(){
            $('.btnSave').prop('disabled', false);
            $('.request-email').addClass('wrap-button-cover-request');
            var check = submit_check();
            if(check === true){
                $('.btnSave').prop('disabled', true);

                var form = $('#mail_form')[0];
                var formData = new FormData(form);
                $.ajax({
                    url: '<?php echo PATH_URL?>contact_request_email/ajax_contact_request',
                    type: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData
                })
                .done(function(response) {
                    if (response) {
                        swal({
                            icon: "success",
                            title: response
//                                buttons: true
                        })
                    }
                    $('.swal-button').on('click', function (){
                        window.location.href = '<?php echo PATH_URL?>contact_request_email';
                    });
                    $('.swal-overlay').on('click', function () {
                        window.location.href = '<?php echo PATH_URL?>contact_request_email';
                    })
                });
            } else {
                // Validate format email
                if ($('input[name="client_email"]').val() != '' && (email_check('client_email')) !== false) {
                    swal({
                        icon: "error",
                        title : "入力内容に誤りがあります",
                        text:   "メールアドレスは正しい形式で入力してください"
    //                     buttons: true
                    });
                }
                $('.request-email').removeClass('wrap-button-cover-request');
                swal({
                    icon: "error",
                    title : "入力内容に誤りがあります",
                    text:   "色つきの必須項目をすべて入力してください"
//                     buttons: true
                });
            }
        })
    });
</script>