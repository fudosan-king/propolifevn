<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link defer rel="stylesheet" type ="text/css" href="<?php echo PATH_URL . 'static/css/';?>compress_css.css" async> -->
    <?php
        $homeurl = '/index.php';
        function isMobileDevice() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }?>

    <!-- compress_css -->
    <?php if ($homeurl && isMobileDevice()):?>
        <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>compress_css_custom_index.css" media="none" onload="if(media!='all')media='all'">
        <noscript><link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>compress_css_custom_index.css"></noscript>

    <?php else:?>
        <link defer rel="stylesheet" type ="text/css" href="<?php echo PATH_URL . 'static/css/'?>compress_css.css">
    <?php endif;?>
    <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>style_custom_index.css" type="text/css">
    <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/';?>main-responsive.css">
    <noscript><link rel="stylesheet" href="<?php echo PATH_URL . 'static/css/';?>main-responsive.css"></noscript>
</head>
<div id="contact" class="<?php if($type_popup == '1'){ echo 'contact_tow';}?>">
    <?php
    // File store under folder application/views/FRONTEND/breadcums.php
    if($type_popup == '1'){
        echo $this->load->view('FRONTEND/breadcums');
    }
    ?>
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('WEBからの お問い合わせ') ?></h4>
    </div>
    <div class="modal-body">
        <form action="" method="post" name="contact">
            <input type="hidden" value="<?=isset($type)?$type:'';?>" name="type">
            <input type="hidden" value="<?=isset($building_type)?$building_type:'';?>" name="building_type">
            <input type="hidden" value="<?=isset($current_lang)?$current_lang:'';?>" name="current_lang">
            <input type="hidden" value="<?=isset($id)?$id:'';?>" name="id">
            <p><?php echo lang('下記にお問合せ情報をご記入ください。'); ?></p>
            <div class="wrapper-error">
                <?php if($error): ?>
                <div class="reserve_error">
                    <p><strong><?php echo lang('下記のエラーメッセージをご確認の上、お手数ですが再度入力をお願いします。'); ?></strong></p>
                    <ul class="ullist">
                    <?php if($message_er): ?>
                        <?php foreach($message_er as $item): ?>
                        <li><a data-action="focus" href="#"><?=vcp_printf($item, current_lang_()); ?></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
            </div>        
        <div class="input-wrap">
        <?php if($lang == 'jp'):?>
        <div class="row">
            <span class="label"><?php echo lang('お名前（漢字）'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="name" placeholder="<?php echo lang('山田　太郎'); ?>" value="<?=isset($name)?$name:'';?>" />
        </div>
        <div class="row">
            <span class="label"><?php echo lang('お名前（ひらがな）'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="name_hiragana" id="name_hiragana" placeholder="<?php echo lang('やまだ　たろう'); ?>" value="<?=isset($name_hiragana)?$name_hiragana:'';?>"/>
        </div>
        <?php else: ?>
        <div class="row">
            <span class="label"><?php echo lang('お名前（アルファベット）'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="name_alphabet" placeholder="<?php echo lang('やまだ　たろう'); ?>" value="<?php echo htmlspecialchars(isset($name_alphabet)?$name_alphabet:'');?>" />
        </div>
        <?php endif; ?>
        <div class="row">
            <span class="label"><?php echo lang('ご住所'); ?></span>
            <input class="input-text" type="text" name="address" id="textfield5" placeholder="<?php echo lang('都道府県・市区町村・番地・ビルマンション・部屋番号'); ?>"  value="<?php echo htmlspecialchars(isset($address)?$address:'');?>"/>
        </div>
        <div class="row">
            <span class="label"><?php echo lang('電話番号'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="phone" id="textfield2" placeholder="0312345678" value="<?php echo htmlspecialchars(isset($phone)?$phone:'');?>"/>
        </div>
        <div class="row">
            <span class="label"><?php echo lang('メールアドレス'); ?></span><span class="error">*</span>
            <input class="input-text" type="text" name="email" id="textfield" placeholder="info@aodaihousing.com" value="<?php echo htmlspecialchars(isset($email)?$email:'');?>"/>
        </div>
        <div class="row">
            <span class="label"><?php echo lang('お問い合わせ'); ?></span><span class="error">*</span>
            <textarea name="content" id="textarea" cols="60" rows="6" class="input-textarea"><?=isset($content)?$content:'';?></textarea>
            <p><?php echo lang('お問合せ内容をご記入ください。'); ?></p>
        </div>
        
    </div>
    <ul class="row confirm-contact">
        <li>
            <input class="send-step-1" type="submit" name="send" value="<?php echo lang('記入内容確認へ'); ?>" />
        <li>
    </ul> 

    </form>
    </div>
</div>
