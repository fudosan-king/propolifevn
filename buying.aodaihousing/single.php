<?php get_header(); ?>
	<main>
  		<div class="main_templates">
  			<?php 
  				global $post;
				$post = $wp_query->post;
				if($post->post_type == 'sale-estates'){
					get_template_part( 'template-parts/posts/content', 'estate');
				} 
				if($post->post_type == 'news'){
					get_template_part( 'template-parts/posts/content', 'news');
				}
  			?>
      	</div>
  	</main>
<?php get_footer();?>