<?php
/**
Template Name: FactoryPage
*/
?>

<?php
$lang = get_bloginfo('language');
$template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
?>

<?php
    add_action( 'wp_head_customer', 'add_font_lemon', 0);
    get_header();
?>
<style type="text/css">
.video-youtube iframe {
	height: 600px;
}
@media (max-width: 992px) {
	.video-youtube iframe {
		height: 420px;
	}
}
@media (max-width: 767px) {
	.video-youtube iframe {
		height: 280px;
	}
}
</style>
<div class="wood-bg other-block">
<div class="container">
<div class="row">
<div class="col-lg-12" align="center">
<h3 style="font-size:35px;margin-bottom:30px;text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.51);font-family: 'Lemon', cursive;"><?php echo get_the_title(316);?></h3>
</div>

</div>
</div>
</div>


<div class="container">
<div class="row" style="margin-top:30px;">
<div class="video-youtube">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
<iframe title="YouTube video player" class="youtube-player" type="text/html" width="100%" src="https://www.youtube.com/embed/hBAWgY_ofkM?autoplay=1" frameborder="0" allowFullScreen></iframe>
</div>
</div>
</div>
</div>



<div align="center" style="margin-top:15px">
<?php
while ( have_posts() ) : the_post();
the_content();
endwhile;
?>
</div>



<?php get_footer(); ?>