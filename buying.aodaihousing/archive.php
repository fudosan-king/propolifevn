<?php get_header();?>

<?php 
if (is_archive()){
	?>

	<main>
		<section class="content-page">
			<div class="container">
				<div class="row">
					<div class="col col-12">
						<?php 
						if(have_posts()):
							while(have_posts()): the_post();
								$thumnailImage = wp_get_attachment_image_url( get_post_thumbnail_id(), $size = 'large', $icon = false );
								?>

								<h3 class="sub_title"><?php the_title(); ?></h3>

								<div id="main-content">
									<div>
										<a href="#" class="date_post"><?php the_time(); ?></a>
									</div>
									<div class="img_feature">
										<img class="img-fluid" src="<?php echo $thumnailImage; ?>"></img>
									</div>
									<?php the_excerpt(); ?>
									
								</div>

								<?php
							endwhile;
						else:
							?>
								<p>Posts not found.</p>
							<?php
						endif;
						?>
					</div>
				</div>
			</div>
		</section>
	</main>


	<?php
}
?>

<?php get_footer();?>