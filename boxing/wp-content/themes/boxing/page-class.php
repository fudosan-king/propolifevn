<?php
/**
Template Name: ClassPage
*/
?>

<?php
$lang = $_GET['lang'];
if (!$lang) {
    $lang = 'ja';
}
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
        $cat = 37;
    } else if ($lang == 'ja') {
        $cat = 39;
    } else {
        $cat = 35;
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
    $class_arrays = array();
    if($posts_arrays):
        foreach (range(1, count($posts_arrays)) as $number) {
            foreach($posts_arrays as $posts_array){
                if ($number == get_field('oder', $posts_array->ID)){
                    array_push($class_arrays, $posts_array);
                }
            }
        }
        $colum = count($class_arrays);
        $index = 1;
        foreach($class_arrays as $class_array):
            $name = get_field('name', $class_array->ID);
            $href = $class_array->guid;
            $image = get_field('image', $class_array->ID);
            $description = substr(get_field('description', $class_array->ID), 0, 60);


            if ($colum < 6) {
                $col = intval(12 / $colum);
                echo '
                    <div class="col-lg-'. $col . ' col-md-' . $col . ' col-sm-' . $col . ' col-xs-12"><div class="course" align="center"';

                if ($col == 12 ) { echo ' style="width: 50%; margin: 10px auto;"'; }
                else if ($col == 6 ) { echo ' style="width: 70%; margin: 10px auto;"'; }
                else if ($col == 4 ) { echo ' style="width: 100%; margin: 10px auto;"'; }

                echo '>';

            } else {
                 echo '
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6" align="center">
                <div class="course" align="center">
                ';
            }

            echo '
            <div class="view" align="center">
            <a href="' . get_bloginfo('siteurl'). '&p='. $class_array->ID . '">
                <img src="' . $image['url'] . '" class="img-responsive">
            </a>
            </div>
            <div class="caption">
            <div class="title-caption">
            <h4><a href="' . get_bloginfo('siteurl'). '&p='. $class_array->ID . '">' . $name . '</a><div class="line">&nbsp;</div></h4>
            </div>
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