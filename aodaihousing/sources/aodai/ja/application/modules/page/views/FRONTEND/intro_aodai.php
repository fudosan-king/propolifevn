<div class="wrapper-content-block hcm-office-block intro-aodai-block">
	<div class="container">
		<!-- Breadcums -->
		<?php 
			// File store under folder application/views/FRONTEND/breadcums.php
			echo $this->load->view('FRONTEND/breadcums');
		?>

		<div class="intro-aodai">
			<h4 class="red-heading-title"><?php echo lang('intro_aodai_heading_title'); ?></h4>
			<div class="bt-solid"></div>
			<div class="intro-aodai-content">
				<p class="bold-text"><?php echo lang('intro_aodai_paragraph1'); ?></p>
				<p class="common-text"><?php echo lang('intro_aodai_paragraph2'); ?></p>
				<p class="common-text"><?php echo lang('intro_aodai_paragraph3'); ?></p>
				<p class="common-text"><?php echo lang('intro_aodai_paragraph4'); ?></p>
				<!-- <p class="common-text"><?php echo lang('intro_aodai_paragraph5'); ?></p> -->
			</div>
		</div>
	</div><!-- container -->
</div><!-- intro-aodai-block -->