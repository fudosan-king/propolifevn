<?php
function user_header_top($HTMLTITLE,$currentmenu){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="マンション,中古マンション,分譲マンション" />
<meta name="Description" content="ニューライフ西早稲田は、西早稲田駅・高田馬場駅 4駅6路線が利用可能なマンションです。｜中古マンション購入の相談なら、スター・マイカ・レジデンスへ" />
<title><?=$HTMLTITLE?></title>
<link rel="stylesheet" type="text/css" media="all" href="css/import.css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<script type="text/javascript" src="js/easySlider1.7.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true,
				speed: 800,        // スクロールスピード設定
				pause: 2800,        // 表示時間設定 
				continuous: true, 

			});
		});	
	</script>
</head>
<body>
<div id="header">
  <div class="clear-box">
        <div class="left">
    		<h1><a href="index.php"><img src="img/header_logo.gif" alt="ニューライフ西早稲田" width="303" height="77" /></a></h1>
	</div>
        <div class="right">
          <ul id="mini-navi">
		<li><a href="access.php#a2"><img src="img/mininavi_1.gif" alt="現地案内図" width="97" height="16" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/corprateprofile.php" target="_blank"><img src="img/mininavi_2.gif" alt="会社情報" width="77" height="16" /></a></li>
          </ul>
          <div class="phone"><a href="https://www.starmica-r.co.jp/nishiwaseda/contactus.php"><img src="img/toiawase.gif" alt="お問い合わせ・資料請求" width="227" height="36" /></a></div>
        </div>

  </div>
  <!--/box-->
</div>
<!--/header-->

<?php
}
?>
<?php
function user_header($HTMLTITLE,$currentmenu){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="マンション,中古マンション,分譲マンション" />
<meta name="Description" content="ニューライフ西早稲田は、西早稲田駅・高田馬場駅 4駅6路線が利用可能なマンションです。｜中古マンション購入の相談なら、スター・マイカ・レジデンスへ" />
<title><?=$HTMLTITLE?></title>
<link rel="stylesheet" type="text/css" media="all" href="css/import.css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
</head>
<body>
<div id="header">
  <div class="clear-box">
        <div class="left">
    		<h1><a href="index.php"><img src="img/header_logo.gif" alt="ニューライフ西早稲田" width="303" height="77" /></a></h1>
	</div>
        <div class="right">
          <ul id="mini-navi">
		<li><a href="access.php#a2"><img src="img/mininavi_1.gif" alt="現地案内図" width="97" height="16" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/corprateprofile.php" target="_blank"><img src="img/mininavi_2.gif" alt="会社情報" width="77" height="16" /></a></li>
          </ul>
          <div class="phone"><a href="https://www.starmica-r.co.jp/nishiwaseda/contactus.php"><img src="img/toiawase.gif" alt="お問い合わせ・資料請求" width="227" height="36" /></a></div>
        </div>

  </div>
  <!--/box-->
</div>
<!--/header-->

<?php
}
?>

<?php
function user_globalnavi($currentmenu){
?>

<div id="globalnavi">
   <ul>
<?php
	if($currentmenu == '1'){
?>
    <li><a href="index.php"><img src="img/globalnavi_1_on.gif" alt="ホーム" width="150" height="40" /></a></li>
<?php
	}
	else{
?>
    <li><a href="index.php"><img src="img/globalnavi_1.gif" alt="ホーム" width="150" height="40" /></a></li>
<?php
	}
	if($currentmenu == '2'){
?>
    <li><a href="concept.php"><img src="img/globalnavi_2_on.gif" alt="コンセプト" width="150" height="40" /></a></li>
<?php
	}
	else{
?>
    <li><a href="concept.php"><img src="img/globalnavi_2.gif" alt="コンセプト" width="150" height="40" /></a></li>
<?php
	}
	if($currentmenu == '3'){
?>
    <li><a href="syuhen.php"><img src="img/globalnavi_3_on.gif" alt="周辺環境" width="150" height="40" /></a></li>
<?php
	}
	else{
?>
    <li><a href="syuhen.php"><img src="img/globalnavi_3.gif" alt="周辺環境" width="150" height="40" /></a></li>
<?php
	}
	if($currentmenu == '4'){
?>      
    <li><a href="madori.php"><img src="img/globalnavi_4_on.gif" alt="間取り" width="150" height="40" /></a></li>
<?php
	}
	else{
?>
    <li><a href="madori.php"><img src="img/globalnavi_4.gif" alt="間取り" width="150" height="40" /></a></li>
<?php
	}
	if($currentmenu == '5'){
?> 
    <li><a href="access.php"><img src="img/globalnavi_5_on.gif" alt="アクセス" width="150" height="40" /></a></li>
<?php
	}
	else{
?>
    <li><a href="access.php"><img src="img/globalnavi_5.gif" alt="アクセス" width="150" height="40" /></a></li>
<?php
	}
	if($currentmenu == '6'){
?> 
    <li><a href="gaiyou.php"><img src="img/globalnavi_6_on.gif" alt="物件概要" width="150" height="40" /></a></li>
<?php
	}
	else{
?>
    <li><a href="gaiyou.php"><img src="img/globalnavi_6.gif" alt="物件概要" width="150" height="40" /></a></li>
<?php
	}
?> 
      </ul>
</div>
<!--/globalnavi-->

<?php
}
?>


<?php
function user_footer(){
?>
<div id="footer">
  <div class="item2">
	    <div class="clear-box">
	    <ul>
	         <li class="first"><a href="index.php">ホーム</a></li>
	        <li><a href="access.php">現地案内図</a></li>
	        <li><a href="gaiyou.php">物件概要</a></li>
	        <li><a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">個人情報保護方針</a></li>
	        <li><a href="https://www.starmica-r.co.jp/nishiwaseda/contactus.php">お問い合わせ</a></li>
	    </ul>
	    <p class="copy">Copyright &copy; STAR MICA Residence Co.,Ltd. All rights reserved.</p>
	    </div>
	    <!--clear-box-->
	    <div class="footer-banner">
	          <ol>
			<li><a href="http://www.starmica-r.co.jp/" target="_blank"><img src="img/resi_logo.gif" alt="スター・マイカ・レジデンス株式会社" width="300" height="62" /></a></li>
			<li><a href="http://www.starmica.co.jp/" target="_blank"><img src="img/mica_logo.gif" alt="スター・マイカ株式会社" width="260" height="62" /></a></li>
			<li><a href="http://www.shiawase.starmica-r.co.jp/" target="_blank"><img src="img/shiawase_logo.jpg" alt="しあわせリノベ研究所" width="192" height="73" /></a></li>
	           </ol>
	    </div>
	    <!--clear-box-->

  </div>
  <!--item-->

</div>
<!--/footer-->
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
