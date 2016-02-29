<?php
/**
Template Name: AboutPage
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

<?php get_footer(); ?>