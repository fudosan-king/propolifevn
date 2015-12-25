<?php

require_once("design.php");

$HTMLTITLE ="お部屋プラン｜クリオレミントンヴィレッジ国立イーストコート｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 2;


user_header($HTMLTITLE,$currentmenu);
user_globalnavi($currentmenu);
?>
<div id="bukken" class="page1">
  <div id="wrapper">
    <div id="title-area900">
      <div id="bread-crumb">
        <ul>
          <li><a href="index.php">ホーム</a></li>
          <li class="arrow">お部屋プラン</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->
    <div id="container900">
      	<div class="title"><img src="img/plan_title.gif" alt="お部屋プラン" width="900" height="32" /></div>
      	<div class="subtitle"><img src="img/plan_subtitle.gif" alt="" width="310" height="45" /></div>

      <div id="content900">
        <div class="sec2 top-20">
			<ul class="madori">
			<li><a href="madori-type4.php" onclick="window.open('madori-type4.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-4.gif" alt="間取り618号室" width="280" height="464" /></a></li>
			<li></li>
			</ul>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
