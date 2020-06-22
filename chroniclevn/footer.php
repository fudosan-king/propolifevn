	</main>
   
<?php 
$page_info = get_page_by_path('general_addition_info');
$company_profile = get_field('company_profile', $page_info);;
$footer_info = get_field('footer', $page_info);
$top_extra_content = $footer_info['top_extra_content'];
$footer_above = $footer_info['above_content'];
$footer_bottom = $footer_info['bottom_content'];

$footer_extra_scripts = $footer_info['extra_scripts'];
?>

	<div id="footer" class="cf"></div>
		
		<?php echo $top_extra_content; ?>

		<footer>
		    <div class="footer_top">
		        <div class="container">
		            <div class="row">
		                <div class="col-lg-8 col-lg-offset-2">
		                    <p><?php echo $footer_above; ?></p>  
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="footer_bottom">
		        <div class="container">
		            <div class="row">
		                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col_footer_bottom">
		                	<?php 
		                	$left_logo_image = $footer_bottom['left_logo_image'];

		                	if (!empty($left_logo_image)):
		                		echo '<a href="/"><img src="'.$left_logo_image['url'].'" alt="" class="img-responsive logo_footer"></a>';
		                	endif;
		                	?>
		                    
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col_footer_bottom">
		                    <p class="text-center">
		                    <?php
		                    echo $company_profile['company_address'];
		                    echo '<br>'.$footer_bottom['company_copyright']; 
		                    ?></p>
		                </div>
		                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col_footer_bottom">
		                	<?php 
		                	$right_phone_list = $footer_bottom['right_phone_list'];
							$arr = phone_title_map();
							$arrToMap = array_column($arr, 'phone_number', 'phone_name' );
							if (!empty($right_phone_list)):
								echo '<p class="phoneNumber">';
								foreach ($right_phone_list as $field){
									$phoneTitle = $field['phone_title_map'];
									echo $phoneTitle.': '.$arrToMap[$phoneTitle].'<br>';
								}
								echo '</p>';
							endif;
		                	?>
		            
		                </div>
		            </div>
		        </div>
		    </div>
		</footer>

		<div class='back_to_top' id='back_to_top' title='Back to top'><i class='i_arrow_top' /></i></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script src="<?php echo TEMPLATE_DIR; ?>/js/bootstrap-dropdownhover.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/js/swiper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
	<script src="<?php echo TEMPLATE_DIR; ?>/js/jquery.sameify.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
	<script src="https://masonry.desandro.com/masonry.pkgd.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="<?php echo TEMPLATE_DIR; ?>/js/functions.js"></script>
	
	<?php wp_footer(); ?>
	
	<?php print_r($footer_extra_scripts); ?>
	
</body>

</html>
