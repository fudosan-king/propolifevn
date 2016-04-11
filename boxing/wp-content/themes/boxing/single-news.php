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

get_header(); ?>
<?php
    $lang = $_GET['lang'];
    if (!$lang) {
        $lang = 'ja';
    }
    $post_id = get_post()->ID;
    $post_date = substr(get_post()->post_date, 0, 10);
    $post_content = get_post()->post_content;
    $post_title = get_post()->post_title;
    if ($lang == 'vi'){
        $cat = 58;
    } else if ($lang == 'ja') {
        $cat = 52;
    } else {
        $cat = 56;
    }

    $args_recent = array(
        'cat'              => $cat,
        'posts_per_page'   => -1,
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
?>

    <div class="bg-default">
        <div class="container">
        <div class="row">
        <div class="col-md-8">

        <div class="list-group">
        <figure class="list-group-item disabled">

        <figcaption>
        <time><?php echo $post_date; ?></time>
        <h4><?php echo $post_title; ?></h4>
        </figcaption>
        </figure>

        <div class="list-group-item">
        <div align="center" class="news-thumb"><?php echo get_the_post_thumbnail ( $post_id, array(600, 600, 'class' => ' img-responsive') ); ?></div>
        <p><?php echo $post_content; ?></p>
        </div>

        </div>
    </div>

    <div class="col-md-4"><?php get_sidebar('news');?></div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>