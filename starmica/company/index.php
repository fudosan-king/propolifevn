<?php
require_once("../design.php");

$HTMLTITLE ="会社概要｜会社案内";
$currentmenu = 510;


user_header($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-menu5">
		<div class="row">
			<h2><img src="../images/menu5-title.png" alt="会社案内" /></h2>
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
		<li class="arrow">会社案内</li>
		<li class="arrow">会社概要</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>会社概要</span></div>
						<h5 class="subtitle">スター・マイカ・レジデンスの会社概要</h5>
						<div class="top-10">
							<table class="formTable">
								<tr>
								<th>所在地／本社</th>
								<td>〒105-6028　東京都港区虎ノ門4-3-1　城山トラストタワー28階</td>
								</tr>
								<tr>
								<th>会社設立</th>
								<td>2012年（平成24年）9月</td>
								</tr>
								<tr>
								<th>TEL／FAX</th>
								<td>03-5776-2688　／　03-5776-2558</td>
								</tr>
								<tr>
								<th>資本金</th>
								<td>3,000万円</td>
								</tr>
								<tr>
								<th>株主構成</th>
								<td><a href="http://www.starmica.co.jp/" target="_blank">スター・マイカ株式会社</a>（東京証券取引所第二部 上場）の100％子会社</td>
								</tr>
								<tr>
								<th>主要事業内容</th>
								<td>中古マンションの売買仲介<br>
								リノベーション／コンサルティング</td>
								</tr>
							</table>
						</div>
					</section>
					<section id="sec01">
						<div id="a1"></div>
						<h5 class="subtitle">交通アクセス</h5>
						<div class="area">
							<div class="top-10">
								<p>◆東京メトロ日比谷線　神谷町駅　ＭＴビル出口から徒歩3分<br>
								◆東京メトロ南北線　六本木一丁目駅　泉ガーデン出口から徒歩6分 </p>
							</div>
						</div>
						<!--/area-->

						<div id="a2" class="top-20"></div>
						<h5 class="subtitle">地図</h5>
						<div class="area">
            					<p class="company-map">
							<img src="../images/map-residence.jpg" alt="地図"/>

						</div>
						<!--/area-->


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
