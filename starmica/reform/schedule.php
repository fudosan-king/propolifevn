<?php
require_once("../design.php");

$HTMLTITLE ="スケジュール｜自分でリノベーション";
$currentmenu = 240;


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
		<li class="arrow">スケジュール</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>スケジュール</span></div>
						<p>スター・マイカ・レジデンスでは物件購入からリフォーム施工、お引き渡しまでのワンストップサービスを実現します。</p>
						<div class="top-10">
							<div class="copy-blue03">『自分でリノベーション物件』購入までの流れ</div>
						</div>
						<div class="flow">
							<p><img src="../images/sche-img01.png" />
							物件ご見学(リフォーム前)</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img02.png" />
							リフォーム現地打合せ(㎡単価)概算費用算出</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img03.png" />
							物件購入申込み</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img04.png" />
							住宅ローン事前審査(リフォームローン含む)</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img03.png" />
							売買契約</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img03.png" />
							リフォーム内容確定・請負契約締結</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img03.png" />
							住宅ローン・リフォームローン本申込</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img03.png" />
							住宅ローン金銭消費貸借契約締結</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img08.png" />
							残金決済・物件引渡し（住宅ローン実行）</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img09.png" />
							リフォーム工事着工</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img10.png" />
							完了検査（買主様立会い）</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img13.png" />
							リフォーム費用お支払い（リフォームローン実行）</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img11.png" />
							お部屋の引渡し</p>
						</div>
						<p class="step-next"></p>

						<div class="flow">
							<p><img src="../images/sche-img12.png" />
							お引越し</p>
						</div>

						<div class="center">
							<div class="copy-red01">
							※自己資金の少ない方、既存お借入のある方もご安心ください。<br>
							住宅・リフォームローン、提携住宅ローンのご紹介をさせていただきます。
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


</body>
</html>
