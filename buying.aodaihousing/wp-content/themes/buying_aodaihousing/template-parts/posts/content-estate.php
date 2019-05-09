<?php
	$address = get_field('location'); 
	$apikey = 'AIzaSyAj--CqL_63WJXEcQBWzu6bgDcsOv6O7DA';
	$latLong = getLatLong($address, $apikey);
	// $latitude = $latLong['latitude']?$latLong['latitude']:'Not found';
	// $longitude = $latLong['longitude']?$latLong['longitude']:'Not found'; 
	if($post):
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
								<p class="d-flex"><span class="label_prices align-self-center">価格</span> <span class="prices align-self-center"><?php the_field('price'); ?></span></p>
								<p class="d-flex"><span class="label_prices label_meter align-self-center">㎡単価</span> <span class="prices align-self-center"><?php the_field('unit_price'); ?></span></p>
								<p class="d-flex"><span class="label_prices align-self-center">想定利回り</span> <span class="prices align-self-center"><?php the_field('expected_yield'); ?></span></p>
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<p class="address"><?php the_field('address'); ?></p>
						</div>
					</div>
				</div>

				<div class="carousel_detail">
					<div class="carousel carousel-main" data-flickity='{ "prevNextButtons": false, "pageDots": false }'>
						<?php foreach (get_field('gallegy_image') as $gallery_image) {
				  	echo'<div class="carousel-cell">';
				  		echo'<img src="'.$gallery_image['url'].'" alt="" class="img-fluid">';
				  	echo'</div>';
				  	} ?>
				</div>

				<div class="carousel carousel-nav"
				  data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
				  	<?php foreach (get_field('gallegy_image') as $gallery_image) {
				  	echo'<div class="carousel-cell">';
				  		echo'<img src="'.$gallery_image['url'].'" alt="" class="img-fluid">';
				  	echo'</div>';
				  	} ?>
				</div>
			</div>
			<p><?php the_field('comment_1') ?></p>
			<div class="row mt-5 row_info no-gutters">
				<div class="col-12 col-sm-6">
					<img src="<?php echo get_field('feature_image_1')['url']; ?>" alt="" class="img-fluid w-100">
				</div>
				<div class="col-12 col-sm-6">
					<div class="info_content">
						<h2><?php the_field('feature_title_1') ?></h2>
						<p><?php the_field('feature_comment_1') ?></p>
					</div>
				</div>
			</div>
			<div class="row row_info no-gutters">
				<div class="col-12 col-sm-6">
					<div class="info_content">
						<h2><?php the_field('feature_title_2') ?></h2>
						<p><?php the_field('feature_comment_2') ?></p>
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<img src="<?php echo get_field('feature_image_2')['url']; ?>" alt="" class="img-fluid w-100">
				</div>
			</div>
			
			<h2 class="text-center mt-5 mb-3"><?php the_field('government'); ?></h2>
			<div class="row row_info mb-3">
				<div class="col-6 col-sm-6">
					<img src="<?php echo get_field('feature_image_3')['url']; ?>" alt="" class="img-fluid w-100">
				</div>
				<div class="col-6 col-sm-6">
					<img src="<?php echo get_field('feature_image_4')['url']; ?>" alt="" class="img-fluid w-100">
				</div>
			</div>
			<p><?php the_field('comment_4'); ?></p>
			
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
						<?php 
							$maplink = 'https://maps.google.co.jp/maps?q='.$latLong['latitude'].','.$latLong['longitude'].'+('.$post->post_title.')&amp;z=14&amp;iwloc=B&amp;output=embed';
						?>
						<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $maplink ?>"></iframe>
					</div>
					<div class="col-12 col-sm-6">
						<p class="text-left"><?php the_field('location'); ?></p>
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
						<td><?php the_field('property_type'); ?></td>
						<th>㎡単価</th>
						<td><?php the_field('unit_price'); ?></td>
					</tr>
					<tr>
						<th>エリア</th>
						<td><?php the_field('area'); ?></td>
						<th>所在地</th>
						<td><?php the_field('address'); ?></td>
					</tr>
					<tr>
						<th>間取り</th>
						<td><?php the_field('floor_plan'); ?></td>
						<th></th>
						<td></td>
					</tr>
					<tr>
						<th>サービス</th>
						<td colspan="3"><?php the_field('service'); ?></td>
					</tr>
					<tr>
						<th>共有設備・施設</th>
						<td colspan="3"><?php the_field('shared_facilities'); ?></td>
					</tr>
					<tr>
						<th>交通</th>
						<td colspan="3"><?php the_field('traffic'); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>
<?php endif ?>
<?php wp_reset_postdata(); ?>