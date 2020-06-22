<?php
/*Template Name: Interior Construction - Page Template*/
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>

<section class="main_content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<!-- INTRO CONTENT -->
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

				<!-- CONSTRUCTION GALLERY -->
				<?php 
				if (have_rows('construction_content')):
					while (have_rows('construction_content')): the_row();
						echo '<div class="list_construction_cases">
						<h3 class="title_sub">'.get_sub_field('construction_block_title').'</h3>';

						$gallery = get_sub_field('construction_block_gallery');
						if (!empty($gallery)):
							echo '<div class="row">
							<div class="col-lg-12">
							<div class="gal">';
							foreach($gallery as $img){
								echo '<a data-fancybox="gallery" href="'.$img['url'].'"><img src="'.$img['url'].'" alt="" class="img-responsive"></a>';
							}
							echo '</div>
							</div>
							</div>';
						endif;

						echo '</div>';
					endwhile;
				endif;
				?>
				
			</div>              
		</div>

	</div>


</section>

<!-- NOTE CONTENT -->
<?php 
	if (have_rows('note_content')):
		$group = get_field('note_content');
		$note_title = $group['note_title'];
		$note_vs_text = $group['note_vs_text'];
		echo '<section class="proposal">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h3>'.$note_title.'</h3>
				<h4>'.$note_vs_text.'</h4>
			</div>
		</div>
	</div>
</section>';
	endif;
 ?>

 <!-- STEP CONTENT -->
 <?php 
 if (have_rows('step_content')):
 	$group = get_field('step_content');
 	$step_block_title = $group['step_block_title'];
 	$step_block_repeater = $group['step_block_repeater'];


 	echo '<section class="contract_construction">
 	<div class="container">
 	<div class="row">
 	<h3 class="text-center">'.$step_block_title.'</h3>';

 	foreach($step_block_repeater as $index => $field){
 		echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="contract_construction_box">
					<h4>'.++$index.". ".$field['step_title'].'</h4>
					<p>'.$field['step_text'].'</p>
				</div>
			</div>';
 	}
 	echo '		</div>
 	</div>
 	</section>';

 endif;
 ?>


			


<!-- SALE SERVICE -->
<?php get_template_part( 'template-parts/page/sale', 'service' ); ?>

<?php get_footer(); ?>