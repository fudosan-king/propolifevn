<?php

  $secHBanner = get_post_by_slug('home-banner');

  $imgSrc = null;

  if (has_post_thumbnail( $secHBanner->ID )){
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $secHBanner->ID ), 'full' );
    $imgSrc = $img[0];
  }

 ?>

<div class="banner">
  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-ms-6 col-xs-12 banner_text boxmH">
            <div class="banner_text_content">
              <h1><?php echo $secHBanner->post_title; ?></h1>
              <?php echo $secHBanner->post_content; ?>
              <div class="text_bellow_extras pc">
                <?php echo get_post_meta($secHBanner->ID, 'text_bellow_extras', true ); ?>
              </div>
            </div>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-ms-6 col-xs-12 boxmH text-center">
          <img src="<?php echo $imgSrc; ?>" alt="" class="img-responsive">
          <div class="text_bellow_extras sp">
            <?php echo get_post_meta($secHBanner->ID, 'text_bellow_extras', true ); ?>
          </div>
        </div>
      </div>
  </div>
</div>
