<?php
require_once("../design.php");

$HTMLTITLE ="サービス紹介｜オプション／アクセサリー";
$currentmenu = 430;


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
		<li class="arrow">オプション／アクセサリー</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s">
							<span>オプション／アクセサリー</span>
						</div>
						<p class="bottom-10">
							当社グループがご紹介するリノベーション物件なら、お引渡しまでにオプションで様々なサービスをご利用頂けます。
						</p>
						<h5 class="subtitle">充実のラインナップ！</h5>
						<div class="top-10">
		                                       	<div class="copy-braun02">造付け付け収納</div>
							<p>
							ライフスタイルやお好みに合わせて空いているスペースを有効活用しませんか？<br>
							見た目にもスッキリとした空間に生まれ変わります。
							</p>
						</div>

						<div class="top-10">
	                                        	<div class="copy-braun02">ウッドデッキ</div>
							<p>気軽にアウトドアリビングが楽しめます。耐候性に優れ、害虫や菌類にも強い材料なので安心です。</p>
							<div class="top-5">
								<ul class="listyoko3">
								<li><img src="../images/option1_img-1.jpg" alt="テレビボード" class="photowaku" /></li>
								<li><img src="../images/option1_img-2.jpg" alt="食器棚" class="photowaku" /></li>
								<li><img src="../images/option1_img-3.jpg" alt="洗濯機廻り収納" class="photowaku" /></li>
								</ul>
							</div>
							<ul class="listyoko3">
							<li>For リビング</li>
							<li>For キッチン</li>
							<li>For 洗面室</li>
							</ul>
						</div>
						<div class="top-15">
	                                       		<div class="copy-braun02">エコカラット</div>
							<p>「調湿力」「におい吸着力」「ＶＯC（揮発性有機化合物）吸着力」の働きを持つ健康壁材です。</p>
							<div class="top-5">
								<ul class="listyoko3">
								<li><img src="../images/option3_img-1.jpg" alt="エコカラット" class="photowaku" /><li>
								<li><img src="../images/option3_img-2.jpg" alt="エコカラット" class="photowaku" /><li>
								<li><img src="../images/option3_img-3.jpg" alt="エコカラット" class="photowaku" /><li>
								</ul>
							</div>
						</div>
						<div class="top-15">
	                                   		<div class="copy-braun02">ペット用床コーティング</div>
							<p>汚れ、キズを防ぐのはもちろん、ペットが滑らないので転倒やケガの防止にもなります。</p>
							<div class="top-5">
								<ul class="listyoko3">
								<li><img src="../images/option4_img-1.jpg" alt="ペット用床コーティング" class="photowaku"/></li>
								<li><img src="../images/option4_img-2.jpg" alt="ペット用床コーティング" class="photowaku"/></li>
								</ul>
							</div>
							<div class="chuui03">
								<div class="bottom-30">※その他エアコンやガラスフィルムもなど豊富なラインナップをご用意しております。</div>
							</div>
						</div>

						<div class="top-30">
							<h5 class="subtitle">ご入居までに工事が完了！</h5>
							<p class="top-10">
								契約日からお引き渡し日までの空白期間に工事を行うため、ご入居までには工事が完了。<br>
								煩わしい工事の立ち会いなども必要がありません。
							</p>
							<div class="chuui03">
								※融資ご利用の場合は、融資承認後の工事開始となります。
							</div>
							<div class="center">
								<img src="../images/option_img-03.jpg" />
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
