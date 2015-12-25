<?php
require_once("../design.php");

$HTMLTITLE ="サービス紹介｜アフター保証";
$currentmenu = 440;


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
		<li class="arrow">各種提携住宅</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>各種提携住宅ローンについて</span></div>
						<p>
						スター・マイカ・レジデンスでは、都市銀行・地方銀行をはじめとした各種住宅ローンのお取次が可能です。<br>
						また、提携住宅ローンを別途ご用意してお客様のご要望にお応えします。
						<img src="../images/loan-img.png" alt="サービス紹介" />
						</p>
						<div class="top-20">
							<h5 class="subtitle">イオン銀行</h5>
							<div class="top-10">
								<div class="copy-red01"><b>特長</b></div>
							</div>
							<p class="bottom-5">
								■保証料が0円<br>
								■一部繰上返済手数料が0円<br>
								■「8疾病保障付住宅ローン」で特定の病気など万一の際、ローン残額が0円<br>
								さらに特典として、住宅ローンを契約するとイオンでの買い物が毎日5％オフになるイオンゴールドカードセレクト「イオンセレクトクラブ」が発行となります。
							</p>
						</div>
						<div class="top-20">
							<h5 class="subtitle">鳥取銀行</h5>
							<div class="top-10">
								<div class="copy-red01"><b>特長</b></div>
							</div>
							<div class="top-5">
								<div class="copy-blue01"><b>1. 住宅ローン</b></div>
							</div>
							<p class="bottom-10">
								■必要資金の100％＋諸費用お申込可能 <br>
								■保証料不要 <br>
								■ライフサポート団体信用生命保険、8大疾病保障付債務返済支援保険もご利用いただけます
							</p>
							<div class="top-5">
								<div class="copy-blue01"><b>2. とりぎん資産形成ローン</b></div>
							</div>
							<p class="bottom-10">
								■ワンルームマンション等収益物件の購入・修繕資金に<br>
								■最大5,000万円までお申込み可能 <br>
								■保険料不要（団体信用生命保険付）<br>
								■保証料不要
							</p>
						</div>
						<div class="top-20">
							<h5 class="subtitle">楽天銀行</h5>
							<div class="top-10">
								<div class="copy-red01"><b>特長</b></div>
							</div>
							<div class="top-5">
								<div class="copy-blue01"><b>ニーズに応じて選べる商品、金利タイプ</b></div>
							</div>
							<p class="bottom-10">
								3種類の金利タイプのローンから、お客さまに合った商品をお選びいただけます。<br>
								変動／固定2年／固定3年／固定5年／固定7年／固定10年
							</p>
							<div class="top-5">
								<div class="copy-blue01"><b>申込から契約まで来店不要</b></div>
							</div>
							<p class="bottom-10">
								手続きはすべてインターネットと郵送、電話で行えるため、全国どこからでもお申し込みいただけます。
							</p>
							<div class="top-5">
								<div class="copy-blue01"><b>楽天銀行口座をお持ちでなくてもＯＫ</b></div>
							</div>
							<p>
								返済口座は、ご自由にお選びいただけます。楽天銀行をご指定いただくと、金利や事務手数料のメリットを受けることができます。
							</p>
							<div class="chuui03">
								※審査の結果によっては、ローンのご希望に添えない場合がございますのでご了承下さい。<br>
								その他ご不明な点がございましたら、お気軽に詳細はスター・マイカ・レジデンス営業スタッフにお問い合わせください。
							</div>
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
