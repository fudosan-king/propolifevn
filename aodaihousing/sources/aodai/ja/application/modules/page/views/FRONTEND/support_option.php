<div class="wrapper-content-block wrapper-block-common support-option-block">
	<div class="container">
		<!-- Breadcums -->
		<?php 
			// File store under folder application/views/FRONTEND/breadcums.php
			echo $this->load->view('FRONTEND/breadcums');
		?>
		
		<div class="support-option-content clearfix">
			<h4 class="red-heading-title">サポートオプションについて</h4>
			<div class="bt-solid"></div>
			<div class="logo-lotus">
				<img src="<?php echo PATH_URL . 'static'; ?>/images/logo.png" title="logo-aodai"/>
			</div>
			<div class='common-content-block'>
				<p class='common-text'>
					<b class="bold-text">アオザイハウジングはサポートのオプションもご用意しております</b><br>
					アオザイハウジングでは、もっと快適に過ごす為のオプションもご用意しております。気になるものがございましたらお気軽にご相談下さい。
				</p><!-- end .common-text -->
			</div><!-- end .common-content-block -->
			<div class="option-list-block">
				<ul class="options-list">
					<li>
						<a class="clearfix">
							<img src="<?php echo PATH_URL . 'static'; ?>/images/icon/sp1.png" title="logo-option" class="pull-left"/>
							<span class="pull-left">ビザ＆労働許可書</span>
						</a>
					</li>
					<li>
						<a class="clearfix">
							<img src="<?php echo PATH_URL . 'static'; ?>/images/icon/sp2.png" title="logo-option" class="pull-left"/>
							<span class="pull-left">日本のTV視聴</span>
							
						</a>
					</li>
					<li>
						<a class="clearfix">
							<img src="<?php echo PATH_URL . 'static'; ?>/images/icon/sp3.png" title="logo-option" class="pull-left"/>
							<span class="pull-left">浄水器</span>
						</a>
					</li>
					<li>
						<a class="clearfix">
							<img src="<?php echo PATH_URL . 'static'; ?>/images/icon/sp4.png" title="logo-option" class="pull-left"/>
							<span class="pull-left">ウォシュレット<br/>エコウォシャー</span>
							
						</a>
					</li>
					<li>
						<a class="clearfix">
							<img src="<?php echo PATH_URL . 'static'; ?>/images/icon/sp5.png" title="logo-option" class="pull-left"/>
							<span class="pull-left">ペストコントロール</span>
							
						</a>
					</li>
					<li>
						<a class="clearfix">
							<img src="<?php echo PATH_URL . 'static'; ?>/images/icon/sp6.png" title="logo-option" class="pull-left"/>
							<span class="pull-left">ハウスキーパー</span>
						</a>
					</li>
					<li>
						<a class="clearfix">
							<img src="<?php echo PATH_URL . 'static'; ?>/images/icon/house_safe.png" title="logo-option" class="pull-left"/>
							<span class="pull-left">ホームセキュリティー</span>

						</a>
					</li>
					<li>
						<a class="clearfix">
							<img src="<?php echo PATH_URL . 'static'; ?>/images/icon/clean_air.png" title="logo-option" class="pull-left"/>
							<span class="pull-left">エアコンの清掃</span>
						</a>
					</li>
				</ul>
				
			</div>

			<!-- Contact us button -->
			<?php 
				// File store under folder application/views/FRONTEND/information_contact_us.php
				echo $this->load->view('FRONTEND/information_contact_us');
			?>

			<div class='after-contact-us'></div>

		</div><!-- end .support-option-content clearfix -->
		<!-- feature-block -->
			<div class="feature-static-page">
				<?php echo modules::run('block/feature'); ?>
			</div>
			<ul class="collapse-item">
            	<li>
            		<a href="javascript:void(0)" id="toggle-label" class="lazy toggle-dropdown rented-real-estate">ホーチミンの賃貸物件について</a>
            	</li>
            </ul>

			<!-- <div class="btn-home">
				<a href="<?=create_url(); ?>" class="">
					<span> ホームに戻る</span>  
				</a> 
			</div> -->
	</div><!-- end .container -->
</div><!-- end .wrapper-content-block wrapper-block-common support-option-block -->