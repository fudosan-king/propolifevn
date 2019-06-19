<?php
/*Template Name: Attraction - Page Template*/
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>
<?php get_template_part( 'template-parts/page/top', 'bread_crumb' ); ?>

<section class="main_content">
	<div class="container">
		<div class="row content_underpages">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php //the_content(); ?>
			</div>
		</div>

		<?php 
		$introduce_content = get_field('introduce_content');
		$special_content = $introduce_content['special_content'];
		$additional_content = $introduce_content['additional_content'];

		if (!empty($special_content)):
			foreach($special_content as $i => $field){

				echo '<div class="row attraction_row">';
				if ($i % 2 == 0){
					?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php echo $i == 0 ? 'sameify' : ''; ?>">
						<img src="<?php echo $field['image']['url']; ?>" alt="" class="img-responsive">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php echo $i == 0 ? 'sameify' : ''; ?>">
						<h3><?php echo $field['title']; ?></h3>
						<?php echo $field['content']; ?>
					</div>
					<?php
				}
				else{
					?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="display_table boxmH">
							<div class="table_content">
								<h3><?php echo $field['title']; ?></h3>
								<?php echo $field['content']; ?>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="display_table boxmH">
							<div class="table_content">
								<img src="<?php echo $field['image']['url']; ?>" alt="" class="img-responsive">
							</div>
						</div>
					</div>
					<?php
				}
				echo '</div>';
			}
		endif;

		if (!empty($additional_content)):
			echo '<div class="row attraction_row">';
			foreach($additional_content as $i => $field){
				?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
					<div class="draw">
						<?php echo $field['content']; ?>
					</div>
				</div>
				<?php
			}
			echo '<div class="clearfix"></div>
			</div>';
		endif;
		?>

				
				

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

	<?php get_footer(); ?>