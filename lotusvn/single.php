<?php get_header(); ?>

<?php 
if (have_posts()):
	while(have_posts()): the_post();
		switch ($post->post_type) {
			case 'news_obj':
				get_template_part('template-parts/post/single', 'news');
				break;
			case 'construction_obj':
				get_template_part('template-parts/post/single', 'construction');
			default:
				# code...
				break;
		}
	endwhile;
endif;
?>

<?php get_footer(); ?>
