<?php do_action('wp_get_archive'); ?>
<?php global $lienhe;$hl = explode(';',$lienhe['hotline']);?>
<footer class="doc-footer">
<div class="container">
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 center" align="center"><a href="<?php echo home_url();?>" class="logo-ft"><img src="http://www.propolifevietnam.com/wp-content/uploads/2016/01/logo-ft.png" class="img-responsive" /></a></div>
<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 center" align="center">
<div class="socials hidden-xs">
<a class="fa fa-facebook" href="<?php echo $lienhe['facebook'];?>" target="_blank"></a>
<a class="fa fa-twitter" href="<?php echo $lienhe['twitter'];?>" target="_blank"></a>
<a class="fa fa-google-plus" href="<?php echo $lienhe['gplus'];?>" target="_blank"></a>
</div>
<address><?php echo $lienhe['diachigmap'];?></address>
<ul>
<li><?php echo $hl[0];?></li>
<li><?php echo $hl[1];?></li>
</ul>
Copyright&nbsp;&copy;&nbsp;Propolife INC. ALL rights reserved.<span>2015</span>. <a href="http://propolife.co.jp" target="_blank">Privacy Policy</a>
</div>
<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs"></div>
</div>
</div>
<div class="back-top"></div>
<div class="modal fade bs-example-modal-sm" id="messageDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
</footer>
<script src="<?php bloginfo( 'template_directory' );?>/js/functions.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/js/jquery.simplr.smoothscroll.stellar.min.js"></script>
<script>
// jQuery(function($) {
// 	$.srSmoothscroll(
// 		{
// 			ease: 'easeOutQuart',
// 			step: 25,
//     		speed: 250
//     	}
// 	);
// 	$(window).load(function(){
// 	  $.stellar({responsive: true,horizontalScrolling: false});
// 	});
// });
</script>
<script src="<?php bloginfo( 'template_directory' );?>/js/validator.min.js"></script>
<script src="<?php bloginfo( 'template_directory' );?>/js/viewportchecker.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('.effect').css('opacity','0').viewportChecker({
	    classToAdd: 'visible animated fadeInUp',
	    offset:10
	   });
});
</script>
<?php if(is_page('lotus') || is_singular('lotus')){?>
<script type="text/javascript">
jQuery(function ($) {
	$('.clickable').on("click", function (e) {
		if ($(this).hasClass('panel-collapsed')) {
			// expand the panel
			$(this).parents('.toggle').find('.detail').slideDown();
			$(this).removeClass('panel-collapsed');
			$(this).find('i').removeClass('fa-plus-circle').addClass('fa-minus-circle');
		}
		else {
			// collapse the panel
			$(this).parents('.toggle').find('.detail').slideUp();
			$(this).addClass('panel-collapsed');
			$(this).find('i').removeClass('fa-minus-circle').addClass('fa-plus-circle');
		}
	});
});
</script>
<?php } wp_footer();	?>
</body>
</html>
<?php ob_end_flush();?>