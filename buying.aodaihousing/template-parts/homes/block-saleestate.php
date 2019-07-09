<?php
	$args = array(
		// Type & Status Parameters
		'post_type'   => 'sale-estates',
		'post_status' => 'publish',
		// Pagination Parameters
		//'posts_per_page' => 3,
		// Order & Orderby Parameters
		'order'               => 'ASC',
		'orderby'             => 'ID',
		// get the current page
		//'paged' => get_query_var('paged'),
	);

	$query = new WP_Query( $args );

	if($query->have_posts()):
	 	$index = 1;
	 	echo '<div class="row">';
		while($query->have_posts()): $query->the_post();
			$thumbnailURL = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), $size = 'origin', $icon = false );
			if(get_field('status') == 'sale'):
				$info_estates = get_field('estates_info');
				$feature_and_comment_estate = get_field('feature_and_comment_estate');
	?>	
			<div class="col-12 col-sm-6 col-md-6 col-lg-4">
				<div class="pro_item" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
					<h4><?php the_title(); ?></h4>
					<div class="pro_item_img">
						<a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo $thumbnailURL; ?>" alt="" class="img-fluid"></a>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="text_cover"><?php echo str_replace(substr($feature_and_comment_estate['description'], 81, 1000), " ...", $feature_and_comment_estate['description']); ?></a>
					</div>
					<div class="pro_item_info">
						<div class="row">
							<div class="col-3 col-sm-3">
								<p><span class="">所在地</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><span><?php echo $info_estates['address'] ?></span></p>
							</div>
							<div class="col-3 col-sm-3">
								<p><span class="">販売状況</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><span><?php echo $info_estates['traffic'] ?></span></p>
							</div>
							<div class="col-3 col-sm-3">
								<p><span class="">竣工</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><?php echo $info_estates['age'] ?></p>
							</div>
							<div class="col-3 col-sm-3">
								<p><span class="">開発業者</span></p>
							</div>
							<div class="col-9 col-sm-9">
								<p><?php echo $info_estates['site_area'] ?></p>	
							</div>
						</div>						
					</div>
					<div class="pro_item_btn">
						<a href="<?php echo esc_url(get_permalink()); ?>">
							<span>詳細を見る</span>
						</a>
					</div>
					<div class="pro_item_space"></div>
				</div>
			</div>
			<?php endif; ?>
		<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>現在、不動産は売却されていません !</p>
	<?php endif; 
	// Reset Post Data
 	wp_reset_postdata();
?>