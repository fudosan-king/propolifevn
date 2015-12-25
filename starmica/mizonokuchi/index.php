<?php

require_once("design.php");

$HTMLTITLE ="ステラガーデン溝ノ口｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 1;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="ステラガーデン溝ノ口,マンション,中古マンション,分譲マンション" />
<meta name="Description" content="ステラガーデン溝ノ口｜中古マンション購入の相談なら、スター・マイカ・レジデンスへ" />
<title>ステラガーデン溝ノ口</title>
<link rel="stylesheet" type="text/css" media="all" href="css/import.css" />
<link rel="stylesheet" type="text/css" href="css/bgstretcher.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/bgstretcher.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
	
        //  Initialize Backgound Stretcher	   
		$('h2').bgStretcher({
			images: ['img/top1.jpg', 'img/top2.jpg', 'img/top3.jpg', 'img/top4.jpg'],
			imageWidth: 980, 
			imageHeight: 460, 
			slideDirection: 'N',
			slideShowSpeed: 1000,
			transitionEffect: 'fade',
			sequenceMode: 'normal',
			buttonPrev: '#prev',
			buttonNext: '#next',
			pagination: '#nav',
			anchoring: 'left center',
			anchoringImg: 'left center'
		});
		
	});
</script>
<script type="text/javascript" src="main.js"></script>
</head>
<body>
<div id="header">
  <div class="clear-box">
        <div class="left">
	</div>
        <div class="right">
          <ul id="mini-navi">
		<li><a href="access.php#a2"><img src="img/mini-navi_1.gif" alt="現地案内図" width="92" height="14" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/corprateprofile.php" target="_blank"><img src="img/mini-navi_2.gif" alt="会社概要" width="77" height="14" /></a></li>
		<li><a href="https://www.starmica-r.co.jp/mizonokuchi/contactus.php" target="_blank"><img src="img/mini-navi_3.gif" alt="資料請求" width="69" height="14" /></a></li>
          </ul>
          
        </div>

  </div>
  <!--/box-->
</div>
<!--/header-->
<div id="page" style="">
	<div id="top-main-area">
		<h2>
		<div id="globalnavi">
				   <ul>
				    <li><a href="concept.php"><img src="img/globalnavi_1.gif" alt="コンセプト" /></a></li>
				    <li><a href="masterplan.php"><img src="img/globalnavi_2.gif" alt="全体計画" /></a></li>
				    <li><a href="location.php"><img src="img/globalnavi_3.gif" alt="溝ノ口エリア" /></a></li>
				    <li><a href="plan.php"><img src="img/globalnavi_4.gif" alt="プラン" /></a></li>
				    <li><a href="equipment.php"><img src="img/globalnavi_5.gif" alt="構造・設備仕様" /></a></li>
				    <li><a href="access.php"><img src="img/globalnavi_6.gif" alt="案内図" /></a></li>
				    <li><a href="outline.php"><img src="img/globalnavi_7.gif" alt="物件概要" /></a></li>
				    <li><a href="https://www.starmica-r.co.jp/mizonokuchi/contactus.php"><img src="img/globalnavi_8_on.gif" alt="資料請求" /></a></li>
				  </ul>
		</div>
		<!--/globalnavi-->
		</h2>
	</div>
	<!--/top-main-area-->


</div>
<div id="footer">
  <div class="item2">
	    <div class="footer-banner">
	          <center><a href="itou.php"><img src="img/jissekisyoukai.jpg" alt="一棟リノベーション紹介＋実績" /></a>
		<a href="http://www.shiawase.starmica-r.co.jp/"" target="_blank"><img src="img/siawase_logo.jpg" alt="しあわせリノベ研究所" /></a>
		<a href="http://www.starmica-r.co.jp/" target="_blank"><img src="img/re_logo.jpg" alt="しあわせリノベ研究所" /></a>
	         </center>
	    </div>
	    <!--footer-banner-->
	    <div class="clear-box">
	    <ul>
	        <li class="first"><a href="index.php">ホーム</a></li>
	        <li><a href="access.php">現地案内図</a></li>
	        <li><a href="https://www.starmica-r.co.jp/mizonokuchi/contactus.php">資料請求</a></li>
	        <li><a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">個人情報保護方針</a></li>
	        <li><a href="http://www.starmica-r.co.jp/corprateprofile.php" target="_blank">会社概要</a></li>
	    </ul>
	    </div>
	    <!--clear-box-->
	    <p class="copy">Copyright &copy; STAR MICA Residence Co.,Ltd. All rights reserved.</p>
  </div>
  <!--item-->

</div>
<!--/footer-->
