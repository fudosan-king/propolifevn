<?php
/*Template Name: Services - Page Template*/
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>

<section class="main_content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="list_construction_cases">
					<h3 class="title_sub"><?php the_title(); ?></h3>
					
					<!-- TIMELINE CONTENT -->
					<?php 
					if (have_rows('timeline_content')):
						echo '<div class="row">
						<div class="col-lg-12">
						<div id="timeline">';

						$count = 0;
						while(have_rows('timeline_content')): the_row();
							$count++;
							?>
							<div class="timeline-item">
								<div class="timeline-icon">
									<span><?php echo $count; ?></span>
								</div>
								<div class="timeline-content <?php echo $count % 2 == 0 ? 'right' : ''; ?>">
									<h2><?php echo get_sub_field('timeline_title'); ?></h2>
									<p><?php echo get_sub_field('timeline_text'); ?></p>
								</div>
							</div>
							<?php
						endwhile;
						echo '</div>
						</div>
						</div>';
					endif;
					?>

					<!-- SPECIALIZED CONTENT -->

					<?php 
					if (have_rows('specialized_content')):
						echo '<div class="row">';
						while(have_rows('specialized_content')): the_row();
							$img = get_sub_field('specialized_img');
							$page_obj = get_sub_field('specialized_page');
							?>
							<div class="col-lg-6">
								<a href="<?php the_permalink( $page_obj ); ?>" target="_blank">
									<div class="media" style="background-color:#323232;color:#ffffff">
										<div class="media-left"><img src="<?php echo $img['url'] ?>" width="100" height="auto"></div>
										<div class="media-body" align="justify">
											<h5 class="media-heading" style="color:#ffffff;font-size:18px;"><?php echo $page_obj->post_title; ?></h5>
										</div>
									</div>
								</a>
							</div>
							<?php
						endwhile;
						echo '</div>';
					endif;
					?>

				</div>
			</div>
		</div>
	</div>
</section>

<!-- SALE SERVICE -->
<?php get_template_part( 'template-parts/page/sale', 'service' ); ?>



<?php get_footer(); ?>