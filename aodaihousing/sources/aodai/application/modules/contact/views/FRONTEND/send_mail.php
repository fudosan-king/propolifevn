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


<?php if($type != ''): ?>
<p>物件：<a target="_blank" href="<?=PATH_URL .$type . '/detail/' . $id_client;?>">click here</a></p>
<?php endif; ?>


<p>お問合せ：</p>
-------------------------------------------------
<p><?=nl2br($content); ?></p>
-------------------------------------------------