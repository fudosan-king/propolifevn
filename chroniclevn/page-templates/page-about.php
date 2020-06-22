<?php
/*Template Name: About - Page Template*/
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>

<section class="bread_crumb">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li>
						<a href="index.php">トップ</a>
					</li>
					<li class="active">プロポライフベトナム代表ご挨拶</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="main_content">
	<div class="container about_page">

		<!-- PROPOSAL CONTENT -->
		<?php 
		if (have_rows('proposal_content')):
			$group = get_field('proposal_content');
			$proposal_image = $group['proposal_image'];
			$proposal_image_title = $group['proposal_image_title'];
			$proposal_text = $group['proposal_text'];
			
			$imgUrl = wp_get_attachment_image_url( $proposal_image['ID'], $size = 'medium', $icon = false );
			?>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
					<div class="display_table boxmH">
						<div class="table_content">
							<div class="main_info">
								<img src="<?php echo $imgUrl; ?>" alt="" class="img-responsive">
								<p><small><?php echo $proposal_image_title; ?></small></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="display_table boxmH">
						<div class="table_content">
							<?php echo $proposal_text; ?>
						</div>
					</div>
				</div>
			</div>
			<?php

		endif;
		?>

		<!-- BUILDING CONTENT -->
		<?php 
		if (have_rows('building_content')):
			$group = get_field('building_content');
			$building_image = $group['building_image'];
			$building_image_title = $group['building_image_title'];
			$building_text = $group['building_text'];
			
			$imgUrl = wp_get_attachment_image_url( $building_image['ID'], $size = 'medium', $icon = false );
			?>
			<div class="box_about">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
						<div class="display_table boxmH">
							<div class="table_content">
								<img src="<?php echo $imgUrl; ?>" alt="" class="img-responsive img_center">
								<p class="mb0"><small><?php echo $building_image_title; ?></small></p>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<div class="display_table boxmH">
								<div class="table_content">
									<p><?php echo $building_text; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php

			endif;
			?>


			<!-- STAFF CONTENT -->
			<?php 
			if (have_rows('staff_content')):
				$group = get_field('staff_content');

				$staff_content_title = $group['staff_content_title'];
				$staff_content_choice = $group['staff_content_choice'];

				echo '<div class="row mb30">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3 class="title_sub">'.$staff_content_title.'</h3>';


				if (!empty($staff_content_choice)):
					echo '<div class="swiper_staff">
					<div class="swiper-container">
					<div class="swiper-wrapper">';

					foreach ($staff_content_choice as $obj){
						$imgUrl = wp_get_attachment_image_url( get_post_thumbnail_id( $obj->ID ), $size = 'full', $icon = false );
						?>

						<div class="swiper-slide">
							<a data-fancybox="gallery" href="<?php echo $imgUrl; ?>"><img src="<?php echo $imgUrl; ?>" alt="" class="img-responsive"></a>
						</div>

						<?php
					}

					echo '</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-white"></div>
					<div class="swiper-button-prev swiper-button-white"></div>
					</div>
					</div>';
				endif;

				echo '</div>
				</div>';

			endif;
			?>


			<!-- PROFILE CONTENT -->
			<?php 
			if (have_rows('profile_content')):
				$group = get_field('profile_content');
				$profile_content_title = $group['profile_content_title'];
				$general_addition_info = $group['profile_content_info'];
				
				$profile_group = get_field('company_profile', $general_addition_info->ID);


				?>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h3 class="title_sub"><?php echo $profile_content_title; ?></h3>
						<table class="table table-condensed table_about">
							<thead>
								<tr>
									<th width="30%">会社名</th>
									<th><p><?php echo $profile_group['company_name']; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>代表者</td>
										<td><?php echo $profile_group['company_representative']->post_title;  ?></td>
									</tr>
									<tr>
										<td>住所</td>
										<td><?php echo $profile_group['company_address']; ?></td>
									</tr>
									<tr>
										<td>業務内容</td>
										<td>
											<?php echo $profile_group['company_bussiness']; ?>
										</td>
									</tr>
									<tr>
										<td>資本金</td>
										<td><?php echo $profile_group['company_investment']; ?></td>
									</tr>
									<tr>
										<td>社員数</td>
										<td><?php echo $profile_group['quantity_employee']; ?></td>
									</tr>
									<tr>
										<td>加入団体</td>
										<td><?php echo $profile_group['subscription_group']; ?></td>
									</tr>
									<tr>
										<td>運営Website </td>
										<td>
											<?php 
											$operation_website = $profile_group['operation_website'];
											if (!empty($operation_website)):
												echo '<p>';
												foreach ($operation_website as $link){
													$operation_website_links = $link['operation_website_links'];
													echo $operation_website_links['title']."<br>";
													echo '<a href="'.$operation_website_links['url'].'" target="'.$operation_website_links['target'].'">'.$operation_website_links['url'].'</a><br>'
													?>


													<?php
												}
												echo '</p>';
											endif;
											?>

										</td>
									</tr>
									<tr>
										<td>E-mail</td>
										<td><a href="mailto:<?php echo $profile_group['company_email']; ?>"><?php echo $profile_group['company_email']; ?></a></td>
									</tr>
									<tr>
										<td>営業時間</td>
										<td>
											<p><?php echo $profile_group['working_time'] ?></p>
										</td>
									</tr>
									<tr>
										<td>関連会社/支店</td>
										<td>
											<?php 
											$company_branch = $profile_group['company_branch'];
											if (!empty($company_branch)):
												echo '<p>';
												foreach ($company_branch as $field){

													$company_branch_name = $field['company_branch_name'];
													$company_branch_address = $field['company_branch_address'];
													$company_branch_phone = $field['company_branch_phone'];


													echo '<b>'.$company_branch_name.'</b> <br>
													'.$company_branch_address.'<br>
													TEL: '.$company_branch_phone.'<br>';

													?>


													<?php
												}
												echo '</p>';
											endif;
											?>

										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<?php

				endif;
				?>



				<hr>
				
				<!-- CONTACT LINK -->
				<?php 
				if (have_rows('contact_link')):
					$contact_link = get_field('contact_link');
					echo '<p class="text-center w_btnInquiry">
					<a href="'.$contact_link['url'].'" class="btn-0" target="'.$contact_link['target'].'"><i class="fa fa-question-circle-o fa-lg" aria-hidden="true"></i>'.$contact_link['title'].'</a>
				</p>';
				endif;
				?>
				
				<!-- PHONE LIST MAP -->
				<?php
				if (have_rows('phone_list_map')):
					$arr = phone_title_map();
					$arrToMap = array_column($arr, 'phone_number', 'phone_name' );

					echo '<div class="section_contact">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
						<p class="text-center">';
					while(have_rows('phone_list_map')): the_row();
						$phoneTitle = get_sub_field('phone_list_map_title');
						echo  $phoneTitle.'<a href="tel:'.$arrToMap[$phoneTitle].'">'.$arrToMap[$phoneTitle].'</a><br>';
					endwhile;
					echo '</p>
					</div>
						</div>
					</div>';
				endif;
				?>
							

				</div>
			</section>

			<?php get_footer(); ?>