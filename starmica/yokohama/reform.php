<?php

require_once("design.php");

$HTMLTITLE ="ステラレジデンス横浜を自分でリノベしてみませんか？｜ステラレジデンス横浜｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 0;


user_header($HTMLTITLE,$currentmenu);
user_globalnavi($currentmenu);
?>
<div id="bukken" class="page1">
  <div id="wrapper">
    <div id="title-area900">
      <div id="bread-crumb">
        <ul>
          <li><a href="index.php">ホーム</a></li>
          <li class="arrow">自分でリノベ</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->
    <div id="container900">
		<div class="title"><img src="img/pagetitle-reform.png" alt="ステラレジデンス横浜を自分でリノベしてみませんか？" width="900" height="130" class="top-30" /></div>
	<div id="content900">
		<div class="bottom-10">
			<div class="bottom-20"><img src="img/reform-img.png" alt="" width="900" height="180" class="" /></div>
			<div class="text-center">
				物件のご購入から、リフォーム完成後のお引渡しまで、スター・マイカ・レジデンス営業スタッフと提携リフォーム業者担当者が<br>
				お客様の住まいのコンシェルジュとして専任でサポートさせていただきます。
			</div>

		</div>
		<div class="reform-flow">
			<p class="midashi">ご購入～お引渡しまでの流れ</p>
			<ul>
			<li class="box">
				<div class="number">1</div>
				
				<div><img src="img/flow-img1.png" width="37" height="23" class="bottom-5" /><br>ステラレジデンス横浜の<br>ビフォー物件を購入</div>
				<p>定額制セレクト型リノベーションシステムは壁芯面積でリフォーム予算を算出できる、安心の定額システムです。</p>
			</li>
			<li class="box">
				<div class="number">2</div>
				<div><img src="img/flow-img2.png" width="42" height="25" class="bottom-5" /><br>オプションプランを選択</div>
				<p>間取りや、カラー、お好みで増やせるオプションプランなど、お客様のライフスタイルとご希望に合わせて、提携リフォーム業者担当者がプラニングをフルサポートいたします。</p>
			</li>
			<li class="box">
				<div class="number">3</div>
				<div><img src="img/flow-img3.png" width="50" height="25" class="bottom-5" /><br>工事着工</div>
				<p>決定したプランを基に、リフォーム工事着工</p>
			</li>
			<li class="box-fin">
				<div class="number">4</div>
				<div><img src="img/flow-img4.png" width="50" height="25" class="bottom-5" /><br>完成後お引渡し</div>
				<p>お引き渡し後は3カ月後と１年後の定期点検を実施しますので、住み始めてからの不安も解消できます。<br>
				※リノベーション請負・保証・点検は提携リフォーム会社が行います。</p>
			</li>
			</ul>
		</div>
		<div class="top-30">
                        <div class="text-center">
				<a href="http://www.starmica-r.co.jp/" target="_blank">
				<img src="img/ink-green.png" alt="定額制セレクト型リノベーションシステムの特徴はこちら" width="630" height="35" class="bottom-10"/>
				</a>
			</div>
		</div>
		<div class="sec2 top-40">
			<div class="before-bukken">ステラレジデンス横浜のビフォー物件</div>
			<ul class="madori-2box">
			<li><a href="madori-type4.php" onclick="window.open('madori-type4.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-4.png" alt="701号室(リフォーム前物件)" width="290" height="470" /></a></li>
			<li><a href="madori-type5.php" onclick="window.open('madori-type5.php', '', 'width=850,height=830,scrollbars=yes,resizable=yes'); return false;"><img src="img/madori-5.png" alt="308号室(リフォーム前物件)" width="290" height="470" /></a></li>
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
