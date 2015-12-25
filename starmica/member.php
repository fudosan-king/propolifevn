<?php
if($_POST['entrygo']){
	if($_POST['rulecheck']){
		$rulecheck = htmlspecialchars($_POST['rulecheck'], ENT_QUOTES);
		if($rulecheck == '2'){
			$rulecheck_msg = "会員規約にご同意いただけない場合は会員登録ができません。";
			$errorflag = 1;
		}
	}
	else{
		$rulecheck_msg = "会員規約にご同意いただけない場合は会員登録ができません。";
		$errorflag = 1;
	}
}
if($errorflag != 1 AND $_POST['entrygo']){
	header("Location:member_tourok.php");
	exit();
}
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
			<div id="membertokuten" class="row">
				<div class="col one-third">
					<section>
					<p class="img"><img src="images/member-01.png" /></p>
					<h2>未公開リノベーション物件!!　</h2>
					<p>一般公開する前に、未公開物件情報を会員様限定でご案内いたします。年間約1000室程度の豊富な中古マンション取引を行っているスター・マイカグループならではの、他社には無い情報があります。</p>
					</section>
				</div>
				<div class="col one-third">
					<section>
					<p class="img"><img src="images/member-02.png" /></p>
					<h2>未公開ビフォー物件!!　</h2>
					<p>リノベーションに最適な素材物件に出会うことは、なかなか難しいことだと思います。当社グループでは会員様限定で、これからリノベーションにとりかかる素材物件を会員様限定でご紹介しております。</p>
					</section>
				</div>
				<div class="col one-third">
					<section>
					<p class="img"><img src="images/member-03.png" /></p>
					<h2>セミナー・オープンルーム情報　</h2>
					<p>リノベーションのセミナー情報や、オープンルームの情報をいち早くお届けします。</p>
					</section>
				</div>
			</div>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec02">
						<div class="midashi-s"><span>スター・マイカ・レジデンス 会員登録</span></div>
						<p class="bottom-10">会員登録をご希望の方は、下記の会員規約にご同意の上、登録フォームにお進みください。</p>

						<div class="kiyaku">
							<div class="text-scr">
								<b>会員規約</b><br>
								この会員規約(以下、「本規約」という)はスター・マイカ・レジデンス株式会社（以下、「当社」という）が提供する会員サービス(以下、「本サービス」という)について、会員のサービス、会員情報の取り扱い、および利用の条件を規定したものです。<br><br>
								<b>1. 目的</b><br>
								本サービスは、当社が、当社ホームページを利用されているお客様に対して、電子メール・メールマガジンを通じ、不動産の物件情報やリノベーションに関する情報などの提供及び、当社担当者との間でご連絡を取らせていただくことを目的としています。<br>

								<b>2. 会員 </b><br>
								本サービスの会員とは、本規約を承諾のうえ、下記のいずれかに定める入会手続を完了し、当社の承認を得た方とします。<br>

								<b>3. 入会 </b><br>
								本サービスへの入会手続は、以下の各号に定める方法のうちいずれかによるものとします。<br>
								（1）	当社が運営するホームページに設置されている所定の会員登録フォームに必要事項をご入力。<br>
								（2）	当社が開催する説明会や相談会、現地販売会等にご参加いただき、所定の会員登録申込用紙に必要事項を記入し、ご提出。<br>

								<b>4. 登録情報</b><br>
								入会手続きにあたっては、真実かつ正確な情報を入力・記入し、当社へご提出いただくものとします。<br>

		 						<b>5. 会員の個人情報</b><br>
								当社は会員の個人情報については当社<a href="privacy.php" target="_blank">「プライバシーポリシー」</a>に準拠して取り扱います。<br>

								<b>6. 退会</b><br>
								本サービスからの退会をご希望される場合は、当社ホームページのお問い合わせ画面より退会希望の旨をご連絡ください。当社は、会員より退会の申し出があった場合、速やかにその手続きをとるものとします。<br>

								<b>7. 登録の抹消 </b><br>
								会員が下記の各号に該当する場合、当社は予告なしに退会手続をとらせていただくことがあります。 <br>
								（1） 当社からのＥメールや送付物が宛先不明で発送者に戻った場合<br>
								（2） 会員の登録情報に虚偽があった場合<br>
								（3） 不動産業者の方の登録であることが判明した場合<br>
								（4） その他本サービスの運営に支障があると当社が判断した場合<br>

								<b>8. 会費</b><br>
								本サービスについては、入会金、会費等は一切無料です。<br>

								<b>9. サービスの変更・中断・廃止</b><br>
								当社は、会員の承諾を得ることなく、本サービスの運営の一部もしくは全部を変更、中断、廃止する場合があります。なお、これにより会員に不利益が発生した場合、当社は一切責任を負わないものとします。<br>

								<b>10. 規約の変更</b><br>
								当社は、会員の事前の承諾を得ることなく、必要に応じて本規約を変更する場合があります。この場合、当社は、本規約の変更について、当社ホームページを通じて会員にお知らせします。会員は自らの責任においてこの変更について確認するものとし、本規約の変更から当社が定める期間（定めなき場合は1週間）以内に退会の申出がない場合には、本規約の変更に対する同意があったものとします。<br>

								<b>11. 禁止事項</b><br>
								会員は、本サービスを通じて提供される情報やサービスについて、個人で利用する範囲を超える商業目的等で使用することはできません。 <br>

								<b>12. 免責</b><br>
								本サービスを通じて提供される情報やサービスを利用し、または信用してなされた会員の行為の結果について、当社は一切責任を負わないものとします。 <br><br>

								【「会員規約」に関するお問合せ窓口】<br>
								スター・マイカ・レジデンス株式会社<br>
								〒105-6028　東京都港区虎ノ門4-3-1　城山トラストタワー28階<br>
								お問合せ窓口 TEL:03-5776-2555<br>
								<br>
							</div>
							<!--/text-scr-->
							<p class="top-20">
								<span class="chuui07">※本サービスは消費者の皆様にいち早く未公開の情報をお届けするために実施するものであり、不動産業界関係者の商業目的でのご登録はお控え頂きますようお願いします。</span>
							</p>
						</div>

						<FORM method="post" action="member.php">
						<div class="center">
							<input type="radio" value="1" class="cust_radio" name="rulecheck"/><label for="label_01">同意する</label>&nbsp;&nbsp;
							<input type="radio" value="2" class="cust_radio" name="rulecheck" /><label for="label_02">同意しない</label>
<?php
	if($rulecheck_msg){
?>
					<div id="errmsg"><?=$rulecheck_msg?></div>
<?php
	}
?>

						</div>
						<div class="top-20">
							<div class="center">
							<input type="submit" name="entrygo" value="会員登録フォームへ" class="link_button02">
							</div>
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
