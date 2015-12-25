<!DOCTYPE html>
<!--[if lt IE 7]><html class="ie6" lang="ja"><![endif]-->
<!--[if IE 7]><html class="ie7" lang="ja"><![endif]-->
<!--[if IE 8]><html class="ie8" lang="ja"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="ja"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ja"><![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>スター・マイカ・レジデンス株式会社</title>
<link rel="stylesheet" href="css/importtop.css" media="screen, projection, print" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.sliderPro.min.js"></script>
<script>
$( document ).ready(function( $ ) {
  $('#topmain').sliderPro({
	width: '100%',
	responsive: true,
	aspectRatio: -1,
	centerImage: true,
	autoHeight: true,
	autoplay:true,
	autoplayDelay:3000,
	loop: true,
	arrows: true,
	buttons: false,
	slideDistance:0,
	fade:true,
    	fadeOutPreviousSlide:true,
    	fadeDuration:800,
    	thumbnailWidth: 100,
    	thumbnailHeight: 80,
    	thumbnailsPosition: 'bottom',
	thumbnailPointer: false,
        thumbnailArrows: false,
        fadeThumbnailArrows: true,
        thumbnailTouchSwipe: true,
  });
});
</script>
<script>
$(function(){
	var wid = $(window).width();
	if( wid < 480 ){
		$('.imgChange').each(function(){
			$(this).attr("src",$(this).data("img").replace('_pc', '_sp'));
		});
	}else {
		$('.imgChange').each(function(){
			$(this).attr("src",$(this).data("img"));
		});
	}
});
</script>
<script type="text/javascript" src="js/jquery.min.js"  ></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script>
$(function(){
	var wid = $(window).width();
	if( wid > 480 ){
		$("document").ready(function(){
		  $('.multiple-items').slick({
		    infinite: true,
		    dots:false,
		    swipe:true,
		    slidesToShow: 4,
		    slidesToScroll: 1
		  });
		}); 
	}
});
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>

	<header>
		<div class="row">
			<div class="col one-fourth">
				<h1>
					<a href="index.php">
					<noscript data-large="images/logo-sm.png" data-small="images/logo.gif" data-alt="スター・マイカ・レジデンス株式会社">
					<img src="images/logo.gif" alt="スター・マイカ・レジデンス株式会社" />
					</noscript>
					</a>
				</h1>
			</div>
			<div class="col third-fourth">
				<nav id="gnav">
					<ul>
<?php
	if($currentmenu >= 100 AND $currentmenu <= 200){
?>
						<li id="menu1_on"><a href="renovation/">リノベ物件特集</a></li>
<?php
	}
	else{
?>
						<li id="menu1"><a href="renovation/">リノベ物件特集</a></li>
<?php
	}
	if($currentmenu >= 200 AND $currentmenu <= 300){
?>
						<li id="menu2_on"><a href="reform/">自分でリノベ</a></li>
<?php
	}
	else{
?>
						<li id="menu2"><a href="reform/">自分でリノベ</a></li>
<?php
	}
	if($currentmenu >= 300 AND $currentmenu <= 400){
?>  
						<li id="menu3_on"><a href="management/">マンション管理</a></li>
<?php
	}
	else{
?>
						<li id="menu3"><a href="management/">マンション管理</a></li>

<?php
	}
	if($currentmenu >= 400 AND $currentmenu <= 500){
?>  
						<li id="menu4_on"><a href="service/">サービス紹介</a></li>
<?php
	}
	else{
?>
						<li id="menu4"><a href="service/">サービス紹介</a></li>
<?php
	}
	if($currentmenu >= 500 AND $currentmenu <= 600){
?>  
						<li id="menu5_on"><a href="company/">会社案内</a></li>
<?php
	}
	else{
?>
						<li id="menu5"><a href="company/">会社案内</a></li>
<?php
	}
	if($currentmenu >= 500 AND $currentmenu <= 600){
?> 
						<li id="menu6"><a href="search/"><span>物件を探す</span><p class="triangle"></p></a></li>
<?php
	}
	else{
?>
						<li id="menu6"><a href="search/"><span>物件を探す</span><p class="triangle"></p></a></li>
<?php
	}
?>

					</ul>
				</nav>
			</div>
		</div>
	</header>

	<div id="topmain" class="slider-pro">
		<div class="sp-slides" id="slider-sp">
			<div class="sp-slide">
				<img class="sp-image imgChange" src="" data-img="images/top-main2_pc.jpg" alt="ステラレジデンス中目黒"/>
			</div>
			<div class="sp-slide">
				<img class="sp-image imgChange" src="" data-img="images/top-main1_pc.jpg" alt="ステラレジデンス横浜"/>
			</div>
			<div class="sp-slide">
				<img class="sp-image imgChange" src="" data-img="images/top-main3_pc.jpg" alt="ステラレジデンス高円寺"/>
			</div>
			<div class="sp-slide">
				<img class="sp-image imgChange" src="" data-img="images/top-main4_pc.jpg" alt="ステラレジデンス氷川台"/>
			</div>
			<div class="sp-slide">
				<img class="sp-image imgChange" src="" data-img="images/top-main5_pc.jpg" alt="ステラガーデン溝の口"/>
			</div>
			<div class="sp-slide">
				<img class="sp-image imgChange" src="" data-img="images/top-main6_pc.jpg" alt="ステラガーデン南生田"/>
			</div>
			<div class="sp-slide">
				<img class="sp-image imgChange" src="" data-img="images/top-main7_pc.jpg" alt="ステラスイート大井"/>
			</div>
		</div>
		<!--/ sp-slides-->
	</div>
	<!--/ topmain-->

	<div class="sp-thumbnails-container">
		<div class="sp-thumbnails">
		<a href="http://www.starmica-r.co.jp/nakameguro/" target="_blank"><img class="sp-thumbnail" src="images/bannar-02.png"/>
		<a href="http://www.starmica-r.co.jp/yokohama/" target="_blank"><img class="sp-thumbnail" src="images/bannar-01.png"/></a>
		<a href="http://www.starmica-r.co.jp/koenji/" target="_blank"><img class="sp-thumbnail" src="images/bannar-03.png"/>
		<a href="http://www.starmica-r.co.jp/hikawadai/" target="_blank"><img class="sp-thumbnail" src="images/bannar-04.png"/>
		<a href="http://www.starmica-r.co.jp/mizonokuchi/" target="_blank"><img class="sp-thumbnail" src="images/bannar-05.png"/>
		<a href="http://www.starmica-r.co.jp/minamiikuta/" target="_blank"><img class="sp-thumbnail" src="images/bannar-06.png"/>
		<a href="http://www.starmica-r.co.jp/ooi/" target="_blank"><img class="sp-thumbnail" src="images/bannar-07.png"/>
		</div>
	</div>

	<div id="sp_searchbutton">
			<button class="search_button01">
				<a href="search/">物件を探す</a>
			</button>
			<button class="contact_button01">
				<a href="contactus.php">お問い合わせ</a>
			</button>

	</div>
	<div id="maincontent">
		<div id="newproperty-info" class="row">
			<div class="index-midashi"><span>新着物件・オープンルーム情報</span></div><div class="index-midashi-s">NEW PROPERTY INFO</div>

			<div class="multiple-items">
				<div class="col2">
					<section>
					<a href="" target="_blank">
					<p class="img newproperty-info-img"><img src="photoimages/nishiwaseda_1.jpg" alt="" /></p>
					<div class="cate-3">新着物件</div>
					<h3>ニューライフ西早稲田<span class="new">NEW</span></h3>
					<p class="info-message">物件情報を登録しました。クリックすると詳細情報がご確認いただけます。</p>
					</a>
					</section>
				</div>

				<div class="col2">
					<section>
					<a href="search/eventview2.php" target="_blank">
					<p class="img newproperty-info-img"><img src="photoimages/hikawadai_1.jpg" alt="" /></p>
					<div class="cate-3">新着物件</div>
					<h3>『ステラレジデンス高円寺』<span class="new">NEW</span></h3>
					<p class="info-message">物件情報を登録しました。クリックすると詳細情報がご確認いただけます。</p>
					</a>
					</section>
				</div>
				<div class="col2">
					<section>
					<a href="http://www.starmica-r.co.jp/koenji/" target="_blank">
					<p class="img newproperty-info-img"><img src="photoimages/koenji_1.jpg" alt="" /></p>
					<div class="cate-1">OPEN ROOM</div>
					<h3>『ステラレジデンス高円寺』現地販売会開催<span class="new">NEW</span></h3>
					<p class="info-message">12/5（土）・6（日）11：00～17:00『ステラレジデンス高円寺』の現地内覧会を開催いたします。開催期間中はご予約不要です。</p>
					</a>
					</section>
				</div>
				<div class="col2">
					<section>
					<a href="http://www.starmica-r.co.jp/nishiwaseda/" target="_blank">
					<p class="img newproperty-info-img"><img src="photoimages/nishiwaseda_1.jpg" alt="" /></p>
					<div class="cate-2">新着＆OPENROOM</div>
					<h3>『ニューライフ西早稲田』現地販売会開催<span class="new">NEW</span></h3>
					<p class="info-message">12/5（土）・6（日）11：00～17:00『ニューライフ西早稲田』の現地内覧会を開催いたします。開催期間中はご予約不要です。</p>
					</a>
					</section>
				</div>
				<div class="col2">
					<section>
					<a href="http://www.starmica-r.co.jp/nishiwaseda/" target="_blank">
					<p class="img newproperty-info-img"><img src="images/nophoto.jpg" alt="" /></p>
					<div class="cate-1">OPEN ROOM</div>
					<h3>『ニューライフ西早稲田』現地販売会開催<span class="new">NEW</span></h3>
					<p class="info-message">12/5（土）・6（日）11：00～17:00『ニューライフ西早稲田』の現地内覧会を開催いたします。開催期間中はご予約不要です。</p>
					</a>
					</section>
				</div>
				<div class="col2">
					<section>
					<a href="http://www.starmica-r.co.jp/nishiwaseda/" target="_blank">
					<p class="img newproperty-info-img"><img src="photoimages/nishiwaseda_1.jpg" alt="" /></p>
					<div class="cate-1">OPEN ROOM</div>
					<h3>『ニューライフ西早稲田』現地販売会開催<span class="new">NEW</span></h3>
					<p class="info-message">12/5（土）・6（日）11：00～17:00『ニューライフ西早稲田』の現地内覧会を開催いたします。開催期間中はご予約不要です。</p>
					</a>
					</section>
				</div>
			</div>
		</div>

	</div>

	<div id="maincontent2">
		<div id="indexservice" class="row">
			<div class="index-midashi"><span>不動産サポート</span></div><p class="index-midashi-support">SUPPORT</p>
			<ul class="servicebox">
			<li class="col one-fourth left">
				<section>
				<a href="search/index.php">
				<p class="img"><img src="images/suppoort-01.png" alt="リノベーション・中古マンションを探す" /></p>
				<p class="serviceinfo">リノベーション・中古マンションの購入を検討中の方必見の物件情報</p>
				</a>
				</section>
			</li>
			<li class="col one-fourth">
				<section>
				<a href="http://www.starmica.co.jp/renopica/"  target="_blank">
				<p class="img"><img src="images/suppoort-02.png" alt="リノベーション事例集" /></p>
				<p class="serviceinfo">当社グループが手掛けた<br>リノベーションの事例をご紹介</p>
				</a>
				</section>
			</li>
			<li class="col one-fourth left">
				<section>
				<a href="guide.php">
				<p class="img"><img src="images/suppoort-03.png" alt="購入から決済までの流れ 購入の手引き" /></p>
				<p class="serviceinfo2">購入から決済までの流れをご紹介</p>
				</a>
				</section>
			</li>
			<li class="col one-fourth">
				<section>
				<a href="renovation/renopica.php">
				<p class="img"><img src="images/suppoort-04.png" alt="お客様安心サポート" /></p>
				<p class="serviceinfo2">購入後のアフター保証<br>信頼のスター・マイカグループ</p>
				</a>
				</section>
			</li>
			</ul>
		</div>
		<!--/ indexservice-->
	</div>
	<!--/ maincontent2-->

	<div id="indexnews" class="row">
		<div id="sidebar" class="col one-fourth left">
			<div class="side-banner-top">
				<ul>

					<li>
					<a href="https://www.starmicacloud.com/form/contactus.php" target="_blank">  
					<p class="img"><img class="imgChange" src="" data-img="images/sidebannar_pc.png" alt="不動産仲介会社様向け専用サイト Star mica cloud" /></p>
					</a>
					</li>
					<li>
					<a href="member.php"> 
					<p class="img"><img class="imgChange" src="" data-img="images/sidebannar-01_pc.jpg" alt="会員登録" /></p>
					</a>
					</li>
					<li>
					<a href="inquiry.php"> 
					<p class="img"><img class="imgChange" src="" data-img="images/sidebannar-02_pc.jpg" alt="お客様アンケート" /></p>
					</a>
					</li>
					<li>
					<a href="contactus.php"> 
					<p class="img"><img class="imgChange" src="" data-img="images/sidebannar-06_pc.jpg" alt="お電話でのお問い合わせ" /></p>
					</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="news" class="col third-fourth leftmargn">
			<section>
				<h4>お知らせ<span class="midashi-s">INFORMATION</span></h4>
				<dl class="first-child">
					<dt><span class="news-day">2015.11.25</span></dt>
					<dd>親会社スター・マイカ株式会社が東京証券取引所市場第二部へ市場変更いたしました。</dd>
				</dl>
				<dl>
					<dt><span class="news-day">2015.09.03</span></dt>
					<dd>鳥取銀行のとりぎん資産形成ローン（収益物件購入用）取扱いスタートしました。</dd>

				</dl>
				<dl>
					<dt><span class="news-day">2015.07.20</span></dt>
					<dd>週間ダイヤモンド別冊 2015年7月25日号「はじめての中古 失敗しない自分だけの住宅取得術」で1棟リノベーション「ステラシリーズ」が紹介されました。</dd>

				</dl>
				<dl>
					<dt><span class="news-day">2015.04.22</span></dt>
					<dd>BSジャパン 日経プラス10 に「住みやすい買いやすいがさらに進化！マンションリノベーションの新潮流」という特集で親会社社長秋澤が出演しました。 </dd>

				</dl>
				<dl>
					<dt><span class="news-day">2015.04.20</span></dt>
					<dd>楽天銀行の提携住宅ローン取扱いスタートしました。</dd>

				</dl>

				<dl>
					<dt><span class="news-day">2015.04.16</span></dt>
					<dd>イオン銀行の提携住宅ローン取扱いスタートしました。</dd>

				</dl>
				<dl>
					<dt><span class="news-day">2015.01.19</span></dt>
					<dd>鳥取銀行の提携住宅ローン取扱いスタートしました。</dd>

				</dl>


				<!--/ リンク有の場合
				<dl class="link">
				<a href="201307iten-re.pdf" target="_blank">
					<dt><span class="news-day">2013.07.05</span></dt>
					<dd>本社移転のご挨拶</dd>
				</a>
				</dl>

				-->
				<dl>
					<dt><span class="news-day">2013.05.31</span></dt>
					<dd>週刊ダイヤモンド別冊　2013年6月30日号　 ”マンション・戸建て　お宝中古を狙え！”で「クリオレミントンヴィレッジ国立イーストコート」が紹介されました。</dd>
				</dl>
			</section>
		</div>
	</div>
	<div id="page-top">
		<p>
			<a href="#">TOPへ</a>
		</p>
	</div>

	<div id="utility">
		<div class="row">
			<div id="contact">
				<form name="formname">
				<div class="input"><a href="contactus.php">お問い合わせ</a></div>
				</form>
			</div>
			<div id="feature">
				<p>リノベーション物件のご相談なら、スター・マイカ・レジデンスへ</p>
			</div>
		</div>
	</div>



	<footer>
		<div class="footer-top">
			<div class="row">
				<div class="col">
					<nav>
						<ul>
							<li><a href="index.php">ホーム</a></li>
							<li><a href="company/">会社情報</a></li>
							<li><a href="privacy.php">プライバシーポリシー</a></li>
							<li><a href="sitemap.php">サイトマップ</a></li>
							<li><a href="company/index.php#a1">交通アクセス</a></li>
							<li><a href="contactus.php">お問い合わせ</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!--/footer-top-->
		<div class="row">
			<div class="footer-inner">
				<div class="link-area">
					<div class="link-1">
						<ul class="link">
						<li class="top">▼リノベーション物件特集</li>
						<li><a href="renovation/index.php">リノベーション済物件の魅力</a></li>
						<li><a href="renovation/renopica.php">スター・マイカのリノピカマンション</a></li>
						<li><a href="renovation/itou.php">一棟リノベーションへの取り組み</a></li>
						<li><a href="renovation/property.php">お薦め物件一覧</a></li>
						<li><a href="member.php">今後の販売予定を知りたい</a></li>
						</ul>
					</div>
					<div class="link-2">
						<ul class="link">
						<li class="top">▼自分でリノベーション</li>
						<li><a href="reform/index.php">ビフォー物件特集</a></li>
						<li><a href="reform/beforeappeal.php">ビフォー物件の魅力</a></li>
						<li><a href="reform/learn.php">リノベーション基礎知識</a></li>
						<li><a href="reform/schedule.php">スケジュール</a></li>
						<li><a href="reform/price.php">価格（定額制価格表）</a></li>
						<li><a href="reform/plan.php">資金計画</a></li>
						</ul>
					</div>
					<div class="link-3">
						<ul class="link">
						<li class="top">▼マンション管理</li>
						<li><a href="management/index.php">マンション管理業務</a></li>
						<li><a href="management/faq.php">管理組合 よくあるご質問</a></li>
						<li><a href="management/nyukyosya.php">入居者の皆様へ</a></li>
						<li><a href="management/tyukai.php">仲介会社の皆様へ</a></li>
						<li><a href="management/kanrikaisyahenkou.php">管理会社変更を検討の皆様へ</a></li>
						</ul>
					</div>
					<div class="link-4">
						<ul class="link">
						<li class="top">▼サービス紹介</li>
						<li><a href="service/index.php">リノベーション物件紹介</a></li>
						<li><a href="service/option.php">オプション/アクセサリー</a></li>
						<li><a href="service/loan.php">各種提携住宅ローン</a></li>
						<li><a href="service/consulting.php">リノベーション/コンサルティング</a></li>
						<li><a href="service/afterservice.php">アフター保証</a></li>
						<li><a href="management/index.php">マンション管理</a></li>
						<li><a href="service/event.php">イベント情報</a></li>
						</ul>
					</div>
					<div class="link-5">
						<ul class="link">
						<li class="top">▼会社案内</li>
						<li><a href="company/index.php">会社概要</a></li>
						<li><a href="company/aboutus.php">グループ概要</a></li>
						</ul>
						<ul class="link">
						<li class="top">▼便利コンテンツ</li>
						<li><a href="guide.php">購入の手引き</a></li>
						<li><a href="inquiryinfo.php">お客様アンケート</a></li>
						<li><a href="member.php">会員登録</a></li>
						</ul>
					</div>
				</div>
				<!--/link-area-->
			</div>
			<!--/footer-inner-->
		</div>
		<!--/row-->
		<div class="footer-bottom">
			<div class="row">
				<div class="col two-third">
					<div class="name">スター・マイカ・レジデンス株式会社</div>
					<p>〒105-6028　東京都港区虎ノ門4-3-1　城山トラストタワー28階</p>
				</div>
				<div class="col one-third">
					<div id="copyright">
						<p>Copyright &copy; STAR MICA Residence Co.,Ltd. All rights reserve</p>
					</div>
				</div>
			</div>

		</div>
		<!--/footer-bottom-->
	</footer>
	<!--/footer-->
</div>
<!-- /container -->

</body>
</html>
