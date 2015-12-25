<?php

require_once("design.php");

$HTMLTITLE ="アクセス｜ステラガーデン武蔵小金井｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
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
	      	<div class="title"><img src="img/pagetitle4.png" alt="アクセス" width="340" height="79" /></div>
      <div id="content900">
		<div class="sec1 top-20">

		</div>
		<!--/sec1-->


	        <div id="map"></div>
	        <div class="sec3 bottom-30">
			<h4 class="sub-title3"><span>現地案内図</span></h4>
					<div class="map2">
				 		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.1841407250818!2d139.51609161525926!3d35.69708598019066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018e582b128dddb%3A0x109886730bb7c336!2z44CSMTg0LTAwMTIg5p2x5Lqs6YO95bCP6YeR5LqV5biC5Lit55S677yS5LiB55uu77yR77yX4oiS77yR77yQIOatpuiUteWwj-mHkeS6leOCrOODvOODh-ODs-ODu-OCs-ODvOODiO-8oeajnw!5e0!3m2!1sja!2sjp!4v1450922396367" width="800" height="450" frameborder="0" style="border:0"></iframe><br />
					</div>
					<table class="access">
						<tr>
						<th>所在地</th>
						<td>東京都小金井市中町2-17-10（旧名称）武蔵小金井ガーデンコート</td>
						</tr>
						<tr>
						<th valign="top">交　通</th>
						<td>
						■JR中央線<b>「東小金井」駅徒歩　14分</b><br>
						■JR中央線<b>「武蔵小金井」駅徒歩　17分</b><br>
						■西武多摩川線<b>「新小金井」駅徒歩　13分</b>
						</td>
						</tr>
					</table>
	 	</div>

        <p id="page-top"><a href="#header"><img src="img/pagetop.jpg" alt="このページの先頭へ" width="40" height="40" /></a></p>


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
