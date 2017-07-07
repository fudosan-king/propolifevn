<?php
/*
Template Name: Contact Template
*/
?>
<?php get_header(); ?>

<main class="main_content">

  <?php while(have_posts()) : the_post(); ?>

    <section class="contact">
        <h2 class="title_sub"><span><?php the_title(); ?></span></h2>
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <?php
                    $imgSrc = null;
                    if(has_post_thumbnail( $post->ID )){
                        $img = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full' );
                        $imgSrc = $img[0];
                    }
                 ?>
              <img src="<?php echo $imgSrc; ?>" alt="" class="img-responsive">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
              <?php the_content();?>
            </div>
          </div>
        </div>
        </section>

        <section class="map">
        <?php echo get_post_meta($post->ID, 'google_map_iframe', true ); ?>
        </section>


        <section class="contact">
        <div class="container">
          <div class="row box_contact">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <h2><?php echo get_post_meta($post->ID, 'left_box_contact_title', true ); ?></h2>
              <p><?php echo get_post_meta($post->ID, 'left_box_contact_content', true ); ?></p>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
              <h2><?php echo get_post_meta($post->ID, 'right_box_contact_title', true ); ?></h2>

                <?php echo  do_shortcode(get_post_meta($post->ID, 'right_box_contact_content', true )); ?>

            </div>
          </div>
        </div>
    </section>


    <?php endwhile; ?>


</main>

<?php get_footer(); ?>

