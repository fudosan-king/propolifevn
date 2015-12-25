<?php
if($_POST['e_toiawasekoumoku']){
	$e_toiawasekoumoku = htmlspecialchars($_POST['e_toiawasekoumoku'], ENT_QUOTES);
}
if($_POST['e_kiboubi']){
	$e_kiboubi = htmlspecialchars($_POST['e_kiboubi'], ENT_QUOTES);
}
if($_POST['e_kiboutime']){
	$e_kiboubi = htmlspecialchars($_POST['e_kiboutime'], ENT_QUOTES);
}
if($_POST['e_question']){
	$e_question = htmlspecialchars($_POST['e_question'], ENT_QUOTES);
}
if($_POST['e_name']){
	$e_name = htmlspecialchars($_POST['e_name'], ENT_QUOTES);
}
if($_POST['e_namekana']){
	$e_namekana = htmlspecialchars($_POST['e_namekana'], ENT_QUOTES);
}
if($_POST['e_mail']){
	$e_mail = htmlspecialchars($_POST['e_mail'], ENT_QUOTES);
}
if($_POST['e_mail2']){
	$e_mail2 = htmlspecialchars($_POST['e_mail2'], ENT_QUOTES);
}
if($_POST['e_yubin']){
	$e_yubin = htmlspecialchars($_POST['e_yubin'], ENT_QUOTES);
}
if($_POST['e_address']){
	$e_address = htmlspecialchars($_POST['e_address'], ENT_QUOTES);
}
if($_POST['e_tel']){
	$e_tel = htmlspecialchars($_POST['e_tel'], ENT_QUOTES);
}
if($_POST['e_fax']){
	$e_fax = htmlspecialchars($_POST['e_fax'], ENT_QUOTES);
}
if($_POST['e_birthday']){
	$e_birthday = htmlspecialchars($_POST['e_birthday'], ENT_QUOTES);
}
if($_POST['e_sumai']){
	$e_sumai = htmlspecialchars($_POST['e_sumai'], ENT_QUOTES);
}
if($_POST['e_sagashi']){
	$e_sagashi = htmlspecialchars($_POST['e_sagashi'], ENT_QUOTES);
}
if($_POST['e_kikkake']){
	$e_kikkake= htmlspecialchars($_POST['e_kikkake'], ENT_QUOTES);
}
if($_POST['e_melmaga']){
	$e_melmaga = htmlspecialchars($_POST['e_melmaga'], ENT_QUOTES);
}
if($_POST['sendconfo'] OR $_POST['sendgo']){

	if($_POST['e_toiawasekoumoku']){
		$e_toiawasekoumoku = htmlspecialchars($_POST['e_toiawasekoumoku'], ENT_QUOTES);

		//数字チェック
		$check_answer = ereg("^[0-9]+$",$e_toiawasekoumoku);
		if($check_answer ==0){
			$e_toiawasekoumoku_msg = "お問い合わせ項目の入力が正しくないようです。";
			$errorflag = 1;
		}
	}
	else{
		$e_toiawasekoumoku_msg = "お問い合わせ項目を入力してください。";
		$errorflag = 1;
	}
	if($_POST['e_kiboubi']){
		$e_kiboubi = htmlspecialchars($_POST['e_kiboubi'], ENT_QUOTES);

		//数字チェック
		$check_answer = ereg("^[0-9]+$",$e_kiboubi);
		if($check_answer ==0){
			$e_kiboubi_msg = "希望日の入力が正しくないようです。";
			$errorflag = 1;
		}
	}
	else{
		if($e_toiawasekoumoku == 1){
			$e_kiboubi_msg = "希望日を入力してください。";
			$errorflag = 1;
		}
	}
	if($_POST['e_kiboutime']){
		$e_kiboutime = htmlspecialchars($_POST['e_kiboutime'], ENT_QUOTES);

		//数字チェック
		$check_answer = ereg("^[0-9]+$",$e_kiboutime);
		if($check_answer ==0){
			$e_kiboutime_msg = "希望時間の入力が正しくないようです。";
			$errorflag = 1;
		}
	}
	else{
		if($e_toiawasekoumoku == 1){
			$e_kiboutime_msg = "希望時間を入力してください。";
			$errorflag = 1;
		}
	}
	if($_POST['e_question']){
		$e_question = htmlspecialchars($_POST['e_question'], ENT_QUOTES);
		//600字制限
		$count_id = strlen($e_question);
		if($count_id > 1200){
			$e_question_msg = "お問い合わせ内容は600文字以内で入力してください。";
			$errorflag = 1;
		}
		$e_question_h = nl2br($e_question);
	}
	if($_POST['e_name']){
		$e_name = htmlspecialchars($_POST['e_name'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_name);
		if($count_id > 100){
			$e_name_msg = "お名前は50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_name_msg = "お名前のご入力をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_namekana']){
		$e_namekana = htmlspecialchars($_POST['e_namekana'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_namekana);
		if($count_id > 100){
			$e_namekana_msg = "フリガナは50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_namekana_msg = "フリガナのご入力をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_mail']){
		$e_mail = htmlspecialchars($_POST['e_mail'], ENT_QUOTES);
		if( preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i', $e_mail)){
			//文字数
			//60文字以内
			$count_id = strlen($e_mail);
			if($count_id > 60){
//				$e_mail_msg = "メールアドレスが登録できないメールアドレスです。";
//				$errorflag = 1;
			}
		}
		else{
//			$e_mail_msg = "メールアドレスが登録できないメールアドレスです。";
//			$errorflag = 1;
		}
	}
	else{
//		$e_mail_msg = "メールアドレスのご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_mail2']){
		$e_mail2 = htmlspecialchars($_POST['e_mail2'], ENT_QUOTES);
		if($e_mail2 != $e_mail){
//			$e_mail_msg = "メールアドレスの入力が間違っています。";
//			$errorflag = 1;
		}
	}
	else{
//		$e_mail2_msg = "メールアドレスのご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_yubin']){
		$e_yubin = htmlspecialchars($_POST['e_yubin'], ENT_QUOTES);
	}
	else{
//		$e_yubin_msg = "郵便番号のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_address']){
		$e_address = htmlspecialchars($_POST['e_address'], ENT_QUOTES);
	}
	else{
//		$e_address_msg = "ご住所のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_tel']){
		$e_tel = htmlspecialchars($_POST['e_tel'], ENT_QUOTES);

			$e_tel = ereg_replace("ー", "-", "$e_tel");
			$e_tel = ereg_replace("－", "-", "$e_tel");
			$e_tel = ereg_replace("―", "-", "$e_tel");

			$e_tel_check = ereg_replace("-", "", "$e_tel");
			//半角数字
			if( ereg("^[0-9]+$",$e_tel_check)){
			
			}
			else{
				$e_tel_msg = "電話番号は半角数字と「-」（ハイフン）のみで入力してください。";
				$errorflag = 1;
			}
	}
	else{
		$e_tel_msg = "電話番号のご入力をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_fax']){
		$e_fax = htmlspecialchars($_POST['e_fax'], ENT_QUOTES);

			$e_fax = ereg_replace("ー", "-", "$e_fax");
			$e_fax = ereg_replace("－", "-", "$e_fax");
			$e_fax = ereg_replace("―", "-", "$e_fax");

			$e_fax_check = ereg_replace("-", "", "$e_fax");
			//半角数字
			if( ereg("^[0-9]+$",$e_fax_check)){
			
			}
			else{
				$e_fax_msg = "FAX番号は半角数字と「-」（ハイフン）のみで入力してください。";
				$errorflag = 1;
			}
	}
	if($_POST['e_birthday']){
		$e_birthday = htmlspecialchars($_POST['e_birthday'], ENT_QUOTES);
		$e_birthday_db = ereg_replace("/", "-", $e_birthday);
		$day_check = ereg("^1([0-9]){3}/([0-1])([0-9])/([0-3])([0-9])$","$e_birthday");
		if($day_check ==0){
//			$e_birthday_msg = "生年月日の入力が間違っております。";
//			$errorflag = 1;
		}
		else{
			//1文字目～4文字抽出　年
			$e_birthday_db_y = substr($e_birthday_db, 0,4);
			//6文字目～2文字抽出　月
			$e_birthday_db_m = substr($e_birthday_db, 5,2);
			//9文字目～2文字抽出　日
			$e_birthday_db_d = substr($e_birthday_db, 8,2);
			$day_check2 = checkdate("$e_birthday_db_m", "$e_birthday_db_d", "$e_birthday_db_y");
			if($day_check2 ==FALSE){
//				$e_birthday_msg = "生年月日の入力が間違っております。";
//				$errorflag = 1;
			}
		}
	}
	else{
//		$e_birthday_msg = "生年月日の入力をお願いします。";
//		$errorflag = 1;
	}
	if($_POST['e_sumai']){
		$e_sumai = htmlspecialchars($_POST['e_sumai'], ENT_QUOTES);
	}
	else{
//		$e_sumai_msg = "お住まいのご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_sagashi']){
		$e_sagashi = htmlspecialchars($_POST['e_sagashi'], ENT_QUOTES);
		if($e_sagashi == 'k'){
//			$e_sagashi_msg = "物件お探し状況のご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
	else{
//		$e_sagashi_msg = "物件お探し状況のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_kikkake']){
		$e_kikkake= htmlspecialchars($_POST['e_kikkake'], ENT_QUOTES);
		if($e_kikkake == 'k'){
//			$e_kikkake_msg = "何をご覧頂いて当HPをお知りになったかのご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
	else{
//		$e_kikkake_msg = "何をご覧頂いて当HPをお知りになったかのご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_melmaga']){
		$e_melmaga = htmlspecialchars($_POST['e_melmaga'], ENT_QUOTES);
	}
	else{
//		$e_melmaga_msg = "販売情報をいち早くメールでお届けのご入力をお願いいたします。";
//		$errorflag = 1;
	}


}

if($errorflag !=1 AND $_POST['sendconfo']){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="ステラレジデンス横浜,STELLA　RESIDENCE,マンション,中古マンション,分譲マンション,JR東海道本線,JR京浜東北線,JR横浜線,JR根岸線,JR横須賀線,JR湘南新宿ライン,京急本線,東急東横線,みなとみらい線,相鉄本線,横浜市営ブルーライン" />
<meta name="Description" content="ステラレジデンス横浜は、中古マンション販売専門のスター・マイカ・レジデンスがおすすめするマンション物件です。" />
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
        <div class="header-top">
    		<div class="header-copy">JR横浜線「横浜」駅徒歩10分・京浜急行「神奈川」駅徒歩2分</div>
	</div>
        <div class="left">
    		<h1><a href="index.php"><img src="img/logo.png" alt="ステラレジデンス横浜" width="273" height="40" /></a></h1>
	</div>
        <div class="right">
          <ul id="mini-navi">
		<li><a href="http://www.starmica-r.co.jp/yokohama/access.php#map"><img src="img/mininavi_1.gif" alt="現地案内図" width="80" height="16" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/corprateprofile.php" target="_blank"><img src="img/mininavi_2.gif" alt="会社情報" width="80" height="16" /></a></li>
          </ul>
          <ul class="link">
	          <li><a href="http://www.fan-invest.co.jp/yokohamachintai/index.php" target="_blank"><img src="img/header-toiawase2.jpg" alt="賃貸をお考えの方はこちら" width="193" height="41" /></a></li>
	          <li><a href="https://www.starmica-r.co.jp/yokohama/contactus.php"><img src="img/header-toiawase.jpg" alt="お問い合わせ・資料請求" width="193" height="41" /></a></li>
          </ul>
        </div>
  </div>
  <!--/box-->
</div>
<!--/header-->

<div id="globalnavi">
   <ul>
    <li><a href="http://www.starmica-r.co.jp/yokohama/index.php"><img src="img/globalnavi_1.gif" alt="ホーム" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/plan.php"><img src="img/globalnavi_2.gif" alt="間取り" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/equipment.php"><img src="img/globalnavi_3.gif" alt="設備・仕様" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/access.php"><img src="img/globalnavi_4.gif" alt="アクセス" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/location.php"><img src="img/globalnavi_5.gif" alt="周辺環境" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/gaiyou.php"><img src="img/globalnavi_6.gif" alt="物件概要" width="150" height="39" /></a></li>
   </ul>
</div>
<!--/globalnavi-->
<hr />
<div id="bukken" class="page1">
  <div id="wrapper">
    <div id="title-area900">
      <div id="bread-crumb">
        <ul>
          <li><a href="http://www.starmica-r.co.jp/yokohama/index.php">ホーム</a></li>
          <li class="arrow">資料請求・お問い合わせ</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->
    <div id="container900">
	<div class="title"><img src="img/pagetitle7.png" alt="お問い合わせ" width="163" height="163" /></div>

      <div id="content900">
        <div class="sec1 bottom-20">
          <div class="indent-area">
           <p class="bottom-15 top-10">
            <b>ご入力いただいた内容をご確認の上、送信ボタンをクリックしてください。</b></p>
          </div>
          <!--/indent-area-->
           <p class="bottom-20">
					<FORM enctype="multipart/form-data" id="formid" action="contactus.php" method="post" name="myform">
					<table cellpadding="0" cellspacing="0" width="870" border="0">
					<tr> 
					<td width="340" class="tb2-b">
					お問い合わせ内容<span class="style7">※</span></td>
					<td width="600" class="tb2">
<?php
	if($e_toiawasekoumoku == 1){
		print"内覧予約";
	}
	elseif($e_toiawasekoumoku == 2){
		print"資料請求";
	}
	elseif($e_toiawasekoumoku == 3){
		print"その他";
	}
?>
					</td>
					</tr>
<?php
					if($e_toiawasekoumoku == 1){
?>
					<tr> 
					<td width="340" class="tb2-b"> 
					希望日<span class="style7">※</span></td>
					<td width="600" class="tb2">
<?php
	if($e_kiboubi == 1){
		print"2/28(土)";
	}
	elseif($e_kiboubi == 2){
		print"3/1(日)";
	}
	elseif($e_kiboubi == 3){
		print"3/7(土)";
	}
	elseif($e_kiboubi == 4){
		print"3/8(日)";
	}
?>
					</td>
					</tr>

					<tr> 
					<td width="340" class="tb2-b"> 
					希望時間<span class="style7">※</span></td>
					<td width="600" class="tb2">
<?php
	if($e_kiboutime == 1){
		print"11：00～";
	}
	elseif($e_kiboutime == 2){
		print"12：30～";
	}
	elseif($e_kiboutime == 3){
		print"14：00～";
	}
	elseif($e_kiboutime == 4){
		print"15：30～";
	}
?>
					</td>
					</tr>
<?php
					}
					if($e_toiawasekoumoku == 3){
?>
					<tr> 
					<td width="340" class="tb2-b"> 
					お問い合わせ内容</td>
					<td width="600" class="tb2">
					<?=$e_question?>
					</td>
					</tr>
<?php
					}
?>
					<tr> 
					<td width="340" class="tb2-b"> 
					お名前<span class="style7">※</span></td>
					<td width="600" class="tb2">
					<?=$e_name?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b"> 
					フリガナ<span class="style7">※</span></td>
					<td width="600" class="tb2">
					<?=$e_namekana?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					メールアドレス</td>
					<td width="600" class="tb2">
					<?=$e_mail?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					郵便番号</td>
					<td width="600" class="tb2">
					<?=$e_yubin?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					ご住所</td>
					<td width="600" class="tb2">
					<?=$e_address?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					電話番号<span class="style7">※</span></td>
					<td width="600" class="tb2">
					<?=$e_tel?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					FAX番号</td>
					<td width="600" class="tb2">
					<?=$e_fax?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					生年月日</td>
					<td width="600" class="tb2">
					<?=$e_birthday?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					現在のお住まい</td>
					<td width="600" class="tb2">
<?php
	if($e_sumai == 1){
		print"賃貸マンション";
	}
	elseif($e_sumai == 2){
		print"賃貸戸建";
	}
	elseif($e_sumai == 3){
		print"自己所有マンション";
	}
	elseif($e_sumai == 4){
		print"自己所有戸建";
	}
	elseif($e_sumai == 5){
		print"その他";
	}
?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					物件お探し状況</td>
					<td width="600" class="tb2">
<?php
			if($e_sagashi == 1){
				print"良い物件があればすぐに購入したい";
			}
			elseif($e_sagashi == 2){
				print"１年以内には購入したい";
			}
			elseif($e_sagashi == 3){
				print"今すぐではないが、いずれは購入したい";
			}
			elseif($e_sagashi == 4){
				print"現在住んでいるところを売却して買い替えたい";
			}
?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					何をご覧頂いて<br>当HPをお知りになりましたか？</td>
					<td width="600" class="tb2">
<?php
	if($e_kikkake == 1){
		print"YAHOO！不動産";
	}
	elseif($e_kikkake == 2){
		print"SUUMO";
	}
	elseif($e_kikkake == 3){
		print"HOME'S";
	}
	elseif($e_kikkake == 4){
		print"アットホーム";
	}
	elseif($e_kikkake == 5){
		print"スター・マイカ・レジデンス　ホームページ";
	}
	elseif($e_kikkake == 6){
		print"その他インターネットサイト";
	}
	elseif($e_kikkake == 7){
		print"新聞折込広告";
	}
	elseif($e_kikkake == 8){
		print"ポストに投函されていた広告";
	}
	elseif($e_kikkake == 9){
		print"知人・友人等の紹介";
	}
	elseif($e_kikkake == 10){
		print"街頭配布チラシ";
	}
	elseif($e_kikkake == 11){
		print"その他";
	}
?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					販売情報をいち早くメールで<br>お届けしております。<br>メールを希望されますか？</td>
					<td width="600" class="tb2">
<?php
	if($e_melmaga == 1){
		print"希望する";
	}
	elseif($e_melmaga == 2){
		print"希望しない";
	}
?>
					</td>
					</tr>
					</table>
<br>
					<table width="870">
					<tr> 
					<td align="center" colspan="2" class="tb2-c"> 
					個人情報の取り扱いについて
					</td>
					</tr>
					<td align="center" colspan="2" class="tb2"> 
<center>当社の個人情報の取扱いについては<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank"><b>こちら</b></a>（別ウィンドウ）をご覧ください。<br>
上記<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank"><b>『個人情報の取り扱い』</b></a>の内容に同意される方は、下記<b> [同意して送信] </b>のボタンをクリックして下さい。</center>
					</td>
					</tr>
					<tr> 
					<td align="center" colspan="2" height="60"> 
					<input type="submit" name="sendgo" value="同意して送信">
					</td>
					</tr>
					</table>
			</p>
					<input type="hidden" name="e_toiawasekoumoku" value="<?=$e_toiawasekoumoku?>">
					<input type="hidden" name="e_kiboubi" value="<?=$e_kiboubi?>">
					<input type="hidden" name="e_kiboutime" value="<?=$e_kiboutime?>">
					<input type="hidden" name="e_question" value="<?=$e_question?>">
					<input type="hidden" name="e_name" value="<?=$e_name?>">
					<input type="hidden" name="e_namekana" value="<?=$e_namekana?>">
					<input type="hidden" name="e_mail" value="<?=$e_mail?>">
					<input type="hidden" name="e_mail2" value="<?=$e_mail2?>">
					<input type="hidden" name="e_yubin" value="<?=$e_yubin?>">
					<input type="hidden" name="e_address" value="<?=$e_address?>">
					<input type="hidden" name="e_birthday" value="<?=$e_birthday?>">
					<input type="hidden" name="e_tel" value="<?=$e_tel?>">
					<input type="hidden" name="e_fax" value="<?=$e_fax?>">
					<input type="hidden" name="e_sumai" value="<?=$e_sumai?>">
					<input type="hidden" name="e_sagashi" value="<?=$e_sagashi?>">
					<input type="hidden" name="e_kikkake" value="<?=$e_kikkake?>">
					<input type="hidden" name="e_melmaga" value="<?=$e_melmaga?>">
				</FORM>


          </div>
          <!--/indent-area-->
        </div>
        <!--/sec1-->

<!--/
        <div class="sec2 bottom-20">

          <h4 class="sub-title2"><span></span></h4>
        <p class="bottom-15">
sec1-->


        <p id="page-top"><a href="#header"><img src="img/base_pagetop.gif" alt="このページの先頭へ" width="115" height="13" /></a></p>
      </div>
      <!--/content-->

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
	        <li class="first"><a href="http://www.starmica-r.co.jp/yokohama/index.php">ホーム</a></li>
	        <li><a href="http://www.starmica-r.co.jp/yokohama/access.php#map">現地案内図</a></li>
	        <li><a href="http://www.starmica-r.co.jp/yokohama/gaiyou.php">物件概要</a></li>
	        <li><a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">個人情報保護方針</a></li>
	        <li><a href="https://www.starmica-r.co.jp/yokohama/contactus.php">お問い合わせ</a></li>
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
</body>
</html>


<?php
}
elseif($errmsg !=1 AND $_POST['sendgo']){
			if($e_toiawasekoumoku == 1){
				$e_toiawasekoumoku_h = "内覧予約";
			}
			elseif($e_toiawasekoumoku == 2){
				$e_toiawasekoumoku_h = "資料請求";
			}
			elseif($e_toiawasekoumoku == 3){
				$e_toiawasekoumoku_h = "その他";
			}

			if($e_kiboubi == 1){
				$e_kiboubi_h = "2/28(土)";
			}
			elseif($e_kiboubi == 2){
				$e_kiboubi_h = "3/1(日)";
			}
			elseif($e_kiboubi == 3){
				$e_kiboubi_h = "3/7(土)";
			}
			elseif($e_kiboubi == 4){
				$e_kiboubi_h = "3/8(日)";
			}

			if($e_kiboutime == 1){
				$e_kiboutime_h = "11：00～";
			}
			elseif($e_kiboutime == 2){
				$e_kiboutime_h = "12：30～";
			}
			elseif($e_kiboutime == 3){
				$e_kiboutime_h = "14：00～";
			}
			elseif($e_kiboutime == 4){
				$e_kiboutime_h = "15：30～";
			}

			if($e_sumai == 1){
				$e_sumai_h = "賃貸マンション";
			}
			elseif($e_sumai == 2){
				$e_sumai_h = "賃貸戸建";
			}
			elseif($e_sumai == 3){
				$e_sumai_h = "自己所有マンション";
			}
			elseif($e_sumai == 4){
				$e_sumai_h = "自己所有戸建";
			}
			elseif($e_sumai == 5){
				$e_sumai_h = "その他";
			}

			if($e_sagashi == 1){
				$e_sagashi_h = "良い物件があればすぐに購入したい";
			}
			elseif($e_sagashi == 2){
				$e_sagashi_h = "１年以内には購入したい";
			}
			elseif($e_sagashi == 3){
				$e_sagashi_h = "今すぐではないが、いずれは購入したい";
			}
			elseif($e_sagashi == 4){
				$e_sagashi_h = "現在住んでいるところを売却して買い替えたい";
			}

			if($e_kikkake == 1){
				$e_kikkake_h = "YAHOO！不動産";
			}
			elseif($e_kikkake == 2){
				$e_kikkake_h = "SUUMO";
			}
			elseif($e_kikkake == 3){
				$e_kikkake_h = "HOME'S";
			}
			elseif($e_kikkake == 4){
				$e_kikkake_h = "アットホーム";
			}
			elseif($e_kikkake == 5){
				$e_kikkake_h = "スター・マイカ・レジデンス　ホームページ";
			}
			elseif($e_kikkake == 6){
				$e_kikkake_h = "その他インターネットサイト";
			}
			elseif($e_kikkake == 7){
				$e_kikkake_h = "新聞折込広告";
			}
			elseif($e_kikkake == 8){
				$e_kikkake_h = "ポストに投函されていた広告";
			}
			elseif($e_kikkake == 9){
				$e_kikkake_h = "紹介";
			}
			elseif($e_kikkake == 10){
				$e_kikkakeu_h = "街頭配布チラシ";
			}
			elseif($e_kikkake == 11){
				$e_kikkake_h = "その他";
			}
			if($e_melmaga == 1){
				$e_melmaga_h = "希望する";
			}
			elseif($e_melmaga == 2){
				$e_melmaga_h = "希望しない";
			}

	//-----------------------------
	//応募者へのメール
	//-----------------------------
	$ouboto = "toiawase@starmica.co.jp";
	$oubosubject = "ステラレジデンス横浜ＨＰよりお問い合わせ";
if($e_toiawasekoumoku == 1){
	$oubomessage = <<<_EOT_
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
お問い合わせ送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信情報は以下の通りです。

■お問い合わせ項目：$e_toiawasekoumoku_h
■希望日	:$e_kiboubi_h   $e_kiboutime_h
■お名前	：$e_name
■フリガナ	：$e_namekana
■メールアドレス：$e_mail
■郵便番号	：$e_yubin
■ご住所	：$e_address
■電話番号	：$e_tel
■FAX番号	：$e_fax
■生年月日	：$e_birthday
■現在のお住まい：$e_sumai_h
■物件お探し状況：$e_sagashi_h
■HPをお知りになったきっかけ	：$e_kikkake_h
■メルマガ希望	：$e_melmaga_h

_EOT_;
}
elseif($e_toiawasekoumoku == 2){
	$oubomessage = <<<_EOT_
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
お問い合わせ送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信情報は以下の通りです。

■お問い合わせ項目：$e_toiawasekoumoku_h
■お名前	：$e_name
■フリガナ	：$e_namekana
■メールアドレス：$e_mail
■郵便番号	：$e_yubin
■ご住所	：$e_address
■電話番号	：$e_tel
■FAX番号	：$e_fax
■生年月日	：$e_birthday
■現在のお住まい：$e_sumai_h
■物件お探し状況：$e_sagashi_h
■HPをお知りになったきっかけ	：$e_kikkake_h
■メルマガ希望	：$e_melmaga_h

_EOT_;
}
else{
	$oubomessage = <<<_EOT_
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
お問い合わせ送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信情報は以下の通りです。

■お問い合わせ項目：$e_toiawasekoumoku_h
■お問い合わせ内容：$e_question
■お名前	：$e_name
■フリガナ	：$e_namekana
■メールアドレス：$e_mail
■郵便番号	：$e_yubin
■ご住所	：$e_address
■電話番号	：$e_tel
■FAX番号	：$e_fax
■生年月日	：$e_birthday
■現在のお住まい：$e_sumai_h
■物件お探し状況：$e_sagashi_h
■HPをお知りになったきっかけ	：$e_kikkake_h
■メルマガ希望	：$e_melmaga_h

_EOT_;
}

	$ouboadd_header = "From:toiawase@starmica.co.jp";
	$oubosubject = preg_replace("/^(\s|　)+$/", "", $oubosubject);
	$oubosubject = strip_tags($oubosubject);
	$oubosubject = stripslashes($oubosubject);
	$oubosubject = mb_convert_kana($oubosubject, "KV");

	$oubomessage = preg_replace("/^(\s|　)+$/", "", $oubomessage);
	//HTMLタグやPHPタグを取り除く
	$oubomessage = strip_tags($oubomessage);
	//エスケープされた文字を戻す
	$oubomessage = stripslashes($oubomessage);
	//半角カタカナを全角カタカナ　濁点付きの文字を一文字に
	$oubomessage = mb_convert_kana($oubomessage, "KV");

	//このプログラムがUTF-8で書かれていることを宣言
	ini_set("mbstring.internal_encoding","UTF-8"); 

	//Unicode（UTf-8）でメール送信するための宣言。この宣言により、mb_send_mail()関数利用時に、下記の赤字のヘッダーが自動付与され送信されます。
	mb_language("uni");

	mb_language("Japanese");
	mb_internal_encoding("UTF-8");


	$oubomailresult = mb_send_mail($ouboto,$oubosubject,$oubomessage,$ouboadd_header);

	$sendto = $e_mail;
	$sendsubject = "お問い合わせありがとうございました。";
if($e_toiawasekoumoku == 1){
	$sendmessage = <<<_EOT_
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
お問い合わせ送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

下記の内容お問い合わせが送信されました。

■お問い合わせ項目：$e_toiawasekoumoku_h
■希望日	:$e_kiboubi_h   $e_kiboutime_h
■お名前	：$e_name
■フリガナ	：$e_namekana
■メールアドレス：$e_mail
■郵便番号	：$e_yubin
■ご住所	：$e_address
■電話番号	：$e_tel
■FAX番号	：$e_fax
■生年月日	：$e_birthday
■現在のお住まい：$e_sumai_h
■物件お探し状況：$e_sagashi_h
■HPをお知りになったきっかけ	：$e_kikkake_h
■メルマガ希望	：$e_melmaga_h

お問い合わせ、誠にありがとうございました。

_EOT_;
}
elseif($e_toiawasekoumoku == 2){
	$sendmessage = <<<_EOT_
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
お問い合わせ送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

下記の内容お問い合わせが送信されました。

■お問い合わせ項目：$e_toiawasekoumoku_h
■お名前	：$e_name
■フリガナ	：$e_namekana
■メールアドレス：$e_mail
■郵便番号	：$e_yubin
■ご住所	：$e_address
■電話番号	：$e_tel
■FAX番号	：$e_fax
■生年月日	：$e_birthday
■現在のお住まい：$e_sumai_h
■物件お探し状況：$e_sagashi_h
■HPをお知りになったきっかけ	：$e_kikkake_h
■メルマガ希望	：$e_melmaga_h

お問い合わせ、誠にありがとうございました。

_EOT_;
}
else{
	$sendmessage = <<<_EOT_
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
お問い合わせ送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信情報は以下の通りです。

■お問い合わせ項目：$e_toiawasekoumoku_h
■お問い合わせ内容：$e_question
■お名前	：$e_name
■フリガナ	：$e_namekana
■メールアドレス：$e_mail
■郵便番号	：$e_yubin
■ご住所	：$e_address
■電話番号	：$e_tel
■FAX番号	：$e_fax
■生年月日	：$e_birthday
■現在のお住まい：$e_sumai_h
■物件お探し状況：$e_sagashi_h
■HPをお知りになったきっかけ	：$e_kikkake_h
■メルマガ希望	：$e_melmaga_h

お問い合わせ、誠にありがとうございました。

_EOT_;
}
	$sendadd_header = "From:toiawase@starmica.co.jp";
	$sendsubject = preg_replace("/^(\s|　)+$/", "", $sendsubject);
	$sendsubject = strip_tags($sendsubject);
	$sendsubject = stripslashes($sendsubject);
	$sendsubject = mb_convert_kana($sendsubject, "KV");

	$sendmessage = preg_replace("/^(\s|　)+$/", "", $sendmessage);
	//HTMLタグやPHPタグを取り除く
	$sendmessage = strip_tags($sendmessage);
	//エスケープされた文字を戻す
	$sendmessage = stripslashes($sendmessage);
	//半角カタカナを全角カタカナ　濁点付きの文字を一文字に
	$sendmessage = mb_convert_kana($sendmessage, "KV");

	mb_language("Japanese");
	mb_internal_encoding("EUC-JP");

	$sendmailresult = mb_send_mail($sendto,$sendsubject,$sendmessage,$sendadd_header);

	//別ページへ飛ぶ
	header("Location:thanks_inquiry1.php");

exit();

}
else{


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="ステラレジデンス横浜,STELLA　RESIDENCE,マンション,中古マンション,分譲マンション,JR東海道本線,JR京浜東北線,JR横浜線,JR根岸線,JR横須賀線,JR湘南新宿ライン,京急本線,東急東横線,みなとみらい線,相鉄本線,横浜市営ブルーライン" />
<meta name="Description" content="ステラレジデンス横浜は、中古マンション販売専門のスター・マイカ・レジデンスがおすすめするマンション物件です。" />
<title><?=$HTMLTITLE?></title>
<link rel="stylesheet" type="text/css" media="all" href="css/import.css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function getAction(){
	document.myform.submit();
}
</script>
</head>
<body>
<div id="header">
  <div class="clear-box">
        <div class="header-top">
    		<div class="header-copy">JR横浜線「横浜」駅徒歩10分・京浜急行「神奈川」駅徒歩2分</div>
	</div>
        <div class="left">
    		<h1><a href="index.php"><img src="img/logo.png" alt="ステラレジデンス横浜" width="273" height="40" /></a></h1>
	</div>
        <div class="right">
          <ul id="mini-navi">
		<li><a href="http://www.starmica-r.co.jp/yokohama/access.php#map"><img src="img/mininavi_1.gif" alt="現地案内図" width="80" height="16" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/corprateprofile.php" target="_blank"><img src="img/mininavi_2.gif" alt="会社情報" width="80" height="16" /></a></li>
          </ul>
          <ul class="link">
	          <li><a href="http://www.fan-invest.co.jp/yokohamachintai/index.php" target="_blank"><img src="img/header-toiawase2.jpg" alt="賃貸をお考えの方はこちら" width="193" height="41" /></a></li>
	          <li><a href="https://www.starmica-r.co.jp/yokohama/contactus.php"><img src="img/header-toiawase.jpg" alt="お問い合わせ・資料請求" width="193" height="41" /></a></li>
          </ul>
        </div>
  </div>
  <!--/box-->
</div>
<!--/header-->

<div id="globalnavi">
   <ul>
    <li><a href="http://www.starmica-r.co.jp/yokohama/index.php"><img src="img/globalnavi_1.gif" alt="ホーム" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/plan.php"><img src="img/globalnavi_2.gif" alt="間取り" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/equipment.php"><img src="img/globalnavi_3.gif" alt="設備・仕様" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/access.php"><img src="img/globalnavi_4.gif" alt="アクセス" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/location.php"><img src="img/globalnavi_5.gif" alt="周辺環境" width="150" height="39" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/yokohama/gaiyou.php"><img src="img/globalnavi_6.gif" alt="物件概要" width="150" height="39" /></a></li>
   </ul>
</div>
<!--/globalnavi-->
<hr />
<div id="bukken" class="page1">
  <div id="wrapper">
    <div id="title-area900">
      <div id="bread-crumb">
        <ul>
          <li><a href="http://www.starmica-r.co.jp/yokohama/index.php">ホーム</a></li>
          <li class="arrow">資料請求・お問い合わせ</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->
    <div id="container900">
	<div class="title"><img src="img/pagetitle7.png" alt="お問い合わせ" width="163" height="163" /></div>
      <div id="content900">
        <div class="sec1 bottom-20">
          <div class="indent-area">
           <p class="top-30">
            <b>下記項目をご入力ください。尚、<span class="style7">※</span>印は必須項目となっております。</b></p>
          </div>
          <!--/indent-area-->
           <p class="bottom-20">
					<FORM enctype="multipart/form-data" id="formid" action="contactus.php" method="post" name="myform">
					<table cellpadding="0" cellspacing="0" width="870" border="0">
					<tr> 
					<td width="340" class="tb2-b"> 
					お問い合わせ項目<span class="style7">※</span></td>
					<td width="600" class="tb2-d">
<?php
					if(!$e_toiawasekoumoku){
						$e_toiawasekoumoku = 1;
					}
					if($e_toiawasekoumoku == 1){
?>
					<input type="radio" name="e_toiawasekoumoku" value="1" onChange="getAction()" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_toiawasekoumoku" onChange="getAction()" value="1">
<?php
					}
?>
					内覧予約&nbsp;&nbsp;&nbsp;
<?php
					if($e_toiawasekoumoku == 2){
?>
					<input type="radio" name="e_toiawasekoumoku" value="2" onChange="getAction()" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_toiawasekoumoku" value="2" onChange="getAction()">
<?php
					}
?>
					資料請求&nbsp;&nbsp;&nbsp;
<?php
					if($e_toiawasekoumoku == 3){
?>
					<input type="radio" name="e_toiawasekoumoku" value="3" onChange="getAction()" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_toiawasekoumoku" value="3" onChange="getAction()">
<?php
					}
?>
					その他お問い合わせ
					</td>
					</tr>
<?php
				if($e_toiawasekoumoku_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_toiawasekoumoku_msg?></span>
			                </td>
					</tr>
<?php
				}
				if($e_toiawasekoumoku == 1){
?>

					<tr> 
					<td width="270" class="tb2-b"> 
					ご希望日<span class="style7">※</span></td>


					<td width="600" class="tb2" bgcolor="#ffffff">
<?php
					if($e_kiboubi == 1){
?>
					<input type="radio" name="e_kiboubi" value="1" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_kiboubi" value="1">
<?php
					}
?>
					2/28(土) &nbsp;&nbsp;&nbsp;
<?php
					if($e_kiboubi == 2){
?>
					<input type="radio" name="e_kiboubi" value="2" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_kiboubi" value="2">
<?php
					}
?>
					3/1(日)&nbsp;&nbsp;&nbsp;
<?php
					if($e_kiboubi == 3){
?>
					<input type="radio" name="e_kiboubi" value="3" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_kiboubi" value="3">
<?php
					}
?>
					3/7(土)&nbsp;&nbsp;&nbsp;
<?php
					if($e_kiboubi == 4){
?>
					<input type="radio" name="e_kiboubi" value="4" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_kiboubi" value="4">
<?php
					}
?>
					3/8(日)
					</td>
					</tr>
<?php
					if($e_kiboubi_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_kiboubi_msg?></span>
			                </td>
					</tr>
<?php
					}
?>
					<tr> 
					<td width="270" class="tb2-b"> 
					ご希望の時間<span class="style7">※</span></td>
					<td width="600" class="tb2" bgcolor="#ffffff">
<?php
					if($e_kiboutime == 1){
?>
					<input type="radio" name="e_kiboutime" value="1" TABINDEX="1" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_kiboutime" value="1" TABINDEX="1">
<?php
					}
?>
					11：00～&nbsp;&nbsp;&nbsp;
<?php
					if($e_kiboutime == 2){
?>
					<input type="radio" name="e_kiboutime" value="2" TABINDEX="2" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_kiboutime" value="2" TABINDEX="2">
<?php
					}
?>
					12：30～&nbsp;&nbsp;&nbsp;
<?php
					if($e_kiboutime == 3){
?>
					<input type="radio" name="e_kiboutime" value="3" checked TABINDEX="3">
<?php
					}
					else{
?>
					<input type="radio" name="e_kiboutime" value="3" TABINDEX="3">
<?php
					}
?>
					14：00～&nbsp;&nbsp;&nbsp;
<?php
					if($e_kiboutime == 4){
?>
					<input type="radio" name="e_kiboutime" value="4" TABINDEX="4" checked>
<?php
					}
					else{
?>
					<input type="radio" name="e_kiboutime" value="4" TABINDEX="4">
<?php
					}
?>
					15：30～<br><span class="style12">※先着順にてお受けしますので、ご要望に添えない場合がございますことをご了承ください。</span>
					</td>
					</tr>
<?php
					if($e_kiboutime_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_kiboutime_msg?></span>
			                </td>
					</tr>
<?php
					}
				}
				if($e_toiawasekoumoku == 3){
?>
					<tr> 
					<td width="270" class="tb2-b"> 
					お問い合わせ内容</td>
					<td width="600" class="tb2" bgcolor="#ffffff">
					<textarea name="e_question" style="width:500px" rows="10" TABINDEX="5"><?=$e_question?></textarea>
					</td>
					</tr>
<?php
				}
				if($e_question_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_question_msg?></span>
			                </td>
					</tr>
<?php
				}
?>
					<tr> 
					<td width="270" class="tb2-b"> 
					お名前<span class="style7">※</span></td>
					<td width="600" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_name" style="width:300px" value="<?=$e_name?>" TABINDEX="6">&nbsp;（例）港区　一郎
					</td>
					</tr>
<?php
				if($e_name_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_name_msg?></span>
			                </td>
					</tr>
<?php
				}
?>

					<tr> 
					<td width="270" class="tb2-b"> 
					フリガナ<span class="style7">※</span></td>
					<td width="600" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_namekana" style="width:300px" value="<?=$e_namekana?>" TABINDEX="7">&nbsp;（例）ミナトク　イチロウ
					</td>
					</tr>
<?php
	if($e_namekana_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_namekana_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="270"  class="tb2-b">
					メールアドレス</td>
					<td width="600" class="tb2">
					<input type="text" name="e_mail" style="width:300px; ime-mode:disabled" value="<?=$e_mail?>" TABINDEX="8">&nbsp;（例）smr@starmica.co.jp
					</td>
					</tr>
<?php
	if($e_mail_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_mail_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="270"  class="tb2-b">
					メールアドレス<br>（確認のためもう一度入力して下さい）</td>
					<td width="600" class="tb2">
					<input type="text" name="e_mail2" style="width:300px; ime-mode:disabled" value="<?=$e_mail2?>" TABINDEX="9">&nbsp;（例）smr@starmica.co.jp
					</td>
					</tr>
<?php
	if($e_mail2_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_mail2_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="270" class="tb2-b">
					郵便番号</td>
					<td width="600" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_yubin" style="width:300px; ime-mode:disabled" value="<?=$e_yubin?>" TABINDEX="10">&nbsp;（例）105-6028
					</td>
					</tr>
<?php
	if($e_yubin_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_yubin_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="270" class="tb2-b"> 
					ご住所</td>
					<td width="600" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_address" style="width:500px" value="<?=$e_address?>" TABINDEX="11"><br>（例）東京都港区虎ノ門4-3-1　城山トラストタワー28階
					</td>
					</tr>
<?php
	if($e_address_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_address_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="270" class="tb2-b">
					電話番号<span class="style7">※</span></td>
					<td width="600" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_tel" style="width:200px; ime-mode:disabled" value="<?=$e_tel?>" TABINDEX="12">&nbsp;（例）03-5776-2688
					</td>
					</tr>
<?php
	if($e_tel_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_tel_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="270" class="tb2-b">
					FAX番号</td>
					<td width="600" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_fax" style="width:200px; ime-mode:disabled" value="<?=$e_fax?>" TABINDEX="13">&nbsp;（例）03-1234-5678
					</td>
					</tr>
<?php
	if($e_fax_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_fax_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="270" class="tb2-b">
					生年月日</td>
					<td width="600" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_birthday" style="width:200px; ime-mode:disabled" value="<?=$e_birthday?>" TABINDEX="14">&nbsp;（例）1980/01/01
					</td>
					</tr>
<?php
	if($e_birthday_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_birthday_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="270" class="tb2-b">
					現在のお住まい</td>
					<td width="600" class="tb2" bgcolor="#ffffff">
<?php
	if($e_sumai == 1){
?>
					<input type="radio" name="e_sumai" value="1" TABINDEX="15" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="1" TABINDEX="15">
<?php
	}
?>
					賃貸マンション
<?php
	if($e_sumai == 2){
?>
					<input type="radio" name="e_sumai" value="2" TABINDEX="16" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="2" TABINDEX="16">
<?php
	}
?>
					賃貸戸建
<?php
	if($e_sumai == 3){
?>
					<input type="radio" name="e_sumai" value="3" TABINDEX="17" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="3" TABINDEX="17">
<?php
	}
?>
					自己所有マンション
<?php
	if($e_sumai == 4){
?>
					<input type="radio" name="e_sumai" value="4" TABINDEX="18" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="4" TABINDEX="18">
<?php
	}
?>
					自己所有戸建
<?php
	if($e_sumai == 5){
?>
					<input type="radio" name="e_sumai" value="5" TABINDEX="19" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="5" TABINDEX="19">
<?php
	}
?>
					その他
					</td>
					</tr>
<?php
	if($e_sumai_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_sumai_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr>
					<td width="270"  class="tb2-b">
					物件お探し状況</td>
					<td width="600" class="tb2" bgcolor="#ffffff">
				<select name="e_sagashi" TABINDEX="20">
<?php
				print"<option value='k'>---</option>";

				if($e_sagashi == 1){
?>
				<option value ='1' selected>良い物件があればすぐに購入したい</option>
<?php
				}
				else{
?>
				<option value ='1'>良い物件があればすぐに購入したい</option>
<?php
				}
				if($e_sagashi == 2){
?>
				<option value ='2' selected>１年以内には購入したい</option>
<?php
				}
				else{
?>
				<option value ='2'>１年以内には購入したい</option>
<?php
				}
				if($e_sagashi == 3){
?>
				<option value ='3' selected>今すぐではないが、いずれは購入したい</option>
<?php
				}
				else{
?>
				<option value ='3'>今すぐではないが、いずれは購入したい</option>
<?php
				}
				if($e_sagashi == 4){
?>
				<option value ='4' selected>現在住んでいるところを売却して買い替えたい</option>
<?php
				}
				else{
?>
				<option value ='4'>現在住んでいるところを売却して買い替えたい</option>
<?php
				}
?>
					</td>
					</tr>
<?php
	if($e_sagashi_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_sagashi_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="270"  class="tb2-b">
					何をご覧頂いて<br>当HPをお知りになりましたか？</td>
					<td width="600" class="tb2" bgcolor="#ffffff">
<span class="style5">■インターネット</span><br>
<?php
	if($e_kikkake == 1){
?>
					<input type="radio" name="e_kikkake" value="1" TABINDEX="21" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="1" TABINDEX="21">
<?php
	}
?>
					YAHOO！不動産&nbsp;&nbsp;
<?php
	if($e_kikkake == 2){
?>
					<input type="radio" name="e_kikkake" value="2" TABINDEX="22" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="2" TABINDEX="22">
<?php
	}
?>
					SUUMO&nbsp;&nbsp;
<?php
	if($e_kikkake == 3){
?>
					<input type="radio" name="e_kikkake" value="3" TABINDEX="23" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="3" TABINDEX="23">
<?php
	}
?>
					HOME'S&nbsp;&nbsp;
<?php
	if($e_kikkake == 4){
?>
					<input type="radio" name="e_kikkake" value="4" TABINDEX="24" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="4" TABINDEX="24">
<?php
	}
?>
					アットホーム<br>
<?php
	if($e_kikkake == 5){
?>
					<input type="radio" name="e_kikkake" value="5" TABINDEX="25" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="5" TABINDEX="25">
<?php
	}
?>
					スター・マイカ・レジデンス　ホームページ&nbsp;&nbsp;
<?php
	if($e_kikkake == 6){
?>
					<input type="radio" name="e_kikkake" value="6" TABINDEX="26" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="6" TABINDEX="26">
<?php
	}
?>
					その他インターネットサイト<br>
<span class="style5">■インターネット以外</span><br>
<?php
	if($e_kikkake == 7){
?>
					<input type="radio" name="e_kikkake" value="7" TABINDEX="27" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="7" TABINDEX="27">
<?php
	}
?>
					新聞折込広告&nbsp;&nbsp;
<?php
	if($e_kikkake == 8){
?>
					<input type="radio" name="e_kikkake" value="8" TABINDEX="28" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="8" TABINDEX="28">
<?php
	}
?>
					ポストに投函されていた広告&nbsp;&nbsp;
<?php
	if($e_kikkake == 9){
?>
					<input type="radio" name="e_kikkake" value="9" TABINDEX="29" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="9" TABINDEX="29">
<?php
	}
?>
					紹介&nbsp;&nbsp;
<?php
	if($e_kikkake == 10){
?>
					<input type="radio" name="e_kikkake" value="10" TABINDEX="30" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="10" TABINDEX="30">
<?php
	}
?>
					街頭配布チラシ&nbsp;&nbsp;
<?php
	if($e_kikkake == 11){
?>
					<input type="radio" name="e_kikkake" value="11" TABINDEX="31" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="11" TABINDEX="31">
<?php
	}
?>
					その他
					</td>
					</tr>
<?php
	if($e_kikkake_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_kikkake_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="270"  class="tb2-b">
					販売情報をいち早くメールで<br>お届けしております。<br>メールを希望されますか？</td>
					<td width="600" class="tb2">
<?php
	if($e_melmaga == 1){
?>
					<input type="radio" name="e_melmaga" value="1" TABINDEX="32" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_melmaga" value="1" TABINDEX="32">
<?php
	}
?>
					希望する
<?php
	if($e_melmaga == 2){
?>
					<input type="radio" name="e_melmaga" value="2" TABINDEX="33" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_melmaga" value="2" TABINDEX="33">
<?php
	}
?>
					希望しない
					<BR>※新着情報や最新の不動産情報をメールにてお送りいたします。
					</td>
					</tr>
<?php
	if($e_melmaga_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_melmaga_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					</table>
<br>
					<table width="870">
					<tr> 
					<td align="center" colspan="2" class="tb2-c"> 
					個人情報の取り扱いについて
					</td>
					</tr>
					<td align="center" colspan="2" class="tb2"> 
<center>当社の個人情報の取扱いについては<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank"><b>こちら</b></a>（別ウィンドウ）をご覧ください。<br>
上記<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank"><b>『個人情報の取り扱い』</b></a>の内容に同意される方は、下記<b> [同意して送信] </b>のボタンをクリックして下さい。</center>
					</td>
					</tr>
					<tr> 
					<td align="center" colspan="2" height="60"> 
					<input type="submit" name="sendconfo" value="同意して送信">
					</td>
					</tr>
					</table>
				</FORM>



        </div>
        <!--/sec1-->


        <p id="page-top"><a href="#header"><img src="img/base_pagetop.gif" alt="このページの先頭へ" width="115" height="13" /></a></p>
      </div>
      <!--/content-->

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
	        <li class="first"><a href="http://www.starmica-r.co.jp/yokohama/index.php">ホーム</a></li>
	        <li><a href="http://www.starmica-r.co.jp/yokohama/access.php#map">現地案内図</a></li>
	        <li><a href="http://www.starmica-r.co.jp/yokohama/gaiyou.php">物件概要</a></li>
	        <li><a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">個人情報保護方針</a></li>
	        <li><a href="https://www.starmica-r.co.jp/yokohama/contactus.php">お問い合わせ</a></li>
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
</body>
</html>
<?php
	exit();
}
?>
