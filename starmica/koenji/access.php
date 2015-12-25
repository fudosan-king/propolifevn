<?php

require_once("design.php");

$HTMLTITLE ="アクセス｜ステラレジデンス高円寺｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
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
	      	<div class="subtitle"><img src="img/access_subtitle.gif" alt="都心を間近に、利便を手中に。" width="450" height="64" /></div>
      <div id="content900">
		<div class="sec1 bottom-30">
			<ul class="box-list">
			<li><img src="img/access_img1-1.gif" alt="新宿" width="220" height="360" /></li>
			<li><img src="img/access_img1-2.gif" alt="渋谷" width="220" height="360" /></li>
			<li><img src="img/access_img1-3.gif" alt="東京" width="220" height="360" /></li>
			<li><img src="img/access_img1-4.gif" alt="秋葉原" width="220" height="360" /></li>
			</ul>
		</div>
		<!--/sec1-->
	        <div class="sec2 bottom-30">
			<p class="top-30"><center><img src="img/access_img3.gif" alt="路線図" width="880" height="79"/></center></p>
			<p class="top-10"><center><img src="img/access_img2.gif" alt="路線図" width="890" height="450"></center></p>
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
