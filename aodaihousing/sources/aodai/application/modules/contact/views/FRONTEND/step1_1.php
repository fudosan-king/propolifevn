<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=PATH_URL;?>static/css/contact.css" />
    <script src="<?=PATH_URL;?>static/js/jquery.js" type="text/javascript"></script>
    <!-- Add jQuery library -->
    <script type="text/javascript" src="<?=PATH_URL?>static/plugin/fancybox/lib/jquery-latest.min.js"></script>
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="<?=PATH_URL?>static/plugin/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
    <script type="text/javascript" src="<?=PATH_URL?>static/plugin/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
    <script src="<?=PATH_URL;?>static/js/contact.js" type="text/javascript"></script>
</head>

<body>

<div class="popup-main">
    <form action="" method="post" name="contact">
        <div class="popup">
            
            <div class="title-popup"><span><?php echo lang('WEBからの お問い合わせ') ?></span></div>
            <p><?php echo lang('下記にお問合せ情報をご記入ください。'); ?></p>
            <?php if($error): ?>
            <div class="reserve_error">
                <p><strong><?php echo lang('下記のエラーメッセージをご確認の上、お手数ですが再度入力をお願いします。'); ?></strong></p>
                <ul class="ullist">
                <?php if(!empty($message_er)): ?>
                    <?php foreach($message_er as $item): ?>
                    <li><a data-action="focus" href="#"><?=vcp_printf($item, current_lang_()); ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
         
            <div class="input-wrap">
                <table width="742" border="0">
                  
                  <?php if($lang == 'ja'):?>
                  <tr>
                    <th><span class="label"><?php echo lang('お名前（漢字）'); ?></span><span class="error">(*)</span></th>
                    <td><span class="input-text"><input type="text" name="name" placeholder="<?php echo lang('山田　太郎'); ?>" value="<?=isset($name)?$name:'';?>" /></span></td>
                  </tr>
                  <tr>
                    <th><span class="label"><?php echo lang('お名前（ひらがな）'); ?></span><span class="error">(*)</span></th>
                    <td><span class="input-text"><input type="text" name="name_hiragana" id="name_hiragana" placeholder="<?php echo lang('山田　太郎'); ?>" value="<?=isset($name_hiragana)?$name_hiragana:'';?>"/></span></td>
                  </tr>
                  
                  <?php else: ?>
                  <tr>
                    <th><span class="label"><?php echo lang('お名前（アルファベット）'); ?></span><span class="error">(*)</span></th>
                    <td><span class="input-text"><input type="text" name="name_alphabet" placeholder="<?php echo lang('やまだ　たろう'); ?>" value="<?=isset($name_alphabet)?$name_alphabet:'';?>" /></span></td>
                  </tr>
                  <?php endif; ?>
                  <tr>
                    <th><span class="label"><?php echo lang('ご住所'); ?></span><br /></th>
                    <td>
                        <span class="input-text"><input type="text" name="address" id="textfield5" placeholder="<?php echo lang('都道府県・市区町村・番地・ビルマンション・部屋番号'); ?>"  value="<?=isset($address)?$address:'';?>"/></span><br />
                        
                    </td>
                  </tr>
                  <tr>
                    <th><span class="label"><?php echo lang('電話番号'); ?></span><span class="error">(*)</span></th>
                    <td>
                        <span class="input-text"><input type="text" name="phone" id="textfield2" placeholder="0312345678" value="<?=isset($phone)?$phone:'';?>"/></span>
                     </td>
                  </tr>
                  <tr>
                    <th><span class="label"><?php echo lang('メールアドレス'); ?></span><span class="error">(*)</span></th>
                    <td><span class="input-text"><input type="text" name="email" id="textfield" placeholder="info@aodaihousing.com" value="<?=isset($email)?$email:'';?>"/></span></td>
                  </tr>
                  <tr>
                    <th><span class="label"><?php echo lang('お問い合わせ'); ?></span><span class="error">(*)</span><br />      <br /></th>
                    <td>
                        <p><?php echo lang('お問合せ内容をご記入ください。'); ?></p>
                        <textarea name="content" id="textarea" cols="60" rows="6" class="input-textarea"><?=isset($content)?$content:'';?></textarea></td>
                  </tr>
                </table>
            </div>
            <p class="next-step">
                <span class="wrap-button" style="width: 185px;">
                    <span class="next" style="width: 155px;"><input class="send-step-1" type="submit" name="send" value="<?php echo lang('記入内容確認へ'); ?>" /></span>
                </span>
            </p>
        </div>
    </form>
    
</div>
<style type="text/css">
<?php if(current_lang_() == 'vn'): ?>
    .wrap-button{
        width: 222px !important;
    }
    .next{
        width: 204px !important;
    }
<?php endif ?>
</style>

</body>
</html>