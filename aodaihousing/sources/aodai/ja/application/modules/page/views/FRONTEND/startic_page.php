<?php if($item->id == 556){
	// if page is 入居までの流れ
	?>
	<div class="wrapper-content-block rent-appartment-steps">
	<div class="container">
				<!-- Breadcums -->
				<?php 
					// File store under folder application/views/FRONTEND/breadcums.php
					echo $this->load->view('FRONTEND/breadcums');
				?>

				<div class="steps-block">
					<h2 class="heading-title">入居までの流れ</h2>	
					<div class="row">
						<!-- step 1 -->
						<div class="content-step-block col-xs-4">
							<div class="step-item">
								<div class="steps">
									<div class="image-step">
										<img src="<?=PATH_URL.'static/images'?>/icon/step-icon1.png" title="">
									</div>
									<div class="title-step">
										<p class="">
											<span class="span-step">Step</span>
											<span class="span-number">01</span>
										</p>
										<p>お問い合わせ</p>
									</div>
								</div>
								<p class="content-step">
									などなど弊社では、ホーチミン市のコンドミニアム・サービスアパートはほぼ全ての物件をご紹介しております。ご希望のご予算、間取り、入居希望時期等の情報をお問い合わせフォームからかお電話でご連絡下さい。 ご希望に近い物件をまとめてご覧になって頂けるようにスケジュール調整をさせて頂きご案内させて頂きます。 その他何かご不安な点やご質問など御座いましたら合わせてお気軽にご相談下さい。
								</p>
								<p class="content-center">お電話でお問い合わせの場合</p>
								<div class="info-phone-block">
									<p class="info-phone">
										<span>+ 84 - 8 - 3827 - 5068</span> 
										<span>( アオザイハウジング代表日本語 )</span>
									</p>
									<p class="info-phone">
										<span>+ 84 - 8 - 3827 - 5068</span> 
										<span>(魚山 )</span>
									</p>
								</div>
								<p class="content-center">
									<span>
										以下内容で問い合わせる
									</span>
									<span>
										( Nhấp vào liên kết bên dưới )
									</span>
								</p>
								<div class="ask-step-block">
									<a href="" class="contact-detail btn-red">問い合わせする</a>
								</div>
							</div><!-- step-item -->
						</div><!-- content-step-block -->
						<!-- step 2 -->
						<div class="content-step-block col-xs-4">
							<div class="step-item">
								<div class="steps">
									<div class="image-step">
										<img src="<?=PATH_URL.'static/images'?>/icon/step-icon2.png" title="">
									</div>
									<div class="title-step">
										<p class="">
											<span class="span-step">Step</span>
											<span class="span-number">02</span>
										</p>
										<p>よくある質問</p>
									</div>
								</div>
								<p class="content-step">
									弊社の日本人担当者とスタッフが内見に同行させて頂き、お部屋やオフィスのご説明や条件交渉から周辺環境のご説明までさせて頂いておりますので、初めての海外の方もご安心下さい。内見は土曜日も承っております。事前にアパートの管理者やオーナー様への予約が必要なため、あらかじめご希望の日程、お時間をお知らせ下さい。<br>
									発行可能か、ビザ取得に必要な住所証明書の発行が可能な住居か、会社の住所登記やライセンスが取得可能な建物か等の細かな情報まで確認させて頂いております。その他についてもお気軽にご質問下さい。
								</p>
							</div><!-- step-item -->
						</div><!-- content-step-block -->
						<!-- step 3 -->
						<div class="content-step-block col-xs-4">
							<div class="step-item">
								<div class="steps">
									<div class="image-step">
										<img src="<?=PATH_URL.'static/images'?>/icon/step-icon3.png" title="">
									</div>
									<div class="title-step">
										<p class="">
											<span class="span-step">Step</span>
											<span class="span-number">03</span>
										</p>
										<p>内覧・入居フロー</p>
									</div>
								</div>
								<p class="content-step">
									お部屋が決まりましたら、物件を押さえる為に予約を行います。物件を押さえる際には、管理者やオーナー様に予約手付金のお支払いと契約書、各書類作成の為に住居物件は入居者様のパスポートコピー、滞在登録の確認の為にビザのコピー、法人契約の場合は会社のライセンスコピーなども頂いております。 予約手付金は、ご契約時に全額ご返金かまたは契約時の保証金デポジットや前家賃に充当となります。
								</p>
							</div><!-- step-item -->
						</div><!-- content-step-block -->
					</div><!-- row -->
					<div class="row">
						<!-- step 4 -->
						<div class="content-step-block col-xs-4">
							<div class="step-item">
								<div class="steps">
									<div class="image-step">
										<img src="<?=PATH_URL.'static/images'?>/icon/step-icon4.png" title="">
									</div>
									<div class="title-step">
										<p class="">
											<span class="span-step">Step</span>
											<span class="span-number">04</span>
										</p>
										<p>ご契約の流れ</p>
									</div>
								</div>
								<p class="content-step">
									契約書にサインとなります。<br>
									入居までに賃貸借契約書へのご署名及びデポジットと前家賃をお支払い頂きます。 <br>
									物件により異なりますが、目安としましては、住居物件は、デポジット2ヶ月分、前家賃1~2ヶ月分の物件が多く、オフィス物件は、デポジット3ヶ月、前家賃3ヶ月の物件が多くなっております。
								</p>
							</div><!-- step-item -->
						</div><!-- content-step-block -->
						<!-- step 5 -->
						<div class="content-step-block col-xs-4">
							<div class="step-item">
								<div class="steps">
									<div class="image-step">
										<img src="<?=PATH_URL.'static/images'?>/icon/step-icon5.png" title="">
									</div>
									<div class="title-step">
										<p class="">
											<span class="span-step">Step</span>
											<span class="span-number">05</span>
										</p>
										<p>入居後の対応</p>
									</div>
								</div>
								<p class="content-step">
									入居後のケアもアオザイハウジングがしっかり対応します。
								</p>
							</div><!-- step-item -->
						</div><!-- content-step-block -->
					</div>
				</div><!-- steps-block -->
			</div><!-- container -->
			</div>
	<?php
	} 
	elseif ($item->id == 557) {
		// if page is ホーチミンの住居の種類と注意点
		?>
	<div class="wrapper-content-block vn-visa-block type-hcm-house">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  ホーチミンの賃貸物件について  /  <a href="#">ホーチミンの住居の種類と注意点</a></span>
					</div>
				</div>
				<div class="vn-visa">
						<h4 class="red-heading-title">ベトナム労働許可証</h4>
						<div class="bt-solid"></div>
						<p class="content-blue">
							ロータスサービス事業部<br/>
							労働許可証・レジデンスカード
						</p>
						<div class="logo-lotus">
							<img src="<?=PATH_URL.'static/images'?>/icon/logo-lotus.png" title="logo-lotus"/>
						</div>
						<div class="title-permit">
							<h4 class="bold-text">
								住居の種類と特徴・注意点
							</h4>
						</div>
						<div class="common-content-block">
							
							<p class="common-text">中心地の1区、3区と住宅地の2区、ビンタン区、7区に日本人は多く住んでおります。<br/>
							ホーチミン市でほとんどの日本人が住まわれているアパートの種類は、大きく分けるとアパートメント・部屋貸し、サービスアパート、コンドミニアムの3種類になっています。<br/>
							ホーチミン市の住居物件の特徴として、どの物件も家具付きが多く、すぐに住める物件がほとんどで、賃料に関しては日本と比べて割安な物件から高級な物件まで様々となっています。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">レジデンスカード</p>
							<p class="common-text">労働許可証の取得、免除申請、更新、レジデンスカード、家族付帯ビザもサポート実績豊富なロータスサービスにお任せ下さい。<br/>
							労働許可証は、ベトナムにおいて外国人が働くために必要になります。<br/>
							労働許可証もしくは免除を取得しますとレジデンスカード（短期滞在許可証/2年のマルチビザ）の取得もできます。<br/>
							今のところ管理者、技術者、専門家の3つのカテゴリーについて変更はありません。また取得手続きではなく、免除申請手続きになる方もいらっしゃいます。※1<br/>
							当局への提出書類の内容に1部変更が発生しており、経験についてのヒアリング内容に変更が出ております。必要書類が1部変更しています。個別に要望する必要書類が変わることを防ぐため、管理者、技術者、専門家に合わせた申請する際の専門家証明書などの書類作成も重要になってきます。幣サービスでは、経験豊富な日本人担当者とベトナム人弁護士で申請前の書類取得段階、書類作成段階からサポートしております。引き続き取得希望時期の2ヶ月前くらいにご相談下さい。提出時の正確な情報を基にご提案をさせて頂いております。
							大学卒業でない場合も取得、申請が失敗されて再申請をご希望の場合も可能ですのでご相談下さい。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">【アパートメント・部屋貸し】</p>
							<p class="common-text">
								アパートメント・部屋貸しは、個人のオーナー様がアパートを営んでいる物件になります。<br/>
								街中にある場合も多く、個人の方が建てたものから戸建てを部屋ごとに貸しているもの、店舗物件の上の部屋を貸している物件まであります。<br/>
								このタイプでは多くの物件で室内にキッチンと洗濯機が付いていません。ただし、ソファ、テーブル、ベット、エアコン、テレビ、ミニ冷蔵庫、共用のWI-FIなど家具家電が利用できるようになっており、設置されているものが古い場合も多いのですが、すぐ住めるように準備されています。質はサービスアパートに比べ劣る場合がありますが、ベットメーキング、掃除、洗濯などのサービスがついています。<br/>
								オーナー様や管理人が住み込みされているケースもあり、設備トラブルがあった場合の対応は比較的対応してくれる物件もあります。ただ根本的に古い建物の場合、建物の質が良くない為に起きるトラブル、設備が旧式な為に起きるトラブルがあります。このような場合、大きな工事をしないとどうしても直せないケースなどがあり、直せないことがあります。また時々あるのが、正式な門限ではないのですが、夜中の帰宅時に建物が戸締りされていて、建物になかなか入れないということが起きることもあります。<br/>
								オーナー様も個人と契約をすることが多いため、経費にする為のインボイス関係の書類、ビザや労働許可証申請に必要な住所証明の発行が可能な方なのか確認が必要です。生活や通勤に便利な場所が好みの単身の方が中心に住まれているタイプになります。
							</p>
						</div>
						<div class="common-content-block">					
							<p class="common-text">- ★特徴<br/>
								－トラブルの際に比較的スムーズな物件もある<br/>
								－建物が比較的古い場合が多い<br/>
								－古い場合があるが家具家電が設置されている<br/>
								－実質的な門限がある場合がある<br/>
								－インボイス関係、居住証明が発行できるか確認
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">レジデンスカード（一時滞在許可証）</p>
							<p class="common-text">★予算感<br/>
								単身用は300$程度から1000$程度<br/>
								2LDK以上は800$程度から
							</p>
						</div>
						<div class="common-content-block">
							<p class="common-text">
								弊社では、ホーチミン市のアパートメント、部屋貸しをご紹介しております。<br/>
								ご希望のご予算、間取り、入居希望時期等の情報をお問い合わせフォームからかお電話でご連絡下さい。<br/>
								ご希望に近い物件をまとめてご覧になって頂けるようにスケジュール調整をさせて頂きご案内させて頂きます。その他何かご不安な点やご質問など御座いましたら合わせてお気軽にご相談下さい。
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">【サービスアパート】</p>
							<p class="common-text">サービスアパートとは、法人のオーナー様が建物全部を所有管理している物件になります。<br/>
							このタイプでは、建物が単独で建てられているものから、ホテルや複合ビルに併設されている物件もあります。こちらのお部屋もソファ、テーブル、ベット、エアコン、テレビ、wi-fi、冷蔵庫、物件によっては洗濯機など家具家電が揃えられておりすぐに住めるように準備されています。またベットメーキング、掃除、洗濯などのサービスがあります。<br/>
							建物、設備の不具合がないわけではないのですが、管理やメンテナンスが比較的良く、何かトラブルがあった際にもいつも使っている業者や技術者がいるので対応がスムーズで安心と言えます。高級物件には、建物内にジムやプールが併設されており、レセプションもありホテルに住む感じと言えます。<br/>
							サービスアパートは、インボイス書類発行、住所登録証明などの発行もほぼ問題なく対応してくれます。安心感が高いため、初めて海外に住まわれる方、駐在員の方に人気が高いタイプになります
							</p>
						</div>
						<div class="common-content-block">					
							<p class="common-text">★特徴<br/>
							－管理体制、トラブル時の対応が比較的良い為安心感がある<br/>
							－家具、家電がそろっているのですぐに住める<br/>
							－ベッドメーキング、掃除、洗濯などのサービスがある<br/>
							－高級物件はホテル同様<br/>
							－インボイス、住所証明の発行もほぼ問題ない
							</p>
						</div>
						<div class="common-content-block">					
							<p class="common-text">★予算感<br/>
								単身用は600$～2,000$程度<br/>
								2LDK以上は1,500$程度から4,000$程度
							</p>
						</div>
						<div class="common-content-block">					
							<p class="bold-text">通学に便利 日本人学校のバスが留まるサービスアパート<br/>
							SOMERSET HO CHI MINH（サマーセット・ホーチミン）<br/>
							SOMERSET CHANCELLAR COURT（サマーセット・チャンセラーコート）<br/>
							NORFOLK MANSION（ノーフォークマンション）<br/>
							SAIGON SKYGARDEN（サイゴンスカイガーデン）<br/>
							INDOCHINE（インドチャイナ）<br/>
							SHERWOOD RESIDENCE（シャーウッドレジデンス）<br/>
							SOMERSET VISTA（サマセットビスタ）
							</p>
						</div>
						<div class="common-content-block">					
							<p class="bold-text name-upper-text">高級サービスアパート<br/>
							【1区】<br/>
							SOMERSET HO CHI MINH（サマーセット・ホーチミン）<br/>
							SOMERSET CHANCELLAR COURT（サマーセット・チャンセラーコート）<br/>
							NORFOLK MANSION（ノーフォークマンション）<br/>
							SAIGON SKYGARDEN（サイゴンスカイガーデン）<br/>
							LANCASTER（ランカスター）<br/>
							INTERCONTINENTAL（インターコンチネンタル）<br/>
							CITY VIEW（シティビュー）<br/>
							LANDMARK（ランドマーク）<br/>
							Sedona Suite（セドナスイーツ）<br/>
							BEN THANH LUXURY（ベンタンラグジュアリー）<br/>
							AVALON（アバロン）<br/>
							【3区】<br/>
							INDOCHINE（インドチャイナ）<br/>
							SAIGON PAVILLON（サイゴンパビロン）<br/>
							SHERWOOD RESIDENCE（シャーウッドレジデンス）<br/>
							SAIGON COURT（サイゴンコート） <br/>
							【ビンタン区】<br/>
							SAIGON VIEW RESIDENCES（サイゴンビューレジデンス）<br/>
							CANTAVIL HOAN CAU（カンタビル・ホアン・カウ）<br/>
							【2区】<br/>
							SOMERSET VISTA（サマセットビスタ）
							</p>
						</div>
						<div class="common-content-block">					
							<p class="common-text">などなどこの他にもホーチミン市のサービスアパートは、ほぼ全ての物件をご紹介しております。 ご希望のご予算、間取り、入居希望時期等の情報をお問い合わせフォームからご連絡下さい。 ご希望に近い物件をまとめてご覧になって頂けるようにスケジュール調整をさせて頂きご案内させて頂きます。その他何かご不安な点やご質問など御座いましたら合わせてお気軽にご相談下さい。
							</p>
						</div>
						<div class="common-content-block">	
							<p class="bold-text">
								【コンドミニアム】
							</p>				
							<p class="common-text">コンドミニアムタイプは、日本で言う分譲マンションの区分一部屋を賃貸に出している物件になります。法人オーナー様が所有されていることも時々ありますが、大部分が個人のオーナー様の場合が多くなっています。 コンドミニアムのオーナー様は、複数のお部屋を持って経営されている方もいますが、最近ではオーナーチェンジも含めて急遽投資目的で購入された方や、ベトナムに普段いらっしゃらない方が購入されているケースも増えており、アパート経営の経験が少ない方も増えております。<br/>
							貸し出しているコンドミニアムのほとんどのお部屋には、ソファ、テーブル、ベット、テレビ、wi-fi、エアコン、洗濯機、冷蔵庫など家具家電が一通り揃えられております。また、敷地内にスーパー、ジム、プール、公園、飲食店などが設置されている物件もあります。<br/>
							建物の質に関しては物件により様々ですが、サービスアパートと同じくらいの物件から質が劣る物件まであります。何か不具合があった場合、オーナー様個人に直接対応してもらうことになりますが、個人オーナー様は、高級サービスアパートのように技術者を抱えていない為、直しに来るのに時間がかかるケース、共用部分と絡んでなかなか直せない大きな不具合が起きるケースの場合にコンドミニアムを賃貸した場合のネックになることがあります。<br/>
							ただ、コンドミニアムの中でも建物の管理体制が比較的良い物件もあります。そのような物件にはある程度直せる技術者が管理会社におり、費用が入居者持ちになるケースはあるものの、急ぎの不具合は手配すれば解決できるケースがあります。<br/>
							建物の管理状況、劣化状況により経験上トラブルが多いため、お勧めできない物件も正直ありますが、建物の質が良い物件や管理体制がある程度整っている物件、劣化や壊れが少ない新しい物件はお勧めできる物件があります。<br/>
							インボイス、住所証明の発行に関しては、できないオーナー様の場合がありますので個別に確認が必要です。サービスアパートに比べれば、トラブル対応に関しては劣る場合がありますが、高級サービスアパートよりも割安で、同じ賃料であれば広い物件となります。またコンドミニアム物件では、子供の通学や通勤に便利な物件もあります。<br/>
							単身用物件でもオートロックや室内に洗濯機、キッチンが設置されており、ファミリーから単身者まで住まわれているタイプになります。
							</p>
						</div>
						<div class="common-content-block">					
							<p class="common-text">★特徴 <br/>
							－建物の質が物件により様々。トラブル時の対応がオーナー様次第。<br/>
							－設備、家具、家電がそろっているのですぐに住める<br/>
							－通学や通勤に便利な物件がある －オートロックが付いている物件が多く、門限がない<br/>
							－単身用の物件でもキッチン、洗濯機がついている<br/>
							－インボイス書類、住所証明の発行ができるかは確認が必要
							</p>
						</div>
						<div class="common-content-block">					
							<p class="common-text">★予算感 <br/>
							単身用は700$程度から1,200$程度<br/>
							2LDK以上は1,000$程度から2,500$程度
							</p>
						</div>
						<div class="common-content-block">					
							<p class="bold-text name-upper-text">通学に便利 日本人学校のバスが留まるコンドミニアム<br/>
							SAIGON PEARL(サイゴンパール)<br/>
							THE MANOR(マナー)<br/>
							THE ESTELLA（エステラ）<br/>
							SAMASET VISTA（サマセット・ヴィスタ）<br/>
							SUNRISE CITY（サンライズシティ）<br/>
							GARDEN PLAZA（ガーデンプラザ）<br/>
							SKY GARDEN（スカイガーデン）<br/>
							GRANDVIEW（ガーデンヴュー）<br/>
							IVER PARK（リバーパーク）<br/>
							PANORAMA（パノラマ）<br/>
							GARDEN COURT（ガーデンコート）<br/>
							RIVER SIDE RESIDENCE（リバーサイドレジデンス）
							</p>
						</div>
						<div class="common-content-block">					
							<p class="bold-text name-upper-text">ホーチミン市内の有名なコンドミニアム<br/>
							【ビンタン区】<br/>
							SAIGON PEARL(サイゴンパール)<br/>
							THE MANOR(マナー)<br/>
							CITY GARDEN(シティガーデン)<br/>
							PEARL PLAZA(パールプラザ)<br/>
							VINHOMES CENTRAL PARK（ビンホームズセントラルパーク）<br/>
							【2区】<br/>
							THE ESTELLA（エステラ）<br/>
							THAO DIEN PEARL（タオディエンパール）<br/>
							SAMASET VISTA（サマセット・ヴィスタ）<br/>
							CANTAVIL（カンタビル）<br/>
							MASTERI THAO DIEN（マステリ）<br/>
							XI REVIEW PALACE（シーリバービュー）<br/>
							THE ASCENT（アセント）<br/>
							【1区】<br/>
							HORIZON（ホライズン）<br/>
							SAILING TOWER（セーリングタワー）<br/>
							BEN THANH LUXURY（ベンタンラグジュアリー）<br/>
							AVALON（アバロン）<br/>
							【7区】 <br/>
							SUNRISE CITY（サンライズシティ）<br/>
							GARDEN PLAZA（ガーデンプラザ）<br/>
							SKY GARDEN（スカイガーデン）<br/>
							GRANDVIEW（ガーデンヴュー）<br/>
							RIVER PARK（リバーパーク）<br/>
							PANORAMA（パノラマ）<br/>
							GARDEN COURT（ガーデンコート）<br/>
							RIVER SIDE RESIDENCE（リバーサイドレジデンス）
							</p>
						</div>
						<div class="common-content-block">					
							<p class="common-text">などなど弊社では、ホーチミン市のコンドミニアムはほぼ全ての物件をご紹介しております。ご希望のご予算、間取り、入居希望時期等の情報をお問い合わせフォームからかお電話でご連絡下さい。 ご希望に近い物件をまとめてご覧になって頂けるようにスケジュール調整をさせて頂きご案内させて頂きます。 その他何かご不安な点やご質問など御座いましたら合わせてお気軽にご相談下さい。
							</p>
						</div>
				</div>		
			</div>
		</div><!-- vn-visa-block -->
		<?php
	}
	elseif ($item->id ==558) {
		// if page is ホーチミンのオフィスについて
		?>
		<div class="wrapper-content-block hcm-office-block">
		<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  ホーチミンの賃貸物件について  / <a href="#">ホーチミンのオフィスについて</a></span>
					</div>
				</div>
				<div class="hcm-office">
					<h4 class="red-heading-title">ホーチミンのオフィスについて</h4>
					<div class="bt-solid"></div>
					<div class="hcm-office-content">
						<p class="common-text">ホーチミン市のオフィス賃料は、オフィス賃貸コスト50位以内にランクインするなど、比較的高い賃料水準の都市となってきております。<br>
						2009年以降高騰した賃料は下落傾向が続きましたが、2013年度には下落にストップがかかり、横ばい傾向になりました。2014年度は様々な業種で進出の好機が増え始めたことも影響し、ビジネスの中心地1区、3区のオフィスは、空室がなくなっている物件が出始め、2015年には空室率が9%以下までになりました。<br>
						2016年はその傾向により横ばいから賃料の上昇に転じるオフィスも増え始めております。<br>
						そのような中、2016年、2017年はこのような状況から進出スタートアップ時には、レンタルオフィスを利用される企業様も増え、レンタルフィスの空室率も合わせて低下しているのも特徴となっております。</p>
					
						<p class="common-text">ベトナムのオフィスは、格付会社によりグレードA~Cにランク付けが行なわれており目安になっております。ホーチミン市では、日系企業に商業、行政の中心地である1区3区のビルに人気が高くなっております。最近では、ローカルエリアではありますが、工業団地方面に出やすいビンタン区、空港の近くのタンビン区にオフィスを構える企業様も出てきております。</p>	
						<p class="common-text">
							広さや契約期間等の条件によって変化しますが、目安賃料単価(管理費、VAT込)は、下記のようになります。<br>
							グレードA 30~60USD/m2<br>
							グレードB 20~40USD/m2<br>
							グレードC 15~25USD/m2<br>
						</p>
						<p class="common-text">
							オフィスの内覧の際ですが、ホーチミンのオフィスビルは、働かれている人数が多くなってきており、エレベーターの利用率がかなり上がっております。移動にどの位時間がかかるかなど、入居数やエレベーターの数も確認をされた方が良いです。<br>
							実際にオフィススペースを見て頂くとグレードA、Bの多くのオフィスに関しては、床がコンクリートが見えている状態、壁が塗装仕上げ、天井にシステム天井が組まれている状態になっています。<br>
							このようなオフィスでは、日本では、電気、電話、インターネット配線を行った後にOAフロアーという置き床を施工しカーペット仕上げが多いのですが、ホーチミンのオフィスでは置き床を想定した建物がまだとても少ない状況です。その為、電気、電話、インターネット配線は、コンクリート床の表面に塗られているモルタル部分を約5センチ程削り、各席まで溝を作ります。そしてその溝に配線を施した後に、再度モルタルで配線を埋めるという作業を行います。床がタイルで仕上げられている物件の場合、掘ることができないので、配線を露出して施工します。<br>
							退去の際も引き渡し時と同様にして返却することになりますので、解体期間を考えておく必要があります。
						</p>
						<p class="common-text">
							また注意点としまして、外資での会社設立、住所変更申請に必要な書類をオフィス側から提出できるかの確認をする必要が出てきます。
							設立や住所変更登記を依頼される会社様により若干求める書類が異なる場合があります。<br>
							オフィスとの賃貸契約書は、オフィス指定の契約書を用いる必要があり、ベトナム語と英語となっております。会社設立の際は、賃貸契約書の内容を指摘されるケースもあります。ですので予め会社設立や住所登録を依頼される会社様に必要書類を確認して頂き、その指示された書類が出せるか確認できるようにして頂くとスムーズです。
						</p>
						<p class="common-text">アオザイハウジングでは、ホーチミンのオフィスのほとんどを把握しており、ご希望に近いオフィスをご提案させて頂いております。オフィスに関しまして、何か御座いましたらお気軽にご相談下さい。<br>
						問い合わせする</p>
						<p class="common-text">
							2016年はその傾向により横ばいから賃料の上昇に転じるオフィスも増え始めております。<br>そのような中、2016年、2017年はこのような状況から進出スタートアップ時には、レンタルオフィスを利用される企業様も増え、レンタルフィスの空室率も合わせて低下しているのも特徴となっております。
						</p>
						<p class="bold-text">
							レンタルオフィスについて
						</p>
						<p class="common-text">
							レンタルオフィスは、内装工事が不要で、机などもセットされており、すぐに利用開始することが可能です。開業時のオフィスとしての利用から、出張で来た際のオフィスを借りたい、会社設立の時期だけオフィスを借りたい、会社申請中の業務オフィスを借りたいなどの場合にも便利です。<br>
							アオザイハウジングでは、CJBuildingオフィスセンター, Regus Saigon Tower, Crosscope, Bizwell, PSO,Centec Business Center, SunWahTower, City Hubなどホーチミン市内のレンタルオフィスほぼ全てご紹介しております。お気軽にお問い合わせ下さい。<br>
							問い合わせする
						</p>
					</div>				
				</div>
			</div>
			</div>
		<?php
	}
	elseif ($item->id == 559) {
		// if page is 住居短期契約について
		?>
	<div class="wrapper-content-block vn-visa-block contract-page">
		<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  ホーチミンの賃貸物件について  /  住居短期契約について<a href="#">ベトナムビザ</a></span>
					</div>
				</div>
				<div class="vn-visa">
					<h4 class="red-heading-title">短期契約できる住居について</h4>
					<div class="bt-solid"></div>
					
					<div class="common-content-block">
						<p class="common-text">アオザイハウジングでは、出張時に利用できるサービスアパート、アパートメント探しもお手伝いしております。<br>
						出張時にはホテル住まいよりも安く済む住居も是非ご検討下さい。<br>
						～どのくらいお得になるか ホーチミン市内3ヶ月滞在の場合～
						</p>
					</div>
					<div class="common-content-block">
						<p class="bold-text">一般的なビジネス向けで利用されるホテルの場合
						</p>
						<p class="common-text">1泊50$～80$のホテル×30日→1ヶ月1,500$～2,400$
						</p>
						<p class="red-text">
							3ヶ月分4,500$～7,200$
						</p>
					</div>
					<div class="common-content-block">
						<p class="bold-text">単身用サービスアパート、アパートメント3ヶ月滞在の場合
						</p>
						<p class="common-text">1ヶ月賃料500$～1,100$
						</p>
						<p class="red-text">
							3ヶ月賃料1,500$～3,300$
						</p>
					</div>
					<div class="common-content-block">						
						<p class="common-text">ホーチミン市の場合、基本が1年契約になりますが、アオザイハウジングでは短期契約の交渉が可能な物件をご紹介しております。短期契約の場合、オーナー様より弊社は手数料を頂けないため、お客様より紹介手数料を賃料の半月分～1ヶ月分を頂いておりますが、それでも<span class="red-text">3ヶ月程度滞在する場合、ホテルよりもサービスアパート、アパートメントが最大5,450$もお得です！</span>
						</p>
					</div>
					<div class="common-content-block">						
						<p class="common-text">*比較はビジネス向け80$のホテルに3ヶ月滞在の場合と入居時に紹介手数料を250$お支払い頂いて、500$の短期契約した物件と比較した場合になります。<br>
						短期滞在の場合の住居についてもアオザイハウジングにお気軽にご相談下さい！
						</p>
					</div>
				</div>		
			</div>
			</div><!-- wrapper-content-block -->
		<?php
	}
	elseif ($item->id == 560) {
		//page is ホーチミンの住居と日本の住居の違い
		?>
		<div class="wrapper-content-block differ-jp-hcm-page">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  ベトナム進出支援  /   <a href="#">ベトナムビザ</a></span>
					</div>
				</div>
				<div class="jp-hcm-content">
					<h4 class="red-heading-title">お客様の海外生活を全力でサポートホーチミンの住居でよく起きる不具合サポートオプション </h4>
					<div class="bt-solid"></div>
					<div class="jp-hcm-content-item">
						<div class="star-mark-title">
							<p class="content-blue">
							アオザイハウジングはお客様の海外生活を全力でサポート
							</p>
						</div>
						<p class="common-text">
							アオザイハウジングは、アパートメント・部屋貸し、サービスアパート、コンドミニアムなどの住居物件とオフィス物件のほとんどを把握しており、ホーチミン最大級の情報の中から最適な物件をご紹介させて頂いております。そして入居後の様々なサポートにも力を入れて対応しておりますので言葉の問題にも悩むことなく安心です。<br/>
							海外生活で大切な住環境。アオザイハウジングは、仲介手数料無料や手数料割安ながら、物件探しから入居後まで、お客様のホーチミン生活を全力でサポートさせて頂いております。
							故障の連絡だけでなく、オーナー様には、居住登録証明の依頼やインボイス関係などのお願いも弊社にご連絡頂き対応しております。<br/>
							また、契約を更新する場合、退去する場合には、契約満了の1ヶ月～2ヶ月前にオーナー様にご連絡をする必要がありますので、営業担当者からもご希望をお伺いさせて頂いております。更新をされる場合には、条件の調整におきましても全力で交渉させて頂いております。
						</p>
					</div><!-- jp-hcm-content-item -->
					<div class="jp-hcm-content-item">
						<div class="star-mark-title">
							<p class="content-blue">
							日本とホーチミンの住居物件の違いホーチミンの住居でよく起きる不具合
							</p>
						</div>
						<p class="common-text">
							日本とは違い1年中亜熱帯、そして1年の約半年が雨季で、時折スコールと呼ばれる集中豪雨が起きる環境です。また建物の施工品質から電化製品、備品の品質まで、あらゆる物の品質が低く日本と違います。このような中、ホーチミンの住居物件では、入居後に日本では起きないような不具合やトラブルが起きる可能性があります。<br/>
							良くあるのが天井、壁からの水漏れ、エアコンから水が垂れてくるという水周りの配管トラブルです。配管の劣化、接続が甘かった、配管が詰まったなどが主な原因です。<br/>
							水トラブル以外でも日本では起きないような不具合が発生する場合もあります。不具合が起きた場合、貸主側の管理人やオーナー様に対応を求めることになります。しかしながら言葉が通じないだけでなく、状況により対応が悪い場合があります。アオザイハウジングでは、ご入居後も万一の事態が発生した場合に、管理人やオーナー様、施工者などにコンタクトを取り、不具合解決に向けた対応をさせて頂いております。
						</p>
					</div><!-- jp-hcm-content-item -->
					<div class="jp-hcm-content-item-list">
						<h4 class="bold-text">ホーチミン住居の良く起きる注意点例</h4>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">エアコンからの水漏れ </h5>
							<p class="common-text">エアコンからの水漏れの場合、フィルター及び配水管の掃除をすることで直るケースがほとんどです。ホーチミン市では、配管の質の問題もあるかと思われますが、エアコンはほぼ1年中利用することになり、日本以上にメンテナンスの必要性が高くなります。自分で管理する必要があるコンドミニアムタイプの場合、1ヶ月~2ヶ月に1度程度の清掃や専門業者を入れることをお勧めしております。<br/>
							いずれにしましても漏れてきている場合は、まずは清掃や原因を特定する施工者の手配を行った方が良い為、その際はアオザイハウジングスタッフにご連絡下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">停電</h5>
							<p class="common-text">日本との大きな違いの1つとなりますが、ベトナムホーチミン市ではまだ停電が起こることがあります。<br/>停電が起きると照明、エアコン、インターネットが使えなくなります。また冷凍庫の中身が溶ける被害が起こる場合がどうしてもあります。<br/>
							発電機がついている建物も増え始めていますが、まだついていない建物も多くあります。<br/>
							またアオザイハウジングでは発電機がついている住居のご紹介も可能ですのでご相談下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">インターネットがつながらない、遅い</h5>
							<p class="common-text">エアコンからの水漏れの場合、色々なケースがありますが、ベトナムの場合、海底ケーブルが切れたなど障害が全体に起こっている時もあります。ADSL回線という一般の電話回線を利用しているケースも多く、大雨で回線自体の状態が悪くなるケース、建物内の利用状況でつながりにくい、遅いなど起こる場合があります。繋がらなくなった場合、モデムの電源を1度抜いて下さい。しばらく置かれてから、モデムが正常に動いている場合で、Wifiの電波を拾わない場合パソコンを再起動させてください。<br/>
							大雨や回線工事など環境的な問題がなさそうな場合には、管理者やオーナー様の技術者などに1度見てもらわないとならないケースもありますので、その場合はアオザイハウジングスタッフにご連絡下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">アリの発生</h5>
							<p class="common-text">ホーチミンの住居では、アリが大量に発生することもあります。食べ物を置いていれば発生しやすくなりますが、そうでなくても発生する場合があります。以前に日本のアリ虫コロリなども試したことがありますが、効果があまり感じませんでした。レタントンのファミリーマートで売っている害虫駆除スプレーが一番手っ取り早く効果があります。またアオザイハウジングでは駆除の専門業者のご紹介も可能ですのでご相談下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">実質的な門限</h5>
							<p class="common-text">夜中に帰宅した際に、部屋貸しやアパートメントの門の戸締りがされていて、中になかなか入れないというケースがあります。管理者や警備員が夜中は寝ているということもありますアオザイハウジングでは、門限がないコンドミニアムやサービスアパートのご紹介も可能ですのでご相談下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">洗濯物の紛失</h5>
							<p class="common-text">室内の洗濯機がついていない物件の場合、洗濯サービスがついています。その際に、出した洗濯が戻って来ないケースがあります。間違って配布してしまったなどが原因ではありますが、見つからないケースもあります。<br/>
							アオザイハウジングでは、洗濯機付き、共同洗濯機が設置されていて利用可能という物件のご紹介も可能ですのでご相談下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">盗難</h5>
							<p class="common-text">最近は減っておりますが、残念な話ではあるのですが室内の盗難が起きることがあります。外部からの進入が難しい場合、室内の清掃員など内部の犯行の可能性が疑われるケースもありますが、警察を呼んだ場合にも手続きや時間を費やしたものの、カメラなどではっきりと盗んでいる証拠がないと犯人特定に動いてくれなかったり、紛失したものが戻ってこないことがほとんどです。貴重品に関しては、金庫、セーフティボックスなどの利用も念のため検討して頂いた方が良いと思われます。<br/>
							アオザイハウジングでは、入居中にあまり室内に入られないお部屋のご紹介も可能ですのでご相談下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">お子様の通学バスが留まるか</h5>
							<p class="common-text">お子様を日本人学校に通わせる場合、建物にバスが留まるかどうか、近くの建物に留まるかどうか確認が必要です。アオザイハウジングでは日本人学校のバスが留まるアパートのご紹介も可能ですのですのでご相談下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">保険</h5>
							<p class="common-text">意外と盲点なのが、多くの物件が水災、火災保険は、日本と違い入居時に強制加入ではありません。洗濯機からの水が下の住戸に漏れてしまった、火災を起こしてしまったなどの際に発生する自己負担を軽減させる保険は、入居者自身の任意となります。<br/>
							アオザイハウジングでは、取り扱い保険会社のご紹介も可能ですのでご相談下さい。</p>
						</div>
						<div class="jp-hcm-content-subitem">
							<h5 class="front-heading-title">物件を選ぶ際に</h5>
							<p class="common-text">アパートに使用されている内装や設備は、見た目こそ日本と似ているところはありますが、日本では起こらないような建物、設備のトラブルが起こる可能性があります。建物、お部屋の管理が良くない物件の場合には、特にトラブルが多く、時には改修が困難な場合もあります。比較物件があった場合、できるだけ新しい建物や管理が良い建物を選ぶ方が良いといえます。<br/>
							アオザイハウジングでは、新しい物件、管理が比較的良い物件もご紹介可能ですのでご相談下さい。</p>
						</div>
					</div><!-- jp-hcm-content-item -->
					<div class="jp-hcm-content-item-list">
						<h4 class="bold-text">アオザイハウジングのサポートオプション</h4>
						<p class="common-text">
							その他、費用はかかりますが、下記対応できるオプションになります。もの入居後に設置したいものや行いたいことなどがありましたらお気軽にご相談下さい。<br/>
							ベトナムビザ・労働許可証・レジデンスカード<br/>
							日本のTV視聴<br/>
							ウォシュレット<br/>
							お手伝いさん派遣<br/>
							アリ、ゴキブリなどの駆除<br/>
							オフィスの玄関マット<br/>
							必要な方は合わせてお気軽にご相談下さい。
						</p>
					</div>
				</div><!-- jp-hcm-content -->		
			</div>
		</div><!-- differ-jp-hcm-page -->
		<?php
	}
	elseif($item->id == 561){
		//if page is FAQ
		?>
		<div class="wrapper-content-block faq-block">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  ホーチミンの賃貸物件について  / <a href="#">ホーチミンの住居と日本の住居の違い</a></span>
					</div>
				</div>
				<div class="faq-content clearfix">
					<ul class="ques-ans-group">
						<li>
							<div class="question-content">
								<a href="javascript:void(0)" class="bold-text">インボイス-領収書(通称:レッドインボイス)とは何ですか？</a><i class="fa fa-plus"></i>
							</div>
							<div class="answer-content">
								<p class="common-text">
									わかりやすく説明すると日本で言う消費税に近い税金「VAT(TAX)」に対する公式領収書にあたります。 こちらの税率が約10%となるため必要な場合は賃料が10%上昇いたします。 主に法人契約の場合に必要になる事が多いです。 ※ベトナムの法改正によって、エリアによって徐々に領収書が必要なくなってきております。詳細はお問い合わせください。
								</p>
							</div>
						</li>
						<li>
							<div class="question-content">
								<a href="javascript:void(0)" class="bold-text">デポジットとは何ですか？</a><i class="fa fa-plus"></i>
							</div>
							<div class="answer-content">
								<p class="common-text">
									わかりやすく説明すると日本で言う消費税に近い税金「VAT(TAX)」に対する公式領収書にあたります。 こちらの税率が約10%となるため必要な場合は賃料が10%上昇いたします。 主に法人契約の場合に必要になる事が多いです。 ※ベトナムの法改正によって、エリアによって徐々に領収書が必要なくなってきております。詳細はお問い合わせください。
								</p>
							</div>
						</li>
						<li>
							<div class="question-content">
								<a href="javascript:void(0)" class="bold-text">契約満了前に退去する場合、どうなりますか？</a><i class="fa fa-plus"></i>
							</div>
							<div class="answer-content">
								<p class="common-text">
									わかりやすく説明すると日本で言う消費税に近い税金「VAT(TAX)」に対する公式領収書にあたります。 こちらの税率が約10%となるため必要な場合は賃料が10%上昇いたします。 主に法人契約の場合に必要になる事が多いです。 ※ベトナムの法改正によって、エリアによって徐々に領収書が必要なくなってきております。詳細はお問い合わせください。
								</p>
							</div>
						</li>
						<li>
							<div class="question-content">
								<a href="javascript:void(0)" class="bold-text">ベトナム語、英語に不安があります、日本人の方に対応していただけますか？</a><i class="fa fa-plus"></i>
							</div>
							<div class="answer-content">
								<p class="common-text">
									わかりやすく説明すると日本で言う消費税に近い税金「VAT(TAX)」に対する公式領収書にあたります。 こちらの税率が約10%となるため必要な場合は賃料が10%上昇いたします。 主に法人契約の場合に必要になる事が多いです。 ※ベトナムの法改正によって、エリアによって徐々に領収書が必要なくなってきております。詳細はお問い合わせください。
								</p>
							</div>
						</li>
						<li>
							<div class="question-content">
								<a href="javascript:void(0)" class="bold-text">支払い通貨はVNDのみでしょうか？</a><i class="fa fa-plus"></i>
							</div>
							<div class="answer-content">
								<p class="common-text">
									わかりやすく説明すると日本で言う消費税に近い税金「VAT(TAX)」に対する公式領収書にあたります。 こちらの税率が約10%となるため必要な場合は賃料が10%上昇いたします。 主に法人契約の場合に必要になる事が多いです。 ※ベトナムの法改正によって、エリアによって徐々に領収書が必要なくなってきております。詳細はお問い合わせください。
								</p>
							</div>
						</li>
						<li>
							<div class="question-content">
								<a href="javascript:void(0)" class="bold-text">  契約満了前に退去する場合、どうなりますか？</a><i class="fa fa-plus"></i>
							</div>
							<div class="answer-content">
								<p class="common-text">
									わかりやすく説明すると日本で言う消費税に近い税金「VAT(TAX)」に対する公式領収書にあたります。 こちらの税率が約10%となるため必要な場合は賃料が10%上昇いたします。 主に法人契約の場合に必要になる事が多いです。 ※ベトナムの法改正によって、エリアによって徐々に領収書が必要なくなってきております。詳細はお問い合わせください。
								</p>
							</div>
						</li>
						<li>
							<div class="question-content">
								<a href="javascript:void(0)" class="bold-text">ベトナム語、英語に不安があります、日本人の方に対応していただけますか？</a><i class="fa fa-plus"></i>
							</div>
							<div class="answer-content">
								<p class="common-text">
									わかりやすく説明すると日本で言う消費税に近い税金「VAT(TAX)」に対する公式領収書にあたります。 こちらの税率が約10%となるため必要な場合は賃料が10%上昇いたします。 主に法人契約の場合に必要になる事が多いです。 ※ベトナムの法改正によって、エリアによって徐々に領収書が必要なくなってきております。詳細はお問い合わせください。
								</p>
							</div>
						</li>
						<li>
							<div class="question-content">
								<a href="javascript:void(0)" class="bold-text"> 支払い通貨はVNDのみでしょうか？</a><i class="fa fa-plus"></i>
							</div>
							<div class="answer-content">
								<p class="common-text">
									わかりやすく説明すると日本で言う消費税に近い税金「VAT(TAX)」に対する公式領収書にあたります。 こちらの税率が約10%となるため必要な場合は賃料が10%上昇いたします。 主に法人契約の場合に必要になる事が多いです。 ※ベトナムの法改正によって、エリアによって徐々に領収書が必要なくなってきております。詳細はお問い合わせください。
								</p>
							</div>
						</li>
					</ul>					
				</div><!-- faq-content -->
			</div><!-- container -->
		</div><!-- rent-appartment-steps -->
		<?php
	}
	elseif ($item->id == 562) {
		//if page is 運営会社
		?>
		<div class="wrapper-content-block general-company-page">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  運営会社  /<a href="#">運営会社概要</a></span>
					</div>
				</div>
				<div class="general-company-block">					
					<h4 class="red-heading-title">会社概要</h4>
					<div class="bt-solid"></div>
					<div class="logo-company clearfix">
						<img src="images/icon/logo-propolife.png" alt="" class="pull-left" />
						<p class="bold-text pull-left"> PROPOLIFEVIETNAM COMPANY LIMITED<br/>
							（和名：プロポライフベトナム）
						</p>
					</div>
					<div class="content-company-row">
						<div class="row">
							<div class="col-xs-7">
								<div class="des-content-company">
									<p>
										<span class="bold-text">運営会社</span>
										<span class="common-text">鈴木 秀章</span>
									</p>
								</div>
								<div class="des-content-company">
									<p>
										<span class="bold-text">住所</span>
										<span class="common-text">Unit1904 19Floor CJ BUILDING, 6 Le Thanh Ton, District1,HCMC, Vietnam
										</span>
									</p>
								</div>
								<div class="des-content-company">
									<p>
										<span class="bold-text">電話番号</span>
										<span class="common-text">ベトナム国内 028‐3827‐5068<br/>
										日本海外から +84‐28‐3827‐5068<br/>
										（代表・日本語）</span>
									</p>
								</div>
								<div class="des-content-company">
									<p>
										<span class="bold-text">資本金</span>
										<span class="common-text">$100,000</span>
									</p>
								</div>
								<div class="des-content-company">
									<p>
										<span class="bold-text">社員数</span>
										<span class="common-text">20名</span>
									</p>
								</div>
								<div class="des-content-company">
									<p>
										<span class="bold-text">Website</span>
										<span class="common-text">プロポライフベトナム公式WEB 
											<a href="http://www.propolifevietnam.com">www.propolifevietnam.com</a>
										</span>
									</p>
								</div>
								<div class="des-content-company">
									<p>
										<span class="bold-text">E-mail</span>
										<span class="common-text">
											<a href="mailto:info@aodaihousing.com">info@aodaihousing.com</a>
										</span>
									</p>
								</div>
								<div class="des-content-company">
									<p>
										<span class="bold-text">営業時間</span>
										<span class="common-text">月曜日～金曜日 9:00～17:00<br/>
										土曜日9：00～12：00<br/>
										定休：日曜日、祝日、テト期間
										</span>
									</p>
								</div>							
							</div>
							<div class="col-xs-5">
								<div class="col-xs-3">
									<p class="bold-text">事業内容</p>
								</div>
								<div class="col-xs-9">
									<div class="des-content-company">
										<p class="bold-text">賃貸不動産仲介事業<br/>アオザイハウジング事業部
										</p>
										<p class="common-text">サービスアパート・コンドミニアム等住居の賃貸不動産仲介
										<br/>オフィス・サービスオフィス等オフィスの賃貸不動産仲介
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">
											ベトナム進出サポート事業
											<br/>ロータスサービス事業部
										</p>
										<p class="common-text">	会社設立・法人設立
											<br/>
											事業ライセンス<br/>
											撤退支援<br/>
											労働許可証<br/>
											ベトナムビザ
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">
											内装工事事業<br/>
											クロニクルリフォーム事業部
										</p>
										<p class="common-text">	内装空間デザイン・設計・施工<br/>
											内装外観パース制作
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">
											IT事業<br/>
											WEB DESIGN 事業部
										</p>
										<p class="common-text">	
											WEBサイト制作<br/>
											WEB広告支援
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="bt-solid"></div>
						<div class="row">
							<div class="col-xs-7">
								<div class="col-xs-3">
									<p class="bold-text">関連会社<br/>
									/支店</p>
									
								</div>
								<div class="col-xs-9">
									<div class="des-content-company">
										<p class="bold-text">【株式会社プロポライフグループ】</p>
										<p class="common-text">
										〒100-0005<br/>
										東京都千代田区丸の内2-3-2 郵船ビルディング2F<br/>
										TEL: 03-6854-2030
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【株式会社クロニクル】</p>
										<p class="common-text">
										〒103-0028<br/>
										東京都中央区八重洲1-5-17 八重洲香川ビルディング8F<br/>
										TEL:03-5299-0202 <br/>
										クロニクルショールーム日本国内所在地
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【クロニクル東京八重洲ショールーム】</p>
										<p class="common-text">
										〒103-0028<br/>
										東京都中央区八重洲1-5-17 八重洲香川ビルディング2F<br/>
										TEL:0120-602-423 
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【クロニクル横浜鶴見ショールーム】</p>
										<p class="common-text">
										〒230-0062<br/>
										神奈川県横浜市鶴見区豊岡町8-24 1F<br/>
										TEL: 0120-957-186
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【プロポライフ名古屋丸の内ショールーム】</p>
										<p class="common-text">
										〒460-0003<br/>
										愛知県名古屋市中区錦2-4-15 ORE錦2丁目ビル10F<br/>
										TEL:0120-964-537
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【クロニクル大阪梅田ショールーム】</p>
										<p class="common-text">
										〒530-0057<br/>
										大阪府大阪市北区曽根崎2-12-7 清和梅田ビル5F<br/>
										TEL: 0120-957-953
					
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【クロニクル福岡天神店ショールーム】</p>
										<p class="common-text">
										〒810-0001<br/>
										福岡県福岡市天神2-4-11 パシフィーク天神2F<br/>
										TEL: 0120-981-779
										</p>
									</div>
								</div>
							</div>	
							<div class="col-xs-5">
								<div class="col-xs-3">
									
								</div>
								<div class="col-xs-9">
									<div class="des-content-company">
										<p class="bold-text">【株式会社クロニクル建設】</p>
										<p class="common-text">
										〒100-0005<br/>
										東京都千代田区丸の内2-3-2 郵船ビルディング2F<br/>
										TEL：03-6212-6667 
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【株式会社プロスタイル】</p>
										<p class="common-text">
										〒100-0005<br/>
										東京都千代田区丸の内2-3-2 郵船ビルディング2F<br/>
										TEL:03-6854-6448
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【株式会社プロスタイルヴィラ】</p>
										<p class="common-text">
										〒100-0005<br/>
										東京都千代田区丸の内2-3-2 郵船ビルディング2F<br/>
										TEL:03-6854-1993
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【株式会社プロポライフホテルズ】</p>
										<p class="common-text">
										〒100-0005<br/>
										東京都千代田区丸の内2-3-2 郵船ビルディング2F
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【千野建物管理株式会社】</p>
										<p class="common-text">
										〒230-0062<br/>
										神奈川県横浜市鶴見区豊岡町22-30 クマキリビル6F<br/>
										TEL:045-581-9556
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【煙台東洋木業有限公司】</p>
										<p class="common-text">						
										中華人民共和国 山東省 煙台市 菜山工業園<br/>
										TEL：(+86)-535-6919195 
										</p>
									</div>
									<div class="des-content-company">
										<p class="bold-text">【PROPOLIFE SINGAPORE 】</p>
										<p class="bold-text">【PROPOLIFE SONATRA CAMBODIA】</p>
									</div>

								</div>
								
							</div>						
						</div>
					</div>
				</div><!-- general-company-block -->
			</div><!-- container -->
		</div><!-- general-company-page -->
		<?php
	}
	elseif ($item->id == 563) {
		?>
		<div class="wrapper-content-block">
            <div class="content-search-block common-rows">
                <div class="container">
                    <div class="row">
                        <div class="breadcums">
                            <span>トップページ / 検索 / <a href="#">結果</a></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="map-content">
                            <div id="drawing"></div>
                            <div class="description-map">
                                <p>地図上の区をクリックして下さい。
                                    <br> 区の情報と指定した区のマンション、サービスアパートが下記に表示されます。
                                </p>
                            </div>
                            <div class="type-map">
                                Type:
                                <select>
                                    <option>タイプ</option>
                                </select>
                            </div>
                            <div class="type-map-des">
                                <p>
                                    閑静なおしゃれのんびりエリアです。
                                    <br> 2区の中でも特にタオディエンと呼ばれる閑静な住宅街に欧米の方々を中心に外国人が多く住んでいます。外国人が多いこともあり、おしゃれなアパート、レストラン、カフェ、
                                    <br> お店が多いエリアとなっております。また高い建物があまりなく川に囲まれたエリアとなるため風通しも良くのんびり過ごすことができます。
                                    <br> 1区周辺や2区の幼稚園や学校に通われるご家族様にもおすすめのエリアです。
                                    <br>
                                </p>
                            </div>
                            <div class="product-area-map">
                                <div class="heading-product">
                                    コンドミニアム
                                </div>
                                <div class="product-item-default active">
                                	
                                </div>
                                <div class="product-item1">
                                </div>
                                <div class="product-item2">
                             	</div>
                             	<div class="product-item3">
                             		<div class="product-area-map">
                             		<?php $replace = array("-"=>"/");?>
                                           	<?php if($building[0]){
                                           		foreach ($building[0] as $key => $item) {
                                           			?>
                                           	<div class="product-detail-area">
                                                <div class="img-product-map">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </div>
                                            <div class="product-detail-map">
                                                <a href="<?=create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace));?>"><?=vcp_printf($item->name, 'vn');?><br>
													<?=vcp_printf($item->name, 'jp');?></a>
                                                    <p>
                                                        <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                    </p>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                           			<?php
                                           		}
                                           		}?>
                                            
                                    </div>
                             	</div>
                                <div class="product-item4">
                                            
                             	</div>
                                <div class="product-item5">
                                    <div class="product-area-map">
                             		<?php $replace = array("-"=>"/");?>
                                           	<?php if($building[1]){
                                           		foreach ($building[1] as $key => $item) {
                                           			?>
                                           	<div class="product-detail-area">
                                                <div class="img-product-map">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </div>
                                            <div class="product-detail-map">
                                                <a href="<?=create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace));?>"><?=vcp_printf($item->name, 'vn');?><br>
													<?=vcp_printf($item->name, 'jp');?></a>
                                                    <p>
                                                        <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                    </p>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                           			<?php
                                           		}
                                           		}?>
                                            
                                    </div>
                                </div>
                                <div class="product-item6">
                                   Binh Thanh
                                </div>
                                <div class="product-item7">
                                            
                                        </div>
                                        <div class="product-item8">
                                            <div class="product-area-map">
                             		<?php $replace = array("-"=>"/");?>
                                           	<?php if($building[2]){
                                           		foreach ($building[2] as $key => $item) {
                                           			?>
                                           	<div class="product-detail-area">
                                                <div class="img-product-map">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </div>
                                            <div class="product-detail-map">
                                                <a href="<?=create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace));?>"><?=vcp_printf($item->name, 'vn');?><br>
													<?=vcp_printf($item->name, 'jp');?></a>
                                                    <p>
                                                        <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                    </p>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                           			<?php
                                           		}
                                           		}?>
                                            
                                    </div>
                                        </div>
                                        <div class="product-item9">
                                            <div class="product-area-map">
                             		<?php $replace = array("-"=>"/");?>
                                           	<?php if($building[3]){
                                           		foreach ($building[3] as $key => $item) {
                                           			?>
                                           	<div class="product-detail-area">
                                                <div class="img-product-map">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </div>
                                            <div class="product-detail-map">
                                                <a href="<?=create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace));?>"><?=vcp_printf($item->name, 'vn');?><br>
													<?=vcp_printf($item->name, 'jp');?></a>
                                                    <p>
                                                        <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                    </p>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                           			<?php
                                           		}
                                           		}?>
                                            
                                    </div>
                                        </div>
                                        <div class="product-item10">
                                            <div class="product-area-map">
                             		<?php $replace = array("-"=>"/");?>
                                           	<?php if($building[4]){
                                           		foreach ($building[4] as $key => $item) {
                                           			?>
                                           	<div class="product-detail-area">
                                                <div class="img-product-map">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </div>
                                            <div class="product-detail-map">
                                                <a href="<?=create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace));?>"><?=vcp_printf($item->name, 'vn');?><br>
													<?=vcp_printf($item->name, 'jp');?></a>
                                                    <p>
                                                        <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                    </p>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                           			<?php
                                           		}
                                           		}?>
                                            
                                    </div>
                                        </div>
                                        <div class="product-item11">
                                            <div class="product-area-map">
                             		<?php $replace = array("-"=>"/");?>
                                           	<?php if($building[5]){
                                           		foreach ($building[5] as $key => $item) {
                                           			?>
                                           	<div class="product-detail-area">
                                                <div class="img-product-map">
                                                    <img src="<?=PATH_URL.'static/images/img_defer.png'?>" data-src="<?php echo PATH_URL . 'static/uploads/category/' . $item->image ?>">
                                                </div>
                                            <div class="product-detail-map">
                                                <a href="<?=create_url("building/detail/" . $item->id . '/' . vcp_printf($item->name, 'jp', $replace));?>"><?=vcp_printf($item->name, 'vn');?><br>
													<?=vcp_printf($item->name, 'jp');?></a>
                                                    <p>
                                                        <?php echo nl2br(vcp_printf($item->description, current_lang_()));?>
                                                    </p>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                           			<?php
                                           		}
                                           		}?>
                                            
                                    </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- content-search-block -->
		<?php
	}
	elseif ($item->id == 564) {
		?>
		<div class="wrapper-content-block">
			<div class="bds-host-block">
				<div class="container">
					<div class="row">
						<div class="breadcums">
							<span>トップページ / アオザイサポーアオザイインフォーメーション 一覧ト / <a href="#">不動産オーナー様へ</a></span>
						</div>
					</div>
					<div class="bds-host">
						<div class="content">
							<div class="content-heading">
								不動産オーナー様へ
							</div>
							 <div class="bt-solid"></div>
							<div class="content-description">
								<p>
								そちらの家を早く貸すことが出来るように、私たちに連絡してお願い致します。
								</p>
								下記フォームに必要事項をご入力下さい。 (<span>*</span>) 必須項目

							</div>
							<div class="content-form">
								<form action="" method="">
									<div class="row">
										<div class="data-field">
											<p>お名前 <span>*</span></p> <input type="text" />
										</div>
										<div class="data-field">
											<p>Eメール <span>*</span></p> <input type="text" />
										</div>
										<div class="data-field">
											<p>お電話番号 <span>*</span></p> <input type="text" />
										</div>
										<div class="data-field">
											<p>物件住所 <span>*</span></p> <input type="text" />
										</div>
									</div>
									<div class="row">
										<div class="data-heading">物件について</div>
									</div>
									<div class="row">
										<div class="data-field">
											<p>賃料 <USD> <span>*</span></p> <input type="text" />
										</div>
										<div class="data-field">
											<p>寝室数 <span>*</span></p> 
											<select class='select-dropdown'>
												<option value="val1">Val 1</option>
											    <option value="val2">Val 2</option>
											    <option value="val3">Val 3</option>
											</select>
										</div>
										<div class="data-field">
											<p>デポジット <span>*</span></p> 
											<select class='select-dropdown'>
												<option value="val1">Val 1</option>
											    <option value="val2">Val 2</option>
											    <option value="val3">Val 3</option>
											</select>
										</div>
										<div class="data-field">
											<p>浴室数 <span>*</span></p> 
											<select class='select-dropdown'>
												<option value="val1">Val 1</option>
											    <option value="val2">Val 2</option>
											    <option value="val3">Val 3</option>
											</select>
										</div>
										<div class="data-field">
											<p>エリア <span>*</span></p>
											<select class='select-dropdown'>
												<option value="val1">Val 1</option>
											    <option value="val2">Val 2</option>
											    <option value="val3">Val 3</option>
											</select>
										</div>
										<div class="data-field">
											<p>家具の有無 <span>*</span></p>
											 <select class='select-dropdown'>
											 	<option value="val1">Val 1</option>
											    <option value="val2">Val 2</option>
											    <option value="val3">Val 3</option>
											 </select>
										</div>
										<div class="data-field">
											<p>住居タイプ <span>*</span></p> 
											<select class='select-dropdown'>
												<option value="val1">Val 1</option>
											    <option value="val2">Val 2</option>
											    <option value="val3">Val 3</option>
											</select>
										</div>
										<div class="data-field">
											<p>面積 <span>*</span></p> <input type="text" />
										</div>
									</div>
									<div class="row option-group-item">
										<div class="data-text">賃料に含まれるもの</div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value=" VAT(税金)" /> <span>VAT(税金)</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="電気代"/> <span>電気代</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="プール利用料"/> <span>プール利用料</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="管理費"/> <span>管理費</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="水道代"/> <span>水道代</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="ジム利用料 "/><span> ジム利用料 </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="インターネット+TV"/><span> インターネット+TV</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="掃除サービス"/><span> 掃除サービス</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="洗濯サービス"/><span> 洗濯サービス</span></label></div>
									</div>
									<div class="row option-group-item">
										<div class="data-text">賃料に含まれるもの</div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="プライベートプール"/><span> プライベートプール </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="キッチン"/> <span>キッチン </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="バルコニー"/><span> バルコニー</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="共用プール"/> <span>共用プール</span> </label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="バスタブ"/><span>バスタブ</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="エレベーター"/> <span>エレベーター</span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value=" ジム"/><span> ジム </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="お部屋に洗濯機"/><span> お部屋に洗濯機 </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="コンパウンド"/> <span>コンパウンド</span> </label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="ペットOK"/><span> ペットOK</span> </label></div>
									</div>
									<div class="row option-group-item">
										<div class="data-text">環境など</div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="有人受付"/> <span>有人受付 </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="発電機 "/> <span>発電機 </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="門限無し"/><span> 門限無し </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="警備員24/24"/><span> 警備員24/24</span> </label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="陽当たり良し"/><span> 陽当たり良し </span></label></div>
										<div class="data-field-small"><label><input type="checkbox" class="checkedval" value="買物便利"/> <span>買物便利</span> </label></div>
									</div>
									<div class="row">
										<div class="data-text">環境など</div>
										<div class="data-field-large"><textarea></textarea></div>
									</div>
									<div class="row upload-reference">
										<div class="data-text">画像アップロード</div>
										<div class="data-group">
											<div class="data-upload">
												<input type="text" disabled/>
												<label for="file-upload1" class="btn-upload">
												 参照
												</label>
												<input type="file" id ="file-upload1"/>
											</div>
											<div class="data-upload">
												<input type="text" disabled/>
												<label for="file-upload2" class="btn-upload">
												 参照
												</label>
												<input type="file" id="file-upload2"/>
											</div>
											<div class="data-upload">
												<input type="text" disabled/>
												<label for="file-upload3" class="btn-upload">
												 参照
												</label>
												<input type="file" id="file-upload3"/>
											</div>
											<div class="data-upload">
												<input type="text" />
												<label for="file-upload4" class="btn-upload">
												 参照
												</label>
												<input type="file" id="file-upload4"/>
											</div>
											<div class="data-upload">
												<input type="text" />
												<label for="file-upload5" class="btn-upload">
												 参照
												</label>
												<input type="file" id="file-upload5"/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="data-policy">
											<span>プライバシーポリシーをご一</span>読頂き、内容をご確認の上お問い合わせを送信してください。
										</div>
										<div class="capcha">
											<div class="g-recaptcha" data-sitekey="your_site_key" hl="vi"></div>
										</div>	
									</div>
									<div class="row">
										<div class="data-button">
											<input type="button" value="送信する"/>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!-- content-search-block -->
			<!--  display information  -->   
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                    <h4 class="modal-title" id="myModalLabel">Xác nhận thông tin</h4>

		                </div>
		                <div class="modal-body">
		                    <ul class="list">                         
		                    </ul>                    
		                </div>
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                			<button type="button" class="btn btn-red">Xác nhận</button>
		                </div>
		            </div>
		        </div>
    		</div>
		</div><!-- wrapper-content-block -->
		<?php
	}
	elseif ($item->id == 565) {
		?>
		<div class="wrapper-content-block vn-visa-block">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ / ベトナム進出支援 / <a href="#">会社設立＆スタートアップ支援</a></span>
					</div>
				</div>
				<div class="vn-visa">
						<h4 class="red-heading-title">ロータスサービスではベトナムの法務事情をすばやく把握し法人設立に動きたい企業様をサポートしております。</h4>
						<div class="bt-solid"></div>
						<p class="content-blue">
							ベトナム進出支援ベトナム法人設立・ライセンスの取得＆スタートアップ支援
						</p>
						<div class="logo-lotus">
							<img src="<?=PATH_URL.'static/images'?>/icon/logo-lotus.png" title="logo-lotus"/>
						</div>
						<div class="common-content-block content-support">
							<h3>進出相談会開催中</h3>
							<p class="bold-text">ベトナム進出支援 法人設立・ライセンス取得＆スタートアップ支援設立だけでなく開業までに準備すべきことまでサポート</p>
							<p class="common-text">
								進出時に会社設立、ライセンス、設立後に何を行なわなければならないかなどについて調べるのには時間がかかり、また幅広い分野を調べるのは大変です。ベトナムに来られる予定のご担当者が、会社の運営経験が豊富な方の場合もあれば、営業が専門の方、技術が専門の方など企業様によって異なるかと思います。進出時に会社設立やライセンス取得の為に行うこと、設立後に会社を運営していく上でやることなど幅広い分野を調査するのはなかなか大変な作業になります。弊社の進出支援は、まずはやるべきことの全体像を掴んで頂き、各項目を進めていくため、わかりやすいと大変好評頂いております。
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">実績豊富な日本人と実績240社超の法の運用に強い弁護士が担当実務経験豊富な会計資格者もサポート</p>
							<p class="common-text">
								これまで様々な企業様の進出案件に取り組んできた実績豊富な日本人が担当。会社設立、ライセンス取得、事業スキームなどのアドバイスだけでなく、設立申請中には、スタートアップ支援として、設立後に会社運営を行っていく上ですべき準備や働かれる方の労働許可証、ビザ、信頼できる業者の紹介などまで設立期間中にサポートしております。これまで医療・飲食・小売、卸・電機メーカー・不動産・機械メーカー・コンサルティング・人材・スポーツジム・衣料メーカー・食品加工・建材メーカー・建築・美容・理容・ITなどなど幅広い業界の企業様の会社設立・ライセンス取得とスタートアップ支援を行ってきた実績がございます。<br>
								法律の変更や法の運用の変更が多いベトナム。法律は、法の運用に長けたライセンス取得にも強い弁護士と長年行っております。会社設立、ライセンス取得だけでなく、240社超の企業様に幅広い分野の法務コンサルティングを提供してきた実績があり、10社の顧問弁護士にもなっております。ベトナムの中では数少ない日本語が話せる弁護士の1人であり、進出支援時には、無料で法務相談もご提供させて頂いております。<br>
								スタートアップ支援の際には、実務の経験豊富な担当者も必要に応じて行うべき準備をアドバイスさせて頂いております。人事、労務、会計、税務なども法の運用、現場での対応の変更がある部分になります。まずは、設立後の初期登録、毎月行うこと、4半期ごとに行うこと、1年に1度行うことなどを整理して全体像を見て頂き、各項目をどのように行っていくか判断して頂く為のお話からさせて頂いております。
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">まずは進出相談会でお話をお伺いさせてください</p>
							<p class="common-text">進出をご検討されているお客様は、是非無料進出相談会をご利用下さい。どのような事業を行いたいかお伺いさせて頂き、最新の法律と現場対応を基にお役に立つ情報の提供をさせて頂いております。当地に調査でお越しになられている際に、不動産会社、会計事務所、人材会社など各専門家ごとに相談していく際に起きる、一貫性のないアドバイスは余計な時間やコストを消費することもあります。そんな中弊社の面談では、ご質問にお答えしながら、会社設立やライセンスについてから進出後にやることまで全体像を掴んで頂けるようにしており好評頂いております。
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">現地法人設立の流れ</p>
							<p class="bold-text-red">STEP 1 - 停電</p>
							<p class="common-text">進出相談会では、まずはどのような事業を行いたいのか、いつ頃から開始したいのかお伺いさせてください。<br>
最適な進め方をご提案させて頂きます。</p>
							<p class="bold-text-red">STEP 2 - オフィスの契約</p>
							<p class="common-text">進出手続きにはオフィスの契約が必要になります。設立申請書に設立会社の住所を記載しなければならなく、また提出書類としてオフィスとの賃貸契約書の公証が必要になります。</p>
								<p class="bold-text-red">STEP 3 - 申請添付書類の取得と認証作業、書類のベトナム語翻訳、申請書の作成</p>
							<p class="common-text">申請時に必要な書類を本社所在国で取得していただきます。親会社が日本の場合、日本の外務省認証を行って頂きます。その後、ベトナム外務省での認証を行いベトナムで利用できるようになります。この書類は設立申請書を作成にも利用致します。翻訳、書類作成で約3週間程度かかります。</p>
								<p class="bold-text-red">STEP 4 - 設立申請</p>
							<p class="common-text">作成した申請書類13種類に親会社代表者、現地代表者になられる方のサインと本社の社判を押して頂き申請致します。</p>
								<p class="bold-text-red">STEP 5 - 投資ライセンスの取得（IRC）</p>
							<p class="common-text">投資ライセンスは、企業ライセンス取得に必要になります。</p>
								<p class="bold-text-red">STEP 6 - 企業ライセンスの取得(ERC)</p>
							<p class="common-text">この後の印鑑作成作業が終わりましたら、投資ライセンスと企業ライセンスをお引渡し致します。<br>
※輸出入コード（HSコード）取得は投資ライセンス、企業ライセンス取得後になりますが、申請にはライセンス原本はなくて大丈夫です。</p>
								<p class="bold-text-red">STEP 7 - 印鑑の作成、登録</p>
							<p class="common-text">どの書類にも署名とここで制作する印鑑が必要になってきます。</p>
								<p class="bold-text-red">STEP 8 - 銀行口座の開設</p>
							<p class="common-text">資本金口座と経常口座を作成します。<br>
								作成の後まずは資本金口座に資本金を振り込みます。<br>
								その後経常口座に資金を移動させます。
							</p>
							<p class="bold-text-red">STEP 9 - 事業ライセンス税の支払い</p>
							<p class="common-text">
								税務ソフトのトークンを契約して頂き、そのソフトから初回事業ライセンス税を登録して税務署に税金を支払います。
							</p>
							<p class="bold-text-red">STEP 10 - スタッフへの引き継ぎ</p>
							<p class="common-text">
								入社されたスタッフの方に引き継ぎます。<br>
								ここからは各初期設定を行うことになります。<br>
								状況に応じて弊社のサポートも可能です。
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">外資企業の会社設立必要書類</p>
							<p class="common-text">
								設立公示（事務所名と住所、本社会社名と住所、許可番号、発給日、期間、発行機関名、駐在員事務所の活動内容、駐在員事務所長の情報を公示。）<br>
								活動通知（活動を開始したことを許可証を発給した省・市の商工局に報告。）
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">駐在員事務所設立必要書類</p>
							<p class="common-text">
								- 親会社の登記簿謄本全部事項証明書（外務省の認証があるもの）<br>
								- 親会社の定款（外務省の認証があるもの）<br>
								- 親会社の代表者様のパスポート（ベトナム外務省の認証又はベトナム機関で公証）<br>
								- 現地法人の代表者になられる方のパスポート（ベトナム外務省の認証又はベトナム機関で公証）<br>
								- 銀行残高証明（設立会社の資本金以上あることが確認できるもので、銀行印があるもの）<br>
								- オフィス賃貸契約書（ベトナム機関で公証）<br>
								- 親会社の会社案内（申請書作成に利用）<br>
								- 売上予測、スタッフ雇用数予測（申請書作成に必要）<br>
								- 実績証明（業種により取引伝票の写しなどが必要になる場合があります）<br>
								※法人設立の際は、2期分の決算書は必要なくなりました。
							</p>
						</div>
						
				</div>		
			</div>
		</div><!-- vn-visa-block -->
		<?php
	}
	elseif ($item->id == 566) {
		?>
		<div class="wrapper-content-block vn-visa-block">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ / ベトナム進出支援 / <a href="#">駐在員事務所設立＆スタートアップ支援</a></span>
					</div>
				</div>
				<div class="vn-visa">
						<h4 class="red-heading-title">駐在員事務所設立＆スタートアップ支援</h4>
						<div class="bt-solid"></div>
						<p class="content-blue">
							ベトナム進出支援駐在員事務所設立＆スタートアップ支援
						</p>
						<div class="logo-lotus">
							<img src="<?=PATH_URL.'static/images'?>/icon/logo-lotus.png" title="logo-lotus"/>
						</div>
						<div class="common-content-block content-support">
							<h3>進出相談会開催中</h3>
							<p class="bold-text">ベトナム進出支援 駐在員事務所設立＆スタートアップ支援設立だけでなく開業までに準備すべきことまでサポート</p>
							<p class="common-text">
								駐在員事務所は、現地での契約行為はできませんが、市場調査や本社と現地企業との契約内容のサポートなど進出の足がかりとして設立される企業様が増えております。<br>
								設立申請中は、スタートアップ支援として、開業までに準備すべきこともサポートさせて頂いております。ベトナムに来られる予定のご担当者が、会社の運営経験が豊富な方の場合もあれば、営業が専門の方、技術が専門の方など企業様によって異なるかと思います。弊社では、設立申請中にまずはやるべきことの全体像を掴んで頂いてからやるべきことをサポートしており、ご担当者様からわかりやすいと大変好評頂いております。<br>
								また将来的に法人設立を検討されている場合も合わせてご相談頂けます。外資での会社の設立、営業ライセンスの取得、HSコードの取得申請手続きは複雑で、申請書類も頻繁に変化し、最近では13種類以上に及びます。弊社では、毎年日系企業様の設立実績が多数ございますが、弊社の特徴の1つとしましては、当局との信頼関係から、最新の現場の取り扱い状況を把握できることです。間違いのない結果を出し続けるために、過去の成功体験に拘らず、当局現場の最新の取り扱いに対応したしっかりとした申請書の作成と必要がある関連当局への手続きを間違いないよう行っております。<br>
								弊社では、ほとんどのライセンスで申請時にいつ設立ができるかほぼ明確にでき、また難易度が高いと言われるライセンスも取得が可能です。
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">実績豊富な日本人と実績240社超の法の運用に強い弁護士実務経験豊富な会計資格者もサポート</p>
							<p class="common-text">
								これまで様々な企業様の進出案件に取り組んできた実績豊富な日本人が担当。設立、事業スキームなどのアドバイスだけでなく、申請時にはスタートアップ支援として、設立後に会社運営を行っていく上ですべき準備や働かれる方の労働許可証、ビザ、信頼できる業者の紹介などまで設立期間中にサポートしております。これまで医療・飲食・小売、卸・電機メーカー・不動産・機械メーカー・コンサルティング・人材・スポーツジム・衣料メーカー・食品加工・建材メーカー・建築・美容・理容・ITなどなど幅広い業界の企業様の設立・ライセンス取得とスタートアップ支援を行ってきた実績がございます。<br>
								法律の変更や法の運用の変更が多いベトナム。法律は、法の運用に長けたライセンス取得にも強い弁護士と長年行っております。設立、ライセンス取得だけでなく、240社超の企業様に幅広い分野の法務コンサルティングを提供してきた実績があり、10社の顧問弁護士にもなっております。ベトナムの中では数少ない日本語が話せる弁護士の1人であり、進出支援時には、無料で法務相談もご提供可能です。<br>
								駐在員事務所の運営に関しても、法の運用の変更や現場での取り扱いがあります。スタートアップ支援時には、実務の現場経験豊富な担当者も、必要に応じて最新の状況で行なうべき準備をアドバイスしております。まずは、設立後の初期登録、毎月行うこと、4半期ごとに行うこと、1年に1度行うことなどを整理して全体像を見て頂き、どのように行っていくか判断して頂く為のお話からさせて頂いております。

							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">まずは進出相談会でお話をお伺いさせてください</p>
							<p class="common-text">進出をご検討されているお客様は、是非無料進出相談会をご利用下さい。<br>
								進出時の会社設立、ライセンスについて、設立後に何を行なわなければならないかなどについて調べるのはなかなか大変です。また、不動産会社、会計事務所、人材会社など各専門家ごとに相談していく際に起きる、一貫性のないアドバイスは余計な時間やコストを消費することもあります。<br>
								そんな中弊社の面談では、会社設立、ライセンスから進出後にやることまで全体像を掴んで頂き、ベトナムのビジネス環境、外資規制、会社運営のルール、落とし穴注意点など最新の法律と現場対応を基にお役に立つ情報のご提供までさせて頂いており好評頂いております。お気軽にお問い合わせ下さい。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">駐在員事務所設立の流れ</p>
							<p class="bold-text-red">STEP 1 - 進出相談会</p>
							<p class="common-text">進出相談会では、まずはどのような事業を行いたいのか、いつ頃から開始したいのかお伺いさせてください。<br>
								最適な進め方をご提案させて頂きます。</p>
							<p class="bold-text-red">STEP 2 - オフィスの契約</p>
							<p class="common-text">進出手続きにはオフィスの契約が必要になります。設立申請書に設立会社の住所を記載しなければならなく、また提出書類としてオフィスとの賃貸契約書の公証が必要になります。</p>
								<p class="bold-text-red">STEP 3 - 申請添付書類の取得と認証作業、書類のベトナム語翻訳、申請書の作成</p>
							<p class="common-text">申請時に必要な書類を本社所在国で取得していただきます。親会社が日本の場合、日本の外務省認証を行って頂きます。その後、ベトナム外務省での認証を行いベトナムで利用できるようになります。この書類は設立申請書を作成にも利用致します。翻訳、書類作成で約3週間程度かかります。</p>
								<p class="bold-text-red">STEP 4 - 設立申請</p>
							<p class="common-text">作成した申請書類に親会社代表者、現地代表者になられる方のサインと本社の社判を押して頂き申請致します。<br>
※スタートアップ支援としまして、事務所運営上、設立申請期間中に行なうべき準備に関してもサポートしております。</p>
								<p class="bold-text-red">STEP 5 - 駐在員事務所ライセンスの取得</p>
							<p class="common-text">この後印鑑制作時に必要になります。</p>
								<p class="bold-text-red">STEP 6 - 印鑑の作成、登録</p>
							<p class="common-text">どの書類にも署名とここで制作する印鑑が必要になってきます。</p>
								<p class="bold-text-red">STEP 7 - 銀行口座の開設</p>
							<p class="common-text">銀行口座を作成します。</p>
								<p class="bold-text-red">STEP 8 - スタッフへの引き継ぎ</p>
							<p class="common-text">入社されたスタッフの方に引き継ぎます。<br>
								ここからはまずは設立後の初期設定、人事・労務系の初期設定を行うことになります。<br>
								状況に応じて弊社のサポートも可能です。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">設立後に行う登録</p>
							<p class="common-text">
								設立公示（事務所名と住所、本社会社名と住所、許可番号、発給日、期間、発行機関名、駐在員事務所の活動内容、駐在員事務所長の情報を公示。）<br>
								活動通知（活動を開始したことを許可証を発給した省・市の商工局に報告。）
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">駐在員事務所設立必要書類</p>
							<p class="common-text">
								- 親会社の登記簿謄本全部事項証明書（外務省の認証があるもの）<br>
								- 親会社の定款（外務省の認証があるもの）<br>
								- 決算書過去1期分（外務省の認証があるもの）<br>
								- 親会社の代表者様のパスポート（ベトナム外務省の認証又はベトナム機関で公証）<br>
								- 現地法人の代表者になられる方のパスポート（ベトナム外務省の認証又はベトナム機関で公証）<br>
								- オフィス賃貸契約書（ベトナム機関で公証）<br>
								- 任命書（親会社から駐在員事務所代表者になられる方へ）<br>
								- 雇用契約書（親会社と駐在員事務所代表者になられる方）<br>
								- 履歴書（駐在員事務所代表者になられる方）<br>


							</p>
						</div>
						
				</div>		
			</div>
		</div><!-- vn-visa-block -->
		<?php
	}
	elseif ($item->id == 567) {
		?>
		<div class="wrapper-content-block vn-visa-block permit-page">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  ベトナム進出支援  /   <a href="#">ベトナム労働許可証</a></span>
					</div>
				</div>
				<div class="vn-visa">
						<h4 class="red-heading-title">ベトナム労働許可証</h4>
						<div class="bt-solid"></div>
						<p class="content-blue">
							ロータスサービス事業部<br/>
							労働許可証・レジデンスカード
						</p>
						<div class="logo-lotus">
							<img src="<?=PATH_URL.'static/images'?>/icon/logo-lotus.png" title="logo-lotus"/>
						</div>
						<div class="title-permit">
							<h4 class="bold-text">
								労働許可証・免除申請・更新申請
							</h4>
						</div>
						<div class="common-content-block">
							<p class="bold-text">レジデンスカード</p>
							<p class="common-text">労働許可証の取得、免除申請、更新、レジデンスカード、家族付帯ビザもサポート実績豊富なロータスサービスにお任せ下さい。<br/>
							労働許可証は、ベトナムにおいて外国人が働くために必要になります。<br/>
							労働許可証もしくは免除を取得しますとレジデンスカード（短期滞在許可証/2年のマルチビザ）の取得もできます。<br/>
							今のところ管理者、技術者、専門家の3つのカテゴリーについて変更はありません。また取得手続きではなく、免除申請手続きになる方もいらっしゃいます。※1<br/>
							当局への提出書類の内容に1部変更が発生しており、経験についてのヒアリング内容に変更が出ております。必要書類が1部変更しています。個別に要望する必要書類が変わることを防ぐため、管理者、技術者、専門家に合わせた申請する際の専門家証明書などの書類作成も重要になってきます。幣サービスでは、経験豊富な日本人担当者とベトナム人弁護士で申請前の書類取得段階、書類作成段階からサポートしております。引き続き取得希望時期の2ヶ月前くらいにご相談下さい。提出時の正確な情報を基にご提案をさせて頂いております。
							大学卒業でない場合も取得、申請が失敗されて再申請をご希望の場合も可能ですのでご相談下さい。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">【労働許可証カテゴリー】</p>
							<p class="common-text">- 管理者（投資家、代表者）<br/>
							- 技術者<br/>
							- 専門家</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">【労働許可証取得必要書類】</p>
							<p class="common-text">- 雇用会社による労働許可証申請書（フォームがあります）<br/>
							- 専門家証明書<br/>
							- 在籍証明書<br/>
							- 無犯罪証明書 履歴書（フォームがあります）<br/>
							- 指定病院健康診断書<br/>
							- 申請者の専門性、技術レベル、大学卒業を証明する書類のコピー<br/>
							- 写真<br/>
							- 雇用者の営業登録証のコピー
							など<br/>
							※1労働許可証免除申請の場合必要書類が軽減されます。労働許可証免除手続き、取得どちらが必要になるかは、会社のライセンス書類を確認させて頂いております。<br/>
							※更新手続きの場合、必要書類が軽減されます。
							</p>
							<p class="bold-text note-mark-text">
								現場で求められる書類が、常時変更になる可能性があります。取得される際の最新情報をご確認下さい。
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">レジデンスカード（一時滞在許可証）</p>
							<p class="common-text">レジデンスカードは、基本的に労働許可証を取得後に取れる2年有効のマルチビザになります。<br/>
							必要書類からご案内しておりますので、お気軽にお問い合わせ下さい。<br/>
							＊レジデンスカードの返却をお考えの際は、返却に伴う新しいビザの取得方法など、状況により御説明しております。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">【レジデンスカード取得必要書類】</p>
							<p class="common-text">
								- 労働許可証原本<br/>
								- パスポート原本<br/>
								- 顔写真 2枚 2cm X 3cm<br/>
								- 会社ライセンス公証 1部<br/>
								- ベトナム居住台帳のコピー<br/>
								- NA6 (フォームがあります)<br/>
								- NA8 (フォームがあります)<br/>
								- 会社印鑑と代表者署名の証明書 (フォームがあります)
							</p>
						</div>
				</div>		
			</div>
		</div><!-- vn-visa-block -->
		<?php
	}
	elseif ($item->id == 568) {
		?>
		<div class="wrapper-content-block vn-visa-block">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  ベトナム進出支援  /   <a href="#">ベトナムビザ</a></span>
					</div>
				</div>
				<div class="vn-visa">
						<h4 class="red-heading-title">ベトナムビザ</h4>
						<div class="bt-solid"></div>
						<p class="content-blue">
							ロータスサービス事業部ベトナムビザ <br/>
							出張ビジネスビザ・観光ビザ <br/>
							アライバルビザ・レジデンスカード <br/>
						</p>
						<div class="logo-lotus">
							<img src="<?=PATH_URL.'static/images'?>/icon/logo-lotus.png" title="logo-lotus"/>
						</div>
						<div class="common-content-block">
							<p class="bold-text">ビジネスビザ（DN）1年マルチビザもあります</p>
							<p class="common-text">1年マルチ、6ヶ月マルチ、3ヶ月マルチ、3ヶ月シングル、1ヶ月シングルがあります。国内での更新と割安な空港到着時取得のアライバルビザが利用可能です。<br/>
							ベトナム国内での更新の場合、パスポート、滞在証明、代金を弊社までお持ち下さい。<br/>
							＊長期になり更新の可能性がある方、レジデンスカードの取得を考えられている方はビジネスビザがお勧めです。<br/>
							＊現在観光からビジネスへの変更はできません。<br/>
							＊取得期間と費用に関して随時変更が起きておりますので、最新詳細状況はお問い合わせください。<br/>
							＊状況により丁寧に御説明しておりますので、お気軽にご相談ください。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">観光ビザ（DL）</p>
							<p class="common-text">85日マルチビザ、3ヶ月シングルビザ、1ヶ月シングルビザがあります。国内更新と割安な空港到着時取得のアライバルビザの利用が可能です。<br/>
							ベトナム国内での更新の場合、パスポート、滞在証明、代金を弊社までお持ち下さい。<br/>
							★観光ビザは、ベトナム国内での更新がこれまで不可能でしたが、できるようになりました。ただし費用がまだ高いので、海外に行かれるタイミングで割安なアライバルビザにて新しいビザを取得するなどもご提案させて頂いております。<br/>
							＊短期滞在の方、ホーチミンを一時経由されるだけの方は観光ビザで大丈夫です。<br/>
							＊15日ビザ免除で入国された方の延長の場合、さらに15日の延長は可能です。<br/>
							＊取得可能な期間と費用に関して随時変更が起きております。お問い合わせ下さい。<br/>
							＊状況により丁寧に御説明しておりますので、お気軽にご相談ください。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">アライバル(空港到着時)のビザ取得について</p>
							<p class="common-text">アライバルビザとは、ホーチミン市のタンソンニャット空港など国際空港に到着し、入国検査を受ける前のビザ発行カウンターで発行してもらうビザになります。（各国のベトナム大使館でも可能です。）<br/>
							1度国外に出られるご予定がある方は、アライバルでのビザ取得の方が費用面もお得ですのでこちらをご利用下さい。<br/>
							お申し込みにはパスポート・カウンターで提出する書類作成代金を弊社までお持ち下さい。<br/>
							約3日でタンソンニャット空港ビザ発行カウンターに申請する際の申請用紙、記入見本、場所の案内図、ビザが登録されている書類の4点をメールでお送りさせて頂きます。全てプリントアウトして頂き、書類を記載し写真を張り、パスポートとビザ発行代金を窓口に提出して頂くと取得できます。<br/>
							＊申請用紙には4×6の写真が必要になります。<br/>
							＊必ずメール受信できて、プリントアウトできる環境にいて頂くのが条件になります。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">レジデンスカード（一時滞在許可証）</p>
							<p class="common-text">レジデンスカードは、基本的に労働許可証、免除を取得後に取れる2年有効のマルチビザになります。弊社では、労働許可証取得、免除申請、更新申請とのセットでのお見積もりをお出ししております。こちらも必要書類からご案内しておりますので、お気軽にお問い合わせ下さい。<br/>
							＊レジデンスカードの返却をお考えの際は、伴うビザ取得方法など、状況により丁寧に御説明しておりますので、お気軽にご相談ください。</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">【レジデンスカード取得必要書類】</p>
							<p class="common-text">
								- 労働許可証原本<br/>
								- パスポート原本<br/>
								- 顔写真 2枚 2cm X 3cm <br/>
								- 会社ライセンス公証 1部<br/>
								- ベトナム居住台帳のコピー <br/>
								- NA6 (フォームがあります) <br/>
								- NA8 (フォームがあります) <br/>
								- 会社印鑑と代表者署名の証明書 (フォームがあります)
							</p>
						</div>
						<div class="common-content-block">
							<p class="bold-text">ベトナムビザの注意点</p>
							<p class="common-text">
								ベトナムに入国する際は、日本人向けへの緩和措置30日ルールとしまして、ベトナム入国時に15日以内にベトナム出国のエアチケットを持っていれば、ビザなしで入国して15日間まで滞在が可能になりました。出国後30日以内にベトナムに再入国する際、中長期間滞在を予定されている際にはベトナムビザが必要になります。<br/>
								ベトナム国内での更新、取得を希望されている際に現在お持ちのビザによっては、最悪1度ベトナム国外に出てからビザを取得しなおして頂かないとならないケースもあることです。また、ベトナム国外で取得したビザを、ベトナム国内で別のタイプのビザに変更することは現在まだ基本的には難しい状況です。<br/>
								労働許可証やレジデンスカード取得を考えている場合は、取得する為に義務付けられている入国時のビザがありますので、入国前のビザ取得時に事前にご相談ください。<br/>
								ロータスサービス事業部では、ビザ担当歴10年の実績を持つ日本人担当者が、お客様の滞在したい期間、労働許可証取得期間中、バイク運転免許も取りたいなどのご要望に最適なビザをご提案しております。<br/>
								ベトナムビザなら実績NO,1の弊社にご相談下さい。<br/>
								※運転免許はビザ期間に連動します。取得もサポートしておりますのでお気軽にお問い合わせ下さい。
							</p>
						</div>
						
				</div>		
			</div>
		</div><!-- vn-visa-block -->
		<?php
	}
	elseif ($item->id == 569) {
		?>
		<div class="wrapper-content-block economical-website-block">
			<div class="intro-economical-website">
				<div class="container">
					<img src="<?=PATH_URL.'static/images'?>/items/banner-eco-image.png" alt=""/>	
				</div>
			</div>
			<div class="content-economical">
				<div class="container">
					<div class="row">
						<div class="breadcums">
							<span>トップページ  / アオザイサポーアオザイインフォーメーション 一覧ト /  <a href="#">割安WEBサイト制作</a></span>
						</div>
					</div>
					<div class="economical-list">
						<h4 class="red-heading-title">オリジナルWEBサイト・テンプレートWEBサイト</h4>
						<div class="bt-solid"></div>
						<h5 class="bold-text">作成事例</h5>
						<div class="economical-items bounceInRight">
							<div class="row">
								<div class="col-xs-3">
									<div class="eco-image">
										<a href="javascript:void(0)"><img src="<?=PATH_URL.'static/images'?>/items/eco-1.jpg"></a>
										<p class="eco-title">EM’S CAFE</p>
									</div>
									<div class="eco-content">
										<p class="common-text">
											EM’S CAFEは、ホーチミン市の日本人街レタントン通りにある、娯楽が少ないホーチミンで日本人が一人でも行ける憩いの場です。人気の理由は、ベトナムNO,1の5,000冊を超える漫画を保有されいること、日本人の皆が美味しいと評判の丼物、パスタ、カレーなどの料理。サービスオプションとして、お客様からのご要望で近隣にはデリバリーを再開させる予定とのことで、制作の際には簡単にサービスの追加ができるように工夫しました。
											
										</p>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="eco-image">
										<a href="javascript:void(0)"><img src="<?=PATH_URL.'static/images'?>/items/eco-1.jpg"></a>
										<p class="eco-title">EM’S CAFE</p>
									</div>
									<div class="eco-content">
										<p class="common-text">
											EM’S CAFEは、ホーチミン市の日本人街レタントン通りにある、娯楽が少ないホーチミンで日本人が一人でも行ける憩いの場です。人気の理由は、ベトナムNO,1の5,000冊を超える漫画を保有されいること、日本人の皆が美味しいと評判の丼物、パスタ、カレーなどの料理。サービスオプションとして、お客様からのご要望で近隣にはデリバリーを再開させる予定とのことで、制作の際には簡単にサービスの追加ができるように工夫しました。
											
										</p>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="eco-image">
										<a href="javascript:void(0)"><img src="<?=PATH_URL.'static/images'?>/items/eco-1.jpg"></a>
										<p class="eco-title">EM’S CAFE</p>
									</div>
									<div class="eco-content">
										<p class="common-text">
											EM’S CAFEは、ホーチミン市の日本人街レタントン通りにある、娯楽が少ないホーチミンで日本人が一人でも行ける憩いの場です。人気の理由は、ベトナムNO,1の5,000冊を超える漫画を保有されいること、日本人の皆が美味しいと評判の丼物、パスタ、カレーなどの料理。サービスオプションとして、お客様からのご要望で近隣にはデリバリーを再開させる予定とのことで、制作の際には簡単にサービスの追加ができるように工夫しました。
											
										</p>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="eco-image">
										<a href="javascript:void(0)"><img src="<?=PATH_URL.'static/images'?>/items/eco-1.jpg"></a>
										<p class="eco-title">EM’S CAFE</p>
									</div>
									<div class="eco-content">
										<p class="common-text">
											EM’S CAFEは、ホーチミン市の日本人街レタントン通りにある、娯楽が少ないホーチミンで日本人が一人でも行ける憩いの場です。人気の理由は、ベトナムNO,1の5,000冊を超える漫画を保有されいること、日本人の皆が美味しいと評判の丼物、パスタ、カレーなどの料理。サービスオプションとして、お客様からのご要望で近隣にはデリバリーを再開させる予定とのことで、制作の際には簡単にサービスの追加ができるように工夫しました。
											
										</p>
									</div>
								</div>	
							</div>
						</div><!-- economical-items -->
						<div class="economical-items bounceInLeft">
							<div class="row">
								<div class="col-xs-3">
									<div class="eco-image">
										<a href="javascript:void(0)"><img src="<?=PATH_URL.'static/images'?>/items/eco-2.jpg"></a>
										<p class="eco-title">KYOWAKIDEN VN</p>
									</div>
									<div class="eco-content">
										<p class="common-text">
											KYOWAKIDEN VIETNAM Co., Ltd. 様のスタートアップWEBサイトを制作させて頂きました。日本で培った水処理、電気エネルギーに関する技術と実績があり、ベトナムでは、ヴィンロン省に本社を構えて事業を行われています。水処理施設に関する機械および電気関係の設計およびエンジニアリング事業を展開し、お客様の環境改善のお手伝いという業務をイメージしやすいデザインと見易さを考えて製作いたしました
										</p>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="eco-image">
										<a href="javascript:void(0)"><img src="<?=PATH_URL.'static/images'?>/items/eco-2.jpg"></a>
										<p class="eco-title">KYOWAKIDEN VN</p>
									</div>
									<div class="eco-content">
										<p class="common-text">
											KYOWAKIDEN VIETNAM Co., Ltd. 様のスタートアップWEBサイトを制作させて頂きました。日本で培った水処理、電気エネルギーに関する技術と実績があり、ベトナムでは、ヴィンロン省に本社を構えて事業を行われています。水処理施設に関する機械および電気関係の設計およびエンジニアリング事業を展開し、お客様の環境改善のお手伝いという業務をイメージしやすいデザインと見易さを考えて製作いたしました
										</p>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="eco-image">
										<a href="javascript:void(0)"><img src="<?=PATH_URL.'static/images'?>/items/eco-2.jpg"></a>
										<p class="eco-title">KYOWAKIDEN VN</p>
									</div>
									<div class="eco-content">
										<p class="common-text">
											KYOWAKIDEN VIETNAM Co., Ltd. 様のスタートアップWEBサイトを制作させて頂きました。日本で培った水処理、電気エネルギーに関する技術と実績があり、ベトナムでは、ヴィンロン省に本社を構えて事業を行われています。水処理施設に関する機械および電気関係の設計およびエンジニアリング事業を展開し、お客様の環境改善のお手伝いという業務をイメージしやすいデザインと見易さを考えて製作いたしました
										</p>
									</div>
								</div>
									
							</div>
						</div><!-- economical-items -->
					</div>
					<div class="btn-eco">
						<a href="javascript:void(0)" data-toggle="modal" data-target="#contactModal" class="btn-view-more">制作について相談する</a>
					</div>
					<div class="eco-steps-block zoomIn">
						<h4 class="red-heading-title">オリジナルWEBサイトはお打ち合わせ後お見積もりを出させて頂いております。<br/>
						テンプレートWEBサイトの価格はこちらになります。</h4>
						<div class="bt-solid"></div>
						<h5 class="bold-text">ご利用料金</h5>
						<div class="eco-steps">
							<ul>
								<li><p class="bold-text">初期導入費<br/>
									1,000 USD</p>
								</li>
								<li>
									<p class="bold-text">月々の費用<br/>
									100 USD</p>
								</li>
								<li>
									<p class="bold-text">別途、VAT 10％<br/>
									(税）が掛かります。</p>
								</li>
							</ul>
						</div>
						<div class="bt-solid"></div>
					</div>
					<div class="intro-staff-eco fadeIn">
						<div class="row">
							<div class="col-xs-3">
								<div class="profile-items">
									<img src="<?=PATH_URL.'static/images'?>/staff/image1.png" alt=""/>
									<p class="info-staff">Mr. Watanabe Masaru</p>
								</div>
							</div>
							<div class="col-xs-9 des-staff-eco">
								<h5 class="bold-text">質の良いWEBサイトを安価にご提供しております。</h5>
								<p class="common-text">
								ベトナム国内でのビジネスにおいても日本同様にインターネットを利用したプロモーションは重要になっており、戦略立案、課題分析、内部施策をしっかりと行い、スマートフォンにも対応している質の高 い WEB サイトを弊社では安価にご提供しております。<br/>
								安価にご提案できる強みは、自社開発して商品化したテンプレート形式のホームページがあることです。この商品は、汎用性を高くしており、様々な業種のお客様がご利用頂けます。またオリジナリティーを出す為に、豊富なカラーバリエーションとデザインの追加加工が行えるようにしております。ベトナム国内、日本ともに開業時の初期ホームページとしてご利用頂くケースが多いのですが、コスト面、機能面、デザイン面のバランスの満足度は、様々な業種のお客様にご好評を頂いております。こちらをベースにしたオプション制作ももしろん可能です。ホームページを検討されている方に是非ご提案の機会を頂ければ幸いです。<br/>
								弊社は、日本人専門担当者の対応ができるだけでなく、WEBサイト制作に欠かせないWEBデザイナーから日本人ユーザーの利用を熟知したエンジニアまで在籍しております。WEBサイト内にシステム構築も必要など、オリジナルの制作ももちろんご相談頂けます。
								まずは、お気軽にご相談下さい。</p>
								<div class="btn-eco">
									<a href="javascript:void(0)" data-toggle="modal" data-target="#contactModal"  class="btn-view-more">制作について相談する</a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div><!-- wrapper-content-block office-renewal-block-->
		<?php
	}
	elseif ($item->id == 570) {
		?>
		<div class="wrapper-content-block office-renewal-block">
			<div class="intro-office-renewal">
				<div class="container">
					<img src="images/icon/logo-office.png" alt=""/>
					<div class="sub-intro-content">
						<h2 class="heading-title">働き方を施工する</h2>
						<p class="thin-text">We always make design and construct workspace putting your thought into...</p>
					</div>	
				</div>
			</div>
			<div class="three-feature-appartment three-feature-office-renewal">
				<div class="container">
					<h3 class="heading-title">オフィスや店舗のデザインから 設計・施工内容、工事にいたる まで、ローコストで提供して おります。</h3>
					<!-- <div class="btn-pre-slider"><a href="javascript:void(0)"></a></div> -->
					<div class="row owl-carousel">						
						<div class="col-xs-4 feature-appartment">
							<a href="javascript:void(0)" title=""><img src="<?=PATH_URL.'static/images'?>/items/image-office-1.png"></a>
							<div class="info-feature-appartment">		
								<p class="">
									ビューティーアート専門学校B-art
								</p>
							</div>	
						</div>
						<div class="col-xs-4 feature-appartment">
							<a href="javascript:void(0)" title=""><img src="<?=PATH_URL.'static/images'?>/items/image-office-2.png"></a>
							<div class="info-feature-appartment">			
								<p>フォトロンベトナム（Photron Vietnam）</p>
							</div>	
						</div>
						<div class="col-xs-4 feature-appartment">
							<a href="javascript:void(0)" title=""><img src="<?=PATH_URL.'static/images'?>/items/image-office-3.png"></a>
							<div class="info-feature-appartment">			
								<p>バイタリフィアジア（VITALIFY ASIA）</p>
							</div>	
						</div>
						<div class="col-xs-4 feature-appartment">
							<a href="javascript:void(0)" title=""><img src="<?=PATH_URL.'static/images'?>/items/image-office-3.png"></a>
							<div class="info-feature-appartment">			
								<p>バイタリフィアジア（VITALIFY ASIA）</p>
							</div>	
						</div>
					</div>
					<!-- <div class="btn-next-slider"><a href="javascript:void(0)"></a></div> -->
				</div>
			</div>
			<div class="funiture-block">
				<div class="container">
					<h3 class="heading-title-line">Furniture & Interior</h3>
					<p class="common-text">オフィスのデザインにぴったりなインテリアもご提案。<br/>
					集中して働いていただけるオフィス空間に仕上げます。</p>
				</div>
			</div>
			<div class="look-up-block">
				<div class="container">
					<div class="look-up-block1">
						<h3 class="bold-text">無料でご提供する４つのサービス</h3>
						<div class="bt-solid"></div>
						<div class="look-up-items-list">
							<div class="row">
								<div class="col-xs-3 look-up-item">
									<img src="<?=PATH_URL.'static/images'?>/icon/office-icon-1.png" alt=""/>
									<span>ご相談</span>
									<p class="common-text">まずはお気軽にご相談ください。<br/>ご相談はお電話でも、こちらのサイトのお問い合わせフォームからでも承っております。</p>
								</div>
								<div class="col-xs-3 look-up-item">
									<img src="<?=PATH_URL.'static/images'?>/icon/office-icon-2.png" alt=""/>
									<span>現地調査</span>
									<p class="common-text">実際の現場を拝見した上でお打ち合わせいたし ます。「シームレスなオフィスにしたい！」「間接照明が映えるクロスのCAFEにしたい！」お客様のご要望が叶えられる物件かどうかを含め、調査いたします。</p>
								</div>
								<div class="col-xs-3 look-up-item">
									<img src="<?=PATH_URL.'static/images'?>/icon/office-icon-3.png" alt=""/>
									<span>プラン提案</span>
									<p class="common-text">お客様から頂いたご要望と、現地査の結果を元に、施工技術スタッフも絡めてお客様毎に最適なプランをご提案します。また、よりお客様のご要望をクリアにしていくために、２案、３案、４案と、打ち合わせを通してご提案をブラッシュアップしていきます。もちろん、お打ち合わせの回数にかかわらず、頂戴する料金はございません。プランニングシートも、そのつど提出いたします。</p>
								</div>
								<div class="col-xs-3 look-up-item">
									<img src="<?=PATH_URL.'static/images'?>/icon/office-icon-4.png" alt=""/>
									<span>見積</span>
									<p class="common-text">プランを練り直すために、実現可能なお見積もりをその都度提出させていただきます。 プランと見積もりをつき合わせながら、最適な内装プランをお選びください。</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="look-up-block2">
						<div class="row">
							<div class="col-xs-5">
								<h3 class="heading-title-line">無料アフターサービス</h3>
								<p class="common-text">	クロニクルリフォームはアフターサービス付き。<br/>
									経験豊富な現地スタッフと、ベテランの日本人管理者が<br/>
									あなたのオフィスの品質を確かなものにキープします。<br/>
									ホーチミン最長のアフター期間を設けており、万が一<br/>
									不具合が発生した場合は迅速に対応させて頂いております。<br/>
									安心してご依頼くださいませ。<br/>
									※施行部分のみ。電球等の消耗品を除く</p>
							</div>
							<div class="col-xs-7">
								<div class="col-xs-4 staff-office-list">
									<div class="staff-item">
										<img src="<?=PATH_URL.'static/images'?>/staff/image1.png" alt="image staff"/>
										<p class="info-staff">
											Mr. Watanabe Masaru
										</p>
									</div>	
								</div>
								<div class="col-xs-4 staff-office-list">
									<div class="staff-item">
										<img src="<?=PATH_URL.'static/images'?>/staff/image1.png" alt="image staff"/>
										<p class="info-staff">
											Mr. Suzuki Hideaki
										</p>
									</div>	
								</div>
								<div class="col-xs-4 staff-office-list">
									<div class="staff-item">
										<img src="<?=PATH_URL.'static/images'?>/staff/image1.png" alt="image staff"/>
										<p class="info-staff">
											Mr. Trần Chí Trung
										</p>
									</div>	
								</div>
							</div>
							
						</div>
					</div>
				</div>	
			</div><!-- look-up-block -->
			<div class="work-office-block">
				<div class="container">
					<h3 class="heading-title-line">施工事例WORK</h3>
					<div class="work-list">
						<ul class="clearfix">
							<li>
								<a href="" title="">REGAL様（靴メーカー）</a>
							</li>
							<li>
								<a href="" title="">VITALIFYASIA様<br/>
								（システム開発）</a>
							</li>
							<li>
								<a href="" title="">Photoron Vietnam様<br/>
								（精密機器開発、システム開発）</a>
							</li>
						</ul>
						<ul class="clearfix">
							<li>
								<a href="" title="">FANUC　VIETNAM様<br/>
								（ロボット、部品の販売）</a>
							</li>
							<li>
								<a href="" title="">学校法人三幸学園：<br/>
								ビューティーアート専門学校B－art様
								（専門学校）
								</a>
							</li>
						</ul>
					</div>
					
				</div>
			</div>
			<div class="contact-office background-dot-dark">
				<div class="container">
					<h3 class="heading-title">弊社ホームページをご覧頂き<br/>
						ありがとうございます。
					</h3>
					<p class="common-text">弊社では、これまで快適なオフィス空間を中心とした機能性、デザイン性の高い内装施工をご提供してきました。<br/>今後も社員のモチベーション向上や採用効率の向上に貢献できる空間をご提供していくことを目指していきます。<br/>お気軽にお問い合わせください。</p>
					<div class="contact-group clearfix">
						<div class="block-contact-phone">
							<p><span>ベトナム国内から</span></p>
							<span></span>
							<p><a href="tel:02838275068"><span>028‐3827‐5068</span></a></p>
						</div>
						<div class="block-contact-phone block-contact-phone-jp">
							<p><span>日本海外から</span></p>
							<span></span>
							<p><a href="tel:+842838275068"><span>＋84‐28‐3827‐5068</span></a></p>
						</div>
						<div class="block-contact-mail">
							<a href="javascript:void(0)" data-toggle="modal" data-target="#contactModal"><p>WEBからの<br>お問い合わせ</p></a>
						</div>
					</div>
					
				</div>
				
				
			</div>
		</div><!-- wrapper-content-block office-renewal-block-->
		<?php
	}
	elseif ($item->id == 242) {
		?>
		<div class="wrapper-content-block staff-page">
			<div class="container">
				<div class="row">
					<div class="breadcums">
						<span>トップページ  /  運営会社  /  <a href="#"> スタッフ紹介</a></span>
					</div>
				</div>
				<div class="staff-block">
					<h2 class="heading-title heading-white-line">スタッフ紹介</h2>	
					<div class="staff-block-items">
						<div class="row">
							<div class="col-xs-6 staff-items">
								<div class="staff-item col-xs-5">
									<img src="<?=PATH_URL.'static/images'?>/staff/image1.png" alt="image staff">
								</div>
								<div class="staff-item col-xs-7">
									<p class="info-staff">
										<span>Mr . Antonio Frizz</span>
										<span>Marketing executive</span>
									</p>
									<div class="bt-solid"></div>
									<p class="common-text">弊社では、ベトナムに進出される企業様、働かれる方へ様々な支援をご提供しております。<br/>
									日本人だけでなくスタッフ、弁護士、会計資格者、設計士が日本語でのコミュニケーションが可能です。お気軽にお問い合わせ相談下さい。</p>
								</div>	
							</div>
							<div class="col-xs-6 staff-items">
								<div class="staff-item col-xs-5">
									<img src="<?=PATH_URL.'static/images'?>/staff/image2.png" alt="image staff">
									
								</div>
								<div class="staff-item col-xs-7">
									<p class="info-staff">
										<span>Ms. Vale Domino</span>
										<span>Marketing executive</span>
									</p>
									<div class="bt-solid"></div>
									<p class="common-text">海外生活で大切な住環境。アオザイハウジングは、賃貸物件情報を豊富に取り扱っているだけではなく、入居後に万一の事態には、不具合解決に向けた対応もさせて頂いております。お客さまのホーチミン生活を全力でサポートさせていただいている弊社にお気軽にご相談下さい</p>
								</div>	
							</div>
							
						</div>
						
					</div><!-- staff-block-items -->
					<div class="staff-block-items">
						<div class="row">
							<div class="col-xs-6 staff-items">
								<div class="staff-item col-xs-5">
									<img src="<?=PATH_URL.'static/images'?>/staff/image1.png" alt="image staff">
								</div>
								<div class="staff-item col-xs-7">
									<p class="info-staff">
										<span>Mr . Antonio Frizz</span>
										<span>Marketing executive</span>
									</p>
									<div class="bt-solid"></div>
									<p class="common-text">弊社では、ベトナムに進出される企業様、働かれる方へ様々な支援をご提供しております。<br/>
									日本人だけでなくスタッフ、弁護士、会計資格者、設計士が日本語でのコミュニケーションが可能です。お気軽にお問い合わせ相談下さい。</p>
								</div>	
							</div>
							<div class="col-xs-6 staff-items">
								<div class="staff-item col-xs-5">
									<img src="<?=PATH_URL.'static/images'?>/staff/image2.png" alt="image staff">
									
								</div>
								<div class="staff-item col-xs-7">
									<p class="info-staff">
										<span>Ms. Vale Domino</span>
										<span>Marketing executive</span>
									</p>
									<div class="bt-solid"></div>
									<p class="common-text">海外生活で大切な住環境。アオザイハウジングは、賃貸物件情報を豊富に取り扱っているだけではなく、入居後に万一の事態には、不具合解決に向けた対応もさせて頂いております。お客さまのホーチミン生活を全力でサポートさせていただいている弊社にお気軽にご相談下さい</p>
								</div>	
							</div>
							
						</div>
						
					</div><!-- staff-block-items -->
					<div class="staff-block-items">
						<div class="row">
							<div class="col-xs-6 staff-items">
								<div class="staff-item col-xs-5">
									<img src="<?=PATH_URL.'static/images'?>/staff/image1.png" alt="image staff">
								</div>
								<div class="staff-item col-xs-7">
									<p class="info-staff">
										<span>Mr . Antonio Frizz</span>
										<span>Marketing executive</span>
									</p>
									<div class="bt-solid"></div>
									<p class="common-text">弊社では、ベトナムに進出される企業様、働かれる方へ様々な支援をご提供しております。<br/>
									日本人だけでなくスタッフ、弁護士、会計資格者、設計士が日本語でのコミュニケーションが可能です。お気軽にお問い合わせ相談下さい。</p>
								</div>	
							</div>
							<div class="col-xs-6 staff-items">
								<div class="staff-item col-xs-5">
									<img src="<?=PATH_URL.'static/images'?>/staff/image2.png" alt="image staff">
									
								</div>
								<div class="staff-item col-xs-7">
									<p class="info-staff">
										<span>Ms. Vale Domino</span>
										<span>Marketing executive</span>
									</p>
									<div class="bt-solid"></div>
									<p class="common-text">海外生活で大切な住環境。アオザイハウジングは、賃貸物件情報を豊富に取り扱っているだけではなく、入居後に万一の事態には、不具合解決に向けた対応もさせて頂いております。お客さまのホーチミン生活を全力でサポートさせていただいている弊社にお気軽にご相談下さい</p>
								</div>	
							</div>
							
						</div>
						
					</div><!-- staff-block-items -->
					<div class="staff-block-items">
						<div class="row">
							<div class="col-xs-6 staff-items">
								<div class="staff-item col-xs-5">
									<img src="<?=PATH_URL.'static/images'?>/staff/image1.png" alt="image staff">
								</div>
								<div class="staff-item col-xs-7">
									<p class="info-staff">
										<span>Mr . Antonio Frizz</span>
										<span>Marketing executive</span>
									</p>
									<div class="bt-solid"></div>
									<p class="common-text">弊社では、ベトナムに進出される企業様、働かれる方へ様々な支援をご提供しております。<br/>
									日本人だけでなくスタッフ、弁護士、会計資格者、設計士が日本語でのコミュニケーションが可能です。お気軽にお問い合わせ相談下さい。</p>
								</div>	
							</div>
							<div class="col-xs-6 staff-items">
								<div class="staff-item col-xs-5">
									<img src="<?=PATH_URL.'static/images'?>/staff/image2.png" alt="image staff">
									
								</div>
								<div class="staff-item col-xs-7">
									<p class="info-staff">
										<span>Ms. Vale Domino</span>
										<span>Marketing executive</span>
									</p>
									<div class="bt-solid"></div>
									<p class="common-text">海外生活で大切な住環境。アオザイハウジングは、賃貸物件情報を豊富に取り扱っているだけではなく、入居後に万一の事態には、不具合解決に向けた対応もさせて頂いております。お客さまのホーチミン生活を全力でサポートさせていただいている弊社にお気軽にご相談下さい</p>
								</div>	
							</div>
						</div>
					</div><!-- staff-block-items -->	
				</div><!-- staff-block -->
			</div><!-- container -->
		</div><!--staff-page -->
		<?php
	}
	else{
		echo "Page not found !";
	}
	?>
<script>
    function init() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i=0; i<imgDefer.length; i++) {
            if(imgDefer[i].getAttribute('data-src')) {
                imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
            }
        }   
    }
    window.onload = init;
    $(document).ready(function($) {
        $(".product-detail-area").slice(0, 2).show();
        var position = $(".product-area-map").scrollTop(); 
        $(window).scroll(function(){
            var position = $('.product-area-map').height();
            if($(this).scrollTop() >= position){
                $(".product-detail-area:hidden").slideDown();
            }
        });
    });
</script>