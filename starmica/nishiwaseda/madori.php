<?php

require_once("design.php");

$HTMLTITLE ="間取りプラン｜ニューライフ西早稲田｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 4;


user_header($HTMLTITLE,$currentmenu);
user_globalnavi($currentmenu);
?>
<div id="bukken" class="page1">
  <div id="wrapper">
    <div id="title-area900">
      <div id="bread-crumb">
        <ul>
          <li><a href="index.php">ホーム</a></li>
          <li class="arrow">間取り</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->
    <div id="container900">
      <h2><img src="img/madori_title.gif" alt="間取り" width="900" height="70" /></h2>

      <div id="content900">
        <div class="sec2 bottom-20">
          <h4><img src="img/madori_midashi.gif" alt="豊富な間取りラインナップ（60㎡・70㎡台中心）" width="850" height="45" /></h4><br>
		<div class="top-20">
			<center>
			<a href="madori-type6.php" onclick="window.open('madori-type6.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/n-madoriinfo-type7.gif" alt="" width="280" height="460" /></a>
			</center>
		</div>
<br><br>
		<div class="bottom-20">
<center><img src="img/setubi.jpg" alt="" width="857" height="404" /></center>
		</div>

        </div>
        <!--/sec2-->
        <p id="page-top"><a href="#header"><img src="img/base_pagetop.gif" alt="このページの先頭へ" width="119" height="12" /></a></p>


      </div>
      <!--/content-->

    </div>
    <!--/container-->
  </div>
  <!--/wrapper-->
</div>
<!--/top-->
<?php
user_footer();
?>
