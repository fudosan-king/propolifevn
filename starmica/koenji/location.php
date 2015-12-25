<?php

require_once("design.php");

$HTMLTITLE ="周辺環境｜ステラレジデンス高円寺｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 5;


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
          <li class="arrow">周辺環境</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->

    <div id="container900">
      	<div class="title"><img src="img/location_title.gif" alt="周辺環境" width="266" height="66" /></div>
      	<div class="subtitle"><img src="img/location_subtitle.gif" alt="緑や利便施設が周辺に充実する住宅地エリア・・・" width="450" height="83" /></div>

      <div id="content900">
        <div class="sec1 top-10">
                <p class="bottom-40">
			<img src="img/location_map.gif" alt="" width="880" height="450" class="マップ"/>
		</p>
                <p class="bottom-20">
			<img src="img/location_img1.gif" alt="周辺施設" width="880" height="360" /></li>
		</p>
	</div>
        <div id="map"></div>
        <div class="sec2 bottom-30">
		<h4 class="sub-title3"><span>現地案内図</span></h4>
				<div class="map2">
			 		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6479.484248274821!2d139.653287!3d35.707963!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f286c1c53b19%3A0xf40bd33b44d1d9e8!2z5p2x5Lqs6YO95p2J5Lim5Yy66auY5YaG5a-65YyX77yS5LiB55uu77yT77yQ4oiS77yR77yS!5e0!3m2!1sja!2sjp!4v1402629642108" width="800" height="450" frameborder="0" style="border:0"></iframe><br />
				</div>
				<table class="access">
					<tr>
					<th>所在地</th>
					<td>東京都杉並区高円寺北2丁目30番12号</td>
					</tr>
					<tr>
					<th valign="top">交　通</th>
					<td>ＪＲ中央線・総武線・東京メトロ東西線「高円寺」駅徒歩7分 ／ 西武新宿線「野方」駅徒歩17分<br>東京メトロ丸ノ内線「東高円寺」駅徒歩18分</td>
					</tr>
				</table>
 	</div>


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
