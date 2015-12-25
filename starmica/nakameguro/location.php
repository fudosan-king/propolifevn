<?php

require_once("design.php");

$HTMLTITLE ="周辺環境｜ステラレジデンス中目黒｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 2;


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
      	<div class="subtitle"><img src="img/location_subtitle.gif" alt="" width="530" height="64" /></div>
      <div id="content900">
        <div class="sec1 bottom-10">
                <p class="top-30">
			<center><img src="img/location_map.gif" alt="マップ" width="820" height="400" class=""/></center>
		</p>
                <p class="top-40">
			<img src="img/location_img1.gif" alt="周辺写真" width="900" height="380" class=""/>
			<table>
				<td width="325px"><font class="style16">目黒川</font></td>
				<td width="195px"><font class="style16">目黒川：桜</font></td>
				<td width="195px"><font class="style16">上：中目黒駅周辺　 下：502号室眺望</font></td>
				<td width="185px"><font class="style16">上：東急ストア　 下：ドン・キホーテ</font></td>
			</table>
		</p>
	</div>
	<!--/sec1-->
        <div class="sec2 bottom-20">
			<h4 class="sub-title3"><span>LIFE INFORMATION</span></h4>
			<img src="img/location_life.gif" alt="LIFE　INFORMATION" width="890" height="210"/>
	</div>
	<!--/sec2-->

        <div id="map"></div>
        <div class="sec3 bottom-30">
		<h4 class="sub-title3"><span>現地案内図</span></h4>
				<div class="map2">
			 		<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m10!1m3!1d3242.1607470638933!2d139.69407925!3d35.648410999999996!2m1!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b527b402ceb%3A0xe311bd6c83432c60!2z5pel5pysLCDjgJIxNTMtMDA0MiDmnbHkuqzpg73nm67pu5LljLrpnZLokYnlj7DvvJLkuIHnm67vvJLvvJDiiJLvvJUg44Kw44Oq44O844Oz44Oq44O844OW44K56Z2S6JGJ5Y-w!5e0!3m2!1sja!2sjp!4v1409883801277" width="800" height="450" frameborder="0" style="border:0"></iframe><br />
				</div>
				<table class="access">
					<tr>
					<th>所在地</th>
					<td>東京都目黒区青葉台２－２０－５（旧名称：グリーンリーブス青葉台）</td>
					</tr>
					<tr>
					<th valign="top">交　通</th>
					<td>東京メトロ日比谷線「中目黒」駅　徒歩9分<br>東急田園都市線「池尻大橋」駅　徒歩13分 </td>
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
