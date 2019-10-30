<?php if($name != ''): ?>
<p>名前: <?=$name?></p>
<?php endif ?>
<?php if($name_hiragana != ''): ?>
<p>名前（ひらがな）：<?=$name_hiragana?></p>
<?php endif ?>
<?php if($name_alphabet != ''): ?>
<p>名前（アルファベット）：<?=$name_alphabet?></p>
<?php endif ?>
<p>住所：<?=$address?></p>
<p>電話番号：<?=$tel?></p>
<p>メールアドレス：<?=$email?></p>


<?php if($type != '' && $type != 'building'):;?>
    <?php if(isset($current_lang) && $current_lang == 'vn'):?>
        <p>物件：<a target="_blank" href="<?=PATH_URL . 'vn/'.$type . '/detail/' . $id_client;?>">click here</a></p>
    <?php else:?>
        <p>物件：<a target="_blank" href="<?=PATH_URL .$type . '/detail/' . $id_client;?>">click here</a></p>
    <?php endif;?>
<?php endif; ?>

<?php if($type == 'building'):;?>
    <?php if(isset($current_lang) && $current_lang == 'vn'):?>
        <p>物件：<a target="_blank" href="<?=PATH_URL . 'vn/'.$type .'/'. $building_type .'/'. $id_client.'/'.$building_name;?>">click here</a></p>
    <?php else:?>
        <p>物件：<a target="_blank" href="<?=PATH_URL .$type .'/'. $building_type .'/'. $id_client.'/'.$building_name;?>">click here</a></p>
    <?php endif;?>
<?php endif;?>


<p>お問合せ：</p>
-------------------------------------------------
<p><?=nl2br($content); ?></p>
-------------------------------------------------