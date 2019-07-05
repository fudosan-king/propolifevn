<?php 
/* Template Name: CONTACT - Page Template */
?>
<?php get_header();?>
	<main>
		<div class="main_templates">
    		<section class="section_contact">
    			<div class="container">
    				<div class="row">
    					<div class="col-12 col-md-8 offset-md-2">
    						<h4 class="text-center"><span class="red">＊</span> マークの項目は必ずご記入ください。</h4>
                            <?php if($_POST['estate_title']): ?>
                            <div class="row">
                                <div class="col-12 col-sm-4 align-self-center">
                                    <label for="">お問い合わせ物件</label>
                                </div>
                                <div class="col-12 col-sm-8 align-self-center">
                                    <h3 class="teaserBoxLink"><?php echo $_POST['estate_title']; ?></h3>
                                </div>
                            </div>
                            <?php endif; ?>
    						<?php echo do_shortcode('[contact-form-7 id="418" title="相談する" html_id="form-contact" html_class="frm_contact"]'); ?>
    					</div>
    				</div>
    			</div>
    		</section>

		</div>
	</main>
<?php get_footer();?>