<?php
/**
Template Name: CustomerPage
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

<div class="container">
<div class="row top-row">
<div class="col-lg-2 col-md-2 col-sm-4 hidden-xs"></div>
<div class="col-lg-8 col-sm-8 col-xs-12" align="center">
<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();
?>
</div>
<div class="col-lg-2 col-md-2 col-sm-4 hidden-xs"></div>
</div>
</div>

<div class="container">
<div class="row show-grid">
<?php
    if ($lang == 'vi'){
        $cat = 126;
    } else if ($lang == 'ja') {
        $cat = 128;
    } else {
        $cat = 124;
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
    $shop_arrays = array();
    if($posts_arrays):
        foreach (range(1, count($posts_arrays)) as $number) {
            foreach($posts_arrays as $posts_array){
                if ($number == get_field('oder', $posts_array->ID)){
                    array_push($shop_arrays, $posts_array);
                }
            }
        }
        $colum = count($shop_arrays);
        $index = 1;
        foreach($shop_arrays as $shop_array):
            $name = get_field('name', $shop_array->ID);
            $href = $shop_array->guid;
            $image = get_field('image', $shop_array->ID);
            $description = substr(get_field('description', $shop_array->ID), 0, 60);


            if ($colum < 4) {
                $col = intval(12 / $colum);
                echo '
                    <div class="col-lg-'. $col . ' col-md-' . $col . ' col-sm-' . $col . ' col-xs-12"><div class="course" align="center"';

                if ($col == 12 ) { echo ' style="width: 50%; margin: 10px auto;"'; }
                else if ($col == 6 ) { echo ' style="width: 70%; margin: 10px auto;"'; }
                else if ($col == 4 ) { echo ' style="width: 100%; margin: 10px auto;"'; }

                echo '>';

            } else {
                 echo '
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" align="center">
                <div class="course" align="center">
                ';
            }

            echo '
            <div class="view" align="center">
            <a href="' . get_bloginfo('siteurl'). '&p='. $shop_array->ID . '">
                <img src="' . $image['url'] . '" class="img-responsive">
            </a>
            </div>
            <div class="caption">
            <div class="title-caption">
            <h4><a href="' . get_bloginfo('siteurl'). '&p='. $shop_array->ID . '">' . $name . '</a><div class="line">&nbsp;</div></h4>
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