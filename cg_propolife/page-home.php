<?php /* Template Name: PageHome */ ?>
<?php get_header(); ?>

<section class="section_general section_impresse" id="section_impresse">
	<div class="container">
		<div class="row">
			<?php if (have_rows('impresse')) {
				while (have_rows('impresse')) {
					the_row();
					$title = get_sub_field('title');
					$sub_title = get_sub_field('sub_title');
					$text = get_sub_field('text');
					$image = get_sub_field('image');
			?>
			<div class="col-12">
				<h2><?php echo $title; ?></h2>
				<p class="sub_title"><?php echo $sub_title; ?></p>
			</div>
			<div class="col-12 col-md-4 align-self-center">
				<div class="impresse_text">
					<p><?php echo $text; ?></p>
				</div>
			</div>
			<div class="col-12 col-md-8 align-self-center d-none d-md-block">
				<div class="impresse_img">
					<img src="<?php echo $image["url"]; ?>" alt="" class="img-fluid">
				</div>
			</div>
			<?php
				}
			}
			?>

		</div>
	</div>
</section>

<section class="section_general section_work" id="section_work">
	<div class="banner_work">
		<h2>Works</h2>
	</div>
	<div class="work_gallery">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="owl-carousel owl-theme owl_work_gallery d-none d-md-block">
					<?php if (have_rows('gallery')) {
						while (have_rows('gallery')) {
							the_row();
							$image_1 = get_sub_field('image_1');
							$group_2_4 = get_sub_field('group_2_4');
							$image_2 = $group_2_4['image_2'];
							$sub_group_3_4 = $group_2_4['sub_group_3_4'];
							$image_3 = $sub_group_3_4['image_3'];
							$image_4 = $sub_group_3_4['image_4'];
							$image_5 = get_sub_field('image_5');
							$group_6_8 = get_sub_field('group_6_8');
							$sub_group_6_7 = $group_6_8['sub_group_6_7'];
							$image_6 = $sub_group_6_7['image_6'];
							$image_7 = $sub_group_6_7['image_7'];
							$image_8 = $group_6_8['image_8'];
							$image_9 = get_sub_field('image_9');
							$group_10_12 = get_sub_field('group_10_12');
							$image_10 = $group_10_12['image_10'];
							$image_11 = $group_10_12['image_11'];
							$image_12 = $group_10_12['image_12'];
					?>
					<div class="item">
							<div class="work_gallery_content">
								<div class="row no-gutters">
		      					<div class="col-12 col-md-4">
			      					<div class="img_work_gallery">
			      						<figure class="snip1525">
			      							<img src="<?php echo $image_1['url']; ?>" alt="" class="img-fluid">
			      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
			      							<a href="<?php echo $image_1['url']; ?>" data-fancybox="gallery"></a>
			      						</figure>
		      						</div>
		      					</div>
		      					<div class="col-12 col-md-4">
		      						<div class="row no-gutters">
		      							<div class="col-12">
		      								<div class="img_work_gallery_sm">
					      						<figure class="snip1525">
					      							<img src="<?php echo $image_2['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_2['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
				      						</div>
		      							</div>
		      							<div class="col-6 col-md-6">
		      								<div class="img_work_gallery_sm">
		      									<figure class="snip1525">
					      							<img src="<?php echo $image_3['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_3['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
		      								</div>
		      							</div>
		      							<div class="col-6 col-md-6">
		      								<div class="img_work_gallery_sm">
			      								<figure class="snip1525">
					      							<img src="<?php echo $image_4['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_4['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
			      							</div>
		      							</div>
		      						</div>
		      					</div>
		      					<div class="col-12 col-md-4">
		      						<div class="img_work_gallery">
			      						<figure class="snip1525">
			      							<img src="<?php echo $image_5['url']; ?>" alt="" class="img-fluid">
			      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
			      							<a href="<?php echo $image_5['url']; ?>" data-fancybox="gallery"></a>
			      						</figure>
			      					</div>
		      					</div>

		      					<div class="col-12 col-md-4">
		      						<div class="row no-gutters">
		      							<div class="col-6 col-md-6">
		      								<div class="img_work_gallery_sm">
			      								<figure class="snip1525">
					      							<img src="<?php echo $image_6['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_6['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
			      							</div>
		      							</div>
		      							<div class="col-6 col-md-6">
		      								<div class="img_work_gallery_sm">
		      									<figure class="snip1525">
					      							<img src="<?php echo $image_7['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_7['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
		      								</div>
		      							</div>
		      							<div class="col-12">
		      								<div class="img_work_gallery_sm">
					      						<figure class="snip1525">
					      							<img src="<?php echo $image_8['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_8['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
				      						</div>
		      							</div>
		      						</div>
		      					</div>
		      					<div class="col-12 col-md-4">
		      						<div class="img_work_gallery">
			      						<figure class="snip1525">
			      							<img src="<?php echo $image_9['url']; ?>" alt="" class="img-fluid">
			      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
			      							<a href="<?php echo $image_9['url']; ?>" data-fancybox="gallery"></a>
			      						</figure>
			      					</div>
		      					</div>
		      					<div class="col-12 col-md-4">
		      						<div class="row no-gutters">
		      							<div class="col-6 col-md-6">
		      								<div class="img_work_gallery_sm">
			      								<figure class="snip1525">
					      							<img src="<?php echo $image_10['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_10['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
					      					</div>
					      					<div class="img_work_gallery_sm">
		      									<figure class="snip1525">
					      							<img src="<?php echo $image_12['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_12['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
				      						</div>
				      					</div>
				      					<div class="col-6 col-md-6">
		      								<div class="img_work_gallery">
					      						<figure class="snip1525">
					      							<img src="<?php echo $image_11['url']; ?>" alt="" class="img-fluid">
					      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
					      							<a href="<?php echo $image_11['url']; ?>" data-fancybox="gallery"></a>
					      						</figure>
				      						</div>
		      							</div>
		      						</div>
		      					</div>
		      				</div>
							</div>
						</div>

						<?php
						}
					}
					?>
					</div>

					<div class="owl-carousel owl-theme owl_work_gallery owl_work_gallery_sm d-block d-md-none">

					<?php if (have_rows('gallery')) {
						while (have_rows('gallery')) {
							the_row();
							$image_1 = get_sub_field('image_1');
							$group_2_4 = get_sub_field('group_2_4');
							$image_2 = $group_2_4['image_2'];
							$sub_group_3_4 = $group_2_4['sub_group_3_4'];
							$image_3 = $sub_group_3_4['image_3'];
							$image_4 = $sub_group_3_4['image_4'];
							$image_5 = get_sub_field('image_5');
							$group_6_8 = get_sub_field('group_6_8');
							$sub_group_6_7 = $group_6_8['sub_group_6_7'];
							$image_6 = $sub_group_6_7['image_6'];
							$image_7 = $sub_group_6_7['image_7'];
							$image_8 = $group_6_8['image_8'];
							$image_9 = get_sub_field('image_9');
							$group_10_12 = get_sub_field('group_10_12');
							$image_10 = $group_10_12['image_10'];
							$image_11 = $group_10_12['image_11'];
							$image_12 = $group_10_12['image_12'];
					?>
					<div class="item">
						<div class="work_gallery_content">
							<div class="row no-gutters">
	      					<div class="col-12">
		      					<div class="img_work_gallery">
		      						<figure class="snip1525">
		      							<img src="<?php echo $image_1['url']; ?>" alt="" class="img-fluid">
		      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
		      							<a href="<?php echo $image_1['url']; ?>" data-fancybox="gallery"></a>
		      						</figure>
	      						</div>
	      					</div>
	      					<div class="col-6">
	      						<div class="row no-gutters">
	      							<div class="col-12">
	      								<div class="img_work_gallery_sm">
				      						<figure class="snip1525">
				      							<img src="<?php echo $image_2['url']; ?>" alt="" class="img-fluid">
				      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
				      							<a href="<?php echo $image_2['url']; ?>" data-fancybox="gallery"></a>
				      						</figure>
			      						</div>
	      							</div>
	      							<div class="col-12">
	      								<div class="img_work_gallery_sm">
	      									<figure class="snip1525">
				      							<img src="<?php echo $image_3['url']; ?>" alt="" class="img-fluid">
				      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
				      							<a href="<?php echo $image_3['url']; ?>" data-fancybox="gallery"></a>
				      						</figure>
	      								</div>
	      							</div>
	      						</div>
	      					</div>
	      					<div class="col-6">
	      						<div class="img_work_gallery">
		      						<figure class="snip1525">
		      							<img src="<?php echo $image_4['url']; ?>" alt="" class="img-fluid">
		      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
		      							<a href="<?php echo $image_4['url']; ?>" data-fancybox="gallery"></a>
		      						</figure>
		      					</div>
	      					</div>
	      					</div>
						</div>
						</div><!-- end item -->
						<div class="item">
						<div class="work_gallery_content">
							<div class="row no-gutters">
	      					<div class="col-12">
		      					<div class="img_work_gallery">
		      						<figure class="snip1525">
		      							<img src="<?php echo $image_5['url']; ?>" alt="" class="img-fluid">
		      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
		      							<a href="<?php echo $image_5['url']; ?>" data-fancybox="gallery"></a>
		      						</figure>
	      						</div>
	      					</div>
	      					<div class="col-6">
	      						<div class="row no-gutters">
	      							<div class="col-12">
	      								<div class="img_work_gallery_sm">
				      						<figure class="snip1525">
				      							<img src="<?php echo $image_6['url']; ?>" alt="" class="img-fluid">
				      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
				      							<a href="<?php echo $image_6['url']; ?>" data-fancybox="gallery"></a>
				      						</figure>
			      						</div>
	      							</div>
	      							<div class="col-12">
	      								<div class="img_work_gallery_sm">
	      									<figure class="snip1525">
				      							<img src="<?php echo $image_7['url']; ?>" alt="" class="img-fluid">
				      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
				      							<a href="<?php echo $image_7['url']; ?>" data-fancybox="gallery"></a>
				      						</figure>
	      								</div>
	      							</div>
	      						</div>
	      					</div>
	      					<div class="col-6">
	      						<div class="img_work_gallery">
		      						<figure class="snip1525">
		      							<img src="<?php echo $image_8['url']; ?>" alt="" class="img-fluid">
		      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
		      							<a href="<?php echo $image_8['url']; ?>" data-fancybox="gallery"></a>
		      						</figure>
		      					</div>
	      					</div>
	      					</div>
						</div>
						</div><!-- end item -->
						<div class="item">
						<div class="work_gallery_content">
							<div class="row no-gutters">
	      					<div class="col-12">
		      					<div class="img_work_gallery">
		      						<figure class="snip1525">
		      							<img src="<?php echo $image_9['url']; ?>" alt="" class="img-fluid">
		      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
		      							<a href="<?php echo $image_9['url']; ?>" data-fancybox="gallery"></a>
		      						</figure>
	      						</div>
	      					</div>
	      					<div class="col-6">
	      						<div class="row no-gutters">
	      							<div class="col-12">
	      								<div class="img_work_gallery_sm">
				      						<figure class="snip1525">
				      							<img src="<?php echo $image_10['url']; ?>" alt="" class="img-fluid">
				      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
				      							<a href="<?php echo $image_10['url']; ?>" data-fancybox="gallery"></a>
				      						</figure>
			      						</div>
	      							</div>
	      							<div class="col-12">
	      								<div class="img_work_gallery_sm">
	      									<figure class="snip1525">
				      							<img src="<?php echo $image_11['url']; ?>" alt="" class="img-fluid">
				      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
				      							<a href="<?php echo $image_11['url']; ?>" data-fancybox="gallery"></a>
				      						</figure>
	      								</div>
	      							</div>
	      						</div>
	      					</div>
	      					<div class="col-6">
	      						<div class="img_work_gallery">
		      						<figure class="snip1525">
		      							<img src="<?php echo $image_12['url']; ?>" alt="" class="img-fluid">
		      							<figcaption><div><i class="i_zoom"></i></div></figcaption>
		      							<a href="<?php echo $image_12['url']; ?>" data-fancybox="gallery"></a>
		      						</figure>
		      					</div>
	      					</div>
	      					</div>
						</div>
						</div><!-- end item -->
						<?php
						}
					}
					?>

					</div>


				</div>
			</div>
		</div>
	</div>
</section>

<section class="section_general section_price" id="section_price">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Price</h2>
				<div class="w_box_price">
					<div class="row no-gutters">

						<?php if (have_rows('price')) {
							while (have_rows('price')) {
								the_row();
								$name = get_sub_field('name');
								$sub_name = get_sub_field('sub_name');
								$price = get_sub_field('price');
								$text = get_sub_field('text');
								$image = get_sub_field('image');
						?>
							<div class="col-12 col-md-4">
							<div class="box_price">
								<a href="javascript:void(0);" class="w_box_price_img"><img src="<?php echo $image['url']; ?>" alt="" class="img-fluid"></a>
								<h4><?php echo $name; ?></h4>
								<p><small><?php echo $sub_name; ?></small></p>
								<p class="box_price_des"><?php echo $text; ?></p>
								<div class="label_Price"><?php echo $price; ?></div>
							</div>
						</div>
						<?php
							}
						}
						?>

					</div>
				</div>

				<div class="row">
					<div class="col-12 col-md-11 mx-auto">
						<div class="box_download">
							<div class="row">
								<div class="col-12 col-md-6 align-self-center">
									<div class="box_download_img">
  									<img src="/wp-content/themes/cg_propolife/images/1x/DLdocument@2x.png" alt="" class="img-fluid">
  									<a class="btn btnDownload d-none d-md-block" href="https://propolife.s3-ap-northeast-1.amazonaws.com/3dmodeling_propolifevietnam.pdf">Down Load <i class="fal fa-angle-down fa-lg"></i></a>
									</div>
								</div>
								<div class="col-12 col-md-6 align-self-center">
									<h2>資料をダウンロードいただけます</h2>
									<p>バナーをクリックして頂きますと、PDF資料のダウンロードができます。 ぜひご覧くださいませ。 こちらの資料に載っているプラン以外にも個別にお見積りをさせて 頂いております。 お気軽にご相談下さい。</p>
									<p class="d-none d-md-block">Skype、Appear-inなどのウェブミーティングにも対応しております。</p>
									<a class="btn btnDownload d-block d-md-none" href="https://propolife.s3-ap-northeast-1.amazonaws.com/3dmodeling_propolifevietnam.pdf">Down Load <i class="fal fa-angle-down fa-lg"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>