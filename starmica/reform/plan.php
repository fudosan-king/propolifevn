<?php
require_once("../design.php");

$HTMLTITLE ="資金計画｜自分でリノベーション";
$currentmenu = 260;


user_header($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-menu2">
		<div class="row">
			<h2><img src="../images/menu2-title.png" alt="自分でリノベーション" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>”中古マンションを買って、自分でリノベーションをしたい！”方向けに厳選物件のご紹介しています。物件のご紹介から、資金計画、リノベーション、ご入居まで、皆様の最適・快適な暮らしを全力でサポート致します。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">自分でリノベーション</li>
		<li class="arrow">資金計画</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>資金計画　リフォームローンについて</span></div>
						<div class="copy-yellow02">
							スター・マイカ・レジデンス営業スタッフが最適なお借入提案と、<br>お忙しいお客さまに代わり金融機関への資金相談を事前に行います。
							<img src="../images/plan-img02.png" class="top-20" />
						</div>
						<p class="top-30">
							<img src="../images/plan-img01.png" alt=""  class="img-right40" />
							<span class="copy-braun01">自分でリノベーションをする際に、リフォーム資金も金融機関から借りたい・・・</span><br>
							その時には、物件の売買契約前にリフォームローンの仮審査をしておく必要があります。<br>
							その理由は、せっかく好みのビフォー物件を見つけて契約したのに、リフォームローンが組めず、資金不足で工事ができない・・という最悪の事態を防ぐためです。
						</p>
						<p class="top-20">
							リフォームローンを利用する際は、住宅ローンと同様に一定の審査をクリアしなければ融資が受けられません。<br>
							リフォームローンにも、住宅ローンと同じく変動・固定金利があり、金融機関によってさまざまです。<br>
							目先の金利だけでなく、将来的な金利変動や自分のライフプランを視野にいれ、慎重に返済計画を立てることが重要です。<br>
							また、借入時には金融機関によって事務手数料や保証料が別途かかる場合があります。これらもあらかじめ準備しておく必要があります。<br>
						</p>

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
