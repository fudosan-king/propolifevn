<?php

require_once("design.php");

$HTMLTITLE ="ステラガーデン武蔵小金井｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="ステラガーデン武蔵小金井,STELLA　GARDEN,マンション,中古マンション,分譲マンション,武蔵小金井," />
<meta name="Description" content="ステラガーデン武蔵小金井は、中古マンション販売専門のスター・マイカ・レジデンスがおすすめするマンション物件です。" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title><?=$HTMLTITLE?></title>
<link rel="stylesheet" type="text/css" media="all" href="css/import.css" />
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.bgswitcher.js"></script>
</head>
<body class="topmain">
<div class="topmaincontents">
	<div id="header2">
	        <div class="header-top">
	    		<div class="header-copy">JR中央本線「東小金井」駅徒歩14分</div>
		</div>
		<div class="clear-box">
		        <div class="left">
		    		<h1><a href="index.php"><img src="img/headerlogo.png" alt="ステラガーデン武蔵小金井" width="243" height="50"/></a></h1>
			</div>
        		<div class="right">
				<div id="globalnavi-top">
				   <ul>
				<?php
					if($currentmenu == '1'){
				?>
				    <li><a href="index.php"><img src="img/globalnavi_top1_on.png" alt="ホーム" width="90" height="35" /></a></li>
				<?php
					}
					else{
				?>
				    <li><a href="index.php"><img src="img/globalnavi_top1.png" alt="ホーム" width="90" height="35" /></a></li>
				<?php
					}
					if($currentmenu == '2'){
				?>
				    <li><a href="#"><img src="img/globalnavi_top2_on.png" alt="間取り" width="90" height="35" /></a></li>
				<?php
					}
					else{
				?>
				    <li><a href="#"><img src="img/globalnavi_top2.png" alt="間取り" width="90" height="35" /></a></li>
				<?php
					}
					if($currentmenu == '3'){
				?> 
				    <li><a href="#"><img src="img/globalnavi_top3_on.png" alt="設備・仕様" width="127" height="35" /></a></li>
				<?php
					}
					else{
				?>
				    <li><a href="#"><img src="img/globalnavi_top3.png" alt="設備・仕様" width="127" height="35" /></a></li>
				<?php
					}
					if($currentmenu == '4'){
				?>
				    <li><a href="#"><img src="img/globalnavi_top4_on.png" alt="アクセス" width="90" height="35" /></a></li>
				<?php
					}
					else{
				?>
				    <li><a href="#"><img src="img/globalnavi_top4.png" alt="アクセス" width="90" height="35" /></a></li>
				<?php
					}
					if($currentmenu == '5'){
				?>      
				    <li><a href="#"><img src="img/globalnavi_top5_on.png" alt="周辺環境" width="114" height="35" /></a></li>
				<?php
					}
					else{
				?>
				    <li><a href="#"><img src="img/globalnavi_top5.png" alt="周辺環境" width="114" height="35" /></a></li>
				<?php
					}
					if($currentmenu == '6'){
				?> 
				    <li><a href="gaiyou.php"><img src="img/globalnavi_top6_on.png" alt="物件概要" width="114" height="35" /></a></li>
				<?php
					}
					else{
				?>
				    <li><a href="gaiyou.php"><img src="img/globalnavi_top6.png" alt="物件概要" width="114" height="35" /></a></li>
				<?php
					}
				?>
				      </ul>
				</div>
				<!--/globalnavi-->
       			</div>
		</div>
		<!--/box-->
	</div>
	<!--/header-->
</div>
<div id="top">
  <div id="wrapper">
    <div id="container">
	<div class="content-info">
		<div class="infoarea">
			<a href="plan.php"><img src="img/top-info.jpg" alt="" width="900" height="90"/></a>
		</div>
	</div>
      <div id="content">
        <div class="sec1 bottom-30">
		<div class="news">
			<div class="top-40">
				<h4><img src="img/infomation.png" alt="インフォメーション" width="166" height="24" class="top-30"/></h4>
			</div>
			<dl>
	                <dt><span>2015.12.25</span></dt>
	                <dd>
				<p class="bottom-10">
					<font class="style13">ホームページをオープンしました。2016年1月下旬公開予定 !!</font>
				</p>
			</dd>
	              </dl>
	        </div>
	        <!--/news-->
		<div class="top-40">
			<a href="contactus.php"><center><img src="img/toiawase.jpg" alt="お問い合わせ" width="405" height="50" class="bottom-30" /></center></a>
		</div>

        </div>
        <!--/sec1-->
      </div>
      <!--/content-->
      <hr />

	<div class="content-banner">
		<ul>
		<li><a href="itou.php"><img src="img/banner-itou.gif" alt="" width="250" height="74" /></a></li>
		<li><a href="http://www.shiawase.starmica-r.co.jp/" target="_blank"><img src="img/banner-shiawase.gif" alt="" width="215" height="74" /></a></li>
		<li><a href="http://www.starmica.co.jp/renopica/" target="_blank"><img src="img/banner-renopica.gif" alt="" width="215" height="74" /></a></li>
		<li class="tail"><a href="http://ameblo.jp/renopica-starmica/" target="_blank"><img src="img/banner-bloge.gif" alt="" width="196" height="74" /></a></li>
		</ul>
	</div>

    </div>
    <!--/container-->
  </div>
  <!--/wrapper-->
</div>
<!--/top-->
<hr />
<div id="footer">
  <div class="item2">
  	<div class="item3">
	    <div class="clear-box">
	    <ul>
	        <li class="first"><a href="index.php">ホーム</a></li>
	        <li><a href="access.php#map">現地案内図</a></li>
	        <li><a href="gaiyou.php">物件概要</a></li>
	        <li><a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">個人情報保護方針</a></li>
	        <li><a href="contactus.php">お問い合わせ</a></li>
	    </ul>
	    <p class="copy">Copyright &copy; STAR MICA Residence Co.,Ltd. All rights reserved.</p>
	    </div>
	    <!--clear-box-->
	    <div class="footer-banner">
	          <ol>
			<li><a href="http://www.starmica-r.co.jp/" target="_blank"><img src="img/resi_logo2.gif" alt="スター・マイカ・レジデンス株式会社" width="319" height="51" /></a></li>
			<li><a href="http://www.starmica.co.jp/" target="_blank"><img src="img/mica_logo2.gif" alt="スター・マイカ株式会社" width="260" height="51" /></a></li>
			<li><img src="img/freecall.gif" alt="フリーコール" width="273" height="51" /></li>
	           </ol>
	    </div>
	    <!--clear-box-->
 	 </div>
  </div>
  <!--item-->

</div>
<!--/footer-->
<script type="text/javascript">
$(document).ready(function(){
  $(".topmaincontents").bgswitcher({
    images: [
	"./img/mainimg01.jpg",
	"./img/mainimg02.jpg"
	],
	effect: "drop",
	easing: "swing",
	loop: true
  });
});
</script>
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
