<?php
/**
Template Name: MessagePage
*/
?>

<?php
$lang = get_bloginfo('language');
$template_directory = str_replace("twentyfifteen", "elt", get_template_directory_uri());
?>

<?php
    // add_action( 'wp_head_customer', 'add_javascript_slider', 10);
    get_header();
?>

<?php
    // show slider
    // show_slider();
?>

<div class="slogan-row desc" data-stellar-background-ratio="0.5" style="background-position: 50% 90px;">
<div class="container">

<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();
?>

</div>
</div>

<?php get_footer(); ?>