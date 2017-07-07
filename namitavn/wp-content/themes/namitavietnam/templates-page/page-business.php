<?php
/*
Template Name: Business Template
*/

?>
<?php get_header(); ?>

    <main class="main_content">

<?php

  while(have_posts()) : the_post();

    $imgSrc = null;

    if (has_post_thumbnail($post->ID))
    {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID ), 'full');
        $imgSrc = $img[0];
    }

    $secBusHeat = get_post_by_slug('business-heat');
    $secBusCustomer = get_post_by_slug('business-customer');

?>



          <section class="business">
            <h2 class="title_sub"><span><?php the_title(); ?></span></h2>
            <div class="container">
              <div class="row w_box_business_info">
                <div class="col-lg-5 col-md-5 col-sm-5 col-ms-6 col-xs-12 box_business_info boxmH">
                  <div class="box_business_text">
                    <?php echo $post->post_content; ?>
                  </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-ms-6 col-xs-12 box_business_img boxmH">
                    <img src="<?php echo $imgSrc; ?>" alt="" class="img-responsive">
                </div>
              </div>
            </div>
          </section>

          <section class="heat">
            <h2 class="title"><i class="i_star"></i> <span class="title_text"><?php echo $secBusHeat->post_title; ?></span></h2>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                    <?php
                        $imgSecBusHeat = wp_get_attachment_image_src(get_post_thumbnail_id($secBusHeat->ID ), 'full' );
                     ?>
                  <img src="<?php echo $imgSecBusHeat[0]; ?>" alt="" class="img-responsive">
                  <!-- <p class="mb0"></p> -->
                  <?php echo $secBusHeat->post_content; ?>
                </div>
              </div>
            </div>
          </section>

          <section class="customer">
            <h2 class="title"><i class="i_star"></i> <span class="title_text"><?php echo $secBusCustomer->post_title; ?></span></h2>
            <div class="container">
              <div class="row box_customer">
                <div class="col-lg-12">
                  <div class="owl-carousel owl-theme owl_customer">
                    <?php

                        $repeater = get_field('customer_logo_info', $secBusCustomer->ID);
                        //print_r($repeater);

                        // check if the repeater field has rows of data
                        if( have_rows('customer_logo_info', $secBusCustomer->ID) ):

                            // loop through the rows of data
                            while ( have_rows('customer_logo_info', $secBusCustomer->ID) ) : the_row();

                                // display a sub field value
                                $major_name = get_sub_field('major_name');
                                $major_logo = get_sub_field('major_logo');
                                $major_link = get_sub_field('major_link');
                                ?>
                                    <div class="item">
                                      <h3><?php echo $major_name; ?></h3>
                                      <a href="<?php echo $major_link ?>"><img src="<?php echo $major_logo; ?>" alt="" class="img-responsive"></a>
                                    </div>

                                <?php

                            endwhile;

                        endif;

                     ?>

                  </div>
                  <p class="text-center"><?php echo get_post_meta($secBusCustomer->ID, 'customer_text_info', true ); ?></p>
                </div>
              </div>

            </div>
          </section>

          <section class="customer_company">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-sm-6 col-ms-6 col-xs-12">
                  <div class="box_customer_col boxmH">
                    <h3><?php echo get_post_meta($secBusCustomer->ID, 'customer_title_#1', true ); ?></h3>
                    <?php echo get_post_meta($secBusCustomer->ID, 'customer_list_#1', true ); ?>
                    <h5><?php echo get_post_meta($secBusCustomer->ID, 'customer_title_#2', true ); ?></h5>
                    <?php echo get_post_meta($secBusCustomer->ID, 'customer_list_#2', true ); ?>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-ms-6 col-xs-12">
                  <div class="box_customer_col boxmH">
                    <h3><?php echo get_post_meta($secBusCustomer->ID, 'customer_title_#3', true ); ?></h3>
                    <?php echo get_post_meta($secBusCustomer->ID, 'customer_list_#3', true ); ?>
                  </div>
                </div>
            </div>
            </div>

          </section>

  <?php endwhile; ?>

        </main>

<?php get_footer(); ?>

