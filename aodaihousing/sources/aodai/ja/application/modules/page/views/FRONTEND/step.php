<div class="wrapper-content-block rent-appartment-steps">
	<div class="container">
		<!-- Breadcums -->
		<?php 
			// File store under folder application/views/FRONTEND/breadcums.php
			echo $this->load->view('FRONTEND/breadcums');
		?>

		<div class="steps-block">
			<h2 class="heading-title"><?php echo lang('step_heading_title'); ?></h2>	
			<div class="row">
				<!-- step 1 -->
				<div class="content-step-block col-xs-12 col-md-4 col-sm-12">
					<div class="step-item">
						<div class="steps">
							<div class="image-step">
								<img src="<?php echo PATH_URL.'static'?>/images/icon/step-icon1.png" title=""/>
							</div>
							<div class="title-step">
								<p class="">
									<span class="span-step"><?php echo lang('step_span_step_1'); ?></span>
									<span class="span-number"><?php echo lang('step_span_number_1'); ?></span>
								</p>
								<p><?php echo lang('step_title_paragraph_1'); ?></p>
							</div>
						</div>
						<p class="content-step"><?php echo lang('step_content_step_1'); ?></p>
						<p class="content-center"><?php echo lang('step_content_center_first_1'); ?></p>
						<div class="info-phone-block">
							<p class="info-phone" x-ms-format-detection="none">
								<span><?php echo lang('step_info_phone_first_number_1'); ?></span> 
								<span><?php echo lang('step_info_phone_first_text_1'); ?></span>
							</p>
							<p class="info-phone" x-ms-format-detection="none">
								<span><?php echo lang('step_info_phone_second_number_1'); ?></span> 
								<span><?php echo lang('step_info_phone_second_text_1'); ?></span>
							</p>
						</div>
					</div><!-- step-item -->
				</div><!-- content-step-block -->
				
				<!-- step 2 -->
				<div class="content-step-block col-xs-12 col-md-4 col-sm-12">
					<div class="step-item">
						<div class="steps">
							<div class="image-step">
								<img src="<?php echo PATH_URL.'static'?>/images/icon/step-icon2.png" title=""/>
							</div>
							<div class="title-step">
								<p class="">
									<span class="span-step"><?php echo lang('step_span_step_2'); ?></span>
									<span class="span-number"><?php echo lang('step_span_number_2'); ?></span>
								</p>
								<p><?php echo lang('step_title_paragraph_2'); ?></p>
							</div>
						</div>
						<p class="content-step"><?php echo lang('step_content_step_2'); ?></p>
					</div><!-- step-item -->
				</div><!-- content-step-block -->
				
				<!-- step 3 -->
				<div class="content-step-block col-xs-12 col-md-4 col-sm-12">
					<div class="step-item">
						<div class="steps">
							<div class="image-step">
								<img src="<?php echo PATH_URL.'static'?>/images/icon/step-icon3.png" title=""/>
							</div>
							<div class="title-step">
								<p class="">
									<span class="span-step"><?php echo lang('step_span_step_3'); ?></span>
									<span class="span-number"><?php echo lang('step_span_number_3'); ?></span>
								</p>
								<p><?php echo lang('step_title_paragraph_3'); ?></p>
							</div>
						</div>
						<p class="content-step"><?php echo lang('step_content_step_3'); ?></p>
						<p class="content-step"><?php echo lang('step_content_step_3_second'); ?></p>
					</div><!-- step-item -->
				</div><!-- content-step-block -->
			</div><!-- row -->
			
			<div class="row last-row">
				<div class="content-step-block col-xs-12 col-md-2 col-sm-12"></div>
				
				<!-- step 4 -->
				<div class="content-step-block col-xs-12 col-md-4 col-sm-12">
					<div class="step-item">
						<div class="steps">
							<div class="image-step">
								<img src="<?php echo PATH_URL.'static'?>/images/icon/step-icon4.png" title=""/>
							</div>
							<div class="title-step">
								<p class="">
									<span class="span-step"><?php echo lang('step_span_step_4'); ?></span>
									<span class="span-number"><?php echo lang('step_span_number_4'); ?></span>
								</p>
								<p><?php echo lang('step_title_paragraph_4'); ?></p>
							</div>
						</div>
						<p class="content-step"><?php echo lang('step_content_step_4'); ?></p>
					</div><!-- step-item -->
				</div><!-- content-step-block -->
				
				<!-- step 5 -->
				<div class="content-step-block col-xs-12 col-md-4 col-sm-12">
					<div class="step-item">
						<div class="steps">
							<div class="image-step">
								<img src="<?php echo PATH_URL.'static'?>/images/icon/step-icon5.png" title=""/>
							</div>
							<div class="title-step">
								<p class="">
									<span class="span-step"><?php echo lang('step_span_step_5'); ?></span>
									<span class="span-number"><?php echo lang('step_span_number_5'); ?></span>
								</p>
								<p><?php echo lang('step_title_paragraph_5'); ?></p>
							</div>
						</div>
						<p class="content-step"><?php echo lang('step_content_step_5'); ?></p>
						<p class="content-step"><?php echo lang('step_content_step_5_second'); ?></p>
					</div><!-- step-item -->
				</div><!-- content-step-block -->

				<div class="content-step-block col-xs-12 col-md-4 col-sm-12"></div>
			</div><!-- end .row -->

			<div class="row">
				<div class="content-step-block col-xs-12">
					<!-- Contact us button -->
					<?php 
						// File store under folder application/views/FRONTEND/information_contact_us.php
						echo $this->load->view('FRONTEND/information_contact_us');
					?>
				</div>
				<div class="content-step-block col-xs-2"></div>
			</div>
			<!-- feature-block -->
			<div class="feature-static-page step-static-page">
				
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
		</div><!-- steps-block -->
	</div><!-- container -->
</div><!-- rent-appartment-steps -->