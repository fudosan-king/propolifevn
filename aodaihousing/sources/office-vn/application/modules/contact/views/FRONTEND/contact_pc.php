<div class="feture-1">
    <div class="header-box">
        <div class="box-icon icon_contact">
            <h1>アオザイハウジングへのベトナムホーチミン市のオフィスお問い合わせフォーム</h1>
        </div>
    </div>
    <div class="box-item page">
        <div class="content-news">
            <form name="contact" id="configform" method="post" action="">
                <div class="popup">
                    <?php if (!empty($errors)): ?>
                        <div class="reserve_error">
                            <p>
                                <strong>
                                    <?php echo lang('下記のエラーメッセージをご確認の上、お手数ですが再度入力をお願いします。'); ?>
                                </strong>
                            </p>

                            <ul class="ullist">
                                <?php if (!empty($errors)): ?>
                                    <?php foreach ($errors as $item): ?>
                                        <li><?php echo vcp_printf($item, current_lang_()); ?></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($isSendEmail)): ?>
                        <?php 
                            // Reset data when send email successfully.
                            $name = '';
                            $name_hiragana = '';
                            $name_alphabet = '';
                            $phone = '';
                            $email = '';
                            $content = '';
                            $address = '';
                            $errors = array();
                        ?>
                        <div class="success-send-mail">
                            <p><?php echo lang("contact_result_1") ?></p>
                            <p><?php echo lang('contact_result_2'); ?></p>
                            <p><?php echo lang('contact_result_3'); ?></p>
                            <p><?php echo lang('contact_result_4'); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="input-wrap">
                        <table width="742" border="0">
                            <?php if ($lang == 'ja'): ?>
                                <tr>
                                    <th><span class="label"><?php echo lang('お名前（漢字）'); ?></span><span class="error">(*)</span></th>
                                    <td><span class="input-text"><input type="text" name="name" placeholder="<?php echo lang('山田　太郎'); ?>" value="<?php echo $name;?>" /></span></td>
                                </tr>

                                <tr>
                                    <th><span class="label"><?php echo lang('お名前（ひらがな）'); ?></span><span class="error">(*)</span></th>
                                    <td><span class="input-text"><input type="text" name="name_hiragana" id="name_hiragana" placeholder="<?php echo lang('やまだ　たろう'); ?>" value="<?php echo $name_hiragana; ?>"/></span></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <th><span class="label"><?php echo lang('お名前（アルファベット）'); ?></span><span class="error">(*)</span></th>
                                    <td><span class="input-text"><input type="text" name="name_alphabet" placeholder="<?php echo lang('やまだ　たろう'); ?>" value="<?php echo $name_alphabet; ?>" /></span></td>
                                </tr>
                            <?php endif; ?>

                            <tr>
                                <th><span class="label"><?php echo lang('ご住所'); ?></span><br></th>
                                <td>
                                    <span class="input-text"><input type="text" placeholder="<?php echo lang('都道府県・市区町村・番地・ビルマンション・部屋番号'); ?>" value="<?php echo $address; ?>" id="textfield5" name="address"></span><br>

                                </td>
                            </tr>

                            <tr>
                                <th><span class="label"><?php echo lang('電話番号'); ?></span><span class="error">(*)</span></th>
                                <td>
                                    <span class="input-text"><input type="text" placeholder="0312345678" id="textfield2" name="phone" value="<?php echo $phone; ?>"></span>
                                </td>
                            </tr>

                            <tr>
                                <th><span class="label"><?php echo lang('メールアドレス'); ?></span><span class="error">(*)</span></th>
                                <td><span class="input-text"><input type="text" placeholder="info@aodaihousing.com" id="textfield" value="<?php echo $email; ?>" name="email"></span></td>
                            </tr>

                            <tr>
                                <th><span class="label"><?php echo lang('お問い合わせ'); ?></span><span class="error">(*)</span><br>      <br></th>
                                <td>
                                    <p class="content-note"><?php echo lang('お問合せ内容をご記入ください。'); ?></p>
                                    <textarea class="input-textarea" rows="6" cols="64" id="textarea" name="content"><?php echo $content; ?></textarea></td>
                            </tr>

                            <tr>
                                <th><span class="label">&nbsp;</span></th>
                                <td style="padding-top: 0;">
                                    <p class="next-step">
                                        <input type="submit" value="お問い合わせ送信" name="send" class="send-step-1">
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>