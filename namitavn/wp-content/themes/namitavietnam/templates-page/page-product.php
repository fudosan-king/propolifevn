<?php
/*
Template Name: Product Template
*/
?>
<?php get_header(); ?>

    <main class="main_content">

      <?php while(have_posts()) : the_post(); ?>

          <section class="product">
            <h2 class="title_sub"><span><?php the_title(); ?></span></h2>
            <div class="container">
              <div class="row">

                <?php

                    /**
                     * The WordPress Query class.
                     * @link http://codex.wordpress.org/Function_Reference/WP_Query
                     *
                     */
                    $args = array(

                        //Type & Status Parameters
                        'post_type'   => 'nmt-product',
                        'post_status' => 'publish',

                        //Pagination Parameters
                        'posts_per_page'         => -1,

                        //Oder

                        'order'       => 'DESC',


                    );

                    $query = new WP_Query( $args );


                    if ($query->have_posts()) : while ($query->have_posts()) { $query->the_post();

                       get_template_part(TEMPLPART.'/block', 'product');

                    }
                        wp_reset_postdata();
                    endif;


                ?>



              </div>
            </div>
          </section>


        <?php

            $secProBot = get_post_by_slug('product-bottom');
         ?>
          <section class="material">
            <div class="container">
              <div class="row">
                <div class="col-lg-7 col_centered text-center">
                  <h3><?php echo $secProBot->post_title; ?></h3>
                    <div class="table-responsive">
                      <?php echo $secProBot->post_content; ?>
                    </div>
                </div>
              </div>
            </div>
          </section>

        <?php endwhile; ?>

        </main>


<?php get_footer(); ?>

