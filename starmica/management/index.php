<?php
require_once("../design.php");

$HTMLTITLE ="マンション管理業務｜マンション管理";
$currentmenu = 310;


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
		<li class="arrow">マンション管理業務</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>マンション管理業務</span></div>
		                                <div class="top-10">
							<img src="../images/manage-img0.png" class="bottom-20" />
						</div>
						<div class="top-10">
							<div class="copy-blue01"><b>理事会・総会の運営サポート</b></div>
							<p class="top-5">
								<img src="../images/manage-img01.png" alt=""  class="img-right35" />
		                                                管理組合のベストパートナーとして、理事会・総会が円滑に行われるよう、資料作成や案内の発送、会場準備等の運営全般をサポートいたします。
							</p>
						</div>
						<div class="top-20">
							<div class="copy-blue01"><b>会計業務</b></div>
							<p class="top-5">
								<img src="../images/manage-img02.png" alt=""  class="img-right35" />
		                                                管理費等は、マンション管理適正化法に基づき、収納口座と保管口座を明確に分けて管理組合理事長様名義の預金口座を開設し、分別管理を行います。<br>
								管理費等の収納から費用の支払まで、管理組合様の財産を安全・確実に管理し、収支状況の報告を毎月行います。
							</p>
						</div>
						<div class="top-20">
							<div class="copy-blue01"><b>管理員業務</b></div>
							<p class="top-5">
								<img src="../images/manage-img03.png" alt=""  class="img-right35" />
		                                                管理員は、お住まいの皆様と接する機会が最も多く、マンション管理業務の重要な役割を担っています。<br>
								清掃業務や受付業務だけではなく、フロント担当者と連携し、問題解決にあたります。
							</p>
						</div>
						<div class="top-20">
							<div class="copy-blue01"><b>設備管理業務</b></div>
							<p class="top-5">
								<img src="../images/manage-img04.png" alt=""  class="img-right35" />
		                                                日常の修繕から、マンションの事情に合わせた長期修繕計画の作成、大規模修繕の実施まで、資産価値の維持・向上のためのご提案をいたします。
							</p>
						</div>
						<div class="top-20">
							<div class="copy-blue01"><b>緊急対応</b></div>
							<p class="top-5">
								<img src="../images/manage-img05.png" alt=""  class="img-right35" />
		                                                お住まいの方からの緊急連絡を<b>24時間365日</b>コールセンターで受信し、的確かつ迅速な対応を行います。
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

