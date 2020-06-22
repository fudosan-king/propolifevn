<?php
/*Template Name: Interior Work - Page Template*/
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>

<section class="main_content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<?php 
				if (have_rows('intro_content')):
					while(have_rows('intro_content')) : the_row();
						$img = get_sub_field('intro_block_image');
						?>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="box_info_general">
									<img src="<?php echo $img['url']; ?>" alt="" class="img-responsive">
									<h3><?php the_sub_field('intro_block_title'); ?></h3>
									<?php the_sub_field('intro_block_text'); ?>
								</div>
							</div>
						</div>
						<?php
					endwhile;
				endif;
				?>

				<?php 
					 	/*
						 * The WordPress Query class.
						 *
						 * @link http://codex.wordpress.org/Function_Reference/WP_Query
						 */
					 	$args = array(


							// Type & Status Parameters
					 		'post_type'   => 'construction_obj',
					 		'post_status' => 'publish',

							// Order & Orderby Parameters
					 		'order'               => 'DESC',
					 		'orderby'             => 'date',

							// Pagination Parameters
					 		'posts_per_page'         => -1,
							// 'posts_per_archive_page' => 10,
							// 'nopaging'               => false,
							// 'paged'                  => get_query_var( 'paged' ),
							// 'offset'                 => 3,

							// Permission Parameters -
					 		'perm' => 'readable',

							// Parameters relating to caching
					 		'no_found_rows'          => false,
					 		'cache_results'          => true,
					 		'update_post_term_cache' => true,
					 		'update_post_meta_cache' => true,

					 	);

					 	$query = new WP_Query( $args );

					 	if ($query->have_posts()):
					 		echo '<div class="list_construction_cases">
					 		<h3 class="title_sub">'.get_field('construction_content_title').'</h3>

					 		<div class="row">';
					 		while($query->have_posts()): $query->the_post();
					 			$imgUrl = wp_get_attachment_image_url( get_post_thumbnail_id( $post->ID ), $size = 'large', $icon = false );
					 			?>
					 			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 construction_cases_item">
					 				<figure class="snip1205 blue">
					 					<img src="<?php echo $imgUrl; ?>" alt="" class="img-responsive">
					 					<i class="fa fa-link" aria-hidden="true"></i>
					 					<a href="<?php the_permalink(); ?>" target="_blank"></a>
					 				</figure>
					 				<div class="show_text">
					 					<h5><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h5>
					 				</div>
					 			</div>
					 			<?php

					 		endwhile;

					 		wp_reset_query();
					 		wp_reset_postdata();

					 		echo '</div>
					 		</div>';
					 	endif;

					 	?>

					 </div>
					</div>
				</div>

				<?php 

				if (have_rows('service_content')):
					while(have_rows('service_content')): the_row();
						?>
						<section class="interior_work">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<h3><?php echo get_sub_field('service_block_big_title'); ?></h3>
										<h4><?php echo get_sub_field('service_block_small_title'); ?></h4>
										<p><?php echo get_sub_field('service_block_description'); ?></p>
									</div>
								</div>
							</div>
						</section>
						<?php
						$gallery = get_sub_field('service_block_gallery');
						if (!empty($gallery)):
							?>
							<section class="gallery_interior_work">
								<div class="container">
									<div class="row">
										<div class="col-lg-12">
											<div class="swiper_gallery_interior_work">
												<div class="swiper-container">
													<div class="swiper-wrapper">
														<?php 
														foreach ($gallery as $img){
															echo '<div class="swiper-slide">
															<a data-fancybox="gallery" href="'.$img['url'].'"><img src="'.$img['url'].'" alt="" class="img-responsive"></a>
															</div>';
														}
														?>
													</div>
													<!-- Add Arrows -->
													<div class="swiper-button-next swiper-button-white"></div>
													<div class="swiper-button-prev swiper-button-white"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<?php
						endif;
					endwhile;
				endif;

				?>



			</section>

			<?php 
			if (have_rows('free_service_content')):
				while(have_rows('free_service_content')): the_row();
					echo '<section class="services">
					<div class="container">
					<div class="row">
					<h3>'.get_sub_field('free_service_block_title').'</h3>';
					if (have_rows('free_service_child_content')):
						$count = 0;
						while(have_rows('free_service_child_content')): the_row();
							$count++;
							$imgUrl = get_sub_field('free_service_cbl_image')['url'];
							?>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 services_item">
								<img src="<?php echo $imgUrl; ?>" alt="" class="img-responsive">
								<h4><?php printf('%02d. %s', $count, get_sub_field('free_service_cbl_title')); ?></h4>
								<p><?php echo get_sub_field('free_service_cbl_description') ?></p>
							</div>
							<?php
						endwhile;
					endif;
				endwhile;
				echo '	</div>
				</section>';
			endif;
			?>

			<!-- SALE SERVICE -->
			<?php 
				get_template_part( 'template-parts/page/sale', 'service' ); 

			?>

			<!-- CONTACT LINK -->
			<?php 
				if (!empty(get_field('contact_link'))):
					echo '<div align="center"><a href="'.get_field('contact_link')['url'].'" class="btn btn-lg btnContact" target="'.get_field('contact_link')['target'].'">
				<i class="fa fa-envelope" aria-hidden="true"></i> '.get_field('contact_link')['title'].' <span class="arrow_right"></span>
			</a></div>';
				endif;
			 ?>

			<?php get_footer(); ?>