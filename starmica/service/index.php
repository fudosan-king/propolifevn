<?php
require_once("../design.php");

$HTMLTITLE ="サービス紹介｜リノベーション物件特集";
$currentmenu = 410;


user_header($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-menu4">
		<div class="row">
			<h2><img src="../images/menu4-title.png" alt="サービス紹介" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>プロフェッショナルだから出来る 豊富なサービスをご用意しております。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">サービス紹介</li>
		<li class="arrow">リノベーション物件紹介</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>リノベーション物件紹介</span></div>
 						<div class="center bottom-20">
							<img src="../images/service-img01.png" alt="Smart Life" />
						</div>
						<p class="copy-red02">
						リーズナブルな価格で自分らしい暮らしを実現する、これからのマンション選びの賢い選択をご提案いたします。
						</p>



                                               <div class="top-20">
                                               <div class="copy-braun01">スター・マイカが提供するリノベーションマンションとは？</div>
						<p class="top-5">
						<img src="../images/itou-img05.png" alt="" class="img-left-line15"/><br>
						立地や建物の質にこだわって仕入れた中古マンションの室内をそのエリアの暮らしに適した形で、品質にこだわったリノベーション
						工事を施しています。<br><br>
						中古マンションの持つメリットをそのままに、時代遅れの使いづらくなった間取りや、経年劣化した内装、設備などのデメリットを払拭し、
						一人ひとりのライフスタイルに合わせて生まれ変わらせることができる、とってもお得な手法なのです。
						</p>
						</div>

                                                <div class="top-20">
						<p class="img center"><a href="http://www.starmica.co.jp/renopica/" target="_blank"><img src="../images/service-img03.jpg" alt="施工事例はこちら"/></a></p>
						</div>
					</section>

				</div>
				<!--/#content-->
				<div id="sidebar" class="col one-fourth left">
<?php
//サイドメニュー
user_sidearea400($currentmenu);
?>

<?php
//サイドバナー下層ページ共通
user_sidebanner($currentmenu);
?>


				</div>
				<!--/#sidebar-->


			</div>
			<!--/row-->
		</article>


<?php
user_footer($currentmenu);
?>


</body>
</html>
