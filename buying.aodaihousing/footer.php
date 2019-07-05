			<?php get_template_part('template-parts/footers/content', 'footer'); ?> 
			<?php if (is_single() and $post->post_type == 'sale-estates'): ?>
			<a href="javascript:void(0);" class="btn btn_Contactus d-none d-sm-block"><span>お問い合わせ</span> <i class="fas fa-envelope fa-2x"></i></a>  
			<?php endif; ?>    
	    </div>

	    <?php get_template_part('template-parts/footers/content', 'jsfooter'); ?> 
	    <script type="text/javascript">
	    	$(function(){
	    		$(".btn_Contactus").click(function(){
	    			$("#send_estate_title").submit();
	    		});
	    	});
	    </script>
	</body>

</html>