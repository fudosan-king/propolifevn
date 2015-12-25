<?php
require_once("../design.php");

$HTMLTITLE ="ビフォー物件特集｜ビフォー物件の魅力";
$currentmenu = 220;


user_header($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-menu2">
		<div class="row">
			<h2><img src="../images/menu2-title.png" alt="自分でリノベーション" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>”中古マンションを買って自分でリノベーションをしたい！”というお客様向けに厳選物件のご紹介しています。物件のご紹介から・資金計画・リノベーション・ご入居まで、皆様の最適・快適な暮らしを全力でサポート致します。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">自分でリノベーション</li>
		<li class="arrow">ビフォー物件の魅力</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>ビフォー物件の魅力</span></div>
						<p>
						理想の暮らしを賢く手にいれるなら、中古マンションを買って自分でリノベーション！
						</p>
						<div class="top-10">
							<h5 class="subtitle">ビフォー物件の魅力　３つのポイント</h5>
							<div class="top-10">
	                                       		 	<div class="copy-braun02">ライフスタイルに合わせて、自分流の住まいを実現</div>
								<p class="top-5">
								中古マンションの室内は自分の好みに合わせて変更することが可能です。
								ライフスタイルに合わせて間取りを決め、自分のこだわりの設備をつけたり、好みの素材を選ぶことでより満足度の高い住まいを手に入れることができます。
								</p>
							</div>
							<div class="top-10">
	                                       		 	<div class="copy-braun02">新築に比べて、選択肢が豊富</div>
								<p class="top-5">
								住みたいエリアを限定した場合、中古マンションはそのエリア内の新築マンションに比べると物件数は圧倒的に豊富ですので、条件に近い物件を見つけやすくなります。
								また、中古マンションは都心や駅近など立地の良いものが多いのでご希望に沿った物件が見つかりやすいです。
								</p>
							</div>
							<div class="top-10">
	                                       		 	<div class="copy-braun02">手頃な価格で理想の暮らし</div>
								<p class="top-5">
								新築に比べると中古マンションはお手頃な価格と言えます。
								物件価格を抑えて、ライフスタイルに合わせて立地を選び自分好みのリノベーションをすることで理想の暮らしを実現しましょう。
								</p>
							</div>
						</div>
						<div class="top-10">
							<h5 class="subtitle">ビフォー物件紹介</h5>
							<p class="top-10">
							当社グループは常に1000戸以上の中古マンションを保有しております。
							その中から、当社でリノベーションをする前の"素材"の状態にある中古物件をご紹介しております。是非一度ご覧ください。
							さらに当社では、これまで手掛けてきた数千戸という豊富な実績とノウハウをもとに、
							最適なリノベーションプランのご紹介やコンサルティングも行っております。
							</p>
						</div>
						<div class="top-10">
							<div class="col one-second">
								<section>
								<p class="img">
								<a href="index.php#a1"><img src="../images/beforeappeal_01_img-1.jpg" alt="中古物件をご紹介"/></a>
								</p>
								</section>
							</div>
							<div class="col one-second">
								<section>
								<p class="img">
								<a href="../reform/price.php"><img src="../images/beforeappeal_01_img-2.jpg" alt="リノベーション／コンサルティング"/></a>
								</p>
								</section>
							</div>
						</div>

					</section>

				</div>
				<!--/#content-->
				<div id="sidebar" class="col one-fourth left">
<?php
//サイドメニュー
user_sidearea200($currentmenu);
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

</html>
