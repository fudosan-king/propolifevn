<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="<?=PATH_URL;?>static/css/contact.css" />
  <script src="<?=PATH_URL;?>static/js/jquery.js" type="text/javascript"></script>
  <script src="<?=PATH_URL;?>static/js/contact.js" type="text/javascript"></script>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KRT7X7"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KRT7X7');
    dataLayer.push({'event': 'inquiry-confirm'});</script>
    <!-- End Google Tag Manager -->


</head>

<body>


  <div class="popup-main">
      <form action="<?=PATH_URL . current_lang_();?>/contact/contact_step3?type=<?=$type?>&id=<?=$id;?>" method="post" name="contact">
          <div class="popup">
              
              <div class="title-popup"><span><?php echo vcp_printf('WEBからの お問い合わせ', current_lang_());  ?></span></div>
              <p><?php echo vcp_printf('下記にお問合せ情報をご記入ください。', current_lang_()); ?></p>
              <div class="input-wrap">
                  <table width="742" border="0">
                    
                    <?php if($lang == 'ja'):?>
                    <tr>
                      <th><span class="label"><?php echo vcp_printf('お名前（漢字）', current_lang_()) ?></span><span class="error"></span></th>
                      <td><span class="prev-step2"><?=$name?></span></td>
                      <input type="hidden" name="name" value="<?=$name?>" />
                    </tr>
                    <tr>
                      <th><span class="label"><?php echo vcp_printf('お名前（漢字）', current_lang_()); ?></span><span class="error">(*)</span></th>
                      <td><span class="prev-step2"><?=$name_hiragana?></span></td>
                      <input type="hidden" name="name_hiragana" value="<?=$name_hiragana?>" />
                    </tr>
                    <?php else:?>
                    <tr>
                      <th><span class="label"><?php echo vcp_printf('お名前（アルファベット）', current_lang_()); ?></span><span class="error">(*)</span></th>
                      <td><span class="prev-step2"><?=$name_alphabet?></span></td>
                      <input type="hidden" name="name_alphabet" value="<?=$name_alphabet?>" />
                    </tr>
                    <?php endif; ?>
                    <tr>
                      <th><span class="label"><?php echo vcp_printf('ご住所', current_lang_()); ?></span><br /></th>
                      <td>
                          <span class="prev-step2"><?=$address?></span><br />
                          <input type="hidden" name="address" value="<?=$address?>" />
                      </td>
                    </tr>
                    <tr>
                      <th><span class="label"><?php echo vcp_printf('電話番号', current_lang_()); ?></span></th>
                      <td>
                          <span class="prev-step2"><?=$phone?></span>
                          <input type="hidden" name="phone" value="<?=$phone?>" />
                      </td>
                    </tr>
                    <tr>
                      <th><span class="label"><?php echo vcp_printf('メールアドレス', current_lang_()); ?></span></th>
                      <td><span class="prev-step2"><?=$email?></span></td>
                      <input type="hidden" name="email" value="<?=$email?>" />
                    </tr>
                    <tr>
                      <th><span class="label"><?php echo vcp_printf('お問い合わせ', current_lang_()); ?></span><br />      <br /></th>
                      <td>
                          <span class="prev-step2"><?=$content?></span>
                          <input type="hidden" name="content" value="<?=$content?>" />
                          <input type="hidden" name="step" value="step3" />
                    </tr>
                  </table>
              </div>
              <p class="next-step">
                  <span class="wrap-button">
                      <span class="prev" style="width: 115px;"><input onclick="goBack();" type="button" name="back" value="<?php echo vcp_printf('前へ戻る', current_lang_()); ?>" /></span>
                      <span class="next" style="width: 115px;"><input type="submit" name="send" value="<?php echo vcp_printf('送信する', current_lang_()); ?>" /></span>
                  </span>
              </p>
          </div>
      </form>
  </div>

  <style type="text/css">
  <?php if(current_lang_() == 'vn'): ?>
      .next{
          width: 66px !important;
      }
  <?php endif ?>
  </style>
</body>