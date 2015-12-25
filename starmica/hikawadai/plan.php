<?php

require_once("design.php");

$HTMLTITLE ="間取り｜ステラレジデンス氷川台｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 3;


user_header($HTMLTITLE,$currentmenu);
user_globalnavi($currentmenu);
?>
  <div id="wrapper">
    <div id="title-area">
	<div class="title"><img src="img/pagetitle-02.png" alt="Plan 間取り" width="900" height="64" /></div>
	<div id="bread-crumb">
	        <ul>
	          <li><a href="index.php">ホーム</a></li>
	          <li class="arrow">間取り</li>
	        </ul>
	</div>
	<!--/bread-crumb-->
    </div>
    <!--/title-area-->

    <div id="container">
      <div id="content">
      		<div class="main-copy">
			<img src="img/subtitle-02.png" alt="暮らしやすさを追求したプランニング" width="485" height="28" />
			<p>
			一つひとつの暮らしのシーンが美しく使いやすくなるよう、細やかに配慮して住空間をプランニングしました。<br>
			デザイン性と機能性を兼ね備えた、こだわりの住まいづくりです。<br><br>
			</p>
		</div>
	        <div class="sec2 bottom-30">
			<ul class="list-yoko">
			<li><a href="madori-type301.php" onclick="window.open('madori-type301.php', '', 'width=790,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-301.png" alt="2LDK 301号室" width="278" height="465" /></a></li>
			<li><a href="madori-type505.php" onclick="window.open('madori-type505.php', '', 'width=790,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-503.png" alt="1SLDK 505号室" width="278" height="465" /></a></li>
			<li class="fin"><a href="madori-type107.php" onclick="window.open('madori-type107.php', '', 'width=790,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-107.png" alt="2SLDK 107号室" width="278" height="465" /></a></li>
			</ul>
	        </div>
	        <!--/sec2-->
        <p id="page-top"><a href="#header"><img src="img/base_pagetop.gif" alt="このページの先頭へ" width="115" height="13" /></a></p>
      </div>
      <!--/content-->

    </div>
    <!--/container-->
  </div>
  <!--/wrapper-->

<?php
user_footer();
?>
