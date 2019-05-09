<?php 
/* Template Name: TOP - Page Template */
?>
<?php get_header(); ?>
<section class="banner">
	<div class="carousel" data-flickity>
		<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416sunshine.jpg" alt="" class="img-fluid"></div>
	  	<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416roma.jpg" alt="" class="img-fluid"></div>
	  	<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416infiniti.jpg" alt="" class="img-fluid"></div>
	  	<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416alphahill.jpg" alt="" class="img-fluid"></div>
	  	<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416richlane.jpg" alt="" class="img-fluid"></div>
	</div>
	<div class="caption">
		<div class="caption_content">
			<h1 data-aos="fade-down">ベトナム不動産投資をリーガルに<span>in Ho Chi Minh city</span></h1>
			<!-- <p><span class="blue">リーガルリスクヘッジ</span>と資産運用を<span class="oranges">サポート</span></p> -->
			<p class="d-none d-sm-block" data-aos="fade-up"><span class="blue">リーガル</span><span class="">リスクヘッジ</span>と資産運用を<span class="oranges">サポート</span></p>
			<p class="d-block d-sm-none"><span class="blue">リーガル</span><span class="">リスクヘッジ</span>と<br>資産運用を<span class="oranges">サポート</span></p>
		</div>
	</div>
	<div class="arrow_banner"></div>
</section>

<main>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="headline" data-aos="fade-right"><span>「賃貸の集客・管理」ができる売買仲介企業</span></h2>
			</div>
		</div>
	</div>
	<section class="section_projects">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="projects_content">
						<h2 data-aos="fade-up" data-aos-duration="2000">取り扱い中のプロジェクト</h1>
						<hr class="bookends">
						<h3 data-aos="fade-up" data-aos-duration="3000">Condominiums & Aodaihousing</h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section_pro_item">
		<div class="container">
			<?php get_template_part( 'template-parts/homes/block', 'realestate' ); ?>
		</div>
	</section>
</main>
<?php get_footer();?>