<?php
/*
Template Name: Company Template
*/
?>
<?php get_header(); ?>




<main class="main_content">

  <?php while(have_posts()) : the_post(); ?>

    <section class="introduction">
        <h2 class="title_sub"><span><?php the_title(); ?></span></h2>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-bordered table-hover table_introduction">
                <tbody>
                  <tr>
                    <td width="30%">
                        <?php
                            $imgSrc = null;
                            if(has_post_thumbnail($post->ID )){
                                $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID ), 'full' );
                                $imgSrc = $img[0];
                            }
                         ?>
                      <img src="<?php echo $imgSrc; ?>" alt="" class="img-responsive">
                    </td>
                    <td>
                        <?php echo get_post_meta($post->ID, 'logo_content', true ); ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <?php

                            if(have_rows('logo_text_extras', $post->ID)): while(have_rows('logo_text_extras', $post->ID)): the_row();
                                the_sub_field('text_content');
                            endwhile; endif;
                         ?>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>

                <?php echo $post->post_content; ?>

            </div>
          </div>
        </div>
    </section>


  <?php endwhile; ?>

    </main>

<?php get_footer(); ?>

