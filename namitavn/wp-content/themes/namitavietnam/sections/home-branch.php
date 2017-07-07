<?php
    $sec = get_post_by_slug('home-branch');

    if (has_post_thumbnail($sec->ID)){
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($sec->ID ), 'single-post-thumbnails' );
        $imgSrc = $img[0];
    }

?>
<section class="branch">
    <h2 class="title"><i class="i_star"></i> <span class="title_text"><?php echo $sec->post_title;  ?></span></h2>
    <div class="container">
      <div class="row w_box_map">
        <div class="col-lg-6 col-md-6 col-sm-6 col-ms-6 col-xs-12 boxmH box_map">
          <div class="box_map_img">
            <img src="<?php echo $imgSrc ?>" alt="" class="img-responsive">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-ms-6 col-xs-12 box_map">
          <div class="box_map_content">
                <?php
                    echo $sec->post_content;
                 ?>
          </div>
        </div>
      </div>

    </div>
</section>
