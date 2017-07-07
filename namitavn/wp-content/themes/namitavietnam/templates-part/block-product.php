<?php

$description = get_post_meta($post->ID, 'description', true );

                $imgSrc = null;

                if (has_post_thumbnail()){
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID ), 'single-post-thumbnails' );
                    $imgSrc = $img[0];
                }

                $category = __('Undefined', 'namitavietnam');

                if (has_term( '', 'nmt-category' )){
                  $terms = wp_get_post_terms( $post->ID, 'nmt-category');
                  $category = $terms[0]->name;
                }

 ?>
<div class="col-lg-4 col-md-4 col-sm-4 col-ms-6 col-xs-12">
              <div class="box_product">
                <a href="<?php the_permalink(); ?>" target="_blank"><img src="<?php echo $imgSrc ?>" alt="" class="img-responsive"></a>
                <h3><?php the_title(); ?></h3>
                <h4>（<?php echo  $category; ?>）</h4>
                <p><?php echo $description; ?></p>
                <a href="<?php echo get_permalink(); ?>" target="_blank" class="btn btn-link btn_more"><?php echo __('Read more', 'namitavietnam'); ?> <span class="icon arrow_right"></span></a>
              </div>
            </div>
