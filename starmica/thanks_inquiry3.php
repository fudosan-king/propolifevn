<?php
require_once("design.php");

$HTMLTITLE ="アンケート";
$currentmenu = 33;


user_header_other($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-other">
		<div class="row">
			<h2><img src="images/title-inquiry.png" alt="アンケート" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>より良い商品・サービスをお客様へご提供していくためにアンケートへのご協力をお願いします。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="index.php">ホーム</a></li>
		<li class="arrow">アンケート</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s">
							<span>アンケートにご協力いただきましてありがとうございました</span>
						</div>
						<p class="img"><img src="images/member-step03_on.png" class="top-10"/></p>
						<div class="top-30">
							アンケートにご協力いただきましてありがとうございました。<br>
							お客さまからの貴重なご意見として今後の参考とさせていただきます。<br><br>
						　	※アンケートご回答後、プレゼントは順次発送させていただきますがお時間を要する場合がございますので何卒ご了承ください。<br>

						</div>
						<p class="center"><img src="images/contctimg1.jpg" alt="" class="bottom-30"/></p>
						<div class="chuui06">
							スター・マイカグループ
						</div>
					</section>

				</div>
				<!--/#content-->
				<div id="sidebar" class="col one-fourth left">
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

