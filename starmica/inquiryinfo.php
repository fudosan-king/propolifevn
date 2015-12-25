<?php
if($_POST['entrygo1'] OR $_POST['entrygo2'] OR $_POST['entrysousin']){
	//お客様について
	if($_POST['e_familyname']){
		$e_familyname = htmlspecialchars($_POST['e_familyname'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_familyname);
		if($count_id > 150){
			$e_familyname_msg = "姓は50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_familyname_msg = "姓のご入力をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_name']){
		$e_name = htmlspecialchars($_POST['e_name'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_name);
		if($count_id > 150){
			$e_name_msg = "名は50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_name_msg = "名のご入力をお願いいたします。";
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
	if($_POST['e_familynamefuri']){
		$e_familynamefuri = htmlspecialchars($_POST['e_familynamefuri'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_familynamefuri);
		if($count_id > 150){
			$e_familynamefuri_msg = "姓（ふりがな）は50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_familynamefuri_msg = "姓（ふりがな）のご入力をお願いいたします。";
		$errorflag = 1;
	}
	if($_POST['e_namefuri']){
		$e_namefuri = htmlspecialchars($_POST['e_namefuri'], ENT_QUOTES);
		//50字制限
		$count_id = strlen($e_namefuri);
		if($count_id > 150){
			$e_namefuri_msg = "名（ふりがな）は50文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_namefuri_msg = "名（ふりがな）のご入力をお願いいたします。";
		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//都道府県・ご住所
	//----------------------------------------------------------------------
	if($_POST['e_address1']){
		$e_address1 = htmlspecialchars($_POST['e_address1'], ENT_QUOTES);
		//100字制限
		$count_id = strlen($e_address1);
		if($count_id > 300){
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
		if($count_id > 900){
			$e_address2_msg = "市区町村・番地は300文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_address2_msg = "市区町村・番地をお願いいたします。";
		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//ご購入マンション
	//----------------------------------------------------------------------
	if($_POST['e_mansion']){
		$e_mansion = htmlspecialchars($_POST['e_mansion'], ENT_QUOTES);
		//100字制限
		$count_id = strlen($e_mansion);
		if($count_id > 300){
			$e_mansion_msg = "ご購入マンションは100文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
		$e_mansion_msg = "ご購入マンションをお願いいたします。";
		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//引越し時期
	//----------------------------------------------------------------------
	if($_POST['e_hikkoshi']){
		$e_mansion = htmlspecialchars($_POST['e_hikkoshi'], ENT_QUOTES);
		//100字制限
		$count_id = strlen($e_hikkoshi);
		if($count_id > 300){
			$e_hikkoshi_msg = "ご購入マンションは100文字以内で入力してください。";
			$errorflag = 1;
		}
	}
	else{
//		$e_hikkoshi_msg = "ご購入マンションをお願いいたします。";
//		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//購入のきっかけ
	//----------------------------------------------------------------------
	//もっと広い部屋に住みたい
	if($_POST['e_kounyuukikkake1']){
		$e_kounyuukikkake1 = htmlspecialchars($_POST['e_kounyuukikkake1'], ENT_QUOTES);
		if($e_kounyuukikkake1 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake1 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake1 = 'f';
	}
	//交通の便のよいところに住みたい
	if($_POST['e_kounyuukikkake2']){
		$e_kounyuukikkake2 = htmlspecialchars($_POST['e_kounyuukikkake2'], ENT_QUOTES);
		if($e_kounyuukikkake2 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake2 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake2 = 'f';
	}
	//家賃がもったいない
	if($_POST['e_kounyuukikkake3']){
		$e_kounyuukikkake3 = htmlspecialchars($_POST['e_kounyuukikkake3'], ENT_QUOTES);
		if($e_kounyuukikkake3 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake3 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake3 = 'f';
	}
	//結婚
	if($_POST['e_kounyuukikkake4']){
		$e_kounyuukikkake4 = htmlspecialchars($_POST['e_kounyuukikkake4'], ENT_QUOTES);
		if($e_kounyuukikkake4 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake4 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake4 = 'f';
	}
	//出産・子育てを機に
	if($_POST['e_kounyuukikkake5']){
		$e_kounyuukikkake5 = htmlspecialchars($_POST['e_kounyuukikkake5'], ENT_QUOTES);
		if($e_kounyuukikkake5 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake5 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake5 = 'f';
	}
	//転勤・仕事の都合で
	if($_POST['e_kounyuukikkake6']){
		$e_kounyuukikkake6 = htmlspecialchars($_POST['e_kounyuukikkake6'], ENT_QUOTES);
		if($e_kounyuukikkake6 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake6 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake6 = 'f';
	}
	//同居家族が増えた（親と同居など）
	if($_POST['e_kounyuukikkake7']){
		$e_kounyuukikkake7 = htmlspecialchars($_POST['e_kounyuukikkake7'], ENT_QUOTES);
		if($e_kounyuukikkake7 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake7 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake7 = 'f';
	}
	//同居家族が減った（子供の独立など）
	if($_POST['e_kounyuukikkake8']){
		$e_kounyuukikkake8 = htmlspecialchars($_POST['e_kounyuukikkake8'], ENT_QUOTES);
		if($e_kounyuukikkake8 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake8 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake8 = 'f';
	}
	//マイホームが欲しかった
	if($_POST['e_kounyuukikkake9']){
		$e_kounyuukikkake9 = htmlspecialchars($_POST['e_kounyuukikkake9'], ENT_QUOTES);
		if($e_kounyuukikkake9 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kounyuukikkake9 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kounyuukikkake9 = 'f';
	}
//	if($eriaflag != 1){
//		$e_kounyuukikkake_msg = "購入のきっかけを入力してください。";
//	}
	//----------------------------------------------------------------------
	//ご検討された期間 1～4
	//----------------------------------------------------------------------
	if($_POST['e_kentou']){
		$e_kentou = htmlspecialchars($_POST['e_kentou'], ENT_QUOTES);
		if($e_kentou != '1' AND $e_kentou != '2' AND $e_kentou != '3' AND $e_kentou != '4'){
			$e_kentou_msg = "ご検討された期間のご入力をお願いいたします。";
			$errorflag = 1;
		}
	}
	else{
//		$e_kentou_msg = "ご検討された期間のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//当初探していた住宅の種類 1～5
	//----------------------------------------------------------------------
	if($_POST['e_syurui']){
		$e_syurui = htmlspecialchars($_POST['e_syurui'], ENT_QUOTES);
		if($e_syurui != '1' AND $e_syurui != '2' AND $e_syurui != '3' AND $e_syurui != '4' AND $e_syurui != '5'){
			$e_syurui_msg = "当初探していた住宅の種類のご入力をお願いいたします。";
			$errorflag = 1;
		}
	}
	else{
//		$e_syurui_msg = "当初探していた住宅の種類のご入力をお願いいたします。";
//		$errorflag = 1;
	}
	//----------------------------------------------------------------------
	//「リノベーションマンション」を選んだ理由
	//----------------------------------------------------------------------
	if($_POST['e_riyuu']){
		$e_riyuu = htmlspecialchars($_POST['e_riyuu'], ENT_QUOTES);
		//400字制限
		$count_id = strlen($e_riyuu);
		if($count_id > 1200){
			$e_riyuu_msg = "理由は400文字以内で入力してください。";
			$errorflag = 1;
		}
		$e_riyuu_h = nl2br($e_riyuu);
		$e_riyuu_h = preg_replace('/\\\\/', '￥', $e_riyuu_h);
	}
	//----------------------------------------------------------------------
	//リノベーションマンション購入時の検討内容
	//----------------------------------------------------------------------
	//売主の信頼性（規模、評判や実績、工事内容など）
	if($_POST['e_kentounaiyou1']){
		$e_kentounaiyou1 = htmlspecialchars($_POST['e_kentounaiyou1'], ENT_QUOTES);
		if($e_kentounaiyou1 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kentounaiyou1 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kentounaiyou1 = 'f';
	}
	//居住後の保証内容やアフターサービス
	if($_POST['e_kentounaiyou2']){
		$e_kentounaiyou2 = htmlspecialchars($_POST['e_kentounaiyou2'], ENT_QUOTES);
		if($e_kentounaiyou2 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kentounaiyou2 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kentounaiyou2 = 'f';
	}
	//構造・耐震
	if($_POST['e_kentounaiyou3']){
		$e_kentounaiyou3 = htmlspecialchars($_POST['e_kentounaiyou3'], ENT_QUOTES);
		if($e_kentounaiyou3 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kentounaiyou3 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kentounaiyou3 = 'f';
	}
	//管理体制・近隣トラブル
	if($_POST['e_kentounaiyou4']){
		$e_kentounaiyou4 = htmlspecialchars($_POST['e_kentounaiyou4'], ENT_QUOTES);
		if($e_kentounaiyou4 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kentounaiyou4 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kentounaiyou4 = 'f';
	}
	//築年数
	if($_POST['e_kentounaiyou5']){
		$e_kentounaiyou5 = htmlspecialchars($_POST['e_kentounaiyou5'], ENT_QUOTES);
		if($e_kentounaiyou5 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kentounaiyou5 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kentounaiyou5 = 'f';
	}
	//不安はありませんでした
	if($_POST['e_kentounaiyou6']){
		$e_kentounaiyou6 = htmlspecialchars($_POST['e_kentounaiyou6'], ENT_QUOTES);
		if($e_kentounaiyou6 == 't'){
			$eriaflag = 1;
		}
		else{//不正な値はf
			$e_kentounaiyou6 = 'f';
		}
	}
	else{//チェックされていなければf
			$e_kentounaiyou6 = 'f';
	}
//	if($eriaflag != 1){
//		$e_kentounaiyou_msg = "リノベーションマンション購入時の検討内容を入力してください。";
//	}
	//----------------------------------------------------------------------
	//当社の物件を購入していただく決め手になった点 1～9
	//----------------------------------------------------------------------
	if($_POST['e_kimete']){
		$e_kimete = htmlspecialchars($_POST['e_kimete'], ENT_QUOTES);
		if($e_kimete != '1' AND $e_kimete != '2' AND $e_kimete != '3' AND $e_kimete != '4' AND $e_kimete != '5' AND $e_kimete != '6' AND $e_kimete != '7' AND $e_kimete != '8' AND $e_kimete != '9'){
//			$e_kimete_msg = "当社の物件を購入していただく決め手になった点のご入力をお願いいたします。";
//			$errorflag = 1;
		}
	}
//	else{
//		$e_kimete_msg = "当社の物件を購入していただく決め手になった点のご入力をお願いいたします。";
//		$errorflag = 1;
//	}
	//----------------------------------------------------------------------
	//お部屋のお気に入りポイント
	//----------------------------------------------------------------------
	if($_POST['e_okiniiri']){
		$e_okiniiri = htmlspecialchars($_POST['e_okiniiri'], ENT_QUOTES);
		//400字制限
		$count_id = strlen($e_okiniiri);
		if($count_id > 1200){
			$e_okiniiri_msg = "お気に入りポイントは400文字以内で入力してください。";
			$errorflag = 1;
		}
		$e_okiniiri_h = nl2br($e_okiniiri);
		$e_okiniiri_h = preg_replace('/\\\\/', '￥', $e_okiniiri_h);
	}
	//----------------------------------------------------------------------
	//住み心地・ご不便を感じる点
	//----------------------------------------------------------------------
	if($_POST['e_sumigokoti']){
		$e_sumigokoti = htmlspecialchars($_POST['e_sumigokoti'], ENT_QUOTES);
		//400字制限
		$count_id = strlen($e_sumigokoti);
		if($count_id > 1200){
			$e_sumigokoti_msg = "住み心地やご不便を感じる点は400文字以内で入力してください。";
			$errorflag = 1;
		}
		$e_sumigokoti_h = nl2br($e_sumigokoti);
		$e_sumigokoti_h = preg_replace('/\\\\/', '￥', $e_sumigokoti_h);
	}
	//----------------------------------------------------------------------
	//アドバイス
	//----------------------------------------------------------------------
	if($_POST['e_advice']){
		$e_advice = htmlspecialchars($_POST['e_advice'], ENT_QUOTES);
		//400字制限
		$count_id = strlen($e_advice);
		if($count_id > 1200){
			$e_advice_msg = "アドバイスは400文字以内で入力してください。";
			$errorflag = 1;
		}
		$e_advice_h = nl2br($e_advice);
		$e_advice_h = preg_replace('/\\\\/', '￥', $e_advice_h);
	}
	//----------------------------------------------------------------------
	//弊社社員の対応、ご満足度についてお気づきの点
	//----------------------------------------------------------------------
	if($_POST['e_manzokudo']){
		$e_manzokudo = htmlspecialchars($_POST['e_manzokudo'], ENT_QUOTES);
		//400字制限
		$count_id = strlen($e_manzokudo);
		if($count_id > 1200){
			$e_manzokudo_msg = "弊社社員についてのお気づきの点は400文字以内で入力してください。";
			$errorflag = 1;
		}
		$e_manzokudo_h = nl2br($e_manzokudo);
		$e_manzokudo_h = preg_replace('/\\\\/', '￥', $e_manzokudo_h);
	}
	//----------------------------------------------------------------------
	//当社へのご意見、ご要望、お気づきの点
	//----------------------------------------------------------------------
	if($_POST['e_iken']){
		$e_iken = htmlspecialchars($_POST['e_iken'], ENT_QUOTES);
		//400字制限
		$count_id = strlen($e_iken);
		if($count_id > 1200){
			$e_iken_msg = "当社へのご意見、ご要望、お気づきの点は400文字以内で入力してください。";
			$errorflag = 1;
		}
		$e_iken_h = nl2br($e_iken);
		$e_iken_h = preg_replace('/\\\\/', '￥', $e_iken_h);
	}
}

if($errorflag !=1 AND $_POST['entrygo2']){
require_once("design.php");

$HTMLTITLE ="アンケート";
$currentmenu = 33;


user_header_other($HTMLTITLE,$currentmenu);
?>
	<div id="pagetitle-other">
		<div class="row">
			<h2><img src="images/title-questionnairer.png" alt="お客様アンケート" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>より良い商品・サービスをお客様へご提供していくためにアンケートへのご協力をお願いします。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="index.php">ホーム</a></li>
		<li class="arrow">アンケート</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>アンケート</span></div>
						<p class="bottom-10">下記内容をご確認いただき、「送信」ボタンをクリックしてください。</p>
						<img src="images/step02_on.png" width="680" height="100"/>
						<div class="clear-box"></div>
						<FORM method="post" action="inquiry.php">
						<table class="formTable">
						<th class="tablemidashi" colspan="2">お客様について
						</th>
						<tr>
						<th>
						お名前<span class="icon-required">必須</span>
						</th>
						<td>
						姓：<?=$e_familyname?>&nbsp;&nbsp;
						名：<?=$e_name?><br>
						</td>
						</tr>
						<tr>
						<th>
						ふりがな<span class="icon-required">必須</span>
						</th>
						<td>
						姓：<?=$e_familynamefuri?>&nbsp;&nbsp;
						名：<?=$e_namefuri?><br>
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
						ご購入マンション<span class="icon-required">必須</span>
						</th>
						<td>
						<?=$e_mansion?>
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
						新居への引越日（予定）
						</th>
						<td>
						<?=$e_hikkoshi?>
						</td>
						</tr>
						</table>
						<div class="clear-box"></div>
						<div class="top-10">
							<p class="ques">購入のきっかけ(複数回答可)</p>
							<p class="top-10">
<?php
	if($e_kounyuukikkake1 == 't'){
		print"1.もっと広い部屋に住みたい<br>";
	}
	if($e_kounyuukikkake2 == 't'){
		print"2.交通の便のよいところに住みたい<br>";
	}
	if($e_kounyuukikkake3 == 't'){
		print"3.家賃がもったいない<br>";
	}
	if($e_kounyuukikkake4 == 't'){
		print"4.結婚<br>";
	}
	if($e_kounyuukikkake5 == 't'){
		print"5.出産・子育てを機に<br>";
	}
	if($e_kounyuukikkake6 == 't'){
		print"6.転勤・仕事の都合で<br>";
	}
	if($e_kounyuukikkake7 == 't'){
		print"7.同居家族が増えた（親と同居など）<br>";
	}
	if($e_kounyuukikkake8 == 't'){
		print"8.同居家族が減った（子供の独立など）<br>";
	}
	if($e_kounyuukikkake9 == 't'){
		print"9.マイホームが欲しかった";
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">ご検討された期間は？</p>
							<p class="top-10">
<?php
	if($e_kentou == 1){
		print"1か月以上";
	}
	elseif($e_kentou == 2){
		print"2～3か月以上";
	}
	elseif($e_kentou == 3){
		print"3～6か月以上";
	}
	elseif($e_kentou == 4){
		print"半年以上";
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">当初探していた住宅の種類は？</p>
							<p class="top-10">
<?php
	if($e_syurui == 1){
		print"1.リノベーションマンション";
	}
	elseif($e_syurui == 2){
		print"2.新築マンション";
	}
	elseif($e_syurui == 3){
		print"3.新築戸建て";
	}
	elseif($e_syurui == 4){
		print"4.中古マンション";
	}
	elseif($e_syurui == 5){
		print"5.中古戸建て";
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">「リノベーションマンション」を選んだ理由を教えてください。</p>
							<p class="top-10">
							<?=$e_riyuu_h?>
<?php
	if($e_riyuu_msg){
?>
							<div id="errmsg"><?=$e_riyuu_msg?></div>
<?php
	}
?>

						</div>
						<div class="top-10">
							<p class="ques">リノベーションマンション購入時の検討内容は？(複数回答可)</p>
							<p class="top-10">
<?php
	if($e_kentounaiyou1 == 't'){
		print"1.売主の信頼性（規模、評判や実績、工事内容など）<br>";
	}
	if($e_kentounaiyou2 == 't'){
		print"2.居住後の保証内容やアフターサービス<br>";
	}
	if($e_kentounaiyou3 == 't'){
		print"3.構造・耐震<br>";
	}
	if($e_kentounaiyou4 == 't'){
		print"4.管理体制・近隣トラブル<br>";
	}
	if($e_kentounaiyou5 == 't'){
		print"5.築年数<br>";
	}
	if($e_kentounaiyou6 == 't'){
		print"6.不安はありませんでした。";
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">当社の物件を購入していただく決め手になった点はどこですか？</p>
							<p class="top-10">
<?php
	if($e_kimete == 1){
		print"1.内装デザイン";
	}
	elseif($e_kimete == 2){
		print"2.仲介会社がすすめてくれた";
	}
	elseif($e_kimete == 3){
		print"3.保証・アフターサービスの充実";
	}
	elseif($e_kimete == 4){
		print"4.設備仕様";
	}
	elseif($e_kimete == 5){
		print"5.間取り・広さ";
	}
	elseif($e_kimete == 6){
		print"6.日当り・眺望";
	}
	elseif($e_kimete == 7){
		print"7.価格";
	}
	elseif($e_kimete == 8){
		print"8.立地・駅からの距離（エリア）";
	}
	elseif($e_kimete == 9){
		print"9.周辺環境";
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">お部屋のお気に入りポイントを教えてください。</p>
							<p class="top-10">
							<?=$e_okiniiri_h?>
						</div>
						<div class="top-10">
							<p class="ques">以前のお住まいと比べて、住み心地はいかがでしょうか？また、ご不便を感じる点はございますか？</p>
							<p class="top-10">
							<?=$e_sumigokoti_h?>
						</div>
						<div class="top-10">
							<p class="ques">リノベーションマンション購入をご検討されている方へのアドバイスをお願いします。</p>
							<p class="top-10">
							<?=$e_advice_h?>
						</div>
						<div class="top-10">
							<p class="ques">弊社社員の対応、ご満足度についてお気づきの点などございましたらお聞かせください。（服装・ご挨拶・マナー、購入アドバイス・事前準備などのご説明他）</p>
							<p class="top-10">
							<?=$e_manzokudo_h?>
						</div>
						<div class="top-10">
							<p class="ques">当社へのご意見、ご要望、お気づきの事項などございましたら是非お聞かせください。</p>
							<p class="top-10">
							<?=$e_iken_h?>
						</div>
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
						<input type="hidden" name="e_familyname" value="<?=$e_familyname?>">
						<input type="hidden" name="e_name" value="<?=$e_name?>">
						<input type="hidden" name="e_familynamefuri" value="<?=$e_familynamefuri?>">
						<input type="hidden" name="e_namefuri" value="<?=$e_namefuri?>">
						<input type="hidden" name="e_tel" value="<?=$e_tel?>">
						<input type="hidden" name="e_mail" value="<?=$e_mail?>">
						<input type="hidden" name="e_mail_check" value="<?=$e_mail_check?>">
						<input type="hidden" name="e_yuubinbangou" value="<?=$e_yuubinbangou?>">
						<input type="hidden" name="e_address1" value="<?=$e_address1?>">
						<input type="hidden" name="e_address2" value="<?=$e_address2?>">
						<input type="hidden" name="e_mansion" value="<?=$e_mansion?>">
						<input type="hidden" name="e_hikkoshi" value="<?=$e_hikkoshi?>">
						<input type="hidden" name="e_kounyuukikkake1" value="<?=$e_kounyuukikkake1?>">
						<input type="hidden" name="e_kounyuukikkake2" value="<?=$e_kounyuukikkake2?>">
						<input type="hidden" name="e_kounyuukikkake3" value="<?=$e_kounyuukikkake3?>">
						<input type="hidden" name="e_kounyuukikkake4" value="<?=$e_kounyuukikkake4?>">
						<input type="hidden" name="e_kounyuukikkake5" value="<?=$e_kounyuukikkake5?>">
						<input type="hidden" name="e_kounyuukikkake6" value="<?=$e_kounyuukikkake6?>">
						<input type="hidden" name="e_kounyuukikkake7" value="<?=$e_kounyuukikkake7?>">
						<input type="hidden" name="e_kounyuukikkake8" value="<?=$e_kounyuukikkake8?>">
						<input type="hidden" name="e_kounyuukikkake9" value="<?=$e_kounyuukikkake9?>">
						<input type="hidden" name="e_kentou" value="<?=$e_kentou?>">
						<input type="hidden" name="e_syurui" value="<?=$e_syurui?>">
						<input type="hidden" name="e_riyuu" value="<?=$e_riyuu?>">
						<input type="hidden" name="e_kentounaiyou1" value="<?=$e_kentounaiyou1?>">
						<input type="hidden" name="e_kentounaiyou2" value="<?=$e_kentounaiyou2?>">
						<input type="hidden" name="e_kentounaiyou3" value="<?=$e_kentounaiyou3?>">
						<input type="hidden" name="e_kentounaiyou4" value="<?=$e_kentounaiyou4?>">
						<input type="hidden" name="e_kentounaiyou5" value="<?=$e_kentounaiyou5?>">
						<input type="hidden" name="e_kentounaiyou6" value="<?=$e_kentounaiyou6?>">
						<input type="hidden" name="e_kimete" value="<?=$e_kimete?>">
						<input type="hidden" name="e_okiniiri" value="<?=$e_okiniiri?>">
						<input type="hidden" name="e_sumigokoti" value="<?=$e_sumigokoti?>">
						<input type="hidden" name="e_advice" value="<?=$e_advice?>">
						<input type="hidden" name="e_manzokudo" value="<?=$e_manzokudo?>">
						<input type="hidden" name="e_iken" value="<?=$e_iken?>">
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
//アンケートメール（スター・マイカ・レジデンスHPより）
//-----------------------------
$ouboto = "smr.questionnaire@starmica.co.jp";
//$ouboto = "info@faboc.co.jp";
$oubosubject = "アンケートメール（スター・マイカ・レジデンスHP）";


	if($e_kounyuukikkake1 == 't'){
		$e_kounyuukikkake1_h = "1.もっと広い部屋に住みたい";
	}
	elseif($e_kounyuukikkake1 == 't'){
		$e_kounyuukikkake1_h = "";
	}
	if($e_kounyuukikkake2 == 't'){
		$e_kounyuukikkake2_h = "2.交通の便のよいところに住みたい";
	}
	elseif($e_kounyuukikkake2 == 't'){
		$e_kounyuukikkake2_h = "";
	}
	if($e_kounyuukikkake3 == 't'){
		$e_kounyuukikkake3_h = "3.家賃がもったいない";
	}
	elseif($e_kounyuukikkake3 == 't'){
		$e_kounyuukikkake3_h = "";
	}
	if($e_kounyuukikkake4 == 't'){
		$e_kounyuukikkake4_h = "4.結婚";
	}
	elseif($e_kounyuukikkake4 == 't'){
		$e_kounyuukikkake4_h = "";
	}
	if($e_kounyuukikkake5 == 't'){
		$e_kounyuukikkake5_h = "5.出産・子育てを機に";
	}
	elseif($e_kounyuukikkake5 == 't'){
		$e_kounyuukikkake5_h = "";
	}
	if($e_kounyuukikkake6 == 't'){
		$e_kounyuukikkake6_h = "6.転勤・仕事の都合で";
	}
	elseif($e_kounyuukikkake6 == 't'){
		$e_kounyuukikkake6_h = "";
	}
	if($e_kounyuukikkake7 == 't'){
		$e_kounyuukikkake7_h = "7.同居家族が増えた（親と同居など）";
	}
	elseif($e_kounyuukikkake7 == 't'){
		$e_kounyuukikkake7_h = "";
	}
	if($e_kounyuukikkake8 == 't'){
		$e_kounyuukikkake8_h = "8.同居家族が減った（子供の独立など）";
	}
	elseif($e_kounyuukikkake8 == 't'){
		$e_kounyuukikkake8_h = "";
	}
	if($e_kounyuukikkake9 == 't'){
		$e_kounyuukikkake9_h = "9.マイホームが欲しかった";
	}
	elseif($e_kounyuukikkake9 == 't'){
		$e_kounyuukikkake9_h = "";
	}

	if($e_kentou == 1){
		$e_kentou_h = "1か月以上";
	}
	elseif($e_kentou == 2){
		$e_kentou_h = "2～3か月以上";
	}
	elseif($e_kentou == 3){
		$e_kentou_h = "3～6か月以上";
	}
	elseif($e_kentou == 4){
		$e_kentou_h = "半年以上";
	}

	if($e_syurui == 1){
		$e_syurui_h = "1.リノベーションマンション";
	}
	elseif($e_syurui == 2){
		$e_syurui_h = "2.新築マンション";
	}
	elseif($e_syurui == 3){
		$e_syurui_h = "3.新築戸建て";
	}
	elseif($e_syurui == 4){
		$e_syurui_h = "4.中古マンション";
	}
	elseif($e_syurui == 5){
		$e_syurui_h = "5.中古戸建て";
	}

	if($e_kentounaiyou1 == 't'){
		$e_kentounaiyou1_h = "1.売主の信頼性（規模、評判や実績、工事内容など）";
	}
	elseif($e_kentounaiyou1 == 't'){
		$e_kentounaiyou1_h = "";
	}
	if($e_kentounaiyou2 == 't'){
		$e_kentounaiyou2_h = "2.居住後の保証内容やアフターサービス";
	}
	elseif($e_kentounaiyou2 == 't'){
		$e_kentounaiyou2_h = "";
	}
	if($e_kentounaiyou3 == 't'){
		$e_kentounaiyou3_h = "3.構造・耐震";
	}
	elseif($e_kentounaiyou3 == 't'){
		$e_kentounaiyou3_h = "";
	}
	if($e_kentounaiyou4 == 't'){
		$e_kentounaiyou4_h = "4.管理体制・近隣トラブル";
	}
	elseif($e_kentounaiyou4 == 't'){
		$e_kentounaiyou4_h = "";
	}
	if($e_kentounaiyou5 == 't'){
		$e_kentounaiyou5_h = "5.築年数";
	}
	elseif($e_kentounaiyou5 == 't'){
		$e_kentounaiyou5_h = "";
	}
	if($e_kentounaiyou6 == 't'){
		$e_kentounaiyou6_h = "6.不安はありませんでした。";
	}
	elseif($e_kentounaiyou6 == 't'){
		$e_kentounaiyou6_h = "";
	}

	if($e_kimete == 1){
		$e_kimete_h = "1.内装デザイン";
	}
	elseif($e_kimete == 2){
		$e_kimete_h = "2.仲介会社がすすめてくれた";
	}
	elseif($e_kimete == 3){
		$e_kimete_h = "3.保証・アフターサービスの充実";
	}
	elseif($e_kimete == 4){
		$e_kimete_h = "4.設備仕様";
	}
	elseif($e_kimete == 5){
		$e_kimete_h = "5.間取り・広さ";
	}
	elseif($e_kimete == 6){
		$e_kimete_h = "6.日当り・眺望";
	}
	elseif($e_kimete == 7){
		$e_kimete_h = "7.価格";
	}
	elseif($e_kimete == 8){
		$e_kimete_h = "8.立地・駅からの距離（エリア）";
	}
	elseif($e_kimete == 9){
		$e_kimete_h = "9.周辺環境";
	}

$oubomessage = <<<_EOT_

￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信内容
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣

送信情報は以下の通りです。

お客様情報
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
■姓			：$e_familyname
■名			：$e_name
■ふりがな（姓）	：$e_familynamefuri
■ふりがな（名）	：$e_namefuri
■メールアドレス	：$e_mail
■郵便番号		：$e_yuubinbangou
■都道府県		：$e_address1
■市区町村・番地	：$e_address2
■ご購入マンション	：$e_mansion
■電話番号		：$e_tel
■新居への引越日（予定）		：$e_hikkoshi

お住まいの情報
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
■購入のきっかけ：
$e_kounyuukikkake1_h
$e_kounyuukikkake2_h
$e_kounyuukikkake3_h
$e_kounyuukikkake4_h
$e_kounyuukikkake5_h
$e_kounyuukikkake6_h
$e_kounyuukikkake7_h
$e_kounyuukikkake8_h
$e_kounyuukikkake9_h

■ご検討された期間は？：$e_kentou_h

■当初探していた住宅の種類は？：$e_syurui_h

■リノベーションマンションを選んだ理由：
$e_riyuu_h

■リノベーションマンション購入時の検討内容は？：
$e_kentounaiyou1_h
$e_kentounaiyou2_h
$e_kentounaiyou3_h
$e_kentounaiyou4_h
$e_kentounaiyou5_h
$e_kentounaiyou6_h

■当社の物件を購入していただく決め手になった点は？：$e_kimete_h

■お部屋のお気に入りポイント：
$e_okiniiri_h

■住み心地・ご不便：
$e_sumigokoti_h

■アドバイス：
$e_advice_h

■弊社社員の対応、ご満足度について：
$e_manzokudo_h

■ご意見、ご要望、お気づきの事項：
$e_iken_h

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
$subject2 = "アンケートにご協力いただきまして誠にありがとうございます【スター・マイカ・レジデンス】";
$atena = $e_familyname.$e_name."様";

$message2 = <<<_EOT_

$atena

アンケートにご協力いただきましてありがとうございました。
お客さまの貴重なご意見として今後の参考とさせていただきます。
今後ともどうぞよろしくお願いいたします。

スター・マイカグループ


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
header("Location:thanks_inquiry3.php");
exit();

}
//アンケートフォーム
elseif($errorflag !=1 AND $_POST['entrygo1'] OR $_POST['entrygo2']){
require_once("design.php");

$HTMLTITLE ="アンケート";
$currentmenu = 33;

user_header_other($HTMLTITLE,$currentmenu);
?>
	<div id="pagetitle-other">
		<div class="row">
			<h2><img src="images/title-questionnairer.png" alt="お客様アンケート" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>より良い商品・サービスをお客様へご提供していくためにアンケートへのご協力をお願いします。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="index.php">ホーム</a></li>
		<li class="arrow">アンケート</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>アンケート</span></div>
						<p class="bottom-10">
							<img src="images/quocard.jpg" class="img-right"/>
							この度は、スター・マイカグループをご利用いただきまして誠にありがとうございました。<br>
							今後、より良い商品・サービスをお客様へご提供していくためにアンケートへのご協力をお願いします。<br>
							アンケートに回答していただいたお客さま全員にQuoカード1,000円分をプレゼントいたします。<br><br>
							※スター・マイカレジデンスをご利用いただき、お住まいをご購入いただいたお客さまを対象とさせていただきます。<br>
							※引越し予定の方は新住所でのご登録をお願いします。
						</p>
						<img src="images/step01_on.png" />
						<div class="clear-box"></div>
						<FORM method="post" action="inquiry.php">
						<div class="top-10">
							<p class="ques">購入のきっかけ(複数回答可)<span class="icon-required">必須</span></p>
							<ul class="list-group">
							<li>
							<p class="top-10">
<?php
	if($e_kounyuukikkake1 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake1" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake1" value="t">
<?php
	}
?>
							1.もっと広い部屋に住みたい<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kounyuukikkake2 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake2" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake2" value="t">
<?php
	}
?>
							2.交通の便のよいところに住みたい<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kounyuukikkake3 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake3" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake3" value="t">
<?php
	}
?>
							3.家賃がもったいない<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kounyuukikkake4 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake4" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake4" value="t">
<?php
	}
?>
							4.結婚<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kounyuukikkake5 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake5" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake5" value="t">
<?php
	}
?>
							5.出産・子育てを機に<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kounyuukikkake6 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake6" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake6" value="t">
<?php
	}
?>
							6.転勤・仕事の都合で<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kounyuukikkake7 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake7" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake7" value="t">
<?php
	}
?>
							7.同居家族が増えた（親と同居など）<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kounyuukikkake8 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake8" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake8" value="t">
<?php
	}
?>
							8.同居家族が減った（子供の独立など）<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kounyuukikkake9 == 't'){
?>
						<input type="checkbox" name="e_kounyuukikkake9" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kounyuukikkake9" value="t">
<?php
	}
?>
							9.マイホームが欲しかった<br>
							</p>
							</li>
							</ul>

<?php
	if($e_kounyuukikkake_msg){
?>
				<div id="errmsg"><?=$e_kounyuukikkake_msg?></div>
<?php
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">ご検討された期間は？<span class="icon-required">必須</span></p>
							<ul class="list-group">
							<li>
							<p class="top-10">
<?php
	if($e_kentou == 1){
?>
						<input type="radio" name="e_kentou" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kentou" value="1">
<?php
	}
?>
							1か月以上<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kentou == 2){
?>
						<input type="radio" name="e_kentou" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kentou" value="2">
<?php
	}
?>
							2～3か月以上<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kentou == 3){
?>
						<input type="radio" name="e_kentou" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kentou" value="3">
<?php
	}
?>
							3～6か月以上<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kentou == 4){
?>
						<input type="radio" name="e_kentou" value="4" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kentou" value="4">
<?php
	}
?>
							半年以上<br>
							</p>
							</li>
							</ul>

<?php
	if($e_kentou_msg){
?>
				<div id="errmsg"><?=$e_kentou_msg?></div>
<?php
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">当初探していた住宅の種類は？<span class="icon-required">必須</span></p>
							<ul class="list-group">
							<li>
							<p class="top-10">
<?php
	if($e_syurui == 1){
?>
						<input type="radio" name="e_syurui" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_syurui" value="1">
<?php
	}
?>
							1.リノベーションマンション<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_syurui == 2){
?>
						<input type="radio" name="e_syurui" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_syurui" value="2">
<?php
	}
?>
							2.新築マンション<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_syurui == 3){
?>
						<input type="radio" name="e_syurui" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_syurui" value="3">
<?php
	}
?>
							3.新築戸建て<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_syurui == 4){
?>
						<input type="radio" name="e_syurui" value="4" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_syurui" value="4">
<?php
	}
?>
							4.中古マンション<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_syurui == 5){
?>
						<input type="radio" name="e_syurui" value="5" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_syurui" value="5">
<?php
	}
?>
							5.中古戸建て<br>
							</p>
							</li>
							</ul>
<?php
	if($e_syurui_msg){
?>
				<div id="errmsg"><?=$e_syurui_msg?></div>
<?php
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">「リノベーションマンション」を選んだ理由を教えてください。</p>
							<p class="top-10">
							<textarea name="e_riyuu" style="width:95%;height:70px;" placeholder="「リノベーションマンション」を選んだ理由をご入力ください。" class="form-control"><?=$e_riyuu?></textarea>
<?php
	if($e_riyuu_msg){
?>
				<div id="errmsg"><?=$e_riyuu_msg?></div>
<?php
	}
?>
							</p>
						</div>
						<div class="top-10">
							<p class="ques">リノベーションマンション購入時の検討内容は？(複数回答可)</p>
							<ul class="list-group">
							<li>
							<p class="top-10">
<?php
	if($e_kentounaiyou1 == 't'){
?>
						<input type="checkbox" name="e_kentounaiyou1" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kentounaiyou1" value="t">
<?php
	}
?>
							1.売主の信頼性（規模、評判や実績、工事内容など）<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kentounaiyou2 == 't'){
?>
						<input type="checkbox" name="e_kentounaiyou2" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kentounaiyou2" value="t">
<?php
	}
?>
							2.居住後の保証内容やアフターサービス<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kentounaiyou3 == 't'){
?>
						<input type="checkbox" name="e_kentounaiyou3" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kentounaiyou3" value="t">
<?php
	}
?>
							3.構造・耐震<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kentounaiyou4 == 't'){
?>
						<input type="checkbox" name="e_kentounaiyou4" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kentounaiyou4" value="t">
<?php
	}
?>
							4.管理体制・近隣トラブル<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kentounaiyou5 == 't'){
?>
						<input type="checkbox" name="e_kentounaiyou5" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kentounaiyou5" value="t">
<?php
	}
?>
							5.築年数<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kentounaiyou6 == 't'){
?>
						<input type="checkbox" name="e_kentounaiyou6" value="t" checked>
<?php
	}
	else{
?>
						<input type="checkbox" name="e_kentounaiyou6" value="t">
<?php
	}
?>
							6.不安はありませんでした。<br>
							</p>
							</li>
							</ul>

<?php
	if($e_kentounaiyou_msg){
?>
				<div id="errmsg"><?=$e_kentounaiyou_msg?></div>
<?php
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">当社の物件を購入していただく決め手になった点はどこですか？</p>
							<ul class="list-group">
							<li>
							<p class="top-10">
<?php
	if($e_kimete == 1){
?>
						<input type="radio" name="e_kimete" value="1" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="1">
<?php
	}
?>
							1.内装デザイン<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kimete == 2){
?>
						<input type="radio" name="e_kimete" value="2" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="2">
<?php
	}
?>
							2.仲介会社がすすめてくれた<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kimete == 3){
?>
						<input type="radio" name="e_kimete" value="3" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="3">
<?php
	}
?>
							3.保証・アフターサービスの充実<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kimete == 4){
?>
						<input type="radio" name="e_kimete" value="4" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="4">
<?php
	}
?>
							4.設備仕様<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kimete == 5){
?>
						<input type="radio" name="e_kimete" value="5" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="5">
<?php
	}
?>
							5.間取り・広さ<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kimete == 6){
?>
						<input type="radio" name="e_kimete" value="6" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="6">
<?php
	}
?>
							6.日当り・眺望<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kimete == 7){
?>
						<input type="radio" name="e_kimete" value="7" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="7">
<?php
	}
?>
							7.価格<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kimete == 8){
?>
						<input type="radio" name="e_kimete" value="8" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="8">
<?php
	}
?>
							8.立地・駅からの距離（エリア）<br>
							</p>
							</li>
							<li>
							<p>
<?php
	if($e_kimete == 9){
?>
						<input type="radio" name="e_kimete" value="9" checked>
<?php
	}
	else{
?>
						<input type="radio" name="e_kimete" value="9">
<?php
	}
?>
							9.周辺環境<br>
							</p>
							</li>
							</ul>

<?php
	if($e_kimete_msg){
?>
				<div id="errmsg"><?=$e_kimete_msg?></div>
<?php
	}
?>
						</div>
						<div class="top-10">
							<p class="ques">お部屋のお気に入りポイントを教えてください。</p>
							<p class="top-10">
							<textarea name="e_okiniiri" style="width:95%;height:70px;" placeholder="お部屋のお気に入りポイントをご入力ください。" class="form-control"><?=$e_okiniiri?></textarea>
<?php
	if($e_okiniiri_msg){
?>
				<div id="errmsg"><?=$e_okiniiri_msg?></div>
<?php
	}
?>
							</p>
						</div>
						<div class="top-10">
							<p class="ques">以前のお住まいと比べて、住み心地はいかがでしょうか？また、ご不便を感じる点はございますか？</p>
							<p class="top-10">
							<textarea name="e_sumigokoti" style="width:95%;height:70px;" placeholder="住み心地、ご不便を感じる点をご入力ください。" class="form-control"><?=$e_sumigokoti?></textarea>
<?php
	if($e_sumigokoti_msg){
?>
				<div id="errmsg"><?=$e_sumigokoti_msg?></div>
<?php
	}
?>
							</p>
						</div>
						<div class="top-10">
							<p class="ques">リノベーションマンション購入をご検討されている方へのアドバイスをお願いします。</p>
							<p class="top-10">
							<textarea name="e_advice" style="width:95%;height:70px;" placeholder="リノベーションマンション購入をご検討されている方へのアドバイスをご入力ください。" class="form-control"><?=$e_advice?></textarea>
<?php
	if($e_advice_msg){
?>
				<div id="errmsg"><?=$e_advice_msg?></div>
<?php
	}
?>
							</p>
						</div>
						<div class="top-10">
							<p class="ques">弊社社員の対応、ご満足度についてお気づきの点などございましたらお聞かせください。（服装・ご挨拶・マナー、購入アドバイス・事前準備などのご説明他）</p>
							<p class="top-10">
							<textarea name="e_manzokudo" style="width:95%;height:70px;" placeholder="弊社社員の対応、ご満足度についてお気づきの点をご入力ください。" class="form-control"><?=$e_manzokudo?></textarea>
<?php
	if($e_manzokudo_msg){
?>
				<div id="errmsg"><?=$e_manzokudo_msg?></div>
<?php
	}
?>
							</p>
						</div>
						<div class="top-10">
							<p class="ques">当社へのご意見、ご要望、お気づきの事項などございましたら是非お聞かせください。</p>
							<p class="top-10">
							<textarea name="e_iken" style="width:95%;height:70px;" placeholder="当社へのご意見、ご要望、お気づきの事項などをご入力ください。" class="form-control"><?=$e_iken?></textarea>
<?php
	if($e_iken_msg){
?>
				<div id="errmsg"><?=$e_iken_msg?></div>
<?php
	}
?>
							</p>
						</div>
						<div class="clear-box"></div>
						<table class="formTable">
						<tr> 
						<th class="tablemidashi" colspan="2">個人情報の取り扱いについて
						</th> 
						</tr>
						<td> 
						情報を送信していただく前に、
						当社の<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">『個人情報保護方針』</a>に同意していただくことが必要です。<br>
						個人情報保護方針をご精読の上、同意できる場合は<b>［個人情報保護方針に同意して確認に進む］</b>のボタンをクリックしてください。
						</td>
						</tr>
						</table>
						<div class="botancenter">
						<input type="submit" name="entrygo2" value="個人情報保護方針に同意して確認に進む"  class="sousin_button">
						<input type="hidden" name="e_familyname" value="<?=$e_familyname?>">
						<input type="hidden" name="e_name" value="<?=$e_name?>">
						<input type="hidden" name="e_familynamefuri" value="<?=$e_familynamefuri?>">
						<input type="hidden" name="e_namefuri" value="<?=$e_namefuri?>">
						<input type="hidden" name="e_tel" value="<?=$e_tel?>">
						<input type="hidden" name="e_mail" value="<?=$e_mail?>">
						<input type="hidden" name="e_mail_check" value="<?=$e_mail_check?>">
						<input type="hidden" name="e_yuubinbangou" value="<?=$e_yuubinbangou?>">
						<input type="hidden" name="e_address1" value="<?=$e_address1?>">
						<input type="hidden" name="e_address2" value="<?=$e_address2?>">
						<input type="hidden" name="e_mansion" value="<?=$e_mansion?>">
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
//個人情報入力フォーム
else{
require_once("design.php");

$HTMLTITLE ="アンケート";
$currentmenu = 33;


user_header_other($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-other">
		<div class="row">
			<h2><img src="images/title-questionnairer.png" alt="お客様アンケート" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>より良い商品・サービスをお客様へご提供していくためにアンケートへのご協力をお願いします。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="index.php">ホーム</a></li>
		<li class="arrow">アンケート</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>アンケート</span></div>
						<p class="bottom-10">
							<img src="images/quocard.jpg" class="img-right"/>
							この度は、スター・マイカグループをご利用いただきまして誠にありがとうございました。<br>
							今後、より良い商品・サービスをお客様へご提供していくためにアンケートへのご協力をお願いします。<br>
							アンケートに回答していただいたお客さま全員にQuoカード1,000円分をプレゼントいたします。<br><br>
							※スター・マイカレジデンスをご利用いただき、お住まいをご購入いただいたお客さまを対象とさせていただきます。<br>
							※引越し予定の方は新住所でのご登録をお願いします。
						</p>
						<img src="images/step01_on.png" />
						<div class="clear-box"></div>
						<FORM method="post" action="inquiry.php">
						<table class="formTable">
						<tr> 
						<th class="tablemidashi" colspan="2">お客様について
						</th> 
						</tr>
						<tr>
						<th>
						お名前<span class="icon-required">必須</span>
						</th>
						<td>
						姓：<input type="text" name="e_familyname" value="<?=$e_familyname?>" style="width:30%" placeholder="例：田中" class="form-control">&nbsp;&nbsp;
						名：<input type="text" name="e_name" value="<?=$e_name?>" style="width:30%" placeholder="例：一郎" class="form-control"><br>
						<span class="supportmsg">（例：「姓：田中」「名：一郎」）</span>
<?php
	if($e_familyname_msg){
?>
					<div id="errmsg"><?=$e_familyname_msg?></div>
<?php
	}
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
						姓：<input type="text" name="e_familynamefuri" value="<?=$e_familynamefuri?>" style="width:30%" placeholder="例：たなか" class="form-control">&nbsp;&nbsp;
						名：<input type="text" name="e_namefuri" value="<?=$e_namefuri?>" style="width:30%" placeholder="例：いちろう" class="form-control"><br>
						<span class="supportmsg">（例：「姓：たなか」「名：いちろう」）</span>
<?php
	if($e_familynamefuri_msg){
?>
					<div id="errmsg"><?=$e_familynamefuri_msg?></div>
<?php
	}
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
						<input type="text" name="e_mail" style="width:50%;ime-mode:disabled" value="<?=$e_mail?>" placeholder="例：info@smr.jp" class="form-control">
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
						<input type="text" name="e_mail_check" style="width:50%;ime-mode:disabled" value="<?=$e_mail_check?>" placeholder="例：info@smr.jp" class="form-control">
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
						<input type="text" name="e_yuubinbangou" style="width:30%;ime-mode:disabled" value="<?=$e_yuubinbangou?>" placeholder="例：107-0052" class="form-control">
						<span class="supportmsg">半角英数（例：107-0052）</span>
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
						<SELECT NAME="e_address1" size="1" style="width:30%">
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
						<input type="text" name="e_address2" style="width:80%" value="<?=$e_address2?>" placeholder="例：港区虎ノ門4-3-1 虎ノ門マンション202号室 " class="form-control"><br>
						<span class="supportmsg">（例：港区虎ノ門4-3-1 虎ノ門マンション202号室）</span>
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
						ご購入マンション<span class="icon-required">必須</span>
						</th>
						<td>
						<input type="text" name="e_mansion" style="width:80%" value="<?=$e_mansion?>" placeholder="例：虎ノ門マンション202号室" class="form-control"><br>
						<span class="supportmsg">（例：虎ノ門マンション202号室）</span>
<?php
	if($e_mansion_msg){
?>
					<div id="errmsg"><?=$e_mansion_msg?></div>
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
						新居への引越日（予定）
						</th>
						<td>
						<input type="text" name="e_hikkoshi" style="width:80%" value="<?=$e_hikkoshi?>" placeholder="例：12月20日 または 2016年1月中旬" class="form-control">頃<br>
						<span class="supportmsg">（例：12月20日 または 2016年1月中旬 等）</span>
<?php
	if($e_hikkoshi_msg){
?>
					<div id="errmsg"><?=$e_hikkoshi_msg?></div>
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
						当社の<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">『個人情報保護方針』</a>に同意していただくことが必要です。<br>
						個人情報保護方針をご精読の上、同意できる場合は<b>［個人情報保護方針に同意して確認に進む］</b>のボタンをクリックしてください。
						</td>
						</tr>
						</table>
						<div class="botancenter">
						<input type="submit" name="entrygo1" value="個人情報保護方針に同意して次に進む"  class="sousin_button">
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
