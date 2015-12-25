<?php
require_once("design.php");

$HTMLTITLE ="お問い合わせ";
$currentmenu = 20;


user_header_other($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-menu5">
		<div class="row">
			<h2><img src="images/title-contactus.png" alt="お問い合わせ" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>これまでの豊富な実績と経験をもとに、皆様に最適・快適な暮らしをお届けするために、当社グループが、特に力を入れているマンションをご案内しております。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">お問い合わせ</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>お問い合わせありがとうございました</span></div>
						<img src="images/contactus-step03_on.png" class="top-10"/>
						<p class="top-20">
							この度は、「スター・マイカ・レジデンス」へお問い合せいただきまことにありがとうございます。<br>
							お客さまのお問い合せ情報の送信完了いたしました。<br>
							担当者より順次ご連絡をさせていただきますので今しばらくお待ちください。<br><br>
						</p>
						<p class="center"><img src="images/contctimg1.jpg" alt="" class="bottom-30" /></p>
						<div class="chuui03">
							定休日（毎週火・水曜日及び祝日）受付の場合には翌営業日以降の対応となりますのでご了承ください。<br>
							※マンション管理部門については毎週土・日曜日及び祝日が定休日となっております。
						</div>
					</section>
				</div>
				<!--/#content-->
				<div id="sidebar" class="col one-fourth left">
<?php
//サイドメニュー
user_sidearea500($currentmenu);
?>

<?php
//サイドバナー下層ページ共通
user_sidebanner_other($currentmenu);
?>


				</div>
				<!--/#sidebar-->


			</div>
			<!--/row-->
		</article>


<?php
user_footer_other($currentmenu);
?>

