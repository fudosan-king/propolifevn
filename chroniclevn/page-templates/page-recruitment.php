<?php
/*Template Name: Recruitment - Page Template*/
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>

<section class="main_content">
	<div class="container recruitment_page">
		<?php 
		if (have_posts()):
			while(have_posts()): the_post();
				the_content();
			endwhile;
		endif;
		 ?>
	</div>
</section>

<?php get_footer(); ?>