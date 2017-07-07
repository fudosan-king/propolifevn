<?php
    $sec = get_post_by_slug('home-product');

?>
<section class="products">
    <h2 class="title"><i class="i_star"></i> <span class="title_text"><?php echo $sec->post_title;  ?></span></h2>
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
                'posts_per_page'         => 3,
                'tax_query' => array(
                    array(
                        'taxonomy'         => 'nmt-displaytype',
                        'field'            => 'slug',
                        'terms'            => array( 'home-features'),
                    ),
                )


            );

            $query = new WP_Query( $args );


            if ($query->have_posts()) : while ($query->have_posts()) { $query->the_post();
                    get_template_part(TEMPLPART.'/block', 'product');

                }
                wp_reset_postdata();
            endif;


        ?>

    </div>
  </section>
