<?php get_header(); ?>


  <?php
        while(have_posts()) : the_post();
            if (is_front_page()){
                get_template_part('sections/home', 'product' );
                get_template_part('sections/home', 'branch' );
            }
        endwhile;
  ?>


<?php get_footer(); ?>

