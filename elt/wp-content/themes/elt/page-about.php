<?php
/**
Template Name: AboutPage
*/
?>

<?php
$lang = get_bloginfo('language');
$template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
?>

<?php
    // add_action( 'wp_head_customer', 'add_javascript_slider', 10);
    add_action( 'wp_head_customer', 'add_javascript_sliderAbout', 15);
    get_header();
?>

<?php
    // show slider
    // show_slider();
?>

<div class="slogan-row desc" data-stellar-background-ratio="0.5" style="background-position: 50% 90px;">
<div class="container">
<div class="row">
<div class="col-lg-12">

<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();
?>

</div>
</div>
</div>
</div>

<div class="show-grid">
<div class="container">
<div class="row">
<div class="col-lg-12 col-sm-12 col-xs-12 center-block" align="center">

<?php
    // show gallery
    show_gallery();
?>

</div>
</div>
</div>
</div>

<?php get_footer(); ?>