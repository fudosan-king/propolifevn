<div class="col-lg-9 col-md-9">
<?php $my_query = new WP_Query('post_type=video&showposts=1'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post();$youtube = get_post_meta($post->ID,'youtube-id',true); ?>
<h5><strong class="title-video"><?php the_title(); ?></a></strong></h5>
<div class="media-body" align="center">
<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $youtube; ?>" frameborder="0" allowfullscreen id="media-view"></iframe>
<i class="fa fa-spinner fa-spin fa-3x"></i>
</div>
<?php endwhile; ?>
</div>
<div class="col-lg-3 col-md-3">
<h5><strong>
    <?php if ($lang == 'ja') { ?>
        トップリストビデオ

    <?php } else if ($lang == 'vi') { ?>
        Video xem nhiều

    <?php } else { ?>
        TOP LIST VIDEO

    <?php } ?>
</strong></h5>
<ul class="topvideo media-list">
<?php
$arg = array('post_type' => 'video','orderby' => 'date','order' => 'desc','posts_per_page' =>10);
$the_query = new WP_Query($arg);
$dem = 1;
while ( $the_query->have_posts() ) : $the_query->the_post();
$youtube = get_post_meta($post->ID,'youtube-id',true);
?>
<li><a href="#" rel="<?php echo $youtube;?>" title="<?php the_title();?>"><i class="fa fa-circle-bg"><?php echo $dem;?></i><?php the_title();?></a></li>
<?php $dem++; endwhile;wp_reset_query(); ?>
</ul>
</div>