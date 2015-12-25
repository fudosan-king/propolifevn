<?php

require_once("design.php");

$HTMLTITLE ="ステラレジデンス中目黒｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 1;


user_header_top($HTMLTITLE,$currentmenu);
?>

<hr />

<div id="top-main-area">
		<div id="mainImg">
<img src="img/top-main-1.jpg" alt="" width="1300" height="486" />
<img src="img/top-main-4.jpg" alt="" width="1300" height="486" />
<img src="img/top-main-2.jpg" alt="" width="1300" height="486" />
<img src="img/top-main-3.jpg" alt="" width="1300" height="486" />
		</div>
</div>
<!--/main-area-->
<?php
user_globalnavi($currentmenu);
?>
<div id="top">
  <div id="wrapper">
    <div id="container">
	<div class="content-info">
		<ul>
		<li><a href="plan.php"><img src="img/tokucho_1.gif" alt="" width="900" height="108" /></a></li>
		</ul>
	</div>
      <div id="content">
        <div class="sec1 bottom-20">
		<div class="news">
			<div>
		          <h4><img src="img/top-midashi.gif" alt="インフォメーション" width="146" height="21" /></h4>
			</div>
	              <dl>
	                <dt><span>2015.10.08</span></dt>
	                <dd>
				<p class="bottom-10">
					<a href="plan.php">2015.10.8 第5期販売は終了しました。
				</p>
	                </dd>

	                <dt><span>2015.08.27</span></dt>
	                <dd>
				<p class="bottom-10">
					<a href="plan.php">販売住戸の価格お知らせ<br>販売開始10月1日予定　内覧予約受付中</a>
				</p>
	                </dd>

	                <dt><span>2015.07.04</span></dt>
	                <dd>
				<p class="bottom-10">
					<a href="plan.php">第4期販売は終了しました</a>
				</p>
	                </dd>
	                <dt><span>2015.06.20</span></dt>
	                <dd>
				<p class="bottom-10">
					<a href="plan.php">第4期販売住戸の販売開始および内覧予約受付中</a>
				</p>
	                </dd>

	              </dl>
	        </div>
	        <!--/news-->
        </div>
        <!--/sec1-->

      </div>
      <!--/content-->
      <hr />
      <div id="side-area">
        <div id="banner-area">
	        <div class="nairanbox">
			<ul>
			<li><a href="https://www.starmica-r.co.jp/nakameguro/contactus.php"><img src="img/top-side3.gif" alt="内覧希望の方はこちら" width="230" height="57" /></a></li>
			</ul>
		</div>
       </div>
      </div>
      <!--/side-area-->

	<div class="content-banner">
		<ul>
		<li><a href="itou.php"><img src="img/banner-itou.gif" alt="" width="250" height="74" /></a></li>
		<li><a href="http://www.shiawase.starmica-r.co.jp/" target="_blank"><img src="img/banner-shiawase.gif" alt="" width="215" height="74" /></a></li>
		<li><a href="http://www.starmica.co.jp/renopica/" target="_blank"><img src="img/banner-renopica.gif" alt="" width="215" height="74" /></a></li>
		<li class="tail"><a href="http://ameblo.jp/renopica-starmica/" target="_blank"><img src="img/banner-bloge.gif" alt="" width="196" height="73" /></a></li>
		</ul>
	</div>

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
