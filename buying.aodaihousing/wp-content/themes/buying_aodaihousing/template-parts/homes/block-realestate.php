<?php
	$args = array(
		// Type & Status Parameters
		'post_type'   => 'sale-estates',
		'post_status' => 'publish',

		// Order & Orderby Parameters
		'order'               => 'ASC',
		'orderby'             => 'ID',
	);

	$query = new WP_Query( $args );

	if($query->have_posts()):
	 	$index = 1;
	 	echo '<div class="row">';
		while($query->have_posts()): $query->the_post();
			$thumbnailURL = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), $size = 'origin', $icon = false );
	?>		<h1><?php echo str_replace(substr(get_field('comment_1'), 81, 500), "...", get_field('comment_1')); ?></h1>
			<div class="col-12 col-sm-6 col-md-6 col-lg-4">
				<div class="pro_item" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
					<h4><?php the_title(); ?></h4>
					<div class="pro_item_img">
						<span class="label">残り<?php the_field('remaining'); ?>棟</span>
						<a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo $thumbnailURL; ?>" alt="" class="img-fluid"></a>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="text_cover"><?php echo str_replace(substr(get_field('comment_1'), 81, 1000), " ...", get_field('comment_1')); ?></a>
					</div>
					<div class="pro_item_info">
						<div class="row">
							<div class="col-3 col-sm-3">
								<p><span class="">所在地</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><span><?php the_field('address'); ?></span></p>
							</div>
							<div class="col-3 col-sm-3">
								<p><span class="">交通</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><span><?php the_field('traffic'); ?></span></p>
							</div>
							<div class="col-3 col-sm-3">
								<p><span class="">築年数</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><?php the_field('build_date'); ?></p>
							</div>
							<div class="col-3 col-sm-3">
								<p><span class="">延べ床面積</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><p><?php the_field('floor_surface'); ?></p></p>
							</div>
							<div class="col-3 col-sm-3">
								<p><span class="">敷地面積</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><p><?php the_field('site_area'); ?></p></p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>404 Estates not found.</p>
	<?php endif; 
	// Reset Post Data
 	wp_reset_postdata();
?>