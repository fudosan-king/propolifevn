<?php

require_once("design.php");

$HTMLTITLE ="ステラスイート大井｜中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 1;


user_header_top($HTMLTITLE,$currentmenu);
?>

<hr />
<div id="top">
  <div id="wrapper">

<div id="globalnavi">
  <ul>
    <li><a href="index.php"><img src="img/globalnavi_1_on.gif" alt="ホーム" width="182" height="40" /></a></li>
    <li><a href="madori.php"><img src="img/globalnavi_2.gif" alt="間取りプラン" width="179" height="40" /></a></li>
    <li><a href="syuhen.php"><img src="img/globalnavi_3.gif" alt="周辺環境" width="179" height="40" /></a></li>
    <li><a href="access.php"><img src="img/globalnavi_4.gif" alt="アクセス" width="179" height="40" /></a></li>
    <li><a href="shisetu.php"><img src="img/globalnavi_5.gif" alt="共用施設" width="181" height="40" /></a></li>
  </ul>
</div>
<!--/globalnavi-->
    <div id="container">
      <div id="content">
        <div class="sec2 bottom-15">

<!--/ 販売中バナーいったん非表示
	<p class="bottom-15">
<a href="madori.php#a1"><img src="img/info-b4.jpg" alt="販売中物件のご案内" width="650" height="94" /></a>
	</p>
-->
	<div class="bottom-15">
          <h4><img src="img/info-t.gif" alt="インフォメーション" width="650" height="35" /></h4>
	</div>
              <dl>
                <dt><span>2014.12.01</span></dt>
                <dd>
<p class="bottom-10">
3LDK（101.29㎡、108.5㎡）完売しました。
</p>
                </dd>
                <dt><span>2012.8.17</span></dt>
                <dd>
<p class="bottom-10">
ホームページがオープンしました。
</p>
                </dd>

              </dl>

        </div>
        <!--/sec2-->


      </div>
      <!--/content-->
      <hr />
      <div id="side-area">
        <div id="banner-area">
          <ul>
		<li><a href="https://www.starmica-r.co.jp/ooi/contactus.php"><img src="img/shiryouseikyu_b.gif" alt="資料請求" width="220" height="65" /></a></li>
		<li><a href="https://www.starmica-r.co.jp/ooi/contactus.php"><img src="img/raijyouyoyaku_b.gif" alt="来場予約" width="220" height="65" /></a></li>
           </ul>
       </div>
        <!--/banner-area-->


      </div>
      <!--/side-area-->
    </div>
    <!--/container-->
  </div>
  <!--/wrapper-->
</div>
<!--/top-->
<hr />
<?php
user_footer();
?>
