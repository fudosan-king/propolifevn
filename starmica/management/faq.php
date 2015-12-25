<?php
require_once("../design.php");

$HTMLTITLE ="管理組合 よくあるご質問｜マンション管理";
$currentmenu = 320;


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
		<li class="arrow">管理組合 よくあるご質問</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>管理組合 よくあるご質問</span></div>
						<p>
						お客様からよくいただくご質問をQ&A形式でご紹介します。
						</p>
						<div class="top-10">
							<p class="ques">管理費の口座振替は、いつから始まりますか？</p>
							<p class="ans"> 
							所有者様から当社が口座振替依頼書を受領後、申し訳ありませんが金融機関の手続に少しお時間をいただいております。
							口座振替開始の約２週間前までに、「口座振替開始のお知らせ」をご郵送いたします。
							口座振替のお手続きが完了するまでの間は、当社が請求書を発行いたしますので、請求書に記載された口座にお振込みをお願いいたします。
							</p>
						</div>
						<div class="top-20">
							<p class="ques">口座引き落としの残高が不足してしまったのですが、どうすれば良いですか？</p>
							<p class="ans"> 
							管理組合の指定口座に銀行振込にてお支払いをお願いいたします。
							</p>
						</div>
						<div class="top-20">
							<p class="ques">駐車場を契約（解約）したいのですが、どうすれば良いですか？</p>
							<p class="ans"> 
							マンション管理人（もしくは当社）にご連絡ください。契約申込書（解約申入書）を送付いたします。
							契約月（解約月）の駐車場使用料につきましては、管理組合の規約に基づいて処理させていただきます。
							なお、駐車場の空き状況や賃借人も借りられるか否かは、各マンションにより異なりますので、個別にお問い合わせください。
							</p>
						</div>
						<div class="top-20">
							<p class="ques">車庫証明（保管場所使用承諾証明書）の発行依頼は、どうすれば良いですか？</p>
							<p class="ans"> 
							マンション管理人（もしくは当社）にご連絡ください。発行依頼書を送付いたします。車庫証明の発行には1週間程度かかる場合がありますので、お早目にご依頼をお願いいたします。
							</p>
						</div>
						<div class="top-20">
							<p class="ques">車を買い替えたのですが、届出は必要ですか？</p>
							<p class="ans"> 
							管理組合に届出が必要になります。マンション管理人（もしくは当社）にご連絡ください。届出書を送付いたします。
							</p>
						</div>
						<div class="top-20">
							<p class="ques">上階の騒音で困っています。</p>
							<p class="ans"> 
							騒音は人により感じ方が異なりますので、非常に難しい問題です。
							お互いに気持ち良く暮らすために、マンションにお住まいの皆様が管理規約やマナーを守ることが大切になりますので、管理組合と協力して問題解決に努めます。
							</p>
						</div>
						<div class="top-20">
							<p class="ques">エレベーターに乗っているときに地震が発生したらどうすれば良いですか。</p>
							<p class="ans"> 
							扉が開いている場合は、すぐに降りてください。
							エレベーターが動いている場合は、全ての階のボタンを押し、停止したらすぐ降りてください。
							エレベーターに閉じ込められたら、非常ボタンや緊急用インターホンで係員に連絡をし、その指示に従ってください。
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

