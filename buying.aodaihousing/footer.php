			<?php get_template_part('template-parts/footers/content', 'footer'); ?> 
			<?php if (is_single() and $post->post_type == 'sale-estates'): ?>
				<?php if(wp_is_mobile()) { ?>
					<div class="btn_Contactus_Mobile">
						<a href="javascript:void(0);" class="btn_Mobile btn_Contactus_sm">
							<div class="btn_Mobile_div">
								<i class="fas fa-envelope fas-mobile"></i>
								<span>お問い合わせ</span>
							</div>
						</a> 
					</div>
				<?php }else{ ?>
					<a href="javascript:void(0);" class="btn btn_Contactus btn_Contactus_sm d-sm-block d-none">
						<span>お問い合わせ</span> <i class="fas fa-envelope fa-2x"></i>
					</a>  
				<?php } ?>   
			<?php endif; ?>    
	    </div>

	    <?php get_template_part('template-parts/footers/content', 'jsfooter'); ?> 
	    <?php if(wp_is_mobile()) { ?>
	    <script type="text/javascript">
	    	window.onscroll = function() {crollFunction()};

			var header = document.getElementById("crollMenu");
			var footer = document.getElementById("bsnavMobileCroll");
			var sticky = header.offsetTop;
			if (window.pageYOffset < sticky) {
			  		header.classList.add("userMenuArea");
			}
			function crollFunction() {
			   	if (window.pageYOffset > sticky) {
			    	header.classList.add("userMenuArea");
			    	footer.classList.add("bsnavFooterMenu");

			  	} else {
			    	header.classList.remove("userMenuArea");
			    	footer.classList.remove("bsnavFooterMenu");
			  	}
			}
	    </script>
		<?php } ?>
	    <script type="text/javascript">
	    	$(function(){
	    		$(".btn_Contactus_sm").click(function(){
	    			$("#send_estate_title").submit();
	    		});
	    	});
	    </script>
	</body>

</html>