<section class="banner">
	<div class="swiper-container">

		<?php 

		$banner_content = get_field('banner_content');
		$banner_mode = $banner_content['banner_mode'];


		switch ($banner_mode) {
			case 'parallax':
			parallax_slide($banner_content);
			break;

			default:
			normal_slide($banner_content);
			break;
		}
		?>

		<!-- Add Pagination -->
		<div class="swiper-pagination swiper-pagination-white"></div>
		<!-- Add Navigation -->
		<div class="swiper-button-prev swiper-button-white"></div>
		<div class="swiper-button-next swiper-button-white"></div>
	</div>
</section>


<?php 
function parallax_slide($banner_content){
	$parallax = $banner_content['parallax'];
	$background_image = $parallax['background_image'];
	$sub_content = $parallax['sub_content'];

	echo '<div class="parallax-bg" style="background-image:url(\''.$background_image['url'].'\')" data-swiper-parallax="-23%"></div>
	<div class="swiper-wrapper">';

	foreach ($sub_content as $field){
		echo '<div class="swiper-slide">';

		echo (!empty($field['title'])) ? '<div class="title" data-swiper-parallax="-300">'.$field['title'].'</div>' : '';
		echo (!empty($field['sub_title'])) ? '<div class="subtitle" data-swiper-parallax="-200">'.$field['sub_title'].'</div>' : '';
		echo (!empty($field['text'])) ? '<div class="text" data-swiper-parallax="-100"><p>'.$field['text'].'</p></div>' : '';

		echo '</div>';
	}

	echo '</div>';

}


function normal_slide($banner_content){
	$normal = $banner_content['normal'];

	if (!empty($normal)):
		echo '<div class="swiper-wrapper">';

		foreach ($normal as $field){
			$img = $field['banner_image'];
			?>
			<div class="swiper-slide">
				<?php if (!empty($field['banner_image_link'])): ?>
					<a target="<?php echo $field['banner_image_link']['target']; ?>" href="<?php echo $field['banner_image_link']['url']; ?>" title=""><img src="<?php echo $img['url']; ?>" alt="" class="img-responsive"></a>
				<?php else: ?>
					<img src="<?php echo $img['url']; ?>" alt="" class="img-responsive">
				<?php endif; ?>
			</div>
			<?php
		}

		echo '</div>';
	endif;
}
?>