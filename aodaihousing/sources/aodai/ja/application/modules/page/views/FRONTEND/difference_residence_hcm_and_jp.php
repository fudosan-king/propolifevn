<div class="wrapper-content-block vn-visa-block type-hcm-house">
	<div class="container">
		<!-- Breadcums -->
		<?php 
			// File store under folder application/views/FRONTEND/breadcums.php
			echo $this->load->view('FRONTEND/breadcums');
		?>

		<div class="vn-visa">
			<h4 class="red-heading-title"><?php echo lang('difference_residence_hcm_and_jp_red-heading-title_1')?></h4>
			<div class="bt-solid"></div>
			<p class="content-blue"></p>
			<div class="logo-lotus"></div>
			
			<div class="common-content-block">
				<p class="common-text">
					<?php echo lang('difference_residence_hcm_and_jp_common-text_1')?>
				</p>
			</div>

			<!-- Contact us button -->
			<?php 
				// File store under folder application/views/FRONTEND/information_contact_us.php
				echo $this->load->view('FRONTEND/information_contact_us');
			?>
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
		</div>		
	</div>
</div><!-- vn-visa-block -->