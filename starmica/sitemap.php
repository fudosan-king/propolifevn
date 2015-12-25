<?php
require_once("design.php");

$HTMLTITLE ="サイトマップ";
$currentmenu = 14;


user_header_other($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-other">
		<div class="row">
			<h2><img src="images/title-sitemap.png" alt="サイトマップ" /></h2>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="index.php">ホーム</a></li>
		<li class="arrow">サイトマップ</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>サイトマップ</span></div>

					<div id="befor_list">
						<div class="col search_list_box firstlist_box">
							<section>
							<div class="sitemp-base top-10">
								<p>リノベーション物件特集</p>
								<ul>
								<li><a href="renovation/index.php">リノベーション済物件の魅力</a></li>
								<li><a href="renovation/renopica.php">スター・マイカのリノピカマンション</a></li>
								<li><a href="renovation/itou.php">一棟リノベーションへの取り組み</a></li>
								<li><a href="renovation/property.php">お薦め物件一覧</a></li>
								<li><a href="member.php">今後の販売予定を知りたい</a></li>
								</ul>
							</div>
							</section>
						</div>
						<div class="col search_list_box">
							<section>
							<div class="sitemp-base top-10">
								<p>自分でリノベーション</p>
								<ul>
								<li><a href="reform/index.php">ビフォー物件特集</a></li>
								<li><a href="reform/beforeappeal.php">ビフォー物件の魅力</a></li>
								<li><a href="reform/learn.php">リノベーション基礎知識</a></li>
								<li><a href="reform/schedule.php">スケジュール</a></li>
								<li><a href="reform/price.php">価格（定額制価格表）</a></li>
								<li><a href="reform/plan.php">資金計画</a></li>
								</ul>
							<div>
							</section>
						</div>
						<div class="col search_list_box firstlist_box">
							<section>
							<div class="sitemp-base">
								<p>マンション管理</p>
								<ul>
								<li><a href="management/index.php">マンション管理業務</a></li>
								<li><a href="management/faq.php">管理組合 よくあるご質問</a></li>
								<li><a href="management/nyukyosya.php">入居者の皆様へ</a></li>
								<li><a href="management/tyukai.php">仲介会社の皆様へ</a></li>
								<li><a href="management/kanrikaisyahenkou.php">管理会社変更を検討の皆様へ</a></li>								</ul>
							</div>
							</section>
						</div>
						<div class="col search_list_box">
							<section>
							<div class="sitemp-base">
								<p>サービス紹介</p>
								<ul>
								<li><a href="service/index.php">リノベーション物件紹介</a></li>
								<li><a href="service/option.php">オプション/アクセサリー</a></li>
								<li><a href="service/loan.php">各種提携住宅ローン</a></li>
								<li><a href="service/afterservice.php">アフター保証</a></li>
								<li><a href="management/index.php">マンション管理</a></li>
								<li><a href="service/event.php">イベント情報</a></li>
								</ul>
							<div>
							</section>
						</div>
						<div class="col search_list_box firstlist_box">
							<section>
							<div class="sitemp-base">
								<p>会社案内</p>
								<ul>
								<li><a href="company/index.php">会社概要</a></li>
								<li><a href="company/aboutus.php">グループ概要</a></li>
								</ul>
							</div>
							</section>
						</div>
						<div class="col search_list_box">
							<section>
							<div class="sitemp-base">
								<p>便利コンテンツ</p>
								<ul>
								<li><a href="guide.php">購入の手引き</a></li>
								<li><a href="inquiry.php">お客様アンケート</a></li>
								<li><a href="member.php">会員登録</a></li>
								</ul>
							<div>
							</section>
						</div>





					</div>







					</section>
				</div>

				<div id="sidebar" class="col one-fourth left">
<?php
//サイドバナー下層ページ共通
user_sidebanner_other($currentmenu);
?>
				</div>


			</div>
		</article>
<?php
user_footer_other($currentmenu);
?>
