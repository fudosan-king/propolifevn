<?php

require_once("design.php");

$HTMLTITLE ="間取り｜ステラレジデンス高円寺｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
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
      	<div class="title"><img src="img/plan_title.gif" alt="間取り" width="266" height="66" /></div>

      <div id="content900">
        <div class="sec2 top-30">
			<center>
			<a href="madori-type2.php" onclick="window.open('madori-type2.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-305.png" alt="間取り305号室" width="270" height="464" /></a>
			</center>
        <!--/fukusuu
			<ul class="madori">
			<li><a href="madori-type1.php" onclick="window.open('madori-type1.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-302.png" alt="間取り302号室" width="270" height="464" /></a></li>
			<li></li>
			</ul>

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	-->
        </div>
        <!--/sec2-->
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
