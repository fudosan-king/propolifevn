
<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>

<section class="main_content">
  <div class="container">
    <div class="row">
      <div class="sub_Contentpage">

        <h3>
          <?php 
          echo get_field('construction_big_title')."<br>".get_the_title();
          ?>
        </h3>
        
        <?php the_content(); ?>

        <?php 
        if (have_rows('construction_image_repeater')):
         echo '<div class="masonry_Contentpage">';
         while(have_rows('construction_image_repeater')): the_row();
          $construction_image = get_sub_field('construction_image');
          $construction_description = get_sub_field('construction_description');

          echo '<div class="panel panel-default">';
          echo '<div class="panel-body">
          <img src="'. $construction_image['url'].'" alt="" class="img-responsive">
          </div>';
          if (!empty($construction_description)):
            echo '<div class="panel-footer">
            '.$construction_description.'
            </div>';
          endif;
          echo '</div>';

        endwhile;
        echo '</div>';

      endif;
      ?>

    <!-- GALLERY CONTENT -->
    <?php 
    $construction_list_images = get_field('construction_list_images');

    $construction_title = $construction_list_images['construction_title'];
    $construction_gallery = $construction_list_images['construction_gallery'];

    echo '<div class="row">
    <h3 class="title_sub">'.$construction_title.'</h3>
    <div class="col-lg-12">';

    if (!empty($construction_gallery)):
      echo '<div class="gal">';
      foreach($construction_gallery as $img){
        ?>
        <a data-fancybox="gallery" href="<?php echo $img['url'] ?>"><img src="<?php echo $img['url'] ?>" alt="" class="img-responsive"></a>
        <?php
      }
      echo '</div>';
    endif;

    echo '</div>
    </div>';
    ?>

    <!-- BUTTON CONTACT LINK -->
    <?php 
    $construction_link = get_field('construction_link');
    if (!empty($construction_link)):
      ?>
      <a href="<?php echo $construction_link['url'] ?>" target="<?php echo $construction_link['target']; ?>" class="btn btn-lg btnContact"><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i> <?php echo $construction_link['title'] ?> <span class="arrow_right"></span></a>
      <?php
    endif;
    ?>

  </div>
</div>
</div>
</section>