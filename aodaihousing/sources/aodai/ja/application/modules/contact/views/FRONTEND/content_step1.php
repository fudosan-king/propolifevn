<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('WEBからの お問い合わせ') ?></h4>
    </div>
    <div class="modal-body">
        <form action="" method="post" name="contact">
            <p><?php echo lang('下記にお問合せ情報をご記入ください。'); ?></p>
            <?php if($error): ?>
            <p><strong><?php echo lang('下記のエラーメッセージをご確認の上、お手数ですが再度入力をお願いします。'); ?></strong></p>
                <ul class="ullist">
                <?php if($message_er): ?>
                    <?php foreach($message_er as $item): ?>
                    <li><a data-action="focus" href="#"><?=vcp_printf($item, current_lang_()); ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
                </ul>
            <?php endif; ?>
    <div class="input-wrap">
        <?php if($lang == 'jp'):?>

        <div class="row">
            <span class="label"><?php echo lang('お名前（漢字）'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="name" placeholder="<?php echo lang('山田　太郎'); ?>" value="<?=isset($name)?$name:'';?>" />
        </div>
        <div class="row">
            <span class="label"><?php echo lang('お名前（ひらがな）'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="name_hiragana" id="name_hiragana" placeholder="<?php echo lang('山田　太郎'); ?>" value="<?=isset($name_hiragana)?$name_hiragana:'';?>"/>
        </div>
        <?php else: ?>
        <div class="row">
            <span class="label"><?php echo lang('お名前（アルファベット）'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="name_alphabet" placeholder="<?php echo lang('やまだ　たろう'); ?>" value="<?=isset($name_alphabet)?$name_alphabet:'';?>" />
        </div>
        <?php endif; ?>
        <div class="row">
            <span class="label"><?php echo lang('ご住所'); ?></span>
            <input class="input-text" type="text" name="address" id="textfield5" placeholder="<?php echo lang('都道府県・市区町村・番地・ビルマンション・部屋番号'); ?>"  value="<?=isset($address)?$address:'';?>"/>
        </div>
        <div class="row">
            <span class="label"><?php echo lang('電話番号'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="phone" id="textfield2" placeholder="0312345678" value="<?=isset($phone)?$phone:'';?>"/>
        </div>
        <div class="row">
            <span class="label"><?php echo lang('メールアドレス'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="email" id="textfield" placeholder="info@propolifevietnam.com" value="<?=isset($email)?$email:'';?>"/>
        </div>
        <div class="row">
            <span class="label"><?php echo lang('お問い合わせ'); ?></span><span class="error">*</span>
            <textarea name="content" id="textarea" cols="60" rows="6" class="input-textarea"></textarea>
            <p><?php echo lang('お問合せ内容をご記入ください。');?></p>
        </div>
        
    </div>
    <div class="row">
            <input class="send-step-1" type="submit" name="send" value="<?php echo lang('記入内容確認へ'); ?>" />
        </div>
    </form>
</div>
</div>