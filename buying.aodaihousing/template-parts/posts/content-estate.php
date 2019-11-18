<?php
	if($post):
		$info_estates = get_field('estates_info');
		$info_estates_detail = get_field('estates_info_detail'); 
		$gallegy = get_field('gallery_image');
		$feature_and_comment_estate = get_field('feature_and_comment_estate');
		//$apikey = 'AIzaSyAffKlhXHZXYWehQzLKHGMFmJVb7Nvgi0Y';
		$location = getLocationGoogleMap($info_estates['address'], $apikey);
?>
<section class="section_detail">
	<div class="container">
		<div class="row">
			<form action="<?php echo home_url().'/contact'; ?>" method="POST" id="send_estate_title" style="display:none;">
				<input type="text" name="estate_title" value="<?php echo $post->post_title; ?>">
			</form>
			<div class="col-12">
				<div class="box_topinfo">
					<div class="row text-center">
						<div class="col-12 col-sm-6 align-self-center">
							<div class="box_names">
								<h2><?php echo $post->post_title; ?></h2>
							</div>
						</div>
						<div class="col-12 col-sm-6 align-self-center">
							<div class="box_prices">
								<p class="d-flex"><span class="label_prices align-self-center">価格</span> <span class="prices align-self-center"><?php echo $info_estates_detail['price']; ?></span></p>
								<p class="d-flex"><span class="label_prices label_meter align-self-center">㎡単価</span> <span class="prices align-self-center"><?php echo $info_estates_detail['unit_price']; ?></span></p>
								<p class="d-flex"><span class="label_prices align-self-center">想定利回り</span> <span class="prices align-self-center"><?php echo $info_estates_detail['expected_yield']; ?></span></p>
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<p class="location"><?php echo $info_estates['address']; ?></p>
						</div>
					</div>
				</div>

				<div class="carousel_detail">
					<div class="carousel carousel-main" data-flickity='{ "prevNextButtons": false, "pageDots": false }'>
						<?php foreach ($gallegy as $gallery_image) {
				  	echo'<div class="carousel-cell">';
				  		echo'<img src="'.$gallery_image['url'].'" alt="" class="img-fluid">';
				  	echo'</div>';
				  	} ?>
				</div>

				<div class="carousel carousel-nav"
				  data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
				  	<?php foreach ($gallegy as $gallery_image) {
				  	echo'<div class="carousel-cell">';
				  		echo'<img src="'.$gallery_image['url'].'" alt="" class="img-fluid">';
				  	echo'</div>';
				  	} ?>
				</div>
			</div>
			<p><?php echo $feature_and_comment_estate['description']; ?></p>
			<div class="row mt-5 row_info no-gutters">
				<div class="col-12 col-sm-6">
					<img src="<?php echo $feature_and_comment_estate['image_1']['url']; ?>" alt="" class="img-fluid w-100 <?php if (!wp_is_mobile()) { echo 'h-340'; } ?>">
				</div>
				<div class="col-12 col-sm-6">
					<div class="info_content">
						<h2><?php echo $feature_and_comment_estate['feature_1']; ?></h2>
						<p><?php echo $feature_and_comment_estate['description_1']; ?></p>
					</div>
				</div>
			</div>
			<div class="row row_info no-gutters">
				<div class="col-12 col-sm-6">
					<div class="info_content">
						<h2><?php echo $feature_and_comment_estate['feature_2']; ?></h2>
						<p><?php echo $feature_and_comment_estate['description_2']; ?></p>
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<img src="<?php echo $feature_and_comment_estate['image_2']['url']; ?>" alt="" class="img-fluid w-100 <?php if (!wp_is_mobile()) { echo 'h-340'; } ?>">
				</div>
			</div>
			
			<h2 class="text-center mt-5 mb-3"><?php echo $feature_and_comment_estate['feature_3']; ?></h2>
			<div class="row row_info mb-3">
				<div class="col-6 col-sm-6">
					<img src="<?php echo $feature_and_comment_estate['image_3']['url']; ?>" alt="" class="img-fluid w-100 <?php if (wp_is_mobile()) { echo 'h-120'; } else { echo 'h-340'; } ?>">
				</div>
				<div class="col-6 col-sm-6">
					<img src="<?php echo $feature_and_comment_estate['image_4']['url']; ?>" alt="" class="img-fluid w-100 <?php if (wp_is_mobile()) { echo 'h-120'; } else { echo 'h-340'; } ?>">
				</div>
			</div>
			<p><?php echo $feature_and_comment_estate['description_3']; ?></p>
			
		</div>
		</div>
	</div>
</section>

<section class="section_map">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="map text-center">
				<h2>ロケーション</h2>
				<hr class="bookends">
				<div class="row w_map">
					<div class="col-12 col-sm-6">
						<iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php if ($info_estates['address']){echo $info_estates['address'];} else {echo 'CJ Building, 6 Lê Thánh Tôn, Bến Nghé ,Quận 1, Hồ Chí Minh, Việt Nam';} ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
					</div>
					<div class="col-12 col-sm-6">										
						<p><?php echo $feature_and_comment_estate['comment_location']; ?></p>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>

<section class="section_projectoverview">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2>プロジェクト概要</h2>
				<hr class="bookends">
				<table class="table-bordered table table-light table-striped table_projectoverview">
					<tr>
						<th width="20%">物件種別</th>
						<td><?php echo $info_estates_detail['property_type']; ?></td>
						<th>㎡単価</th>
						<td><?php echo $info_estates_detail['unit_price']; ?></td>
					</tr>
					<tr>
						<th>エリア</th>
						<td><?php echo $info_estates_detail['area']; ?></td>
						<th>所在地</th>
						<td><?php echo $info_estates['address']; ?></td>
					</tr>
					<tr>
						<th>間取り</th>
						<td><?php echo $info_estates_detail['floor_plan']; ?></td>
						<th></th>
						<td></td>
					</tr>
					<tr>
						<th>共有設備・施設</th>
						<td colspan="3"><?php echo $info_estates_detail['shared_facilities']; ?></td>
					</tr>
					<tr>
						<th>備考</th>
						<td colspan="3"><?php echo $info_estates_detail['service']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>
<?php endif ?>
<?php wp_reset_postdata(); ?>