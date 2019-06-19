<?php 

$addition_info = get_page_by_path( 'general_addition_info' );

if (have_rows('sale_service', $addition_info)):
	$group_content = get_field('sale_service', $addition_info);

	echo '<section class="sales_service">
	<div class="container text-center">
	<div class="row">';


	?>
	<div class="col-lg-12">
		<h3><?php echo $group_content['sale_service_title']; ?></h3>
		<h4><?php echo $group_content['sale_service_text']; ?></h4>
	</div>

	<?php
	$members_list = $group_content['sale_service_member_list'];
	if (!empty($members_list) && count($members_list)> 0):
		echo '<div class="col-lg-6 col-lg-offset-3">
		<div class="swiper_sales_service">
		<div class="swiper-container">
		<div class="swiper-wrapper">';

		foreach($members_list as $member){
			$mbObj = $member['sale_service_member'];
			$imgUrl = wp_get_attachment_image_url( get_post_thumbnail_id($mbObj->ID), $size = 'large', $icon = false );
		?>

		<div class="swiper-slide">
			<a href="#"><img src="<?php echo $imgUrl; ?>" alt="" class="img-responsive img-circle">
			</a>
			<h5><?php echo $mbObj->post_title; ?></h5>
		</div>

		<?php
		}

		echo '</div>
		</div>
		</div>
		</div>';
	endif;

	echo '		</div>
	</div>
	</section>';

endif;

?>