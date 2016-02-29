<?php
/**
Template Name: NewsPage
*/
?>

<?php
$lang = $_GET['lang'];
if (!$lang) {
    $lang = 'ja';
}
$template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());
$page = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
$total_item = 10;
?>
<?php get_header(); ?>
<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();
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

    $args_total = array(
        'cat'              => $cat,
        'category'         => '',
        'category_name'    => '',
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

    $total_posts = count(get_posts( $args_total ));
    $total_page = intval($total_posts / $total_item);
    if (($total_posts % $total_item) > 0) {
        $total_page += 1;
    }

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

        echo '
            <nav align="center">
            <ul class="pagination pagination-md">';

        if ( $page > 1 ) {
            echo '<li><a href="' . get_bloginfo('siteurl') . '&page_id=' . get_query_var( 'page_id' ) . '&page=' . ($page - 1) .'" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
        }
        if ($total_page == 1) {
            echo '<li class="active"><a href="' . get_bloginfo('siteurl') . '&page_id=' . get_query_var( 'page_id' ) . '&page=' . 1 .'">1</a></li>';
        } else if ($total_page > 1) {
            $numbers = range(1, $total_page);
            foreach ($numbers as $number) {
                if ($number == $page) {
                    echo '<li class="active"><a href="' . get_bloginfo('siteurl') . '&page_id=' . get_query_var( 'page_id' ) . '&page=' . $number .'">' . $number . '</a></li>';
                } else {
                    echo '<li><a href="' . get_bloginfo('siteurl') . '&page_id=' . get_query_var( 'page_id' ) . '&page=' . $number .'">' . $number . '</a></li>';
                }
            }
        }
        if ( $page < $total_page ) {
            echo '<li><a href="' . get_bloginfo('siteurl') . '&page_id=' . get_query_var( 'page_id' ) . '&page=' . ($page + 1) .'" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
        }

        echo '
            </ul>
            </nav>
        ';

    endif;
?>
</div>
<div class="col-md-4"><?php get_sidebar('news');?></div>
</div>
</div>
<?php get_footer(); ?>