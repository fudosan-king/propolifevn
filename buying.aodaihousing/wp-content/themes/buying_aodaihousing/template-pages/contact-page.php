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
    						<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="frm_contact" id="form-contact" method="post">
    							<div class="form-group">
    								<?php if($_POST['estate_title']): ?>
    								<div class="row">
    									<div class="col-12 col-sm-4 align-self-center">
    										<label for="">お問い合わせ物件</label>
    									</div>
    									<div class="col-12 col-sm-8 align-self-center">
    										<input type="hidden" name="estates_name" value="<?php echo $_POST['estate_title']; ?>" class="form-control">
	  										<h3><?php echo $_POST['estate_title']; ?></h3>
	  									</div>
    								</div>
    								<?php endif; ?>
    							</div>
    							<div class="form-group">
    								<div class="row">
    									<div class="col-12 col-sm-4 align-self-center">
    										<label for="">お名前 <span class="red">＊</span></label>
    									</div>
    									<div class="col-12 col-sm-8" id="customer_name">
    										<input type="text" name="customer_name" class="form-control">
                                          <div class="error-text"></div>
    									</div>
    								</div>
    							</div>
    							<div class="form-group">
    								<div class="row">
    									<div class="col-12 col-sm-4 align-self-center">
    										<label for="">住所 <span class="red">＊</span></label>
    									</div>
    									<div class="col-12 col-sm-8 align-self-center" id="address">
    										<input type="text" name="address" class="form-control">
                                          <div class="error-text"></div>
    									</div>
    								</div>
    							</div>
    							<div class="form-group">
    								<div class="row">
    									<div class="col-12 col-sm-4">
    										<label for="">電話番号 <span class="red">＊</span></label>
    									</div>
    									<div class="col-12 col-sm-8" id="phone">
    										<input type="text" name="number_phone"  class="form-control" placeholder="＋81 90 1234 5678">
                                          <div class="error-text"></div>
    									</div>
    								</div>
    							</div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <label for="">Eメールアドレス <span class="red">＊</span></label>
                                        </div>
                                        <div class="col-12 col-sm-8" id="email">
                                            <input type="text" name="email"  class="form-control" placeholder="Ex : example@gmail.com">
                                          <div class="error-text"></div>
                                        </div>
                                    </div>
                                </div>
    							<div class="form-group">
    								<div class="row">
    									<div class="col-12 col-sm-4">
    										<label for="">不動産ご購入の目的 <span class="red">＊</span></label>
    									</div>
    									<div class="col-12 col-sm-8" id="checkbox">
    										<div class="form-check form-check-inline">
										  	<input class="form-check-input" type="checkbox" name="inlineCheckbox1" id="inlineCheckbox1" value="option1">
										  	<label class="form-check-label" for="inlineCheckbox1">投資</label>
										</div>
										<div class="form-check form-check-inline">
										  	<input class="form-check-input" type="checkbox" name="inlineCheckbox2" id="inlineCheckbox2" value="option2">
										  	<label class="form-check-label" for="inlineCheckbox2">実住</label>
										</div>
                                          <div class="error-text"></div>
    									</div>
    								</div>
    							</div>
    							<div class="form-group">
    								<div class="row">
    									<div class="col-12 col-sm-4">
    										<label for="">お問い合わせ内容 <br>
    										（ご自由にお書きください）</label>
    									</div>
    									<div class="col-12 col-sm-8">
    										<textarea class="form-control" name="content" cols="30" rows="8" placeholder="例）1区の不動産購入を検討しているがオススメはどれにな りますか など、ご自由にお書きください。"></textarea>
    										<input type="hidden" name="action" value="contact_form">
    										<button type="submit" class="btn btn-dark btnSend mt-sm-5 mt-3">お問い合わせを送信する</button>
    									</div>
    								</div>
    							</div>
    							
    						</form>
    					</div>
    				</div>
    			</div>
    		</section>

		</div>
	</main>
<?php get_footer();?>