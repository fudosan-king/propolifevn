<?php /* Template Name: PageContact */ ?>
<?php get_header(); ?>

<section id="primary" class="section_general section_contactus">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
			<h4><i class="i_contact"></i> Contact to Us</h4>
			<div class="nf-form-fields-required">Fields marked with an <span class="ninja-forms-req-symbol">*</span> are required</div>
			<div class="frm_contactus">
				<?php echo do_shortcode('[ninja_form id=1]'); ?>
			</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>