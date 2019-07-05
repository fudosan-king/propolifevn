<?php 
    if($post):
        $thumbnailURL = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), $size = 'origin', $icon = false );
        $news_part_1 = get_field('news_1');
        $news_part_2 = get_field('news_2');
        $news_part_3 = get_field('news_3');
?>
<section class="section_magazine_detail">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($news_part_1): ?>
                <h2 class="head_title"><?php echo $news_part_1['title']; ?></h2>
                <img src="<?php echo $news_part_1['image']['url']; ?>" alt="" class="img-fluid w-100 mb-3">
                <p><?php echo $news_part_1['comment']; ?></p>
                <?php endif; ?>
                <?php if($news_part_2): ?>
                <h1 class="head_title"><?php echo $news_part_2['title']; ?></h1>
                <div class="row no-gutters box_img_text">
                    <div class="col-12 col-sm-6 align-self-center">
                        <img src="<?php echo $news_part_2['image_1']['url']; ?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 align-self-center">
                        <div class="box_text">
                            <p><?php echo $news_part_2['comment_1']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters box_img_text flex-sm-row-reverse">
                    <div class="col-12 col-sm-6 align-self-center">
                        <img src="<?php echo $news_part_2['image_2']['url']; ?>">
                    </div>
                    <div class="col-12 col-sm-6 align-self-center">
                        <div class="box_text">
                            <p><?php echo $news_part_2['comment_2']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($news_part_2): ?>
                <h3 class="text-center"><?php echo $news_part_3['title']; ?></h3>
                <div class="row">
                    <div class="col-6 col-sm-6 align-self-center">
                        <img src="<?php echo $news_part_3['image_1']['url']; ?>" alt="" class="img-fluid w-100">
                    </div>
                    <div class="col-6 col-sm-6 align-self-center">
                        <img src="<?php echo $news_part_3['image_2']['url']; ?>" alt="" class="img-fluid w-100">
                    </div>
                </div>
                <p class="mt-3"><?php echo $news_part_3['comment']; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif ?>
<?php wp_reset_postdata(); ?>