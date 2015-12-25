<?php
require_once("../design.php");

$HTMLTITLE ="イベント情報｜サービス紹介";
$currentmenu = 480;


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
		<li class="arrow">イベント情報</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>

			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="search_name">
						<div class="midashi-s"><span>イベント情報 詳細</span></div>
						<div class="midashi-bukkenmei">
							『ステラレジデンス氷川台』現地販売会開催<span class="icon-new">&nbsp;&nbsp;NEW</span>
						</div>
						<div class="bukken-syosai">
							<p><span class="koumoku">日　　時</span><span class="kakaku">12/20（日）　11：00～12：00 </span><span class="icon-renbe">OPEN ROOM</span></p>
							<p>
							<span class="koumoku">内　　容</span>
							12/5（土）・6（日）11：00～17:00『ステラレジデンス氷川台』の現地内覧会を開催いたします。開催期間中はご予約不要です。
							</p>
						</div>

						<div class="photo-big">
							<img src="../photoimages/bukken_img_2.jpg" class="list-photowaku"/>
						</div>

						<div class="top-10">
							<div class="link_button01">
								<a href="../contactus.php">お問い合わせ・資料請求</a>
							</div>
						</div>


					</section>
				</div>
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
