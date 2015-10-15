<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Boxing
 * @since Boxing
 */
get_header();
?>

<div class="bg-default">
<div class="container">
<div class="row">

<?php
    if ($lang == 'vi'){
        $cat = 58;
    } else if ($lang == 'ja') {
        $cat = 52;
    } else {
        $cat = 56;
    }
    $args = array(
        'cat'              => $cat,
        'posts_per_page'   => $total_item,
        'offset'           => $total_item * ($page - 1),
        'category'         => '',
        'category_name'    => '',
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'       => '',
        'post_status'      => 'publish',
        'suppress_filters' => true
    );

    $args_recent = array(
        'cat'              => $cat,
        'posts_per_page'   => 5,
        'offset'           => 0,
        'category'         => '',
        'category_name'    => '',
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'       => '',
        'post_status'      => 'publish',
        'suppress_filters' => true
    );

    $posts_arrays = get_posts( $args );

    echo '<div class="col-md-8">';

    if($posts_arrays):
        echo '<div class="list-group">';
        foreach($posts_arrays as $posts_array):
            $href = $posts_array->guid;
            $post_date = substr($posts_array->post_date, 0, 10);
            $description = $posts_array->post_content;
            $image = get_the_post_thumbnail ( $posts_array->ID, array(240, 240, 'class' => ' img-responsive') );

            echo '
            <a href="' . get_bloginfo('siteurl'). '&p='. $posts_array->ID . '" class="list-group-item">
            <figure class="row">
            <div class="col-md-4">'. $image . '</div>
            <figcaption class="col-md-8">
            <time>' . $post_date . '</time>
            <h5>' . $description . '</h5>
            </figcaption>
            </figure>
            </a>
            ';
        endforeach;
        echo '</div>';

    endif;

    echo '</div>';

    echo '
        <div class="col-md-4">

        <div class="list-group">
        <a href="#" class="list-group-item active"><h4 class="list-group-item-heading">最近の投稿</h4></a>
    ';

    $posts_recents = get_posts( $args_recent );
    if($posts_recents) {
        foreach($posts_recents as $posts_recent):
            $description = substr($posts_recent->post_content, 0, 200);
            echo '
            <a href="' . get_bloginfo('siteurl'). '&p='. $posts_recent->ID . '" class="list-group-item">
            <p class="list-group-item-text">' . $description .'</p>
            </a>
            ';
        endforeach;
    }

    echo '</div>';

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

    echo '
        <div class="list-group"><a href="#" class="list-group-item active"><h4 class="list-group-item-heading">アーカイブ</h4></a>';

    wp_get_archives_customer( $args_archives );

    echo '</div>';

    echo '</div>';

?>

</div>
</div>
</div>

<?php get_footer(); ?>
