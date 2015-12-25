<?php

require_once("design.php");

$HTMLTITLE ="間取り｜ステラレジデンス横浜｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
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
          <li class="arrow">間取り</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->
    <div id="container900">
	<div class="title"><img src="img/pagetitle2.png" alt="間取り" width="163" height="163" /></div>
	<div class="top-20">
		<img src="img/plan-img01.jpg" alt="お部屋イメージ" width="900" height="650" />
	</div>
	<div id="content900">
		<div class="sec3 top-30">
			<ul class="madori">
			<li><a href="madori-type1.php" onclick="window.open('madori-type1.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-1.png" alt="オープンキッチンプラン" width="290" height="470" /></a></li>
			<li><a href="madori-type2.php" onclick="window.open('madori-type2.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-2.png" alt="ベーシックプラン" width="290" height="470" /></a></li>
			<li><a href="madori-type3.php" onclick="window.open('madori-type3.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-3.png" alt="MUJI HOUSE" width="290" height="470" /></a></li>
			</ul>
	        </div>
		<div class="clear-box"></div>
        	<p id="page-top"><a href="#header"><img src="img/base_pagetop.gif" alt="このページの先頭へ" width="115" height="13" /></a></p>
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
