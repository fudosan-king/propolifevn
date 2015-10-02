<?php
/**
Template Name: GymPage
*/
?>

<?php
$lang = get_bloginfo('language_code');
$template_directory = str_replace("twentyfifteen", "boxing", get_template_directory_uri());
?>

<?php get_header(); ?>

<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();
?>

<div class="container">
<div class="row show-grid">
<?php
    if ($lang == 'vi'){
        $cat = 31;
    } else if ($lang == 'ja') {
        $cat = 33;
    } else {
        $cat = 27;
    }
    $args = array(
        'cat'              => $cat,
        'posts_per_page'   => 20,
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
    if($posts_arrays):
        foreach($posts_arrays as $posts_array):
            $name = get_field('name', $posts_array->ID);
            $href = $posts_array->guid;
            $image = get_field('image', $posts_array->ID);
            $description = substr(get_field('description', $posts_array->ID), 0, 60);

            // print_r($posts_array);
            // print_r(get_field('image', $posts_array->ID));

            echo '
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="course" align="center">
            <div class="view" align="center">
            <a href="' . get_bloginfo('siteurl'). '&p='. $posts_array->ID . '"><img height="265" src="' . $image['url'] . '" class="img-responsive gym-class"></a>
            </div>
            <div class="caption">
            <h4><a href="' . get_bloginfo('siteurl'). '&p='. $posts_array->ID . '">' . $name . '</a><div class="line">&nbsp;</div></h4>
            <p>' . $description . ' ...</p>
            </div>
            </div>
            </div>
            ';
        endforeach;
    endif;

?>

</div>
</div>
<?php get_footer(); ?>