<div class="wrapper-content-block vn-visa-block permit-page">
	<div class="container">
		<!-- Breadcums -->
		<?php 
			// File store under folder application/views/FRONTEND/breadcums.php
			echo $this->load->view('FRONTEND/breadcums');
		?>

		<div class="vn-visa">
				<h4 class="red-heading-title">働く方の安心もサポートしております。</h4>
				<div class="bt-solid"></div>
				<p class="content-blue">労働許可証取得・免除申請・更新</p>
				<div class="logo-lotus">
					<img src="<?php echo PATH_URL . 'static'; ?>/images/detail/lotus.jpg" title="logo-lotus" style="width: 100%;" />
				</div>

				<div class="common-content-block">
					<p class="bold-text"></p>
					<p class="common-text">
						労働許可証の新規取得、免除申請、更新、レジデンスカード、家族付帯ビザもサポート実績豊富な弊社にご相談下さい。<br/><br/>
						幣サービスでは、日本人担当者と弁護士で、実務経験に裏づけされたアドバイスをご提供致します。申請前の書類取得段階、書類作成段階からサポートしており、提出時の正確な情報を基にご提案をさせて頂いております。<br/><br/>
						労働許可証もしくは労働許可証免除申請は、ベトナムで外国人が働くために必要になります。<br/>
						取得しますとレジデンスカード（短期滞在許可証/2年のマルチビザ）の取得もできます。<br/><br/>
						今のところ管理者、技術者、専門家の3つのカテゴリーについて変更はありません。
                	</p>
				</div>
				<div class="common-content-block">
					<p class="bold-text">【労働許可証カテゴリー】</p>
					<p class="common-text">
						- 管理者（投資家、代表者）<br/>
						- 技術者<br/>
						- 専門家
					</p>
				</div>
				<div class="common-content-block">
					<p class="bold-text">【労働許可証取得の主な必要書類】</p>
					<p class="common-text">
						- 雇用企業のライセンス<br/>
						- 在籍証明書及び経験証明書（専門家証明書）<br/>
						- 任命書（在籍1年以上、転籍の場合）<br/>
						- 無犯罪証明書外務省認証<br/>
						- 申請者の専門性、技術レベル、大学卒業を証明書<br/>
						- 指定病院健康診断書<br/>
						- パスポート<br/>
						- 写真（4×6）<br/><br/>

						上記書類は、日本で取得した書類は日本の外務省認証が必要になります。パスポートとライセンスはベトナムでのコピー公証が必要になります。全てベトナム語翻訳し、その上で申請書2種類を作成しましたら、サイン、捺印の上申請となります。<br/><br/>

						※現在労働許可証の審査が以前のように厳しくなってきております。取得できないということはありませんが、2019年3月8日に申請書が変更になり、求められる書類の内容も変わってきております。今後も変更が出てくる可能性があります。書類を準備される前に最新情報をご確認下さい。
					</p>
				</div>

				<!-- Contact us button -->
				<?php 
					// File store under folder application/views/FRONTEND/information_contact_us.php
					echo $this->load->view('FRONTEND/information_contact_us');
				?>

				<div class="common-content-block">
					<p class="bold-text">レジデンスカード（一時滞在許可証）</p>
					<p class="common-text">
						労働許可証を取得後には労働ビザLDビザの2年（レジデンスカード）が取得可能です。<br/>
						投資家ビザは、出資者になられている方が取得可能なビザです。 <br/>
						必要書類からご案内しておりますので、お気軽にご相談下さい。 
					</p>
				</div>
				<div class="common-content-block">
					<p class="bold-text">【レジデンスカード取得必要書類】</p>
					<p class="common-text">
						- 労働許可証原本<br/>
						- パスポート原本<br/>
						- 顔写真 2枚 2cm X 3cm<br/>
						- 会社ライセンス公証 1部<br/>
						- ベトナム居住台帳のコピー<br/>
						- NA6 申請書<br/>
						- NA8申請書
					</p>
				</div>

				<!-- Contact us button -->
				<?php 
					// File store under folder application/views/FRONTEND/information_contact_us.php
					echo $this->load->view('FRONTEND/information_contact_us');
				?>
		</div>	
		<!-- support-block -->
		<div class="support-static-page">
			 <?php echo modules::run('block/support'); ?>
		</div>
        <ul class="collapse-item">
            <li>
                <a href="javascript:void(0)" id="toggle-label" class="toggle-dropdown support-advanced" >ベトナム進出支援</a>
            </li>
        </ul>
	</div>
</div><!-- vn-visa-block -->