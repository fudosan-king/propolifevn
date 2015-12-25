<?php
if($_POST['entrygo'] OR $_POST['entrysousin']){
	//お客様について
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
		$e_yuubinbangou_msg = "郵便番号のご入力をお願いいたします。";
		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//お名前フリガナ
	//----------------------------------------------------------------------
	if($_POST['e_namefuri']){
		$e_namefuri = htmlspecialchars($_POST['e_namefuri'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_namefuri);
		if($count_id > 100){
			$e_namefuri_msg = "ふりがなは50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_namefuri_msg = "ふりがなのご入力をお願いいたします。";
		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//都道府県・ご住所
	//----------------------------------------------------------------------
	if($_POST['e_address1']){
		$e_address1 = htmlspecialchars($_POST['e_address1'], ENT_QUOTES);
		//100字制限
		$count_id = strlen($e_address1);
		if($count_id > 200){
			$e_address1_msg = "都道府県は100文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_address1_msg = "都道府県のご入力をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_address2']){
		$e_address2 = htmlspecialchars($_POST['e_address2'], ENT_QUOTES);
		//300字制限
		$count_id = strlen($e_address2);
		if($count_id > 600){
			$e_address2_msg = "市区町村・番地は300文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_address2_msg = "市区町村・番地をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_address3']){
		$e_address3 = htmlspecialchars($_POST['e_address3'], ENT_QUOTES);
		//300字制限
		$count_id = strlen($e_address3);
		if($count_id > 600){
			$e_address3_msg = "建物名等は300文字以内で入力してください。";
			$errorflag = 1;
		}
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
	//----------------------------------------------------------------------
	//お住まいのご希望 1～3
	//----------------------------------------------------------------------
	if($_POST['e_toiawasekoumoku']){
		$e_toiawasekoumoku= htmlspecialchars($_POST['e_toiawasekoumoku'], ENT_QUOTES);
		if($e_toiawasekoumoku != '1' AND $e_toiawasekoumoku != '2' AND $e_toiawasekoumoku != '3'){
			$e_toiawasekoumoku_msg = "ご希望の項目のご入力をお願いいたします。";
			$errorflag = 1;
		}
	}
	else{
//		$e_toiawasekoumoku_msg = "ご希望の項目のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//ご希望のエリア
	//----------------------------------------------------------------------
	//東京都
	if($_POST['e_eria1']){
		$e_eria1 = htmlspecialchars($_POST['e_eria1'], ENT_QUOTES);
		if($e_eria1 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf                                                                                                                                          
			$e_eria1 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria1 = 'f';
	}
	//都心エリア（千代田区・中央区・港区・新宿区・渋谷区・文京区）
	if($_POST['e_eria2']){
		$e_eria2 = htmlspecialchars($_POST['e_eria2'], ENT_QUOTES);
		if($e_eria2 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria2 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria2 = 'f';
	}
	//城南エリア（世田谷区・大田区・目黒区・品川区）
	if($_POST['e_eria3']){
		$e_eria3 = htmlspecialchars($_POST['e_eria3'], ENT_QUOTES);
		if($e_eria3 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria3 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria3 = 'f';
	}
	//城西エリア（中野区・杉並区・練馬区
	if($_POST['e_eria4']){
		$e_eria4 = htmlspecialchars($_POST['e_eria4'], ENT_QUOTES);
		if($e_eria4 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria4 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria4 = 'f';
	}
	//城北エリア（豊島区・北区・板橋区・足立区）
	if($_POST['e_eria5']){
		$e_eria5 = htmlspecialchars($_POST['e_eria5'], ENT_QUOTES);
		if($e_eria5 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria5 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria5 = 'f';
	}
	//城東エリア（葛飾区・台東区・墨田区・江東区・江戸川区・荒川区）
	if($_POST['e_eria6']){
		$e_eria6 = htmlspecialchars($_POST['e_eria6'], ENT_QUOTES);
		if($e_eria6 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria6 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria6 = 'f';
	}
	//市部エリア（武蔵野市・三鷹市・小金井市・町田市など）
	if($_POST['e_eria7']){
		$e_eria7 = htmlspecialchars($_POST['e_eria7'], ENT_QUOTES);
		if($e_eria7 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria7 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria7 = 'f';
	}
	//神奈川県（横浜市・川崎市など）
	if($_POST['e_eria8']){
		$e_eria8 = htmlspecialchars($_POST['e_eria8'], ENT_QUOTES);
		if($e_eria8 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria8 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria8 = 'f';
	}
	//埼玉県（さいたま市・川口市・所沢市など）
	if($_POST['e_eria9']){
		$e_eria9 = htmlspecialchars($_POST['e_eria9'], ENT_QUOTES);
		if($e_eria9 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria9 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria9 = 'f';
	}
	//千葉県（千葉市・船橋市・浦安市など）
	if($_POST['e_eria10']){
		$e_eria10 = htmlspecialchars($_POST['e_eria10'], ENT_QUOTES);
		if($e_eria10 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria10 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria10 = 'f';
	}
	//その他エリア
	if($_POST['e_eria11']){
		$e_eria11 = htmlspecialchars($_POST['e_eria11'], ENT_QUOTES);
		if($e_eria11 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria11 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria11 = 'f';
	}
	//現住所のまま（リノベーションのみ）
	if($_POST['e_eria12']){
		$e_eria12 = htmlspecialchars($_POST['e_eria12'], ENT_QUOTES);
		if($e_eria12 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_eria12 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_eria12 = 'f';
	}
//	if($eriaflag != 1){
//		$e_eria_msg = "ご希望のエリアを入力してください。";
//	}
	//----------------------------------------------------------------------
	//沿線　駅　徒歩
	//----------------------------------------------------------------------
	if($_POST['e_ensen']){
		$e_ensen = htmlspecialchars($_POST['e_ensen'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_ensen);
		if($count_id > 100){
			$e_ensen_msg = "沿線は50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	if($_POST['e_eki']){
		$e_eki = htmlspecialchars($_POST['e_eki'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_eki);
		if($count_id > 100){
			$e_eki_msg = "駅は50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	if($_POST['e_toho']){
		$e_toho = htmlspecialchars($_POST['e_toho'], ENT_QUOTES);
		//半角数字
		if( ereg("^[0-9]+$",$e_toho)){
		
		}
		else{
			$e_toho_msg = "徒歩所要時間は半角数字のみで入力してください。";
			$errorflag = 1;
		}
		//50字制限                                                                                                    
		$count_id = strlen($e_toho);
		if($count_id > 100){
			$e_toho_msg = "徒歩所要時間は50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	//----------------------------------------------------------------------
	//予算（物件価格） 1～5、（リノベーション価格）1～5
	//----------------------------------------------------------------------
	if($_POST['e_yosanbukken']){
		$e_yosanbukken = htmlspecialchars($_POST['e_yosanbukken'], ENT_QUOTES);
		if($e_yosanbukken != '1' AND $e_yosanbukken != '2' AND $e_yosanbukken != '3' AND $e_yosanbukken != '4' AND $e_yosanbukken != '5'){
//			$e_yosanbukken_msg = "物件価格（予算）のご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
//	else{
//		$e_yosanbukken_msg = "物件価格（予算）のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	if($_POST['e_yosanrenoba']){
		$e_yosanrenoba = htmlspecialchars($_POST['e_yosanrenoba'], ENT_QUOTES);
		if($e_yosanrenoba != '1' AND $e_yosanrenoba != '2' AND $e_yosanrenoba != '3' AND $e_yosanrenoba != '4' AND $e_yosanrenoba != '5'){
//			$e_yosanrenoba_msg = "リノベーション価格（予算）のご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
//	else{
//		$e_yosanrenoba_msg = "リノベーション価格（予算）のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//希望の広さ
	//----------------------------------------------------------------------
	if($_POST['e_menseki']){
		$e_menseki = htmlspecialchars($_POST['e_menseki'], ENT_QUOTES);
		if($e_menseki != '1' AND $e_menseki != '2' AND $e_menseki != '3' AND $e_menseki != '4' AND $e_menseki != '5' AND $e_menseki != '6'){
//			$e_menseki_msg = "ご希望の広さのご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
//	else{
//		$e_menseki_msg = "ご希望の広さのご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//現在の住まい 1～5
	//----------------------------------------------------------------------
	if($_POST['e_sumai']){
		$e_sumai= htmlspecialchars($_POST['e_sumai'], ENT_QUOTES);
		if($e_sumai != '1' AND $e_sumai != '2' AND $e_sumai != '3' AND $e_sumai != '4' AND $e_sumai != '5'){
//			$e_sumai_msg = "現在のお住まいのご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
//	else{
//		$e_sumai_msg = "現在のお住まいのご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//家族構成　大人
	//----------------------------------------------------------------------
	if($_POST['e_kazokuotona']){
		$e_kazokuotona = htmlspecialchars($_POST['e_kazokuotona'], ENT_QUOTES);
		//2字制限
		$count_id = strlen($e_kazokuotona);
		if($count_id > 4){
			$e_kazokuotona_msg = "家族構成（大人の人数）は2桁以内で入力してください。";
			$errorflag = 1;
		}
	}
//	else{
//		$e_kazokuotona_msg = "家族構成（大人の人数）のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//家族構成　子ども
	//----------------------------------------------------------------------
	if($_POST['e_kazokukodomo1']){
		$e_kazokukodomo1 = htmlspecialchars($_POST['e_kazokukodomo1'], ENT_QUOTES);
		//2字制限
		$count_id = strlen($e_kazokukodomo1);
		if($count_id > 4){
			$e_kazokukodomo1_msg = "子供は2桁以内で入力してください。";
			$errorflag = 1;
		}
	}
//	else{
//		$e_kazokukodomo1_msg = "家族構成（小学生未満の人数）のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//家族構成　子ども 小学生
	//----------------------------------------------------------------------
	if($_POST['e_kazokukodomo2']){
		$e_kazokukodomo2 = htmlspecialchars($_POST['e_kazokukodomo2'], ENT_QUOTES);
		//6字制限
		$count_id = strlen($e_kazokukodomo2);
		if($count_id > 6){
			$e_kazokukodomo2_msg = "家族構成（小学生の人数）は3桁以内で入力してください。";
			$errorflag = 1;
		}
	}
//	else{
//		$e_kazokukodomo2_msg = "家族構成（小学生の人数）のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//家族構成　子ども 中学生
	//----------------------------------------------------------------------
	if($_POST['e_kazokukodomo3']){
		$e_kazokukodomo3 = htmlspecialchars($_POST['e_kazokukodomo3'], ENT_QUOTES);
		//6字制限
		$count_id = strlen($e_kazokukodomo3);
		if($count_id > 6){
			$e_kazokukodomo3_msg = "家族構成（中学生の人数）は3桁以内で入力してください。";
			$errorflag = 1;
		}
	}
//	else{
//		$e_kazokukodomo3_msg = "家族構成（中学生の人数）のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//家族構成　子ども 高校生
	//----------------------------------------------------------------------
	if($_POST['e_kazokukodomo4']){
		$e_kazokukodomo4 = htmlspecialchars($_POST['e_kazokukodomo4'], ENT_QUOTES);
		//6字制限
		$count_id = strlen($e_kazokukodomo4);
		if($count_id > 6){
			$e_kazokukodomo4_msg = "家族構成（高校生の人数）は3桁以内で入力してください。";
			$errorflag = 1;
		}
	}
//	else{
//		$e_kazokukodomo4_msg = "家族構成（高校生の人数）のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//家族構成　子ども 大学生以上
	//----------------------------------------------------------------------
	if($_POST['e_kazokukodomo5']){
		$e_kazokukodomo5 = htmlspecialchars($_POST['e_kazokukodomo5'], ENT_QUOTES);
		//6字制限
		$count_id = strlen($e_kazokukodomo5);
		if($count_id > 6){
			$e_kazokukodomo5_msg = "家族構成（大学生以上の人数）は3桁以内で入力してください。";
			$errorflag = 1;
		}
	}
//	else{
//		$e_kazokukodomo5_msg = "家族構成（大学生以上の人数）のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//希望間取り
	//----------------------------------------------------------------------
	if($_POST['e_kiboumadori']){
		$e_kiboumadori = htmlspecialchars($_POST['e_kiboumadori'], ENT_QUOTES);
		if($e_kiboumadori != '1' AND $e_kiboumadori != '2' AND $e_kiboumadori != '3' AND $e_kiboumadori != '4'){
//			$e_kiboumadori_msg = "希望間取りのご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
	//----------------------------------------------------------------------
	//年齢
	//----------------------------------------------------------------------
	if($_POST['e_nenrei']){
		$e_nenrei = htmlspecialchars($_POST['e_nenrei'], ENT_QUOTES);
		if($e_nenrei != '1' AND $e_nenrei != '2' AND $e_nenrei != '3' AND $e_nenrei != '4' AND $e_nenrei != '5' AND $e_nenrei != '6' AND $e_nenrei != '7' AND $e_nenrei != '8' AND $e_nenrei != '9'){
//			$e_nenrei_msg = "ご年齢のご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
//	else{
//		$e_nenrei_msg = "ご年齢のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//ご年収
	//----------------------------------------------------------------------
	if($_POST['e_syuunyuu']){
		$e_syuunyuu = htmlspecialchars($_POST['e_syuunyuu'], ENT_QUOTES);
		if($e_syuunyuu != '1' AND $e_syuunyuu != '2' AND $e_syuunyuu != '3' AND $e_syuunyuu != '4' AND $e_syuunyuu != '5'){
//			$e_syuunyuu_msg = "ご年収のご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
	//----------------------------------------------------------------------
	//希望の時期
	//----------------------------------------------------------------------
	if($_POST['e_jiki']){
		$e_jiki = htmlspecialchars($_POST['e_jiki'], ENT_QUOTES);
		if($e_jiki <=1 AND $e_jiki >=4){
//			$e_jiki_msg = "ご希望の時期のご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
//	else{
//		$e_jiki_msg = "ご希望の時期のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//購入検討のきっかけ
	//----------------------------------------------------------------------
	if($_POST['e_kounyuukikkake']){
		$e_kounyuukikkake = htmlspecialchars($_POST['e_kounyuukikkake'], ENT_QUOTES);
		if($e_kounyuukikkake != '1' AND $e_kounyuukikkake != '2' AND $e_kounyuukikkake != '3' AND $e_kounyuukikkake != '4' AND $e_kounyuukikkake != '5' AND $e_kounyuukikkake != '6' AND $e_kounyuukikkake != '7' AND $e_kounyuukikkake != '8'){
//			$e_kounyuukikkake_msg = "ご購入検討のきっかけのご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
}

if($errorflag !=1 AND $_POST['entrygo']){
require_once("design.php");

$HTMLTITLE ="会員登録";
$currentmenu = 30;


user_header_other($HTMLTITLE,$currentmenu);
?>
	<div id="pagetitle-other">
		<div class="row">
			<h2><img src="images/title-member.png" alt="会員登録" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>最新のリフォーム前未公開物件情報やリノベーション物件、セミナー情報、<br>オープンルーム情報などを優先的にお届けします！！</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="index.php">ホーム</a></li>
		<li class="arrow">会員登録</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>会員登録</span></div>
						<p class="bottom-10">下記内容をご確認いただき、「送信」ボタンをクリックしてください。</p>
						<img src="images/member-step02_on.png" />
						<div class="clear-box"></div>
						<FORM method="post" action="member_tourok.php">
						<table class="formTable">
						<th class="tablemidashi" colspan="2">お客様について</th>
						<tr>
						<th>
						お名前<span class="icon-required">必須</span>
						</th>
						<td>
						<?=$e_name?>
						</td>
						</tr>
						<tr>
						<th>
						ふりがな<span class="icon-required">必須</span>
						</th>
						<td>
						<?=$e_namefuri?>
						</td>
						</tr>
						<tr>
						<th>
						Eメール<span class="icon-required">必須</span>
						</th>
						<td>
						<?=$e_mail?>
						</td>
						</tr>
						<tr>
						<th>
						郵便番号<span class="icon-required">必須</span>
						</th>
						<td>
						<?=$e_yuubinbangou?>
						</td>
						</tr>
						<tr>
						<th>
						都道府県<span class="icon-required">必須</span>
						</th>
						<td>
						<?=$e_address1?>
						</td>
						</tr>
						<tr>
						<th>
						市区町村・番地<span class="icon-required">必須</span>
						</th>
						<td>
						<?=$e_address2?>
						</td>
						</tr>
						<tr>
						<th>
						建物等
						</th>
						<td>
						<?=$e_address3?>
						</td>
						</tr>
						<tr>
						<th>
						電話番号
						</th>
						<td>
						<?=$e_tel?>
						</td>
						</tr>
						<tr>
						<th>
						<div class="kaigyou">弊社をお知りになったきっかけ</div>
						</th>
						<td>
<?php
	if($e_kikkake == 1){
		print"Yahoo";
	}
	elseif($e_kikkake == 2){
		print"google";
	}
	elseif($e_kikkake == 3){
		print"HOME'S";
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
						<div class="clear-box"></div>
						<table class="formTable">
						<th class="tablemidashi" colspan="2">お住まいのご希望について</th>
						<tr>
						<th>
						お住まいのご希望
						</th> 
						<td>
<?php
	if($e_toiawasekoumoku == 1){
		print"リノベーション済の物件購入";
	}
	elseif($e_toiawasekoumoku == 2){
		print"中古マンションを買ってリノベーションしたい";
	}
	elseif($e_toiawasekoumoku == 3){
		print"自宅をリノベーションしたい";
	}
?>
						</td>
						</tr>
						<tr>
						<th>
						ご希望地域<br>(複数回答可)
						</th> 
						<td>
<?php
	if($e_eria1 == 't'){
		print"東京都<br>";
	}
	if($e_eria2 == 't'){
		print"都心エリア（千代田区・中央区・港区・新宿区・渋谷区・文京区）<br>";
	}
	if($e_eria3 == 't'){
		print"城南エリア（世田谷区・大田区・目黒区・品川区）<br>";
	}
	if($e_eria4 == 't'){
		print"城西エリア（中野区・杉並区・練馬区）<br>";
	}
	if($e_eria5 == 't'){
		print"城北エリア（豊島区・北区・板橋区・足立区）<br>";
	}
	if($e_eria6 == 't'){
		print"城東エリア（葛飾区・台東区・墨田区・江東区・江戸川区・荒川区）<br>";
	}
	if($e_eria7 == 't'){
		print"市部エリア（武蔵野市・三鷹市・小金井市・町田市など）<br>";
	}
	if($e_eria8 == 't'){
		print"神奈川県（横浜市・川崎市など）<br>";
	}
	if($e_eria9 == 't'){
		print"埼玉県（さいたま市・川口市・所沢市など）<br>";
	}
	if($e_eria10 == 't'){
		print"千葉県（千葉市・船橋市・浦安市など）<br>";
	}
	if($e_eria11 == 't'){
		print"その他エリア<br>";
	}
	if($e_eria12 == 't'){
		print"現住所のまま（リノベーションのみ）<br>";
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご希望の駅または沿線がある場合はご記入ください。
						</th>
						<td>
						<?=$e_ensen?>
<?php
	if($e_ensen){
?>
						線&nbsp;&nbsp;
<?php
	}
?>
						<?=$e_eki?>
<?php
	if($e_eki){
?>
						駅&nbsp;&nbsp;
<?php
	}
	if($e_toho){
?>
						徒歩<?=$e_toho?>
						分以内
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご予算（物件価格）
						</th>
						<td>
<?php
	if($e_yosanbukken == 1){
		print"1000万円～2000万円";
	}
	elseif($e_yosanbukken == 2){
		print"2000万円～3000万円";
	}
	elseif($e_yosanbukken == 3){
		print"3000万円～4000万円";
	}
	elseif($e_yosanbukken == 4){
		print"4000万円～5000万円";
	}
	elseif($e_yosanbukken == 5){
		print"5000万円～";
	}
?>
						</td>
						</tr>
						<tr> 
						<th>リノベーション費用
						</th>
						<td>
<?php
	if($e_yosanrenoba == 1){
		print"リノベーションしない";
	}
	elseif($e_yosanrenoba == 2){
		print"100万円未満";
	}
	elseif($e_yosanrenoba == 3){
		print"100万円～300万円";
	}
	elseif($e_yosanrenoba == 4){
		print"300万円～500万円";
	}
	elseif($e_yosanrenoba == 5){
		print"500万円～";
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご希望の広さ
						</th>
						<td>
<?php
	if($e_menseki == 1){
		print"50平方メートル未満";
	}
	elseif($e_menseki == 2){
		print"50平方メートル～";
	}
	elseif($e_menseki == 3){
		print"60平方メートル～";
	}
	elseif($e_menseki == 4){
		print"70平方メートル～";
	}
	elseif($e_menseki == 5){
		print"80平方メートル～";
	}
	elseif($e_menseki == 6){
		print"90平方メートル～";
	}
?>
						</td>
						</tr>
						<tr> 
						<th>現在のお住まい
						</th>
						<td>
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
						<th>家族構成
						</th>
						<td>
<?php
	if($e_kazokuotona == 1 OR $e_kazokuotona == 2 OR $e_kazokuotona == 3 OR $e_kazokuotona == 4 OR $e_kazokuotona == 5 OR $e_kazokuotona == 6 OR $e_kazokuotona == 7 OR $e_kazokuotona == 8 OR $e_kazokuotona == 9 OR $e_kazokuotona == 10){
?>
						大人
<?php
	}
	if($e_kazokuotona == 1){
		print"1";
	}
	elseif($e_kazokuotona == 2){
		print"2";
	}
	elseif($e_kazokuotona == 3){
		print"3";
	}
	elseif($e_kazokuotona == 4){
		print"4";
	}
	elseif($e_kazokuotona == 5){
		print"5";
	}
	elseif($e_kazokuotona == 6){
		print"6";
	}
	elseif($e_kazokuotona == 7){
		print"7";
	}
	elseif($e_kazokuotona == 8){
		print"8";
	}
	elseif($e_kazokuotona == 9){
		print"9";
	}
	elseif($e_kazokuotona == 10){
		print"10";
	}
	if($e_kazokuotona == 1 OR $e_kazokuotona == 2 OR $e_kazokuotona == 3 OR $e_kazokuotona == 4 OR $e_kazokuotona == 5 OR $e_kazokuotona == 6 OR $e_kazokuotona == 7 OR $e_kazokuotona == 8 OR $e_kazokuotona == 9 OR $e_kazokuotona == 10){
		print"人";
		print"&nbsp;&nbsp;&nbsp;";
	}
	if($e_kazokukodomo1 == 1 OR $e_kazokukodomo1 == 2 OR $e_kazokukodomo1 == 3 OR $e_kazokukodomo1 == 4 OR $e_kazokukodomo1 == 5 OR $e_kazokukodomo1 == 6 OR $e_kazokukodomo1 == 7 OR $e_kazokukodomo1 == 8 OR $e_kazokukodomo1 == 9 OR $e_kazokukodomo1 == 10){
		print"子供";
	}
	if($e_kazokukodomo1 == 1){
		print"1";
	}
	elseif($e_kazokukodomo1 == 2){
		print"2";
	}
	elseif($e_kazokukodomo1 == 3){
		print"3";
	}
	elseif($e_kazokukodomo1 == 4){
		print"4";
	}
	elseif($e_kazokukodomo1 == 5){
		print"5";
	}
	elseif($e_kazokukodomo1 == 6){
		print"6";
	}
	elseif($e_kazokukodomo1 == 7){
		print"7";
	}
	elseif($e_kazokukodomo1 == 8){
		print"8";
	}
	elseif($e_kazokukodomo1 == 9){
		print"9";
	}
	elseif($e_kazokukodomo1 == 10){
		print"10";
	}
	if($e_kazokukodomo1 == 1 OR $e_kazokukodomo1 == 2 OR $e_kazokukodomo1 == 3 OR $e_kazokukodomo1 == 4 OR $e_kazokukodomo1 == 5 OR $e_kazokukodomo1 == 6 OR $e_kazokukodomo1 == 7 OR $e_kazokukodomo1 == 8 OR $e_kazokukodomo1 == 9 OR $e_kazokukodomo1 == 10){
?>
						人
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>希望間取り
						</th>
						<td>
<?php
	if($e_kiboumadori == 1){
		print"3LDK";
	}
	elseif($e_kiboumadori == 2){
		print"2LDK";
	}
	elseif($e_kiboumadori == 3){
		print"1LDK";
	}
	elseif($e_kiboumadori == 4){
		print"ほか";
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご年齢
						</th>
						<td>
<?php
	if($e_nenrei == 1){
		print"20代前半";
	}
	elseif($e_nenrei == 2){
		print"20代後半";
	}
	elseif($e_nenrei == 3){
		print"30代前半";
	}
	elseif($e_nenrei == 4){
		print"30代後半";
	}
	elseif($e_nenrei == 5){
		print"40代前半";
	}
	elseif($e_nenrei == 6){
		print"40代後半";
	}
	elseif($e_nenrei == 7){
		print"50代前半";
	}
	elseif($e_nenrei == 8){
		print"50代後半";
	}
	elseif($e_nenrei == 9){
		print"その他";
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご年収
						</th>
						<td>
<?php
	if($e_syuunyuu == 1){
		print"～400万円";
	}
	elseif($e_syuunyuu == 2){
		print"～600万円";
	}
	elseif($e_syuunyuu == 3){
		print"～800万円";
	}
	elseif($e_syuunyuu == 4){
		print"～1000万円";
	}
	elseif($e_syuunyuu == 5){
		print"1000万円～";
	}
?>
						</td>
						</tr>
						<tr> 
						<th>お引渡し希望時期
						</th>
						<td>
<?php
	if($e_jiki == 1){
		print"すぐに";
	}
	elseif($e_jiki == 2){
		print"半年内";
	}
	elseif($e_jiki == 3){
		print"一年内";
	}
	elseif($e_jiki == 4){
		print"いい物件があれば";
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご購入検討のきっかけ
						</th>
						<td>
<?php
	if($e_kounyuukikkake == 1){
		print"もっと広い部屋に住みたい";
	}
	elseif($e_kounyuukikkake == 2){
		print"交通の便がよいところに住みたい";
	}
	elseif($e_kounyuukikkake == 3){
		print"家賃がもったいない";
	}
	elseif($e_kounyuukikkake == 4){
		print"結婚";
	}
	elseif($e_kounyuukikkake == 5){
		print"出産・子育てを機に";
	}
	elseif($e_kounyuukikkake == 6){
		print"転勤・仕事の都合で";
	}
	elseif($e_kounyuukikkake == 7){
		print"マイホームが欲しい";
	}
?>
						</td>
						</tr>
						</table>
						<div class="clear-box"></div>
						<table class="formTable">
						<tr> 
						<th class="tablemidashi" colspan="2">個人情報の取り扱いについて
						</th> 
						</tr>
						<td> 
						情報を送信していただく前に、
						当社の<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">『個人情報保護方針』</a>に同意していただくことが必要です。<br>
						個人情報保護方針をご精読の上、同意できる場合は<b>［個人情報保護方針に同意して送信］</b>のボタンをクリックしてください。
						</td>
						</tr>
						</table>
						<div class="botancenter">
						<input type="submit" name="entrysousin" value="個人情報保護方針に同意して送信"  class="sousin_button">
						<input type="hidden" name="e_name" value="<?=$e_name?>">
						<input type="hidden" name="e_tel" value="<?=$e_tel?>">
						<input type="hidden" name="e_mail" value="<?=$e_mail?>">
						<input type="hidden" name="e_mail_check" value="<?=$e_mail_check?>">
						<input type="hidden" name="e_yuubinbangou" value="<?=$e_yuubinbangou?>">
						<input type="hidden" name="e_namefuri" value="<?=$e_namefuri?>">
						<input type="hidden" name="e_address1" value="<?=$e_address1?>">
						<input type="hidden" name="e_address2" value="<?=$e_address2?>">
						<input type="hidden" name="e_address3" value="<?=$e_address3?>">
						<input type="hidden" name="e_kikkake" value="<?=$e_kikkake?>">
						<input type="hidden" name="e_toiawasekoumoku" value="<?=$e_toiawasekoumoku?>">
						<input type="hidden" name="e_eria1" value="<?=$e_eria1?>">
						<input type="hidden" name="e_eria2" value="<?=$e_eria2?>">
						<input type="hidden" name="e_eria3" value="<?=$e_eria3?>">
						<input type="hidden" name="e_eria4" value="<?=$e_eria4?>">
						<input type="hidden" name="e_eria5" value="<?=$e_eria5?>">
						<input type="hidden" name="e_eria6" value="<?=$e_eria6?>">
						<input type="hidden" name="e_eria7" value="<?=$e_eria7?>">
						<input type="hidden" name="e_eria8" value="<?=$e_eria8?>">
						<input type="hidden" name="e_eria9" value="<?=$e_eria9?>">
						<input type="hidden" name="e_eria10" value="<?=$e_eria10?>">
						<input type="hidden" name="e_eria11" value="<?=$e_eria11?>">
						<input type="hidden" name="e_eria12" value="<?=$e_eria12?>">
						<input type="hidden" name="e_ensen" value="<?=$e_ensen?>">
						<input type="hidden" name="e_eki" value="<?=$e_eki?>">
						<input type="hidden" name="e_toho" value="<?=$e_toho?>">
						<input type="hidden" name="e_yosanbukken" value="<?=$e_yosanbukken?>">
						<input type="hidden" name="e_yosanrenoba" value="<?=$e_yosanrenoba?>">
						<input type="hidden" name="e_menseki" value="<?=$e_menseki?>">
						<input type="hidden" name="e_sumai" value="<?=$e_sumai?>">
						<input type="hidden" name="e_kazokuotona" value="<?=$e_kazokuotona?>">
						<input type="hidden" name="e_kazokukodomo1" value="<?=$e_kazokukodomo1?>">
						<input type="hidden" name="e_kiboumadori" value="<?=$e_kiboumadori?>">
						<input type="hidden" name="e_nenrei" value="<?=$e_nenrei?>">
						<input type="hidden" name="e_syuunyuu" value="<?=$e_syuunyuu?>">
						<input type="hidden" name="e_jiki" value="<?=$e_jiki?>">
						<input type="hidden" name="e_kounyuukikkake" value="<?=$e_kounyuukikkake?>">
						</div>
						</FORM>
					</section>
				</div>
				<div id="sidebar" class="col one-fourth left">
<?php
//サイドバナー下層ページ共通
user_sidebanner_other($currentmenu);
?>
				</div>
			</div>
		</article>
<?php
user_footer_other($currentmenu);
}
elseif($errorflag !=1 AND $_POST['entrysousin']){
//-----------------------------
//会員登録メール（スター・マイカ・レジデンスHPより）
//-----------------------------
$ouboto = "toiawase@starmica.co.jp";
//$ouboto = "info@faboc.co.jp";
$oubosubject = "会員登録メール（スター・マイカ・レジデンスHP）";


	if($e_kikkake == 1){
		$e_kikkake_h = "Yahoo";
	}
	elseif($e_kikkake == 2){
		$e_kikkake_h = "google";
	}
	elseif($e_kikkake == 3){
		$e_kikkake_h = "HOME'S";
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
	if($e_toiawasekoumoku == 1){
		$e_toiawasekoumoku_h = "リノベーション済の物件購入";
	}
	elseif($e_toiawasekoumoku == 2){
		$e_toiawasekoumoku_h = "中古マンションを買ってリノベーションしたい";
	}
	elseif($e_toiawasekoumoku == 3){
		$e_toiawasekoumoku_h = "自宅をリノベーションしたい";
	}

	if($e_eria1 == 't'){
		$e_eria1_h = "東京都";
	}
	elseif($e_eria1 == 't'){
		$e_eria1_h = "";
	}
	if($e_eria2 == 't'){
		$e_eria2_h = "都心エリア（千代田区・中央区・港区・新宿区・渋谷区・文京区）";
	}
	elseif($e_eria2 == 't'){
		$e_eria2_h = "";
	}
	if($e_eria3 == 't'){
		$e_eria3_h = "城南エリア（世田谷区・大田区・目黒区・品川区）";
	}
	elseif($e_eria3 == 't'){
		$e_eria3_h = "";
	}
	if($e_eria4 == 't'){
		$e_eria4_h = "城西エリア（中野区・杉並区・練馬区）";
	}
	elseif($e_eria4 == 't'){
		$e_eria4_h = "";
	}
	if($e_eria5 == 't'){
		$e_eria5_h = "城北エリア（豊島区・北区・板橋区・足立区）";
	}
	elseif($e_eria5 == 't'){
		$e_eria5_h = "";
	}
	if($e_eria6 == 't'){
		$e_eria6_h = "城東エリア（葛飾区・台東区・墨田区・江東区・江戸川区・荒川区）";
	}
	elseif($e_eria6 == 't'){
		$e_eria6_h = "";
	}
	if($e_eria7 == 't'){
		$e_eria7_h = "市部エリア（武蔵野市・三鷹市・小金井市・町田市など）";
	}
	elseif($e_eria7 == 't'){
		$e_eria7_h = "";
	}
	if($e_eria8 == 't'){
		$e_eria8_h = "神奈川県（横浜市・川崎市など）";
	}
	elseif($e_eria8 == 't'){
		$e_eria8_h = "";
	}
	if($e_eria9 == 't'){
		$e_eria9_h = "埼玉県（さいたま市・川口市・所沢市など）";
	}
	elseif($e_eria9 == 't'){
		$e_eria9_h = "";
	}
	if($e_eria10 == 't'){
		$e_eria10_h = "千葉県（千葉市・船橋市・浦安市など）";
	}
	elseif($e_eria10 == 't'){
		$e_eria10_h = "";
	}
	if($e_eria11 == 't'){
		$e_eria11_h = "その他エリア";
	}
	elseif($e_eria11 == 't'){
		$e_eria11_h = "";
	}
	if($e_eria12 == 't'){
		$e_eria12_h = "現住所のまま（リノベーションのみ）";
	}
	elseif($e_eria12 == 't'){
		$e_eria12_h = "";
	}

	if($e_yosanbukken == 1){
		$e_yosanbukken_h = "1000万円～2000万円";
	}
	elseif($e_yosanbukken == 2){
		$e_yosanbukken_h = "2000万円～3000万円";
	}
	elseif($e_yosanbukken == 3){
		$e_yosanbukken_h = "3000万円～4000万円";
	}
	elseif($e_yosanbukken == 4){
		$e_yosanbukken_h = "4000万円～5000万円";
	}
	elseif($e_yosanbukken == 5){
		$e_yosanbukken_h = "5000万円～";
	}

	if($e_yosanrenoba == 1){
		$e_yosanrenoba_h = "リノベーションしない";
	}
	elseif($e_yosanrenoba == 2){
		$e_yosanrenoba_h = "100万円未満";
	}
	elseif($e_yosanrenoba == 3){
		$e_yosanrenoba_h = "100万円～300万円";
	}
	elseif($e_yosanrenoba == 4){
		$e_yosanrenoba_h = "300万円～500万円";
	}
	elseif($e_yosanrenoba == 5){
		$e_yosanrenoba_h = "500万円～";
	}

	if($e_menseki == 1){
		$e_menseki_h = "50平方メートル未満";
	}
	elseif($e_menseki == 2){
		$e_menseki_h = "50平方メートル～";
	}
	elseif($e_menseki == 3){
		$e_menseki_h = "60平方メートル～";
	}
	elseif($e_menseki == 4){
		$e_menseki_h = "70平方メートル～";
	}
	elseif($e_menseki == 5){
		$e_menseki_h = "80平方メートル～";
	}
	elseif($e_menseki == 6){
		$e_menseki_h = "90平方メートル～";
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

	if($e_kazokuotona == 1){
		$e_kazokuotona_h = "1";
	}
	elseif($e_kazokuotona == 2){
		$e_kazokuotona_h = "2";
	}
	elseif($e_kazokuotona == 3){
		$e_kazokuotona_h = "3";
	}
	elseif($e_kazokuotona == 4){
		$e_kazokuotona_h = "4";
	}
	elseif($e_kazokuotona == 5){
		$e_kazokuotona_h = "5";
	}
	elseif($e_kazokuotona == 6){
		$e_kazokuotona_h = "6";
	}
	elseif($e_kazokuotona == 7){
		$e_kazokuotona_h = "7";
	}
	elseif($e_kazokuotona == 8){
		$e_kazokuotona_h = "8";
	}
	elseif($e_kazokuotona == 9){
		$e_kazokuotona_h = "9";
	}
	elseif($e_kazokuotona == 10){
		$e_kazokuotona_h = "10";
	}

	if($e_kazokukodomo1 == 1){
		$e_kazokukodomo1_h = "1";
	}
	elseif($e_kazokukodomo1 == 2){
		$e_kazokukodomo1_h = "2";
	}
	elseif($e_kazokukodomo1 == 3){
		$e_kazokukodomo1_h = "3";
	}
	elseif($e_kazokukodomo1 == 4){
		$e_kazokukodomo1_h = "4";
	}
	elseif($e_kazokukodomo1 == 5){
		$e_kazokukodomo1_h = "5";
	}
	elseif($e_kazokukodomo1 == 6){
		$e_kazokukodomo1_h = "6";
	}
	elseif($e_kazokukodomo1 == 7){
		$e_kazokukodomo1_h = "7";
	}
	elseif($e_kazokukodomo1 == 8){
		$e_kazokukodomo1_h = "8";
	}
	elseif($e_kazokukodomo1 == 9){
		$e_kazokukodomo1_h = "9";
	}
	elseif($e_kazokukodomo1 == 10){
		$e_kazokukodomo1_h = "10";
	}

	if($e_kiboumadori == 1){
		$e_kiboumadori_h = "3LDK";
	}
	elseif($e_kiboumadori == 2){
		$e_kiboumadori_h = "2LDK";
	}
	elseif($e_kiboumadori == 3){
		$e_kiboumadori_h = "1LDK";
	}
	elseif($e_kiboumadori == 4){
		$e_kiboumadori_h = "ほか";
	}

	if($e_nenrei == 1){
		$e_nenrei_h = "20代前半";
	}
	elseif($e_nenrei == 2){
		$e_nenrei_h = "20代後半";
	}
	elseif($e_nenrei == 3){
		$e_nenrei_h = "30代前半";
	}
	elseif($e_nenrei == 4){
		$e_nenrei_h = "30代後半";
	}
	elseif($e_nenrei == 5){
		$e_nenrei_h = "40代前半";
	}
	elseif($e_nenrei == 6){
		$e_nenrei_h = "40代後半";
	}
	elseif($e_nenrei == 7){
		$e_nenrei_h = "50代前半";
	}
	elseif($e_nenrei == 8){
		$e_nenrei_h = "50代後半";
	}
	elseif($e_nenrei == 9){
		$e_nenrei_h = "その他";
	}

	if($e_syuunyuu == 1){
		$e_syuunyuu_h = "～400万円";
	}
	elseif($e_syuunyuu == 2){
		$e_syuunyuu_h = "～600万円";
	}
	elseif($e_syuunyuu == 3){
		$e_syuunyuu_h = "～800万円";
	}
	elseif($e_syuunyuu == 4){
		$e_syuunyuu_h = "～1000万円";
	}
	elseif($e_syuunyuu == 5){
		$e_syuunyuu_h = "1000万円～";
	}

	if($e_jiki == 1){
		$e_jiki_h = "すぐに";
	}
	elseif($e_jiki == 2){
		$e_jiki_h = "半年内";
	}
	elseif($e_jiki == 3){
		$e_jiki_h = "一年内";
	}
	elseif($e_jiki == 4){
		$e_jiki_h = "いい物件があれば";
	}

	if($e_kounyuukikkake == 1){
		$e_kounyuukikkake_h = "もっと広い部屋に住みたい";
	}
	elseif($e_kounyuukikkake == 2){
		$e_kounyuukikkake_h = "交通の便がよいところに住みたい";
	}
	elseif($e_kounyuukikkake == 3){
		$e_kounyuukikkake_h = "家賃がもったいない";
	}
	elseif($e_kounyuukikkake == 4){
		$e_kounyuukikkake_h = "結婚";
	}
	elseif($e_kounyuukikkake == 5){
		$e_kounyuukikkake_h = "出産・子育てを機に";
	}
	elseif($e_kounyuukikkake == 6){
		$e_kounyuukikkake_h = "転勤・仕事の都合で";
	}
	elseif($e_kounyuukikkake == 7){
		$e_kounyuukikkake_h = "マイホームが欲しい";
	}

	if($e_ensen){
		$e_ensen_h = $e_ensen."線";
	}
	if($e_eki){
		$e_eki_h = $e_eki."駅";
	}
	if($e_toho){
		$e_toho_h = $e_toho."分以内";
	}

$oubomessage = <<<_EOT_

￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信情報は以下の通りです。

お客様情報
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
■お名前	：$e_name
■ふりがな	：$e_namefuri
■メールアドレス：$e_mail
■郵便番号	：$e_yuubinbangou
■都道府県	：$e_address1
■市区町村・番地：$e_address2
■建物等	：$e_address3
■電話番号	：$e_tel
■弊社をお知りになったきっかけ	：$e_kikkake_h

お住まいの情報
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
■お住まいのご希望：$e_toiawasekoumoku_h
■希望のエリア：
$e_eria1_h
$e_eria2_h
$e_eria3_h
$e_eria4_h
$e_eria5_h
$e_eria6_h
$e_eria7_h
$e_eria8_h
$e_eria9_h
$e_eria10_h
$e_eria11_h
$e_eria12_h
■希望の沿線・駅：
$e_ensen_h
$e_eki_h
$e_toho_h
■予算（物件価格）	：$e_yosanbukken_h
■予算（リノベーション）	：$e_yosanrenoba_h
■希望の広さ		：$e_menseki_h
■現在のお住まい	：$e_sumai_h
■家族構成（大人）	：$e_kazokuotona_h
■家族構成（子供）	：$e_kazokukodomo1_h
■希望間取り　　：$e_kiboumadori_h
■年齢		：$e_nenrei_h
■年収		：$e_syuunyuu_h
■希望の時期	：$e_jiki_h
■購入のきっかけ	：$e_kounyuukikkake_h

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

	//このプログラムがUTF-8で書かれていることを宣言
	ini_set("mbstring.internal_encoding","UTF-8"); 

	//Unicode（UTf-8）でメール送信するための宣言。この宣言により、mb_send_mail()関数利用時に、下記の赤字のヘッダーが自動付与され送信されます。
	mb_language("uni");

	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

$oubomailresult = mb_send_mail($ouboto,$oubosubject,$oubomessage,$ouboadd_header);


$to2 = $e_mail;
$subject2 = "会員登録　完了のお知らせ【スター・マイカ・レジデンス】";
$atena = $e_name."様";

$message2 = <<<_EOT_

$atena

この度はスター・マイカ・レジデンスに会員登録をしていただきまことにありがとうございます。
順次担当者からご連絡をさせて頂きますので、今しばらくお待ちください。

本メールはお申し込みをして頂いたお客さまに自動配信されております。

※このメールにお心当たりのない方はお手数ですが、下記よりお問い合わせください。

▼お問い合わせはこちら

-----------------------------------------------
スター・マイカ・レジデンス株式会社
https://www.starmica-r.co.jp/contactus.php
フリーコール：0120-261-621　受付時間：9：30AM～6：30PM
-----------------------------------------------


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

	//このプログラムがUTF-8で書かれていることを宣言
	ini_set("mbstring.internal_encoding","UTF-8"); 

	//Unicode（UTf-8）でメール送信するための宣言。この宣言により、mb_send_mail()関数利用時に、下記の赤字のヘッダーが自動付与され送信されます。
	mb_language("uni");

	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

$oubomailresult = mb_send_mail($to2,$subject2,$message2,$add_header2);


//別ページへ飛ぶ
header("Location:thanks_inquiry2.php");
exit();

}

//会員登録フォーム
else{
require_once("design.php");

$HTMLTITLE ="会員登録";
$currentmenu = 30;


user_header_other($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-other">
		<div class="row">
			<h2><img src="images/title-member.png" alt="会員登録" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>最新のリフォーム前未公開物件情報やリノベーション物件、セミナー情報、<br>オープンルーム情報などを優先的にお届けします！！</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="index.php">ホーム</a></li>
		<li class="arrow">会員登録</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>会員登録</span></div>
						<p class="bottom-10">以下の項目にご記入ください。記入が終わりましたら、最後に「確認する」ボタンを押してください。</p>
						<img src="images/member-step01_on.png" />
						<div class="clear-box"></div>
						<FORM method="post" action="member_tourok.php">
						<table class="formTable">
						<th class="tablemidashi" colspan="2">お客様について</th>
						<tr>
						<th>
						お名前<span class="icon-required">必須</span>
						</th>
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
						ふりがな<span class="icon-required">必須</span>
						</th>
						<td>
						<input type="text" name="e_namefuri" value="<?=$e_namefuri?>" style="width:50%;background-color:#f1cdc8" placeholder="例：たなかいちろう" class="form-control">
						<span class="supportmsg">（例：たなかいちろう）</span>
<?php
	if($e_namefuri_msg){
?>
					<div id="errmsg"><?=$e_namefuri_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr>
						<th>
						Eメール<span class="icon-required">必須</span>
						</th>
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
						郵便番号<span class="icon-required">必須</span>
						</th>
						<td>
						<input type="text" name="e_yuubinbangou" style="width:30%;background-color:#f1cdc8;ime-mode:disabled" value="<?=$e_yuubinbangou?>" placeholder="例：105-6028" class="form-control">
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
						都道府県<span class="icon-required">必須</span>
						</th>
						<td>
						<SELECT NAME="e_address1" size="1" style="width:30%;background-color:#f1cdc8">
<?php
	if($e_address1){
		if($e_address1 == '東京都'){
			print"<OPTION Value='東京都'>";
			print"東京都";
			print"</option>";
		}
		elseif($e_address1 == '神奈川県'){
			print"<OPTION Value='神奈川県'>";
			print"神奈川県";
			print"</option>";
		}
		elseif($e_address1 == '埼玉県'){
			print"<OPTION Value='埼玉県'>";
			print"埼玉県";
			print"</option>";
		}
		elseif($e_address1 == '千葉県'){
			print"<OPTION Value='千葉県'>";
			print"千葉県";
			print"</option>";
		}
		elseif($e_address1 == '茨城県'){
			print"<OPTION Value='茨城県'>";
			print"茨城県";
			print"</option>";
		}
		elseif($e_address1 == '栃木県'){
			print"<OPTION Value='栃木県'>";
			print"栃木県";
			print"</option>";
		}
		elseif($e_address1 == '群馬県'){
			print"<OPTION Value='群馬県'>";
			print"群馬県";
			print"</option>";
		}
		elseif($e_address1 == '山梨県'){
			print"<OPTION Value='山梨県'>";
			print"山梨県";
			print"</option>";
		}
		elseif($e_address1 == '大阪府'){
			print"<OPTION Value='大阪府'>";
			print"大阪府";
			print"</option>";
		}
		elseif($e_address1 == '京都府'){
			print"<OPTION Value='京都府'>";
			print"京都府";
			print"</option>";
		}
		elseif($e_address1 == '兵庫県'){
			print"<OPTION Value='兵庫県'>";
			print"兵庫県";
			print"</option>";
		}
		elseif($e_address1 == '奈良県'){
			print"<OPTION Value='奈良県'>";
			print"奈良県";
			print"</option>";
		}
		elseif($e_address1 == '滋賀県'){
			print"<OPTION Value='滋賀県'>";
			print"滋賀県";
			print"</option>";
		}
		elseif($e_address1 == '和歌山県'){
			print"<OPTION Value='和歌山県'>";
			print"和歌山県";
			print"</option>";
		}
		elseif($e_address1 == '愛知県'){
			print"<OPTION Value='愛知県'>";
			print"愛知県";
			print"</option>";
		}
		elseif($e_address1 == '静岡県'){
			print"<OPTION Value='静岡県'>";
			print"静岡県";
			print"</option>";
		}
		elseif($e_address1 == '岐阜県'){
			print"<OPTION Value='岐阜県'>";
			print"岐阜県";
			print"</option>";
		}
		elseif($e_address1 == '三重県'){
			print"<OPTION Value='三重県'>";
			print"三重県";
			print"</option>";
		}
		elseif($e_address1 == '北海道'){
			print"<OPTION Value='北海道'>";
			print"北海道";
			print"</option>";
		}
		elseif($e_address1 == '青森県'){
			print"<OPTION Value='青森県'>";
			print"青森県";
			print"</option>";
		}
		elseif($e_address1 == '秋田県'){
			print"<OPTION Value='秋田県'>";
			print"秋田県";
			print"</option>";
		}
		elseif($e_address1 == '岩手県'){
			print"<OPTION Value='岩手県'>";
			print"岩手県";
			print"</option>";
		}
		elseif($e_address1 == '山形県'){
			print"<OPTION Value='山形県'>";
			print"山形県";
			print"</option>";
		}
		elseif($e_address1 == '宮城県'){
			print"<OPTION Value='宮城県'>";
			print"宮城県";
			print"</option>";
		}
		elseif($e_address1 == '福島県'){
			print"<OPTION Value='福島県'>";
			print"福島県";
			print"</option>";
		}
		elseif($e_address1 == '長野県'){
			print"<OPTION Value='長野県'>";
			print"長野県";
			print"</option>";
		}
		elseif($e_address1 == '新潟県'){
			print"<OPTION Value='新潟県'>";
			print"新潟県";
			print"</option>";
		}
		elseif($e_address1 == '富山県'){
			print"<OPTION Value='富山県'>";
			print"富山県";
			print"</option>";
		}
		elseif($e_address1 == '石川県'){
			print"<OPTION Value='石川県'>";
			print"石川県";
			print"</option>";
		}
		elseif($e_address1 == '福井県'){
			print"<OPTION Value='福井県'>";
			print"福井県";
			print"</option>";
		}
		elseif($e_address1 == '鳥取県'){
			print"<OPTION Value='鳥取県'>";
			print"鳥取県";
			print"</option>";
		}
		elseif($e_address1 == '岡山県'){
			print"<OPTION Value='岡山県'>";
			print"岡山県";
			print"</option>";
		}
		elseif($e_address1 == '島根県'){
			print"<OPTION Value='島根県'>";
			print"島根県";
			print"</option>";
		}
		elseif($e_address1 == '広島県'){
			print"<OPTION Value='広島県'>";
			print"広島県";
			print"</option>";
		}
		elseif($e_address1 == '山口県'){
			print"<OPTION Value='山口県'>";
			print"山口県";
			print"</option>";
		}
		elseif($e_address1 == '高知県'){
			print"<OPTION Value='高知県'>";
			print"高知県";
			print"</option>";
		}
		elseif($e_address1 == '愛媛県'){
			print"<OPTION Value='愛媛県'>";
			print"愛媛県";
			print"</option>";
		}
		elseif($e_address1 == '香川県'){
			print"<OPTION Value='香川県'>";
			print"香川県";
			print"</option>";
		}
		elseif($e_address1 == '徳島県'){
			print"<OPTION Value='徳島県'>";
			print"徳島県";
			print"</option>";
		}
		elseif($e_address1 == '福岡県'){
			print"<OPTION Value='福岡県'>";
			print"福岡県";
			print"</option>";
		}
		elseif($e_address1 == '大分県'){
			print"<OPTION Value='大分県'>";
			print"大分県";
			print"</option>";
		}
		elseif($e_address1 == '佐賀県'){
			print"<OPTION Value='佐賀県'>";
			print"佐賀県";
			print"</option>";
		}
		elseif($e_address1 == '熊本県'){
			print"<OPTION Value='熊本県'>";
			print"熊本県";
			print"</option>";
		}
		elseif($e_address1 == '宮崎県'){
			print"<OPTION Value='宮崎県'>";
			print"宮崎県";
			print"</option>";
		}
		elseif($e_address1 == '鹿児島県'){
			print"<OPTION Value='鹿児島県'>";
			print"鹿児島県";
			print"</option>";
		}
		elseif($e_address1 == '長崎県'){
			print"<OPTION Value='長崎県'>";
			print"長崎県";
			print"</option>";
		}
		elseif($e_address1 == '沖縄県'){
			print"<OPTION Value='沖縄県'>";
			print"沖縄県";
			print"</option>";
		}
	}
?>
						<option value=''>---</option>
						<OPTION Value="東京都">東京都</option>
						<OPTION Value="神奈川県">神奈川県</option>
						<OPTION Value="埼玉県">埼玉県</option>
						<OPTION Value="千葉県">千葉県</option>
						<OPTION Value="茨城県">茨城県</option>
						<OPTION Value="栃木県">栃木県</option>
						<OPTION Value="群馬県">群馬県</option>
						<OPTION Value="山梨県">山梨県</option>
						<OPTION Value="大阪府">大阪府</option>
						<OPTION Value="京都府">京都府</option>
						<OPTION Value="兵庫県">兵庫県</option>
						<OPTION Value="奈良県">奈良県</option>
						<OPTION Value="滋賀県">滋賀県</option>
						<OPTION Value="和歌山県">和歌山県</option>
						<OPTION Value="愛知県">愛知県</option>
						<OPTION Value="静岡県">静岡県</option>
						<OPTION Value="岐阜県">岐阜県</option>
						<OPTION Value="三重県">三重県</option>
						<OPTION Value="北海道">北海道</option>
						<OPTION Value="青森県">青森県</option>
						<OPTION Value="秋田県">秋田県</option>
						<OPTION Value="岩手県">岩手県</option>
						<OPTION Value="山形県">山形県</option>
						<OPTION Value="宮城県">宮城県</option>
						<OPTION Value="福島県">福島県</option>
						<OPTION Value="長野県">長野県</option>
						<OPTION Value="新潟県">新潟県</option>
						<OPTION Value="富山県">富山県</option>
						<OPTION Value="石川県">石川県</option>
						<OPTION Value="福井県">福井県</option>
						<OPTION Value="鳥取県">鳥取県</option>
						<OPTION Value="岡山県">岡山県</option>
						<OPTION Value="島根県">島根県</option>
						<OPTION Value="広島県">広島県</option>
						<OPTION Value="山口県">山口県</option>
						<OPTION Value="高知県">高知県</option>
						<OPTION Value="愛媛県">愛媛県</option>
						<OPTION Value="香川県">香川県</option>
						<OPTION Value="徳島県">徳島県</option>
						<OPTION Value="福岡県">福岡県</option>
						<OPTION Value="大分県">大分県</option>
						<OPTION Value="佐賀県">佐賀県</option>
						<OPTION Value="熊本県">熊本県</option>
						<OPTION Value="宮崎県">宮崎県</option>
						<OPTION Value="鹿児島県">鹿児島県</option>
						<OPTION Value="長崎県">長崎県</option>
						<OPTION Value="沖縄県">沖縄県</option>
						</SELECT>
<?php
	if($e_address1_msg){
?>
					<div id="errmsg"><?=$e_address1_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr>
						<th>
						市区町村・番地<span class="icon-required">必須</span>
						</th>
						<td>
						<input type="text" name="e_address2" style="width:50%;background-color:#f1cdc8" value="<?=$e_address2?>" placeholder="例：港区虎ノ門4-3-1" class="form-control"><br>
						<span class="supportmsg">（例：港区虎ノ門4-3-1）</span>
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
						建物名等
						</th>
						<td>
						<input type="text" name="e_address3" style="width:50%" value="<?=$e_address3?>" placeholder="例：城山トラストタワー28階" class="form-control"><br>
						<span class="supportmsg">（例：城山トラストタワー28階）</span>
<?php
	if($e_address3_msg){
?>
					<div id="errmsg"><?=$e_address3_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr>
						<th>
						電話番号
						</th>
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
						<div class="kaigyou">弊社をお知りになったきっかけ</div>
						</th>
						<td>
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
						HOME'S
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
						<div class="clear-box"></div>
						<table class="formTable">
						<th class="tablemidashi" colspan="2">お住まいのご希望について</th>
						<tr>
						<th>
						お住まいのご希望
						</th> 
						<td>
						<ul class="list-group">
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
						リノベーション済の物件購入<br>
						</li>
						<li>
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
						中古マンションを買ってリノベーションしたい<br>
						</li>
						<li>
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
						自宅をリノベーションしたい
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
						<th>
						ご希望地域<br>(複数回答可)
						</th>
						<td>
						<ul class="list-group">
						<ol>
<?php
	if($e_eria1 == 't'){
?>
						<input type="checkbox" name="e_eria1" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria1" value="t">
<?php
	}
?>
						東京都<br>
						</oi>
						<ol>
<?php
	if($e_eria2 == 't'){
?>
						<input type="checkbox" name="e_eria2" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria2" value="t">
<?php
	}
?>
						都心エリア（千代田区・中央区・港区・新宿区・渋谷区・文京区）<br>
						</oi>
						<ol>
<?php
	if($e_eria3 == 't'){
?>
						<input type="checkbox" name="e_eria3" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria3" value="t">
<?php
	}
?>
						城南エリア（世田谷区・大田区・目黒区・品川区）<br>
						</oi>
						<ol>
<?php
	if($e_eria4 == 't'){
?>
						<input type="checkbox" name="e_eria4" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria4" value="t">
<?php
	}
?>
						城西エリア（中野区・杉並区・練馬区）<br>
						</oi>
						<ol>
<?php
	if($e_eria5 == 't'){
?>
						<input type="checkbox" name="e_eria5" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria5" value="t">
<?php
	}
?>
						城北エリア（豊島区・北区・板橋区・足立区）<br>
						</oi>
						<ol>
<?php
	if($e_eria6 == 't'){
?>
						<input type="checkbox" name="e_eria6" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria6" value="t">
<?php
	}
?>
						城東エリア（葛飾区・台東区・墨田区・江東区・江戸川区・荒川区）<br>
						</oi>
						<ol>
<?php
	if($e_eria7 == 't'){
?>
						<input type="checkbox" name="e_eria7" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria7" value="t">
<?php
	}
?>
						市部エリア（武蔵野市・三鷹市・小金井市・町田市など）<br>
						</oi>
						<ol>
<?php
	if($e_eria8 == 't'){
?>
						<input type="checkbox" name="e_eria8" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria8" value="t">
<?php
	}
?>
						神奈川県（横浜市・川崎市など）<br>
						</oi>
						<ol>
<?php
	if($e_eria9 == 't'){
?>
						<input type="checkbox" name="e_eria9" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria9" value="t">
<?php
	}
?>
						埼玉県（さいたま市・川口市・所沢市など）<br>
						</oi>
						<ol>
<?php
	if($e_eria10 == 't'){
?>
						<input type="checkbox" name="e_eria10" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria10" value="t">
<?php
	}
?>
						千葉県（千葉市・船橋市・浦安市など）<br>
						</oi>
						<ol>
<?php
	if($e_eria11 == 't'){
?>
						<input type="checkbox" name="e_eria11" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria11" value="t">
<?php
	}
?>
						その他エリア<br>
						</oi>
						<ol>
<?php
	if($e_eria12 == 't'){
?>
						<input type="checkbox" name="e_eria12" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_eria12" value="t">
<?php
	}
?>
						現住所のまま（リノベーションのみ）<br>
						</oi>
						</ul>

<?php
	if($e_eria_msg){
?>
				<div id="errmsg"><?=$e_eria_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご希望の駅または沿線がある場合はご記入ください。
						</th>
						<td>
						<input type="text" name="e_ensen" style="width:20%" value="<?=$e_ensen?>" placeholder="例：銀座" class="form-control">線&nbsp;
						<input type="text" name="e_eki" style="width:23%" value="<?=$e_eki?>" placeholder="例：虎ノ門" class="form-control">駅&nbsp;
						徒歩<input type="text" name="e_toho" style="width:12%;ime-mode:disabled" value="<?=$e_toho?>" placeholder="例：2" class="form-control">分以内
<?php
	if($e_ensen_msg){
?>
		<div id="errmsg"><?=$e_ensen_msg?></div>
<?php
	}
	if($e_eki_msg){
?>
		<div id="errmsg"><?=$e_eki_msg?></div>
<?php
	}
	if($e_toho_msg){
?>
		<div id="errmsg"><?=$e_toho_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご予算（物件価格）
						</th>
						<td>
						<select name="e_yosanbukken" style="width:40%">
<?php
	print"<option value='k'>---</option>";

	if($e_yosanbukken == 1){
?>
	<option value ='1' selected>1000万円～2000万円</option>
<?php
	}
	else{
?>
	<option value ='1'>1000万円～2000万円</option>
<?php
	}
	if($e_yosanbukken == 2){
?>
	<option value ='2' selected>2000万円～3000万円</option>
<?php
	}
	else{
?>
	<option value ='2'>2000万円～3000万円</option>
<?php
	}
	if($e_yosanbukken == 3){
?>
	<option value ='3' selected>3000万円～4000万円</option>
<?php
	}
	else{
?>
	<option value ='3'>3000万円～4000万円</option>
<?php
	}
	if($e_yosanbukken == 4){
?>
	<option value ='4' selected>4000万円～5000万円</option>
<?php
	}
	else{
?>
	<option value ='4'>4000万円～5000万円</option>
<?php
	}
	if($e_yosanbukken == 5){
?>
	<option value ='5' selected>5000万円～</option>
<?php
	}
	else{
?>
	<option value ='5'>5000万円～</option>
<?php
	}
?>
						</select>

<?php
	if($e_yosanbukken_msg){
?>
		<div id="errmsg"><?=$e_yosanbukken_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>リノベーション費用
						</th>
						<td>
						<select name="e_yosanrenoba" style="width:40%">
<?php
	print"<option value='k'>---</option>";

	if($e_yosanrenoba == 1){
?>
	<option value ='1' selected>リノベーションしない</option>
<?php
	}
	else{
?>
	<option value ='1'>リノベーションしない</option>
<?php
	}
	if($e_yosanrenoba == 2){
?>
	<option value ='2' selected>100万円未満</option>
<?php
	}
	else{
?>
	<option value ='2'>100万円未満</option>
<?php
	}
	if($e_yosanrenoba == 3){
?>
	<option value ='3' selected>100万円～300万円</option>
<?php
	}
	else{
?>
	<option value ='3'>100万円～300万円</option>
<?php
	}
	if($e_yosanrenoba == 4){
?>
	<option value ='4' selected>300万円～500万円</option>
<?php
	}
	else{
?>
	<option value ='4'>300万円～500万円</option>
<?php
	}
	if($e_yosanrenoba == 5){
?>
	<option value ='5' selected>500万円～</option>
<?php
	}
	else{
?>
	<option value ='5'>500万円～</option>
<?php
	}
?>
						</select>
<?php
	if($e_yosanrenoba_msg){
?>
		<div id="errmsg"><?=$e_yosanrenoba_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>ご希望の広さ
						</th>
						<td>
						<select name="e_menseki" style="width:40%">
<?php
	print"<option value='k'>------</option>";

	if($e_menseki == 1){
?>
	<option value ='1' selected>50㎡未満</option>
<?php
	}
	else{
?>
	<option value ='1'>50㎡未満</option>
<?php
	}
	if($e_menseki == 2){
?>
	<option value ='2' selected>50㎡～</option>
<?php
	}
	else{
?>
	<option value ='2'>50㎡～</option>
<?php
	}
	if($e_menseki == 3){
?>
	<option value ='3' selected>60㎡～</option>
<?php
	}
	else{
?>
	<option value ='3'>60㎡～</option>
<?php
	}
	if($e_menseki == 4){
?>
	<option value ='4' selected>70㎡～</option>
<?php
	}
	else{
?>
	<option value ='4'>70㎡～</option>
<?php
	}
	if($e_menseki == 5){
?>
	<option value ='5' selected>80㎡～</option>
<?php
	}
	else{
?>
	<option value ='5'>80㎡～</option>
<?php
	}
	if($e_menseki == 6){
?>
	<option value ='6' selected>90㎡～</option>
<?php
	}
	else{
?>
	<option value ='6'>90㎡～</option>
<?php
	}
?>
						</select>
<?php
	if($e_menseki_msg){
?>
		<div id="errmsg"><?=$e_menseki_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr>
						<th>
						現在のお住まい
						</th> 
						<td>
						<ul class="list-group">
						<li>
<?php
	if($e_sumai == 1){
?>
						<input type="radio" name="e_sumai" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_sumai" value="1">
<?php
	}
?>
						賃貸マンション<br>
						</li>
						<li>
<?php
	if($e_sumai == 2){
?>
						<input type="radio" name="e_sumai" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_sumai" value="2">
<?php
	}
?>
						賃貸戸建<br>
						</li>
						<li>
<?php
	if($e_sumai == 3){
?>
						<input type="radio" name="e_sumai" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_sumai" value="3">
<?php
	}
?>
						自己所有マンション<br>
						</li>
						<li>
<?php
	if($e_sumai == 4){
?>
						<input type="radio" name="e_sumai" value="4" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_sumai" value="4">
<?php
	}
?>
						自己所有戸建<br>
						</li>
						<li>
<?php
	if($e_sumai == 5){
?>
						<input type="radio" name="e_sumai" value="5" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_sumai" value="5">
<?php
	}
?>
						その他
						</li>
						</ul>

<?php
	if($e_sumai_msg){
?>
				<div id="errmsg"><?=$e_sumai_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>家族構成</th>
						<td>
				大人<select name="e_kazokuotona" style="width:30%">
<?php
	print"<option value='k'>------</option>";

	if($e_kazokuotona == 1){
?>
	<option value ='1' selected>1</option>
<?php
	}
	else{
?>
	<option value ='1'>1</option>
<?php
	}
	if($e_kazokuotona == 2){
?>
	<option value ='2' selected>2</option>
<?php
	}
	else{
?>
	<option value ='2'>2</option>
<?php
	}
	if($e_kazokuotona == 3){
?>
	<option value ='3' selected>3</option>
<?php
	}
	else{
?>
	<option value ='3'>3</option>
<?php
	}
	if($e_kazokuotona == 4){
?>
	<option value ='4' selected>4</option>
<?php
	}
	else{
?>
	<option value ='4'>4</option>
<?php
	}
	if($e_kazokuotona == 5){
?>
	<option value ='5' selected>5</option>
<?php
	}
	else{
?>
	<option value ='5'>5</option>
<?php
	}
	if($e_kazokuotona == 6){
?>
	<option value ='6' selected>6</option>
<?php
	}
	else{
?>
	<option value ='6'>6</option>
<?php
	}
	if($e_kazokuotona == 7){
?>
	<option value ='7' selected>7</option>
<?php
	}
	else{
?>
	<option value ='7'>7</option>
<?php
	}
	if($e_kazokuotona == 8){
?>
	<option value ='8' selected>8</option>
<?php
	}
	else{
?>
	<option value ='8'>8</option>
<?php
	}
	if($e_kazokuotona == 9){
?>
	<option value ='9' selected>9</option>
<?php
	}
	else{
?>
	<option value ='9'>9</option>
<?php
	}
	if($e_kazokuotona == 10){
?>
	<option value ='10' selected>10</option>
<?php
	}
	else{
?>
	<option value ='10'>10</option>
<?php
	}
?>
				</select>人&nbsp;&nbsp;&nbsp;
				子供<select name="e_kazokukodomo1" style="width:30%">
<?php
	print"<option value='k'>------</option>";

	if($e_kazokukodomo1 == 1){
?>
	<option value ='1' selected>1</option>
<?php
	}
	else{
?>
	<option value ='1'>1</option>
<?php
	}
	if($e_kazokukodomo1 == 2){
?>
	<option value ='2' selected>2</option>
<?php
	}
	else{
?>
	<option value ='2'>2</option>
<?php
	}
	if($e_kazokukodomo1 == 3){
?>
	<option value ='3' selected>3</option>
<?php
	}
	else{
?>
	<option value ='3'>3</option>
<?php
	}
	if($e_kazokukodomo1 == 4){
?>
	<option value ='4' selected>4</option>
<?php
	}
	else{
?>
	<option value ='4'>4</option>
<?php
	}
	if($e_kazokukodomo1 == 5){
?>
	<option value ='5' selected>5</option>
<?php
	}
	else{
?>
	<option value ='5'>5</option>
<?php
	}
	if($e_kazokukodomo1 == 6){
?>
	<option value ='6' selected>6</option>
<?php
	}
	else{
?>
	<option value ='6'>6</option>
<?php
	}
	if($e_kazokukodomo1 == 7){
?>
	<option value ='7' selected>7</option>
<?php
	}
	else{
?>
	<option value ='7'>7</option>
<?php
	}
	if($e_kazokukodomo1 == 8){
?>
	<option value ='8' selected>8</option>
<?php
	}
	else{
?>
	<option value ='8'>8</option>
<?php
	}
	if($e_kazokukodomo1 == 9){
?>
	<option value ='9' selected>9</option>
<?php
	}
	else{
?>
	<option value ='9'>9</option>
<?php
	}
	if($e_kazokukodomo1 == 10){
?>
	<option value ='10' selected>10</option>
<?php
	}
	else{
?>
	<option value ='10'>10</option>
<?php
	}
?>
				</select>人
<?php
	if($e_kazokuotona_msg){
?>
			<div id="errmsg"><?=$e_kazokuotona_msg?></div>
<?php
	}
	if($e_kazokukodomo1_msg){
?>
			<div id="errmsg"><?=$e_kazokukodomo1_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>
						希望間取り
						</th>
						<td>
						<select name="e_kiboumadori" style="width:30%">
<?php
	print"<option value='k'>------</option>";

	if($e_kiboumadori == 1){
?>
	<option value ='1' selected>3LDK</option>
<?php
	}
	else{
?>
	<option value ='1'>3LDK</option>
<?php
	}
	if($e_kiboumadori == 2){
?>
	<option value ='2' selected>2LDK</option>
<?php
	}
	else{
?>
	<option value ='2'>2LDK</option>
<?php
	}
	if($e_kiboumadori == 3){
?>
	<option value ='3' selected>1LDK</option>
<?php
	}
	else{
?>
	<option value ='3'>1LDK</option>
<?php
	}
	if($e_kiboumadori == 4){
?>
	<option value ='4' selected>ほか</option>
<?php
	}
	else{
?>
	<option value ='4'>ほか</option>
<?php
	}
	if($e_kiboumadori_msg){
?>
			<div id="errmsg"><?=$e_kiboumadori_msg?></div>
<?php
	}
?>
						</select>
						</td>
						</tr>
						<tr> 
						<th>
						ご年齢
						</th>
						<td>
						<select name="e_nenrei" style="width:40%">
<?php
	print"<option value='k'>------</option>";

	if($e_nenrei == 1){
?>
	<option value ='1' selected>20代前半</option>
<?php
	}
	else{
?>
	<option value ='1'>20代前半</option>
<?php
	}
	if($e_nenrei == 2){
?>
	<option value ='2' selected>20代後半</option>
<?php
	}
	else{
?>
	<option value ='2'>20代後半</option>
<?php
	}
	if($e_nenrei == 3){
?>
	<option value ='3' selected>30代前半</option>
<?php
	}
	else{
?>
	<option value ='3'>30代前半</option>
<?php
	}
	if($e_nenrei == 4){
?>
	<option value ='4' selected>30代後半</option>
<?php
	}
	else{
?>
	<option value ='4'>30代後半</option>
<?php
	}
	if($e_nenrei == 5){
?>
	<option value ='5' selected>40代前半</option>
<?php
	}
	else{
?>
	<option value ='5'>40代前半</option>
<?php
	}
	if($e_nenrei == 6){
?>
	<option value ='6' selected>40代後半</option>
<?php
	}
	else{
?>
	<option value ='6'>40代後半</option>
<?php
	}
	if($e_nenrei == 7){
?>
	<option value ='7' selected>50代前半</option>
<?php
	}
	else{
?>
	<option value ='7'>50代前半</option>
<?php
	}
	if($e_nenrei == 8){
?>
	<option value ='8' selected>50代後半</option>
<?php
	}
	else{
?>
	<option value ='8'>50代後半</option>
<?php
	}
	if($e_nenrei == 9){
?>
	<option value ='9' selected>その他</option>
<?php
	}
	else{
?>
	<option value ='9'>その他</option>
<?php
	}
	if($e_nenrei_msg){
?>
			<div id="errmsg"><?=$e_nenrei_msg?></div>
<?php
	}
?>
						</select>
						</td>
						</tr>
						<tr> 
						<th>
						ご年収
						</th>
						<td>
						<select name="e_syuunyuu" style="width:40%">
<?php
	print"<option value='k'>------</option>";

	if($e_syuunyuu == 1){
?>
	<option value ='1' selected>～400万円</option>
<?php
	}
	else{
?>
	<option value ='1'>～400万円</option>
<?php
	}
	if($e_syuunyuu == 2){
?>
	<option value ='2' selected>～600万円</option>
<?php
	}
	else{
?>
	<option value ='2'>～600万円</option>
<?php
	}
	if($e_syuunyuu == 3){
?>
	<option value ='3' selected>～800万円</option>
<?php
	}
	else{
?>
	<option value ='3'>～800万円</option>
<?php
	}
	if($e_syuunyuu == 4){
?>
	<option value ='4' selected>～1000万円</option>
<?php
	}
	else{
?>
	<option value ='4'>～1000万円</option>
<?php
	}
	if($e_syuunyuu == 5){
?>
	<option value ='5' selected>1000万円～</option>
<?php
	}
	else{
?>
	<option value ='5'>1000万円～</option>
<?php
	}
	if($e_syuunyuu_msg){
?>
			<div id="errmsg"><?=$e_syuunyuu_msg?></div>
<?php
	}
?>
						</select>
						</td>
						</tr>
						<tr> 
						<th>
						お引渡し希望時期
						</th>
						<td>
						<ul class="list-group">
						<li>
<?php
	if($e_jiki == 1){
?>
						<input type="radio" name="e_jiki" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_jiki" value="1">
<?php
	}
?>
						すぐに<br>
						</li>
						<li>
<?php
	if($e_jiki == 2){
?>
						<input type="radio" name="e_jiki" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_jiki" value="2">
<?php
	}
?>
						半年内<br>
						</li>
						<li>
<?php
	if($e_jiki == 3){
?>
						<input type="radio" name="e_jiki" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_jiki" value="3">
<?php
	}
?>
						一年内<br>
						</li>
						<li>
<?php
	if($e_jiki == 4){
?>
						<input type="radio" name="e_jiki" value="4" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_jiki" value="4">
<?php
	}
?>
						いい物件があれば
						</li>
						</ul>

<?php
	if($e_jiki_msg){
?>
				<div id="errmsg"><?=$e_jiki_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						<tr> 
						<th>
						ご購入検討のきっかけ
						</th>
						<td>
						<ul class="list-group">
						<li>
<?php
	if($e_kounyuukikkake == 1){
?>
						<input type="radio" name="e_kounyuukikkake" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kounyuukikkake" value="1">
<?php
	}
?>
						もっと広い部屋に住みたい<br>
						</li>
						<li>
<?php
	if($e_kounyuukikkake == 2){
?>
						<input type="radio" name="e_kounyuukikkake" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kounyuukikkake" value="2">
<?php
	}
?>
						交通の便がよいところに住みたい<br>
						</li>
						<li>
<?php
	if($e_kounyuukikkake == 3){
?>
						<input type="radio" name="e_kounyuukikkake" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kounyuukikkake" value="3">
<?php
	}
?>
						家賃がもったいない<br>
						</li>
						<li>
<?php
	if($e_kounyuukikkake == 4){
?>
						<input type="radio" name="e_kounyuukikkake" value="4" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kounyuukikkake" value="4">
<?php
	}
?>
						結婚<br>
						</li>
						<li>
<?php
	if($e_kounyuukikkake == 5){
?>
						<input type="radio" name="e_kounyuukikkake" value="5" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kounyuukikkake" value="5">
<?php
	}
?>
						出産・子育てを機に<br>
						</li>
						<li>
<?php
	if($e_kounyuukikkake == 6){
?>
						<input type="radio" name="e_kounyuukikkake" value="6" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kounyuukikkake" value="6">
<?php
	}
?>
						転勤・仕事の都合で<br>
						</li>
						<li>
<?php
	if($e_kounyuukikkake == 7){
?>
						<input type="radio" name="e_kounyuukikkake" value="7" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kounyuukikkake" value="7">
<?php
	}
?>
						マイホームが欲しい<br>
						</li>
						</ul>

<?php
	if($e_kounyuukikkake_msg){
?>
				<div id="errmsg"><?=$e_kounyuukikkake_msg?></div>
<?php
	}
?>
						</td>
						</tr>
						</table>
						<div class="clear-box"></div>
						<table class="formTable">
						<tr> 
						<th class="tablemidashi" colspan="2">個人情報の取り扱いについて
						</th> 
						</tr>
						<td> 
						情報を送信していただく前に、
						当社の<a href="privacy.php" target="_blank">『個人情報保護方針』</a>に同意していただくことが必要です。<br>
						個人情報保護方針をご精読の上、同意できる場合は<b>［個人情報保護方針に同意して確認に進む］</b>のボタンをクリックしてください。
						</td>
						</tr>
						</table>
						<div class="botancenter">
						<input type="submit" name="entrygo" value="個人情報保護方針に同意して確認に進む"  class="sousin_button">
						</div>
						</FORM>
					</section>
				</div>

				<div id="sidebar" class="col one-fourth left">
<?php
//サイドバナー下層ページ共通
user_sidebanner_other($currentmenu);
?>
				</div>


			</div>
		</article>
<?php
user_footer_other($currentmenu);
}
?>
