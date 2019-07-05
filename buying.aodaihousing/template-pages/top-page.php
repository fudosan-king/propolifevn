<?php 
/* Template Name: TOP - Page Template */
?>
<?php get_header(); ?>
<section class="banner">
	<div class="carousel" data-flickity='{ "autoPlay": 3000, "selectedAttraction": 0.01, "friction": 0.15 }'>
		<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/twilight.jpg" alt="" class="img-fluid"></div>
	  	<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416roma.jpg" alt="" class="img-fluid"></div>
	  	<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416infiniti.jpg" alt="" class="img-fluid"></div>
	  	<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416alphahill.jpg" alt="" class="img-fluid"></div>
	  	<div class="carousel-cell"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/0416richlane.jpg" alt="" class="img-fluid"></div>
	</div>
	<div class="caption">
		<div class="caption_content">
			<h1 data-aos="fade-down"><?php echo get_field('content_top_page')['content_slider'][0]['content']; ?><span><?php echo get_field('content_top_page')['content_slider'][1]['content']; ?></span></h1>
			<p class="d-none d-sm-block" data-aos="fade-up">
				<span class="blue"><?php echo get_field('content_top_page')['content_slider'][2]['content']; ?></span>
				<span class=""><?php echo get_field('content_top_page')['content_slider'][3]['content']; ?>
				<span></span>
				<?php echo get_field('content_top_page')['content_slider'][4]['content']; ?>
				<span></span>
				<span class="oranges"><?php echo get_field('content_top_page')['content_slider'][5]['content']; ?></span><br>
			</p>
			<P class="d-none d-sm-block" data-aos="fade-up" style="padding-top: 20px;"><?php echo get_field('content_top_page')['content_slider'][6]['content']; ?></P>
			<p class="d-block d-sm-none"><span class="blue"><?php echo get_field('content_top_page')['content_slider'][2]['content']; ?></span><span class=""><?php echo get_field('content_top_page')['content_slider'][3]['content']; ?></span><br><?php echo get_field('content_top_page')['content_slider'][4]['content']; ?><span class="oranges"><?php echo get_field('content_top_page')['content_slider'][5]['content']; ?></span><br><span><?php echo get_field('content_top_page')['content_slider'][6]['content']; ?></span></p>
		</div>
	</div>
	<div class="arrow_banner"></div>
</section>

<main>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="headline" data-aos="fade-right"><span><?php echo get_field('content_top_page')['marketing_title']; ?></span></h2>
			</div>
		</div>
	</div>
	<section id="section_projects" class="section_projects">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="projects_content">
						<h2 data-aos="fade-up" data-aos-duration="2000"><?php echo get_field('content_top_page')['project_tilte'][0]['content']; ?></h1>
						<hr class="bookends">
						<h3 data-aos="fade-up" data-aos-duration="3000"><?php echo get_field('content_top_page')['project_tilte'][1]['content']; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section_pro_item">
		<div class="container">
			<?php get_template_part( 'template-parts/homes/block', 'saleestate' ); ?>
		</div>
	</section>
	<section class="section_banner">
      	<div class="container">
          	<div class="row">
              	<div class="col-6 col-md-3 mb-3 mb-md-0">
                  	<a href="http://aodaihousing.com/ja/" target="_blank"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/banner_aodai.jpg" alt="" class="img-fluid"></a>
              	</div>
              	<div class="col-6 col-md-3 mb-3 mb-md-0">
                  	<a href="http://www.propolifevietnam.com/" target="_blank"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/banner_propoplife.jpg" alt="" class="img-fluid"></a>
              	</div>
              	<div class="col-6 col-md-3 mb-3 mb-md-0">
                  	<a href="http://www.lotusservice-vn.com/" target="_blank"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/banner_lotus.jpg" alt="" class="img-fluid"></a>
              	</div>
              	<div class="col-6 col-md-3 mb-3 mb-md-0">
                  	<a href="http://ameblo.jp/aozaihousing/" target="_blank"><img src="<?php Uri::the_assets_uri(); ?>/images/1x/banner_staffblog.jpg" alt="" class="img-fluid"></a>
              	</div>
          	</div>
      	</div>
  	</section>
</main>
<?php get_footer();?>