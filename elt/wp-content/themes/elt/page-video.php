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
<div class="container"><div class="slogan"><h4 class="item-title"><?php the_title(); ?></h4></div>
<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    wp_reset_query();
?>

</div>
</div>

<div class="container">
<div class="row" style="margin-top:30px;">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" align="center">&nbsp;</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
<a href="https://www.youtube.com/embed/hBAWgY_ofkM" class="fancybox-media thumbnail video-thumb" rel="media-gallery">
<img src="http://www.eltvn.com/wp-content/uploads/2016/05/video-cover.png" class="img-responsive">
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" align="center">&nbsp;</div>
</div>
</div>

<?php get_footer(); ?>