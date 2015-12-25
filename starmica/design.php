<?php
//***トップページのヘッダー ***//
function user_header_top($HTMLTITLE,$currentmenu){
?>
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
<title><?=$HTMLTITLE?>｜スター・マイカ・レジデンス株式会社</title>
<link rel="stylesheet" href="../css/import.css" media="screen, projection, print" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="container">
	<header>
		<div class="row">
			<div class="col one-fourth">
				<h1>
					<a href="../">
					<noscript data-large="../images/logo-sm.png" data-small="../images/logo.gif" data-alt="スター・マイカ・レジデンス株式会社">
					<img src="../images/logo.gif" alt="スター・マイカ・レジデンス株式会社" />
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
						<li id="menu1_on"><a href="../renovation/">リノベ物件特集</a></li>
<?php
	}
	else{
?>
						<li id="menu1"><a href="../renovation/">リノベ物件特集</a></li>
<?php
	}
	if($currentmenu >= 200 AND $currentmenu <= 300){
?>
						<li id="menu2_on"><a href="../reform/">自分でリノベ</a></li>
<?php
	}
	else{
?>
						<li id="menu2"><a href="../reform/">自分でリノベ</a></li>
<?php
	}
	if($currentmenu >= 300 AND $currentmenu <= 400){
?>  
						<li id="menu3_on"><a href="../management/">マンション管理</a></li>
<?php
	}
	else{
?>
						<li id="menu3"><a href="../management/">マンション管理</a></li>

<?php
	}
	if($currentmenu >= 400 AND $currentmenu <= 500){
?>  
						<li id="menu4_on"><a href="../service/">サービス紹介</a></li>
<?php
	}
	else{
?>
						<li id="menu4"><a href="../service/">サービス紹介</a></li>
<?php
	}
	if($currentmenu >= 500 AND $currentmenu <= 600){
?>  
						<li id="menu5_on"><a href="../company/">会社案内</a></li>
<?php
	}
	else{
?>
						<li id="menu5"><a href="../company/">会社案内</a></li>
<?php
	}
	if($currentmenu >= 500 AND $currentmenu <= 600){
?> 
						<li id="menu6"><a href="../search/"><span>物件を探す</span><p class="triangle"></p></a></li>
<?php
	}
	else{
?>
						<li id="menu6"><a href="../search/"><span>物件を探す</span><p class="triangle"></p></a></li>
<?php
	}
?>

					</ul>
				</nav>
			</div>
		</div>
	</header>

<?php
}
//***下層ページのヘッダー ***//
function user_header($HTMLTITLE,$currentmenu){
?>
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
<title><?=$HTMLTITLE?>｜スター・マイカ・レジデンス株式会社</title>
<link rel="stylesheet" href="../css/import.css" media="screen, projection, print" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/thickbox.js"></script>

<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="container">
	<header>
		<div class="row">
			<div class="col one-fourth">
				<h1>
					<a href="../">
					<noscript data-large="../images/logo-sm.png" data-small="../images/logo.gif" data-alt="スター・マイカ・レジデンス株式会社">
					<img src="../images/logo.gif" alt="スター・マイカ・レジデンス株式会社" />
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
						<li id="menu1_on"><a href="../renovation/">リノベ物件特集</a></li>
<?php
	}
	else{
?>
						<li id="menu1"><a href="../renovation/">リノベ物件特集</a></li>
<?php
	}
	if($currentmenu >= 200 AND $currentmenu <= 300){
?>
						<li id="menu2_on"><a href="../reform/">自分でリノベ</a></li>
<?php
	}
	else{
?>
						<li id="menu2"><a href="../reform/">自分でリノベ</a></li>
<?php
	}
	if($currentmenu >= 300 AND $currentmenu <= 400){
?>  
						<li id="menu3_on"><a href="../management/">マンション管理</a></li>
<?php
	}
	else{
?>
						<li id="menu3"><a href="../management/">マンション管理</a></li>

<?php
	}
	if($currentmenu >= 400 AND $currentmenu <= 500){
?>  
						<li id="menu4_on"><a href="../service/">サービス紹介</a></li>
<?php
	}
	else{
?>
						<li id="menu4"><a href="../service/">サービス紹介</a></li>
<?php
	}
	if($currentmenu >= 500 AND $currentmenu <= 600){
?>  
						<li id="menu5_on"><a href="../company/">会社案内</a></li>
<?php
	}
	else{
?>
						<li id="menu5"><a href="../company/">会社案内</a></li>
<?php
	}
	if($currentmenu >= 500 AND $currentmenu <= 600){
?> 
						<li id="menu6"><a href="../search/"><span>物件を探す</span><p class="triangle"></p></a></li>
<?php
	}
	else{
?>
						<li id="menu6"><a href="../search/"><span>物件を探す</span><p class="triangle"></p></a></li>
<?php
	}
?>

					</ul>
				</nav>
			</div>
		</div>
	</header>

<?php
}
//*** ミニナビやサイドメニューからのコンテンツヘッダー ***//
function user_header_other($HTMLTITLE,$currentmenu){
?>
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
<title><?=$HTMLTITLE?>｜スター・マイカ・レジデンス株式会社</title>
<link href=’http://fonts.googleapis.com/css?family=Patrick+Hand+SC’ rel=’stylesheet’ type=’text/css’>
<link rel="stylesheet" href="css/import.css" media="screen, projection, print" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
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
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="container">
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

<?php
}
function user_sidebanner($currentmenu){
//***サイドバナー共通 ***//
?>
					<div class="side-banner">
						<ul>
							<li>
							<a href="https://www.starmicacloud.com/form/contactus.php" target="_blank"> 
							<img class="imgChange" src="../images/sidebannar_pc.png" data-img="../images/sidebannar_pc.png" alt="不動産仲介会社様向け専用サイト Star mica cloud" />
							</a>
							</li>
							<li>
							<a href="../member.php"> 
							<img class="imgChange" src="../images/sidebannar-01_pc.jpg" data-img="../images/sidebannar-01_pc.jpg" alt="会員登録" />
							</a>
							</li>
							<li>
							<a href="../contactus.php"> 
							<img class="imgChange" src="../images/sidebannar-03_pc.jpg" data-img="../images/sidebannar-03_pc.jpg" alt="お問い合わせ" />
							</a>
							</li>
							<li>
							<a href="http://www.starmica.co.jp/renopica/" target="_blank"> 
							<img class="imgChange" src="../images/sidebannar-04_pc.jpg" data-img="../images/sidebannar-04_pc.jpg" alt="リノベーション事例集" />
							</a>
							</li>
							<li>
							<a href="../guide.php"> 
							<img class="imgChange" src="../images/sidebannar-05_pc.jpg" data-img="../images/sidebannar-05_pc.jpg" alt="購入の手引き" />
							</a>
							</li>
							<li>
							<a href="../contactus.php"> 
							<img class="imgChange" src="../images/sidebannar-06_pc.jpg" data-img="../images/sidebannar-06_pc.jpg" alt="お電話でのお問い合わせ" />
							</a>
							</li>
							<li>
							<a href="http://www.starmica.co.jp/" target="_blank"> 
							<img src="../images/sidebannar-mica.jpg" alt="スター・マイカ株式会社" />
							</a>
							</li>
							<li>
							<a href="http://www.fan-invest.co.jp/" target="_blank"> 
							<img src="../images/sidebannar-fan.jpg" alt="ファン・インベストメント" />
							</a>
							</li>
							<li>
							<a href="http://www.shiawase.starmica-r.co.jp/" target="_blank"> 
							<img src="../images/sidebannar-shiawase.jpg" alt="しあわせリノベ研究所" />
							</a>
							</li>

						</ul>
					</div>

<?php
}
function user_sidebanner_other($currentmenu){
//***サイドバナー共通 ***//
?>
					<div class="side-banner">
						<ul>
							<li>
							<a href="https://www.starmicacloud.com/form/contactus.php" target="_blank"> 
							<img class="imgChange" src="" data-img="images/sidebannar_pc.png" alt="不動産仲介会社様向け専用サイト Star mica cloud" />
							</a>
							</li>
							<li>
							<a href="member.php"> 
							<img class="imgChange" src="" data-img="images/sidebannar-01_pc.jpg" alt="会員登録" />
							</a>
							</li>
							<li>
							<a href="contactus.php"> 
							<img class="imgChange" src="" data-img="images/sidebannar-03_pc.jpg" alt="お問い合わせ" />
							</a>
							</li>
							<li>
							<a href="http://www.starmica.co.jp/renopica/" target="_blank"> 
							<img class="imgChange" src="" data-img="images/sidebannar-04_pc.jpg" alt="リノベーション事例集" />
							</a>
							</li>
							<li>
							<a href="guide.php"> 
							<img class="imgChange" src="" data-img="images/sidebannar-05_pc.jpg" alt="購入の手引き" />
							</a>
							</li>
							<li>
							<a href="contactus.php"> 
							<img class="imgChange" src="" data-img="images/sidebannar-06_pc.jpg" alt="お電話でのお問い合わせ" />
							</a>
							</li>
							<li>
							<a href="http://www.starmica.co.jp/" target="_blank"> 
							<img src="images/sidebannar-mica.jpg" alt="スター・マイカ株式会社" />
							</a>
							</li>
							<li>
							<a href="http://www.fan-invest.co.jp/" target="_blank"> 
							<img src="images/sidebannar-fan.jpg" alt="ファン・インベストメント" />
							</a>
							</li>
							<li>
							<a href="http://www.shiawase.starmica-r.co.jp/" target="_blank"> 
							<img src="images/sidebannar-shiawase.jpg" alt="しあわせリノベ研究所" />
							</a>
							</li>

						</ul>
					</div>

<?php
}
//***メインメニューが100の場合 ***//
function user_sidearea100($currentmenu){
?>
					<div id="side-menu">
						<h2><span>リノベーション物件特集</span></h2>
						<ul>
<?php
	if($currentmenu == '110'){
?>
						<li class="on"><a href="index.php"><span>リノベーション済物件の魅力</span></a></li>
<?php
	}
	else{
?>
						<li><a href="index.php"><span>リノベーション済物件の魅力</span></a></li>
<?php
	}
	if($currentmenu == '120'){
?>
						<li class="on"><a href="renopica.php"><span>リノピカマンション</span></a></li>
<?php
	}
	else{
?>
						<li><a href="renopica.php"><span>リノピカマンション</span></a></li>
<?php
	}
	if($currentmenu == '130'){
?>
						<li class="on"><a href="itou.php"><span>一棟リノベーション</span></a></li>
<?php
	}
	else{
?>
						<li><a href="itou.php"><span>一棟リノベーション</span></a></li>
<?php
	}
	if($currentmenu == '140'){
?>

						<li class="on"><a href="property.php"><span>おすすめ物件一覧</span></a></li>
<?php
	}
	else{
?>
						<li><a href="property.php"><span>おすすめ物件一覧</span></a></li>
<?php
	}
	if($currentmenu == '150'){
?>
						<li class="on"><a href="../member.php"><span>今後の販売予定を知りたい</span></a></li>
<?php
	}
	else{
?>
						<li><a href="../member.php"><span>今後の販売予定を知りたい</span></a></li>
<?php
	}
?>
						</ul>
					</div>
					<!--/side-menu-->

<?php
}
//***メインメニューが200の場合 ***//
function user_sidearea200($currentmenu){
?>
					<div id="side-menu">
						<h2><span>自分でリノベーション</span></h2>
						<ul>
<?php
	if($currentmenu == '210'){
?>
						<li class="on"><a href="index.php"><span>ビフォー物件特集</span></a></li>
<?php
	}
	else{
?>
						<li><a href="index.php"><span>ビフォー物件特集</span></a></li>
<?php
	}
	if($currentmenu == '220'){
?>
						<li class="on"><a href="beforeappeal.php"><span>ビフォー物件の魅力</span></a></li>
<?php
	}
	else{
?>
						<li><a href="beforeappeal.php"><span>ビフォー物件の魅力</span></a></li>
<?php
	}
	if($currentmenu == '230'){
?>
						<li class="on"><a href="learn.php"><span>リノベーションの基礎知識</span></a></li>
<?php
	}
	else{
?>
						<li><a href="learn.php"><span>リノベーションの基礎知識</span></a></li>
<?php
	}
	if($currentmenu == '240'){
?>
						<li class="on"><a href="schedule.php"><span>スケジュール</span></a></li>
<?php
	}
	else{
?>
						<li><a href="schedule.php"><span>スケジュール</span></a></li>
<?php
	}
	if($currentmenu == '250'){
?>
						<li class="on"><a href="price.php"><span>価格（定額制価格表）</span></a></li>
<?php
	}
	else{
?>
						<li><a href="price.php"><span>価格（定額制価格表）</span></a></li>
<?php
	}
	if($currentmenu == '260'){
?>
						<li class="on"><a href="plan.php"><span>資金計画</span></a></li>
<?php
	}
	else{
?>
						<li><a href="plan.php"><span>資金計画</span></a></li>
<?php
	}
?>
						</ul>
					</div>
					<!--/side-menu-->

<?php
}
//***メインメニューが300の場合 ***//
function user_sidearea300($currentmenu){
?>
					<div id="side-menu">
						<h2><span>マンション管理</span></h2>
						<ul>
<?php
	if($currentmenu == '310'){
?>
						<li class="on"><a href="index.php"><span>マンション管理業務</span></a></li>
<?php
	}
	else{
?>
						<li><a href="index.php"><span>マンション管理業務</span></a></li>
<?php
	}
	if($currentmenu == '320'){
?>
						<li class="on"><a href="faq.php"><span>管理組合 よくあるご質問</span></a></li>
<?php
	}
	else{
?>
						<li><a href="faq.php"><span>管理組合 よくあるご質問</span></a></li>
<?php
	}
	if($currentmenu == '330'){
?>
						<li class="on"><a href="nyukyosya.php"><span>入居者の皆様へ</span></a></li>
<?php
	}
	else{
?>
						<li><a href="nyukyosya.php"><span>入居者の皆様へ</span></a></li>
<?php
	}
	if($currentmenu == '340'){
?>
						<li class="on"><a href="tyukai.php"><span>仲介会社の皆様へ</span></a></li>
<?php
	}
	else{
?>
						<li><a href="tyukai.php"><span>仲介会社の皆様へ</span></a></li>
<?php
	}
	if($currentmenu == '350'){
?>
						<li class="on"><a href="kanrikaisyahenkou.php"><span>管理会社変更をご検討中の方</span></a></li>
<?php
	}
	else{
?>
						<li><a href="kanrikaisyahenkou.php"><span>管理会社変更をご検討中の方</span></a></li>
<?php
	}
?>

						</ul>
					</div>
					<!--/side-menu-->
<?php
}
//***メインメニューが400の場合 ***//
function user_sidearea400($currentmenu){
?>

					<div id="side-menu">
						<h2><span>サービス紹介</span></h2>
						<ul>
<?php
	if($currentmenu == '410'){
?>
						<li class="on"><a href="index.php"><span>リノベーション物件紹介</span></a></li>
<?php
	}
	else{
?>
						<li><a href="index.php"><span>リノベーション物件紹介</span></a></li>
<?php
	}
	if($currentmenu == '430'){
?>
						<li class="on"><a href="option.php"><span>オプション／アクセサリー</span></a></li>
<?php
	}
	else{
?>
						<li><a href="option.php"><span>オプション／アクセサリー</span></a></li>
<?php
	}
	if($currentmenu == '440'){
?>
						<li class="on"><a href="loan.php"><span>各種提携住宅ローン</span></a></li>
<?php
	}
	else{
?>
						<li><a href="loan.php"><span>各種提携住宅ローン</span></a></li>
<?php
	}
	if($currentmenu == '460'){
?>
						<li class="on"><a href="afterservice.php"><span>アフター保証</span></a></li>
<?php
	}
	else{
?>
						<li><a href="afterservice.php"><span>アフター保証</span></a></li>
<?php
	}
	if($currentmenu == '470'){
?>
						<li class="on"><a href="../management/index.php"><span>マンション管理</span></a></li>
<?php
	}
	else{
?>
						<li><a href="../management/index.php"><span>マンション管理</span></a></li>
<?php
	}
	if($currentmenu == '480'){
?>
						<li class="on"><a href="event.php"><span>イベント情報</span></a></li>
<?php
	}
	else{
?>
						<li><a href="event.php"><span>イベント情報</span></a></li>
<?php
	}
?>
						</ul>
					</div>
					<!--/side-menu-->
<?php
}
//***メインメニューが500の場合 ***//
function user_sidearea500($currentmenu){
?>
					<div id="side-menu">
						<h2><span>会社案内</span></h2>
						<ul>
<?php
	if($currentmenu == '510'){
?>
						<li class="on"><a href="index.php"><span>会社概要</span></a></li>
<?php
	}
	else{
?>
						<li><a href="index.php"><span>会社概要</span></a></li>
<?php
	}
	if($currentmenu == '520'){
?>
						<li class="on"><a href="aboutus.php"><span>グループ概要</span></a></li>
<?php
	}
	else{
?>
						<li><a href="aboutus.php"><span>グループ概要</span></a></li>
<?php
	}
	if($currentmenu == '530' OR $currentmenu == '20'){
?>
						<li class="on"><a href="../contactus.php"><span>お問い合わせ</span></a></li>
<?php
	}
	else{
?>
						<li><a href="../contactus.php"><span>お問い合わせ</span></a></li>
<?php
	}
?>
						</ul>
					</div>
					<!--/side-menu-->
<?php
}

//***メインメニューが20の場合 ***//
function user_sidearea20($currentmenu){
?>
					<div id="side-menu">
						<h2><span>会社案内</span></h2>
						<ul>
<?php
	if($currentmenu == '510'){
?>
						<li class="on"><a href="company/index.php"><span>会社概要</span></a></li>
<?php
	}
	else{
?>
						<li><a href="company/index.php"><span>会社概要</span></a></li>
<?php
	}
	if($currentmenu == '520'){
?>
						<li class="on"><a href="company/aboutus.php"><span>グループ概要</span></a></li>
<?php
	}
	else{
?>
						<li><a href="company/aboutus.php"><span>グループ概要</span></a></li>
<?php
	}
	if($currentmenu == '530' OR $currentmenu == '20'){
?>
						<li class="on"><a href="contactus.php"><span>お問い合わせ</span></a></li>
<?php
	}
	else{
?>
						<li><a href="contactus.php"><span>お問い合わせ</span></a></li>
<?php
	}
?>
						</ul>
					</div>
					<!--/side-menu-->
<?php
}

//***メインメニューが10の場合 ***//
function user_sidearea10($currentmenu){
?>

					<div id="side-menu">
						<h2><span>購入の手引き</span></h2>
						<ul>
<?php
	if($currentmenu == '10'){
?>
						<li class="on"><a href="guide.php"><span>住まいのご購入の流れ</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide.php"><span>住まいのご購入の流れ</span></a></li>

<?php
	}
	if($currentmenu == '1'){
?>
						<li class="on"><a href="guide-1.php"><span>ステップ1 購入のご相談</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide-1.php"><span>ステップ1 購入のご相談</span></a></li>
<?php
	}
	if($currentmenu == '2'){
?>
						<li class="on"><a href="guide-2.php"><span>ステップ2 物件紹介</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide-2.php"><span>ステップ2 物件紹介</span></a></li>
<?php
	}
	if($currentmenu == '3'){
?>
						<li class="on"><a href="guide-3.php"><span>ステップ3 購入申込</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide-3.php"><span>ステップ3 購入申込</span></a></li>
<?php
	}
	if($currentmenu == '3'){
?>
						<li class="on"><a href="guide-3.php#step4"><span>ステップ4 売買契約</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide-3.php#step4"><span>ステップ4 売買契約</span></a></li>
<?php
	}
	if($currentmenu == '4'){
?>
						<li class="on"><a href="guide-4.php"><span>ステップ5 住宅ローン</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide-4.php"><span>ステップ5 住宅ローン</span></a></li>
<?php
	}
	if($currentmenu == '4'){
?>
						<li class="on"><a href="guide-4.php#step6"><span>ステップ6 金銭消費賃貸契約</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide-4.php#step6"><span>ステップ6 金銭消費賃貸契約</span></a></li>
<?php
	}
	if($currentmenu == '5'){
?>
						<li class="on"><a href="guide-5.php"><span>ステップ7 最終確認</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide-5.php"><span>ステップ7 最終確認</span></a></li>
<?php
	}
	if($currentmenu == '5'){
?>
						<li class="on"><a href="guide-5.php#step8"><span>ステップ8 お引渡し</span></a></li>
<?php
	}
	else{
?>
						<li><a href="guide-5.php#step8"><span>ステップ8 お引渡し</span></a></li>
<?php
	}
?>
						</ul>
					</div>
					<!--/side-menu-->

<?php
}
//***フッダー（共通） ***//
function user_footer($currentmenu){
?>
		<a href="../search/index.php"><p id="bukken-search"><span class="serch-icon"></span></p></a>
		<div id="page-top">
			<p>
				<a href="#">TOPへ</a>
			</p>
		</div>
		<!-- /#page-top -->

		<div id="utility">
			<div class="row">
				<div id="contact">
					<div class="input"><a href="../contactus.php">お問い合わせ</a></div>
				</div>
				<div id="feature">
					<p>リノベーション物件のご相談なら、スター・マイカレジデンスへ</p>
				</div>
			</div>
		</div>
		<!-- /#utility -->

	</div>
	<!-- /main -->

	<footer>
		<div class="footer-top">
			<div class="row">
				<div class="col">
					<nav>
						<ul>
							<li><a href="../">ホーム</a></li>
							<li><a href="../company/">会社情報</a></li>
							<li><a href="../privacy.php">プライバシーポリシー</a></li>
							<li><a href="../sitemap.php">サイトマップ</a></li>
							<li><a href="../company/index.php#a1">交通アクセス</a></li>
							<li><a href="../contactus.php">お問い合わせ</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!--/footer-bottom-->
		<div class="row">
			<div class="footer-inner">
				<div class="link-area">
					<div class="link-1">
						<ul class="link">
						<li class="top">▼リノベーション物件特集</li>
						<li><a href="../renovation/index.php">リノベーション済物件の魅力</a></li>
						<li><a href="../renovation/renopica.php">スター・マイカのリノピカマンション</a></li>
						<li><a href="../renovation/itou.php">一棟リノベーションへの取り組み</a></li>
						<li><a href="../renovation/property.php">お薦め物件一覧</a></li>
						<li><a href="../member.php">今後の販売予定を知りたい</a></li>
						</ul>
					</div>
					<div class="link-2">
						<ul class="link">
						<li class="top">▼自分でリノベーション</li>
						<li><a href="../reform/index.php">ビフォー物件特集</a></li>
						<li><a href="../reform/beforeappeal.php">ビフォー物件の魅力</a></li>
						<li><a href="../reform/learn.php">リノベーション基礎知識</a></li>
						<li><a href="../reform/schedule.php">スケジュール</a></li>
						<li><a href="../reform/price.php">価格（定額制価格表）</a></li>
						<li><a href="../reform/plan.php">資金計画</a></li>
						</ul>
					</div>
					<div class="link-3">
						<ul class="link">
						<li class="top">▼マンション管理</li>
						<li><a href="../management/index.php">マンション管理業務</a></li>
						<li><a href="../management/faq.php">管理組合 よくあるご質問</a></li>
						<li><a href="../management/nyukyosya.php">入居者の皆様へ</a></li>
						<li><a href="../management/tyukai.php">仲介会社の皆様へ</a></li>
						<li><a href="../management/kanrikaisyahenkou.php">管理会社変更を検討の皆様へ</a></li>
						</ul>
					</div>
					<div class="link-4">
						<ul class="link">
						<li class="top">▼サービス紹介</li>
						<li><a href="../service/index.php">リノベーション物件紹介</a></li>
						<li><a href="../service/option.php">オプション/アクセサリー</a></li>
						<li><a href="../service/loan.php">各種提携住宅ローン</a></li>
						<li><a href="../service/afterservice.php">アフター保証</a></li>
						<li><a href="../management/index.php">マンション管理</a></li>
						<li><a href="../service/event.php">イベント情報</a></li>
						</ul>
					</div>
					<div class="link-5">
						<ul class="link">
						<li class="top">▼会社案内</li>
						<li><a href="../company/index.php">会社概要</a></li>
						<li><a href="../company/aboutus.php">グループ概要</a></li>
						</ul>
						<ul class="link">
						<li class="top">▼便利コンテンツ</li>
						<li><a href="../guide.php">購入の手引き</a></li>
						<li><a href="../inquiry.php">お客様アンケート</a></li>
						<li><a href="../member.php">会員登録</a></li>
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

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37551884-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
<?php
}
//***ミニナビやサイドコンテンツページ フッダー（共通） ***//
function user_footer_other($currentmenu){
?>
		<a href="search/index.php"><p id="bukken-search"><span class="serch-icon"></span></p></a>
		<div id="page-top">
			<p>
				<a href="#">TOPへ</a>
			</p>
		</div>
		<!-- /#page-top -->

		<div id="utility">
			<div class="row">
				<div id="contact">
					<div class="input"><a href="contactus.php">お問い合わせ</a></div>
				</div>
				<div id="feature">
					<p>リノベーション物件のご相談なら、スター・マイカレジデンスへ</p>
				</div>
			</div>
		</div>
		<!-- /#utility -->

	</div>
	<!-- /main -->

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
		<!--/footer-bottom-->
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
						<li><a href="inquiry.php">お客様アンケート</a></li>
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

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37551884-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
<?php
}
?>

