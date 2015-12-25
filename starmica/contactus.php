<?php
if($_POST['entrygo'] OR $_POST['entrysousin']){
	//お問い合わせ項目
	if($_POST['e_toiawasekoumoku']){
		$e_toiawasekoumoku = htmlspecialchars($_POST['e_toiawasekoumoku'], ENT_QUOTES);
		if($e_toiawasekoumoku <=1 AND $e_toiawasekoumoku >=6){
			$e_toiawasekoumoku_msg = "お問い合わせ項目のご入力をお願いいたします。";
			$errorflag = 1;
		}
	}
	else{
//		$e_toiawasekoumoku_msg = "お問い合わせ項目のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_question']){
		$e_question = htmlspecialchars($_POST['e_question'], ENT_QUOTES);
		//400字制限
		$count_id = strlen($e_question);
		if($count_id > 1200){
			$e_question_msg = "理由は400文字以内で入力してください。";
			$errorflag = 1;
		}
		$e_question_h = nl2br($e_question);
		$e_question_h = preg_replace('/\\\\/', '￥', $e_question_h);
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
	if($_POST['e_tel']){
		$e_tel = htmlspecialchars($_POST['e_tel'], ENT_QUOTES);
		$e_tel = preg_replace("/ー/", "-", "$e_tel");
		$e_tel = preg_replace("/－/", "-", "$e_tel");
		$e_tel = preg_replace("/―/", "-", "$e_tel");
		$e_tel_check = preg_replace("/-/", "", "$e_tel");
		//半角数字
		if( ereg("^[0-9]+$",$e_tel_check)){
		
		}
		else{
			$e_tel_msg = "電話番号は半角数字と「-」（ハイフン）のみで入力してください。";
			$errorflag = 1;
		}
	}
	else{
//		$e_tel_msg = "電話番号のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	if($_POST['e_mail']){
		$e_mail = htmlspecialchars($_POST['e_mail'], ENT_QUOTES);
		if( preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i', $e_mail)){

		}
		else{
			$e_mail_msg = "メールアドレスが正しくないようです。";
			$errorflag = 1;
		}
	}
	else{
		$e_mail_msg = "E-mailのご入力をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_mail_check']){
		$e_mail_check = htmlspecialchars($_POST['e_mail_check'], ENT_QUOTES);
		if( preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i', $e_mail_check)){
			if($e_mail_check == $e_mail){

			}
			else{
				$e_mail_check_msg = "メールアドレスをご確認ください。";
				$errorflag = 1;
			}
		}
		else{
			$e_mail_check_msg = "メールアドレスが正しくないようです。";
			$errorflag = 1;
		}
	}
	else{
		$e_mail_check_msg = "E-mailのご入力をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_yuubinbangou']){
		$e_yuubinbangou = htmlspecialchars($_POST['e_yuubinbangou'], ENT_QUOTES);
		$e_yuubinbangou = preg_replace("/ー/", "-", "$e_yuubinbangou");
		$e_yuubinbangou = preg_replace("/－/", "-", "$e_yuubinbangou");
		$e_yuubinbangou = preg_replace("/―/", "-", "$e_yuubinbangou");
		$e_yuubinbangou_check = preg_replace("/-/", "", "$e_yuubinbangou");
		//半角数字
		if(ereg("^[0-9]+$",$e_yuubinbangou_check)){
		
		}
		else{
			$e_yuubinbangou_msg = "郵便番号は半角数字と「-」（ハイフン）のみで入力してください。";
			$errorflag = 1;
		}
	}
	else{
//		$e_yuubinbangou_msg = "郵便番号のご入力をお願いいたします。";
//		$errorflag = 1;
	}

	//----------------------------------------------------------------------
	//都道府県・ご住所
	//----------------------------------------------------------------------

	if($_POST['e_address2']){
		$e_address2 = htmlspecialchars($_POST['e_address2'], ENT_QUOTES);
		//300字制限
		$count_id = strlen($e_address2);
		if($count_id > 600){
			$e_address2_msg = "ご住所は300文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
//		$e_address2_msg = "ご住所のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//ご連絡方法
	//----------------------------------------------------------------------
	if($_POST['e_renrakuhouhou']){
		$e_renrakuhouhou = htmlspecialchars($_POST['e_renrakuhouhou'], ENT_QUOTES);
		if($e_renrakuhouhou <=1 AND $e_renrakuhouhou >=3){
			$e_renrakuhouhou_msg = "ご連絡方法のご入力をお願いいたします。";
			$errorflag = 1;
		}
	}
	else{
//		$e_renrakuhouhou_msg = "ご連絡方法のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//弊社をお知りになったきっかけ
	//----------------------------------------------------------------------
	if($_POST['e_kikkake']){
		$e_kikkake = htmlspecialchars($_POST['e_kikkake'], ENT_QUOTES);
		if($e_kikkake <=1 AND $e_kikkake >=11){
			$e_kikkake_msg = "きっかけのご入力をお願いいたします。";
			$errorflag = 1;
		}
	}
	else{
//		$e_kikkake_msg = "きっかけのご入力をお願いいたします。";
//		$errorflag = 1;
	}
}
if($errorflag !=1 AND $_POST['entrygo']){

require_once("design.php");

$HTMLTITLE ="お問い合わせ";
$currentmenu = 20;


user_header_other($HTMLTITLE,$currentmenu);

?>


	<div id="pagetitle-menu5">
		<div class="row">
			<h2><img src="images/title-contactus.png" alt="お問い合わせ" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>各種お問い合わせは、下記よりお気軽にお問い合わせください。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">お問い合わせ</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>


			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>お問い合わせ</span></div>
						<img src="images/contactus-step02_on.png" width="680" height="100" class="bottom-20"/>
						<p class="bottom-10">
						ご入力いただいた内容をご確認いただき、「送信」ボタンをクリックしてください。
						</p>

				<div class="top-10">

						<FORM method="post" action="contactus.php">
						<table class="formTable">
						<tr> 
						<th class="tablemidashi" colspan="2">お問い合わせ項目</th>
						</tr>
						<tr>
						<td colspan="2">
<?php
						if($e_toiawasekoumoku == 1){
							print"掲載物件の資料請求";
						}
						elseif($e_toiawasekoumoku == 2){
							print"中古マンションご購入に関するご相談";
						}
						elseif($e_toiawasekoumoku == 3){
							print"リノベーションに関するご相談";
						}
						elseif($e_toiawasekoumoku == 4){
							print"所有物件の賃貸相談したい";
						}
						elseif($e_toiawasekoumoku == 5){
							print"所有物件の賃貸相談したい";
						}
						elseif($e_toiawasekoumoku == 6){
							print"マンション管理に関するご相談";
						}
						elseif($e_toiawasekoumoku == 7){
							print"セミナー、オープンルーム";
						}
						elseif($e_toiawasekoumoku == 8){
							print"会員登録、会員抹消手続";
						}
						elseif($e_toiawasekoumoku == 9){
							print"その他";
						}
?>
						</td>
						</tr>
						<tr>
						<th class="tablemidashi" colspan="2">お問い合わせ内容（物件名、ご要望など）
						</th>
						</tr>
						<tr>
						<td colspan="2"><?=$e_question_h?></td>
						</tr>
						<tr>
						<th class="tablemidashi" colspan="2">ご連絡先
						</th>
						</tr>
						<tr> 
						<th>
						お名前<span class="icon-required">必須</span></th>
						<td><?=$e_name?></td>
						</tr>
						<tr> 
						<th>
						Eメール<span class="icon-required">必須</span></th>
						<td><?=$e_mail?></td>
						</tr>
						<tr> 
						<th>
						電話番号</th>
						<td><?=$e_tel?></td>
						</tr>
						<tr> 
						<th>
						郵便番号</td>
						<td><?=$e_yuubinbangou?></td>
						</tr>
						<th>
						ご住所</th>
						<td><?=$e_address2?></td>
						</tr>
						<tr> 
						<th>
						ご連絡方法</th>
						<td>
<?php
						if($e_renrakuhouhou == 1){
							print"電話";
						}
						elseif($e_renrakuhouhou == 2){
							print"メール";
						}
						elseif($e_renrakuhouhou == 3){
							print"郵送";
						}
?>
						</td>
						</tr>
						<tr>
						<th class="tablemidashi" colspan="2">弊社をお知りなったきっかけ
						</th>
						</tr>
						<td  colspan="2">
<?php
						if($e_kikkake == 1){
							print"Yahoo";
						}
						elseif($e_kikkake == 2){
							print"google";
						}
						elseif($e_kikkake == 3){
							print"アットホーム";
						}
						elseif($e_kikkake == 4){
							print"SUUMO";
						}
						elseif($e_kikkake == 5){
							print"知人の紹介";
						}
						elseif($e_kikkake == 6){
							print"物件チラシ";
						}
						elseif($e_kikkake == 7){
							print"物件HP";
						}
						elseif($e_kikkake == 8){
							print"新聞、雑誌";
						}
						elseif($e_kikkake == 9){
							print"イベント・セミナー";
						}
						elseif($e_kikkake == 10){
							print"オープンルーム";
						}
						elseif($e_kikkake == 11){
							print"その他";
						}
?>
						</td>
						</tr>
						</table>



					<div class="botancenter">
					<input type="submit" name="entrysousin" value="送信" class="sousin_button">
					<input type="hidden" name="e_toiawasekoumoku" value="<?=$e_toiawasekoumoku?>">
					<input type="hidden" name="e_question" value="<?=$e_question?>">
					<input type="hidden" name="e_name" value="<?=$e_name?>">
					<input type="hidden" name="e_mail" value="<?=$e_mail?>">
					<input type="hidden" name="e_mail_check" value="<?=$e_mail_check?>">
					<input type="hidden" name="e_yuubinbangou" value="<?=$e_yuubinbangou?>">
					<input type="hidden" name="e_address2" value="<?=$e_address2?>">
					<input type="hidden" name="e_tel" value="<?=$e_tel?>">
					<input type="hidden" name="e_renrakuhouhou" value="<?=$e_renrakuhouhou?>">
					<input type="hidden" name="e_kikkake" value="<?=$e_kikkake?>">
					</div>


					</FORM>
				</div>




					</section>

				</div>
				<!--/#content-->
				<div id="sidebar" class="col one-fourth left">
<?php
//サイドメニュー
user_sidearea20($currentmenu);
?>

<?php
//サイドバナー下層ページ共通
user_sidebanner_other($currentmenu);
?>


				</div>
				<!--/#sidebar-->


			</div>
			<!--/row-->
		</article>


<?php
user_footer_othe($currentmenu);
}
elseif($errorflag !=1 AND $_POST['entrysousin']){
	if($e_toiawasekoumoku == 1){
		$e_toiawasekoumoku_h = "掲載物件の資料請求";
	}
	elseif($e_toiawasekoumoku == 2){
		$e_toiawasekoumoku_h = "中古マンションご購入に関するご相談";
	}
	elseif($e_toiawasekoumoku == 3){
		$e_toiawasekoumoku_h = "リノベーションに関するご相談";
	}
	elseif($e_toiawasekoumoku == 4){
		$e_toiawasekoumoku_h = "所有物件の売却相談したい";
	}
	elseif($e_toiawasekoumoku == 5){
		$e_toiawasekoumoku_h = "所有物件の賃貸相談したい";
	}
	elseif($e_toiawasekoumoku == 6){
		$e_toiawasekoumoku_h = "マンション管理に関するご相談";
	}
	elseif($e_toiawasekoumoku == 7){
		$e_toiawasekoumoku_h = "セミナー、オープンルーム";
	}
	elseif($e_toiawasekoumoku == 8){
		$e_toiawasekoumoku_h = "会員登録、会員抹消手続";
	}
	elseif($e_toiawasekoumoku == 9){
		$e_toiawasekoumoku_h = "その他";
	}
	if($e_renrakuhouhou == 1){
		$e_renrakuhouhou_h = "電話";
	}
	elseif($e_renrakuhouhou == 2){
		$e_renrakuhouhou_h = "メール";
	}
	elseif($e_renrakuhouhou == 3){
		$e_renrakuhouhou_h = "郵送";
	}
	if($e_kikkake == 1){
		$e_kikkake_h = "Yahoo";
	}
	elseif($e_kikkake == 2){
		$e_kikkake_h = "google";
	}
	elseif($e_kikkake == 3){
		$e_kikkake_h = "アットホーム";
	}
	elseif($e_kikkake == 4){
		$e_kikkake_h = "SUUMO";
	}
	elseif($e_kikkake == 5){
		$e_kikkake_h = "知人の紹介";
	}
	elseif($e_kikkake == 6){
		$e_kikkake_h = "物件チラシ";
	}
	elseif($e_kikkake == 7){
		$e_kikkake_h = "物件HP";
	}
	elseif($e_kikkake == 8){
		$e_kikkake_h = "新聞、雑誌";
	}
	elseif($e_kikkake == 9){
		$e_kikkake_h = "イベント・セミナー";
	}
	elseif($e_kikkake == 10){
		$e_kikkake_h = "オープンルーム";
	}
	elseif($e_kikkake == 11){
		$e_kikkake_h = "その他";
	}

	//-----------------------------
	//お問い合わせメール（スター・マイカ・レジデンスHPより）
	//-----------------------------
	$ouboto = "toiawase@starmica.co.jp";
//	$ouboto = "info@faboc.co.jp";
	$oubosubject = "お問い合わせメール（スター・マイカ・レジデンスHP）";
	$oubomessage = <<<_EOT_
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
お問い合わせ送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信情報は以下の通りです。

■お問い合わせ項目：$e_toiawasekoumoku_h
■お問い合わせ内容：
$e_question_h
■お名前	：$e_name
■メールアドレス：$e_mail
■電話番号	：$e_tel
■郵便番号	：$e_yuubinbangou
■ご住所	：$e_address2
■ご連絡方法	：$e_renrakuhouhou_h
■弊社をお知りになったきっかけ	：$e_kikkake_h

_EOT_;

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
	ini_set("mbstring.internal_encoding","UTF-8"); 
	mb_language("uni");

	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	$oubomailresult = mb_send_mail($ouboto,$oubosubject,$oubomessage,$ouboadd_header);


$to2 = $e_mail;
$subject2 = "お問い合わせいただきありがとうございます。";
$atena = $e_name."様";

$message2 = <<<_EOT_


$atena


この度は、「スター・マイカ・レジデンス」へお問い合せいただきまことにありがとうございます。
お客さまのお問い合せ情報の送信を完了いたしました。
担当者より順次ご連絡をさせていただきますので今しばらくお待ちください。

定休日受付の場合には翌営業日以降の対応となりますのでご了承ください。
※マンション管理部門については毎週土・日曜日及び祝日が定休日となっております。

------------------------------------------------------
スター・マイカ・レジデンス株式会社
URL：http://www.starmica-r.co.jp/
フリーコール：0120-261-621　受付時間：9：30AM～6：30PM
定休日：火・水曜日・祝日
------------------------------------------------------

_EOT_;

	$add_header2 = "From:toiawase@starmica.co.jp";

	$subject2 = preg_replace("/^(\s|　)+$/", "", $subject2);
	$subject2 = strip_tags($subject2);
	$subject2 = stripslashes($subject2);

	$message2 = preg_replace("/^(\s|　)+$/", "", $message2);
	//HTMLタグやPHPタグを取り除く
	$message2 = strip_tags($message2);
	//エスケープされた文字を戻す
	$message2 = stripslashes($message2);
	//半角カタカナを全角カタカナ　濁点付きの文字を一文字に

	mb_language( "ja" );
        mb_internal_encoding("UTF-8");


$oubomailresult = mb_send_mail($to2,$subject2,$message2,$add_header2);


	//別ページへ飛ぶ
	header("Location:thanks_inquiry.php");
	exit();
}

//問い合わせフォーム
else{

require_once("design.php");

$HTMLTITLE ="お問い合わせ";
$currentmenu = 20;


user_header_other($HTMLTITLE,$currentmenu);
?>

	<div id="pagetitle-menu5">
		<div class="row">
			<h2><img src="images/title-contactus.png" alt="お問い合わせ" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>各種お問い合わせは、下記よりお気軽にお問い合わせください。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="/">ホーム</a></li>
		<li class="arrow">お問い合わせ</li>
		</ul>
	  	</div>
	</div>

	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>お問い合わせ</span></div>
						<p class="bottom-10">
						下記内容をご確認いただき、「確認」ボタンをクリックしてください。<br> 
						お問合せは、下記フォームへ各項目を入力の上、ご連絡ください。
						</p>
						<img src="images/contactus-step01_on.png" width="680" height="100" class="bottom-20"/>
						<FORM method="post" action="contactus.php">
						<table class="formTable">
						<tr> 
						<th class="tablemidashi" colspan="2">お問い合わせ項目
						</th>
						</tr>
						<tr>
						<td colspan="2">
							<ul class="yoko">
							<li>
<?php
	if($e_toiawasekoumoku == 1){
?>
						<input type="radio" name="e_toiawasekoumoku" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="1">
<?php
	}
?>
						掲載物件の資料請求<br>
<?php
	if($e_toiawasekoumoku == 2){
?>
						<input type="radio" name="e_toiawasekoumoku" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="2">
<?php
	}
?>
						中古マンションご購入に関するご相談<br>

<?php
	if($e_toiawasekoumoku == 3){
?>
						<input type="radio" name="e_toiawasekoumoku" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="3">
<?php
	}
?>
						リノベーションに関するご相談<br>
<?php
	if($e_toiawasekoumoku == 4){
?>
						<input type="radio" name="e_toiawasekoumoku" value="4" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="4">
<?php
	}
?>
						所有物件の売却相談したい<br>
<?php
	if($e_toiawasekoumoku == 5){
?>
						<input type="radio" name="e_toiawasekoumoku" value="5" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="5">
<?php
	}
?>
						所有物件の賃貸相談したい<br>

</li>
<li>

<?php
	if($e_toiawasekoumoku == 6){
?>
						<input type="radio" name="e_toiawasekoumoku" value="6" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="6">
<?php
	}
?>
						マンション管理に関するご相談<br>
<?php
	if($e_toiawasekoumoku == 7){
?>
						<input type="radio" name="e_toiawasekoumoku" value="7" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="7">
<?php
	}
?>
						セミナー、オープンルーム<br>
<?php
	if($e_toiawasekoumoku == 8){
?>
						<input type="radio" name="e_toiawasekoumoku" value="8" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="8">
<?php
	}
?>
						会員登録、会員抹消手続<br>
<?php
	if($e_toiawasekoumoku == 9){
?>
						<input type="radio" name="e_toiawasekoumoku" value="9" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_toiawasekoumoku" value="9">
<?php
	}
?>
						その他
							</li>
							</ul>

<?php
	if($e_toiawasekoumoku_msg){
?>
						<div id="errmsg"><?=$e_toiawasekoumoku_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr>
						<th class="tablemidashi" colspan="2">お問い合わせ内容（物件名、ご要望など）
						</th>
						</tr>
						<tr>
						<td colspan="2">
						<textarea name="e_question" style="width:95%;height:80px;" placeholder="物件名、ご要望などをご入力ください。" class="form-control"><?=$e_question?></textarea>
<?php
	if($e_question_msg){
?>
						<div id="errmsg"><?=$e_question_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr>
						<th class="tablemidashi" colspan="2">ご連絡先
						</th>
						</tr>
						<tr> 
						<th>
						お名前<span class="icon-required">必須</span></th>
						<td>
						<input type="text" name="e_name" value="<?=$e_name?>" style="width:50%;background-color:#f1cdc8" placeholder="例：田中一郎" class="form-control">
						<span class="supportmsg">（例：田中一郎）</span>
<?php
		if($e_name_msg){
?>
						<div id="errmsg"><?=$e_name_msg?></div>
<?php
		}
?>
						</td>
						</tr>
						<tr> 
						<th>
						Eメール<span class="icon-required">必須</span></th>
						<td>
						<input type="text" name="e_mail" style="width:50%;background-color:#f1cdc8;ime-mode:disabled" value="<?=$e_mail?>" placeholder="例：info@smr.jp" class="form-control">
						<span class="supportmsg">半角英数（例：info@smr.jp）</span>
<?php
		if($e_mail_msg){
?>
						<div id="errmsg"><?=$e_mail_msg?></div>
<?php
		}
?>
						</td>
						</tr>
						<tr>
						<th>
						Eメール確認<span class="icon-required">必須</span>
						</th>
						<td>
						<input type="text" name="e_mail_check" style="width:50%;background-color:#f1cdc8;ime-mode:disabled" value="<?=$e_mail_check?>" placeholder="例：info@smr.jp" class="form-control">
						<span class="supportmsg">半角英数（例：info@smr.jp）</span>
<?php
		if($e_mail_check_msg){
?>
					<div id="errmsg"><?=$e_mail_check_msg?></div>
<?php
		}
?>
						</td>
						</tr>
						<tr> 
						<th>
						電話番号</th>
						<td>
						<input type="text" name="e_tel" style="width:50%;ime-mode:disabled" value="<?=$e_tel?>" placeholder="例：03-5575-2218" class="form-control">
						<span class="supportmsg">半角英数（例：03-5575-2218）</span>
<?php
		if($e_tel_msg){
?>
						<div id="errmsg"><?=$e_tel_msg?></div>
<?php
		}
?>
						</td>
						</tr>
						<tr> 
						<th>
						郵便番号</td>
						<td>
						<input type="text" name="e_yuubinbangou" style="width:30%;ime-mode:disabled" value="<?=$e_yuubinbangou?>" placeholder="例：105-6028" class="form-control">
						<span class="supportmsg">半角英数（例：105-6028）</span>
<?php
		if($e_yuubinbangou_msg){
?>
						<div id="errmsg"><?=$e_yuubinbangou_msg?></div>
<?php
		}
?>
						</td>
						</tr>
						<tr> 
						<th>
						ご住所</th>
						<td>
						<input type="text" name="e_address2" style="width:90%" value="<?=$e_address2?>" placeholder="例：港区虎ノ門4-3-1　城山トラストタワー28階" class="form-control"><br>
						<span class="supportmsg">（例：港区虎ノ門4-3-1　城山トラストタワー28階）</span>
<?php
		if($e_address2_msg){
?>
						<div id="errmsg"><?=$e_address2_msg?></div>
<?php
		}
?>
						</td>
						</tr>
						<tr> 
						<th>
						ご希望連絡方法</th>
						<td>
<?php
	if($e_renrakuhouhou == 1){
?>
						<input type="radio" name="e_renrakuhouhou" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_renrakuhouhou" value="1">
<?php
	}
?>		
						電話
<?php
	if($e_renrakuhouhou == 2){
?>
						<input type="radio" name="e_renrakuhouhou" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_renrakuhouhou" value="2">
<?php
	}
?>
						メール
<?php
	if($e_renrakuhouhou == 3){
?>
						<input type="radio" name="e_renrakuhouhou" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_renrakuhouhou" value="3">
<?php
	}
?>
						ご郵送
<?php
	if($e_renrakuhouhou_msg){
?>
						<div id="errmsg"><?=$e_renrakuhouhou_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr>
						<th class="tablemidashi" colspan="2">弊社をお知りになったきっかけ
						</th>
						</tr>
						<tr> 
						<td colspan="2">
						<ul class="list-group">
						<li>
<?php
	if($e_kikkake == 1){
?>
						<input type="radio" name="e_kikkake" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="1">
<?php
	}
?>
						Yahoo
						</li>
						<li>
<?php
	if($e_kikkake == 2){
?>
						<input type="radio" name="e_kikkake" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="2">
<?php
	}
?>
						google
						</li>
						<li>
<?php
	if($e_kikkake == 3){
?>
						<input type="radio" name="e_kikkake" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="3">
<?php
	}
?>
						アットホーム
						</li>
						<li>
<?php
	if($e_kikkake == 4){
?>
						<input type="radio" name="e_kikkake" value="4" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="4">
<?php
	}
?>
						SUUMO
						</li>
						<li>
<?php
	if($e_kikkake == 5){
?>
						<input type="radio" name="e_kikkake" value="5" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="5">
<?php
	}
?>
						知人の紹介
						</li>
						<li>
<?php
	if($e_kikkake == 6){
?>
						<input type="radio" name="e_kikkake" value="6" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="6">
<?php
	}
?>
						物件チラシ
						</li>
						<li>
<?php
	if($e_kikkake == 7){
?>
						<input type="radio" name="e_kikkake" value="7" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="7">
<?php
	}
?>

						物件HP
						</li>
						</ul>
						<ul class="list-group">
						<li>
<?php
	if($e_kikkake == 8){
?>
						<input type="radio" name="e_kikkake" value="8" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="8">
<?php
	}
?>

						新聞、雑誌
						</li>
						<li>
<?php
	if($e_kikkake == 9){
?>
						<input type="radio" name="e_kikkake" value="9" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="9">
<?php
	}
?>
						イベント・セミナー
						</li>
						<li>
<?php
	if($e_kikkake == 10){
?>
						<input type="radio" name="e_kikkake" value="10" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="10">
<?php
	}
?>
						オープンルーム
						</li>
						<li>
<?php
	if($e_kikkake == 11){
?>
						<input type="radio" name="e_kikkake" value="11" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kikkake" value="11">
<?php
	}
?>
						その他
						</li>
						</ul>

<?php
			if($e_kikkake_msg){
?>
						<div id="errmsg"><?=$e_kikkake_msg?></div>
<?php
			}
?>

						</td>
						</tr>
						</table>

						<p class="top-10">
						<table class="formTable">
						<tr> 
						<th class="tablemidashi">個人情報の取り扱いについて
						</th>
						</tr>
						<td> 
						情報を送信していただく前に、
						当社の<a href="privacy.php" target="_blank">『個人情報保護方針』</a>に同意していただくことが必要です。<br>
						個人情報保護方針をご精読の上、同意できる場合は<b>［個人情報保護方針に同意して確認に進む］</b>のボタンをクリックしてください。
						</td>
						</tr>
						</table>
						</p>

						<div class="botancenter">
						<input type="submit" name="entrygo" value="個人情報保護方針に同意して確認に進む"  class="sousin_button">
						</div>
						</FORM>

					</section>


				</div>
				<!--/#content-->
				<div id="sidebar" class="col one-fourth left">
<?php
//サイドメニュー
user_sidearea20($currentmenu);
?>

<?php
//サイドバナー下層ページ共通
user_sidebanner_other($currentmenu);
?>

				</div>
				<!--/#sidebar-->


			</div>
			<!--/row-->
		</article>


<?php
user_footer_other($currentmenu);
}
?>

