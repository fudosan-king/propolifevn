<?php

require_once("design.php");

$HTMLTITLE ="アクセス｜ステラレジデンス中目黒｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 4;


user_header($HTMLTITLE,$currentmenu);
user_globalnavi($currentmenu);
?>
<hr />
<div id="bukken" class="page1">
  <div id="wrapper">
    <div id="title-area900">
      <div id="bread-crumb">
        <ul>
          <li><a href="index.php">ホーム</a></li>
          <li class="arrow">アクセス</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->

    <div id="container900">
	      	<div class="title"><img src="img/access_title.gif" alt="アクセス" width="266" height="66" /></div>
	      	<div class="subtitle"><img src="img/access_subtitle.gif" alt="" width="450" height="64" /></div>
      <div id="content900">
		<div class="sec1 bottom-30">
			<ul class="box-list">
				<li><img src="img/access_img1-1.gif" alt="渋谷" width="220" height="340" /></li>
				<li><img src="img/access_img1-2.gif" alt="新宿" width="220" height="340" /></li>
				<li><img src="img/access_img1-3.gif" alt="銀座" width="220" height="340" /></li>
				<li><img src="img/access_img1-4.gif" alt="東京" width="220" height="340" /></li>
			</ul>
		</div>
		<!--/sec1-->
	        <div class="sec2 bottom-40">
			<p class="style2">
				「中目黒」駅からは、東京メトロ日比谷線と東急東横線の利用が可能。<br>
				東京メトロ日比谷線は、六本木や銀座をダイレクトに結び、都心の主要スポットへスムーズにアクセスできます。<br>
				また、東急東横線は東京メトロ副都心線も乗り入れるため、横浜方面、新宿・池袋方面へのアクセスも便利です。<br>
			</p>
			<p class="top-20"><img src="img/access_rosen.gif" alt="路線図" width="880" height="385"></p>
			<p class="top-40"><img src="img/access_img2.gif" alt="「中目黒」駅からの所要分数" width="880" height="155"></p>
			<p class="style10">※表示分数は日中平常時の標準所要時間で、乗換え・待ち時間は含まれておりません。また、時間帯により所要時間は多少異なります。</p>
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
<hr />
<?php
user_footer();
?>
