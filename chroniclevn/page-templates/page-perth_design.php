<?php
/*Template Name: Perth Design - Page Template*/
?>

<?php get_header(); ?>


<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>


<section class="main_content">
	<div class="container">
		
		<!-- INTRO POST CONTENT -->
		<?php 
			if (have_posts()):
				while (have_posts()): the_post();
					the_content();
				endwhile;
			endif;
		?>
		
		<!-- CAROUSEL CONTENT -->
		<?php 
			$carousel = get_field('carousel_content');
			if (!empty($carousel)):
				?>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2">
								<div class="slick_slider">
									<div class="slick_slider-for">
										<?php 
										foreach($carousel as $img)
											echo '<div><img data-lazy="'.$img['url'].'" alt="" class="img-responsive"></div>';
										?>
									</div>
									<div class="slick_slider-nav">
										<?php 
										foreach($carousel as $img)
											echo '<div><img data-lazy="'.$img['url'].'" alt="" class="img-responsive"></div>';
										?>
										
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<?php
			endif;
		?>

	</div>
</section>

<?php 
	if (have_rows('interior_demo_content')):
		$group = get_field('interior_demo_content');
		$interior_demo_title = $group['interior_demo_title'];
		$interior_demo_gallery = $group['interior_demo_gallery'];
		$interior_demo_text = $group['interior_demo_text'];
		$interior_demo_link = $group['interior_demo_link'];

		?>

		<section class="perth_design">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-12">
						<h3 class="title_sub"><?php echo $interior_demo_title ?></h3>
					</div>
				</div>
				<div class="row mt30 text-center">
					
					<!-- INTERIOR GALLERY CONTENT -->
					<?php 
					if (!empty($interior_demo_gallery)):
						foreach($interior_demo_gallery as $img){
							?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="gallery_img">
									<img src="<?php echo $img['url']; ?>" alt="" class="img-responsive">
									<i class="fa fa-search" aria-hidden="true"></i>
									<a data-fancybox="gallery" href="<?php echo $img['url']; ?>"></a>
								</div>
							</div>
							<?php
						}
					endif;
					?>
					
					

					<!-- INTERIOR TEXT CONTENT -->
					<?php 
						if (!empty($interior_demo_text)):
							echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
							echo $interior_demo_text;
							echo '</div>';
						endif;
					 ?>
					
					<!-- INTERIOR LINK CONTENT -->
					<?php 
						if (!empty($interior_demo_link)):
							echo '<a href="'.$interior_demo_link['url'].'" class="btn btn-lg btnContact" target="'.$interior_demo_link['target'].'">
						<i class="fa fa-envelope" aria-hidden="true"></i> '.$interior_demo_link['title'].' <span class="arrow_right"></span>
					</a>';
						endif;
					 ?>
					
				</div>
			</div>
		</section>

		<?php
	endif;
?>



<?php get_footer(); ?>