<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>
<?php get_template_part( 'template-parts/page/top', 'bread_crumb' ); ?>

<?php 
if (have_posts()):
	while (have_posts()): the_post();
		?>
		<section class="main_content">
			<div class="container">
				<div class="row content_underpages">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php the_content(); ?>
					</div>
				</div>

				<hr>
				<p class="text-center w_btnInquiry">
					<?php if (!empty(get_field('contact_link'))): ?>
						<a href="<?php echo get_field('contact_link')['url'] ?>" class="btn-0"><i class="fa fa-question-circle-o fa-lg" aria-hidden="true" target='<?php echo get_field('contact_link')['target'] ?>'></i><?php echo get_field('contact_link')['title']; ?></a>
					<?php endif; ?>
				</p>

				<div class="section_contact">
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<?php
							if (have_rows('phone_list_map')):
								$arr = phone_title_map();
								$arrToMap = array_column($arr, 'phone_number', 'phone_name' );

								echo '<p class="text-center">';
								while (have_rows('phone_list_map')): the_row();
									$phoneTitle = get_sub_field('phone_list_map_title');
									echo $phoneTitle.'<a href="tel:'.$arrToMap[$phoneTitle].'">'.$arrToMap[$phoneTitle].'</a><br>';
								endwhile;
								echo '</p>';
							endif;
							?>
						</div>
					</div>
				</div>

			</div>
		</section>
		<?php
	endwhile;
endif;
?>


<?php get_footer(); ?>