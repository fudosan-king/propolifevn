<?php
require_once("design.php");

$HTMLTITLE ="会員登録";
$currentmenu = 30;


user_header_other($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-other">
		<div class="row">
			<h2><img src="images/title-member.png" alt="会員登録" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>最新のリフォーム前未公開物件情報やリノベーション物件、セミナー情報、<br>オープンルーム情報などを優先的にお届けします！！</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="index.php">ホーム</a></li>
		<li class="arrow">会員登録</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s">
							<span>会員登録していただきありがとうございました</span>
						</div>
						<p class="img"><img src="images/member-step03_on.png" class="top-10"/></p>
						<p class="top-20">
							この度は「スター・マイカ・レジデンス」会員登録していただきましてまことにありがとうございました。<br>
							登録のメールアドレスへご確認のメールをお送りしました。（自動配信）<br>
							お客様情報に基づき、物件精査のうえ担当者より順次ご連絡させていただきます。<br>
							<br>
						</p>
						<p class="center"><img src="images/contctimg1.jpg" alt="" class="bottom-30"/></p>
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

