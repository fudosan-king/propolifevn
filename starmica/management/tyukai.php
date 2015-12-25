<?php
require_once("../design.php");

$HTMLTITLE ="仲介会社の皆様へ｜マンション管理";
$currentmenu = 340;


user_header($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-menu3">
		<div class="row">
			<h2><img src="../images/menu3-title.png" alt="マンション管理" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>当社では、お客様のよりよい生活をお手伝いさせて頂くためマンション管理を行っております。暮らしやすさ、使いやすさを追及し、マンションの資産価値の維持・向上を考え、最適なサポートをご提供いたします。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">マンション管理</li>
		<li class="arrow">仲介会社の皆様へ</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>仲介会社の皆様へ</span></div>
						<h5 class="subtitle">重要事項に係る調査依頼書の受付について</h5>
							<p class="top-5">
							当社は、重要事項の調査依頼につきまして、下記の対応をさせていただきますのでご了承賜りますようお願い申しあげます。<br><br>
							</p>
						<div class="bottom-20">
							<div class="copy-blue01"><b>ご依頼方法</b></div>
							<p class="top-5">
								依頼書にご記入の上、手数料の振込票とともにＦＡＸにてご依頼ください。<br>
								原則、受付日の翌営業日に発行いたします。<br><br>
							</p>
						</div>
						<div class="bottom-20">
							<div class="copy-blue01"><b>受付窓口について</b></div>
							<div class="green-box2">
								<div class="copy-green02"><b>受付時間　月曜日～金曜日（祝日を除く） 9：30AM～18：00PM</b></div>
								<p class="top-5">
										依頼書にご記入の上、手数料の振込票とともにＦＡＸにてご依頼ください。<br>
										原則、受付日の翌営業日に発行いたします。
								</p>
								<div class="fax">
									FAX番号 <span class="icon-fax"></span>03-5776-2558<br>
									お 電 話　<span class="icon-tel"></span>03-5776-2710
								</div>
							</div>
						</div>
						<div class="bottom-20">
							<div class="copy-blue01"><b>発行手数料（消費税込）</b></div>
							<p class="top-5">
								<ul class="learn00">
								<li>■重要事項調査報告書…4,320円</li>
								<li>■管理規約写し…2,160円</li>
								<li>■長期修繕計画書…1,080円</li>
								<li>■総会議案書、議事録（1期分）…1,080円</li>
								</ul>
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

