<?php
require_once("../design.php");

$HTMLTITLE ="管理会社変更を検討の皆様へ｜マンション管理";
$currentmenu = 350;


user_header($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-menu3">
		<div class="row">
			<h2><img src="../images/menu3-title.png" alt="マンション管理" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>
			当社では、お客様のよりよい生活をお手伝いさせて頂くためマンション管理を行っております。暮らしやすさ、使いやすさを追及し、マンションの資産価値の維持・向上を考え、最適なサポートをご提供いたします
			</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">マンション管理</li>
		<li class="arrow">管理会社変更を検討の皆様へ</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>管理会社変更を検討の皆様へ</span></div>
						<p class="top-5">
							<img src="../images/kanrikaisya-img4.png" class="img-right35" />
							マンション管理の見直しは、資産価値の向上や費用負担の削減に繋がります。<br>
							管理業務のお見積りのご依頼、管理に関するご相談はお気軽にお問合せください。<br><br>
						</p>
						<div class="top-20">
							<h5 class="subtitle">当社の特徴</h5>
								<p class="top-5">当社のサービスの特徴は下記の通りです。
							<div class="top-20">
								<div class="copy-blue01"><b>分別管理の徹底</b></div>
								<p class="top-10">
									<img src="../images/kanrikaisya-img1.png" class="img-right35" />
									マンション管理適正化法及び関連法令に基づき、収納口座と保管口座を明確に分け、第８７条第２項第１号イの方法により、会計業務の透明化と分別管理を行っています。<br>また、管理費・修繕積立金のお支払いは口座振替を利用しており、所有者様のお手を煩わせることがありません。
								</p>
							</div>
						</div>
						<div class="top-10">
							<div class="copy-blue01"><b>コスト管理のノウハウ</b></div>
							<p class="top-10">
								<img src="../images/kanrikaisya-img2.png" class="img-right35" />
								親会社スター・マイカが手がける「1棟リノベーション」を通じ、建物全体についての大規模改修工事やバリューアップ工事で蓄積されたノウハウを活用し、徹底したコスト管理を行っています。
								
							</p>
						</div>

						<div class="top-10">
							<div class="copy-blue01"><b>資産価値向上に資する提案</b></div>
							<p class="top-10">
								<img src="../images/kanrikaisya-img3.png" class="img-right35" />
								日々の点検により、マンションの劣化状況や問題点を把握し、お客様のマンションに最適な補修や長期修繕計画をご提案いたします。また、暮らしやすさ、使いやすさを追及し、
								マンションの資産価値の維持・向上を考え、最適なご提案をいたします。

							</p>
						</div>

					</section>

				</div>
				<!--/#content-->
				<div id="sidebar" class="col one-fourth left">
<?php
//サイドメニュー
user_sidearea300($currentmenu);
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
