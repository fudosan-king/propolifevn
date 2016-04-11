<?php
    if ($lang == 'vi'){
        $cat = 58;
    } else if ($lang == 'ja') {
        $cat = 52;
    } else {
        $cat = 56;
    }
?>

<div class="list-group">
<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">最近の投稿</h4></a>
<?php
$arg = array('post_type' => 'post','orderby' => 'date','order' => 'desc','posts_per_page' =>5);
$the_query = new WP_Query($arg);
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<a href="<?php echo get_permalink($post->ID);?>" class="list-group-item"><p class="list-group-item-text"><?php echo getLimitContent($post->ID,150);?></p></a>
<?php endwhile;wp_reset_query(); ?>
</div>
<?php
$args_archives = array(
'type'            => 'monthly',
'cat'             => $cat,
'limit'           => '',
'format'          => '',
'before'          => '',
'after'           => '',
'show_post_count' => false,
'echo'            => 1,
'order'           => 'DESC'
);
?>
<div class="list-group"><a href="#" class="list-group-item active"><h4 class="list-group-item-heading">アーカイブ</h4></a>
<?php wp_get_archives_customer( $args_archives );?>
</div>
</div>