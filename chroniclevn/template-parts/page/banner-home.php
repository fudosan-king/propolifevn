<?php 

	if (have_rows('banner_content')):
		echo '<section class="banner">
				<div class="swiper-container">
					<div class="swiper-wrapper">';
		while(have_rows('banner_content')): the_row();
			$img = get_sub_field('banner_image');
			?>
				<div class="swiper-slide">
					<?php if (!empty(get_sub_field('banner_image_link'))): ?>
						<a target="<?php echo get_sub_field('banner_image_link')['target']; ?>" href="<?php echo get_sub_field('banner_image_link')['url']; ?>" title=""><img src="<?php echo $img['url']; ?>" alt="" class="img-responsive"></a>
					<?php else: ?>
						<img src="<?php echo $img['url']; ?>" alt="" class="img-responsive">
					<?php endif; ?>
				</div>
			<?php
		endwhile;
		echo '</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination swiper-pagination-white"></div>
		<!-- Add Navigation -->
		<div class="swiper-button-prev swiper-button-white"></div>
		<div class="swiper-button-next swiper-button-white"></div>
	</div>
</section>';
	endif;

?>