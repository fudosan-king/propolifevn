<?php 
	$img = null;
	$title = '';

	if (is_page()){
		$img = get_field('banner_sub_bg_image');
		$title = get_the_title();
	}

	if (is_single()){
		switch ($post->post_type) {
			case 'news_obj': {
				$page_info = get_page_by_path('news');
				$img = get_field('banner_sub_bg_image', $page_info);
				$title = $page_info->post_title;
			}
				break;

			case 'construction_obj': {
				$page_info = get_page_by_path('interior_work');
				$img = get_field('banner_sub_bg_image', $page_info);
				$title = $page_info->post_title;
			}
				break;
			
			default:
				# code...
				break;
		}
	}
?>
<section class="banner_sub">
	<div class="swiper-container">
		<div class="parallax-bg" style="background-image:url('<?php echo $img['url']; ?>')" data-swiper-parallax="-23%"></div>
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="title" data-swiper-parallax="-300"><?php echo $title; ?></div>
			</div>
		</div>
	</div>
</section>