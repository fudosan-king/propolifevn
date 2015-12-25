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
<title>物件を探す｜スター・マイカ・レジデンス株式会社</title>
<link rel="stylesheet" href="../css/import.css" media="screen, projection, print" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/jquery.rwdImageMaps.min.js"></script>
<script>
$(document).ready(function(e) {
    $('img[usemap]').rwdImageMaps();
});
</script>

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
						<li id="menu1"><a href="../renovation/">リノベ物件特集</a></li>
						<li id="menu2"><a href="../reform/">自分でリノベ</a></li>
						<li id="menu3"><a href="../management/">マンション管理</a></li>
						<li id="menu4"><a href="../service/">サービス紹介</a></li>
						<li id="menu5"><a href="../company/">会社案内</a></li>
						<li id="menu6"><a href="../search/"><span>物件を探す</span><p class="triangle"></p></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<div id="pagetitle">
		<div class="row">
			<h2><img src="../images/menu6-title.png" alt="物件を探す" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>新築当時の状態から間取りや仕様をバリューアップしたリノベーションを中心に、
			当社グループが自信を持ってお届けする物件情報を多数掲載しております。是非、ご覧ください！ </h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">物件を探す</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>
			<div id="index" class="row">
				<div class="col one-third">
					<section>
					<a href="#search_area">
					<p class="img"><img src="../images/serch-area.png" alt="Area" /></p>
					<h1>エリアで探す</h1>
					<p>東京・神奈川・千葉・埼玉を中心にエリアから探せます。</p>
					</a>
					</section>
				</div>
				<div class="col one-third">
					<section>
					<a href="#search_route">
					<p class="img"><img src="../images/serch-route.png" alt="Route" /></p>
					<h1>路線で探す</h1>
					<p>東京・神奈川・千葉・埼玉にある主要路線名から探せます。</p>
					</a>
					</section>
				</div>
				<div class="col one-third">
					<section>
					<a href="searchlist.php">
					<p class="img"><img src="../images/serch-list.png" alt="List" /></p>
					<h1>販売中物件一覧</h1>
					<p>現在販売中の物件一覧が確認できます。</p>
					</a>
					</section>
				</div>
			</div>

			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="search_name">
						<div class="midashi-s"><span>物件名で探す</span></div>
						<p>
							物件名を入力し、検索ボタンをクリックしてください。
						</p>
						<div class="top-10">
							<form action="searchlist.php" method="post">
								<input name="search" type="text" value="" onKeyPress="return submitStop(event);" style="width:50%" class="form-deco" placeholder="物件名を入力">
								<input type="submit" name="confo" value="検索" class="submit_button01">
							</form>
						</div>

					</section>
					<section id="search_area">
						<div class="midashi-s"><span>エリアで探す</span></div>
						<p>
						マップ上から物件名の検索ができます。希望のエリアをクリックしてください。
						</p>
						<div class="top-10">
							<img src="../images/areamap.jpg"  width="680" height="455" alt="エリアマップ" usemap="#map" id="map" />
							<map name="map" id="map">
								<area shape="poly" coords="5,6,5,88,14,91,22,90,23,93,32,86,38,86,41,83,43,82,45,78,51,77,59,77,58,72,64,70,75,55,84,48,89,56,85,63,77,72,83,78,85,90,73,99,60,102,49,111,62,110,72,109,89,100,88,107,89,119,86,127,91,131,97,128,102,123,112,119,119,114,122,110,130,104,137,101,140,96,148,93,159,98,154,104,156,107,163,105,169,106,176,106,182,111,186,110,189,102,189,95,190,92,193,83,201,79,204,74,210,68,210,62,219,63,230,58,248,59,254,62,274,58,297,72,314,72,317,79,330,75,335,80,336,88,345,82,345,80,355,78,359,72,364,63,351,49,352,42,358,43,358,40,367,38,371,34,377,33,389,46,398,49,407,51,416,47,420,46,430,46,439,43,442,37,445,39,443,45,440,60,448,69,458,65,462,58,470,60,483,71,488,73,492,66,497,67,505,64,514,68,507,77,509,86,522,85,529,83,534,85,528,66,529,57,528,49,531,39,530,5,4,7" href="searchlist.php?areaid=8" />
								<area shape="poly" coords="529,6,532,35,527,49,531,58,529,64,534,84,535,91,525,99,516,108,519,113,522,124,533,139,543,149,545,154,540,171,541,177,554,192,563,202,567,214,551,240,532,243,525,250,526,261,526,269,528,279,523,298,517,305,508,318,509,329,529,335,534,331,539,343,551,333,541,323,549,320,549,323,556,330,593,306,567,283,582,265,603,262,602,256,582,261,590,255,596,249,579,215,583,213,601,242,611,256,618,248,626,242,636,241,650,242,656,283,673,283,676,283,675,5,530,5" href="searchlist.php?areaid=9" />
								<area shape="poly" coords="5,355,11,355,14,360,27,360,21,345,28,336,39,333,45,332,50,328,53,321,58,319,56,311,62,305,75,308,91,314,104,317,112,320,114,326,125,335,140,336,148,342,157,341,164,346,172,344,180,349,201,360,220,377,229,385,241,385,246,393,256,422,262,430,273,436,284,438,291,444,287,449,5,450,5,357" href="searchlist.php?areaid=7" />
								<area shape="poly" coords="5,89,12,91,16,91,24,91,30,87,40,87,47,79,60,77,60,73,68,67,77,56,84,51,87,58,77,71,82,79,84,90,70,100,58,102,51,111,71,109,87,101,88,121,87,128,90,132,110,121,117,134,114,140,116,154,116,162,113,180,138,196,150,205,145,219,141,223,149,231,144,234,147,239,138,241,139,254,132,255,144,267,138,270,144,283,147,290,144,298,138,304,142,315,147,322,147,328,143,333,143,338,125,335,113,327,112,321,90,314,71,308,61,304,56,311,56,319,50,321,48,329,30,337,21,344,26,359,14,359,10,355,5,353,6,90" href="searchlist.php?areaid=6" />
								<area shape="poly" coords="110,122,117,134,115,140,117,163,114,180,140,194,151,205,144,224,151,229,146,235,150,240,164,245,167,250,168,260,177,258,173,251,188,258,201,262,208,266,222,259,235,256,240,250,255,236,265,226,270,216,269,206,276,197,262,198,261,194,256,186,248,185,253,179,255,174,260,156,259,151,260,147,256,144,249,146,253,134,250,128,251,123,246,110,214,107,210,105,207,109,195,102,193,95,189,94,188,105,185,111,179,109,175,107,166,107,162,107,156,107,154,104,158,99,147,94,138,100,122,110,109,121" href="searchlist.php?areaid=3" />
								<area shape="poly" coords="192,92,194,96,197,100,204,107,209,109,212,106,216,107,245,110,250,116,252,127,255,133,251,143,263,146,261,153,260,162,258,168,265,176,275,180,287,181,292,178,293,183,293,189,298,193,308,192,310,188,315,183,317,175,321,171,329,176,335,171,334,169,337,164,344,160,349,161,365,164,372,159,376,154,367,146,361,145,358,141,348,136,351,129,359,130,380,130,398,131,404,137,401,142,407,151,417,153,430,150,434,153,439,145,429,128,430,122,441,120,441,128,444,117,450,119,450,124,454,118,459,114,467,112,470,110,480,106,482,111,487,113,489,107,474,82,470,73,473,65,465,59,450,70,441,61,440,51,444,41,441,42,434,47,421,47,409,52,396,49,389,48,376,34,368,39,358,45,354,48,363,58,361,69,358,77,351,81,346,83,335,89,333,82,330,76,318,80,313,74,296,71,274,60,256,63,245,60,234,59,224,63,216,64,210,64,212,69,198,79,191,88" href="searchlist.php?areaid=4" />
								<area shape="poly" coords="524,293,509,306,497,309,490,313,477,304,478,282,473,274,468,285,467,293,465,345,458,349,450,337,446,319,440,317,440,305,423,305,421,313,416,314,417,329,397,366,376,338,371,329,382,320,380,315,389,309,384,304,403,288,399,255,403,244,405,236,400,230,399,222,391,217,383,210,376,206,379,201,370,199,370,187,374,187,366,179,369,171,365,165,376,153,364,144,360,145,358,139,350,135,351,132,395,132,402,136,401,147,408,153,424,151,435,152,441,147,430,128,430,124,441,121,441,127,448,119,452,124,458,118,480,108,483,112,490,110,488,106,474,82,472,74,475,65,488,74,495,68,503,67,509,68,513,69,507,76,506,83,511,88,527,86,529,83,534,86,534,89,520,104,522,121,524,128,537,142,545,153,540,172,553,193,563,202,566,215,550,239,528,247,524,255,527,268,528,278,524,292" href="searchlist.php?areaid=5" />
								<area shape="poly" coords="417,450,288,450,291,444,285,437,276,436,261,430,241,386,229,385,198,359,177,346,168,345,164,346,156,341,145,341,143,334,148,329,149,325,139,305,146,295,148,289,140,270,143,266,136,256,138,255,141,249,140,242,153,243,165,249,169,260,177,259,177,253,190,259,207,266,225,259,235,258,248,257,254,270,268,273,281,290,297,305,306,305,310,313,316,315,321,319,326,327,330,335,342,331,357,333,360,328,361,337,354,342,364,344,366,352,365,357,385,384,389,392,397,400,381,406,374,416,395,415,417,449" href="searchlist.php?areaid=2" />
								<area shape="poly" coords="361,328,363,310,363,298,368,283,373,291,378,298,400,280,398,257,402,249,405,237,400,226,399,223,378,206,379,201,371,199,370,189,372,187,366,180,369,172,364,164,345,161,333,168,336,171,329,176,321,171,316,177,316,182,308,192,293,191,293,179,282,181,267,178,258,169,249,184,259,185,262,193,264,197,277,198,270,206,270,220,237,256,248,257,255,269,270,272,298,305,307,305,308,310,320,316,331,334,339,331,361,333,362,330" href="searchlist.php?areaid=1" />
							</map>
							<div class="item1">
								<h5>東京都</h5>
								<ul>
								<li><span class="areacolor-1">都心エリア</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=1">千代田区・中央区・港区・新宿区・渋谷区・文京区</a></li>
								<li><span class="areacolor-2">城南エリア</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=2">世田谷区・大田区・目黒区・品川区</a></li>
								<li><span class="areacolor-3">城西エリア</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=3">中野区・杉並区・練馬区</a></li>
								<li><span class="areacolor-4">城北エリア</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=4">豊島区・北区・板橋区・足立区</a></li>
								<li><span class="areacolor-5">城東エリア</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=5">葛飾区・台東区・墨田区・江東区・江戸川区・荒川区</a></li>
								<li><span class="areacolor-6">市部エリア</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=6">武蔵野市・三鷹市・小金井市・町田市など</a></li>
								</ul>
							</div>
							<div class="item2">
								<h5>神奈川県</h5>
								<ul>
								<li><span class="areacolor-7">神奈川県</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=7">横浜市・川崎市など</a></li>
								</ul>
							</div>
							<div class="item3">
								<h5>埼玉県</h5>
								<ul>
								<li><span class="areacolor-8">埼玉県</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=8">さいたま市・川口市など</a></li>
								</ul>
							</div>
							<div class="item4">
								<h5>千葉県</h5>
								<ul>
								<li><span class="areacolor-9">千葉県</span>&nbsp;&nbsp;<a href="searchlist.php?areaid=9">千葉市・船橋市など</a></li>
								</ul>
							</div>
							<div class="clearbox"></div>
						</div>
					</section>
					<section id="search_route">
						<div class="midashi-s"><span>路線で探す</span></div>
						<p>
							路線図から物件の検索ができます。路線名をクリックしてください。
						</p>
						<div class="top-10">
							<img src="../images/rosenmap.jpg" width="680" height="466" alt="路線図"  usemap="#routemap" />
							<map name="routemap" id="routemap">
								<area shape="rect" coords="96,58,161,84" href="searchlist.php?東武線" />
								<area shape="rect" coords="327,58,401,82" href="searchlist.php?JR埼京線" />
								<area shape="rect" coords="404,58,478,81" href="searchlist.php?JR京浜東北線" />
								<area shape="rect" coords="393,94,468,118" href="searchlist.php?JR山手線" />

								<area shape="rect" coords="8,116,81,141" href="searchlist.php?副都心線" />
								<area shape="rect" coords="9,153,84,179" href="searchlist.php?西武線" />
								<area shape="rect" coords="9,209,106,235" href="searchlist.php?JR中央線・総武線" />
								<area shape="rect" coords="230,427,290,452" href="searchlist.php?京急線" />
								<area shape="rect" coords="128,414,211,441" href="searchlist.php?JR横須賀線" />
								<area shape="rect" coords="27,395,114,429" href="searchlist.php?JR東海道線" />
								<area shape="rect" coords="8,337,156,366" href="searchlist.php?東急東横線・田園都市" />
								<area shape="rect" coords="8,269,70,301" href="searchlist.php?小田急線" />
								<area shape="rect" coords="95,245,157,268" href="searchlist.php?京王線" />
								<area shape="rect" coords="382,247,445,276" href="searchlist.php?丸の内線" />
								<area shape="rect" coords="593,289,654,369" href="searchlist.php?半蔵門線・銀座線・有楽町線" />
								<area shape="rect" coords="592,160,652,213" href="searchlist.php?大江戸線・新宿線" />
							</map>
							<div class="item5">
								<dl>
									<dt class="routecolor-1">JR線</dt>
									<dd>
									<a href="searchlist.php?rectid=1">・京浜東北線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=2">・山手線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=3">・中央・総武線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=4">・東海道・横須賀線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=5">・その他JR線</a>
									</dd>
								</dl>
								<dl>
									<dt class="routecolor-2">私鉄</dt>
									<dd>
									<a href="searchlist.php?rectid=6">・西武線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=7">・京王線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=8">・小田急線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=9">・東急線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=10">・京急線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=11">・東武線</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=12">・その他私鉄</a>
									</dd>
								</dl>
								<dl>	
									<dt class="routecolor-3">地下鉄</dt>
									<dd><a href="searchlist.php?rectid=13">・東京メトロ</a>&nbsp;&nbsp;<a href="searchlist.php?rectid=14">・都営地下鉄</a>
									</dd>
								</dl>
							</div>
						</div>
					</section>

				</div>
				<div id="sidebar" class="col one-fourth left">
					<div id="side-menu">
						<h2><span>物件を探す</span></h2>
						<ul>
						<li class="on"><a href="#search_area"><span>エリアで探す</span></a></li>
						<li><a href="#search_route""><span>路線で探す</span></a></li>
						<li><a href="searchlist.php"><span>販売中物件一覧</span></a></li>
						</ul>
					</div>

					<div class="side-banner">
						<ul>
							<li>
							<a href="https://www.starmicacloud.com/form/contactus.php" target="_blank"> 
							<img src="../images/sidebannar-00.png" alt="不動産仲介会社様向け専用サイト Star mica cloud" />
							</a>
							</li>
							<li>
							<a href="../member.php"> 
							<img src="../images/sidebannar-01.jpg" alt="会員登録" />
							</a>
							</li>
							<li>
							<a href="../contactus.php"> 
							<img src="../images/sidebannar-03.jpg" alt="お問い合わせ" />
							</a>
							</li>
							<li>
							<a href="http://www.starmica.co.jp/renopica/" target="_blank"> 
							<img src="../images/sidebannar-04.jpg" alt="リノベーション事例集" />
							</a>
							</li>
							<li>
							<a href="../guide.php"> 
							<img src="../images/sidebannar-05.jpg" alt="購入の手引き" />
							</a>
							</li>
							<li>
							<a href="../contactus.php"> 
							<img src="../images/sidebannar-06.jpg" alt="お電話でのお問い合わせ" />
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
				</div>


			</div>
		</article>

		<div id="page-top">
			<p>
				<a href="#">TOPへ</a>
			</p>
		</div>

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

