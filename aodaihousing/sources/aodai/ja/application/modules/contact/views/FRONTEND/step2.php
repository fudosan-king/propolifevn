<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link defer rel="stylesheet" href="<?=PATH_URL;?>static/css/contact.css" />
    <?php if($type_popup != '1'){ ?>
        <!-- jquery-3.3.1.min.js -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/tidusvn05/aodai-cdn@1.7/js/jquery-3.3.1.min.js"></script>
    <?php }?>
    <script defer src="<?=PATH_URL;?>static/js/contact.js" type="text/javascript"></script>
    <link defer rel="stylesheet" href="<?=PATH_URL.'static/css/'?>reset.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link defer rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" type="text/css">
    <link defer rel="stylesheet" href="<?=PATH_URL.'static/css/'?>style.css" type="text/css">
    <link defer href="<?=PATH_URL?>static/images/favicon.png" type="image/x-icon" rel="icon" />
    <link defer href="<?=PATH_URL?>static/images/favicon.png" type="image/x-icon" rel="shortcut icon" />
    <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>main-responsive.css" type="text/css">
    <style type="text/css">
    /* html, body{
        min-width: 700px;
    } */
    .wrap-button-cover{
      width: 100%;
      height: 100%;
      z-index: 999;
      position: absolute;
      top: 0;
      left: 0;
    }
    </style>
    <script type="text/javascript" ></script>
</head>
<div id="contact" class="<?php if($type_popup == '1'){ echo 'contact_tow';}?>">
    <?php
    // File store under folder application/views/FRONTEND/breadcums.php
    if($type_popup == '1'){
        echo $this->load->view('FRONTEND/breadcums');
    }
    ?>
    <div class="modal-header modal-title-overlay">
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('WEBからの お問い合わせ') ?></h4>
    </div>
    <form id="formGoBack" action="<?=PATH_URL . current_lang_();?>/contact/contact_step1?type_popup=<?=$type_popup?>" method="post">
      <input type="hidden" value="<?=$name?>" name="name">
      <?php if($lang == 'jp'):?>
      <input type="hidden" value="<?=$name_hiragana?>" name="name_hiragana">
      <?php else:?>
      <input type="hidden" value="<?=$name_alphabet?>" name="name_alphabet">
      <?php endif; ?>
      <input type="hidden" value="<?=$address?>" name="address">
      <input type="hidden" value="<?=$phone?>" name="phone">
      <input type="hidden" value="<?=$email?>" name="email">
      <input type="hidden" value="<?=$content?>" name="content">
      <input type="hidden" value="<?=$building_type?>" name="building_type">
      <input type="hidden" value="<?=$type?>" name="type">
      <input type="hidden" value="<?=$id?>" name="id">
      <input type="hidden" value="<?=$current_lang?>" name="current_lang">
    </form>
    <div class="modal-body">
      <form action="<?=PATH_URL . current_lang_();?>/contact/contact_step3?type=<?=$type?>&id=<?=$id?>&building_type=<?=$building_type?>&current_lang=<?=$current_lang?>&type_popup=<?=$type_popup?>" method="post" name="contact">
      <div class="text-first"><?php echo vcp_printf('下記にお問合せ情報をご記入ください。', current_lang_()); ?></div>
      <div class="input-wrap">
        <?php if($lang == 'jp'):?>
          <div class="row">
            <span class="label"><?php echo vcp_printf('お名前（漢字）', current_lang_()) ?></span><span class="error"></span>
            <span class="prev-step2"><?=$name?></span>
            <input type="hidden" name="name" value="<?=$name?>" />
          </div>
          <div class="row">
            <span class="label"><?php echo vcp_printf('お名前（ひらがな）', current_lang_()); ?></span><span class="error"></span>
            <span class="prev-step2"><?=$name_hiragana?></span></td>
            <input type="hidden" name="name_hiragana" value="<?=$name_hiragana?>" />
          </div>

          <?php else:?>
          <div class="row">
            <span class="label"><?php echo vcp_printf('お名前（アルファベット）', current_lang_()); ?></span><span class="error">(*)</span>
            <span class="prev-step2"><?=$name_alphabet?></span></td>
            <input type="hidden" name="name_alphabet" value="<?=$name_alphabet?>" />
          </div>

          <?php endif; ?>
          <div class="row">
            <span class="label"><?php echo vcp_printf('ご住所', current_lang_()); ?></span>
            <span class="prev-step2"><?=$address?></span><br />
            <input type="hidden" name="address" value="<?=$address?>" />
          </div>
          <div class="row">
            <span class="label"><?php echo vcp_printf('電話番号', current_lang_()); ?></span>
            <span class="prev-step2"><?=$phone?></span>
            <input type="hidden" name="phone" value="<?=$phone?>" />
          </div>
          <div class="row">
            <span class="label"><?php echo vcp_printf('メールアドレス', current_lang_()); ?></span>
            <span class="prev-step2"><?=$email?></span>
            <input type="hidden" name="email" value="<?=$email?>" />
          </div>
          <div class="row">
            <span class="label"><?php echo vcp_printf('お問い合わせ', current_lang_()); ?></span>
          <span class="prev-step2"><?=$content?></span>
          <input type="hidden" name="content" value="<?=$content?>" />
          <input type="hidden" name="step" value="step3" />
          </div>
        </div>
              <p class="next-step">
                  <span class="wrap-button">
                      <span id="btnGoBack" class="prev" style="width: 115px;"><input type="button" name="back" value="<?php echo vcp_printf('前へ戻る', current_lang_()); ?>" /></span>
                      <span class="next" style="width: 115px;"><input type="submit" class="sendContactUs" name="send" value="<?php echo vcp_printf('送信する', current_lang_()); ?>" /></span>
                  </span>
              </p>
      </form>
  </div>
  </div>
<script type="text/javascript">
  $('.next').click(function() {
    $('.sendContactUs').attr('disable', true);
    $('#contact').append("<div class='wrap-button-cover'></div>");
  });

  $('#btnGoBack').click(function(){
      var formGoBack = $('#formGoBack');
      formGoBack.submit();
    });
</script>