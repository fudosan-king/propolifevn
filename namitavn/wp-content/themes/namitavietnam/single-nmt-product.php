<?php get_header(); ?>

<main class="main_content">

<?php

    while(have_posts()) : the_post();

      $images = get_field('product_images');
      $category = __('Undefined', 'namitavietnam');
      $vendor = __('Undefined', 'namitavietnam');

      if (has_term( '', 'nmt-category' )){
        $terms = wp_get_post_terms( $post->ID, 'nmt-category');
        $category = $terms[0]->name;
      }
      if (has_term( '', 'nmt-product-ven' )){
        $terms = wp_get_post_terms( $post->ID, 'nmt-product-ven');
        $vendor = $terms[0]->name;
      }
 ?>

    <section class="product_detail">
        <h2 class="title_sub"><span><?php the_title(); ?></span></h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="gallerys">
                    <div class="swiper-container gallery-top swiper-container-horizontal">
                        <div class="swiper-wrapper">

                            <?php
                                foreach($images as $img){
                                    ?>
                                        <div class="swiper-slide" style="background-image:url(<?php echo $img['url']; ?>)"></div>
                                    <?php
                                }
                            ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs swiper-container-horizontal">
                        <div class="swiper-wrapper">

                            <?php
                                foreach($images as $img){
                                    ?>
                                        <div class="swiper-slide" style="background-image:url(<?php echo $img['url']; ?>)"></div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <h3 class="title_red"><?php the_title(); ?></h3>
                    <p>* <?php echo get_post_meta($post->ID, 'product_no', true ); ?><br>

                  			<?php echo ($category != 'Undefined' && !empty($category)) ? '* '.$category.'<br>' : ''; ?>
                  			<?php echo ($vendor != 'Undefined' && !empty($vendor)) ? '* '.$vendor : ''; ?>
                    </p>
                    <div class="content mCustomScrollbar" data-mcs-theme="dark">

                        <?php
                          the_content();
                        ?>

                    </div>
                </div>



            </div>
        </div>
    </section>

<?php endwhile; ?>
</main>

<script type="text/javascript">
      //Initialize Swiper
      var galleryTop = [];
      var galleryThumbs = [];

      jQuery(".gallery-top").each(function(index, element){
          var $this = jQuery(this);
          galleryTop.push(new Swiper(this, {
              nextButton: '.swiper-button-next',
              prevButton: '.swiper-button-prev',
              spaceBetween: 10,
              loop: true,
              loopedSlides: 3
          }));
      });

      jQuery(".gallery-thumbs").each(function(index, element){
          var $this = jQuery(this);
          galleryThumbs.push(new Swiper(this, {
              spaceBetween: 10,
              slidesPerView: 3,
              centeredSlides: true,
              touchRatio: 0.2,
              loop: true,
              loopedSlides: 3,
              slideToClickedSlide: true
          }));
      });

      for (var i = 0; i < galleryTop.length; i++) {
        galleryTop[i].params.control = galleryThumbs[i];
        galleryThumbs[i].params.control = galleryTop[i];
      }
    </script>


<?php get_footer(); ?>
