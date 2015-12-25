<?php
function user_header($HTMLTITLE,$currentmenu){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="ステラガーデン武蔵小金井,STELLA　GARDEN,マンション,中古マンション,分譲マンション,武蔵小金井," />
<meta name="Description" content="ステラガーデン武蔵小金井は、中古マンション販売専門のスター・マイカ・レジデンスがおすすめするマンション物件です。" />
<title><?=$HTMLTITLE?></title>
<link rel="stylesheet" type="text/css" media="all" href="css/import.css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<body>
<div id="header">
  <div class="clear-box">
        <div class="header-top">
    		<div class="header-copy">JR中央本線「東小金井」駅徒歩14分</div>
	</div>
        <div class="left">
    		<h1><a href="index.php"><img src="img/logo.png" alt="ステラガーデン武蔵小金井" width="218" height="42" /></a></h1>
	</div>
        <div class="right">
          <ul id="mini-navi">
		<li><a href="access.php#map"><img src="img/mininavi_1.gif" alt="現地案内図" width="80" height="16" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/corprateprofile.php" target="_blank"><img src="img/mininavi_2.gif" alt="会社情報" width="80" height="16" /></a></li>
          </ul>
          <div class="contact">
	         <a href="contactus.php"><img src="img/header-toiawase.jpg" alt="お問い合わせ・資料請求" width="183" height="31" /></a>
          </div>
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
    <li><a href="index.php"><img src="img/globalnavi_1_on.gif" alt="ホーム" width="150" height="39" /></a></li>
<?php
	}
	else{
?>
    <li><a href="index.php"><img src="img/globalnavi_1.gif" alt="ホーム" width="150" height="39" /></a></li>
<?php
	}
	if($currentmenu == '2'){
?>
    <li><a href="#"><img src="img/globalnavi_2_on.gif" alt="間取り" width="150" height="39" /></a></li>
<?php
	}
	else{
?>
    <li><a href="#"><img src="img/globalnavi_2.gif" alt="間取り" width="150" height="39" /></a></li>
<?php
	}
	if($currentmenu == '3'){
?> 
    <li><a href="#"><img src="img/globalnavi_3_on.gif" alt="設備・仕様" width="150" height="39" /></a></li>
<?php
	}
	else{
?>
    <li><a href="#"><img src="img/globalnavi_3.gif" alt="設備・仕様" width="150" height="39" /></a></li>
<?php
	}
	if($currentmenu == '4'){
?>
    <li><a href="#"><img src="img/globalnavi_4_on.gif" alt="アクセス" width="150" height="39" /></a></li>
<?php
	}
	else{
?>
    <li><a href="#"><img src="img/globalnavi_4.gif" alt="アクセス" width="150" height="39" /></a></li>
<?php
	}
	if($currentmenu == '5'){
?>      
    <li><a href="#"><img src="img/globalnavi_5_on.gif" alt="周辺環境" width="150" height="39" /></a></li>
<?php
	}
	else{
?>
    <li><a href="#"><img src="img/globalnavi_5.gif" alt="周辺環境" width="150" height="39" /></a></li>
<?php
	}
	if($currentmenu == '6'){
?> 
    <li><a href="gaiyou.php"><img src="img/globalnavi_6_on.gif" alt="物件概要" width="150" height="39" /></a></li>
<?php
	}
	else{
?>
    <li><a href="gaiyou.php"><img src="img/globalnavi_6.gif" alt="物件概要" width="150" height="39" /></a></li>
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
