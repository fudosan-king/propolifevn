<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/banner', 'home' ); ?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="box_left">
          
          <!-- CONCEPT CONTENT -->
          <?php 
            if (have_rows('concept_content')):
              while(have_rows('concept_content')): the_row();
                $img = get_sub_field('concept_block_image');
                ?>
                <h2 class="title"><?php echo get_sub_field('concept_block_title'); ?></h2>
                <div class="row about_item">
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="img">
                      <a data-scroll="toggle(.fromLeftIn, .fromLeftOut)" href="#"><img src="<?php echo $img['url']; ?>" alt="" class="img-responsive w100p"></a>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="box_content_right">
                      <p data-scroll="toggle(.fromRightIn, .fromRightOut)">
                        <?php echo get_sub_field('concept_block_text'); ?>      
                      </p>
                    </div>
                  </div>
                </div>
                <?php
              endwhile;
            endif;
          ?>
          
          <!-- FEATURE CONTENT -->
          <?php 
            if (have_rows('feature_content')):
              while(have_rows('feature_content')): the_row();
                echo '<h2 class="title">'.get_sub_field('title').'</h2>';
                if (have_rows('content')):
                  
                  echo '<div class="row">';
                  while(have_rows('content')): the_row();
                    $img_bg = get_sub_field('background_image');
                    
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <article class="service_item">
                        <div class="img">
                          <a href="#"><img src="<?php echo $img_bg['url']; ?>" alt="" class="img-responsive"></a>
                        </div>
                        <div class="box_content_top">
                          <h3><a href="#"><?php echo get_sub_field('title'); ?></a></h3>
                          <p><?php echo get_sub_field('text_area'); ?></p>
                        </div>
                      </article>
                    </div>
                    <?php
                    
                  endwhile;
                  echo '</div>';

                  echo '<div class="row">';
                  while(have_rows('content')): the_row();
                    $post_member = get_sub_field('post_member');
                    $img_url = wp_get_attachment_image_url( get_post_thumbnail_id( $post_member->ID ), $size = 'large', $icon = false );
                    $member_pos_name = get_sub_field('member_position')." ".$post_member->post_title;

                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="info_staff sameify">
                        <a href="#"><img src="<?php echo $img_url; ?>" alt="" class="img-responsive"></a>
                        <h4><?php echo $member_pos_name; ?></h4>
                      </div>
                    </div>
                    <?php
                    
                  endwhile;
                  echo '</div>';

                endif;
              endwhile;
            endif;
          ?>

          <!-- GREETING CONTENT -->
          <?php 
            if (have_rows('greeting_content')):
              while(have_rows('greeting_content')): the_row();
                echo '<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                ?>
                <div class="box_info_staff">
                  <h2 class="title"><?php echo get_sub_field('title'); ?></h2>
                  <?php echo get_sub_field('visual_text'); ?>
                </div>
                <?php
                echo '</div>
            </div>';
              endwhile;
            endif;
          ?>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              
            </div>
          </div>

        </div>

      </div>

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php get_sidebar(); ?>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>