<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileInformation = fopen("informations.txt", "w") or die("Unable to open file!");
    fwrite($fileInformation, $_POST['informations']);
    fclose($fileInformation);
  }else{
    $fileInformation = fopen("informations.txt", "r") or die("Unable to open file!");
    $informations = fread($fileInformation, filesize('informations.txt'));
    fclose($fileInformation);
  }
?>

<!doctype html>
<html>

<head>
    <meta property="og:title" content="駐在事務所設立＆スタートアップ支援┃ロータスサービス">
    <meta property="og:description" content="ベトナムホーチミン進出ならロータスサービスにお任せ下さい。設立だけでなく、開業までに準備すべきこともサポート。日本人担当者とベトナム人弁護士で安心をご提供しております。">
    <meta name="description" content="ベトナムホーチミン進出ならロータスサービスにお任せ下さい。設立だけでなく、開業までに準備すべきこともサポート。日本人担当者とベトナム人弁護士で安心をご提供しております。">
    <meta name="keywords" content="ベトナム,ホーチミン,駐在員事務所,進出">
    <?php require 'head.php'; ?>
</head>

<body>
    <div id="page" class="animsition">

      <?php require 'header.php';?>

      <main id="content">
        <section class="main_content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="/edit-infor.php" method="POST">
                <textarea rows="20" style="width: 100%;" id="informations" name="informations"><?php
                if ($_POST['informations']) {
                  echo $_POST['informations'];
                }else{
                  echo $informations;
                }
                ?></textarea>
                <div align="center">
                <button class="btn btn-success" type="Submit" value="Submit" style="color: #ffffff;">セーブ</button>
                </div>
                </form>
              </div>
            </div>
          <div>
        </section>
      </main>

      <?php require 'footer.php';?>
    </div>
    <?php require 'js_footer.php';?>
</body>

</html>