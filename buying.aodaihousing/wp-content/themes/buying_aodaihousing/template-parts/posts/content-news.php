<?php 
    if($post):
    $thumbnailURL = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), $size = 'origin', $icon = false );
?>
<section class="section_magazine_detail">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="head_title"><?php echo $post->post_title; ?></h2>
                <img src="<?php echo $thumbnailURL; ?>" alt="" class="img-fluid w-100 mb-3">
                <p><?php the_field('news_comment_1'); ?></p>
                <h1 class="head_title"><?php the_field('news_feauture'); ?></h1>
                <div class="row no-gutters box_img_text">
                    <div class="col-12 col-sm-6 align-self-center">
                        <img src="<?php echo get_field('news_image_2')['url']; ?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 align-self-center">
                        <div class="box_text">
                            <p><?php the_field('news_comment_2'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters box_img_text flex-sm-row-reverse">
                    <div class="col-12 col-sm-6 align-self-center">
                        <img src="<?php echo get_field('news_image_3')['url']; ?>">
                    </div>
                    <div class="col-12 col-sm-6 align-self-center">
                        <div class="box_text">
                            <p><?php the_field('news_comment_3'); ?></p>
                        </div>
                    </div>
                </div>
                <h3 class="text-center"><?php the_field('news_feature_1'); ?></h3>
                <div class="row">
                    <div class="col-6 col-sm-6 align-self-center">
                        <img src="<?php echo get_field('news_image_4')['url']; ?>" alt="" class="img-fluid w-100">
                    </div>
                    <div class="col-6 col-sm-6 align-self-center">
                        <img src="<?php echo get_field('news_image_5')['url']; ?>" alt="" class="img-fluid w-100">
                    </div>
                </div>
                <p class="mt-3"><?php the_field('news_comment_4'); ?></p>
            </div>
        </div>
    </div>
</section>
<?php endif ?>
<?php wp_reset_postdata(); ?>